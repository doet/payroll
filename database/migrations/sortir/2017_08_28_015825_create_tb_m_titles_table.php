<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_m_titles', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title_code',6)->unique();
          $table->string('title',255)->nullable();
          $table->longText('job_desc')->nullable();
          $table->string('active',1)->default('Y')->nullable();
          $table->string('attachment',255)->nullable();

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
        Schema::dropIfExists('tb_m_titles');
    }
}
