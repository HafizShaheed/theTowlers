@extends('admin.includes.master')
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
                        <label for="thirdPartyName">Third Party:</label>
                        <div class="d-flex justify-content-start align-items-start">
                            @php
                            $thirdparties = \App\Models\ThirdParty::get();
                            @endphp
                            <select class="multi-select" name="PartyName" id="PartyName"
                                placeholder="Select Third Party">
                                <option disabled selected>Select Party</option>
                                @forelse ($thirdparties as $thirdparty )
                                <option data-display="Select" value="{{ $thirdparty->id }}">
                                    {{ $thirdparty->third_party_name  }}
                                </option>
                                @empty
                                <p>No records found!</p>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-6 mt-4 mt-md-0">
                        <label for="thirdPartyName">Client Name:</label>
                        <div class="d-flex justify-content-start align-items-start">
                            @php
                            $user = \App\Models\User::get();
                            @endphp
                            <select class="multi-select" name="clientName" id="clientNameID"
                                placeholder="Select Third Party">
                                <option disabled selected>Select Client</option>
                                @forelse ($user as $client )
                                <option data-display="Select" value="{{ $client->id }}">
                                    {{ $client->first_name  }}
                                </option>
                                @empty
                                <p>No records found!</p>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-6 mt-4 mt-md-0">
                            @php
                            $pendingCount = \App\Models\ThirdParty::where('status',0)->count();
                            $activeCount = \App\Models\ThirdParty::where('status',1)->count();
                            $reSubmitCount = \App\Models\ThirdParty::where('status',2)->count();
                            $completedCount = \App\Models\ThirdParty::where('status',3)->count();
                            @endphp
                        <label for="thirdPartyName">Status:</label>
                        <div class="d-flex justify-content-start align-items-start">
                            <select class="multi-select" name="status" placeholder="Select status Party">
                                <option disabled selected>Report Status</option>
                                <option value="Pending">Pending ({{$pendingCount}})</option>
                                <option class="badge badge-success border-0" value="Active">Active ({{$activeCount}}) </option>
                                <option value="Resubmit">Resubmit ({{$reSubmitCount}}) </option>
                                <option value="Completed">Completed ({{$completedCount}}) </option>
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

                                <th> Client Name</th>
                                <th> Third Party</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($getallThirdParty) > 0)
                            @foreach ($getallThirdParty as $value)
                            <tr>
                                <td><span>{{$value->id}}</span></td>
                                @php
                                $user = \App\Models\User::where('id', $value->user_id)->first();
                                @endphp

                                <td>
                                    <span>{{ $user ? $user->first_name.'/'.$user->user_name : '' }}</span>
                                </td>

                                <td><span>{{$value->third_party_name}}</span></td>
                                <td><span>{{$value->created_at->format('d/m/Y')}}</span></td>
                                <td>
                                    @switch($value->status)
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

                                    <a href="javascript:void(0)" class="thirdpartyIdForFormResubmit" data-thirdparty="{{ $value->id }}">
                                        <i class="fa fa-refresh fa-2x" style="cursor:pointer;" title="Re-submit Report" aria-hidden="true"></i>
                                    </a>


                                    <a href="{{ URL::to('/panel/report/view'.'/'.$value->id) }}" title="View Reports">

                                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.5096 2.53165H7.41104C5.50437 2.52432 3.94146 4.04415 3.89654 5.9499V15.7701C3.85437 17.7071 5.38979 19.3121 7.32671 19.3552C7.35512 19.3552 7.38262 19.3561 7.41104 19.3552H14.7343C16.6538 19.2773 18.1663 17.6915 18.1525 15.7701V7.36798L13.5096 2.53165Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M13.2688 2.52084V5.18742C13.2688 6.48909 14.3211 7.54417 15.6228 7.54784H18.1482" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M13.0974 14.0786H8.1474" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M11.2229 10.6388H8.14655" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                    <a href="{{ URL::to('/panel/report/edit'.'/'.$value->id) }}" title="Edit Reports">

                                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none">
                                            <path d="M11.4925 2.789H7.75349C4.67849 2.789 2.75049 4.966 2.75049 8.048V16.362C2.75049 19.444 4.66949 21.621 7.75349 21.621H16.5775C19.6625 21.621 21.5815 19.444 21.5815 16.362V12.334" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.9209L16.3011 3.44793C17.2321 2.51793 18.7411 2.51793 19.6721 3.44793L20.8891 4.66493C21.8201 5.59593 21.8201 7.10593 20.8891 8.03593L13.3801 15.5449C12.9731 15.9519 12.4211 16.1809 11.8451 16.1809H8.09912L8.19312 12.4009C8.20712 11.8449 8.43412 11.3149 8.82812 10.9209Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M15.1655 4.60254L19.7315 9.16854" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                    <a href="javascript:void(0)" class="thirdpartyIdForForComplete" data-thirdparty="{{$value->id}}">
                                        <i class="fa fa-check-square fa-2x" title="Click to complete Report" aria-hidden="true"></i>
                                    </a>


                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="3"><span>No records found!</span></td>
                            @endif



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




