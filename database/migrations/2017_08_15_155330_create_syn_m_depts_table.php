<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSynMDeptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syn_m_dept', function (Blueprint $table) {
          $table->increments('id');
          $table->string('dept_code',45);
          $table->string('dept_name',300)->nullable();
          $table->string('div_code',45)->nullable();
          $table->enum('active', ['Y', 'N'])->default('Y')->nullable();
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
        Schema::dropIfExists('syn_m_dept');
    }
}
