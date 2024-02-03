<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financials', function (Blueprint $table) {
            $table->id();
            $this->addChargeFields($table, 1);
            $table->integer('user_id')->nullable();
            $table->integer('third_party_id')->nullable();
            $table->integer('team_user_id')->nullable();
            $table->text('score_analysis')->nullable();
            $table->string('overall_financial_score')->nullable();
            $table->string('Type_of_risk')->nullable();
            $table->integer('status')->default(0)->nullable();


            // Financials - Charge Information - Set 2
            $this->addChargeFields($table, 2);
            $this->addChargeFields($table, 3);
            $this->addChargeFields($table, 4);
            $table->timestamps();
        });

        Schema::create('financials_findings_fy_one', function (Blueprint $table) {
            $table->id();
            $table->integer('financial_id')->nullable();
            $this->addFindingsFY1Fields($table, 1);
            $table->integer('status')->default(0)->nullable();
            $table->timestamps();
        });
        Schema::create('financials_findings_fy_two', function (Blueprint $table) {
            $table->id();
            $table->integer('financial_id')->nullable();
            $this->addFindingsFY2Fields($table, 1);
            $table->integer('status')->default(0)->nullable();
            $table->timestamps();
        });
        Schema::create('financials_findings_fy_three', function (Blueprint $table) {
            $table->id();
            $table->integer('financial_id')->nullable();
            $this->addFindingsFY3Fields($table, 1);
            $table->integer('status')->default(0)->nullable();
            $table->timestamps();
        });
        Schema::create('financials_findings_fy_four', function (Blueprint $table) {
            $table->id();
            $table->integer('financial_id')->nullable();
            $this->addFindingsFY4Fields($table, 1);
            $table->integer('status')->default(0)->nullable();
            $table->timestamps();
        });
        Schema::create('financials_findings_fy_five', function (Blueprint $table) {
            $table->id();
            $table->integer('financial_id')->nullable();
            $this->addFindingsFY5Fields($table, 1);
            $table->integer('status')->default(0)->nullable();
            $table->timestamps();
        });

        Schema::create('financials_ratio_analysis_fy_one', function (Blueprint $table) {
            $table->id();
            $table->integer('financial_id')->nullable();
            $this->addRatioFY1Fields($table, 1);
            $table->integer('status')->default(0)->nullable();
            $table->timestamps();
        });
        Schema::create('financials_ratio_analysis_fy_two', function (Blueprint $table) {
            $table->id();
            $table->integer('financial_id')->nullable();
            $this->addRatioFY2Fields($table, 1);
            $table->integer('status')->default(0)->nullable();
            $table->timestamps();
        });
        Schema::create('financials_ratio_analysis_fy_three', function (Blueprint $table) {
            $table->id();
            $table->integer('financial_id')->nullable();
            $this->addRatioFY3Fields($table, 1);
            $table->integer('status')->default(0)->nullable();
            $table->timestamps();
        });
        Schema::create('financials_ratio_analysis_fy_four', function (Blueprint $table) {
            $table->id();
            $table->integer('financial_id')->nullable();
            $this->addRatioFY4Fields($table, 1);
            $table->integer('status')->default(0)->nullable();
            $table->timestamps();
        });
        Schema::create('financials_ratio_analysis_fy_five', function (Blueprint $table) {
            $table->id();
            $table->integer('financial_id')->nullable();
            $this->addRatioFY5Fields($table, 1);
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
        Schema::dropIfExists('financials');
        Schema::dropIfExists('financials_findings_fy_one');
        Schema::dropIfExists('financials_findings_fy_two');
        Schema::dropIfExists('financials_findings_fy_three');
        Schema::dropIfExists('financials_findings_fy_four');
        Schema::dropIfExists('financials_findings_fy_five');
        Schema::dropIfExists('financials_ratio_analysis_fy_one');
        Schema::dropIfExists('financials_ratio_analysis_fy_two');
        Schema::dropIfExists('financials_ratio_analysis_fy_three');
        Schema::dropIfExists('financials_ratio_analysis_fy_four');
        Schema::dropIfExists('financials_ratio_analysis_fy_five');
    }

    private function addChargeFields(Blueprint $table, $set)
    {
        $table->string("name_$set")->nullable();
        $table->string("status_$set")->nullable();
        $table->decimal("amount_$set", 10, 2)->nullable();
        $table->string("charged_property_$set")->nullable();
    }

    private function addFindingsFY1Fields(Blueprint $table, $set)
    {
         $table->string("revenue_fy_one_finding__$set")->nullable();
         $table->string("year_one_finding__$set")->nullable();
         $table->string("net_profit_fy_one_finding__$set")->nullable();
         $table->string("gross_profit_fy_one_finding__$set")->nullable();
         $table->string("working_capital_1_fy_one_finding__$set")->nullable();
         $table->string("quick_assets_fy_one_finding__$set")->nullable();
         $table->string("total_assets_fy_one_finding__$set")->nullable();
         $table->string("current_assets_fy_one_finding__$set")->nullable();
         $table->string("current_liabilities_fy_one_finding__$set")->nullable();
         $table->string("debt_fy_one_finding__$set")->nullable();
         $table->string("average_inventory_fy_one_finding__$set")->nullable();
         $table->string("net_sales_fy_one_finding__$set")->nullable();
         $table->string("equity_share_capital_fy_one_finding__$set")->nullable();
         $table->string("sundry_debtors_fy_one_finding__$set")->nullable();
         $table->string("sundry_creditors_fy_one_finding__$set")->nullable();
         $table->string("loans_and_advances_fy_one_finding__$set")->nullable();
         $table->string("cash_and_cash_equivalents_fy_one_finding__$set")->nullable();
         $table->string("overall_financial_score_fy_one_finding__$set")->nullable();
    }
    private function addFindingsFY2Fields(Blueprint $table, $set)
    {
         $table->string("revenue_fy_two_finding__$set")->nullable();
         $table->string("year_two_finding__$set")->nullable();

         $table->string("net_profit_fy_two_finding__$set")->nullable();
         $table->string("gross_profit_fy_two_finding__$set")->nullable();
         $table->string("working_capital_1_fy_two_finding__$set")->nullable();
         $table->string("quick_assets_fy_two_finding__$set")->nullable();
         $table->string("total_assets_fy_two_finding__$set")->nullable();
         $table->string("current_assets_fy_two_finding__$set")->nullable();
         $table->string("current_liabilities_fy_two_finding__$set")->nullable();
         $table->string("debt_fy_two_finding__$set")->nullable();
         $table->string("average_inventory_fy_two_finding__$set")->nullable();
         $table->string("net_sales_fy_two_finding__$set")->nullable();
         $table->string("equity_share_capital_fy_two_finding__$set")->nullable();
         $table->string("sundry_debtors_fy_two_finding__$set")->nullable();
         $table->string("sundry_creditors_fy_two_finding__$set")->nullable();
         $table->string("loans_and_advances_fy_two_finding__$set")->nullable();
         $table->string("cash_and_cash_equivalents_fy_two_finding__$set")->nullable();
         $table->string("overall_financial_score_fy_two_finding__$set")->nullable();
    }
    private function addFindingsFY3Fields(Blueprint $table, $set)
    {
         $table->string("revenue_fy_three_finding__$set")->nullable();
         $table->string("year_three_finding__$set")->nullable();
         $table->string("net_profit_fy_three_finding__$set")->nullable();
         $table->string("gross_profit_fy_three_finding__$set")->nullable();
         $table->string("working_capital_1_fy_three_finding__$set")->nullable();
         $table->string("quick_assets_fy_three_finding__$set")->nullable();
         $table->string("total_assets_fy_three_finding__$set")->nullable();
         $table->string("current_assets_fy_three_finding__$set")->nullable();
         $table->string("current_liabilities_fy_three_finding__$set")->nullable();
         $table->string("debt_fy_three_finding__$set")->nullable();
         $table->string("average_inventory_fy_three_finding__$set")->nullable();
         $table->string("net_sales_fy_three_finding__$set")->nullable();
         $table->string("equity_share_capital_fy_three_finding__$set")->nullable();
         $table->string("sundry_debtors_fy_three_finding__$set")->nullable();
         $table->string("sundry_creditors_fy_three_finding__$set")->nullable();
         $table->string("loans_and_advances_fy_three_finding__$set")->nullable();
         $table->string("cash_and_cash_equivalents_fy_three_finding__$set")->nullable();
         $table->string("overall_financial_score_fy_three_finding__$set")->nullable();
    }
    private function addFindingsFY4Fields(Blueprint $table, $set)
    {
         $table->string("revenue_fy_four_finding__$set")->nullable();
         $table->string("year_four_finding__$set")->nullable();
         $table->string("net_profit_fy_four_finding__$set")->nullable();
         $table->string("gross_profit_fy_four_finding__$set")->nullable();
         $table->string("working_capital_1_fy_four_finding__$set")->nullable();
         $table->string("quick_assets_fy_four_finding__$set")->nullable();
         $table->string("total_assets_fy_four_finding__$set")->nullable();
         $table->string("current_assets_fy_four_finding__$set")->nullable();
         $table->string("current_liabilities_fy_four_finding__$set")->nullable();
         $table->string("debt_fy_four_finding__$set")->nullable();
         $table->string("average_inventory_fy_four_finding__$set")->nullable();
         $table->string("net_sales_fy_four_finding__$set")->nullable();
         $table->string("equity_share_capital_fy_four_finding__$set")->nullable();
         $table->string("sundry_debtors_fy_four_finding__$set")->nullable();
         $table->string("sundry_creditors_fy_four_finding__$set")->nullable();
         $table->string("loans_and_advances_fy_four_finding__$set")->nullable();
         $table->string("cash_and_cash_equivalents_fy_four_finding__$set")->nullable();
         $table->string("overall_financial_score_fy_four_finding__$set")->nullable();
    }
    private function addFindingsFY5Fields(Blueprint $table, $set)
    {
         $table->string("revenue_fy_five_finding__$set")->nullable();
         $table->string("year_five_finding__$set")->nullable();
         $table->string("net_profit_fy_five_finding__$set")->nullable();
         $table->string("gross_profit_fy_five_finding__$set")->nullable();
         $table->string("working_capital_1_fy_five_finding__$set")->nullable();
         $table->string("quick_assets_fy_five_finding__$set")->nullable();
         $table->string("total_assets_fy_five_finding__$set")->nullable();
         $table->string("current_assets_fy_five_finding__$set")->nullable();
         $table->string("current_liabilities_fy_five_finding__$set")->nullable();
         $table->string("debt_fy_five_finding__$set")->nullable();
         $table->string("average_inventory_fy_five_finding__$set")->nullable();
         $table->string("net_sales_fy_five_finding__$set")->nullable();
         $table->string("equity_share_capital_fy_five_finding__$set")->nullable();
         $table->string("sundry_debtors_fy_five_finding__$set")->nullable();
         $table->string("sundry_creditors_fy_five_finding__$set")->nullable();
         $table->string("loans_and_advances_fy_five_finding__$set")->nullable();
         $table->string("cash_and_cash_equivalents_fy_five_finding__$set")->nullable();
         $table->string("overall_financial_score_fy_five_finding__$set")->nullable();
    }


    private function addRatioFY1Fields(Blueprint $table, $set)
    {
        $table->string("current_ratio_fy_one_$set")->nullable();
        $table->string("year_ratio_one_$set")->nullable();
        $table->text("current_ratio_analysis_fy_one_$set")->nullable();
        $table->string("debt_ratio_fy_one_$set")->nullable();
        $table->text("debt_ratio_analysis_fy_one_$set")->nullable();
        $table->string("solvency_ratio_fy_one_$set")->nullable();
        $table->text("solvency_ratio_analysis_fy_one_$set")->nullable();
        $table->string("debt_to_equity_ratio_fy_one_$set")->nullable();
        $table->text("debt_to_equity_ratio_analysis_fy_one_$set")->nullable();
        $table->string("asset_turnover_ratio_fy_one_$set")->nullable();
        $table->text("asset_turnover_ratio_analysis_fy_one_$set")->nullable();
        $table->string("absolute_liquidity_ratio_fy_one_$set")->nullable();
        $table->text("absolute_liquidity_ratio_analysis_fy_one_$set")->nullable();
        $table->string("proprietary_ratio_fy_one_$set")->nullable();
        $table->text("proprietary_ratio_analysis_fy_one_$set")->nullable();
        $table->string("net_profit_ratio_fy_one_$set")->nullable();
        $table->text("net_profit_ratio_analysis_fy_one_$set")->nullable();
        $table->string("gross_profit_ratio_fy_one_$set")->nullable();
        $table->text("gross_profit_ratio_analysis_fy_one_$set")->nullable();

        // Additional Ratios
        $table->string("springate_s_score_ratio_fy_one_$set")->nullable();
        $table->text("springate_s_score_ratio_analysis_fy_one_$set")->nullable();

        $table->string("trade_receivable_days_ratio_fy_one_$set")->nullable();
        $table->text("trade_receivable_days_ratio_analysis_fy_one_$set")->nullable();

        $table->string("trade_payable_days_ratio_fy_one_$set")->nullable();
        $table->text("trade_payable_days_ratio_analysis_fy_one_$set")->nullable();

        $table->string("taffler_z_score_ratio_fy_one_$set")->nullable();
        $table->text("taffler_z_score_ratio_analysis_fy_one_$set")->nullable();
        $table->string("zmijewski_x_score_ratio_fy_one_$set")->nullable();
        $table->text("zmijewski_x_score_ratio_analysis_fy_one_$set")->nullable();
        $table->string("quick_ratio_fy_one_$set")->nullable();
        $table->text("quick_ratio_analysis_fy_one_$set")->nullable();


    }
    private function addRatioFY2Fields(Blueprint $table, $set)
    {
        $table->string("current_ratio_fy_two_$set")->nullable();
        $table->string("year_ratio_two_$set")->nullable();
        // $table->string("current_ratio_analysis_fy_two_$set")->nullable();
        $table->string("debt_ratio_fy_two_$set")->nullable();
        // $table->string("debt_ratio_analysis_fy_two_$set")->nullable();
        $table->string("solvency_ratio_fy_two_$set")->nullable();
        // $table->string("solvency_ratio_analysis_fy_two_$set")->nullable();
        $table->string("debt_to_equity_ratio_fy_two_$set")->nullable();
        // $table->string("debt_to_equity_ratio_analysis_fy_two_$set")->nullable();
        $table->string("asset_turnover_ratio_fy_two_$set")->nullable();
       // $table->string("asset_turnover_ratio_analysis_fy_two_$set")->nullable();
        $table->string("absolute_liquidity_ratio_fy_two_$set")->nullable();
       // $table->string("absolute_liquidity_ratio_analysis_fy_two_$set")->nullable();
        $table->string("proprietary_ratio_fy_two_$set")->nullable();
       // $table->string("proprietary_ratio_analysis_fy_two_$set")->nullable();
        $table->string("net_profit_ratio_fy_two_$set")->nullable();
       // $table->string("net_profit_ratio_analysis_fy_two_$set")->nullable();
        $table->string("gross_profit_ratio_fy_two_$set")->nullable();
       // $table->string("gross_profit_ratio_analysis_fy_two_$set")->nullable();

       // Additional Ratios
       $table->string("springate_s_score_ratio_fy_two_$set")->nullable();
      // $table->string("springate_s_score_ratio_analysis_fy_two_$set")->nullable();
       $table->string("trade_receivable_days_ratio_fy_two_$set")->nullable();
      // $table->string("trade_receivable_days_ratio_analysis_fy_two_$set")->nullable();
       $table->string("trade_payable_days_ratio_fy_two_$set")->nullable();
      // $table->string("trade_payable_days_ratio_analysis_fy_two_$set")->nullable();
       $table->string("taffler_z_score_ratio_fy_two_$set")->nullable();
      // $table->string("taffler_z_score_ratio_analysis_fy_two_$set")->nullable();
       $table->string("zmijewski_x_score_ratio_fy_two_$set")->nullable();
      // $table->string("zmijewski_x_score_ratio_analysis_fy_two_$set")->nullable();
       $table->string("quick_ratio_fy_two_$set")->nullable();
      // $table->string("quick_ratio_analysis_fy_two_$set")->nullable();

    }
    private function addRatioFY3Fields(Blueprint $table, $set)
    {
        $table->string("current_ratio_fy_three_$set")->nullable();
        $table->string("year_ratio_three_$set")->nullable();

        // $table->string("current_ratio_analysis_fy_three_$set")->nullable();
        $table->string("debt_ratio_fy_three_$set")->nullable();
        // $table->string("debt_ratio_analysis_fy_three_$set")->nullable();
        $table->string("solvency_ratio_fy_three_$set")->nullable();
        // $table->string("solvency_ratio_analysis_fy_three_$set")->nullable();
        $table->string("debt_to_equity_ratio_fy_three_$set")->nullable();
        // $table->string("debt_to_equity_ratio_analysis_fy_three_$set")->nullable();
        $table->string("asset_turnover_ratio_fy_three_$set")->nullable();
       // $table->string("asset_turnover_ratio_analysis_fy_three_$set")->nullable();
        $table->string("absolute_liquidity_ratio_fy_three_$set")->nullable();
       // $table->string("absolute_liquidity_ratio_analysis_fy_three_$set")->nullable();
        $table->string("proprietary_ratio_fy_three_$set")->nullable();
       // $table->string("proprietary_ratio_analysis_fy_three_$set")->nullable();
        $table->string("net_profit_ratio_fy_three_$set")->nullable();
       // $table->string("net_profit_ratio_analysis_fy_three_$set")->nullable();
        $table->string("gross_profit_ratio_fy_three_$set")->nullable();
       // $table->string("gross_profit_ratio_analysis_fy_three_$set")->nullable();

       // Additional Ratios
       $table->string("springate_s_score_ratio_fy_three_$set")->nullable();
      // $table->string("springate_s_score_ratio_analysis_fy_three_$set")->nullable();
       $table->string("trade_receivable_days_ratio_fy_three_$set")->nullable();
      // $table->string("trade_receivable_days_ratio_analysis_fy_three_$set")->nullable();
       $table->string("trade_payable_days_ratio_fy_three_$set")->nullable();
      // $table->string("trade_payable_days_ratio_analysis_fy_three_$set")->nullable();
       $table->string("taffler_z_score_ratio_fy_three_$set")->nullable();
      // $table->string("taffler_z_score_ratio_analysis_fy_three_$set")->nullable();
       $table->string("zmijewski_x_score_ratio_fy_three_$set")->nullable();
      // $table->string("zmijewski_x_score_ratio_analysis_fy_three_$set")->nullable();
       $table->string("quick_ratio_fy_three_$set")->nullable();
      // $table->string("quick_ratio_analysis_fy_three_$set")->nullable();

    }
    private function addRatioFY4Fields(Blueprint $table, $set)
    {
        $table->string("current_ratio_fy_four_$set")->nullable();
        $table->string("year_ratio_four_$set")->nullable();

        // $table->string("current_ratio_analysis_fy_four_$set")->nullable();
        $table->string("debt_ratio_fy_four_$set")->nullable();
        // $table->string("debt_ratio_analysis_fy_four_$set")->nullable();
        $table->string("solvency_ratio_fy_four_$set")->nullable();
        // $table->string("solvency_ratio_analysis_fy_four_$set")->nullable();
        $table->string("debt_to_equity_ratio_fy_four_$set")->nullable();
        // $table->string("debt_to_equity_ratio_analysis_fy_four_$set")->nullable();
        $table->string("asset_turnover_ratio_fy_four_$set")->nullable();
       // $table->string("asset_turnover_ratio_analysis_fy_four_$set")->nullable();
        $table->string("absolute_liquidity_ratio_fy_four_$set")->nullable();
       // $table->string("absolute_liquidity_ratio_analysis_fy_four_$set")->nullable();
        $table->string("proprietary_ratio_fy_four_$set")->nullable();
       // $table->string("proprietary_ratio_analysis_fy_four_$set")->nullable();
        $table->string("net_profit_ratio_fy_four_$set")->nullable();
       // $table->string("net_profit_ratio_analysis_fy_four_$set")->nullable();
        $table->string("gross_profit_ratio_fy_four_$set")->nullable();
       // $table->string("gross_profit_ratio_analysis_fy_four_$set")->nullable();

       // Additional Ratios
       $table->string("springate_s_score_ratio_fy_four_$set")->nullable();
      // $table->string("springate_s_score_ratio_analysis_fy_four_$set")->nullable();
       $table->string("trade_receivable_days_ratio_fy_four_$set")->nullable();
      // $table->string("trade_receivable_days_ratio_analysis_fy_four_$set")->nullable();
       $table->string("trade_payable_days_ratio_fy_four_$set")->nullable();
      // $table->string("trade_payable_days_ratio_analysis_fy_four_$set")->nullable();
       $table->string("taffler_z_score_ratio_fy_four_$set")->nullable();
      // $table->string("taffler_z_score_ratio_analysis_fy_four_$set")->nullable();
       $table->string("zmijewski_x_score_ratio_fy_four_$set")->nullable();
      // $table->string("zmijewski_x_score_ratio_analysis_fy_four_$set")->nullable();
       $table->string("quick_ratio_fy_four_$set")->nullable();
      // $table->string("quick_ratio_analysis_fy_four_$set")->nullable();

    }
    private function addRatioFY5Fields(Blueprint $table, $set)
    {
        $table->string("current_ratio_fy_five_$set")->nullable();
        $table->string("year_ratio_five_$set")->nullable();

        // $table->string("current_ratio_analysis_fy_five_$set")->nullable();
        $table->string("debt_ratio_fy_five_$set")->nullable();
        // $table->string("debt_ratio_analysis_fy_five_$set")->nullable();
        $table->string("solvency_ratio_fy_five_$set")->nullable();
        // $table->string("solvency_ratio_analysis_fy_five_$set")->nullable();
        $table->string("debt_to_equity_ratio_fy_five_$set")->nullable();
        // $table->string("debt_to_equity_ratio_analysis_fy_five_$set")->nullable();
        $table->string("asset_turnover_ratio_fy_five_$set")->nullable();
       // $table->string("asset_turnover_ratio_analysis_fy_five_$set")->nullable();
        $table->string("absolute_liquidity_ratio_fy_five_$set")->nullable();
       // $table->string("absolute_liquidity_ratio_analysis_fy_five_$set")->nullable();
        $table->string("proprietary_ratio_fy_five_$set")->nullable();
       // $table->string("proprietary_ratio_analysis_fy_five_$set")->nullable();
        $table->string("net_profit_ratio_fy_five_$set")->nullable();
       // $table->string("net_profit_ratio_analysis_fy_five_$set")->nullable();
        $table->string("gross_profit_ratio_fy_five_$set")->nullable();
       // $table->string("gross_profit_ratio_analysis_fy_five_$set")->nullable();

       // Additional Ratios
       $table->string("springate_s_score_ratio_fy_five_$set")->nullable();
      // $table->string("springate_s_score_ratio_analysis_fy_five_$set")->nullable();
       $table->string("trade_receivable_days_ratio_fy_five_$set")->nullable();
      // $table->string("trade_receivable_days_ratio_analysis_fy_five_$set")->nullable();
       $table->string("trade_payable_days_ratio_fy_five_$set")->nullable();
      // $table->string("trade_payable_days_ratio_analysis_fy_five_$set")->nullable();
       $table->string("taffler_z_score_ratio_fy_five_$set")->nullable();
      // $table->string("taffler_z_score_ratio_analysis_fy_five_$set")->nullable();
       $table->string("zmijewski_x_score_ratio_fy_five_$set")->nullable();
      // $table->string("zmijewski_x_score_ratio_analysis_fy_five_$set")->nullable();
       $table->string("quick_ratio_fy_five_$set")->nullable();
      // $table->string("quick_ratio_analysis_fy_five_$set")->nullable();

    }
}
