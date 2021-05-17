<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';

    public static function get_data_pegawai(){
        $data =  DB::table('pegawai')
            ->join('jabatan','pegawai.id_jabatan','=','jabatan.id_jabatan')
            ->get();
        return $data;
    }

    public static function get_nama_pegawai_by_id($id){
        return DB::table('pegawai')
            ->select('nama')
            ->where('id_pegawai','=',$id)
            ->get();
    }
}
