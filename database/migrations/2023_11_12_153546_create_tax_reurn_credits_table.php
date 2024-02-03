<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxReurnCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_reurn_credits', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('third_party_id')->nullable();
            $table->integer('team_user_id')->nullable();
            $table->text('score_analysis')->nullable();
            $table->string('Type_of_risk')->nullable();
            $table->integer('status')->default(0)->nullable();

            $table->string('tax_fy1')->nullable();
            $table->string('tax_fy2')->nullable();
            $table->string('tax_fy3')->nullable();
            $table->string('tax_fy4')->nullable();
            $table->string('tax_fy5')->nullable();

            $this->addTaxFields($table, 1);
            $this->addTaxFields($table, 2);
            $this->addTaxFields($table, 3);
            $this->addTaxFields($table, 4);
            $table->string('overall_credit_history_score')->nullable();
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
        Schema::dropIfExists('tax_reurn_credits');
    }

    private function addTaxFields(Blueprint $table, $set)
    {


        $table->string("name_$set")->nullable();
        $table->string("credit_score_$set")->nullable();
        $table->string("num_of_loans_$set")->nullable();
        $table->string("outstanding_amount_$set")->nullable();
        $table->string("solvency_$set")->nullable();
        $table->string("payment_history_$set")->nullable();
        $table->string("credit_dependency_$set")->nullable();

        // Overall Credit History Score and Score Analysis

    }
}
