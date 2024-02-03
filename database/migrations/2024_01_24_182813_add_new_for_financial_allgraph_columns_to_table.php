<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewForFinancialAllgraphColumnsToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('financials', function (Blueprint $table) {
            // financial
            $table->string("revenue_fy_one_finding_heading_graph")->nullable();
            $table->string("net_profit_fy_one_finding_heading_graph")->nullable();
            $table->string("gross_profit_fy_one_finding_heading_graph")->nullable();
            $table->string("working_capital_1_fy_one_finding_heading_graph")->nullable();
            $table->string("quick_assets_fy_one_finding_heading_graph")->nullable();
            $table->string("total_assets_fy_one_finding_heading_graph")->nullable();
            $table->string("current_assets_fy_one_finding_heading_graph")->nullable();
            $table->string("current_liabilities_fy_one_finding_heading_graph")->nullable();
            $table->string("debt_fy_one_finding_heading_graph")->nullable();
            $table->string("average_inventory_fy_one_finding_heading_graph")->nullable();
            $table->string("net_sales_fy_one_finding_heading_graph")->nullable();
            $table->string("equity_share_capital_fy_one_finding_heading_graph")->nullable();
            $table->string("sundry_debtors_fy_one_finding_heading_graph")->nullable();
            $table->string("sundry_creditors_fy_one_finding_heading_graph")->nullable();
            $table->string("loans_and_advances_fy_one_finding_heading_graph")->nullable();
            $table->string("cash_and_cash_equivalents_fy_one_finding_heading_graph")->nullable();

            // ratio
            $table->string("current_ratio_fy_one_ratio_heading_graph")->nullable();
            $table->string("debt_ratio_fy_one_ratio_heading_graph")->nullable();
            $table->string("solvency_ratio_fy_one_ratio_heading_graph")->nullable();
            $table->string("debt_to_equity_ratio_fy_one_ratio_heading_graph")->nullable();
            $table->string("asset_turnover_ratio_fy_one_ratio_heading_graph")->nullable();
            $table->string("absolute_liquidity_ratio_fy_one_ratio_heading_graph")->nullable();
            $table->string("proprietary_ratio_fy_one_ratio_heading_graph")->nullable();
            $table->string("net_profit_ratio_fy_one_ratio_heading_graph")->nullable();
            $table->string("gross_profit_ratio_fy_one_ratio_heading_graph")->nullable();
            $table->string("springate_s_score_ratio_fy_one_ratio_heading_graph")->nullable();
            $table->string("trade_receivable_days_ratio_fy_one_ratio_heading_graph")->nullable();
            $table->string("trade_payable_days_ratio_fy_one_ratio_heading_graph")->nullable();
            $table->string("taffler_z_score_ratio_fy_one_ratio_heading_graph")->nullable();
            $table->string("zmijewski_x_score_ratio_fy_one_ratio_heading_graph")->nullable();
            $table->string("quick_ratio_fy_one_ratio_heading_graph")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('financials', function (Blueprint $table) {
            //
        });
    }
}
