<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tb_datas', function (Blueprint $table) {
        $table->increments('id');
        $table->string('payroll_id',30)->unique();

        $table->integer('tgl_masuk')->nullable();
        $table->string('reason_in',200)->nullable();
        $table->integer('tgl_keluar')->nullable();
        $table->string('reason_out',200)->nullable();

        $table->string('telp1',50)->nullable();
        $table->string('telp2',50)->nullable();

        $table->string('no_npwp',50)->nullable();
        $table->integer('npwp_effectivedate')->nullable();
        $table->text('alamat_npwp')->nullable();

        // $table->string('npp_bpjs_ketenagakerjaan',45)->nullable();
        // $table->string('no_bpjs_ketenagakerjaan',30)->nullable();
        // $table->string('bulan_bpjs_ketenagakerjaan',10)->nullable();
        // $table->string('tahun_bpjs_ketenagakerjaan',10)->nullable();
        // $table->string('va_bpjs_kesehatan',45)->nullable();
        // $table->string('no_bpjs_kesehatan',30)->nullable();
        // $table->string('bulan_bpjs_kesehatan',10)->nullable();
        // $table->string('tahun_bpjs_kesehatan',10)->nullable();
        // $table->string('kode_faskes',45)->nullable();
        // $table->string('nama_faskes',200)->nullable();
        // $table->string('kode_faskes_dokter_gigi',45)->nullable();
        // $table->string('nama_faskes_dokter_gigi',200)->nullable();


        $table->string('nama_ibu_kandung',100)->nullable();
        $table->string('nama_bank',100)->nullable();
        $table->string('no_account_bank',50)->nullable();

        $table->string('pendidikan_terakhir',10)->nullable();
        $table->string('jurusan',45)->nullable();
        $table->string('nama_sekolah_terakhir',100)->nullable();
        $table->string('tahun_lulus',10)->nullable();
        $table->string('foto',300)->nullable();

        $table->text('keterangan')->nullable();
        $table->string('aktif',1)->default('Y')->nullable();
        $table->string('active_period',100)->nullable();

        $table->string('email',100)->nullable();

        $table->integer('agreement_expire')->nullable();

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
        Schema::dropIfExists('tb_datas');
    }
}
