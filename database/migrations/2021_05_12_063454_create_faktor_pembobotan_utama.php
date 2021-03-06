<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaktorPembobotanUtama extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faktor_pembobotan_utama', function (Blueprint $table) {
            $table->bigIncrements('id_pembobotan');
            $table->foreignId('id_pelanggaran')
                ->constrained('pelanggaran','id_pelanggaran')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->enum('faktor_pembobotan',['I','II','III','IV','V']);
            $table->double('persentase_pembobotan');
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
        Schema::dropIfExists('faktor_pembobotan_utama');
    }
}
