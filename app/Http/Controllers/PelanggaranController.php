<?php

namespace App\Http\Controllers;

use App\Models\FaktorPembobotanUtama;
use App\Models\Nilai;
use App\Models\Pegawai;
use App\Models\Pelanggaran;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pelanggaran = Pelanggaran::get_data_pelanggarn();
        return view('pemeriksa.pelanggaran', ['data_pelanggaran' => $pelanggaran]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return $this->create_kelompok();
    }

    public function create_kelompok(Request $request)
    {
        if (isset($request)) {

        }
        return view('pemeriksa.pelanggaran_1_kelompok');
    }

    public function create_tingkat_hukuman(Request $request)
    {
        if (isset($request)) {
            $id_pegawai = $request->id_pegawai;
            $kelompok = $request->kelompok;
            $data = array("id_pegawai" => $id_pegawai, "kelompok" => $kelompok);
        }
        return view('pemeriksa.pelanggaran_2_tingkat_hukuman', ["data" => $data]);
    }

    public function create_faktor_utama(Request $request)
    {
        if (isset($request)) {
            if (isset($request->frekuensi_tidak_masuk)) {
                $frekuensi_tidak_masuk = $request->frekuensi_tidak_masuk;
                $tingkat_hukuman = $this->calculate_tingkat_pelanggaran($frekuensi_tidak_masuk);
                $nilai_pokok = $this->calculate_nilai_pokok($tingkat_hukuman);
                $data = array("id_pegawai" => $request->id_pegawai, "kelompok" => $request->kelompok, "frekuensi" => $frekuensi_tidak_masuk, "tingkat_hukuman" => $tingkat_hukuman, "nilai_pokok" => $nilai_pokok);
                return $this->calucalte_final($data);
            } else {
                $tingkat_hukuman = $request->tingkat_hukuman;
                $nilai_pokok = $this->calculate_nilai_pokok($tingkat_hukuman);
                $data = array("id_pegawai" => $request->id_pegawai, "kelompok" => $request->kelompok, "tingkat_hukuman" => $tingkat_hukuman, "nilai_pokok" => $nilai_pokok, "frekuensi" => 0);
            }
        }
        return view('pemeriksa.pelanggaran_3_faktor_utama', ['data' => $data]);
    }

    public function create_calculate(Request $request)
    {
        if ($request->kelompok != "I") {
            $faktor_pembobotan_1 = $request->faktor_pembobotan_1;
            $faktor_pembobotan_2 = $request->faktor_pembobotan_2;
            $faktor_pembobotan_3 = $request->faktor_pembobotan_3;
            $faktor_total = array("faktor_1" => $faktor_pembobotan_1, "faktor_2" => $faktor_pembobotan_2, "faktor_3" => $faktor_pembobotan_3);
            if ($request->kelompok == "III") {
                $faktor_pembobotan_4 = $request->faktor_pembobotan_4;
                $faktor_total += array("faktor_4" => $faktor_pembobotan_4);
            } elseif ($request->kelompok == "IV") {
                $faktor_pembobotan_4 = $request->faktor_pembobotan_4;
                $faktor_pembobotan_5 = $request->faktor_pembobotan_5;
                $faktor_total += array("faktor_4" => $faktor_pembobotan_4, "faktor_5" => $faktor_pembobotan_5);
            }
            $faktor_total += array('tingkat_hukuman' => $request->tingkat_hukuman, 'kelompok' => $request->kelompok, 'id_pegawai' => $request->id_pegawai, 'frekuensi' => $request->frekuensi, 'nilai_pokok' => $request->nilai_pokok);
        }
        return $this->calucalte_final($faktor_total);
    }

    public function calculate_nilai_pokok($data)
    {
        if ($data == "Ringan") {
            return 0;
        } elseif ($data == "Sedang") {
            return 30;
        } else {
            return 60;
        }
    }

    public function calculate_tingkat_pelanggaran($frek)
    {
        if ($frek >= 1 && $frek <= 15) {
            return "Ringan";
        } elseif ($frek > 15 && $frek <= 30) {
            return "Sedang";
        } else {
            return "Berat";
        }
    }

    public function calucalte_final($data)
    {
//      nilai pokok
        $nilai_pokok = $data['nilai_pokok'];

//      nilai tambah
        if ($data['kelompok'] == "I") {
            $nilai_tambahan = $this->calculate_nilai_tambah($data['frekuensi']);
        } elseif ($data['kelompok'] != "I") {
            $faktor_pembobotan_1 = $data['faktor_1'];
            $faktor_pembobotan_2 = $data['faktor_2'];
            $faktor_pembobotan_3 = $data['faktor_3'];
            $faktor_total = array("faktor_1" => $faktor_pembobotan_1, "faktor_2" => $faktor_pembobotan_2, "faktor_3" => $faktor_pembobotan_3);
            if ($data['kelompok'] == "III") {
                $faktor_pembobotan_4 = $data['faktor_4'];
                $faktor_total += array("faktor_4" => $faktor_pembobotan_4);
            } elseif ($data['kelompok'] == "IV") {
                $faktor_pembobotan_4 = $data['faktor_4'];
                $faktor_pembobotan_5 = $data['faktor_5'];
                $faktor_total += array("faktor_4" => $faktor_pembobotan_4, "faktor_5" => $faktor_pembobotan_5);
            }
            $nilai_tambahan = $this->calculate_nilai_tambah_dengan_faktor($faktor_total, $data['tingkat_hukuman'], $data['kelompok']);
        }

//      nilai akhir
        $nilai_akhir = $nilai_pokok + $nilai_tambahan;
        $final_data = array('nilai_tambahan' => $nilai_tambahan, 'nilai_akhir' => $nilai_akhir);
        $final_data += $data;
        $nama_pegawai = Pegawai::get_nama_pegawai_by_id($final_data['id_pegawai']);
        $final_data += array('nama'=>$nama_pegawai[0]->nama);
        return view('pemeriksa.pelanggaran_4_kalkulasi', ['data' => $final_data]);
    }

    public function calculate_nilai_tambah($data)
    {
        if ($data == 5 || ($data >= 16 && $data <= 20) || ($data >= 31 && $data <= 35)) {
            return 10;
        } elseif (($data >= 6 && $data <= 10) || ($data >= 21 && $data <= 25) || ($data >= 36 && $data <= 40)) {
            return 20;
        } elseif (($data >= 11 && $data <= 15) || ($data >= 26 && $data <= 30) || ($data >= 41 && $data <= 45)){
            return 30;
        }elseif ($data >= 46 ){
            return 40;
        }
    }

    public function calculate_nilai_tambah_dengan_faktor($data, $tingkat_hukuman, $kelompok)
    {
        $total = 0;
        if ($tingkat_hukuman == "Berat") {
            foreach ($data as $x => $y) {
                $total += ($y * $this->get_calculated_berat($kelompok));
            }
        } else {
            foreach ($data as $x => $y) {
                $total += ($y * $this->get_calculate_ringan_sedang($kelompok));
            }
        }
        return $total;
    }

    public function get_calculate_ringan_sedang($data)
    {
        if ($data == "II") {
            return 10;
        } elseif ($data == "III") {
            return 7.5;
        } else {
            return 6;
        }
    }

    public function get_calculated_berat($data)
    {
        if ($data == "II") {
            return 16.7;
        } elseif ($data == "III") {
            return 12.5;
        } else {
            return 10;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $pelanggaran = new Pelanggaran();

        $nilai = new Nilai();

//        Pelanggaran
        $pelanggaran->tanggal_pencatatan = date("Y-m-d");
        $pelanggaran->kelompok_pelanggaran = $request->kelompok;
        $pelanggaran->id_pegawai = $request->id_pegawai;
        $pelanggaran->id_pemeriksa = 1;

        $pelanggaran->save();
        $id_pelanggaran = $pelanggaran->id_pelanggaran;

        $nilai->id_pelanggaran = $id_pelanggaran;
        $nilai->nilai_pokok = $request->nilai_pokok;
        $nilai->nilai_tambahan = $request->nilai_tambahan;
        $nilai->nilai_akhir = $request->nilai_akhir;
        $nilai->save();

        $index = 1;
        if (isset($request->faktor)){
            foreach (json_decode($request->faktor) as $item) {
                $faktor_utama = new FaktorPembobotanUtama();
                $faktor_utama->id_pelanggaran = $id_pelanggaran;
                switch ($index) {
                    case 1:
                        $faktor_utama->faktor_pembobotan = "I";
                        break;
                    case 2:
                        $faktor_utama->faktor_pembobotan = "II";
                        break;
                    case 3:
                        $faktor_utama->faktor_pembobotan = "III";
                        break;
                    case 4:
                        $faktor_utama->faktor_pembobotan = "IV";
                        break;
                    case 5:
                        $faktor_utama->faktor_pembobotan = "V";
                        break;
                }
                $faktor_utama->persentase_pembobotan = $item;
                $faktor_utama->save();
                $index++;
            }
        }

        return redirect(route('data_pelanggaran'));
    }

    /**
     * Display the specified resource.
     *
     * @param Pelanggaran $pelanggaran
     * @return Response
     */
    public function show($id_pelanggaran)
    {
        $pelanggaran = Pelanggaran::get_detail_data_pelanggaran($id_pelanggaran);
        return view('pemeriksa.detail_pelanggaran', ['data_pelanggaran' => $pelanggaran]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Pelanggaran $pelanggaran
     * @return Response
     */
    public function edit(Pelanggaran $pelanggaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Pelanggaran $pelanggaran
     * @return Response
     */
    public function update(Request $request, Pelanggaran $pelanggaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Pelanggaran $pelanggaran
     * @return Response
     */
    public function destroy($id_pelanggaran)
    {
        $pelanggaran = Pelanggaran::find($id_pelanggaran);
        $pelanggaran->delete();
        return redirect(route('data_pelanggaran'));
    }
}
