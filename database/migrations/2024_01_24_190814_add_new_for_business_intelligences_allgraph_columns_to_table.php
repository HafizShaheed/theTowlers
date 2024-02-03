<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewForBusinessIntelligencesAllgraphColumnsToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('business_intelligences', function (Blueprint $table) {
            $table->string("operating_efficiency_BI_heading_graph")->nullable();

            // Inventory Turnover Ratio
            $table->string("inventory_turnover_BI_heading_graph")->nullable();
    
            // Days Sales in Inventory
            $table->string("days_sales_in_inventory_BI_heading_graph")->nullable();
    
               // Accounts Payable Turnover Ratio
            $table->string("accounts_payable_turnover_BI_heading_graph")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_intelligences', function (Blueprint $table) {
            //
        });
    }
}
