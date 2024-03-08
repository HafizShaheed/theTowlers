<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCanadaInvoiceHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canada_invoice_histories', function (Blueprint $table) {
            $table->id();
            $table->string('canada_customer_invoice_from_id')->nullable();
            $table->string('editer_id')->nullable();
            $table->string('editer_name')->nullable();
            $table->string('edited_at')->nullable();
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
        Schema::dropIfExists('canada_invoice_histories');
    }
}
