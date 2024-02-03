<?php

namespace App\Http\Controllers\team;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Models\User;
use App\Models\ThirdParty;
use App\Models\team\TeamUser;
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

class teamController extends Controller
{
    function index()  {

        $data['title'] = "Team Dashboard";
        $data['page'] = "Dashboard";
        $data['pageIntro'] = "Introducing Team Dashboard";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        return view('team.index',$data);
    }

    function login(){
        if(Auth::guard('team')->check()){
            return redirect(route('team.index'));
        }else{
            return view('team.login');

        }
    }

    function loginSubmit(Request $request){
        $data = $request->all();
        if(Auth::guard('team')->attempt(['team_email' => $data['team_email'], 'password' => $data['password'], 'status' => 1])){
            return redirect(route('team.index'));
        }else{
            return redirect()->back()->with('error', 'Authentication Failed.');
        }
    }

     // vender means Reports list start
    //  function report_List(){

    //     $data['title'] = "Reports Managment";
    //     $data['page'] = "Reports Managment";
    //     $data['pageIntro'] = "Reports List";
    //     $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

    //     //   $vendoruser=User::where('vendor_status',2)->count();
    //         return view('team.report.index',$data);
    // }

    // function report_View(){

    //     $data['title'] = "Reports Managment";
    //     $data['page'] = "Reports Managment";
    //     $data['pageIntro'] = "Reports View";
    //     $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

    //     //   $vendoruser=User::where('vendor_status',2)->count();
    //         return view('team.report.view-reports',$data);
    // }

    function add_report($id){

        // dd($id);
        $id = base64_decode($id);
        $data['title'] = "Reports Managment";
        $data['page'] = "Add Reports";
        $data['pageIntro'] = "Reports Edit";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        $data['title'] = "Reports Managment";
        $data['page'] = "Edit Reports";
        $data['pageIntro'] = "Reports Edit";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        $data['BusinessIntelligence'] = BusinessIntelligence::where('third_party_id',$id)->first();
        $data['CourtCheck'] = CourtCheck::where('third_party_id',$id)->first();
        $data['Document'] = Document::where('third_party_id',$id)->first();
        $data['Financial'] = Financial::where('third_party_id',$id)->first();
        $data['FirmBackground'] = FirmBackground::where('third_party_id',$id)->first();
        $data['KeyObservation'] = KeyObservation::where('third_party_id',$id)->first();
        $data['MarketReputation'] = MarketReputation::where('third_party_id',$id)->first();
        $data['OnGroundVerification'] = OnGroundVerification::where('third_party_id',$id)->first();
        $data['TaxReurnCredit'] = TaxReurnCredit::where('third_party_id',$id)->first();

        $data['FinancialsFindingsFyFive'] = FinancialsFindingsFyFive::where('financial_id',$data['Financial']->id)->first();
        $data['FinancialsFindingsFyFour'] = FinancialsFindingsFyFour::where('financial_id',$data['Financial']->id)->first();
        $data['FinancialsFindingsFyThree'] = FinancialsFindingsFyThree::where('financial_id',$data['Financial']->id)->first();
        $data['FinancialsFindingsFyTwo'] = FinancialsFindingsFyTwo::where('financial_id',$data['Financial']->id)->first();
        $data['FinancialsFindingsFyOne'] = FinancialsFindingsFyOne::where('financial_id',$data['Financial']->id)->first();

        // dd($data['FinancialsFindingsFyFive'] );
        $data['FinancialsRatioAnalysisFyFive'] = FinancialsRatioAnalysisFyFive::where('financial_id',$data['Financial']->id)->first();
        $data['FinancialsRatioAnalysisFyFour'] = FinancialsRatioAnalysisFyFour::where('financial_id',$data['Financial']->id)->first();
        $data['FinancialsRatioAnalysisFyThree'] = FinancialsRatioAnalysisFyThree::where('financial_id',$data['Financial']->id)->first();
        $data['FinancialsRatioAnalysisFyTwo'] = FinancialsRatioAnalysisFyTwo::where('financial_id',$data['Financial']->id)->first();
        $data['FinancialsRatioAnalysisFyOne'] = FinancialsRatioAnalysisFyOne::where('financial_id',$data['Financial']->id)->first();

        $data['FirstDirectorsFirm'] = FirstDirectorsFirm::where('firm_background_id',$data['FirmBackground']->id)->first();
        $data['SecondDirectorsFirm'] = SecondDirectorsFirm::where('firm_background_id',$data['FirmBackground']->id)->first();
        $data['ThirdDirectorsFirm'] = ThirdDirectorsFirm::where('firm_background_id',$data['FirmBackground']->id)->first();
        $data['License'] = License::where('firm_background_id',$data['FirmBackground']->id)->first();

        $data['getThirdPartyForID'] = ThirdParty::where('id',$id)->first();
        $data['getClientID'] = User::where('id',$data['FirmBackground']->user_id)->first();

        //   $vendoruser=User::where('vendor_status',2)->count();
            return view('team.report.add-report',$data);
    }


    function update_firm_background(Request $request){
        $firmBackground = FirmBackground::findOrFail($request->FirmBackgroundID);
        if (!$firmBackground) {
            return response()->json(['error' => 'This Reports not found.']);

       }

        // if ($request->hasFile('file')) {
        //     $file = $request->file('file');
        //     // Generate a unique filename
        //     $filename = 'firmBackground' . '-' . date('dmyHis') . rand() . '.' . $file->getClientOriginalExtension();
        //     // Move the file to the destination folder
        //     $file->move(public_path('admin/assets/imgs/firmBacgroundImages/'), $filename);


        //     $firmBackground->file = $filename;
        // }





        $firmBackground->incorporation_year = $request->input('incorporation_year');
        $firmBackground->team_user_id = Auth::guard('team')->id();

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
        $firmBackground->Type_of_risk = $request->input('regulatory_score') > 60 ? 'High Risk' : ($request->input('regulatory_score') <= 60 && $request->input('regulatory_score') > 30 ? 'Medium Risk' : ($request->input('regulatory_score') <= 30 ? 'Low Risk' : '' ) );

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
        if($firmBackground->id){

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
       $BusinessIntelligence->team_user_id = Auth::guard('team')->id();
       $BusinessIntelligence->save();


       $CourtCheck = CourtCheck::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
       $CourtCheck->team_user_id = Auth::guard('team')->id();
       $CourtCheck->save();

       $Financial = Financial::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
       $Financial->team_user_id = Auth::guard('team')->id();
       $Financial->save();

       $MarketReputation = MarketReputation::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
       $MarketReputation->team_user_id = Auth::guard('team')->id();
       $MarketReputation->save();

       $OnGroundVerification = OnGroundVerification::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
       $OnGroundVerification->team_user_id = Auth::guard('team')->id();
       $OnGroundVerification->save();

       
       $Document = Document::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
       $Document->team_user_id = Auth::guard('team')->id();
       $Document->save();

       $TaxReurnCredit = TaxReurnCredit::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
       $TaxReurnCredit->team_user_id = Auth::guard('team')->id();

       $TaxReurnCredit->save();

       $KeyObservation = KeyObservation::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
       $KeyObservation->team_user_id = Auth::guard('team')->id();
       $KeyObservation->status = 1;

       $KeyObservation->save();

       $ThirdParty = ThirdParty::findOrFail($request->getThirdPartyForID);
       $ThirdParty->status = 1;
       $ThirdParty->save();

        }

         return response()->json(['message' => 'Firm Background Reports updated successfully!']);

    }

    function update_on_ground_verification(Request $request){
        // dd($request->all());

        $OnGroundVerification = OnGroundVerification::findOrFail($request->onGroundVerificationID);
        if (!$OnGroundVerification) {
            return response()->json(['error' => 'This Reports not found.']);

       }


       $OnGroundVerification->team_user_id = Auth::guard('team')->id();

        if ($request->hasFile('upload_picture')) {
            $file = $request->file('upload_picture');
            // Generate a unique filename
            $filename = 'OnGroundVerification' . '-' . date('dmyHis') . rand() . '.' . $file->getClientOriginalExtension();
            // Move the file to the destination folder
            $file->move(public_path('admin/assets/imgs/OnGroundVerification/'), $filename);


        $OnGroundVerification->upload_picture = $filename;
        }
        $OnGroundVerification->score_analysis = $request->input('score_analysis');
        $OnGroundVerification->Type_of_risk = $request->input('on_ground_verification_score') > 60 ? 'High Risk' : ($request->input('on_ground_verification_score') <= 60 && $request->input('on_ground_verification_score') > 30 ? 'Medium Risk' : ($request->input('on_ground_verification_score') <= 30 ? 'Low Risk' : '' ) );
        $OnGroundVerification->address_details = $request->input('address_details');
        $OnGroundVerification->address_visit_findings = $request->input('address_visit_findings');
        $OnGroundVerification->on_ground_verification_score = $request->input('on_ground_verification_score');
        $OnGroundVerification->status = 1;
        $OnGroundVerification->save();

        $KeyObservation = KeyObservation::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
        $KeyObservation->team_user_id = Auth::guard('team')->id();
        $KeyObservation->status = 1;

        $KeyObservation->save();

        $ThirdParty = ThirdParty::findOrFail($request->getThirdPartyForID);
        $ThirdParty->status = 1;
        $ThirdParty->save();

        return response()->json(['message' => 'On Ground Verification  Reports updated successfully!']);


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


    function update_court_check(Request $request){
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
            $CourtCheck->Type_of_risk = $request->input('legal_score') > 60 ? 'High Risk' : ($request->input('legal_score') <= 60 && $request->input('legal_score') > 30 ? 'Medium Risk' : ($request->input('legal_score') <= 30 ? 'Low Risk' : '' ) );
            $CourtCheck->status = 1;

        $CourtCheck->save();
        $KeyObservation = KeyObservation::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
        $KeyObservation->team_user_id = Auth::guard('team')->id();
        $KeyObservation->status = 1;

        $KeyObservation->save();

        $ThirdParty = ThirdParty::findOrFail($request->getThirdPartyForID);
        $ThirdParty->status = 1;
        $ThirdParty->save();
        return response()->json(['message' => 'Court Check  Reports updated successfully!']);

    }


    function update_financial(Request $request){
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
            $Financial->Type_of_risk = $request->input('overall_financial_score') > 60 ? 'High Risk' : ($request->input('overall_financial_score') <= 60 && $request->input('overall_financial_score') > 30 ? 'Medium Risk' : ($request->input('overall_financial_score') <= 30 ? 'Low Risk' : '' ) );


        $Financial->status = 1;

        $Financial->save();
        $KeyObservation = KeyObservation::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
        $KeyObservation->team_user_id = Auth::guard('team')->id();
        $KeyObservation->status = 1;

        $KeyObservation->save();

        $ThirdParty = ThirdParty::findOrFail($request->getThirdPartyForID);
        $ThirdParty->status = 1;
        $ThirdParty->save();

        if($Financial->id){

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

    function update_Business_Intelligence(Request $request){
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
        $BusinessIntelligence->Type_of_risk = $request->input('efficiency_score') > 60 ? 'High Risk' : ($request->input('efficiency_score') <= 60 && $request->input('efficiency_score') > 30 ? 'Medium Risk' : ($request->input('efficiency_score') <= 30 ? 'Low Risk' : '' ) );
        $BusinessIntelligence->status = 1;
        $BusinessIntelligence->save();

        $KeyObservation = KeyObservation::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
        $KeyObservation->team_user_id = Auth::guard('team')->id();
        $KeyObservation->status = 1;

        $KeyObservation->save();

        $ThirdParty = ThirdParty::findOrFail($request->getThirdPartyForID);
        $ThirdParty->status = 1;
        $ThirdParty->save();

        return response()->json(['message' => 'Business Intelligence  Reports updated successfully!']);

    }

    function update_Tax_Return_and_Credit(Request $request){
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
            $TaxReurnCredit->Type_of_risk = $request->input('overall_credit_history_score') > 60 ? 'High Risk' : ($request->input('overall_credit_history_score') <= 60 && $request->input('overall_credit_history_score') > 30 ? 'Medium Risk' : ($request->input('overall_credit_history_score') <= 30 ? 'Low Risk' : '' ) );

        $TaxReurnCredit->status = 1;

        $TaxReurnCredit->save();

        $KeyObservation = KeyObservation::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
        $KeyObservation->team_user_id = Auth::guard('team')->id();
        $KeyObservation->status = 1;

        $KeyObservation->save();

        $ThirdParty = ThirdParty::findOrFail($request->getThirdPartyForID);
        $ThirdParty->status = 1;
        $ThirdParty->save();
        return response()->json(['message' => 'Tax Reurn Credit  Reports updated successfully!']);

    }

    function update_Market_Reputation(Request $request){

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
        $MarketReputation->Type_of_risk = $request->input('market_reputation_score') > 60 ? 'High Risk' : ($request->input('market_reputation_score') <= 60 && $request->input('market_reputation_score') > 30 ? 'Medium Risk' : ($request->input('market_reputation_score') <= 30 ? 'Low Risk' : '' ) );
        $MarketReputation->status = 1;

        $MarketReputation->save();

        $KeyObservation = KeyObservation::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
        $KeyObservation->team_user_id = Auth::guard('team')->id();
        $KeyObservation->status = 1;

        $KeyObservation->save();

        $ThirdParty = ThirdParty::findOrFail($request->getThirdPartyForID);
        $ThirdParty->status = 1;
        $ThirdParty->save();
        return response()->json(['message' => 'Market Reputations  Reports updated successfully!']);
    }

    function update_Key_Observation(Request $request){

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
       $KeyObservation->status = 3;
       $KeyObservation->Type_of_risk = $request->input('overall_risk_score') > 60 ? 'High Risk' : ($request->input('overall_risk_score') <= 60 && $request->input('overall_risk_score') > 30 ? 'Medium Risk' : ($request->input('overall_risk_score') <= 30 ? 'Low Risk' : '' ) );
       $KeyObservation->team_user_id = Auth::guard('team')->id();

       $KeyObservation->save();


       $FirmBackground = FirmBackground::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
       $FirmBackground->team_user_id = Auth::guard('team')->id();

       $FirmBackground->status = 3;
       $FirmBackground->save();

       $BusinessIntelligence = BusinessIntelligence::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
       $BusinessIntelligence->status = 3;
              $BusinessIntelligence->team_user_id = Auth::guard('team')->id();

       $BusinessIntelligence->save();

       $CourtCheck = CourtCheck::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
       $CourtCheck->status = 3;
              $CourtCheck->team_user_id = Auth::guard('team')->id();

       $CourtCheck->save();

       $Financial = Financial::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
       $Financial->status = 3;
              $Financial->team_user_id = Auth::guard('team')->id();

       $Financial->save();

       $MarketReputation = MarketReputation::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
       $MarketReputation->status = 3;
              $MarketReputation->team_user_id = Auth::guard('team')->id();

       $MarketReputation->save();

       $OnGroundVerification = OnGroundVerification::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
       $OnGroundVerification->status = 3;
      $OnGroundVerification->team_user_id = Auth::guard('team')->id();

       $OnGroundVerification->save();

       $Document = Document::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
       $Document->status = 3;
        $Document->team_user_id = Auth::guard('team')->id();
       $Document->save();


       $TaxReurnCredit = TaxReurnCredit::where('third_party_id', $request->getThirdPartyForID)->firstOrFail();
       $TaxReurnCredit->status = 3;
              $TaxReurnCredit->team_user_id = Auth::guard('team')->id();

       $TaxReurnCredit->save();

       $ThirdParty = ThirdParty::findOrFail($request->getThirdPartyForID);
       $ThirdParty->status = 3;
       $ThirdParty->save();


       return response()->json(['message' => 'Key Observation  Reports updated successfully!']);



    }


    // vender  means Third-party list end


     // vender means Third-party list start
     function vender_List(Request $request){

        $data['title'] = "Third-Party Managment";
        $data['page'] = "Third-Party Managment";
        $data['pageIntro'] = "Third-Party List";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        // $data['getallThirdParty'] = ThirdParty::where(['status' => '1', 'status' => '0'])->latest()->get();
        // $data['getallThirdParty'] = ThirdParty::whereIn('status', ['0', '1','2'])
        // ->orderBy('status', 'asc') // Order by status in ascending order
        // ->latest() // Add any additional ordering if needed
        // ->get();


        $query = ThirdParty::query();

        if (isset($request->PartyName) && !empty($request->PartyName)) {
            $party_id = (int) $request->input('PartyName');
            $query->where('id', $party_id);
        }

        if (isset($request->clientNameID) && !empty($request->clientNameID)) {
            $client_id = (int) $request->input('clientNameID');
            $query->where('user_id', $client_id);
        }

        if (isset($request->status) && !empty($request->status)) {
            $statusMapping = [
                'Active' => 1,
                'Pending' => 0,
                'Resubmit' => 2,

            ];
            $statusString = $request->status;
            $status = isset($statusMapping[$statusString]) ? (int) $statusMapping[$statusString] : null;
            $query->where('status', $status);
        } else {
            // If status is not provided in the request, include the initial conditions
            $query->whereIn('status', ['0', '1', '2'])
                ->orderBy('status', 'asc')
                ->latest();
        }

        $data['getallThirdParty'] = $query->get();

        //   $vendoruser=User::where('vendor_status',2)->coun   t();
            return view('team.third-party.index',$data);
    }

     // vender means Third-party list End




    function logout(){
        Auth::guard('team')->logout();

        return redirect(route('team.login'));
    }
}
