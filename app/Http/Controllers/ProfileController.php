<?php

namespace App\Http\Controllers;

use App\Models\User;

Use File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:profile', ['only' => 'index']);
        $this->middleware('permission:profile-edit', ['only' => ['edit','update']]);
    }
    public function index()
    {
        $data['page_title'] = 'Profile';
        $data['breadcumb'] = 'Profile ';
        $data['users'] = User::where('id', auth()->user()->id)->get();
        $data['roles'] = Role::pluck('name')->all();
        
     
        return view('profile.index', $data);
    }

    public function edit($id)
    {
        $data['page_title'] = 'Edit Profile';
        $data['breadcumb'] = 'Edit Profile';
        $data['user'] = User::findOrFail($id);
        $data['roles'] = Role::pluck('name')->all();
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name'   => 'required|string|min:3',
            'username'   => 'required|alpha_dash|unique:users,username,'.$id,
            'email'   => 'required|unique:users,email,'.$id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'role' => 'required',
        ]);


        $user = User::findOrFail($id);
        $user->name = $validateData['name'];
        $user->username = $validateData['username'];
        $user->email = $validateData['email'];

        
         if ($request->hasFile('avatar')) {
            // Delete Img
            if ($user->avatar) {
                $image_path = public_path('img/users/'.$user->avatar); // Value is not URL but directory file path
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            
            $image = $request->file('avatar');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('img/users/');
            $image->move($destinationPath, $name);
            $user->avatar = $name;
        }

        $user->save();
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($validateData['role']);

        if ($request->from == 'fe'){
            return redirect()->back()->with(['success' => 'Profile edited successfully!']);
        }
        return redirect()->route('profile.index')->with(['success' => 'Profile edited successfully!']);
    }

    public function changePassword(Request $request)
    {
        $validateData = $request->validate([
            'password' => 'required',
            'new_password' => 'required|min:8',
        ]);

        $user = User::findOrFail(Auth::user()->id);

        if (Hash::check($validateData['password'], $user->password)) {
            $user->password = Hash::make($request->get('new_password'));
            $user->save();
            
            $newHistoryLog = new HistoryLog();
            $newHistoryLog->datetime = date('Y-m-d H:i:s');
            $newHistoryLog->type = 'Change Password';
            $newHistoryLog->user_id = auth()->user()->id;
            $newHistoryLog->save();

            if ($request->from == 'fe'){
                return redirect()->back()->with(['success' => 'Profile edited successfully!']);
            }
            return redirect()->route('user.login', Auth::user()->id)->with('success', 'Password changed successfully!');
        } else {
            if ($request->from == 'fe'){
                return redirect()->back()->with(['failed' => 'Password change failed!']);
            }
            return redirect()->route('profile.index', Auth::user()->id)->with('failed', 'Password change failed');
        }
    }

}
