<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:dashboard', ['only'=> 'dashboard']);
    }
 
    public function index(){
        $data['aduan'] = Aduan::get();
        return view('daftar-keluhan.index', $data);

    }
    public function akun()
    {
        $data['page_title'] = "Akun";
        $data['users'] = User::where('id',Auth::user()->id)->get();
        $data['aduan'] = Aduan::where('id',Auth::user()->id)->get();
        $data['roles'] = Role::pluck('name')->all();

        return view('home.akun', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function balas(Request $request)
    {
        $id = $request->id_aduan;
        // dd($request->all());
        $data = Aduan::find($id);
        $data->status = 'Diterima';
        $data->balasan = $request->balas;
        if ($data->save()){
            return redirect()->back()->with(['success' => 'Berhasil Balas!']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = new Aduan();
        $data->id_user = Auth::user()->id;
        $data->nama_panjang = $request->nama_panjang;
        $data->jenis = $request->jenis;
        $data->isi_aduan = $request->isi_aduan;
        $data->status = 'Belum Diterima';
        if ($data->save()){
            return redirect()->back()->with(['success' => 'Berhasil kirim! untuk melihat perkembangan aduan berada pada menu akun']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aduan  $aduan
     * @return \Illuminate\Http\Response
     */
    public function show(Aduan $aduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aduan  $aduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Aduan $aduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aduan  $aduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aduan $aduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aduan  $aduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aduan $aduan)
    {
        //
    }
}
