<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourtChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('court_checks', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('third_party_id')->nullable();
            $table->integer('team_user_id')->nullable();

            $this->directorCourtFields($table, 1);
            $this->directorCourtFields($table, 2);
            $this->directorCourtFields($table, 3);
            $this->directorCourtFields($table, 4);
            $this->directorCourtFields($table, 5);


            $this->companyCourtFields($table, 1);
            $this->companyCourtFields($table, 2);
            $this->companyCourtFields($table, 3);
            $this->companyCourtFields($table, 4);
            $this->companyCourtFields($table, 5);
            $table->integer('legal_score')->nullable();
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
        Schema::dropIfExists('court_checks');
    }


    private function directorCourtFields(Blueprint $table, $index)
    {
        $table->string("director_name_$index")->nullable();
        $table->string("director_jurisdiction_$index")->nullable();
        $table->string("director_record_$index")->nullable();
        $table->string("director_subject_matter_$index")->nullable();
    }

    private function companyCourtFields(Blueprint $table, $index)
    {
        $table->string("company_jurisdiction_$index")->nullable();
        $table->string("company_record_$index")->nullable();
        $table->string("company_subject_matter_$index")->nullable();
    }
}
