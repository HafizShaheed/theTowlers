@extends('admin.includes.master')
@section('addStyle')
    <style>

    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
             {{-- <h2>Filter:</h2> --}}
            <div class="card">
                <div class="card-body justify-content-start">
                    <form id="" action="{{ route('admin.report_List_commercial_invoice') }}"
                        class="row d-flex justify-content-between align-items-end">
                        <div class="col-xl-2 col-sm-6 col-6 mt-4 mt-md-0">
                            <label for="thirdPartyName">Invoice Numbers:</label>
                            <div class="d-flex justify-content-start align-items-start">
                                <?php
                                $allInvoiceNUmber = App\Models\CommercialInvoice::get();
                                ?>
                                <select class="multi-select" name="InvoiceNUmber" id="InvoiceNUmber"
                                    placeholder="Select Third Party">
                                    <option value="" >Select Invoice number</option>
                                    @forelse ($allInvoiceNUmber as $invoice)
                                        <option value="{{ $invoice->id }}"
                                            {{ request('InvoiceNUmber') == $invoice->id ? 'selected' : '' }}>
                                            {{ $invoice->commercial_invoice }}
                                        </option>
                                  
                                      
                                    @empty
                                        
                                    <option >No record found</option>
                                    @endforelse
                                   
                                </select>


                            </div>
                            
                        </div>
                        <div class="col-xl-2 col-sm-6 col-6 mt-4 mt-md-0">
                            <label for="thirdPartyName">Team Member:</label>
                            <div class="d-flex justify-content-start align-items-start">
                                <?php
                                $allTeamMember = App\Models\team\TeamUser::get();
                                
                                ?>
                                <select class="multi-select" name="teamMember" id="teamMember"
                                    placeholder="Select Third Party">
                                    <option value="" >Select Team</option>
                                    @foreach ($allTeamMember as $team)
                                        <option value="{{ $team->id }}"
                                            {{ request('teamMember') == $team->id ? 'selected' : '' }}>
                                            {{ $team->user_name }}
                                        </option>
                                    @endforeach
                                    @if ($allTeamMember->isEmpty())
                                        <option disabled>No Member found</option>
                                    @endif
                                </select>


                            </div>
                            
                        </div>
                        

                        <div class="col-xl-2 col-sm-6 col-6 mt-4 mt-md-0">

                            <label for="thirdPartyName">Status:</label>
                            <div class="d-flex justify-content-start align-items-start">
                                <select class="multi-select" name="status" placeholder="Select status Party">
                                    <option value="" >Report Status</option>
                                    <option value="Active" {{ request('status') == 'Active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="Resubmit" {{ request('status') == 'Resubmit' ? 'selected' : '' }}>
                                        Resubmit</option>
                                    <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>
                                        Completed</option>
                                </select>


                            </div>
                        </div>

                      
                        <div class="col-xl-1 col-sm-6 col-6 mt-4 mt-md-0">
                            <div class="d-flex justify-content-start align-items-start">
                                <button type="submit" class="btn btn report-tab-active"
                                    id="filter-reprot-btn">Filter</button>
                            </div>
                        </div>
                        <div class="col-xl-1 col-sm-6 col-6 mt-4 mt-md-0">
                            <div class="d-flex justify-content-start align-items-start">
                                <a href="{{ route('admin.report_List_commercial_invoice') }}"
                                    class="btn btn report-tab-unactive" id="filter-reprot-btn">Reset</a>
                            </div>
                        </div>
                    </form>
                    <div class="col-xl-2 col-sm-6 col-6 mt-6 pt-2 ">
                        <div class="d-flex justify-content-start align-items-start">
                            <a href="{{ URL::to('/panel/report/commercial-invoice/add') }}" class="" target="">
                                <button type="submit" class="btn btn report-tab-active" id="filter-reprot-btn">Add
                                    Report</button>
                            </a>

                        </div>
                    </div>

                    <!-- <form id="" action="{{ route('admin.report_List_commercial_invoice') }}" class="row d-flex justify-content-between align-items-end">

                        <div class="col-xl-6 col-sm-3 col-3 ml-3 " >
                            <div class="c-list ">
                                <div class="input-group search-area">
                                    <input type="text"  name="searchReport" class="form-control" placeholder="Search">
                                    <span class="input-group-text">

                                            <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="8.82495" cy="9.32491" r="6.74142" stroke="#0D99FF"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M13.5137 14.3638L16.1568 16.9999" stroke="#0D99FF"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>

                                    </span>
                                </div>
                            </div>
                        </div>
                    </from> -->
                </div>
            </div>

        </div>

        <div class="col-xl-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive active-projects style-1">
                        <div class="tbl-caption">
                            <h4 class="heading mb-0">Invoice List</h4>
                            <div>


                            </div>
                        </div>
                        <table id="empoloyees-tblwrapper" class="table ">
                            <thead>
                                <tr>
                                    <th> ID</th>

                                    <th> Invoice No</th>
                                    <th> Team Member</th>
                                    <th>Created At</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($CommercialInvoice as $key => $value)
                                    <tr>
                                        <td><span>{{ $value->id ?? '' }}</span></td>


                                        <td>
                                            <span>{{ $value->commercial_invoice ?? '' }}</span>
                                        </td>
                                        <?php
                                         if (isset($value->team_user_id)) {
                                    # code...
                                    $memberName = App\Models\team\TeamUser::where('id',$value->team_user_id)->first('user_name');
                                }
                                ?>
                                <td><span>{{  $memberName->user_name ?? 'N/A' }}</span></td>
                                        <td><span>{{ isset($value->created_at) ? $value->created_at->diffForHumans() : '' }}</span>
                                        </td>
                                        <td>
                                            @switch(isset($value->status) ? $value->status : 0)
                                                @case('1')
                                                    <span class="badge badge-success border-0" title="Report Active">Active </span>
                                                @break

                                                @case('0')
                                                    <span class="badge badge-danger border-0" title="Report Pending">Pending </span>
                                                @break

                                                @case('2')
                                                    <span class="badge badge-info border-0" title="Report Resubmit">Resubmit</span>
                                                @break

                                                @case('3')
                                                    <span class="badge badge-primary border-0"
                                                        title="Report Completed">Completed</span>
                                                @break
                                            @endswitch
                                        </td>

                                        <td class="text-center space-between ">

                                            <button class="btn btn-sm report-tab-active thirdpartyIdForFormResubmit"
                                                style="font-size: 10px;" href="javascript:void(0)"
                                                data-thirdparty="{{ $value->id }}">
                                                Re-Submit
                                            </button>



                                            <a class="btn btn-sm report-tab-active" style="font-size: 10px;"
                                                href="{{ URL::to('/panel/report/commercial-invoice/view/' . $value->id) }}"
                                                class="" target="" title="View Reports">
                                                View
                                            </a>
                                            <a class="btn btn-sm report-tab-active" style="font-size: 10px;"
                                                href="{{ URL::to('/panel/report/commercial-invoice/edit/' . $value->id) }}"
                                                class="" target="" title="Edit Reports">
                                                Edit
                                            </a>
                                            <button class="btn btn-sm report-tab-active thirdpartyIdForForComplete"
                                                style="font-size: 10px;" href="javascript:void(0)"
                                                data-thirdparty="{{ $value->id }}">
                                                Done
                                            </button>
                                            <span></span>
                                            <a class="btn btn-sm report-tab-active" style="font-size: 10px;"
                                                href="{{ URL::to('/panel/report/commercial-invoice/generate_commercial_invoice_PDF/' . $value->id) }}"
                                                class="" target="" title="View Pdf">
                                                PDF
                                            </a>


                                            <a class="btn btn-sm report-tab-active" style="font-size: 10px;"
                                                href="{{ URL::to('/panel/report/commercial-invoice/activity/' . $value->id) }}"
                                                class="" target="" title="View Activity">
                                                Activity
                                            </a>
                                            <a class="btn btn-sm report-tab-active" style="font-size: 10px;"
                                                href="{{ URL::to('/panel/report/commercial-invoice/commercial_invoice_by_pdf/' . base64_encode($value->id)) }}"
                                                class="" target="" title="View Pdf">
                                                Related Documents
                                            </a>
                                            <a class="btn btn-sm report-tab-active" style="font-size: 10px; {{ isset($value->pdf_upload_file_ic) || !empty($value->pdf_upload_file_ic) ?  'background-color: #2032ae !important;' : 'background-color: #45ae20 !important; pointer-events: none;  cursor: default; text-decoration: none;' }}" 
                                                href="{{ URL::to('/panel/report/commercial-invoice/pdf_file_view/' . base64_encode($value->id)) }}"
                                                class="" target="" title="View Pdf">
                                                File View
                                            </a>


                                        </td>
                                    </tr>
                                @endforeach







                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('addScript')
    <script>
        $(document).ready(function() {
            $('.thirdpartyIdForFormResubmit').on('click', function() {

                var formId = $(this).data("thirdparty");


                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This action cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, re-submit!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User clicked "Yes", proceed with the AJAX request
                        $.ajax({
                            type: "POST",
                            headers: {
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                    "content"),
                            },
                            url: "{{ route('admin.commercial_invoice_resubmit') }}",
                            data: {
                                formId: formId
                            }, // Send data as an object
                            dataType: "json",
                            success: function(response) {
                                console.log(response);

                                Swal.fire({
                                    title: "Success!",
                                    text: response.message,
                                    icon: "success",
                                    confirmButtonText: "OK",
                                    timer: 500, // 3 seconds
                                    timerProgressBar: true,
                                    willClose: () => {
                                        window.location.href =
                                            '{{ route('admin.report_List_commercial_invoice') }}';
                                    },
                                });
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        });
                    }
                });
            });


            $('.thirdpartyIdForForComplete').on('click', function() {

                var forCompetingFormId = $(this).data("thirdparty");


                Swal.fire({
                    title: 'Are you sure?',
                    text: 'All reports status change to complted.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Completed!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User clicked "Yes", proceed with the AJAX request
                        $.ajax({
                            type: "POST",
                            headers: {
                                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                    "content"),
                            },
                            url: "{{ route('admin.commercial_invoice_completed') }}",
                            data: {
                                forCompetingFormId: forCompetingFormId
                            }, // Send data as an object
                            dataType: "json",
                            success: function(response) {
                                console.log(response);

                                Swal.fire({
                                    title: "Success!",
                                    text: response.message,
                                    icon: "success",
                                    confirmButtonText: "OK",
                                    timer: 500, // 3 seconds
                                    timerProgressBar: true,
                                    willClose: () => {
                                        window.location.href =
                                            '{{ route('admin.report_List_commercial_invoice') }}';
                                    },
                                });
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        });
                    }
                });
            });


        });
    </script>
@endsection
