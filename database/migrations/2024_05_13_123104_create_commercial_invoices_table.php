<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommercialInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commercial_invoices', function (Blueprint $table) {
            $table->id();
            
            $table->text('heading_f_i_no', 50)->default('F.I NO / GD #')->nullable();
            $table->text('heading_shipper', 50)->default('SHIPPER / MANUFACTURER')->nullable();
            $table->text('heading_invioce', 50)->default('INVOICE. NO')->nullable();
            $table->text('heading_vessel', 50)->default('VESSEL /FLIGHT')->nullable();
            $table->text('heading_dated', 50)->default('DATED')->nullable();
            $table->text('heading_total_pkg', 50)->default('TOTAL PKGS')->nullable();
            $table->text('heading_contract_no', 50)->default('CONTRACT NO')->nullable();
            $table->text('heading_contract_date', 50)->default('CONTRACT DATE')->nullable();
            $table->text('heading_lc', 50)->default('LC #')->nullable();
            $table->text('heading_issue_date_lc', 50)->default('ISSUE DATE (LC)')->nullable();
            $table->text('heading_pyment_terms', 50)->default('PAYMENT TERMS')->nullable();
            $table->text('heading_drawn_at', 50)->default('DRAWN AT:')->nullable();
            $table->text('heading_drawn_under', 50)->default('DRAWN UNDER:')->nullable();
            $table->text('heading_part_of_loading', 50)->default('PORT OF LOADING')->nullable();
            $table->text('heading_part_of_discharge', 50)->default('PORT OF DISCHARGE')->nullable();
            $table->text('heading_container_no', 50)->default('CONTAINER NO')->nullable();
            $table->text('heading_currency', 50)->default('CURRENCY')->nullable();
            $table->text('heading_term_of_delivery', 50)->default('TERMS OF DELIVERY')->nullable();
            $table->text('heading_buyer', 50)->default('BUYER:')->nullable();
            $table->text('heading_ship_to', 50)->default('SHIP TO')->nullable();
            $table->text('heading_marks_no', 50)->default('MARKS & NOS.')->nullable();
            $table->text('heading_discription_of_goods', 50)->default('DESCRIPTION OF GOODS')->nullable();
            $table->text('heading_quantity', 50)->default('QTY')->nullable();
            $table->text('heading_prices', 50)->default('PRICE US$')->nullable();
            $table->text('heading_total_amount', 50)->default('TOTAL AMOUNT')->nullable();
            $table->text('heading_long_sides', 50)->default('LEFT & RIGHT SIDES OF BOX ( LONG SIDES )')->nullable();
            $table->text('heading_performa_invioce_no', 50)->default('PROFORMA INVOICE NO')->nullable();
            $table->text('currency_symbol')->nullable();
       
            $table->text("heading_total_net_weight", 50)->default('TOTAL NET. WEIGHT:')->nullable();
            $table->text("heading_total_gr_weight", 50)->default('TOTAL GR. WEIGHT:')->nullable();
            $table->text("heading_total_buyer_discount", 50)->default('LESS 2% BUYER DISCOUNT')->nullable();
            $table->text("heading_total_less_commission", 50)->default('LESS COMMISSION')->nullable();
            $table->text("heading_total_add_fright", 50)->default('ADD FREIGHT')->nullable();
            $table->text("heading_total_net_amount_payable", 50)->default('NET AMOUNT PAYABLE')->nullable();

            $table->text("heading_note", 50)->default('Note:')->nullable();
            $table->text("heading_remarks", 50)->default('Remarks:')->nullable();
            $table->text("heading_intermediary_bank", 50)->default('INTERMEDIARY BANK:')->nullable();
            $table->text("heading_intermediary_bank_swift_no", 50)->default('INTERMEDIARY BANK SWIFT NO:')->nullable();
            $table->text("heading_intermediary_bank_ac_no", 50)->default('INTERMEDIARY BANK A/C NO:')->nullable();
            $table->text("heading_for_onword_credit_to", 50)->default('FOR ONWARD CREDIT TO:')->nullable();
            $table->text("heading_tw_ac_no", 50)->default('TOWELLERS LIMITED A/C NO:')->nullable();
            $table->text("heading_swift_no", 50)->default('SWIFT NO:')->nullable();
            $table->text("heading_iban_no", 50)->default('IBAN NO:')->nullable();
            $table->text("heading_bank_addrss", 50)->default('BANK ADDRESS:')->nullable();
            $table->text("heading_statement_origin", 50)->default('STATEMENT ON ORIGIN')->nullable();
         
            
            // input values below
            $table->text('value_f_i_no', 50)->nullable();

            $table->text('name_shipper', 50)->default('TOWELLERS LIMITED')->nullable();
            $table->text('address_shipper', 50)->default('WSA 30-31 BLOCK 1, FEDERAL B AREA')->nullable();
            $table->text('city_shipper', 50)->default('KARACHI')->nullable();
            $table->text('country_shipper', 50)->default('PAKISTAN')->nullable();
            $table->text('phone_shipper', 50)->default('PHONE # +92-21-36314884')->nullable();
            
            $table->text('name_buyer',50)->nullable();
            $table->text('address_buyer',50)->nullable();
            $table->text('city_buyer',50)->nullable();
            $table->text('country_buyer',50)->nullable();
            $table->text('phone_buyer',50)->nullable();

            $table->text('name_ship_to',50)->nullable();  
            $table->text('address_ship_to',50)->nullable();
            $table->text('city_ship_to',50)->nullable();
            $table->text('country_ship_to',50)->nullable();
            $table->text('phone_ship_to',50)->nullable();
            $table->text('performa_invioce_no_value',50)->nullable();
            $table->text('invioce_generator',50)->nullable();
            $table->text('vessel_value',50)->nullable();
            $table->text('dated',50)->nullable();
            $table->text('total_pkg_value',50)->nullable();
            $table->text('contract_no_value',50)->nullable();
            $table->text('contract_date_value',50)->nullable();
            $table->text('lc_value',50)->nullable();
            $table->text('lc_issue_date_value',50)->nullable();
            $table->text('pyment_terms_value',50)->nullable();
            $table->text('drawn_at_value',50)->nullable();
            $table->text('drawn_under_value',50)->nullable();
            $table->text('port_of_loading_value',50)->nullable();
            $table->text('port_of_discharge_value',50)->nullable();
            $table->text('container_no_value',50)->nullable();
            $table->text('currency_value',50)->nullable();
            $table->text('term_of_delivery_value',50)->nullable();

            $table->text("total_net_weight_value",50)->nullable();
            $table->text("total_gr_weight_value",50)->nullable();
            $table->text("note_value")->nullable();

            $table->text("value_remarks")->nullable();
            $table->text("value_intermediary_bank")->default('HABIB AMERICAN BANK,N /Y BRANCH // FW026007362')->nullable();
            $table->text("value_intermediary_bank_swift_no")->default('HANYUS33XXX')->nullable();
            $table->text("value_intermediary_bank_ac_no")->default('BANK AL HABIB LIMITED & / 20729933')->nullable();
            $table->text("value_for_onword_credit_to")->default('TOWELLERS LIMITED, KARACHI-PAKISTAN')->nullable();
            $table->text("value_tw_ac_no")->default('5001-0081-018265-01-1')->nullable();
            $table->text("value_swift_no")->default('BAHLPKKAXXX')->nullable();
            $table->text("value_iban_no")->default(' PK46BAHL5001008101826501')->nullable();
            $table->text("value_bank_addrss")->default('BANK AL HABIB LTD ISLAMIC BANKING')->nullable();
            $table->text("value_bank_addrss_1")->default('SHAHRA-E-FAISAL BRANCH S # 4 & 5 BUSINESS CENTER, PLOT # 19-1-A')->nullable();
            $table->text("value_bank_addrss_2")->default('BLOCK-6 PECHS SHAHRA-E- FAISAL, KARACHI-PAKISTAN')->nullable();
            $table->text("value_statement_origin")->default(' THE EXPORTER M/S. TOWELLERS LIMITED,
            WSA – 30 & 31, BLOCK-1, FEDERAL ‘B’ AREA,
            KARACHI-75950, PAKISTAN. (REX NO: PKREXPK06768890)
            OF THE PRODUCTS COVERED BY THIS DOCUMENT
            DECLARES THAT, EXCEPT WHERE OTHERWISE 
            CLEARLY INDICATED, THESE PRODUCTS ARE OF 
            PAKISTAN PREFERENTIAL ORIGIN ACCORDING TO 
            RULES OF ORIGIN OF THE GENERALIZED SYSTEM OF
            PREFERENCES OF THE EUROPEAN UNION AND 
            THAT THE ORIGIN CRITERION MET IS “P”.')->nullable();
            $table->text("value_total_buyer_discount",50)->nullable();
            $table->text("value_total_less_commission",50)->nullable();
            $table->text("value_total_add_fright",50)->nullable();
            $table->text("value_total_net_amount_payable",50)->nullable();
            $table->text("value_currency_name",50)->nullable();
            $table->text("status",50)->default(0)->nullable();
            $table->string("pdf_upload_file_ic")->nullable();
         
            $table->text('team_user_id',50)->nullable();
          
            $table->text('commercial_invoice',50)->nullable();
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commercial_invoices');
    
    }

   
  
}
