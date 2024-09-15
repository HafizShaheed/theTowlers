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
                    {{-- <span style="color:darkgray; font-size:12px;">Form 59 A Invoice</span> --}}
                </h4>
                <div class="row">
                    <div class="col-sm-3 mb-3">
                        <input type="hidden" class="form-control custom-input" id="id" name="id" readonly   value="{{ $Form59AInvoice->id }}">
                        <label for="form59_a_invoices" class="form-label">Invoice</label>
                        <input type="text" class="form-control custom-input" id="form59_a_invoices" name="form59_a_invoices"
                            readonly   value="{{ $Form59AInvoice->form59_a_invoices }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter" class="form-label">Exporter</label>
                        <input type="text" class="form-control custom-input" id="exporter" name="exporter"
                            readonly   value="{{ $Form59AInvoice->exporter }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="status_of_seller" class="form-label">Status Of Seller</label>
                        <input type="text" class="form-control custom-input" id="status_of_seller" name="status_of_seller"
                            readonly   value="{{ $Form59AInvoice->status_of_seller }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="delete_terms_inapplicable" class="form-label">Aelete terms in Applicable</label>
                        <input type="text" class="form-control custom-input" id="delete_terms_inapplicable"
                            name="delete_terms_inapplicable" readonly   value="{{ $Form59AInvoice->delete_terms_inapplicable }}">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="manufacturer" class="form-label">Manufacturer</label>
                        <input type="text" class="form-control custom-input" id="manufacturer"
                            name="manufacturer" readonly   value="{{ $Form59AInvoice->manufacturer }}">
                    </div>

                   
                    <div class="col-sm-3 mb-3">
                        <label for="grower" class="form-label">Grower</label>
                        <input type="text" class="form-control custom-input" id="grower"
                            name="grower" readonly   value="{{ $Form59AInvoice->grower }}">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="producer" class="form-label">Producer</label>
                        <input type="text" class="form-control custom-input" id="producer" name="producer"
                            readonly   value="{{ $Form59AInvoice->producer }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="supplier" class="form-label">Supplier</label>
                        <input type="text" class="form-control custom-input" id="supplier"
                            name="supplier" readonly   value="{{ $Form59AInvoice->supplier }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="sold_to" class="form-label">Sold to</label>
                        <input type="text" class="form-control custom-input" id="sold_to"
                            name="sold_to" readonly   value="{{ $Form59AInvoice->sold_to }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="country_of_Origin" class="form-label">Country of Origin</label>
                        <input type="text" class="form-control custom-input" id="country_of_Origin" name="country_of_Origin"
                            readonly   value="{{ $Form59AInvoice->country_of_Origin }}">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="ship_airline_etc" class="form-label">Ship airline etc</label>
                        <input type="text" class="form-control custom-input" id="ship_airline_etc"
                            name="ship_airline_etc" readonly   value="{{ $Form59AInvoice->ship_airline_etc }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="sea_airport_of_loading" class="form-label">Sea airport of loading</label>
                        <input type="text" class="form-control custom-input" id="sea_airport_of_loading"
                            name="sea_airport_of_loading" readonly   value="{{ $Form59AInvoice->sea_airport_of_loading }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="sea_airport_of_discharge" class="form-label">Sea airport of discharge</label>
                        <input type="text" class="form-control custom-input" id="sea_airport_of_discharge"
                            name="sea_airport_of_discharge" readonly value="{{ $Form59AInvoice->sea_airport_of_discharge }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="final_destination_of_goods" class="form-label">Final destination of goods</label>
                        <input type="text" class="form-control custom-input" id="final_destination_of_goods" name="final_destination_of_goods"
                            readonly   value="{{ $Form59AInvoice->final_destination_of_goods }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="if_amount_has_been_inciuded_in_the_current_domestic_value" class="form-label">If amount inciuded in current domestic value</label>
                        <input type="text" class="form-control custom-input" id="if_amount_has_been_inciuded_in_the_current_domestic_value"
                            name="if_amount_has_been_inciuded_in_the_current_domestic_value" readonly   value="{{ $Form59AInvoice->if_amount_has_been_inciuded_in_the_current_domestic_value}}">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="drawback_or_remission_of_duty" class="form-label">Drawback or remission of duty</label>
                        <input type="text" class="form-control custom-input" id="drawback_or_remission_of_duty"
                            name="drawback_or_remission_of_duty" readonly   value="{{ $Form59AInvoice->drawback_or_remission_of_duty }}">
                    </div>
                    



                </div>
                <hr>
            

                <div class="row">
                    <!-- =========== Director1 ============ -->
                    @for($i=1; $i <= 6; $i++) <div class="col-sm-4 mb-4">
                        <label for="marks_and_numbers_" class="form-label">Mark & Number </label>
                        <input type="text" class="form-control custom-input"
                            id="marks_and_numbers_{{ $i }}"
                            name="marks_and_numbers_{{ $i }}"  readonly   value="{{ $Form59AInvoice->{'marks_and_numbers_' . $i} }}">
                </div>

                <div class="col-sm-4 mb-4">
                    <label for="quantity_{{ $i }}" class="form-label">Quantity</label>
                    <input type="text" step="any" class="form-control custom-input" id="quantity_{{ $i }}"
                        name="quantity_{{ $i }} readonly  "value="{{ $Form59AInvoice->{'quantity_' . $i} }}">
                </div>
                <div class="col-sm-4 mb-4">
                    <label for="description_of_goods_{{ $i }}" class="form-label">Description of goods  (including any discount)</label>
                    <input type="text" step="any" class="form-control custom-input" id="description_of_goods_{{ $i }}"
                        name="description_of_goods_{{ $i }} readonly  "value="{{ $Form59AInvoice->{'description_of_goods_' . $i} }}">
                </div>
{{-- 
                <div class="col-sm-4 mb-4">
                    <label for="including_any_discounts_" class="form-label">Including any discounts</label>
                    <input type="number" step="any" class="form-control custom-input" id="including_any_discounts_{{ $i }}"
                        name="including_any_discounts_{{ $i }} readonly  "value="{{ $Form59AInvoice->{'including_any_discounts_' . $i} }}">
                </div> --}}
                
                <div class="col-sm-4 mb-4">
                    <label for="current_domestic_value_currency_of_exporting_{{ $i }}" class="form-label">Current domestic value currency of exporting</label>
                    <input type="text" step="any" class="form-control custom-input" id="current_domestic_value_currency_of_exporting_{{ $i }}"
                        name="current_domestic_value_currency_of_exporting_{{ $i }} readonly  "value="{{ $Form59AInvoice->{'current_domestic_value_currency_of_exporting_' . $i} }}">
                </div>
                <div class="col-sm-4 mb-4">
                    <label for="amount_" class="form-label">Amount</label>
                    <input type="number" step="any" class="form-control custom-input" id="amount_{{ $i }}"
                        name="amount_{{ $i }} readonly  "value="{{ $Form59AInvoice->{'amount_' . $i} }}">
                </div>
                <hr>

                @endfor
                <!-- =========== Director1 ============ -->
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

</script>



@endsection
