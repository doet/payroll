<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPotongansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_potongan', function (Blueprint $table) {
          $table->increments('id');
          $table->string('payroll_id',30);
          $table->string('jenis',20);
          $table->string('value',20)->nullable();
          $table->integer('berlaku');
          $table->timestamps();
          
          $table->foreign('payroll_id')->references('payroll_id')
           ->on('syn_m_karyawan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_potongan');
    }
}
