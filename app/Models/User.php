<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    use HasFactory;
    protected $table = 'user';
    protected $primaryKey = 'id_user';

    public static function is_existed($username)
    {
        $data = DB::table('user')
            ->where('username', '=', $username)
            ->get();
        if (!$data->isEmpty()) {
            return true;
        } else {
            return false;
        }
    }

    public static function is_validated($username, $password)
    {
        $data = DB::table('user')
            ->where([
                ['username', $username],
                ['password', md5($password)],
            ])
            ->get();
        if (!$data->isEmpty()) {
            return true;
        } else {
            return false;
        }
    }

    public static function get_user($username)
    {
        $data = DB::table('user')
            ->select('id_user', 'username')
            ->where('username', '=', $username)
            ->get();
        if (!self::is_pemeriksa($data[0]->id_user)->isEmpty()) {
            foreach (self::is_pemeriksa($data[0]->id_user)[0] as $item => $value) {
                $data[0]->$item = $value;
            }
            $data[0]->status = "Pemeriksa";
        } else {
            foreach (self::is_pegawai($data[0]->id_user)[0] as $item => $value) {
                $data[0]->$item = $value;
            }
            $data[0]->status = "Pegawai";
        }
        return $data;

    }

    public static function is_pemeriksa($id_user)
    {
        return DB::table('pemeriksa')
            ->select('id_pemeriksa', 'nama')
            ->where('id_user', '=', $id_user)
            ->get();
    }

    public static function is_pegawai($id_user)
    {
        return DB::table('pegawai')
            ->select('id_pegawai', 'nama')
            ->where('id_user', '=', $id_user)
            ->get();
    }
}
