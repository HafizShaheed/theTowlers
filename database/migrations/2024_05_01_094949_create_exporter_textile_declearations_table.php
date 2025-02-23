<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExporterTextileDeclearationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('exporter_textile_declearations', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('commercial_invoice_id')->nullable();
    //         $table->string("table_name",50)->default('Exporter Textile Declearations')->nullable();

    //         for ($i = 1; $i <= 12; $i++) {
    //             $table->string('invoice_number_' . $i,255)->nullable();
    //             $table->string('b_l_number_' .$i,255)->nullable();
    //             $table->string('quantity_' . $i,100)->nullable();
    //             $table->text('description_and_procedure_' . $i,4000)->nullable(); // Changed to TEXT
    //             $table->text('marks_or_identification_number' . $i,255)->nullable();
    //             $table->string('country_of_origin_' . $i,255)->nullable();
    //         }
    //         $table->string('date')->nullable();
    //         $table->string('declared')->nullable();
    //         $table->string('title')->nullable();

    //         $table->string('status')->default(0)->nullable();
    //         $table->string('invioce_generator')->nullable();
    //         $table->string('team_user_id')->nullable();
    //         $table->string('exporter_textile_declearation_invoices')->nullable();


    //         $table->timestamps();
    //     });
    // }

    public function up()
    {
        Schema::create('exporter_textile_declearations', function (Blueprint $table) {
            $table->id();
            $table->string('commercial_invoice_id')->nullable();
            $table->string('table_name', 50)->default('Exporter Textile Declearations')->nullable();

            for ($i = 1; $i <= 12; $i++) {
                $table->text('invoice_number_' . $i,255)->nullable();
                $table->text('b_l_number_' . $i,255)->nullable();
                $table->text('quantity_' . $i,255)->nullable();
                $table->text('description_and_procedure_' . $i,255)->nullable(); // Changed to TEXT
                $table->text('marks_or_identification_number_' . $i,255)->nullable(); // Changed to TEXT
                $table->text('country_of_origin_' . $i,255)->nullable();
            }

            $table->string('date')->nullable();
            $table->string('declared')->nullable();
            $table->string('title')->nullable();
            $table->string('status')->default('0')->nullable();
            $table->string('invioce_generator')->nullable();
            $table->string('team_user_id')->nullable();
            $table->string('exporter_textile_declearation_invoices')->nullable();
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
        Schema::dropIfExists('exporter_textile_declearations');
    }
}
