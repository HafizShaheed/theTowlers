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
                <form id="" action="{{route('admin.companyList')}}"
                    class="row d-flex justify-content-between align-items-end">
                    <div class="col-xl-4 col-sm-6 col-6 mt-4 mt-md-0">
                        <label for="thirdPartyName">Zone:</label>
                        <div class="d-flex justify-content-start align-items-start">
                            @php
                            $zones = \App\Models\Zone::get();
                            @endphp
                            <select class="multi-select" name="location" id="location" placeholder="Select Third Party">
                                <option disabled selected>Select Zone</option>
                                @forelse ($zones as $value )
                                <option data-display="Select" value="{{ $value->id }}">
                                    {{ $value->zone_name  }}
                                </option>
                                @empty
                                <p>No records found!</p>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="col-xl-4 col-sm-6 col-6 mt-4 mt-md-0">
                        <label for="thirdPartyName">Status:</label>
                        <div class="d-flex justify-content-start align-items-start">
                            <select class="multi-select" name="status" placeholder="Select status Party">
                                <option disabled selected> Status</option>
                                <option class="badge badge-success border-0" value="Active">Active</option>
                                <option value="In-Active">In-Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-6 col-6 mt-4 mt-md-0">
                        <div class="d-flex justify-content-start align-items-end">
                            <button type="submit" class="btn btn report-tab-active"
                                id="filter-reprot-btn">Filter</button>
                        </div>
                    </div>
                    
                </form>


                <form id="" action="{{route('admin.companyList')}}" class="row d-flex justify-content-between align-items-end">

                    <div class="col-xl-6 col-sm-3 col-3 ml-3 ">
                        <div class="c-list ">
                            <div class="input-group search-area">
                                <input type="text" name="Client" class="form-control" placeholder="Enter key words">
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
                    <div class="col-xl-6 col-sm-6 col-6 ">
                        <div class="d-flex justify-content-start mb-3">
                            <a href="{{route('admin.companyList')}}" class="btn btn report-tab-active"
                                id="filter-reprot-btn">Reset</a>
                        </div>
                    </div>
                    </from>
            </div>
        </div>

    </div>

    <div class="col-xl-12">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive active-projects style-1">
                    <div class="tbl-caption">
                        <h4 class="heading mb-0">Client List</h4>
                        <div>


                        </div>
                    </div>
                    <table id="empoloyees-tblwrapper" class="table ">
                        <thead>
                            <tr>
                                <th> ID</th>

                                <th> Company Name</th>
                                <th> Company Email</th>
                                <th>Username </th>
                                <th>Industry </th>
                                <th>POC</th>
                                <th>Location</th>
                                <th>Created_at</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (count($getallclient) > 0)
                            @foreach ($getallclient as $value)
                            <tr>
                                <td><span>{{$value->id}}</span></td>
                                <td><span>{{$value->first_name}}</span></td>
                                <td><span>{{$value->email}}</span></td>

                                <td><span>{{$value->user_name}}</span></td>
                                <td><span>{{$value->industry}}</span></td>
                                <td><span>{{$value->poc}}</span></td>


                                @php
                                $zone= \App\Models\Zone::where('id', $value->zone_id)->first();
                                @endphp

                                <td><span>{{$zone ?  $zone->zone_name  : ''}}

                                    </span></td>
                                <td><span>{{$value->created_at->format('d/m/Y')}}</span></td>
                                <td>
                                    @switch($value->status)
                                    @case('1')
                                    <span class="badge badge-success light  border-0">Active </span>
                                    @break

                                    @case('0')
                                    <span class="badge badge-danger light  border-0">In-active </span>

                                    @break

                                    @endswitch
                                </td>

                                <td>
                                    <a href="{{ URL::to('/panel/client/edit').'/'.$value->id }}" title="Client Edit">

                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.4925 2.789H7.75349C4.67849 2.789 2.75049 4.966 2.75049 8.048V16.362C2.75049 19.444 4.66949 21.621 7.75349 21.621H16.5775C19.6625 21.621 21.5815 19.444 21.5815 16.362V12.334"
                                                stroke="#130F26" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.82812 10.9209L16.3011 3.44793C17.2321 2.51793 18.7411 2.51793 19.6721 3.44793L20.8891 4.66493C21.8201 5.59593 21.8201 7.10593 20.8891 8.03593L13.3801 15.5449C12.9731 15.9519 12.4211 16.1809 11.8451 16.1809H8.09912L8.19312 12.4009C8.20712 11.8449 8.43412 11.3149 8.82812 10.9209Z"
                                                stroke="#130F26" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M15.1655 4.60254L19.7315 9.16854" stroke="#130F26"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
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

</script>
@endsection