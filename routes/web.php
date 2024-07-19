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


Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});


//start


Route::namespace('web')->group(function () {
    Route::get('test', 'webController@test')->name('web.test');
    Route::get('logout', 'webController@logout')->name('web.logout');
    Route::post('login-submit', 'webController@loginSubmitclient')->name('web.login_Submit_client');
    Route::get('/', 'webController@index')->name('web.login');
});


// //Client or company Dashboard Dashboard
Route::prefix('company')->namespace('user')->middleware('userAuth')->group(function () {

    Route::get('/', 'userController@index')->name('company.dashboard');
    Route::post('/sendEmailForRequestThirdParty', 'userController@sendEmailForRequestThirdParty')->name('company.sendEmailForRequestThirdParty');



    Route::prefix('report')->group(function () {
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
Route::prefix('panel-team')->namespace('team')->group(function () {


    Route::get('/', 'teamController@login')->name('team.login');


    Route::post('/login', 'teamController@loginSubmit')->name('team.loginSubmit');
    Route::get('/logout', 'teamController@logout')->name('team.logout');



    Route::middleware('teamAuth')->group(function () {

        Route::get('/dashboard', 'teamController@index')->name('team.index');
        Route::prefix('report')->group(function () {

            Route::get('/generate-pdf/{count}', 'teamController@generatePDF');
            Route::prefix('canda-costom_invoice')->group(function () {

                Route::get('/', 'teamController@report_List_custom_canda_invoice')->name('team.report_List_custom_canda_invoice');
                Route::get('/generate_custom_canda_invoic_PDF/{id}', 'teamController@generate_custom_canda_invoic_PDF')->name('team.generate_custom_canda_invoic_PDF');

                Route::get('/add', 'teamController@add_custom_canda_invoice')->name('team.add_custom_canda_invoice');
                Route::post('/submit_custom_canda_invoice', 'teamController@submit_custom_canda_invoice')->name('team.submit_custom_canda_invoice');
                Route::get('/edit/{id}', 'teamController@edit_custom_canda_invoice')->name('team.edit_custom_canda_invoice');
                Route::post('/update_submit_custom_canda_invoice', 'teamController@update_submit_custom_canda_invoice')->name('team.update_submit_custom_canda_invoice');

                Route::get('/view/{id}', 'teamController@view_custom_canda_invoice')->name('team.view_custom_canda_invoice');
                Route::get('/activity/{id}', 'teamController@activity_custom_canda_invoice')->name('team.activity_custom_canda_invoice');
                Route::post('/form_canada_invoice_resubmit', 'teamController@form_canada_invoice_resubmit')->name('team.form_canada_invoice_resubmit');
                Route::post('/form_canada_invoice_completed', 'teamController@form_canada_invoice_completed')->name('team.form_canada_invoice_completed');
            });

            Route::prefix('commercial-invoice')->group(function () {

                Route::get('/', 'teamController@report_List_commercial_invoice')->name('team.report_List_commercial_invoice');
                Route::get('/generate_commercial_invoice_PDF/{id}', 'teamController@generate_commercial_invoice_PDF')->name('team.generate_commercial_invoice_PDF');
                Route::post('/commercial_invoice_resubmit', 'teamController@commercial_invoice_resubmit')->name('team.commercial_invoice_resubmit');
                Route::post('/commercial_invoice_completed', 'teamController@commercial_invoice_completed')->name('team.commercial_invoice_completed');

                Route::get('/add', 'teamController@add_commercial_invoice')->name('team.add_commercial_invoice');
                Route::post('/submit_commercial_invoice', 'teamController@submit_commercial_invoice')->name('team.submit_commercial_invoice');
                Route::get('/edit/{id}', 'teamController@edit_commercial_invoice')->name('team.edit_commercial_invoice');
                Route::post('/update_submit_commercial_invoice', 'teamController@update_submit_commercial_invoice')->name('team.update_submit_commercial_invoice');

                Route::get('/view/{id}', 'teamController@view_commercial_invoice')->name('team.view_commercial_invoice');
                Route::get('/activity/{id}', 'teamController@activity_commercial_invoice')->name('team.activity_commercial_invoice');
                Route::get('/pdf_file_view/{id}', 'teamController@firm_file_view')->name('team.firm_file_view');
                Route::get('/commercial_invoice_by_pdf/{id}', 'teamController@commercial_invoice_by_pdf')->name('team.commercial_invoice_by_pdf');
            });

            Route::prefix('packing-list')->group(function () {

                Route::get('/', 'teamController@report_List_packing_list')->name('team.report_List_packing_list');
                Route::get('/generate_packing_list_PDF/{id}', 'teamController@generate_packing_list_PDF')->name('team.generate_packing_list_PDF');
                Route::post('/packing_list_resubmit', 'teamController@packing_list_resubmit')->name('team.packing_list_resubmit');
                Route::post('/packing_list_completed', 'teamController@packing_list_completed')->name('team.packing_list_completed');
                
                Route::get('/add', 'teamController@add_packing_list')->name('team.add_packing_list');
                Route::post('/submit_packing_list', 'teamController@submit_packing_list')->name('team.submit_packing_list');
                Route::get('/edit/{id}', 'teamController@edit_packing_list')->name('team.edit_packing_list');
                Route::post('/update_submit_packing_list', 'teamController@update_submit_packing_list')->name('team.update_submit_packing_list');
                
                Route::get('/view/{id}', 'teamController@view_packing_list')->name('team.view_packing_list');
                Route::get('/activity/{id}', 'teamController@activity_packing_list')->name('team.activity_packing_list');
                
            });

            Route::prefix('form-59-a-invoice')->group(function () {

                Route::get('/', 'teamController@report_List_form_59_a_invoice')->name('team.report_List_form_59_a_invoice');
                Route::get('/generate_form_59_a_invoic_PDF/{id}', 'teamController@generate_form_59_a_invoic_PDF')->name('team.generate_form_59_a_invoic_PDF');
                Route::post('/form_59_invoice_resubmit', 'teamController@form_59_invoice_resubmit')->name('team.form_59_invoice_resubmit');
                Route::post('/form_59_invoice_completed', 'teamController@form_59_invoice_completed')->name('team.form_59_invoice_completed');

                Route::get('/add', 'teamController@add_form_59_a_invoice')->name('team.add_form_59_a_invoice');
                Route::post('/submit_form_59_a_invoice', 'teamController@submit_form_59_a_invoice')->name('team.submit_form_59_a_invoice');
                Route::get('/edit/{id}', 'teamController@edit_form_59_a_invoice')->name('team.edit_form_59_a_invoice');
                Route::post('/update_submit_form_59_a_invoice', 'teamController@update_submit_form_59_a_invoice')->name('team.update_submit_form_59_a_invoice');

                Route::get('/view/{id}', 'teamController@view_form_59_a_invoice')->name('team.view_form_59_a_invoice');
                Route::get('/activity/{id}', 'teamController@activity_form_59_a_invoice')->name('team.activity_form_59_a_invoice');
            });


            Route::prefix('exporter-textile-declearation')->group(function () {

                Route::get('/', 'teamController@report_List_exporter_textile_declearation_invoice')->name('team.report_List_exporter_textile_declearation_invoice');
                Route::get('/generate_exporter_textile_declearation_invoic_PDF/{id}', 'teamController@generate_exporter_textile_declearation_invoic_PDF')->name('team.generate_exporter_textile_declearation_invoic_PDF');

                Route::post('/form_exporter_textile_invoice_resubmit', 'teamController@form_exporter_textile_invoice_resubmit')->name('team.form_exporter_textile_invoice_resubmit');
                Route::post('/form_exporter_textile_invoice_completed', 'teamController@form_exporter_textile_invoice_completed')->name('team.form_exporter_textile_invoice_completed');

                Route::get('/add', 'teamController@add_exporter_textile_declearation_invoice')->name('team.add_exporter_textile_declearation_invoice');
                Route::post('/submit_exporter_textile_declearation_invoice', 'teamController@submit_exporter_textile_declearation_invoice')->name('team.submit_exporter_textile_declearation_invoice');
                Route::get('/edit/{id}', 'teamController@edit_exporter_textile_declearation_invoice')->name('team.edit_exporter_textile_declearation_invoice');
                Route::post('/update_submit_exporter_textile_declearation_invoice', 'teamController@update_submit_exporter_textile_declearation_invoice')->name('team.update_submit_exporter_textile_declearation_invoice');

                Route::get('/view/{id}', 'teamController@view_exporter_textile_declearation_invoice')->name('team.view_exporter_textile_declearation_invoice');
                Route::get('/activity/{id}', 'teamController@activity_exporter_textile_declearation_invoice')->name('team.activity_exporter_textile_declearation_invoice');
            });
            Route::prefix('certificate-origins')->group(function () {

                Route::get('/', 'teamController@report_List_certificate_origins_invoice')->name('team.report_List_certificate_origins_invoice');
                Route::get('/generate_certificate_origins_invoic_PDF/{id}', 'teamController@generate_certificate_origins_invoic_PDF')->name('team.generate_certificate_origins_invoic_PDF');

                Route::post('/form_certificate_origin_invoice_resubmit', 'teamController@form_certificate_origin_invoice_resubmit')->name('team.form_certificate_origin_invoice_resubmit');
                Route::post('/form_certificate_origin_invoice_completed', 'teamController@form_certificate_origin_invoice_completed')->name('team.form_certificate_origin_invoice_completed');

                Route::get('/add', 'teamController@add_certificate_origins_invoice')->name('team.add_certificate_origins_invoice');
                Route::post('/submit_certificate_origins_invoice', 'teamController@submit_certificate_origins_invoice')->name('team.submit_certificate_origins_invoice');
                Route::get('/edit/{id}', 'teamController@edit_certificate_origins_invoice')->name('team.edit_certificate_origins_invoice');
                Route::post('/update_submit_certificate_origins_invoice', 'teamController@update_submit_certificate_origins_invoice')->name('team.update_submit_certificate_origins_invoice');

                Route::get('/view/{id}', 'teamController@view_certificate_origins_invoice')->name('team.view_certificate_origins_invoice');
                Route::get('/activity/{id}', 'teamController@activity_certificate_origins_invoice')->name('team.activity_certificate_origins_invoice');
            });
            Route::prefix('certificate-origin-no627120')->group(function () {

                Route::get('/', 'teamController@report_List_certificate_origin_no627120_invoice')->name('team.report_List_certificate_origin_no627120_invoice');
                Route::get('/generate_certificate_origin_no627120_invoic_PDF/{id}', 'teamController@generate_certificate_origin_no627120_invoic_PDF')->name('team.generate_certificate_origin_no627120_invoic_PDF');

                Route::post('/form_certificate_origin_no627120_invoice_resubmit', 'teamController@form_certificate_origin_no627120_invoice_resubmit')->name('team.form_certificate_origin_no627120_invoice_resubmit');
                Route::post('/form_certificate_origin_no627120_invoice_completed', 'teamController@form_certificate_origin_no627120_invoice_completed')->name('team.form_certificate_origin_no627120_invoice_completed');


                Route::get('/add', 'teamController@add_certificate_origin_no627120_invoice')->name('team.add_certificate_origin_no627120_invoice');
                Route::post('/submit_certificate_origin_no627120_invoice', 'teamController@submit_certificate_origin_no627120_invoice')->name('team.submit_certificate_origin_no627120_invoice');
                Route::get('/edit/{id}', 'teamController@edit_certificate_origin_no627120_invoice')->name('team.edit_certificate_origin_no627120_invoice');
                Route::post('/update_submit_certificate_origin_no627120_invoice', 'teamController@update_submit_certificate_origin_no627120_invoice')->name('team.update_submit_certificate_origin_no627120_invoice');

                Route::get('/view/{id}', 'teamController@view_certificate_origin_no627120_invoice')->name('team.view_certificate_origin_no627120_invoice');
                Route::get('/activity/{id}', 'teamController@activity_certificate_origin_no627120_invoice')->name('team.activity_certificate_origin_no627120_invoice');
            });
            Route::prefix('certificate-origin-com-dec')->group(function () {

                Route::get('/', 'teamController@report_List_certificate_origin_com_dec_invoice')->name('team.report_List_certificate_origin_com_dec_invoice');
                Route::get('/generate_certificate_origin_com_dec_invoic_PDF/{id}', 'teamController@generate_certificate_origin_com_dec_invoic_PDF')->name('team.generate_certificate_origin_com_dec_invoic_PDF');
                Route::post('/form_certificate_origin_com_dec_invoice_resubmit', 'teamController@form_certificate_origin_com_dec_invoice_resubmit')->name('team.form_certificate_origin_com_dec_invoice_resubmit');
                Route::post('/form_certificate_origin_com_dec_invoice_completed', 'teamController@form_certificate_origin_com_dec_invoice_completed')->name('team.form_certificate_origin_com_dec_invoice_completed');

                Route::get('/add', 'teamController@add_certificate_origin_com_dec_invoice')->name('team.add_certificate_origin_com_dec_invoice');
                Route::post('/submit_certificate_origin_com_dec_invoice', 'teamController@submit_certificate_origin_com_dec_invoice')->name('team.submit_certificate_origin_com_dec_invoice');
                Route::get('/edit/{id}', 'teamController@edit_certificate_origin_com_dec_invoice')->name('team.edit_certificate_origin_com_dec_invoice');
                Route::post('/update_submit_certificate_origin_com_dec_invoice', 'teamController@update_submit_certificate_origin_com_dec_invoice')->name('team.update_submit_certificate_origin_com_dec_invoice');

                Route::get('/view/{id}', 'teamController@view_certificate_origin_com_dec_invoice')->name('team.view_certificate_origin_com_dec_invoice');
                Route::get('/activity/{id}', 'teamController@activity_certificate_origin_com_dec_invoice')->name('team.activity_certificate_origin_com_dec_invoice');
            });
            Route::prefix('certificate-origin-com-dec-from-ip')->group(function () {

                Route::get('/', 'teamController@report_List_certificate_origin_com_dec_form_ip_invoice')->name('team.report_List_certificate_origin_com_dec_form_ip_invoice');
                Route::get('/generate_certificate_origin_com_dec_form_ip_invoic_PDF/{id}', 'teamController@generate_certificate_origin_com_dec_form_ip_invoic_PDF')->name('team.generate_certificate_origin_com_dec_form_ip_invoic_PDF');
                Route::post('/form_certificate_origin_com_dec_form_ip_invoice_resubmit', 'teamController@form_certificate_origin_com_dec_form_ip_invoice_resubmit')->name('team.form_certificate_origin_com_dec_form_ip_invoice_resubmit');
                Route::post('/form_certificate_origin_com_dec_form_ip_invoice_completed', 'teamController@form_certificate_origin_com_dec_form_ip_invoice_completed')->name('team.form_certificate_origin_com_dec_form_ip_invoice_completed');


                Route::get('/add', 'teamController@add_certificate_origin_com_dec_form_ip_invoice')->name('team.add_certificate_origin_com_dec_form_ip_invoice');
                Route::post('/submit_certificate_origin_com_dec_form_ip_invoice', 'teamController@submit_certificate_origin_com_dec_form_ip_invoice')->name('team.submit_certificate_origin_com_dec_form_ip_invoice');
                Route::get('/edit/{id}', 'teamController@edit_certificate_origin_com_dec_form_ip_invoice')->name('team.edit_certificate_origin_com_dec_form_ip_invoice');
                Route::post('/update_submit_certificate_origin_com_dec_form_ip_invoice', 'teamController@update_submit_certificate_origin_com_dec_form_ip_invoice')->name('team.update_submit_certificate_origin_com_dec_form_ip_invoice');

                Route::get('/view/{id}', 'teamController@view_certificate_origin_com_dec_form_ip_invoice')->name('team.view_certificate_origin_com_dec_form_ip_invoice');
                Route::get('/activity/{id}', 'teamController@activity_certificate_origin_com_dec_form_ip_invoice')->name('team.activity_certificate_origin_com_dec_form_ip_invoice');
            });

            Route::prefix('certificate-origin-com-dec-from-a')->group(function () {

                Route::get('/', 'teamController@report_List_certificate_origin_com_dec_form_a_invoice')->name('team.report_List_certificate_origin_com_dec_form_a_invoice');
                Route::get('/generate_certificate_origin_com_dec_form_a_invoic_PDF/{id}', 'teamController@generate_certificate_origin_com_dec_form_a_invoic_PDF')->name('team.generate_certificate_origin_com_dec_form_a_invoic_PDF');
                Route::post('/form_certificate_origin_com_dec_form_a_invoice_resubmit', 'teamController@form_certificate_origin_com_dec_form_a_invoice_resubmit')->name('team.form_certificate_origin_com_dec_form_a_invoice_resubmit');
                Route::post('/form_certificate_origin_com_dec_form_a_invoice_completed', 'teamController@form_certificate_origin_com_dec_form_a_invoice_completed')->name('team.form_certificate_origin_com_dec_form_a_invoice_completed');

                Route::get('/add', 'teamController@add_certificate_origin_com_dec_form_a_invoice')->name('team.add_certificate_origin_com_dec_form_a_invoice');
                Route::post('/submit_certificate_origin_com_dec_form_a_invoice', 'teamController@submit_certificate_origin_com_dec_form_a_invoice')->name('team.submit_certificate_origin_com_dec_form_a_invoice');
                Route::get('/edit/{id}', 'teamController@edit_certificate_origin_com_dec_form_a_invoice')->name('team.edit_certificate_origin_com_dec_form_a_invoice');
                Route::post('/update_submit_certificate_origin_com_dec_form_a_invoice', 'teamController@update_submit_certificate_origin_com_dec_form_a_invoice')->name('team.update_submit_certificate_origin_com_dec_form_a_invoice');

                Route::get('/view/{id}', 'teamController@view_certificate_origin_com_dec_form_a_invoice')->name('team.view_certificate_origin_com_dec_form_a_invoice');
                Route::get('/activity/{id}', 'teamController@activity_certificate_origin_com_dec_form_a_invoice')->name('team.activity_certificate_origin_com_dec_form_a_invoice');
            });
            // =======================================

        });
        Route::prefix('third-party')->group(function () {
            Route::get('/', 'teamController@vender_List')->name('team.vender_List');
        });
    });
});
//Admin Dashboard
Route::prefix('panel')->namespace('admin')->group(function () {

    Route::get('/', 'authController@index')->name('admin.dashboard');
    Route::get('/login', 'authController@login')->name('admin.login');
    Route::post('/login', 'authController@loginSubmit')->name('admin.loginSubmit');

    Route::get('/logout', 'authController@logout')->name('admin.logout');

    Route::middleware('adminAuth')->group(function () {

        Route::get('/dashboard', 'adminController@index')->name('admin.index');
        // Route::get('/attention-required', 'adminController@attentionRequired')->name('admin.attentionRequired');
        // Route::get('/report-page', 'adminController@reportPage')->name('admin.reportPage');
        Route::prefix('client')->group(function () {
            Route::get('/', 'adminController@companyList')->name('admin.companyList');
            Route::post('/add', 'userController@addClient')->name('admin.addClient');
            Route::post('/update_company', 'adminController@update_company')->name('admin.update_company');
            Route::get('/edit/{id}', 'adminController@Edit_company')->name('admin.Edit_company');
        });

        Route::prefix('team')->group(function () {
            Route::get('/', 'adminController@team_List')->name('admin.team_List');
            Route::post('/add', 'userController@addTeamMember')->name('admin.addTeamMember');
            Route::get('/edit/{id}', 'adminController@Edit_team')->name('admin.Edit_team');
            Route::post('/update_team', 'adminController@update_team')->name('admin.update_team');
        });
        Route::prefix('third-party')->group(function () {
            Route::get('/', 'adminController@vender_List')->name('admin.vender_List');
            Route::post('/add', 'userController@addThirdParty')->name('admin.addThirdParty');
            Route::post('/update_vender', 'adminController@update_vender')->name('admin.update_vender');
            Route::get('/edit/{id}', 'adminController@Edit_vender')->name('admin.Edit_vender');
        });

        Route::prefix('report')->group(function () {

            Route::get('/generate-pdf/{count}', 'adminController@generatePDF');
            Route::prefix('canda-costom_invoice')->group(function () {

                Route::get('/', 'adminController@report_List_custom_canda_invoice')->name('admin.report_List_custom_canda_invoice');
                Route::get('/generate_custom_canda_invoic_PDF/{id}', 'adminController@generate_custom_canda_invoic_PDF')->name('admin.generate_custom_canda_invoic_PDF');

                Route::get('/add', 'adminController@add_custom_canda_invoice')->name('admin.add_custom_canda_invoice');
                Route::post('/submit_custom_canda_invoice', 'adminController@submit_custom_canda_invoice')->name('admin.submit_custom_canda_invoice');
                Route::get('/edit/{id}', 'adminController@edit_custom_canda_invoice')->name('admin.edit_custom_canda_invoice');
                Route::post('/update_submit_custom_canda_invoice', 'adminController@update_submit_custom_canda_invoice')->name('admin.update_submit_custom_canda_invoice');

                Route::get('/view/{id}', 'adminController@view_custom_canda_invoice')->name('admin.view_custom_canda_invoice');
                Route::get('/activity/{id}', 'adminController@activity_custom_canda_invoice')->name('admin.activity_custom_canda_invoice');
                Route::post('/form_canada_invoice_resubmit', 'adminController@form_canada_invoice_resubmit')->name('admin.form_canada_invoice_resubmit');
                Route::post('/form_canada_invoice_completed', 'adminController@form_canada_invoice_completed')->name('admin.form_canada_invoice_completed');
            });

            Route::prefix('commercial-invoice')->group(function () {

                Route::get('/', 'adminController@report_List_commercial_invoice')->name('admin.report_List_commercial_invoice');
                Route::get('/generate_commercial_invoice_PDF/{id}', 'adminController@generate_commercial_invoice_PDF')->name('admin.generate_commercial_invoice_PDF');
                Route::post('/commercial_invoice_resubmit', 'adminController@commercial_invoice_resubmit')->name('admin.commercial_invoice_resubmit');
                Route::post('/commercial_invoice_completed', 'adminController@commercial_invoice_completed')->name('admin.commercial_invoice_completed');

                Route::get('/add', 'adminController@add_commercial_invoice')->name('admin.add_commercial_invoice');
                Route::post('/submit_commercial_invoice', 'adminController@submit_commercial_invoice')->name('admin.submit_commercial_invoice');
                Route::get('/edit/{id}', 'adminController@edit_commercial_invoice')->name('admin.edit_commercial_invoice');
                Route::post('/update_submit_commercial_invoice', 'adminController@update_submit_commercial_invoice')->name('admin.update_submit_commercial_invoice');

                Route::get('/view/{id}', 'adminController@view_commercial_invoice')->name('admin.view_commercial_invoice');
                Route::get('/activity/{id}', 'adminController@activity_commercial_invoice')->name('admin.activity_commercial_invoice');
                Route::get('/pdf_file_view/{id}', 'adminController@firm_file_view')->name('admin.firm_file_view');
                Route::get('/commercial_invoice_by_pdf/{id}', 'adminController@commercial_invoice_by_pdf')->name('admin.commercial_invoice_by_pdf');
            });

            // packiglist
            Route::prefix('packing-list')->group(function () {

                Route::get('/', 'adminController@report_List_packing_list')->name('admin.report_List_packing_list');
                Route::get('/generate_packing_list_PDF/{id}', 'adminController@generate_packing_list_PDF')->name('admin.generate_packing_list_PDF');
                Route::post('/packing_list_resubmit', 'adminController@packing_list_resubmit')->name('admin.packing_list_resubmit');
                Route::post('/packing_list_completed', 'adminController@packing_list_completed')->name('admin.packing_list_completed');
                
                Route::get('/add', 'adminController@add_packing_list')->name('admin.add_packing_list');
                Route::post('/submit_packing_list', 'adminController@submit_packing_list')->name('admin.submit_packing_list');
                Route::get('/edit/{id}', 'adminController@edit_packing_list')->name('admin.edit_packing_list');
                Route::post('/update_submit_packing_list', 'adminController@update_submit_packing_list')->name('admin.update_submit_packing_list');
                
                Route::get('/view/{id}', 'adminController@view_packing_list')->name('admin.view_packing_list');
                Route::get('/activity/{id}', 'adminController@activity_packing_list')->name('admin.activity_packing_list');
                
            });

            Route::prefix('form-59-a-invoice')->group(function () {

                Route::get('/', 'adminController@report_List_form_59_a_invoice')->name('admin.report_List_form_59_a_invoice');
                Route::get('/generate_form_59_a_invoic_PDF/{id}', 'adminController@generate_form_59_a_invoic_PDF')->name('admin.generate_form_59_a_invoic_PDF');
                Route::post('/form_59_invoice_resubmit', 'adminController@form_59_invoice_resubmit')->name('admin.form_59_invoice_resubmit');
                Route::post('/form_59_invoice_completed', 'adminController@form_59_invoice_completed')->name('admin.form_59_invoice_completed');

                Route::get('/add', 'adminController@add_form_59_a_invoice')->name('admin.add_form_59_a_invoice');
                Route::post('/submit_form_59_a_invoice', 'adminController@submit_form_59_a_invoice')->name('admin.submit_form_59_a_invoice');
                Route::get('/edit/{id}', 'adminController@edit_form_59_a_invoice')->name('admin.edit_form_59_a_invoice');
                Route::post('/update_submit_form_59_a_invoice', 'adminController@update_submit_form_59_a_invoice')->name('admin.update_submit_form_59_a_invoice');

                Route::get('/view/{id}', 'adminController@view_form_59_a_invoice')->name('admin.view_form_59_a_invoice');
                Route::get('/activity/{id}', 'adminController@activity_form_59_a_invoice')->name('admin.activity_form_59_a_invoice');
            });


            Route::prefix('exporter-textile-declearation')->group(function () {

                Route::get('/', 'adminController@report_List_exporter_textile_declearation_invoice')->name('admin.report_List_exporter_textile_declearation_invoice');
                Route::get('/generate_exporter_textile_declearation_invoic_PDF/{id}', 'adminController@generate_exporter_textile_declearation_invoic_PDF')->name('admin.generate_exporter_textile_declearation_invoic_PDF');

                Route::post('/form_exporter_textile_invoice_resubmit', 'adminController@form_exporter_textile_invoice_resubmit')->name('admin.form_exporter_textile_invoice_resubmit');
                Route::post('/form_exporter_textile_invoice_completed', 'adminController@form_exporter_textile_invoice_completed')->name('admin.form_exporter_textile_invoice_completed');

                Route::get('/add', 'adminController@add_exporter_textile_declearation_invoice')->name('admin.add_exporter_textile_declearation_invoice');
                Route::post('/submit_exporter_textile_declearation_invoice', 'adminController@submit_exporter_textile_declearation_invoice')->name('admin.submit_exporter_textile_declearation_invoice');
                Route::get('/edit/{id}', 'adminController@edit_exporter_textile_declearation_invoice')->name('admin.edit_exporter_textile_declearation_invoice');
                Route::post('/update_submit_exporter_textile_declearation_invoice', 'adminController@update_submit_exporter_textile_declearation_invoice')->name('admin.update_submit_exporter_textile_declearation_invoice');

                Route::get('/view/{id}', 'adminController@view_exporter_textile_declearation_invoice')->name('admin.view_exporter_textile_declearation_invoice');
                Route::get('/activity/{id}', 'adminController@activity_exporter_textile_declearation_invoice')->name('admin.activity_exporter_textile_declearation_invoice');
            });
            Route::prefix('certificate-origins')->group(function () {

                Route::get('/', 'adminController@report_List_certificate_origins_invoice')->name('admin.report_List_certificate_origins_invoice');
                Route::get('/generate_certificate_origins_invoic_PDF/{id}', 'adminController@generate_certificate_origins_invoic_PDF')->name('admin.generate_certificate_origins_invoic_PDF');

                Route::post('/form_certificate_origin_invoice_resubmit', 'adminController@form_certificate_origin_invoice_resubmit')->name('admin.form_certificate_origin_invoice_resubmit');
                Route::post('/form_certificate_origin_invoice_completed', 'adminController@form_certificate_origin_invoice_completed')->name('admin.form_certificate_origin_invoice_completed');

                Route::get('/add', 'adminController@add_certificate_origins_invoice')->name('admin.add_certificate_origins_invoice');
                Route::post('/submit_certificate_origins_invoice', 'adminController@submit_certificate_origins_invoice')->name('admin.submit_certificate_origins_invoice');
                Route::get('/edit/{id}', 'adminController@edit_certificate_origins_invoice')->name('admin.edit_certificate_origins_invoice');
                Route::post('/update_submit_certificate_origins_invoice', 'adminController@update_submit_certificate_origins_invoice')->name('admin.update_submit_certificate_origins_invoice');

                Route::get('/view/{id}', 'adminController@view_certificate_origins_invoice')->name('admin.view_certificate_origins_invoice');
                Route::get('/activity/{id}', 'adminController@activity_certificate_origins_invoice')->name('admin.activity_certificate_origins_invoice');
            });
            Route::prefix('certificate-origin-no627120')->group(function () {

                Route::get('/', 'adminController@report_List_certificate_origin_no627120_invoice')->name('admin.report_List_certificate_origin_no627120_invoice');
                Route::get('/generate_certificate_origin_no627120_invoic_PDF/{id}', 'adminController@generate_certificate_origin_no627120_invoic_PDF')->name('admin.generate_certificate_origin_no627120_invoic_PDF');

                Route::post('/form_certificate_origin_no627120_invoice_resubmit', 'adminController@form_certificate_origin_no627120_invoice_resubmit')->name('admin.form_certificate_origin_no627120_invoice_resubmit');
                Route::post('/form_certificate_origin_no627120_invoice_completed', 'adminController@form_certificate_origin_no627120_invoice_completed')->name('admin.form_certificate_origin_no627120_invoice_completed');


                Route::get('/add', 'adminController@add_certificate_origin_no627120_invoice')->name('admin.add_certificate_origin_no627120_invoice');
                Route::post('/submit_certificate_origin_no627120_invoice', 'adminController@submit_certificate_origin_no627120_invoice')->name('admin.submit_certificate_origin_no627120_invoice');
                Route::get('/edit/{id}', 'adminController@edit_certificate_origin_no627120_invoice')->name('admin.edit_certificate_origin_no627120_invoice');
                Route::post('/update_submit_certificate_origin_no627120_invoice', 'adminController@update_submit_certificate_origin_no627120_invoice')->name('admin.update_submit_certificate_origin_no627120_invoice');

                Route::get('/view/{id}', 'adminController@view_certificate_origin_no627120_invoice')->name('admin.view_certificate_origin_no627120_invoice');
                Route::get('/activity/{id}', 'adminController@activity_certificate_origin_no627120_invoice')->name('admin.activity_certificate_origin_no627120_invoice');
            });
            Route::prefix('certificate-origin-com-dec')->group(function () {

                Route::get('/', 'adminController@report_List_certificate_origin_com_dec_invoice')->name('admin.report_List_certificate_origin_com_dec_invoice');
                Route::get('/generate_certificate_origin_com_dec_invoic_PDF/{id}', 'adminController@generate_certificate_origin_com_dec_invoic_PDF')->name('admin.generate_certificate_origin_com_dec_invoic_PDF');
                Route::post('/form_certificate_origin_com_dec_invoice_resubmit', 'adminController@form_certificate_origin_com_dec_invoice_resubmit')->name('admin.form_certificate_origin_com_dec_invoice_resubmit');
                Route::post('/form_certificate_origin_com_dec_invoice_completed', 'adminController@form_certificate_origin_com_dec_invoice_completed')->name('admin.form_certificate_origin_com_dec_invoice_completed');

                Route::get('/add', 'adminController@add_certificate_origin_com_dec_invoice')->name('admin.add_certificate_origin_com_dec_invoice');
                Route::post('/submit_certificate_origin_com_dec_invoice', 'adminController@submit_certificate_origin_com_dec_invoice')->name('admin.submit_certificate_origin_com_dec_invoice');
                Route::get('/edit/{id}', 'adminController@edit_certificate_origin_com_dec_invoice')->name('admin.edit_certificate_origin_com_dec_invoice');
                Route::post('/update_submit_certificate_origin_com_dec_invoice', 'adminController@update_submit_certificate_origin_com_dec_invoice')->name('admin.update_submit_certificate_origin_com_dec_invoice');

                Route::get('/view/{id}', 'adminController@view_certificate_origin_com_dec_invoice')->name('admin.view_certificate_origin_com_dec_invoice');
                Route::get('/activity/{id}', 'adminController@activity_certificate_origin_com_dec_invoice')->name('admin.activity_certificate_origin_com_dec_invoice');
            });
            Route::prefix('certificate-origin-com-dec-from-ip')->group(function () {

                Route::get('/', 'adminController@report_List_certificate_origin_com_dec_form_ip_invoice')->name('admin.report_List_certificate_origin_com_dec_form_ip_invoice');
                Route::get('/generate_certificate_origin_com_dec_form_ip_invoic_PDF/{id}', 'adminController@generate_certificate_origin_com_dec_form_ip_invoic_PDF')->name('admin.generate_certificate_origin_com_dec_form_ip_invoic_PDF');
                Route::post('/form_certificate_origin_com_dec_form_ip_invoice_resubmit', 'adminController@form_certificate_origin_com_dec_form_ip_invoice_resubmit')->name('admin.form_certificate_origin_com_dec_form_ip_invoice_resubmit');
                Route::post('/form_certificate_origin_com_dec_form_ip_invoice_completed', 'adminController@form_certificate_origin_com_dec_form_ip_invoice_completed')->name('admin.form_certificate_origin_com_dec_form_ip_invoice_completed');


                Route::get('/add', 'adminController@add_certificate_origin_com_dec_form_ip_invoice')->name('admin.add_certificate_origin_com_dec_form_ip_invoice');
                Route::post('/submit_certificate_origin_com_dec_form_ip_invoice', 'adminController@submit_certificate_origin_com_dec_form_ip_invoice')->name('admin.submit_certificate_origin_com_dec_form_ip_invoice');
                Route::get('/edit/{id}', 'adminController@edit_certificate_origin_com_dec_form_ip_invoice')->name('admin.edit_certificate_origin_com_dec_form_ip_invoice');
                Route::post('/update_submit_certificate_origin_com_dec_form_ip_invoice', 'adminController@update_submit_certificate_origin_com_dec_form_ip_invoice')->name('admin.update_submit_certificate_origin_com_dec_form_ip_invoice');

                Route::get('/view/{id}', 'adminController@view_certificate_origin_com_dec_form_ip_invoice')->name('admin.view_certificate_origin_com_dec_form_ip_invoice');
                Route::get('/activity/{id}', 'adminController@activity_certificate_origin_com_dec_form_ip_invoice')->name('admin.activity_certificate_origin_com_dec_form_ip_invoice');
            });

            Route::prefix('certificate-origin-com-dec-from-a')->group(function () {

                Route::get('/', 'adminController@report_List_certificate_origin_com_dec_form_a_invoice')->name('admin.report_List_certificate_origin_com_dec_form_a_invoice');
                Route::get('/generate_certificate_origin_com_dec_form_a_invoic_PDF/{id}', 'adminController@generate_certificate_origin_com_dec_form_a_invoic_PDF')->name('admin.generate_certificate_origin_com_dec_form_a_invoic_PDF');
                Route::post('/form_certificate_origin_com_dec_form_a_invoice_resubmit', 'adminController@form_certificate_origin_com_dec_form_a_invoice_resubmit')->name('admin.form_certificate_origin_com_dec_form_a_invoice_resubmit');
                Route::post('/form_certificate_origin_com_dec_form_a_invoice_completed', 'adminController@form_certificate_origin_com_dec_form_a_invoice_completed')->name('admin.form_certificate_origin_com_dec_form_a_invoice_completed');

                Route::get('/add', 'adminController@add_certificate_origin_com_dec_form_a_invoice')->name('admin.add_certificate_origin_com_dec_form_a_invoice');
                Route::post('/submit_certificate_origin_com_dec_form_a_invoice', 'adminController@submit_certificate_origin_com_dec_form_a_invoice')->name('admin.submit_certificate_origin_com_dec_form_a_invoice');
                Route::get('/edit/{id}', 'adminController@edit_certificate_origin_com_dec_form_a_invoice')->name('admin.edit_certificate_origin_com_dec_form_a_invoice');
                Route::post('/update_submit_certificate_origin_com_dec_form_a_invoice', 'adminController@update_submit_certificate_origin_com_dec_form_a_invoice')->name('admin.update_submit_certificate_origin_com_dec_form_a_invoice');

                Route::get('/view/{id}', 'adminController@view_certificate_origin_com_dec_form_a_invoice')->name('admin.view_certificate_origin_com_dec_form_a_invoice');
                Route::get('/activity/{id}', 'adminController@activity_certificate_origin_com_dec_form_a_invoice')->name('admin.activity_certificate_origin_com_dec_form_a_invoice');
            });
            // =======================================

        });
    });
});
