<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSynMCostSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('syn_m_cost_sales', function (Blueprint $table) {
          $table->string('cost_sales_code',5);
          $table->string('cost_sales',255)->nullable();
          $table->string('dept_code')->nullable();
          $table->string('eligible_overtime',1)->default('N')->nullable();
          $table->string('eligible_tonase',1)->default('Y')->nullable();
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
        Schema::dropIfExists('syn_m_cost_sales');
    }
}
