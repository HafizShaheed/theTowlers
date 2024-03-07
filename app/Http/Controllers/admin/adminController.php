<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\team\TeamUser;
use Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use Mail;
use Carbon\Carbon;
use App\Models\CanadaCustomerInvoiceFrom;
use App\Models\DescriptionCanadaCustomerInvoiceFrom;
use App\Models\PackagesCanadaCustomerInvoiceFrom;
use App\Models\QuantityCanadaCustomerInvoiceFrom;
use App\Models\UnitPriceCanadaCustomerInvoiceFrom;
use Illuminate\Support\Facades\Log;



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
        return view('admin.index', $data);
    }


    public function generatePDF($count)
    {
        $viewName = 'admin.report.report-form-1.pdf.'.$count.'my_pdf';

        // Check if the view exists
        if (!view()->exists($viewName)) {
            abort(404); // Redirect to 404 page if the view does not exist
        }

        $data = [
            'title' => 'Canada Customer Invoice Pdf',
            'CanadaCustomerInvoiceFrom' => CanadaCustomerInvoiceFrom::where('id', 1)->first(),
        ];

        $pdf = PDF::loadView($viewName, $data);

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
        $data['title'] = "Reports Management";
        $data['page'] = "Reports Management";
        $data['pageIntro'] = "Reports List";
        $data['CanadaCustomerInvoiceFrom'] = CanadaCustomerInvoiceFrom::get();
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        // dd($data);
        return view('admin.report.report-form-1.index', $data);
    }

    function add_report_form_1(){
        $data['title'] = "Reports Management";
        $data['page'] = "Reports Management";
        $data['pageIntro'] = "Reports Add";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.report-form-1.add', $data);
    }


    public function create(Request $request)
    {
        // Validate the incoming request if necessary
        // $request->validate([...]);

        // Create CanadaCustomerInvoiceFrom record


        // Redirect or return a response as needed
    }

    public function submit_add_report_form_1(Request $request)
    {
        // dd($request->all());

        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Create CanadaCustomerInvoiceFrom record
            $canadaCustomerInvoiceFrom = new CanadaCustomerInvoiceFrom();
            $canadaCustomerInvoiceFrom->invioce_generator = rand(0000, 9999).now();
        $canadaCustomerInvoiceFrom->team_user_id = $request->input('team_user_id');
        $canadaCustomerInvoiceFrom->vender_name = $request->input('vender_name');
        $canadaCustomerInvoiceFrom->vender_address = $request->input('vender_address');
        $canadaCustomerInvoiceFrom->vender_nom_et_adresse = $request->input('vender_nom_et_adresse');
        $canadaCustomerInvoiceFrom->date_of_direct_shipment_to_canada_1 = $request->input('date_of_direct_shipment_to_canada_1');
        $canadaCustomerInvoiceFrom->date_of_direct_shipment_to_canada_2 = $request->input('date_of_direct_shipment_to_canada_2');
        $canadaCustomerInvoiceFrom->consignee_name = $request->input('consignee_name');
        $canadaCustomerInvoiceFrom->consignee_address = $request->input('consignee_address');
        $canadaCustomerInvoiceFrom->consignee_nom_et_adresse = $request->input('consignee_nom_et_adresse');
        $canadaCustomerInvoiceFrom->purchaser_name = $request->input('purchaser_name');
        $canadaCustomerInvoiceFrom->purchaser_address = $request->input('purchaser_address');
        $canadaCustomerInvoiceFrom->purchaser_nom_et_adresse = $request->input('purchaser_nom_et_adresse');
        $canadaCustomerInvoiceFrom->originator_name = $request->input('originator_name');
        $canadaCustomerInvoiceFrom->originator_address = $request->input('originator_address');
        $canadaCustomerInvoiceFrom->originator_nom_et_adresse = $request->input('originator_nom_et_adresse');
        $canadaCustomerInvoiceFrom->exporter_name = $request->input('exporter_name');
        $canadaCustomerInvoiceFrom->exporter_address = $request->input('exporter_address');
        $canadaCustomerInvoiceFrom->exporter_nom_et_adresse = $request->input('exporter_nom_et_adresse');
        $canadaCustomerInvoiceFrom->transportation_place_of_direct_shipment_to_canada = $request->input('transportation_place_of_direct_shipment_to_canada');
        $canadaCustomerInvoiceFrom->country_of_origin_pays = $request->input('country_of_origin_pays');
        $canadaCustomerInvoiceFrom->conditions_of_sale_and_terms_of_payment = $request->input('conditions_of_sale_and_terms_of_payment');
        $canadaCustomerInvoiceFrom->agency_ruling = $request->input('agency_ruling');
        $canadaCustomerInvoiceFrom->total_weight_poids_total = $request->input('total_weight_poids_total');
        $canadaCustomerInvoiceFrom->net = $request->input('net');
        $canadaCustomerInvoiceFrom->gross_brut = $request->input('gross_brut');
        $canadaCustomerInvoiceFrom->invoice_total = $request->input('invoice_total');
        $canadaCustomerInvoiceFrom->save();

        // Create related records using loop
        // for ($i = 1; $i <= 60; $i++) {
        //     // Description
        //     $description = new DescriptionCanadaCustomerInvoiceFrom();
        //     $description->canada_customer_invoice_from_id = $canadaCustomerInvoiceFrom->id;
        //     $description->{"description_pecification_of_commodities_$i"} = $request->input("description_pecification_of_commodities_$i");

        //     // Packages
        //     $packages = new PackagesCanadaCustomerInvoiceFrom();
        //     $packages->canada_customer_invoice_from_id = $canadaCustomerInvoiceFrom->id;
        //     $packages->{"number_of_packages_nombre_de_coils_$i"} = $request->input("number_of_packages_nombre_de_coils_$i");


        //     // Quantity
        //     $quantity = new QuantityCanadaCustomerInvoiceFrom();
        //     $quantity->canada_customer_invoice_from_id = $canadaCustomerInvoiceFrom->id;
        //     $quantity->{"quantity_$i"} = $request->input("quantity_$i");
        //     // Unit Price
        //     $unitPrice = new UnitPriceCanadaCustomerInvoiceFrom();
        //     $unitPrice->canada_customer_invoice_from_id = $canadaCustomerInvoiceFrom->id;
        //     $unitPrice->{"unit_price_$i"} = $request->input("unit_price_$i");
        //  }
        //  $description->save();
        //  $packages->save();
        //  $quantity->save();
        //  $unitPrice->save();


            return response()->json(['message' => 'All records submitted successfully!']);
        } catch (\Exception $e) {
            // Log the error
            Log::error($e);

            // Return an error response
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.'.$e], 500);
        }
    }



    function edit_report_form_1(){
        $data['title'] = "Reports Management";
        $data['page'] = "Reports Management";
        $data['pageIntro'] = "Reports Edit";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.report-form-1.edit', $data);
    }


    function view_report_form_1(){
        $data['title'] = "Reports Management";
        $data['page'] = "Reports Management";
        $data['pageIntro'] = "Reports View";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.report-form-1.view', $data);
    }

    function activity_report_form_1(){
        $data['title'] = "Reports Management";
        $data['page'] = "Reports Management";
        $data['pageIntro'] = "Reports Activity*";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.report-form-1.activity', $data);
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
