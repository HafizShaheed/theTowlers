<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMissingColumnToTableUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('certificate_origin_com_dec_form_ips', function (Blueprint $table) {
            $table->string('departture_dae')->nullable();
            $table->string('vessel_name_ip')->nullable();
            $table->string('port_of_loading')->nullable();
            $table->string('port_of_discharge')->nullable();
          

        });

        Schema::table('canada_customer_invoice_froms', function (Blueprint $table) {
            $table->string('country_of_transhipment')->nullable();
            $table->string('currency_of_transhipment')->nullable();
            $table->boolean('yes_or_no_If_any_of_fields_1_to_17_are_included')->default(0)->nullable();
            $table->boolean('yes_or_no_If_any_of_fields_23_to_35_are_not_applicable')->default(0)->nullable();
            $table->string('canada_net')->nullable();
            $table->string('canada_gross')->nullable();
            $table->string('23_agency_if_included_in_field_17_indicate')->nullable();
            $table->string('23_agency_transportation_charges')->nullable();
            $table->string('23_agency_costs_for_contruction')->nullable();
            $table->string('23_agency_exporting_packing')->nullable();
            $table->string('24_agency_if_included_in_field_17_indicate')->nullable();
            $table->string('24_agency_transportation_charges')->nullable();
            $table->string('24_agency_costs_for_contruction')->nullable();
            $table->string('24_agency_exporting_packing')->nullable();
            $table->string('25_agency_if_included_in_field_17_indicate')->nullable();
            $table->boolean('yes_or_no_25_agency_transportation_charges')->default(0)->nullable();
            $table->boolean('yes_or_no_25_agency_costs_for_contruction')->default(0)->nullable();
        });
    

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('certificate_origin_com_dec_form_ips', function (Blueprint $table) {
            $table->dropColumn('departture_dae');
            $table->dropColumn('vessel_name_ip');
            $table->dropColumn('port_of_loading');
            $table->dropColumn('port_of_discharge');

        });
        Schema::table('canada_customer_invoice_froms', function (Blueprint $table) {
            $table->dropColumn('country_of_transhipment');
            $table->dropColumn('currency_of_transhipment');
            $table->dropColumn('yes_or_no_If_any_of_fields_1_to_17_are_included');
            $table->dropColumn('yes_or_no_If_any_of_fields_23_to_35_are_not_applicable');
            $table->dropColumn('canada_net');
            $table->dropColumn('canada_gross');
            $table->dropColumn('23_agency_if_included_in_field_17_indicate');
            $table->dropColumn('23_agency_transportation_charges');
            $table->dropColumn('23_agency_costs_for_contruction');
            $table->dropColumn('23_agency_exporting_packing');
            $table->dropColumn('24_agency_if_included_in_field_17_indicate');
            $table->dropColumn('24_agency_transportation_charges');
            $table->dropColumn('24_agency_costs_for_contruction');
            $table->dropColumn('24_agency_exporting_packing');
            $table->dropColumn('25_agency_if_included_in_field_17_indicate');
            $table->dropColumn('yes_or_no_25_agency_transportation_charges');
            $table->dropColumn('yes_or_no_25_agency_costs_for_contruction');
        });

    }
}
