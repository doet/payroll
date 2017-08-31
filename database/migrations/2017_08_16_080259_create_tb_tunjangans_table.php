<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbTunjangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_tunjangans', function (Blueprint $table) {
          $table->increments('id');
          $table->string('payroll_id',30);
          $table->string('jenis',20);
          $table->string('value',20)->nullable();
          $table->bigInteger('berlaku');
          $table->timestamps();

          $table->foreign('payroll_id')->references('payroll_id')
           ->on('syn_m_karyawans')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_tunjangans');
    }
}
