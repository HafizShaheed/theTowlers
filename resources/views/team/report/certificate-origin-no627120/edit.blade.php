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




                    <h4 class="card-title"> {{ strtoupper('Certificate origin 627120 Edit') }} <br>
                        {{-- <span style="color:darkgray; font-size:12px;">Certificate origin 627120 </span> --}}
                    </h4>
                    <div class="row">

                        <div class="col-sm-3 mb-3">
                            <label for="certificate_origin_com_decs_invoices" class="form-label">Commercial Invioce
                                No</label>
                            <select class="multi-select" name="commercial_invoice_id" placeholder="Select status Party">
                                <option disabled selected>Commercial Invoice No</option>
                                @php
                                    $getAllInvoice = App\Models\CommercialInvoice::all();
                                @endphp
                                @forelse ($getAllInvoice as $item)
                                    <option value="{{ $item->id }}"
                                        {{ isset($CertificateOriginNo627120) && $item->id == $CertificateOriginNo627120->commercial_invoice_id ? 'selected' : '' }}>
                                        Invoice No: {{ $item->commercial_invoice }}
                                    </option>
                                @empty
                                    <option>No Records found</option>
                                @endforelse
                            </select>

                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="certificate_origin_no627120_invoices" class="form-label">Invoice</label>
                            <input type="text" class="form-control custom-input"
                                id="certificate_origin_no627120_invoices" name="certificate_origin_no627120_invoices"
                                value="{{ $CertificateOriginNo627120->certificate_origin_no627120_invoices }}">
                            <input type="hidden" class="form-control custom-input" id="id" name="id"
                                value="{{ $CertificateOriginNo627120->id }}">
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="exporter_name" class="form-label">Exporter Name</label>
                            <input type="text" class="form-control custom-input" id="exporter_name" name="exporter_name"
                                value="{{ $CertificateOriginNo627120->exporter_name }}">
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="exporter_address" class="form-label">Exporter Address</label>
                            <input type="text" class="form-control custom-input" id="exporter_address"
                                name="exporter_address" value="{{ $CertificateOriginNo627120->exporter_address }}">
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="exporter_country" class="form-label">Exporter country</label>
                            <input type="text" class="form-control custom-input" id="exporter_country"
                                name="exporter_country" value="{{ $CertificateOriginNo627120->exporter_country }}">
                        </div>


                        <div class="col-sm-3 mb-3">
                            <label for="consignee_name" class="form-label">Consignee Name</label>
                            <input type="text" class="form-control custom-input" id="consignee_name"
                                name="consignee_name" value="{{ $CertificateOriginNo627120->consignee_name }}">
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="consignee_address" class="form-label">Consignee Address</label>
                            <input type="text" class="form-control custom-input" id="consignee_address"
                                name="consignee_address" value="{{ $CertificateOriginNo627120->consignee_address }}">
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="consignee_country" class="form-label">Consignee country</label>
                            <input type="text" class="form-control custom-input" id="consignee_country"
                                name="consignee_country" value="{{ $CertificateOriginNo627120->consignee_country }}">
                        </div>

                        <div class="col-sm-3 mb-3">
                            <label for="ref_number" class="form-label">Ref number </label>
                            <input type="text" class="form-control custom-input" id="ref_number" name="ref_number"
                                value="{{ $CertificateOriginNo627120->ref_number }}">
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="exporter_membership_number" class="form-label">Exporter membership number</label>
                            <input type="text" class="form-control custom-input" id="exporter_membership_number"
                                name="exporter_membership_number"
                                value="{{ $CertificateOriginNo627120->exporter_membership_number }}">
                        </div>

                        <div class="col-sm-3 mb-3">
                            <label for="particular_of_transport" class="form-label">Particular of transport</label>
                            <input type="text" class="form-control custom-input" id="particular_of_transport"
                                name="particular_of_transport"
                                value="{{ $CertificateOriginNo627120->particular_of_transport }}">
                        </div>

                        <div class="col-sm-3 mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control custom-input" id="date" name="date"
                                value="{{ $CertificateOriginNo627120->date }}">
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="place" class="form-label">Place</label>
                            <input type="text" class="form-control custom-input" id="place" name="place"
                                value="{{ $CertificateOriginNo627120->place }}">
                        </div>


                        <div class="col-sm-3 mb-3">
                            <label for="full_name" class="form-label">Full name</label>
                            <input type="text" class="form-control custom-input" id="full_name" name="full_name"
                                value="{{ $CertificateOriginNo627120->full_name }}">
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="designnation" class="form-label">Designnation</label>
                            <input type="text" class="form-control custom-input" id="designnation"
                                name="designnation" value="{{ $CertificateOriginNo627120->designnation }}">
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="company" class="form-label">Company</label>
                            <input type="text" class="form-control custom-input" id="company" name="company"
                                value="{{ $CertificateOriginNo627120->company }}">
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="other_information" class="form-label">Other information</label>
                            <input type="text" class="form-control custom-input" id="other_information"
                                name="other_information" value="{{ $CertificateOriginNo627120->other_information }}">
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="other_information_2" class="form-label">Other information</label>
                            <input type="text" class="form-control custom-input" id="other_information_2"
                                name="other_information_2" value="{{ $CertificateOriginNo627120->other_information_2 }}">
                        </div>





                    </div>

                    <hr>


                    <div class="row">
                        <!-- =========== Director1 ============ -->
                        @for ($i = 3; $i <= 3; $i++)
                            <div class="col-sm-4 mb-4">
                                <label for="marks_and_numbers_" class="form-label">Mark & Number </label>
                                <input type="text" class="form-control custom-input"
                                    id="marks_and_numbers_{{ $i }}"
                                    name="marks_and_numbers_{{ $i }}"
                                    value="{{ $CertificateOriginNo627120->{'marks_and_numbers_' . $i} }}">
                            </div>

                            <div class="col-sm-4 mb-4">
                                <label for="numbers_and_kinds_of_packges{{ $i }}" class="form-label">Numbers
                                    and kinds of packges</label>
                                <input type="text" step="any" class="form-control custom-input"
                                    id="numbers_and_kinds_of_packges{{ $i }}"
                                    name="numbers_and_kinds_of_packges{{ $i }}"
                                    value="{{ $CertificateOriginNo627120->{'numbers_and_kinds_of_packges' . $i} }}">
                            </div>
                        @endfor
                    </div>
                    <div class="row">
                        @for ($i = 1; $i <= 15; $i++)
                            <div class="col-sm-3 mb-4">
                                <label for="description_of_goods_{{ $i }}" class="form-label">description of
                                    goods </label>
                                <input type="text" step="any" class="form-control custom-input"
                                    id="description_of_goods_{{ $i }}"
                                    name="description_of_goods_{{ $i }}"
                                    value="{{ $CertificateOriginNo627120->{'description_of_goods_' . $i} }}">
                            </div>
                     

                            <div class="col-sm-3 mb-4">
                                <label for="gross_weight_or_other_quantity_" class="form-label">Gross weight or other
                                    quantity</label>
                                <input type="text" step="any" class="form-control custom-input"
                                    id="gross_weight_or_other_quantity_{{ $i }}"
                                    name="gross_weight_or_other_quantity_{{ $i }}"
                                    value="{{ $CertificateOriginNo627120->{'gross_weight_or_other_quantity_' . $i} }}">
                            </div>
                        @endfor
                    </div>
                    <div class="row">
                        @for ($i = 3; $i <= 3; $i++)
                            <div class="col-sm-4 mb-4">
                                <label for="county_of_origin_{{ $i }}" class="form-label">County of origin
                                </label>
                                <input type="text" step="any" class="form-control custom-input"
                                    id="county_of_origin_{{ $i }}"
                                    name="county_of_origin_{{ $i }}"
                                    value="{{ $CertificateOriginNo627120->{'county_of_origin_' . $i} }}">
                            </div>
                            <hr>
                         @endfor
                        <!-- =========== Director1 ============ -->
                    </div>

                    <div class="row">
                        <div class="col-xl-6 d-flex justify-content-start">
                            <button type="button" class="btn btn report-tab-unactive"
                                onclick="window.history.back()">Cancel</button>
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
                    url: "{{ route('team.update_submit_certificate_origin_no627120_invoice') }}",
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

                                //   window.location.href =
                                //     "{{ route('team.report_List_certificate_origin_no627120_invoice') }}"

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
