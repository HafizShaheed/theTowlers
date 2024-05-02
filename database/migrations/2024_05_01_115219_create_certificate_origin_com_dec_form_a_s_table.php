<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificateOriginComDecFormASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificate_origin_com_dec_form_a_s', function (Blueprint $table) {
            $table->id();
            $table->string('exporter_name')->nullable();
            $table->string('exporter_address')->nullable();
            $table->string('exporter_country')->nullable();
            $table->string('consignee_country')->nullable();
            $table->string('consignee_name')->nullable();
            $table->string('consignee_address')->nullable();
            $table->string('ref_number')->nullable();
            $table->string('issue_country')->nullable();
            $table->string('transport_and_route')->nullable();
            $table->string('produce_in_country')->nullable();
            $table->string('importing_in_country')->nullable();
            $table->text('yes_or_no_preferential_treatment')->nullable()->default(0);
            for ($i = 1; $i <= 10; $i++) {
                $table->string('item_number_' . $i)->nullable();
                $table->string('marks_and_numbers_' . $i)->nullable();
                $table->string('numbers_and_kinds_of_packges_description_' . $i)->nullable();
                $table->string('origin_criterion_' . $i)->nullable(); // Changed to TEXT
                $table->string('gross_weight_or_other_quantity_' . $i)->nullable();
                $table->string('number_and_dates_of_inovoices_' . $i)->nullable();
              
            }
            $table->string('status')->default(0)->nullable();
            $table->string('invioce_generator')->nullable();
            $table->string('team_user_id')->nullable();
            $table->string('date')->nullable();
            $table->string('place')->nullable();
            $table->string('certificate_origin_com_decs_from_ip_invoices')->nullable();
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
        Schema::dropIfExists('certificate_origin_com_dec_form_a_s');
    }
}
