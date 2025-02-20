<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificateOriginChainasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificate_origin_chainas', function (Blueprint $table) {
            $table->id();
            $table->string('commercial_invoice_id')->nullable();
            $table->string("table_name",50)->default('Certificate Origin Chaina')->nullable();

            $table->string('exporter_name', 100)->nullable();
            $table->string('exporter_address', 255)->nullable();
            $table->string('Producer_name', 100)->nullable();
            $table->string('Producer_address', 255)->nullable();
            $table->string('consignee_name', 100)->nullable();
            $table->string('consignee_address', 255)->nullable();
            $table->string('ref_number', 100)->nullable();
            $table->string('issue_country', 100)->nullable();
            $table->string('transport_and_route', 255)->nullable();
            $table->string('produce_in_country', 100)->nullable();
            $table->string('importing_in_country', 100)->nullable();
            $table->boolean('yes_or_no_preferential_treatment')->default(0)->nullable();
        
            $table->string('marks_and_numbers_3' . $i, 255)->nullable();
            for ($i = 1; $i <= 15; $i++) {
                $table->string('item_number_' . $i, 100)->nullable();
                $table->string('numbers_and_kinds_of_packges_description_' . $i, 255)->nullable();
                $table->text('origin_criterion_' . $i)->nullable(); // Changed to TEXT
                $table->string('gross_weight_or_other_quantity_' . $i, 100)->nullable();
                $table->string('number_and_dates_of_inovoices_' . $i, 255)->nullable();
                $table->string('remarks_' . $i, 255)->nullable();
            }
        
            $table->string('status', 10)->default(0)->nullable();
            $table->string('invioce_generator', 100)->nullable();
            $table->string('team_user_id', 100)->nullable();
            $table->string('date', 100)->nullable();
            $table->string('place', 100)->nullable();
            $table->string('expoter_manager_name', 100)->nullable();
            $table->string('certificate_origin_chaina_invoices', 100)->nullable();
        
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
        Schema::dropIfExists('certificate_origin_chainas');
    }
}
