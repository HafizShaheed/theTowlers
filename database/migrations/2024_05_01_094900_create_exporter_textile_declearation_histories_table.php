<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExporterTextileDeclearationHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exporter_textile_declearation_histories', function (Blueprint $table) {
            $table->id();
            
            $table->string('exporter_textile_declearation_id')->nullable();
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
        Schema::dropIfExists('exporter_textile_declearation_histories');
    }
}
