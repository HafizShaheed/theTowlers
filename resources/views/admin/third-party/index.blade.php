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
                <form id="" action="{{route('admin.vender_List')}}" class="row d-flex justify-content-between align-items-end">
                    <div class="row">
                        <div class="col-xl-4 col-sm-6 col-6 mt-4 mt-md-0">
                            <label for="thirdPartyName">Client Name:</label>
                            <div class="d-flex justify-content-start align-items-start">
                                @php
                                $users = \App\Models\User::get();
                                @endphp
                                <select class="multi-select" multiple="multiple"  name="ClientName[]" id="ClientName" placeholder="Select ">
                                    <option disabled >Select Client</option>
                                    @forelse ($users as $user )
                                    <option data-display="Select" value="{{ $user->id }}"
                                    @if(is_array(request('ClientName')) && in_array($user->id,
                                        request('ClientName'))) selected @endif>
                                        {{ $user->first_name  }}
                                    </option>
                                    @empty
                                    <p>No records found!</p>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-6 mt-4 mt-md-0">
                            <label for="thirdPartyName">Location:</label>
                            <div class="d-flex justify-content-start align-items-start">
                                @php
                                $zones = \App\Models\Zone::get();
                                @endphp
                                <select class="multi-select" multiple="multiple" name="location[]" id="location" placeholder="Select Third Party">
                                    <option disabled >Select Location</option>
                                    @forelse ($zones as $zone)
                                    <option data-display="Select" value="{{ $zone->id }}"
                                    @if(is_array(request('location')) && in_array($zone->id,
                                        request('location'))) selected @endif>
                                        {{ $zone->zone_name  }}
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
                                @php
                                $states = \App\Models\State::get();

                                @endphp
                                <select class="multi-select" multiple="multiple" name="State[]"  id="State" placeholder="Select Third Party">
                                    <option disabled >Select State</option>
                                    @forelse ($states as $state )
                                        <option data-display="Select" value="{{ $state->id }}"
                                        @if(is_array(request('State')) && in_array($state->id,
                                        request('State'))) selected @endif>
                                        {{ $state->state_name  }}
                                    </option>
                                    @empty
                                    <p>No records found!</p>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-xl-4 col-sm-6 col-6 mt-4 mt-md-0">
                            <label for="thirdPartyName">Department:</label>
                            <div class="d-flex justify-content-start align-items-start">
                                @php
                                $departments = \App\Models\Department::get();
                                @endphp
                                <select class="multi-select" multiple="multiple" name="Department[]" id="Department" placeholder="Select Department">
                                    <option disabled >Select Department</option>
                                    @forelse ($departments as $department )
                                    <option data-display="Select" value="{{ $department->id }}"
                                    @if(is_array(request('Department')) && in_array($department->id,
                                        request('Department'))) selected @endif>
                                        {{ $department->dept_name  }}
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
                                @php
                                $pendingCount = \App\Models\ThirdParty::where('status',0)->count();
                                $activeCount = \App\Models\ThirdParty::where('status',1)->count();
                                $reSubmitCount = \App\Models\ThirdParty::where('status',2)->count();
                                $completedCount = \App\Models\ThirdParty::where('status',3)->count();
                                @endphp
                                <select class="multi-select" name="status" placeholder="Select status Party">
                                    <option value="" >Status:</option>
                                    <option value="Pending">Pending ({{ $pendingCount }}) </option>
                                    <option class="badge badge-success border-0" value="Active">Active ({{ $activeCount }}) </option>
                                    <option value="Resubmit">Resubmit ({{ $reSubmitCount }}) </option>
                                    <option value="Completed">Completed ({{ $completedCount }}) </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-6 mt-8 ">
                            <div class="" style="margin-top: 26px;">
                                <button type="submit" class="btn btn report-tab-active" id="filter-report-btn">Filter</button>
                                <a href="{{route('admin.vender_List')}}" class="btn btn report-tab-unactive ml-2" id="reset-report-btn">Reset</a>
                            </div>
                        </div>
                    </div>


                </form>

                <div class="row">
                    <form id="" action="{{route('admin.vender_List')}}" class="row d-flex justify-content-between align-items-end">

                        <div class="col-xl-6 col-sm-3 col-3 ml-3 ">
                            <div class="c-list ">
                                <div class="input-group search-area">
                                    <input type="text" name="searchThirdparty" class="form-control" placeholder="Search">
                                    <span class="input-group-text">

                                        <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="8.82495" cy="9.32491" r="6.74142" stroke="#0D99FF" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M13.5137 14.3638L16.1568 16.9999" stroke="#0D99FF" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>

                                    </span>
                                    <button type="submit" class="btn btn report-tab-active " id="filter-reprot-btn">Search</button>
                                </div>

                            </div>
                        </div>
                        </from>
                </div>

            </div>
        </div>

    </div>

    <div class="col-xl-12">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive active-projects style-1">
                    <div class="tbl-caption">
                        <h4 class="heading mb-0">Third Party List</h4>
                        <div>


                        </div>
                    </div>
                    <table id="empoloyees-tblwrapper" class="table ">
                        <thead>
                            <tr>
                                <th> ID</th>

                                <th> Third Party Name</th>
                                <th> Email</th>
                                <th>Phone Number</th>
                                <th> Client Name</th>
                                <th>Address </th>
                                <th>Department </th>
                                <th>POC</th>
                                <th>Location</th>
                                <th>State</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>



                            @if (count($getallThirdParty) > 0)
                            @foreach ($getallThirdParty as $value)
                            <tr>
                                <td><span>{{$value->id}}</span></td>
                                <td><span>{{$value->third_party_name}}</span></td>
                                <td><span>{{$value->third_party_email}}</span></td>
                                <td><span>{{$value->third_party_phone}}</span></td>
                                @php
                                $user = \App\Models\User::where('id', $value->user_id)->first();
                                @endphp

                                <td>
                                    <span>{{ $user ? $user->first_name.'/'.$user->user_name : '' }}</span>
                                </td>

                                <td><span>{{$value->third_party_address}}</span></td>
                                @php
                                $department = \App\Models\Department::where('id',$value->department_id)->first();
                                @endphp
                                <td>


                                    <span> {{ $department ?  $department->dept_name : '' }} </span>

                                </td>
                                <td><span>{{$value->third_party_pos}}</span></td>
                                @php
                                $zone = \App\Models\Zone::where('id',$value->zone_id)->first();
                                @endphp
                                <td>


                                    <span> {{ $zone ? $zone->zone_name : '' }} </span>
                                </td>
                                @php
                                $state = \App\Models\State::where('id',$value->state_id)->first();
                                @endphp
                                <td>


                                    <span> {{ $state ? $state->state_name : '' }} </span>
                                </td>
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

                                <td>
                                    <a href="{{ URL::to('/panel/third-party/edit').'/'.$value->id }}" title="Client Edit">

                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                                <td colspan="6"><span>No records found!</span></td>
                            </tr>
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
