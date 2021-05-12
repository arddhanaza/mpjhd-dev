<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelanggaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggaran', function (Blueprint $table) {
            $table->bigIncrements('id_pelanggaran');
            $table->date('tanggal_pencatatan');
            $table->enum('kelompok_pelanggaran',['I','II','III','IV','V']);
            $table->foreignId('id_pegawai')
                ->constrained('pegawai')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('id_pemeriksa')
                ->constrained('pemeriksa')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelanggaran');
    }
}
