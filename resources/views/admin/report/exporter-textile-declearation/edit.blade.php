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




                    <h4 class="card-title"> {{ strtoupper('Exporter textile declearation Invoice Edit') }} <br>
                        {{-- <span style="color:darkgray; font-size:12px;">Exporter textile declearation Invoice</span> --}}
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
                                        {{ isset($ExporterTextileDeclearation) && $item->id == $ExporterTextileDeclearation->commercial_invoice_id ? 'selected' : '' }}>
                                        Invoice No: {{ $item->commercial_invoice }}
                                    </option>
                                @empty
                                    <option>No Records found</option>
                                @endforelse
                            </select>

                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="exporter_textile_declearation_invoices" class="form-label">Invoice</label>
                            <input type="text" class="form-control custom-input"
                                id="exporter_textile_declearation_invoices" name="exporter_textile_declearation_invoices"
                                value="{{ $ExporterTextileDeclearation->exporter_textile_declearation_invoices }}">
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="hidden" class="form-control custom-input" id="id" name="id"
                                value="{{ $ExporterTextileDeclearation->id }}">
                            <input type="date" class="form-control custom-input" id="date" name="date"
                                value="{{ $ExporterTextileDeclearation->date }}">
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="title" class="form-label">title</label>
                            <input type="text" class="form-control custom-input" id="title" name="title"
                                value="{{ $ExporterTextileDeclearation->title }}">
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="declared" class="form-label">Declared</label>
                            <input type="text" class="form-control custom-input" id="declared" name="declared"
                                value="{{ $ExporterTextileDeclearation->declared }}">
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="full_name" class="form-label">Full Name</label>
                            <input type="text" class="form-control custom-input" id="full_name" name="full_name"
                                value="{{ $ExporterTextileDeclearation->full_name }}">
                        </div>



                    </div>


                    <hr>


                    <div class="row">
                        <!-- =========== Director1 ============ -->
                        @for ($i = 1; $i <= 1; $i++)
                            <div class="col-sm-4 mb-4">
                                <label for="invoice_number_" class="form-label">Invoice number </label>
                                <input type="text" class="form-control custom-input"
                                    id="invoice_number_{{ $i }}" name="invoice_number_{{ $i }}"
                                    value="{{ $ExporterTextileDeclearation->{'invoice_number_' . $i} }}">
                            </div>
                            <div class="col-sm-4 mb-4">
                                <label for="b_l_number_" class="form-label">B/L
                                    NUMBER </label>
                                <input type="text" class="form-control custom-input" id="b_l_number_{{ $i }}"
                                    name="b_l_number_{{ $i }}"
                                    value="{{ $ExporterTextileDeclearation->{'b_l_number_' . $i} }}">
                            </div>


                            <div class="col-sm-4 mb-4">
                                <label for="marks_or_identification_number_{{ $i }}" class="form-label"> MARKS OR
                                    IDENTIFICATION NUMBER</label>
                                <input type="text" step="any" class="form-control custom-input"
                                    id="marks_or_identification_number_{{ $i }}"
                                    name="marks_or_identification_number_{{ $i }}"
                                    value="{{ $ExporterTextileDeclearation->{'marks_or_identification_number_' . $i} }}">
                            </div>
                        @endfor
                    </div>

                    <div class="row">

                        @for ($i = 1; $i <= 12; $i++)
                            <div class="col-sm-4 mb-4">
                                <label for="description_and_procedure_" class="form-label"> DESCRIPTION OF PRODUCE</label>
                                <input type="text" step="any" class="form-control custom-input"
                                    id="description_and_procedure_{{ $i }}"
                                    name="description_and_procedure_{{ $i }}"
                                    value="{{ $ExporterTextileDeclearation->{'description_and_procedure_' . $i} }}">
                            </div>

                            {{-- <div class="col-sm-4 mb-4">
                                <label for="country_of_origin_{{ $i }}" class="form-label">Country of
                                    origin</label>
                                <input type="text" step="any" class="form-control custom-input"
                                    id="country_of_origin_{{ $i }}"
                                    name="country_of_origin_{{ $i }}"
                                    value="{{ $ExporterTextileDeclearation->{'country_of_origin_' . $i} }}">
                            </div> --}}
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
                    url: "{{ route('admin.update_submit_exporter_textile_declearation_invoice') }}",
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
                                // window.location.href =
                                //   "{{ route('admin.report_List_exporter_textile_declearation_invoice') }}"

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
