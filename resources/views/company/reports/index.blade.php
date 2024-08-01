@extends('company.includes.master')
@section('addStyle')
<style>
    .attention-reprot-clinet-btn {
        background-color: #949395;
        padding: 19px;
        border-radius: 16px;
        border: 1px solid #949395;
        color: #fff;
        width: 50%;
    }

    .attention-reprot-clinet-btn:hover {
        background-color: #6d3b7a;
        padding: 19px;
        border-radius: 16px;
        border: 1px solid #6d3b7a;
        color: #949395;
        width: 50%;
    }
</style>
@endsection
@section('content')


<div class="row"></div>
<div class="col-12">
     {{-- <h2>Filter:</h2> --}}


    <div class="card">
        <div class="card-body justify-content-start">
            <form id="allFilters" action="{{route('company.report_List')}}" method="GET" onsubmit="submitForm(this); return false;" class="row d-flex justify-content-between align-items-end">
                <div class="row mb-4">
                    <div class="col-xl-3 col-sm-12 col-6 mt-4 mt-md-0">
                        <label for="thirdPartyName">Third Party:</label>
                        <div class="d-flex justify-content-start align-items-start">
                            @php
                            $thirdparties = \App\Models\ThirdParty::where('user_id', auth()->user()->id)->get();
                            @endphp
                            <select class="multi-select" multiple="multiple" name="PartyName[]" id="PartyName" placeholder="Select Third Party">
                                <option disabled>Select Party</option>
                                @forelse ($thirdparties as $thirdparty)
                                <option data-display="Select" value="{{ base64_encode($thirdparty->id) }}"
                                @if(is_array(request('PartyName')) && in_array(base64_encode($thirdparty->id), request('PartyName')))
                                            selected
                                        @endif>
                                    {{ $thirdparty->third_party_name }}
                                </option>
                                @empty
                                <p>No records found!</p>
                                @endforelse
                            </select>

                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-12 col-6 mt-4 mt-md-0">
                        <label for="locations">Locations:</label>

                        <div class="d-flex justify-content-start align-items-start">
                            @php
                            $zones = \App\Models\Zone::get();
                            @endphp
                            <select class="multi-select" multiple="multiple" name="location[]" id="location" placeholder="Select Third Party">
                                <option disabled>Select Location</option>
                                @forelse ($zones as $value )
                                <option data-display="Select" value="{{ base64_encode($value->id) }}"
                                @if(is_array(request('location')) && in_array(base64_encode($value->id), request('location')))
                                            selected
                                        @endif>
                                    {{ $value->zone_name  }}
                                </option>
                                @empty
                                <p>No records found!</p>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-12 col-6 mt-4 mt-md-0">
                        <label for="departments">Department:</label>

                        <div class="d-flex justify-content-start align-items-start">
                            @php
                            $departments = \App\Models\Department::get();
                            @endphp
                            <select class="multi-select" multiple="multiple" name="Department[]" id="Department" placeholder="Select Third Party">
                                <option disabled>Select Department</option>
                                @forelse ($departments as $department )
                                <option data-display="Select" value="{{ base64_encode($department->id) }}"
                                @if(is_array(request('Department')) && in_array(base64_encode($department->id), request('Department')))
                                            selected
                                        @endif>
                                    {{ $department->dept_name  }}
                                </option>
                                @empty
                                <p>No records found!</p>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-12 col-6 mt-4 mt-md-0">
                        <label for="departments">State:</label>

                        <div class="d-flex justify-content-start align-items-start">
                                @php
                                $states = \App\Models\State::get();

                                @endphp
                                <select class="multi-select" multiple="multiple" name="State[]"  id="State" placeholder="Select Third Party">
                                    <option disabled >Select State</option>
                                    @forelse ($states as $state )
                                        <option data-display="Select" value="{{base64_encode($state->id) }}"
                                        @if(is_array(request('State')) && in_array(base64_encode($state->id), request('State')))
                                            selected
                                        @endif>
                                        {{ $state->state_name  }}
                                    </option>
                                    @empty
                                    <p>No records found!</p>
                                    @endforelse
                                </select>
                        </div>
                    </div>
                </div>
                <div class="row  mb-0">
                    <div class="col-xl-3 col-sm-12 col-6 mt-4 mt-md-0">
                        <label for="riskType">Type of Risk:</label>

                        <div class="d-flex justify-content-start align-items-start">
                            <select class="multi-select" name="riskType" placeholder="Select Type of Risk" id="riskType">
                                <option value="">Select Type of Risk</option>
                                <option value="Reputation" @if(request('riskType')=='Reputation' ) selected @endif>
                                    Reputation</option>
                                <option value="Legal" @if(request('riskType')=='Legal' ) selected @endif>Legal
                                </option>
                                <option value="Financial" @if(request('riskType')=='Financial' ) selected @endif>
                                    Financial</option>
                                <option value="Operational" @if(request('riskType')=='Operational' ) selected @endif>Operational</option>
                                <option value="Regulatory" @if(request('riskType')=='Regulatory' ) selected @endif>
                                    Regulatory</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-12 col-6 mt-4 mt-md-0">
                        <label for="overallRisk">Overall Risk:</label>

                        <div class="d-flex justify-content-start align-items-start">
                            <select class="multi-select" name="overallRisk" placeholder="Select Overall Risk" id="overallRisk">
                                <option value="">Select Overall Risk</option>
                                <option value="High Risk" @if(request('overallRisk')=='High Risk' ) selected @endif>
                                    High</option>
                                <option value="Medium Risk" @if(request('overallRisk')=='Medium Risk' ) selected @endif>Medium</option>
                                <option value="Low Risk" @if(request('overallRisk')=='Low Risk' ) selected @endif>
                                    Low</option>
                            </select>

                        </div>

                    </div>
                    <div class="col-xl-3 col-sm-12 col-6 mt-1">
                        <label for="overallRisk"></label>

                        <div class="d-flex justify-content-start align-items-end">
                            <button type="submit" class="btn btn report-tab-active" onsubmit="submitForm(this); return false;">Filter</button>
                        </div>
                    </div>

                </div>



            </form>


        </div>
    </div>

</div>

<div class="col-12">
    <div class="card">
        <div class="card-body justify-content-between  justify-content-center">
            <div class="row ">

                <form id="SearchClient" action="{{route('company.report_List')}}" method="GET" onsubmit="submitForm(this); return false;" class="row d-flex justify-content-between align-items-end">

                    <div class="col-xl-6 col-sm-3 col-3 ml-3 ">
                        <div class="c-list ">
                            <div class="input-group search-area">
                                <input type="text" name="searchThirdparty" class="form-control" placeholder="Enter key words">
                                <span class="input-group-text">

                                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="8.82495" cy="9.32491" r="6.74142" stroke="#0D99FF" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M13.5137 14.3638L16.1568 16.9999" stroke="#0D99FF" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>

                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-sm-6 col-6 ">
                        <div class=" justify-content-start mb-3">
                            <button type="submit" class="btn btn report-tab-active" onsubmit="submitForm(this); return false;">Search</button>
                            <a href="{{route('company.report_List')}}" class="btn btn report-tab-unactive" id="filter-reprot-btn">Reset</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-12">
    <div class="card">
        <div class="card-body  d-flex justify-content-between align-items-end " style="margin-left: 10%;">

                <div class="col-xl-3 col-sm-4 col-4 justify-content-start mr-lg-2">
                    <form id="HighRiskFormButton" action="{{route('company.report_List')}}" method="GET" onsubmit="submitForm(this); return false;">
                        <input type="hidden" name="HighRisk" class="form-control" value="HighRisk">
                        <button type="submit" style="{{ request('HighRisk') == 'HighRisk' ? 'background-color: #6D3B7D;' : '' }}" onclick="submitForm(this.form);" class="attention-reprot-clinet-btn">High Risk</button>
                    </form>
                </div>
                <div class="col-xl-3 col-sm-4 col-4 justify-content-center ">

                    <form id="MediumRiskFormButton" action="{{route('company.report_List')}}" method="GET" onsubmit="submitForm(this); return false;">
                        <input type="hidden" name="MediumRisk" class="form-control" value="MediumRisk">
                        <button type="submit" style="{{ request('MediumRisk') == 'MediumRisk' ? 'background-color: #6D3B7D;' : '' }}" onclick="submitForm(this.form);" class="attention-reprot-clinet-btn">Medium Risk</button>
                    </form>
                </div>
                <div class="col-xl-3 col-sm-4 col-4  justify-content-end">

                    <form id="lowRiskFormButton" action="{{route('company.report_List')}}" onsubmit="submitForm(this); return false;">
                        <input type="hidden" name="LowRisk" class="form-control" value="LowRisk">
                        <button type="submit" style="{{request('LowRisk')=='LowRisk' ? 'background-color:#6D3B7D' : ''}}" onclick="submitForm(this.form);" class="lowRiskFormButtonClass attention-reprot-clinet-btn">Low Risk</button>
                    </form>
                </div>

        </div>
    </div>
</div>




<div class="col-xl-12">
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive active-projects style-1">
                <div class="tbl-caption">
                    <h4 class="heading mb-0"></h4>
                    <div>


                    </div>
                </div>
                <table id="empoloyees-tblwrapper" class="table ">
                    <thead>
                        <tr>
                            <th> ID</th>

                            <th>Third Party Name</th>
                            <th> Department </th>
                            <th>Location</th>
                            <th>State</th>
                            <th>Type of Risk </th>
                            <th>Over All Risk </th>
                            <th class="text-center">View Report</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($getallThirdParty) > 0)
                        @foreach ($getallThirdParty as $key => $value)
                        <tr>
                            <td><span>{{++$key}}</span></td>


                            <td>
                                <span>{{ $value->third_party_name  }}</span>
                            </td>

                            @php
                            $department = \App\Models\Department::where('id',$value->department_id)->first();
                            @endphp
                            <td>


                                <span> {{ $department ?  $department->dept_name : '' }} </span>

                            </td>
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
                            @php
                                $KeyObservation = null;

                                if (request('Regulatory')) {
                                    $KeyObservation = \App\Models\FirmBackground::where('third_party_id', $value->id)->first();
                                } elseif(request('Legal')){
                                    $KeyObservation = \App\Models\CourtCheck::where('third_party_id', $value->id)->first();
                                } elseif(request('Financial')){
                                    $KeyObservation = \App\Models\Financial::where('third_party_id', $value->id)->first();
                                }elseif(request('Operational')){
                                    $KeyObservation = \App\Models\BusinessIntelligence::where('third_party_id', $value->id)->first();
                                }
                                elseif(request('Reputation')){
                                    $KeyObservation = \App\Models\MarketReputation::where('third_party_id', $value->id)->first();
                                }
                                elseif(request('riskType') === "Reputation"){
                                    $KeyObservation = \App\Models\MarketReputation::where('third_party_id', $value->id)->first();

                                }
                                elseif(request('riskType') === "Operational"){
                                    $KeyObservation = \App\Models\BusinessIntelligence::where('third_party_id', $value->id)->first();

                                }
                                elseif(request('riskType') === "Financial"){
                                    $KeyObservation = \App\Models\Financial::where('third_party_id', $value->id)->first();

                                }
                                elseif(request('riskType') === "Legal"){
                                    $KeyObservation = \App\Models\CourtCheck::where('third_party_id', $value->id)->first();

                                }
                                elseif(request('riskType') === "Regulatory"){
                                    $KeyObservation = \App\Models\FirmBackground::where('third_party_id', $value->id)->first();

                                }

                                else {
                                    $KeyObservation = \App\Models\KeyObservation::where('third_party_id', $value->id)->first();
                                }

                                $Overallscore = \App\Models\KeyObservation::where('third_party_id', $value->id)->first();
                            @endphp


                            <td class="">
                                @if ($KeyObservation)
                                    @if (request('Regulatory'))
                                        <span class=""> {{ $KeyObservation->regulatory_score ?? '' }} </span>
                                    @elseif (request('Legal'))
                                        <span class=""> {{ $KeyObservation->legal_score ?? '' }} </span>
                                    @elseif (request('Financial'))
                                        <span class=""> {{ $KeyObservation->overall_financial_score ?? '' }} </span>
                                    @elseif (request('Operational'))
                                        <span class=""> {{ $KeyObservation->efficiency_score ?? '' }} </span>
                                    @elseif (request('Reputation'))
                                        <span class=""> {{ $KeyObservation->market_reputation_score ?? '' }} </span>
                                    @elseif (request('riskType') === "Reputation")
                                        <span class=""> {{ $KeyObservation->market_reputation_score ?? '' }} </span>
                                    @elseif (request('riskType') === "Operational")
                                        <span class=""> {{ $KeyObservation->efficiency_score ?? '' }} </span>
                                    @elseif (request('riskType') === "Financial")
                                        <span class=""> {{ $KeyObservation->overall_financial_score ?? '' }} </span>
                                    @elseif (request('riskType') === "Legal")
                                        <span class=""> {{ $KeyObservation->legal_score ?? '' }} </span>
                                    @elseif (request('riskType') === "Regulatory")
                                        <span class=""> {{ $KeyObservation->regulatory_score ?? '' }} </span>
                                    @else
                                        <span class=""> {{ $KeyObservation->overall_risk_score ?? '' }} </span>
                                    @endif
                                @else
                                    <span class=""> No Data </span>
                                @endif
                            </td>
                            <td class="">
                                <span class=""> {{ $Overallscore ? $Overallscore->Type_of_risk : '' }} </span>
                            </td>



                            <td class=" space-between ">



                                <a href="{{ URL::to('/company/report/view'.'/'.base64_encode($value->id)) }}" title="View Reports">

                                    <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.5096 2.53165H7.41104C5.50437 2.52432 3.94146 4.04415 3.89654 5.9499V15.7701C3.85437 17.7071 5.38979 19.3121 7.32671 19.3552C7.35512 19.3552 7.38262 19.3561 7.41104 19.3552H14.7343C16.6538 19.2773 18.1663 17.6915 18.1525 15.7701V7.36798L13.5096 2.53165Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M13.2688 2.52084V5.18742C13.2688 6.48909 14.3211 7.54417 15.6228 7.54784H18.1482" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M13.0974 14.0786H8.1474" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M11.2229 10.6388H8.14655" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>




                            </td>
                        </tr>
                        @endforeach
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
    function submitForm(form) {
        // Your form submission logic here
        console.log('Form submitted:', form.id);

        // Reset the form if needed
        form.submit();
        form.reset();
    }
</script>
<script>

</script>
@endsection
