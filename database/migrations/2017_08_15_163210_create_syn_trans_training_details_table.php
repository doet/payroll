<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSynTransTrainingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syn_trans_training_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payroll_id',45);
            $table->string('id_training',200)->nullable();
            $table->string('attachment',200)->nullable();
            $table->bigInteger('tanggal_mulai')->nullable();
            $table->bigInteger('tanggal_akhir')->nullable();
            $table->string('status',50)->nullable();
            $table->string('skor_evaluasi_efektifitas',20)->nullable();
            $table->dateTime('date_created')->nullable();
            $table->string('created_by',100)->nullable();

            $table->timestamps();

            $table->foreign('payroll_id')->references('payroll_id')
             ->on('syn_m_karyawans')->onDelete('restrict');
            $table->foreign('id_training')->references('id')
              ->on('syn_trans_training_headers')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('syn_trans_training_details');
    }
}
