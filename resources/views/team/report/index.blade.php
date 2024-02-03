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
                        <label for="thirdPartyName">Status:</label>
                        <div class="d-flex justify-content-start align-items-start">
                            <select class="multi-select" name="status" placeholder="Select status Party">
                                <option disabled selected>Report Status</option>
                                <option value="Pending">Pending</option>
                                <option class="badge badge-success border-0" value="Active">Active</option>
                                <option value="Resubmit">Resubmit</option>
                                <option value="Completed">Completed</option>
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

                            <tr>
                                <td><span>1001</span></td>
                                <td><span>Hero Honda</span></td>
                                <td><span>Third party</span></td>
                                <td><span>12-12-2023</span></td>
                                <td>
                                    <span class="badge badge-danger light border-0">Pending</span>
                                </td>

                                <td class="text-center space-between">


                                    <a href="{{ URL::to('/panel-team/report/view') }}" title="View Reports">

                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.5096 2.53165H7.41104C5.50437 2.52432 3.94146 4.04415 3.89654 5.9499V15.7701C3.85437 17.7071 5.38979 19.3121 7.32671 19.3552C7.35512 19.3552 7.38262 19.3561 7.41104 19.3552H14.7343C16.6538 19.2773 18.1663 17.6915 18.1525 15.7701V7.36798L13.5096 2.53165Z"
                                    stroke="#130F26" stroke-width="1.5"  stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M13.2688 2.52084V5.18742C13.2688 6.48909 14.3211 7.54417 15.6228 7.54784H18.1482"
                                    stroke="#130F26" stroke-width="1.5"  stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M13.0974 14.0786H8.1474" stroke="#130F26" stroke-width="1.5"  stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M11.2229 10.6388H8.14655" stroke="#130F26" stroke-width="1.5"  stroke-linecap="round"
                                    stroke-linejoin="round" />
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

</script>
@endsection
