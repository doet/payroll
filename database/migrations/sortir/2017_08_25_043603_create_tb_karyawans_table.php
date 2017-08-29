<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tb_karyawans', function (Blueprint $table) {
        $table->increments('id');
        $table->string('payroll_id',30)->unique();

        $table->string('title',50)->nullable();
        $table->string('dept_id',50)->nullable();
        $table->string('div_id',50)->nullable();
        $table->string('dir_id',50)->nullable();
        $table->string('grade',50)->nullable();
        $table->string('level',50)->nullable();
        $table->string('cost_sales_id',50)->nullable();
        $table->string('lokasi',50)->nullable();
        $table->string('point_of_hire',50)->nullable();
        $table->string('status',50)->nullable();

        $table->integer('tgl_masuk')->nullable();
        $table->string('reason_in',200)->nullable();
        $table->integer('tgl_keluar')->nullable();
        $table->string('reason_out',200)->nullable();

        $table->string('marital_status',50)->nullable();
        $table->string('married_date',50)->nullable();

        $table->string('telp1',50)->nullable();
        $table->string('telp2',50)->nullable();

        $table->string('no_npwp',50)->nullable();
        $table->integer('npwp_effectivedate')->nullable();
        $table->text('alamat_npwp')->nullable();

        $table->string('npp_bpjs_ketenagakerjaan',45)->nullable();
        $table->string('no_bpjs_ketenagakerjaan',30)->nullable();
        $table->string('bulan_bpjs_ketenagakerjaan',10)->nullable();
        $table->string('tahun_bpjs_ketenagakerjaan',10)->nullable();
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

        //$table->string('pendidikan_terakhir',10)->nullable();
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

        $table->foreign('title')->references('title_code')
          ->on('tb_m_titles')->onDelete('restrict');
        $table->foreign('dept_id')->references('dept_code')
          ->on('tb_m_depts')->onDelete('restrict');
        $table->foreign('div_id')->references('div_code')
          ->on('tb_m_divisions')->onDelete('restrict');
        $table->foreign('dir_id')->references('dir_code')
          ->on('tb_m_directorats')->onDelete('restrict');
        $table->foreign('grade')->references('grade_code')
          ->on('tb_m_grades')->onDelete('restrict');
        $table->foreign('level')->references('level_code')
          ->on('tb_m_levels')->onDelete('restrict');
        $table->foreign('cost_sales_id')->references('cost_sales_code')
          ->on('tb_m_cost_sales')->onDelete('restrict');
        $table->foreign('lokasi')->references('loc_code')
          ->on('tb_m_lokasis')->onDelete('restrict');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_karyawans');
    }
}
