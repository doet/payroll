<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSynMKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syn_m_karyawans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payroll_id',30)->unique();
            $table->string('nama_karyawan',300);
            $table->string('title',50)->nullable();
            $table->string('dept_id',50)->nullable();
            $table->string('div_id',50)->nullable();
            $table->string('dir_id',50)->nullable();
            $table->string('grade',50)->nullable();
            $table->string('level',50)->nullable();
            $table->string('cost_sales_id',50)->nullable();
            $table->string('lokasi',50)->nullable();
            $table->string('point_of_hire',20)->nullable();
            $table->string('status',20)->nullable();
            $table->string('tempat_lahir',100)->nullable();

            $table->bigInteger('tgl_lahir')->nullable();
            $table->bigInteger('tgl_masuk')->nullable();
            $table->string('reason_in',200)->nullable();
            $table->bigInteger('tgl_keluar')->nullable();
            $table->string('reason_out',200)->nullable();
            $table->bigInteger('tgl_finish_contract')->nullable();
            $table->string('nama_customer',45)->nullable();
            $table->string('id_customer',35)->nullable();
            $table->bigInteger('id_customer_expiredate')->nullable();
            $table->string('id_driver',30)->nullable();
            $table->string('no_kk',30)->nullable();

            $table->string('no_ktp',30)->nullable();
            $table->bigInteger('no_ktp_expiredate')->nullable();

            $table->string('no_sim_a',30)->nullable();
            $table->bigInteger('no_sim_a_expiredate')->nullable();

            $table->string('no_sim_b1',45)->nullable();
            $table->bigInteger('no_sim_b1_expiredate')->nullable();

            $table->string('no_sim_b2_umum',45)->nullable();
            $table->bigInteger('no_sim_b2_umum_expiredate')->nullable();

            $table->string('no_sim_c',45)->nullable();
            $table->bigInteger('no_sim_c_expiredate')->nullable();

            $table->string('agama',30)->nullable();

            $table->string('marital_status',45)->nullable();
            $table->bigInteger('married_date')->nullable();

            $table->string('gol_darah',20)->nullable();
            $table->text('alamat_ktp')->nullable();
            $table->string('rt',10)->nullable();
            $table->string('rw',10)->nullable();
            $table->string('kota_ktp',45)->nullable();
            $table->string('id_kecamatan',45)->nullable();
            $table->string('nama_kecamatan',100)->nullable();
            $table->string('id_kelurahan',45)->nullable();
            $table->string('nama_kelurahan',100)->nullable();
            $table->string('kode_pos',10)->nullable();

            $table->text('alamat_ktp2')->nullable();
            $table->string('kota_ktp2',50)->nullable();
            $table->string('kode_pos2',10)->nullable();

            $table->string('telp1',50)->nullable();
            $table->string('telp2',50)->nullable();

            $table->string('no_npwp',50)->nullable();
            $table->bigInteger('npwp_effectivedate')->nullable();
            $table->text('alamat_npwp')->nullable();

            $table->string('npp_bpjs_ketenagakerjaan',45)->nullable();
            $table->string('no_bpjs_ketenagakerjaan',30)->nullable();
            $table->string('bulan_bpjs_ketenagakerjaan',10)->nullable();
            $table->string('tahun_bpjs_ketenagakerjaan',10)->nullable();

            $table->string('nama_ibu_kandung',100)->nullable();
            $table->string('nama_bank',100)->nullable();
            $table->string('no_account_bank',50)->nullable();

            $table->string('va_bpjs_kesehatan',45)->nullable();
            $table->string('no_bpjs_kesehatan',30)->nullable();
            $table->string('bulan_bpjs_kesehatan',10)->nullable();
            $table->string('tahun_bpjs_kesehatan',10)->nullable();
            $table->string('kode_faskes',45)->nullable();
            $table->string('nama_faskes',200)->nullable();
            $table->string('kode_faskes_dokter_gigi',45)->nullable();
            $table->string('nama_faskes_dokter_gigi',200)->nullable();
            $table->string('pendidikan_terakhir',10)->nullable();
            $table->string('jurusan',45)->nullable();
            $table->string('nama_sekolah_terakhir',100)->nullable();
            $table->string('tahun_lulus',10)->nullable();
            $table->string('foto',300)->nullable();

            $table->enum('jenis_kelamin',['MALE','FEMALE'])->default('MALE')->nullable();

            $table->text('keterangan')->nullable();
            $table->string('pic_hr',45)->nullable();
            $table->string('aktif',1)->default('Y')->nullable();
            $table->string('active_period',100)->nullable();

            $table->string('created_by',200)->nullable();
            $table->dateTime('date_created')->nullable();

            $table->string('updated_by',200)->nullable();
            $table->dateTime('last_updated')->nullable();

            $table->string('group_id',1)->nullable();
            $table->string('email',100)->nullable();
            $table->string('attachment',255)->nullable();
            $table->bigInteger('agreement_expire')->nullable();
            $table->enum('flag',['1', '0'])->default('0')->nullable();

            $table->timestamps();

            $table->foreign('title')->references('title_code')
              ->on('syn_m_titles')->onDelete('restrict');
            $table->foreign('dept_id')->references('dept_code')
              ->on('syn_m_depts')->onDelete('restrict');
            $table->foreign('div_id')->references('div_code')
              ->on('syn_m_divisions')->onDelete('restrict');
            $table->foreign('dir_id')->references('dir_code')
              ->on('syn_m_directorats')->onDelete('restrict');
            $table->foreign('grade')->references('grade_code')
              ->on('syn_m_grades')->onDelete('restrict');
            $table->foreign('level')->references('level_code')
              ->on('syn_m_levels')->onDelete('restrict');
            $table->foreign('cost_sales_id')->references('cost_sales_code')
              ->on('syn_m_cost_sales')->onDelete('restrict');
            $table->foreign('lokasi')->references('loc_code')
              ->on('syn_m_lokasis')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('syn_m_karyawans');
    }
}
