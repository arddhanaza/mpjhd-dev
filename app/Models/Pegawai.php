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
}
