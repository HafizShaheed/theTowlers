@extends('team.includes.master')



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




                <h4 class="card-title"> {{strtoupper("Commercial Invioce Edit")}} <br>
                    {{-- <span style="color:darkgray; font-size:12px;">Commercial Invioce</span> --}}
                    <p style="color:rgb(236, 7, 7); font-size:12px;"> Note: Every Heading input field can be change according to the requirement </p>
                </h4>
                <div class="row">
                    <div class="col-sm-3 mb-3">
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700" class="form-control custom-input mb-1" id="heading_invioce" name="heading_invioce" value="{{ $CommercialInvoice['heading_invioce'] }}" style="font-weight: bold; color: #000;">
                        <input type="text" class="form-control custom-input" id="commercial_invoice" name="commercial_invoice"
                           value="{{ $CommercialInvoice['commercial_invoice'] }}">
                        <input type="hidden" class="form-control custom-input" id="id" name="id" value="{{ $id}}">
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mt-2" id="heading_dated" style="font-weight: bold; color: #000;" name="heading_dated"  value="{{ $CommercialInvoice['heading_dated'] }}">
                        <input type="text" class="form-control custom-input mt-1" id="dated" name="dated"
                           value="{{ $CommercialInvoice['dated'] }}">

                    </div>
                    
                 
                    <div class="col-sm-3 mb-3">
                       
                        <input type="text" class="form-control custom-input mb-1" id="heading_shipper" style="background-color: #616161; color:#000; font-weight: 700"  name="heading_shipper" value="{{ $CommercialInvoice['heading_shipper'] }}" style="font-weight: bold; color: #000;">
                        <input type="text" class="form-control custom-input" id="name_shipper" name="name_shipper" value="{{ $CommercialInvoice['name_shipper'] }}">
                        <input type="text" class="form-control custom-input" id="address_shipper" name="address_shipper" value="{{ $CommercialInvoice['address_shipper'] }}">
                        <input type="text" class="form-control custom-input" id="city_shipper" name="city_shipper"value="{{ $CommercialInvoice['city_shipper'] }}">
                        <input type="text" class="form-control custom-input" id="country_shipper" name="country_shipper" value="{{ $CommercialInvoice['country_shipper'] }}">
                        <input type="text" class="form-control custom-input" id="phone_shipper" name="phone_shipper" value="{{ $CommercialInvoice['phone_shipper'] }}">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_buyer" name="heading_buyer" value="BUYER:">
                        <input type="text" class="form-control custom-input" id="name_buyer" name="name_buyer" value="{{ $CommercialInvoice['name_buyer'] }}">
                        <input type="text" class="form-control custom-input" id="address_buyer" name="address_buyer" value="{{ $CommercialInvoice['address_buyer'] }}">
                        <input type="text" class="form-control custom-input" id="city_buyer" name="city_buyer" value="{{ $CommercialInvoice['city_buyer'] }}">
                        <input type="text" class="form-control custom-input" id="country_buyer" name="country_buyer" value="{{ $CommercialInvoice['country_buyer'] }}">
                        <input type="text" class="form-control custom-input" id="phone_buyer" name="phone_buyer" value="{{ $CommercialInvoice['phone_buyer'] }}">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_ship_to" style="font-weight: bold; color: #000;" name="heading_ship_to"  value="{{ $CommercialInvoice['heading_ship_to'] }}">
                        <input type="text" class="form-control custom-input" id="name_ship_to" name="name_ship_to"value="{{ $CommercialInvoice['name_ship_to'] }}">
                        <input type="text" class="form-control custom-input" id="address_ship_to" name="address_ship_to"value="{{ $CommercialInvoice['address_ship_to'] }}">
                        <input type="text" class="form-control custom-input" id="city_ship_to" name="city_ship_to"value="{{ $CommercialInvoice['city_ship_to'] }}">
                        <input type="text" class="form-control custom-input" id="country_ship_to" name="country_ship_to"value="{{ $CommercialInvoice['country_ship_to'] }}">
                        <input type="text" class="form-control custom-input" id="phone_ship_to" name="phone_ship_to"value="{{ $CommercialInvoice['phone_ship_to'] }}">
                    </div>
                   
                    <div class="col-sm-3 mb-3">
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_f_i_no" style="font-weight: bold; color: #000;" name="heading_f_i_no"  value="{{ $CommercialInvoice['heading_f_i_no'] }}">
                        <input type="text" class="form-control custom-input" id="value_f_i_no" name="value_f_i_no"
                           value="{{ $CommercialInvoice['value_f_i_no'] }}">
                    </div>
                    
                    <div class="col-sm-3 mb-3">
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_vessel" style="font-weight: bold; color: #000;" name="heading_vessel"  value="{{ $CommercialInvoice['heading_vessel'] }}">
                        <input type="text" class="form-control custom-input" id="vessel_value" name="vessel_value"
                           value="{{ $CommercialInvoice['vessel_value'] }}">
                    </div>
                    

                    <div class="col-sm-3 mb-3">
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_total_pkg"  style="font-weight: bold; color: #000;"  name="heading_total_pkg"  value="{{ $CommercialInvoice['heading_total_pkg'] }}">
                        <input type="text" class="form-control custom-input" id="total_pkg_value" name="total_pkg_value"
                           value="{{ $CommercialInvoice['total_pkg_value'] }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_contract_no"  style="font-weight: bold; color: #000;"  name="heading_contract_no"  value="{{ $CommercialInvoice['heading_contract_no'] }}">
                        <input type="text" class="form-control custom-input" id="contract_no_value" name="contract_no_value"
                           value="{{ $CommercialInvoice['contract_no_value'] }}">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_contract_date"  style="font-weight: bold; color: #000;"  name="heading_contract_date" value="{{ $CommercialInvoice['heading_contract_date'] }}">
                        <input type="text" class="form-control custom-input" id="contract_date_value" name="contract_date_value"
                           value="{{ $CommercialInvoice['contract_date_value'] }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_lc"  style="font-weight: bold; color: #000;"  name="heading_lc" value="{{ $CommercialInvoice['heading_lc'] }}">
                        <input type="text" class="form-control custom-input" id="lc_value" name="lc_value"
                           value="{{ $CommercialInvoice['lc_value'] }}">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_issue_date_lc"  style="font-weight: bold; color: #000;"  name="heading_issue_date_lc" value="{{ $CommercialInvoice['heading_issue_date_lc'] }}">
                        <input type="text" class="form-control custom-input" id="lc_issue_date_value" name="lc_issue_date_value"
                           value="{{ $CommercialInvoice['lc_issue_date_value'] }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_pyment_terms"  style="font-weight: bold; color: #000;"  name="heading_pyment_terms" value="{{ $CommercialInvoice['heading_pyment_terms'] }}">
                        <input type="text" class="form-control custom-input" id="pyment_terms_value" name="pyment_terms_value"
                           value="{{ $CommercialInvoice['pyment_terms_value'] }}">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <input type="text" class="form-control custom-input mb-1" id="heading_drawn_at"  style="font-weight: bold; color: #000;"  name="heading_drawn_at" value="{{ $CommercialInvoice['heading_drawn_at'] }}">
                        <input type="text" class="form-control custom-input" id="drawn_at_value" name="drawn_at_value"
                           value="{{ $CommercialInvoice['drawn_at_value'] }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_drawn_under"  style="font-weight: bold; color: #000;"  name="heading_drawn_under" value="{{ $CommercialInvoice['heading_drawn_under'] }}">
                        <input type="text" class="form-control custom-input" id="drawn_under_value" name="drawn_under_value"
                           value="{{ $CommercialInvoice['drawn_under_value'] }}">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_part_of_loading"  style="font-weight: bold; color: #000;"  name="heading_part_of_loading" value="{{ $CommercialInvoice['heading_part_of_loading'] }}">
                        <input type="text" class="form-control custom-input" id="port_of_loading_value" name="port_of_loading_value"
                           value="{{ $CommercialInvoice['port_of_loading_value'] }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_part_of_discharge"  style="font-weight: bold; color: #000;"  name="heading_part_of_discharge" value="{{ $CommercialInvoice['heading_part_of_discharge'] }}">
                        <input type="text" class="form-control custom-input" id="port_of_discharge_value" name="port_of_discharge_value"
                           value="{{ $CommercialInvoice['port_of_discharge_value'] }}">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_container_no"  style="font-weight: bold; color: #000;"  name="heading_container_no" value="{{ $CommercialInvoice['heading_container_no'] }}">
                        <input type="text" class="form-control custom-input" id="container_no_value" name="container_no_value"
                           value="{{ $CommercialInvoice['container_no_value'] }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_currency"  style="font-weight: bold; color: #000;"  name="heading_currency" value="{{ $CommercialInvoice['heading_currency'] }}">
                        <input type="text" class="form-control custom-input"  placeholder="Enter currency name e.g Doller" id="currency_value" name="currency_value"
                           value="{{ $CommercialInvoice['currency_value'] }}">
                            <input type="text" class="form-control custom-input" placeholder="Enter currency symbol e.g $" id="currency_symbol" name="currency_symbol"
                           value="{{ $CommercialInvoice['currency_symbol'] }}">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_term_of_delivery"  style="font-weight: bold; color: #000;"  name="heading_term_of_delivery" value="{{ $CommercialInvoice['heading_term_of_delivery'] }}">
                        <input type="text" class="form-control custom-input" id="term_of_delivery_value" name="term_of_delivery_value"
                           value="{{ $CommercialInvoice['term_of_delivery_value'] }}">
                    </div>

                    <hr>
                    <b> TABLE CONTENT HERE : </b>
                    <br>
                    <div class="col-sm-3 mb-3">
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_marks_no"  style="font-weight: bold; color: #000;"  name="heading_marks_no" value="{{ $CommercialInvoice['heading_marks_no']}}">
                    </div>
                    <br>
                    <div style=" "  class="row mb-2">
                        @for ($i = 1; $i <= 5; $i++)
                            <div class="accordion accordion-header-bg accordion-bordered mt-3" id="accordion-seven">
                                <div class="accordion-item">
                                    <div class="accordion-header rounded-lg" id="accord-7One-{{ $i }}" data-bs-toggle="collapse" data-bs-target="#collapse7One-{{ $i }}" aria-controls="collapse7One-{{ $i }}" aria-expanded="false" role="button">
                                        <span class="accordion-header-icon"></span>
                                        <label class="accordion-header-text">MARKS & NOS {{ $i }}</label>
                                        <span class="accordion-header-indicator"></span>
                                    </div>
                                    <div id="collapse7One-{{ $i }}" class="collapse accordion__body @if(isset($CommercialInvoice['heading_long_side_' . $i]) || 
                                                        isset($CommercialInvoice['heading_po_number_' . $i]) || 
                                                        isset($CommercialInvoice['heading_po_number_value_' . $i]) || 
                                                        isset($CommercialInvoice['heading_style_name_' . $i]) || 
                                                        isset($CommercialInvoice['heading_style_name_value_' . $i]) || 
                                                        isset($CommercialInvoice['heading_style_number_' . $i]) || 
                                                        isset($CommercialInvoice['heading_style_number_value_' . $i]) || 
                                                        isset($CommercialInvoice['heading_color_left_column_' . $i]) || 
                                                        isset($CommercialInvoice['heading_color_left_column_value_' . $i]) || 
                                                        isset($CommercialInvoice['heading_size_break_down_' . $i]) || 
                                                        isset($CommercialInvoice['heading_size_break_down_value_' . $i]) || 
                                                        isset($CommercialInvoice['heading_carton_count_' . $i]) || 
                                                        isset($CommercialInvoice['heading_carton_count_value_' . $i]) || 
                                                        isset($CommercialInvoice['heading_carton_size_' . $i]) || 
                                                        isset($CommercialInvoice['heading_carton_size_value_' . $i]) || 
                                                        isset($CommercialInvoice['heading_bale_left_column_' . $i]) || 
                                                        isset($CommercialInvoice['heading_bale_left_column_value_' . $i]) || 
                                                        isset($CommercialInvoice['heading_net_weight_left_column_' . $i]) || 
                                                        isset($CommercialInvoice['heading_gross_weight_left_column_' . $i])
                                                    ) 
                                                    show 
                                                @endif" aria-labelledby="accord-7One-{{ $i }}">
                                        <div class="accordion-body-text">
                                            <div class="col-sm-3 mb-3 pt-2">
                                                <input type="text" class="form-control custom-input mb-1" id="heading_long_side_{{ $i }}"  name="heading_long_side_{{ $i }}" value="{{ $CommercialInvoice['heading_long_side_' . $i]}}">
                                            </div>
                                            <div class="col-sm-3 mb-3">
                                            
                                                <input type="text"  class="form-control custom-input mb-1" id="heading_po_number_{{ $i }}"    name="heading_po_number_{{ $i }}" value="{{ $CommercialInvoice['heading_po_number_' . $i]}}">
                                                <input type="text" class="form-control custom-input mb-1" id="heading_po_number_value_{{ $i }}" name="heading_po_number_value_{{ $i }}" value="{{ $CommercialInvoice['heading_po_number_value_' . $i]}}" >
                                            </div>
                                            <div class="col-sm-3 mb-3">
                                                <input type="text"  class="form-control custom-input mb-1" id="heading_style_name_{{ $i }}" name="heading_style_name_{{ $i }}" value="{{ $CommercialInvoice['heading_style_name_' . $i]}}">
                                                <input type="text" class="form-control custom-input mb-1" id="heading_style_name_value_{{ $i }}" name="heading_style_name_value_{{ $i }}" value="{{ $CommercialInvoice['heading_style_name_value_' . $i]}}" >
                                            </div>
                                            <div class="col-sm-3 mb-3">
                                                <input type="text"  class="form-control custom-input mb-1" id="heading_style_number_{{ $i }}" name="heading_style_number_{{ $i }}"  value="{{ $CommercialInvoice['heading_style_number_' . $i]}}">
                                                <input type="text" class="form-control custom-input mb-1" id="heading_style_number_value_{{ $i }}" name="heading_style_number_value_{{ $i }}" value="{{ $CommercialInvoice['heading_style_number_value_' . $i]}}" >
                                            </div>
                                            <div class="col-sm-3 mb-3">
                                                <input type="text"  class="form-control custom-input mb-1" id="heading_color_left_column_{{ $i }}" name="heading_color_left_column_{{ $i }}"  value="{{ $CommercialInvoice['heading_color_left_column_' . $i]}}">
                                                <input type="text" class="form-control custom-input mb-1" id="heading_color_left_column_value_{{ $i }}" name="heading_color_left_column_value_{{ $i }}" value="{{ $CommercialInvoice['heading_color_left_column_value_' . $i]}}" >
                                            </div>
                                            <div class="col-sm-3 mb-3">
                                                <input type="text"  class="form-control custom-input mb-1" id="heading_size_break_down_{{ $i }}" name="heading_size_break_down_{{ $i }}"  value="{{ $CommercialInvoice['heading_size_break_down_' . $i]}}">
                                                <input type="text" class="form-control custom-input mb-1" id="heading_size_break_down_value_{{ $i }}" name="heading_size_break_down_value_{{ $i }}" value="{{ $CommercialInvoice['heading_size_break_down_value_' . $i]}}" >
                                            </div>
                
                                            <div class="col-sm-3 mb-3">
                                                <input type="text"  class="form-control custom-input mb-1" id="heading_carton_count_{{ $i }}" name="heading_carton_count_{{ $i }}"  value="{{ $CommercialInvoice['heading_carton_count_' . $i]}}">
                                                <input type="text" class="form-control custom-input mb-1" id="heading_carton_count_value_{{ $i }}" name="heading_carton_count_value_{{ $i }}" value="{{ $CommercialInvoice['heading_carton_count_value_' . $i]}}" >
                                            </div>
                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                                
                    
                    </div>
                    
                   


                            <br>
                            <div class="col-sm-3 mb-3 ">
                                <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_discription_of_goods"  style="font-weight: bold; color: #000;"  name="heading_discription_of_goods" value="{{ $CommercialInvoice['heading_discription_of_goods']}}" >
                            </div>
                            <div class="col-sm-3 mb-3">
                                <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_quantity"  style="font-weight: bold; color: #000;"  name="heading_quantity" value="{{ $CommercialInvoice['heading_quantity']}}">
                            </div>

                            <div class="col-sm-3 mb-3">
                                <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_prices"  style="font-weight: bold; color: #000;"  name="heading_prices" value="{{ $CommercialInvoice['heading_prices']}}">
                            </div>
                            <div class="col-sm-3 mb-3">
                                <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_total_amount"  style="font-weight: bold; color: #000;"  name="heading_total_amount" value="{{ $CommercialInvoice['heading_total_amount']}}">
                            </div>

                        <br>
                        <hr>
                        <div class="col-sm-3 mb-3">
                        

                            <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_performa_invioce_no"  style="font-weight: bold; color: #000;"  name="heading_performa_invioce_no" value="{{ $CommercialInvoice['heading_performa_invioce_no']}}">
                            <input type="text" class="form-control custom-input" id="performa_invioce_no_value" name="performa_invioce_no_value" value="{{ $CommercialInvoice['performa_invioce_no_value']}}">
                        </div>
                        <br>
                        <hr>
                  @for ($i = 1; $i <= 35; $i++)


                    <div class="accordion accordion-header-bg accordion-bordered mt-2" id="accordion-seven">
                        <div class="accordion-item">
                            <div class="accordion-header rounded-lg" id="accord-7One-{{ $i }}" data-bs-toggle="collapse" data-bs-target="#collapse7One-{{ $i }}" aria-controls="collapse7One-{{ $i }}" aria-expanded="false" role="button">
                                <span class="accordion-header-icon"></span>
                                <label for="heading_po_{{ $i }}" class="form-label">{{ $i }} - DESCRIPTION OF GOODS</label>
                                <span class="accordion-header-indicator"></span>
                            </div>
                                <div id="collapse7One-{{ $i }}" class="collapse {{ isset($CommercialInvoice['value_po_' . $i]) || isset($CommercialInvoice['carron_bales_pallets_value_' . $i]) || isset($CommercialInvoice['pcs_pack_pallet_per_value_' . $i]) ? 'show' : '' }}" aria-labelledby="accord-7One-{{ $i }}">

                                <div class="row d-flex justify-content-between mt-2">

                                                    
                        </label>
                        <div class="col-sm-3 mb-3">
                            
                            <input type="text" style="background-color: #616161; color:#000; font-weight: 700" class="form-control custom-input mb-1" id="heading_po_{{ $i }}"  style="font-weight: bold; color: #000;"  name="heading_po_{{ $i }}"  value="{{ $CommercialInvoice['heading_po_' . $i]}}">
                            <input type="text" class="form-control custom-input mb-1" id="value_po_{{ $i }}" name="value_po_{{ $i }}" value="{{ $CommercialInvoice['value_po_' . $i]}}" placeholder="Enter PO">
                        </div>

                        <div class="col-sm-3 mb-3">
                            <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_cotton_{{ $i }}"  style="font-weight: bold; color: #000;"  name="heading_cotton_{{ $i }}"  value="{{ $CommercialInvoice['heading_cotton_' . $i]}}">
                        </div>
                        <div class="col-sm-3 mb-3">
                            <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_seahorse_{{ $i }}"  style="font-weight: bold; color: #000;"  name="heading_seahorse_{{ $i }}"  value="{{ $CommercialInvoice['heading_seahorse_' . $i]}}">
                        </div>
                        <div class="col-sm-3 mb-3">
                            <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_terry_{{ $i }}"  style="font-weight: bold; color: #000;"  name="heading_terry_{{ $i }}"  value="{{ $CommercialInvoice['heading_terry_' . $i]}}">
                        </div>

                            <div class="col-sm-3 mb-3">
                                <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_carron_bales_pallets_{{ $i }}"  style="font-weight: bold; color: #000;"  name="heading_carron_bales_pallets_{{ $i }}"  value="{{ $CommercialInvoice['heading_carron_bales_pallets_' . $i]}}">
                                <input type="text" class="form-control custom-input mb-1" id="carron_bales_pallets_value_{{ $i }}" name="carron_bales_pallets_value_{{ $i }}" value="{{ $CommercialInvoice['carron_bales_pallets_value_' . $i]}}" placeholder="Eneter any value CARONS/BALES/PALLETS">
                            </div>
                            <div class="col-sm-3 mb-3">
                                <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_pcs_pack_pallet_per_{{ $i }}"  style="font-weight: bold; color: #000;"  name="heading_pcs_pack_pallet_per_{{ $i }}"  value="{{ $CommercialInvoice['heading_pcs_pack_pallet_per_' . $i]}}">
                                <input type="text" class="form-control custom-input mb-1" id="pcs_pack_pallet_per_value_{{ $i }}" name="pcs_pack_pallet_per_value_{{ $i }}" value="{{ $CommercialInvoice['pcs_pack_pallet_per_value_' . $i]}}" placeholder="Enter any value pcs/pack/pallet per value">
                            </div>

                            <br>
                            <hr>
                            <div class="col-sm-3 mb-3">
                                <input type="text"  style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_color_{{ $i }}"  style="font-weight: bold; color: #000;"  name="heading_color_{{ $i }}"  value="{{ $CommercialInvoice['heading_color_' . $i]}}">
                            </div>
                            <div class="col-sm-3 mb-3">
                                <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_sku_no_{{ $i }}"  style="font-weight: bold; color: #000;"  name="heading_sku_no_{{ $i }}" value="{{ $CommercialInvoice['heading_sku_no_' . $i]}}">
                            </div>
                            <div class="col-sm-2 mb-3">
                                <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_ean_no_{{ $i }}"  style="font-weight: bold; color: #000;"  name="heading_ean_no_{{ $i }}"  value="{{ $CommercialInvoice['heading_ean_no_' . $i]}}">
                            </div>
                            <div class="col-sm-2 mb-3">
                                <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_sku_hash_{{ $i }}"  style="font-weight: bold; color: #000;"  name="heading_sku_hash_{{ $i }}"  value="{{ $CommercialInvoice['heading_sku_hash_' . $i]}}">
                            </div>
                            <div class="col-sm-2 mb-3">
                                <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_style_{{ $i }}"  style="font-weight: bold; color: #000;"  name="heading_style_{{ $i }}"  value="{{ $CommercialInvoice['heading_style_' . $i]}}">
                            </div>
                            
                            <br>
                            <hr>
                        @for ($j = ($i - 1) * 10 + 1; $j <= $i * 10; $j++)

                            <div class="accordion accordion-header-bg accordion-bordered mt-2" id="accordion-seven">
                                <div class="accordion-item">
                                    <div class="accordion-header rounded-lg" id="accord-7One-{{ $j.$i }}" data-bs-toggle="collapse" data-bs-target="#collapse7One-{{ $j.$i }}" aria-controls="collapse7One-{{ $j.$i }}" aria-expanded="false" role="button">
                                        <span class="accordion-header-icon"></span>
                                        <label class="accordion-header-text">{{ $j }} - Quntity & Price </label>
                                        <span class="accordion-header-indicator"></span>
                                    </div>
                                    <div id="collapse7One-{{ $j.$i }}" class="collapse 

                                                @if( isset($CommercialInvoice['color_name_second_column_value_' . $j]) || 
                                                        isset($CommercialInvoice['sku_no_second_column_value_' . $j]) || 
                                                        isset($CommercialInvoice['ean_no_second_column_value_' . $j]) || 
                                                        isset($CommercialInvoice['sku_hash_no_second_column_value_' . $j]) || 
                                                        isset($CommercialInvoice['style_no_second_column_value_' . $j]) ||
                                                        isset($CommercialInvoice['quantity_third_column_value_' . $j]) ||
                                                        isset($CommercialInvoice['quantity_unit_third_column_value_' . $j]) ||
                                                        isset($CommercialInvoice['price_third_column_value_' . $j]) ||
                                                        isset($CommercialInvoice['total_amount_third_column_value_' . $j]) ) 
                                                    show 
                                                @endif

                                             " aria-labelledby="accord-7One-{{ $j.$i }}">
                                        <div class="row d-flex justify-content-between mt-2">

                                        
                                            <div class="col-sm-3 mb-3">
                                                <input type="text" class="form-control custom-input mb-1" id="color_name_second_column_value_{{ $j }}"  name="color_name_second_column_value_{{ $j }}" placeholder="Color name {{ $j }}" value="{{ $CommercialInvoice['color_name_second_column_value_' . $j]}}">
                                            </div>
                                            <div class="col-sm-3 mb-3">
                                                <input type="text" class="form-control custom-input mb-1" id="sku_no_second_column_value_{{ $j }}" name="sku_no_second_column_value_{{ $j }}" placeholder="SKU No {{ $j }}" value="{{ $CommercialInvoice['sku_no_second_column_value_' . $j]}}">
                                            </div> 
                                            <div class="col-sm-2 mb-3">
                                                <input type="text" class="form-control custom-input mb-1" id="ean_no_second_column_value_{{ $j }}" name="ean_no_second_column_value_{{ $j }}" placeholder="EAN No {{ $j }}" value="{{ $CommercialInvoice['ean_no_second_column_value_' . $j]}}">
                                            </div>
                                            <div class="col-sm-2 mb-3">
                                                <input type="text" class="form-control custom-input mb-1" id="sku_hash_no_second_column_value_{{ $j }}" name="sku_hash_no_second_column_value_{{ $j }}" placeholder="SKU HASH {{ $j }}" value="{{ $CommercialInvoice['sku_hash_no_second_column_value_' . $j]}}">
                                            </div>
                                            <div class="col-sm-2 mb-3">
                                                <input type="text" class="form-control custom-input mb-1" id="style_no_second_column_value_{{ $j }}" name="style_no_second_column_value_{{ $j }}" placeholder="Style No {{ $j }}" value="{{ $CommercialInvoice['style_no_second_column_value_' . $j]}}">
                                            </div> 
                                        
                                            <div class="row mb-3" data-index="{{ $j }}">
                                                <div class="col-sm-3 mb-3">
                                                    <input type="number" step="any" class="form-control custom-input mb-1 quantity" id="quantity_third_column_value_{{ $j }}" name="quantity_third_column_value_{{ $j }}" placeholder="QTY {{ $j }}" value="{{ $CommercialInvoice['quantity_third_column_value_' . $j]}}">
                                                </div>
                                                <div class="col-sm-3 mb-3">
                                                    <input type="text" class="form-control custom-input mb-1 quantity" id="quantity_unit_third_column_value_{{ $j }}" name="quantity_unit_third_column_value_{{ $j }}" placeholder="QTY  unit {{ $j }}" value="{{ $CommercialInvoice['quantity_unit_third_column_value_' . $j]}}">
                                                </div>
                                                <div class="col-sm-2 mb-3">
                                                    <input type="number" step="any" class="form-control custom-input mb-1 price" id="price_third_column_value_{{ $j }}" name="price_third_column_value_{{ $j }}" placeholder="Price {{ $j }}" value="{{ $CommercialInvoice['price_third_column_value_' . $j]}}">
                                                </div>
                                                <div class="col-sm-3 mb-3">
                                                    <input type="text" class="form-control custom-input mb-1 total" id="total_amount_third_column_value_{{ $j }}" name="total_amount_third_column_value_{{ $j }}" placeholder="total {{ $j }}" value="{{ $CommercialInvoice['total_amount_third_column_value_' . $j]}}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        @endfor

                            <br>
                            <hr>
                            <div class="col-sm-3 mb-3">
                                <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_net_weight_second_column_{{ $i }}" name="heading_net_weight_second_column_{{ $i }}" style="font-weight: bold; color: #000;" value="{{ $CommercialInvoice['heading_net_weight_second_column_' . $i]}}">
                                <input type="text" class="form-control custom-input mb-1" id="net_weight_second_column_value_{{ $i }}" name="net_weight_second_column_value_{{ $i }}" value="{{ $CommercialInvoice['net_weight_second_column_value_' . $i]}}" placeholder="ENTER Net weight#: (second column ) ">
                                
                            </div>
                            <div class="col-sm-3 mb-3">
                                <input type="text" style="background-color: #616161; color:#000; font-weight: 700"  class="form-control custom-input mb-1" id="heading_gross_weight_second_column_{{ $i }}" name="heading_gross_weight_second_column_{{ $i }}" style="font-weight: bold; color: #000;" value="GROSS WEIGHT:" value="{{ $CommercialInvoice['heading_gross_weight_second_column_' . $i]}}">
                                <input type="text" class="form-control custom-input mb-1" id="gross_weight_second_column_value_{{ $i }}" name="gross_weight_second_column_value_{{ $i }}" value="{{ $CommercialInvoice['gross_weight_second_column_value_' . $i]}}" placeholder="ENTER gross weight#: (second column ) ">
                            
                            </div>
                            <hr>
                            <br>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    



                   
                  @endfor
                 
                    <div class="col-sm-3 mb-3">
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700" class="form-control custom-input mb-1" id="heading_total_net_weight" style="font-weight: bold; color: #000;" name="heading_total_net_weight" value="{{ $CommercialInvoice['heading_total_net_weight']}}">
                        {{-- <input type="text" class="form-control custom-input" id="total_net_weight_value" name="total_net_weight_value" value="{{ $CommercialInvoice['total_net_weight_value']}}"> --}}
                    </div>
                    <div class="col-sm-3 mb-3">
                        
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700" class="form-control custom-input mb-1" id="heading_total_gr_weight" style="font-weight: bold; color: #000;" name="heading_total_gr_weight" value="{{ $CommercialInvoice['heading_total_gr_weight']}}">
                        {{-- <input type="text" class="form-control custom-input" id="total_gr_weight_value" name="total_gr_weight_value" value="{{ $CommercialInvoice['total_gr_weight_value']}}"> --}}
                    </div>




                    <div class="col-sm-3 mb-3">
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700" class="form-control custom-input mb-1" id="heading_total_buyer_discount"  style="font-weight: bold; color: #000;"  name="heading_total_buyer_discount" value="{{ $CommercialInvoice['heading_total_buyer_discount'] }}">
                        <input type="number" step="any"  class="form-control custom-input total_buyer_discount" id="value_total_buyer_discount" name="value_total_buyer_discount"
                           value="{{ $CommercialInvoice['value_total_buyer_discount'] }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700" class="form-control custom-input mb-1" id="heading_total_less_commission"  style="font-weight: bold; color: #000;"  name="heading_total_less_commission" value="{{ $CommercialInvoice['heading_total_less_commission'] }}"">
                        <input type="text" class="form-control custom-input total_less_commission" id="value_total_less_commission" name="value_total_less_commission"
                           value="{{ $CommercialInvoice['value_total_less_commission'] }}">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700" class="form-control custom-input mb-1" id="heading_total_add_fright"  style="font-weight: bold; color: #000;"  name="heading_total_add_fright" value="{{ $CommercialInvoice['heading_total_add_fright'] }}">
                        <input type="text" class="form-control custom-input total_add_fright" id="value_total_add_fright" name="value_total_add_fright"
                           value="{{ $CommercialInvoice['value_total_add_fright'] }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700" class="form-control custom-input mb-1" id="heading_total_net_amount_payable"  style="font-weight: bold; color: #000;"  name="heading_total_net_amount_payable" value="{{ $CommercialInvoice['heading_total_net_amount_payable'] }}">
                        <input type="text" class="form-control custom-input total_net_amount_payable" id="value_total_net_amount_payable" name="value_total_net_amount_payable"
                           value="{{ $CommercialInvoice['value_total_net_amount_payable'] }}">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700" class="form-control custom-input mb-1" id="heading_note"  style="font-weight: bold; color: #000;"  name="heading_note" value="{{ $CommercialInvoice['heading_note'] }}"">
                        <input type="text" class="form-control custom-input" id="note_value" name="note_value"
                           value="{{ $CommercialInvoice['note_value'] }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <input type="text" style="background-color: #616161; color:#000; font-weight: 700" class="form-control custom-input mb-1" id="heading_remarks"  style="font-weight: bold; color: #000;"  name="heading_remarks" value="{{ $CommercialInvoice['heading_remarks'] }}">
                        <input type="text" class="form-control custom-input" id="value_remarks" name="value_remarks"
                           value="{{ $CommercialInvoice['value_remarks'] }}">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <input type="text" class="form-control custom-input mb-1" id="heading_intermediary_bank"  style="font-weight: bold; color: #000;"  name="heading_intermediary_bank" value="{{ $CommercialInvoice['heading_intermediary_bank'] }}">
                        <input type="text" class="form-control custom-input" id="value_intermediary_bank" name="value_intermediary_bank"
                        value="{{ $CommercialInvoice['value_intermediary_bank'] }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <input type="text" class="form-control custom-input mb-1" id="heading_intermediary_bank_swift_no"  style="font-weight: bold; color: #000;"  name="heading_intermediary_bank_swift_no" value="{{ $CommercialInvoice['heading_intermediary_bank_swift_no'] }}">
                        <input type="text" class="form-control custom-input" id="value_intermediary_bank_swift_no" name="value_intermediary_bank_swift_no"
                        value="{{ $CommercialInvoice['value_intermediary_bank_swift_no'] }}">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <input type="text" class="form-control custom-input mb-1" id="heading_intermediary_bank_ac_no"  style="font-weight: bold; color: #000;"  name="heading_intermediary_bank_ac_no" value="{{ $CommercialInvoice['heading_intermediary_bank_ac_no'] }}">
                        <input type="text" class="form-control custom-input" id="value_intermediary_bank_ac_no" name="value_intermediary_bank_ac_no"
                        value="{{ $CommercialInvoice['value_intermediary_bank_ac_no'] }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <input type="text" class="form-control custom-input mb-1" id="heading_for_onword_credit_to"  style="font-weight: bold; color: #000;"  name="heading_for_onword_credit_to" value="{{ $CommercialInvoice['heading_for_onword_credit_to'] }}">
                        <input type="text" class="form-control custom-input" id="value_for_onword_credit_to" name="value_for_onword_credit_to"
                        value="{{ $CommercialInvoice['value_for_onword_credit_to'] }}">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <input type="text" class="form-control custom-input mb-1" id="heading_tw_ac_no"  style="font-weight: bold; color: #000;"  name="heading_tw_ac_no" value="{{ $CommercialInvoice['heading_tw_ac_no'] }}">
                        <input type="text" class="form-control custom-input" id="value_tw_ac_no" name="value_tw_ac_no"
                        value="{{ $CommercialInvoice['value_tw_ac_no'] }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <input type="text" class="form-control custom-input mb-1" id="heading_swift_no"  style="font-weight: bold; color: #000;"  name="heading_swift_no" value="{{ $CommercialInvoice['heading_swift_no'] }}">
                        <input type="text" class="form-control custom-input" id="value_swift_no" name="value_swift_no"
                        value="{{ $CommercialInvoice['value_swift_no'] }}">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <input type="text" class="form-control custom-input mb-1" id="heading_iban_no"  style="font-weight: bold; color: #000;"  name="heading_iban_no" value="{{ $CommercialInvoice['heading_iban_no'] }}">
                        <input type="text" class="form-control custom-input" id="value_iban_no" name="value_iban_no"
                        value="{{ $CommercialInvoice['value_iban_no'] }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <input type="text" class="form-control custom-input mb-1" id="heading_bank_addrss"  style="font-weight: bold; color: #000;"  name="heading_bank_addrss" value="{{ $CommercialInvoice['heading_bank_addrss'] }}">
                        <input type="text" class="form-control custom-input" id="value_bank_addrss" name="value_bank_addrss"
                        value="{{ $CommercialInvoice['value_bank_addrss'] }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <input type="text" class="form-control custom-input mb-1" id="heading_bank_addrss"  style="font-weight: bold; color: #000;"  name="heading_bank_addrss" value="{{ $CommercialInvoice['heading_bank_addrss'] }}">
                        <input type="text" class="form-control custom-input" id="value_bank_addrss_1" name="value_bank_addrss_1"
                        value="{{ $CommercialInvoice['value_bank_addrss_1'] }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <input type="text" class="form-control custom-input mb-1" id="heading_bank_addrss"  style="font-weight: bold; color: #000;"  name="heading_bank_addrss" value="{{ $CommercialInvoice['heading_bank_addrss'] }}">
                        <input type="text" class="form-control custom-input" id="value_bank_addrss_2" name="value_bank_addrss_2"
                        value="{{ $CommercialInvoice['value_bank_addrss_2'] }}">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <input type="text" class="form-control custom-input mb-1" id="heading_statement_origin"  style="font-weight: bold; color: #000;"  name="heading_statement_origin" value="{{ $CommercialInvoice['heading_statement_origin'] }}">
                        <textarea name="value_statement_origin" id="value_statement_origin" class="form-control" rows="3">{{ $CommercialInvoice['value_statement_origin'] }} </textarea>
                            
                    </div>
                   

                 

                    



                </div>
            
                <hr>
            

                <hr>


                <div class="row">
                    <div class="col-sm-3 mb-3">
                        <label for="heading_bank_addrss" class="form-label">PDF Upload</label>
                        <input type="file" class="form-control custom-input" id="pdf_upload_file_ic" name="pdf_upload_file_ic" value="{{ $CommercialInvoice['pdf_upload_file_ic']}}">
                    </div>
                </div>

        <div class="row">
            <div class="col-xl-6 d-flex justify-content-start">
                <button type="button" class="btn btn report-tab-unactive" id="firm-prev-4">Cancel</button>
            </div>
            <div class="col-xl-6 d-flex justify-content-end">
                <button type="submit" class="btn btn report-tab-active" id="firm-submit">Save</button>
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

    // function calculateTotal() {
      
    //             $('div.row[data-index]').each(function() {
    //                 var $row = $(this);
    //                 var quantity = parseFloat($row.find('input.quantity').val()) || 0;
    //                 var price = parseFloat($row.find('input.price').val()) || 0;
    //                 var total = quantity * price;
    //                 $row.find('input.total').val(total.toFixed(2));
                   
    //                 grandTotal += value;
    //             });

    //         }
           

    //         $(document).on('input', 'input.quantity, input.price', function() {
    //             calculateTotal();
 

    //         });

//     function calculateTotal() {
//     var grandTotal = 0; // Initialize grand total

//     $('div.row[data-index]').each(function() {
//         var $row = $(this);
//         var quantity = parseFloat($row.find('input.quantity').val()) || 0;
//         var price = parseFloat($row.find('input.price').val()) || 0;
//         var total = quantity * price;
//         $row.find('input.total').val(total.toFixed(2));

//         grandTotal += total; // Add row total to grand total
//     });

//     $('#grand_total').val(grandTotal.toFixed(2)); // Update grand total input field
// }

// $(document).on('input', 'input.quantity, input.price', function() {
//     calculateTotal();
// });

// console.log(grandTotal, 'grand');
//     // firm background


  
//     console.log(grandTotal,'grandTotal');
//     function calculateNetAbleAMount(){
//         var value_total_buyer_discount = parseFloat($('#value_total_buyer_discount').val()) || 0;
//         var value_total_less_commission = parseFloat($('#value_total_less_commission').val()) || 0;
//         var value_total_add_fright = parseFloat($('#value_total_add_fright').val()) || 0;

//         var netAbleAMount = (grandTotal + value_total_add_fright ) - (value_total_less_commission + value_total_buyer_discount);
//         console.log(netAbleAMount,'netAbleAMount');
//         var total_net_amount_payable = parseFloat($('#value_total_net_amount_payable').val(netAbleAMount.toFixed(2))) || 0;
//     console.log(total_net_amount_payable,'total_net_amount_payable');
//     }

//     $(document).on('input', 'input.total_buyer_discount, input.total_less_commission, input.total_add_fright', function() {
//                 calculateNetAbleAMount();
//             });


// JavaScript Code
var grandTotal = 0; // Declare grandTotal as a global variable

function calculateTotal() {
    grandTotal = 0; // Reset grand total

    $('div.row[data-index]').each(function() {
        var $row = $(this);
        var quantity = parseFloat($row.find('input.quantity').val()) || 0;
        var price = parseFloat($row.find('input.price').val()) || 0;
        var total = quantity * price;
        $row.find('input.total').val(total.toFixed(2));

        grandTotal += total; // Add row total to grand total
    });

    $('#grand_total').val(grandTotal.toFixed(2)); // Update grand total input field
    calculateNetAbleAmount(); // Calculate net amount whenever total is calculated
}

$(document).on('input', 'input.quantity, input.price', function() {
    calculateTotal();
});

console.log(grandTotal, 'grand');

function calculateNetAbleAmount() {
    var value_total_buyer_discount = parseFloat($('#value_total_buyer_discount').val()) || 0;
    var value_total_less_commission = parseFloat($('#value_total_less_commission').val()) || 0;
    var value_total_add_fright = parseFloat($('#value_total_add_fright').val()) || 0;

    var netAbleAmount = (grandTotal + value_total_add_fright) - (value_total_less_commission + value_total_buyer_discount);
    console.log(netAbleAmount, 'netAbleAmount');
    var total_net_amount_payable = parseFloat($('#value_total_net_amount_payable').val(netAbleAmount.toFixed(2))) || 0;
    console.log(total_net_amount_payable, 'total_net_amount_payable');
}

$(document).on('input', 'input.total_buyer_discount, input.total_less_commission, input.total_add_fright', function() {
    calculateNetAbleAmount();
});

calculateTotal();
calculateNetAbleAmount();

   
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
            url: "{{ route('team.update_submit_commercial_invoice') }}",
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
                            "{{ route('team.report_List_commercial_invoice') }}"

                    },
                });
            },
            error: function(error) {
                // console.log(error,'texting error');
                Swal.fire({
                    title: "Error!",
                    text: error?.responseJSON?.errors?.commercial_invoice[0],
                    icon: "error",
                    confirmButtonText: "OK",
                    timer: 3000, // 3 seconds
                    timerProgressBar: true,
                    willClose: () => {
                        $('#firm-submit').prop('disabled', false);

                    },
                });

                $('#firm-submit').prop('disabled', false);
            }
        });
    });



});
</script>



@endsection
