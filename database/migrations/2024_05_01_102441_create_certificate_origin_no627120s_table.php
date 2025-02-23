<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificateOriginNo627120sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificate_origin_no627120s', function (Blueprint $table) {
            $table->id();
            $table->string('commercial_invoice_id')->nullable();
            $table->string("table_name",50)->default('Certificate Origin No 627120s')->nullable();
            $table->string('exporter_name')->nullable();
            $table->string('exporter_address')->nullable();
            $table->string('exporter_country')->nullable();
            $table->string('consignee_name')->nullable();
            $table->string('consignee_address')->nullable();
            $table->string('consignee_country')->nullable();
            $table->string('ref_number')->nullable();
            $table->string('exporter_membership_number')->nullable();
            $table->string('particular_of_transport')->nullable();
            for ($i = 1; $i <= 3; $i++) {
                $table->string('marks_and_numbers_' . $i)->nullable();
                $table->string('numbers_and_kinds_of_packges' . $i)->nullable();
            }

            for ($i = 1; $i <= 15; $i++) {
            
                $table->text('description_of_goods_' . $i,255)->nullable(); // Changed to TEXT
                $table->text('gross_weight_or_other_quantity_' . $i,255)->nullable();
                $table->text('county_of_origin_' . $i,255)->nullable();
              
            }
            $table->string('status')->default(0)->nullable();
            $table->string('invioce_generator')->nullable();
            $table->string('team_user_id')->nullable();
            $table->string('date')->nullable();
            $table->string('place')->nullable();
            $table->string('certificate_origin_no627120_invoices')->nullable();
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
        Schema::dropIfExists('certificate_origin_no627120s');
    }
}
