<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\BusinessIntelligence;
use App\Models\CourtCheck;
use App\Models\Department;
use App\Models\Document;
use App\Models\Financial;
use App\Models\FinancialsFindingsFyFive;
use App\Models\FinancialsFindingsFyFour;
use App\Models\FinancialsFindingsFyOne;
use App\Models\FinancialsFindingsFyThree;
use App\Models\FinancialsFindingsFyTwo;
use App\Models\FinancialsRatioAnalysisFyFive;
use App\Models\FinancialsRatioAnalysisFyFour;
use App\Models\FinancialsRatioAnalysisFyOne;
use App\Models\FinancialsRatioAnalysisFyThree;
use App\Models\FinancialsRatioAnalysisFyTwo;
use App\Models\FirmBackground;
use App\Models\FirstDirectorsFirm;
use App\Models\KeyObservation;
use App\Models\License;
use App\Models\MarketReputation;
use App\Models\OnGroundVerification;
use App\Models\SecondDirectorsFirm;
use App\Models\TaxReurnCredit;
use App\Models\team\TeamUser;
use App\Models\ThirdDirectorsFirm;
use App\Models\ThirdParty;
use App\Models\User;
use App\Models\Zone;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use PDF;
use DB;

class userController extends Controller
{
    //
    public function index()
    {
        if (auth()->user()) {
            $data['title'] = "Client Dashboard";
            $data['page'] = "Dashboard";
            $data['pageIntro'] = "Welcome to Alt-i – Your 360° Risk Management Solution";
            $data['pageDescription'] = "";
            $highRiskCOunt = KeyObservation::
            where('Type_of_risk', 'High Risk')->
            where(['user_id' => auth()->user()->id, 'status' => 3])->
            count();
            $mediumRiskCOunt = KeyObservation::
            where('Type_of_risk', 'Medium Risk')->
            where(['user_id' => auth()->user()->id, 'status' => 3])->
            count();
            $lowRiskCOunt = KeyObservation::
            where('Type_of_risk', 'Low Risk')->
            where(['user_id' => auth()->user()->id, 'status' => 3])->
            count();
            $data['totalRisk'] = $highRiskCOunt + $mediumRiskCOunt + $lowRiskCOunt;

            // dd( $data['totalRisk'] );

            // Calculate percentages
            $data['highRiskPercentage'] = $data['totalRisk'] > 0 ? number_format(($highRiskCOunt * 100) / $data['totalRisk'], 2, '.', '') : 0;
            $data['mediumRiskPercentage'] = $data['totalRisk'] > 0 ? number_format(($mediumRiskCOunt * 100) / $data['totalRisk'], 2, '.', '') : 0;
            $data['lowRiskPercentage'] = $data['totalRisk'] > 0 ? number_format(($lowRiskCOunt * 100) / $data['totalRisk'], 2, '.', '') : 0;


            // Pass percentages instead of counts
            $data['dougGraphHighRisk'] = [
                $data['highRiskPercentage'],
                100 - $data['highRiskPercentage'],
            ];

            $data['dougGraphMediumRisk'] = [
                $data['mediumRiskPercentage'],
                100 - $data['mediumRiskPercentage'],
            ];

            $data['dougGraphLowRisk'] = [
                $data['lowRiskPercentage'],
                100 - $data['lowRiskPercentage'],
                ];


            // $data['OverallRisk'] = [
            //     $totalRisk,
            //     0,
            // ];

        //================================= departmen thirdparty risk ======================
            $departRiskCounts = DB::table('departments')
            ->leftJoin('third_parties', 'departments.id', '=', 'third_parties.department_id')
            ->leftJoin('key_observations', 'third_parties.id', '=', 'key_observations.third_party_id')
            ->where(['key_observations.user_id' => auth()->user()->id, 'key_observations.status' => 3])
            ->select('departments.dept_name as department', 'key_observations.Type_of_risk', DB::raw('COALESCE(COUNT(*), 0) as count'))
            ->groupBy('departments.id', 'departments.dept_name', 'key_observations.Type_of_risk')
            ->get();

            // Organize the data by department and risk type
            $result = [];
            foreach ($departRiskCounts as $count) {
                $result[$count->department][$count->Type_of_risk] = $count->count;
            }

            // Prepare data for the JavaScript chart
            $data['labels'] = array_keys($result);
            $data['highRiskCounts_department'] = [];
            $data['mediumRiskCounts_department'] = [];
            $data['lowRiskCounts_department'] = [];

            foreach ($result as $department => $departRiskCounts) {
                $data['highRiskCounts_department'][] = $departRiskCounts['High Risk'] ?? 0;
                $data['mediumRiskCounts_department'][] = $departRiskCounts['Medium Risk'] ?? 0;
                $data['lowRiskCounts_department'][] = $departRiskCounts['Low Risk'] ?? 0;
            }


        //================================= departmen thirdparty risk end ======================

        //================================= location/Zone thirdparty risk start ======================
        $zoneRiskCounts = DB::table('zones')
        ->leftJoin('third_parties', 'zones.id', '=', 'third_parties.zone_id')
        ->leftJoin('key_observations', 'third_parties.id', '=', 'key_observations.third_party_id')
        ->where(['key_observations.user_id' => auth()->user()->id, 'key_observations.status' => 3])
        ->select('zones.zone_name as zone', 'key_observations.Type_of_risk', DB::raw('COALESCE(COUNT(*), 0) as count'))
        ->groupBy('zones.id', 'zones.zone_name', 'key_observations.Type_of_risk')
        ->get();

        // Organize the data by zone and risk type
        $result_zone = [];
        foreach ($zoneRiskCounts as $count) {
            $result_zone[$count->zone][$count->Type_of_risk] = $count->count;
        }

        // Prepare data for the JavaScript chart
        $data['labels_zone'] = array_keys($result_zone);

        $data['highRiskCounts_zone'] = [];
        $data['mediumRiskCounts_zone'] = [];
        $data['lowRiskCounts_zone'] = [];

        foreach ($result_zone as $zone => $zoneRiskCounts) {
            // Check if the index exists before accessing it
            $data['highRiskCounts_zone'][] = isset($zoneRiskCounts['High Risk']) ? $zoneRiskCounts['High Risk'] : 0;
            $data['mediumRiskCounts_zone'][] = isset($zoneRiskCounts['Medium Risk']) ? $zoneRiskCounts['Medium Risk'] : 0;
            $data['lowRiskCounts_zone'][] = isset($zoneRiskCounts['Low Risk']) ? $zoneRiskCounts['Low Risk'] : 0;
        }

        // dd($data['highRiskCounts_zone'] ,$data['mediumRiskCounts_zone'] );


        //================================= location/Zone thirdparty risk end ======================




            // Reputation count
            $RegulatoryCountHigh = FirmBackground::where(['user_id' => auth()->user()->id, 'status' => 3])->where('Type_of_risk', 'High Risk')->count();
            $RegulatoryCountMedium = FirmBackground::where(['user_id' => auth()->user()->id, 'status' => 3])->where('Type_of_risk', 'Medium Risk')->count();
            $RegulatoryCountLow = FirmBackground::where(['user_id' => auth()->user()->id, 'status' => 3])->where('Type_of_risk', 'Low Risk')->count();
            $data['RegulatoryCount'] = [
                $RegulatoryCountHigh,
                $RegulatoryCountMedium,
                   $RegulatoryCountLow,
            ];

            // dd( $data['RegulatoryCount']);


            // Legal count
            $legalCountHigh = CourtCheck::where(['user_id' => auth()->user()->id, 'status' => 3])->where('Type_of_risk', 'High Risk')->count();
            $legalCountMedium = CourtCheck::where(['user_id' => auth()->user()->id, 'status' => 3])->where('Type_of_risk', 'Medium Risk')->count();
            $legalCountLow = CourtCheck::where(['user_id' => auth()->user()->id, 'status' => 3])->where('Type_of_risk', 'Low Risk')->count();
            $data['legalCount'] = [
                $legalCountHigh,
                $legalCountMedium,
                   $legalCountLow,
            ];

             // Financial count
             $financialCountHigh = Financial::where(['user_id' => auth()->user()->id, 'status' => 3])->where('Type_of_risk', 'High Risk')->count();
             $financialCountMedium = Financial::where(['user_id' => auth()->user()->id, 'status' => 3])->where('Type_of_risk', 'Medium Risk')->count();
             $financialCountLow = Financial::where(['user_id' => auth()->user()->id, 'status' => 3])->where('Type_of_risk', 'Low Risk')->count();
             $data['financialCount'] = [
                 $financialCountHigh,
                 $financialCountMedium,
                    $financialCountLow,
             ];

                // Opertional count
                $taxReurnCreditCountHigh = BusinessIntelligence::where(['user_id' => auth()->user()->id, 'status' => 3])->where('Type_of_risk', 'High Risk')->count();
                $taxReurnCreditCountMedium = BusinessIntelligence::where(['user_id' => auth()->user()->id, 'status' => 3])->where('Type_of_risk', 'Medium Risk')->count();
                $taxReurnCreditCountLow = BusinessIntelligence::where(['user_id' => auth()->user()->id, 'status' => 3])->where('Type_of_risk', 'Low Risk')->count();
                $data['taxReurnCreditCount'] = [
                    $taxReurnCreditCountHigh,
                    $taxReurnCreditCountMedium,
                       $taxReurnCreditCountLow,
                ];
              // Regulatary count
              $marketReputationCountHigh = MarketReputation::where(['user_id' => auth()->user()->id, 'status' => 3])->where('Type_of_risk', 'High Risk')->count();
              $marketReputationCountMedium = MarketReputation::where(['user_id' => auth()->user()->id, 'status' => 3])->where('Type_of_risk', 'Medium Risk')->count();
              $marketReputationCountLow = MarketReputation::where(['user_id' => auth()->user()->id, 'status' => 3])->where('Type_of_risk', 'Low Risk')->count();
              $data['regulataryCount'] = [
                  $marketReputationCountHigh,
                  $marketReputationCountMedium,
                     $marketReputationCountLow,
              ];

              $data['highRiskCOunt'] = $highRiskCOunt;
              $data['mediumRiskCOunt'] = $mediumRiskCOunt;
                 $data['lowRiskCOunt'] = $lowRiskCOunt;
            // dd( $data);

            return view('company.index', $data);
        } else {
            return redirect()->route('web.login');
        }
    }

    // public function enteryReportsData()
    // {
    //     $data['title'] = "Entery Reports";
    //     $data['page'] = "Entry Reports";
    //     $data['pageIntro'] = "Introducing Client Reports";
    //     $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
    //     return view('company.reports.entry-reports',$data);
    // }
    public function report_List(Request $request)
    {
        // $dataType = gettype($request->all());
        // dd($request->all());


        $data['title'] = "Reports Managment";
        $data['page'] = "Reports Managment";
        $data['pageIntro'] = "Insights List";
        $data['pageDescription'] = "";
        // $data['getallThirdParty'] = ThirdParty::where('user_id', auth()->user()->id)->get();
        $query = ThirdParty::where(['user_id' => auth()->user()->id, 'status' => 3]);
        // dd($query );

        if (isset($request->searchThirdparty) && !empty($request->searchThirdparty)) {
            $ThirdPartyName = $request->input('searchThirdparty');
            $query->where(function($query) use ($ThirdPartyName) {
                $query->orWhere('third_party_name', 'like', '%' . $ThirdPartyName . '%')
                      ->orWhere('third_party_email', 'like', '%' . $ThirdPartyName . '%')
                      ->orWhere('third_party_phone', 'like', '%' . $ThirdPartyName . '%')
                      ->orWhere('third_party_pos', 'like', '%' . $ThirdPartyName . '%')
                      ->orWhere('third_party_address', 'like', '%' . $ThirdPartyName . '%');

            });
        }


        if (isset($request->PartyName) && is_array($request->PartyName) && !empty($request->PartyName)) {
            $decodedPartyNames = array_map(function ($PartyName) {
                return base64_decode($PartyName);
            }, $request->PartyName);
            $PartyName = array_map('intval', $decodedPartyNames);
            $query->whereIn('id', $PartyName);
        }

        if (isset($request->location) && is_array($request->location) && !empty($request->location) || !empty($request->Location) ) {


            if(gettype($request->Location)== "string"){
                $getLocationId =Zone::where('zone_name', $request->Location)->first();
                $query->where('zone_id', $getLocationId->id);
            }else{

                $decodedlocations = array_map(function ($location) {
                    return base64_decode($location);
                }, $request->location);

                $location = array_map('intval', $decodedlocations);

                $query->whereIn('zone_id', $location);

            }

        }


        if (isset($request->State) && is_array($request->State) && !empty($request->State)) {
            $decodedStates = array_map(function ($state) {
                return base64_decode($state);
            }, $request->State);

            // Now $decodedStates contains the decoded values of each element in $request->State

            // Assuming that the decoded values are integers, you can convert them to an array of integers
            $state = array_map('intval', $decodedStates);

            $query->whereIn('state_id', $state);
        }

        if (isset($request->Department) && is_array($request->Department) || !empty($request->Department) ) {
            if(gettype($request->Department)== "string"){
                $getIdepId =Department::where('dept_name', $request->Department)->first();
                $query->where('department_id', $getIdepId->id);
            }else{
                $decodedDepartments = array_map(function ($Department) {
                    return base64_decode($Department);
                }, $request->Department);
                $Department = array_map('intval', $decodedDepartments);
                $query->whereIn('department_id', $Department);

            }


        }

        if (isset($request->overallRisk) && !empty($request->overallRisk)) {
            $overallRisk = $request->overallRisk;
            $observationIds = KeyObservation::where('user_id', auth()->user()->id)
                ->where('Type_of_risk', $overallRisk)
                ->pluck('third_party_id'); // Assuming there is a column named 'third_party_id' in KeyObservation table

            $query->whereIn('id', $observationIds);
        }

        if (isset($request->HighRisk) && !empty($request->HighRisk) || !empty($request->TotalHighRisk) ) {

            $observationIds = KeyObservation::where('user_id', auth()->user()->id)
                ->where('Type_of_risk', 'High Risk')
                ->pluck('third_party_id'); // Assuming there is a column named 'third_party_id' in KeyObservation table

            $query->whereIn('id', $observationIds);
        }

        if (isset($request->MediumRisk) && !empty($request->MediumRisk) || !empty($request->TotalMediumRisk) ) {

            $observationIds = KeyObservation::where('user_id', auth()->user()->id)
                ->where('Type_of_risk', 'Medium Risk')
                ->pluck('third_party_id'); // Assuming there is a column named 'third_party_id' in KeyObservation table

            $query->whereIn('id', $observationIds);
        }

        if (isset($request->LowRisk) && !empty($request->LowRisk) || !empty($request->TotalLowRisk) ) {

            $observationIds = KeyObservation::where('user_id', auth()->user()->id)
                ->where('Type_of_risk', 'Low Risk')
                ->pluck('third_party_id'); // Assuming there is a column named 'third_party_id' in KeyObservation table

            $query->whereIn('id', $observationIds);
        }

        if (isset($request->riskType) && !empty($request->riskType)) {

            if ($request->riskType === "Reputation") {
                $MarketReputation = MarketReputation::where('user_id', auth()->user()->id)
                    ->where('market_reputation_score', '<>', null)
                    ->where('status',  '=', 3)

                    ->pluck('third_party_id');
                // dd($MarketReputation);
                $query->whereIn('id', $MarketReputation);
            }

            if ($request->riskType === "Legal") {
                $CourtCheck = CourtCheck::where('user_id', auth()->user()->id)
                    ->where('legal_score',  '<>', null)
                    ->where('status',  '=', 3)

                    ->pluck('third_party_id');

                $query->whereIn('id', $CourtCheck);
            }
            if ($request->riskType === "Financial") {
                $Financial = Financial::where('user_id', auth()->user()->id)
                    ->where('overall_financial_score',  '<>', null)
                    ->where('status',  '=', 3)

                    ->pluck('third_party_id');

                $query->whereIn('id', $Financial);
            }
            if ($request->riskType === "Operational") {
                $TaxReurnCredit = BusinessIntelligence::where('user_id', auth()->user()->id)
                    ->where('efficiency_score',  '<>', null)
                    ->where('status',  '=', 3)

                    ->pluck('third_party_id');

                $query->whereIn('id', $TaxReurnCredit);
            }
            if ($request->riskType === "Regulatory") {
                $firmBackground = FirmBackground::where('user_id', auth()->user()->id)
                    ->where('regulatory_score',  '<>', null)
                    ->where('status',  '=', 3)

                    ->pluck('third_party_id');

                $query->whereIn('id', $firmBackground);
            }

        }

        // graph chart search risk
        if (isset($request->Regulatory) && !empty($request->Regulatory)) {

            $observationIds = FirmBackground::where('user_id', auth()->user()->id)
                ->where('Type_of_risk', $request->Regulatory)
                    ->where('status',  '=', 3)
                ->pluck('third_party_id'); // Assuming there is a column named 'third_party_id' in KeyObservation table

            $query->whereIn('id', $observationIds);
        }
        if (isset($request->Legal) && !empty($request->Legal)) {

            $observationIds = CourtCheck::where('user_id', auth()->user()->id)
                ->where('Type_of_risk', $request->Legal)
                    ->where('status',  '=', 3)
                ->pluck('third_party_id'); // Assuming there is a column named 'third_party_id' in KeyObservation table

            $query->whereIn('id', $observationIds);
        }

        if (isset($request->Financial) && !empty($request->Financial)) {

            $observationIds = Financial::where('user_id', auth()->user()->id)
                ->where('Type_of_risk', $request->Financial)
                    ->where('status',  '=', 3)
                ->pluck('third_party_id'); // Assuming there is a column named 'third_party_id' in KeyObservation table

            $query->whereIn('id', $observationIds);
        }

        if (isset($request->Operational) && !empty($request->Operational)) {

            $observationIds = BusinessIntelligence::where('user_id', auth()->user()->id)
                ->where('Type_of_risk', $request->Operational)
                    ->where('status',  '=', 3)
                ->pluck('third_party_id'); // Assuming there is a column named 'third_party_id' in KeyObservation table

            $query->whereIn('id', $observationIds);
        }

        if (isset($request->Reputation) && !empty($request->Reputation)) {

            $observationIds = MarketReputation::where('user_id', auth()->user()->id)
                ->where('Type_of_risk', $request->Reputation)
                    ->where('status',  '=', 3)
                ->pluck('third_party_id'); // Assuming there is a column named 'third_party_id' in KeyObservation table

            $query->whereIn('id', $observationIds);
        }





        $data['getallThirdParty'] = $query->get();
        // dd($data);
        return view('company.reports.index', $data);

    }

    public function viewReportsData($id)
    {
        $id = base64_decode($id);
        $data['title'] = "View Reports";
        $data['page'] = "View Reports";
        $data['pageIntro'] = "Insight View";
        $data['pageDescription'] = "";
        $data['BusinessIntelligence'] = BusinessIntelligence::where('third_party_id', $id)->first();

// ===================================================== Business graph start ===================


                $data['businessInteligenceGrapFY_accounts_payable'] = [

                    $data['BusinessIntelligence']->accounts_payable_turnover_BI_FY_one,
                    $data['BusinessIntelligence']->accounts_payable_turnover_BI_FY_two,
                    $data['BusinessIntelligence']->accounts_payable_turnover_BI_FY_three,
                    $data['BusinessIntelligence']->accounts_payable_turnover_BI_FY_four,
                    $data['BusinessIntelligence']->accounts_payable_turnover_BI_FY_five,

                ];
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
        $getKeyObservationOutOf = 100 - $getKwyObservationScore ;
        $data['finalValueforGraKeyObservation'] = [
            $getKwyObservationScore,
            $getKeyObservationOutOf,
        ];

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


        $data['FinancialsFindingsFyFiveGraphLableName'] = FinancialsFindingsFyFive::where('financial_id',$data['Financial']->id)->pluck('year_five_finding__1');
        $data['FinancialsFindingsFyFourGraphLableName'] = FinancialsFindingsFyFour::where('financial_id',$data['Financial']->id)->pluck('year_four_finding__1');
        $data['FinancialsFindingsFyThreeGraphLableName'] = FinancialsFindingsFyThree::where('financial_id',$data['Financial']->id)->pluck('year_three_finding__1');
        $data['FinancialsFindingsFyTwoGraphLableName'] = FinancialsFindingsFyTwo::where('financial_id',$data['Financial']->id)->pluck('year_two_finding__1');
        $data['FinancialsFindingsFyOneGraphLableName'] = FinancialsFindingsFyOne::where('financial_id',$data['Financial']->id)->pluck('year_one_finding__1');

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


        $data['FinancialsRatioAnalysisFyFiveGraphLabelNames'] = FinancialsRatioAnalysisFyFive::where('financial_id',$data['Financial']->id)->pluck('year_ratio_five_1');
        $data['FinancialsRatioAnalysisFyFourGraphLabelNames'] = FinancialsRatioAnalysisFyFour::where('financial_id',$data['Financial']->id)->pluck('year_ratio_four_1');
        $data['FinancialsRatioAnalysisFyThreeGraphLabelNames'] = FinancialsRatioAnalysisFyThree::where('financial_id',$data['Financial']->id)->pluck('year_ratio_three_1');
        $data['FinancialsRatioAnalysisFyTwoGraphLabelNames'] = FinancialsRatioAnalysisFyTwo::where('financial_id',$data['Financial']->id)->pluck('year_ratio_two_1');
        $data['FinancialsRatioAnalysisFyOneGraphLabelNames'] = FinancialsRatioAnalysisFyOne::where('financial_id',$data['Financial']->id)->pluck('year_ratio_one_1');


        $data['financialRatioGrapFYhLablesName'] = [

            $data['FinancialsRatioAnalysisFyOneGraphLabelNames'],
            $data['FinancialsRatioAnalysisFyTwoGraphLabelNames'],
            $data['FinancialsRatioAnalysisFyThreeGraphLabelNames'],
            $data['FinancialsRatioAnalysisFyFourGraphLabelNames'],
            $data['FinancialsRatioAnalysisFyFiveGraphLabelNames'],
        ];

        // dd($data['financialRatioGrapFYhLablesName']);

// ===================================================== financial ratio graph end ========================

        $data['FirmBackground'] = FirmBackground::where('third_party_id', $id)->first();
        $data['FirstDirectorsFirm'] = FirstDirectorsFirm::where('firm_background_id', $data['FirmBackground']->id)->first();
        $data['SecondDirectorsFirm'] = SecondDirectorsFirm::where('firm_background_id', $data['FirmBackground']->id)->first();
        $data['ThirdDirectorsFirm'] = ThirdDirectorsFirm::where('firm_background_id', $data['FirmBackground']->id)->first();
        $data['License'] = License::where('firm_background_id', $data['FirmBackground']->id)->first();
        $data['getThirdPartyForID'] = ThirdParty::where('id', $id)->first();
        $data['Getclient'] = User::where('id', $data['getThirdPartyForID']->user_id)->first();
        $data['GetTeaMuser'] = TeamUser::where('id', $data['FirmBackground']->team_user_id)->first();

        return view('company.reports.view-reports', $data);
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

        // Replace 'path/to/your/image.jpg' with the actual path to your image
        $imagePath = public_path('admin/assets/imgs/OnGroundVerification/' . $data['OnGroundVerification']->upload_picture);

        // Specify the desired file name
        $fileName = $data['OnGroundVerification']->upload_picture;

        return response()->download($imagePath, $fileName);
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
        $id = base64_decode($id);
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
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,

            ],
        ]);

        $pdf = PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->getDomPDF()->setHttpContext($contxt);
        //#################################################################################

        $pdf->setOptions(['isPhpEnabled' => true])->loadView('company.reports.all_reports_pdf', $data)
            ->setOptions(['defaultFont' => 'sans-serif']);
        // return View('admin.sale-invoices.trade-buyer-invoice-2', ['tradeInvoices' =>$data, 'path_img_jrais' => $path_img_jrais, 'path_img_logo' => $path_img_logo,]);
        $fecha = date('d/m/Y');
        return $pdf->download("reports-" . strtoupper(utf8_decode($id)) . "-detail-" . $fecha . ".pdf");
    }

    public function sendEmailForRequestThirdParty(Request $request)
    {
        // dd($request->all());

        $department = Department::where('id', $request->third_party_department)->first();
        $zone = Zone::where('id', $request->third_party_location)->first();

        $data = array(
            "third_party_name" => $request->third_party_name,
            "third_party_address" => $request->third_party_address,
            "third_party_department" => $department ? $department->dept_name : '',
            "third_party_pos" => $request->third_party_pos,
            "third_party_location" => $zone ? $zone->zone_name : '',
            "third_party_email" => $request->third_party_email,
            "third_party_phone" => $request->third_party_phone,
            'auth_name' => auth()->user()->first_name,
            'auth_email' => auth()->user()->email,
        );

        $recipient = array(
            'auth_name' => auth()->user()->first_name,
            'auth_email' => auth()->user()->email,
        );
        $subject = 'Request for third party';

        // Send email with Markdown template

        try {
            // Send email with Markdown template
            // Mail::send('mail.forThirdpartyRequest', ['data' => $data], function ($mail) use ($recipient, $subject) {
            //     $mail->to($recipient['auth_email'], $recipient['auth_name'], )
            //         ->subject($subject);
            // });


            Mail::send('mail.forThirdpartyRequest', ['data' => $data], function ($mail) use ($recipient, $subject) {
                $mail->to("iscreening@yopmail.com")
                    ->from("iscreening@kodersventure.com")
                    ->subject($subject);
            });


            // Email sent successfully
            $response = [
                'success' => true,
                'message' => 'Email sent successfully!',
            ];
        } catch (\Exception $e) {
            // Email sending failed
            $response = [
                'success' => false,
                'message' => 'Email sending failed. Error: ' . $e->getMessage(),
            ];
        }

        return response()->json($response);

        return 'Email sent successfully!';
    }

    // public function settingProfile()
    // {
    //     $data['countries'] = countries::all();

    //     return view('user.setting.edit_profile')->with($data);
    // }

    public function settingProfileSubmit(Request $request)
    {
        $data = $request->all();
        User::updateProfile($data);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = Auth::id() . '-' . date('dmyHis') . '.' . $file->getClientOriginalExtension();
            $file->move(base_path('/public/admin/images/users/'), $filename);

            User::updateProfileImage($filename);
        }

        if ($request->hasFile('logo_file')) {
            $file = $request->file('logo_file');
            $filename = Auth::id() . '-' . date('dmyHis') . '.' . $file->getClientOriginalExtension();
            $file->move(base_path('/public/storage/vendor/logo/'), $filename);

            User::updateLogo($filename);
        }

        return redirect()->back()->with('success', 'Profile Updated.');
    }

    public function profileSetting()
    {
        $data['title'] = "Profile Setting";
        $data['page'] = "Profile Setting";
        $data['pageIntro'] = "Password Setting";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        return view('company.setting.change_password', $data);
    }

    public function profileSettingSubmit(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        $password = $request->input('old_password');

        $user = User::find(Auth::id());
        if (!Hash::check($password, $user->password)) {
            return response()->json(['error' => 'Current password is incorrect.'], 422);
        } else {
            if ($data['password'] == $data['password_confirmation']) {
                $user->password = bcrypt($data['password']);
                $user->save();
            return response()->json(['error' => 'Password updated.'], 200);

            } else {
            return response()->json(['error' => 'Password does not match.'], 422);

            }
        }
    }

}
