<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSysTransWarningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_trans_warnings', function (Blueprint $table) {
          $table->increments('id');
          $table->string('document_no',200)->nullable();
          $table->string('payroll_id',45);
          $table->string('active_period',50)->nullable();
          $table->string('action_type',200)->nullable();
          $table->string('action_description',200)->nullable();
          $table->text('remarks')->nullable();
          $table->integer('date')->nullable();
          $table->integer('date_incident')->nullable();
          $table->integer('due_date')->nullable();
          $table->string('attachment',255)->nullable();
          $table->string('status',200)->nullable();
          $table->dateTime('date_created')->nullable();
          $table->string('created_by',200)->nullable();

          $table->timestamps();

          // $table->foreign('payroll_id')->references('payroll_id')
          //  ->on('syn_m_karyawans')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sys_trans_warnings');
    }
}
