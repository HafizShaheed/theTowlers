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
use App\Models\CanadaInvoiceHistory;
use App\Models\CertificateOrigin;
use App\Models\CertificateOriginComDec;
use App\Models\CertificateOriginComDecFormA;
use App\Models\CertificateOriginComDecFormAHistory;
use App\Models\CertificateOriginComDecFormIp;
use App\Models\CertificateOriginComDecFormIpHistory;
use App\Models\CertificateOriginComDecHistory;
use App\Models\CertificateOriginHistory;
use App\Models\CertificateOriginNo627120;
use App\Models\CertificateOriginNo627120History;
use App\Models\ExporterTextileDeclearation;
use App\Models\ExporterTextileDeclearationHistory;
use App\Models\Form59AHistory;
use App\Models\Form59AInvoice;
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
        $viewName = 'admin.report.custom-canda-invoice.pdf.'.$count.'my_pdf';

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
    //==================== custom canada invioce start ======================//
    function report_List_custom_canda_invoice(Request $request)
    {
        $data['title'] = "Canada Custom Invoice";
        $data['page'] = "Canada Custom Invoice";
        $data['pageIntro'] = "Canada Custom Invoice";
        $data['CanadaCustomerInvoiceFrom'] = CanadaCustomerInvoiceFrom::get();
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        // dd($data);
        return view('admin.report.custom-canda-invoice.index', $data);
    }

    public function generate_custom_canda_invoic_PDF($id)
    {
        $viewName = 'admin.report.custom-canda-invoice.pdf.custom-canda-invoice-pdf';

        // Check if the view exists
        if (!view()->exists($viewName)) {
            abort(404); // Redirect to 404 page if the view does not exist
        }

        $data = [
            'title' => 'Canada Customer Invoice Pdf',
            'CanadaCustomerInvoiceFrom' => CanadaCustomerInvoiceFrom::where('id', $id)->first(),
        ];

        $pdf = PDF::loadView($viewName, $data);

        return $pdf->stream('document.pdf');
    }

    function add_custom_canda_invoice(){

        $data['title'] = "Canada Custom Invoicet";
        $data['page'] = "Canada Custom Invoice";
        $data['pageIntro'] = "Canada Custom Invoice Add";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.custom-canda-invoice.add', $data);
    }

    public function submit_custom_canda_invoice(Request $request)
    {
        // dd($request->all());

        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Create CanadaCustomerInvoiceFrom record
            $canadaCustomerInvoiceFrom = new CanadaCustomerInvoiceFrom();
            $canadaCustomerInvoiceFrom->invioce_generator = rand(0000, 9999).now();
        $canadaCustomerInvoiceFrom->team_user_id = $request->input('team_user_id');
        $canadaCustomerInvoiceFrom->canada_customer_invoice = $request->input('canada_customer_invoice');
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
        $canadaCustomerInvoiceFrom->description_pecification_of_commodities = $request->input('description_pecification_of_commodities');

        // Create related records using loop
        for ($i = 1; $i <= 6; $i++) {

            // Packages
            $canadaCustomerInvoiceFrom->{"number_of_packages_nombre_de_coils_$i"} = $request->input("number_of_packages_nombre_de_coils_$i");
            // Quantity
            $canadaCustomerInvoiceFrom->{"quantity_$i"} = $request->input("quantity_$i");
            // Unit Price

            $canadaCustomerInvoiceFrom->{"unit_price_$i"} = $request->input("unit_price_$i");
         }

        $canadaCustomerInvoiceFrom->save();

        $CanadaInvoiceHistory = new CanadaInvoiceHistory();
        $CanadaInvoiceHistory->canada_customer_invoice_from_id = $canadaCustomerInvoiceFrom->id;
        $CanadaInvoiceHistory->editer_name = Auth::guard('admin')->user()->user_name;

        $CanadaInvoiceHistory->edited_at = now();
        $CanadaInvoiceHistory->save();




            return response()->json(['message' => 'All records submitted successfully!']);
        } catch (\Exception $e) {
            // Log the error
            Log::error($e);

            // Return an error response
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.'.$e], 500);
        }
    }



    function edit_custom_canda_invoice($id){
        $data['title'] = "Reports Management";
        $data['page'] = "Reports Management";
        $data['pageIntro'] = "Reports Edit";
        $data['editCanadaCustomerInvoiceFrom'] = CanadaCustomerInvoiceFrom::where('id',$id)->first();
        if (!$data['editCanadaCustomerInvoiceFrom']) {
            return back()->with('error', 'No Canada invoice history found for the provided ID.');
        }
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.custom-canda-invoice.edit', $data);
    }
    public function update_submit_custom_canda_invoice(Request $request)
    {
        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('id');
            if ($id) {
                // If an ID is provided, update the existing record
                $canadaCustomerInvoiceFrom = CanadaCustomerInvoiceFrom::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $canadaCustomerInvoiceFrom = new CanadaCustomerInvoiceFrom();
                $canadaCustomerInvoiceFrom->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $canadaCustomerInvoiceFrom->fill($request->all());

            // Save the CanadaCustomerInvoiceFrom model
            $canadaCustomerInvoiceFrom->save();

            // Create or update related records using a loop
            for ($i = 1; $i <= 6; $i++) {
                // Packages
                $canadaCustomerInvoiceFrom->{"number_of_packages_nombre_de_coils_$i"} = $request->input("number_of_packages_nombre_de_coils_$i");
                // Quantity
                $canadaCustomerInvoiceFrom->{"quantity_$i"} = $request->input("quantity_$i");
                // Unit Price
                $canadaCustomerInvoiceFrom->{"unit_price_$i"} = $request->input("unit_price_$i");
            }

            // Save the CanadaCustomerInvoiceFrom model again after updating related records
            $canadaCustomerInvoiceFrom->save();

            // Create CanadaInvoiceHistory record
            $CanadaInvoiceHistory = new CanadaInvoiceHistory();
            $CanadaInvoiceHistory->canada_customer_invoice_from_id = $canadaCustomerInvoiceFrom->id;
            $CanadaInvoiceHistory->editer_name = Auth::guard('admin')->user()->user_name;
            $CanadaInvoiceHistory->edited_at = now();
            $CanadaInvoiceHistory->save();

            // Return a success response
            return response()->json(['message' => 'All records submitted successfully!']);
        } catch (\Exception $e) {
            // Log the error
            Log::error($e);

            // Return an error response
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.', 'error' => $e->getMessage()], 500);
        }
    }


    function view_custom_canda_invoice(){
        $data['title'] = "Reports Management";
        $data['page'] = "Reports Management";
        $data['pageIntro'] = "Reports View";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.custom-canda-invoice.view', $data);
    }

    function activity_custom_canda_invoice($id){
        $data['title'] = "Reports Management";
        $data['page'] = "Reports Management";

        $data['pageIntro'] = "Reports Activity";
        $data['getAllCanadaInvoiceHistory'] = CanadaInvoiceHistory::where('canada_customer_invoice_from_id', $id)->get();

        if ($data['getAllCanadaInvoiceHistory']->isEmpty()) {
            return back()->with('error', 'No Canada invoice history found for the provided ID.');
        }
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.custom-canda-invoice.activity', $data);
    }

    //==================== custom canada invioce end ======================//

    //==================== Form 59 A invioce start ======================//
    function report_List_form_59_a_invoice(Request $request)
    {
        $data['title'] = "Form 59 A Invoice";
        $data['page'] = "Form 59 A Invoice";
        $data['pageIntro'] = "Form 59 A Invoice";
        $data['Form59AInvoice'] = Form59AInvoice::get();
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        // dd($data);
        return view('admin.report.form-59-A-invoice.index', $data);
    }

    public function generate_form_59_a_invoic_PDF($id)
    {
        $viewName = 'admin.report.form-59-A-invoice.pdf.form_59_A_invoice_pdf';

        // Check if the view exists
        if (!view()->exists($viewName)) {
            abort(404); // Redirect to 404 page if the view does not exist
        }

        $data = [
            'title' => 'Canada Customer Invoice Pdf',
            'Form59AInvoice' => Form59AInvoice::where('id', $id)->first(),
        ];

        $pdf = PDF::loadView($viewName, $data);

        return $pdf->stream('form9A.pdf');
    }

    function add_form_59_a_invoice(){

        $data['title'] = "Add Form 59 A Invoice";
        $data['page'] = "Add Form 59 A Invoice";
        $data['pageIntro'] = "Form 59 A Invoice Add";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.form-59-A-invoice.add', $data);
    }

    public function submit_form_59_a_invoice(Request $request)
    {
        // dd($request->all());

        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Create CanadaCustomerInvoiceFrom record
            $Form59AInvoice = new Form59AInvoice();
            $Form59AInvoice->invioce_generator = rand(0000, 9999).now();
        $Form59AInvoice->team_user_id = $request->input('team_user_id');
        $Form59AInvoice->form59_a_invoices = $request->input('form59_a_invoices');
        $Form59AInvoice->exporter = $request->input('exporter');
        $Form59AInvoice->status_of_seller = $request->input('status_of_seller');
        $Form59AInvoice->delete_terms_inapplicable = $request->input('delete_terms_inapplicable');
        $Form59AInvoice->manufacturer = $request->input('manufacturer');
        $Form59AInvoice->grower = $request->input('grower');
        $Form59AInvoice->producer = $request->input('producer');
        $Form59AInvoice->supplier = $request->input('supplier');
        $Form59AInvoice->sold_to = $request->input('sold_to');
        $Form59AInvoice->country_of_Origin = $request->input('country_of_Origin');
        $Form59AInvoice->ship_airline_etc = $request->input('ship_airline_etc');
        $Form59AInvoice->sea_airport_of_loading = $request->input('sea_airport_of_loading');
        $Form59AInvoice->final_destination_of_goods = $request->input('final_destination_of_goods');
        $Form59AInvoice->if_amount_has_been_inciuded_in_the_current_domestic_value = $request->input('if_amount_has_been_inciuded_in_the_current_domestic_value');
        $Form59AInvoice->drawback_or_remission_of_duty = $request->input('drawback_or_remission_of_duty');
       
        // Create related records using loop
        for ($i = 1; $i <= 6; $i++) {

            // Packages
            $Form59AInvoice->{"marks_and_numbers_$i"} = $request->input("marks_and_numbers_$i");
            // Quantity
            $Form59AInvoice->{"quantity_$i"} = $request->input("quantity_$i");
            // Unit Price

            $Form59AInvoice->{"description_of_goods_$i"} = $request->input("description_of_goods_$i");
            $Form59AInvoice->{"including_any_discounts_$i"} = $request->input("including_any_discounts_$i");
            $Form59AInvoice->{"current_domestic_value_currency_of_exporting_$i"} = $request->input("current_domestic_value_currency_of_exporting_$i");
            $Form59AInvoice->{"amount_$i"} = $request->input("amount_$i");


         }

        $Form59AInvoice->save();

        $Form59AHistory = new Form59AHistory();
        $Form59AHistory->form59_a_invoice_id = $Form59AInvoice->id;
        $Form59AHistory->editer_name = Auth::guard('admin')->user()->user_name;

        $Form59AHistory->edited_at = now();
        $Form59AHistory->save();




            return response()->json(['message' => 'All records submitted successfully!']);
        } catch (\Exception $e) {
            // Log the error
            Log::error($e);

            // Return an error response
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.'.$e], 500);
        }
    }



    function edit_form_59_a_invoice($id){
        $data['title'] = "Edit form 59 A";
        $data['page'] = "Edit form 59 A";
        $data['pageIntro'] = "Reports Edit";
        $data['Form59AInvoice'] = Form59AInvoice::where('id',$id)->first();
        if (!$data['Form59AInvoice']) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.form-59-A-invoice.edit', $data);
    }
    public function update_submit_form_59_a_invoice(Request $request)
    {
        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('id');
            if ($id) {
                // If an ID is provided, update the existing record
                $Form59AInvoice = Form59AInvoice::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $Form59AInvoice = new Form59AInvoice();
                $Form59AInvoice->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $Form59AInvoice->fill($request->all());

            // Save the Form59AInvoice model
            $Form59AInvoice->save();

      

            // Create CanadaInvoiceHistory record
            $Form59AHistory = new Form59AHistory();
            $Form59AHistory->form59_a_invoice_id = $Form59AInvoice->id;
            $Form59AHistory->editer_name = Auth::guard('admin')->user()->user_name;
    
            $Form59AHistory->edited_at = now();
            $Form59AHistory->save();

            // Return a success response
            return response()->json(['message' => 'All records submitted successfully!']);
        } catch (\Exception $e) {
            // Log the error
            Log::error($e);

            // Return an error response
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.', 'error' => $e->getMessage()], 500);
        }
    }


    function view_form_59_a_invoice($id){
        $data['title'] = "Reports Management";
        $data['page'] = "Reports Management";
        $data['pageIntro'] = "Reports View";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        $data['Form59AInvoice'] = Form59AInvoice::where('id',$id)->first();
        if (!$data['Form59AInvoice']) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        return view('admin.report.form-59-A-invoice.view', $data);
    }

    function activity_form_59_a_invoice($id){
        $data['title'] = "Activity form 59 A";
        $data['page'] = "Activity form 59 A";

        $data['pageIntro'] = "Reports Activity";
        $data['getAllForm59AHistory'] = Form59AHistory::where('form59_a_invoice_id', $id)->get();

        if ($data['getAllForm59AHistory']->isEmpty()) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.form-59-A-invoice.activity', $data);
    }

    function form_59_invoice_resubmit(Request $request) {
       

        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('formId');
            if ($id) {
                // If an ID is provided, update the existing record
                $Form59AInvoice = Form59AInvoice::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $Form59AInvoice = new Form59AInvoice();
                $Form59AInvoice->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $Form59AInvoice->status = 2;

            // Save the Form59AInvoice model
            $Form59AInvoice->save();

      

            // Create CanadaInvoiceHistory record
            $Form59AHistory = new Form59AHistory();
            $Form59AHistory->form59_a_invoice_id = $Form59AInvoice->id;
            $Form59AHistory->editer_name = Auth::guard('admin')->user()->user_name;
    
            $Form59AHistory->edited_at = now();
            $Form59AHistory->save();

            // Return a success response
            return response()->json(['message' => 'All records submitted successfully!']);
        } catch (\Exception $e) {
            // Log the error
            Log::error($e);

            // Return an error response
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.', 'error' => $e->getMessage()], 500);
        }
        
    }
    function form_59_invoice_completed(Request $request) {
       

        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('forCompetingFormId');
            if ($id) {
                // If an ID is provided, update the existing record
                $Form59AInvoice = Form59AInvoice::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $Form59AInvoice = new Form59AInvoice();
                $Form59AInvoice->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $Form59AInvoice->status = 3;

            // Save the Form59AInvoice model
            $Form59AInvoice->save();

      

            // Create CanadaInvoiceHistory record
            $Form59AHistory = new Form59AHistory();
            $Form59AHistory->form59_a_invoice_id = $Form59AInvoice->id;
            $Form59AHistory->editer_name = Auth::guard('admin')->user()->user_name;
    
            $Form59AHistory->edited_at = now();
            $Form59AHistory->save();

            // Return a success response
            return response()->json(['message' => 'All records submitted successfully!']);
        } catch (\Exception $e) {
            // Log the error
            Log::error($e);

            // Return an error response
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.', 'error' => $e->getMessage()], 500);
        }
        
    }
    //==================== form 59 A invioce end ======================//


    //==================== exporter_textile_declearation_invioce start ======================//
    function report_List_exporter_textile_declearation_invoice(Request $request)
    {
        $data['title'] = "Canada Custom Invoice";
        $data['page'] = "Canada Custom Invoice";
        $data['pageIntro'] = "Canada Custom Invoice";
        $data['ExporterTextileDeclearation'] = ExporterTextileDeclearation::get();
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        // dd($data);
        return view('admin.report.exporter-textile-declearation.index', $data);
    }

    public function generate_exporter_textile_declearation_invoic_PDF($id)
    {
        $viewName = 'admin.report.exporter-textile-declearation.pdf.exporter_textile_declearation_pdf';

        // Check if the view exists
        if (!view()->exists($viewName)) {
            abort(404); // Redirect to 404 page if the view does not exist
        }

        $data = [
            'title' => 'exporter-textile-declearationPdf',
            'ExporterTextileDeclearation' => ExporterTextileDeclearation::where('id', $id)->first(),
        ];

        $pdf = PDF::loadView($viewName, $data);

        return $pdf->stream('form9A.pdf');
    }

    function add_exporter_textile_declearation_invoice(){

        $data['title'] = "Canada Custom Invoicet";
        $data['page'] = "Canada Custom Invoice";
        $data['pageIntro'] = "Canada Custom Invoice Add";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.exporter-textile-declearation.add', $data);
    }

    public function submit_exporter_textile_declearation_invoice(Request $request)
    {
        // dd($request->all());

        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Create CanadaCustomerInvoiceFrom record
            $ExporterTextileDeclearation = new ExporterTextileDeclearation();
            $ExporterTextileDeclearation->invioce_generator = rand(0000, 9999).now();
        $ExporterTextileDeclearation->team_user_id = $request->input('team_user_id');
     
       
        // Create related records using loop
    
        $ExporterTextileDeclearation->fill($request->all());

        // Save the ExporterTextileDeclearation model
        $ExporterTextileDeclearation->save();

        $ExporterTextileDeclearationHistory = new ExporterTextileDeclearationHistory();
        $ExporterTextileDeclearationHistory->exporter_textile_declearation_id = $ExporterTextileDeclearation->id;
        $ExporterTextileDeclearationHistory->editer_name = Auth::guard('admin')->user()->user_name;

        $ExporterTextileDeclearationHistory->edited_at = now();
        $ExporterTextileDeclearationHistory->save();




            return response()->json(['message' => 'All records submitted successfully!']);
        } catch (\Exception $e) {
            // Log the error
            Log::error($e);

            // Return an error response
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.'.$e], 500);
        }
    }



    function edit_exporter_textile_declearation_invoice($id){
        $data['title'] = "Reports Management";
        $data['page'] = "Reports Management";
        $data['pageIntro'] = "Reports Edit";
        $data['ExporterTextileDeclearation'] = ExporterTextileDeclearation::where('id',$id)->first();
        if (!$data['ExporterTextileDeclearation']) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.exporter-textile-declearation.edit', $data);
    }
    public function update_submit_exporter_textile_declearation_invoice(Request $request)
    {
        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('id');
            if ($id) {
                // If an ID is provided, update the existing record
                $ExporterTextileDeclearation = ExporterTextileDeclearation::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $ExporterTextileDeclearation = new ExporterTextileDeclearation();
                $ExporterTextileDeclearation->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $ExporterTextileDeclearation->fill($request->all());

            // Save the ExporterTextileDeclearation model
            $ExporterTextileDeclearation->save();

            // Create or update related records using a loop
            // Save the CanadaCustomerInvoiceFrom model again after updating related records

            // Create CanadaInvoiceHistory record
            $ExporterTextileDeclearationHistory = new ExporterTextileDeclearationHistory();
            $ExporterTextileDeclearationHistory->exporter_textile_declearation_id = $ExporterTextileDeclearation->id;
            $ExporterTextileDeclearationHistory->editer_name = Auth::guard('admin')->user()->user_name;
    
            $ExporterTextileDeclearationHistory->edited_at = now();
            $ExporterTextileDeclearationHistory->save();

            // Return a success response
            return response()->json(['message' => 'All records submitted successfully!']);
        } catch (\Exception $e) {
            // Log the error
            Log::error($e);

            // Return an error response
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.', 'error' => $e->getMessage()], 500);
        }
    }


    function view_exporter_textile_declearation_invoice($id){
        $data['title'] = "Reports Management";
        $data['page'] = "Reports Management";
        $data['pageIntro'] = "Reports View";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        $data['ExporterTextileDeclearation'] = ExporterTextileDeclearation::where('id',$id)->first();
        if (!$data['ExporterTextileDeclearation']) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        return view('admin.report.exporter-textile-declearation.view', $data);
    }

    function activity_exporter_textile_declearation_invoice($id){
        $data['title'] = "Reports Management";
        $data['page'] = "Reports Management";

        $data['pageIntro'] = "Reports Activity";
        $data['getAllExporterTextileDeclearation'] = ExporterTextileDeclearationHistory::where('exporter_textile_declearation_id', $id)->get();

        if ($data['getAllExporterTextileDeclearation']->isEmpty()) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.exporter-textile-declearation.activity', $data);
    }

    //==================== exporter_textile_declearation_invioce end ======================//



    
//==================== certificate_origins_invioce start ======================//
    function report_List_certificate_origins_invoice(Request $request)
    {
        $data['title'] = "Certificate Origin Invoice";
        $data['page'] = "Certificate Origin Invoice";
        $data['pageIntro'] = "Canada Custom Invoice";
        $data['CertificateOrigin'] = CertificateOrigin::get();
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        // dd($data);
        return view('admin.report.certificate-origins.index', $data);
    }

    public function generate_certificate_origins_invoic_PDF($id)
    {
        $viewName = 'admin.report.certificate-origins.pdf.certificate_origins_pdf';

        // Check if the view exists
        if (!view()->exists($viewName)) {
            abort(404); // Redirect to 404 page if the view does not exist
        }

        $data = [
            'title' => 'certificate-originsPdf',
            'CertificateOrigin' => CertificateOrigin::where('id', $id)->first(),
        ];

        $pdf = PDF::loadView($viewName, $data);

        return $pdf->stream('form9A.pdf');
    }

    function add_certificate_origins_invoice(){

        $data['title'] = "Canada Custom Invoicet";
        $data['page'] = "Canada Custom Invoice";
        $data['pageIntro'] = "Canada Custom Invoice Add";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.certificate-origins.add', $data);
    }

    public function submit_certificate_origins_invoice(Request $request)
    {
        // dd($request->all());

        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Create CanadaCustomerInvoiceFrom record
            $CertificateOrigin = new CertificateOrigin();
            $CertificateOrigin->invioce_generator = rand(0000, 9999).now();
        $CertificateOrigin->team_user_id = $request->input('team_user_id');
        $CertificateOrigin->certificate_origin_invoices = $request->input('certificate_origin_invoices');
       
        // Create related records using loop
         // Assign values from the request to the CanadaCustomerInvoiceFrom model
         $CertificateOrigin->fill($request->all());
        $CertificateOrigin->save();

        $CertificateOriginHistory = new CertificateOriginHistory();
        $CertificateOriginHistory->certificate_origin_id = $CertificateOrigin->id;
        $CertificateOriginHistory->editer_name = Auth::guard('admin')->user()->user_name;

        $CertificateOriginHistory->edited_at = now();
        $CertificateOriginHistory->save();




            return response()->json(['message' => 'All records submitted successfully!']);
        } catch (\Exception $e) {
            // Log the error
            Log::error($e);

            // Return an error response
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.'.$e], 500);
        }
    }



    function edit_certificate_origins_invoice($id){
        $data['title'] = "Reports Management";
        $data['page'] = "Reports Management";
        $data['pageIntro'] = "Reports Edit";
        $data['CertificateOrigin'] = CertificateOrigin::where('id',$id)->first();
        if (!$data['CertificateOrigin']) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.certificate-origins.edit', $data);
    }
    public function update_submit_certificate_origins_invoice(Request $request)
    {
        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('id');
            if ($id) {
                // If an ID is provided, update the existing record
                $CertificateOrigin = CertificateOrigin::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $CertificateOrigin = new CertificateOrigin();
                $CertificateOrigin->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $CertificateOrigin->fill($request->all());

            // Save the CertificateOrigin model
            $CertificateOrigin->save();

            // Create or update related records using a loop

            // Create CanadaInvoiceHistory record
            $CertificateOriginHistory = new CertificateOriginHistory();
            $CertificateOriginHistory->certificate_origin_id = $CertificateOrigin->id;
            $CertificateOriginHistory->editer_name = Auth::guard('admin')->user()->user_name;
    
            $CertificateOriginHistory->edited_at = now();
            $CertificateOriginHistory->save();

            // Return a success response
            return response()->json(['message' => 'All records submitted successfully!']);
        } catch (\Exception $e) {
            // Log the error
            Log::error($e);

            // Return an error response
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.', 'error' => $e->getMessage()], 500);
        }
    }


    function view_certificate_origins_invoice($id){
        $data['title'] = "Certificate Origin  View";
        $data['page'] = "Certificate Origin  View";
        $data['pageIntro'] = "Certificate Origin View";

        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        $data['CertificateOrigin'] = CertificateOrigin::where('id',$id)->first();
        if (!$data['CertificateOrigin']) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        return view('admin.report.certificate-origins.view', $data);
    }

    function activity_certificate_origins_invoice($id){
        $data['title'] = "Certificate Origin Activity";
        $data['page'] = "Certificate Origin Activity";

        $data['pageIntro'] = "Reports Activity";
        $data['getAllCertificateOrigin'] = CertificateOriginHistory::where('certificate_origin_id', $id)->get();

        if ($data['getAllCertificateOrigin']->isEmpty()) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.certificate-origins.activity', $data);
    }

//==================== certificate_origins_invioce end ======================//



     //==================== certificate_origin_no627120_invioce start ======================//
    function report_List_certificate_origin_no627120_invoice(Request $request)
    {
        $data['title'] = "Certificate origin 627120 ";
        $data['page'] = "Certificate origin 627120 ";
        $data['pageIntro'] = "Certificate origin 627120 ";
        $data['CertificateOriginNo627120'] = CertificateOriginNo627120::get();
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        // dd($data);
        return view('admin.report.certificate-origin-no627120.index', $data);
    }

    public function generate_certificate_origin_no627120_invoic_PDF($id)
    {
        $viewName = 'admin.report.certificate-origin-no627120.pdf.certificate_origin_no627120_pdf';

        // Check if the view exists
        if (!view()->exists($viewName)) {
            abort(404); // Redirect to 404 page if the view does not exist
        }

        $data = [
            'title' => 'Certificate Origin No627120Pdf',
            'CertificateOriginNo627120' => CertificateOriginNo627120::where('id', $id)->first(),
        ];

        $pdf = PDF::loadView($viewName, $data);

        return $pdf->stream('form9A.pdf');
    }

    function add_certificate_origin_no627120_invoice(){

        $data['title'] = "Canada Custom Invoicet";
        $data['page'] = "Canada Custom Invoice";
        $data['pageIntro'] = "Canada Custom Invoice Add";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.certificate-origin-no627120.add', $data);
    }

    public function submit_certificate_origin_no627120_invoice(Request $request)
    {
        // dd($request->all());

        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Create CanadaCustomerInvoiceFrom record
            $CertificateOriginNo627120 = new CertificateOriginNo627120();
            $CertificateOriginNo627120->invioce_generator = rand(0000, 9999).now();
        $CertificateOriginNo627120->team_user_id = $request->input('team_user_id');
       
        // Create related records using loop
        $CertificateOriginNo627120->fill($request->all());

        $CertificateOriginNo627120->save();

        $CertificateOriginNo627120History = new CertificateOriginNo627120History();
        $CertificateOriginNo627120History->certificate_origin_no627120_id = $CertificateOriginNo627120->id;
        $CertificateOriginNo627120History->editer_name = Auth::guard('admin')->user()->user_name;

        $CertificateOriginNo627120History->edited_at = now();
        $CertificateOriginNo627120History->save();




            return response()->json(['message' => 'All records submitted successfully!']);
        } catch (\Exception $e) {
            // Log the error
            Log::error($e);

            // Return an error response
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.'.$e], 500);
        }
    }



    function edit_certificate_origin_no627120_invoice($id){
        $data['title'] = "Certificate origin 627120";
        $data['page'] = "Certificate origin 627120";
        $data['pageIntro'] = "Certificate origin 627120 Edit";
        $data['CertificateOriginNo627120'] = CertificateOriginNo627120::where('id',$id)->first();
        if (!$data['CertificateOriginNo627120']) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.certificate-origin-no627120.edit', $data);
    }
    public function update_submit_certificate_origin_no627120_invoice(Request $request)
    {
        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('id');
            if ($id) {
                // If an ID is provided, update the existing record
                $CertificateOriginNo627120 = CertificateOriginNo627120::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $CertificateOriginNo627120 = new CertificateOriginNo627120();
                $CertificateOriginNo627120->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $CertificateOriginNo627120->fill($request->all());

          

            // Save the CanadaCustomerInvoiceFrom model again after updating related records
            $CertificateOriginNo627120->save();

            // Create CanadaInvoiceHistory record
            $CertificateOriginNo627120History = new CertificateOriginNo627120History();
            $CertificateOriginNo627120History->certificate_origin_no627120_id = $CertificateOriginNo627120->id;
            $CertificateOriginNo627120History->editer_name = Auth::guard('admin')->user()->user_name;
    
            $CertificateOriginNo627120History->edited_at = now();
            $CertificateOriginNo627120History->save();

            // Return a success response
            return response()->json(['message' => 'All records submitted successfully!']);
        } catch (\Exception $e) {
            // Log the error
            Log::error($e);

            // Return an error response
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.', 'error' => $e->getMessage()], 500);
        }
    }


    function view_certificate_origin_no627120_invoice($id){
        $data['title'] = "Certificate origin 627120";
        $data['page'] = "Certificate origin 627120";
        $data['pageIntro'] = "Certificate origin 627120 View";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        $data['CertificateOriginNo627120'] = CertificateOriginNo627120::where('id',$id)->first();
        if (!$data['CertificateOriginNo627120']) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        return view('admin.report.certificate-origin-no627120.view', $data);
    }

    function activity_certificate_origin_no627120_invoice($id){
        $data['title'] = "Certificate origin 627120";
        $data['page'] = "Certificate origin 627120";

        $data['pageIntro'] = "Certificate origin 627120 Activity";
        $data['getAllCertificateOriginNo627120'] = CertificateOriginNo627120History::where('certificate_origin_no627120_id', $id)->get();

        if ($data['getAllCertificateOriginNo627120']->isEmpty()) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.certificate-origin-no627120.activity', $data);
    }

    //==================== certificate_origin_no627120_invioce end ======================//


    
     //==================== certificate_origin_com_dec_invioce start ======================//
     function report_List_certificate_origin_com_dec_invoice(Request $request)
     {
         $data['title'] = "Certificate origins Combined Declaration Invoice";
         $data['page'] = "Certificate origins Combined Declaration Invoice";
         $data['pageIntro'] = "Certificate origins Combined Declaration Invoice";
         $data['CertificateOriginComDec'] = CertificateOriginComDec::get();
         $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
         // dd($data);
         return view('admin.report.certificate-origin-com-dec.index', $data);
     }
 
     public function generate_certificate_origin_com_dec_invoic_PDF($id)
     {
         $viewName = 'admin.report.certificate-origin-com-dec.pdf.certificate_origin_com_dec_pdf';
 
         // Check if the view exists
         if (!view()->exists($viewName)) {
             abort(404); // Redirect to 404 page if the view does not exist
         }
 
         $data = [
             'title' => 'Certificate Origin No627120Pdf',
             'CertificateOriginComDec' => CertificateOriginComDec::where('id', $id)->first(),
         ];
 
         $pdf = PDF::loadView($viewName, $data);
 
         return $pdf->stream('form9A.pdf');
     }
 
     function add_certificate_origin_com_dec_invoice(){
 
        $data['title'] = "Certificate origins Combined Declaration ";
        $data['page'] = "Certificate origins Combined Declaration ";
         $data['pageIntro'] = "Certificate origins Combined Declaration ";
         $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
 
         return view('admin.report.certificate-origin-com-dec.add', $data);
     }
 
     public function submit_certificate_origin_com_dec_invoice(Request $request)
     {
         // dd($request->all());
 
         try {
             // Validate the incoming request if necessary
             // $request->validate([...]);
 
             // Create CanadaCustomerInvoiceFrom record
             $CertificateOriginComDec = new CertificateOriginComDec();
             $CertificateOriginComDec->invioce_generator = rand(0000, 9999).now();
         $CertificateOriginComDec->team_user_id = $request->input('team_user_id');
         $CertificateOriginComDec->certificate_origin_com_decs_invoices = $request->input('certificate_origin_com_decs_invoices');
        
         // Create related records using loop
         $CertificateOriginComDec->fill($request->all());
         $CertificateOriginComDec->save();
 
         $CertificateOriginComDecHistory = new CertificateOriginComDecHistory();
         $CertificateOriginComDecHistory->certificate_origin_com_dec_id = $CertificateOriginComDec->id;
         $CertificateOriginComDecHistory->editer_name = Auth::guard('admin')->user()->user_name;
 
         $CertificateOriginComDecHistory->edited_at = now();
         $CertificateOriginComDecHistory->save();
 
 
 
 
             return response()->json(['message' => 'All records submitted successfully!']);
         } catch (\Exception $e) {
             // Log the error
             Log::error($e);
 
             // Return an error response
             return response()->json(['message' => 'An error occurred while submitting the records. Please try again.'.$e], 500);
         }
     }
 
     function edit_certificate_origin_com_dec_invoice($id){
         $data['title'] = "Reports Management";
         $data['page'] = "Reports Management";
         $data['pageIntro'] = "Reports Edit";
         $data['CertificateOriginComDec'] = CertificateOriginComDec::where('id',$id)->first();
         if (!$data['CertificateOriginComDec']) {
             return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
         }
         $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
 
         return view('admin.report.certificate-origin-com-dec.edit', $data);
     }
     public function update_submit_certificate_origin_com_dec_invoice(Request $request)
     {
         try {
             // Validate the incoming request if necessary
             // $request->validate([...]);
 
             // Check if an ID is provided in the request
             $id = $request->input('id');
             if ($id) {
                 // If an ID is provided, update the existing record
                 $CertificateOriginComDec = CertificateOriginComDec::findOrFail($id);
             } else {
                 // If no ID is provided, create a new record
                 $CertificateOriginComDec = new CertificateOriginComDec();
                 $CertificateOriginComDec->invioce_generator = rand(0000, 9999) . now();
             }
 
             // Assign values from the request to the CanadaCustomerInvoiceFrom model
             $CertificateOriginComDec->fill($request->all());
 
         
             // Save the CanadaCustomerInvoiceFrom model again after updating related records
             $CertificateOriginComDec->save();
 
             // Create CanadaInvoiceHistory record
             $CertificateOriginComDecHistory = new CertificateOriginComDecHistory();
             $CertificateOriginComDecHistory->certificate_origin_com_dec_id = $CertificateOriginComDec->id;
             $CertificateOriginComDecHistory->editer_name = Auth::guard('admin')->user()->user_name;
     
             $CertificateOriginComDecHistory->edited_at = now();
             $CertificateOriginComDecHistory->save();
 
             // Return a success response
             return response()->json(['message' => 'All records submitted successfully!']);
         } catch (\Exception $e) {
             // Log the error
             Log::error($e);
 
             // Return an error response
             return response()->json(['message' => 'An error occurred while submitting the records. Please try again.', 'error' => $e->getMessage()], 500);
         }
     }
 
 
     function view_certificate_origin_com_dec_invoice($id){
         $data['title'] = "Reports Management";
         $data['page'] = "Reports Management";
         $data['pageIntro'] = "Reports View";
         $data['CertificateOriginComDec'] = CertificateOriginComDec::where('id',$id)->first();
         if (!$data['CertificateOriginComDec']) {
             return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
         }
         $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
 
         return view('admin.report.certificate-origin-com-dec.view', $data);
     }
 
     function activity_certificate_origin_com_dec_invoice($id){
         $data['title'] = "Reports Management";
         $data['page'] = "Reports Management";
 
         $data['pageIntro'] = "Reports Activity";
         $data['getAllCertificateOriginComDec'] = CertificateOriginComDecHistory::where('certificate_origin_com_dec_id', $id)->get();
 
         if ($data['getAllCertificateOriginComDec']->isEmpty()) {
             return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
         }
         $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
 
         return view('admin.report.certificate-origin-com-dec.activity', $data);
     }
 
     //==================== certificate_origin_com_dec_invioce end ======================//

    
    
    
     //==================== certificate_origin_com_dec_form_ip_invioce start ======================//
     function report_List_certificate_origin_com_dec_form_ip_invoice(Request $request)
     {
         $data['title'] = "Certificate origin  IP";
         $data['page'] = "Certificate origin  IP";
         $data['pageIntro'] = "Certificate origin  IP";
         $data['CertificateOriginComDecFormIp'] = CertificateOriginComDecFormIp::get();
         $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
         // dd($data);
         return view('admin.report.certificate-origin-com-dec-form-ip.index', $data);
     }
 
     public function generate_certificate_origin_com_dec_form_ip_invoic_PDF($id)
     {
         $viewName = 'admin.report.certificate-origin-com-dec-form-ip.pdf.certificate_origin_com_dec_from_ip_pdf';
 
         // Check if the view exists
         if (!view()->exists($viewName)) {
             abort(404); // Redirect to 404 page if the view does not exist
         }
 
         $data = [
             'title' => 'Certificate Origin No627120Pdf',
             'CertificateOriginComDecFormIp' => CertificateOriginComDecFormIp::where('id', $id)->first(),
         ];
 
         $pdf = PDF::loadView($viewName, $data);
 
         return $pdf->stream('form9A.pdf');
     }
 
     function add_certificate_origin_com_dec_form_ip_invoice(){
 
         $data['title'] = "Certificate origin  IP Add";
         $data['page'] = "Certificate origin  IP Add";
         $data['pageIntro'] = "Certificate origin  IP Add";
         $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
 
         return view('admin.report.certificate-origin-com-dec-form-ip.add', $data);
     }
 
     public function submit_certificate_origin_com_dec_form_ip_invoice(Request $request)
     {
         // dd($request->all());
 
         try {
             // Validate the incoming request if necessary
             // $request->validate([...]);
 
             // Create CanadaCustomerInvoiceFrom record
             $CertificateOriginComDecFormIp = new CertificateOriginComDecFormIp();
             $CertificateOriginComDecFormIp->invioce_generator = rand(0000, 9999).now();
         $CertificateOriginComDecFormIp->team_user_id = $request->input('team_user_id');
         $CertificateOriginComDecFormIp->yes_or_no_preferential_treatment = $request->input('yes_or_no_preferential_treatment') == 1 ?  1 : 0;
        
         // Create related records using loop
         $CertificateOriginComDecFormIp->fill($request->all());
         $CertificateOriginComDecFormIp->save();
 
         $CertificateOriginComDecFormIpHistory = new CertificateOriginComDecFormIpHistory();
         $CertificateOriginComDecFormIpHistory->certificate_origin_com_dec_form_ip_id = $CertificateOriginComDecFormIp->id;
         $CertificateOriginComDecFormIpHistory->editer_name = Auth::guard('admin')->user()->user_name;
 
         $CertificateOriginComDecFormIpHistory->edited_at = now();
         $CertificateOriginComDecFormIpHistory->save();
 
 
 
 
             return response()->json(['message' => 'All records submitted successfully!']);
         } catch (\Exception $e) {
             // Log the error
             Log::error($e);
 
             // Return an error response
             return response()->json(['message' => 'An error occurred while submitting the records. Please try again.'.$e], 500);
         }
     }
 
     function edit_certificate_origin_com_dec_form_ip_invoice($id){
         $data['title'] = "Certificate origin  IP";
         $data['page'] = "Certificate origin  IP ";
         $data['pageIntro'] = "Certificate origin  IP Edit";
         $data['CertificateOriginComDecFormIp'] = CertificateOriginComDecFormIp::where('id',$id)->first();
        //  dd($data['CertificateOriginComDecFormIp']);
         if (!$data['CertificateOriginComDecFormIp']) {
             return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
         }
         $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
 
         return view('admin.report.certificate-origin-com-dec-form-ip.edit', $data);
     }
     public function update_submit_certificate_origin_com_dec_form_ip_invoice(Request $request)
     {
         try {
             // Validate the incoming request if necessary
             // $request->validate([...]);
 
             // Check if an ID is provided in the request
             $id = $request->input('id');
             if ($id) {
                 // If an ID is provided, update the existing record
                 $CertificateOriginComDecFormIp = CertificateOriginComDecFormIp::findOrFail($id);
             } else {
                 // If no ID is provided, create a new record
                 $CertificateOriginComDecFormIp = new CertificateOriginComDecFormIp();
                 $CertificateOriginComDecFormIp->invioce_generator = rand(0000, 9999) . now();
             }
 
             // Assign values from the request to the CanadaCustomerInvoiceFrom model
             $CertificateOriginComDecFormIp->yes_or_no_preferential_treatment = $request->input('yes_or_no_preferential_treatment') == 1 ?  1 : 0;
             $CertificateOriginComDecFormIp->fill($request->all());
 
             // Save the CertificateOriginComDecFormIp model
             $CertificateOriginComDecFormIp->save();
 
        
 
 
             // Create CanadaInvoiceHistory record
             $CertificateOriginComDecFormIpHistory = new CertificateOriginComDecFormIpHistory();
             $CertificateOriginComDecFormIpHistory->certificate_origin_com_dec_form_ip_id = $CertificateOriginComDecFormIp->id;
             $CertificateOriginComDecFormIpHistory->editer_name = Auth::guard('admin')->user()->user_name;
     
             $CertificateOriginComDecFormIpHistory->edited_at = now();
             $CertificateOriginComDecFormIpHistory->save();
 
             // Return a success response
             return response()->json(['message' => 'All records submitted successfully!']);
         } catch (\Exception $e) {
             // Log the error
             Log::error($e);
 
             // Return an error response
             return response()->json(['message' => 'An error occurred while submitting the records. Please try again.', 'error' => $e->getMessage()], 500);
         }
     }
 
 
     function view_certificate_origin_com_dec_form_ip_invoice($id){
         $data['title'] = "Certificate origin  IP  View";
         $data['page'] = "Certificate origin  IP  View";
         $data['pageIntro'] = "Certificate origin  IP  View";
         $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
         $data['CertificateOriginComDecFormIp'] = CertificateOriginComDecFormIp::where('id',$id)->first();
         if (!$data['CertificateOriginComDecFormIp']) {
             return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
         }
         return view('admin.report.certificate-origin-com-dec-form-ip.view', $data);
     }
 
     function activity_certificate_origin_com_dec_form_ip_invoice($id){
         $data['title'] = "Certificate origin  IP  Activity";
         $data['page'] = "Certificate origin  IP  Activity";
 
         $data['pageIntro'] = "Certificate origin  IP  Activity";
         $data['getAllCertificateOriginComDecFormIp'] = CertificateOriginComDecFormIpHistory::where('certificate_origin_com_dec_form_ip_id', $id)->get();
 
         if ($data['getAllCertificateOriginComDecFormIp']->isEmpty()) {
             return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
         }
         $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
 
         return view('admin.report.certificate-origin-com-dec-form-ip.activity', $data);
     }
 
     //==================== certificate_origin_com_dec_form_ip_invioce end ======================//


        
     //==================== certificate_origin_com_dec_form_a_invioce start ======================//
     function report_List_certificate_origin_com_dec_form_a_invoice(Request $request)
     {
         $data['title'] = "Certificate origin  A";
         $data['page'] = "Certificate origin  A";
         $data['pageIntro'] = "Certificate origin  A";
         $data['CertificateOriginComDecFormA'] = CertificateOriginComDecFormA::get();
         $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
         // dd($data);
         return view('admin.report.certificate-origin-com-dec-form-a.index', $data);
     }
 
     public function generate_certificate_origin_com_dec_form_a_invoic_PDF($id)
     {
         $viewName = 'admin.report.certificate-origin-com-dec-form-a.pdf.certificate_origin_com_dec_from_a_pdf';
 
         // Check if the view exists
         if (!view()->exists($viewName)) {
             abort(404); // Redirect to 404 page if the view does not exist
         }
 
         $data = [
             'title' => 'Certificate Origin No627120Pdf',
             'CertificateOriginComDecFormA' => CertificateOriginComDecFormA::where('id', $id)->first(),
         ];
 
         $pdf = PDF::loadView($viewName, $data);
 
         return $pdf->stream('form9A.pdf');
     }
 
     function add_certificate_origin_com_dec_form_a_invoice(){
 
         $data['title'] = "Certificate origin  A";
         $data['page'] = "Certificate origin  A";
         $data['pageIntro'] = "Certificate origin  A Add";
         $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
 
         return view('admin.report.certificate-origin-com-dec-form-a.add', $data);
     }
 
     public function submit_certificate_origin_com_dec_form_a_invoice(Request $request)
     {
         // dd($request->all());
 
         try {
             // Validate the incoming request if necessary
             // $request->validate([...]);
 
             // Create CanadaCustomerInvoiceFrom record
             $CertificateOriginComDecFormA = new CertificateOriginComDecFormA();
             $CertificateOriginComDecFormA->invioce_generator = rand(0000, 9999).now();
         $CertificateOriginComDecFormA->team_user_id = $request->input('team_user_id');

         $CertificateOriginComDecFormA->fill($request->all());
 
         // Save the CertificateOriginComDecFormA model
         $CertificateOriginComDecFormA->save();
 
         $CertificateOriginComDecFormAHistory = new CertificateOriginComDecFormAHistory();
         $CertificateOriginComDecFormAHistory->certificate_origin_com_dec_form_a_id = $CertificateOriginComDecFormA->id;
         $CertificateOriginComDecFormAHistory->editer_name = Auth::guard('admin')->user()->user_name;
 
         $CertificateOriginComDecFormAHistory->edited_at = now();
         $CertificateOriginComDecFormAHistory->save();
 
 
 
 
             return response()->json(['message' => 'All records submitted successfully!']);
         } catch (\Exception $e) {
             // Log the error
             Log::error($e);
 
             // Return an error response
             return response()->json(['message' => 'An error occurred while submitting the records. Please try again.'.$e], 500);
         }
     }
 
     function edit_certificate_origin_com_dec_form_a_invoice($id){
         $data['title'] = "Certificate origin  A";
         $data['page'] = "Certificate origin  A";
         $data['pageIntro'] = "Certificate origin  A Edit";
         $data['CertificateOriginComDecFormA'] = CertificateOriginComDecFormA::where('id',$id)->first();
         if (!$data['CertificateOriginComDecFormA']) {
             return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
         }
         $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
 
         return view('admin.report.certificate-origin-com-dec-form-a.edit', $data);
     }
     public function update_submit_certificate_origin_com_dec_form_a_invoice(Request $request)
     {
         try {
             // Validate the incoming request if necessary
             // $request->validate([...]);
 
             // Check if an ID is provided in the request
             $id = $request->input('id');
             if ($id) {
                 // If an ID is provided, update the existing record
                 $CertificateOriginComDecFormA = CertificateOriginComDecFormA::findOrFail($id);
             } else {
                 // If no ID is provided, create a new record
                 $CertificateOriginComDecFormA = new CertificateOriginComDecFormA();
                 $CertificateOriginComDecFormA->invioce_generator = rand(0000, 9999) . now();
             }
 
             // Assign values from the request to the CanadaCustomerInvoiceFrom model
             $CertificateOriginComDecFormA->fill($request->all());
 
             // Save the CertificateOriginComDecFormA model
             $CertificateOriginComDecFormA->save();
 
         
 
             // Save the CanadaCustomerInvoiceFrom model again after updating related records
             $CertificateOriginComDecFormA->save();
 
             // Create CanadaInvoiceHistory record
             $CertificateOriginComDecFormAHistory = new CertificateOriginComDecFormAHistory();
             $CertificateOriginComDecFormAHistory->certificate_origin_com_dec_form_a_id = $CertificateOriginComDecFormA->id;
             $CertificateOriginComDecFormAHistory->editer_name = Auth::guard('admin')->user()->user_name;
     
             $CertificateOriginComDecFormAHistory->edited_at = now();
             $CertificateOriginComDecFormAHistory->save();
 
             // Return a success response
             return response()->json(['message' => 'All records submitted successfully!']);
         } catch (\Exception $e) {
             // Log the error
             Log::error($e);
 
             // Return an error response
             return response()->json(['message' => 'An error occurred while submitting the records. Please try again.', 'error' => $e->getMessage()], 500);
         }
     }
 
 
     function view_certificate_origin_com_dec_form_a_invoice($id){
         $data['title'] = "Certificate origin  A View";
         $data['page'] = "Certificate origin  A View";
         $data['pageIntro'] = "Certificate origin  A View";
         $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
         $data['CertificateOriginComDecFormA'] = CertificateOriginComDecFormA::where('id',$id)->first();
         if (!$data['CertificateOriginComDecFormA']) {
             return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
         }
         return view('admin.report.certificate-origin-com-dec-form-a.view', $data);
     }
 
     function activity_certificate_origin_com_dec_form_a_invoice($id){
         $data['title'] = "Certificate origin  A Activity";
         $data['page'] = "Certificate origin  A Activity";
 
         $data['pageIntro'] = "Certificate origin  A Activity";
         $data['getAllCertificateOriginComDecFormA'] = CertificateOriginComDecFormAHistory::where('certificate_origin_com_dec_form_a_id', $id)->get();
 
         if ($data['getAllCertificateOriginComDecFormA']->isEmpty()) {
             return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
         }
         $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
 
         return view('admin.report.certificate-origin-com-dec-form-a.activity', $data);
     }
 
     //==================== certificate_origin_com_dec_form_a_invioce end ======================//


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
