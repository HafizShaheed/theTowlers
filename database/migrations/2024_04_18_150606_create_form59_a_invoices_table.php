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
        $table->text('exporter')->nullable();
        $table->string('status_of_seller')->nullable();
        $table->string('delete_terms_inapplicable')->nullable();
        $table->string('manufacturer')->nullable();
        $table->string('grower')->nullable();
        $table->string('producer')->nullable();
        $table->string('supplier')->nullable();
        $table->text('sold_to')->nullable();
        $table->string('country_of_Origin')->nullable();
        $table->string('ship_airline_etc')->nullable();
        $table->string('sea_airport_of_loading')->nullable();
        $table->string('final_destination_of_goods')->nullable();

        for ($i = 1; $i <= 10; $i++) {
            $table->string('marks_and_numbers_' . $i)->nullable();
            $table->string('Quantity_' . $i)->nullable();
            $table->text('description_of_goods_' . $i)->nullable(); // Changed to TEXT
            $table->string('including_any_discounts_' . $i)->nullable();
            $table->string('Current_domestic_value_currency_of_exporting_' . $i)->nullable();
            $table->string('amount_' . $i)->nullable();
        }

        $table->string('if_amount_has_been_inciuded_in_the_current_domestic_value')->nullable();
        $table->string('drawback_or_remission_of_duty')->nullable();

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
