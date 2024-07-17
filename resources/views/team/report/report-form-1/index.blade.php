@extends('team.includes.master')
@section('addStyle')
<style>

</style>
@endsection
@section('content')


<div class="row">
    <div class="col-12">
        <h2>Filter:</h2>
        <div class="card">
            <div class="card-body justify-content-start">
                <form id="" action="{{route('admin.report_List')}}" class="row d-flex justify-content-between align-items-end">
                    <div class="col-xl-3 col-sm-6 col-6 mt-4 mt-md-0">
                        <label for="thirdPartyName"></label>
                        <div class="d-flex justify-content-start align-items-start">
                        


                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-6 mt-4 mt-md-0">

                        <label for="thirdPartyName">Status:</label>
                        <div class="d-flex justify-content-start align-items-start">
                            <select class="multi-select" name="status" placeholder="Select status Party">
                                <option disabled>Report Status</option>
                                <option value="Active" {{ request('status') == 'Active' ? 'selected' : '' }}>Active
                                </option>
                                <option value="Resubmit" {{ request('status') == 'Resubmit' ? 'selected' : '' }}>
                                    Resubmit</option>
                              
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
                            <a href="{{route('admin.report_List')}}" class="btn btn report-tab-unactive"
                                id="filter-reprot-btn">Reset</a>
                        </div>
                    </div>
                </form>
                <div class="col-xl-2 col-sm-6 col-6 mt-6 pt-2 ">
                        <div class="d-flex justify-content-start align-items-start">
                            <a href="{{ URL::to('/panel-team/report/add_report_form_1') }}" class="" target="_blank">
                            <button type="submit" class="btn btn report-tab-active"
                                id="filter-reprot-btn">Add Report</button>
                            </a>

                        </div>
                    </div>

                <!-- <form id="" action="{{route('admin.report_List')}}" class="row d-flex justify-content-between align-items-end">

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
                        <h4 class="heading mb-0">Reprts List</h4>
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

                            <tr>
                                <td><span>1</span></td>


                                <td>
                                    <span>ABC-12334</span>
                                </td>

                                <td><span>ABC</span></td>
                                <td><span>01/02/2024</span></td>
                                <td>
                                    @switch(1)
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
                                    <span class="badge badge-primary border-0" title="Report Completed">Completed</span>


                                    @break

                                    @endswitch
                                </td>

                                <td class="text-center space-between ">

                                    <a href="javascript:void(0)" class="thirdpartyIdForFormResubmit" data-thirdparty="">
                                        <i class="fa fa-refresh fa-2x" style="cursor:pointer;" title="Re-submit Report" aria-hidden="true"></i>
                                    </a>


                                    <a href="{{ URL::to('/panel-team/report/view_report_form_1') }}" class="" target="_blank" title="View Reports">

                                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.5096 2.53165H7.41104C5.50437 2.52432 3.94146 4.04415 3.89654 5.9499V15.7701C3.85437 17.7071 5.38979 19.3121 7.32671 19.3552C7.35512 19.3552 7.38262 19.3561 7.41104 19.3552H14.7343C16.6538 19.2773 18.1663 17.6915 18.1525 15.7701V7.36798L13.5096 2.53165Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M13.2688 2.52084V5.18742C13.2688 6.48909 14.3211 7.54417 15.6228 7.54784H18.1482" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M13.0974 14.0786H8.1474" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M11.2229 10.6388H8.14655" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                    <a  href="{{ URL::to('/panel-team/report/edit_report_form_1') }}" class="" target="_blank" title="Edit Reports">

                                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none">
                                            <path d="M11.4925 2.789H7.75349C4.67849 2.789 2.75049 4.966 2.75049 8.048V16.362C2.75049 19.444 4.66949 21.621 7.75349 21.621H16.5775C19.6625 21.621 21.5815 19.444 21.5815 16.362V12.334" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.9209L16.3011 3.44793C17.2321 2.51793 18.7411 2.51793 19.6721 3.44793L20.8891 4.66493C21.8201 5.59593 21.8201 7.10593 20.8891 8.03593L13.3801 15.5449C12.9731 15.9519 12.4211 16.1809 11.8451 16.1809H8.09912L8.19312 12.4009C8.20712 11.8449 8.43412 11.3149 8.82812 10.9209Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M15.1655 4.60254L19.7315 9.16854" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                    <a href="javascript:void(0)" class="thirdpartyIdForForComplete" data-thirdparty="">
                                        <i class="fa fa-check-square fa-2x" title="Click to complete Report" aria-hidden="true"></i>
                                    </a>
                                    <span></span>
                                    <a href="{{ URL::to('/panel-team/report/generate-pdf/1') }}" class="" target="_blank" title="View Pdf">

                                    <svg width="35" height="35" viewBox="0 0 35 35" fill="none">
                                <path d="M12.1221 15.4361L12.1221 3.39508" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15.0381 12.5084L12.1221 15.4364L9.20609 12.5084" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M16.7551 8.12799H17.6881C19.7231 8.12799 21.3721 9.77699 21.3721 11.813V16.697C21.3721 18.727 19.7271 20.372 17.6971 20.372L6.55707 20.372C4.52207 20.372 2.87207 18.722 2.87207 16.687V11.802C2.87207 9.77299 4.51807 8.12799 6.54707 8.12799L7.48907 8.12799" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                </a>

                                <a href="{{ URL::to('/panel-team/report/activity_report_form_1') }}" class="" target="_blank"  title="View Activity">
                                <svg width="35" height="35" viewBox="0 0 35 35" fill="none" title="Activity">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3345 2.75018H7.66549C4.64449 2.75018 2.75049 4.88918 2.75049 7.91618V16.0842C2.75049 19.1112 4.63449 21.2502 7.66549 21.2502H16.3335C19.3645 21.2502 21.2505 19.1112 21.2505 16.0842V7.91618C21.2505 4.88918 19.3645 2.75018 16.3345 2.75018Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15.391 14.0177L12 11.9947V7.63367" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                </a>


                                </td>
                            </tr>






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

     $(document).ready(function () {
        $('.thirdpartyIdForFormResubmit').on('click', function() {

              var thirdpartyId = $(this).data("thirdparty");


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
                        url: "{{ route('admin.update_resubmited_allreports') }}",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                        data: { thirdpartyId: thirdpartyId }, // Send data as an object
                        dataType: "json",
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
                                    window.location.href = '{{ route("admin.report_List") }}';
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

                var thirdpartyId = $(this).data("thirdparty");


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
                        url: "{{ route('admin.update_completed_allreports') }}",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                        data: { thirdpartyId: thirdpartyId }, // Send data as an object
                        dataType: "json",
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
                                    window.location.href = '{{ route("admin.report_List") }}';
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
