<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPkk2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pkk2s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payroll_id',30);
            //$table->integer('pkk1s_id')->unsigned()->nullable();
            $table->string('nama',300)->nullable();
            $table->string('hubungan',50)->nullable();
            $table->enum('jenis_kelamin', ['MALE', 'FEMALE'])->nullable();
            $table->string('tempat_lahir',100)->nullable();
            $table->integer('tgl_lahir')->nullable();
            $table->string('agama',30)->nullable();
            $table->string('gol_darah',20)->nullable();

            $table->string('no_ktp',50)->nullable();
            $table->string('no_ktp_expiredate',50)->nullable();
            $table->string('pendidikan_terakhir',10)->nullable();

            $table->string('pekerjaan',100)->nullable();
            $table->string('eligibility',50)->nullable();

            $table->string('va_bpjs_kesehatan',45)->nullable();
            $table->string('no_bpjs_kesehatan',30)->nullable();
            $table->string('bulan_bpjs_kesehatan',10)->nullable();
            $table->string('tahun_bpjs_kesehatan',10)->nullable();

            $table->string('no_bpjskesehatan',300)->nullable();
            $table->string('scan_bpjs_kes',300)->nullable();
            $table->string('scan_bpjs_tk',300)->nullable();
            $table->string('scan_asuransi_swasta',300)->nullable();

            $table->timestamps();

            $table->foreign('payroll_id')->references('payroll_id')
             ->on('tb_karyawans')->onDelete('restrict');

            // $table->foreign('pkk1s_id')->references('id')
            //   ->on('tb_pkk1s')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pkk2s');
    }
}
