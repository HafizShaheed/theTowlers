<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\team\TeamUser;
use Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Validation\Rule;
use Mail;
use Carbon\Carbon;
use App\Models\CanadaCustomerInvoiceFrom;
use App\Models\CanadaInvoiceHistory;
use App\Models\CertificateOrigin;
use App\Models\CertificateOriginChaina;
use App\Models\CertificateOriginChainaHistory;
use App\Models\CertificateOriginComDec;
use App\Models\CertificateOriginComDecFormA;
use App\Models\CertificateOriginComDecFormAHistory;
use App\Models\CertificateOriginComDecFormIp;
use App\Models\CertificateOriginComDecFormIpHistory;
use App\Models\CertificateOriginComDecHistory;
use App\Models\CertificateOriginHistory;
use App\Models\CertificateOriginNo627120;
use App\Models\CertificateOriginNo627120History;
use App\Models\CommercialInvoice;
use App\Models\CommercialInvoiceHistory;
use App\Models\CommercialInvoiceRelatedFieldPart1;
use App\Models\CommercialInvoiceRelatedFieldPart2;
use App\Models\CommercialInvoiceRelatedFieldPart3;
use App\Models\CommercialInvoiceRelatedFieldPart4;
use App\Models\CommercialInvoiceRelatedFieldPart5;
use App\Models\CommercialInvoiceRelatedFieldPart6;
use App\Models\CommercialInvoiceRelatedFieldPart7;
use App\Models\CommercialInvoiceRelatedFieldPart8;
use App\Models\CommercialInvoiceRelatedValuePart1;
use App\Models\CommercialInvoiceRelatedValuePart10;
use App\Models\CommercialInvoiceRelatedValuePart2;
use App\Models\CommercialInvoiceRelatedValuePart3;
use App\Models\CommercialInvoiceRelatedValuePart4;
use App\Models\CommercialInvoiceRelatedValuePart5;
use App\Models\CommercialInvoiceRelatedValuePart6;
use App\Models\CommercialInvoiceRelatedValuePart7;
use App\Models\CommercialInvoiceRelatedValuePart8;
use App\Models\CommercialInvoiceRelatedValuePart9;
use App\Models\ExporterTextileDeclearation;
use App\Models\ExporterTextileDeclearationHistory;
use App\Models\Form59AHistory;
use App\Models\Form59AInvoice;
use Illuminate\Support\Facades\Log;

use App\Models\PackingList;
use App\Models\PackingListHistory;
use App\Models\PackingListRelatedFieldPart1;
use App\Models\PackingListRelatedFieldPart2;
use App\Models\PackingListRelatedFieldPart3;
use App\Models\PackingListRelatedFieldPart4;
use App\Models\PackingListRelatedFieldPart5;
use App\Models\PackingListRelatedFieldPart6;
use App\Models\PackingListRelatedFieldPart7;
use App\Models\PackingListRelatedFieldPart8;
use App\Models\PackingListRelatedValuePart1;
use App\Models\PackingListRelatedValuePart10;
use App\Models\PackingListRelatedValuePart11;
use App\Models\PackingListRelatedValuePart2;
use App\Models\PackingListRelatedValuePart3;
use App\Models\PackingListRelatedValuePart4;
use App\Models\PackingListRelatedValuePart5;
use App\Models\PackingListRelatedValuePart6;
use App\Models\PackingListRelatedValuePart7;
use App\Models\PackingListRelatedValuePart8;
use App\Models\PackingListRelatedValuePart9;

use Dompdf\Dompdf;
use Dompdf\Options;

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
        $viewName = 'admin.report.custom-canda-invoice.pdf.' . $count . 'my_pdf';

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
        $data['title'] = "CANADA CUSTOMS INVOICE";
        $data['page'] = "CANADA CUSTOMS INVOICE";
        $data['pageIntro'] = "CANADA CUSTOMS INVOICE";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        // dd($data);
        $query = CanadaCustomerInvoiceFrom::query();


        if (isset($request->teamMember) && !empty($request->teamMember)) {
            $party_id = (int)$request->input('teamMember');
            $query->where('team_user_id', $party_id);
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


        $data['CanadaCustomerInvoiceFrom'] = $query->latest()->get();
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

        // Create a new Dompdf instance
        $dompdf = new Dompdf();

        // Load HTML content from view
        $html = view($viewName, $data)->render();

        // Load options
        $options = new Options();
        $options->set('isPhpEnabled', true); // Enable PHP execution
        $dompdf->setOptions($options);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation (optional)
        $dompdf->setPaper('A4', 'portrait');

        // Set page numbers
        // $dompdf->setCallbacks([
        //     'pageNumber' => 'Page {PAGE_NUM}',
        // ]);
        // Set page numbers
        // Set page numbers
        $dompdf->setCallbacks([
            'pageNumber' => 'Page {PAGE_NUM}',
            'totalPages' => ' of {PAGE_COUNT}',
        ]);



        // Render the HTML as PDF
        $dompdf->render();

        // Get the generated PDF output
        $output = $dompdf->output();

        // Generate PDF file name
        $pdfName = $id . now() . '-custom-canda-invoice.pdf';

        // Output the PDF as stream
        return response()->streamDownload(function () use ($output) {
            echo $output;
        }, $pdfName);
    }
    // public function generate_custom_canda_invoic_PDF($id)
    // {

    //     $viewName = 'admin.report.custom-canda-invoice.pdf.custom-canda-invoice-pdf';

    //     // Check if the view exists
    //     if (!view()->exists($viewName)) {
    //         abort(404); // Redirect to 404 page if the view does not exist
    //     }
    //     $data = [
    //         'title' => 'Canada Customer Invoice Pdf',
    //         'CanadaCustomerInvoiceFrom' => CanadaCustomerInvoiceFrom::where('id', $id)->first(),
    //     ];

    //     //############ Permitir ver imagenes si falla ################################
    //     $contxt = stream_context_create([
    //         'ssl' => [
    //             'verify_peer' => FALSE,
    //             'verify_peer_name' => FALSE,
    //             'allow_self_signed' => TRUE,

    //         ]
    //     ]);



    //     $pdf = PDF::setOptions(['isHTML5ParserEnabled' => true, 'isRemoteEnabled' => true]);
    //     $pdf->getDomPDF()->setHttpContext($contxt);
    //     //#################################################################################
    //     //    dd($data);
    //     $pdf->setOptions(['isPhpEnabled' => true])->loadView($viewName, $data)
    //         ->setOptions(['defaultFont' => 'sans-serif']);
    //     // return  view($viewName, $data);
    //     // dd($view->render());
    //     $fecha = date('d/m/Y');
    //     $path = "Order-" . strtoupper(utf8_decode($id)) . "-detail-" . $fecha;


    //     return $pdf->download("Order-" . strtoupper(utf8_decode($id)) . "-detail-" . $fecha . ".pdf");
    // }

    function add_custom_canda_invoice()
    {

        $data['title'] = "CANADA CUSTOMS INVOICE";
        $data['page'] = "CANADA CUSTOMS INVOICE";
        $data['pageIntro'] = "CANADA CUSTOMS INVOICE";
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
            $canadaCustomerInvoiceFrom->invioce_generator = rand(0000, 9999) . now();
            $canadaCustomerInvoiceFrom->team_user_id = $request->input('team_user_id');
            $canadaCustomerInvoiceFrom->commercial_invoice_id = $request->input('commercial_invoice_id');
            $canadaCustomerInvoiceFrom->status = 1;
            $canadaCustomerInvoiceFrom->canada_customer_invoice = $request->input('canada_customer_invoice');
            $canadaCustomerInvoiceFrom->vender_name = $request->input('vender_name');
            $canadaCustomerInvoiceFrom->vender_address = $request->input('vender_address');
            $canadaCustomerInvoiceFrom->date_of_direct_shipment_to_canada_1 = $request->input('date_of_direct_shipment_to_canada_1');
            $canadaCustomerInvoiceFrom->date_of_direct_shipment_to_canada_2 = $request->input('date_of_direct_shipment_to_canada_2');
            $canadaCustomerInvoiceFrom->consignee_name = $request->input('consignee_name');
            $canadaCustomerInvoiceFrom->consignee_address = $request->input('consignee_address');
            $canadaCustomerInvoiceFrom->purchaser_name = $request->input('purchaser_name');
            $canadaCustomerInvoiceFrom->purchaser_address = $request->input('purchaser_address');
            $canadaCustomerInvoiceFrom->originator_name = $request->input('originator_name');
            $canadaCustomerInvoiceFrom->originator_address = $request->input('originator_address');
            $canadaCustomerInvoiceFrom->exporter_name = $request->input('exporter_name');
            $canadaCustomerInvoiceFrom->exporter_address = $request->input('exporter_address');
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
                $canadaCustomerInvoiceFrom->{"quantity_unit_$i"} = $request->input("quantity_unit_$i");
                
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
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.' . $e], 500);
        }
    }



    function edit_custom_canda_invoice($id)
    {
        $data['title'] = "CANADA CUSTOMS INVOICE";
        $data['page'] = "CANADA CUSTOMS INVOICE";
        $data['pageIntro'] = "CANADA CUSTOMS INVOICE";
        $data['editCanadaCustomerInvoiceFrom'] = CanadaCustomerInvoiceFrom::where('id', $id)->first();
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
            $canadaCustomerInvoiceFrom->status = 1;

            $canadaCustomerInvoiceFrom->save();

            // Create or update related records using a loop
            for ($i = 1; $i <= 6; $i++) {
                // Packages
                $canadaCustomerInvoiceFrom->{"number_of_packages_nombre_de_coils_$i"} = $request->input("number_of_packages_nombre_de_coils_$i");
                // Quantity
                $canadaCustomerInvoiceFrom->{"quantity_$i"} = $request->input("quantity_$i");
                $canadaCustomerInvoiceFrom->{"quantity_unit_$i"} = $request->input("quantity_unit_$i");

                // Unit Price
                
                $canadaCustomerInvoiceFrom->{"unit_price_$i"} = $request->input("unit_price_$i");
            }
            $canadaCustomerInvoiceFrom->commercial_invoice_id = $request->input('commercial_invoice_id');


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


    function view_custom_canda_invoice($id)
    {
        $data['title'] = "CANADA CUSTOMS INVOICE";
        $data['page'] = "CANADA CUSTOMS INVOICE";
        $data['pageIntro'] = "Reports View";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        $data['editCanadaCustomerInvoiceFrom'] = CanadaCustomerInvoiceFrom::where('id', $id)->first();
        if (!$data['editCanadaCustomerInvoiceFrom']) {
            return back()->with('error', 'No Canada invoice history found for the provided ID.');
        }
        return view('admin.report.custom-canda-invoice.view', $data);
    }

    function activity_custom_canda_invoice($id)
    {
        $data['title'] = "CANADA CUSTOMS INVOICE";
        $data['page'] = "CANADA CUSTOMS INVOICE";

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
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        // dd($data);
        $query = Form59AInvoice::query();


        if (isset($request->teamMember) && !empty($request->teamMember)) {
            $party_id = (int)$request->input('teamMember');
            $query->where('team_user_id', $party_id);
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


        $data['Form59AInvoice'] = $query->latest()->get();
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
            'title' => 'Form 59 A Invoice Pdf',
            'Form59AInvoice' => Form59AInvoice::where('id', $id)->first(),
        ];


        // Create a new Dompdf instance
        $dompdf = new Dompdf();

        // Load HTML content from view
        $html = view($viewName, $data)->render();
        // return $html;
        // Load options
        $options = new Options();
        $options->set('isPhpEnabled', true); // Enable PHP execution
        $dompdf->setOptions($options);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation (optional)
        $dompdf->setPaper('A4', 'portrait');

        // Set page numbers
        // $dompdf->setCallbacks([
        //     'pageNumber' => 'Page {PAGE_NUM}',
        // ]);
        // Set page numbers
        // Set page numbers
        $dompdf->setCallbacks([
            'pageNumber' => 'Page {PAGE_NUM}',
            'totalPages' => ' of {PAGE_COUNT}',
        ]);



        // Render the HTML as PDF
        $dompdf->render();

        // Get the generated PDF output
        $output = $dompdf->output();

        // Generate PDF file name
        $pdfName = $id . now() . '-form-59-A-invoice.pdf';

        // Output the PDF as stream

        return response()->streamDownload(function () use ($output) {
            echo $output;
        }, $pdfName);
    }

    function add_form_59_a_invoice()
    {

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
            $Form59AInvoice->invioce_generator = rand(0000, 9999) . now();
            $Form59AInvoice->team_user_id = $request->input('team_user_id');
            $Form59AInvoice->commercial_invoice_id = $request->input('commercial_invoice_id');

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
            $Form59AInvoice->sea_airport_of_discharge = $request->input('sea_airport_of_discharge');
            $Form59AInvoice->final_destination_of_goods = $request->input('final_destination_of_goods');
            $Form59AInvoice->if_amount_has_been_inciuded_in_the_current_domestic_value = $request->input('if_amount_has_been_inciuded_in_the_current_domestic_value');
            $Form59AInvoice->drawback_or_remission_of_duty = $request->input('drawback_or_remission_of_duty');
            $Form59AInvoice->status = 1;

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
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.' . $e], 500);
        }
    }



    function edit_form_59_a_invoice($id)
    {
        $data['title'] = "Edit form 59 A";
        $data['page'] = "Edit form 59 A";
        $data['pageIntro'] = "Reports Edit";
        $data['Form59AInvoice'] = Form59AInvoice::where('id', $id)->first();
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
            $Form59AInvoice->commercial_invoice_id = $request->input('commercial_invoice_id');
            $Form59AInvoice->status = 1;

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


    function view_form_59_a_invoice($id)
    {
        $data['title'] = "Reports Management";
        $data['page'] = "Reports Management";
        $data['pageIntro'] = "Reports View";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        $data['Form59AInvoice'] = Form59AInvoice::where('id', $id)->first();
        if (!$data['Form59AInvoice']) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        return view('admin.report.form-59-A-invoice.view', $data);
    }

    function activity_form_59_a_invoice($id)
    {
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


    //==================== form 59 A invioce end ======================//


    //==================== exporter_textile_declearation_invioce start ======================//
    function report_List_exporter_textile_declearation_invoice(Request $request)
    {
        $data['title'] = "EXPORTERS TEXTILE DECLARATION OF COUNTRY OF ORIGIN";
        $data['page'] = "EXPORTERS TEXTILE DECLARATION OF COUNTRY OF ORIGIN";
        $data['pageIntro'] = "EXPORTERS TEXTILE DECLARATION OF COUNTRY OF ORIGIN";

        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        // dd($data);
        $query = ExporterTextileDeclearation::query();


        if (isset($request->teamMember) && !empty($request->teamMember)) {
            $party_id = (int)$request->input('teamMember');
            $query->where('team_user_id', $party_id);
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


        $data['ExporterTextileDeclearation'] = $query->latest()->get();
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
            'title' => 'Exporter Textile Declearation Invoice Pdf',
            'ExporterTextileDeclearation' => ExporterTextileDeclearation::where('id', $id)->first(),
        ];


        // Create a new Dompdf instance
        $dompdf = new Dompdf();

        // Load HTML content from view
        $html = view($viewName, $data)->render();
        // return $html;
        // Load options
        $options = new Options();
        $options->set('isPhpEnabled', true); // Enable PHP execution
        $dompdf->setOptions($options);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation (optional)
        $dompdf->setPaper('A4', 'portrait');

        // Set page numbers
        // $dompdf->setCallbacks([
        //     'pageNumber' => 'Page {PAGE_NUM}',
        // ]);
        // Set page numbers
        // Set page numbers
        $dompdf->setCallbacks([
            'pageNumber' => 'Page {PAGE_NUM}',
            'totalPages' => ' of {PAGE_COUNT}',
        ]);



        // Render the HTML as PDF
        $dompdf->render();

        // Get the generated PDF output
        $output = $dompdf->output();

        // Generate PDF file name
        $pdfName = $id . now() . '-EXPORTERS-TEXTILE-DECLARATION-OF-COUNTRY-OF-ORIGIN-invoice.pdf';

        // Output the PDF as stream

        return response()->streamDownload(function () use ($output) {
            echo $output;
        }, $pdfName);
    }

    function add_exporter_textile_declearation_invoice()
    {

        $data['title'] = "ADD | EXPORTERS TEXTILE DECLARATION OF COUNTRY OF ORIGIN";
        $data['page'] = "EXPORTERS TEXTILE DECLARATION OF COUNTRY OF ORIGIN";
        $data['pageIntro'] = "EXPORTERS TEXTILE DECLARATION OF COUNTRY OF ORIGIN";
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
            $ExporterTextileDeclearation->invioce_generator = rand(0000, 9999) . now();
            $ExporterTextileDeclearation->team_user_id = $request->input('team_user_id');

            $ExporterTextileDeclearation->commercial_invoice_id = $request->input('commercial_invoice_id');
            $ExporterTextileDeclearation->status = 1;

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
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.' . $e], 500);
        }
    }



    function edit_exporter_textile_declearation_invoice($id)
    {
        $data['title'] = "EDIT | EXPORTERS TEXTILE DECLARATION OF COUNTRY OF ORIGIN";
        $data['page'] = "EXPORTERS TEXTILE DECLARATION OF COUNTRY OF ORIGIN";
        $data['pageIntro'] = "EXPORTERS TEXTILE DECLARATION OF COUNTRY OF ORIGIN";
        $data['ExporterTextileDeclearation'] = ExporterTextileDeclearation::where('id', $id)->first();
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
            $ExporterTextileDeclearation->commercial_invoice_id = $request->input('commercial_invoice_id');

            // Save the ExporterTextileDeclearation model
            $ExporterTextileDeclearation->status = 1;

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


    function view_exporter_textile_declearation_invoice($id)
    {
        $data['title'] = "VIEW EXPORTERS TEXTILE DECLARATION OF COUNTRY OF ORIGIN";
        $data['page'] = "EXPORTERS TEXTILE DECLARATION OF COUNTRY OF ORIGIN";
        $data['pageIntro'] = "Reports View";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        $data['ExporterTextileDeclearation'] = ExporterTextileDeclearation::where('id', $id)->first();
        if (!$data['ExporterTextileDeclearation']) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        return view('admin.report.exporter-textile-declearation.view', $data);
    }

    function activity_exporter_textile_declearation_invoice($id)
    {
        $data['title'] = "ACTIVITY | EXPORTERS TEXTILE DECLARATION OF COUNTRY OF ORIGIN";
        $data['page'] = "EXPORTERS TEXTILE DECLARATION OF COUNTRY OF ORIGIN";

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
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        // dd($data);
        $query = CertificateOrigin::query();


        if (isset($request->teamMember) && !empty($request->teamMember)) {
            $party_id = (int)$request->input('teamMember');
            $query->where('team_user_id', $party_id);
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


        $data['CertificateOrigin'] = $query->latest()->get();
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
            'title' => 'certificate origins Pdf',
            'CertificateOrigin' => CertificateOrigin::where('id', $id)->first(),
        ];


        // Create a new Dompdf instance
        $dompdf = new Dompdf();

        // Load HTML content from view
        $html = view($viewName, $data)->render();
        // return $html;
        // Load options
        $options = new Options();
        $options->set('isPhpEnabled', true); // Enable PHP execution
        $dompdf->setOptions($options);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation (optional)
        $dompdf->setPaper('A4', 'portrait');

        // Set page numbers
        // $dompdf->setCallbacks([
        //     'pageNumber' => 'Page {PAGE_NUM}',
        // ]);
        // Set page numbers
        // Set page numbers
        $dompdf->setCallbacks([
            'pageNumber' => 'Page {PAGE_NUM}',
            'totalPages' => ' of {PAGE_COUNT}',
        ]);



        // Render the HTML as PDF
        $dompdf->render();

        // Get the generated PDF output
        $output = $dompdf->output();

        // Generate PDF file name
        $pdfName = $id . now() . '-Certificate-Origin-invoice.pdf';

        // Output the PDF as stream

        return response()->streamDownload(function () use ($output) {
            echo $output;
        }, $pdfName);
    }

    function add_certificate_origins_invoice()
    {

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
            $CertificateOrigin->invioce_generator = rand(0000, 9999) . now();
            $CertificateOrigin->team_user_id = $request->input('team_user_id');
            $CertificateOrigin->certificate_origin_invoices = $request->input('certificate_origin_invoices');
            $CertificateOrigin->commercial_invoice_id = $request->input('commercial_invoice_id');

            // Create related records using loop
            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $CertificateOrigin->fill($request->all());
            $CertificateOrigin->status = 1;

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
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.' . $e], 500);
        }
    }



    function edit_certificate_origins_invoice($id)
    {
        $data['title'] = "Reports Management";
        $data['page'] = "Reports Management";
        $data['pageIntro'] = "Reports Edit";
        $data['CertificateOrigin'] = CertificateOrigin::where('id', $id)->first();
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
            $CertificateOrigin->commercial_invoice_id = $request->input('commercial_invoice_id');
            $CertificateOrigin->status = 1;

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


    function view_certificate_origins_invoice($id)
    {
        $data['title'] = "Certificate Origin  View";
        $data['page'] = "Certificate Origin  View";
        $data['pageIntro'] = "Certificate Origin View";

        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        $data['CertificateOrigin'] = CertificateOrigin::where('id', $id)->first();
        if (!$data['CertificateOrigin']) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        return view('admin.report.certificate-origins.view', $data);
    }

    function activity_certificate_origins_invoice($id)
    {
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
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        // dd($data);
        $query = CertificateOriginNo627120::query();


        if (isset($request->teamMember) && !empty($request->teamMember)) {
            $party_id = (int)$request->input('teamMember');
            $query->where('team_user_id', $party_id);
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


        $data['CertificateOriginNo627120'] = $query->latest()->get();
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
            'title' => 'Certificate Origin No627120 Pdf',
            'CertificateOriginNo627120' => CertificateOriginNo627120::where('id', $id)->first(),
        ];

        // Create a new Dompdf instance
        $dompdf = new Dompdf();

        // Load HTML content from view
        $html = view($viewName, $data)->render();
        // return $html;
        // Load options
        $options = new Options();
        $options->set('isPhpEnabled', true); // Enable PHP execution
        $dompdf->setOptions($options);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation (optional)
        $dompdf->setPaper('A4', 'portrait');

        // Set page numbers
        // $dompdf->setCallbacks([
        //     'pageNumber' => 'Page {PAGE_NUM}',
        // ]);
        // Set page numbers
        // Set page numbers
        $dompdf->setCallbacks([
            'pageNumber' => 'Page {PAGE_NUM}',
            'totalPages' => ' of {PAGE_COUNT}',
        ]);



        // Render the HTML as PDF
        $dompdf->render();

        // Get the generated PDF output
        $output = $dompdf->output();

        // Generate PDF file name
        $pdfName = $id . now() . '-Certificate-Origin-invoice.pdf';

        // Output the PDF as stream

        return response()->streamDownload(function () use ($output) {
            echo $output;
        }, $pdfName);
    }

    function add_certificate_origin_no627120_invoice()
    {

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
            $CertificateOriginNo627120->invioce_generator = rand(0000, 9999) . now();
            $CertificateOriginNo627120->team_user_id = $request->input('team_user_id');
            $CertificateOriginNo627120->commercial_invoice_id = $request->input('commercial_invoice_id');

            // Create related records using loop
            $CertificateOriginNo627120->fill($request->all());
            $CertificateOriginNo627120->status = 1;

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
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.' . $e], 500);
        }
    }



    function edit_certificate_origin_no627120_invoice($id)
    {
        $data['title'] = "Certificate origin 627120";
        $data['page'] = "Certificate origin 627120";
        $data['pageIntro'] = "Certificate origin 627120 Edit";
        $data['CertificateOriginNo627120'] = CertificateOriginNo627120::where('id', $id)->first();
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
            $CertificateOriginNo627120->commercial_invoice_id = $request->input('commercial_invoice_id');


            $CertificateOriginNo627120->status = 1;

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


    function view_certificate_origin_no627120_invoice($id)
    {
        $data['title'] = "Certificate origin 627120";
        $data['page'] = "Certificate origin 627120";
        $data['pageIntro'] = "Certificate origin 627120 View";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        $data['CertificateOriginNo627120'] = CertificateOriginNo627120::where('id', $id)->first();
        if (!$data['CertificateOriginNo627120']) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        return view('admin.report.certificate-origin-no627120.view', $data);
    }

    function activity_certificate_origin_no627120_invoice($id)
    {
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
        $data['title'] = "Certificate of origin - Preferential arrangements among developing countries negotiated in GATT";
        $data['page'] = "Certificate of origin - Preferential arrangements among developing countries negotiated in GATT";
        $data['pageIntro'] = "Certificate of origin - Preferential arrangements among developing countries negotiated in GATT";

        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        // dd($data);
        $query = CertificateOriginComDec::query();


        if (isset($request->teamMember) && !empty($request->teamMember)) {
            $party_id = (int)$request->input('teamMember');
            $query->where('team_user_id', $party_id);
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


        $data['CertificateOriginComDec'] = $query->latest()->get();
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
            'title' => 'Certificate Origin Combine and declare',
            'CertificateOriginComDec' => CertificateOriginComDec::where('id', $id)->first(),
        ];
        // Create a new Dompdf instance
        $dompdf = new Dompdf();

        // Load HTML content from view
        $html = view($viewName, $data)->render();
        // return $html;
        // Load options
        $options = new Options();
        $options->set('isPhpEnabled', true); // Enable PHP execution
        $dompdf->setOptions($options);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation (optional)
        $dompdf->setPaper('A4', 'portrait');

        // Set page numbers
        // $dompdf->setCallbacks([
        //     'pageNumber' => 'Page {PAGE_NUM}',
        // ]);
        // Set page numbers
        // Set page numbers
        $dompdf->setCallbacks([
            'pageNumber' => 'Page {PAGE_NUM}',
            'totalPages' => ' of {PAGE_COUNT}',
        ]);



        // Render the HTML as PDF
        $dompdf->render();

        // Get the generated PDF output
        $output = $dompdf->output();

        // Generate PDF file name
        $pdfName = $id . now() . '-Certificate-of-origin-Preferential-arrangements-among-developing-countries-negotiated-in-GATT.pdf';

        // Output the PDF as stream

        return response()->streamDownload(function () use ($output) {
            echo $output;
        }, $pdfName);
    }

    function add_certificate_origin_com_dec_invoice()
    {

        $data['title'] = "Certificate of origin - Preferential arrangements among developing countries negotiated in GATT";
        $data['page'] = "Certificate of origin - Preferential arrangements among developing countries negotiated in GATT";
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
            $CertificateOriginComDec->invioce_generator = rand(0000, 9999) . now();
            $CertificateOriginComDec->team_user_id = $request->input('team_user_id');
            $CertificateOriginComDec->commercial_invoice_id = $request->input('commercial_invoice_id');
            $CertificateOriginComDec->certificate_origin_com_decs_invoices = $request->input('certificate_origin_com_decs_invoices');

            // Create related records using loop
            $CertificateOriginComDec->fill($request->all());
            $CertificateOriginComDec->status = 1;

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
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.' . $e], 500);
        }
    }

    function edit_certificate_origin_com_dec_invoice($id)
    {
        $data['title'] = "Certificate of origin - Preferential arrangements among developing countries negotiated in GATT";
        $data['page'] = "Certificate of origin - Preferential arrangements among developing countries negotiated in GATT";
        $data['pageIntro'] = "Reports Edit";
        $data['CertificateOriginComDec'] = CertificateOriginComDec::where('id', $id)->first();
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
            $CertificateOriginComDec->commercial_invoice_id = $request->input('commercial_invoice_id');
            $CertificateOriginComDec->status = 1;


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


    function view_certificate_origin_com_dec_invoice($id)
    {
        $data['title'] = "Certificate of origin - Preferential arrangements among developing countries negotiated in GATT";
        $data['page'] = "Certificate of origin - Preferential arrangements among developing countries negotiated in GATT";
        $data['pageIntro'] = "Reports View";
        $data['CertificateOriginComDec'] = CertificateOriginComDec::where('id', $id)->first();
        if (!$data['CertificateOriginComDec']) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.certificate-origin-com-dec.view', $data);
    }

    function activity_certificate_origin_com_dec_invoice($id)
    {
        $data['title'] = "Certificate of origin - Preferential arrangements among developing countries negotiated in GATT";
        $data['page'] = "Certificate of origin - Preferential arrangements among developing countries negotiated in GATT";

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
        $data['title'] = "Certificate of origin - Indonesia - Pakistan Preferential Trade Agreement (IPPTA)";
        $data['page'] = "Certificate of origin - Indonesia - Pakistan Preferential Trade Agreement (IPPTA)";
        $data['pageIntro'] = "Certificate of origin - Indonesia - Pakistan Preferential Trade Agreement (IPPTA)";

        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        // dd($data);
        $query = CertificateOriginComDecFormIp::query();


        if (isset($request->teamMember) && !empty($request->teamMember)) {
            $party_id = (int)$request->input('teamMember');
            $query->where('team_user_id', $party_id);
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


        $data['CertificateOriginComDecFormIp'] = $query->latest()->get();
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
            'title' => 'Certificate Origin combine and declear ip',
            'CertificateOriginComDecFormIp' => CertificateOriginComDecFormIp::where('id', $id)->first(),
        ];

        // Create a new Dompdf instance
        $dompdf = new Dompdf();

        // Load HTML content from view
        $html = view($viewName, $data)->render();
        // return $html;
        // Load options
        $options = new Options();
        $options->set('isPhpEnabled', true); // Enable PHP execution
        $dompdf->setOptions($options);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation (optional)
        $dompdf->setPaper('A4', 'portrait');

        // Set page numbers
        // $dompdf->setCallbacks([
        //     'pageNumber' => 'Page {PAGE_NUM}',
        // ]);
        // Set page numbers
        // Set page numbers
        $dompdf->setCallbacks([
            'pageNumber' => 'Page {PAGE_NUM}',
            'totalPages' => ' of {PAGE_COUNT}',
        ]);



        // Render the HTML as PDF
        $dompdf->render();

        // Get the generated PDF output
        $output = $dompdf->output();

        // Generate PDF file name
        $pdfName = $id . now() . '-Certificate-of-origin-Indonesia-Pakistan-Preferential-Trade-Agreement-(IPPTA).pdf';

        // Output the PDF as stream

        return response()->streamDownload(function () use ($output) {
            echo $output;
        }, $pdfName);
    }

    function add_certificate_origin_com_dec_form_ip_invoice()
    {

        $data['title'] = "Certificate of origin - Indonesia - Pakistan Preferential Trade Agreement (IPPTA)";
        $data['page'] = "Certificate of origin - Indonesia - Pakistan Preferential Trade Agreement (IPPTA)";
        $data['pageIntro'] = "Certificate of origin - Indonesia - Pakistan Preferential Trade Agreement (IPPTA)";
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
            $CertificateOriginComDecFormIp->invioce_generator = rand(0000, 9999) . now();
            $CertificateOriginComDecFormIp->team_user_id = $request->input('team_user_id');
            $CertificateOriginComDecFormIp->yes_or_no_preferential_treatment = $request->input('yes_or_no_preferential_treatment') == 1 ?  1 : 0;
            $CertificateOriginComDecFormIp->commercial_invoice_id = $request->input('commercial_invoice_id');

            // Create related records using loop
            $CertificateOriginComDecFormIp->fill($request->all());
            $CertificateOriginComDecFormIp->status = 1;

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
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.' . $e], 500);
        }
    }

    function edit_certificate_origin_com_dec_form_ip_invoice($id)
    {
        $data['title'] = "Certificate origin  IP";
        $data['page'] = "Certificate origin  IP ";
        $data['pageIntro'] = "Certificate origin  IP Edit";
        $data['CertificateOriginComDecFormIp'] = CertificateOriginComDecFormIp::where('id', $id)->first();
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
            $CertificateOriginComDecFormIp->commercial_invoice_id = $request->input('commercial_invoice_id');
            $CertificateOriginComDecFormIp->status = 1;

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


    function view_certificate_origin_com_dec_form_ip_invoice($id)
    {
        $data['title'] = "Certificate of origin - Indonesia - Pakistan Preferential Trade Agreement (IPPTA)";
        $data['page'] = "Certificate of origin - Indonesia - Pakistan Preferential Trade Agreement (IPPTA)";
        $data['pageIntro'] = "Certificate of origin - Indonesia - Pakistan Preferential Trade Agreement (IPPTA)";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        $data['CertificateOriginComDecFormIp'] = CertificateOriginComDecFormIp::where('id', $id)->first();
        if (!$data['CertificateOriginComDecFormIp']) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        return view('admin.report.certificate-origin-com-dec-form-ip.view', $data);
    }

    function activity_certificate_origin_com_dec_form_ip_invoice($id)
    {
        $data['title'] = "Certificate of origin - Indonesia - Pakistan Preferential Trade Agreement (IPPTA)";
        $data['page'] = "Certificate of origin - Indonesia - Pakistan Preferential Trade Agreement (IPPTA)";

        $data['pageIntro'] = "Certificate of origin - Indonesia - Pakistan Preferential Trade Agreement (IPPTA)";
        $data['getAllCertificateOriginComDecFormIp'] = CertificateOriginComDecFormIpHistory::where('certificate_origin_com_dec_form_ip_id', $id)->get();

        if ($data['getAllCertificateOriginComDecFormIp']->isEmpty()) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.certificate-origin-com-dec-form-ip.activity', $data);
    }

    //==================== certificate_origin_com_dec_form_ip_invioce end ======================//


    //==================== certificate_origin_com_dec_form_chaina_invioce start ======================//


    function report_List_certificate_origin_chaina_invoice(Request $request)
    {
        $data['title'] = "Certificate of origin - Chaina";
        $data['page'] = "Certificate of origin - Chaina";
        $data['pageIntro'] = "Certificate of origin - Chaina";

        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        // dd($data);
        $query = CertificateOriginChaina::query();


        if (isset($request->teamMember) && !empty($request->teamMember)) {
            $party_id = (int)$request->input('teamMember');
            $query->where('team_user_id', $party_id);
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


        $data['CertificateOriginComDecFormIp'] = $query->latest()->get();
        return view('admin.report.certificate-origin-chaina.index', $data);
    }

    public function generate_certificate_origin_chaina_invoic_PDF($id)
    {
        $viewName = 'admin.report.certificate-origin-chaina.pdf.certificate_origin_chaina_pdf';

        // Check if the view exists
        if (!view()->exists($viewName)) {
            abort(404); // Redirect to 404 page if the view does not exist
        }

        $data = [
            'title' => 'Certificate Origin chaina',
            'CertificateOriginComDecFormIp' => CertificateOriginChaina::where('id', $id)->first(),
        ];

        // Create a new Dompdf instance
        $dompdf = new Dompdf();

        // Load HTML content from view
        $html = view($viewName, $data)->render();
        // return $html;
        // Load options
        $options = new Options();
        $options->set('isPhpEnabled', true); // Enable PHP execution
        $dompdf->setOptions($options);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation (optional)
        $dompdf->setPaper('A4', 'portrait');

        // Set page numbers
        // $dompdf->setCallbacks([
        //     'pageNumber' => 'Page {PAGE_NUM}',
        // ]);
        // Set page numbers
        // Set page numbers
        $dompdf->setCallbacks([
            'pageNumber' => 'Page {PAGE_NUM}',
            'totalPages' => ' of {PAGE_COUNT}',
        ]);



        // Render the HTML as PDF
        $dompdf->render();

        // Get the generated PDF output
        $output = $dompdf->output();

        // Generate PDF file name
        $pdfName = $id . now() . '-Certificate-of-origin-Chaina-Pakistan.pdf';

        // Output the PDF as stream

        return response()->streamDownload(function () use ($output) {
            echo $output;
        }, $pdfName);
    }

    function add_certificate_origin_chaina_invoice()
    {

        $data['title'] = "Certificate of origin -Chaina";
        $data['page'] = "Certificate of origin -Chaina";
        $data['pageIntro'] = "Certificate of origin -Chaina";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.certificate-origin-chaina.add', $data);
    }

    public function submit_certificate_origin_chaina_invoice(Request $request)
    {
        // dd($request->all());

        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Create CanadaCustomerInvoiceFrom record
            $CertificateOriginComDecFormIp = new CertificateOriginChaina();
            $CertificateOriginComDecFormIp->invioce_generator = rand(0000, 9999) . now();
            $CertificateOriginComDecFormIp->team_user_id = $request->input('team_user_id');
            $CertificateOriginComDecFormIp->yes_or_no_preferential_treatment = $request->input('yes_or_no_preferential_treatment') == 1 ?  1 : 0;
            $CertificateOriginComDecFormIp->commercial_invoice_id = $request->input('commercial_invoice_id');

            // Create related records using loop
            $CertificateOriginComDecFormIp->fill($request->all());
            $CertificateOriginComDecFormIp->status = 1;

            $CertificateOriginComDecFormIp->save();

            $CertificateOriginComDecFormIpHistory = new CertificateOriginChainaHistory();
            $CertificateOriginComDecFormIpHistory->certificate_origin_chaina_invoice_id = $CertificateOriginComDecFormIp->id;
            $CertificateOriginComDecFormIpHistory->editer_name = Auth::guard('admin')->user()->user_name;

            $CertificateOriginComDecFormIpHistory->edited_at = now();
            $CertificateOriginComDecFormIpHistory->save();




            return response()->json(['message' => 'All records submitted successfully!']);
        } catch (\Exception $e) {
            // Log the error
            Log::error($e);

            // Return an error response
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.' . $e], 500);
        }
    }

    function edit_certificate_origin_chaina_invoice($id)
    {
        $data['title'] = "Certificate origin Chaina";
        $data['page'] = "Certificate origin Chaina ";
        $data['pageIntro'] = "Certificate origin Chaina Edit";
        $data['CertificateOriginComDecFormIp'] = CertificateOriginChaina::where('id', $id)->first();
        //  dd($data['CertificateOriginComDecFormIp']);
        if (!$data['CertificateOriginComDecFormIp']) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.certificate-origin-chaina.edit', $data);
    }
    public function update_submit_certificate_origin_chaina_invoice(Request $request)
    {
        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('id');
            if ($id) {
                // If an ID is provided, update the existing record
                $CertificateOriginComDecFormIp = CertificateOriginChaina::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $CertificateOriginComDecFormIp = new CertificateOriginChaina();
                $CertificateOriginComDecFormIp->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $CertificateOriginComDecFormIp->yes_or_no_preferential_treatment = $request->input('yes_or_no_preferential_treatment') == 1 ?  1 : 0;
            $CertificateOriginComDecFormIp->fill($request->all());
            $CertificateOriginComDecFormIp->commercial_invoice_id = $request->input('commercial_invoice_id');
            $CertificateOriginComDecFormIp->status = 1;

            // Save the CertificateOriginComDecFormIp model
            $CertificateOriginComDecFormIp->save();




            // Create CanadaInvoiceHistory record
            $CertificateOriginComDecFormIpHistory = new CertificateOriginChainaHistory();
            $CertificateOriginComDecFormIpHistory->certificate_origin_chaina_invoice_id = $CertificateOriginComDecFormIp->id;
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


    function view_certificate_origin_chaina_invoice($id)
    {
        $data['title'] = "Certificate of origin -Chaina";
        $data['page'] = "Certificate of origin -Chaina";
        $data['pageIntro'] = "Certificate of origin -Chaina";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        $data['CertificateOriginComDecFormIp'] = CertificateOriginChaina::where('id', $id)->first();
        if (!$data['CertificateOriginComDecFormIp']) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        return view('admin.report.certificate-origin-chaina.view', $data);
    }

    function activity_certificate_origin_chaina_invoice($id)
    {
        $data['title'] = "Certificate of origin - Chaina";
        $data['page'] = "Certificate of origin - Chaina";

        $data['pageIntro'] = "Certificate of origin - Chaina";
        $data['getAllCertificateOriginComDecFormIp'] = CertificateOriginChainaHistory::where('certificate_origin_chaina_invoice_id', $id)->get();

        if ($data['getAllCertificateOriginComDecFormIp']->isEmpty()) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.certificate-origin-chaina.activity', $data);
    }

    //==================== certificate_origin_com_dec_form_chaina_invioce start ======================//



    //==================== certificate_origin_com_dec_form_a_invioce start ======================//
    function report_List_certificate_origin_com_dec_form_a_invoice(Request $request)
    {
        $data['title'] = "Certificate origin  A";
        $data['page'] = "Certificate origin  A";
        $data['pageIntro'] = "Certificate origin  A";

        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        // dd($data);
        $query = CertificateOriginComDecFormA::query();


        if (isset($request->teamMember) && !empty($request->teamMember)) {
            $party_id = (int)$request->input('teamMember');
            $query->where('team_user_id', $party_id);
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


        $data['CertificateOriginComDecFormA'] = $query->latest()->get();
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
            'title' => 'Certificate Origin Combine and Declear form A',
            'CertificateOriginComDecFormA' => CertificateOriginComDecFormA::where('id', $id)->first(),
        ];


        // Create a new Dompdf instance
        $dompdf = new Dompdf();

        // Load HTML content from view
        $html = view($viewName, $data)->render();
        // return $html;
        // Load options
        $options = new Options();
        $options->set('isPhpEnabled', true); // Enable PHP execution
        $dompdf->setOptions($options);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation (optional)
        $dompdf->setPaper('A4', 'portrait');

        // Set page numbers
        // $dompdf->setCallbacks([
        //     'pageNumber' => 'Page {PAGE_NUM}',
        // ]);
        // Set page numbers
        // Set page numbers
        $dompdf->setCallbacks([
            'pageNumber' => 'Page {PAGE_NUM}',
            'totalPages' => ' of {PAGE_COUNT}',
        ]);



        // Render the HTML as PDF
        $dompdf->render();

        // Get the generated PDF output
        $output = $dompdf->output();

        // Generate PDF file name
        $pdfName = $id . now() . '-Certificate-Origin-combine-declare-A-invoice.pdf';

        // Output the PDF as stream

        return response()->streamDownload(function () use ($output) {
            echo $output;
        }, $pdfName);
    }

    function add_certificate_origin_com_dec_form_a_invoice()
    {

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
            $CertificateOriginComDecFormA->invioce_generator = rand(0000, 9999) . now();
            $CertificateOriginComDecFormA->team_user_id = $request->input('team_user_id');
            $CertificateOriginComDecFormA->commercial_invoice_id = $request->input('commercial_invoice_id');

            $CertificateOriginComDecFormA->fill($request->all());
            $CertificateOriginComDecFormA->status = 1;

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
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.' . $e], 500);
        }
    }

    function edit_certificate_origin_com_dec_form_a_invoice($id)
    {
        $data['title'] = "Certificate origin  A";
        $data['page'] = "Certificate origin  A";
        $data['pageIntro'] = "Certificate origin  A Edit";
        $data['CertificateOriginComDecFormA'] = CertificateOriginComDecFormA::where('id', $id)->first();
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
            $CertificateOriginComDecFormA->commercial_invoice_id = $request->input('commercial_invoice_id');
            $CertificateOriginComDecFormA->status = 1;

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


    function view_certificate_origin_com_dec_form_a_invoice($id)
    {
        $data['title'] = "Certificate origin  A View";
        $data['page'] = "Certificate origin  A View";
        $data['pageIntro'] = "Certificate origin  A View";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        $data['CertificateOriginComDecFormA'] = CertificateOriginComDecFormA::where('id', $id)->first();
        if (!$data['CertificateOriginComDecFormA']) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        return view('admin.report.certificate-origin-com-dec-form-a.view', $data);
    }

    function activity_certificate_origin_com_dec_form_a_invoice($id)
    {
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

    //==================== commercial_invoice start ======================//

    function report_List_commercial_invoice(Request $request)
    {
        // dd($request->all());


        $data['title'] = "COMMERCIAL INVOICE";
        $data['page'] = "COMMERCIAL INVOICE";
        $data['pageIntro'] = "COMMERCIAL INVOICE";

        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        // dd($data);
        $query = CommercialInvoice::query();


        if (isset($request->teamMember) && !empty($request->teamMember)) {
            $party_id = (int)$request->input('teamMember');
            $query->where('team_user_id', $party_id);
        }
        if (isset($request->InvoiceNUmber) && !empty($request->InvoiceNUmber)) {
            $invoice = (int)$request->input('InvoiceNUmber');
            $query->where('id', $invoice);
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


        $data['CommercialInvoice'] = $query->latest()->get();
        return view('admin.report.commercial-invoice.index', $data);
    }

    public function generate_commercial_invoice_PDF($id)
    {
        $viewName = 'admin.report.commercial-invoice.pdf.commercial_invoice_pdf';

        // Check if the view exists
        if (!view()->exists($viewName)) {
            abort(404); // Redirect to 404 page if the view does not exist
        }

        // $data = [
        //     'title' => 'Commercial Invoice Pdf',
        //     'CommercialInvoice' => CommercialInvoice::where('id', $id)->first(),

        // ];
        $data = [
            'title' => 'Commercial Invoice Pdf',
            'CommercialInvoice' => CommercialInvoice::where('id', $id)->first()->toArray(),
        ];

        $relatedFieldParts = [
            CommercialInvoiceRelatedFieldPart1::class,
            CommercialInvoiceRelatedFieldPart2::class,
            CommercialInvoiceRelatedFieldPart3::class,
            CommercialInvoiceRelatedFieldPart4::class,
            CommercialInvoiceRelatedFieldPart5::class,
            CommercialInvoiceRelatedFieldPart6::class,
            CommercialInvoiceRelatedFieldPart7::class,
            CommercialInvoiceRelatedFieldPart8::class,
            CommercialInvoiceRelatedValuePart1::class,
            CommercialInvoiceRelatedValuePart2::class,
            CommercialInvoiceRelatedValuePart3::class,
            CommercialInvoiceRelatedValuePart4::class,
            CommercialInvoiceRelatedValuePart5::class,
            CommercialInvoiceRelatedValuePart6::class,
            CommercialInvoiceRelatedValuePart7::class,
            CommercialInvoiceRelatedValuePart8::class,
            CommercialInvoiceRelatedValuePart9::class,
            CommercialInvoiceRelatedValuePart10::class,
        ];

        foreach ($relatedFieldParts as $relatedPart) {
            $relatedInstance = $relatedPart::where('commercial_invoice_id', $id)->first();
            if ($relatedInstance) {
                $data['CommercialInvoice'] = array_merge($data['CommercialInvoice'], $relatedInstance->toArray());
            }
        }



        // Debug the fetched data
        // dd($data['CommercialInvoice']);
        // Create a new Dompdf instance
        $dompdf = new Dompdf();

        // Load HTML content from view
        $html = view($viewName, $data)->render();
        // return $html;
        // Load options
        $options = new \Dompdf\Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf->setOptions($options);


        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation (optional)
        $dompdf->setPaper('A4', 'portrait');

        // Set page numbers
        // $dompdf->setCallbacks([
        //     'pageNumber' => 'Page {PAGE_NUM}',
        // ]);
        // Set page numbers
        // Set page numbers
        $dompdf->setCallbacks([
            'pageNumber' => 'Page {PAGE_NUM}',
            'totalPages' => ' of {PAGE_COUNT}',
        ]);



        // Render the HTML as PDF
        $dompdf->render();

        // Get the generated PDF output
        $output = $dompdf->output();

        // Generate PDF file name
        $pdfName = $id . now() . '-Commercial-invoice.pdf';

        // Output the PDF as stream

        return response()->streamDownload(function () use ($output) {
            echo $output;
        }, $pdfName);
    }

    function add_commercial_invoice()
    {

        $data['title'] = "COMMERCIAL INVOICE";
        $data['page'] = "COMMERCIAL INVOICE";
        $data['pageIntro'] = "COMMERCIAL INVOICE Add";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        return view('admin.report.commercial-invoice.add', $data);
    }

    public function submit_commercial_invoice(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'commercial_invoice' => 'required|unique:commercial_invoices',
            // add other required fields validation here if necessary
        ]);
        try {


            // Create CanadaCustomerInvoiceFrom record
            $CommercialInvoice = new CommercialInvoice();
            $CommercialInvoice->invioce_generator = rand(0000, 9999) . now();
            $CommercialInvoice->team_user_id = $request->input('team_user_id');

            $CommercialInvoice->heading_f_i_no = $request->input('heading_f_i_no');
            $CommercialInvoice->heading_shipper = $request->input('heading_shipper');
            $CommercialInvoice->heading_invioce = $request->input('heading_invioce');
            $CommercialInvoice->heading_vessel = $request->input('heading_vessel');
            $CommercialInvoice->heading_dated = $request->input('heading_dated');
            $CommercialInvoice->heading_total_pkg = $request->input('heading_total_pkg');
            $CommercialInvoice->heading_contract_no = $request->input('heading_contract_no');
            $CommercialInvoice->heading_contract_date = $request->input('heading_contract_date');
            $CommercialInvoice->heading_lc = $request->input('heading_lc');
            $CommercialInvoice->heading_issue_date_lc = $request->input('heading_issue_date_lc');
            $CommercialInvoice->heading_pyment_terms = $request->input('heading_pyment_terms');
            $CommercialInvoice->heading_drawn_at = $request->input('heading_drawn_at');
            $CommercialInvoice->heading_drawn_under = $request->input('heading_drawn_under');
            $CommercialInvoice->heading_part_of_loading = $request->input('heading_part_of_loading');
            $CommercialInvoice->heading_part_of_discharge = $request->input('heading_part_of_discharge');
            $CommercialInvoice->heading_container_no = $request->input('heading_container_no');
            $CommercialInvoice->heading_currency = $request->input('heading_currency');
            $CommercialInvoice->heading_term_of_delivery = $request->input('heading_term_of_delivery');
            $CommercialInvoice->heading_buyer = $request->input('heading_buyer');
            $CommercialInvoice->heading_ship_to = $request->input('heading_ship_to');
            $CommercialInvoice->heading_marks_no = $request->input('heading_marks_no');
            $CommercialInvoice->heading_discription_of_goods = $request->input('heading_discription_of_goods');
            $CommercialInvoice->heading_quantity = $request->input('heading_quantity');
            $CommercialInvoice->heading_prices = $request->input('heading_prices');
            $CommercialInvoice->heading_total_amount = $request->input('heading_total_amount');
            $CommercialInvoice->heading_long_sides = $request->input('heading_long_sides');
            $CommercialInvoice->heading_performa_invioce_no = $request->input('heading_performa_invioce_no');
            $CommercialInvoice->currency_symbol = $request->input('currency_symbol');

            $CommercialInvoice->heading_total_net_weight = $request->heading_total_net_weight;
            $CommercialInvoice->heading_total_gr_weight = $request->heading_total_gr_weight;
            $CommercialInvoice->heading_total_buyer_discount = $request->heading_total_buyer_discount;
            $CommercialInvoice->heading_total_less_commission = $request->heading_total_less_commission;
            $CommercialInvoice->heading_total_add_fright = $request->heading_total_add_fright;
            $CommercialInvoice->heading_total_net_amount_payable = $request->heading_total_net_amount_payable;
            $CommercialInvoice->heading_note = $request->heading_note;
            $CommercialInvoice->heading_remarks = $request->heading_remarks;
            $CommercialInvoice->heading_intermediary_bank = $request->heading_intermediary_bank;
            $CommercialInvoice->heading_intermediary_bank_swift_no = $request->heading_intermediary_bank_swift_no;
            $CommercialInvoice->heading_intermediary_bank_ac_no = $request->heading_intermediary_bank_ac_no;
            $CommercialInvoice->heading_for_onword_credit_to = $request->heading_for_onword_credit_to;
            $CommercialInvoice->heading_tw_ac_no = $request->heading_tw_ac_no;
            $CommercialInvoice->heading_swift_no = $request->heading_swift_no;
            $CommercialInvoice->heading_iban_no = $request->heading_iban_no;
            $CommercialInvoice->heading_bank_addrss = $request->heading_bank_addrss;
            $CommercialInvoice->heading_statement_origin = $request->heading_statement_origin;
            $CommercialInvoice->value_f_i_no = $request->value_f_i_no;
            $CommercialInvoice->name_shipper = $request->name_shipper;
            $CommercialInvoice->address_shipper = $request->address_shipper;
            $CommercialInvoice->city_shipper = $request->city_shipper;
            $CommercialInvoice->country_shipper = $request->country_shipper;
            $CommercialInvoice->phone_shipper = $request->phone_shipper;
            $CommercialInvoice->name_buyer = $request->name_buyer;
            $CommercialInvoice->address_buyer = $request->address_buyer;
            $CommercialInvoice->city_buyer = $request->city_buyer;
            $CommercialInvoice->country_buyer = $request->country_buyer;
            $CommercialInvoice->phone_buyer = $request->phone_buyer;
            $CommercialInvoice->name_ship_to = $request->name_ship_to;
            $CommercialInvoice->address_ship_to = $request->address_ship_to;
            $CommercialInvoice->city_ship_to = $request->city_ship_to;
            $CommercialInvoice->country_ship_to = $request->country_ship_to;
            $CommercialInvoice->phone_ship_to = $request->phone_ship_to;
            $CommercialInvoice->performa_invioce_no_value = $request->performa_invioce_no_value;
            $CommercialInvoice->vessel_value = $request->vessel_value;
            $CommercialInvoice->dated = $request->dated;
            $CommercialInvoice->total_pkg_value = $request->total_pkg_value;
            $CommercialInvoice->contract_no_value  = $request->contract_no_value;
            $CommercialInvoice->contract_date_value  = $request->contract_date_value;
            $CommercialInvoice->lc_value  = $request->lc_value;
            $CommercialInvoice->lc_issue_date_value  = $request->lc_issue_date_value;
            $CommercialInvoice->pyment_terms_value  = $request->pyment_terms_value;
            $CommercialInvoice->drawn_at_value  = $request->drawn_at_value;
            $CommercialInvoice->drawn_under_value  = $request->drawn_under_value;
            $CommercialInvoice->port_of_loading_value  = $request->port_of_loading_value;
            $CommercialInvoice->port_of_discharge_value  = $request->port_of_discharge_value;
            $CommercialInvoice->container_no_value  = $request->container_no_value;
            $CommercialInvoice->currency_value  = $request->currency_value;
            $CommercialInvoice->term_of_delivery_value  = $request->term_of_delivery_value;
            $CommercialInvoice->total_net_weight_value = $request->total_net_weight_valu;
            $CommercialInvoice->total_gr_weight_value = $request->total_gr_weight_valu;
            $CommercialInvoice->note_value = $request->note_value;
            $CommercialInvoice->value_remarks = $request->value_remarks;
            $CommercialInvoice->value_intermediary_bank = $request->value_intermediary_bank;
            $CommercialInvoice->value_intermediary_bank_swift_no = $request->value_intermediary_bank_swift_no;
            $CommercialInvoice->value_intermediary_bank_ac_no = $request->value_intermediary_bank_ac_no;
            $CommercialInvoice->value_for_onword_credit_to = $request->value_for_onword_credit_to;
            $CommercialInvoice->value_tw_ac_no = $request->value_tw_ac_no;
            $CommercialInvoice->value_swift_no = $request->value_swift_no;
            $CommercialInvoice->value_iban_no = $request->value_iban_no;
            $CommercialInvoice->value_bank_addrss = $request->value_bank_addrss;
            $CommercialInvoice->value_bank_addrss_1 = $request->value_bank_addrss_1;
            $CommercialInvoice->value_bank_addrss_2 = $request->value_bank_addrss_2;
            $CommercialInvoice->value_statement_origin = $request->value_statement_origin;
            $CommercialInvoice->value_total_buyer_discount = $request->value_total_buyer_discount;
            $CommercialInvoice->value_total_less_commission = $request->value_total_less_commission;
            $CommercialInvoice->value_total_add_fright = $request->value_total_add_fright;
            $CommercialInvoice->value_total_net_amount_payable = $request->value_total_net_amount_payable;
            $CommercialInvoice->value_currency_name = $request->value_currency_name;
            $CommercialInvoice->status = 1;
            $CommercialInvoice->commercial_invoice = $request->commercial_invoice;

            // $CommercialInvoice->fill($request->all());

            // Save the CommercialInvoice model
            $CommercialInvoice->save();

            $CommercialInvoiceRelatedFieldPart1 = new CommercialInvoiceRelatedFieldPart1();
            $CommercialInvoiceRelatedFieldPart1->commercial_invoice_id = $CommercialInvoice->id;
            $CommercialInvoiceRelatedFieldPart1->heading_proforma_invioce = $request->heading_proforma_invioce;
            $CommercialInvoiceRelatedFieldPart1->value_proforma_invioce = $request->value_proforma_invioce;
            for ($i = 1; $i <= 35; $i++) {
                $CommercialInvoiceRelatedFieldPart1->{"heading_long_side_$i"} = $request->input("heading_long_side_$i");
                $CommercialInvoiceRelatedFieldPart1->{"heading_po_$i"} = $request->input("heading_po_$i");
                $CommercialInvoiceRelatedFieldPart1->{"value_po_$i"} = $request->input("value_po_$i");
                $CommercialInvoiceRelatedFieldPart1->{"heading_cotton_$i"} = $request->input("heading_cotton_$i");
                $CommercialInvoiceRelatedFieldPart1->{"heading_seahorse_$i"} = $request->input("heading_seahorse_$i");
            }
            $CommercialInvoiceRelatedFieldPart1->save();

            $CommercialInvoiceRelatedFieldPart2 = new CommercialInvoiceRelatedFieldPart2();
            $CommercialInvoiceRelatedFieldPart2->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 35; $i++) {
                $CommercialInvoiceRelatedFieldPart2->{"heading_terry_$i"} = $request->input("heading_terry_$i");
                $CommercialInvoiceRelatedFieldPart2->{"heading_carron_bales_pallets_$i"} = $request->input("heading_carron_bales_pallets_$i");
                $CommercialInvoiceRelatedFieldPart2->{"carron_bales_pallets_value_$i"} = $request->input("carron_bales_pallets_value_$i");
                $CommercialInvoiceRelatedFieldPart2->{"heading_pcs_pack_pallet_per_$i"} = $request->input("heading_pcs_pack_pallet_per_$i");
                $CommercialInvoiceRelatedFieldPart2->{"pcs_pack_pallet_per_value_$i"} = $request->input("pcs_pack_pallet_per_value_$i");
            }
            $CommercialInvoiceRelatedFieldPart2->save();


            $CommercialInvoiceRelatedFieldPart3 = new CommercialInvoiceRelatedFieldPart3();
            $CommercialInvoiceRelatedFieldPart3->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 35; $i++) {
                $CommercialInvoiceRelatedFieldPart3->{"heading_color_$i"} = $request->input("heading_color_$i");
                $CommercialInvoiceRelatedFieldPart3->{"heading_sku_no_$i"} = $request->input("heading_sku_no_$i");
                $CommercialInvoiceRelatedFieldPart3->{"heading_ean_no_$i"} = $request->input("heading_ean_no_$i");
                $CommercialInvoiceRelatedFieldPart3->{"heading_sku_hash_$i"} = $request->input("heading_sku_hash_$i");
                $CommercialInvoiceRelatedFieldPart3->{"heading_style_$i"} = $request->input("heading_style_$i");
            }
            $CommercialInvoiceRelatedFieldPart3->save();

            $CommercialInvoiceRelatedFieldPart4 = new CommercialInvoiceRelatedFieldPart4();
            $CommercialInvoiceRelatedFieldPart4->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 35; $i++) {
                $CommercialInvoiceRelatedFieldPart4->{"heading_po_number_$i"} = $request->input("heading_po_number_$i");
                $CommercialInvoiceRelatedFieldPart4->{"heading_po_number_value_$i"} = $request->input("heading_po_number_value_$i");
                $CommercialInvoiceRelatedFieldPart4->{"heading_style_name_$i"} = $request->input("heading_style_name_$i");
                $CommercialInvoiceRelatedFieldPart4->{"heading_style_name_value_$i"} = $request->input("heading_style_name_value_$i");
            }
            $CommercialInvoiceRelatedFieldPart4->save();

            $CommercialInvoiceRelatedFieldPart5 = new CommercialInvoiceRelatedFieldPart5();
            $CommercialInvoiceRelatedFieldPart5->commercial_invoice_id = $CommercialInvoice->id;

            for ($i = 1; $i <= 35; $i++) {
                $CommercialInvoiceRelatedFieldPart5->{"heading_style_number_$i"} = $request->input("heading_style_number_$i");
                $CommercialInvoiceRelatedFieldPart5->{"heading_style_number_value_$i"} = $request->input("heading_style_number_value_$i");
                $CommercialInvoiceRelatedFieldPart5->{"heading_color_left_column_$i"} = $request->input("heading_color_left_column_$i");
                $CommercialInvoiceRelatedFieldPart5->{"heading_color_left_column_value_$i"} = $request->input("heading_color_left_column_value_$i");
                $CommercialInvoiceRelatedFieldPart5->{"heading_size_break_down_$i"} = $request->input("heading_size_break_down_$i");
            }

            $CommercialInvoiceRelatedFieldPart5->save();

            $CommercialInvoiceRelatedFieldPart6 = new CommercialInvoiceRelatedFieldPart6();
            $CommercialInvoiceRelatedFieldPart6->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 35; $i++) {
                $CommercialInvoiceRelatedFieldPart6->{"heading_size_break_down_value_$i"} = $request->input("heading_size_break_down_value_$i");
                $CommercialInvoiceRelatedFieldPart6->{"heading_carton_count_$i"} = $request->input("heading_carton_count_$i");
                $CommercialInvoiceRelatedFieldPart6->{"heading_carton_count_value_$i"} = $request->input("heading_carton_count_value_$i");
                $CommercialInvoiceRelatedFieldPart6->{"heading_carton_size_$i"} = $request->input("heading_carton_size_$i");
                $CommercialInvoiceRelatedFieldPart6->{"heading_carton_size_value_$i"} = $request->input("heading_carton_size_value_$i");
            }
            $CommercialInvoiceRelatedFieldPart6->save();

            $CommercialInvoiceRelatedFieldPart7 = new CommercialInvoiceRelatedFieldPart7();
            $CommercialInvoiceRelatedFieldPart7->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 35; $i++) {
                $CommercialInvoiceRelatedFieldPart7->{"heading_bale_left_column_$i"} = $request->input("heading_bale_left_column_$i");
                $CommercialInvoiceRelatedFieldPart7->{"heading_bale_left_column_value_$i"} = $request->input("heading_bale_left_column_value_$i");
                $CommercialInvoiceRelatedFieldPart7->{"heading_net_weight_left_column_$i"} = $request->input("heading_net_weight_left_column_$i");
                $CommercialInvoiceRelatedFieldPart7->{"heading_gross_weight_left_column_$i"} = $request->input("heading_gross_weight_left_column_$i");
                $CommercialInvoiceRelatedFieldPart7->{"heading_net_weight_second_column_$i"} = $request->input("heading_net_weight_second_column_$i");
            }
            $CommercialInvoiceRelatedFieldPart7->save();

            $CommercialInvoiceRelatedFieldPart8 = new CommercialInvoiceRelatedFieldPart8();
            $CommercialInvoiceRelatedFieldPart8->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 35; $i++) {
                $CommercialInvoiceRelatedFieldPart8->{"heading_gross_weight_second_column_$i"} = $request->input("heading_gross_weight_second_column_$i");
                $CommercialInvoiceRelatedFieldPart8->{"net_weight_second_column_value_$i"} = $request->input("net_weight_second_column_value_$i");
                $CommercialInvoiceRelatedFieldPart8->{"gross_weight_second_column_value_$i"} = $request->input("gross_weight_second_column_value_$i");
                $CommercialInvoiceRelatedFieldPart8->{"heading_quantity_unit_$i"} = $request->input("heading_quantity_unit_$i");
            }
            $CommercialInvoiceRelatedFieldPart8->save();



            $CommercialInvoiceRelatedValuePart1 = new CommercialInvoiceRelatedValuePart1();
            $CommercialInvoiceRelatedValuePart1->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 350; $i++) {
                $CommercialInvoiceRelatedValuePart1->{"color_name_second_column_value_$i"} = $request->input("color_name_second_column_value_$i");
            }
            $CommercialInvoiceRelatedValuePart1->save();

            $CommercialInvoiceRelatedValuePart2 = new CommercialInvoiceRelatedValuePart2();
            $CommercialInvoiceRelatedValuePart2->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 350; $i++) {
                $CommercialInvoiceRelatedValuePart2->{"sku_no_second_column_value_$i"} = $request->input("sku_no_second_column_value_$i");
            }
            $CommercialInvoiceRelatedValuePart2->save();

            $CommercialInvoiceRelatedValuePart3 = new CommercialInvoiceRelatedValuePart3();
            $CommercialInvoiceRelatedValuePart3->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 350; $i++) {
                $CommercialInvoiceRelatedValuePart3->{"ean_no_second_column_value_$i"} = $request->input("ean_no_second_column_value_$i");
            }
            $CommercialInvoiceRelatedValuePart3->save();

            $CommercialInvoiceRelatedValuePart4 = new CommercialInvoiceRelatedValuePart4();
            $CommercialInvoiceRelatedValuePart4->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 350; $i++) {
                $CommercialInvoiceRelatedValuePart4->{"sku_hash_no_second_column_value_$i"} = $request->input("sku_hash_no_second_column_value_$i");
            }
            $CommercialInvoiceRelatedValuePart4->save();

            $CommercialInvoiceRelatedValuePart5 = new CommercialInvoiceRelatedValuePart5();
            $CommercialInvoiceRelatedValuePart5->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 350; $i++) {
                $CommercialInvoiceRelatedValuePart5->{"style_no_second_column_value_$i"} = $request->input("style_no_second_column_value_$i");
            }
            $CommercialInvoiceRelatedValuePart5->save();

            $CommercialInvoiceRelatedValuePart6 = new CommercialInvoiceRelatedValuePart6();
            $CommercialInvoiceRelatedValuePart6->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 350; $i++) {
                $CommercialInvoiceRelatedValuePart6->{"quantity_third_column_value_$i"} = $request->input("quantity_third_column_value_$i");
            }
            $CommercialInvoiceRelatedValuePart6->save();

            $CommercialInvoiceRelatedValuePart7 = new CommercialInvoiceRelatedValuePart7();
            $CommercialInvoiceRelatedValuePart7->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 350; $i++) {
                $CommercialInvoiceRelatedValuePart7->{"price_third_column_value_$i"} = $request->input("price_third_column_value_$i");
            }
            $CommercialInvoiceRelatedValuePart7->save();

            $CommercialInvoiceRelatedValuePart8 = new CommercialInvoiceRelatedValuePart8();
            $CommercialInvoiceRelatedValuePart8->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 350; $i++) {
                $CommercialInvoiceRelatedValuePart8->{"currency_symbol_third_column_value_$i"} = $request->input("currency_symbol_third_column_value_$i");
            }
            $CommercialInvoiceRelatedValuePart8->save();

            $CommercialInvoiceRelatedValuePart9 = new CommercialInvoiceRelatedValuePart9();
            $CommercialInvoiceRelatedValuePart9->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 350; $i++) {
                $CommercialInvoiceRelatedValuePart9->{"total_amount_third_column_value_$i"} = $request->input("total_amount_third_column_value_$i");
            }
            $CommercialInvoiceRelatedValuePart9->save();

            $CommercialInvoiceRelatedValuePart10 = new CommercialInvoiceRelatedValuePart10();
            $CommercialInvoiceRelatedValuePart10->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 350; $i++) {
                $CommercialInvoiceRelatedValuePart10->{"quantity_unit_third_column_value_$i"} = $request->input("quantity_unit_third_column_value_$i");
            }
            $CommercialInvoiceRelatedValuePart10->save();


            $CommercialInvoiceHistory = new CommercialInvoiceHistory();
            $CommercialInvoiceHistory->commercial_invoice_id = $CommercialInvoice->id;
            $CommercialInvoiceHistory->editer_name = Auth::guard('admin')->user()->user_name;

            $CommercialInvoiceHistory->edited_at = now();
            $CommercialInvoiceHistory->save();
            $this->clone_commercial_invoice_into_packing_list($request);



            return response()->json(['message' => 'All records submitted successfully!']);
        } catch (\Exception $e) {
            // Log the error
            Log::error($e);

            // Return an error response
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.' . $e], 500);
        }
    }

    function edit_commercial_invoice($id)
    {
        $data['title'] = "COMMERCIAL INVOICE";
        $data['page'] = "COMMERCIAL INVOICE";
        $data['pageIntro'] = "COMMERCIAL INVOICE Edit";
        // Fetch the main commercial invoice data
        $data['CommercialInvoice'] = CommercialInvoice::where('id', $id)->first()->toArray();
        $data['id'] =isset($id) ? $id : null;
        // Fetch the related field data and merge it with the existing array under the same key
        $data['CommercialInvoice'] = array_merge(
            $data['CommercialInvoice'],
            CommercialInvoiceRelatedFieldPart1::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedFieldPart2::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedFieldPart3::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedFieldPart4::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedFieldPart5::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedFieldPart6::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedFieldPart7::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedFieldPart8::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedValuePart1::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedValuePart2::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedValuePart3::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedValuePart4::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedValuePart5::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedValuePart6::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedValuePart7::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedValuePart8::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedValuePart9::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedValuePart10::where('commercial_invoice_id', $id)->first()->toArray() ?? []
        );

        // Debug the fetched data
        // dd($data['CommercialInvoice']);




        if (!$data['CommercialInvoice']) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.commercial-invoice.edit', $data);
    }
    public function update_submit_commercial_invoice(Request $request)
    {
        $id = $request->input('id');
        // dd( $id );
        $request->validate([
            'commercial_invoice' => [
                'required',
                Rule::unique('commercial_invoices')->ignore($id),
            ],
            // add other required fields validation here if necessary
        ]);
        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request



            if ($id) {
                // If an ID is provided, update the existing record
                $CommercialInvoice = CommercialInvoice::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $CommercialInvoice = new CommercialInvoice();
                $CommercialInvoice->invioce_generator = rand(0000, 9999) . now();
            }

            if ($request->hasFile("pdf_upload_file_ic")) {
                $file = $request->file("pdf_upload_file_ic");
                // Generate a unique filename
                $filename = 'commercial-invoice-' . $id . '-' . date('dmyHis') . rand() . '.' . $file->getClientOriginalExtension();
                // Move the file to the destination folder
                // $file->move(public_path('admin/assets/imgs/Document/'), $filename);
                $file->move(public_path('admin/assets/imgs/comMERCIALInvoice/'), $filename);
                $CommercialInvoice->{"pdf_upload_file_ic"} = $filename;
            }
            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $CommercialInvoice->team_user_id = $request->input('team_user_id');

            $CommercialInvoice->heading_f_i_no = $request->input('heading_f_i_no');
            $CommercialInvoice->heading_shipper = $request->input('heading_shipper');
            $CommercialInvoice->heading_invioce = $request->input('heading_invioce');
            $CommercialInvoice->heading_vessel = $request->input('heading_vessel');
            $CommercialInvoice->heading_dated = $request->input('heading_dated');
            $CommercialInvoice->heading_total_pkg = $request->input('heading_total_pkg');
            $CommercialInvoice->heading_contract_no = $request->input('heading_contract_no');
            $CommercialInvoice->heading_contract_date = $request->input('heading_contract_date');
            $CommercialInvoice->heading_lc = $request->input('heading_lc');
            $CommercialInvoice->heading_issue_date_lc = $request->input('heading_issue_date_lc');
            $CommercialInvoice->heading_pyment_terms = $request->input('heading_pyment_terms');
            $CommercialInvoice->heading_drawn_at = $request->input('heading_drawn_at');
            $CommercialInvoice->heading_drawn_under = $request->input('heading_drawn_under');
            $CommercialInvoice->heading_part_of_loading = $request->input('heading_part_of_loading');
            $CommercialInvoice->heading_part_of_discharge = $request->input('heading_part_of_discharge');
            $CommercialInvoice->heading_container_no = $request->input('heading_container_no');
            $CommercialInvoice->heading_currency = $request->input('heading_currency');
            $CommercialInvoice->heading_term_of_delivery = $request->input('heading_term_of_delivery');
            $CommercialInvoice->heading_buyer = $request->input('heading_buyer');
            $CommercialInvoice->heading_ship_to = $request->input('heading_ship_to');
            $CommercialInvoice->heading_marks_no = $request->input('heading_marks_no');
            $CommercialInvoice->heading_discription_of_goods = $request->input('heading_discription_of_goods');
            $CommercialInvoice->heading_quantity = $request->input('heading_quantity');
            $CommercialInvoice->heading_prices = $request->input('heading_prices');
            $CommercialInvoice->heading_total_amount = $request->input('heading_total_amount');
            $CommercialInvoice->heading_long_sides = $request->input('heading_long_sides');
            $CommercialInvoice->heading_performa_invioce_no = $request->input('heading_performa_invioce_no');
            $CommercialInvoice->currency_symbol = $request->input('currency_symbol');

            $CommercialInvoice->heading_total_net_weight = $request->heading_total_net_weight;
            $CommercialInvoice->heading_total_gr_weight = $request->heading_total_gr_weight;
            $CommercialInvoice->heading_total_buyer_discount = $request->heading_total_buyer_discount;
            $CommercialInvoice->heading_total_less_commission = $request->heading_total_less_commission;
            $CommercialInvoice->heading_total_add_fright = $request->heading_total_add_fright;
            $CommercialInvoice->heading_total_net_amount_payable = $request->heading_total_net_amount_payable;
            $CommercialInvoice->heading_note = $request->heading_note;
            $CommercialInvoice->heading_remarks = $request->heading_remarks;
            $CommercialInvoice->heading_intermediary_bank = $request->heading_intermediary_bank;
            $CommercialInvoice->heading_intermediary_bank_swift_no = $request->heading_intermediary_bank_swift_no;
            $CommercialInvoice->heading_intermediary_bank_ac_no = $request->heading_intermediary_bank_ac_no;
            $CommercialInvoice->heading_for_onword_credit_to = $request->heading_for_onword_credit_to;
            $CommercialInvoice->heading_tw_ac_no = $request->heading_tw_ac_no;
            $CommercialInvoice->heading_swift_no = $request->heading_swift_no;
            $CommercialInvoice->heading_iban_no = $request->heading_iban_no;
            $CommercialInvoice->heading_bank_addrss = $request->heading_bank_addrss;
            $CommercialInvoice->heading_statement_origin = $request->heading_statement_origin;
            $CommercialInvoice->value_f_i_no = $request->value_f_i_no;
            $CommercialInvoice->name_shipper = $request->name_shipper;
            $CommercialInvoice->address_shipper = $request->address_shipper;
            $CommercialInvoice->city_shipper = $request->city_shipper;
            $CommercialInvoice->country_shipper = $request->country_shipper;
            $CommercialInvoice->phone_shipper = $request->phone_shipper;
            $CommercialInvoice->name_buyer = $request->name_buyer;
            $CommercialInvoice->address_buyer = $request->address_buyer;
            $CommercialInvoice->city_buyer = $request->city_buyer;
            $CommercialInvoice->country_buyer = $request->country_buyer;
            $CommercialInvoice->phone_buyer = $request->phone_buyer;
            $CommercialInvoice->name_ship_to = $request->name_ship_to;
            $CommercialInvoice->address_ship_to = $request->address_ship_to;
            $CommercialInvoice->city_ship_to = $request->city_ship_to;
            $CommercialInvoice->country_ship_to = $request->country_ship_to;
            $CommercialInvoice->phone_ship_to = $request->phone_ship_to;
            $CommercialInvoice->performa_invioce_no_value = $request->performa_invioce_no_value;
            $CommercialInvoice->vessel_value = $request->vessel_value;
            $CommercialInvoice->dated = $request->dated;
            $CommercialInvoice->total_pkg_value = $request->total_pkg_value;
            $CommercialInvoice->contract_no_value  = $request->contract_no_value;
            $CommercialInvoice->contract_date_value  = $request->contract_date_value;
            $CommercialInvoice->lc_value  = $request->lc_value;
            $CommercialInvoice->lc_issue_date_value  = $request->lc_issue_date_value;
            $CommercialInvoice->pyment_terms_value  = $request->pyment_terms_value;
            $CommercialInvoice->drawn_at_value  = $request->drawn_at_value;
            $CommercialInvoice->drawn_under_value  = $request->drawn_under_value;
            $CommercialInvoice->port_of_loading_value  = $request->port_of_loading_value;
            $CommercialInvoice->port_of_discharge_value  = $request->port_of_discharge_value;
            $CommercialInvoice->container_no_value  = $request->container_no_value;
            $CommercialInvoice->currency_value  = $request->currency_value;
            $CommercialInvoice->term_of_delivery_value  = $request->term_of_delivery_value;
            $CommercialInvoice->total_net_weight_value = $request->total_net_weight_valu;
            $CommercialInvoice->total_gr_weight_value = $request->total_gr_weight_valu;
            $CommercialInvoice->note_value = $request->note_value;
            $CommercialInvoice->value_remarks = $request->value_remarks;
            $CommercialInvoice->value_intermediary_bank = $request->value_intermediary_bank;
            $CommercialInvoice->value_intermediary_bank_swift_no = $request->value_intermediary_bank_swift_no;
            $CommercialInvoice->value_intermediary_bank_ac_no = $request->value_intermediary_bank_ac_no;
            $CommercialInvoice->value_for_onword_credit_to = $request->value_for_onword_credit_to;
            $CommercialInvoice->value_tw_ac_no = $request->value_tw_ac_no;
            $CommercialInvoice->value_swift_no = $request->value_swift_no;
            $CommercialInvoice->value_iban_no = $request->value_iban_no;
            $CommercialInvoice->value_bank_addrss = $request->value_bank_addrss;
            $CommercialInvoice->value_bank_addrss_1 = $request->value_bank_addrss_1;
            $CommercialInvoice->value_bank_addrss_2 = $request->value_bank_addrss_2;
            $CommercialInvoice->value_statement_origin = $request->value_statement_origin;
            $CommercialInvoice->value_total_buyer_discount = $request->value_total_buyer_discount;
            $CommercialInvoice->value_total_less_commission = $request->value_total_less_commission;
            $CommercialInvoice->value_total_add_fright = $request->value_total_add_fright;
            $CommercialInvoice->value_total_net_amount_payable = $request->value_total_net_amount_payable;
            $CommercialInvoice->value_currency_name = $request->value_currency_name;
            $CommercialInvoice->status = 1;
            $CommercialInvoice->commercial_invoice = $request->commercial_invoice;

            // $CommercialInvoice->fill($request->all());

            // Save the CommercialInvoice model
            $CommercialInvoice->save();

            $CommercialInvoiceRelatedFieldPart1 =  CommercialInvoiceRelatedFieldPart1::where('commercial_invoice_id', $id)->first();
            $CommercialInvoiceRelatedFieldPart1->commercial_invoice_id = $CommercialInvoice->id;
            $CommercialInvoiceRelatedFieldPart1->heading_proforma_invioce = $request->heading_proforma_invioce;
            $CommercialInvoiceRelatedFieldPart1->value_proforma_invioce = $request->value_proforma_invioce;
            for ($i = 1; $i <= 35; $i++) {
                $CommercialInvoiceRelatedFieldPart1->{"heading_long_side_$i"} = $request->input("heading_long_side_$i");
                $CommercialInvoiceRelatedFieldPart1->{"heading_po_$i"} = $request->input("heading_po_$i");
                $CommercialInvoiceRelatedFieldPart1->{"value_po_$i"} = $request->input("value_po_$i");
                $CommercialInvoiceRelatedFieldPart1->{"heading_cotton_$i"} = $request->input("heading_cotton_$i");
                $CommercialInvoiceRelatedFieldPart1->{"heading_seahorse_$i"} = $request->input("heading_seahorse_$i");
            }
            $CommercialInvoiceRelatedFieldPart1->save();

            $CommercialInvoiceRelatedFieldPart2 =  CommercialInvoiceRelatedFieldPart2::where('commercial_invoice_id', $id)->first();
            $CommercialInvoiceRelatedFieldPart2->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 35; $i++) {
                $CommercialInvoiceRelatedFieldPart2->{"heading_terry_$i"} = $request->input("heading_terry_$i");
                $CommercialInvoiceRelatedFieldPart2->{"heading_carron_bales_pallets_$i"} = $request->input("heading_carron_bales_pallets_$i");
                $CommercialInvoiceRelatedFieldPart2->{"carron_bales_pallets_value_$i"} = $request->input("carron_bales_pallets_value_$i");
                $CommercialInvoiceRelatedFieldPart2->{"heading_pcs_pack_pallet_per_$i"} = $request->input("heading_pcs_pack_pallet_per_$i");
                $CommercialInvoiceRelatedFieldPart2->{"pcs_pack_pallet_per_value_$i"} = $request->input("pcs_pack_pallet_per_value_$i");
            }
            $CommercialInvoiceRelatedFieldPart2->save();


            $CommercialInvoiceRelatedFieldPart3 =  CommercialInvoiceRelatedFieldPart3::where('commercial_invoice_id', $id)->first();
            $CommercialInvoiceRelatedFieldPart3->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 35; $i++) {
                $CommercialInvoiceRelatedFieldPart3->{"heading_color_$i"} = $request->input("heading_color_$i");
                $CommercialInvoiceRelatedFieldPart3->{"heading_sku_no_$i"} = $request->input("heading_sku_no_$i");
                $CommercialInvoiceRelatedFieldPart3->{"heading_ean_no_$i"} = $request->input("heading_ean_no_$i");
                $CommercialInvoiceRelatedFieldPart3->{"heading_sku_hash_$i"} = $request->input("heading_sku_hash_$i");
                $CommercialInvoiceRelatedFieldPart3->{"heading_style_$i"} = $request->input("heading_style_$i");
            }
            $CommercialInvoiceRelatedFieldPart3->save();

            $CommercialInvoiceRelatedFieldPart4 =  CommercialInvoiceRelatedFieldPart4::where('commercial_invoice_id', $id)->first();
            $CommercialInvoiceRelatedFieldPart4->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 35; $i++) {
                $CommercialInvoiceRelatedFieldPart4->{"heading_po_number_$i"} = $request->input("heading_po_number_$i");
                $CommercialInvoiceRelatedFieldPart4->{"heading_po_number_value_$i"} = $request->input("heading_po_number_value_$i");
                $CommercialInvoiceRelatedFieldPart4->{"heading_style_name_$i"} = $request->input("heading_style_name_$i");
                $CommercialInvoiceRelatedFieldPart4->{"heading_style_name_value_$i"} = $request->input("heading_style_name_value_$i");
            }
            $CommercialInvoiceRelatedFieldPart4->save();

            $CommercialInvoiceRelatedFieldPart5 =  CommercialInvoiceRelatedFieldPart5::where('commercial_invoice_id', $id)->first();
            $CommercialInvoiceRelatedFieldPart5->commercial_invoice_id = $CommercialInvoice->id;

            for ($i = 1; $i <= 35; $i++) {
                $CommercialInvoiceRelatedFieldPart5->{"heading_style_number_$i"} = $request->input("heading_style_number_$i");
                $CommercialInvoiceRelatedFieldPart5->{"heading_style_number_value_$i"} = $request->input("heading_style_number_value_$i");
                $CommercialInvoiceRelatedFieldPart5->{"heading_color_left_column_$i"} = $request->input("heading_color_left_column_$i");
                $CommercialInvoiceRelatedFieldPart5->{"heading_color_left_column_value_$i"} = $request->input("heading_color_left_column_value_$i");
                $CommercialInvoiceRelatedFieldPart5->{"heading_size_break_down_$i"} = $request->input("heading_size_break_down_$i");
            }

            $CommercialInvoiceRelatedFieldPart5->save();

            $CommercialInvoiceRelatedFieldPart6 =  CommercialInvoiceRelatedFieldPart6::where('commercial_invoice_id', $id)->first();
            $CommercialInvoiceRelatedFieldPart6->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 35; $i++) {
                $CommercialInvoiceRelatedFieldPart6->{"heading_size_break_down_value_$i"} = $request->input("heading_size_break_down_value_$i");
                $CommercialInvoiceRelatedFieldPart6->{"heading_carton_count_$i"} = $request->input("heading_carton_count_$i");
                $CommercialInvoiceRelatedFieldPart6->{"heading_carton_count_value_$i"} = $request->input("heading_carton_count_value_$i");
                $CommercialInvoiceRelatedFieldPart6->{"heading_carton_size_$i"} = $request->input("heading_carton_size_$i");
                $CommercialInvoiceRelatedFieldPart6->{"heading_carton_size_value_$i"} = $request->input("heading_carton_size_value_$i");
            }
            $CommercialInvoiceRelatedFieldPart6->save();

            $CommercialInvoiceRelatedFieldPart7 =  CommercialInvoiceRelatedFieldPart7::where('commercial_invoice_id', $id)->first();
            $CommercialInvoiceRelatedFieldPart7->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 35; $i++) {
                $CommercialInvoiceRelatedFieldPart7->{"heading_bale_left_column_$i"} = $request->input("heading_bale_left_column_$i");
                $CommercialInvoiceRelatedFieldPart7->{"heading_bale_left_column_value_$i"} = $request->input("heading_bale_left_column_value_$i");
                $CommercialInvoiceRelatedFieldPart7->{"heading_net_weight_left_column_$i"} = $request->input("heading_net_weight_left_column_$i");
                $CommercialInvoiceRelatedFieldPart7->{"heading_gross_weight_left_column_$i"} = $request->input("heading_gross_weight_left_column_$i");
                $CommercialInvoiceRelatedFieldPart7->{"heading_net_weight_second_column_$i"} = $request->input("heading_net_weight_second_column_$i");
            }
            $CommercialInvoiceRelatedFieldPart7->save();

            $CommercialInvoiceRelatedFieldPart8 =  CommercialInvoiceRelatedFieldPart8::where('commercial_invoice_id', $id)->first();
            $CommercialInvoiceRelatedFieldPart8->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 35; $i++) {
                $CommercialInvoiceRelatedFieldPart8->{"heading_gross_weight_second_column_$i"} = $request->input("heading_gross_weight_second_column_$i");
                $CommercialInvoiceRelatedFieldPart8->{"net_weight_second_column_value_$i"} = $request->input("net_weight_second_column_value_$i");
                $CommercialInvoiceRelatedFieldPart8->{"gross_weight_second_column_value_$i"} = $request->input("gross_weight_second_column_value_$i");
                $CommercialInvoiceRelatedFieldPart8->{"heading_quantity_unit_$i"} = $request->input("heading_quantity_unit_$i");
            }
            $CommercialInvoiceRelatedFieldPart8->save();



            $CommercialInvoiceRelatedValuePart1 =  CommercialInvoiceRelatedValuePart1::where('commercial_invoice_id', $id)->first();
            $CommercialInvoiceRelatedValuePart1->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 350; $i++) {
                $CommercialInvoiceRelatedValuePart1->{"color_name_second_column_value_$i"} = $request->input("color_name_second_column_value_$i");
            }
            $CommercialInvoiceRelatedValuePart1->save();

            $CommercialInvoiceRelatedValuePart2 =  CommercialInvoiceRelatedValuePart2::where('commercial_invoice_id', $id)->first();
            $CommercialInvoiceRelatedValuePart2->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 350; $i++) {
                $CommercialInvoiceRelatedValuePart2->{"sku_no_second_column_value_$i"} = $request->input("sku_no_second_column_value_$i");
            }
            $CommercialInvoiceRelatedValuePart2->save();

            $CommercialInvoiceRelatedValuePart3 =  CommercialInvoiceRelatedValuePart3::where('commercial_invoice_id', $id)->first();
            $CommercialInvoiceRelatedValuePart3->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 350; $i++) {
                $CommercialInvoiceRelatedValuePart3->{"ean_no_second_column_value_$i"} = $request->input("ean_no_second_column_value_$i");
            }
            $CommercialInvoiceRelatedValuePart3->save();

            $CommercialInvoiceRelatedValuePart4 =  CommercialInvoiceRelatedValuePart4::where('commercial_invoice_id', $id)->first();
            $CommercialInvoiceRelatedValuePart4->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 350; $i++) {
                $CommercialInvoiceRelatedValuePart4->{"sku_hash_no_second_column_value_$i"} = $request->input("sku_hash_no_second_column_value_$i");
            }
            $CommercialInvoiceRelatedValuePart4->save();

            $CommercialInvoiceRelatedValuePart5 =  CommercialInvoiceRelatedValuePart5::where('commercial_invoice_id', $id)->first();
            $CommercialInvoiceRelatedValuePart5->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 350; $i++) {
                $CommercialInvoiceRelatedValuePart5->{"style_no_second_column_value_$i"} = $request->input("style_no_second_column_value_$i");
            }
            $CommercialInvoiceRelatedValuePart5->save();

            $CommercialInvoiceRelatedValuePart6 =  CommercialInvoiceRelatedValuePart6::where('commercial_invoice_id', $id)->first();
            $CommercialInvoiceRelatedValuePart6->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 350; $i++) {
                $CommercialInvoiceRelatedValuePart6->{"quantity_third_column_value_$i"} = $request->input("quantity_third_column_value_$i");
            }
            $CommercialInvoiceRelatedValuePart6->save();

            $CommercialInvoiceRelatedValuePart7 =  CommercialInvoiceRelatedValuePart7::where('commercial_invoice_id', $id)->first();
            $CommercialInvoiceRelatedValuePart7->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 350; $i++) {
                $CommercialInvoiceRelatedValuePart7->{"price_third_column_value_$i"} = $request->input("price_third_column_value_$i");
            }
            $CommercialInvoiceRelatedValuePart7->save();

            $CommercialInvoiceRelatedValuePart8 =  CommercialInvoiceRelatedValuePart8::where('commercial_invoice_id', $id)->first();
            $CommercialInvoiceRelatedValuePart8->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 350; $i++) {
                $CommercialInvoiceRelatedValuePart8->{"currency_symbol_third_column_value_$i"} = $request->input("currency_symbol_third_column_value_$i");
            }
            $CommercialInvoiceRelatedValuePart8->save();

            $CommercialInvoiceRelatedValuePart9 =  CommercialInvoiceRelatedValuePart9::where('commercial_invoice_id', $id)->first();
            $CommercialInvoiceRelatedValuePart9->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 350; $i++) {
                $CommercialInvoiceRelatedValuePart9->{"total_amount_third_column_value_$i"} = $request->input("total_amount_third_column_value_$i");
            }
            $CommercialInvoiceRelatedValuePart9->save();

            $CommercialInvoiceRelatedValuePart10 =  CommercialInvoiceRelatedValuePart10::where('commercial_invoice_id', $id)->first();
            $CommercialInvoiceRelatedValuePart10->commercial_invoice_id = $CommercialInvoice->id;
            for ($i = 1; $i <= 350; $i++) {
                $CommercialInvoiceRelatedValuePart10->{"quantity_unit_third_column_value_$i"} = $request->input("quantity_unit_third_column_value_$i");
            }
            $CommercialInvoiceRelatedValuePart10->save();


            // Create CanadaInvoiceHistory record
            $CommercialInvoiceHistory = new CommercialInvoiceHistory();
            $CommercialInvoiceHistory->commercial_invoice_id = $CommercialInvoice->id;
            $CommercialInvoiceHistory->editer_name = Auth::guard('admin')->user()->user_name;

            $CommercialInvoiceHistory->edited_at = now();
            $CommercialInvoiceHistory->save();

            // Return a success response
            return response()->json(['message' => 'All records submitted successfully!']);
        } catch (\Exception $e) {
            // Log the error
            Log::error($e);

            // Return an error response
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.', 'error' => $e->getMessage()], 500);
        }
    }


    function view_commercial_invoice($id)
    {
        $data['title'] = "COMMERCIAL INVOICE";
        $data['page'] = "COMMERCIAL INVOICE";
        $data['pageIntro'] = "COMMERCIAL INVOICE View";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        $data['CommercialInvoice'] = CommercialInvoice::where('id', $id)->first()->toArray();

        // Fetch the related field data and merge it with the existing array under the same key
        $data['CommercialInvoice'] = array_merge(
            $data['CommercialInvoice'],
            CommercialInvoiceRelatedFieldPart1::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedFieldPart2::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedFieldPart3::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedFieldPart4::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedFieldPart5::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedFieldPart6::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedFieldPart7::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedFieldPart8::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedValuePart1::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedValuePart2::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedValuePart3::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedValuePart4::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedValuePart5::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedValuePart6::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedValuePart7::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedValuePart8::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedValuePart9::where('commercial_invoice_id', $id)->first()->toArray() ?? [],
            CommercialInvoiceRelatedValuePart10::where('commercial_invoice_id', $id)->first()->toArray() ?? []
        );

        if (!$data['CommercialInvoice']) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        return view('admin.report.commercial-invoice.view', $data);
    }

    function activity_commercial_invoice($id)
    {
        $data['title'] = "COMMERCIAL INVOICE";
        $data['page'] = "COMMERCIAL INVOICE";

        $data['pageIntro'] = "COMMERCIAL INVOICE Activity";
        $data['getAllCommercialInvoice'] = CommercialInvoiceHistory::where('commercial_invoice_id', $id)->get();

        if ($data['getAllCommercialInvoice']->isEmpty()) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.commercial-invoice.activity', $data);
    }

    //==================== commercial_invoice end ======================//







    //==================== packing_list start ======================//

    function report_List_packing_list(Request $request)
    {
        // dd($request->all());


        $data['title'] = "PACKING SLIP";
        $data['page'] = "PACKING SLIP";
        $data['pageIntro'] = "PACKING SLIP";

        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        // dd($data);
        $query = PackingList::query();


        if (isset($request->teamMember) && !empty($request->teamMember)) {
            $party_id = (int)$request->input('teamMember');
            $query->where('team_user_id', $party_id);
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


        $data['PackingList'] = $query->latest()->get();
        return view('admin.report.packing-list.index', $data);
    }

    public function generate_packing_list_PDF($id)
    {
        $viewName = 'admin.report.packing-list.pdf.packing_list_pdf';

        // Check if the view exists
        if (!view()->exists($viewName)) {
            abort(404); // Redirect to 404 page if the view does not exist
        }

        // $data = [
        //     'title' => 'Commercial Invoice Pdf',
        //     'PackingList' => PackingList::where('id', $id)->first(),

        // ];
        $data = [
            'title' => 'Commercial Invoice Pdf',
            'PackingList' => PackingList::where('id', $id)->first()->toArray(),
        ];

        $relatedFieldParts = [
            PackingListRelatedFieldPart1::class,
            PackingListRelatedFieldPart2::class,
            PackingListRelatedFieldPart3::class,
            PackingListRelatedFieldPart4::class,
            PackingListRelatedFieldPart5::class,
            PackingListRelatedFieldPart6::class,
            PackingListRelatedFieldPart7::class,
            PackingListRelatedFieldPart8::class,
            PackingListRelatedValuePart1::class,
            PackingListRelatedValuePart2::class,
            PackingListRelatedValuePart3::class,
            PackingListRelatedValuePart4::class,
            PackingListRelatedValuePart5::class,
            PackingListRelatedValuePart6::class,
            PackingListRelatedValuePart7::class,
            PackingListRelatedValuePart8::class,
            PackingListRelatedValuePart9::class,
            PackingListRelatedValuePart10::class,
        ];

        foreach ($relatedFieldParts as $relatedPart) {
            $relatedInstance = $relatedPart::where('packing_list_id', $id)->first();
            if ($relatedInstance) {
                $data['PackingList'] = array_merge($data['PackingList'], $relatedInstance->toArray());
            }
        }



        // Debug the fetched data
        // dd($data['PackingList']);
        // Create a new Dompdf instance
        $dompdf = new Dompdf();

        // Load HTML content from view
        $html = view($viewName, $data)->render();
        // return $html;
        // Load options
        $options = new \Dompdf\Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf->setOptions($options);


        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // Set paper size and orientation (optional)
        $dompdf->setPaper('A4', 'portrait');

        // Set page numbers
        // $dompdf->setCallbacks([
        //     'pageNumber' => 'Page {PAGE_NUM}',
        // ]);
        // Set page numbers
        // Set page numbers
        $dompdf->setCallbacks([
            'pageNumber' => 'Page {PAGE_NUM}',
            'totalPages' => ' of {PAGE_COUNT}',
        ]);



        // Render the HTML as PDF
        $dompdf->render();

        // Get the generated PDF output
        $output = $dompdf->output();

        // Generate PDF file name
        $pdfName = $id . now() . '-packing-slip.pdf';

        // Output the PDF as stream

        return response()->streamDownload(function () use ($output) {
            echo $output;
        }, $pdfName);
    }

    function add_packing_list()
    {

        $data['title'] = "PACKING SLIP";
        $data['page'] = "PACKING SLIP";
        $data['pageIntro'] = "PACKING SLIP";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        return view('admin.report.packing-list.add', $data);
    }

    public function submit_packing_list(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'packing_list_invoice' => 'required|unique:packing_lists',
            // add other required fields validation here if necessary
        ]);
        try {


            // Create CanadaCustomerInvoiceFrom record
            $PackingList = new PackingList();
            $PackingList->invioce_generator = rand(0000, 9999) . now();
            $PackingList->team_user_id = $request->input('team_user_id');

            $PackingList->heading_f_i_no = $request->input('heading_f_i_no');
            $PackingList->heading_shipper = $request->input('heading_shipper');
            $PackingList->heading_invioce = $request->input('heading_invioce');
            $PackingList->heading_vessel = $request->input('heading_vessel');
            $PackingList->heading_dated = $request->input('heading_dated');
            $PackingList->heading_total_pkg = $request->input('heading_total_pkg');
            $PackingList->heading_contract_no = $request->input('heading_contract_no');
            $PackingList->heading_contract_date = $request->input('heading_contract_date');
            $PackingList->heading_lc = $request->input('heading_lc');
            $PackingList->heading_issue_date_lc = $request->input('heading_issue_date_lc');
            $PackingList->heading_pyment_terms = $request->input('heading_pyment_terms');
            $PackingList->heading_drawn_at = $request->input('heading_drawn_at');
            $PackingList->heading_drawn_under = $request->input('heading_drawn_under');
            $PackingList->heading_part_of_loading = $request->input('heading_part_of_loading');
            $PackingList->heading_part_of_discharge = $request->input('heading_part_of_discharge');
            $PackingList->heading_container_no = $request->input('heading_container_no');
            $PackingList->heading_currency = $request->input('heading_currency');
            $PackingList->heading_term_of_delivery = $request->input('heading_term_of_delivery');
            $PackingList->heading_buyer = $request->input('heading_buyer');
            $PackingList->heading_ship_to = $request->input('heading_ship_to');
            $PackingList->heading_marks_no = $request->input('heading_marks_no');
            $PackingList->heading_discription_of_goods = $request->input('heading_discription_of_goods');
            $PackingList->heading_quantity = $request->input('heading_quantity');
            $PackingList->heading_prices = $request->input('heading_prices');
            $PackingList->heading_total_amount = $request->input('heading_total_amount');
            $PackingList->heading_long_sides = $request->input('heading_long_sides');
            $PackingList->heading_performa_invioce_no = $request->input('heading_performa_invioce_no');
            $PackingList->currency_symbol = $request->input('currency_symbol');

            $PackingList->heading_total_net_weight = $request->heading_total_net_weight;
            $PackingList->heading_total_gr_weight = $request->heading_total_gr_weight;
            $PackingList->heading_total_buyer_discount = $request->heading_total_buyer_discount;
            $PackingList->heading_total_less_commission = $request->heading_total_less_commission;
            $PackingList->heading_total_add_fright = $request->heading_total_add_fright;
            $PackingList->heading_total_net_amount_payable = $request->heading_total_net_amount_payable;
            $PackingList->heading_note = $request->heading_note;
            $PackingList->heading_remarks = $request->heading_remarks;
            $PackingList->heading_intermediary_bank = $request->heading_intermediary_bank;
            $PackingList->heading_intermediary_bank_swift_no = $request->heading_intermediary_bank_swift_no;
            $PackingList->heading_intermediary_bank_ac_no = $request->heading_intermediary_bank_ac_no;
            $PackingList->heading_for_onword_credit_to = $request->heading_for_onword_credit_to;
            $PackingList->heading_tw_ac_no = $request->heading_tw_ac_no;
            $PackingList->heading_swift_no = $request->heading_swift_no;
            $PackingList->heading_iban_no = $request->heading_iban_no;
            $PackingList->heading_bank_addrss = $request->heading_bank_addrss;
            $PackingList->heading_statement_origin = $request->heading_statement_origin;
            $PackingList->value_f_i_no = $request->value_f_i_no;
            $PackingList->name_shipper = $request->name_shipper;
            $PackingList->address_shipper = $request->address_shipper;
            $PackingList->city_shipper = $request->city_shipper;
            $PackingList->country_shipper = $request->country_shipper;
            $PackingList->phone_shipper = $request->phone_shipper;
            $PackingList->name_buyer = $request->name_buyer;
            $PackingList->address_buyer = $request->address_buyer;
            $PackingList->city_buyer = $request->city_buyer;
            $PackingList->country_buyer = $request->country_buyer;
            $PackingList->phone_buyer = $request->phone_buyer;
            $PackingList->name_ship_to = $request->name_ship_to;
            $PackingList->address_ship_to = $request->address_ship_to;
            $PackingList->city_ship_to = $request->city_ship_to;
            $PackingList->country_ship_to = $request->country_ship_to;
            $PackingList->phone_ship_to = $request->phone_ship_to;
            $PackingList->performa_invioce_no_value = $request->performa_invioce_no_value;
            $PackingList->vessel_value = $request->vessel_value;
            $PackingList->dated = $request->dated;
            $PackingList->total_pkg_value = $request->total_pkg_value;
            $PackingList->contract_no_value  = $request->contract_no_value;
            $PackingList->contract_date_value  = $request->contract_date_value;
            $PackingList->lc_value  = $request->lc_value;
            $PackingList->lc_issue_date_value  = $request->lc_issue_date_value;
            $PackingList->pyment_terms_value  = $request->pyment_terms_value;
            $PackingList->drawn_at_value  = $request->drawn_at_value;
            $PackingList->drawn_under_value  = $request->drawn_under_value;
            $PackingList->port_of_loading_value  = $request->port_of_loading_value;
            $PackingList->port_of_discharge_value  = $request->port_of_discharge_value;
            $PackingList->container_no_value  = $request->container_no_value;
            $PackingList->currency_value  = $request->currency_value;
            $PackingList->term_of_delivery_value  = $request->term_of_delivery_value;
            $PackingList->total_net_weight_value = $request->total_net_weight_valu;
            $PackingList->total_gr_weight_value = $request->total_gr_weight_valu;
            $PackingList->note_value = $request->note_value;
            $PackingList->value_remarks = $request->value_remarks;
            $PackingList->value_intermediary_bank = $request->value_intermediary_bank;
            $PackingList->value_intermediary_bank_swift_no = $request->value_intermediary_bank_swift_no;
            $PackingList->value_intermediary_bank_ac_no = $request->value_intermediary_bank_ac_no;
            $PackingList->value_for_onword_credit_to = $request->value_for_onword_credit_to;
            $PackingList->value_tw_ac_no = $request->value_tw_ac_no;
            $PackingList->value_swift_no = $request->value_swift_no;
            $PackingList->value_iban_no = $request->value_iban_no;
            $PackingList->value_bank_addrss = $request->value_bank_addrss;
            $PackingList->value_bank_addrss_1 = $request->value_bank_addrss_1;
            $PackingList->value_bank_addrss_2 = $request->value_bank_addrss_2;
            $PackingList->value_statement_origin = $request->value_statement_origin;
            $PackingList->value_total_buyer_discount = $request->value_total_buyer_discount;
            $PackingList->value_total_less_commission = $request->value_total_less_commission;
            $PackingList->value_total_add_fright = $request->value_total_add_fright;
            $PackingList->value_total_net_amount_payable = $request->value_total_net_amount_payable;
            $PackingList->value_currency_name = $request->value_currency_name;
            $PackingList->status = 1;
            $PackingList->packing_list_invoice = $request->packing_list_invoice;

            // $PackingList->fill($request->all());

            // Save the PackingList model
            $PackingList->save();

            $PackingListRelatedFieldPart1 = new PackingListRelatedFieldPart1();
            $PackingListRelatedFieldPart1->packing_list_id = $PackingList->id;
            $PackingListRelatedFieldPart1->heading_proforma_invioce = $request->heading_proforma_invioce;
            $PackingListRelatedFieldPart1->value_proforma_invioce = $request->value_proforma_invioce;
            for ($i = 1; $i <= 35; $i++) {
                $PackingListRelatedFieldPart1->{"heading_long_side_$i"} = $request->input("heading_long_side_$i");
                $PackingListRelatedFieldPart1->{"heading_po_$i"} = $request->input("heading_po_$i");
                $PackingListRelatedFieldPart1->{"value_po_$i"} = $request->input("value_po_$i");
                $PackingListRelatedFieldPart1->{"heading_cotton_$i"} = $request->input("heading_cotton_$i");
                $PackingListRelatedFieldPart1->{"heading_seahorse_$i"} = $request->input("heading_seahorse_$i");
            }
            $PackingListRelatedFieldPart1->save();

            $PackingListRelatedFieldPart2 = new PackingListRelatedFieldPart2();
            $PackingListRelatedFieldPart2->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 35; $i++) {
                $PackingListRelatedFieldPart2->{"heading_terry_$i"} = $request->input("heading_terry_$i");
                $PackingListRelatedFieldPart2->{"heading_carron_bales_pallets_$i"} = $request->input("heading_carron_bales_pallets_$i");
                $PackingListRelatedFieldPart2->{"carron_bales_pallets_value_$i"} = $request->input("carron_bales_pallets_value_$i");
                $PackingListRelatedFieldPart2->{"heading_pcs_pack_pallet_per_$i"} = $request->input("heading_pcs_pack_pallet_per_$i");
                $PackingListRelatedFieldPart2->{"pcs_pack_pallet_per_value_$i"} = $request->input("pcs_pack_pallet_per_value_$i");
            }
            $PackingListRelatedFieldPart2->save();


            $PackingListRelatedFieldPart3 = new PackingListRelatedFieldPart3();
            $PackingListRelatedFieldPart3->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 35; $i++) {
                $PackingListRelatedFieldPart3->{"heading_color_$i"} = $request->input("heading_color_$i");
                $PackingListRelatedFieldPart3->{"heading_sku_no_$i"} = $request->input("heading_sku_no_$i");
                $PackingListRelatedFieldPart3->{"heading_ean_no_$i"} = $request->input("heading_ean_no_$i");
                $PackingListRelatedFieldPart3->{"heading_sku_hash_$i"} = $request->input("heading_sku_hash_$i");
                $PackingListRelatedFieldPart3->{"heading_style_$i"} = $request->input("heading_style_$i");
            }
            $PackingListRelatedFieldPart3->save();

            $PackingListRelatedFieldPart4 = new PackingListRelatedFieldPart4();
            $PackingListRelatedFieldPart4->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 35; $i++) {
                $PackingListRelatedFieldPart4->{"heading_po_number_$i"} = $request->input("heading_po_number_$i");
                $PackingListRelatedFieldPart4->{"heading_po_number_value_$i"} = $request->input("heading_po_number_value_$i");
                $PackingListRelatedFieldPart4->{"heading_style_name_$i"} = $request->input("heading_style_name_$i");
                $PackingListRelatedFieldPart4->{"heading_style_name_value_$i"} = $request->input("heading_style_name_value_$i");
            }
            $PackingListRelatedFieldPart4->save();

            $PackingListRelatedFieldPart5 = new PackingListRelatedFieldPart5();
            $PackingListRelatedFieldPart5->packing_list_id = $PackingList->id;

            for ($i = 1; $i <= 35; $i++) {
                $PackingListRelatedFieldPart5->{"heading_style_number_$i"} = $request->input("heading_style_number_$i");
                $PackingListRelatedFieldPart5->{"heading_style_number_value_$i"} = $request->input("heading_style_number_value_$i");
                $PackingListRelatedFieldPart5->{"heading_color_left_column_$i"} = $request->input("heading_color_left_column_$i");
                $PackingListRelatedFieldPart5->{"heading_color_left_column_value_$i"} = $request->input("heading_color_left_column_value_$i");
                $PackingListRelatedFieldPart5->{"heading_size_break_down_$i"} = $request->input("heading_size_break_down_$i");
            }

            $PackingListRelatedFieldPart5->save();

            $PackingListRelatedFieldPart6 = new PackingListRelatedFieldPart6();
            $PackingListRelatedFieldPart6->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 35; $i++) {
                $PackingListRelatedFieldPart6->{"heading_size_break_down_value_$i"} = $request->input("heading_size_break_down_value_$i");
                $PackingListRelatedFieldPart6->{"heading_carton_count_$i"} = $request->input("heading_carton_count_$i");
                $PackingListRelatedFieldPart6->{"heading_carton_count_value_$i"} = $request->input("heading_carton_count_value_$i");
                $PackingListRelatedFieldPart6->{"heading_carton_size_$i"} = $request->input("heading_carton_size_$i");
                $PackingListRelatedFieldPart6->{"heading_carton_size_value_$i"} = $request->input("heading_carton_size_value_$i");
            }
            $PackingListRelatedFieldPart6->save();

            $PackingListRelatedFieldPart7 = new PackingListRelatedFieldPart7();
            $PackingListRelatedFieldPart7->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 35; $i++) {
                $PackingListRelatedFieldPart7->{"heading_bale_left_column_$i"} = $request->input("heading_bale_left_column_$i");
                $PackingListRelatedFieldPart7->{"heading_bale_left_column_value_$i"} = $request->input("heading_bale_left_column_value_$i");
                $PackingListRelatedFieldPart7->{"heading_net_weight_left_column_$i"} = $request->input("heading_net_weight_left_column_$i");
                $PackingListRelatedFieldPart7->{"heading_gross_weight_left_column_$i"} = $request->input("heading_gross_weight_left_column_$i");
                $PackingListRelatedFieldPart7->{"heading_net_weight_second_column_$i"} = $request->input("heading_net_weight_second_column_$i");
            }
            $PackingListRelatedFieldPart7->save();

            $PackingListRelatedFieldPart8 = new PackingListRelatedFieldPart8();
            $PackingListRelatedFieldPart8->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 35; $i++) {
                $PackingListRelatedFieldPart8->{"heading_gross_weight_second_column_$i"} = $request->input("heading_gross_weight_second_column_$i");
                $PackingListRelatedFieldPart8->{"net_weight_second_column_value_$i"} = $request->input("net_weight_second_column_value_$i");
                $PackingListRelatedFieldPart8->{"gross_weight_second_column_value_$i"} = $request->input("gross_weight_second_column_value_$i");
                $PackingListRelatedFieldPart8->{"heading_quantity_unit_$i"} = $request->input("heading_quantity_unit_$i");
            }
            $PackingListRelatedFieldPart8->save();



            $PackingListRelatedValuePart1 = new PackingListRelatedValuePart1();
            $PackingListRelatedValuePart1->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 350; $i++) {
                $PackingListRelatedValuePart1->{"color_name_second_column_value_$i"} = $request->input("color_name_second_column_value_$i");
            }
            $PackingListRelatedValuePart1->save();

            $PackingListRelatedValuePart2 = new PackingListRelatedValuePart2();
            $PackingListRelatedValuePart2->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 350; $i++) {
                $PackingListRelatedValuePart2->{"sku_no_second_column_value_$i"} = $request->input("sku_no_second_column_value_$i");
            }
            $PackingListRelatedValuePart2->save();

            $PackingListRelatedValuePart3 = new PackingListRelatedValuePart3();
            $PackingListRelatedValuePart3->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 350; $i++) {
                $PackingListRelatedValuePart3->{"ean_no_second_column_value_$i"} = $request->input("ean_no_second_column_value_$i");
            }
            $PackingListRelatedValuePart3->save();

            $PackingListRelatedValuePart4 = new PackingListRelatedValuePart4();
            $PackingListRelatedValuePart4->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 350; $i++) {
                $PackingListRelatedValuePart4->{"sku_hash_no_second_column_value_$i"} = $request->input("sku_hash_no_second_column_value_$i");
            }
            $PackingListRelatedValuePart4->save();

            $PackingListRelatedValuePart5 = new PackingListRelatedValuePart5();
            $PackingListRelatedValuePart5->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 350; $i++) {
                $PackingListRelatedValuePart5->{"style_no_second_column_value_$i"} = $request->input("style_no_second_column_value_$i");
            }
            $PackingListRelatedValuePart5->save();

            $PackingListRelatedValuePart6 = new PackingListRelatedValuePart6();
            $PackingListRelatedValuePart6->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 350; $i++) {
                $PackingListRelatedValuePart6->{"quantity_third_column_value_$i"} = $request->input("quantity_third_column_value_$i");
            }
            $PackingListRelatedValuePart6->save();

            $PackingListRelatedValuePart7 = new PackingListRelatedValuePart7();
            $PackingListRelatedValuePart7->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 350; $i++) {
                $PackingListRelatedValuePart7->{"price_third_column_value_$i"} = $request->input("price_third_column_value_$i");
            }
            $PackingListRelatedValuePart7->save();

            $PackingListRelatedValuePart8 = new PackingListRelatedValuePart8();
            $PackingListRelatedValuePart8->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 350; $i++) {
                $PackingListRelatedValuePart8->{"currency_symbol_third_column_value_$i"} = $request->input("currency_symbol_third_column_value_$i");
            }
            $PackingListRelatedValuePart8->save();

            $PackingListRelatedValuePart9 = new PackingListRelatedValuePart9();
            $PackingListRelatedValuePart9->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 350; $i++) {
                $PackingListRelatedValuePart9->{"total_amount_third_column_value_$i"} = $request->input("total_amount_third_column_value_$i");
            }
            $PackingListRelatedValuePart9->save();


            $PackingListRelatedValuePart10 = new PackingListRelatedValuePart10();
            $PackingListRelatedValuePart10->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 350; $i++) {
                $PackingListRelatedValuePart10->{"quantity_unit_third_column_value_$i"} = $request->input("quantity_unit_third_column_value_$i");
            }
            $PackingListRelatedValuePart10->save();

            $PackingListHistory = new PackingListHistory();
            $PackingListHistory->packing_list_id = $PackingList->id;
            $PackingListHistory->editer_name = Auth::guard('admin')->user()->user_name;

            $PackingListHistory->edited_at = now();
            $PackingListHistory->save();




            return response()->json(['message' => 'All records submitted successfully!']);
        } catch (\Exception $e) {
            // Log the error
            Log::error($e);

            // Return an error response
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.' . $e], 500);
        }
    }

    function edit_packing_list($id)
    {
        $data['title'] = "PACKING SLIP";
        $data['page'] = "PACKING SLIP";
        $data['pageIntro'] = "PACKING SLIP";
        // Fetch the main commercial invoice data
        $data['PackingList'] = PackingList::where('id', $id)->first()->toArray();
        $data['id'] =isset($id) ? $id : null;

        // Fetch the related field data and merge it with the existing array under the same key
        $data['PackingList'] = array_merge(
            $data['PackingList'],
            PackingListRelatedFieldPart1::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedFieldPart2::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedFieldPart3::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedFieldPart4::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedFieldPart5::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedFieldPart6::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedFieldPart7::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedFieldPart8::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedValuePart1::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedValuePart2::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedValuePart3::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedValuePart4::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedValuePart5::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedValuePart6::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedValuePart7::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedValuePart8::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedValuePart9::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedValuePart10::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedValuePart11::where('packing_list_id', $id)->first()->toArray() ?? []
        );

        // Debug the fetched data
        // dd($data['PackingList']);




        if (!$data['PackingList']) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.packing-list.edit', $data);
    }
    public function update_submit_packing_list(Request $request)
    {
        $id = $request->input('id');
        $request->validate([
            'packing_list_invoice' => [
                'required',
                Rule::unique('packing_lists')->ignore($id),
            ],
            // add other required fields validation here if necessary
        ]);
        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request



            if ($id) {
                // If an ID is provided, update the existing record
                $PackingList = PackingList::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $PackingList = new PackingList();
                $PackingList->invioce_generator = rand(0000, 9999) . now();
            }

            if ($request->hasFile("pdf_upload_file_ic")) {
                $file = $request->file("pdf_upload_file_ic");
                // Generate a unique filename
                $filename = 'packing-list-' . $id . '-' . date('dmyHis') . rand() . '.' . $file->getClientOriginalExtension();
                // Move the file to the destination folder
                // $file->move(public_path('admin/assets/imgs/Document/'), $filename);
                $file->move(public_path('admin/assets/imgs/PackingList/'), $filename);
                $PackingList->{"pdf_upload_file_ic"} = $filename;
            }
            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $PackingList->team_user_id = $request->input('team_user_id');

            $PackingList->heading_f_i_no = $request->input('heading_f_i_no');
            $PackingList->heading_shipper = $request->input('heading_shipper');
            $PackingList->heading_invioce = $request->input('heading_invioce');
            $PackingList->heading_vessel = $request->input('heading_vessel');
            $PackingList->heading_dated = $request->input('heading_dated');
            $PackingList->heading_total_pkg = $request->input('heading_total_pkg');
            $PackingList->heading_contract_no = $request->input('heading_contract_no');
            $PackingList->heading_contract_date = $request->input('heading_contract_date');
            $PackingList->heading_lc = $request->input('heading_lc');
            $PackingList->heading_issue_date_lc = $request->input('heading_issue_date_lc');
            $PackingList->heading_pyment_terms = $request->input('heading_pyment_terms');
            $PackingList->heading_drawn_at = $request->input('heading_drawn_at');
            $PackingList->heading_drawn_under = $request->input('heading_drawn_under');
            $PackingList->heading_part_of_loading = $request->input('heading_part_of_loading');
            $PackingList->heading_part_of_discharge = $request->input('heading_part_of_discharge');
            $PackingList->heading_container_no = $request->input('heading_container_no');
            $PackingList->heading_currency = $request->input('heading_currency');
            $PackingList->heading_term_of_delivery = $request->input('heading_term_of_delivery');
            $PackingList->heading_buyer = $request->input('heading_buyer');
            $PackingList->heading_ship_to = $request->input('heading_ship_to');
            $PackingList->heading_marks_no = $request->input('heading_marks_no');
            $PackingList->heading_discription_of_goods = $request->input('heading_discription_of_goods');
            $PackingList->heading_quantity = $request->input('heading_quantity');
            $PackingList->heading_prices = $request->input('heading_prices');
            $PackingList->heading_total_amount = $request->input('heading_total_amount');
            $PackingList->heading_long_sides = $request->input('heading_long_sides');
            $PackingList->heading_performa_invioce_no = $request->input('heading_performa_invioce_no');
            $PackingList->currency_symbol = $request->input('currency_symbol');

            $PackingList->heading_total_net_weight = $request->heading_total_net_weight;
            $PackingList->heading_total_gr_weight = $request->heading_total_gr_weight;
            $PackingList->heading_total_buyer_discount = $request->heading_total_buyer_discount;
            $PackingList->heading_total_less_commission = $request->heading_total_less_commission;
            $PackingList->heading_total_add_fright = $request->heading_total_add_fright;
            $PackingList->heading_total_net_amount_payable = $request->heading_total_net_amount_payable;
            $PackingList->heading_note = $request->heading_note;
            $PackingList->heading_remarks = $request->heading_remarks;
            $PackingList->heading_intermediary_bank = $request->heading_intermediary_bank;
            $PackingList->heading_intermediary_bank_swift_no = $request->heading_intermediary_bank_swift_no;
            $PackingList->heading_intermediary_bank_ac_no = $request->heading_intermediary_bank_ac_no;
            $PackingList->heading_for_onword_credit_to = $request->heading_for_onword_credit_to;
            $PackingList->heading_tw_ac_no = $request->heading_tw_ac_no;
            $PackingList->heading_swift_no = $request->heading_swift_no;
            $PackingList->heading_iban_no = $request->heading_iban_no;
            $PackingList->heading_bank_addrss = $request->heading_bank_addrss;
            $PackingList->heading_statement_origin = $request->heading_statement_origin;
            $PackingList->value_f_i_no = $request->value_f_i_no;
            $PackingList->name_shipper = $request->name_shipper;
            $PackingList->address_shipper = $request->address_shipper;
            $PackingList->city_shipper = $request->city_shipper;
            $PackingList->country_shipper = $request->country_shipper;
            $PackingList->phone_shipper = $request->phone_shipper;
            $PackingList->name_buyer = $request->name_buyer;
            $PackingList->address_buyer = $request->address_buyer;
            $PackingList->city_buyer = $request->city_buyer;
            $PackingList->country_buyer = $request->country_buyer;
            $PackingList->phone_buyer = $request->phone_buyer;
            $PackingList->name_ship_to = $request->name_ship_to;
            $PackingList->address_ship_to = $request->address_ship_to;
            $PackingList->city_ship_to = $request->city_ship_to;
            $PackingList->country_ship_to = $request->country_ship_to;
            $PackingList->phone_ship_to = $request->phone_ship_to;
            $PackingList->performa_invioce_no_value = $request->performa_invioce_no_value;
            $PackingList->vessel_value = $request->vessel_value;
            $PackingList->dated = $request->dated;
            $PackingList->total_pkg_value = $request->total_pkg_value;
            $PackingList->contract_no_value  = $request->contract_no_value;
            $PackingList->contract_date_value  = $request->contract_date_value;
            $PackingList->lc_value  = $request->lc_value;
            $PackingList->lc_issue_date_value  = $request->lc_issue_date_value;
            $PackingList->pyment_terms_value  = $request->pyment_terms_value;
            $PackingList->drawn_at_value  = $request->drawn_at_value;
            $PackingList->drawn_under_value  = $request->drawn_under_value;
            $PackingList->port_of_loading_value  = $request->port_of_loading_value;
            $PackingList->port_of_discharge_value  = $request->port_of_discharge_value;
            $PackingList->container_no_value  = $request->container_no_value;
            $PackingList->currency_value  = $request->currency_value;
            $PackingList->term_of_delivery_value  = $request->term_of_delivery_value;
            $PackingList->total_net_weight_value = $request->total_net_weight_valu;
            $PackingList->total_gr_weight_value = $request->total_gr_weight_valu;
            $PackingList->note_value = $request->note_value;
            $PackingList->value_remarks = $request->value_remarks;
            $PackingList->value_intermediary_bank = $request->value_intermediary_bank;
            $PackingList->value_intermediary_bank_swift_no = $request->value_intermediary_bank_swift_no;
            $PackingList->value_intermediary_bank_ac_no = $request->value_intermediary_bank_ac_no;
            $PackingList->value_for_onword_credit_to = $request->value_for_onword_credit_to;
            $PackingList->value_tw_ac_no = $request->value_tw_ac_no;
            $PackingList->value_swift_no = $request->value_swift_no;
            $PackingList->value_iban_no = $request->value_iban_no;
            $PackingList->value_bank_addrss = $request->value_bank_addrss;
            $PackingList->value_bank_addrss_1 = $request->value_bank_addrss_1;
            $PackingList->value_bank_addrss_2 = $request->value_bank_addrss_2;
            $PackingList->value_statement_origin = $request->value_statement_origin;
            $PackingList->value_total_buyer_discount = $request->value_total_buyer_discount;
            $PackingList->value_total_less_commission = $request->value_total_less_commission;
            $PackingList->value_total_add_fright = $request->value_total_add_fright;
            $PackingList->value_total_net_amount_payable = $request->value_total_net_amount_payable;
            $PackingList->value_currency_name = $request->value_currency_name;
            $PackingList->status = 1;
            $PackingList->packing_list_invoice = $request->packing_list_invoice;

            // $PackingList->fill($request->all());

            // Save the PackingList model
            $PackingList->save();

            $PackingListRelatedFieldPart1 =  PackingListRelatedFieldPart1::where('packing_list_id', $id)->first();
            $PackingListRelatedFieldPart1->packing_list_id = $PackingList->id;
            $PackingListRelatedFieldPart1->heading_proforma_invioce = $request->heading_proforma_invioce;
            $PackingListRelatedFieldPart1->value_proforma_invioce = $request->value_proforma_invioce;
            for ($i = 1; $i <= 35; $i++) {
                $PackingListRelatedFieldPart1->{"heading_long_side_$i"} = $request->input("heading_long_side_$i");
                $PackingListRelatedFieldPart1->{"heading_po_$i"} = $request->input("heading_po_$i");
                $PackingListRelatedFieldPart1->{"value_po_$i"} = $request->input("value_po_$i");
                $PackingListRelatedFieldPart1->{"heading_cotton_$i"} = $request->input("heading_cotton_$i");
                $PackingListRelatedFieldPart1->{"heading_seahorse_$i"} = $request->input("heading_seahorse_$i");
            }
            $PackingListRelatedFieldPart1->save();

            $PackingListRelatedFieldPart2 =  PackingListRelatedFieldPart2::where('packing_list_id', $id)->first();
            $PackingListRelatedFieldPart2->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 35; $i++) {
                $PackingListRelatedFieldPart2->{"heading_terry_$i"} = $request->input("heading_terry_$i");
                $PackingListRelatedFieldPart2->{"heading_carron_bales_pallets_$i"} = $request->input("heading_carron_bales_pallets_$i");
                $PackingListRelatedFieldPart2->{"carron_bales_pallets_value_$i"} = $request->input("carron_bales_pallets_value_$i");
                $PackingListRelatedFieldPart2->{"heading_pcs_pack_pallet_per_$i"} = $request->input("heading_pcs_pack_pallet_per_$i");
                $PackingListRelatedFieldPart2->{"pcs_pack_pallet_per_value_$i"} = $request->input("pcs_pack_pallet_per_value_$i");
            }
            $PackingListRelatedFieldPart2->save();


            $PackingListRelatedFieldPart3 =  PackingListRelatedFieldPart3::where('packing_list_id', $id)->first();
            $PackingListRelatedFieldPart3->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 35; $i++) {
                $PackingListRelatedFieldPart3->{"heading_color_$i"} = $request->input("heading_color_$i");
                $PackingListRelatedFieldPart3->{"heading_sku_no_$i"} = $request->input("heading_sku_no_$i");
                $PackingListRelatedFieldPart3->{"heading_ean_no_$i"} = $request->input("heading_ean_no_$i");
                $PackingListRelatedFieldPart3->{"heading_sku_hash_$i"} = $request->input("heading_sku_hash_$i");
                $PackingListRelatedFieldPart3->{"heading_style_$i"} = $request->input("heading_style_$i");
            }
            $PackingListRelatedFieldPart3->save();

            $PackingListRelatedFieldPart4 =  PackingListRelatedFieldPart4::where('packing_list_id', $id)->first();
            $PackingListRelatedFieldPart4->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 35; $i++) {
                $PackingListRelatedFieldPart4->{"heading_po_number_$i"} = $request->input("heading_po_number_$i");
                $PackingListRelatedFieldPart4->{"heading_po_number_value_$i"} = $request->input("heading_po_number_value_$i");
                $PackingListRelatedFieldPart4->{"heading_style_name_$i"} = $request->input("heading_style_name_$i");
                $PackingListRelatedFieldPart4->{"heading_style_name_value_$i"} = $request->input("heading_style_name_value_$i");
            }
            $PackingListRelatedFieldPart4->save();

            $PackingListRelatedFieldPart5 =  PackingListRelatedFieldPart5::where('packing_list_id', $id)->first();
            $PackingListRelatedFieldPart5->packing_list_id = $PackingList->id;

            for ($i = 1; $i <= 35; $i++) {
                $PackingListRelatedFieldPart5->{"heading_style_number_$i"} = $request->input("heading_style_number_$i");
                $PackingListRelatedFieldPart5->{"heading_style_number_value_$i"} = $request->input("heading_style_number_value_$i");
                $PackingListRelatedFieldPart5->{"heading_color_left_column_$i"} = $request->input("heading_color_left_column_$i");
                $PackingListRelatedFieldPart5->{"heading_color_left_column_value_$i"} = $request->input("heading_color_left_column_value_$i");
                $PackingListRelatedFieldPart5->{"heading_size_break_down_$i"} = $request->input("heading_size_break_down_$i");
            }

            $PackingListRelatedFieldPart5->save();

            $PackingListRelatedFieldPart6 =  PackingListRelatedFieldPart6::where('packing_list_id', $id)->first();
            $PackingListRelatedFieldPart6->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 35; $i++) {
                $PackingListRelatedFieldPart6->{"heading_size_break_down_value_$i"} = $request->input("heading_size_break_down_value_$i");
                $PackingListRelatedFieldPart6->{"heading_carton_count_$i"} = $request->input("heading_carton_count_$i");
                $PackingListRelatedFieldPart6->{"heading_carton_count_value_$i"} = $request->input("heading_carton_count_value_$i");
                $PackingListRelatedFieldPart6->{"heading_carton_size_$i"} = $request->input("heading_carton_size_$i");
                $PackingListRelatedFieldPart6->{"heading_carton_size_value_$i"} = $request->input("heading_carton_size_value_$i");
            }
            $PackingListRelatedFieldPart6->save();

            $PackingListRelatedFieldPart7 =  PackingListRelatedFieldPart7::where('packing_list_id', $id)->first();
            $PackingListRelatedFieldPart7->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 35; $i++) {
                $PackingListRelatedFieldPart7->{"heading_bale_left_column_$i"} = $request->input("heading_bale_left_column_$i");
                $PackingListRelatedFieldPart7->{"heading_bale_left_column_value_$i"} = $request->input("heading_bale_left_column_value_$i");
                $PackingListRelatedFieldPart7->{"heading_net_weight_left_column_$i"} = $request->input("heading_net_weight_left_column_$i");
                $PackingListRelatedFieldPart7->{"heading_gross_weight_left_column_$i"} = $request->input("heading_gross_weight_left_column_$i");
                $PackingListRelatedFieldPart7->{"heading_net_weight_second_column_$i"} = $request->input("heading_net_weight_second_column_$i");
            }
            $PackingListRelatedFieldPart7->save();

            $PackingListRelatedFieldPart8 =  PackingListRelatedFieldPart8::where('packing_list_id', $id)->first();
            $PackingListRelatedFieldPart8->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 35; $i++) {
                $PackingListRelatedFieldPart8->{"heading_gross_weight_second_column_$i"} = $request->input("heading_gross_weight_second_column_$i");
                $PackingListRelatedFieldPart8->{"net_weight_second_column_value_$i"} = $request->input("net_weight_second_column_value_$i");
                $PackingListRelatedFieldPart8->{"gross_weight_second_column_value_$i"} = $request->input("gross_weight_second_column_value_$i");
                $PackingListRelatedFieldPart8->{"heading_quantity_unit_$i"} = $request->input("heading_quantity_unit_$i");
            }
            $PackingListRelatedFieldPart8->save();



            $PackingListRelatedValuePart1 =  PackingListRelatedValuePart1::where('packing_list_id', $id)->first();
            $PackingListRelatedValuePart1->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 350; $i++) {
                $PackingListRelatedValuePart1->{"color_name_second_column_value_$i"} = $request->input("color_name_second_column_value_$i");
            }
            $PackingListRelatedValuePart1->save();

            $PackingListRelatedValuePart2 =  PackingListRelatedValuePart2::where('packing_list_id', $id)->first();
            $PackingListRelatedValuePart2->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 350; $i++) {
                $PackingListRelatedValuePart2->{"sku_no_second_column_value_$i"} = $request->input("sku_no_second_column_value_$i");
            }
            $PackingListRelatedValuePart2->save();

            $PackingListRelatedValuePart3 =  PackingListRelatedValuePart3::where('packing_list_id', $id)->first();
            $PackingListRelatedValuePart3->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 350; $i++) {
                $PackingListRelatedValuePart3->{"ean_no_second_column_value_$i"} = $request->input("ean_no_second_column_value_$i");
            }
            $PackingListRelatedValuePart3->save();

            $PackingListRelatedValuePart4 =  PackingListRelatedValuePart4::where('packing_list_id', $id)->first();
            $PackingListRelatedValuePart4->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 350; $i++) {
                $PackingListRelatedValuePart4->{"sku_hash_no_second_column_value_$i"} = $request->input("sku_hash_no_second_column_value_$i");
            }
            $PackingListRelatedValuePart4->save();

            $PackingListRelatedValuePart5 =  PackingListRelatedValuePart5::where('packing_list_id', $id)->first();
            $PackingListRelatedValuePart5->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 350; $i++) {
                $PackingListRelatedValuePart5->{"style_no_second_column_value_$i"} = $request->input("style_no_second_column_value_$i");
            }
            $PackingListRelatedValuePart5->save();

            $PackingListRelatedValuePart6 =  PackingListRelatedValuePart6::where('packing_list_id', $id)->first();
            $PackingListRelatedValuePart6->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 350; $i++) {
                $PackingListRelatedValuePart6->{"quantity_third_column_value_$i"} = $request->input("quantity_third_column_value_$i");
            }
            $PackingListRelatedValuePart6->save();

            $PackingListRelatedValuePart7 =  PackingListRelatedValuePart7::where('packing_list_id', $id)->first();
            $PackingListRelatedValuePart7->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 350; $i++) {
                $PackingListRelatedValuePart7->{"price_third_column_value_$i"} = $request->input("price_third_column_value_$i");
            }
            $PackingListRelatedValuePart7->save();

            $PackingListRelatedValuePart8 =  PackingListRelatedValuePart8::where('packing_list_id', $id)->first();
            $PackingListRelatedValuePart8->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 350; $i++) {
                $PackingListRelatedValuePart8->{"currency_symbol_third_column_value_$i"} = $request->input("currency_symbol_third_column_value_$i");
            }
            $PackingListRelatedValuePart8->save();

            $PackingListRelatedValuePart9 =  PackingListRelatedValuePart9::where('packing_list_id', $id)->first();
            $PackingListRelatedValuePart9->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 350; $i++) {
                $PackingListRelatedValuePart9->{"total_amount_third_column_value_$i"} = $request->input("total_amount_third_column_value_$i");
            }
            $PackingListRelatedValuePart9->save();

            $PackingListRelatedValuePart10 =  PackingListRelatedValuePart10::where('packing_list_id', $id)->first();
            $PackingListRelatedValuePart10->packing_list_id = $PackingList->id;
            for ($i = 1; $i <= 350; $i++) {
                $PackingListRelatedValuePart10->{"quantity_unit_third_column_value_$i"} = $request->input("quantity_unit_third_column_value_$i");
            }
            $PackingListRelatedValuePart10->save();

            // Create CanadaInvoiceHistory record
            $PackingListHistory = new PackingListHistory();
            $PackingListHistory->packing_list_id = $PackingList->id;
            $PackingListHistory->editer_name = Auth::guard('admin')->user()->user_name;

            $PackingListHistory->edited_at = now();
            $PackingListHistory->save();

            // Return a success response
            return response()->json(['message' => 'All records submitted successfully!']);
        } catch (\Exception $e) {
            // Log the error
            Log::error($e);

            // Return an error response
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.', 'error' => $e->getMessage()], 500);
        }
    }


    function view_packing_list($id)
    {
        $data['title'] = "PACKING SLIP";
        $data['page'] = "PACKING SLIP";
        $data['pageIntro'] = "PACKING SLIP";
        // Fetch the main commercial invoice data
        $data['PackingList'] = PackingList::where('id', $id)->first()->toArray();
        $data['id'] =isset($id) ? $id : null;

        // Fetch the related field data and merge it with the existing array under the same key
        $data['PackingList'] = array_merge(
            $data['PackingList'],
            PackingListRelatedFieldPart1::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedFieldPart2::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedFieldPart3::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedFieldPart4::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedFieldPart5::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedFieldPart6::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedFieldPart7::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedFieldPart8::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedValuePart1::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedValuePart2::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedValuePart3::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedValuePart4::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedValuePart5::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedValuePart6::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedValuePart7::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedValuePart8::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedValuePart9::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedValuePart10::where('packing_list_id', $id)->first()->toArray() ?? [],
            PackingListRelatedValuePart11::where('packing_list_id', $id)->first()->toArray() ?? []
        );

        // Debug the fetched data
        // dd($data['PackingList']);




        if (!$data['PackingList']) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        return view('admin.report.packing-list.view', $data);
    }

    function activity_packing_list($id)
    {
        $data['title'] = "PACKING SLIP";
        $data['page'] = "PACKING SLIP";

        $data['pageIntro'] = "PACKING SLIP";
        $data['getAllPackingList'] = PackingListHistory::where('packing_list_id', $id)->get();

        if ($data['getAllPackingList']->isEmpty()) {
            return back()->with('error', 'No Form 59 A invoice history found for the provided ID.');
        }
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('admin.report.packing-list.activity', $data);

    }


    // clone commercial_invoice into packing list


    Private function clone_commercial_invoice_into_packing_list(Request $request)
    {
        try { 
        
            $PackingList = new PackingList(); 
            $PackingList->invioce_generator = rand(0000, 9999) . now(); 
            $PackingList->team_user_id = $request->input('team_user_id') ?? null; 
            $PackingList->heading_f_i_no = $request->input('heading_f_i_no') ?? null; 
            $PackingList->heading_shipper = $request->input('heading_shipper') ?? null; 
            $PackingList->heading_invioce = $request->input('heading_invioce') ?? null; 
            $PackingList->heading_vessel = $request->input('heading_vessel') ?? null; 
            $PackingList->heading_dated = $request->input('heading_dated') ?? null; 
            $PackingList->heading_total_pkg = $request->input('heading_total_pkg') ?? null; 
            $PackingList->heading_contract_no = $request->input('heading_contract_no') ?? null; 
            $PackingList->heading_contract_date = $request->input('heading_contract_date') ?? null; 
            $PackingList->heading_lc = $request->input('heading_lc') ?? null; 
            $PackingList->heading_issue_date_lc = $request->input('heading_issue_date_lc') ?? null; 
            $PackingList->heading_pyment_terms = $request->input('heading_pyment_terms') ?? null; 
            $PackingList->heading_drawn_at = $request->input('heading_drawn_at') ?? null; 
            $PackingList->heading_drawn_under = $request->input('heading_drawn_under') ?? null; 
            $PackingList->heading_part_of_loading = $request->input('heading_part_of_loading') ?? null; 
            $PackingList->heading_part_of_discharge = $request->input('heading_part_of_discharge') ?? null; 
            $PackingList->heading_container_no = $request->input('heading_container_no') ?? null; 
            $PackingList->heading_currency = $request->input('heading_currency') ?? null; 
            $PackingList->heading_term_of_delivery = $request->input('heading_term_of_delivery') ?? null; 
            $PackingList->heading_buyer = $request->input('heading_buyer') ?? null; 
            $PackingList->heading_ship_to = $request->input('heading_ship_to') ?? null; 
            $PackingList->heading_marks_no = $request->input('heading_marks_no') ?? null; 
            $PackingList->heading_discription_of_goods = $request->input('heading_discription_of_goods') ?? null; 
            $PackingList->heading_quantity = $request->input('heading_quantity') ?? null; 
            $PackingList->heading_prices = $request->input('heading_prices') ?? null; 
            $PackingList->heading_total_amount = $request->input('heading_total_amount') ?? null; 
            $PackingList->heading_long_sides = $request->input('heading_long_sides') ?? null; 
            $PackingList->heading_performa_invioce_no = $request->input('heading_performa_invioce_no') ?? null; 
            $PackingList->currency_symbol = $request->input('currency_symbol') ?? null; 
            $PackingList->heading_total_net_weight = $request->heading_total_net_weight ?? null; 
            $PackingList->heading_total_gr_weight = $request->heading_total_gr_weight ?? null; 
            $PackingList->heading_total_buyer_discount = $request->heading_total_buyer_discount ?? null; 
            $PackingList->heading_total_less_commission = $request->heading_total_less_commission ?? null; 
            $PackingList->heading_total_add_fright = $request->heading_total_add_fright ?? null; 
            $PackingList->heading_total_net_amount_payable = $request->heading_total_net_amount_payable ?? null; 
            $PackingList->heading_note = $request->heading_note ?? null; 
            $PackingList->heading_remarks = $request->heading_remarks ?? null; 
            $PackingList->heading_intermediary_bank = $request->heading_intermediary_bank ?? null; 
            $PackingList->heading_intermediary_bank_swift_no = $request->heading_intermediary_bank_swift_no ?? null; 
            $PackingList->heading_intermediary_bank_ac_no = $request->heading_intermediary_bank_ac_no ?? null; 
            $PackingList->heading_for_onword_credit_to = $request->heading_for_onword_credit_to ?? null; 
            $PackingList->heading_tw_ac_no = $request->heading_tw_ac_no ?? null; 
            $PackingList->heading_swift_no = $request->heading_swift_no ?? null; 
            $PackingList->heading_iban_no = $request->heading_iban_no ?? null; 
            $PackingList->heading_bank_addrss = $request->heading_bank_addrss ?? null; 
            $PackingList->heading_statement_origin = $request->heading_statement_origin ?? null; 
            $PackingList->value_f_i_no = $request->value_f_i_no ?? null; 
            $PackingList->name_shipper = $request->name_shipper ?? null; 
            $PackingList->address_shipper = $request->address_shipper ?? null; 
            $PackingList->city_shipper = $request->city_shipper ?? null; 
            $PackingList->country_shipper = $request->country_shipper ?? null; 
            $PackingList->phone_shipper = $request->phone_shipper ?? null; 
            $PackingList->name_buyer = $request->name_buyer ?? null; 
            $PackingList->address_buyer = $request->address_buyer ?? null; 
            $PackingList->city_buyer = $request->city_buyer ?? null; 
            $PackingList->country_buyer = $request->country_buyer ?? null; 
            $PackingList->phone_buyer = $request->phone_buyer ?? null; 
            $PackingList->name_ship_to = $request->name_ship_to ?? null; 
            $PackingList->address_ship_to = $request->address_ship_to ?? null; 
            $PackingList->city_ship_to = $request->city_ship_to ?? null; 
            $PackingList->country_ship_to = $request->country_ship_to ?? null; 
            $PackingList->phone_ship_to = $request->phone_ship_to ?? null; 
            $PackingList->performa_invioce_no_value = $request->performa_invioce_no_value ?? null; 
            $PackingList->vessel_value = $request->vessel_value ?? null; 
            $PackingList->dated = $request->dated ?? null; 
            $PackingList->total_pkg_value = $request->total_pkg_value ?? null; 
            $PackingList->contract_no_value = $request->contract_no_value ?? null; 
            $PackingList->contract_date_value = $request->contract_date_value ?? null; 
            $PackingList->lc_value = $request->lc_value ?? null; 
            $PackingList->lc_issue_date_value = $request->lc_issue_date_value ?? null; 
            $PackingList->pyment_terms_value = $request->pyment_terms_value ?? null; 
            $PackingList->drawn_at_value = $request->drawn_at_value ?? null; 
            $PackingList->drawn_under_value = $request->drawn_under_value ?? null; 
            $PackingList->port_of_loading_value = $request->port_of_loading_value ?? null; 
            $PackingList->port_of_discharge_value = $request->port_of_discharge_value ?? null; 
            $PackingList->container_no_value = $request->container_no_value ?? null; 
            $PackingList->currency_value = $request->currency_value ?? null; 
            $PackingList->term_of_delivery_value = $request->term_of_delivery_value ?? null; 
            $PackingList->total_net_weight_value = $request->total_net_weight_valu ?? null; 
            $PackingList->total_gr_weight_value = $request->total_gr_weight_valu ?? null; 
            $PackingList->note_value = $request->note_value ?? null; 
            $PackingList->value_remarks = $request->value_remarks ?? null; 
            $PackingList->value_intermediary_bank = $request->value_intermediary_bank ?? null; 
            $PackingList->value_intermediary_bank_swift_no = $request->value_intermediary_bank_swift_no ?? null; 
            $PackingList->value_intermediary_bank_ac_no = $request->value_intermediary_bank_ac_no ?? null; 
            $PackingList->value_for_onword_credit_to = $request->value_for_onword_credit_to ?? null; 
            $PackingList->value_tw_ac_no = $request->value_tw_ac_no ?? null; 
            $PackingList->value_swift_no = $request->value_swift_no ?? null; 
            $PackingList->value_iban_no = $request->value_iban_no ?? null; 
            $PackingList->value_bank_addrss = $request->value_bank_addrss ?? null; 
            $PackingList->value_bank_addrss_1 = $request->value_bank_addrss_1 ?? null; 
            $PackingList->value_bank_addrss_2 = $request->value_bank_addrss_2 ?? null; 
            $PackingList->value_statement_origin = $request->value_statement_origin ?? null; 
            $PackingList->value_total_buyer_discount = $request->value_total_buyer_discount ?? null; 
            $PackingList->value_total_less_commission = $request->value_total_less_commission ?? null; 
            $PackingList->value_total_add_fright = $request->value_total_add_fright ?? null; 
            $PackingList->value_total_net_amount_payable = $request->value_total_net_amount_payable ?? null; 
            $PackingList->value_currency_name = $request->value_currency_name ?? null; 
            $PackingList->status = 1; 
            $PackingList->packing_list_invoice = rand(0000, 9999).'-'.date('YmdHis'); 
            // $PackingList->fill($request->all()); 
            // Save the PackingList model 
            $PackingList->save(); 
            $PackingListRelatedFieldPart1 = new PackingListRelatedFieldPart1(); 
            $PackingListRelatedFieldPart1->packing_list_id = $PackingList->id; 
            $PackingListRelatedFieldPart1->heading_proforma_invioce = $request->heading_proforma_invioce ?? null; 
            $PackingListRelatedFieldPart1->value_proforma_invioce = $request->value_proforma_invioce ?? null; 
            for ($i = 1; $i <= 35; $i++) { 
            $PackingListRelatedFieldPart1->{"heading_long_side_$i"} = $request->input("heading_long_side_$i") ?? null; 
            $PackingListRelatedFieldPart1->{"heading_po_$i"} = $request->input("heading_po_$i") ?? null; 
            $PackingListRelatedFieldPart1->{"value_po_$i"} = $request->input("value_po_$i") ?? null; 
            $PackingListRelatedFieldPart1->{"heading_cotton_$i"} = $request->input("heading_cotton_$i") ?? null; 
            $PackingListRelatedFieldPart1->{"heading_seahorse_$i"} = $request->input("heading_seahorse_$i") ?? null; 
            } 
            $PackingListRelatedFieldPart1->save(); 
            $PackingListRelatedFieldPart2 = new PackingListRelatedFieldPart2(); 
            $PackingListRelatedFieldPart2->packing_list_id = $PackingList->id; 
            for ($i = 1; $i <= 35; $i++) { 
            $PackingListRelatedFieldPart2->{"heading_terry_$i"} = $request->input("heading_terry_$i") ?? null; 
            $PackingListRelatedFieldPart2->{"heading_carron_bales_pallets_$i"} = $request->input("heading_carron_bales_pallets_$i") ?? null; 
            $PackingListRelatedFieldPart2->{"carron_bales_pallets_value_$i"} = $request->input("carron_bales_pallets_value_$i") ?? null; 
            $PackingListRelatedFieldPart2->{"heading_pcs_pack_pallet_per_$i"} = $request->input("heading_pcs_pack_pallet_per_$i") ?? null; 
            $PackingListRelatedFieldPart2->{"pcs_pack_pallet_per_value_$i"} = $request->input("pcs_pack_pallet_per_value_$i") ?? null; 
            } 
            $PackingListRelatedFieldPart2->save(); 
            $PackingListRelatedFieldPart3 = new PackingListRelatedFieldPart3(); 
            $PackingListRelatedFieldPart3->packing_list_id = $PackingList->id; 
            for ($i = 1; $i <= 35; $i++) { 
            $PackingListRelatedFieldPart3->{"heading_color_$i"} = $request->input("heading_color_$i") ?? null; 
            $PackingListRelatedFieldPart3->{"heading_sku_no_$i"} = $request->input("heading_sku_no_$i") ?? null; 
            $PackingListRelatedFieldPart3->{"heading_ean_no_$i"} = $request->input("heading_ean_no_$i") ?? null; 
            $PackingListRelatedFieldPart3->{"heading_sku_hash_$i"} = $request->input("heading_sku_hash_$i") ?? null; 
            $PackingListRelatedFieldPart3->{"heading_style_$i"} = $request->input("heading_style_$i") ?? null; 
            } 
            $PackingListRelatedFieldPart3->save(); 
            $PackingListRelatedFieldPart4 = new PackingListRelatedFieldPart4(); 
            $PackingListRelatedFieldPart4->packing_list_id = $PackingList->id; 
            for ($i = 1; $i <= 35; $i++) { 
            $PackingListRelatedFieldPart4->{"heading_po_number_$i"} = $request->input("heading_po_number_$i") ?? null; 
            $PackingListRelatedFieldPart4->{"heading_po_number_value_$i"} = $request->input("heading_po_number_value_$i") ?? null; 
            $PackingListRelatedFieldPart4->{"heading_style_name_$i"} = $request->input("heading_style_name_$i") ?? null; 
            $PackingListRelatedFieldPart4->{"heading_style_name_value_$i"} = $request->input("heading_style_name_value_$i") ?? null; 
            } 
            $PackingListRelatedFieldPart4->save(); 
            $PackingListRelatedFieldPart5 = new PackingListRelatedFieldPart5(); 
            $PackingListRelatedFieldPart5->packing_list_id = $PackingList->id; 
            for ($i = 1; $i <= 35; $i++) { 
            $PackingListRelatedFieldPart5->{"heading_style_number_$i"} = $request->input("heading_style_number_$i") ?? null; 
            $PackingListRelatedFieldPart5->{"heading_style_number_value_$i"} = $request->input("heading_style_number_value_$i") ?? null; 
            $PackingListRelatedFieldPart5->{"heading_color_left_column_$i"} = $request->input("heading_color_left_column_$i") ?? null; 
            $PackingListRelatedFieldPart5->{"heading_color_left_column_value_$i"} = $request->input("heading_color_left_column_value_$i") ?? null; 
            $PackingListRelatedFieldPart5->{"heading_size_break_down_$i"} = $request->input("heading_size_break_down_$i") ?? null; 
            } 
            $PackingListRelatedFieldPart5->save(); 
            $PackingListRelatedFieldPart6 = new PackingListRelatedFieldPart6(); 
            $PackingListRelatedFieldPart6->packing_list_id = $PackingList->id; 
            for ($i = 1; $i <= 35; $i++) { 
            $PackingListRelatedFieldPart6->{"heading_size_break_down_value_$i"} = $request->input("heading_size_break_down_value_$i") ?? null; 
            $PackingListRelatedFieldPart6->{"heading_carton_count_$i"} = $request->input("heading_carton_count_$i") ?? null; 
            $PackingListRelatedFieldPart6->{"heading_carton_count_value_$i"} = $request->input("heading_carton_count_value_$i") ?? null; 
            $PackingListRelatedFieldPart6->{"heading_carton_size_$i"} = $request->input("heading_carton_size_$i") ?? null; 
            $PackingListRelatedFieldPart6->{"heading_carton_size_value_$i"} = $request->input("heading_carton_size_value_$i") ?? null; 
            } 
            $PackingListRelatedFieldPart6->save(); 
            $PackingListRelatedFieldPart7 = new PackingListRelatedFieldPart7(); 
            $PackingListRelatedFieldPart7->packing_list_id = $PackingList->id; 
            for ($i = 1; $i <= 35; $i++) { 
            $PackingListRelatedFieldPart7->{"heading_bale_left_column_$i"} = $request->input("heading_bale_left_column_$i") ?? null; 
            $PackingListRelatedFieldPart7->{"heading_bale_left_column_value_$i"} = $request->input("heading_bale_left_column_value_$i") ?? null; 
            $PackingListRelatedFieldPart7->{"heading_net_weight_left_column_$i"} = $request->input("heading_net_weight_left_column_$i") ?? null; 
            $PackingListRelatedFieldPart7->{"heading_gross_weight_left_column_$i"} = $request->input("heading_gross_weight_left_column_$i") ?? null; 
            $PackingListRelatedFieldPart7->{"heading_net_weight_second_column_$i"} = $request->input("heading_net_weight_second_column_$i") ?? null; 
            } 
            $PackingListRelatedFieldPart7->save(); 
            $PackingListRelatedFieldPart8 = new PackingListRelatedFieldPart8(); 
            $PackingListRelatedFieldPart8->packing_list_id = $PackingList->id; 
            for ($i = 1; $i <= 35; $i++) { 
            $PackingListRelatedFieldPart8->{"heading_gross_weight_second_column_$i"} = $request->input("heading_gross_weight_second_column_$i") ?? null; 
            $PackingListRelatedFieldPart8->{"net_weight_second_column_value_$i"} = $request->input("net_weight_second_column_value_$i") ?? null; 
            $PackingListRelatedFieldPart8->{"gross_weight_second_column_value_$i"} = $request->input("gross_weight_second_column_value_$i") ?? null; 
            $PackingListRelatedFieldPart8->{"heading_quantity_unit_$i"} = $request->input("heading_quantity_unit_$i") ?? null; 
            } 
            $PackingListRelatedFieldPart8->save(); 
            $PackingListRelatedValuePart1 = new PackingListRelatedValuePart1(); 
            $PackingListRelatedValuePart1->packing_list_id = $PackingList->id; 
            for ($i = 1; $i <= 350; $i++) { 
            $PackingListRelatedValuePart1->{"color_name_second_column_value_$i"} = $request->input("color_name_second_column_value_$i") ?? null; 
            } 
            $PackingListRelatedValuePart1->save(); 
            $PackingListRelatedValuePart2 = new PackingListRelatedValuePart2(); 
            $PackingListRelatedValuePart2->packing_list_id = $PackingList->id; 
            for ($i = 1; $i <= 350; $i++) { 
            $PackingListRelatedValuePart2->{"sku_no_second_column_value_$i"} = $request->input("sku_no_second_column_value_$i") ?? null; 
            } 
            $PackingListRelatedValuePart2->save(); 
            $PackingListRelatedValuePart3 = new PackingListRelatedValuePart3(); 
            $PackingListRelatedValuePart3->packing_list_id = $PackingList->id; 
            for ($i = 1; $i <= 350; $i++) { 
            $PackingListRelatedValuePart3->{"ean_no_second_column_value_$i"} = $request->input("ean_no_second_column_value_$i") ?? null; 
            } 
            $PackingListRelatedValuePart3->save(); 
            $PackingListRelatedValuePart4 = new PackingListRelatedValuePart4(); 
            $PackingListRelatedValuePart4->packing_list_id = $PackingList->id; 
            for ($i = 1; $i <= 350; $i++) { 
            $PackingListRelatedValuePart4->{"sku_hash_no_second_column_value_$i"} = $request->input("sku_hash_no_second_column_value_$i") ?? null; 
            } 
            $PackingListRelatedValuePart4->save(); 
            $PackingListRelatedValuePart5 = new PackingListRelatedValuePart5(); 
            $PackingListRelatedValuePart5->packing_list_id = $PackingList->id; 
            for ($i = 1; $i <= 350; $i++) { 
            $PackingListRelatedValuePart5->{"style_no_second_column_value_$i"} = $request->input("style_no_second_column_value_$i") ?? null; 
            } 
            $PackingListRelatedValuePart5->save(); 
            $PackingListRelatedValuePart6 = new PackingListRelatedValuePart6(); 
            $PackingListRelatedValuePart6->packing_list_id = $PackingList->id; 
            for ($i = 1; $i <= 350; $i++) { 
            $PackingListRelatedValuePart6->{"quantity_third_column_value_$i"} = $request->input("quantity_third_column_value_$i") ?? null; 
            } 
            $PackingListRelatedValuePart6->save(); 
            $PackingListRelatedValuePart7 = new PackingListRelatedValuePart7(); 
            $PackingListRelatedValuePart7->packing_list_id = $PackingList->id; 
            for ($i = 1; $i <= 350; $i++) { 
            $PackingListRelatedValuePart7->{"price_third_column_value_$i"} = $request->input("price_third_column_value_$i") ?? null; 
            } 
            $PackingListRelatedValuePart7->save(); 
            $PackingListRelatedValuePart8 = new PackingListRelatedValuePart8(); 
            $PackingListRelatedValuePart8->packing_list_id = $PackingList->id; 
            for ($i = 1; $i <= 350; $i++) { 
            $PackingListRelatedValuePart8->{"currency_symbol_third_column_value_$i"} = $request->input("currency_symbol_third_column_value_$i") ?? null; 
            } 
            $PackingListRelatedValuePart8->save(); 
            $PackingListRelatedValuePart9 = new PackingListRelatedValuePart9(); 
            $PackingListRelatedValuePart9->packing_list_id = $PackingList->id; 
            for ($i = 1; $i <= 350; $i++) { 
            $PackingListRelatedValuePart9->{"total_amount_third_column_value_$i"} = $request->input("total_amount_third_column_value_$i") ?? null; 
            } 
            $PackingListRelatedValuePart9->save(); 
            $PackingListRelatedValuePart10 = new PackingListRelatedValuePart10(); 
            $PackingListRelatedValuePart10->packing_list_id = $PackingList->id; 
            for ($i = 1; $i <= 350; $i++) { 
            $PackingListRelatedValuePart10->{"quantity_unit_third_column_value_$i"} = $request->input("quantity_unit_third_column_value_$i") ?? null; 
            } 
            $PackingListRelatedValuePart10->save(); 

            $PackingListRelatedValuePart11 = new PackingListRelatedValuePart11(); 
            $PackingListRelatedValuePart11->packing_list_id = $PackingList->id; 
            for ($i = 1; $i <= 350; $i++) { 
            $PackingListRelatedValuePart11->{"price_unit_third_column_value_$i"} = $request->input("price_unit_third_column_value_$i") ?? null; 
            } 
            
            $PackingListRelatedValuePart11->save(); 
            $PackingListHistory = new PackingListHistory(); 
            $PackingListHistory->packing_list_id = $PackingList->id; 
            $PackingListHistory->editer_name = Auth::guard('admin')->user()->user_name; 
            $PackingListHistory->edited_at = now(); 
            $PackingListHistory->save(); 
            return response()->json(['message' => 'All records submitted successfully!']); 
            } catch (\Exception $e) { 
            // Log the error 
            Log::error($e); 
            // Return an error response 
            return response()->json(['message' => 'An error occurred while submitting the records. Please try again.' . $e], 500); 
            }
            
        
        
    }
        

    //==================== packing_list end ======================//



    function packing_list_resubmit(Request $request)
    {


        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('formId');
            if ($id) {
                // If an ID is provided, update the existing record
                $Form59AInvoice = PackingList::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $Form59AInvoice = new PackingList();
                $Form59AInvoice->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $Form59AInvoice->status = 2;

            // Save the Form59AInvoice model
            $Form59AInvoice->save();



            // Create CanadaInvoiceHistory record
            $Form59AHistory = new PackingListHistory();
            $Form59AHistory->packing_list_id = $Form59AInvoice->id;
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
    function packing_list_completed(Request $request)
    {


        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('forCompetingFormId');
            if ($id) {
                // If an ID is provided, update the existing record
                $Form59AInvoice = PackingList::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $Form59AInvoice = new PackingList();
                $Form59AInvoice->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $Form59AInvoice->status = 3;

            // Save the Form59AInvoice model
            $Form59AInvoice->save();



            // Create CanadaInvoiceHistory record
            $Form59AHistory = new PackingListHistory();
            $Form59AHistory->packing_list_id = $Form59AInvoice->id;
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


    //  =========================== competed and resubmited ================================//



    function form_canada_invoice_resubmit(Request $request)
    {


        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('formId');
            if ($id) {
                // If an ID is provided, update the existing record
                $Form59AInvoice = CanadaCustomerInvoiceFrom::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $Form59AInvoice = new CanadaCustomerInvoiceFrom();
                $Form59AInvoice->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $Form59AInvoice->status = 2;

            // Save the Form59AInvoice model
            $Form59AInvoice->save();



            // Create CanadaInvoiceHistory record
            $Form59AHistory = new CanadaInvoiceHistory();
            $Form59AHistory->canada_customer_invoice_from_id = $Form59AInvoice->id;
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
    function form_canada_invoice_completed(Request $request)
    {


        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('forCompetingFormId');
            if ($id) {
                // If an ID is provided, update the existing record
                $Form59AInvoice = CanadaCustomerInvoiceFrom::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $Form59AInvoice = new CanadaCustomerInvoiceFrom();
                $Form59AInvoice->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $Form59AInvoice->status = 3;

            // Save the Form59AInvoice model
            $Form59AInvoice->save();



            // Create CanadaInvoiceHistory record
            $Form59AHistory = new CanadaInvoiceHistory();
            $Form59AHistory->canada_customer_invoice_from_id = $Form59AInvoice->id;
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

    function commercial_invoice_resubmit(Request $request)
    {


        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('formId');
            if ($id) {
                // If an ID is provided, update the existing record
                $Form59AInvoice = CommercialInvoice::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $Form59AInvoice = new CommercialInvoice();
                $Form59AInvoice->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $Form59AInvoice->status = 2;

            // Save the Form59AInvoice model
            $Form59AInvoice->save();



            // Create CanadaInvoiceHistory record
            $Form59AHistory = new CommercialInvoiceHistory();
            $Form59AHistory->commercial_invoice_id = $Form59AInvoice->id;
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
    function commercial_invoice_completed(Request $request)
    {


        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('forCompetingFormId');
            if ($id) {
                // If an ID is provided, update the existing record
                $Form59AInvoice = CommercialInvoice::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $Form59AInvoice = new CommercialInvoice();
                $Form59AInvoice->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $Form59AInvoice->status = 3;

            // Save the Form59AInvoice model
            $Form59AInvoice->save();



            // Create CanadaInvoiceHistory record
            $Form59AHistory = new CommercialInvoiceHistory();
            $Form59AHistory->commercial_invoice_id = $Form59AInvoice->id;
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

    function form_59_invoice_resubmit(Request $request)
    {


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
    function form_59_invoice_completed(Request $request)
    {


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

    function form_exporter_textile_invoice_resubmit(Request $request)
    {


        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('formId');
            if ($id) {
                // If an ID is provided, update the existing record
                $Form59AInvoice = ExporterTextileDeclearation::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $Form59AInvoice = new ExporterTextileDeclearation();
                $Form59AInvoice->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $Form59AInvoice->status = 2;

            // Save the Form59AInvoice model
            $Form59AInvoice->save();



            // Create CanadaInvoiceHistory record
            $Form59AHistory = new ExporterTextileDeclearationHistory();
            $Form59AHistory->exporter_textile_declearation_id = $Form59AInvoice->id;
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
    function form_exporter_textile_invoice_completed(Request $request)
    {


        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('forCompetingFormId');
            if ($id) {
                // If an ID is provided, update the existing record
                $Form59AInvoice = ExporterTextileDeclearation::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $Form59AInvoice = new ExporterTextileDeclearation();
                $Form59AInvoice->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $Form59AInvoice->status = 3;

            // Save the Form59AInvoice model
            $Form59AInvoice->save();



            // Create CanadaInvoiceHistory record
            $Form59AHistory = new ExporterTextileDeclearationHistory();
            $Form59AHistory->exporter_textile_declearation_id = $Form59AInvoice->id;
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

    function form_certificate_origin_invoice_resubmit(Request $request)
    {


        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('formId');
            if ($id) {
                // If an ID is provided, update the existing record
                $Form59AInvoice = CertificateOrigin::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $Form59AInvoice = new CertificateOrigin();
                $Form59AInvoice->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $Form59AInvoice->status = 2;

            // Save the Form59AInvoice model
            $Form59AInvoice->save();



            // Create CanadaInvoiceHistory record
            $Form59AHistory = new CertificateOriginHistory();
            $Form59AHistory->certificate_origin_id = $Form59AInvoice->id;
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
    function form_certificate_origin_invoice_completed(Request $request)
    {


        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('forCompetingFormId');
            if ($id) {
                // If an ID is provided, update the existing record
                $Form59AInvoice = CertificateOrigin::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $Form59AInvoice = new CertificateOrigin();
                $Form59AInvoice->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $Form59AInvoice->status = 3;

            // Save the Form59AInvoice model
            $Form59AInvoice->save();



            // Create CanadaInvoiceHistory record
            $Form59AHistory = new CertificateOriginHistory();
            $Form59AHistory->certificate_origin_id = $Form59AInvoice->id;
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

    function form_certificate_origin_no627120_invoice_resubmit(Request $request)
    {


        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('formId');
            if ($id) {
                // If an ID is provided, update the existing record
                $Form59AInvoice = CertificateOriginNo627120::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $Form59AInvoice = new CertificateOriginNo627120();
                $Form59AInvoice->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $Form59AInvoice->status = 2;

            // Save the Form59AInvoice model
            $Form59AInvoice->save();



            // Create CanadaInvoiceHistory record
            $Form59AHistory = new CertificateOriginNo627120History();
            $Form59AHistory->certificate_origin_no627120_id = $Form59AInvoice->id;
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
    function form_certificate_origin_no627120_invoice_completed(Request $request)
    {


        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('forCompetingFormId');
            if ($id) {
                // If an ID is provided, update the existing record
                $Form59AInvoice = CertificateOriginNo627120::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $Form59AInvoice = new CertificateOriginNo627120();
                $Form59AInvoice->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $Form59AInvoice->status = 3;

            // Save the Form59AInvoice model
            $Form59AInvoice->save();



            // Create CanadaInvoiceHistory record
            $Form59AHistory = new CertificateOriginNo627120History();
            $Form59AHistory->certificate_origin_no627120_id = $Form59AInvoice->id;
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

    function form_certificate_origin_com_dec_invoice_resubmit(Request $request)
    {


        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('formId');
            if ($id) {
                // If an ID is provided, update the existing record
                $Form59AInvoice = CertificateOriginComDec::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $Form59AInvoice = new CertificateOriginComDec();
                $Form59AInvoice->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $Form59AInvoice->status = 2;

            // Save the Form59AInvoice model
            $Form59AInvoice->save();



            // Create CanadaInvoiceHistory record
            $Form59AHistory = new CertificateOriginComDecHistory();
            $Form59AHistory->certificate_origin_com_dec_id = $Form59AInvoice->id;
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
    function form_certificate_origin_com_dec_invoice_completed(Request $request)
    {


        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('forCompetingFormId');
            if ($id) {
                // If an ID is provided, update the existing record
                $Form59AInvoice = CertificateOriginComDec::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $Form59AInvoice = new CertificateOriginComDec();
                $Form59AInvoice->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $Form59AInvoice->status = 3;

            // Save the Form59AInvoice model
            $Form59AInvoice->save();



            // Create CanadaInvoiceHistory record
            $Form59AHistory = new CertificateOriginComDecHistory();
            $Form59AHistory->certificate_origin_com_dec_id = $Form59AInvoice->id;
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
    function form_certificate_origin_com_dec_form_ip_invoice_resubmit(Request $request)
    {


        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('formId');
            if ($id) {
                // If an ID is provided, update the existing record
                $Form59AInvoice = CertificateOriginComDecFormIp::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $Form59AInvoice = new CertificateOriginComDecFormIp();
                $Form59AInvoice->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $Form59AInvoice->status = 2;

            // Save the Form59AInvoice model
            $Form59AInvoice->save();



            // Create CanadaInvoiceHistory record
            $Form59AHistory = new CertificateOriginComDecFormIpHistory();
            $Form59AHistory->certificate_origin_com_dec_form_ip_id = $Form59AInvoice->id;
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
    function form_certificate_origin_com_dec_form_ip_invoice_completed(Request $request)
    {


        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('forCompetingFormId');
            if ($id) {
                // If an ID is provided, update the existing record
                $Form59AInvoice = CertificateOriginComDecFormIp::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $Form59AInvoice = new CertificateOriginComDecFormIp();
                $Form59AInvoice->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $Form59AInvoice->status = 3;

            // Save the Form59AInvoice model
            $Form59AInvoice->save();



            // Create CanadaInvoiceHistory record
            $Form59AHistory = new CertificateOriginComDecFormIpHistory();
            $Form59AHistory->certificate_origin_com_dec_form_ip_id = $Form59AInvoice->id;
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

    function form_certificate_origin_chaina_invoice_resubmit(Request $request)
    {


        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('formId');
            if ($id) {
                // If an ID is provided, update the existing record
                $Form59AInvoice = CertificateOriginChaina::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $Form59AInvoice = new CertificateOriginChaina();
                $Form59AInvoice->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $Form59AInvoice->status = 2;

            // Save the Form59AInvoice model
            $Form59AInvoice->save();



            // Create CanadaInvoiceHistory record
            $Form59AHistory = new CertificateOriginChainaHistory();
            $Form59AHistory->certificate_origin_chaina_invoice_id = $Form59AInvoice->id;
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
    function form_certificate_origin_chaina_invoice_completed(Request $request)
    {


        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('forCompetingFormId');
            if ($id) {
                // If an ID is provided, update the existing record
                $Form59AInvoice = CertificateOriginChaina::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $Form59AInvoice = new CertificateOriginChaina();
                $Form59AInvoice->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $Form59AInvoice->status = 3;

            // Save the Form59AInvoice model
            $Form59AInvoice->save();



            // Create CanadaInvoiceHistory record
            $Form59AHistory = new CertificateOriginChainaHistory();
            $Form59AHistory->certificate_origin_chaina_invoice_id = $Form59AInvoice->id;
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
    function form_certificate_origin_com_dec_form_a_invoice_resubmit(Request $request)
    {


        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('formId');
            if ($id) {
                // If an ID is provided, update the existing record
                $Form59AInvoice = CertificateOriginComDecFormA::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $Form59AInvoice = new CertificateOriginComDecFormA();
                $Form59AInvoice->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $Form59AInvoice->status = 2;

            // Save the Form59AInvoice model
            $Form59AInvoice->save();



            // Create CanadaInvoiceHistory record
            $Form59AHistory = new CertificateOriginComDecFormAHistory();
            $Form59AHistory->certificate_origin_com_dec_form_a_id = $Form59AInvoice->id;
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


    function form_certificate_origin_com_dec_form_a_invoice_completed(Request $request)
    {


        try {
            // Validate the incoming request if necessary
            // $request->validate([...]);

            // Check if an ID is provided in the request
            $id = $request->input('forCompetingFormId');
            if ($id) {
                // If an ID is provided, update the existing record
                $Form59AInvoice = CertificateOriginComDecFormA::findOrFail($id);
            } else {
                // If no ID is provided, create a new record
                $Form59AInvoice = new CertificateOriginComDecFormA();
                $Form59AInvoice->invioce_generator = rand(0000, 9999) . now();
            }

            // Assign values from the request to the CanadaCustomerInvoiceFrom model
            $Form59AInvoice->status = 3;

            // Save the Form59AInvoice model
            $Form59AInvoice->save();



            // Create CanadaInvoiceHistory record
            $Form59AHistory = new CertificateOriginComDecFormAHistory();
            $Form59AHistory->certificate_origin_com_dec_form_a_id = $Form59AInvoice->id;
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

    public function firm_file_view($id)
    {

        $id = base64_decode($id);
        $License = CommercialInvoice::find($id);

        if (!$License) {
            abort(404);
        }


        $fileName = $License->{"pdf_upload_file_ic"};

        if (!$fileName) {
            abort(404);
        }

        $filePath = public_path('admin/assets/imgs/comMERCIALInvoice/'  . $fileName);

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


    function commercial_invoice_by_pdf($id)
    {
        $id = (int)base64_decode($id);




        $models = [
            'CanadaCustomerInvoiceFrom' => CanadaCustomerInvoiceFrom::class,
            'CertificateOrigin' => CertificateOrigin::class,
            'CertificateOriginComDec' => CertificateOriginComDec::class,
            'CertificateOriginComDecFormA' => CertificateOriginComDecFormA::class,
            'CertificateOriginComDecFormIp' => CertificateOriginComDecFormIp::class,
            'CertificateOriginNo627120' => CertificateOriginNo627120::class,
            'ExporterTextileDeclearation' => ExporterTextileDeclearation::class,
            'Form59AInvoice' => Form59AInvoice::class,
            'CertificateOriginChaina' => CertificateOriginChaina::class,

        ];

        $results = [];
        $notFoundTables = [];

        foreach ($models as $tableName => $modelClass) {
            try {
                $result = $modelClass::where('commercial_invoice_id', $id)->first(['id', 'table_name', 'created_at']);
                if (!$result) {
                    $notFoundTables[] = $tableName;
                } else {
                    $results[] = [
                        'table_name' => $result->table_name,
                        'id' => $result->id,
                        'created_at' => $result->created_at
                    ];
                }
            } catch (\Exception $e) {
                // Log the exception if needed
                Log::error("Error querying $modelClass: " . $e->getMessage());
                $notFoundTables[] = $tableName;
            }
        }

        if (empty($results)) {
            abort(404, 'No records found for the given commercial invoice ID.');
        }

        $data = [
            'results' => $results,
            'title' => "Related Invoice",
            'page' => "Dashboard",
            'pageIntro' => 'Related Invoice',
            'pageDescription' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."

        ];

        // dd($data);
        return view('admin.report.commercial-invoice.related-pdf', $data);
    }
}
