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




                <h4 class="card-title"> {{strtoupper("Canada Custom Invoice Add")}} <br>
                    {{-- <span style="color:darkgray; font-size:12px;">Canada Custom Invoice</span> --}}
                </h4>
                <div class="row">
                    <div class="col-sm-3 mb-3">
                        <label for="certificate_origin_com_decs_invoices" class="form-label">Commercial Invioce No</label>
                        <select class="multi-select" name="commercial_invoice_id" placeholder="Select status Party">

                            <option disabled selected>Commercial Invioce No</option>
                            <?php
                            $getAllInvoice = App\Models\CommercialInvoice::get();
                            ?>
                            @forelse (  $getAllInvoice as $item )
                            <option value= {{ $item->id }}>Invioce No:  {{  $item->commercial_invoice }}</option>
                            @empty
                            <option>No Records found</option>
                            @endforelse
                                                     
                           
                        </select>
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="canada_customer_invoice" class="form-label">Invoice</label>
                        <input type="text" class="form-control custom-input" id="canada_customer_invoice" name="canada_customer_invoice"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="vender_name" class="form-label">Vender Name</label>
                        <input type="text" class="form-control custom-input" id="vender_name" name="vender_name"
                            value="TOWELLERS LIMITED">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="vender_address" class="form-label">Vender Address</label>
                        <input type="text" class="form-control custom-input" id="vender_address" name="vender_address"
                            value="WS 30/31, FB AREA , KARACHI, PAKISTAN">
                    </div>
                  

                    <div class="col-sm-3 mb-3">
                        <label for="date_of_direct_shipment_to_canada_1" class="form-label">Date of Direct Shipment to
                            Canada 1</label>
                        <input type="text" class="form-control custom-input" id="date_of_direct_shipment_to_canada_1"
                            name="date_of_direct_shipment_to_canada_1" value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="date_of_direct_shipment_to_canada_2" class="form-label">Date of Direct Shipment to
                            Canada 2</label>
                        <input type="text" class="form-control custom-input" id="date_of_direct_shipment_to_canada_2"
                            name="date_of_direct_shipment_to_canada_2" value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="consignee_name" class="form-label">Consignee Name</label>
                        <input type="text" class="form-control custom-input" id="consignee_name" name="consignee_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="consignee_address" class="form-label">Consignee Address</label>
                        <input type="text" class="form-control custom-input" id="consignee_address"
                            name="consignee_address" value="">
                    </div>
                   
                    <div class="col-sm-3 mb-3">
                        <label for="purchaser_name" class="form-label">Purchaser Name</label>
                        <input type="text" class="form-control custom-input" id="purchaser_name" name="purchaser_name"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="purchaser_address" class="form-label">Purchaser Address</label>
                        <input type="text" class="form-control custom-input" id="purchaser_address"
                            name="purchaser_address" value="">
                    </div>
                   
                    <div class="col-sm-3 mb-3">
                        <label for="originator_name" class="form-label">Originator Name</label>
                        <input type="text" class="form-control custom-input" id="originator_name" name="originator_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="originator_address" class="form-label">Originator Address</label>
                        <input type="text" class="form-control custom-input" id="originator_address"
                            name="originator_address" value="">
                    </div>

                    
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Exporter Name</label>
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_address" class="form-label">Exporter Address</label>
                        <input type="text" class="form-control custom-input" id="exporter_address"
                            name="exporter_address" value="">
                    </div>
                   

                    <div class="col-sm-3 mb-3">
                        <label for="country_of_transhipment" class="form-label">Country of transhipment </label>
                        <input type="text" class="form-control custom-input"
                            id="country_of_transhipment"
                            name="country_of_transhipment" value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="transportation_place_of_direct_shipment_to_canada" class="form-label">Transportation
                            Place of Direct </label>
                        <input type="text" class="form-control custom-input"
                            id="transportation_place_of_direct_shipment_to_canada"
                            name="transportation_place_of_direct_shipment_to_canada" value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="country_of_origin_pays" class="form-label">Country of Origin (Pays)</label>
                        <input type="text" class="form-control custom-input" id="country_of_origin_pays"
                            name="country_of_origin_pays" value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="conditions_of_sale_and_terms_of_payment" class="form-label">Conditions of Sale and
                            Terms of Payment</label>
                        <input type="text" class="form-control custom-input"
                            id="conditions_of_sale_and_terms_of_payment" name="conditions_of_sale_and_terms_of_payment"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="currency_of_transhipment" class="form-label">Currency of transhipment </label>
                        <input type="text" class="form-control custom-input" id="currency_of_transhipment"
                            name="currency_of_transhipment" value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="canada_net" class="form-label">Net </label>
                        <input type="text" class="form-control custom-input" id="canada_net"
                            name="canada_net" value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="canada_gross" class="form-label">Gross </label>
                        <input type="text" class="form-control custom-input" id="canada_gross"
                            name="canada_gross" value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="yes_or_no_If_any_of_fields_1_to_17_are_included" class="form-label">If any of fields 1 to 17 are included on an attached commercial invoice, check this bax</label>
                        <input type="checkbox" class="form-check-input" id="yes_or_no_If_any_of_fields_1_to_17_are_included" name="yes_or_no_If_any_of_fields_1_to_17_are_included" value="1">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="yes_or_no_If_any_of_fields_23_to_35_are_not_applicable" class="form-label">If field 23 to 25 are not applicable, check this boxt</label>
                        <input type="checkbox" class="form-check-input" id="yes_or_no_If_any_of_fields_23_to_35_are_not_applicable" name="yes_or_no_If_any_of_fields_23_to_35_are_not_applicable" value="1">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="agency_ruling" class="form-label">Agency Ruling</label>
                        <input type="text" class="form-control custom-input" id="agency_ruling" name="agency_ruling"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="23_agency_if_included_in_field_17_indicate" class="form-label"> 23. Agency Ruling If included in field 17 indicate amount </label>
                        <input type="text" class="form-control custom-input" id="23_agency_if_included_in_field_17_indicate"
                            name="23_agency_if_included_in_field_17_indicate" value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="23_agency_transportation_charges" class="form-label"> 23. Agency Ruling Transportation charges </label>
                        <input type="text" class="form-control custom-input" id="23_agency_transportation_charges"
                            name="23_agency_transportation_charges" value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="23_agency_costs_for_contruction" class="form-label"> 23. Agency Ruling Costs for contruction</label>
                        <input type="text" class="form-control custom-input" id="23_agency_costs_for_contruction"
                            name="23_agency_costs_for_contruction" value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="23_agency_exporting_packing" class="form-label"> 23. Agency Exporting packing</label>
                        <input type="text" class="form-control custom-input" id="23_agency_exporting_packing"
                            name="23_agency_exporting_packing" value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="24_agency_if_included_in_field_17_indicate" class="form-label"> 24. Agency Ruling If included in field 17 indicate amount </label>
                        <input type="text" class="form-control custom-input" id="24_agency_if_included_in_field_17_indicate"
                            name="24_agency_if_included_in_field_17_indicate" value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="24_agency_transportation_charges" class="form-label"> 24. Agency Ruling Transportation charges </label>
                        <input type="text" class="form-control custom-input" id="24_agency_transportation_charges"
                            name="24_agency_transportation_charges" value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="24_agency_costs_for_contruction" class="form-label"> 24. Agency Ruling Costs for contruction</label>
                        <input type="text" class="form-control custom-input" id="24_agency_costs_for_contruction"
                            name="24_agency_costs_for_contruction" value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="24_agency_exporting_packing" class="form-label"> 24. Agency Exporting packing</label>
                        <input type="text" class="form-control custom-input" id="24_agency_exporting_packing"
                            name="24_agency_exporting_packing" value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="25_agency_if_included_in_field_17_indicate" class="form-label"> 25. Agency Ruling If included in field 17 indicate amount </label>
                        <input type="text" class="form-control custom-input" id="25_agency_if_included_in_field_17_indicate"
                            name="25_agency_if_included_in_field_17_indicate" value="">
                    </div>
                   
                    <div class="col-sm-3 mb-3">
                        <label for="yes_or_no_25_agency_transportation_charges" class="form-label">25. Agency Ruling Transportation charges </label>
                        <input type="checkbox" class="form-check-input" id="yes_or_no_25_agency_transportation_charges" name="yes_or_no_25_agency_transportation_charges" value="1">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="yes_or_no_25_agency_costs_for_contruction" class="form-label">25. Agency Ruling Costs for contruction</label>
                        <input type="checkbox" class="form-check-input" id="yes_or_no_25_agency_costs_for_contruction" name="yes_or_no_25_agency_costs_for_contruction" value="1">
                    </div>



                </div>
                <div class="row">
                    @for($i=1; $i <= 7; $i++) 
                    <div class="col-sm-12 mb-3">
                        <label for="" class="form-label">Description of
                            Commodity</label>
                            <input type="text" class="form-control custom-input"
                            id="des_pecification_of_commodities_{{ $i }}"
                            name="des_pecification_of_commodities_{{ $i }}" value="">
                    
                    </div>
                    @endfor

                </div>

                <div class="row">
                    <!-- =========== Director1 ============ -->
                    @for($i=1; $i <= 8; $i++) 
                    <div class="col-sm-3 mb-4">
                        <label for="" class="form-label">Number of Packages </label>
                        <input type="text" class="form-control custom-input"
                            id="number_of_packages_nombre_de_coils_{{ $i }}"
                            name="number_of_packages_nombre_de_coils_{{ $i }}" value="">
                </div>

                <div class="col-sm-3 mb-4">
                    <label for="quantity_{{ $i }}" class="form-label">Quantity</label>
                    <input type="number" step="any" class="form-control custom-input" id="quantity_{{ $i }}"
                        name="quantity_{{ $i }}" value="">
                </div>
                <div class="col-sm-3 mb-4">
                    <label for="quantity_unit_{{ $i }}" class="form-label">Quantity Unit</label>
                    <input type="text" step="any" class="form-control custom-input" id="quantity_unit_{{ $i }}"
                        name="quantity_unit_{{ $i }}" value="">
                </div>

                <div class="col-sm-3 mb-4">
                    <label for="" class="form-label">Unit Price </label>
                    <input type="number" step="any" class="form-control custom-input" id="unit_price_{{ $i }}"
                        name="unit_price_{{ $i }}" value="">
                </div>

                @endfor
                <!-- =========== Director1 ============ -->
        </div>

        <div class="row">
            <div class="col-xl-6 d-flex justify-content-start">
                <button type="button" class="btn btn report-tab-unactive" onclick="window.history.back()">Cancel</button>   
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
            url: "{{ route('team.submit_custom_canda_invoice') }}",
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
                $('#firm-submit').prop('disabled', false);

                      //  window.location.href =
                        //    "{{ route('team.report_List_custom_canda_invoice') }}"

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
