<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSynTransTrainingHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syn_trans_training_headers', function (Blueprint $table) {
          $table->string('id')->unique()->nullable();
          $table->string('jenis_training',45)->nullable();
          $table->string('nama_training',200)->nullable();
          $table->integer('tanggal_mulai')->nullable();
          $table->integer('tanggal_akhir')->nullable();
          $table->string('trainer',200)->nullable();
          $table->integer('tanggal_rencana')->nullable();
          $table->string('skor_evaluasi',20)->nullable();
          $table->dateTime('date_created')->nullable();
          $table->string('created_by',200)->nullable();

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
        Schema::dropIfExists('syn_trans_training_headers');
    }
}
