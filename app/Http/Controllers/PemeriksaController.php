<?php

namespace App\Http\Controllers;

use App\Models\Pemeriksa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PemeriksaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('pemeriksa.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Pemeriksa $pemeriksa
     * @return Response
     */
    public function show(Pemeriksa $pemeriksa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Pemeriksa $pemeriksa
     * @return Response
     */
    public function edit($id_pemeriksa)
    {
        $pemeriksa = Pemeriksa::find($id_pemeriksa);
        return view('pemeriksa.edit_pemeriksa',['data_pemeriksa'=>$pemeriksa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Pemeriksa $pemeriksa
     * @return Response
     */
    public function update(Request $request, $id_pemeriksa)
    {
        $pemeriksa = Pemeriksa::find($id_pemeriksa);
        $pemeriksa->nama = $request->nama_pemeriksa;
        $pemeriksa->save();

        return redirect(route('data_pelanggaran'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Pemeriksa $pemeriksa
     * @return Response
     */
    public function destroy(Pemeriksa $pemeriksa)
    {
        //
    }
}
