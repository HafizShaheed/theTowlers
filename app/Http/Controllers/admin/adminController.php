<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ThirdParty;
use App\Models\team\TeamUser;
use Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use Mail;
use Carbon\Carbon;

use App\Models\BusinessIntelligence;
use App\Models\CourtCheck;
use App\Models\Document;
use App\Models\Financial;
use App\Models\FinancialsFindingsFyFive;
use App\Models\FinancialsFindingsFyFour;
use App\Models\FinancialsFindingsFyThree;
use App\Models\FinancialsFindingsFyTwo;
use App\Models\FinancialsFindingsFyOne;

use App\Models\FinancialsRatioAnalysisFyFive;
use App\Models\FinancialsRatioAnalysisFyFour;
use App\Models\FinancialsRatioAnalysisFyThree;
use App\Models\FinancialsRatioAnalysisFyTwo;
use App\Models\FinancialsRatioAnalysisFyOne;

use App\Models\FirmBackground;
use App\Models\FirstDirectorsFirm;
use App\Models\SecondDirectorsFirm;
use App\Models\ThirdDirectorsFirm;
use App\Models\License;

use App\Models\KeyObservation;
use App\Models\MarketReputation;
use App\Models\OnGroundVerification;
use App\Models\TaxReurnCredit;
use Validator;
use PDF;

class adminController extends Controller
{
    //
    function index()
    {

        $data['title'] = "Admin Dashboard";
        $data['page'] = "Dashboard";
        $data['pageIntro'] = "Introducing DD Dashboard";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        $data['getAllUser'] = User::all();
        //   $vendoruser=User::where('vendor_status',2)->count();
        return view('admin.index', $data);
    }


    public function generatePDF($count)
    {
        $data = ['title' => 'Hello, this is your PDF title'];

        $pdf = PDF::loadView('admin.report.report-form-1.pdf.'.$count.'my_pdf', $data);

        return $pdf->stream('document.pdf');
    }


    function reportPage()
    {

        $data['title'] = "Reports Page";
        $data['page'] = "Reports Page";
        $data['pageIntro'] = "Reports Page";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        $data['totaluser'] = User::all()->count();
        //   $vendoruser=User::where('vendor_status',2)->count();
        return view('admin.pages.report-page', $data);
    }



    // team list start
    function team_List(Request $request)
    {

        $data['title'] = "Team Managment";
        $data['page'] = "Team Managment";
        $data['pageIntro'] = "Team List";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";




        $query = TeamUser::query();



        if (isset($request->TeamMember) && !empty($request->TeamMember)) {
            $TeamMemberName = $request->input('TeamMember');
            $query->where(function ($query) use ($TeamMemberName) {
                $query->orWhere('first_name', 'like', '%' . $TeamMemberName . '%')
                    ->orWhere('last_name', 'like', '%' . $TeamMemberName . '%')
                    ->orWhere('user_name', 'like', '%' . $TeamMemberName . '%')
                    ->orWhere('team_email', 'like', '%' . $TeamMemberName . '%');
            });
        }





        if (isset($request->status) && !empty($request->status)) {
            $statusMapping = [
                'Active' => 1,
                'In-Active' => 0,

            ];
            $statusString = $request->status;
            $status = isset($statusMapping[$statusString]) ? (int)$statusMapping[$statusString] : null;
            $query->where('status', $status);
        }


        $data['getallTeamMember'] = $query->latest()->get();
        // dd($data['getallTeamMember']);
        return view('admin.team.index', $data);
    }

    function Edit_team($id)
    {

        $data['title'] = "Team Managment";
        $data['page'] = "Edit Team";
        $data['pageIntro'] = "Team Edit";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        $data['getTeamMember'] = TeamUser::where('id', $id)->first();
        if (isset($data['getTeamMember'])) {
            return view('admin.team.edit', $data);
        } else {
            return redirect()->route('admin.team_List');
        }
    }

    function update_team(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [

            'user_name' => 'required|unique:team_users,user_name,' . $request->id,
            'team_email' => 'required|email|unique:team_users,team_email,' . $request->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            // dd($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = TeamUser::find($request->id);

        if (!$user) {
            return redirect()->route('admin.team_List')->with('error', 'Team not found.');
        }

        $user->update([
            'user_name' => $request->user_name,
            'team_email' => $request->team_email,

            'status' => $request->TeamStatusCheck == 'on' ? '1' : '0'
        ]);

        // Update password if provided
        if ($request->password) {
            $user->update([
                'password' => Hash::make($request->password),

            ]);
        }

        return redirect()->route('admin.team_List')->with('success', 'Team updated successfully!');
    }

    // team list end


    // vender means Reports list start
    function report_List(Request $request)
    {
        // dd($request->all());
        $data['title'] = "Reports Management";
        $data['page'] = "Reports Management";
        $data['pageIntro'] = "Reports List";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        $query = ThirdParty::query();







        if (isset($request->status) && !empty($request->status)) {
            $statusMapping = [
                'Active' => 1,
                'Pending' => 0,
                'Resubmit' => 2,
                'Completed' => 3,
            ];
            $statusString = $request->status;
            $status = isset($statusMapping[$statusString]) ? (int)$statusMapping[$statusString] : null;
            $query->where('status', $status);
        }


        $data['getallThirdParty'] = $query->latest()->get();

        return view('admin.report.report-form-1.index', $data);
    }

    function report_View($id)
    {

        $data['title'] = "Reports Managment";
        $data['page'] = "Reports View";
        $data['pageIntro'] = "Reports View";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        $data['BusinessIntelligence'] = BusinessIntelligence::where('third_party_id', $id)->first();


        // ===================================================== Business graph start ===================

        $data['businessInteligenceGrapFY_accounts_payable'] = [

            $data['BusinessIntelligence']->accounts_payable_turnover_BI_FY_one,
            $data['BusinessIntelligence']->accounts_payable_turnover_BI_FY_two,
            $data['BusinessIntelligence']->accounts_payable_turnover_BI_FY_three,
            $data['BusinessIntelligence']->accounts_payable_turnover_BI_FY_four,
            $data['BusinessIntelligence']->accounts_payable_turnover_BI_FY_five,

        ];

        function areAllValuesNull($array)
        {
            return count(array_filter($array, function ($value) {
                return $value !== null;
            })) === 0;
        }

        // dd(  areAllValuesNull($data['businessInteligenceGrapFY_accounts_payable']) == true ?  "trye" : "" );
        $data['businessInteligenceGrapFY_operating_efficiency'] = [

            $data['BusinessIntelligence']->operating_efficiency_BI_FY_one,
            $data['BusinessIntelligence']->operating_efficiency_BI_FY_two,
            $data['BusinessIntelligence']->operating_efficiency_BI_FY_three,
            $data['BusinessIntelligence']->operating_efficiency_BI_FY_four,
            $data['BusinessIntelligence']->operating_efficiency_BI_FY_five,

        ];


        $data['businessInteligenceGrapFY_inventory_turnover'] = [

            $data['BusinessIntelligence']->inventory_turnover_BI_FY_one,
            $data['BusinessIntelligence']->inventory_turnover_BI_FY_two,
            $data['BusinessIntelligence']->inventory_turnover_BI_FY_three,
            $data['BusinessIntelligence']->inventory_turnover_BI_FY_four,
            $data['BusinessIntelligence']->inventory_turnover_BI_FY_five,

        ];

        $data['businessInteligenceGrapFY_days_sales_in_inventory'] = [

            $data['BusinessIntelligence']->days_sales_in_inventory_BI_FY_one,
            $data['BusinessIntelligence']->days_sales_in_inventory_BI_FY_two,
            $data['BusinessIntelligence']->days_sales_in_inventory_BI_FY_three,
            $data['BusinessIntelligence']->days_sales_in_inventory_BI_FY_four,
            $data['BusinessIntelligence']->days_sales_in_inventory_BI_FY_five,

        ];


        $data['businessInteligenceGraphLablesName'] = [

            $data['BusinessIntelligence']->year_BI_FY_one,
            $data['BusinessIntelligence']->year_BI_FY_two,
            $data['BusinessIntelligence']->year_BI_FY_three,
            $data['BusinessIntelligence']->year_BI_FY_four,
            $data['BusinessIntelligence']->year_BI_FY_five,

        ];
        // ===================================================== Business graph end ===================


        $data['CourtCheck'] = CourtCheck::where('third_party_id', $id)->first();
        $data['Financial'] = Financial::where('third_party_id', $id)->first();
        $data['KeyObservation'] = KeyObservation::where('third_party_id', $id)->first();

        $getKwyObservationScore = $data['KeyObservation']->overall_risk_score ?: 0;
        $getKeyObservationOutOf = 100 -  $getKwyObservationScore;
        $data['finalValueforGraKeyObservation'] = [
            $getKwyObservationScore,
            $getKeyObservationOutOf,
        ];

        // dd($finalValueforGraKeyObservation);

        $data['MarketReputation'] = MarketReputation::where('third_party_id', $id)->first();
        $data['OnGroundVerification'] = OnGroundVerification::where('third_party_id', $id)->first();
        $data['Document'] = Document::where('third_party_id', $id)->first();
        $data['TaxReurnCredit'] = TaxReurnCredit::where('third_party_id', $id)->first();


        // ===================================================== financial finding graph end ========================


        $data['FinancialsFindingsFyFive'] = FinancialsFindingsFyFive::where('financial_id', $data['Financial']->id)->first();
        $data['FinancialsFindingsFyFour'] = FinancialsFindingsFyFour::where('financial_id', $data['Financial']->id)->first();
        $data['FinancialsFindingsFyThree'] = FinancialsFindingsFyThree::where('financial_id', $data['Financial']->id)->first();
        $data['FinancialsFindingsFyTwo'] = FinancialsFindingsFyTwo::where('financial_id', $data['Financial']->id)->first();
        $data['FinancialsFindingsFyOne'] = FinancialsFindingsFyOne::where('financial_id', $data['Financial']->id)->first();


        $data['financialFindingsGrapFY_revenue'] = [

            $data['FinancialsFindingsFyOne']->revenue_fy_one_finding__1,
            $data['FinancialsFindingsFyTwo']->revenue_fy_two_finding__1,
            $data['FinancialsFindingsFyThree']->revenue_fy_three_finding__1,
            $data['FinancialsFindingsFyFour']->revenue_fy_four_finding__1,
            $data['FinancialsFindingsFyFive']->revenue_fy_five_finding__1,
        ];



        $data['financialFindingsGrapFY_net_profit'] = [

            $data['FinancialsFindingsFyOne']->net_profit_fy_one_finding__1,
            $data['FinancialsFindingsFyTwo']->net_profit_fy_two_finding__1,
            $data['FinancialsFindingsFyThree']->net_profit_fy_three_finding__1,
            $data['FinancialsFindingsFyFour']->net_profit_fy_four_finding__1,
            $data['FinancialsFindingsFyFive']->net_profit_fy_five_finding__1,
        ];

        // start
        $data['financialFindingsGrapFY_gross_profit'] = [

            $data['FinancialsFindingsFyOne']->gross_profit_fy_one_finding__1,
            $data['FinancialsFindingsFyTwo']->gross_profit_fy_two_finding__1,
            $data['FinancialsFindingsFyThree']->gross_profit_fy_three_finding__1,
            $data['FinancialsFindingsFyFour']->gross_profit_fy_four_finding__1,
            $data['FinancialsFindingsFyFive']->gross_profit_fy_five_finding__1,
        ];

        // end
        // start
        $data['financialFindingsGrapFY_working_capital_1'] = [

            $data['FinancialsFindingsFyOne']->working_capital_1_fy_one_finding__1,
            $data['FinancialsFindingsFyTwo']->working_capital_1_fy_two_finding__1,
            $data['FinancialsFindingsFyThree']->working_capital_1_fy_three_finding__1,
            $data['FinancialsFindingsFyFour']->working_capital_1_fy_four_finding__1,
            $data['FinancialsFindingsFyFive']->working_capital_1_fy_five_finding__1,
        ];


        // end

        // start
        $data['financialFindingsGrapFY_quick_assets'] = [

            $data['FinancialsFindingsFyOne']->quick_assets_fy_one_finding__1,
            $data['FinancialsFindingsFyTwo']->quick_assets_fy_two_finding__1,
            $data['FinancialsFindingsFyThree']->quick_assets_fy_three_finding__1,
            $data['FinancialsFindingsFyFour']->quick_assets_fy_four_finding__1,
            $data['FinancialsFindingsFyFive']->quick_assets_fy_five_finding__1,
        ];


        // end

        // start
        $data['financialFindingsGrapFY_total_assets'] = [

            $data['FinancialsFindingsFyOne']->total_assets_fy_one_finding__1,
            $data['FinancialsFindingsFyTwo']->total_assets_fy_two_finding__1,
            $data['FinancialsFindingsFyThree']->total_assets_fy_three_finding__1,
            $data['FinancialsFindingsFyFour']->total_assets_fy_four_finding__1,
            $data['FinancialsFindingsFyFive']->total_assets_fy_five_finding__1,
        ];


        // end

        // start
        $data['financialFindingsGrapFY_current_assets'] = [

            $data['FinancialsFindingsFyOne']->current_assets_fy_one_finding__1,
            $data['FinancialsFindingsFyTwo']->current_assets_fy_two_finding__1,
            $data['FinancialsFindingsFyThree']->current_assets_fy_three_finding__1,
            $data['FinancialsFindingsFyFour']->current_assets_fy_four_finding__1,
            $data['FinancialsFindingsFyFive']->current_assets_fy_five_finding__1,
        ];



        // start
        $data['financialFindingsGrapFY_current_liabilities'] = [

            $data['FinancialsFindingsFyOne']->current_liabilities_fy_one_finding__1,
            $data['FinancialsFindingsFyTwo']->current_liabilities_fy_two_finding__1,
            $data['FinancialsFindingsFyThree']->current_liabilities_fy_three_finding__1,
            $data['FinancialsFindingsFyFour']->current_liabilities_fy_four_finding__1,
            $data['FinancialsFindingsFyFive']->current_liabilities_fy_five_finding__1,
        ];


        // end
        // start
        $data['financialFindingsGrapFY_debt'] = [

            $data['FinancialsFindingsFyOne']->debt_fy_one_finding__1,
            $data['FinancialsFindingsFyTwo']->debt_fy_two_finding__1,
            $data['FinancialsFindingsFyThree']->debt_fy_three_finding__1,
            $data['FinancialsFindingsFyFour']->debt_fy_four_finding__1,
            $data['FinancialsFindingsFyFive']->debt_fy_five_finding__1,
        ];


        // end

        // start
        $data['financialFindingsGrapFY_average_inventory'] = [

            $data['FinancialsFindingsFyOne']->average_inventory_fy_one_finding__1,
            $data['FinancialsFindingsFyTwo']->average_inventory_fy_two_finding__1,
            $data['FinancialsFindingsFyThree']->average_inventory_fy_three_finding__1,
            $data['FinancialsFindingsFyFour']->average_inventory_fy_four_finding__1,
            $data['FinancialsFindingsFyFive']->average_inventory_fy_five_finding__1,
        ];

        // end

        // start
        $data['financialFindingsGrapFY_net_sales'] = [

            $data['FinancialsFindingsFyOne']->net_sales_fy_one_finding__1,
            $data['FinancialsFindingsFyTwo']->net_sales_fy_two_finding__1,
            $data['FinancialsFindingsFyThree']->net_sales_fy_three_finding__1,
            $data['FinancialsFindingsFyFour']->net_sales_fy_four_finding__1,
            $data['FinancialsFindingsFyFive']->net_sales_fy_five_finding__1,
        ];


        // end
        // start
        $data['financialFindingsGrapFY_equity_share_capital'] = [

            $data['FinancialsFindingsFyOne']->equity_share_capital_fy_one_finding__1,
            $data['FinancialsFindingsFyTwo']->equity_share_capital_fy_two_finding__1,
            $data['FinancialsFindingsFyThree']->equity_share_capital_fy_three_finding__1,
            $data['FinancialsFindingsFyFour']->equity_share_capital_fy_four_finding__1,
            $data['FinancialsFindingsFyFive']->equity_share_capital_fy_five_finding__1,
        ];



        // start
        $data['financialFindingsGrapFY_sundry_debtors'] = [

            $data['FinancialsFindingsFyOne']->sundry_debtors_fy_one_finding__1,
            $data['FinancialsFindingsFyTwo']->sundry_debtors_fy_two_finding__1,
            $data['FinancialsFindingsFyThree']->sundry_debtors_fy_three_finding__1,
            $data['FinancialsFindingsFyFour']->sundry_debtors_fy_four_finding__1,
            $data['FinancialsFindingsFyFive']->sundry_debtors_fy_five_finding__1,
        ];


        // end

        // start
        $data['financialFindingsGrapFY_sundry_creditors'] = [

            $data['FinancialsFindingsFyOne']->sundry_creditors_fy_one_finding__1,
            $data['FinancialsFindingsFyTwo']->sundry_creditors_fy_two_finding__1,
            $data['FinancialsFindingsFyThree']->sundry_creditors_fy_three_finding__1,
            $data['FinancialsFindingsFyFour']->sundry_creditors_fy_four_finding__1,
            $data['FinancialsFindingsFyFive']->sundry_creditors_fy_five_finding__1,
        ];


        // end

        // start
        $data['financialFindingsGrapFY_loans_and_advances'] = [

            $data['FinancialsFindingsFyOne']->loans_and_advances_fy_one_finding__1,
            $data['FinancialsFindingsFyTwo']->loans_and_advances_fy_two_finding__1,
            $data['FinancialsFindingsFyThree']->loans_and_advances_fy_three_finding__1,
            $data['FinancialsFindingsFyFour']->loans_and_advances_fy_four_finding__1,
            $data['FinancialsFindingsFyFive']->loans_and_advances_fy_five_finding__1,
        ];

        // end

        // start
        $data['financialFindingsGrapFY_cash_and_cash_equivalents'] = [

            $data['FinancialsFindingsFyOne']->cash_and_cash_equivalents_fy_one_finding__1,
            $data['FinancialsFindingsFyTwo']->cash_and_cash_equivalents_fy_two_finding__1,
            $data['FinancialsFindingsFyThree']->cash_and_cash_equivalents_fy_three_finding__1,
            $data['FinancialsFindingsFyFour']->cash_and_cash_equivalents_fy_four_finding__1,
            $data['FinancialsFindingsFyFive']->cash_and_cash_equivalents_fy_five_finding__1,
        ];


        // end


        $data['FinancialsFindingsFyFiveGraphLableName'] = FinancialsFindingsFyFive::where('financial_id', $data['Financial']->id)->pluck('year_five_finding__1');
        $data['FinancialsFindingsFyFourGraphLableName'] = FinancialsFindingsFyFour::where('financial_id', $data['Financial']->id)->pluck('year_four_finding__1');
        $data['FinancialsFindingsFyThreeGraphLableName'] = FinancialsFindingsFyThree::where('financial_id', $data['Financial']->id)->pluck('year_three_finding__1');
        $data['FinancialsFindingsFyTwoGraphLableName'] = FinancialsFindingsFyTwo::where('financial_id', $data['Financial']->id)->pluck('year_two_finding__1');
        $data['FinancialsFindingsFyOneGraphLableName'] = FinancialsFindingsFyOne::where('financial_id', $data['Financial']->id)->pluck('year_one_finding__1');

        $data['financialFindingsGrapFYhLablesName'] = [

            $data['FinancialsFindingsFyOneGraphLableName'],
            $data['FinancialsFindingsFyTwoGraphLableName'],
            $data['FinancialsFindingsFyThreeGraphLableName'],
            $data['FinancialsFindingsFyFourGraphLableName'],
            $data['FinancialsFindingsFyFiveGraphLableName'],
        ];

        // ===================================================== financial finding graph end ========================

        // ===================================================== financial ratio graph start ========================
        // dd($data['financialFindingsGrapFYhLablesName'] );
        $data['FinancialsRatioAnalysisFyFive'] = FinancialsRatioAnalysisFyFive::where('financial_id', $data['Financial']->id)->first();
        $data['FinancialsRatioAnalysisFyFour'] = FinancialsRatioAnalysisFyFour::where('financial_id', $data['Financial']->id)->first();
        $data['FinancialsRatioAnalysisFyThree'] = FinancialsRatioAnalysisFyThree::where('financial_id', $data['Financial']->id)->first();
        $data['FinancialsRatioAnalysisFyTwo'] = FinancialsRatioAnalysisFyTwo::where('financial_id', $data['Financial']->id)->first();
        $data['FinancialsRatioAnalysisFyOne'] = FinancialsRatioAnalysisFyOne::where('financial_id', $data['Financial']->id)->first();

        $data['financialrationGrapFY_current_ratio'] = [

            $data['FinancialsRatioAnalysisFyOne']->current_ratio_fy_one_1,
            $data['FinancialsRatioAnalysisFyTwo']->current_ratio_fy_two_1,
            $data['FinancialsRatioAnalysisFyThree']->current_ratio_fy_three_1,
            $data['FinancialsRatioAnalysisFyFour']->current_ratio_fy_four_1,
            $data['FinancialsRatioAnalysisFyFive']->current_ratio_fy_five_1,
        ];


        $data['financialrationGrapFY_quick_ratio'] = [

            $data['FinancialsRatioAnalysisFyOne']->quick_ratio_fy_one_1,
            $data['FinancialsRatioAnalysisFyTwo']->quick_ratio_fy_two_1,
            $data['FinancialsRatioAnalysisFyThree']->quick_ratio_fy_three_1,
            $data['FinancialsRatioAnalysisFyFour']->quick_ratio_fy_four_1,
            $data['FinancialsRatioAnalysisFyFive']->quick_ratio_fy_five_1,
        ];




        $data['financialrationGrapFY_debt_ratio'] = [

            $data['FinancialsRatioAnalysisFyOne']->debt_ratio_fy_one_1,
            $data['FinancialsRatioAnalysisFyTwo']->debt_ratio_fy_two_1,
            $data['FinancialsRatioAnalysisFyThree']->debt_ratio_fy_three_1,
            $data['FinancialsRatioAnalysisFyFour']->debt_ratio_fy_four_1,
            $data['FinancialsRatioAnalysisFyFive']->debt_ratio_fy_five_1,
        ];


        $data['financialrationGrapFY_solvency_ratio'] = [

            $data['FinancialsRatioAnalysisFyOne']->solvency_ratio_fy_one_1,
            $data['FinancialsRatioAnalysisFyTwo']->solvency_ratio_fy_two_1,
            $data['FinancialsRatioAnalysisFyThree']->solvency_ratio_fy_three_1,
            $data['FinancialsRatioAnalysisFyFour']->solvency_ratio_fy_four_1,
            $data['FinancialsRatioAnalysisFyFive']->solvency_ratio_fy_five_1,
        ];



        $data['financialrationGrapFY_debt_to_equity_ratio'] = [

            $data['FinancialsRatioAnalysisFyOne']->debt_to_equity_ratio_fy_one_1,
            $data['FinancialsRatioAnalysisFyTwo']->debt_to_equity_ratio_fy_two_1,
            $data['FinancialsRatioAnalysisFyThree']->debt_to_equity_ratio_fy_three_1,
            $data['FinancialsRatioAnalysisFyFour']->debt_to_equity_ratio_fy_four_1,
            $data['FinancialsRatioAnalysisFyFive']->debt_to_equity_ratio_fy_five_1,
        ];



        $data['financialrationGrapFY_asset_turnover_ratio'] = [

            $data['FinancialsRatioAnalysisFyOne']->asset_turnover_ratio_fy_one_1,
            $data['FinancialsRatioAnalysisFyTwo']->asset_turnover_ratio_fy_two_1,
            $data['FinancialsRatioAnalysisFyThree']->asset_turnover_ratio_fy_three_1,
            $data['FinancialsRatioAnalysisFyFour']->asset_turnover_ratio_fy_four_1,
            $data['FinancialsRatioAnalysisFyFive']->asset_turnover_ratio_fy_five_1,
        ];


        $data['financialrationGrapFY_absolute_liquidity_ratio'] = [

            $data['FinancialsRatioAnalysisFyOne']->absolute_liquidity_ratio_fy_one_1,
            $data['FinancialsRatioAnalysisFyTwo']->absolute_liquidity_ratio_fy_two_1,
            $data['FinancialsRatioAnalysisFyThree']->absolute_liquidity_ratio_fy_three_1,
            $data['FinancialsRatioAnalysisFyFour']->absolute_liquidity_ratio_fy_four_1,
            $data['FinancialsRatioAnalysisFyFive']->absolute_liquidity_ratio_fy_five_1,
        ];



        $data['financialrationGrapFY_proprietary_ratio'] = [

            $data['FinancialsRatioAnalysisFyOne']->proprietary_ratio_fy_one_1,
            $data['FinancialsRatioAnalysisFyTwo']->proprietary_ratio_fy_two_1,
            $data['FinancialsRatioAnalysisFyThree']->proprietary_ratio_fy_three_1,
            $data['FinancialsRatioAnalysisFyFour']->proprietary_ratio_fy_four_1,
            $data['FinancialsRatioAnalysisFyFive']->proprietary_ratio_fy_five_1,
        ];



        $data['financialrationGrapFY_net_profit_ratio'] = [

            $data['FinancialsRatioAnalysisFyOne']->net_profit_ratio_fy_one_1,
            $data['FinancialsRatioAnalysisFyTwo']->net_profit_ratio_fy_two_1,
            $data['FinancialsRatioAnalysisFyThree']->net_profit_ratio_fy_three_1,
            $data['FinancialsRatioAnalysisFyFour']->net_profit_ratio_fy_four_1,
            $data['FinancialsRatioAnalysisFyFive']->net_profit_ratio_fy_five_1,
        ];



        $data['financialrationGrapFY_gross_profit_ratio'] = [

            $data['FinancialsRatioAnalysisFyOne']->gross_profit_ratio_fy_one_1,
            $data['FinancialsRatioAnalysisFyTwo']->gross_profit_ratio_fy_two_1,
            $data['FinancialsRatioAnalysisFyThree']->gross_profit_ratio_fy_three_1,
            $data['FinancialsRatioAnalysisFyFour']->gross_profit_ratio_fy_four_1,
            $data['FinancialsRatioAnalysisFyFive']->gross_profit_ratio_fy_five_1,
        ];



        $data['financialrationGrapFY_springate_s_score_ratio'] = [

            $data['FinancialsRatioAnalysisFyOne']->springate_s_score_ratio_fy_one_1,
            $data['FinancialsRatioAnalysisFyTwo']->springate_s_score_ratio_fy_two_1,
            $data['FinancialsRatioAnalysisFyThree']->springate_s_score_ratio_fy_three_1,
            $data['FinancialsRatioAnalysisFyFour']->springate_s_score_ratio_fy_four_1,
            $data['FinancialsRatioAnalysisFyFive']->springate_s_score_ratio_fy_five_1,
        ];



        $data['financialrationGrapFY_trade_receivable_days_ratio'] = [

            $data['FinancialsRatioAnalysisFyOne']->trade_receivable_days_ratio_fy_one_1,
            $data['FinancialsRatioAnalysisFyTwo']->trade_receivable_days_ratio_fy_two_1,
            $data['FinancialsRatioAnalysisFyThree']->trade_receivable_days_ratio_fy_three_1,
            $data['FinancialsRatioAnalysisFyFour']->trade_receivable_days_ratio_fy_four_1,
            $data['FinancialsRatioAnalysisFyFive']->trade_receivable_days_ratio_fy_five_1,
        ];



        $data['financialrationGrapFY_trade_payable_days_ratio'] = [

            $data['FinancialsRatioAnalysisFyOne']->trade_payable_days_ratio_fy_one_1,
            $data['FinancialsRatioAnalysisFyTwo']->trade_payable_days_ratio_fy_two_1,
            $data['FinancialsRatioAnalysisFyThree']->trade_payable_days_ratio_fy_three_1,
            $data['FinancialsRatioAnalysisFyFour']->trade_payable_days_ratio_fy_four_1,
            $data['FinancialsRatioAnalysisFyFive']->trade_payable_days_ratio_fy_five_1,
        ];



        $data['financialrationGrapFY_taffler_z_score_ratio'] = [

            $data['FinancialsRatioAnalysisFyOne']->taffler_z_score_ratio_fy_one_1,
            $data['FinancialsRatioAnalysisFyTwo']->taffler_z_score_ratio_fy_two_1,
            $data['FinancialsRatioAnalysisFyThree']->taffler_z_score_ratio_fy_three_1,
            $data['FinancialsRatioAnalysisFyFour']->taffler_z_score_ratio_fy_four_1,
            $data['FinancialsRatioAnalysisFyFive']->taffler_z_score_ratio_fy_five_1,
        ];



        $data['financialrationGrapFY_zmijewski_x_score_ratio'] = [

            $data['FinancialsRatioAnalysisFyOne']->zmijewski_x_score_ratio_fy_one_1,
            $data['FinancialsRatioAnalysisFyTwo']->zmijewski_x_score_ratio_fy_two_1,
            $data['FinancialsRatioAnalysisFyThree']->zmijewski_x_score_ratio_fy_three_1,
            $data['FinancialsRatioAnalysisFyFour']->zmijewski_x_score_ratio_fy_four_1,
            $data['FinancialsRatioAnalysisFyFive']->zmijewski_x_score_ratio_fy_five_1,
        ];



        $data['FinancialsRatioAnalysisFyFiveGraphLabelNames'] = FinancialsRatioAnalysisFyFive::where('financial_id', $data['Financial']->id)->pluck('year_ratio_five_1');
        $data['FinancialsRatioAnalysisFyFourGraphLabelNames'] = FinancialsRatioAnalysisFyFour::where('financial_id', $data['Financial']->id)->pluck('year_ratio_four_1');
        $data['FinancialsRatioAnalysisFyThreeGraphLabelNames'] = FinancialsRatioAnalysisFyThree::where('financial_id', $data['Financial']->id)->pluck('year_ratio_three_1');
        $data['FinancialsRatioAnalysisFyTwoGraphLabelNames'] = FinancialsRatioAnalysisFyTwo::where('financial_id', $data['Financial']->id)->pluck('year_ratio_two_1');
        $data['FinancialsRatioAnalysisFyOneGraphLabelNames'] = FinancialsRatioAnalysisFyOne::where('financial_id', $data['Financial']->id)->pluck('year_ratio_one_1');


        $data['financialRatioGrapFYhLablesName'] = [

            $data['FinancialsRatioAnalysisFyOneGraphLabelNames'],
            $data['FinancialsRatioAnalysisFyTwoGraphLabelNames'],
            $data['FinancialsRatioAnalysisFyThreeGraphLabelNames'],
            $data['FinancialsRatioAnalysisFyFourGraphLabelNames'],
            $data['FinancialsRatioAnalysisFyFiveGraphLabelNames'],
        ];

        // dd($data['financialRatioGrapFYhLablesName']);

        // ===================================================== financial ratio graph end ========================
        // dd(  $data['financialRatioGrapFYhLablesName'] );
        $data['FirmBackground'] = FirmBackground::where('third_party_id', $id)->first();
        $data['FirstDirectorsFirm'] = FirstDirectorsFirm::where('firm_background_id', $data['FirmBackground']->id)->first();
        $data['SecondDirectorsFirm'] = SecondDirectorsFirm::where('firm_background_id', $data['FirmBackground']->id)->first();
        $data['ThirdDirectorsFirm'] = ThirdDirectorsFirm::where('firm_background_id', $data['FirmBackground']->id)->first();
        $data['License'] = License::where('firm_background_id', $data['FirmBackground']->id)->first();
        $data['getThirdPartyForID'] = ThirdParty::where('id', $id)->first();
        $data['Getclient'] = User::where('id', $data['getThirdPartyForID']->user_id)->first();
        $data['GetTeaMuser'] = TeamUser::where('id', $data['FirmBackground']->team_user_id)->first();


        //   $vendoruser=User::where('vendor_status',2)->count();
        return view('admin.report.view-reports', $data);
    }

    function Edit_report($id)
    {

        $data['title'] = "Reports Managment";
        $data['page'] = "Edit Reports";
        $data['pageIntro'] = "Reports Edit";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        $data['BusinessIntelligence'] = BusinessIntelligence::where('third_party_id', $id)->first();
        $data['CourtCheck'] = CourtCheck::where('third_party_id', $id)->first();
        $data['Financial'] = Financial::where('third_party_id', $id)->first();
        $data['FirmBackground'] = FirmBackground::where('third_party_id', $id)->first();
        $data['KeyObservation'] = KeyObservation::where('third_party_id', $id)->first();
        $data['MarketReputation'] = MarketReputation::where('third_party_id', $id)->first();
        $data['OnGroundVerification'] = OnGroundVerification::where('third_party_id', $id)->first();
        $data['Document'] = Document::where('third_party_id', $id)->first();
        $data['TaxReurnCredit'] = TaxReurnCredit::where('third_party_id', $id)->first();

        $data['FinancialsFindingsFyFive'] = FinancialsFindingsFyFive::where('financial_id', $data['Financial']->id)->first();
        $data['FinancialsFindingsFyFour'] = FinancialsFindingsFyFour::where('financial_id', $data['Financial']->id)->first();
        $data['FinancialsFindingsFyThree'] = FinancialsFindingsFyThree::where('financial_id', $data['Financial']->id)->first();
        $data['FinancialsFindingsFyTwo'] = FinancialsFindingsFyTwo::where('financial_id', $data['Financial']->id)->first();
        $data['FinancialsFindingsFyOne'] = FinancialsFindingsFyOne::where('financial_id', $data['Financial']->id)->first();

        // dd($data['FinancialsFindingsFyFive'] );
        $data['FinancialsRatioAnalysisFyFive'] = FinancialsRatioAnalysisFyFive::where('financial_id', $data['Financial']->id)->first();
        $data['FinancialsRatioAnalysisFyFour'] = FinancialsRatioAnalysisFyFour::where('financial_id', $data['Financial']->id)->first();
        $data['FinancialsRatioAnalysisFyThree'] = FinancialsRatioAnalysisFyThree::where('financial_id', $data['Financial']->id)->first();
        $data['FinancialsRatioAnalysisFyTwo'] = FinancialsRatioAnalysisFyTwo::where('financial_id', $data['Financial']->id)->first();
        $data['FinancialsRatioAnalysisFyOne'] = FinancialsRatioAnalysisFyOne::where('financial_id', $data['Financial']->id)->first();

        $data['FirstDirectorsFirm'] = FirstDirectorsFirm::where('firm_background_id', $data['FirmBackground']->id)->first();
        $data['SecondDirectorsFirm'] = SecondDirectorsFirm::where('firm_background_id', $data['FirmBackground']->id)->first();
        $data['ThirdDirectorsFirm'] = ThirdDirectorsFirm::where('firm_background_id', $data['FirmBackground']->id)->first();
        $data['License'] = License::where('firm_background_id', $data['FirmBackground']->id)->first();

        $data['getThirdPartyForID'] = ThirdParty::where('id', $id)->first();


        return view('admin.report.update-report', $data);
    }


    function update_firm_background(Request $request)
    {
        $firmBackground = FirmBackground::findOrFail($request->FirmBackgroundID);
        if (!$firmBackground) {
            return response()->json(['error' => 'This Reports not found.']);
        }







        $firmBackground->incorporation_year = $request->input('incorporation_year');
        $firmBackground->user_id = $request->input('user_id');
        $firmBackground->team_user_id = $request->input('team_user_id');

        $firmBackground->no_of_directors = $request->input('no_of_directors');
        $firmBackground->form_of_entity = $request->input('form_of_entity');
        $firmBackground->industry = $request->input('industry');
        $firmBackground->website = $request->input('website');
        $firmBackground->address = $request->input('address');
        $firmBackground->city = $request->input('city');
        $firmBackground->state = $request->input('state');
        $firmBackground->pincode = $request->input('pincode');
        $firmBackground->business_details = $request->input('business_details');
        $firmBackground->ofac_check = $request->input('ofac_check');
        $firmBackground->regulatory_score = $request->input('regulatory_score');
        $firmBackground->score_analysis = $request->input('score_analysis');
        $firmBackground->Type_of_risk = $request->input('regulatory_score') > 60 ? 'High Risk' : ($request->input('regulatory_score') <= 60 && $request->input('regulatory_score') > 30 ? 'Medium Risk' : ($request->input('regulatory_score') <= 30 ? 'Low Risk' : ''));

        for ($i = 1; $i <= 10; $i++) {
            $firmBackground->{"name_$i"} = $request->input("name_$i");
            $firmBackground->{"pan_$i"} = $request->input("pan_$i");
            $firmBackground->{"aadhar_$i"} = $request->input("aadhar_$i");
            $firmBackground->{"date_of_appointment_$i"} = $request->input("date_of_appointment_$i");
            $firmBackground->{"educational_background_$i"} = $request->input("educational_background_$i");
            $firmBackground->{"din_$i"} = $request->input("din_$i");
        }


        $firmBackground->credit_score = $request->input('credit_score');
        $firmBackground->save();

        if ($firmBackground->id) {

            // first director name
            $FirstDirectorsFirm = FirstDirectorsFirm::where('firm_background_id', $firmBackground->id)->firstOrFail();


            for ($i = 1; $i <= 8; $i++) {
                $FirstDirectorsFirm->{"director_name_1_$i"} = $request->input("director_name_1_$i");
                $FirstDirectorsFirm->{"company_name_1_$i"} = $request->input("company_name_1_$i");
                $FirstDirectorsFirm->{"cin_1_$i"} = $request->input("cin_1_$i");
                $FirstDirectorsFirm->{"company_status_1_$i"} = $request->input("company_status_1_$i");
                $FirstDirectorsFirm->{"appointment_date_1_$i"} = $request->input("appointment_date_1_$i");
                $FirstDirectorsFirm->{"business_of_entity_1_$i"} = $request->input("business_of_entity_1_$i");
                $FirstDirectorsFirm->{"business_conflict_1_$i"} = $request->input("business_conflict_1_$i");
            }
            $FirstDirectorsFirm->save();


            // second director name
            $SecondDirectorsFirm = SecondDirectorsFirm::where('firm_background_id', $firmBackground->id)->firstOrFail();

            for ($i = 1; $i <= 8; $i++) {
                $SecondDirectorsFirm->{"director_name_2_$i"} = $request->input("director_name_2_$i");
                $SecondDirectorsFirm->{"company_name_2_$i"} = $request->input("company_name_2_$i");
                $SecondDirectorsFirm->{"cin_2_$i"} = $request->input("cin_2_$i");
                $SecondDirectorsFirm->{"company_status_2_$i"} = $request->input("company_status_2_$i");
                $SecondDirectorsFirm->{"appointment_date_2_$i"} = $request->input("appointment_date_2_$i");
                $SecondDirectorsFirm->{"business_of_entity_2_$i"} = $request->input("business_of_entity_2_$i");
                $SecondDirectorsFirm->{"business_conflict_2_$i"} = $request->input("business_conflict_2_$i");
            }
            $SecondDirectorsFirm->save();


            // third director name
            $ThirdDirectorsFirm = ThirdDirectorsFirm::where('firm_background_id', $firmBackground->id)->firstOrFail();

            for ($i = 1; $i <= 8; $i++) {
                $ThirdDirectorsFirm->{"director_name_3_$i"} = $request->input("director_name_3_$i");
                $ThirdDirectorsFirm->{"company_name_3_$i"} = $request->input("company_name_3_$i");
                $ThirdDirectorsFirm->{"cin_3_$i"} = $request->input("cin_3_$i");
                $ThirdDirectorsFirm->{"company_status_3_$i"} = $request->input("company_status_3_$i");
                $ThirdDirectorsFirm->{"appointment_date_3_$i"} = $request->input("appointment_date_3_$i");
                $ThirdDirectorsFirm->{"business_of_entity_3_$i"} = $request->input("business_of_entity_3_$i");
                $ThirdDirectorsFirm->{"business_conflict_3_$i"} = $request->input("business_conflict_3_$i");
            }


            $ThirdDirectorsFirm->save();

            // License form

            $License = License::where('firm_background_id', $firmBackground->id)->firstOrFail();

            for ($i = 1; $i <= 8; $i++) {

                $License->{"license_name_$i"} = $request->input("license_name_$i");
                $License->{"license_no_$i"} = $request->input("license_no_$i");
                $License->{"date_of_issuance_$i"} = $request->input("date_of_issuance_$i");
                $License->{"date_of_expiry_$i"} = $request->input("date_of_expiry_$i");
            }




            for ($i = 1; $i <= 8; $i++) {
                if ($request->hasFile("licenses_upload_file_$i")) {
                    $file = $request->file("licenses_upload_file_$i");
                    // Generate a unique filename
                    $filename = 'firmBackground-'.$i. '-' . date('dmyHis') . rand() . '.' . $file->getClientOriginalExtension();
                    // Move the file to the destination folder
                    // $file->move(public_path('admin/assets/imgs/Document/'), $filename);
                    $file->move(public_path('admin/assets/imgs/firmBacgroundImages/'), $filename);
                    $License->{"licenses_upload_file_$i"} = $filename;
                }
            }

            $License->save();



            $BusinessIntelligence = BusinessIntelligence::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
            $BusinessIntelligence->user_id = $request->input('user_id');
            $BusinessIntelligence->team_user_id = $request->input('team_user_id');
            $BusinessIntelligence->save();

            $Document = Document::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
            $Document->user_id = $request->input('user_id');
            $Document->team_user_id = $request->input('team_user_id');
            $Document->save();

            $CourtCheck = CourtCheck::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
            $CourtCheck->user_id = $request->input('user_id');
            $CourtCheck->team_user_id = $request->input('team_user_id');
            $CourtCheck->save();

            $Financial = Financial::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
            $Financial->user_id = $request->input('user_id');
            $Financial->team_user_id = $request->input('team_user_id');
            $Financial->save();

            $MarketReputation = MarketReputation::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
            $MarketReputation->user_id = $request->input('user_id');
            $MarketReputation->team_user_id = $request->input('team_user_id');
            $MarketReputation->save();

            $OnGroundVerification = OnGroundVerification::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
            $OnGroundVerification->user_id = $request->input('user_id');
            $OnGroundVerification->team_user_id = $request->input('team_user_id');
            $OnGroundVerification->save();

            $TaxReurnCredit = TaxReurnCredit::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
            $TaxReurnCredit->user_id = $request->input('user_id');
            $TaxReurnCredit->team_user_id = $request->input('team_user_id');
            $TaxReurnCredit->save();

            $KeyObservation = KeyObservation::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
            $KeyObservation->user_id = $request->input('user_id');
            $KeyObservation->team_user_id = $request->input('team_user_id');
            $KeyObservation->status = 1;

            $KeyObservation->save();

            $ThirdParty = ThirdParty::where('id', $request->getThirdPartyForID)->firstOrFail();
            $ThirdParty->user_id = $request->input('user_id');
            $ThirdParty->status = 1;
            $ThirdParty->save();
        }

        return response()->json(['message' => 'Firm Background Reports updated successfully!']);
    }



    // function update_resubmited_allreports(Request $request)
    // {

    //     $KeyObservation = KeyObservation::where('third_party_id', $request->thirdpartyId)->firstOrFail();
    //     $KeyObservation->status = 2;
    //     $KeyObservation->save();

    //     $FirmBackground = FirmBackground::where('third_party_id', $request->thirdpartyId)->firstOrFail();
    //     $FirmBackground->status = 2;
    //     $FirmBackground->save();

    //     $BusinessIntelligence = BusinessIntelligence::where('third_party_id', $request->thirdpartyId)->firstOrFail();
    //     $BusinessIntelligence->status = 2;
    //     $BusinessIntelligence->save();

    //     $CourtCheck = CourtCheck::where('third_party_id', $request->thirdpartyId)->firstOrFail();
    //     $CourtCheck->status = 2;
    //     $CourtCheck->save();

    //     $Financial = Financial::where('third_party_id', $request->thirdpartyId)->firstOrFail();
    //     $Financial->status = 2;
    //     $Financial->save();

    //     $MarketReputation = MarketReputation::where('third_party_id', $request->thirdpartyId)->firstOrFail();
    //     $MarketReputation->status = 2;
    //     $MarketReputation->save();


    //     $Document = Document::where('third_party_id', $request->thirdpartyId)->firstOrFail();
    //     $Document->status = 2;
    //     $Document->save();


    //     $OnGroundVerification = OnGroundVerification::where('third_party_id', $request->thirdpartyId)->firstOrFail();
    //     $OnGroundVerification->status = 2;
    //     $OnGroundVerification->save();

    //     $TaxReurnCredit = TaxReurnCredit::where('third_party_id', $request->thirdpartyId)->firstOrFail();
    //     $TaxReurnCredit->status = 2;
    //     $TaxReurnCredit->save();

    //     $ThirdParty = ThirdParty::findOrFail($request->thirdpartyId);
    //     $ThirdParty->status = 2;
    //     $ThirdParty->save();

    //     return response()->json(['message' => 'ALl Reports Re-Submited successfully!']);
    // }

    // function update_completed_allreports(Request $request)
    // {

    //     $KeyObservation = KeyObservation::where('third_party_id', $request->thirdpartyId)->firstOrFail();
    //     $KeyObservation->status = 3;
    //     $KeyObservation->save();

    //     $FirmBackground = FirmBackground::where('third_party_id', $request->thirdpartyId)->firstOrFail();
    //     $FirmBackground->status = 3;
    //     $FirmBackground->save();

    //     $BusinessIntelligence = BusinessIntelligence::where('third_party_id', $request->thirdpartyId)->firstOrFail();
    //     $BusinessIntelligence->status = 3;
    //     $BusinessIntelligence->save();

    //     $CourtCheck = CourtCheck::where('third_party_id', $request->thirdpartyId)->firstOrFail();
    //     $CourtCheck->status = 3;
    //     $CourtCheck->save();

    //     $Financial = Financial::where('third_party_id', $request->thirdpartyId)->firstOrFail();
    //     $Financial->status = 3;
    //     $Financial->save();

    //     $MarketReputation = MarketReputation::where('third_party_id', $request->thirdpartyId)->firstOrFail();
    //     $MarketReputation->status = 3;
    //     $MarketReputation->save();

    //     $OnGroundVerification = OnGroundVerification::where('third_party_id', $request->thirdpartyId)->firstOrFail();
    //     $OnGroundVerification->status = 3;
    //     $OnGroundVerification->save();

    //     $TaxReurnCredit = TaxReurnCredit::where('third_party_id', $request->thirdpartyId)->firstOrFail();
    //     $TaxReurnCredit->status = 3;
    //     $TaxReurnCredit->save();

    //     $Document = Document::where('third_party_id', $request->thirdpartyId)->firstOrFail();
    //     $Document->status = 3;
    //     $Document->save();

    //     $ThirdParty = ThirdParty::findOrFail($request->thirdpartyId);
    //     $ThirdParty->status = 3;
    //     $ThirdParty->save();

    //     return response()->json(['message' => 'ALl Reports Comapleted successfully!']);
    // }


















}
