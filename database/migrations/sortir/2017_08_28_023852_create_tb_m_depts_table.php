<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMDeptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_m_depts', function (Blueprint $table) {
          $table->increments('id');
          $table->string('dept_code',45)->unique();
          $table->string('dept_name',300)->nullable();
          $table->string('div_code',45)->nullable();
          $table->enum('active', ['Y', 'N'])->default('Y')->nullable();
          $table->timestamps();

          $table->foreign('div_code')->references('div_code')
           ->on('tb_m_divisions')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_m_depts');
    }
}
