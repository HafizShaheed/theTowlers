<?php

namespace App\Http\Controllers\team;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use Illuminate\Support\Facades\Hash;
use DB;
use Mail;
use Carbon\Carbon;


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



    // report started =============================
    function report_List(Request $request)
    {
        // dd($request->all());
        $data['title'] = "Reports Management";
        $data['page'] = "Reports Management";
        $data['pageIntro'] = "Reports List";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";
        return view('team.report.report-form-1.index', $data);
    }

    function add_report_form_1(){
        $data['title'] = "Reports Management";
        $data['page'] = "Reports Management";
        $data['pageIntro'] = "Reports Add";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('team.report.report-form-1.add', $data);
    }

    function edit_report_form_1(){
        $data['title'] = "Reports Management";
        $data['page'] = "Reports Management";
        $data['pageIntro'] = "Reports Edit";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('team.report.report-form-1.edit', $data);
    }


    function view_report_form_1(){
        $data['title'] = "Reports Management";
        $data['page'] = "Reports Management";
        $data['pageIntro'] = "Reports View";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('team.report.report-form-1.view', $data);
    }

    function activity_report_form_1(){
        $data['title'] = "Reports Management";
        $data['page'] = "Reports Management";
        $data['pageIntro'] = "Reports Activity*";
        $data['pageDescription'] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.";

        return view('team.report.report-form-1.activity', $data);
    }
    // report ended =============================



    public function generatePDF($count)
    {
        $data = ['title' => 'Hello, this is your PDF title'];

        $pdf = PDF::loadView('team.report.report-form-1.pdf.'.$count.'my_pdf', $data);

        return $pdf->stream('document.pdf');
    }


    function logout(){
        Auth::guard('team')->logout();

        return redirect(route('team.login'));
    }
}
