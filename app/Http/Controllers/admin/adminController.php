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



    function attentionRequired()
    {

        $data['title'] = "Attention Required";
        $data['page'] = "Attention";
        $data['pageIntro'] = "Attention Required";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        $data['totaluser'] = User::all()->count();
        //   $vendoruser=User::where('vendor_status',2)->count();
        return view('admin.pages.attention-required', $data);
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

    // company means client
    function companyList(Request $request)
    {

        $data['title'] = "Client Managment";
        $data['page'] = "Client Managment";
        $data['pageIntro'] = "Company List";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        $query = User::query();


        if (isset($request->location) && !empty($request->location)) {
            $party_id = (int)$request->input('location');
            $query->where('zone_id', $party_id);
        }
        if (isset($request->Client) && !empty($request->Client)) {
            $clientName = $request->input('Client');
            $query->where(function ($query) use ($clientName) {
                $query->orWhere('first_name', 'like', '%' . $clientName . '%')
                    ->orWhere('last_name', 'like', '%' . $clientName . '%')
                    ->orWhere('user_name', 'like', '%' . $clientName . '%')
                    ->orWhere('email', 'like', '%' . $clientName . '%')
                    ->orWhere('industry', 'like', '%' . $clientName . '%')
                    ->orWhere('poc', 'like', '%' . $clientName . '%');
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


        $data['getallclient'] = $query->latest()->get();

        return view('admin.client.index', $data);
    }


    function Edit_company($id)
    {

        $data['title'] = "Client Managment";
        $data['page'] = "Edit Client";
        $data['pageIntro'] = "Company";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        $data['getAclient'] = User::where('id', $id)->first();
        if (isset($data['getAclient'])) {
            return view('admin.client.edit', $data);
        } else {
            return redirect()->route('admin.companyList');
        }
    }



    function update_company(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'user_name' => 'required|unique:users,user_name,' . $request->id,
            'email' => 'required|email|unique:users,email,' . $request->id,
            'industry' => 'required',
            'poc' => 'required',
            'zone_id' => 'required',
            'role_id' => 'required',
            'password' => 'nullable|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            // dd($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::find($request->id);

        if (!$user) {
            return redirect()->route('admin.companyList')->with('error', 'Client not found.');
        }

        $user->update([
            'first_name' => $request->first_name,
            'user_name' => $request->user_name,
            'email' => $request->email,
            'industry' => $request->industry,
            'poc' => $request->poc,
            'zone_id' => $request->zone_id,
            'role_id' => $request->role_id,
            'status' => $request->clientStatusCheck == 'on' ? '1' : '0'
        ]);

        // Update password if provided
        if ($request->password) {
            $user->update([
                'password' => Hash::make($request->password),

            ]);
        }

        return redirect()->route('admin.companyList')->with('success', 'Client updated successfully!');
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



    // vender means Third-party list start
    function vender_List(Request $request)
    {

        $data['title'] = "Third-Party Managment";
        $data['page'] = "Third-Party Managment";
        $data['pageIntro'] = "Third-Party List";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";




        $query = ThirdParty::query();


        if (isset($request->searchThirdparty) && !empty($request->searchThirdparty)) {
            $ThirdPartyName = $request->input('searchThirdparty');
            $query->where(function ($query) use ($ThirdPartyName) {
                $query->orWhere('third_party_name', 'like', '%' . $ThirdPartyName . '%')
                    ->orWhere('third_party_email', 'like', '%' . $ThirdPartyName . '%')
                    ->orWhere('third_party_phone', 'like', '%' . $ThirdPartyName . '%')
                    ->orWhere('third_party_pos', 'like', '%' . $ThirdPartyName . '%')
                    ->orWhere('third_party_address', 'like', '%' . $ThirdPartyName . '%');
            });
        }
        if (isset($request->ClientName) && !empty($request->ClientName)) {
            $client_id = array_map('intval', $request->ClientName);
            $query->whereIn('user_id', $client_id);
        }

        if (isset($request->location) && !empty($request->location)) {
            $location = array_map('intval', $request->location);
            $query->whereIn('zone_id', $location);
        }


        if (isset($request->Department) && !empty($request->Department)) {
            $department_id = array_map('intval', $request->Department);
            $query->whereIn('department_id', $department_id);
        }

        if (isset($request->State) && !empty($request->State)) {
            $state_id = array_map('intval', $request->State);
            $query->whereIn('state_id', $state_id);
        }


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
        return view('admin.third-party.index', $data);
    }

    function Edit_vender($id)
    {

        $data['title'] = "Third-Party Managment";
        $data['page'] = "Edit Third-Party";
        $data['pageIntro'] = "Third-Party Edit";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        $data['getThirdParty'] = ThirdParty::where('id', $id)->first();
        if (isset($data['getThirdParty'])) {
            return view('admin.third-party.edit', $data);
        } else {
            return redirect()->route('admin.vender_List');
        }
    }

    // vender  means Third-party list end
    function update_vender(Request $request)
    {
        $validator = Validator::make($request->all(), [



            'third_party_name' => 'required|unique:third_parties,third_party_name,' . $request->id,
            'third_party_email' => 'required|email|unique:third_parties,third_party_email,' . $request->id,
            'user_id' => 'required',
            'third_party_address' => 'required',
            'department_id' => 'required',
            'third_party_pos' => 'required',
            'zone_id' => 'required',
            'state_id' => 'required',
            'third_party_phone' => 'required',
        ]);

        if ($validator->fails()) {
            dd($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = ThirdParty::find($request->id);

        if (!$user) {
            return redirect()->route('admin.team_List')->with('error', 'Team not found.');
        }

        $user->update([
            'third_party_name' => $request->third_party_name,
            'third_party_email' => $request->third_party_email,
            'user_id' => $request->user_id,
            'third_party_address' => $request->third_party_address,
            'department_id' => $request->department_id,
            'third_party_pos' => $request->third_party_pos,
            'zone_id' => $request->zone_id,
            'state_id' => $request->state_id,
            'third_party_phone' => $request->third_party_phone,


        ]);

        return redirect()->route('admin.vender_List')->with('success', 'Third Party updated successfully!');
    }

    // vender means Reports list start
    function report_List(Request $request)
    {
        // dd($request->all());
        $data['title'] = "Reports Management";
        $data['page'] = "Reports Management";
        $data['pageIntro'] = "Reports List";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        $query = ThirdParty::query();


        if (isset($request->PartyName) && !empty($request->PartyName)) {
            $party_id = (int)$request->input('PartyName');
            $query->where('id', $party_id);
        }
        if (isset($request->clientName) && !empty($request->clientName)) {
            $client_id = (int)$request->input('clientName');
            $query->where('user_id', $client_id);
        }




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

        return view('admin.report.index', $data);
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

    function update_documents(Request $request)
    {
        // dd($request->all());

        $Document = Document::findOrFail($request->DocumentID);
        if (!$Document) {
            return response()->json(['error' => 'This Reports not found.']);
        }


        for ($i = 1; $i <= 15; $i++) {

            $Document->{"document_name_$i"} = $request->input("document_name_$i");
            $Document->{"document_number_$i"} = $request->input("document_number_$i");
            $Document->{"document_date_of_issuance_$i"} = $request->input("document_date_of_issuance_$i");
            $Document->{"document_date_of_expiry_$i"} = $request->input("document_date_of_expiry_$i");
        }


        // if ($request->hasFile('document_upload')) {

        //     $file = $request->file('document_upload');
        //     // Generate a unique filename
        //     $filename = 'Document' . '-' . date('dmyHis') . rand() . '.' . $file->getClientOriginalExtension();
        //     // Move the file to the destination folder
        //     $file->move(public_path('admin/assets/imgs/Document/'), $filename);


        //     $Document->document_upload = $filename;
        // }

        for ($i = 1; $i <= 15; $i++) {
            if ($request->hasFile("document_upload_file$i")) {
                $file = $request->file("document_upload_file$i");
                // Generate a unique filename
                $filename = 'Document-'.$i. '-' . date('dmyHis') . rand() . '.' . $file->getClientOriginalExtension();
                // Move the file to the destination folder
                $file->move(public_path('admin/assets/imgs/Document/'), $filename);
                $Document->{"document_upload_file$i"} = $filename;
            }
        }



        $Document->status = 1;
        $Document->save();

        $KeyObservation = KeyObservation::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
        $KeyObservation->status = 1;
        $KeyObservation->save();

        $ThirdParty = ThirdParty::where('id', $request->getThirdPartyForID)->firstOrFail();
        $ThirdParty->status = 1;
        $ThirdParty->save();
        return response()->json(['message' => 'Document  Reports updated successfully!']);
    }

    function update_on_ground_verification(Request $request)
    {
        // dd($request->all());

        $OnGroundVerification = OnGroundVerification::findOrFail($request->onGroundVerificationID);
        if (!$OnGroundVerification) {
            return response()->json(['error' => 'This Reports not found.']);
        }

        if ($request->hasFile('upload_picture')) {
            $file = $request->file('upload_picture');
            // Generate a unique filename
            $filename = 'OnGroundVerification' . '-' . date('dmyHis') . rand() . '.' . $file->getClientOriginalExtension();
            // Move the file to the destination folder
            $file->move(public_path('admin/assets/imgs/OnGroundVerification/'), $filename);


            $OnGroundVerification->upload_picture = $filename;
        }
        $OnGroundVerification->score_analysis = $request->input('score_analysis');
        $OnGroundVerification->Type_of_risk = $request->input('on_ground_verification_score') > 60 ? 'High Risk' : ($request->input('on_ground_verification_score') <= 60 && $request->input('on_ground_verification_score') > 30 ? 'Medium Risk' : ($request->input('on_ground_verification_score') <= 30 ? 'Low Risk' : ''));
        $OnGroundVerification->address_details = $request->input('address_details');
        $OnGroundVerification->address_visit_findings = $request->input('address_visit_findings');
        $OnGroundVerification->on_ground_verification_score = $request->input('on_ground_verification_score');
        $OnGroundVerification->status = 1;
        $OnGroundVerification->save();

        $KeyObservation = KeyObservation::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
        $KeyObservation->status = 1;
        $KeyObservation->save();

        $ThirdParty = ThirdParty::where('id', $request->getThirdPartyForID)->firstOrFail();
        $ThirdParty->status = 1;
        $ThirdParty->save();
        return response()->json(['message' => 'On Ground Verification  Reports updated successfully!']);
    }

    function update_court_check(Request $request)
    {
        // dd($request->all());

        $CourtCheck = CourtCheck::findOrFail($request->CourtCheckId);
        if (!$CourtCheck) {
            return response()->json(['error' => 'This Reports not found.']);
        }

        for ($i = 1; $i <= 5; $i++) {
            $CourtCheck->{"director_name_$i"}  = $request->input("director_name_$i");
            $CourtCheck->{"director_jurisdiction_$i"}  = $request->input("director_jurisdiction_$i");
            $CourtCheck->{"director_record_$i"}  = $request->input("director_record_$i");
            $CourtCheck->{"director_subject_matter_$i"}  = $request->input("director_subject_matter_$i");
        }

        for ($i = 1; $i <= 5; $i++) {
            $CourtCheck->{"company_jurisdiction_$i"}  = $request->input("company_jurisdiction_$i");
            $CourtCheck->{"company_record_$i"}  = $request->input("company_record_$i");
            $CourtCheck->{"company_subject_matter_$i"}  = $request->input("company_subject_matter_$i");
        }

        $CourtCheck->legal_score  = $request->input('legal_score');
        $CourtCheck->score_analysis = $request->input('score_analysis');
        $CourtCheck->Type_of_risk = $request->input('legal_score') > 60 ? 'High Risk' : ($request->input('legal_score') <= 60 && $request->input('legal_score') > 30 ? 'Medium Risk' : ($request->input('legal_score') <= 30 ? 'Low Risk' : ''));
        $CourtCheck->status = 1;

        $CourtCheck->save();
        $KeyObservation = KeyObservation::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
        $KeyObservation->status = 1;
        $KeyObservation->save();

        $ThirdParty = ThirdParty::where('id', $request->getThirdPartyForID)->firstOrFail();
        $ThirdParty->status = 1;
        $ThirdParty->save();
        return response()->json(['message' => 'Court Check  Reports updated successfully!']);
    }


    function update_financial(Request $request)
    {
        // dd($request->all());

        $Financial = Financial::findOrFail($request->FinancialID);
        if (!$Financial) {
            return response()->json(['error' => 'This Reports not found.']);
        }


        for ($i = 1; $i <= 4; $i++) {
            $Financial->{"name_$i"}  = $request->input("name_$i");
            $Financial->{"status_$i"}  = $request->input("status_$i");
            $Financial->{"amount_$i"}  = $request->input("amount_$i");
            $Financial->{"charged_property_$i"}  = $request->input("charged_property_$i");
        }


        $Financial->revenue_fy_one_finding_heading_graph  = $request->input('revenue_fy_one_finding_heading_graph');
        $Financial->net_profit_fy_one_finding_heading_graph  = $request->input('net_profit_fy_one_finding_heading_graph');
        $Financial->gross_profit_fy_one_finding_heading_graph  = $request->input('gross_profit_fy_one_finding_heading_graph');
        $Financial->working_capital_1_fy_one_finding_heading_graph  = $request->input('working_capital_1_fy_one_finding_heading_graph');
        $Financial->quick_assets_fy_one_finding_heading_graph  = $request->input('quick_assets_fy_one_finding_heading_graph');
        $Financial->total_assets_fy_one_finding_heading_graph  = $request->input('total_assets_fy_one_finding_heading_graph');
        $Financial->current_assets_fy_one_finding_heading_graph  = $request->input('current_assets_fy_one_finding_heading_graph');
        $Financial->current_liabilities_fy_one_finding_heading_graph  = $request->input('current_liabilities_fy_one_finding_heading_graph');
        $Financial->debt_fy_one_finding_heading_graph  = $request->input('debt_fy_one_finding_heading_graph');
        $Financial->average_inventory_fy_one_finding_heading_graph  = $request->input('average_inventory_fy_one_finding_heading_graph');
        $Financial->net_sales_fy_one_finding_heading_graph  = $request->input('net_sales_fy_one_finding_heading_graph');
        $Financial->equity_share_capital_fy_one_finding_heading_graph  = $request->input('equity_share_capital_fy_one_finding_heading_graph');
        $Financial->sundry_debtors_fy_one_finding_heading_graph  = $request->input('sundry_debtors_fy_one_finding_heading_graph');
        $Financial->sundry_creditors_fy_one_finding_heading_graph  = $request->input('sundry_creditors_fy_one_finding_heading_graph');
        $Financial->loans_and_advances_fy_one_finding_heading_graph  = $request->input('loans_and_advances_fy_one_finding_heading_graph');
        $Financial->cash_and_cash_equivalents_fy_one_finding_heading_graph  = $request->input('cash_and_cash_equivalents_fy_one_finding_heading_graph');

        // above heading finding graph
        // below heading ratio graph
        $Financial->current_ratio_fy_one_ratio_heading_graph  = $request->input('current_ratio_fy_one_ratio_heading_graph');
        $Financial->debt_ratio_fy_one_ratio_heading_graph  = $request->input('debt_ratio_fy_one_ratio_heading_graph');
        $Financial->solvency_ratio_fy_one_ratio_heading_graph  = $request->input('solvency_ratio_fy_one_ratio_heading_graph');
        $Financial->debt_to_equity_ratio_fy_one_ratio_heading_graph  = $request->input('debt_to_equity_ratio_fy_one_ratio_heading_graph');
        $Financial->asset_turnover_ratio_fy_one_ratio_heading_graph  = $request->input('asset_turnover_ratio_fy_one_ratio_heading_graph');
        $Financial->absolute_liquidity_ratio_fy_one_ratio_heading_graph  = $request->input('absolute_liquidity_ratio_fy_one_ratio_heading_graph');
        $Financial->proprietary_ratio_fy_one_ratio_heading_graph  = $request->input('proprietary_ratio_fy_one_ratio_heading_graph');
        $Financial->net_profit_ratio_fy_one_ratio_heading_graph  = $request->input('net_profit_ratio_fy_one_ratio_heading_graph');
        $Financial->gross_profit_ratio_fy_one_ratio_heading_graph  = $request->input('gross_profit_ratio_fy_one_ratio_heading_graph');
        $Financial->springate_s_score_ratio_fy_one_ratio_heading_graph  = $request->input('springate_s_score_ratio_fy_one_ratio_heading_graph');
        $Financial->trade_receivable_days_ratio_fy_one_ratio_heading_graph  = $request->input('trade_receivable_days_ratio_fy_one_ratio_heading_graph');
        $Financial->trade_payable_days_ratio_fy_one_ratio_heading_graph  = $request->input('trade_payable_days_ratio_fy_one_ratio_heading_graph');
        $Financial->taffler_z_score_ratio_fy_one_ratio_heading_graph  = $request->input('taffler_z_score_ratio_fy_one_ratio_heading_graph');
        $Financial->zmijewski_x_score_ratio_fy_one_ratio_heading_graph  = $request->input('zmijewski_x_score_ratio_fy_one_ratio_heading_graph');
        $Financial->quick_ratio_fy_one_ratio_heading_graph  = $request->input('quick_ratio_fy_one_ratio_heading_graph');

        $Financial->overall_financial_score  = $request->input('overall_financial_score');
        $Financial->score_analysis  = $request->input('score_analysis');
        $Financial->Type_of_risk = $request->input('overall_financial_score') > 60 ? 'High Risk' : ($request->input('overall_financial_score') <= 60 && $request->input('overall_financial_score') > 30 ? 'Medium Risk' : ($request->input('overall_financial_score') <= 30 ? 'Low Risk' : ''));

        $Financial->save();
        $KeyObservation = KeyObservation::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
        $KeyObservation->status = 1;
        $KeyObservation->save();

        $ThirdParty = ThirdParty::where('id', $request->getThirdPartyForID)->firstOrFail();
        $ThirdParty->status = 1;
        $ThirdParty->save();

        if ($Financial->id) {

            // first director name
            $FinancialsFindingsFyOne = FinancialsFindingsFyOne::where('financial_id', $Financial->id)->firstOrFail();



            $FinancialsFindingsFyOne->revenue_fy_one_finding__1  = $request->input('revenue_fy_one_finding__1');
            $FinancialsFindingsFyOne->year_one_finding__1  = $request->input('year_one_finding__1');
            $FinancialsFindingsFyOne->net_profit_fy_one_finding__1  = $request->input('net_profit_fy_one_finding__1');
            $FinancialsFindingsFyOne->gross_profit_fy_one_finding__1  = $request->input('gross_profit_fy_one_finding__1');
            $FinancialsFindingsFyOne->working_capital_1_fy_one_finding__1  = $request->input('working_capital_1_fy_one_finding__1');
            $FinancialsFindingsFyOne->quick_assets_fy_one_finding__1  = $request->input('quick_assets_fy_one_finding__1');
            $FinancialsFindingsFyOne->total_assets_fy_one_finding__1  = $request->input('total_assets_fy_one_finding__1');
            $FinancialsFindingsFyOne->current_assets_fy_one_finding__1  = $request->input('current_assets_fy_one_finding__1');
            $FinancialsFindingsFyOne->current_liabilities_fy_one_finding__1  = $request->input('current_liabilities_fy_one_finding__1');
            $FinancialsFindingsFyOne->debt_fy_one_finding__1  = $request->input('debt_fy_one_finding__1');
            $FinancialsFindingsFyOne->average_inventory_fy_one_finding__1  = $request->input('average_inventory_fy_one_finding__1');
            $FinancialsFindingsFyOne->net_sales_fy_one_finding__1  = $request->input('net_sales_fy_one_finding__1');
            $FinancialsFindingsFyOne->equity_share_capital_fy_one_finding__1  = $request->input('equity_share_capital_fy_one_finding__1');
            $FinancialsFindingsFyOne->sundry_debtors_fy_one_finding__1  = $request->input('sundry_debtors_fy_one_finding__1');
            $FinancialsFindingsFyOne->sundry_creditors_fy_one_finding__1  = $request->input('sundry_creditors_fy_one_finding__1');
            $FinancialsFindingsFyOne->loans_and_advances_fy_one_finding__1  = $request->input('loans_and_advances_fy_one_finding__1');
            $FinancialsFindingsFyOne->cash_and_cash_equivalents_fy_one_finding__1  = $request->input('cash_and_cash_equivalents_fy_one_finding__1');
            //    $FinancialsFindingsFyOne->overall_financial_score_fy_one_finding__1  = $request->input('overall_financial_score_fy_one_finding__1');

            $FinancialsFindingsFyOne->save();

            $FinancialsFindingsFyTwo = FinancialsFindingsFyTwo::where('financial_id', $Financial->id)->firstOrFail();


            $FinancialsFindingsFyTwo->year_two_finding__1  = $request->input('year_two_finding__1');
            $FinancialsFindingsFyTwo->revenue_fy_two_finding__1  = $request->input('revenue_fy_two_finding__1');
            $FinancialsFindingsFyTwo->net_profit_fy_two_finding__1  = $request->input('net_profit_fy_two_finding__1');
            $FinancialsFindingsFyTwo->gross_profit_fy_two_finding__1  = $request->input('gross_profit_fy_two_finding__1');
            $FinancialsFindingsFyTwo->working_capital_1_fy_two_finding__1  = $request->input('working_capital_1_fy_two_finding__1');
            $FinancialsFindingsFyTwo->quick_assets_fy_two_finding__1  = $request->input('quick_assets_fy_two_finding__1');
            $FinancialsFindingsFyTwo->total_assets_fy_two_finding__1  = $request->input('total_assets_fy_two_finding__1');
            $FinancialsFindingsFyTwo->current_assets_fy_two_finding__1  = $request->input('current_assets_fy_two_finding__1');
            $FinancialsFindingsFyTwo->current_liabilities_fy_two_finding__1  = $request->input('current_liabilities_fy_two_finding__1');
            $FinancialsFindingsFyTwo->debt_fy_two_finding__1  = $request->input('debt_fy_two_finding__1');
            $FinancialsFindingsFyTwo->average_inventory_fy_two_finding__1  = $request->input('average_inventory_fy_two_finding__1');
            $FinancialsFindingsFyTwo->net_sales_fy_two_finding__1  = $request->input('net_sales_fy_two_finding__1');
            $FinancialsFindingsFyTwo->equity_share_capital_fy_two_finding__1  = $request->input('equity_share_capital_fy_two_finding__1');
            $FinancialsFindingsFyTwo->sundry_debtors_fy_two_finding__1  = $request->input('sundry_debtors_fy_two_finding__1');
            $FinancialsFindingsFyTwo->sundry_creditors_fy_two_finding__1  = $request->input('sundry_creditors_fy_two_finding__1');
            $FinancialsFindingsFyTwo->loans_and_advances_fy_two_finding__1  = $request->input('loans_and_advances_fy_two_finding__1');
            $FinancialsFindingsFyTwo->cash_and_cash_equivalents_fy_two_finding__1  = $request->input('cash_and_cash_equivalents_fy_two_finding__1');
            //    $FinancialsFindingsFyTwo->overall_financial_score_fy_two_finding__1  = $request->input('overall_financial_score_fy_two_finding__1');
            $FinancialsFindingsFyTwo->save();





            $FinancialsFindingsFyThree = FinancialsFindingsFyThree::where('financial_id', $Financial->id)->firstOrFail();


            $FinancialsFindingsFyThree->year_three_finding__1  = $request->input('year_three_finding__1');
            $FinancialsFindingsFyThree->revenue_fy_three_finding__1  = $request->input('revenue_fy_three_finding__1');
            $FinancialsFindingsFyThree->net_profit_fy_three_finding__1  = $request->input('net_profit_fy_three_finding__1');
            $FinancialsFindingsFyThree->gross_profit_fy_three_finding__1  = $request->input('gross_profit_fy_three_finding__1');
            $FinancialsFindingsFyThree->working_capital_1_fy_three_finding__1  = $request->input('working_capital_1_fy_three_finding__1');
            $FinancialsFindingsFyThree->quick_assets_fy_three_finding__1  = $request->input('quick_assets_fy_three_finding__1');
            $FinancialsFindingsFyThree->total_assets_fy_three_finding__1  = $request->input('total_assets_fy_three_finding__1');
            $FinancialsFindingsFyThree->current_assets_fy_three_finding__1  = $request->input('current_assets_fy_three_finding__1');
            $FinancialsFindingsFyThree->current_liabilities_fy_three_finding__1  = $request->input('current_liabilities_fy_three_finding__1');
            $FinancialsFindingsFyThree->debt_fy_three_finding__1  = $request->input('debt_fy_three_finding__1');
            $FinancialsFindingsFyThree->average_inventory_fy_three_finding__1  = $request->input('average_inventory_fy_three_finding__1');
            $FinancialsFindingsFyThree->net_sales_fy_three_finding__1  = $request->input('net_sales_fy_three_finding__1');
            $FinancialsFindingsFyThree->equity_share_capital_fy_three_finding__1  = $request->input('equity_share_capital_fy_three_finding__1');
            $FinancialsFindingsFyThree->sundry_debtors_fy_three_finding__1  = $request->input('sundry_debtors_fy_three_finding__1');
            $FinancialsFindingsFyThree->sundry_creditors_fy_three_finding__1  = $request->input('sundry_creditors_fy_three_finding__1');
            $FinancialsFindingsFyThree->loans_and_advances_fy_three_finding__1  = $request->input('loans_and_advances_fy_three_finding__1');
            $FinancialsFindingsFyThree->cash_and_cash_equivalents_fy_three_finding__1  = $request->input('cash_and_cash_equivalents_fy_three_finding__1');
            //    $FinancialsFindingsFyThree->overall_financial_score_fy_three_finding__1  = $request->input('overall_financial_score_fy_three_finding__1');
            $FinancialsFindingsFyThree->save();

            $FinancialsFindingsFyFour = FinancialsFindingsFyFour::where('financial_id', $Financial->id)->firstOrFail();


            $FinancialsFindingsFyFour->year_four_finding__1  = $request->input('year_four_finding__1');
            $FinancialsFindingsFyFour->revenue_fy_four_finding__1  = $request->input('revenue_fy_four_finding__1');
            $FinancialsFindingsFyFour->net_profit_fy_four_finding__1  = $request->input('net_profit_fy_four_finding__1');
            $FinancialsFindingsFyFour->gross_profit_fy_four_finding__1  = $request->input('gross_profit_fy_four_finding__1');
            $FinancialsFindingsFyFour->working_capital_1_fy_four_finding__1  = $request->input('working_capital_1_fy_four_finding__1');
            $FinancialsFindingsFyFour->quick_assets_fy_four_finding__1  = $request->input('quick_assets_fy_four_finding__1');
            $FinancialsFindingsFyFour->total_assets_fy_four_finding__1  = $request->input('total_assets_fy_four_finding__1');
            $FinancialsFindingsFyFour->current_assets_fy_four_finding__1  = $request->input('current_assets_fy_four_finding__1');
            $FinancialsFindingsFyFour->current_liabilities_fy_four_finding__1  = $request->input('current_liabilities_fy_four_finding__1');
            $FinancialsFindingsFyFour->debt_fy_four_finding__1  = $request->input('debt_fy_four_finding__1');
            $FinancialsFindingsFyFour->average_inventory_fy_four_finding__1  = $request->input('average_inventory_fy_four_finding__1');
            $FinancialsFindingsFyFour->net_sales_fy_four_finding__1  = $request->input('net_sales_fy_four_finding__1');
            $FinancialsFindingsFyFour->equity_share_capital_fy_four_finding__1  = $request->input('equity_share_capital_fy_four_finding__1');
            $FinancialsFindingsFyFour->sundry_debtors_fy_four_finding__1  = $request->input('sundry_debtors_fy_four_finding__1');
            $FinancialsFindingsFyFour->sundry_creditors_fy_four_finding__1  = $request->input('sundry_creditors_fy_four_finding__1');
            $FinancialsFindingsFyFour->loans_and_advances_fy_four_finding__1  = $request->input('loans_and_advances_fy_four_finding__1');
            $FinancialsFindingsFyFour->cash_and_cash_equivalents_fy_four_finding__1  = $request->input('cash_and_cash_equivalents_fy_four_finding__1');
            //    $FinancialsFindingsFyFour->overall_financial_score_fy_four_finding__1  = $request->input('overall_financial_score_fy_four_finding__1');
            $FinancialsFindingsFyFour->save();

            $FinancialsFindingsFyFive = FinancialsFindingsFyFive::where('financial_id', $Financial->id)->firstOrFail();


            $FinancialsFindingsFyFive->revenue_fy_five_finding__1  = $request->input('revenue_fy_five_finding__1');
            $FinancialsFindingsFyFive->year_five_finding__1  = $request->input('year_five_finding__1');
            $FinancialsFindingsFyFive->net_profit_fy_five_finding__1  = $request->input('net_profit_fy_five_finding__1');
            $FinancialsFindingsFyFive->gross_profit_fy_five_finding__1  = $request->input('gross_profit_fy_five_finding__1');
            $FinancialsFindingsFyFive->working_capital_1_fy_five_finding__1  = $request->input('working_capital_1_fy_five_finding__1');
            $FinancialsFindingsFyFive->quick_assets_fy_five_finding__1  = $request->input('quick_assets_fy_five_finding__1');
            $FinancialsFindingsFyFive->total_assets_fy_five_finding__1  = $request->input('total_assets_fy_five_finding__1');
            $FinancialsFindingsFyFive->current_assets_fy_five_finding__1  = $request->input('current_assets_fy_five_finding__1');
            $FinancialsFindingsFyFive->current_liabilities_fy_five_finding__1  = $request->input('current_liabilities_fy_five_finding__1');
            $FinancialsFindingsFyFive->debt_fy_five_finding__1  = $request->input('debt_fy_five_finding__1');
            $FinancialsFindingsFyFive->average_inventory_fy_five_finding__1  = $request->input('average_inventory_fy_five_finding__1');
            $FinancialsFindingsFyFive->net_sales_fy_five_finding__1  = $request->input('net_sales_fy_five_finding__1');
            $FinancialsFindingsFyFive->equity_share_capital_fy_five_finding__1  = $request->input('equity_share_capital_fy_five_finding__1');
            $FinancialsFindingsFyFive->sundry_debtors_fy_five_finding__1  = $request->input('sundry_debtors_fy_five_finding__1');
            $FinancialsFindingsFyFive->sundry_creditors_fy_five_finding__1  = $request->input('sundry_creditors_fy_five_finding__1');
            $FinancialsFindingsFyFive->loans_and_advances_fy_five_finding__1  = $request->input('loans_and_advances_fy_five_finding__1');
            $FinancialsFindingsFyFive->cash_and_cash_equivalents_fy_five_finding__1  = $request->input('cash_and_cash_equivalents_fy_five_finding__1');
            //    $FinancialsFindingsFyFive->overall_financial_score_fy_five_finding__1  = $request->input('overall_financial_score_fy_five_finding__1');
            $FinancialsFindingsFyFive->save();




            $FinancialsRatioAnalysisFyOne = FinancialsRatioAnalysisFyOne::where('financial_id', $Financial->id)->firstOrFail();


            $FinancialsRatioAnalysisFyOne->year_ratio_one_1  = $request->input('year_ratio_one_1');
            $FinancialsRatioAnalysisFyOne->current_ratio_fy_one_1  = $request->input('current_ratio_fy_one_1');
            $FinancialsRatioAnalysisFyOne->current_ratio_analysis_fy_one_1  = $request->input('current_ratio_analysis_fy_one_1');
            $FinancialsRatioAnalysisFyOne->debt_ratio_fy_one_1  = $request->input('debt_ratio_fy_one_1');
            $FinancialsRatioAnalysisFyOne->debt_ratio_analysis_fy_one_1  = $request->input('debt_ratio_analysis_fy_one_1');
            $FinancialsRatioAnalysisFyOne->solvency_ratio_fy_one_1  = $request->input('solvency_ratio_fy_one_1');
            $FinancialsRatioAnalysisFyOne->solvency_ratio_analysis_fy_one_1  = $request->input('solvency_ratio_analysis_fy_one_1');
            $FinancialsRatioAnalysisFyOne->debt_to_equity_ratio_fy_one_1  = $request->input('debt_to_equity_ratio_fy_one_1');
            $FinancialsRatioAnalysisFyOne->debt_to_equity_ratio_analysis_fy_one_1  = $request->input('debt_to_equity_ratio_analysis_fy_one_1');
            $FinancialsRatioAnalysisFyOne->asset_turnover_ratio_fy_one_1  = $request->input('asset_turnover_ratio_fy_one_1');
            $FinancialsRatioAnalysisFyOne->asset_turnover_ratio_analysis_fy_one_1  = $request->input('asset_turnover_ratio_analysis_fy_one_1');
            $FinancialsRatioAnalysisFyOne->absolute_liquidity_ratio_fy_one_1  = $request->input('absolute_liquidity_ratio_fy_one_1');
            $FinancialsRatioAnalysisFyOne->absolute_liquidity_ratio_analysis_fy_one_1  = $request->input('absolute_liquidity_ratio_analysis_fy_one_1');
            $FinancialsRatioAnalysisFyOne->proprietary_ratio_fy_one_1  = $request->input('proprietary_ratio_fy_one_1');
            $FinancialsRatioAnalysisFyOne->proprietary_ratio_analysis_fy_one_1  = $request->input('proprietary_ratio_analysis_fy_one_1');
            $FinancialsRatioAnalysisFyOne->net_profit_ratio_fy_one_1  = $request->input('net_profit_ratio_fy_one_1');
            $FinancialsRatioAnalysisFyOne->net_profit_ratio_analysis_fy_one_1  = $request->input('net_profit_ratio_analysis_fy_one_1');
            $FinancialsRatioAnalysisFyOne->gross_profit_ratio_fy_one_1  = $request->input('gross_profit_ratio_fy_one_1');
            $FinancialsRatioAnalysisFyOne->gross_profit_ratio_analysis_fy_one_1  = $request->input('gross_profit_ratio_analysis_fy_one_1');

            $FinancialsRatioAnalysisFyOne->springate_s_score_ratio_fy_one_1  = $request->input('springate_s_score_ratio_fy_one_1');
            $FinancialsRatioAnalysisFyOne->springate_s_score_ratio_analysis_fy_one_1  = $request->input('springate_s_score_ratio_analysis_fy_one_1');

            $FinancialsRatioAnalysisFyOne->trade_receivable_days_ratio_fy_one_1  = $request->input('trade_receivable_days_ratio_fy_one_1');
            $FinancialsRatioAnalysisFyOne->trade_receivable_days_ratio_analysis_fy_one_1  = $request->input('trade_receivable_days_ratio_analysis_fy_one_1');


            $FinancialsRatioAnalysisFyOne->trade_payable_days_ratio_fy_one_1  = $request->input('trade_payable_days_ratio_fy_one_1');
            $FinancialsRatioAnalysisFyOne->trade_payable_days_ratio_analysis_fy_one_1  = $request->input('trade_payable_days_ratio_analysis_fy_one_1');
            $FinancialsRatioAnalysisFyOne->taffler_z_score_ratio_fy_one_1  = $request->input('taffler_z_score_ratio_fy_one_1');
            $FinancialsRatioAnalysisFyOne->taffler_z_score_ratio_analysis_fy_one_1  = $request->input('taffler_z_score_ratio_analysis_fy_one_1');
            $FinancialsRatioAnalysisFyOne->zmijewski_x_score_ratio_fy_one_1  = $request->input('zmijewski_x_score_ratio_fy_one_1');
            $FinancialsRatioAnalysisFyOne->zmijewski_x_score_ratio_analysis_fy_one_1  = $request->input('zmijewski_x_score_ratio_analysis_fy_one_1');
            $FinancialsRatioAnalysisFyOne->quick_ratio_fy_one_1  = $request->input('quick_ratio_fy_one_1');
            $FinancialsRatioAnalysisFyOne->quick_ratio_analysis_fy_one_1  = $request->input('quick_ratio_analysis_fy_one_1');
            $FinancialsRatioAnalysisFyOne->save();

            $FinancialsRatioAnalysisFyTwo = FinancialsRatioAnalysisFyTwo::where('financial_id', $Financial->id)->firstOrFail();



            $FinancialsRatioAnalysisFyTwo->year_ratio_two_1  = $request->input('year_ratio_two_1');
            $FinancialsRatioAnalysisFyTwo->current_ratio_fy_two_1  = $request->input('current_ratio_fy_two_1');
            $FinancialsRatioAnalysisFyTwo->debt_ratio_fy_two_1  = $request->input('debt_ratio_fy_two_1');
            $FinancialsRatioAnalysisFyTwo->solvency_ratio_fy_two_1  = $request->input('solvency_ratio_fy_two_1');
            $FinancialsRatioAnalysisFyTwo->debt_to_equity_ratio_fy_two_1  = $request->input('debt_to_equity_ratio_fy_two_1');
            $FinancialsRatioAnalysisFyTwo->asset_turnover_ratio_fy_two_1  = $request->input('asset_turnover_ratio_fy_two_1');
            $FinancialsRatioAnalysisFyTwo->absolute_liquidity_ratio_fy_two_1  = $request->input('absolute_liquidity_ratio_fy_two_1');
            $FinancialsRatioAnalysisFyTwo->proprietary_ratio_fy_two_1  = $request->input('proprietary_ratio_fy_two_1');
            $FinancialsRatioAnalysisFyTwo->net_profit_ratio_fy_two_1  = $request->input('net_profit_ratio_fy_two_1');
            $FinancialsRatioAnalysisFyTwo->gross_profit_ratio_fy_two_1  = $request->input('gross_profit_ratio_fy_two_1');
            $FinancialsRatioAnalysisFyTwo->springate_s_score_ratio_fy_two_1  = $request->input('springate_s_score_ratio_fy_two_1');
            $FinancialsRatioAnalysisFyTwo->trade_receivable_days_ratio_fy_two_1  = $request->input('trade_receivable_days_ratio_fy_two_1');
            $FinancialsRatioAnalysisFyTwo->trade_payable_days_ratio_fy_two_1  = $request->input('trade_payable_days_ratio_fy_two_1');
            $FinancialsRatioAnalysisFyTwo->taffler_z_score_ratio_fy_two_1  = $request->input('taffler_z_score_ratio_fy_two_1');
            $FinancialsRatioAnalysisFyTwo->zmijewski_x_score_ratio_fy_two_1  = $request->input('zmijewski_x_score_ratio_fy_two_1');
            $FinancialsRatioAnalysisFyTwo->quick_ratio_fy_two_1  = $request->input('quick_ratio_fy_two_1');

            $FinancialsRatioAnalysisFyTwo->save();





            $FinancialsRatioAnalysisFyThree = FinancialsRatioAnalysisFyThree::where('financial_id', $Financial->id)->firstOrFail();
            $FinancialsRatioAnalysisFyThree->year_ratio_three_1  = $request->input('year_ratio_three_1');

            $FinancialsRatioAnalysisFyThree->current_ratio_fy_three_1  = $request->input('current_ratio_fy_three_1');
            $FinancialsRatioAnalysisFyThree->debt_ratio_fy_three_1  = $request->input('debt_ratio_fy_three_1');
            $FinancialsRatioAnalysisFyThree->solvency_ratio_fy_three_1  = $request->input('solvency_ratio_fy_three_1');
            $FinancialsRatioAnalysisFyThree->debt_to_equity_ratio_fy_three_1  = $request->input('debt_to_equity_ratio_fy_three_1');
            $FinancialsRatioAnalysisFyThree->asset_turnover_ratio_fy_three_1  = $request->input('asset_turnover_ratio_fy_three_1');
            $FinancialsRatioAnalysisFyThree->absolute_liquidity_ratio_fy_three_1  = $request->input('absolute_liquidity_ratio_fy_three_1');
            $FinancialsRatioAnalysisFyThree->proprietary_ratio_fy_three_1  = $request->input('proprietary_ratio_fy_three_1');
            $FinancialsRatioAnalysisFyThree->net_profit_ratio_fy_three_1  = $request->input('net_profit_ratio_fy_three_1');
            $FinancialsRatioAnalysisFyThree->gross_profit_ratio_fy_three_1  = $request->input('gross_profit_ratio_fy_three_1');
            $FinancialsRatioAnalysisFyThree->springate_s_score_ratio_fy_three_1  = $request->input('springate_s_score_ratio_fy_three_1');
            $FinancialsRatioAnalysisFyThree->trade_receivable_days_ratio_fy_three_1  = $request->input('trade_receivable_days_ratio_fy_three_1');
            $FinancialsRatioAnalysisFyThree->trade_payable_days_ratio_fy_three_1  = $request->input('trade_payable_days_ratio_fy_three_1');
            $FinancialsRatioAnalysisFyThree->taffler_z_score_ratio_fy_three_1  = $request->input('taffler_z_score_ratio_fy_three_1');
            $FinancialsRatioAnalysisFyThree->zmijewski_x_score_ratio_fy_three_1  = $request->input('zmijewski_x_score_ratio_fy_three_1');
            $FinancialsRatioAnalysisFyThree->quick_ratio_fy_three_1  = $request->input('quick_ratio_fy_three_1');

            $FinancialsRatioAnalysisFyThree->SAVE();





            $FinancialsRatioAnalysisFyFour = FinancialsRatioAnalysisFyFour::where('financial_id', $Financial->id)->firstOrFail();
            $FinancialsRatioAnalysisFyFour->year_ratio_four_1  = $request->input('year_ratio_four_1');

            $FinancialsRatioAnalysisFyFour->current_ratio_fy_four_1  = $request->input('current_ratio_fy_four_1');
            $FinancialsRatioAnalysisFyFour->debt_ratio_fy_four_1  = $request->input('debt_ratio_fy_four_1');
            $FinancialsRatioAnalysisFyFour->solvency_ratio_fy_four_1  = $request->input('solvency_ratio_fy_four_1');
            $FinancialsRatioAnalysisFyFour->debt_to_equity_ratio_fy_four_1  = $request->input('debt_to_equity_ratio_fy_four_1');
            $FinancialsRatioAnalysisFyFour->asset_turnover_ratio_fy_four_1  = $request->input('asset_turnover_ratio_fy_four_1');
            $FinancialsRatioAnalysisFyFour->absolute_liquidity_ratio_fy_four_1  = $request->input('absolute_liquidity_ratio_fy_four_1');
            $FinancialsRatioAnalysisFyFour->proprietary_ratio_fy_four_1  = $request->input('proprietary_ratio_fy_four_1');
            $FinancialsRatioAnalysisFyFour->net_profit_ratio_fy_four_1  = $request->input('net_profit_ratio_fy_four_1');
            $FinancialsRatioAnalysisFyFour->gross_profit_ratio_fy_four_1  = $request->input('gross_profit_ratio_fy_four_1');
            $FinancialsRatioAnalysisFyFour->springate_s_score_ratio_fy_four_1  = $request->input('springate_s_score_ratio_fy_four_1');
            $FinancialsRatioAnalysisFyFour->trade_receivable_days_ratio_fy_four_1  = $request->input('trade_receivable_days_ratio_fy_four_1');
            $FinancialsRatioAnalysisFyFour->trade_payable_days_ratio_fy_four_1  = $request->input('trade_payable_days_ratio_fy_four_1');
            $FinancialsRatioAnalysisFyFour->taffler_z_score_ratio_fy_four_1  = $request->input('taffler_z_score_ratio_fy_four_1');
            $FinancialsRatioAnalysisFyFour->zmijewski_x_score_ratio_fy_four_1  = $request->input('zmijewski_x_score_ratio_fy_four_1');
            $FinancialsRatioAnalysisFyFour->quick_ratio_fy_four_1  = $request->input('quick_ratio_fy_four_1');

            $FinancialsRatioAnalysisFyFour->save();

            $FinancialsRatioAnalysisFyFive = FinancialsRatioAnalysisFyFive::where('financial_id', $Financial->id)->firstOrFail();
            $FinancialsRatioAnalysisFyFive->year_ratio_five_1  = $request->input('year_ratio_five_1');

            $FinancialsRatioAnalysisFyFive->current_ratio_fy_five_1  = $request->input('current_ratio_fy_five_1');
            $FinancialsRatioAnalysisFyFive->debt_ratio_fy_five_1  = $request->input('debt_ratio_fy_five_1');
            $FinancialsRatioAnalysisFyFive->solvency_ratio_fy_five_1  = $request->input('solvency_ratio_fy_five_1');
            $FinancialsRatioAnalysisFyFive->debt_to_equity_ratio_fy_five_1  = $request->input('debt_to_equity_ratio_fy_five_1');
            $FinancialsRatioAnalysisFyFive->asset_turnover_ratio_fy_five_1  = $request->input('asset_turnover_ratio_fy_five_1');
            $FinancialsRatioAnalysisFyFive->absolute_liquidity_ratio_fy_five_1  = $request->input('absolute_liquidity_ratio_fy_five_1');
            $FinancialsRatioAnalysisFyFive->proprietary_ratio_fy_five_1  = $request->input('proprietary_ratio_fy_five_1');
            $FinancialsRatioAnalysisFyFive->net_profit_ratio_fy_five_1  = $request->input('net_profit_ratio_fy_five_1');
            $FinancialsRatioAnalysisFyFive->gross_profit_ratio_fy_five_1  = $request->input('gross_profit_ratio_fy_five_1');
            $FinancialsRatioAnalysisFyFive->springate_s_score_ratio_fy_five_1  = $request->input('springate_s_score_ratio_fy_five_1');
            $FinancialsRatioAnalysisFyFive->trade_receivable_days_ratio_fy_five_1  = $request->input('trade_receivable_days_ratio_fy_five_1');
            $FinancialsRatioAnalysisFyFive->trade_payable_days_ratio_fy_five_1  = $request->input('trade_payable_days_ratio_fy_five_1');
            $FinancialsRatioAnalysisFyFive->taffler_z_score_ratio_fy_five_1  = $request->input('taffler_z_score_ratio_fy_five_1');
            $FinancialsRatioAnalysisFyFive->zmijewski_x_score_ratio_fy_five_1  = $request->input('zmijewski_x_score_ratio_fy_five_1');
            $FinancialsRatioAnalysisFyFive->quick_ratio_fy_five_1  = $request->input('quick_ratio_fy_five_1');

            $FinancialsRatioAnalysisFyFive->save();
        }
        return response()->json(['message' => 'Financial  Reports updated successfully!']);
    }

    function update_Business_Intelligence(Request $request)
    {
        // dd($request->all());

        $BusinessIntelligence = BusinessIntelligence::findOrFail($request->BusinessIntelligenceID);
        if (!$BusinessIntelligence) {
            return response()->json(['error' => 'This Reports not found.']);
        }



        $BusinessIntelligence->operating_efficiency_BI_analysis  = $request->input('operating_efficiency_BI_analysis');
        $BusinessIntelligence->inventory_turnover_BI_analysis  = $request->input('inventory_turnover_BI_analysis');
        $BusinessIntelligence->days_sales_in_inventory_BI_analysis  = $request->input('days_sales_in_inventory_BI_analysis');
        $BusinessIntelligence->accounts_payable_turnover_BI_analysis  = $request->input('accounts_payable_turnover_BI_analysis');

        $BusinessIntelligence->year_BI_FY_one  = $request->input('year_BI_FY_one');
        $BusinessIntelligence->operating_efficiency_BI_FY_one  = $request->input('operating_efficiency_BI_FY_one');
        $BusinessIntelligence->inventory_turnover_BI_FY_one  = $request->input('inventory_turnover_BI_FY_one');
        $BusinessIntelligence->days_sales_in_inventory_BI_FY_one  = $request->input('days_sales_in_inventory_BI_FY_one');
        $BusinessIntelligence->accounts_payable_turnover_BI_FY_one  = $request->input('accounts_payable_turnover_BI_FY_one');


        $BusinessIntelligence->year_BI_FY_two  = $request->input('year_BI_FY_two');
        $BusinessIntelligence->operating_efficiency_BI_FY_two  = $request->input('operating_efficiency_BI_FY_two');
        $BusinessIntelligence->inventory_turnover_BI_FY_two  = $request->input('inventory_turnover_BI_FY_two');
        $BusinessIntelligence->days_sales_in_inventory_BI_FY_two  = $request->input('days_sales_in_inventory_BI_FY_two');
        $BusinessIntelligence->accounts_payable_turnover_BI_FY_two  = $request->input('accounts_payable_turnover_BI_FY_two');

        $BusinessIntelligence->year_BI_FY_three  = $request->input('year_BI_FY_three');
        $BusinessIntelligence->operating_efficiency_BI_FY_three  = $request->input('operating_efficiency_BI_FY_three');
        $BusinessIntelligence->inventory_turnover_BI_FY_three  = $request->input('inventory_turnover_BI_FY_three');
        $BusinessIntelligence->days_sales_in_inventory_BI_FY_three  = $request->input('days_sales_in_inventory_BI_FY_three');
        $BusinessIntelligence->accounts_payable_turnover_BI_FY_three  = $request->input('accounts_payable_turnover_BI_FY_three');



        $BusinessIntelligence->year_BI_FY_four  = $request->input('year_BI_FY_four');
        $BusinessIntelligence->operating_efficiency_BI_FY_four  = $request->input('operating_efficiency_BI_FY_four');
        $BusinessIntelligence->inventory_turnover_BI_FY_four  = $request->input('inventory_turnover_BI_FY_four');
        $BusinessIntelligence->days_sales_in_inventory_BI_FY_four  = $request->input('days_sales_in_inventory_BI_FY_four');
        $BusinessIntelligence->accounts_payable_turnover_BI_FY_four  = $request->input('accounts_payable_turnover_BI_FY_four');


        $BusinessIntelligence->year_BI_FY_five  = $request->input('year_BI_FY_five');
        $BusinessIntelligence->operating_efficiency_BI_FY_five  = $request->input('operating_efficiency_BI_FY_five');
        $BusinessIntelligence->inventory_turnover_BI_FY_five  = $request->input('inventory_turnover_BI_FY_five');
        $BusinessIntelligence->days_sales_in_inventory_BI_FY_five  = $request->input('days_sales_in_inventory_BI_FY_five');
        $BusinessIntelligence->accounts_payable_turnover_BI_FY_five  = $request->input('accounts_payable_turnover_BI_FY_five');


        $BusinessIntelligence->operating_efficiency_BI_heading_graph  = $request->input('operating_efficiency_BI_heading_graph');
        $BusinessIntelligence->inventory_turnover_BI_heading_graph  = $request->input('inventory_turnover_BI_heading_graph');
        $BusinessIntelligence->days_sales_in_inventory_BI_heading_graph  = $request->input('days_sales_in_inventory_BI_heading_graph');
        $BusinessIntelligence->accounts_payable_turnover_BI_heading_graph  = $request->input('accounts_payable_turnover_BI_heading_graph');
        $BusinessIntelligence->efficiency_score  = $request->input('efficiency_score');




        $BusinessIntelligence->score_analysis = $request->input('score_analysis');
        $BusinessIntelligence->Type_of_risk = $request->input('efficiency_score') > 60 ? 'High Risk' : ($request->input('efficiency_score') <= 60 && $request->input('efficiency_score') > 30 ? 'Medium Risk' : ($request->input('efficiency_score') <= 30 ? 'Low Risk' : ''));
        $BusinessIntelligence->status = 1;
        $BusinessIntelligence->save();

        $KeyObservation = KeyObservation::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
        $KeyObservation->status = 1;
        $KeyObservation->save();

        $ThirdParty = ThirdParty::where('id', $request->getThirdPartyForID)->firstOrFail();
        $ThirdParty->status = 1;
        $ThirdParty->save();

        return response()->json(['message' => 'Business Intelligence  Reports updated successfully!']);
    }

    function update_Tax_Return_and_Credit(Request $request)
    {
        // dd($request->all());

        $TaxReurnCredit = TaxReurnCredit::findOrFail($request->TaxReurnCreditID);
        if (!$TaxReurnCredit) {
            return response()->json(['error' => 'This Reports not found.']);
        }


        for ($i = 1; $i <= 5; $i++) {
            $TaxReurnCredit->{"tax_fy$i"}  = $request->input("tax_fy$i");
        }
        for ($i = 1; $i <= 4; $i++) {
            $TaxReurnCredit->{"name_$i"}  = $request->input("name_$i");
            $TaxReurnCredit->{"credit_score_$i"}  = $request->input("credit_score_$i");
            $TaxReurnCredit->{"outstanding_amount_$i"}  = $request->input("outstanding_amount_$i");
            $TaxReurnCredit->{"solvency_$i"}  = $request->input("solvency_$i");
            $TaxReurnCredit->{"payment_history_$i"}  = $request->input("payment_history_$i");
            $TaxReurnCredit->{"credit_dependency_$i"}  = $request->input("credit_dependency_$i");
            $TaxReurnCredit->{"num_of_loans_$i"}  = $request->input("num_of_loans_$i");
        }
        $TaxReurnCredit->overall_credit_history_score  = $request->input('overall_credit_history_score');
        $TaxReurnCredit->score_analysis = $request->input('score_analysis');
        $TaxReurnCredit->Type_of_risk = $request->input('overall_credit_history_score') > 60 ? 'High Risk' : ($request->input('overall_credit_history_score') <= 60 && $request->input('overall_credit_history_score') > 30 ? 'Medium Risk' : ($request->input('overall_credit_history_score') <= 30 ? 'Low Risk' : ''));

        $TaxReurnCredit->save();
        $KeyObservation = KeyObservation::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
        $KeyObservation->status = 1;
        $KeyObservation->save();

        $ThirdParty = ThirdParty::where('id', $request->getThirdPartyForID)->firstOrFail();
        $ThirdParty->status = 1;
        $ThirdParty->save();
        return response()->json(['message' => 'Tax Reurn Credit  Reports updated successfully!']);
    }

    function update_Market_Reputation(Request $request)
    {

        // dd($request->all());
        $MarketReputation = MarketReputation::findOrFail($request->MarketReputationID);
        if (!$MarketReputation) {
            return response()->json(['error' => 'This Reports not found.']);
        }

        if ($request->hasFile('file_path_market_reputations')) {
            $file = $request->file('file_path_market_reputations');
            // Generate a unique filename
            $filename = 'MarketReputations' . '-' . date('dmyHis') . rand() . '.' . $file->getClientOriginalExtension();
            // Move the file to the destination folder
            $file->move(public_path('admin/assets/imgs/MarketReputations/'), $filename);


            $MarketReputation->file_path_market_reputations = $filename;
        }



        $MarketReputation->market_reputation_score  = $request->input('market_reputation_score');
        $MarketReputation->score_analysis = $request->input('score_analysis');
        $MarketReputation->Type_of_risk = $request->input('market_reputation_score') > 60 ? 'High Risk' : ($request->input('market_reputation_score') <= 60 && $request->input('market_reputation_score') > 30 ? 'Medium Risk' : ($request->input('market_reputation_score') <= 30 ? 'Low Risk' : ''));

        $MarketReputation->save();
        $KeyObservation = KeyObservation::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
        $KeyObservation->status = 1;
        $KeyObservation->save();

        $ThirdParty = ThirdParty::where('id', $request->getThirdPartyForID)->firstOrFail();
        $ThirdParty->status = 1;
        $ThirdParty->save();
        return response()->json(['message' => 'Market Reputations  Reports updated successfully!']);
    }

    function update_Key_Observation(Request $request)
    {

        // dd($request->all());
        $KeyObservation = KeyObservation::findOrFail($request->KeyObservationID);
        if (!$KeyObservation) {
            return response()->json(['error' => 'This Reports not found.']);
        }

        if ($request->hasFile('key_observation_final_report_file')) {
            $file = $request->file('key_observation_final_report_file');
            // Generate a unique filename
            $filename = 'KeYoFinalReport' . '-' . date('dmyHis') . rand() . '.' . $file->getClientOriginalExtension();
            // Move the file to the destination folder
            $file->move(public_path('admin/assets/imgs/KeyObservationFinalReports/'), $filename);


            $KeyObservation->key_observation_final_report_file = $filename;
        }



        $KeyObservation->overall_risk_score  = $request->input('overall_risk_score');
        $KeyObservation->score_analysis  = $request->input('score_analysis');
        for ($i = 1; $i <= 25; $i++) {

            $KeyObservation->{"key_observation_$i"} = $request->input("key_observation_$i");
        }

        for ($i = 1; $i <= 25; $i++) {

            $KeyObservation->{"key_recommendations_$i"} = $request->input("key_recommendations_$i");
        }

        $KeyObservation->overall_risk_score = $request->input('overall_risk_score');
        $KeyObservation->status = 3;
        $KeyObservation->Type_of_risk = $request->input('overall_risk_score') > 60 ? 'High Risk' : ($request->input('overall_risk_score') <= 60 && $request->input('overall_risk_score') > 30 ? 'Medium Risk' : ($request->input('overall_risk_score') <= 30 ? 'Low Risk' : ''));

        $KeyObservation->save();

        $FirmBackground = FirmBackground::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
        $FirmBackground->status = 3;
        $FirmBackground->save();

        $BusinessIntelligence = BusinessIntelligence::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
        $BusinessIntelligence->status = 3;
        $BusinessIntelligence->save();

        $CourtCheck = CourtCheck::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
        $CourtCheck->status = 3;
        $CourtCheck->save();

        $Financial = Financial::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
        $Financial->status = 3;
        $Financial->save();

        $MarketReputation = MarketReputation::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
        $MarketReputation->status = 3;
        $MarketReputation->save();

        $OnGroundVerification = OnGroundVerification::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
        $OnGroundVerification->status = 3;
        $OnGroundVerification->save();

        $Document = Document::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
        $Document->status = 3;
        $Document->save();

        $TaxReurnCredit = TaxReurnCredit::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
        $TaxReurnCredit->status = 3;
        $TaxReurnCredit->save();

        $ThirdParty = ThirdParty::findOrFail($request->getThirdPartyForID);
        $ThirdParty->status = 3;
        $ThirdParty->save();


        return response()->json(['message' => 'Key Observation  Reports updated successfully!']);
    }


    function update_resubmited_allreports(Request $request)
    {

        $KeyObservation = KeyObservation::where('third_party_id', $request->thirdpartyId)->firstOrFail();
        $KeyObservation->status = 2;
        $KeyObservation->save();

        $FirmBackground = FirmBackground::where('third_party_id', $request->thirdpartyId)->firstOrFail();
        $FirmBackground->status = 2;
        $FirmBackground->save();

        $BusinessIntelligence = BusinessIntelligence::where('third_party_id', $request->thirdpartyId)->firstOrFail();
        $BusinessIntelligence->status = 2;
        $BusinessIntelligence->save();

        $CourtCheck = CourtCheck::where('third_party_id', $request->thirdpartyId)->firstOrFail();
        $CourtCheck->status = 2;
        $CourtCheck->save();

        $Financial = Financial::where('third_party_id', $request->thirdpartyId)->firstOrFail();
        $Financial->status = 2;
        $Financial->save();

        $MarketReputation = MarketReputation::where('third_party_id', $request->thirdpartyId)->firstOrFail();
        $MarketReputation->status = 2;
        $MarketReputation->save();


        $Document = Document::where('third_party_id', $request->thirdpartyId)->firstOrFail();
        $Document->status = 2;
        $Document->save();


        $OnGroundVerification = OnGroundVerification::where('third_party_id', $request->thirdpartyId)->firstOrFail();
        $OnGroundVerification->status = 2;
        $OnGroundVerification->save();

        $TaxReurnCredit = TaxReurnCredit::where('third_party_id', $request->thirdpartyId)->firstOrFail();
        $TaxReurnCredit->status = 2;
        $TaxReurnCredit->save();

        $ThirdParty = ThirdParty::findOrFail($request->thirdpartyId);
        $ThirdParty->status = 2;
        $ThirdParty->save();

        return response()->json(['message' => 'ALl Reports Re-Submited successfully!']);
    }

    function update_completed_allreports(Request $request)
    {

        $KeyObservation = KeyObservation::where('third_party_id', $request->thirdpartyId)->firstOrFail();
        $KeyObservation->status = 3;
        $KeyObservation->save();

        $FirmBackground = FirmBackground::where('third_party_id', $request->thirdpartyId)->firstOrFail();
        $FirmBackground->status = 3;
        $FirmBackground->save();

        $BusinessIntelligence = BusinessIntelligence::where('third_party_id', $request->thirdpartyId)->firstOrFail();
        $BusinessIntelligence->status = 3;
        $BusinessIntelligence->save();

        $CourtCheck = CourtCheck::where('third_party_id', $request->thirdpartyId)->firstOrFail();
        $CourtCheck->status = 3;
        $CourtCheck->save();

        $Financial = Financial::where('third_party_id', $request->thirdpartyId)->firstOrFail();
        $Financial->status = 3;
        $Financial->save();

        $MarketReputation = MarketReputation::where('third_party_id', $request->thirdpartyId)->firstOrFail();
        $MarketReputation->status = 3;
        $MarketReputation->save();

        $OnGroundVerification = OnGroundVerification::where('third_party_id', $request->thirdpartyId)->firstOrFail();
        $OnGroundVerification->status = 3;
        $OnGroundVerification->save();

        $TaxReurnCredit = TaxReurnCredit::where('third_party_id', $request->thirdpartyId)->firstOrFail();
        $TaxReurnCredit->status = 3;
        $TaxReurnCredit->save();

        $Document = Document::where('third_party_id', $request->thirdpartyId)->firstOrFail();
        $Document->status = 3;
        $Document->save();

        $ThirdParty = ThirdParty::findOrFail($request->thirdpartyId);
        $ThirdParty->status = 3;
        $ThirdParty->save();

        return response()->json(['message' => 'ALl Reports Comapleted successfully!']);
    }


    public function firm_file_download($id,$index)
    {
       
        $id = base64_decode($id);
        $License = License::find($id);

        if (!$License) {
            abort(404);
        }

        $fileIndex = (int) $index;

        // Ensure the index is valid
        if ($fileIndex < 1 || $fileIndex > 8) {
            abort(404);
        }

        $fileName = $License->{"licenses_upload_file_$fileIndex"};

        if (!$fileName) {
            abort(404);
        }

        $filePath = public_path('admin/assets/imgs/firmBacgroundImages/' . $fileName);

        // Check if the file exists
        if (!file_exists($filePath)) {
            abort(404);
        }

        // Specify the desired file name
        $downloadFileName = $fileName;

        // Return the file for download
        return response()->download($filePath, $downloadFileName);
    }
    public function onGround_file_download($id)
    {
        $id = base64_decode($id);
        $data['OnGroundVerification'] = OnGroundVerification::where('id', $id)->first();
        // dd($data['OnGroundVerification']);

        // Replace 'path/to/your/image.jpg' with the actual path to your image
        $imagePath = public_path('admin/assets/imgs/OnGroundVerification/' . $data['OnGroundVerification']->upload_picture);

        // Specify the desired file name
        $fileName = $data['OnGroundVerification']->upload_picture;

        return response()->download($imagePath, $fileName);
    }
    // public function document_file_download($id)
    // {
    //     $id = base64_decode($id);
    //     $data['Document'] = Document::where('id', $id)->first();
    //     // dd($data['Document']);

    //     // Replace 'path/to/your/image.jpg' with the actual path to your image
    //     $imagePath = public_path('admin/assets/imgs/Document/' . $data['Document']->document_upload);


    //     // Specify the desired file name
    //     $fileName = $data['Document']->document_upload;

    //     return response()->download($imagePath, $fileName);
    // }

    public function document_file_download($id, $index)
    {
        $id = base64_decode($id);
        $document = Document::find($id);

        if (!$document) {
            abort(404);
        }

        $fileIndex = (int) $index;

        // Ensure the index is valid
        if ($fileIndex < 1 || $fileIndex > 15) {
            abort(404);
        }

        $fileName = $document->{"document_upload_file$fileIndex"};

        if (!$fileName) {
            abort(404);
        }

        $filePath = public_path('admin/assets/imgs/Document/' . $fileName);

        // Check if the file exists
        if (!file_exists($filePath)) {
            abort(404);
        }

        // Specify the desired file name
        $downloadFileName = $fileName;

        // Return the file for download
        return response()->download($filePath, $downloadFileName);
    }


    // public function document_file_view($id)
    // {
    //     $id = base64_decode($id);
    //     $data['Document'] = Document::where('id', $id)->first();

    //     // Replace 'path/to/your/image.jpg' with the actual path to your image
    //     $imagePath  = public_path('admin/assets/imgs/Document/' . $data['Document']->document_upload);

    //     // Specify the desired file name
    //     $fileName = $data['Document']->document_upload;

    //     // return response()->download($imagePath, $fileName);
    //     return response()->file($imagePath, ['Content-Type' => mime_content_type($imagePath)]);
    // }

    public function document_file_view($id, $index)
    {
        $id = base64_decode($id);
        $document = Document::find($id);

        if (!$document) {
            abort(404);
        }

        $fileIndex = (int) $index;

        // Ensure the index is valid
        if ($fileIndex < 1 || $fileIndex > 15) {
            abort(404);
        }

        $fileName = $document->{"document_upload_file$fileIndex"};

        if (!$fileName) {
            abort(404);
        }

        $filePath = public_path('admin/assets/imgs/Document/' . $fileName);

        // Check if the file exists
        if (!file_exists($filePath)) {
            abort(404);
        }

        // Get the MIME type of the file
        $mimeType = mime_content_type($filePath);

        // Set the response headers
        $headers = [
            'Content-Type' => $mimeType,
        ];

        // Return the file with appropriate headers
        return response()->file($filePath, $headers);
    }


    public function firm_file_view($id, $index)
    {
      
        $id = base64_decode($id);
        $License = License::find($id);

        if (!$License) {
            abort(404);
        }

        $fileIndex = (int) $index;

        // Ensure the index is valid
        if ($fileIndex < 1 || $fileIndex > 8) {
            abort(404);
        }

        $fileName = $License->{"licenses_upload_file_$fileIndex"};

        if (!$fileName) {
            abort(404);
        }

        $filePath = public_path('admin/assets/imgs/firmBacgroundImages/'  . $fileName);

        // Check if the file exists
        if (!file_exists($filePath)) {
            abort(404);
        }

        // Get the MIME type of the file
        $mimeType = mime_content_type($filePath);

        // Set the response headers
        $headers = [
            'Content-Type' => $mimeType,
        ];

        // Return the file with appropriate headers
        return response()->file($filePath, $headers);
    }



    public function onGround_file_view($id)
    {
        $id = base64_decode($id);
        $data['OnGroundVerification'] = OnGroundVerification::where('id', $id)->first();

        // Replace 'path/to/your/file' with the actual path to your file
        $filePath = public_path('admin/assets/imgs/OnGroundVerification/' . $data['OnGroundVerification']->upload_picture);

        // Specify the desired file name
        $fileName = $data['OnGroundVerification']->upload_picture;

        // Return a file response
        return response()->file($filePath, ['Content-Type' => mime_content_type($filePath)]);
    }



    public function final_Reprts_file_download($id)
    {
        $id = base64_decode($id);
        $data['KeyObservation'] = KeyObservation::where('id', $id)->first();

        // Replace 'path/to/your/image.jpg' with the actual path to your image
        $imagePath = public_path('admin/assets/imgs/KeyObservationFinalReports/' . $data['KeyObservation']->key_observation_final_report_file);

        // Specify the desired file name
        $fileName = $data['KeyObservation']->key_observation_final_report_file;

        return response()->download($imagePath, $fileName);
    }


    public function generate_pdf_of_reports($id)
    {
        // dd($id);
        $data['BusinessIntelligence'] = BusinessIntelligence::where('third_party_id', $id)->first();
        $data['CourtCheck'] = CourtCheck::where('third_party_id', $id)->first();
        $data['Financial'] = Financial::where('third_party_id', $id)->first();
        $data['KeyObservation'] = KeyObservation::where('third_party_id', $id)->first();
        $data['MarketReputation'] = MarketReputation::where('third_party_id', $id)->first();
        $data['OnGroundVerification'] = OnGroundVerification::where('third_party_id', $id)->first();
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

        $data['FirmBackground'] = FirmBackground::where('third_party_id', $id)->first();
        $data['FirstDirectorsFirm'] = FirstDirectorsFirm::where('firm_background_id', $data['FirmBackground']->id)->first();
        $data['SecondDirectorsFirm'] = SecondDirectorsFirm::where('firm_background_id', $data['FirmBackground']->id)->first();
        $data['ThirdDirectorsFirm'] = ThirdDirectorsFirm::where('firm_background_id', $data['FirmBackground']->id)->first();
        $data['License'] = License::where('firm_background_id', $data['FirmBackground']->id)->first();
        $data['getThirdPartyForID'] = ThirdParty::where('id', $id)->first();
        $data['Getclient'] = User::where('id', $data['getThirdPartyForID']->user_id)->first();
        $data['GetTeaMuser'] = TeamUser::where('id', $data['FirmBackground']->team_user_id)->first();
        $contxt = stream_context_create([
            'ssl' => [
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                'allow_self_signed' => TRUE,

            ]
        ]);


        $pdf = PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->getDomPDF()->setHttpContext($contxt);
        //#################################################################################

        $pdf->setOptions(['isPhpEnabled' => true])->loadView('admin.report.all_reports_pdf', $data)
            ->setOptions(['defaultFont' => 'sans-serif']);
        // return View('admin.sale-invoices.trade-buyer-invoice-2', ['tradeInvoices' =>$data, 'path_img_jrais' => $path_img_jrais, 'path_img_logo' => $path_img_logo,]);
        $fecha = date('d/m/Y');
        return $pdf->download("reports-" . strtoupper(utf8_decode($id)) . "-detail-" . $fecha . ".pdf");
    }
    // vender  means Third-party list end









    //  public function memberSendMail()
    // {

    //     $curr = date('Y-m-d');
    //     $validate = date('Y-m-d', strtotime('+5 days', strtotime($curr)));
    //     $data = User::where('is_feature',1)
    //                 ->whereHas('featured', function($q) use ($validate){
    //                     return $q->where('expired_date', $validate);
    //                 })
    //                 ->orderby('created_at', 'Desc')->get();

    //     foreach ($data as $val) {

    //         $to_name = $val->name;
    //         $to_email = $val->email;
    //         $data = array("name"=>$val->name);

    //         Mail::send('mail.sendMail', $data, function($message) use ($to_name, $to_email) {
    //         $message->to($to_email, $to_name)
    //         ->subject("Subscription Expiry Notification");
    //         $message->from("Info@bsb.com","BSB");
    //         });

    //     }

    //     return redirect()->back()->with('success', 'Email has been sent successfully');



    // }




}
