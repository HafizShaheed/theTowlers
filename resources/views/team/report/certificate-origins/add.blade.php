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




                <h4 class="card-title"> {{strtoupper("Certificate origins Add")}} <br>
                    {{-- <span style="color:darkgray; font-size:12px;">Certificate origins</span> --}}
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
                        <label for="certificate_origin_invoices" class="form-label">Invoice</label>
                        <input type="text" class="form-control custom-input" id="certificate_origin_invoices" name="certificate_origin_invoices"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Exporter Name</label>
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_address" class="form-label">Exporter Address</label>
                        <input type="text" class="form-control custom-input" id="exporter_address" name="exporter_address"
                            value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_country" class="form-label">Exporter country</label>
                        <input type="text" class="form-control custom-input" id="exporter_country"
                            name="exporter_country" value="">
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
                        <label for="consignee_country" class="form-label">Consignee country</label>
                        <input type="text" class="form-control custom-input" id="consignee_country"
                            name="consignee_country" value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="ref_number" class="form-label">Ref number </label>
                        <input type="text" class="form-control custom-input" id="ref_number"
                            name="ref_number" value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_membership_number" class="form-label">Exporter membership number</label>
                        <input type="text" class="form-control custom-input" id="exporter_membership_number"
                            name="exporter_membership_number" value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="particular_of_transport" class="form-label">Particular of transport</label>
                        <input type="text" class="form-control custom-input" id="particular_of_transport" name="particular_of_transport"
                            value="">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control custom-input" id="date"
                            name="date" value="">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="place" class="form-label">Place</label>
                        <input type="text" class="form-control custom-input" id="place"
                            name="place" value="">
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
                    <input type="text" step="any" class="form-control custom-input" id="gross_weight_or_other_quantity_{{ $i }}"
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
            url: "{{ route('team.submit_certificate_origins_invoice') }}",
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
                            "{{ route('team.report_List_certificate_origins_invoice') }}"

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
