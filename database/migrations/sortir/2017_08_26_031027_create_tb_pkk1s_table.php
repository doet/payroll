<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPkk1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pkk1s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payroll_id',30)->unique();
            //$table->string('no_kk',300)->unique()->nullable();
            $table->string('no_kk',300)->nullable();
            $table->text('alamat_ktp')->nullable();
            $table->string('rt',10)->nullable();
            $table->string('rw',10)->nullable();
            $table->string('kota_ktp',45)->nullable();
            $table->string('id_kecamatan',45)->nullable();
            $table->string('nama_kecamatan',100)->nullable();
            $table->string('id_kelurahan',45)->nullable();
            $table->string('nama_kelurahan',100)->nullable();
            $table->string('kode_pos',10)->nullable();

            $table->timestamps();
            
            $table->foreign('payroll_id')->references('payroll_id')
             ->on('tb_karyawans')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pkk1s');
    }
}
