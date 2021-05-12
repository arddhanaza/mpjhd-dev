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
        $user_id = DB::table('user')->select('id')->get();
        DB::table('pemeriksa')->insert([
            'id_user' => $user_id,
            'nama' => 'Admin'
        ]);
    }
}
