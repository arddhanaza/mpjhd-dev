<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemeriksaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = DB::table('user')->select('id')->where('username','=','admin')->get();
        DB::table('pemeriksa')->insert([
            'id_user' => $user_id[0]->id_user,
            'nama' => 'Admin'
        ]);
    }
}
