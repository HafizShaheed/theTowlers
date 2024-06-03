@extends('admin.includes.master')



@section('addStyle')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
<style>
.file-upload {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    height: 200px;
    border: 2px dashed #ccc;
    border-radius: 5px;
    cursor: pointer;
}

.file-input {
    display: none;
}

.file-label {
    font-size: 1rem;
    font-weight: 600;
}

.file-label i {
    margin-bottom: 8px;
    font-size: 2rem;
}

.file-input:hover+.file-label,
.file-input:active+.file-label {
    background-color: #f5f5f5;
}

.custom-input {
    font-size: 12px;
    /* Set font size */
    height: 30px;
    /* Set input height */
}

.form-label {
    font-size: 12px;
    font-weight: 700;
    color: black;
}
</style>

@endsection
@section('content')




<!-- Firm Background form start -->

<div class="row" id="Firm-Background" class="Firm-Background-class-form-submit">
    <div class="card">
        <div class="card-body justify-content-start">
            <form id="firm-step-form" enctype="multipart/form-data">




                <h4 class="card-title"> {{strtoupper("Commercial Invioce Add")}} <br>
                    <span style="color:darkgray; font-size:12px;">Commercial Invioce</span>
                    <p style="color:rgb(236, 7, 7); font-size:12px;"> Note: Every Heading input field can be change according to the requirement </p>
                </h4>
                <div class="row">
                    <div class="col-sm-3 mb-3">
                        <label for="heading_invioce" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_invioce" name="heading_invioce" value="INVOICE. NO">
                        <input type="text" class="form-control custom-input" id="commercial_invoice" name="commercial_invoice"
                            value="">
                    </div>
                    
                 
                    <div class="col-sm-3 mb-3">
                        <label for="heading_shipper" class="form-label">Heading SHIPPER / MANUFACTURER</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_shipper" name="heading_shipper" value="SHIPPER / MANUFACTURER">
                        <input type="text" class="form-control custom-input" id="name_shipper" name="name_shipper" value="TOWELLERS LIMITED">
                        <input type="text" class="form-control custom-input" id="address_shipper" name="address_shipper" value="WSA 30-31 BLOCK 1, FEDERAL B AREA">
                        <input type="text" class="form-control custom-input" id="city_shipper" name="city_shipper" value="KARACHI">
                        <input type="text" class="form-control custom-input" id="country_shipper" name="country_shipper" value="PAKISTAN">
                        <input type="text" class="form-control custom-input" id="phone_shipper" name="phone_shipper" value="PHONE # +92-21-36314884">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="heading_buyer" class="form-label">Heading </label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_buyer" name="heading_buyer" value="BUYER:">
                        <input type="text" class="form-control custom-input" id="name_buyer" name="name_buyer" value="">
                        <input type="text" class="form-control custom-input" id="address_buyer" name="address_buyer" value="">
                        <input type="text" class="form-control custom-input" id="city_buyer" name="city_buyer" value="">
                        <input type="text" class="form-control custom-input" id="country_buyer" name="country_buyer" value="">
                        <input type="text" class="form-control custom-input" id="phone_buyer" name="phone_buyer" value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="heading_ship_to" class="form-label">Heading </label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_ship_to" name="heading_ship_to" value="SHIP TO:">
                        <input type="text" class="form-control custom-input" id="name_ship_to" name="name_ship_to" value="">
                        <input type="text" class="form-control custom-input" id="address_ship_to" name="address_ship_to" value="">
                        <input type="text" class="form-control custom-input" id="city_ship_to" name="city_ship_to" value="">
                        <input type="text" class="form-control custom-input" id="country_ship_to" name="country_ship_to" value="">
                        <input type="text" class="form-control custom-input" id="phone_ship_to" name="phone_ship_to" value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="heading_f_i_no" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_f_i_no" name="heading_f_i_no" value="F.I NO / GD #">
                        <input type="text" class="form-control custom-input" id="value_f_i_no" name="value_f_i_no"
                            value="">
                    </div>
                    
                    <div class="col-sm-3 mb-3">
                        <label for="heading_vessel" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_vessel" name="heading_vessel" value="VESSEL /FLIGHT">
                        <input type="text" class="form-control custom-input" id="vessel_value" name="vessel_value"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="heading_dated" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_dated" name="heading_dated" value="DATED">
                        <input type="text" class="form-control custom-input" id="dated" name="dated"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="heading_total_pkg" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_total_pkg" name="heading_total_pkg" value="TOTAL PKGS">
                        <input type="text" class="form-control custom-input" id="total_pkg_value" name="total_pkg_value"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="heading_contract_no" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_contract_no" name="heading_contract_no" value="CONTRACT NO">
                        <input type="text" class="form-control custom-input" id="contract_no_value" name="contract_no_value"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="heading_contract_date" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_contract_date" name="heading_contract_date" value="CONTRACT DATE">
                        <input type="text" class="form-control custom-input" id="contract_date_value" name="contract_date_value"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="heading_lc" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_lc" name="heading_lc" value="LC #">
                        <input type="text" class="form-control custom-input" id="lc_value" name="lc_value"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="heading_issue_date_lc" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_issue_date_lc" name="heading_issue_date_lc" value="ISSUE DATE (LC)">
                        <input type="text" class="form-control custom-input" id="lc_issue_date_value" name="lc_issue_date_value"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="heading_pyment_terms" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_pyment_terms" name="heading_pyment_terms" value="PAYMENT TERMS">
                        <input type="text" class="form-control custom-input" id="pyment_terms_value" name="pyment_terms_value"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="heading_drawn_at" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_drawn_at" name="heading_drawn_at" value="DRAWN AT:">
                        <input type="text" class="form-control custom-input" id="drawn_at_value" name="drawn_at_value"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="heading_drawn_under" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_drawn_under" name="heading_drawn_under" value="DRAWN UNDER:">
                        <input type="text" class="form-control custom-input" id="drawn_under_value" name="drawn_under_value"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="heading_part_of_loading" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_part_of_loading" name="heading_part_of_loading" value="PORT OF LOADING">
                        <input type="text" class="form-control custom-input" id="port_of_loading_value" name="port_of_loading_value"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="heading_part_of_discharge" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_part_of_discharge" name="heading_part_of_discharge" value="PORT OF DISCHARGE">
                        <input type="text" class="form-control custom-input" id="port_of_discharge_value" name="port_of_discharge_value"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="heading_container_no" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_container_no" name="heading_container_no" value="CONTAINER NO">
                        <input type="text" class="form-control custom-input" id="container_no_value" name="container_no_value"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="heading_currency" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_currency" name="heading_currency" value="CURRENCY">
                        <input type="text" class="form-control custom-input"  placeholder="Enter currency name e.g Doller" id="currency_value" name="currency_value"
                            value="">
                            <input type="text" class="form-control custom-input" placeholder="Enter currency symbol e.g $" id="currency_symbol" name="currency_symbol"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="heading_term_of_delivery" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_term_of_delivery" name="heading_term_of_delivery" value="TERM OF DELIVERY">
                        <input type="text" class="form-control custom-input" id="term_of_delivery_value" name="term_of_delivery_value"
                            value="">
                    </div>

                    <hr>
                    <b> TABLE CONTENT HERE : </b>
                    <br>
                    <div class="col-sm-3 mb-3">
                        <label for="heading_marks_no" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_marks_no" name="heading_marks_no" value="MARKS & NOS">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="heading_discription_of_goods" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_discription_of_goods" name="heading_discription_of_goods" value="DESCRIPTION OF GOODS">
                            <textarea name="discription_of_goods_value" id="" class="form-control"  rows="3"></textarea>
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="heading_quantity" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_quantity" name="heading_quantity" value="QTY">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="heading_prices" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_prices" name="heading_prices" value="PRICE US$">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="heading_total_amount" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_total_amount" name="heading_total_amount" value="TOTAL AMOUNT">
                    </div>

                  
                    <div class="col-sm-3 mb-3">
                        <label for="heading_performa_invioce_no" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_performa_invioce_no" name="heading_performa_invioce_no" value="PROFORMA INVOICE NO">
                        <input type="text" class="form-control custom-input" id="performa_invioce_no_value" name="performa_invioce_no_value"
                            value="">
                    </div>
                    <br>
                    @for ($i = 1; $i <= 10; $i++)
                    <div class="col-sm-3 mb-3">
                        <label for="heading_long_side_{{ $i }}" class="form-label">Heading {{ $i }}</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_long_side_{{ $i }}" name="heading_long_side_{{ $i }}" value="LEFT & RIGHT SIDES OF BOX ( LONG SIDES )">
                    </div>
                    @for ($j = 1; $j <= 10; $j++)
                        <div class="col-sm-3 mb-3">
                            <label for="long_side_value_{{ $i }}_{{ $j }}" class="form-label">Heading  second value{{ $j }}</label>
                            <input type="text" class="form-control custom-input mb-1" id="long_side_value_{{ $i }}_{{ $j }}" name="long_side_value_{{ $i }}_{{ $j }}" value="LEFT & RIGHT SIDES OF BOX ( LONG SIDES )">
                        </div>
                    @endfor
                @endfor
                
                


                    <hr>
                    <div class="col-sm-3 mb-3">
                        <label for="heading_total_net_weight" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_total_net_weight" name="heading_total_net_weight" value="TOTAL NET. WEIGHT:">
                        <input type="text" class="form-control custom-input" id="total_net_weight_value" name="total_net_weight_value"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="heading_total_gr_weight" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_total_gr_weight" name="heading_total_gr_weight" value="TOTAL GR. WEIGHT:">
                        <input type="text" class="form-control custom-input" id="total_gr_weight_value" name="total_gr_weight_value"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="heading_total_buyer_discount" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_total_buyer_discount" name="heading_total_buyer_discount" value="LESS 2% BUYER DISCOUNT">
                        <input type="text" class="form-control custom-input" id="value_total_buyer_discount" name="value_total_buyer_discount"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="heading_total_less_commission" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_total_less_commission" name="heading_total_less_commission" value="LESS COMMISSION">
                        <input type="text" class="form-control custom-input" id="value_total_less_commission" name="value_total_less_commission"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="heading_total_add_fright" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_total_add_fright" name="heading_total_add_fright" value="ADD FREIGHT">
                        <input type="text" class="form-control custom-input" id="value_total_add_fright" name="value_total_add_fright"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="heading_total_net_amount_payable" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_total_net_amount_payable" name="heading_total_net_amount_payable" value="NET AMOUNT PAYABLE">
                        <input type="text" class="form-control custom-input" id="value_total_net_amount_payable" name="value_total_net_amount_payable"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="heading_note" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_note" name="heading_note" value="Note:">
                        <input type="text" class="form-control custom-input" id="note_value" name="note_value"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="heading_remarks" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_remarks" name="heading_remarks" value="Remarks:">
                        <input type="text" class="form-control custom-input" id="value_remarks" name="value_remarks"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="heading_intermediary_bank" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_intermediary_bank" name="heading_intermediary_bank" value="INTERMEDIARY BANK:">
                        <input type="text" class="form-control custom-input" id="value_intermediary_bank" name="value_intermediary_bank"
                            value="HABIB AMERICAN BANK,N /Y BRANCH // FW026007362">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="heading_intermediary_bank_swift_no" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_intermediary_bank_swift_no" name="heading_intermediary_bank_swift_no" value="INTERMEDIARY BANK SWIFT NO:">
                        <input type="text" class="form-control custom-input" id="value_intermediary_bank_swift_no" name="value_intermediary_bank_swift_no"
                            value="HANYUS33XXX">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="heading_intermediary_bank_ac_no" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_intermediary_bank_ac_no" name="heading_intermediary_bank_ac_no" value="INTERMEDIARY BANK A/C NO:">
                        <input type="text" class="form-control custom-input" id="value_intermediary_bank_ac_no" name="value_intermediary_bank_ac_no"
                            value="BANK AL HABIB LIMITED & / 20729933">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="heading_for_onword_credit_to" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_for_onword_credit_to" name="heading_for_onword_credit_to" value="FOR ONWARD CREDIT TO:">
                        <input type="text" class="form-control custom-input" id="value_for_onword_credit_to" name="value_for_onword_credit_to"
                            value="TOWELLERS LIMITED, KARACHI-PAKISTAN">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="heading_tw_ac_no" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_tw_ac_no" name="heading_tw_ac_no" value="TOWELLERS LIMITED A/C NO:">
                        <input type="text" class="form-control custom-input" id="value_tw_ac_no" name="value_tw_ac_no"
                            value="5001-0081-018265-01-1">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="heading_swift_no" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_swift_no" name="heading_swift_no" value="SWIFT NO:">
                        <input type="text" class="form-control custom-input" id="value_swift_no" name="value_swift_no"
                            value="BAHLPKKAXXX">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="heading_iban_no" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_iban_no" name="heading_iban_no" value="IBAN NO:">
                        <input type="text" class="form-control custom-input" id="value_iban_no" name="value_iban_no"
                            value="PK46BAHL5001008101826501">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="heading_bank_addrss" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_bank_addrss" name="heading_bank_addrss" value="BANK ADDRESS:">
                        <input type="text" class="form-control custom-input" id="value_bank_addrss" name="value_bank_addrss"
                            value=" BANK AL HABIB LTD ISLAMIC BANKING
                            SHAHRA-E-FAISAL BRANCH S # 4 & 5 BUSINESS CENTER, PLOT # 19-1-A
                            BLOCK-6 PECHS SHAHRA-E- FAISAL, KARACHI-PAKISTAN">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="heading_statement_origin" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="heading_statement_origin" name="heading_statement_origin" value="STATEMENT ON ORIGIN">
                        <textarea name="value_statement_origin" id="value_statement_origin" class="form-control" rows="3">THE EXPORTER M/S. TOWELLERS LIMITED, WSA – 30 & 31, BLOCK-1, FEDERAL ‘B’ AREA, KARACHI-75950, PAKISTAN. (REX NO: PKREXPK06768890) OF THE PRODUCTS COVERED BY THIS DOCUMENT DECLARES THAT, EXCEPT WHERE OTHERWISE CLEARLY INDICATED, THESE PRODUCTS ARE OF PAKISTAN PREFERENTIAL ORIGIN ACCORDING TO RULES OF ORIGIN OF THE GENERALIZED SYSTEM OF PREFERENCES OF THE EUROPEAN UNION AND THAT THE ORIGIN CRITERION MET IS “P”.
                            </textarea>
                            
                    </div>
                   

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Heading</label>
                        <input type="text" class="form-control custom-input mb-1" id="exporter_name" name="exporter_name" value="FGD">
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>

                    



                </div>
            
                <hr>
            

                <div class="row">
                    <!-- =========== Director1 ============ -->
                    @for($i=1; $i <= 6; $i++) <div class="col-sm-4 mb-4">
                        <label for="marks_and_numbers_" class="form-label">Mark & Number </label>
                        <input type="text" class="form-control custom-input"
                            id="marks_and_numbers_{{ $i }}"
                            name="marks_and_numbers_{{ $i }}" value="">
                </div>

                <div class="col-sm-4 mb-4">
                    <label for="numbers_and_kinds_of_packges_{{ $i }}" class="form-label">Numbers and kinds of packges</label>
                    <input type="text" step="any" class="form-control custom-input" id="numbers_and_kinds_of_packges_{{ $i }}"
                        name="numbers_and_kinds_of_packges_{{ $i }}" value="">
                </div>
                <div class="col-sm-4 mb-4">
                    <label for="description_of_goods_{{ $i }}" class="form-label">Description of goods</label>
                    <input type="text" step="any" class="form-control custom-input" id="description_of_goods_{{ $i }}"
                        name="description_of_goods_{{ $i }}" value="">
                </div>

                <div class="col-sm-4 mb-4">
                    <label for="gross_weight_or_other_quantity_" class="form-label">Gross weight or other quantity</label>
                    <input type="number" step="any" class="form-control custom-input" id="gross_weight_or_other_quantity_{{ $i }}"
                        name="gross_weight_or_other_quantity_{{ $i }}" value="">
                </div>
                
                <div class="col-sm-4 mb-4">
                    <label for="county_of_origin_{{ $i }}" class="form-label">County of origin </label>
                    <input type="text" step="any" class="form-control custom-input" id="county_of_origin_{{ $i }}"
                        name="county_of_origin_{{ $i }}" value="">
                </div>
                <hr>

                @endfor
                <!-- =========== Director1 ============ -->
        </div>

        <div class="row">
            <div class="col-xl-6 d-flex justify-content-start">
                <button type="button" class="btn btn report-tab-unactive" id="firm-prev-4">Cancel</button>
            </div>
            <div class="col-xl-6 d-flex justify-content-end">
                <button type="submit" class="btn btn report-tab-active" id="firm-submit">Submit</button>
            </div>
        </div>


        <!-- firm background 4 step end ========================-->


        </form>
    </div>
</div>
</div>
<!-- Firm Background form end -->













@endsection

@section('addScript')

<script>
$(document).ready(function() {
    // firm background
    $('#firm-step-form').on('submit', function(e) {
        e.preventDefault();

        console.log('Form submitted');

        var formData = new FormData(this);


        $('#firm-submit').prop('disabled', true);

        $.ajax({
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            url: "{{ route('admin.submit_commercial_invoice') }}",
            data: formData,
            dataType: "json",
            processData: false, // important for FormData
            contentType: false, // important for FormData
            success: function(response) {
                console.log(response);

                Swal.fire({
                    title: "Success!",
                    text: response.message,
                    icon: "success",
                    confirmButtonText: "OK",
                    timer: 3000, // 3 seconds
                    timerProgressBar: true,
                    willClose: () => {
                        window.location.href =
                            "{{ route('admin.report_List_commercial_invoice') }}"

                    },
                });
            },
            error: function(error) {
                console.log(error);

                $('#firm-submit').prop('disabled', false);
            }
        });
    });



});
</script>



@endsection
