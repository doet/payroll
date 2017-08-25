<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSynMKeluargasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syn_m_keluarga', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_kk',45);
            $table->string('nama',100);
            $table->string('hubungan',50);
            $table->enum('jenis_kelamin',['MALE', 'FEMALE']);
            $table->string('tempat_lahir',45)->nullable();
            $table->date('tgl_lahir');
            $table->string('no_ktp',45);
            $table->string('pendidikan',100)->nullable();
            $table->string('pekerjaan',100)->nullable();
            $table->string('eligibility',50)->nullable();
            $table->string('no_bpjskesehatan',45)->nullable();
            $table->string('kode_klinik',100)->nullable();
            $table->string('nama_klinik',100)->nullable();
            $table->string('scan_bpjs_kes',300)->nullable();
            $table->string('scan_bpjs_tk',300)->nullable();
            $table->string('scan_asuransi_swasta',300)->nullable();
            $table->dateTime('date_created')->nullable();
            $table->string('created_by',200)->nullable();
            $table->dateTime('last_updated')->nullable();
            $table->string('updated_by',200)->nullable();
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
        Schema::dropIfExists('syn_m_keluarga');
    }
}
