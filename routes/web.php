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
                Route::get('/generate-pdf/{count}', 'teamController@generatePDF');
                Route::get('/custom_canda_invoice', 'teamController@custom_canda_invoice')->name('team.custom_canda_invoice');
                Route::get('/edit_report_form_1', 'teamController@edit_report_form_1')->name('team.edit_report_form_1');
                Route::get('/view_report_form_1', 'teamController@view_report_form_1')->name('team.view_report_form_1');
                Route::get('/activity_report_form_1', 'teamController@activity_report_form_1')->name('team.activity_report_form_1');
// =========================================
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

                Route::get('/generate-pdf/{count}', 'adminController@generatePDF');
                Route::prefix('canda-costom_invoice')->group(function(){

                Route::get('/', 'adminController@report_List_custom_canda_invoice')->name('admin.report_List_custom_canda_invoice');
                Route::get('/generate_custom_canda_invoic_PDF/{id}', 'adminController@generate_custom_canda_invoic_PDF')->name('admin.generate_custom_canda_invoic_PDF');;

                Route::get('/add', 'adminController@add_custom_canda_invoice')->name('admin.add_custom_canda_invoice');
                Route::post('/submit_custom_canda_invoice', 'adminController@submit_custom_canda_invoice')->name('admin.submit_custom_canda_invoice');
                Route::get('/edit/{id}', 'adminController@edit_custom_canda_invoice')->name('admin.edit_custom_canda_invoice');
                Route::post('/update_submit_custom_canda_invoice', 'adminController@update_submit_custom_canda_invoice')->name('admin.update_submit_custom_canda_invoice');

                Route::get('/view', 'adminController@view_custom_canda_invoice')->name('admin.view_custom_canda_invoice');
                Route::get('/activity/{id}', 'adminController@activity_custom_canda_invoice')->name('admin.activity_custom_canda_invoice');
            });
                    // =======================================

            });



        });

    });
