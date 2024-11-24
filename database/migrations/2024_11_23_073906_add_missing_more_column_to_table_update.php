<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMissingMoreColumnToTableUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('certificate_origins', function (Blueprint $table) {
            $table->string('exporter_signature', 100)->nullable();
            $table->string('signature_person_authorized', 100)->nullable();
        });
        Schema::table('commercial_invoices', function (Blueprint $table) {
            for ($i = 1; $i <= 5; $i++) {
                $table->text("value_f_i_no_$i", 50)->nullable();
                $table->text("heading_f_i_no_$i", 50)->default('F.I NO / GD #')->nullable();
            }

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('certificate_origins', function (Blueprint $table) {
            $table->dropColumn('exporter_signature');
            $table->dropColumn('signature_person_authorized');
 
        });

        Schema::table('commercial_invoices', function (Blueprint $table) {
            for ($i = 1; $i <= 5; $i++) {
                $table->dropColumn("value_f_i_no_$i");
                $table->dropColumn("heading_f_i_no_$i");
            }
        });


    }
}
