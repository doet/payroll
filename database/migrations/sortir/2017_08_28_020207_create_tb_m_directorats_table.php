<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMDirectoratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_m_directorats', function (Blueprint $table) {
          $table->increments('id');
          $table->string('dir_code',45)->unique();
          $table->string('dir_name',300)->nullable();
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
        Schema::dropIfExists('tb_m_directorats');
    }
}
