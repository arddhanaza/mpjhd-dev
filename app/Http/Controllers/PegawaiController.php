<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::get_data_pegawai();
        $jabatan = Jabatan::all();
        return view('pegawai.pegawai', ['data_pegawai' => $pegawai,'data_jabatan'=>$jabatan]);
    }

    public function load_data(Request $request){
        if ($request->has('q')){
            $cari = $request->q;
            $data = DB::table('pegawai')->select('id_pegawai','nama')->where('nama', 'LIKE', '%'.$cari.'%')->get();
            return response()->json($data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = jabatan::all();
        return view('pegawai.tambah_data_pegawai',['data_jabatan'=>$jabatan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pegawai = new Pegawai();
        $user = new User();

        $usenname = str_replace(' ', '', $request->nama_pegawai);
        $usenname = strtolower($usenname);
        $user->username = $usenname;
        $user->password = md5('root');
        $user->save();

        $newest_id_user = $user->id_user;

        $pegawai->nama = $request->nama_pegawai;
        $pegawai->id_jabatan = $request->jabatan;
        $pegawai->id_user = $newest_id_user;
        $pegawai->save();



        return redirect(route('data_pegawai'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pegawai)
    {
        $jabatan = jabatan::all();
        $pegawai = Pegawai::find($id_pegawai);
        return view('pegawai.edit_data_pegawai',['data_pegawai'=>$pegawai,'data_jabatan'=>$jabatan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_pegawai)
    {
        $pegawai = Pegawai::find($id_pegawai);
        $pegawai->nama = $request->nama_pegawai;
        $pegawai->id_jabatan = $request->jabatan;

        $pegawai->save();
        return redirect(route('data_pegawai'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pegawai)
    {
        $pegawai = Pegawai::find($id_pegawai);
        $pegawai->delete();
        return  redirect(route('data_pegawai'));
    }
}
