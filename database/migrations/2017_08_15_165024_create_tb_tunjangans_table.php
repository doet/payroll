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
        Schema::create('tb_tunjangan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payroll_id',30);
            $table->string('jenis',20);
            $table->string('value',20)->nullable();
            $table->integer('berlaku',15);
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
        Schema::dropIfExists('tb_tunjangan');
    }
}
