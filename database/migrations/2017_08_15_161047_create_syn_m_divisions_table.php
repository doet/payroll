<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSynMDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('syn_m_division', function (Blueprint $table) {
        $table->increments('id');
        $table->string('div_code',45)->nullable();
        $table->string('div_name',300)->nullable();
        $table->string('dir_code',45)->nullable();
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
        Schema::dropIfExists('syn_m_division');
    }
}
