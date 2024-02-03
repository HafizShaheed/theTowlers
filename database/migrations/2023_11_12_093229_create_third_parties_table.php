<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThirdPartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('third_parties', function (Blueprint $table) {
            $table->id();
            $table->string('third_party_name')->nullable();
            $table->string('third_party_email')->unique()->nullable();
            $table->string('third_party_phone')->nullable();

            $table->integer('user_id')->nullable();
            $table->text('third_party_address')->nullable();
            $table->integer('department_id')->nullable();
            $table->text('third_party_pos')->nullable();
            $table->integer('zone_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->string('third_party_score')->nullable();
            $table->integer('status')->default(0)->nullable();




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
        Schema::dropIfExists('third_parties');
    }
}
