<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnGroundVerificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('on_ground_verifications', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('third_party_id')->nullable();
            $table->integer('team_user_id')->nullable();
            $table->longText('address_details')->nullable();
            $table->longText('address_visit_findings')->nullable();
            $table->string('on_ground_verification_score')->nullable();
            $table->string('upload_picture')->nullable();
            $table->text('score_analysis')->nullable();
            $table->string('Type_of_risk')->nullable();
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
        Schema::dropIfExists('on_ground_verifications');
    }
}
