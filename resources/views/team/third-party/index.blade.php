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
                <form id="" action="{{route('team.vender_List')}}" class="row d-flex justify-content-between align-items-end">
                    <div class="col-xl-3 col-sm-6 col-6 mt-4 mt-md-0">
                        <label for="thirdPartyName">Third Party:</label>
                        <div class="d-flex justify-content-start align-items-start">
                            @php
                            $thirdparties = \App\Models\ThirdParty::where('status', '<>', 3)->get();
                            $clientIds = \App\Models\ThirdParty::where('status', '<>', 3)->pluck('user_id');
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
                            $user = \App\Models\User::whereIn('id', $clientIds)->get();
                            @endphp
                            <select class="multi-select" name="clientName" id="clientNameID"
                                placeholder="Select Third Party">
                                <option disabled selected>Select Client</option>
                                @forelse ($user as $client )
                                <option data-display="Select" value="{{ $client->id }}">
                                    {{ $client->first_name }}
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
                        @php
                            $pendingCount = \App\Models\ThirdParty::where('status',0)->count();
                            $activeCount = \App\Models\ThirdParty::where('status',1)->count();
                            $reSubmitCount = \App\Models\ThirdParty::where('status',2)->count();
                            @endphp
                            <select class="multi-select" name="status" placeholder="Select status Party">
                                <option disabled selected>Report Status</option>
                                <option value="Pending">Pending ({{ $pendingCount }})</option>
                                <option class="badge badge-success border-0" value="Active">Active ({{  $activeCount }})</option>
                                <option value="Resubmit">Resubmit ({{  $reSubmitCount  }})</option>
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
                            <a href="{{route('team.vender_List')}}" class="btn btn report-tab-unactive"
                                id="filter-reprot-btn">Reset</a>
                        </div>
                    </div>
                </form>


                <!-- <form id="" action="{{route('team.vender_List')}}" class="row d-flex justify-content-between align-items-end">

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
                            @foreach ($getallThirdParty  as $key => $value)
                            <tr>
                                <td><span>{{++$key}}</span></td>
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





                                    <a href="{{ URL::to('/panel-team/report/edit/'. base64_encode($value->id)) }}" title="Edit Reports">

                                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none">
                                            <path d="M11.4925 2.789H7.75349C4.67849 2.789 2.75049 4.966 2.75049 8.048V16.362C2.75049 19.444 4.66949 21.621 7.75349 21.621H16.5775C19.6625 21.621 21.5815 19.444 21.5815 16.362V12.334" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.9209L16.3011 3.44793C17.2321 2.51793 18.7411 2.51793 19.6721 3.44793L20.8891 4.66493C21.8201 5.59593 21.8201 7.10593 20.8891 8.03593L13.3801 15.5449C12.9731 15.9519 12.4211 16.1809 11.8451 16.1809H8.09912L8.19312 12.4009C8.20712 11.8449 8.43412 11.3149 8.82812 10.9209Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M15.1655 4.60254L19.7315 9.16854" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
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

@endsection




