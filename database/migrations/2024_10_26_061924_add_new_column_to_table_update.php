<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnToTableUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('form59_a_invoices', function (Blueprint $table) {
            $table->string('full_name', 100)->nullable();
            $table->string('form59_status', 100)->nullable();
            $table->string('date', 100)->nullable();
            $table->string('signature_person', 100)->nullable();
        });
        Schema::table('exporter_textile_declearations', function (Blueprint $table) {
            $table->string('full_name', 100)->nullable();
            $table->string('signature_person', 100)->nullable();
        });
        Schema::table('certificate_origin_no627120s', function (Blueprint $table) {
            $table->string('other_information', 100)->nullable();
            $table->string('other_information_2', 100)->nullable();
            $table->string('full_name', 100)->nullable();
            $table->string('designnation', 100)->nullable();
            $table->string('company', 100)->nullable();
            $table->string('signature_person', 100)->nullable();
        });
        Schema::table('certificate_origins', function (Blueprint $table) {
            $table->string('full_name', 100)->nullable();
            $table->string('designnation', 100)->nullable();
            $table->string('company', 100)->nullable();
            $table->string('signature_person', 100)->nullable();
            $table->string('place_issue_date', 100)->nullable();
        });
        Schema::table('certificate_origin_com_decs', function (Blueprint $table) {
            $table->string('f_name', 100)->nullable();
            $table->string('signature_person', 100)->nullable();
            $table->string('designnation', 100)->nullable();
            $table->string('company', 100)->nullable();
            $table->string('issue_in', 100)->nullable();
            $table->string('declaration_by_the_exporter_country', 100)->nullable();
            $table->string('from_to_country', 100)->nullable();

        });
        Schema::table('certificate_origin_com_dec_form_ips', function (Blueprint $table) {
            $table->string('full_name')->nullable();
            $table->string('signature_person')->nullable();
            $table->string('designnation')->nullable();
            $table->string('company')->nullable();
            $table->string('declaration_by_the_exporter_country')->nullable();

        });
    
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('form59_a_invoices', function (Blueprint $table) {
            $table->dropColumn('full_name');
            $table->dropColumn('form59_status');
            $table->dropColumn('date');
            $table->dropColumn('signature_person');
        });
        Schema::table('exporter_textile_declearations', function (Blueprint $table) {
            $table->dropColumn('full_name');
            $table->dropColumn('signature_person');
        });
        Schema::table('certificate_origin_no627120s', function (Blueprint $table) {
            $table->dropColumn('full_name');
            $table->dropColumn('signature_person');
            $table->dropColumn('designnation');
            $table->dropColumn('company');
        });
        Schema::table('certificate_origins', function (Blueprint $table) {
            $table->dropColumn('full_name');
            $table->dropColumn('signature_person');
            $table->dropColumn('designnation');
            $table->dropColumn('company');
            $table->dropColumn('place_issue_date');

        });
        Schema::table('certificate_origin_com_decs', function (Blueprint $table) {
            $table->dropColumn('full_name');
            $table->dropColumn('signature_person');
            $table->dropColumn('designnation');
            $table->dropColumn('company');
            $table->dropColumn('issue_in');
            $table->dropColumn('declaration_by_the_exporter_country');
            $table->dropColumn('from_to_country');

        });

        Schema::table('certificate_origin_com_dec_form_ips', function (Blueprint $table) {
            $table->dropColumn('full_name');
            $table->dropColumn('signature_person');
            $table->dropColumn('designnation');
            $table->dropColumn('company');
            $table->dropColumn('declaration_by_the_exporter_country');

        });

        
        
    }
}
