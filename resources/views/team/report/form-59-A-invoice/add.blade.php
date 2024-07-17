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




                <h4 class="card-title"> {{strtoupper("Form 59 A Invoice Add")}} <br>
                    <span style="color:darkgray; font-size:12px;">Form 59 A Invoice</span>
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
                        <label for="form59_a_invoices" class="form-label">Invoice</label>
                        <input type="text" class="form-control custom-input" id="form59_a_invoices" name="form59_a_invoices"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter" class="form-label">Exporter</label>
                        <input type="text" class="form-control custom-input" id="exporter" name="exporter"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="status_of_seller" class="form-label">Status Of Seller</label>
                        <input type="text" class="form-control custom-input" id="status_of_seller" name="status_of_seller"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="delete_terms_inapplicable" class="form-label">Delete terms in Applicable</label>
                        <input type="text" class="form-control custom-input" id="delete_terms_inapplicable"
                            name="delete_terms_inapplicable" value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="manufacturer" class="form-label">Manufacturer</label>
                        <input type="text" class="form-control custom-input" id="manufacturer"
                            name="manufacturer" value="">
                    </div>

                   
                    <div class="col-sm-3 mb-3">
                        <label for="grower" class="form-label">Grower</label>
                        <input type="text" class="form-control custom-input" id="grower"
                            name="grower" value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="producer" class="form-label">Producer</label>
                        <input type="text" class="form-control custom-input" id="producer" name="producer"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="supplier" class="form-label">Supplier</label>
                        <input type="text" class="form-control custom-input" id="supplier"
                            name="supplier" value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="sold_to" class="form-label">Sold to</label>
                        <input type="text" class="form-control custom-input" id="sold_to"
                            name="sold_to" value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="country_of_Origin" class="form-label">Country of Origin</label>
                        <input type="text" class="form-control custom-input" id="country_of_Origin" name="country_of_Origin"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="ship_airline_etc" class="form-label">Ship airline etc</label>
                        <input type="text" class="form-control custom-input" id="ship_airline_etc"
                            name="ship_airline_etc" value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="sea_airport_of_loading" class="form-label">Sea airport of loading</label>
                        <input type="text" class="form-control custom-input" id="sea_airport_of_loading"
                            name="sea_airport_of_loading" value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="sea_airport_of_discharge" class="form-label">Sea airport of discharge</label>
                        <input type="text" class="form-control custom-input" id="sea_airport_of_discharge"
                            name="sea_airport_of_discharge" value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="final_destination_of_goods" class="form-label">Final destination of goods</label>
                        <input type="text" class="form-control custom-input" id="final_destination_of_goods" name="final_destination_of_goods"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="if_amount_has_been_inciuded_in_the_current_domestic_value" class="form-label">If amount inciuded in current domestic value</label>
                        <input type="text" class="form-control custom-input" id="if_amount_has_been_inciuded_in_the_current_domestic_value"
                            name="if_amount_has_been_inciuded_in_the_current_domestic_value" value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="drawback_or_remission_of_duty" class="form-label">Drawback or remission of duty</label>
                        <input type="text" class="form-control custom-input" id="drawback_or_remission_of_duty"
                            name="drawback_or_remission_of_duty" value="">
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
                    <label for="quantity_{{ $i }}" class="form-label">Quantity</label>
                    <input type="number" step="any" class="form-control custom-input" id="quantity_{{ $i }}"
                        name="quantity_{{ $i }}" value="">
                </div>
                <div class="col-sm-4 mb-4">
                    <label for="description_of_goods_{{ $i }}" class="form-label">Description of goods</label>
                    <input type="text" step="any" class="form-control custom-input" id="description_of_goods_{{ $i }}"
                        name="description_of_goods_{{ $i }}" value="">
                </div>

                <div class="col-sm-4 mb-4">
                    <label for="including_any_discounts_" class="form-label">Including any discounts</label>
                    <input type="number" step="any" class="form-control custom-input" id="including_any_discounts_{{ $i }}"
                        name="including_any_discounts_{{ $i }}" value="">
                </div>
                
                <div class="col-sm-4 mb-4">
                    <label for="current_domestic_value_currency_of_exporting_{{ $i }}" class="form-label">Current domestic value currency of exporting</label>
                    <input type="text" step="any" class="form-control custom-input" id="current_domestic_value_currency_of_exporting_{{ $i }}"
                        name="current_domestic_value_currency_of_exporting_{{ $i }}" value="">
                </div>
                <div class="col-sm-4 mb-4">
                    <label for="amount_" class="form-label">Amount</label>
                    <input type="number" step="any" class="form-control custom-input" id="amount_{{ $i }}"
                        name="amount_{{ $i }}" value="">
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
            url: "{{ route('team.submit_form_59_a_invoice') }}",
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
                    timer: 1000, // 3 seconds
                    timerProgressBar: true,
                    willClose: () => {
                        window.location.href =
                            "{{ route('team.report_List_form_59_a_invoice') }}"

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
