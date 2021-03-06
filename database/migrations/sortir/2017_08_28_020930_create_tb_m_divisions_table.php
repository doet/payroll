<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_m_divisions', function (Blueprint $table) {
          $table->increments('id');
          $table->string('div_code',45)->unique();
          $table->string('div_name',300)->nullable();
          $table->string('dir_code',45)->nullable();
          $table->enum('active', ['Y', 'N'])->default('Y')->nullable();
          $table->timestamps();

          $table->foreign('dir_code')->references('dir_code')
           ->on('tb_m_directorats')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_m_divisions');
    }
}
