<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('third_party_id')->nullable();
            $table->integer('team_user_id')->nullable();
            for ($i=1; $i <=15 ; $i++) {
                $table->text('document_name_'.$i)->nullable();
                $table->text('document_number_'.$i)->nullable();
                $table->string('document_date_of_issuance_'.$i)->nullable();
                $table->string('document_date_of_expiry_'.$i)->nullable();
                $table->string('document_upload_file'.$i)->nullable();
            }
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
        Schema::dropIfExists('documents');
    }
}
