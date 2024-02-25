<?php

use Illuminate\Support\Facades\Route;
use App\Mail\sendMail;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});


//start


    Route::namespace('web')->group(function(){
        Route::get('test', 'webController@test')->name('web.test');
        Route::get('logout', 'webController@logout')->name('web.logout');
        Route::post('login-submit', 'webController@loginSubmitclient')->name('web.login_Submit_client');
        Route::get('/', 'webController@index')->name('web.login');
    });


// //Client or company Dashboard Dashboard
    Route::prefix('company')->namespace('user')->middleware('userAuth')->group(function(){

        Route::get('/', 'userController@index')->name('company.dashboard');
        Route::post('/sendEmailForRequestThirdParty', 'userController@sendEmailForRequestThirdParty')->name('company.sendEmailForRequestThirdParty');



        Route::prefix('report')->group(function(){
            Route::get('/', 'userController@report_List')->name('company.report_List');
            Route::get('/view/{id}', 'userController@viewReportsData')->name('company.viewReportsData');
            Route::get('/firm_file_download/{id}/{index}', 'userController@firm_file_download')->name('company.firm_file_download');
            Route::get('/firm_file_view/{id}/{index}', 'userController@firm_file_view')->name('company.firm_file_view');
            Route::get('/onGround_file_download/{id}', 'userController@onGround_file_download')->name('company.onGround_file_download');
            Route::get('/document_file_download/{id}/{index}', 'userController@document_file_download')->name('company.document_file_download');
            Route::get('/document_file_view/{id}/{index}', 'userController@document_file_view')->name('company.document_file_view');

            Route::get('/onGround_file_view/{id}', 'userController@onGround_file_view')->name('company.onGround_file_view');


            Route::get('/final_Reprts_file_download/{id}', 'userController@final_Reprts_file_download')->name('company.final_Reprts_file_download');
            Route::get('/generate_pdf_of_reports/{id}', 'userController@generate_pdf_of_reports')->name('company.generate_pdf_of_reports');



        });

        Route::get('/profile-setting', 'userController@profileSetting')->name('company.profileSetting');
        Route::post('/profile-setting-submit', 'userController@profileSettingSubmit')->name('company.profileSettingSubmit');



    });


    //Team Dashboard
    Route::prefix('panel-team')->namespace('team')->group(function(){


        Route::get('/', 'teamController@login')->name('team.login');


        Route::post('/login', 'teamController@loginSubmit')->name('team.loginSubmit');
        Route::get('/logout', 'teamController@logout')->name('team.logout');



        Route::middleware('teamAuth')->group(function(){

            Route::get('/dashboard', 'teamController@index')->name('team.index');
            Route::prefix('report')->group(function(){
                Route::get('/', 'teamController@report_List')->name('team.report_List');
                Route::get('/view', 'teamController@report_View')->name('team.report_View');
                Route::get('/edit/{id}', 'teamController@add_report')->name('team.add_report');

                Route::post('/update_firm_background', 'teamController@update_firm_background')->name('team.update_firm_background');
                Route::post('/update_documents', 'teamController@update_documents')->name('team.update_documents');
                Route::post('/update_on_ground_verification', 'teamController@update_on_ground_verification')->name('team.update_on_ground_verification');
                Route::post('/update_court_check', 'teamController@update_court_check')->name('team.update_court_check');
                Route::post('/update_financial', 'teamController@update_financial')->name('team.update_financial');
                Route::post('/update_Business_Intelligence', 'teamController@update_Business_Intelligence')->name('team.update_Business_Intelligence');
                Route::post('/update_Tax_Return_and_Credit', 'teamController@update_Tax_Return_and_Credit')->name('team.update_Tax_Return_and_Credit');
                Route::post('/update_Market_Reputation', 'teamController@update_Market_Reputation')->name('team.update_Market_Reputation');
                Route::post('/update_Key_Observation', 'teamController@update_Key_Observation')->name('team.update_Key_Observation');

            });
            Route::prefix('third-party')->group(function(){
                Route::get('/', 'teamController@vender_List')->name('team.vender_List');

            });

        });

    });
//Admin Dashboard
    Route::prefix('panel')->namespace('admin')->group(function(){

        Route::get('/', 'authController@index')->name('admin.dashboard');
        Route::get('/login', 'authController@login')->name('admin.login');
        Route::post('/login', 'authController@loginSubmit')->name('admin.loginSubmit');

        Route::get('/logout', 'authController@logout')->name('admin.logout');

        Route::middleware('adminAuth')->group(function(){

            Route::get('/dashboard', 'adminController@index')->name('admin.index');
            // Route::get('/attention-required', 'adminController@attentionRequired')->name('admin.attentionRequired');
            // Route::get('/report-page', 'adminController@reportPage')->name('admin.reportPage');
            Route::prefix('client')->group(function(){
                Route::get('/', 'adminController@companyList')->name('admin.companyList');
                Route::post('/add', 'userController@addClient')->name('admin.addClient');
                Route::post('/update_company', 'adminController@update_company')->name('admin.update_company');
                Route::get('/edit/{id}', 'adminController@Edit_company')->name('admin.Edit_company');


            });

            Route::prefix('team')->group(function(){
                Route::get('/', 'adminController@team_List')->name('admin.team_List');
                Route::post('/add', 'userController@addTeamMember')->name('admin.addTeamMember');
                Route::get('/edit/{id}', 'adminController@Edit_team')->name('admin.Edit_team');
                Route::post('/update_team', 'adminController@update_team')->name('admin.update_team');



            });
            Route::prefix('third-party')->group(function(){
                Route::get('/', 'adminController@vender_List')->name('admin.vender_List');
                Route::post('/add', 'userController@addThirdParty')->name('admin.addThirdParty');
                Route::post('/update_vender', 'adminController@update_vender')->name('admin.update_vender');
                Route::get('/edit/{id}', 'adminController@Edit_vender')->name('admin.Edit_vender');

            });

            Route::prefix('report')->group(function(){
                Route::get('/', 'adminController@report_List')->name('admin.report_List');
                Route::get('/generate-pdf/{count}', 'adminController@generatePDF');
                Route::get('/add_report_form_1', 'adminController@add_report_form_1')->name('admin.add_report_form_1');
                Route::get('/edit_report_form_1', 'adminController@edit_report_form_1')->name('admin.edit_report_form_1');
                Route::get('/view_report_form_1', 'adminController@view_report_form_1')->name('admin.view_report_form_1');
                Route::get('/activity_report_form_1', 'adminController@activity_report_form_1')->name('admin.activity_report_form_1');
// =========================================
                Route::get('/view/{id}', 'adminController@report_View')->name('admin.report_View');
                Route::get('/edit/{id}', 'adminController@Edit_report')->name('admin.Edit_report');
                Route::post('/update_firm_background', 'adminController@update_firm_background')->name('admin.update_firm_background');
                Route::post('/update_documents', 'adminController@update_documents')->name('admin.update_documents');
                Route::post('/update_on_ground_verification', 'adminController@update_on_ground_verification')->name('admin.update_on_ground_verification');
                Route::post('/update_court_check', 'adminController@update_court_check')->name('admin.update_court_check');
                Route::post('/update_financial', 'adminController@update_financial')->name('admin.update_financial');
                Route::post('/update_Business_Intelligence', 'adminController@update_Business_Intelligence')->name('admin.update_Business_Intelligence');
                Route::post('/update_Tax_Return_and_Credit', 'adminController@update_Tax_Return_and_Credit')->name('admin.update_Tax_Return_and_Credit');
                Route::post('/update_Market_Reputation', 'adminController@update_Market_Reputation')->name('admin.update_Market_Reputation');
                Route::post('/update_Key_Observation', 'adminController@update_Key_Observation')->name('admin.update_Key_Observation');
                Route::post('/update_resubmited_allreports', 'adminController@update_resubmited_allreports')->name('admin.update_resubmited_allreports');
                Route::post('/update_completed_allreports', 'adminController@update_completed_allreports')->name('admin.update_completed_allreports');
                Route::get('/firm_file_download/{id}/{index}', 'adminController@firm_file_download')->name('admin.firm_file_download');
                Route::get('/firm_file_view/{id}/{index}', 'adminController@firm_file_view')->name('admin.firm_file_view');
                Route::get('/document_file_download/{id}/{index}', 'adminController@document_file_download')->name('admin.document_file_download');
                Route::get('/document_file_view/{id}/{index}', 'adminController@document_file_view')->name('admin.document_file_view');
                Route::get('/onGround_file_download/{id}', 'adminController@onGround_file_download')->name('admin.onGround_file_download');
                Route::get('/onGround_file_view/{id}', 'adminController@onGround_file_view')->name('admin.onGround_file_view');
                Route::get('/final_Reprts_file_download/{id}', 'adminController@final_Reprts_file_download')->name('admin.final_Reprts_file_download');
                Route::get('/generate_pdf_of_reports/{id}', 'adminController@generate_pdf_of_reports')->name('admin.generate_pdf_of_reports');












            });



        });

    });

