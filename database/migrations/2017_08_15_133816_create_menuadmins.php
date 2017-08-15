<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuadmins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menuadmins', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('parent_id')->default('0');
          $table->string('label',50)->default('');
          $table->string('part',100)->default('#');
          $table->string('icon',25);
          $table->string('akses',50);
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
        Schema::dropIfExists('menuadmins');
    }
}
