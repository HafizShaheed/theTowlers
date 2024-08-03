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




                <h4 class="card-title"> {{strtoupper("Certificate origins Combined Declaration View")}} <br>
                    {{-- <span style="color:darkgray; font-size:12px;">Certificate origins Combined Declaration </span> --}}
                </h4>
                <div class="row">
                    <div class="col-sm-3 mb-3">
                        <label for="certificate_origin_com_decs_invoices" class="form-label">Invoice</label>
                        <input type="text" class="form-control custom-input" id="certificate_origin_com_decs_invoices" name="certificate_origin_com_decs_invoices"
                             readonly disabled value="{{ $CertificateOriginComDec->certificate_origin_com_decs_invoices }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Exporter Name</label>
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                             readonly disabled value="{{ $CertificateOriginComDec->exporter_name }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_address" class="form-label">Exporter Address</label>
                        <input type="text" class="form-control custom-input" id="exporter_address" name="exporter_address"
                             readonly disabled value="{{ $CertificateOriginComDec->exporter_address }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_country" class="form-label">Exporter country</label>
                        <input type="text" class="form-control custom-input" id="exporter_country"
                            name="exporter_country"  readonly disabled value="{{ $CertificateOriginComDec->exporter_country }}">
                    </div>

                    
                    <div class="col-sm-3 mb-3">
                        <label for="consignee_name" class="form-label">Consignee Name</label>
                        <input type="text" class="form-control custom-input" id="consignee_name" name="consignee_name"
                             readonly disabled value="{{ $CertificateOriginComDec->consignee_name }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="consignee_address" class="form-label">Consignee Address</label>
                        <input type="text" class="form-control custom-input" id="consignee_address"
                            name="consignee_address"  readonly disabled value="{{ $CertificateOriginComDec->consignee_address }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="consignee_country" class="form-label">Consignee country</label>
                        <input type="text" class="form-control custom-input" id="consignee_country"
                            name="consignee_country"  readonly disabled value="{{ $CertificateOriginComDec->consignee_country }}">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="ref_number" class="form-label">Ref number </label>
                        <input type="text" class="form-control custom-input" id="ref_number"
                            name="ref_number"  readonly disabled value="{{ $CertificateOriginComDec->ref_number }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_membership_number" class="form-label">Exporter membership number</label>
                        <input type="text" class="form-control custom-input" id="exporter_membership_number"
                            name="exporter_membership_number"  readonly disabled value="{{ $CertificateOriginComDec->exporter_membership_number }}">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="transport_and_route" class="form-label">Transport and route</label>
                        <input type="text" class="form-control custom-input" id="transport_and_route" name="transport_and_route"
                             readonly disabled value="{{ $CertificateOriginComDec->transport_and_route }}">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control custom-input" id="date"
                            name="date"  readonly disabled value="{{ $CertificateOriginComDec->date }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="place" class="form-label">Place</label>
                        <input type="text" class="form-control custom-input" id="place"
                            name="place"  readonly disabled value="{{ $CertificateOriginComDec->place }}">
                    </div>

                    



                </div>
            
                <hr>
            

                <div class="row">
                    <!-- =========== Director1 ============ -->
                    @for($i=1; $i <= 6; $i++) 
                    <div class="col-sm-4 mb-4">
                        <label for="item_number_" class="form-label">Item Number </label>
                        <input type="text" class="form-control custom-input"
                            id="item_number_{{ $i }}"
                            name="item_number_{{ $i }}" readonly disabled value="{{ $CertificateOriginComDec->{'item_number_' . $i} }}">
                </div>
                    <div class="col-sm-4 mb-4">
                        <label for="marks_and_numbers_" class="form-label">Mark & Number </label>
                        <input type="text" class="form-control custom-input"
                            id="marks_and_numbers_{{ $i }}"
                            name="marks_and_numbers_{{ $i }}" readonly disabled value="{{ $CertificateOriginComDec->{'marks_and_numbers_' . $i} }}">
                </div>

                <div class="col-sm-4 mb-4">
                    <label for="numbers_and_kinds_of_packges_description_{{ $i }}" class="form-label">Numbers and kinds of packges description</label>
                    <input type="text" step="any" class="form-control custom-input" id="numbers_and_kinds_of_packges_description_{{ $i }}"
                        name="numbers_and_kinds_of_packges_description_{{ $i }}" readonly disabled value="{{ $CertificateOriginComDec->{'numbers_and_kinds_of_packges_description_' . $i} }}">
                </div>
                <div class="col-sm-4 mb-4">
                    <label for="origin_criterion_{{ $i }}" class="form-label">Origin criterion_</label>
                    <input type="text" step="any" class="form-control custom-input" id="origin_criterion_{{ $i }}"
                        name="origin_criterion_{{ $i }}" readonly disabled value="{{ $CertificateOriginComDec->{'origin_criterion_' . $i} }}">
                </div>

                <div class="col-sm-4 mb-4">
                    <label for="gross_weight_or_other_quantity_" class="form-label">Gross weight or other quantity</label>
                    <input type="number" step="any" class="form-control custom-input" id="gross_weight_or_other_quantity_{{ $i }}"
                        name="gross_weight_or_other_quantity_{{ $i }}" readonly disabled value="{{ $CertificateOriginComDec->{'gross_weight_or_other_quantity_' . $i} }}">
                </div>
                
                <div class="col-sm-4 mb-4">
                    <label for="number_and_dates_of_inovoices_{{ $i }}" class="form-label">Number and dates of inovoices </label>
                    <input type="text" step="any" class="form-control custom-input" id="number_and_dates_of_inovoices_{{ $i }}"
                        name="number_and_dates_of_inovoices_{{ $i }}" readonly disabled value="{{ $CertificateOriginComDec->{'number_and_dates_of_inovoices_' . $i} }}">
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





@endsection