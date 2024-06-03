<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommercialInvoiceHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commercial_invoice_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('commercial_invoice_id')->nullable();
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
        Schema::dropIfExists('commercial_invoice_histories');
    }
}
