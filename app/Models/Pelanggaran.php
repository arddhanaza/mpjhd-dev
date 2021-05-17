<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pelanggaran extends Model
{
    use HasFactory;
    protected $table = 'pelanggaran';
    protected $primaryKey = 'id_pelanggaran';

    public static function get_data_pelanggarn(){
        $data =  DB::table('pelanggaran')
            ->select('pelanggaran.id_pelanggaran', 'pemeriksa.nama as nama_pemeriksa', 'pegawai.nama as nama_pegawai', 'tanggal_pencatatan', 'kelompok_pelanggaran', 'nilai_akhir','pelanggaran.created_at')
            ->join('pemeriksa','pelanggaran.id_pemeriksa','=','pemeriksa.id_pemeriksa')
            ->join('pegawai','pelanggaran.id_pegawai','=','pegawai.id_pegawai')
            ->join('nilai','pelanggaran.id_pelanggaran','=','nilai.id_pelanggaran')
            ->orderBy('pelanggaran.created_at','desc')
            ->get();
        for ($i = 0;$i < count($data);$i++) {
            $jenis_hukuman = self::get_jenis_hukuman($data[$i]->nilai_akhir);
            $data[$i]->jenis_hukuman = $jenis_hukuman[1];
            $data[$i]->kategori_komplin = $jenis_hukuman[0];
            if ($data[$i]->kelompok_pelanggaran != 'I') {
                $faktor = self::get_faktor_utama($data[0]->id_pelanggaran);
                for ($j = 0; $j < count($faktor); $j++) {
                    $data['0']->faktor_pembobotan[$j] = $faktor[$j]->faktor_pembobotan;
                    $data['0']->persentase_pembobotan[$j] = $faktor[$j]->persentase_pembobotan;
                }
            }
        }
        return ($data);
    }

    public static function get_detail_data_pelanggaran($id)
    {
        $data = self::get_data_pelanggarn()
            ->where('id_pelanggaran', '=', $id);
        return $data;
    }

    public static function get_faktor_utama($id_pelanggaran)
    {
        return DB::table('faktor_pembobotan_utama')
            ->select('faktor_pembobotan', 'persentase_pembobotan')
            ->where('id_pelanggaran', '=', $id_pelanggaran)
            ->get();
    }


    public static function get_jenis_hukuman($nilai_akhir)
    {
        $jenis_hukuman = array('Ringan-1' => 'Teguran Lisan',
            'Ringan-2' => 'Teguran Tertulis',
            'Ringan-3' => 'Pernyataan tidak puas secara tertulis',
            'Sedang-1' => 'Penundaan kenaikan gaji berkala selama 1 tahun ',
            'Sedang-2' => 'Penundaan kenaikan pangkat selama 1 tahun',
            'Sedang-3' => 'Penurunan pangkat pada pangkat yang setingkat lebih rendah selama 1 (satu) tahun',
            'Berat-1' => 'Penurunan pangkat pada pangkat yang setingkat lebih rendah selama 3 (tiga) tahun',
            'Berat-2'=>'Pemindahan dalam rangka penurunan jabatan setingkat lebih rendah',
            'Berat-3'=>'Pembebasan dari jabatan ',
            'Berat-4'=>'Pemberhentian dengan hormat tidak atas permintaan sendiri sebagai PNS',
            'Berat-5'=>'Pemberhentian tidak dengan hormat sebagai PNS');
        if ($nilai_akhir >= 0 && $nilai_akhir <=10){
            $hukuman = array('Ringan-1',$jenis_hukuman['Ringan-1']);
        }elseif ($nilai_akhir > 10 && $nilai_akhir <=20){
            $hukuman = array('Ringan-2',$jenis_hukuman['Ringan-2']);
        }elseif ($nilai_akhir > 20 && $nilai_akhir <=30){
            $hukuman = array('Ringan-3',$jenis_hukuman['Ringan-3']);
        }elseif ($nilai_akhir > 30 && $nilai_akhir <=40){
            $hukuman = array('Sedang-1',$jenis_hukuman['Sedang-1']);
        }elseif ($nilai_akhir > 40 && $nilai_akhir <=50){
            $hukuman = array('Sedang-2',$jenis_hukuman['Sedang-2']);
        }elseif ($nilai_akhir > 50 && $nilai_akhir <=60){
            $hukuman = array('Sedang-3',$jenis_hukuman['Sedang-3']);
        }elseif ($nilai_akhir > 60 && $nilai_akhir <=70){
            $hukuman = array('Berat-1',$jenis_hukuman['Berat-1']);
        }elseif ($nilai_akhir > 70 && $nilai_akhir <=80){
            $hukuman = array('Berat-2',$jenis_hukuman['Berat-2']);
        }elseif ($nilai_akhir > 80 && $nilai_akhir <=90){
            $hukuman = array('Berat-3',$jenis_hukuman['Berat-3']);
        }elseif ($nilai_akhir > 90 && $nilai_akhir <=100){
            $hukuman = array('Berat-4',$jenis_hukuman['Berat-4']);
        }else{
            $hukuman = array('Berat-5',$jenis_hukuman['Berat-5']);
        }
        return $hukuman;
    }
}
