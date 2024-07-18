<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackingListHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packing_list_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('packing_list_id')->nullable();
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
        Schema::dropIfExists('packing_list_histories');
    }
}
