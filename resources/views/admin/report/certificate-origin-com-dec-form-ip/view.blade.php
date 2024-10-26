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




                <h4 class="card-title"> {{strtoupper("Certificate origins Combined Declaration Add")}} <br>
                    {{-- <span style="color:darkgray; font-size:12px;">Certificate origins Combined Declaration </span> --}}
                </h4>
                <div class="row">
                    <div class="col-sm-3 mb-3">
                        <label for="certificate_origin_com_decs_from_ip_invoices" class="form-label">Invoice</label>
                        <input type="text" class="form-control custom-input" id="certificate_origin_com_decs_from_ip_invoices" name="certificate_origin_com_decs_from_ip_invoices"
                           readonly disabled  value="{{ $CertificateOriginComDecFormIp->certificate_origin_com_decs_from_ip_invoices }}">
                            <input type="hidden" class="form-control custom-input" id="id" name="id"
                           readonly disabled  value="{{ $CertificateOriginComDecFormIp->id }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_name" class="form-label">Exporter Name</label>
                        <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                           readonly disabled  value="{{ $CertificateOriginComDecFormIp->exporter_name }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="exporter_address" class="form-label">Exporter Address</label>
                        <input type="text" class="form-control custom-input" id="exporter_address" name="exporter_address"
                           readonly disabled  value="{{ $CertificateOriginComDecFormIp->exporter_address }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="Producer_name" class="form-label">Producer name</label>
                        <input type="text" class="form-control custom-input" id="Producer_name"
                            name="Producer_name"readonly disabled  value="{{ $CertificateOriginComDecFormIp->Producer_name }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="Producer_address" class="form-label">Producer address</label>
                        <input type="text" class="form-control custom-input" id="Producer_address"
                            name="Producer_address"readonly disabled  value="{{ $CertificateOriginComDecFormIp->Producer_address }}">
                    </div>
                    
                    <div class="col-sm-3 mb-3">
                        <label for="consignee_name" class="form-label">Consignee Name</label>
                        <input type="text" class="form-control custom-input" id="consignee_name" name="consignee_name"
                           readonly disabled  value="{{ $CertificateOriginComDecFormIp->consignee_name }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="consignee_address" class="form-label">Consignee Address</label>
                        <input type="text" class="form-control custom-input" id="consignee_address"
                            name="consignee_address"readonly disabled  value="{{ $CertificateOriginComDecFormIp->consignee_address }}">
                    </div>
                   

                    <div class="col-sm-3 mb-3">
                        <label for="ref_number" class="form-label">Ref number </label>
                        <input type="text" class="form-control custom-input" id="ref_number"
                            name="ref_number"readonly disabled  value="{{ $CertificateOriginComDecFormIp->ref_number }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="issue_country" class="form-label">Issue country</label>
                        <input type="text" class="form-control custom-input" id="issue_country"
                            name="issue_country"readonly disabled  value="{{ $CertificateOriginComDecFormIp->issue_country }}">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="transport_and_route" class="form-label">Transport and route</label>
                        <input type="text" class="form-control custom-input" id="transport_and_route" name="transport_and_route"
                           readonly disabled  value="{{ $CertificateOriginComDecFormIp->transport_and_route }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="remarks" class="form-label">Remarks</label>
                        <input type="text" class="form-control custom-input" id="remarks" name="remarks"
                           readonly disabled  value="{{ $CertificateOriginComDecFormIp->remarks }}">
                    </div>
                    {{-- <div class="col-sm-3 mb-3">
                        <label for="produce_in_country" class="form-label">Produce in country </label>
                        <input type="text" class="form-control custom-input" id="produce_in_country" name="produce_in_country"
                           readonly disabled  value="{{ $CertificateOriginComDecFormIp->produce_in_country }}">
                    </div> --}}
                    <div class="col-sm-3 mb-3">
                        <label for="importing_in_country" class="form-label">Importing in country </label>
                        <input type="text" class="form-control custom-input" id="importing_in_country" name="importing_in_country"
                           readonly disabled  value="{{ $CertificateOriginComDecFormIp->importing_in_country }}">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="yes_or_no_preferential_treatment" class="form-label">Preferential treatment</label>
                        <input type="checkbox" class="form-check-input" id="yes_or_no_preferential_treatment" name="yes_or_no_preferential_treatment"readonly disabled  value="1" {{ $CertificateOriginComDecFormIp->yes_or_no_preferential_treatment ? "checked" : "" }}>
                    </div>
                    
                    


                    <div class="col-sm-3 mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control custom-input" id="date"
                            name="date"readonly disabled  value="{{ $CertificateOriginComDecFormIp->place }}">
                    </div>
                    <div class="col-sm-3 mb-3">
                        <label for="place" class="form-label">Place</label>
                        <input type="text" class="form-control custom-input" id="place"
                            name="place"readonly disabled  value="{{ $CertificateOriginComDecFormIp->place }}">
                    </div>

                    <div class="col-sm-3 mb-3">
                        <label for="declaration_by_the_exporter_country" class="form-label">Declaration by the exporter</label>
                        <input type="text" class="form-control custom-input" id="declaration_by_the_exporter_country"
                        readonly disabled    name="declaration_by_the_exporter_country"  value="{{ $CertificateOriginComDecFormIp->declaration_by_the_exporter_country }}">
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
                            name="item_number_{{ $i }}" readonly disabled  value="{{ $CertificateOriginComDecFormIp->{'item_number_' . $i} }}">
                </div>
                    <div class="col-sm-4 mb-4">
                        <label for="marks_and_numbers_" class="form-label">Mark & Number </label>
                        <input type="text" class="form-control custom-input"
                            id="marks_and_numbers_{{ $i }}"
                            name="marks_and_numbers_{{ $i }}" readonly disabled  value="{{ $CertificateOriginComDecFormIp->{'marks_and_numbers_' . $i} }}">
                </div>

                <div class="col-sm-4 mb-4">
                    <label for="numbers_and_kinds_of_packges_description_{{ $i }}" class="form-label">Numbers and kinds of packges description</label>
                    <input type="text" step="any" class="form-control custom-input" id="numbers_and_kinds_of_packges_description_{{ $i }}"
                        name="numbers_and_kinds_of_packges_description_{{ $i }}" readonly disabled  value="{{ $CertificateOriginComDecFormIp->{'numbers_and_kinds_of_packges_description_' . $i} }}">
                </div>
                <div class="col-sm-4 mb-4">
                    <label for="origin_criterion_{{ $i }}" class="form-label">Origin criterion_</label>
                    <input type="text" step="any" class="form-control custom-input" id="origin_criterion_{{ $i }}"
                        name="origin_criterion_{{ $i }}" readonly disabled  value="{{ $CertificateOriginComDecFormIp->{'origin_criterion_' . $i} }}">
                </div>

                <div class="col-sm-4 mb-4">
                    <label for="gross_weight_or_other_quantity_" class="form-label">Gross weight or other quantity</label>
                    <input type="text" step="any" class="form-control custom-input" id="gross_weight_or_other_quantity_{{ $i }}"
                        name="gross_weight_or_other_quantity_{{ $i }}" readonly disabled  value="{{ $CertificateOriginComDecFormIp->{'gross_weight_or_other_quantity_' . $i} }}">
                </div>
                
                <div class="col-sm-4 mb-4">
                    <label for="number_and_dates_of_inovoices_{{ $i }}" class="form-label">Number and dates of inovoices </label>
                    <input type="text" step="any" class="form-control custom-input" id="number_and_dates_of_inovoices_{{ $i }}"
                        name="number_and_dates_of_inovoices_{{ $i }}" readonly disabled  value="{{ $CertificateOriginComDecFormIp->{'number_and_dates_of_inovoices_' . $i} }}">
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