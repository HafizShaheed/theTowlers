<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificateOriginComDecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificate_origin_com_decs', function (Blueprint $table) {
            $table->id();
            $table->string('exporter_name', 100)->nullable(); // Adjusted length
            $table->string('exporter_address', 255)->nullable(); // Adjusted length
            $table->string('exporter_country', 100)->nullable(); // Adjusted length
            $table->string('consignee_name', 100)->nullable(); // Adjusted length
            $table->string('consignee_address', 255)->nullable(); // Adjusted length
            $table->string('consignee_country', 100)->nullable(); // Adjusted length
            $table->string('ref_number', 100)->nullable(); // Adjusted length
            $table->string('exporter_membership_number', 100)->nullable(); // Adjusted length
            $table->string('transport_and_route', 255)->nullable(); // Adjusted length
        
            for ($i = 1; $i <= 10; $i++) {
                $table->string('item_number_' . $i, 100)->nullable(); // Adjusted length
                $table->string('marks_and_numbers_' . $i, 255)->nullable(); // Adjusted length
                $table->text('numbers_and_kinds_of_packges_description_' . $i)->nullable();
                $table->text('origin_criterion_' . $i)->nullable(); // Changed to TEXT
                $table->string('gross_weight_or_other_quantity_' . $i, 100)->nullable(); // Adjusted length
                $table->string('number_and_dates_of_inovoices_' . $i, 255)->nullable(); // Adjusted length
            }
        
            $table->string('status', 10)->default(0)->nullable(); // Adjusted length
            $table->string('invioce_generator', 100)->nullable(); // Adjusted length
            $table->string('team_user_id', 100)->nullable(); // Adjusted length
            $table->string('date', 100)->nullable(); // Adjusted length
            $table->string('place', 100)->nullable(); // Adjusted length
            $table->string('certificate_origin_com_decs_invoices', 100)->nullable(); // Adjusted length
        
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
        Schema::dropIfExists('certificate_origin_com_decs');
    }
}
