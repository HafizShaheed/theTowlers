<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForm59AInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
{
    Schema::create('form59_a_invoices', function (Blueprint $table) {
        $table->id();
        $table->string('exporter',100)->nullable();
        $table->string('status_of_seller',100)->nullable();
        $table->string('delete_terms_inapplicable',100)->nullable();
        $table->string('manufacturer',100)->nullable();
        $table->string('grower',100)->nullable();
        $table->string('producer',100)->nullable();
        $table->string('supplier',100)->nullable();
        $table->string('sold_to',100)->nullable();
        $table->string('country_of_Origin',100)->nullable();
        $table->string('ship_airline_etc',100)->nullable();
        $table->string('sea_airport_of_loading',100)->nullable();
        $table->string('final_destination_of_goods',255)->nullable();
    
        for ($i = 1; $i <= 10; $i++) {
            $table->string('marks_and_numbers_' . $i,100)->nullable();
            $table->string('quantity_' . $i,50)->nullable();
            $table->string('description_of_goods_' . $i,255)->nullable();
            $table->string('including_any_discounts_' . $i,50)->nullable();
            $table->string('current_domestic_value_currency_of_exporting_' . $i,100)->nullable();
            $table->string('amount_' . $i)->nullable();
        }
    
        $table->string('if_amount_has_been_inciuded_in_the_current_domestic_value',100)->nullable();
        $table->string('drawback_or_remission_of_duty',100)->nullable();
        $table->string('status',11)->default(0)->nullable();
        $table->string('invioce_generator',100)->nullable();
        $table->string('team_user_id',11)->nullable();
        $table->string('form59_a_invoices',100)->nullable();
    
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
        Schema::dropIfExists('form59_a_invoices');
    }
}
