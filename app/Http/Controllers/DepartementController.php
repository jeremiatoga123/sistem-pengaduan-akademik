<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class DepartementController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:departement-list', ['only' => 'index']);
        $this->middleware('permission:departement-create', ['only' => ['create','store']]);
        $this->middleware('permission:departement-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:departement-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data['page_title'] = 'Departements';
        $data['breadcumb'] = 'Departements';
        $data['departements'] = Role::orderby('id', 'asc')->get();
        
        return view('departements.index', $data);
    }

    public function create()
    {
        $data['page_title'] = 'Add Departements';
        $data['permissions'] = Permission::all();

        return view('departements.create',$data);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'required',
        ]);

        $role = new Role();
        $role->name = $validateData['name'];

        $role->save();
        $role->syncPermissions($validateData['permissions']);

        return redirect()->route('departements.index')->with('success','Departement created successfully');
    }

    public function show($id)
    {
        $data['departement'] = Role::findOrFail($id);

        return view('departements.show', $data);
    }

    public function edit($id)
    {
        $data['page_title'] = 'Edit Departements';
        $data['departement'] = Role::find($id);
        $data['permissions'] = Permission::get();
        $data['rolePermissions'] = DB::table("role_has_permissions")
        ->where("role_has_permissions.role_id",$id)
        ->pluck('role_has_permissions.permission_id')
        ->all();

        return view('departements.edit',$data);
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:roles,name,'.$id,
            'permissions' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $validateData['name'];

        $role->save();
        $role->syncPermissions($validateData['permissions']);

        return redirect()->route('departements.index')->with('success','Departement updated successfully');
    }

    public function destroy($id)
    {
        DB::transaction(function () use ($id) {
            $role = Role::findOrFail($id);
            $role->delete();
        });
        
        Session::flash('success', 'Departement deleted successfully!');
        return response()->json(['status' => '200']);
    }
}
