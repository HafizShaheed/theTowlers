<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCanadaCustomerInvoiceFromsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canada_customer_invoice_froms', function (Blueprint $table) {
            $table->id();
            $table->string('invioce_generator')->nullable();
            $table->string('commercial_invoice_id')->nullable();
            $table->string("table_name",50)->default('canada customer invoice')->nullable();

            $table->string('canada_customer_invoice')->nullable();
            $table->integer('team_user_id')->nullable();
            $table->string('vender_name')->nullable();
            $table->string('vender_address')->nullable();
            $table->string('vender_nom_et_adresse')->nullable();
            $table->string('date_of_direct_shipment_to_canada_1')->nullable();
            $table->string('date_of_direct_shipment_to_canada_2')->nullable();
            $table->string('consignee_name')->nullable();
            $table->string('consignee_address')->nullable();
            $table->string('consignee_nom_et_adresse')->nullable();
            $table->string('purchaser_name')->nullable();
            $table->string('purchaser_address')->nullable();
            $table->string('purchaser_nom_et_adresse')->nullable();
            $table->string('originator_name')->nullable();
            $table->string('originator_address')->nullable();
            $table->string('originator_nom_et_adresse')->nullable();
            $table->string('exporter_name')->nullable();
            $table->string('exporter_address')->nullable();
            $table->string('exporter_nom_et_adresse')->nullable();
            $table->string('transportation_place_of_direct_shipment_to_canada')->nullable();
            $table->string('country_of_origin_pays')->nullable();
            $table->string('conditions_of_sale_and_terms_of_payment')->nullable();
            $table->string('agency_ruling')->nullable();
            $table->string('total_weight_poids_total')->nullable();
            $table->string('net')->nullable();
            $table->string('gross_brut')->nullable();
            $table->string('invoice_total')->nullable();
            $table->string('status')->default(0)->nullable();

            $table->text('description_pecification_of_commodities')->nullable();
            for ($i = 1; $i <= 7; $i++) {
                $table->string('number_of_packages_nombre_de_coils_' . $i)->nullable();
                $table->string('quantity_' . $i)->nullable();
                $table->string('unit_price_' . $i)->nullable();
                $table->string('total_' . $i)->nullable();


            }


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
        Schema::dropIfExists('canada_customer_invoice_froms');
    }
}
