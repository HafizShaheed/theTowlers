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
</style>

@endsection
@section('content')

<!-- <div class="row">
    <div class="card">
        <div class="card-body justify-content-end">
            <div class="col-12">
                <div class="row justify-content-start">
                    <div class="col-xl-2 col-sm-2 col-2 mt-4 mt-md-0">
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="JavaScript:void(0)" id="click-Firm-Background"
                                class="btn btn-secondary btn-sm">Firm Background</a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-sm-2 col-2 mt-4 mt-md-0">
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="JavaScript:void(0)" id="click-On-Ground-Verification"
                                class="btn btn-secondary btn-sm">On Ground Verification</a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-sm-2 col-2 mt-4 mt-md-0">
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="JavaScript:void(0)" id="click-Court-Checks" class="btn btn-secondary btn-sm">Court
                                Checks</a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-sm-2 col-2 mt-4 mt-md-0">
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="JavaScript:void(0)" id="click-Financials"
                                class="btn btn-secondary btn-sm">Financials</a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-sm-2 col-2 mt-4 mt-md-0">
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="JavaScript:void(0)" class="btn btn-secondary btn-sm">Business Intelligence</a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-sm-2 col-2 mt-4 mt-md-0">
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="JavaScript:void(0)" class="btn btn-secondary btn-sm">Tax Return and Credit</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="row justify-content-start">
                    <div class="col-xl-2 col-sm-2 col-2 mt-4 mt-md-0">
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="JavaScript:void(0)" class="btn btn-secondary btn-sm">Market Reputation</a>
                        </div>
                    </div>
                    <div class="col-xl-2 col-sm-2 col-2 mt-4 mt-md-0">
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="JavaScript:void(0)" class="btn btn-secondary btn-sm">Key Observation</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="row">
    <div class="card">
        <div class="card-body justify-content-center">
            <div class="d-flex flex-row flex-nowrap">
                <a href="JavaScript:void(0)" id="click-Firm-Background" class="btn btn-secondary report-tab-active border-round-tab  btn-sm mx-1 p-lg-3">Firm Background</a>
                <a href="JavaScript:void(0)" id="click-Documents" class="btn btn-secondary report-tab-unactive border-round-tab btn-sm mx-1 p-lg-3">Documents</a>
                <a href="JavaScript:void(0)" id="click-On-Ground-Verification" class="btn btn-secondary report-tab-unactive border-round-tab btn-sm mx-1 p-lg-3">On Ground Verification</a>
                <a href="JavaScript:void(0)" id="click-Court-Checks" class="btn btn-secondary report-tab-unactive border-round-tab btn-sm mx-1 p-lg-3">Court
                    Checks</a>
                <a href="JavaScript:void(0)" id="click-Financials" class="btn btn-secondary report-tab-unactive border-round-tab btn-sm mx-1 p-lg-3">Financials</a>
                <a href="JavaScript:void(0)" id="click-Business-Intelligence" class="btn btn-secondary report-tab-unactive border-round-tab btn-sm mx-1 p-lg-3">Business Intelligence</a>
                <a href="JavaScript:void(0)" id="click-Tax-Return-and-Credit" class="btn btn-secondary report-tab-unactive border-round-tab btn-sm mx-1 p-lg-3">Tax Return and Credit</a>
                <a href="JavaScript:void(0)" id="click-Market-Reputation" class="btn btn-secondary report-tab-unactive border-round-tab btn-sm mx-1 p-lg-3">Market Reputation</a>
                <a href="JavaScript:void(0)" id="click-Key-Observation" class="btn btn-secondary report-tab-unactive border-round-tab btn-sm mx-1 p-lg-3">Key Observation</a>
                <!-- Add similar code for other buttons as needed -->
            </div>
        </div>
    </div>
</div>


<!-- Firm Background form start -->

<div class="row" id="Firm-Background"  class="Firm-Background-class-form-submit"  >
    <div class="card">
        <div class="card-body justify-content-start">
            <form id="firm-step-form" enctype="multipart/form-data">

            <input type="hidden" name="getThirdPartyForID" id="getThirdPartyForID" class="form-control" value="{{$getThirdPartyForID->id}}">

                <!-- firm background 1 step end -->
                <div class="firm-step" id="firm-step-1">
                    <h4 class="card-title">Firm Background<br>
                        <span style="color:darkgray; font-size:12px;"> Basic Information </span>
                    </h4>
                    <div class="row">


                        @php
                        $getAllUser = \App\Models\User::get();
                        $ThirdPartyNames = \App\Models\ThirdParty::get();
                        $temMembers = \App\Models\team\TeamUser::get();
                        @endphp
                        <div class="col-xl-4 mb-3">
                            <label class="form-label">Client Name<span class="text-danger">*</span></label>
                            <select class="default-select style-1 form-control" name="user_id" id="user_id">
                                <option data-display="Select" disabled selected>
                                    Select Client
                                </option>
                                @forelse ($getAllUser as $client )
                                <option data-display="Select" value="{{ $client->id }}" {{ $client->id == $FirmBackground->user_id ? 'selected' : ''  }}>
                                    {{ $client->first_name  }}
                                </option>
                                @empty
                                <p> No records found!</p>
                                @endforelse



                            </select>
                        </div>
                        <div class="col-xl-4 mb-3">
                            <label class="form-label">Third Party Name<span class="text-danger">*</span></label>
                            <select class="default-select style-1 form-control" name="" id="">
                                <option data-display="Select" disabled selected>
                                    Select Team Member (cant changed)
                                </option>
                                @forelse ($ThirdPartyNames as $ThirdPartyName )
                                <option data-display="Select" value="{{ $ThirdPartyName->id }}" {{ $ThirdPartyName->id == $FirmBackground->third_party_id ? 'selected' : ''  }}>
                                    {{ $ThirdPartyName->third_party_name  }}
                                </option>
                                @empty
                                <p> No records found!</p>
                                @endforelse



                            </select>
                        </div>
                        <div class="col-xl-4 mb-3">
                            <label class="form-label">Team Member Name<span class="text-danger"></span></label>
                            <select class="default-select style-1 form-control" name="team_user_id" id="team_user_id">
                                <option data-display="Select" disabled selected>
                                    Select Team Member
                                </option>
                                @forelse ($temMembers as $temMember )
                                <option data-display="Select" value="{{ $temMember->id }}" {{ $temMember->id == $FirmBackground->team_user_id ? 'selected' : ''  }}>
                                    {{ $temMember->user_name  }}
                                </option>
                                @empty
                                <p> No records found!</p>
                                @endforelse



                            </select>
                        </div>
                    </div>

                    <input type="hidden" name="FirmBackgroundID" value="{{$FirmBackground->id}}" id="inputFirmBackgroundID" class="form-control" value="">

                    <div class="row">
                        <div class="col-xl-4 mb-3">
                            <label for="incorporation_year" class="form-label">Incorporation Year</label>
                            <input type="text" class="form-control" name="incorporation_year" value="{{$FirmBackground->incorporation_year}}" id="incorporation_year" placeholder="">
                        </div>
                        <div class="col-xl-4 mb-3">
                            <label class="form-label">Form of Entity<span class="text-danger">*</span></label>
                            <select class="default-select style-1 form-control" id="form_of_entity" name="form_of_entity">
                                <option data-display="Select" value="" disabled {{$FirmBackground->form_of_entity ? '' : 'selected'}}>
                                    Select Form of Entity
                                </option>
                                <option value="Private_Limited_Company" {{$FirmBackground->form_of_entity == 'Private_Limited_Company' ? 'selected' : ''}}>Private Limited Company</option>
                                <option value="Sole_Proprietorship" {{$FirmBackground->form_of_entity == 'Sole_Proprietorship' ? 'selected' : ''}}>Sole Proprietorship</option>
                                <option value="Limited_Liability_Partnership" {{$FirmBackground->form_of_entity == 'Limited_Liability_Partnership' ? 'selected' : ''}}>Limited Liability Partnership</option>
                                <option value="Partnership_Firm" {{$FirmBackground->form_of_entity == 'Partnership_Firm' ? 'selected' : ''}}>Partnership Firm</option>
                                <option value="One_Person_Company" {{$FirmBackground->form_of_entity == 'One_Person_Company' ? 'selected' : ''}}>One Person Company</option>
                            </select>

                        </div>
                        <div class="col-xl-4 mb-3">
                            <label for="no_of_directors" class="form-label">No of Directors</label>
                            <input type="number" step="any" class="form-control" id="no_of_directors"  name="no_of_directors" value="{{$FirmBackground->no_of_directors}}" placeholder="">
                        </div>
                        <div class="col-xl-4 mb-3">
                            <label for="industry" class="form-label">Industry</label>
                            <input type="text" class="form-control" id="industry" name="industry" value="{{$FirmBackground->industry}}" placeholder="">
                        </div>
                        <div class="col-xl-4 mb-3">
                            <label for="website" class="form-label">Website</label>
                            <input type="text" class="form-control" id="website" name="website" value="{{$FirmBackground->website}}" placeholder="">
                        </div>
                        <div class="col-xl-4 mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{$FirmBackground->address}}" placeholder="">
                        </div>
                        <div class="col-xl-4 mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{$FirmBackground->city}}" placeholder="">
                        </div>
                        <div class="col-xl-4 mb-3">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" id="state" name="state" value="{{$FirmBackground->state}}" placeholder="">
                        </div>
                        <div class="col-xl-4 mb-3">
                            <label for="pincode" class="form-label">Pincode</label>
                            <input type="text" class="form-control" id="pincode" name="pincode" value="{{$FirmBackground->pincode}}" placeholder="">
                        </div>
                        <div class="col-xl-12 mb-3">
                            <label for="business_details" class="form-label">Business Details</label>
                            <input type="text" class="form-control" id="business_details" name="business_details" value="{{$FirmBackground->business_details}}" placeholder="">
                        </div>

                        <div class="col-xl-12 d-flex justify-content-end">
                            <button type="button" class="btn btn report-tab-active" id="firm-next-1">Next</button>
                        </div>


                    </div>
                </div>
                <!-- firm background 1 step end -->
                <!-- firm background 2 step start ========================-->
                <div class="firm-step" id="firm-step-2">
                    <h4 class="card-title">Firm Background<br>
                        <span style="color:darkgray; font-size:12px;">Registrations/Compliance </span>
                    </h4>
                    <div class="row">
                        @for ($i=1; $i <=8; $i++)
                        <div class="col-xl-3 mb-3">
                            <label for="license_name_{{ $i }}" class="form-label">License Name</label>
                            <input type="text" class="form-control" id="license_name_{{ $i }}" name="license_name_{{ $i }}" value="{{ $License->{'license_name_' . $i} }}" placeholder="">
                        </div>
                        <div class="col-xl-3 mb-3">
                            <label for="license_no_{{ $i }}" class="form-label">License No</label>
                            <input type="text" class="form-control" id="license_no_{{ $i }}" name="license_no_{{ $i }}" value="{{$License->{'license_no_'. $i } }}" placeholder="">
                        </div>
                        <div class="col-xl-2 mb-3">
                            <label for="date_of_issuance_{{ $i }}" class="form-label">Date of Issuance</label>
                            <input type="date" class="form-control" id="date_of_issuance_{{ $i }}" name="date_of_issuance_{{ $i }}" value="{{$License->{'date_of_issuance_'.$i } }}">
                        </div>
                        <div class="col-xl-2 mb-3">
                            <label for="date_of_expiry_{{ $i }}" class="form-label">Date of Expiry</label>
                            <input type="date" class="form-control" id="date_of_expiry_{{ $i }}" name="date_of_expiry_{{ $i }}" value="{{$License->{'date_of_expiry_'. $i} }}">
                        </div>
                        <div class="col-xl-2 mt-2">
                            <label for="licenses_upload_file_{{ $i }}" class="form-label"></label>
                            <input  type="file" class="form-control" id="licenses_upload_file_{{ $i }}" accept=".pdf, image/*" name="licenses_upload_file_{{ $i }}" value="{{$Document->{'licenses_upload_file_'. $i} }}" placeholder="">
                        </div>

                        @endfor
                    </div>
                    <!-- Repeat the above code block for additional rows -->

                    <!-- OFAC Check -->
                    <div class="row">
                        <div class="col-xl-3 mb-3">
                            <label for="ofac_check" class="form-label">OFAC Check</label>
                            <input type="text" class="form-control" id="ofac_check" name="ofac_check" value="{{$FirmBackground->ofac_check}}" placeholder="">
                        </div>
                        <div class="col-xl-3 mb-3">
                            <label for="regulatory_score" class="form-label">Regulatory Score </label>
                            <input type="number" step="any" class="form-control" id="regulatory_score" name="regulatory_score" value="{{$FirmBackground->regulatory_score}}" placeholder="">
                        </div>
                        <div class="col-xl-3 mb-3">
                            <label for="score_analysis"  class="form-label">Score Analysis </label>
                            <input type="text" class="form-control" id="score_analysis" name="score_analysis" value="{{$FirmBackground->score_analysis}}" min="1" placeholder="">
                        </div>
                        <!-- <div class="col-xl-3 mb-3">
                            <label for="file" class="form-label"></label>
                            <div class="dz-default dlab-message upload-img mb-3">
                                <div class="fallback">
                                    <input name="file" type="file" class="form-control" id="file" accept=".pdf, image/*" placeholder="">

                                </div>
                            </div>
                        </div> -->
                    </div>

                    <!-- Navigation buttons -->

                    <div class="row">
                        <div class="col-xl-6 d-flex justify-content-start">
                            <button type="button" class="btn btn report-tab-unactive" id="firm-prev-2">Previous</button>
                        </div>
                        <div class="col-xl-6 d-flex justify-content-end">

                            <button type="button" class="btn btn report-tab-active" id="firm-next-2">Next</button>
                        </div>
                    </div>

                </div>
                <!-- firm background 2 step end ========================-->
                <!-- firm background 3 step start ========================-->
                <div class="firm-step" id="firm-step-3">
                    <h4 class="card-title">Firm Background<br>
                        <span style="color:darkgray; font-size:12px;">Director/Proprietor/Partner Details </span>
                    </h4>
                 <!-- Copy 1 -->
                 @for ($i = 1; $i <= 10; $i++)
                    <div class="row">
                        <div class="col mt-4">
                            <label for="name_{{ $i }}" class="form-label">Name ({{ $i }})</label>
                            <input type="text" class="form-control" id="name_{{ $i }}" name="name_{{ $i }}" value="{{ $FirmBackground->{'name_' . $i} }}">
                        </div>
                        <div class="col mt-4">
                            <label for="pan_{{ $i }}" class="form-label">PAN</label>
                            <input type="text" class="form-control" id="pan_{{ $i }}" name="pan_{{ $i }}" value="{{ $FirmBackground->{'pan_' . $i} }}">
                        </div>
                        <div class="col mt-4">
                            <label for="aadhar_{{ $i }}" class="form-label">Aadhar</label>
                            <input type="text" class="form-control" id="aadhar_{{ $i }}" name="aadhar_{{ $i }}" value="{{ $FirmBackground->{'aadhar_' . $i} }}">
                        </div>
                        <div class="col mt-4">
                            <label for="date_of_appointment_{{ $i }}" class="form-label">Date of Appointment</label>
                            <input type="date" class="form-control" id="date_of_appointment_{{ $i }}" name="date_of_appointment_{{ $i }}" value="{{ $FirmBackground->{'date_of_appointment_' . $i} }}">
                        </div>
                        <div class="col mt-4">
                            <label for="educational_background_{{ $i }}" class="form-label">Educational Background</label>
                            <input type="text" class="form-control" id="educational_background_{{ $i }}" name="educational_background_{{ $i }}" value="{{ $FirmBackground->{'educational_background_' . $i} }}">
                        </div>
                        <div class="col mt-4">
                            <label for="din_{{ $i }}" class="form-label">DIN</label>
                            <input type="text" class="form-control" id="din_{{ $i }}" name="din_{{ $i }}" value="{{ $FirmBackground->{'din_' . $i} }}">
                        </div>
                    </div>
                @endfor

                    <div class="row">
                        <div class="col-xl-6 d-flex justify-content-start">

                            <button type="button" class="btn btn report-tab-unactive" id="firm-prev-3">Previous</button>
                        </div>
                        <div class="col-xl-6 d-flex justify-content-end">

                            <button type="button" class="btn btn report-tab-active" id="firm-next-3">Next</button>
                        </div>
                    </div>

                </div>
                <!-- firm background 3 step end ========================-->
                <!-- firm background 4 step start ========================-->
                <div class="firm-step" id="firm-step-4">
                    <h4 class="card-title">Firm Background<br>
                        <span style="color:darkgray; font-size:12px;">Directorship Check</span>
                    </h4>
                    <div class="row">
                        <!-- =========== Director1 ============ -->
                        @for ($i=1; $i <= 8; $i++)
                        <div class="col-xl-4 mb-3">
                            <label for="director_name_1_{{ $i }}" class="form-label">Director 1</label>
                            <input type="text" class="form-control" id="director_name_1_{{ $i }}" name="director_name_1_{{ $i }}" value="{{$FirstDirectorsFirm->{'director_name_1_'. $i } }}">
                        </div>
                        <div class="col-xl-4 mb-3">
                            <label for="company_name_1_{{ $i }}" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="company_name_1_{{ $i }}" name="company_name_1_{{ $i }}" value="{{$FirstDirectorsFirm->{'company_name_1_'. $i } }}">
                        </div>
                        <div class="col-xl-4 mb-3">
                            <label for="cin_1_{{ $i }}" class="form-label">CIN</label>
                            <input type="text" class="form-control" id="cin_1_{{ $i }}" name="cin_1_{{ $i }}" value="{{$FirstDirectorsFirm->{'cin_1_'. $i } }}">
                        </div>
                        <div class="col-xl-4 mb-3">
                            <label for="company_status_1_{{ $i }}" class="form-label">Company Status</label>
                            <input type="text" class="form-control" id="company_status_1_{{ $i }}" name="company_status_1_{{ $i }}" value="{{$FirstDirectorsFirm->{'company_status_1_'. $i } }}">
                        </div>
                        <div class="col-xl-4 mb-3">
                            <label for="appointment_date_1_{{ $i }}" class="form-label">Appointment
                                Date</label>
                            <input type="date" class="form-control" id="appointment_date_1_{{ $i }}" name="appointment_date_1_{{ $i }}" value="{{$FirstDirectorsFirm->{'appointment_date_1_'. $i } }}">
                        </div>
                        <div class="col-xl-4 mb-3">
                            <label for="business_of_entity_1_{{ $i }}" class="form-label">Business of the
                                Entity</label>
                            <input type="text" class="form-control" id="business_of_entity_1_{{ $i }}" name="business_of_entity_1_{{ $i }}" value="{{$FirstDirectorsFirm->{'business_of_entity_1_'. $i } }}">
                        </div>
                        <div class="col-xl-12 mb-3">
                            <label for="business_conflict_1_{{ $i }}" class="form-label">Business Conflict
                            </label>
                            <input type="text" class="form-control" id="business_conflict_1_{{ $i }}" name="business_conflict_1_{{ $i }}" value="{{$FirstDirectorsFirm->{'business_conflict_1_'. $i } }}">
                        </div>

                        @endfor


                        <!-- =========== Director1 ============ -->

                        <!-- =========== Director2 ============ -->
                        @for ($i=1; $i <= 8; $i++)
                        <div class="col-xl-4 mb-3">
                            <label for="director_name_2_{{ $i }}" class="form-label">Director 2</label>
                            <input type="text" class="form-control" id="director_name_2_{{ $i }}" name="director_name_2_{{ $i }}" value="{{$SecondDirectorsFirm->{'director_name_2_'. $i } }}">
                        </div>
                        <div class="col-xl-4 mb-3">
                            <label for="company_name_2_{{ $i }}" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="company_name_2_{{ $i }}" name="company_name_2_{{ $i }}" value="{{$SecondDirectorsFirm->{'company_name_2_'. $i } }}">
                        </div>
                        <div class="col-xl-4 mb-3">
                            <label for="cin_2_{{ $i }}" class="form-label">CIN</label>
                            <input type="text" class="form-control" id="cin_2_{{ $i }}" name="cin_2_{{ $i }}" value="{{$SecondDirectorsFirm->{'cin_2_'. $i } }}">
                        </div>
                        <div class="col-xl-4 mb-3">
                            <label for="company_status_2_{{ $i }}" class="form-label">Company Status</label>
                            <input type="text" class="form-control" id="company_status_2_{{ $i }}" name="company_status_2_{{ $i }}" value="{{$SecondDirectorsFirm->{'company_status_2_'. $i } }}">
                        </div>
                        <div class="col-xl-4 mb-3">
                            <label for="appointment_date_2_{{ $i }}" class="form-label">Appointment
                                Date</label>
                            <input type="date" class="form-control" id="appointment_date_2_{{ $i }}" name="appointment_date_2_{{ $i }}" value="{{$SecondDirectorsFirm->{'appointment_date_2_'. $i } }}">
                        </div>
                        <div class="col-xl-4 mb-3">
                            <label for="business_of_entity_2_{{ $i }}" class="form-label">Business of the
                                Entity</label>
                            <input type="text" class="form-control" id="business_of_entity_2_{{ $i }}" name="business_of_entity_2_{{ $i }}" value="{{$SecondDirectorsFirm->{'business_of_entity_2_'. $i } }}">
                        </div>
                        <div class="col-xl-12 mb-3">
                            <label for="business_conflict_2_{{ $i }}" class="form-label">Business Conflict
                            </label>
                            <input type="text" class="form-control" id="business_conflict_2_{{ $i }}" name="business_conflict_2_{{ $i }}" value="{{$SecondDirectorsFirm->{'business_conflict_2_'. $i } }}">
                        </div>

                        @endfor



                        <!-- =========== Director2 ============ -->
                        <!-- =========== Director3 ============ -->

                        @for ($i=1; $i <= 8; $i++)
                        <div class="col-xl-4 mb-3">
                            <label for="director_name_3_{{ $i }}" class="form-label">Director 3</label>
                            <input type="text" class="form-control" id="director_name_3_{{ $i }}" name="director_name_3_{{ $i }}" value="{{$ThirdDirectorsFirm->{'director_name_3_'. $i } }}">
                        </div>
                        <div class="col-xl-4 mb-3">
                            <label for="company_name_3_{{ $i }}" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="company_name_3_{{ $i }}" name="company_name_3_{{ $i }}" value="{{$ThirdDirectorsFirm->{'company_name_3_'. $i } }}">
                        </div>
                        <div class="col-xl-4 mb-3">
                            <label for="cin_3_{{ $i }}" class="form-label">CIN</label>
                            <input type="text" class="form-control" id="cin_3_{{ $i }}" name="cin_3_{{ $i }}" value="{{$ThirdDirectorsFirm->{'cin_3_'. $i } }}">
                        </div>
                        <div class="col-xl-4 mb-3">
                            <label for="company_status_3_{{ $i }}" class="form-label">Company Status</label>
                            <input type="text" class="form-control" id="company_status_3_{{ $i }}" name="company_status_3_{{ $i }}" value="{{$ThirdDirectorsFirm->{'company_status_3_'. $i } }}">
                        </div>
                        <div class="col-xl-4 mb-3">
                            <label for="appointment_date_3_{{ $i }}" class="form-label">Appointment
                                Date</label>
                            <input type="date" class="form-control" id="appointment_date_3_{{ $i }}" name="appointment_date_3_{{ $i }}" value="{{$ThirdDirectorsFirm->{'appointment_date_3_'. $i } }}">
                        </div>
                        <div class="col-xl-4 mb-3">
                            <label for="business_of_entity_3_{{ $i }}" class="form-label">Business of the
                                Entity</label>
                            <input type="text" class="form-control" id="business_of_entity_3_{{ $i }}" name="business_of_entity_3_{{ $i }}" value="{{$ThirdDirectorsFirm->{'business_of_entity_3_'. $i } }}">
                        </div>
                        <div class="col-xl-12 mb-3">
                            <label for="business_conflict_3_{{ $i }}" class="form-label">Business Conflict
                            </label>
                            <input type="text" class="form-control" id="business_conflict_3_{{ $i }}" name="business_conflict_3_{{ $i }}" value="{{$ThirdDirectorsFirm->{'business_conflict_3_'. $i } }}">
                        </div>

                        @endfor


                        <!-- =========== Director3 ============ -->
                        <div class="row">
                            <div class="col-xl-6 d-flex justify-content-start">

                                <button type="button" class="btn btn report-tab-unactive" id="firm-prev-4">Previous</button>
                            </div>
                            <div class="col-xl-6 d-flex justify-content-end">

                                <button type="submit" class="btn btn report-tab-active" id="firm-submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- firm background 4 step end ========================-->


            </form>
        </div>
    </div>
</div>
<!-- Firm Background form end -->
<!-- Documents start -->

<div class="row" id="Tab-Documents">
    <div class="card">
        <div class="card-header justify-content-start">
            <h4 class="card-title"> Documents
            </h4>

        </div>
        <div class="card-body justify-content-start">
            <form id="Documents-form" enctype="multipart/form-data">
                <!-- Verificationform 1 step end -->
                <div class="Documents-step" id="Documents-step-1">


                    <input type="hidden" name="getThirdPartyForID" id="getThirdPartyForID" class="form-control" value="{{$getThirdPartyForID->id}}">
                    <input type="hidden" name="DocumentID" id="DocumentID" value="{{$Document->id}}" class="form-control" value="">

                    <div class="row">
                        @for ($i=1; $i <=15; $i++)
                        <div class="col-xl-3 mb-3">
                            <label for="document_name_{{ $i }}" class="form-label">Document Name</label>
                            <input type="text" class="form-control" id="document_name_{{ $i }}" name="document_name_{{ $i }}" value="{{ $Document->{'document_name_' . $i} }}" placeholder="">
                        </div>
                        <div class="col-xl-3 mb-3">
                            <label for="document_number_{{ $i }}" class="form-label">Document No</label>
                            <input type="text" class="form-control" id="document_number_{{ $i }}" name="document_number_{{ $i }}" value="{{$Document->{'document_number_'. $i } }}" placeholder="">
                        </div>
                        <div class="col-xl-2 mb-3">
                            <label for="document_date_of_issuance_{{ $i }}" class="form-label">Date of Issuance</label>
                            <input type="date" class="form-control" id="document_date_of_issuance_{{ $i }}" name="document_date_of_issuance_{{ $i }}" value="{{$Document->{'document_date_of_issuance_'.$i } }}">
                        </div>
                        <div class="col-xl-2 mb-3">
                            <label for="document_date_of_expiry_{{ $i }}" class="form-label">Date of Expiry</label>
                            <input type="date" class="form-control" id="document_date_of_expiry_{{ $i }}" name="document_date_of_expiry_{{ $i }}" value="{{$Document->{'document_date_of_expiry_'. $i} }}">
                        </div>
                        <div class="col-xl-2 mt-2">
                            <label for="document_upload_file{{ $i }}" class="form-label"></label>
                            <input  type="file" class="form-control" id="document_upload_file{{ $i }}" accept=".pdf, image/*" name="document_upload_file{{ $i }}" value="{{$Document->{'document_upload_file'. $i} }}" placeholder="">
                        </div>


                        @endfor
                    </div>
                    <!-- <div class="row">
                        <div class="col-xl-6  mb-3">
                        <label for="document_upload" class="form-label">Upload Document</label>
                        <div class="dz-default dlab-message upload-img mb-3">
                        <div class="fallback">
                        <input  type="file" class="form-control" id="document_upload" accept=".pdf, image/*" name="document_upload" value="{{$Document->upload_picture}}" placeholder="upload image">

                        </div>
                        </div>
                        </div>
                    </div> -->



                        <div class="col-xl-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn report-tab-active" id="submit-Documents">submit</button>
                        </div>


                    </div>
                </div>
                <!-- Verificationform 1 step end -->
            </form>
        </div>
    </div>
</div>

<!-- Documents end -->

<!-- On Ground Verificationform start -->

<div class="row" id="On-Ground-Verification">
    <div class="card">
        <div class="card-header justify-content-start">
            <h4 class="card-title">On-Ground Verification
            </h4>

        </div>
        <div class="card-body justify-content-start">
            <form id="onGround-step-form" enctype="multipart/form-data">
                <!-- Verificationform 1 step end -->
                <div class="onGround-step" id="onGround-step-1">


                    <div class="row">
                        <div class="col-xl-12 mb-3">
                            <label for="address_details" class="form-label">Adrress Details</label>
            <input type="hidden" name="getThirdPartyForID" id="getThirdPartyForID" class="form-control" value="{{$getThirdPartyForID->id}}">

                            <input type="text" class="form-control" id="address_details" name="address_details" value="{{$OnGroundVerification->address_details}}" placeholder="">
                        </div>

                        <input type="hidden" name="onGroundVerificationID" id="onGroundVerificationID" value="{{$OnGroundVerification->id}}" class="form-control" value="">

                        <div class="col-xl-12 mb-3">
                            <label for="address_visit_findings" class="form-label">Address Visit Findings</label>
                            <input type="text" class="form-control" id="address_visit_findings" name="address_visit_findings" value="{{$OnGroundVerification->address_visit_findings}}" placeholder="">
                        </div>

                        <div class="row">
                            <div class="col-xl-3  mb-3">
                                <label for="on_ground_verification_score" class="form-label">On-Ground Verification Score</label>
                                <input type="number" step="any" minlength="1" class="form-control" id="on_ground_verification_score" name="on_ground_verification_score" value="{{$OnGroundVerification->on_ground_verification_score}}" placeholder="">
                            </div>
                            <div class="col-xl-3  mb-3">
                                <label for="score_analysis" class="form-label">Score Analysis</label>
                                <input type="text" class="form-control" id="score_analysis" name="score_analysis" value="{{$OnGroundVerification->on_ground_verification_score}}" placeholder="">
                            </div>

                            <div class="col-xl-6  mb-3">
                                <label for="upload_picture" class="form-label">Upload Picture</label>
                                <div class="dz-default dlab-message upload-img mb-3">
                                    <div class="fallback">
                                        <input  type="file" class="form-control" id="upload_picture" accept="image/*" name="upload_picture" value="{{$OnGroundVerification->upload_picture}}" placeholder="upload image">

                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-xl-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn report-tab-active" id="submit-onGround">submit</button>
                        </div>


                    </div>
                </div>
                <!-- Verificationform 1 step end -->
            </form>
        </div>
    </div>
</div>

<!-- On Ground Verificationform end -->


<!-- Court Checks form start -->

<div class="row" id="Court-Checks">
    <div class="card">
        <div class="card-body justify-content-start">
        <form id="court-step-form" enctype="multipart/form-data">
                <!-- Court Checks 1 step end -->
                <div class="court-step" id="court-step-1">
                    <h4 class="card-title">Court Checks<br>
                        <span style="color:darkgray; font-size:12px;"> Court Check of Directors </span>
                    </h4>
                    <div class="row">
                    <input type="hidden" name="getThirdPartyForID" id="getThirdPartyForID" class="form-control" value="{{$getThirdPartyForID->id}}">

                        <input type="hidden" name="CourtCheckId" id="CourtCheckId" value="{{$CourtCheck->id}}" class="form-control" value="">

                        @for ($i=1; $i <=5; $i++)
                        <div class="col-xl-3 mb-3">
                            <label for="director_name_{{ $i }}" class="form-label">Name </label>
                            <input type="text" class="form-control" name="director_name_{{ $i }}" id="director_name_{{ $i }}" value="{{$CourtCheck->{'director_name_'. $i } }}" placeholder="">
                        </div>
                        <div class="col-xl-3 mb-3">
                            <label for="director_jurisdiction_{{ $i }}" class="form-label">Jurisdiction </label>
                            <input type="text" class="form-control" class="form-control" name="director_jurisdiction_{{ $i }}" id="director_jurisdiction_{{ $i }}" value="{{$CourtCheck->{'director_jurisdiction_'. $i } }}" placeholder="">
                        </div>
                        <div class="col-xl-3 mb-3">
                            <label for="director_record_{{ $i }}" class="form-label">Record</label>
                            <input type="text" class="form-control" name="director_record_{{ $i }}" id="director_record_{{ $i }}" value="{{$CourtCheck->{'director_record_'. $i } }}" placeholder="">
                        </div>
                        <div class="col-xl-3 mb-3">
                            <label for="director_subject_matter_{{ $i }}" class="form-label">Subject Matter</label>
                            <input type="text" class="form-control" name="director_subject_matter_{{ $i }}" id="director_subject_matter_{{ $i }}" value="{{$CourtCheck->{'director_subject_matter_'. $i } }}" placeholder="">
                        </div>
                        @endfor


                        <div class="col-xl-12 d-flex justify-content-end">
                            <button type="button" class="btn btn report-tab-active" id="court-next-1">Next</button>
                        </div>


                    </div>
                </div>
                <!-- Court Checks 1 step end -->
                <!-- Court Checks 2 step start ========================-->
                <div class="court-step" id="court-step-2">
                    <h4 class="card-title">Court Checks<br>
                        <span style="color:darkgray; font-size:12px;"> Court check of Company </span>
                    </h4>

                    @for ($i=1; $i <=5; $i++)
                    <div class="row">
                        <div class="col-xl-3 mb-3">
                            <label for="company_jurisdiction_{{ $i }}" class="form-label">Jurisdiction</label>
                            <input type="text" class="form-control" name="company_jurisdiction_{{ $i }}" id="company_jurisdiction_{{ $i }}" value="{{$CourtCheck->{'company_jurisdiction_'. $i } }}" placeholder="">
                        </div>
                        <div class="col-xl-4 mb-3">
                            <label for="company_record_{{ $i }}" class="form-label">Record</label>
                            <input type="text" class="form-control" name="company_record_{{ $i }}" id="company_record_{{ $i }}" value="{{$CourtCheck->{'company_record_'. $i } }}" placeholder="">
                        </div>
                        <div class="col-xl-3 mb-3">
                            <label for="company_subject_matter_{{ $i }}" class="form-label">Subject Matter</label>
                            <input type="text" class="form-control" name="company_subject_matter_{{ $i }}" id="company_subject_matter_{{ $i }}" value="{{$CourtCheck->{'company_subject_matter_'. $i } }}" placeholder="">
                        </div>
                    </div>

                    @endfor

                    <!-- Repeat the above code block for additional rows -->

                    <!-- OFAC Check -->


                    <!-- Navigation buttons -->

                    <div class="row">
                        <div class="col-xl-6 d-flex justify-content-start">
                            <button type="button" class="btn btn report-tab-unactive" id="court-prev-2">Previous</button>
                        </div>
                        <div class="col-xl-6 d-flex justify-content-end">

                            <button type="button" class="btn btn-primary" id="court-next-2">Next</button>
                        </div>
                    </div>

                </div>
                <!-- Court Checks 2 step end ========================-->
                <!-- Court Checks 3 step start ========================-->
                <div class="court-step" id="court-step-3">
                    <h4 class="card-title">Court Checks<br>
                        <span style="color:darkgray; font-size:12px;"> Court Check of Directors </span>
                    </h4>
                    <div class="row">
                        <div class="col-xl-4 mb-3">
                            <label for="legal_score" class="form-label">Legal Score</label>
                            <input type="number" step="any" class="form-control" name="legal_score" id="legal_score" value="{{$CourtCheck->legal_score}}">
                        </div>
                        <div class="col-xl-4 mb-3">
                            <label for="score_analysis" class="form-label">Score Analysis</label>
                            <input type="text" class="form-control" name="score_analysis" id="score_analysis" value="{{$CourtCheck->score_analysis}}">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xl-6 d-flex justify-content-start">

                            <button type="button" class="btn btn report-tab-unactive" id="court-prev-3">Previous</button>
                        </div>
                        <div class="col-xl-6 d-flex justify-content-end">

                            <button type="submit" class="btn btn report-tab-active" id="court-submit">Submit</button>

                        </div>
                    </div>

                </div>
                <!-- Court Checks 3 step end ========================-->
            </form>
        </div>
    </div>
</div>

<!-- Court Checks form end -->

<!-- Financials form start -->

<div class="row" id="Financials">
    <div class="card">

        <div class="card-body justify-content-start">

            <form id="Financials-step-form" enctype="multipart/form-data">
                <!-- Financials 1 step end -->
                <div class="Financials-step" id="Financials-step-1">
                    <h4 class="card-title">Financials<br>
                        <span style="color:darkgray; font-size:12px;"> Charges on the Entity </span>
                    </h4>
                    <div class="row">
                    <input type="hidden" name="getThirdPartyForID" id="getThirdPartyForID" class="form-control" value="{{$getThirdPartyForID->id}}">

                        <input type="hidden" name="FinancialID" id="FinancialID" class="form-control" value="{{$Financial->id}}">

                        @for ($i=1; $i <= 4; $i++)
                        <div class="col-xl-3 mb-3">
                            <label for="name_{{ $i }}" class="form-label">Name </label>
                            <input type="text" class="form-control" name="name_{{ $i }}"  id="name_{{ $i }}" value="{{$Financial->{'name_'. $i } }}" placeholder="">
                        </div>
                        <div class="col-xl-3 mb-3">
                            <label for="status_{{ $i }}" class="form-label">Status </label>
                            <input type="text" class="form-control" name="status_{{ $i }}" id="status_{{ $i }}" value="{{$Financial->{'status_'. $i } }}" placeholder="">
                        </div>
                        <div class="col-xl-3 mb-3">
                            <label for="amount_{{ $i }}" class="form-label">Amount</label>
                            <input type="number" step="any" minlenght="0" class="form-control" name="amount_{{ $i }}"  id="amount_{{ $i }}" value="{{$Financial->{'amount_'. $i } }}" placeholder="">
                        </div>
                        <div class="col-xl-3 mb-3">
                            <label for="charged_property_{{ $i }}" class="form-label">Charged Property </label>
                            <input type="text" class="form-control"  name="charged_property_{{ $i }}"  id="charged_property_{{ $i }}" value="{{$Financial->{'charged_property_'. $i } }}" placeholder="">
                        </div>
                        @endfor
                        <div class="col-xl-3 mb-3">
                                <label for="overall_financial_score" class="form-label">Overall Financial Score</label>
                                <input type="number" step="any" minlength="0" class="form-control" name="overall_financial_score" id="overall_financial_score" value="{{$Financial->overall_financial_score}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="score_analysis" class="form-label"> Score Analysis</label>
                                <input type="text" step="any" minlength="0" class="form-control" name="score_analysis" id="score_analysis" value="{{$Financial->score_analysis}}" placeholder="">
                            </div>



                        <div class="col-xl-12 d-flex justify-content-end">
                            <button type="button" class="btn btn report-tab-active" id="Financials-next-1">Next</button>
                        </div>


                    </div>
                </div>
                <!-- Financials 1 step end -->
                <!-- Financials part 1 FY1 to FY5 start -->
                <!-- Financials 2 step start ========================-->
                <div class="Financials-step" id="Financials-step-2">
                    <h4 class="card-title">Financials<br>
                        <span style="color:darkgray; font-size:12px;"> Financial Findings </span>
                        <ul class="nav nav-pills">
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="one_finding_FY1" style="color:white;background-color:#1c9bf6" aria-current="page" href="#">FY1</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="two_finding_FY1"  style="color:white;background-color:darkgray" aria-current="page" href="#">FY2</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="three_finding_FY1" style="color:white;background-color:darkgray" aria-current="page" href="#">FY3</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="four_finding_FY1" style="color:white;background-color:darkgray" aria-current="page" href="#">FY4</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="five_finding_FY1" style="color:white;background-color:darkgray" aria-current="page" href="#">FY5</a>
                            </li>
                        </ul>
                        <div class="row">
                                     @php
                                        $years = \App\Models\YearRecordForFy1ToFy5::get();

                                        @endphp


                                <div class="col-xl-4 mb-3">
                                    <label class="form-label">Select Year<span class="text-danger">*</span></label>
                                    <select class="default-select style-1 form-control" id="year_one_finding__1" name="year_one_finding__1">
                                        <option data-display="Select" value="" disabled>
                                            Select Year
                                        </option>
                                            @forelse ($years as $year)
                                            <option value="{{$year->year}}" {{$FinancialsFindingsFyOne->year_one_finding__1 ==$year->year ? 'selected' : '' }}>{{ $year->year  }}</option>
                                            @empty
                                            <p>No records found!</p>
                                            @endforelse
                                    </select>

                                </div>

                        </div>
                        <div class="row">
                            <div class="col-xl-3 mb-3">
                                <label for="revenue_fy_one_finding__1" class="form-label">Revenue</label>
                                <input type="number" step="any" class="form-control" name="revenue_fy_one_finding__1"  id="revenue_fy_one_finding__1" value="{{$FinancialsFindingsFyOne->revenue_fy_one_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="net_profit_fy_one_finding__1" class="form-label">Net Profit</label>
                                <input type="number" step="any" class="form-control"  name="net_profit_fy_one_finding__1"  id="net_profit_fy_one_finding__1" value="{{$FinancialsFindingsFyOne->net_profit_fy_one_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="gross_profit_fy_one_finding__1" class="form-label">Gross Profit</label>
                                <input type="number" step="any" class="form-control" name="gross_profit_fy_one_finding__1" id="gross_profit_fy_one_finding__1" value="{{$FinancialsFindingsFyOne->gross_profit_fy_one_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="working_capital_1_fy_one_finding__1" class="form-label">Working capital</label>
                                <input type="number" step="any" class="form-control"  name="working_capital_1_fy_one_finding__1"  id="working_capital_1_fy_one_finding__1" value="{{$FinancialsFindingsFyOne->working_capital_1_fy_one_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="quick_assets_fy_one_finding__1" class="form-label">Quick Assets</label>
                                <input type="number" step="any" class="form-control"  name="quick_assets_fy_one_finding__1"  id="quick_assets_fy_one_finding__1" value="{{$FinancialsFindingsFyOne->quick_assets_fy_one_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="total_assets_fy_one_finding__1" class="form-label">Total Assets</label>
                                <input type="number" step="any" class="form-control" name="total_assets_fy_one_finding__1"  id="total_assets_fy_one_finding__1" value="{{$FinancialsFindingsFyOne->total_assets_fy_one_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="current_assets_fy_one_finding__1" class="form-label">Current Assets</label>
                                <input type="number" step="any" class="form-control" name="current_assets_fy_one_finding__1"  id="current_assets_fy_one_finding__1" value="{{$FinancialsFindingsFyOne->current_assets_fy_one_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="current_liabilities_fy_one_finding__1" class="form-label">Current Liabilities</label>
                                <input type="number" step="any" class="form-control" name="current_liabilities_fy_one_finding__1"  id="current_liabilities_fy_one_finding__1" value="{{$FinancialsFindingsFyOne->current_liabilities_fy_one_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="debt_fy_one_finding__1" class="form-label">Debt</label>
                                <input type="number" step="any" class="form-control" name="debt_fy_one_finding__1" id="debt_fy_one_finding__1" value="{{$FinancialsFindingsFyOne->debt_fy_one_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="average_inventory_fy_one_finding__1" class="form-label">Average Inventory</label>
                                <input type="number" step="any" class="form-control" name="average_inventory_fy_one_finding__1"  id="average_inventory_fy_one_finding__1" value="{{$FinancialsFindingsFyOne->average_inventory_fy_one_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="net_sales_fy_one_finding__1" class="form-label">Net Sales</label>
                                <input type="number" step="any" class="form-control" name="net_sales_fy_one_finding__1"  id="net_sales_fy_one_finding__1" value="{{$FinancialsFindingsFyOne->net_sales_fy_one_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="equity_share_capital_fy_one_finding__1" class="form-label">Equity/Share Capital</label>
                                <input type="number" step="any" class="form-control" name="equity_share_capital_fy_one_finding__1"  id="equity_share_capital_fy_one_finding__1" value="{{$FinancialsFindingsFyOne->equity_share_capital_fy_one_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="sundry_debtors_fy_one_finding__1" class="form-label">Sundry Debtors</label>
                                <input type="number" step="any" class="form-control" name="sundry_debtors_fy_one_finding__1"  id="sundry_debtors_fy_one_finding__1" value="{{$FinancialsFindingsFyOne->sundry_debtors_fy_one_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="sundry_creditors_fy_one_finding__1" class="form-label">Sundry Creditors</label>
                                <input type="number" step="any" class="form-control" name="sundry_creditors_fy_one_finding__1"  id="sundry_creditors_fy_one_finding__1" value="{{$FinancialsFindingsFyOne->sundry_creditors_fy_one_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="loans_and_advances_fy_one_finding__1" class="form-label">Loans and Advances</label>
                                <input type="number" step="any" class="form-control" name="loans_and_advances_fy_one_finding__1"  id="loans_and_advances_fy_one_finding__1" value="{{$FinancialsFindingsFyOne->loans_and_advances_fy_one_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="cash_and_cash_equivalents_fy_one_finding__1" class="form-label">Cash and Cash Equivalents</label>
                                <input type="number" step="any" class="form-control" name="cash_and_cash_equivalents_fy_one_finding__1"  id="cash_and_cash_equivalents_fy_one_finding__1" value="{{$FinancialsFindingsFyOne->cash_and_cash_equivalents_fy_one_finding__1}}" placeholder="">
                            </div>

                        </div>

                        <!-- graph financial  graph heading start -->
                        <div class="row">
                            <div class="col-xl-3 mb-3">
                                <label for="revenue_fy_one_finding_heading_graph" class="form-label">Revenue Graph Heading</label>
                                <input type="text" step="any" class="form-control" name="revenue_fy_one_finding_heading_graph"  id="revenue_fy_one_finding_heading_graph" value="{{$Financial->revenue_fy_one_finding_heading_graph}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="net_profit_fy_one_finding_heading_graph" class="form-label">Net Profit Graph Heading</label>
                                <input type="text" step="any" class="form-control"  name="net_profit_fy_one_finding_heading_graph"  id="net_profit_fy_one_finding_heading_graph" value="{{$Financial->net_profit_fy_one_finding_heading_graph}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="gross_profit_fy_one_finding_heading_graph" class="form-label">Gross Profit Graph Heading</label>
                                <input type="text" step="any" class="form-control" name="gross_profit_fy_one_finding_heading_graph" id="gross_profit_fy_one_finding_heading_graph" value="{{$Financial->gross_profit_fy_one_finding_heading_graph}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="working_capital_1_fy_one_finding_heading_graph" class="form-label">Working capital Graph Heading</label>
                                <input type="text" step="any" class="form-control"  name="working_capital_1_fy_one_finding_heading_graph"  id="working_capital_1_fy_one_finding_heading_graph" value="{{$Financial->working_capital_1_fy_one_finding_heading_graph}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="quick_assets_fy_one_finding_heading_graph" class="form-label">Quick Assets Graph Heading</label>
                                <input type="text" step="any" class="form-control"  name="quick_assets_fy_one_finding_heading_graph"  id="quick_assets_fy_one_finding_heading_graph" value="{{$Financial->quick_assets_fy_one_finding_heading_graph}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="total_assets_fy_one_finding_heading_graph" class="form-label">Total Assets Graph Heading</label>
                                <input type="text" step="any" class="form-control" name="total_assets_fy_one_finding_heading_graph"  id="total_assets_fy_one_finding_heading_graph" value="{{$Financial->total_assets_fy_one_finding_heading_graph}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="current_assets_fy_one_finding_heading_graph" class="form-label">Current Assets Graph Heading</label>
                                <input type="text" step="any" class="form-control" name="current_assets_fy_one_finding_heading_graph"  id="current_assets_fy_one_finding_heading_graph" value="{{$Financial->current_assets_fy_one_finding_heading_graph}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="current_liabilities_fy_one_finding_heading_graph" class="form-label">Current Liabilities Graph Heading</label>
                                <input type="text" step="any" class="form-control" name="current_liabilities_fy_one_finding_heading_graph"  id="current_liabilities_fy_one_finding_heading_graph" value="{{$Financial->current_liabilities_fy_one_finding_heading_graph}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="debt_fy_one_finding_heading_graph" class="form-label">Debt Graph Heading</label>
                                <input type="text" step="any" class="form-control" name="debt_fy_one_finding_heading_graph" id="debt_fy_one_finding_heading_graph" value="{{$Financial->debt_fy_one_finding_heading_graph}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="average_inventory_fy_one_finding_heading_graph" class="form-label">Average Inventory Graph Heading</label>
                                <input type="text" step="any" class="form-control" name="average_inventory_fy_one_finding_heading_graph"  id="average_inventory_fy_one_finding_heading_graph" value="{{$Financial->average_inventory_fy_one_finding_heading_graph}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="net_sales_fy_one_finding_heading_graph" class="form-label">Net Sales Graph Heading</label>
                                <input type="text" step="any" class="form-control" name="net_sales_fy_one_finding_heading_graph"  id="net_sales_fy_one_finding_heading_graph" value="{{$Financial->net_sales_fy_one_finding_heading_graph}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="equity_share_capital_fy_one_finding_heading_graph" class="form-label">Equity/Share Capital Graph Heading</label>
                                <input type="text" step="any" class="form-control" name="equity_share_capital_fy_one_finding_heading_graph"  id="equity_share_capital_fy_one_finding_heading_graph" value="{{$Financial->equity_share_capital_fy_one_finding_heading_graph}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="sundry_debtors_fy_one_finding_heading_graph" class="form-label">Sundry Debtors Graph Heading</label>
                                <input type="text" step="any" class="form-control" name="sundry_debtors_fy_one_finding_heading_graph"  id="sundry_debtors_fy_one_finding_heading_graph" value="{{$Financial->sundry_debtors_fy_one_finding_heading_graph}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="sundry_creditors_fy_one_finding_heading_graph" class="form-label">Sundry Creditors Graph Heading</label>
                                <input type="text" step="any" class="form-control" name="sundry_creditors_fy_one_finding_heading_graph"  id="sundry_creditors_fy_one_finding_heading_graph" value="{{$Financial->sundry_creditors_fy_one_finding_heading_graph}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="loans_and_advances_fy_one_finding_heading_graph" class="form-label">Loans and Advances Graph Heading</label>
                                <input type="text" step="any" class="form-control" name="loans_and_advances_fy_one_finding_heading_graph"  id="loans_and_advances_fy_one_finding_heading_graph" value="{{$Financial->loans_and_advances_fy_one_finding_heading_graph}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="cash_and_cash_equivalents_fy_one_finding_heading_graph" class="form-label">Cash and Cash Equivalents Graph Heading</label>
                                <input type="text" step="any" class="form-control" name="cash_and_cash_equivalents_fy_one_finding_heading_graph"  id="cash_and_cash_equivalents_fy_one_finding_heading_graph" value="{{$Financial->cash_and_cash_equivalents_fy_one_finding_heading_graph}}" placeholder="">
                            </div>

                        </div>

                        <!-- graph financial  graph heading end -->


                        <!-- Navigation buttons -->

                        <div class="row">
                            <div class="col-xl-6 d-flex justify-content-start">
                                <button type="button" class="btn btn report-tab-unactive" id="Financials-prev-2">Previous</button>
                            </div>
                            <div class="col-xl-6 d-flex justify-content-end">

                                <button type="button" class="btn btn report-tab-active" id="Financials-next-2">Next</button>
                            </div>
                        </div>

                </div>
                <!--Financials 2 step end ========================-->
                <!--Financials 3 step start ========================-->
                <div class="Financials-step" id="Financials-step-3">
                    <h4 class="card-title">Financials<br>
                        <span style="color:darkgray; font-size:12px;"> Financial Findings </span>
                    </h4>
                        <ul class="nav nav-pills">
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="one_finding_FY1_2" style="color:white;background-color:darkgray" aria-current="page" href="#">FY1</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="two_finding_FY1_2" style="color:white;background-color:#1c9bf6" aria-current="page" href="#">FY2</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="three_finding_FY1_2" style="color:white;background-color:darkgray" aria-current="page" href="#">FY3</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="four_finding_FY1_2" style="color:white;background-color:darkgray" aria-current="page" href="#">FY4</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="five_finding_FY1_2" style="color:white;background-color:darkgray" aria-current="page" href="#">FY5</a>
                            </li>
                        </ul>
                         <div class="row">

                                <div class="col-xl-4 mb-3">
                                    <label class="form-label">Select Year<span class="text-danger">*</span></label>
                                    <select class="default-select style-1 form-control" id="year_two_finding__1" name="year_two_finding__1">
                                        <option data-display="Select" value="" disabled>
                                            Select Year
                                        </option>
                                            @forelse ($years as $year)
                                            <option value="{{$year->year}}"
                                            {{$FinancialsFindingsFyTwo->year_two_finding__1 ==$year->year ? 'selected' : '' }}>{{ $year->year  }}</option>
                                            @empty
                                            <p>No records found!</p>
                                            @endforelse
                                    </select>

                                </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 mb-3">
                                <label for="revenue_fy_two_finding__1" class="form-label">Revenue</label>
                                <input type="number" step="any" class="form-control" name="revenue_fy_two_finding__1"  id="revenue_fy_two_finding__1" value="{{$FinancialsFindingsFyTwo->revenue_fy_two_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="net_profit_fy_two_finding__1" class="form-label">Net Profit</label>
                                <input type="number" step="any" class="form-control"  name="net_profit_fy_two_finding__1"  id="net_profit_fy_two_finding__1" value="{{$FinancialsFindingsFyTwo->net_profit_fy_two_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="gross_profit_fy_two_finding__1" class="form-label">Gross Profit</label>
                                <input type="number" step="any" class="form-control" name="gross_profit_fy_two_finding__1" id="gross_profit_fy_two_finding__1" value="{{$FinancialsFindingsFyTwo->gross_profit_fy_two_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="working_capital_1_fy_two_finding__1" class="form-label">Working capital</label>
                                <input type="number" step="any" class="form-control"  name="working_capital_1_fy_two_finding__1" id="working_capital_1_fy_two_finding__1" value="{{$FinancialsFindingsFyTwo->working_capital_1_fy_two_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="quick_assets_fy_two_finding__1" class="form-label">Quick Assets</label>
                                <input type="number" step="any" class="form-control"  name="quick_assets_fy_two_finding__1"  id="quick_assets_fy_two_finding__1" value="{{$FinancialsFindingsFyTwo->quick_assets_fy_two_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="total_assets_fy_two_finding__1" class="form-label">Total Assets</label>
                                <input type="number" step="any" class="form-control" name="total_assets_fy_two_finding__1"  id="total_assets_fy_two_finding__1" value="{{$FinancialsFindingsFyTwo->total_assets_fy_two_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="current_assets_fy_two_finding__1" class="form-label">Current Assets</label>
                                <input type="number" step="any" class="form-control" name="current_assets_fy_two_finding__1"  id="current_assets_fy_two_finding__1" value="{{$FinancialsFindingsFyTwo->current_assets_fy_two_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="current_liabilities_fy_two_finding__1" class="form-label">Current Liabilities</label>
                                <input type="number" step="any" class="form-control" name="current_liabilities_fy_two_finding__1"  id="current_liabilities_fy_two_finding__1" value="{{$FinancialsFindingsFyTwo->current_liabilities_fy_two_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="debt_fy_two_finding__1" class="form-label">Debt</label>
                                <input type="number" step="any" class="form-control" name="debt_fy_two_finding__1" id="debt_fy_two_finding__1" value="{{$FinancialsFindingsFyTwo->debt_fy_two_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="average_inventory_fy_two_finding__1" class="form-label">Average Inventory</label>
                                <input type="number" step="any" class="form-control" name="average_inventory_fy_two_finding__1"  id="average_inventory_fy_two_finding__1" value="{{$FinancialsFindingsFyTwo->average_inventory_fy_two_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="net_sales_fy_two_finding__1" class="form-label">Net Sales</label>
                                <input type="number" step="any" class="form-control" name="net_sales_fy_two_finding__1"  id="net_sales_fy_two_finding__1" value="{{$FinancialsFindingsFyTwo->net_sales_fy_two_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="equity_share_capital_fy_two_finding__1" class="form-label">Equity/Share Capital</label>
                                <input type="number" step="any" class="form-control" name="equity_share_capital_fy_two_finding__1"  id="equity_share_capital_fy_two_finding__1" value="{{$FinancialsFindingsFyTwo->equity_share_capital_fy_two_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="sundry_debtors_fy_two_finding__1" class="form-label">Sundry Debtors</label>
                                <input type="number" step="any" class="form-control" name="sundry_debtors_fy_two_finding__1"  id="sundry_debtors_fy_two_finding__1" value="{{$FinancialsFindingsFyTwo->sundry_debtors_fy_two_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="sundry_creditors_fy_two_finding__1" class="form-label">Sundry Creditors</label>
                                <input type="number" step="any" class="form-control" name="sundry_creditors_fy_two_finding__1"  id="sundry_creditors_fy_two_finding__1" value="{{$FinancialsFindingsFyTwo->sundry_creditors_fy_two_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="loans_and_advances_fy_two_finding__1" class="form-label">Loans and Advances</label>
                                <input type="number" step="any" class="form-control" name="loans_and_advances_fy_two_finding__1"  id="loans_and_advances_fy_two_finding__1" value="{{$FinancialsFindingsFyTwo->loans_and_advances_fy_two_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="cash_and_cash_equivalents_fy_two_finding__1" class="form-label">Cash and Cash Equivalents</label>
                                <input type="number" step="any" class="form-control" name="cash_and_cash_equivalents_fy_two_finding__1"  id="cash_and_cash_equivalents_fy_two_finding__1" value="{{$FinancialsFindingsFyTwo->cash_and_cash_equivalents_fy_two_finding__1}}" placeholder="">
                            </div>

                        </div>

                        <!-- Navigation buttons -->

                        <div class="row">
                            <div class="col-xl-6 d-flex justify-content-start">
                                <button type="button" class="btn btn report-tab-unactive" id="Financials-prev-3">Previous</button>
                            </div>
                            <div class="col-xl-6 d-flex justify-content-end">

                                <button type="button" class="btn btn report-tab-active" id="Financials-next-3">Next</button>
                            </div>
                        </div>

                </div>
                <!--Financials 3 step end ========================-->
                <!--Financials 4 step start ========================-->
                <div class="Financials-step" id="Financials-step-4">
                    <h4 class="card-title">Financials<br>
                        <span style="color:darkgray; font-size:12px;"> Financial Findings </span>
                        <ul class="nav nav-pills">
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="one_finding_FY1_3" style="color:white;background-color:darkgray" aria-current="page" href="#">FY1</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="two_finding_FY1_3" style="color:white;background-color:darkgray" aria-current="page" href="#">FY2</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="three_finding_FY1_3" style="color:white;background-color:#1c9bf6" aria-current="page" href="#">FY3</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="four_finding_FY1_3" style="color:white;background-color:darkgray" aria-current="page" href="#">FY4</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="five_finding_FY1_3" style="color:white;background-color:darkgray" aria-current="page" href="#">FY5</a>
                            </li>
                        </ul>
                         <div class="row">

                                <div class="col-xl-4 mb-3">
                                    <label class="form-label">Select Year<span class="text-danger">*</span></label>
                                    <select class="default-select style-1 form-control" id="year_three_finding__1" name="year_three_finding__1">
                                        <option data-display="Select" value="" disabled>
                                            Select Year
                                        </option>
                                            @forelse ($years as $year)
                                            <option value="{{$year->year}}"
                                            {{$FinancialsFindingsFyThree->year_three_finding__1 ==$year->year ? 'selected' : '' }}>{{ $year->year  }}</option>
                                            @empty
                                            <p>No records found!</p>
                                            @endforelse
                                    </select>

                                </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 mb-3">
                                <label for="revenue_fy_three_finding__1" class="form-label">Revenue</label>
                                <input type="number" step="any" class="form-control"  name="revenue_fy_three_finding__1" id="revenue_fy_three_finding__1" value="{{$FinancialsFindingsFyThree->revenue_fy_three_finding__1}}" placeholder="">

                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="net_profit_fy_three_finding__1" class="form-label">Net Profit</label>
                                <input type="number" step="any" class="form-control"  name="net_profit_fy_three_finding__1" id="net_profit_fy_three_finding__1" value="{{$FinancialsFindingsFyThree->net_profit_fy_three_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="gross_profit_fy_three_finding__1" class="form-label">Gross Profit</label>
                                <input type="number" step="any" class="form-control" name="gross_profit_fy_three_finding__1" id="gross_profit_fy_three_finding__1" value="{{$FinancialsFindingsFyThree->gross_profit_fy_three_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="working_capital_1_fy_three_finding__1" class="form-label">Working capital</label>
                                <input type="number" step="any" class="form-control"  name="working_capital_1_fy_three_finding__1" id="working_capital_1_fy_three_finding__1" value="{{$FinancialsFindingsFyThree->working_capital_1_fy_three_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="quick_assets_fy_three_finding__1" class="form-label">Quick Assets</label>
                                <input type="number" step="any" class="form-control"  name="quick_assets_fy_three_finding__1" id="quick_assets_fy_three_finding__1" value="{{$FinancialsFindingsFyThree->quick_assets_fy_three_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="total_assets_fy_three_finding__1" class="form-label">Total Assets</label>
                                <input type="number" step="any" class="form-control" name="total_assets_fy_three_finding__1" id="total_assets_fy_three_finding__1" value="{{$FinancialsFindingsFyThree->total_assets_fy_three_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="current_assets_fy_three_finding__1" class="form-label">Current Assets</label>
                                <input type="number" step="any" class="form-control" name="current_assets_fy_three_finding__1" id="current_assets_fy_three_finding__1" value="{{$FinancialsFindingsFyThree->current_assets_fy_three_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="current_liabilities_fy_three_finding__1" class="form-label">Current Liabilities</label>
                                <input type="number" step="any" class="form-control" name="current_liabilities_fy_three_finding__1" id="current_liabilities_fy_three_finding__1" value="{{$FinancialsFindingsFyThree->current_liabilities_fy_three_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="debt_fy_three_finding__1" class="form-label">Debt</label>
                                <input type="number" step="any" class="form-control" name="debt_fy_three_finding__1" id="debt_fy_three_finding__1" value="{{$FinancialsFindingsFyThree->debt_fy_three_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="average_inventory_fy_three_finding__1" class="form-label">Average Inventory</label>
                                <input type="number" step="any" class="form-control" name="average_inventory_fy_three_finding__1" id="average_inventory_fy_three_finding__1" value="{{$FinancialsFindingsFyThree->average_inventory_fy_three_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="net_sales_fy_three_finding__1" class="form-label">Net Sales</label>
                                <input type="number" step="any" class="form-control" name="net_sales_fy_three_finding__1" id="net_sales_fy_three_finding__1" value="{{$FinancialsFindingsFyThree->net_sales_fy_three_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="equity_share_capital_fy_three_finding__1" class="form-label">Equity/Share Capital</label>
                                <input type="number" step="any" class="form-control" name="equity_share_capital_fy_three_finding__1" id="equity_share_capital_fy_three_finding__1" value="{{$FinancialsFindingsFyThree->equity_share_capital_fy_three_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="sundry_debtors_fy_three_finding__1" class="form-label">Sundry Debtors</label>
                                <input type="number" step="any" class="form-control" name="sundry_debtors_fy_three_finding__1" id="sundry_debtors_fy_three_finding__1" value="{{$FinancialsFindingsFyThree->sundry_debtors_fy_three_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="sundry_creditors_fy_three_finding__1" class="form-label">Sundry Creditors</label>
                                <input type="number" step="any" class="form-control" name="sundry_creditors_fy_three_finding__1" id="sundry_creditors_fy_three_finding__1" value="{{$FinancialsFindingsFyThree->sundry_creditors_fy_three_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="loans_and_advances_fy_three_finding__1" class="form-label">Loans and Advances</label>
                                <input type="number" step="any" class="form-control" name="loans_and_advances_fy_three_finding__1" id="loans_and_advances_fy_three_finding__1" value="{{$FinancialsFindingsFyThree->loans_and_advances_fy_three_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="cash_and_cash_equivalents_fy_three_finding__1" class="form-label">Cash and Cash Equivalents</label>
                                <input type="number" step="any" class="form-control" name="cash_and_cash_equivalents_fy_three_finding__1" id="cash_and_cash_equivalents_fy_three_finding__1" value="{{$FinancialsFindingsFyThree->cash_and_cash_equivalents_fy_three_finding__1}}" placeholder="">
                            </div>

                        </div>

                        <!-- Navigation buttons -->

                        <div class="row">
                            <div class="col-xl-6 d-flex justify-content-start">
                                <button type="button" class="btn btn report-tab-unactive" id="Financials-prev-4">Previous</button>
                            </div>
                            <div class="col-xl-6 d-flex justify-content-end">

                                <button type="button" class="btn btn report-tab-active" id="Financials-next-4">Next</button>
                            </div>
                        </div>

                </div>
                <!--Financials 4 step end ========================-->
                <!--Financials 5 step start ========================-->
                <div class="Financials-step" id="Financials-step-5">
                    <h4 class="card-title">Financials<br>
                        <span style="color:darkgray; font-size:12px;"> Financial Findings </span>
                        <ul class="nav nav-pills">
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="one_finding_FY1_4" style="color:white;background-color:darkgray" aria-current="page" href="#">FY1</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="two_finding_FY1_4" style="color:white;background-color:darkgray" aria-current="page" href="#">FY2</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="three_finding_FY1_4" style="color:white;background-color:darkgray" aria-current="page" href="javascript:void(0)">FY3</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="four_finding_FY1_4" style="color:white;background-color:#1c9bf6" aria-current="page" href="javascript:void(0)">FY4</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="five_finding_FY1_4" style="color:white;background-color:darkgray" aria-current="page" href="#">FY5</a>
                            </li>
                        </ul>
                         <div class="row">

                                <div class="col-xl-4 mb-3">
                                    <label class="form-label">Select Year<span class="text-danger">*</span></label>
                                    <select class="default-select style-1 form-control" id="year_four_finding__1" name="year_four_finding__1">
                                        <option data-display="Select" value="" disabled>
                                            Select Year
                                        </option>
                                            @forelse ($years as $year)
                                            <option value="{{$year->year}}" {{$FinancialsFindingsFyFour->year_four_finding__1 ==$year->year ? 'selected' : '' }}>{{ $year->year  }}</option>
                                            @empty
                                            <p>No records found!</p>
                                            @endforelse
                                    </select>

                                </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 mb-3">
                                <label for="revenue_fy_four_finding__1" class="form-label">Revenue</label>
                                <input type="number" step="any" class="form-control" name="revenue_fy_four_finding__1" id="revenue_fy_four_finding__1" value="{{$FinancialsFindingsFyFour->revenue_fy_four_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="net_profit_fy_four_finding__1" class="form-label">Net Profit</label>
                                <input type="number" step="any" class="form-control"  name="net_profit_fy_four_finding__1"  id="net_profit_fy_four_finding__1" value="{{$FinancialsFindingsFyFour->net_profit_fy_four_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="gross_profit_fy_four_finding__1" class="form-label">Gross Profit</label>
                                <input type="number" step="any" class="form-control" name="gross_profit_fy_four_finding__1" id="gross_profit_fy_four_finding__1" value="{{$FinancialsFindingsFyFour->gross_profit_fy_four_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="working_capital_1_fy_four_finding__1" class="form-label">Working capital</label>
                                <input type="number" step="any" class="form-control"  name="working_capital_1_fy_four_finding__1"  id="working_capital_1_fy_four_finding__1" value="{{$FinancialsFindingsFyFour->working_capital_1_fy_four_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="quick_assets_fy_four_finding__1" class="form-label">Quick Assets</label>
                                <input type="number" step="any" class="form-control"  name="quick_assets_fy_four_finding__1"  id="quick_assets_fy_four_finding__1" value="{{$FinancialsFindingsFyFour->quick_assets_fy_four_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="total_assets_fy_four_finding__1" class="form-label">Total Assets</label>
                                <input type="number" step="any" class="form-control" name="total_assets_fy_four_finding__1"  id="total_assets_fy_four_finding__1" value="{{$FinancialsFindingsFyFour->total_assets_fy_four_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="current_assets_fy_four_finding__1" class="form-label">Current Assets</label>
                                <input type="number" step="any" class="form-control" name="current_assets_fy_four_finding__1" id="current_assets_fy_four_finding__1" value="{{$FinancialsFindingsFyFour->current_assets_fy_four_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="current_liabilities_fy_four_finding__1" class="form-label">Current Liabilities</label>
                                <input type="number" step="any" class="form-control" name="current_liabilities_fy_four_finding__1"  id="current_liabilities_fy_four_finding__1" value="{{$FinancialsFindingsFyFour->current_liabilities_fy_four_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="debt_fy_four_finding__1" class="form-label">Debt</label>
                                <input type="number" step="any" class="form-control" name="debt_fy_four_finding__1"  id="debt_fy_four_finding__1" value="{{$FinancialsFindingsFyFour->debt_fy_four_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="average_inventory_fy_four_finding__1" class="form-label">Average Inventory</label>
                                <input type="number" step="any" class="form-control" name="average_inventory_fy_four_finding__1"  id="average_inventory_fy_four_finding__1" value="{{$FinancialsFindingsFyFour->average_inventory_fy_four_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="net_sales_fy_four_finding__1" class="form-label">Net Sales</label>
                                <input type="number" step="any" class="form-control" name="net_sales_fy_four_finding__1"  id="net_sales_fy_four_finding__1" value="{{$FinancialsFindingsFyFour->net_sales_fy_four_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="equity_share_capital_fy_four_finding__1" class="form-label">Equity/Share Capital</label>
                                <input type="number" step="any" class="form-control" name="equity_share_capital_fy_four_finding__1"  id="equity_share_capital_fy_four_finding__1" value="{{$FinancialsFindingsFyFour->equity_share_capital_fy_four_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="sundry_debtors_fy_four_finding__1" class="form-label">Sundry Debtors</label>
                                <input type="number" step="any" class="form-control" name="sundry_debtors_fy_four_finding__1" id="sundry_debtors_fy_four_finding__1" value="{{$FinancialsFindingsFyFour->sundry_debtors_fy_four_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="sundry_creditors_fy_four_finding__1" class="form-label">Sundry Creditors</label>
                                <input type="number" step="any" class="form-control" name="sundry_creditors_fy_four_finding__1" id="sundry_creditors_fy_four_finding__1" value="{{$FinancialsFindingsFyFour->sundry_creditors_fy_four_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="loans_and_advances_fy_four_finding__1" class="form-label">Loans and Advances</label>
                                <input type="number" step="any" class="form-control" name="loans_and_advances_fy_four_finding__1" id="loans_and_advances_fy_four_finding__1" value="{{$FinancialsFindingsFyFour->loans_and_advances_fy_four_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="cash_and_cash_equivalents_fy_four_finding__1" class="form-label">Cash and Cash Equivalents</label>
                                <input type="number" step="any" class="form-control" name="cash_and_cash_equivalents_fy_four_finding__1" id="cash_and_cash_equivalents_fy_four_finding__1" value="{{$FinancialsFindingsFyFour->cash_and_cash_equivalents_fy_four_finding__1}}" placeholder="">
                            </div>

                        </div>

                        <!-- Navigation buttons -->

                        <div class="row">
                            <div class="col-xl-6 d-flex justify-content-start">
                                <button type="button" class="btn btn report-tab-unactive" id="Financials-prev-5">Previous</button>
                            </div>
                            <div class="col-xl-6 d-flex justify-content-end">

                                <button type="button" class="btn btn report-tab-active" id="Financials-next-5">Next</button>
                            </div>
                        </div>

                </div>
                <!--Financials 5 step end ========================-->
                <!--Financials 6 step start ========================-->
                <div class="Financials-step" id="Financials-step-6">
                    <h4 class="card-title">Financials<br>
                        <span style="color:darkgray; font-size:12px;"> Financial Findings </span>
                        <ul class="nav nav-pills">
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="one_finding_FY1_5" style="color:white;background-color:darkgray" aria-current="page" href="#">FY1</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="two_finding_FY1_5" style="color:white;background-color:darkgray" aria-current="page" href="#">FY2</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="three_finding_FY1_5" style="color:white;background-color:darkgray" aria-current="page" href="#">FY3</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="four_finding_FY1_5" style="color:white;background-color:darkgray" aria-current="page" href="#">FY4</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="five_finding_FY1_5" style="color:white;background-color:#1c9bf6" aria-current="page" href="#">FY5</a>
                            </li>
                        </ul>
                         <div class="row">

                                 <div class="col-xl-4 mb-3">
                                    <label class="form-label">Select Year<span class="text-danger">*</span></label>
                                    <select class="default-select style-1 form-control" id="year_five_finding__1" name="year_five_finding__1">
                                        <option data-display="Select" value="" disabled>
                                            Select Year
                                        </option>
                                            @forelse ($years as $year)
                                            <option value="{{$year->year}}"
                                            {{$FinancialsFindingsFyFive->year_five_finding__1 ==$year->year ? 'selected' : '' }}>{{ $year->year  }}</option>
                                            @empty
                                            <p>No records found!</p>
                                            @endforelse
                                    </select>

                                </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 mb-3">
                                <label for="revenue_fy_five_finding__1" class="form-label">Revenue</label>
                                <input type="number" step="any" class="form-control" name="revenue_fy_five_finding__1" id="revenue_fy_five_finding__1" value="{{$FinancialsFindingsFyFive->revenue_fy_five_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="net_profit_fy_five_finding__1" class="form-label">Net Profit</label>
                                <input type="number" step="any" class="form-control"  name="net_profit_fy_five_finding__1"  id="net_profit_fy_five_finding__1" value="{{$FinancialsFindingsFyFive->net_profit_fy_five_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="gross_profit_fy_five_finding__1" class="form-label">Gross Profit</label>
                                <input type="number" step="any" class="form-control" name="gross_profit_fy_five_finding__1" id="gross_profit_fy_five_finding__1" value="{{$FinancialsFindingsFyFive->gross_profit_fy_five_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="working_capital_1_fy_five_finding__1" class="form-label">Working capital</label>
                                <input type="number" step="any" class="form-control"  name="working_capital_1_fy_five_finding__1"  id="working_capital_1_fy_five_finding__1" value="{{$FinancialsFindingsFyFive->working_capital_1_fy_five_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="quick_assets_fy_five_finding__1" class="form-label">Quick Assets</label>
                                <input type="number" step="any" class="form-control"  name="quick_assets_fy_five_finding__1"  id="quick_assets_fy_five_finding__1" value="{{$FinancialsFindingsFyFive->quick_assets_fy_five_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="total_assets_fy_five_finding__1" class="form-label">Total Assets</label>
                                <input type="number" step="any" class="form-control" name="total_assets_fy_five_finding__1"  id="total_assets_fy_five_finding__1" value="{{$FinancialsFindingsFyFive->total_assets_fy_five_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="current_assets_fy_five_finding__1" class="form-label">Current Assets</label>
                                <input type="number" step="any" class="form-control" name="current_assets_fy_five_finding__1" id="current_assets_fy_five_finding__1" value="{{$FinancialsFindingsFyFive->current_assets_fy_five_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="current_liabilities_fy_five_finding__1" class="form-label">Current Liabilities</label>
                                <input type="number" step="any" class="form-control" name="current_liabilities_fy_five_finding__1"  id="current_liabilities_fy_five_finding__1" value="{{$FinancialsFindingsFyFive->current_liabilities_fy_five_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="debt_fy_five_finding__1" class="form-label">Debt</label>
                                <input type="number" step="any" class="form-control" name="debt_fy_five_finding__1"  id="debt_fy_five_finding__1" value="{{$FinancialsFindingsFyFive->debt_fy_five_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="average_inventory_fy_five_finding__1" class="form-label">Average Inventory</label>
                                <input type="number" step="any" class="form-control" name="average_inventory_fy_five_finding__1"  id="average_inventory_fy_five_finding__1" value="{{$FinancialsFindingsFyFive->average_inventory_fy_five_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="net_sales_fy_five_finding__1" class="form-label">Net Sales</label>
                                <input type="number" step="any" class="form-control" name="net_sales_fy_five_finding__1"  id="net_sales_fy_five_finding__1" value="{{$FinancialsFindingsFyFive->net_sales_fy_five_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="equity_share_capital_fy_five_finding__1" class="form-label">Equity/Share Capital</label>
                                <input type="number" step="any" class="form-control" name="equity_share_capital_fy_five_finding__1"  id="equity_share_capital_fy_five_finding__1" value="{{$FinancialsFindingsFyFive->equity_share_capital_fy_five_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="sundry_debtors_fy_five_finding__1" class="form-label">Sundry Debtors</label>
                                <input type="number" step="any" class="form-control" name="sundry_debtors_fy_five_finding__1" id="sundry_debtors_fy_five_finding__1" value="{{$FinancialsFindingsFyFive->sundry_debtors_fy_five_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="sundry_creditors_fy_five_finding__1" class="form-label">Sundry Creditors</label>
                                <input type="number" step="any" class="form-control" name="sundry_creditors_fy_five_finding__1" id="sundry_creditors_fy_five_finding__1" value="{{$FinancialsFindingsFyFive->sundry_creditors_fy_five_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="loans_and_advances_fy_five_finding__1" class="form-label">Loans and Advances</label>
                                <input type="number" step="any" class="form-control" name="loans_and_advances_fy_five_finding__1" id="loans_and_advances_fy_five_finding__1" value="{{$FinancialsFindingsFyFive->loans_and_advances_fy_five_finding__1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="cash_and_cash_equivalents_fy_five_finding__1" class="form-label">Cash and Cash Equivalents</label>
                                <input type="number" step="any" class="form-control" name="cash_and_cash_equivalents_fy_five_finding__1" id="cash_and_cash_equivalents_fy_five_finding__1" value="{{$FinancialsFindingsFyFive->cash_and_cash_equivalents_fy_five_finding__1}}" placeholder="">
                            </div>

                        </div>

                        <!-- Navigation buttons -->

                        <div class="row">
                            <div class="col-xl-6 d-flex justify-content-start">
                                <button type="button" class="btn btn report-tab-unactive" id="Financials-prev-6">Previous</button>
                            </div>
                            <div class="col-xl-6 d-flex justify-content-end">

                                <button type="button" class="btn btn report-tab-active" id="Financials-next-6">Next</button>
                            </div>
                        </div>

                </div>
                <!--Financials 6 step end ========================-->
                <!-- Financials part 1 FY1 to FY5 end -->

                <!-- Financials part 2 FY1 to FY5 start -->
                <!--Financials 7 step start ========================-->
                <div class="Financials-step" id="Financials-step-7">
                    <h4 class="card-title">Financials<br> </h4>
                        <span style="color:darkgray; font-size:12px;"> Ratio Analysis </span>
                        <ul class="nav nav-pills">
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="one_ratio_FY1" style="color:white;background-color:#1c9bf6" aria-current="page" href="#">FY1</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="two_ratio_FY1" style="color:white;background-color:darkgray" aria-current="page" href="#">FY2</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="three_ratio_FY1" style="color:white;background-color:darkgray" aria-current="page" href="#">FY3</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="four_ratio_FY1" style="color:white;background-color:darkgray" aria-current="page" href="#">FY4</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="five_ratio_FY1" style="color:white;background-color:darkgray" aria-current="page" href="#">FY5</a>
                            </li>
                        </ul>
                         <div class="row">

                            <div class="col-xl-3 mb-3">
                                    <label class="form-label">Select Year<span class="text-danger">*</span></label>
                                    <select class="default-select style-1 form-control" id="year_ratio_one_1" name="year_ratio_one_1">
                                        <option data-display="Select" value="" disabled>
                                            Select Year
                                        </option>
                                            @forelse ($years as $year)
                                            <option value="{{$year->year}}" {{$FinancialsRatioAnalysisFyOne->year_ratio_one_1 ==$year->year ? 'selected' : '' }}>{{ $year->year  }}</option>
                                            @empty
                                            <p>No records found!</p>
                                            @endforelse
                                    </select>

                                </div>
                                <div class="col-xl-3 mb-3">
                                <label for="quick_ratio_fy_one_1" class="form-label">Quick Ratio </label>
                                <input type="number" step="any" class="form-control" name="quick_ratio_fy_one_1"  id="quick_ratio_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->quick_ratio_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="quick_ratio_analysis_fy_one_1" class="form-label">Analysis</label>
                                <input type="text" class="form-control" name="quick_ratio_analysis_fy_one_1"  id="quick_ratio_analysis_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->quick_ratio_analysis_fy_one_1}}" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 mb-3">
                                <label for="current_ratio_fy_one_1" class="form-label">Current ratio</label>
                                <input type="number" step="any"  class="form-control" name="current_ratio_fy_one_1"  id="current_ratio_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->current_ratio_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="current_ratio_analysis_fy_one_1" class="form-label">Analysis</label>
                                <input type="text" class="form-control" name="current_ratio_analysis_fy_one_1"  id="current_ratio_analysis_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->current_ratio_analysis_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="debt_ratio_fy_one_1" class="form-label">Debt Ratio</label>
                                <input type="number" step="any"  class="form-control" name="debt_ratio_fy_one_1"  id="debt_ratio_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->debt_ratio_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="debt_ratio_analysis_fy_one_1" class="form-label">Analysis</label>
                                <input type="text" class="form-control" name="debt_ratio_analysis_fy_one_1"  id="debt_ratio_analysis_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->debt_ratio_analysis_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="solvency_ratio_fy_one_1" class="form-label">Solvency Ratio</label>
                                <input type="number" step="any"  class="form-control" name="solvency_ratio_fy_one_1"  id="solvency_ratio_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->solvency_ratio_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="solvency_ratio_analysis_fy_one_1" class="form-label">Analysis</label>
                                <input type="text" class="form-control" name="solvency_ratio_analysis_fy_one_1"  id="solvency_ratio_analysis_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->solvency_ratio_analysis_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="debt_to_equity_ratio_fy_one_1" class="form-label">Debt to Equity Ratio</label>
                                <input type="number" step="any"  class="form-control" name="debt_to_equity_ratio_fy_one_1"  id="debt_to_equity_ratio_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->debt_to_equity_ratio_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="debt_to_equity_ratio_analysis_fy_one_1" class="form-label">Analysis</label>
                                <input type="text" class="form-control" name="debt_to_equity_ratio_analysis_fy_one_1"  id="debt_to_equity_ratio_analysis_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->debt_to_equity_ratio_analysis_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="asset_turnover_ratio_fy_one_1" class="form-label">Asset Turnover Ratio</label>
                                <input type="number" step="any"  class="form-control" name="asset_turnover_ratio_fy_one_1"  id="asset_turnover_ratio_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->asset_turnover_ratio_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="asset_turnover_ratio_analysis_fy_one_1" class="form-label">Analysis</label>
                                <input type="text" class="form-control" name="asset_turnover_ratio_analysis_fy_one_1"  id="asset_turnover_ratio_analysis_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->asset_turnover_ratio_analysis_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="absolute_liquidity_ratio_fy_one_1" class="form-label">Absolute Liquidity Ratio</label>
                                <input type="number" step="any"  class="form-control" name="absolute_liquidity_ratio_fy_one_1"  id="absolute_liquidity_ratio_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->absolute_liquidity_ratio_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="absolute_liquidity_ratio_analysis_fy_one_1" class="form-label">Analysis</label>
                                <input type="text" class="form-control" name="absolute_liquidity_ratio_analysis_fy_one_1"  id="absolute_liquidity_ratio_analysis_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->absolute_liquidity_ratio_analysis_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="proprietary_ratio_fy_one_1" class="form-label">Proprietary Ratio</label>
                                <input type="number" step="any"  class="form-control" name="proprietary_ratio_fy_one_1"  id="proprietary_ratio_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->proprietary_ratio_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="proprietary_ratio_analysis_fy_one_1" class="form-label">Analysis</label>
                                <input type="text" class="form-control" name="proprietary_ratio_analysis_fy_one_1"  id="proprietary_ratio_analysis_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->proprietary_ratio_analysis_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="net_profit_ratio_fy_one_1" class="form-label">Net Profit Ratio</label>
                                <input type="number" step="any"  class="form-control" name="net_profit_ratio_fy_one_1"  id="net_profit_ratio_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->net_profit_ratio_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="net_profit_ratio_analysis_fy_one_1" class="form-label">Analysis</label>
                                <input type="text" class="form-control" name="net_profit_ratio_analysis_fy_one_1"  id="net_profit_ratio_analysis_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->net_profit_ratio_analysis_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="gross_profit_ratio_fy_one_1" class="form-label">Gross Profit Ratio</label>
                                <input type="number" step="any"  class="form-control" name="gross_profit_ratio_fy_one_1"  id="gross_profit_ratio_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->gross_profit_ratio_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="gross_profit_ratio_analysis_fy_one_1" class="form-label">Analysis</label>
                                <input type="text" class="form-control" name="gross_profit_ratio_analysis_fy_one_1"  id="gross_profit_ratio_analysis_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->gross_profit_ratio_analysis_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="springate_s_score_ratio_fy_one_1" class="form-label">Springate S Score</label>
                                <input type="number" step="any" class="form-control" name="springate_s_score_ratio_fy_one_1"  id="springate_s_score_ratio_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->springate_s_score_ratio_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="springate_s_score_ratio_analysis_fy_one_1" class="form-label">Analysis</label>
                                <input type="text" class="form-control" name="springate_s_score_ratio_analysis_fy_one_1"  id="springate_s_score_ratio_analysis_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->springate_s_score_ratio_analysis_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="trade_receivable_days_ratio_fy_one_1" class="form-label">Trade Receivable Days</label>
                                <input  type="number" step="any"  class="form-control" name="trade_receivable_days_ratio_fy_one_1"  id="trade_receivable_days_ratio_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->trade_receivable_days_ratio_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="trade_receivable_days_ratio_analysis_fy_one_1" class="form-label">Analysis</label>
                                <input type="text" class="form-control" name="trade_receivable_days_ratio_analysis_fy_one_1"  id="trade_receivable_days_ratio_analysis_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->trade_receivable_days_ratio_analysis_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="trade_payable_days_ratio_fy_one_1" class="form-label">Trade Payable Days</label>
                                <input  type="number" step="any"  class="form-control" name="trade_payable_days_ratio_fy_one_1"  id="trade_payable_days_ratio_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->trade_payable_days_ratio_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="trade_payable_days_ratio_analysis_fy_one_1" class="form-label">Analysis</label>
                                <input type="text" class="form-control" name="trade_payable_days_ratio_analysis_fy_one_1"  id="trade_payable_days_ratio_analysis_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->trade_payable_days_ratio_analysis_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="taffler_z_score_ratio_fy_one_1" class="form-label">Taffler Z-Score</label>
                                <input type="number" step="any"   class="form-control" name="taffler_z_score_ratio_fy_one_1"  id="taffler_z_score_ratio_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->taffler_z_score_ratio_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="taffler_z_score_ratio_analysis_fy_one_1" class="form-label">Analysis</label>
                                <input type="text" class="form-control" name="taffler_z_score_ratio_analysis_fy_one_1"  id="taffler_z_score_ratio_analysis_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->taffler_z_score_ratio_analysis_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="zmijewski_x_score_ratio_fy_one_1" class="form-label">Zmijewski X-Score</label>
                                <input type="number" step="any"   class="form-control" name="zmijewski_x_score_ratio_fy_one_1"  id="zmijewski_x_score_ratio_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->zmijewski_x_score_ratio_fy_one_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="zmijewski_x_score_ratio_analysis_fy_one_1" class="form-label">Analysis</label>
                                <input type="text" class="form-control" name="zmijewski_x_score_ratio_analysis_fy_one_1"  id="zmijewski_x_score_ratio_analysis_fy_one_1" value="{{$FinancialsRatioAnalysisFyOne->zmijewski_x_score_ratio_analysis_fy_one_1}}" placeholder="">
                            </div>
                        </div>



                     <!-- graph ratio  graph heading start -->

                     <div class="row">
                         <div class="col-xl-3 mb-3">
                                <label for="quick_ratio_fy_one_ratio_heading_graph" class="form-label">Quick ratio GraphHeading</label>
                                <input type="text" step="any"  class="form-control" name="quick_ratio_fy_one_ratio_heading_graph"  id="quick_ratio_fy_one_ratio_heading_graph" value="{{$Financial->quick_ratio_fy_one_ratio_heading_graph}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="current_ratio_fy_one_ratio_heading_graph" class="form-label">Current ratio GraphHeading</label>
                                <input type="text" step="any"  class="form-control" name="current_ratio_fy_one_ratio_heading_graph"  id="current_ratio_fy_one_ratio_heading_graph" value="{{$Financial->current_ratio_fy_one_ratio_heading_graph}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="debt_ratio_fy_one_ratio_heading_graph" class="form-label">Debt Ratio GraphHeading</label>
                                <input type="text" step="any"  class="form-control" name="debt_ratio_fy_one_ratio_heading_graph"  id="debt_ratio_fy_one_ratio_heading_graph" value="{{$Financial->debt_ratio_fy_one_ratio_heading_graph}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="solvency_ratio_fy_one_ratio_heading_graph" class="form-label">Solvency Ratio GraphHeading</label>
                                <input type="text" step="any"  class="form-control" name="solvency_ratio_fy_one_ratio_heading_graph"  id="solvency_ratio_fy_one_ratio_heading_graph" value="{{$Financial->solvency_ratio_fy_one_ratio_heading_graph}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="debt_to_equity_ratio_fy_one_ratio_heading_graph" class="form-label">Debt to Equity Ratio GraphHeading</label>
                                <input type="text" step="any"  class="form-control" name="debt_to_equity_ratio_fy_one_ratio_heading_graph"  id="debt_to_equity_ratio_fy_one_ratio_heading_graph" value="{{$Financial->debt_to_equity_ratio_fy_one_ratio_heading_graph}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="asset_turnover_ratio_fy_one_ratio_heading_graph" class="form-label">Asset Turnover Ratio GraphHeading</label>
                                <input type="text" step="any"  class="form-control" name="asset_turnover_ratio_fy_one_ratio_heading_graph"  id="asset_turnover_ratio_fy_one_ratio_heading_graph" value="{{$Financial->asset_turnover_ratio_fy_one_ratio_heading_graph}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="absolute_liquidity_ratio_fy_one_ratio_heading_graph" class="form-label">Absolute Liquidity Ratio GraphHeading</label>
                                <input type="text" step="any"  class="form-control" name="absolute_liquidity_ratio_fy_one_ratio_heading_graph"  id="absolute_liquidity_ratio_fy_one_ratio_heading_graph" value="{{$Financial->absolute_liquidity_ratio_fy_one_ratio_heading_graph}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="proprietary_ratio_fy_one_ratio_heading_graph" class="form-label">Proprietary Ratio GraphHeading</label>
                                <input type="text" step="any"  class="form-control" name="proprietary_ratio_fy_one_ratio_heading_graph"  id="proprietary_ratio_fy_one_ratio_heading_graph" value="{{$Financial->proprietary_ratio_fy_one_ratio_heading_graph}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="net_profit_ratio_fy_one_ratio_heading_graph" class="form-label">Net Profit Ratio GraphHeading</label>
                                <input type="text" step="any"  class="form-control" name="net_profit_ratio_fy_one_ratio_heading_graph"  id="net_profit_ratio_fy_one_ratio_heading_graph" value="{{$Financial->net_profit_ratio_fy_one_ratio_heading_graph}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="gross_profit_ratio_fy_one_ratio_heading_graph" class="form-label">Gross Profit Ratio GraphHeading</label>
                                <input type="text" step="any"  class="form-control" name="gross_profit_ratio_fy_one_ratio_heading_graph"  id="gross_profit_ratio_fy_one_ratio_heading_graph" value="{{$Financial->gross_profit_ratio_fy_one_ratio_heading_graph}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="springate_s_score_ratio_fy_one_ratio_heading_graph" class="form-label">Springate S Score GraphHeading</label>
                                <input type="text"  step="any" class="form-control" name="springate_s_score_ratio_fy_one_ratio_heading_graph"  id="springate_s_score_ratio_fy_one_ratio_heading_graph" value="{{$Financial->springate_s_score_ratio_fy_one_ratio_heading_graph}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="trade_receivable_days_ratio_fy_one_ratio_heading_graph" class="form-label">Trade Receivable Days GraphHeading</label>
                                <input type="text" step="any"  class="form-control" name="trade_receivable_days_ratio_fy_one_ratio_heading_graph"  id="trade_receivable_days_ratio_fy_one_ratio_heading_graph" value="{{$Financial->trade_receivable_days_ratio_fy_one_ratio_heading_graph}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="trade_payable_days_ratio_fy_one_ratio_heading_graph" class="form-label">Trade Payable Days GraphHeading</label>
                                <input type="text" step="any"  class="form-control" name="trade_payable_days_ratio_fy_one_ratio_heading_graph"  id="trade_payable_days_ratio_fy_one_ratio_heading_graph" value="{{$Financial->trade_payable_days_ratio_fy_one_ratio_heading_graph}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="taffler_z_score_ratio_fy_one_ratio_heading_graph" class="form-label">Taffler Z-Score GraphHeading</label>
                                <input type="text" step="any"  class="form-control" name="taffler_z_score_ratio_fy_one_ratio_heading_graph"  id="taffler_z_score_ratio_fy_one_ratio_heading_graph" value="{{$Financial->taffler_z_score_ratio_fy_one_ratio_heading_graph}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="zmijewski_x_score_ratio_fy_one_ratio_heading_graph" class="form-label">Zmijewski X-Score GraphHeading</label>
                                <input type="text" step="any"  class="form-control" name="zmijewski_x_score_ratio_fy_one_ratio_heading_graph"  id="zmijewski_x_score_ratio_fy_one_ratio_heading_graph" value="{{$Financial->zmijewski_x_score_ratio_fy_one_ratio_heading_graph}}" placeholder="">
                            </div>

                    </div>
                     <!-- graph ratio  graph heading end -->



                        <!-- Navigation buttons -->

                        <div class="row">
                            <div class="col-xl-6 d-flex justify-content-start">
                                <button type="button" class="btn btn report-tab-unactive" id="Financials-prev-7">Previous</button>
                            </div>
                            <div class="col-xl-6 d-flex justify-content-end">

                                <button type="button" class="btn btn report-tab-active" id="Financials-next-7">Next</button>
                            </div>
                        </div>

                </div>
                <!--Financials 7 step end ========================-->
                <!--Financials 8 step start ========================-->
                <div class="Financials-step" id="Financials-step-8">
                    <h4 class="card-title">Financials<br>
                        <span style="color:darkgray; font-size:12px;"> Ratio Analysis </span>
                        <ul class="nav nav-pills">
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="one_ratio_FY1_2" style="color:white;background-color:darkgray" aria-current="page" href="#">FY1</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="two_ratio_FY1_2" style="color:white;background-color:#1c9bf6" aria-current="page" href="#">FY2</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="three_ratio_FY1_2" style="color:white;background-color:darkgray" aria-current="page" href="#">FY3</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="four_ratio_FY1_2" style="color:white;background-color:darkgray" aria-current="page" href="#">FY4</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="five_ratio_FY1_2" style="color:white;background-color:darkgray" aria-current="page" href="#">FY5</a>
                            </li>
                        </ul>
                         <div class="row">
                                    <div class="col-xl-3 mb-3">
                                            <label class="form-label">Select Year<span class="text-danger">*</span></label>
                                            <select class="default-select style-1 form-control" id="year_ratio_two_1" name="year_ratio_two_1">
                                                <option data-display="Select" value="" disabled>
                                                    Select Year
                                                </option>
                                                    @forelse ($years as $year)
                                                    <option value="{{$year->year}}" {{$FinancialsRatioAnalysisFyTwo->year_ratio_two_1 ==$year->year ? 'selected' : '' }}>{{ $year->year  }}</option>
                                                    @empty
                                                    <p>No records found!</p>
                                                    @endforelse
                                            </select>

                                        </div>
                                        <div class="col-xl-3 mb-3">
                                        <label for="quick_ratio_fy_two_1" class="form-label">Quick Ratio </label>
                                        <input type="number" step="any"  class="form-control" name="quick_ratio_fy_two_1"  id="quick_ratio_fy_two_1" value="{{$FinancialsRatioAnalysisFyTwo->quick_ratio_fy_two_1}}" placeholder="">
                                    </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 mb-3">
                                <label for="current_ratio_fy_two_1" class="form-label">Current ratio</label>
                                <input type="number" step="any"  class="form-control" name="current_ratio_fy_two_1"  id="current_ratio_fy_two_1" value="{{$FinancialsRatioAnalysisFyTwo->current_ratio_fy_two_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="debt_ratio_fy_two_1" class="form-label">Debt Ratio</label>
                                <input type="number" step="any"  class="form-control" name="debt_ratio_fy_two_1"  id="debt_ratio_fy_two_1" value="{{$FinancialsRatioAnalysisFyTwo->debt_ratio_fy_two_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="solvency_ratio_fy_two_1" class="form-label">Solvency Ratio</label>
                                <input type="number" step="any"  class="form-control" name="solvency_ratio_fy_two_1"  id="solvency_ratio_fy_two_1" value="{{$FinancialsRatioAnalysisFyTwo->solvency_ratio_fy_two_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="debt_to_equity_ratio_fy_two_1" class="form-label">Debt to Equity Ratio</label>
                                <input type="number" step="any"  class="form-control" name="debt_to_equity_ratio_fy_two_1"  id="debt_to_equity_ratio_fy_two_1" value="{{$FinancialsRatioAnalysisFyTwo->debt_to_equity_ratio_fy_two_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="asset_turnover_ratio_fy_two_1" class="form-label">Asset Turnover Ratio</label>
                                <input type="number" step="any"  class="form-control" name="asset_turnover_ratio_fy_two_1"  id="asset_turnover_ratio_fy_two_1" value="{{$FinancialsRatioAnalysisFyTwo->asset_turnover_ratio_fy_two_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="absolute_liquidity_ratio_fy_two_1" class="form-label">Absolute Liquidity Ratio</label>
                                <input type="number" step="any"  class="form-control" name="absolute_liquidity_ratio_fy_two_1"  id="absolute_liquidity_ratio_fy_two_1" value="{{$FinancialsRatioAnalysisFyTwo->absolute_liquidity_ratio_fy_two_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="proprietary_ratio_fy_two_1" class="form-label">Proprietary Ratio</label>
                                <input type="number" step="any"  class="form-control" name="proprietary_ratio_fy_two_1"  id="proprietary_ratio_fy_two_1" value="{{$FinancialsRatioAnalysisFyTwo->proprietary_ratio_fy_two_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="net_profit_ratio_fy_two_1" class="form-label">Net Profit Ratio</label>
                                <input type="number" step="any"  class="form-control" name="net_profit_ratio_fy_two_1"  id="net_profit_ratio_fy_two_1" value="{{$FinancialsRatioAnalysisFyTwo->net_profit_ratio_fy_two_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="gross_profit_ratio_fy_two_1" class="form-label">Gross Profit Ratio</label>
                                <input type="number" step="any"  class="form-control" name="gross_profit_ratio_fy_two_1"  id="gross_profit_ratio_fy_two_1" value="{{$FinancialsRatioAnalysisFyTwo->gross_profit_ratio_fy_two_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="springate_s_score_ratio_fy_two_1" class="form-label">Springate S Score</label>
                                <input type="number"  step="any" class="form-control" name="springate_s_score_ratio_fy_two_1"  id="springate_s_score_ratio_fy_two_1" value="{{$FinancialsRatioAnalysisFyTwo->springate_s_score_ratio_fy_two_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="trade_receivable_days_ratio_fy_two_1" class="form-label">Trade Receivable Days</label>
                                <input type="number" step="any"  class="form-control" name="trade_receivable_days_ratio_fy_two_1"  id="trade_receivable_days_ratio_fy_two_1" value="{{$FinancialsRatioAnalysisFyTwo->trade_receivable_days_ratio_fy_two_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="trade_payable_days_ratio_fy_two_1" class="form-label">Trade Payable Days</label>
                                <input type="number" step="any"  class="form-control" name="trade_payable_days_ratio_fy_two_1"  id="trade_payable_days_ratio_fy_two_1" value="{{$FinancialsRatioAnalysisFyTwo->trade_payable_days_ratio_fy_two_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="taffler_z_score_ratio_fy_two_1" class="form-label">Taffler Z-Score</label>
                                <input type="number" step="any"  class="form-control" name="taffler_z_score_ratio_fy_two_1"  id="taffler_z_score_ratio_fy_two_1" value="{{$FinancialsRatioAnalysisFyTwo->taffler_z_score_ratio_fy_two_1}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="zmijewski_x_score_ratio_fy_two_1" class="form-label">Zmijewski X-Score</label>
                                <input type="number" step="any"  class="form-control" name="zmijewski_x_score_ratio_fy_two_1"  id="zmijewski_x_score_ratio_fy_two_1" value="{{$FinancialsRatioAnalysisFyTwo->zmijewski_x_score_ratio_fy_two_1}}" placeholder="">
                            </div>

                        </div>



                        <!-- Navigation buttons -->

                        <div class="row">
                            <div class="col-xl-6 d-flex justify-content-start">
                                <button type="button" class="btn btn report-tab-unactive" id="Financials-prev-8">Previous</button>
                            </div>
                            <div class="col-xl-6 d-flex justify-content-end">

                                <button type="button" class="btn btn report-tab-active" id="Financials-next-8">Next</button>
                            </div>
                        </div>

                </div>
                <!--Financials 8 step end ========================-->
                <!--Financials 9 step start ========================-->
                <div class="Financials-step" id="Financials-step-9">
                    <h4 class="card-title">Financials<br>
                        <span style="color:darkgray; font-size:12px;"> Ratio Analysis </span>
                        <ul class="nav nav-pills">
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="one_ratio_FY1_3" style="color:white;background-color:darkgray" aria-current="page" href="#">FY1</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="two_ratio_FY1_3" style="color:white;background-color:darkgray" aria-current="page" href="#">FY2</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="three_ratio_FY1_3" style="color:white;background-color:#1c9bf6" aria-current="page" href="#">FY3</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="four_ratio_FY1_3" style="color:white;background-color:darkgray" aria-current="page" href="#">FY4</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="five_ratio_FY1_3" style="color:white;background-color:darkgray" aria-current="page" href="#">FY5</a>
                            </li>
                        </ul>
                         <div class="row">
                            <div class="col-xl-3 mb-3">
                                    <label class="form-label">Select Year<span class="text-danger">*</span></label>
                                    <select class="default-select style-1 form-control" id="year_ratio_three_1" name="year_ratio_three_1">
                                        <option data-display="Select" value="" disabled>
                                            Select Year
                                        </option>
                                            @forelse ($years as $year)
                                            <option value="{{$year->year}}" {{$FinancialsRatioAnalysisFyThree->year_ratio_three_1 ==$year->year ? 'selected' : '' }}>{{ $year->year  }}</option>
                                            @empty
                                            <p>No records found!</p>
                                            @endforelse
                                    </select>

                                </div>
                                <div class="col-xl-3 mb-3">
                                <label for="quick_ratio_fy_three_1" class="form-label">Quick Ratio </label>
                                <input type="number" step="any"  class="form-control" name="quick_ratio_fy_three_1"  id="quick_ratio_fy_three_1" value="{{$FinancialsRatioAnalysisFyThree->quick_ratio_fy_three_1}}" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 mb-3">
                                <label for="current_ratio_fy_three_1" class="form-label">Current ratio</label>
                                <input type="number" step="any"  class="form-control" name="current_ratio_fy_three_1" id="current_ratio_fy_three_1" value="{{$FinancialsRatioAnalysisFyThree->current_ratio_fy_three_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="debt_ratio_fy_three_1" class="form-label">Debt Ratio</label>
                                <input type="number" step="any"  class="form-control" name="debt_ratio_fy_three_1" id="debt_ratio_fy_three_1" value="{{$FinancialsRatioAnalysisFyThree->debt_ratio_fy_three_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="solvency_ratio_fy_three_1" class="form-label">Solvency Ratio</label>
                                <input type="number" step="any"  class="form-control" name="solvency_ratio_fy_three_1" id="solvency_ratio_fy_three_1" value="{{$FinancialsRatioAnalysisFyThree->solvency_ratio_fy_three_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="debt_to_equity_ratio_fy_three_1" class="form-label">Debt to Equity Ratio</label>
                                <input type="number" step="any"  class="form-control" name="debt_to_equity_ratio_fy_three_1" id="debt_to_equity_ratio_fy_three_1" value="{{$FinancialsRatioAnalysisFyThree->debt_to_equity_ratio_fy_three_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="asset_turnover_ratio_fy_three_1" class="form-label">Asset Turnover Ratio</label>
                                <input type="number" step="any"  class="form-control" name="asset_turnover_ratio_fy_three_1" id="asset_turnover_ratio_fy_three_1" value="{{$FinancialsRatioAnalysisFyThree->asset_turnover_ratio_fy_three_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="absolute_liquidity_ratio_fy_three_1" class="form-label">Absolute Liquidity Ratio</label>
                                <input type="number" step="any"  class="form-control" name="absolute_liquidity_ratio_fy_three_1" id="absolute_liquidity_ratio_fy_three_1" value="{{$FinancialsRatioAnalysisFyThree->absolute_liquidity_ratio_fy_three_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="proprietary_ratio_fy_three_1" class="form-label">Proprietary Ratio</label>
                                <input type="number" step="any"  class="form-control" name="proprietary_ratio_fy_three_1" id="proprietary_ratio_fy_three_1" value="{{$FinancialsRatioAnalysisFyThree->proprietary_ratio_fy_three_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="net_profit_ratio_fy_three_1" class="form-label">Net Profit Ratio</label>
                                <input type="number" step="any"  class="form-control" name="net_profit_ratio_fy_three_1" id="net_profit_ratio_fy_three_1" value="{{$FinancialsRatioAnalysisFyThree->net_profit_ratio_fy_three_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="gross_profit_ratio_fy_three_1" class="form-label">Gross Profit Ratio</label>
                                <input type="number" step="any"  class="form-control" name="gross_profit_ratio_fy_three_1" id="gross_profit_ratio_fy_three_1" value="{{$FinancialsRatioAnalysisFyThree->gross_profit_ratio_fy_three_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="springate_s_score_ratio_fy_three_1" class="form-label">Springate S Score</label>
                                <input type="number" step="any" class="form-control" name="springate_s_score_ratio_fy_three_1" id="springate_s_score_ratio_fy_three_1" value="{{$FinancialsRatioAnalysisFyThree->springate_s_score_ratio_fy_three_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="trade_receivable_days_ratio_fy_three_1" class="form-label">Trade Receivable Days</label>
                                <input type="number" step="any"  class="form-control" name="trade_receivable_days_ratio_fy_three_1" id="trade_receivable_days_ratio_fy_three_1" value="{{$FinancialsRatioAnalysisFyThree->trade_receivable_days_ratio_fy_three_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="trade_payable_days_ratio_fy_three_1" class="form-label">Trade Payable Days</label>
                                <input type="number" step="any"  class="form-control" name="trade_payable_days_ratio_fy_three_1" id="trade_payable_days_ratio_fy_three_1" value="{{$FinancialsRatioAnalysisFyThree->trade_payable_days_ratio_fy_three_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="taffler_z_score_ratio_fy_three_1" class="form-label">Taffler Z-Score</label>
                                <input type="number" step="any"  class="form-control" name="taffler_z_score_ratio_fy_three_1" id="taffler_z_score_ratio_fy_three_1" value="{{$FinancialsRatioAnalysisFyThree->taffler_z_score_ratio_fy_three_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="zmijewski_x_score_ratio_fy_three_1" class="form-label">Zmijewski X-Score</label>
                                <input type="number" step="any"  class="form-control" name="zmijewski_x_score_ratio_fy_three_1" id="zmijewski_x_score_ratio_fy_three_1" value="{{$FinancialsRatioAnalysisFyThree->zmijewski_x_score_ratio_fy_three_1}}" placeholder="">
                            </div>
                        </div>

                        <!-- Navigation buttons -->

                        <div class="row">
                            <div class="col-xl-6 d-flex justify-content-start">
                                <button type="button" class="btn btn report-tab-unactive" id="Financials-prev-9">Previous</button>
                            </div>
                            <div class="col-xl-6 d-flex justify-content-end">

                                <button type="button" class="btn btn report-tab-active" id="Financials-next-9">Next</button>
                            </div>
                        </div>

                </div>
                <!--Financials 9 step end ========================-->
                <!--Financials 10 step start ========================-->
                <div class="Financials-step" id="Financials-step-10">
                    <h4 class="card-title">Financials<br>
                        <span style="color:darkgray; font-size:12px;"> Ratio Analysis </span>
                        <ul class="nav nav-pills">
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="one_ratio_FY1_4" style="color:white;background-color:darkgray" aria-current="page" href="#">FY1</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="two_ratio_FY1_4" style="color:white;background-color:darkgray" aria-current="page" href="#">FY2</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="three_ratio_FY1_4" style="color:white;background-color:darkgray" aria-current="page" href="#">FY3</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="four_ratio_FY1_4" style="color:white;background-color:#1c9bf6" aria-current="page" href="#">FY4</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="five_ratio_FY1_4" style="color:white;background-color:darkgray" aria-current="page" href="#">FY5</a>
                            </li>
                        </ul>
                         <div class="row">

                            <div class="col-xl-3 mb-3">
                                    <label class="form-label">Select Year<span class="text-danger">*</span></label>
                                    <select class="default-select style-1 form-control" id="year_ratio_four_1" name="year_ratio_four_1">
                                        <option data-display="Select" value="" disabled>
                                            Select Year
                                        </option>
                                            @forelse ($years as $year)
                                            <option value="{{$year->year}}"{{$FinancialsRatioAnalysisFyFour->year_ratio_four_1 ==$year->year ? 'selected' : '' }}>{{ $year->year  }}</option>
                                            @empty
                                            <p>No records found!</p>
                                            @endforelse
                                    </select>

                                </div>
                                <div class="col-xl-3 mb-3">
                                <label for="quick_ratio_fy_four_1" class="form-label">Quick Ratio </label>
                                <input type="number" step="any"  class="form-control" name="quick_ratio_fy_four_1"  id="quick_ratio_fy_four_1" value="{{$FinancialsRatioAnalysisFyFour->quick_ratio_fy_four_1}}" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 mb-3">
                                <label for="current_ratio_fy_four_1" class="form-label">Current ratio</label>
                                <input type="number" step="any"  class="form-control" name="current_ratio_fy_four_1" id="current_ratio_fy_four_1" value="{{$FinancialsRatioAnalysisFyFour->current_ratio_fy_four_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="debt_ratio_fy_four_1" class="form-label">Debt Ratio</label>
                                <input type="number" step="any"  class="form-control" name="debt_ratio_fy_four_1" id="debt_ratio_fy_four_1" value="{{$FinancialsRatioAnalysisFyFour->debt_ratio_fy_four_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="solvency_ratio_fy_four_1" class="form-label">Solvency Ratio</label>
                                <input type="number" step="any"  class="form-control" name="solvency_ratio_fy_four_1" id="solvency_ratio_fy_four_1" value="{{$FinancialsRatioAnalysisFyFour->solvency_ratio_fy_four_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="debt_to_equity_ratio_fy_four_1" class="form-label">Debt to Equity Ratio</label>
                                <input type="number" step="any"  class="form-control" name="debt_to_equity_ratio_fy_four_1"  id="debt_to_equity_ratio_fy_four_1" value="{{$FinancialsRatioAnalysisFyFour->debt_to_equity_ratio_fy_four_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="asset_turnover_ratio_fy_four_1" class="form-label">Asset Turnover Ratio</label>
                                <input type="number" step="any"  class="form-control" name="asset_turnover_ratio_fy_four_1"  id="asset_turnover_ratio_fy_four_1" value="{{$FinancialsRatioAnalysisFyFour->asset_turnover_ratio_fy_four_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="absolute_liquidity_ratio_fy_four_1" class="form-label">Absolute Liquidity Ratio</label>
                                <input type="number" step="any"  class="form-control" name="absolute_liquidity_ratio_fy_four_1"  id="absolute_liquidity_ratio_fy_four_1" value="{{$FinancialsRatioAnalysisFyFour->absolute_liquidity_ratio_fy_four_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="proprietary_ratio_fy_four_1" class="form-label">Proprietary Ratio</label>
                                <input type="number" step="any"  class="form-control" name="proprietary_ratio_fy_four_1"  id="proprietary_ratio_fy_four_1" value="{{$FinancialsRatioAnalysisFyFour->proprietary_ratio_fy_four_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="net_profit_ratio_fy_four_1" class="form-label">Net Profit Ratio</label>
                                <input type="number" step="any"  class="form-control" name="net_profit_ratio_fy_four_1"  id="net_profit_ratio_fy_four_1" value="{{$FinancialsRatioAnalysisFyFour->net_profit_ratio_fy_four_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="gross_profit_ratio_fy_four_1" class="form-label">Gross Profit Ratio</label>
                                <input type="number" step="any"  class="form-control" name="gross_profit_ratio_fy_four_1"  id="gross_profit_ratio_fy_four_1" value="{{$FinancialsRatioAnalysisFyFour->gross_profit_ratio_fy_four_1}}" placeholder="">
                            </div>


                            <div class="col-xl-3 mb-3">
                                <label for="springate_s_score_ratio_fy_four_1" class="form-label">Springate S Score</label>
                                <input type="number" step="any" class="form-control" name="springate_s_score_ratio_fy_four_1"  id="springate_s_score_ratio_fy_four_1" value="{{$FinancialsRatioAnalysisFyFour->springate_s_score_ratio_fy_four_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="trade_receivable_days_ratio_fy_four_1" class="form-label">Trade Receivable Days</label>
                                <input type="number" step="any"  class="form-control" name="trade_receivable_days_ratio_fy_four_1"  id="trade_receivable_days_ratio_fy_four_1" value="{{$FinancialsRatioAnalysisFyFour->trade_receivable_days_ratio_fy_four_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="trade_payable_days_ratio_fy_four_1" class="form-label">Trade Payable Days</label>
                                <input type="number" step="any"  class="form-control" name="trade_payable_days_ratio_fy_four_1"  id="trade_payable_days_ratio_fy_four_1" value="{{$FinancialsRatioAnalysisFyFour->trade_payable_days_ratio_fy_four_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="taffler_z_score_ratio_fy_four_1" class="form-label">Taffler Z-Score</label>
                                <input type="number" step="any"  class="form-control" name="taffler_z_score_ratio_fy_four_1"  id="taffler_z_score_ratio_fy_four_1" value="{{$FinancialsRatioAnalysisFyFour->taffler_z_score_ratio_fy_four_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="zmijewski_x_score_ratio_fy_four_1" class="form-label">Zmijewski X-Score</label>
                                <input type="number" step="any"  class="form-control" name="zmijewski_x_score_ratio_fy_four_1"  id="zmijewski_x_score_ratio_fy_four_1" value="{{$FinancialsRatioAnalysisFyFour->zmijewski_x_score_ratio_fy_four_1}}" placeholder="">
                            </div>
                        </div>

                        <!-- Navigation buttons -->

                        <div class="row">
                            <div class="col-xl-6 d-flex justify-content-start">
                                <button type="button" class="btn btn report-tab-unactive" id="Financials-prev-10">Previous</button>
                            </div>
                            <div class="col-xl-6 d-flex justify-content-end">

                                <button type="button" class="btn btn report-tab-active" id="Financials-next-10">Next</button>
                            </div>
                        </div>

                </div>
                <!--Financials 10 step end ========================-->
                <!--Financials 11 step start ========================-->
                <div class="Financials-step" id="Financials-step-11">
                    <h4 class="card-title">Financials<br>
                        <span style="color:darkgray; font-size:12px;"> Ratio Analysis </span>
                        <ul class="nav nav-pills">
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="one_ratio_FY1_5"  style="color:white;background-color:darkgray" aria-current="page" href="#">FY1</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="two_ratio_FY1_5" style="color:white;background-color:darkgray" aria-current="page" href="#">FY2</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="three_ratio_FY1_5" style="color:white;background-color:darkgray" aria-current="page" href="#">FY3</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="four_ratio_FY1_5" style="color:white;background-color:darkgray" aria-current="page" href="#">FY4</a>
                            </li>
                            <li class="nav-item mb-2 mr-1 p-2">
                                <a class="nav-link" id="five_ratio_FY1_5" style="color:white;background-color:#1c9bf6" aria-current="page" href="#">FY5</a>
                            </li>
                        </ul>
                         <div class="row">
                            <div class="col-xl-3 mb-3">
                                    <label class="form-label">Select Year<span class="text-danger">*</span></label>
                                    <select class="default-select style-1 form-control" id="year_ratio_five_1" name="year_ratio_five_1">
                                        <option data-display="Select" value="" disabled>
                                            Select Year
                                        </option>
                                            @forelse ($years as $year)
                                            <option value="{{$year->year}}" {{$FinancialsRatioAnalysisFyFive->year_ratio_five_1 ==$year->year ? 'selected' : '' }}>{{ $year->year  }}</option>
                                            @empty
                                            <p>No records found!</p>
                                            @endforelse
                                    </select>

                                </div>
                                <div class="col-xl-3 mb-3">
                                <label for="quick_ratio_fy_five_1" class="form-label">Quick Ratio </label>
                                <input type="number" step="any"  class="form-control" name="quick_ratio_fy_five_1"  id="quick_ratio_fy_five_1" value="{{$FinancialsRatioAnalysisFyFive->quick_ratio_fy_five_1}}" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 mb-3">
                                <label for="current_ratio_fy_five_1" class="form-label">Current ratio</label>
                                <input type="number" step="any"  class="form-control" name="current_ratio_fy_five_1" id="current_ratio_fy_five_1" value="{{$FinancialsRatioAnalysisFyFive->current_ratio_fy_five_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="debt_ratio_fy_five_1" class="form-label">Debt Ratio</label>
                                <input type="number" step="any"  class="form-control" name="debt_ratio_fy_five_1" id="debt_ratio_fy_five_1" value="{{$FinancialsRatioAnalysisFyFive->debt_ratio_fy_five_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="solvency_ratio_fy_five_1" class="form-label">Solvency Ratio</label>
                                <input type="number" step="any"  class="form-control" name="solvency_ratio_fy_five_1" id="solvency_ratio_fy_five_1" value="{{$FinancialsRatioAnalysisFyFive->solvency_ratio_fy_five_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="debt_to_equity_ratio_fy_five_1" class="form-label">Debt to Equity Ratio</label>
                                <input type="number" step="any"  class="form-control" name="debt_to_equity_ratio_fy_five_1"  id="debt_to_equity_ratio_fy_five_1" value="{{$FinancialsRatioAnalysisFyFive->debt_to_equity_ratio_fy_five_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="asset_turnover_ratio_fy_five_1" class="form-label">Asset Turnover Ratio</label>
                                <input type="number" step="any"  class="form-control" name="asset_turnover_ratio_fy_five_1"  id="asset_turnover_ratio_fy_five_1" value="{{$FinancialsRatioAnalysisFyFive->asset_turnover_ratio_fy_five_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="absolute_liquidity_ratio_fy_five_1" class="form-label">Absolute Liquidity Ratio</label>
                                <input type="number" step="any"  class="form-control" name="absolute_liquidity_ratio_fy_five_1"  id="absolute_liquidity_ratio_fy_five_1" value="{{$FinancialsRatioAnalysisFyFive->absolute_liquidity_ratio_fy_five_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="proprietary_ratio_fy_five_1" class="form-label">Proprietary Ratio</label>
                                <input type="number" step="any"  class="form-control" name="proprietary_ratio_fy_five_1"  id="proprietary_ratio_fy_five_1" value="{{$FinancialsRatioAnalysisFyFive->proprietary_ratio_fy_five_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="net_profit_ratio_fy_five_1" class="form-label">Net Profit Ratio</label>
                                <input type="number" step="any"  class="form-control" name="net_profit_ratio_fy_five_1"  id="net_profit_ratio_fy_five_1" value="{{$FinancialsRatioAnalysisFyFive->net_profit_ratio_fy_five_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="gross_profit_ratio_fy_five_1" class="form-label">Gross Profit Ratio</label>
                                <input type="number" step="any"  class="form-control" name="gross_profit_ratio_fy_five_1"  id="gross_profit_ratio_fy_five_1" value="{{$FinancialsRatioAnalysisFyFive->gross_profit_ratio_fy_five_1}}" placeholder="">
                            </div>


                            <div class="col-xl-3 mb-3">
                                <label for="springate_s_score_ratio_fy_five_1" class="form-label">Springate S Score</label>
                                <input type="number" step="any" class="form-control" name="springate_s_score_ratio_fy_five_1"  id="springate_s_score_ratio_fy_five_1" value="{{$FinancialsRatioAnalysisFyFive->springate_s_score_ratio_fy_five_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="trade_receivable_days_ratio_fy_five_1" class="form-label">Trade Receivable Days</label>
                                <input type="number" step="any"  class="form-control" name="trade_receivable_days_ratio_fy_five_1"  id="trade_receivable_days_ratio_fy_five_1" value="{{$FinancialsRatioAnalysisFyFive->trade_receivable_days_ratio_fy_five_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="trade_payable_days_ratio_fy_five_1" class="form-label">Trade Payable Days</label>
                                <input type="number" step="any"  class="form-control" name="trade_payable_days_ratio_fy_five_1"  id="trade_payable_days_ratio_fy_five_1" value="{{$FinancialsRatioAnalysisFyFive->trade_payable_days_ratio_fy_five_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="taffler_z_score_ratio_fy_five_1" class="form-label">Taffler Z-Score</label>
                                <input type="number" step="any"  class="form-control" name="taffler_z_score_ratio_fy_five_1"  id="taffler_z_score_ratio_fy_five_1" value="{{$FinancialsRatioAnalysisFyFive->taffler_z_score_ratio_fy_five_1}}" placeholder="">
                            </div>

                            <div class="col-xl-3 mb-3">
                                <label for="zmijewski_x_score_ratio_fy_five_1" class="form-label">Zmijewski X-Score</label>
                                <input type="number" step="any"  class="form-control" name="zmijewski_x_score_ratio_fy_five_1"  id="zmijewski_x_score_ratio_fy_five_1" value="{{$FinancialsRatioAnalysisFyFive->zmijewski_x_score_ratio_fy_five_1}}" placeholder="">
                            </div>
                        </div>

                        <!-- Navigation buttons -->

                        <div class="row">
                            <div class="col-xl-6 d-flex justify-content-start">
                                <button type="button" class="btn btn report-tab-unactive" id="Financials-prev-11">Previous</button>
                            </div>
                            <div class="col-xl-6 d-flex justify-content-end">

                                <button type="submit" class="btn btn report-tab-active" id="Financials-submit">Submit</button>
                            </div>
                        </div>

                </div>
                <!--Financials 11 step end ========================-->
                <!-- Financials part 2 FY1 to FY5 end -->


            </form>
        </div>
    </div>
</div>

<!-- Financials form end -->


<!-- Business Intelligence start -->

<div class="row" id="Business-Intelligence">
    <div class="card">
        <div class="card-header justify-content-start">
            <h4 class="card-title">Business Intelligence
            </h4>

        </div>
        <div class="card-body justify-content-start">
            <form id="Business-Intelligence-step-form" enctype="multipart/form-data">
                <!--BusinessIntelligence FY1 step start ========================-->
                <div class="BusinessIntelligence-step" id="BusinessIntelligence-step-1">

                <input type="hidden" name="getThirdPartyForID" id="getThirdPartyForID" class="form-control" value="{{$getThirdPartyForID->id}}">

                    <h4 class="card-title">Business Intelligence<br>
                    <span style="color:darkgray; font-size:12px;"> FY-1</span>
                    <ul class="nav nav-pills">
                        <li class="nav-item mb-2 mr-1 p-2">
                            <a class="nav-link" id="one_BI_FY1"  style="color:white;background-color:#1c9bf6" aria-current="page" href="#">FY1</a>
                        </li>
                        <li class="nav-item mb-2 mr-1 p-2">
                            <a class="nav-link" id="two_BI_FY1" style="color:white;background-color:darkgray" aria-current="page" href="#">FY2</a>
                        </li>
                        <li class="nav-item mb-2 mr-1 p-2">
                            <a class="nav-link" id="three_BI_FY1" style="color:white;background-color:darkgray" aria-current="page" href="#">FY3</a>
                        </li>
                        <li class="nav-item mb-2 mr-1 p-2">
                            <a class="nav-link" id="four_BI_FY1" style="color:white;background-color:darkgray" aria-current="page" href="#">FY4</a>
                        </li>
                        <li class="nav-item mb-2 mr-1 p-2">
                            <a class="nav-link" id="five_BI_FY1" style="color:white;background-color:darkgray" aria-current="page" href="#">FY5</a>
                        </li>
                    </ul>

                    <div class="row">


                         <input type="hidden" name="BusinessIntelligenceID" id="BusinessIntelligenceID" class="form-control" value="{{$BusinessIntelligence->id}}">


                        <div class="col-xl-3 mb-3">
                            <label class="form-label">Select Year<span class="text-danger">*</span></label>
                            <select class="default-select style-1 form-control" id="year_BI_FY_one" name="year_BI_FY_one">
                                <option data-display="Select" value="" disabled>
                                    Select Year
                                </option>
                                    @forelse ($years as $year)
                                    <option value="{{$year->year}}" {{$BusinessIntelligence->year_BI_FY_one ==$year->year ? 'selected' : '' }}>{{ $year->year}}</option>
                                    @empty
                                    <p>No records found!</p>
                                    @endforelse
                            </select>

                        </div>
                    </div>
                    <div class="row">
                    <div class="col-xl-3 mb-3">
                    <label for="operating_efficiency_BI_FY_one" class="form-label">Operating Efficiency ratio</label>
                    <input  type="number" step="any"  class="form-control" name="operating_efficiency_BI_FY_one" id="operating_efficiency_BI_FY_one" value="{{$BusinessIntelligence->operating_efficiency_BI_FY_one}}" placeholder="">
                    </div>

                    <div class="col-xl-3 mb-3">
                    <label for="operating_efficiency_BI_analysis" class="form-label">Analysis</label>
                    <input type="text" class="form-control" name="operating_efficiency_BI_analysis" id="operating_efficiency_BI_analysis" value="{{$BusinessIntelligence->operating_efficiency_BI_analysis}}" placeholder="">
                    </div>

                    <div class="col-xl-3 mb-3">
                    <label for="inventory_turnover_BI_FY_one" class="form-label">Inventory Turnover Ratio</label>
                    <input  type="number" step="any"  class="form-control" name="inventory_turnover_BI_FY_one" id="inventory_turnover_BI_FY_one" value="{{$BusinessIntelligence->inventory_turnover_BI_FY_one}}" placeholder="">
                    </div>

                    <div class="col-xl-3 mb-3">
                    <label for="inventory_turnover_BI_analysis" class="form-label">Analysis</label>
                    <input type="text" class="form-control" name="inventory_turnover_BI_analysis"  id="inventory_turnover_BI_analysis" value="{{$BusinessIntelligence->inventory_turnover_BI_analysis}}" placeholder="">
                    </div>

                    <div class="col-xl-3 mb-3">
                    <label for="days_sales_in_inventory_BI_FY_one" class="form-label">Days sales in Inventory</label>
                    <input  type="number" step="any"  class="form-control" name="days_sales_in_inventory_BI_FY_one"  id="days_sales_in_inventory_BI_FY_one" value="{{$BusinessIntelligence->days_sales_in_inventory_BI_FY_one}}" placeholder="">
                    </div>
                    <div class="col-xl-3 mb-3">
                    <label for="days_sales_in_inventory_BI_analysis" class="form-label">Analysis</label>
                    <input type="text" class="form-control" name="days_sales_in_inventory_BI_analysis"  id="days_sales_in_inventory_BI_analysis" value="{{$BusinessIntelligence->days_sales_in_inventory_BI_analysis}}" placeholder="">
                    </div>


                    <div class="col-xl-3 mb-3">
                    <label for="accounts_payable_turnover_BI_FY_one" class="form-label">Accounts Payable Turnover Ratio</label>
                    <input type="number" step="any"   class="form-control" name="accounts_payable_turnover_BI_FY_one"  id="accounts_payable_turnover_BI_FY_one" value="{{$BusinessIntelligence->accounts_payable_turnover_BI_FY_one}}" placeholder="">
                    </div>

                    <div class="col-xl-3 mb-3">
                    <label for="accounts_payable_turnover_BI_analysis" class="form-label">Analysis</label>
                    <input type="text" class="form-control" name="accounts_payable_turnover_BI_analysis"  id="accounts_payable_turnover_BI_analysis" value="{{$BusinessIntelligence->accounts_payable_turnover_BI_analysis}}" placeholder="">
                    </div>

                    <div class="col-xl-3 mb-3">
                    <label for="efficiency_score" class="form-label">Efficiency Score</label>
                    <input type="number" step="any" class="form-control" name="efficiency_score"  id="efficiency_score" value="{{$BusinessIntelligence->efficiency_score}}" placeholder="">
                    </div>


                    <div class="col-xl-3 mb-3">
                    <label for="score_analysis" class="form-label">Score Analysis</label>
                    <input type="text"   class="form-control" name="score_analysis"  id="score_analysis" value="{{$BusinessIntelligence->score_analysis}}" placeholder="">
                    </div>



                    </div>
                    <div class="row">
                        <div class="col-xl-3 mb-3">
                            <label for="operating_efficiency_BI_heading_graph" class="form-label">Operating Efficiency Graph Heading</label>
                            <input type="text"   class="form-control" name="operating_efficiency_BI_heading_graph"  id="operating_efficiency_BI_heading_graph" value="{{$BusinessIntelligence->operating_efficiency_BI_heading_graph}}" placeholder="">
                        </div>
                        <div class="col-xl-3 mb-3">
                            <label for="inventory_turnover_BI_heading_graph" class="form-label">Inventory Turnover Graph Heading</label>
                            <input type="text"   class="form-control" name="inventory_turnover_BI_heading_graph"  id="inventory_turnover_BI_heading_graph" value="{{$BusinessIntelligence->inventory_turnover_BI_heading_graph}}" placeholder="">
                        </div>
                        <div class="col-xl-3 mb-3">
                            <label for="days_sales_in_inventory_BI_heading_graph" class="form-label">Days Sales In Inventory Graph Heading</label>
                            <input type="text"   class="form-control" name="days_sales_in_inventory_BI_heading_graph"  id="days_sales_in_inventory_BI_heading_graph" value="{{$BusinessIntelligence->days_sales_in_inventory_BI_heading_graph}}" placeholder="">
                        </div>
                        <div class="col-xl-3 mb-3">
                            <label for="accounts_payable_turnover_BI_heading_graph" class="form-label">Accounts Payable Turnover Graph Heading</label>
                            <input type="text"   class="form-control" name="accounts_payable_turnover_BI_heading_graph"  id="accounts_payable_turnover_BI_heading_graph" value="{{$BusinessIntelligence->accounts_payable_turnover_BI_heading_graph}}" placeholder="">
                        </div>
                    </div>


                            <!-- Navigation buttons -->

                        <div class="row">
                            <div class="col-xl-6 d-flex justify-content-start">
                                <!-- <button type="button" class="btn btn report-tab-unactive" id="BusinessIntelligence-prev-8">Previous</button> -->
                            </div>
                            <div class="col-xl-6 d-flex justify-content-end">

                                <button type="button" class="btn btn report-tab-active" id="BusinessIntelligence-next-1">Next</button>
                            </div>
                        </div>


                </div>
                <!--BusinessIntelligence FY1 step end ========================-->

                <!--BusinessIntelligence FY2 step start ========================-->
                <div class="BusinessIntelligence-step" id="BusinessIntelligence-step-2">
                  <h4 class="card-title">Business Intelligence<br>
                    <span style="color:darkgray; font-size:12px;"> FY-2</span>
                    <ul class="nav nav-pills">
                        <li class="nav-item mb-2 mr-1 p-2">
                            <a class="nav-link" id="one_BI_FY1_2"  style="color:white;background-color:darkgray" aria-current="page" href="#">FY1</a>
                        </li>
                        <li class="nav-item mb-2 mr-1 p-2">
                            <a class="nav-link" id="two_BI_FY1_2" style="color:white;background-color:#1c9bf6" aria-current="page" href="#">FY2</a>
                        </li>
                        <li class="nav-item mb-2 mr-1 p-2">
                            <a class="nav-link" id="three_BI_FY1_2" style="color:white;background-color:darkgray" aria-current="page" href="#">FY3</a>
                        </li>
                        <li class="nav-item mb-2 mr-1 p-2">
                            <a class="nav-link" id="four_BI_FY1_2" style="color:white;background-color:darkgray" aria-current="page" href="#">FY4</a>
                        </li>
                        <li class="nav-item mb-2 mr-1 p-2">
                            <a class="nav-link" id="five_BI_FY1_2" style="color:white;background-color:darkgray" aria-current="page" href="#">FY5</a>
                        </li>
                    </ul>

                    <div class="row">

                    <div class="col-xl-3 mb-3">
                                    <label class="form-label">Select Year<span class="text-danger">*</span></label>
                                    <select class="default-select style-1 form-control" id="year_BI_FY_two" name="year_BI_FY_two">
                                <option data-display="Select" value="" disabled>
                                    Select Year
                                </option>
                                    @forelse ($years as $year)
                                    <option value="{{$year->year}}" {{$BusinessIntelligence->year_BI_FY_two ==$year->year ? 'selected' : '' }}>{{ $year->year}}</option>
                                    @empty
                                    <p>No records found!</p>
                                    @endforelse
                            </select>

                                </div>
                        <div class="col-xl-3 mb-3">
                            <label for="operating_efficiency_BI_FY_two" class="form-label">Operating Efficiency ratio</label>
                            <input type="number" step="any"  class="form-control" name="operating_efficiency_BI_FY_two" id="operating_efficiency_BI_FY_two" value="{{$BusinessIntelligence->operating_efficiency_BI_FY_two}}" placeholder="">
                        </div>



                        <div class="col-xl-3 mb-3">
                            <label for="inventory_turnover_BI_FY_two" class="form-label">Inventory Turnover Ratio</label>
                            <input type="number" step="any"  class="form-control" name="inventory_turnover_BI_FY_two" id="inventory_turnover_BI_FY_two" value="{{$BusinessIntelligence->inventory_turnover_BI_FY_two}}" placeholder="">
                        </div>



                        <div class="col-xl-3 mb-3">
                            <label for="days_sales_in_inventory_BI_FY_two" class="form-label">Days sales in Inventory</label>
                            <input type="number" step="any"  class="form-control" name="days_sales_in_inventory_BI_FY_two"  id="days_sales_in_inventory_BI_FY_two" value="{{$BusinessIntelligence->days_sales_in_inventory_BI_FY_two}}" placeholder="">
                        </div>



                        <div class="col-xl-3 mb-3">
                            <label for="accounts_payable_turnover_BI_FY_two" class="form-label">Accounts Payable Turnover Ratio</label>
                            <input type="number" step="any"  class="form-control" name="accounts_payable_turnover_BI_FY_two"  id="accounts_payable_turnover_BI_FY_two" value="{{$BusinessIntelligence->accounts_payable_turnover_BI_FY_two}}" placeholder="">
                        </div>


                    </div>


                        <div class="row">
                            <div class="col-xl-6 d-flex justify-content-start">
                                <button type="button" class="btn btn report-tab-unactive" id="BusinessIntelligence-prev-2">Previous</button>
                            </div>
                            <div class="col-xl-6 d-flex justify-content-end">

                                <button type="button" class="btn btn report-tab-active" id="BusinessIntelligence-next-2">Next</button>
                            </div>
                        </div>

                </div>
                  <!--BusinessIntelligence FY2 step end ========================-->

                <!--BusinessIntelligence FY3 step start ========================-->
                <div class="BusinessIntelligence-step" id="BusinessIntelligence-step-3">

                 <h4 class="card-title">Business Intelligence<br>
                    <span style="color:darkgray; font-size:12px;"> FY-3</span>
                    <ul class="nav nav-pills">
                        <li class="nav-item mb-2 mr-1 p-2">
                            <a class="nav-link" id="one_BI_FY1_3"  style="color:white;background-color:darkgray" aria-current="page" href="#">FY1</a>
                        </li>
                        <li class="nav-item mb-2 mr-1 p-2">
                            <a class="nav-link" id="two_BI_FY1_3" style="color:white;background-color:darkgray" aria-current="page" href="#">FY2</a>
                        </li>
                        <li class="nav-item mb-2 mr-1 p-2">
                            <a class="nav-link" id="three_BI_FY1_3" style="color:white;background-color:#1c9bf6" aria-current="page" href="#">FY3</a>
                        </li>
                        <li class="nav-item mb-2 mr-1 p-2">
                            <a class="nav-link" id="four_BI_FY1_3" style="color:white;background-color:darkgray" aria-current="page" href="#">FY4</a>
                        </li>
                        <li class="nav-item mb-2 mr-1 p-2">
                            <a class="nav-link" id="five_BI_FY1_3" style="color:white;background-color:darkgray" aria-current="page" href="#">FY5</a>
                        </li>
                    </ul>

                    <div class="row">

                                 <div class="col-xl-3 mb-3">
                                    <label class="form-label">Select Year<span class="text-danger">*</span></label>
                                    <select class="default-select style-1 form-control" id="year_BI_FY_three" name="year_BI_FY_three">
                                <option data-display="Select" value="" disabled>
                                    Select Year
                                </option>
                                    @forelse ($years as $year)
                                    <option value="{{$year->year}}" {{$BusinessIntelligence->year_BI_FY_three ==$year->year ? 'selected' : '' }}>{{ $year->year}}</option>
                                    @empty
                                    <p>No records found!</p>
                                    @endforelse
                            </select>

                                </div>
                                <div class="col-xl-3 mb-3">
                            <label for="operating_efficiency_BI_FY_three" class="form-label">Operating Efficiency ratio</label>
                            <input type="number" step="any"  class="form-control" name="operating_efficiency_BI_FY_three" id="operating_efficiency_BI_FY_three" value="{{$BusinessIntelligence->operating_efficiency_BI_FY_three}}" placeholder="">
                        </div>



                        <div class="col-xl-3 mb-3">
                            <label for="inventory_turnover_BI_FY_three" class="form-label">Inventory Turnover Ratio</label>
                            <input type="number" step="any"  class="form-control" name="inventory_turnover_BI_FY_three" id="inventory_turnover_BI_FY_three" value="{{$BusinessIntelligence->inventory_turnover_BI_FY_three}}" placeholder="">
                        </div>



                        <div class="col-xl-3 mb-3">
                            <label for="days_sales_in_inventory_BI_FY_three" class="form-label">Days sales in Inventory</label>
                            <input type="number" step="any"  class="form-control" name="days_sales_in_inventory_BI_FY_three"  id="days_sales_in_inventory_BI_FY_three" value="{{$BusinessIntelligence->days_sales_in_inventory_BI_FY_three}}" placeholder="">
                        </div>



                        <div class="col-xl-3 mb-3">
                            <label for="accounts_payable_turnover_BI_FY_three" class="form-label">Accounts Payable Turnover Ratio</label>
                            <input type="number" step="any"  class="form-control" name="accounts_payable_turnover_BI_FY_three"  id="accounts_payable_turnover_BI_FY_three" value="{{$BusinessIntelligence->accounts_payable_turnover_BI_FY_three}}" placeholder="">
                        </div>


                    </div>

                        <div class="row">
                            <div class="col-xl-6 d-flex justify-content-start">
                                <button type="button" class="btn btn report-tab-unactive" id="BusinessIntelligence-prev-3">Previous</button>
                            </div>
                            <div class="col-xl-6 d-flex justify-content-end">

                                <button type="button" class="btn btn report-tab-active" id="BusinessIntelligence-next-3">Next</button>
                            </div>
                        </div>

                </div>
                <!--BusinessIntelligence FY3 step end ========================-->
                <!--BusinessIntelligence FY4 step start ========================-->
                <div class="BusinessIntelligence-step" id="BusinessIntelligence-step-4">

                     <h4 class="card-title">Business Intelligence<br>
                    <span style="color:darkgray; font-size:12px;"> FY-4</span>
                    <ul class="nav nav-pills">
                        <li class="nav-item mb-2 mr-1 p-2">
                            <a class="nav-link" id="one_BI_FY1_4"  style="color:white;background-color:darkgray" aria-current="page" href="#">FY1</a>
                        </li>
                        <li class="nav-item mb-2 mr-1 p-2">
                            <a class="nav-link" id="two_BI_FY1_4" style="color:white;background-color:darkgray" aria-current="page" href="#">FY2</a>
                        </li>
                        <li class="nav-item mb-2 mr-1 p-2">
                            <a class="nav-link" id="three_BI_FY1_4" style="color:white;background-color:darkgray" aria-current="page" href="#">FY3</a>
                        </li>
                        <li class="nav-item mb-2 mr-1 p-2">
                            <a class="nav-link" id="four_BI_FY1_4" style="color:white;background-color:#1c9bf6" aria-current="page" href="#">FY4</a>
                        </li>
                        <li class="nav-item mb-2 mr-1 p-2">
                            <a class="nav-link" id="five_BI_FY1_4" style="color:white;background-color:darkgray" aria-current="page" href="#">FY5</a>
                        </li>
                    </ul>

                    <div class="row">

                                <div class="col-xl-3 mb-3">
                                    <label class="form-label">Select Year<span class="text-danger">*</span></label>
                                    <select class="default-select style-1 form-control" id="year_BI_FY_four" name="year_BI_FY_four">
                                <option data-display="Select" value="" disabled>
                                    Select Year
                                </option>
                                    @forelse ($years as $year)
                                    <option value="{{$year->year}}" {{$BusinessIntelligence->year_BI_FY_four ==$year->year ? 'selected' : '' }}>{{ $year->year}}</option>
                                    @empty
                                    <p>No records found!</p>
                                    @endforelse
                            </select>

                                </div>
                                <div class="col-xl-3 mb-3">
                            <label for="operating_efficiency_BI_FY_four" class="form-label">Operating Efficiency ratio</label>
                            <input type="number" step="any"  class="form-control" name="operating_efficiency_BI_FY_four" id="operating_efficiency_BI_FY_four" value="{{$BusinessIntelligence->operating_efficiency_BI_FY_four}}" placeholder="">
                        </div>



                        <div class="col-xl-3 mb-3">
                            <label for="inventory_turnover_BI_FY_four" class="form-label">Inventory Turnover Ratio</label>
                            <input type="number" step="any"  class="form-control" name="inventory_turnover_BI_FY_four" id="inventory_turnover_BI_FY_four" value="{{$BusinessIntelligence->inventory_turnover_BI_FY_four}}" placeholder="">
                        </div>



                        <div class="col-xl-3 mb-3">
                            <label for="days_sales_in_inventory_BI_FY_four" class="form-label">Days sales in Inventory</label>
                            <input type="number" step="any"  class="form-control" name="days_sales_in_inventory_BI_FY_four"  id="days_sales_in_inventory_BI_FY_four" value="{{$BusinessIntelligence->days_sales_in_inventory_BI_FY_four}}" placeholder="">
                        </div>



                        <div class="col-xl-3 mb-3">
                            <label for="accounts_payable_turnover_BI_FY_four" class="form-label">Accounts Payable Turnover Ratio</label>
                            <input type="number" step="any"  class="form-control" name="accounts_payable_turnover_BI_FY_four"  id="accounts_payable_turnover_BI_FY_four" value="{{$BusinessIntelligence->accounts_payable_turnover_BI_FY_four}}" placeholder="">
                        </div>



                    </div>




                            <!-- Navigation buttons -->

                        <div class="row">
                            <div class="col-xl-6 d-flex justify-content-start">
                                <button type="button" class="btn btn report-tab-unactive" id="BusinessIntelligence-prev-4">Previous</button>
                            </div>
                            <div class="col-xl-6 d-flex justify-content-end">

                                <button type="button" class="btn btn report-tab-active" id="BusinessIntelligence-next-4">Next</button>
                            </div>
                        </div>

                </div>
                <!--BusinessIntelligence FY3 step end ========================-->
                <!--BusinessIntelligence FY3 step start ========================-->
                <div class="BusinessIntelligence-step" id="BusinessIntelligence-step-5">
                    <h4 class="card-title">Business Intelligence<br>
                    <span style="color:darkgray; font-size:12px;"> FY-5</span>
                    <ul class="nav nav-pills">
                        <li class="nav-item mb-2 mr-1 p-2">
                            <a class="nav-link" id="one_BI_FY1_5"  style="color:white;background-color:darkgray" aria-current="page" href="#">FY1</a>
                        </li>
                        <li class="nav-item mb-2 mr-1 p-2">
                            <a class="nav-link" id="two_BI_FY1_5" style="color:white;background-color:darkgray" aria-current="page" href="#">FY2</a>
                        </li>
                        <li class="nav-item mb-2 mr-1 p-2">
                            <a class="nav-link" id="three_BI_FY1_5" style="color:white;background-color:darkgray" aria-current="page" href="#">FY3</a>
                        </li>
                        <li class="nav-item mb-2 mr-1 p-2">
                            <a class="nav-link" id="four_BI_FY1_5" style="color:white;background-color:darkgray" aria-current="page" href="#">FY4</a>
                        </li>
                        <li class="nav-item mb-2 mr-1 p-2">
                            <a class="nav-link" id="five_BI_FY1_5" style="color:white;background-color:#1c9bf6" aria-current="page" href="#">FY5</a>
                        </li>
                    </ul>


                    <div class="row">

                        <div class="col-xl-3 mb-3">
                            <label class="form-label">Select Year<span class="text-danger">*</span></label>
                            <select class="default-select style-1 form-control" id="year_BI_FY_five" name="year_BI_FY_five">
                                <option data-display="Select" value="" disabled>
                                    Select Year
                                </option>
                                    @forelse ($years as $year)
                                    <option value="{{$year->year}}" {{$BusinessIntelligence->year_BI_FY_five ==$year->year ? 'selected' : '' }}>{{ $year->year}}</option>
                                    @empty
                                    <p>No records found!</p>
                                    @endforelse
                            </select>

                        </div>
                        <div class="col-xl-3 mb-3">
                            <label for="operating_efficiency_BI_FY_five" class="form-label">Operating Efficiency ratio</label>
                            <input type="number" step="any"  class="form-control" name="operating_efficiency_BI_FY_five" id="operating_efficiency_BI_FY_five" value="{{$BusinessIntelligence->operating_efficiency_BI_FY_five}}" placeholder="">
                        </div>



                        <div class="col-xl-3 mb-3">
                            <label for="inventory_turnover_BI_FY_five" class="form-label">Inventory Turnover Ratio</label>
                            <input type="number" step="any"  class="form-control" name="inventory_turnover_BI_FY_five" id="inventory_turnover_BI_FY_five" value="{{$BusinessIntelligence->inventory_turnover_BI_FY_five}}" placeholder="">
                        </div>



                        <div class="col-xl-3 mb-3">
                            <label for="days_sales_in_inventory_BI_FY_five" class="form-label">Days sales in Inventory</label>
                            <input type="number" step="any"  class="form-control" name="days_sales_in_inventory_BI_FY_five"  id="days_sales_in_inventory_BI_FY_five" value="{{$BusinessIntelligence->days_sales_in_inventory_BI_FY_five}}" placeholder="">
                        </div>



                        <div class="col-xl-3 mb-3">
                            <label for="accounts_payable_turnover_BI_FY_five" class="form-label">Accounts Payable Turnover Ratio</label>
                            <input type="number" step="any"  class="form-control" name="accounts_payable_turnover_BI_FY_five"  id="accounts_payable_turnover_BI_FY_five" value="{{$BusinessIntelligence->accounts_payable_turnover_BI_FY_five}}" placeholder="">
                        </div>


                        </div>
                        <!-- Navigation buttons -->

                    <div class="row">
                        <div class="col-xl-6 d-flex justify-content-start">
                            <button type="button" class="btn btn report-tab-unactive" id="BusinessIntelligence-prev-5">Previous</button>
                        </div>
                        <div class="col-xl-6 d-flex justify-content-end">

                        <button type="submit" class="btn btn report-tab-active" id="submit-Business-Intelligence">Submit</button>
                        </div>
                    </div>

                </div>
                        <!--BusinessIntelligence FY3 step end ========================-->




            </form>
        </div>
    </div>
</div>

<!-- Business Intelligence end -->


<!-- Tax Return and Credit form start -->

<div class="row" id="Tax-Return-and-Credit">
    <div class="card">
        <div class="card-header justify-content-start">
            <h4 class="card-title">Tax Return and Credit<br>
                <span style="color:darkgray; font-size:12px;"> Tax Returns</span>
            </h4>

        </div>
        <div class="card-body justify-content-start">
            <form id="Tax-Return-and-Credit-step-form" enctype="multipart/form-data">
                <!-- Tax Return and Credit 1 step end -->
                <div class="Tax-Return-and-Credit-step" id="Tax-Return-and-Credit-step-1">
                    <div class="row">
            <input type="hidden" name="getThirdPartyForID" id="getThirdPartyForID" class="form-control" value="{{$getThirdPartyForID->id}}">

                        <input type="hidden" name="TaxReurnCreditID" id="TaxReurnCreditID" class="form-control" value="{{$TaxReurnCredit->id}}" >

                        <div class="row">
                            <div class="col-xl-4 mb-3">
                                <label for="tax_fy1" class="form-label">FY1 </label>
                                <input type="text" class="form-control" name="tax_fy1" id="tax_fy1" value="{{$TaxReurnCredit->tax_fy1}}" placeholder="">
                            </div>
                            <div class="col-xl-4 mb-3">
                                <label for="tax_fy2" class="form-label">FY2 </label>
                                <input type="text" class="form-control" name="tax_fy2" id="tax_fy2" value="{{$TaxReurnCredit->tax_fy2}}" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 mb-3">
                                <label for="tax_fy3" class="form-label">FY3 </label>
                                <input type="text" class="form-control" name="tax_fy3" id="tax_fy3" value="{{$TaxReurnCredit->tax_fy3}}" placeholder="">
                            </div>
                            <div class="col-xl-4 mb-3">
                                <label for="tax_fy4" class="form-label">FY4 </label>
                                <input type="text" class="form-control" name="tax_fy4" id="tax_fy4" value="{{$TaxReurnCredit->tax_fy4}}" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-4 mb-3">
                                <label for="tax_fy5" class="form-label">FY5 </label>
                                <input type="text" class="form-control" name="tax_fy5" id="tax_fy5" value="{{$TaxReurnCredit->tax_fy5}}" placeholder="">
                            </div>

                        </div>




                        <div class="col-xl-12 d-flex justify-content-end">
                            <button type="button" class="btn btn report-tab-active" id="Tax-Return-and-Credit-next-1">Next</button>
                        </div>


                    </div>
                </div>
                <!-- Tax Return and Credit 1 step end -->
                <!-- Tax Return and Credit 2 step start ========================-->
                <div class="Tax-Return-and-Credit-step" id="Tax-Return-and-Credit-step-2">

                @for ($i=1; $i <= 4; $i++)
                <div class="row">
                        <div class="col-xl-2 mb-3">
                            <label for="name_{{ $i }}" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name_{{ $i }}" id="name_{{ $i }}" value="{{$TaxReurnCredit->{'name_'. $i } }}">
                        </div>
                        <div class="col-xl-1 mb-3">
                            <label for="credit_score_{{ $i }}" class="form-label">Credit Score</label>
                            <input type="number"  step="any" class="form-control" name="credit_score_{{ $i }}" id="credit_score_{{ $i }}" value="{{$TaxReurnCredit->{'credit_score_'. $i } }}">
                        </div>
                        <div class="col-xl-1 mb-3">
                            <label for="num_of_loans_{{ $i }}" class="form-label">No. of Loans</label>
                            <input type="number"  step="any" class="form-control"  name="num_of_loans_{{ $i }}"  id="num_of_loans_{{ $i }}" value="{{$TaxReurnCredit->{'num_of_loans_'. $i } }}">
                        </div>
                        <div class="col-xl-2 mb-3">
                            <label for="outstanding_amount_{{ $i }}" class="form-label">Outstanding Amount</label>
                            <input type="number"  step="any" class="form-control" name="outstanding_amount_{{ $i }}" id="outstanding_amount_{{ $i }}" value="{{$TaxReurnCredit->{'outstanding_amount_'. $i } }}">
                        </div>
                        <div class="col-xl-2 mb-3">
                            <label for="solvency_{{ $i }}" class="form-label">Solvency</label>
                            <input type="text" class="form-control" name="solvency_{{ $i }}" id="solvency_{{ $i }}" value="{{$TaxReurnCredit->{'solvency_'. $i } }}">
                        </div>
                        <div class="col-xl-2 mb-3">
                            <label for="payment_history_{{ $i }}" class="form-label">Payment History</label>
                            <input type="text" class="form-control" name="payment_history_{{ $i }}" id="payment_history_{{ $i }}" value="{{$TaxReurnCredit->{'payment_history_'. $i } }}">
                        </div>
                        <div class="col-xl-2 mb-3">
                            <label for="credit_dependency_{{ $i }}" class="form-label">Credit Dependency</label>
                            <input type="text" class="form-control" name="credit_dependency_{{ $i }}" id="credit_dependency_{{ $i }}" value="{{$TaxReurnCredit->{'credit_dependency_'. $i } }}">
                        </div>
                    </div>
                @endfor

                    <div class="row">
                        <div class="col-xl-2 mb-3">
                            <label for="overall_credit_history_score" class="form-label">Overall Credit History Score</label>
                            <input type="number"  step="any" class="form-control" name="overall_credit_history_score" id="overall_credit_history_score" value="{{$TaxReurnCredit->overall_credit_history_score}}">
                        </div>
                        <div class="col-xl-2 mb-3">
                            <label for="score_analysis" class="form-label">Score Analysis</label>
                            <input type="text" class="form-control" name="score_analysis" id="score_analysis" value="{{$TaxReurnCredit->score_analysis}}">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xl-6 d-flex justify-content-start">

                            <button type="button" class="btn btn report-tab-unactive" id="Tax-Return-and-Credit-prev-2">Previous</button>
                        </div>
                        <div class="col-xl-6 d-flex justify-content-end">

                            <button type="submit" class="btn btn report-tab-active" id="Tax-Return-and-Credit-submit">Submit</button>

                        </div>
                    </div>

                </div>
                <!-- Tax Return and Credit 2 step end ========================-->

            </form>
        </div>
    </div>
</div>

<!-- Tax Return and Credit form end -->

<!-- Market-Reputation form start -->

<div class="row" id="Market-Reputation">
    <div class="card">
        <div class="card-header justify-content-start">
            <h4 class="card-title">Market Reputation
            </h4>

        </div>
        <div class="card-body justify-content-start">
            <form id="Market-Reputatio-step-form" enctype="multipart/form-data">
                <!-- firm background 1 step end -->
                <div class="Market-Reputation-step" id="Market-Reputation-step-1">
                    <div class="row">


                        <div class="row">
            <input type="hidden" name="getThirdPartyForID" id="getThirdPartyForID" class="form-control" value="{{$getThirdPartyForID->id}}">

                        <input type="hidden" class="form-control"  name="MarketReputationID" id="MarketReputationID" value="{{$MarketReputation->id}}">


                            <div class="col-xl-3 mb-3">
                                <label for="market_reputation_score" class="form-label">Market Reputation Score </label>
                                <input type="number"  step="any" class="form-control"  name="market_reputation_score" id="market_reputation_score" value="{{$MarketReputation->market_reputation_score}}" placeholder="">
                            </div>
                            <div class="col-xl-3 mb-3">
                                <label for="score_analysis" class="form-label">Score Analysis </label>
                                <input type="text" class="form-control" name="score_analysis" id="score_analysis" value="{{$MarketReputation->score_analysis}}" placeholder="">
                            </div>

                        </div>
                        <div class="row">


                            <div class="col-xl-6 mb-3">
                                <label for="file_path_market_reputations" class="form-label"></label>
                                <div class="dz-default dlab-message upload-img mb-3">
                                    <div class="fallback">
                                        <input name="file_path_market_reputations" type="file" title="Support Formate Pdf only" accept=".pdf" class="form-control" id="file_path_market_reputations" value="{{$MarketReputation->file_path_market_reputations}}" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="col-xl-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn report-tab-active" id="submit-Market-Reputation">submit</button>
                        </div>


                    </div>
                </div>
                <!-- firm background 1 step end -->
            </form>
        </div>
    </div>
</div>

<!-- Market-Reputation form end -->


<!-- Key Observation form start -->

<div class="row" id="Key-Observation">
    <div class="card">
        <div class="card-header justify-content-start">
            <h4 class="card-title">Key-Observation<br>
                <span style="color:darkgray; font-size:12px;"> Overall Risk Score</span>
            </h4>

        </div>
        <div class="card-body justify-content-start">
            <form id="Key-Observation-step-form">
                <!-- Tax Return and Credit 1 step end -->
                <div class="Key-Observation-step" id="Key-Observation-step-1">
                    <div class="row">

                        <input type="hidden" name="KeyObservationID" id="KeyObservationID" class="form-control" value="{{$KeyObservation->id}}">
                        <input type="hidden" name="getThirdPartyForID" id="getThirdPartyForID" class="form-control" value="{{$getThirdPartyForID->id}}">

                        <div class="row">
                            <div class="col-xl-3 mb-3">
                            </div>
                            <div class="col-xl-6 mb-3">
                                <h1 class="form-label">Overall Risk Score</h1>
                                <textarea rows="4" id="overall_risk_score" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" name="overall_risk_score" class="form-control">{{$KeyObservation->overall_risk_score}}</textarea>

                            </div>
                            <div class="col-xl-3 mb-3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 mb-3">
                            </div>
                            <div class="col-xl-6 mb-3">
                                <h1 class="form-label">Score Analysis</h1>
                                <textarea rows="4" id="score_analysis" name="score_analysis" class="form-control">{{$KeyObservation->score_analysis}}</textarea>

                            </div>
                            <div class="col-xl-3 mb-3">
                            </div>
                        </div>




                        <div class="col-xl-12 d-flex justify-content-end">
                            <button type="button" class="btn btn report-tab-active" id="Key-Observation-next-1">Next</button>
                        </div>


                    </div>
                </div>
                <!-- Key-Observation 1 step end -->
                <!-- Key-Observation 2 step start ========================-->
                <div class="Key-Observation-step" id="Key-Observation-step-2">

                    <div class="row">
                        <!-- <div class="col-xl-2 mb-3">
                            <label for="key_observation" class="form-label">Observations</label>
                            <input type="text" class="form-control" name="key_observation" id="key_observation" value="{{$KeyObservation->key_observation}}" >
                        </div> -->
                        <div class="col-xl-6 mb-3">
                            <label for="file" class="form-label">Upload Final Report</label>
                            <div class="dz-default dlab-message upload-img mb-3">
                                <div class="fallback">
                                    <input name="key_observation_final_report_file" title="Support Formate Pdf only" type="file" class="form-control" id="key_observation_final_report_file" accept=".pdf" placeholder="">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xl-6 mb-1">
                            <label class="form-label"><b>Key observations</b></label>

                        </div>

                        <div class="col-xl-6 mb-1">
                            <label class="form-label"><b>Recommendations</b></label>

                        </div>
                    </div>
                    <div class="row">

                    @for ($i = 1; $i <= 25; $i++)
                        <div class="col-xl-6 mb-3">
                            {{ $i }} <textarea placeholder=" Observation {{ $i }}" rows="2" id="key_observation_{{ $i }}" name="key_observation_{{ $i }}" class="form-control">{{ $KeyObservation->{'key_observation_' . $i } }}</textarea>
                        </div>

                        <div class="col-xl-6 mb-3">
                        {{ $i }} <textarea placeholder="Recommendations {{ $i }}" rows="2" id="key_recommendations_{{ $i }}" name="key_recommendations_{{ $i }}" class="form-control">{{ $KeyObservation->{'key_recommendations_' . $i } }}</textarea>

                        </div>
                    @endfor
                    </div>

                    <div class="row">
                        <div class="col-xl-6 d-flex justify-content-start">

                            <button type="button" class="btn btn report-tab-unactive" id="Key-Observation-prev-2">Previous</button>
                        </div>
                        <div class="col-xl-6 d-flex justify-content-end">

                            <button type="submit" class="btn btn report-tab-active" id="Key-Observation-submit">Submit</button>

                        </div>
                    </div>

                </div>
                <!-- Key-Observation 2 step end ========================-->

            </form>
        </div>
    </div>
</div>

<!-- Key Observation form end -->



@endsection

@section('addScript')

<script>
    $(document).ready(function() {
        var currentfirmStep = 1;
        $(".firm-step").hide();
        $("#firm-step-1").show();

        // Function to navigate to the next step
        function firmnextStep() {
            $(".firm-step").hide();
            currentfirmStep++;
            $("#firm-step-" + currentfirmStep).show();
        }

        // Function to navigate to the previous step
        function firmprevStep() {
            $(".firm-step").hide();
            currentfirmStep--;
            $("#firm-step-" + currentfirmStep).show();
        }

        // Event listeners for "Next" and "Previous" buttons
        $("#firm-next-1").on("click", firmnextStep);
        $("#firm-prev-2").on("click", firmprevStep);
        $("#firm-next-2").on("click", firmnextStep);
        $("#firm-prev-3").on("click", firmprevStep);
        $("#firm-next-3").on("click", firmnextStep);
        $("#firm-prev-4").on("click", firmprevStep);
        $("#firm-next-4").on("click", firmnextStep);
        $("#firm-prev-5").on("click", firmprevStep);



        $('#click-Firm-Background').on('click', function() {
            $('#Firm-Background').show();
            $('#Court-Checks').hide();
            $('#Tab-Documents').hide();

            $("#On-Ground-Verification").hide();
            $("#Financials").hide();
            $("#Business-Intelligence").hide();
            $("#Tax-Return-and-Credit").hide();
            $("#Market-Reputation").hide();
            $("#Key-Observation").hide();

            $('#click-Firm-Background').addClass('report-tab-active').removeClass('report-tab-unactive');
            $('#click-Court-Checks').addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-On-Ground-Verification").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Documents").addClass('report-tab-unactive').removeClass('report-tab-active');

            $("#click-Financials").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Business-Intelligence").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Tax-Return-and-Credit").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Market-Reputation").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Key-Observation").addClass('report-tab-unactive').removeClass('report-tab-active');






        });

        $('#click-Documents').on('click', function() {
            $('#Firm-Background').hide();
            $('#Court-Checks').hide();
            $('#Tab-Documents').show();

            $("#On-Ground-Verification").hide();
            $("#Financials").hide();
            $("#Business-Intelligence").hide();
            $("#Tax-Return-and-Credit").hide();
            $("#Market-Reputation").hide();
            $("#Key-Observation").hide();

            $('#click-Firm-Background').addClass('report-tab-unactive').removeClass('report-tab-active');
            $('#click-Court-Checks').addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Documents").addClass('report-tab-active').removeClass('report-tab-unactive');
            $("#click-On-Ground-Verification").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Financials").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Business-Intelligence").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Tax-Return-and-Credit").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Market-Reputation").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Key-Observation").addClass('report-tab-unactive').removeClass('report-tab-active');

        });

        $('#click-On-Ground-Verification').on('click', function() {
            $('#Firm-Background').hide();
            $('#Court-Checks').hide();
            $("#On-Ground-Verification").show();
            $("#Financials").hide();
            $("#Business-Intelligence").hide();
            $("#Tax-Return-and-Credit").hide();
            $("#Market-Reputation").hide();
            $("#Key-Observation").hide();

            $('#click-Firm-Background').addClass('report-tab-unactive').removeClass('report-tab-active');
            $('#click-Court-Checks').addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-On-Ground-Verification").addClass('report-tab-active').removeClass('report-tab-unactive');
            $("#click-Documents").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Financials").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Business-Intelligence").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Tax-Return-and-Credit").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Market-Reputation").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Key-Observation").addClass('report-tab-unactive').removeClass('report-tab-active');

        });


        $('#click-Court-Checks').on('click', function() {
            $('#Firm-Background').hide();
            $('#Court-Checks').show();

            $("#On-Ground-Verification").hide();
            $("#Financials").hide();
            $("#Business-Intelligence").hide();
            $("#Tax-Return-and-Credit").hide();
            $("#Market-Reputation").hide();
            $("#Key-Observation").hide();

            $('#Tab-Documents').hide();
            $("#click-Documents").addClass('report-tab-unactive').removeClass('report-tab-active');

            $('#click-Firm-Background').addClass('report-tab-unactive').removeClass('report-tab-active');
            $('#click-Court-Checks').addClass('report-tab-active').removeClass('report-tab-unactive');
            $("#click-On-Ground-Verification").addClass('report-tab-unactive').removeClass('report-tab-active');

            $("#click-Financials").addClass('report-tab-unactive').removeClass('report-tab-active');

            $("#click-Business-Intelligence").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Tax-Return-and-Credit").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Market-Reputation").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Key-Observation").addClass('report-tab-unactive').removeClass('report-tab-active');

        });



        var CourtcurrentStep = 1;
        $(".court-step").hide();
        $("#court-step-1").show();

        // Function to navigate to the next step
        function courtnextStep() {
            $(".court-step").hide();
            CourtcurrentStep++;
            $("#court-step-" + CourtcurrentStep).show();
        }

        // Function to navigate to the previous step
        function courtprevStep() {
            $(".court-step").hide();
            CourtcurrentStep--;
            $("#court-step-" + CourtcurrentStep).show();
        }

        // Event listeners for "Next" and "Previous" buttons
        $("#court-next-1").on("click", courtnextStep);
        $("#court-prev-2").on("click", courtprevStep);
        $("#court-next-2").on("click", courtnextStep);
        $("#court-prev-3").on("click", courtprevStep);
        $("#court-next-3").on("click", courtnextStep);
        $("#court-prev-4").on("click", courtprevStep);
        $("#court-next-4").on("click", courtnextStep);
        $("#court-prev-5").on("click", courtprevStep);


        $('#click-Financials').on('click', function() {
            $('#Firm-Background').hide();
            $('#Court-Checks').hide();
            $('#Tab-Documents').hide();

            $("#On-Ground-Verification").hide();
            $("#Financials").show();
            $("#Business-Intelligence").hide();
            $("#Tax-Return-and-Credit").hide();
            $("#Market-Reputation").hide();
            $("#Key-Observation").hide();

            $('#click-Firm-Background').addClass('report-tab-unactive').removeClass('report-tab-active');
            $('#click-Court-Checks').addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Documents").addClass('report-tab-unactive').removeClass('report-tab-active');

            $("#click-On-Ground-Verification").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Financials").addClass('report-tab-active').removeClass('report-tab-unactive');
            $("#click-Business-Intelligence").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Tax-Return-and-Credit").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Market-Reputation").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Key-Observation").addClass('report-tab-unactive').removeClass('report-tab-active');


        });

        var FinancialscurrentStep = 1;
        $(".Financials-step").hide();
        $("#Financials-step-1").show();

        // Function to navigate to the next step
        function FinancialsnextStep() {
            $(".Financials-step").hide();
            FinancialscurrentStep++;
            $("#Financials-step-" + FinancialscurrentStep).show();
        }

        // Function to navigate to the previous step
        function FinancialsprevStep() {
            $(".Financials-step").hide();
            FinancialscurrentStep--;
            $("#Financials-step-" + FinancialscurrentStep).show();
        }

        // Event listeners for "Next" and "Previous" buttons
        $("#Financials-next-1").on("click", FinancialsnextStep);
        $("#Financials-prev-2").on("click", FinancialsprevStep);
        $("#Financials-next-2").on("click", FinancialsnextStep);
        $("#Financials-prev-3").on("click", FinancialsprevStep);
        $("#Financials-next-3").on("click", FinancialsnextStep);
        $("#Financials-prev-4").on("click", FinancialsprevStep);
        $("#Financials-next-4").on("click", FinancialsnextStep);
        $("#Financials-prev-5").on("click", FinancialsprevStep);
        $("#Financials-next-5").on("click", FinancialsnextStep);
        $("#Financials-prev-6").on("click", FinancialsprevStep);
        $("#Financials-next-6").on("click", FinancialsnextStep);
        $("#Financials-prev-7").on("click", FinancialsprevStep);
        $("#Financials-next-7").on("click", FinancialsnextStep);
        $("#Financials-prev-8").on("click", FinancialsprevStep);
        $("#Financials-next-8").on("click", FinancialsnextStep);
        $("#Financials-prev-9").on("click", FinancialsprevStep);
        $("#Financials-next-9").on("click", FinancialsnextStep);
        $("#Financials-prev-10").on("click", FinancialsprevStep);
        $("#Financials-next-10").on("click", FinancialsnextStep);
        $("#Financials-prev-11").on("click", FinancialsprevStep);



        $('#click-Business-Intelligence').on('click', function() {
            $('#Firm-Background').hide();
            $('#Court-Checks').hide();
            $("#On-Ground-Verification").hide();
            $("#Financials").hide();
            $('#Tab-Documents').hide();

            $("#Business-Intelligence").show();
            $("#Tax-Return-and-Credit").hide();
            $("#Market-Reputation").hide();
            $("#Key-Observation").hide();

            $('#click-Firm-Background').addClass('report-tab-unactive').removeClass('report-tab-active');
            $('#click-Court-Checks').addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-On-Ground-Verification").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Documents").addClass('report-tab-unactive').removeClass('report-tab-active');

            $("#click-Financials").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Business-Intelligence").addClass('report-tab-active').removeClass('report-tab-unactive');
            $("#click-Tax-Return-and-Credit").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Market-Reputation").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Key-Observation").addClass('report-tab-unactive').removeClass('report-tab-active');


        });

          var BusinessIntelligencecurrentStep = 1;
        $(".BusinessIntelligence-step").hide();
        $("#BusinessIntelligence-step-1").show();

        // Function to navigate to the next step
        function BusinessIntelligencenextStep() {
            $(".BusinessIntelligence-step").hide();
            BusinessIntelligencecurrentStep++;
            $("#BusinessIntelligence-step-" + BusinessIntelligencecurrentStep).show();
        }

        // Function to navigate to the previous step
        function BusinessIntelligenceprevStep() {
            $(".BusinessIntelligence-step").hide();
            BusinessIntelligencecurrentStep--;
            $("#BusinessIntelligence-step-" + BusinessIntelligencecurrentStep).show();
        }

        // Event listeners for "Next" and "Previous" buttons
        $("#BusinessIntelligence-next-1").on("click", BusinessIntelligencenextStep);
        $("#BusinessIntelligence-prev-2").on("click", BusinessIntelligenceprevStep);
        $("#BusinessIntelligence-next-2").on("click", BusinessIntelligencenextStep);
        $("#BusinessIntelligence-prev-3").on("click", BusinessIntelligenceprevStep);
        $("#BusinessIntelligence-next-3").on("click", BusinessIntelligencenextStep);
        $("#BusinessIntelligence-prev-4").on("click", BusinessIntelligenceprevStep);
        $("#BusinessIntelligence-next-4").on("click", BusinessIntelligencenextStep);
        $("#BusinessIntelligence-prev-5").on("click", BusinessIntelligenceprevStep);
        $("#BusinessIntelligence-next-5").on("click", BusinessIntelligencenextStep);



        $('#click-Tax-Return-and-Credit').on('click', function() {
            $('#Firm-Background').hide();
            $('#Court-Checks').hide();
            $("#On-Ground-Verification").hide();
            $('#Tab-Documents').hide();

            $("#Financials").hide();
            $("#Business-Intelligence").hide();
            $("#Tax-Return-and-Credit").show();
            $("#Market-Reputation").hide();
            $("#Key-Observation").hide();

            $('#click-Firm-Background').addClass('report-tab-unactive').removeClass('report-tab-active');
            $('#click-Court-Checks').addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-On-Ground-Verification").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Financials").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Business-Intelligence").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Tax-Return-and-Credit").addClass('report-tab-active').removeClass('report-tab-unactive');
            $("#click-Market-Reputation").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Key-Observation").addClass('report-tab-unactive').removeClass('report-tab-active');



        });




        var TaxReturnandCreditcurrentStep = 1;
        $(".Tax-Return-and-Credit-step").hide();
        $("#Tax-Return-and-Credit-step-1").show();

        // Function to navigate to the next step
        function TaxReturnandCreditnextStep() {
            $(".Tax-Return-and-Credit-step").hide();
            TaxReturnandCreditcurrentStep++;
            $("#Tax-Return-and-Credit-step-" + TaxReturnandCreditcurrentStep).show();
        }

        // Function to navigate to the previous step
        function TaxReturnandCreditprevStep() {
            $(".Tax-Return-and-Credit-step").hide();
            TaxReturnandCreditcurrentStep--;
            $("#Tax-Return-and-Credit-step-" + TaxReturnandCreditcurrentStep).show();
        }

        // Event listeners for "Next" and "Previous" buttons
        $("#Tax-Return-and-Credit-next-1").on("click", TaxReturnandCreditnextStep);
        $("#Tax-Return-and-Credit-prev-2").on("click", TaxReturnandCreditprevStep);
        $("#Tax-Return-and-Credit-next-2").on("click", TaxReturnandCreditnextStep);



        $('#click-Market-Reputation').on('click', function() {
            $('#Firm-Background').hide();
            $('#Court-Checks').hide();
            $("#On-Ground-Verification").hide();
            $("#Financials").hide();
            $('#Tab-Documents').hide();

            $("#Business-Intelligence").hide();
            $("#Tax-Return-and-Credit").hide();
            $("#Market-Reputation").show();
            $("#Key-Observation").hide();

            $('#click-Firm-Background').addClass('report-tab-unactive').removeClass('report-tab-active');
            $('#click-Court-Checks').addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-On-Ground-Verification").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Financials").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Business-Intelligence").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Tax-Return-and-Credit").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Market-Reputation").addClass('report-tab-active').removeClass('report-tab-unactive');
            $("#click-Key-Observation").addClass('report-tab-unactive').removeClass('report-tab-active');


        });

        $('#click-Key-Observation').on('click', function() {
            $('#Firm-Background').hide();
            $('#Court-Checks').hide();
            $('#Tab-Documents').hide();

            $("#On-Ground-Verification").hide();
            $("#Financials").hide();
            $("#Business-Intelligence").hide();
            $("#Tax-Return-and-Credit").hide();
            $("#Market-Reputation").hide();
            $("#Key-Observation").show();

            $('#click-Firm-Background').addClass('report-tab-unactive').removeClass('report-tab-active');
            $('#click-Court-Checks').addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-On-Ground-Verification").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Financials").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Business-Intelligence").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Tax-Return-and-Credit").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Market-Reputation").addClass('report-tab-unactive').removeClass('report-tab-active');
            $('#click-Key-Observation').toggleClass('report-tab-active report-tab-unactive');

            // $("#click-Key-Observation").removeClass('report-tab-unactive');
            // $("#click-Key-Observation").addClass('report-tab-active');


        });

        var KeyObservationcurrentStep = 1;
        $(".Key-Observation-step").hide();
        $("#Key-Observation-step-1").show();

        // Function to navigate to the next step
        function KeyObservationcurrentStepnextStep() {
            $(".Key-Observation-step").hide();
            KeyObservationcurrentStep++;
            $("#Key-Observation-step-" + KeyObservationcurrentStep).show();
        }

        // Function to navigate to the previous step
        function KeyObservationcurrentStepprevStep() {
            $(".Key-Observation-step").hide();
            KeyObservationcurrentStep--;
            $("#Key-Observation-step-" + KeyObservationcurrentStep).show();
        }

        // Event listeners for "Next" and "Previous" buttons
        $("#Key-Observation-next-1").on("click", KeyObservationcurrentStepnextStep);
        $("#Key-Observation-prev-2").on("click", KeyObservationcurrentStepprevStep);
        $("#Key-Observation-next-2").on("click", KeyObservationcurrentStepnextStep);


        function allFormHideStaringAfter() {
            $('#Firm-Background').show();
            $('#Court-Checks').hide();
            $('#Tab-Documents').hide();

            $("#On-Ground-Verification").hide();
            $("#Financials").hide();
            $("#Business-Intelligence").hide();
            $("#Tax-Return-and-Credit").hide();
            $("#Market-Reputation").hide();
            $("#Key-Observation").hide();

            $('#click-Firm-Background').addClass('report-tab-active').removeClass('report-tab-unactive');
            $('#click-Court-Checks').addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-On-Ground-Verification").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Financials").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Business-Intelligence").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Tax-Return-and-Credit").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Market-Reputation").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Key-Observation").addClass('report-tab-unactive').removeClass('report-tab-active');
        }

        allFormHideStaringAfter();


        // firm background
        $('#firm-step-form').on('submit', function (e) {
            e.preventDefault();

            console.log('Form submitted');

            var formData = new FormData(this);


            $('#firm-submit').prop('disabled', true);

            $.ajax({
                type: "POST",
                url: "{{ route('team.update_firm_background') }}",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: formData,
                dataType: "json",
                processData: false, // important for FormData
                contentType: false, // important for FormData
                success: function (response) {
                    console.log(response);

                    Swal.fire({
                        title: "Success!",
                        text: response.message,
                        icon: "success",
                        confirmButtonText: "OK",
                        timer: 3000, // 3 seconds
                        timerProgressBar: true,
                        willClose: () => {
                            $("#firm-submit").prop("disabled", false);
                            $('#Firm-Background').hide();

                            $("#Tab-Documents").show();

                            $('#click-Documents').addClass('report-tab-active').removeClass('report-tab-unactive');
                            $('#click-Firm-Background').addClass('report-tab-unactive').removeClass('report-tab-active');

                        },
                    });
                },
                error: function (error) {
                    console.log(error);

                    $('#firm-submit').prop('disabled', false);
                }
            });
        });

        // tab-doucument
        $('#Documents-form').on('submit', function (e) {
            e.preventDefault();



            var formData = new FormData(this);


            $('#submit-Documents').prop('disabled', true);

            $.ajax({
                type: "POST",
                url: "{{ route('team.update_documents') }}",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: formData,
                dataType: "json",
                processData: false, // important for FormData
                contentType: false, // important for FormData
                success: function (response) {
                    console.log(response);

                    Swal.fire({
                        title: "Success!",
                        text: response.message,
                        icon: "success",
                        confirmButtonText: "OK",
                        timer: 3000, // 3 seconds
                        timerProgressBar: true,
                        willClose: () => {
                            $("#submit-Documents").prop("disabled", false);

                            $("#Tab-Documents").hide();
                            $('#On-Ground-Verification').show();

                            $('#click-On-Ground-Verification').addClass('report-tab-active').removeClass('report-tab-unactive');
                            $('#click-Documents').addClass('report-tab-unactive').removeClass('report-tab-active');


                        },
                    });
                },
                error: function (error) {
                    console.log(error);

                    $('#submit-Documents').prop('disabled', false);
                }
            });
        });

        // on-ground verification


        $('#onGround-step-form').on('submit', function (e) {
            e.preventDefault();

            console.log('Form submitted');

            var formData = new FormData(this);


            $('#submit-onGround').prop('disabled', true);

            $.ajax({
                type: "POST",
                url: "{{ route('team.update_on_ground_verification') }}",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: formData,
                dataType: "json",
                processData: false, // important for FormData
                contentType: false, // important for FormData
                success: function (response) {
                    console.log(response);

                    Swal.fire({
                        title: "Success!",
                        text: response.message,
                        icon: "success",
                        confirmButtonText: "OK",
                        timer: 3000, // 3 seconds
                        timerProgressBar: true,
                        willClose: () => {
                            $("#submit-onGround").prop("disabled", false);
                            $('#On-Ground-Verification').hide();

                            $("#Court-Checks").show();

                            $('#click-Court-Checks').addClass('report-tab-active').removeClass('report-tab-unactive');
                            $('#click-On-Ground-Verification').addClass('report-tab-unactive').removeClass('report-tab-active');

                        },
                    });
                },
                error: function (error) {
                    console.log(error);

                    $('#submit-onGround').prop('disabled', false);
                }
            });
        });

        $('#court-step-form').on('submit', function (e) {
            e.preventDefault();

            console.log('Form submitted');

            var formData = new FormData(this);


            $('#court-submit').prop('disabled', true);

            $.ajax({
                type: "POST",
                url: "{{ route('team.update_court_check') }}",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: formData,
                dataType: "json",
                processData: false, // important for FormData
                contentType: false, // important for FormData
                success: function (response) {
                    console.log(response);

                    Swal.fire({
                        title: "Success!",
                        text: response.message,
                        icon: "success",
                        confirmButtonText: "OK",
                        timer: 3000, // 3 seconds
                        timerProgressBar: true,
                        willClose: () => {
                            $("#court-submit").prop("disabled", false);
                            $("#Court-Checks").hide();
                            $('#Financials').show();


                            $('#click-Financials').addClass('report-tab-active').removeClass('report-tab-unactive');
                            $('#click-Court-Checks').addClass('report-tab-unactive').removeClass('report-tab-active');

                        },
                    });
                },
                error: function (error) {
                    console.log(error);

                    $('#court-submit').prop('disabled', false);
                }
            });
        });


        // Financials

        // financial Finding one start


             // Flag to check if any field is empty
                function applyStyleIfEmpty(fieldIds, containerId) {
                // Flag to check if any field is empty
                var isEmpty = false;

                // Iterate through each input field ID
                $.each(fieldIds, function(index, fieldId) {
                    // Get the input field by ID
                    var inputField = $('#' + fieldId);

                    // Check if the value of the input field is empty
                    if (inputField.val() === '') {
                        // If empty, set the flag to true
                        isEmpty = true;
                        // Exit the loop early if you only want to check if at least one field is empty
                        return false;
                    }
                });



                // Check if at least one field is empty and apply the style to the specified container
                if (isEmpty) {
                    $('#' + containerId).attr('style', 'color:Black;background-color:yellow');
                    $('#' + containerId + '_2').attr('style', 'color:Black;background-color:yellow');
                    $('#' + containerId + '_3').attr('style', 'color:Black;background-color:yellow');
                    $('#' + containerId + '_4').attr('style', 'color:Black;background-color:yellow');
                    $('#' + containerId + '_5').attr('style', 'color:Black;background-color:yellow');
                }
            }

            // Call the function for the first set of fields
            applyStyleIfEmpty([
                'revenue_fy_one_finding__1',
                'net_profit_fy_one_finding__1',
                'gross_profit_fy_one_finding__1',
                'working_capital_1_fy_one_finding__1',
                'quick_assets_fy_one_finding__1',
                'total_assets_fy_one_finding__1',
                'current_assets_fy_one_finding__1',
                'current_liabilities_fy_one_finding__1',
                'debt_fy_one_finding__1',
                'average_inventory_fy_one_finding__1',
                'net_sales_fy_one_finding__1',
                'equity_share_capital_fy_one_finding__1',
                'sundry_debtors_fy_one_finding__1',
                'sundry_creditors_fy_one_finding__1',
                'loans_and_advances_fy_one_finding__1',
                'cash_and_cash_equivalents_fy_one_finding__1',
                'overall_financial_score_fy_one_finding__1',
                // Add other field IDs here
            ], 'one_finding_FY1');

            // Call the function for the second set of fields
            applyStyleIfEmpty([
                'revenue_fy_two_finding__1',
                'net_profit_fy_two_finding__1',
                'gross_profit_fy_two_finding__1',
                'working_capital_1_fy_two_finding__1',
                'quick_assets_fy_two_finding__1',
                'total_assets_fy_two_finding__1',
                'current_assets_fy_two_finding__1',
                'current_liabilities_fy_two_finding__1',
                'debt_fy_two_finding__1',
                'average_inventory_fy_two_finding__1',
                'net_sales_fy_two_finding__1',
                'equity_share_capital_fy_two_finding__1',
                'sundry_debtors_fy_two_finding__1',
                'sundry_creditors_fy_two_finding__1',
                'loans_and_advances_fy_two_finding__1',
                'cash_and_cash_equivalents_fy_two_finding__1',
                'overall_financial_score_fy_two_finding__1',
            ], 'two_finding_FY1');
            applyStyleIfEmpty([
                'revenue_fy_three_finding__1',
                'net_profit_fy_three_finding__1',
                'gross_profit_fy_three_finding__1',
                'working_capital_1_fy_three_finding__1',
                'quick_assets_fy_three_finding__1',
                'total_assets_fy_three_finding__1',
                'current_assets_fy_three_finding__1',
                'current_liabilities_fy_three_finding__1',
                'debt_fy_three_finding__1',
                'average_inventory_fy_three_finding__1',
                'net_sales_fy_three_finding__1',
                'equity_share_capital_fy_three_finding__1',
                'sundry_debtors_fy_three_finding__1',
                'sundry_creditors_fy_three_finding__1',
                'loans_and_advances_fy_three_finding__1',
                'cash_and_cash_equivalents_fy_three_finding__1',
                'overall_financial_score_fy_three_finding__1',
            ], 'three_finding_FY1');

            applyStyleIfEmpty([
                'revenue_fy_four_finding__1',
                'net_profit_fy_four_finding__1',
                'gross_profit_fy_four_finding__1',
                'working_capital_1_fy_four_finding__1',
                'quick_assets_fy_four_finding__1',
                'total_assets_fy_four_finding__1',
                'current_assets_fy_four_finding__1',
                'current_liabilities_fy_four_finding__1',
                'debt_fy_four_finding__1',
                'average_inventory_fy_four_finding__1',
                'net_sales_fy_four_finding__1',
                'equity_share_capital_fy_four_finding__1',
                'sundry_debtors_fy_four_finding__1',
                'sundry_creditors_fy_four_finding__1',
                'loans_and_advances_fy_four_finding__1',
                'cash_and_cash_equivalents_fy_four_finding__1',
                'overall_financial_score_fy_four_finding__1',
            ], 'four_finding_FY1');

            applyStyleIfEmpty([
                'revenue_fy_five_finding__1',
                'net_profit_fy_five_finding__1',
                'gross_profit_fy_five_finding__1',
                'working_capital_1_fy_five_finding__1',
                'quick_assets_fy_five_finding__1',
                'total_assets_fy_five_finding__1',
                'current_assets_fy_five_finding__1',
                'current_liabilities_fy_five_finding__1',
                'debt_fy_five_finding__1',
                'average_inventory_fy_five_finding__1',
                'net_sales_fy_five_finding__1',
                'equity_share_capital_fy_five_finding__1',
                'sundry_debtors_fy_five_finding__1',
                'sundry_creditors_fy_five_finding__1',
                'loans_and_advances_fy_five_finding__1',
                'cash_and_cash_equivalents_fy_five_finding__1',
                'overall_financial_score_fy_five_finding__1',
            ], 'five_finding_FY1');

        // financial Finding one end

        // financialRatio  start


             // Flag to check if any field is empty
             function applyStyleIfEmptyfinancialRatio(fieldIds, containerId) {
                // Flag to check if any field is empty
                var isEmptyRatio = false;

                // Iterate through each input field ID
                $.each(fieldIds, function(index, fieldId) {
                    // Get the input field by ID
                    var inputField = $('#' + fieldId);

                    // Check if the value of the input field is empty
                    if (inputField.val() === '') {
                        // If empty, set the flag to true
                        isEmptyRatio = true;
                        // Exit the loop early if you only want to check if at least one field is empty
                        return false;
                    }
                });

                // Check if at least one field is empty and apply the style to the specified container
                if (isEmptyRatio) {
                    $('#' + containerId).attr('style', 'color:Black;background-color:#90EE90');
                    $('#' + containerId + '_2').attr('style', 'color:Black;background-color:#90EE90');
                    $('#' + containerId + '_3').attr('style', 'color:Black;background-color:#90EE90');
                    $('#' + containerId + '_4').attr('style', 'color:Black;background-color:#90EE90');
                    $('#' + containerId + '_5').attr('style', 'color:Black;background-color:#90EE90');
                }
            }

            // Call the function for the first set of fields
            applyStyleIfEmptyfinancialRatio([
                'current_ratio_fy_one_1',
                'current_ratio_analysis_fy_one_1',
                'debt_ratio_fy_one_1',
                'debt_ratio_analysis_fy_one_1',
                'solvency_ratio_fy_one_1',
                'solvency_ratio_analysis_fy_one_1',
                'debt_to_equity_ratio_fy_one_1',
                'debt_to_equity_ratio_analysis_fy_one_1',
                'asset_turnover_ratio_fy_one_1',
                'asset_turnover_ratio_analysis_fy_one_1',
                'absolute_liquidity_ratio_fy_one_1',
                'absolute_liquidity_ratio_analysis_fy_one_1',
                'proprietary_ratio_fy_one_1',
                'proprietary_ratio_analysis_fy_one_1',
                'net_profit_ratio_fy_one_1',
                'net_profit_ratio_analysis_fy_one_1',
                'gross_profit_ratio_fy_one_1',
                'gross_profit_ratio_analysis_fy_one_1',
                'springate_s_score_ratio_fy_one_1',
                'trade_receivable_days_ratio_fy_one_1',
                'trade_payable_days_ratio_fy_one_1',
                'taffler_z_score_ratio_fy_one_1',
                'zmijewski_x_score_ratio_fy_one_1',
                // Add other field IDs here
            ], 'one_ratio_FY1');

            applyStyleIfEmptyfinancialRatio([
                'current_ratio_fy_two_1',
                'current_ratio_analysis_fy_two_1',
                'debt_ratio_fy_two_1',
                'debt_ratio_analysis_fy_two_1',
                'solvency_ratio_fy_two_1',
                'solvency_ratio_analysis_fy_two_1',
                'debt_to_equity_ratio_fy_two_1',
                'debt_to_equity_ratio_analysis_fy_two_1',
                'asset_turnover_ratio_fy_two_1',
                'asset_turnover_ratio_analysis_fy_two_1',
                'absolute_liquidity_ratio_fy_two_1',
                'absolute_liquidity_ratio_analysis_fy_two_1',
                'proprietary_ratio_fy_two_1',
                'proprietary_ratio_analysis_fy_two_1',
                'net_profit_ratio_fy_two_1',
                'net_profit_ratio_analysis_fy_two_1',
                'gross_profit_ratio_fy_two_1',
                'gross_profit_ratio_analysis_fy_two_1',
                'springate_s_score_ratio_fy_two_1',
                'trade_receivable_days_ratio_fy_two_1',
                'trade_payable_days_ratio_fy_two_1',
                'taffler_z_score_ratio_fy_two_1',
                'zmijewski_x_score_ratio_fy_two_1',
                // Add other field IDs here
            ], 'two_ratio_FY1');


            applyStyleIfEmptyfinancialRatio([
                'current_ratio_fy_three_1',
                'current_ratio_analysis_fy_three_1',
                'debt_ratio_fy_three_1',
                'debt_ratio_analysis_fy_three_1',
                'solvency_ratio_fy_three_1',
                'solvency_ratio_analysis_fy_three_1',
                'debt_to_equity_ratio_fy_three_1',
                'debt_to_equity_ratio_analysis_fy_three_1',
                'asset_turnover_ratio_fy_three_1',
                'asset_turnover_ratio_analysis_fy_three_1',
                'absolute_liquidity_ratio_fy_three_1',
                'absolute_liquidity_ratio_analysis_fy_three_1',
                'proprietary_ratio_fy_three_1',
                'proprietary_ratio_analysis_fy_three_1',
                'net_profit_ratio_fy_three_1',
                'net_profit_ratio_analysis_fy_three_1',
                'gross_profit_ratio_fy_three_1',
                'gross_profit_ratio_analysis_fy_three_1',
                'springate_s_score_ratio_fy_three_1',
                'trade_receivable_days_ratio_fy_three_1',
                'trade_payable_days_ratio_fy_three_1',
                'taffler_z_score_ratio_fy_three_1',
                'zmijewski_x_score_ratio_fy_three_1',
                // Add other field IDs here
            ], 'three_ratio_FY1');


            applyStyleIfEmptyfinancialRatio([
                'current_ratio_fy_four_1',
                'current_ratio_analysis_fy_four_1',
                'debt_ratio_fy_four_1',
                'debt_ratio_analysis_fy_four_1',
                'solvency_ratio_fy_four_1',
                'solvency_ratio_analysis_fy_four_1',
                'debt_to_equity_ratio_fy_four_1',
                'debt_to_equity_ratio_analysis_fy_four_1',
                'asset_turnover_ratio_fy_four_1',
                'asset_turnover_ratio_analysis_fy_four_1',
                'absolute_liquidity_ratio_fy_four_1',
                'absolute_liquidity_ratio_analysis_fy_four_1',
                'proprietary_ratio_fy_four_1',
                'proprietary_ratio_analysis_fy_four_1',
                'net_profit_ratio_fy_four_1',
                'net_profit_ratio_analysis_fy_four_1',
                'gross_profit_ratio_fy_four_1',
                'gross_profit_ratio_analysis_fy_four_1',
                'springate_s_score_ratio_fy_four_1',
                'trade_receivable_days_ratio_fy_four_1',
                'trade_payable_days_ratio_fy_four_1',
                'taffler_z_score_ratio_fy_four_1',
                'zmijewski_x_score_ratio_fy_four_1',
                // Add other field IDs here
            ], 'four_ratio_FY1');


            applyStyleIfEmptyfinancialRatio([
                'current_ratio_fy_five_1',
                'current_ratio_analysis_fy_five_1',
                'debt_ratio_fy_five_1',
                'debt_ratio_analysis_fy_five_1',
                'solvency_ratio_fy_five_1',
                'solvency_ratio_analysis_fy_five_1',
                'debt_to_equity_ratio_fy_five_1',
                'debt_to_equity_ratio_analysis_fy_five_1',
                'asset_turnover_ratio_fy_five_1',
                'asset_turnover_ratio_analysis_fy_five_1',
                'absolute_liquidity_ratio_fy_five_1',
                'absolute_liquidity_ratio_analysis_fy_five_1',
                'proprietary_ratio_fy_five_1',
                'proprietary_ratio_analysis_fy_five_1',
                'net_profit_ratio_fy_five_1',
                'net_profit_ratio_analysis_fy_five_1',
                'gross_profit_ratio_fy_five_1',
                'gross_profit_ratio_analysis_fy_five_1',
                'springate_s_score_ratio_fy_five_1',
                'trade_receivable_days_ratio_fy_five_1',
                'trade_payable_days_ratio_fy_five_1',
                'taffler_z_score_ratio_fy_five_1',
                'zmijewski_x_score_ratio_fy_five_1',
                // Add other field IDs here
            ], 'five_ratio_FY1');
        // financialRatio  end



        $('#Financials-step-form').on('submit', function (e) {
            e.preventDefault();


            var formData = new FormData(this);


            $('#Financials-submit').prop('disabled', true);

            $.ajax({
                type: "POST",
                url: "{{ route('team.update_financial') }}",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: formData,
                dataType: "json",
                processData: false, // important for FormData
                contentType: false, // important for FormData
                success: function (response) {
                    console.log(response);

                    Swal.fire({
                        title: "Success!",
                        text: response.message,
                        icon: "success",
                        confirmButtonText: "OK",
                        timer: 3000, // 3 seconds
                        timerProgressBar: true,
                        willClose: () => {
                            $("#Financials-submit").prop("disabled", false);
                            $('#Financials').hide();
                            $("#Business-Intelligence").show();
                            $('#one_BI_FY1').attr('style', 'color:white;background-color:#1c9bf6');

                            $('#click-Business-Intelligence').addClass('report-tab-active').removeClass('report-tab-unactive');
                            $('#click-Financials').addClass('report-tab-unactive').removeClass('report-tab-active');

                        },
                    });
                },
                error: function (error) {
                    console.log(error);

                    $('#Financials-submit').prop('disabled', false);
                }
            });
        });


        $('#Business-Intelligence-step-form').on('submit', function (e) {
            e.preventDefault();


            var formData = new FormData(this);


            $('#submit-Business-Intelligence').prop('disabled', true);

            $.ajax({
                type: "POST",
                url: "{{ route('team.update_Business_Intelligence') }}",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: formData,
                dataType: "json",
                processData: false, // important for FormData
                contentType: false, // important for FormData
                success: function (response) {
                    console.log(response);

                    Swal.fire({
                        title: "Success!",
                        text: response.message,
                        icon: "success",
                        confirmButtonText: "OK",
                        timer: 3000, // 3 seconds
                        timerProgressBar: true,
                        willClose: () => {
                            $("#submit-Business-Intelligence").prop("disabled", false);
                            $('#Business-Intelligence').hide();
                            $("#Tax-Return-and-Credit").show();


                            $('#click-Tax-Return-and-Credit').addClass('report-tab-active').removeClass('report-tab-unactive');
                            $('#click-Business-Intelligence').addClass('report-tab-unactive').removeClass('report-tab-active');

                        },
                    });
                },
                error: function (error) {
                    console.log(error);

                    $('#submit-Business-Intelligence').prop('disabled', false);
                }
            });
        });


        $('#Tax-Return-and-Credit-step-form').on('submit', function (e) {
            e.preventDefault();


            var formData = new FormData(this);


            $('#Tax-Return-and-Credit-submit').prop('disabled', true);

            $.ajax({
                type: "POST",
                url: "{{ route('team.update_Tax_Return_and_Credit') }}",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: formData,
                dataType: "json",
                processData: false, // important for FormData
                contentType: false, // important for FormData
                success: function (response) {
                    console.log(response);

                    Swal.fire({
                        title: "Success!",
                        text: response.message,
                        icon: "success",
                        confirmButtonText: "OK",
                        timer: 3000, // 3 seconds
                        timerProgressBar: true,
                        willClose: () => {
                            $("#Tax-Return-and-Credit-submit").prop("disabled", false);
                            $('#Tax-Return-and-Credit').hide();
                            $("#Market-Reputation").show();


                            $('#click-Market-Reputation').addClass('report-tab-active').removeClass('report-tab-unactive');
                            $('#click-Tax-Return-and-Credit').addClass('report-tab-unactive').removeClass('report-tab-active');

                        },
                    });
                },
                error: function (error) {
                    console.log(error);

                    $('#Tax-Return-and-Credit-submit').prop('disabled', false);
                }
            });
        });

        $('#Market-Reputatio-step-form').on('submit', function (e) {
            e.preventDefault();


            var formData = new FormData(this);


            $('#submit-Market-Reputation').prop('disabled', true);

            $.ajax({
                type: "POST",
                url: "{{ route('team.update_Market_Reputation') }}",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: formData,
                dataType: "json",
                processData: false, // important for FormData
                contentType: false, // important for FormData
                success: function (response) {
                    console.log(response);

                    Swal.fire({
                        title: "Success!",
                        text: response.message,
                        icon: "success",
                        confirmButtonText: "OK",
                        timer: 3000, // 3 seconds
                        timerProgressBar: true,
                        willClose: () => {
                            $("#submit-Market-Reputation").prop("disabled", false);
                            $('#Market-Reputation').hide();
                            $("#Key-Observation").show();


                            $('#click-Key-Observation').addClass('report-tab-active').removeClass('report-tab-unactive');
                            $('#click-Market-Reputation').addClass('report-tab-unactive').removeClass('report-tab-active');

                        },
                    });
                },
                error: function (error) {
                    console.log(error);

                    $('#submit-Market-Reputation').prop('disabled', false);
                }
            });
        });

        $('#Key-Observation-step-form').on('submit', function (e) {
            e.preventDefault();


            var formData = new FormData(this);


            $('#Key-Observation-submit').prop('disabled', true);

            $.ajax({
                type: "POST",
                url: "{{ route('team.update_Key_Observation') }}",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: formData,
                dataType: "json",
                processData: false, // important for FormData
                contentType: false, // important for FormData
                success: function (response) {
                    console.log(response);

                    Swal.fire({
                        title: "Success!",
                        text: response.message,
                        icon: "success",
                        confirmButtonText: "OK",
                        timer: 3000, // 3 seconds
                        timerProgressBar: true,
                        willClose: () => {
                            $("#Key-Observation-submit").prop("disabled", false);
                            window.location.href = '{{ route("team.report_List") }}';

                        },
                    });
                },
                error: function (error) {
                    console.log(error);

                    $('#Key-Observation-submit').prop('disabled', false);
                }
            });
        });


        //  finding financial
        $('#Financials-next-1').on('click', function(){
            console.log('chages');
            $('#one_finding_FY1').attr('style', 'color:white;background-color:#1c9bf6');
        });
        $('#Financials-prev-2').on('click', function(){
            console.log('chages');
            $('#one_finding_FY1').attr('style', 'color:white;background-color:darkgray');
        });


        $('#Financials-next-2').on('click', function(){
            console.log('chages');
            $('#two_finding_FY1_2').attr('style', 'color:white;background-color:#1c9bf6');
        });
        $('#Financials-prev-3').on('click', function(){
            console.log('chages');
            $('#two_finding_FY1_2').attr('style', 'color:white;background-color:darkgray');
        });


        $('#Financials-next-3').on('click', function(){
            console.log('chages');
            $('#three_finding_FY1_3').attr('style', 'color:white;background-color:#1c9bf6');
        });
        $('#Financials-prev-4').on('click', function(){
            console.log('chages');
            $('#three_finding_FY1_3').attr('style', 'color:white;background-color:darkgray');
        });



        $('#Financials-next-4').on('click', function(){
            console.log('chages');
            $('#four_finding_FY1_4').attr('style', 'color:white;background-color:#1c9bf6');
        });
        $('#Financials-prev-5').on('click', function(){
            console.log('chages');
            $('#four_finding_FY1_4').attr('style', 'color:white;background-color:darkgray');
        });

        $('#Financials-next-5').on('click', function(){
            console.log('chages');
            $('#five_finding_FY1_5').attr('style', 'color:white;background-color:#1c9bf6');
        });
        $('#Financials-prev-6').on('click', function(){
            console.log('chages');
            $('#five_finding_FY1_5').attr('style', 'color:white;background-color:darkgray');
        });


        // ratio financial
        $('#Financials-next-6').on('click', function(){
            console.log('chages');
            $('#one_ratio_FY1').attr('style', 'color:white;background-color:#1c9bf6');
        });
        $('#Financials-prev-7').on('click', function(){
            console.log('chages');
            $('#one_ratio_FY1').attr('style', 'color:white;background-color:darkgray');
        });


        $('#Financials-next-7').on('click', function(){
            console.log('chages');
            $('#two_ratio_FY1_2').attr('style', 'color:white;background-color:#1c9bf6');
        });
        $('#Financials-prev-8').on('click', function(){
            console.log('chages');
            $('#two_ratio_FY1_2').attr('style', 'color:white;background-color:darkgray');
        });


        $('#Financials-next-8').on('click', function(){
            console.log('chages');
            $('#three_ratio_FY1_3').attr('style', 'color:white;background-color:#1c9bf6');
        });
        $('#Financials-prev-9').on('click', function(){
            console.log('chages');
            $('#three_ratio_FY1_3').attr('style', 'color:white;background-color:darkgray');
        });


        $('#Financials-next-9').on('click', function(){
            console.log('chages');
            $('#four_ratio_FY1_4').attr('style', 'color:white;background-color:#1c9bf6');
        });
        $('#Financials-prev-10').on('click', function(){
            console.log('chages');
            $('#four_ratio_FY1_4').attr('style', 'color:white;background-color:darkgray');
        });


        $('#Financials-next-10').on('click', function(){
            console.log('chages');
            $('#five_ratio_FY1_5').attr('style', 'color:white;background-color:#1c9bf6');
        });
        $('#Financials-prev-11').on('click', function(){
            console.log('chages');
            $('#five_ratio_FY1_5').attr('style', 'color:white;background-color:darkgray');
        });





        // =================== bussiness intellegence start ===================== //





             // Flag to check if any field is empty
             function applyStyleIfEmptyBI(fieldIds, containerId) {
                // Flag to check if any field is empty
                var isEmptyRatio = false;

                // Iterate through each input field ID
                $.each(fieldIds, function(index, fieldId) {
                    // Get the input field by ID
                    var inputField = $('#' + fieldId);

                    // Check if the value of the input field is empty
                    if (inputField.val() === '') {
                        // If empty, set the flag to true
                        isEmptyRatio = true;
                        // Exit the loop early if you only want to check if at least one field is empty
                        return false;
                    }
                });

                // Check if at least one field is empty and apply the style to the specified container
                if (isEmptyRatio) {
                    $('#' + containerId).attr('style', 'color:Black;background-color:#ff9f00');
                    $('#' + containerId + '_2').attr('style', 'color:Black;background-color:#ff9f00');
                    $('#' + containerId + '_3').attr('style', 'color:Black;background-color:#ff9f00');
                    $('#' + containerId + '_4').attr('style', 'color:Black;background-color:#ff9f00');
                    $('#' + containerId + '_5').attr('style', 'color:Black;background-color:#ff9f00');
                }
            }

            // Call the function for the first set of fields
            applyStyleIfEmptyBI([
                'operating_efficiency_BI_FY_one',
                'operating_efficiency_BI_analysis',

                'inventory_turnover_BI_FY_one',
                'inventory_turnover_BI_analysis',

                'days_sales_in_inventory_BI_FY_one',
                'days_sales_in_inventory_BI_analysis',

                'accounts_payable_turnover_BI_FY_one',
                'accounts_payable_turnover_BI_analysis',
                'efficiency_score',

            ], 'one_BI_FY1');

            applyStyleIfEmptyBI([
                'operating_efficiency_BI_FY_two',

                'inventory_turnover_BI_FY_two',

                'days_sales_in_inventory_BI_FY_two',

                'accounts_payable_turnover_BI_FY_two',

                // Add other field IDs here
            ], 'two_BI_FY1');


            applyStyleIfEmptyBI([
                'operating_efficiency_BI_FY_three',

                'inventory_turnover_BI_FY_three',

                'days_sales_in_inventory_BI_FY_three',

                'accounts_payable_turnover_BI_FY_three',
                // Add other field IDs here
            ], 'three_BI_FY1');


            applyStyleIfEmptyBI([
                'operating_efficiency_BI_FY_four',

                'inventory_turnover_BI_FY_four',

                'days_sales_in_inventory_BI_FY_four',

                'accounts_payable_turnover_BI_FY_four',
                // Add other field IDs here
            ], 'four_BI_FY1');


            applyStyleIfEmptyBI([
                'operating_efficiency_BI_FY_five',

                'inventory_turnover_BI_FY_five',

                'days_sales_in_inventory_BI_FY_five',

                'accounts_payable_turnover_BI_FY_five',
                // Add other field IDs here
            ], 'five_BI_FY1');
        // Bussiness intelligenec



        $('#click-Business-Intelligence').on('click', function(){
            console.log('chages');
            $('#one_BI_FY1').attr('style', 'color:white;background-color:#1c9bf6');
        });

        $('#BusinessIntelligence-next-1').on('click', function(){
            console.log('chages');
            $('#two_BI_FY1_2').attr('style', 'color:white;background-color:#1c9bf6');
        });

        $('#BusinessIntelligence-prev-2').on('click', function(){
            console.log('chages');
            $('#two_BI_FY1_2').attr('style', 'color:white;background-color:darkgray');
        });
        $('#BusinessIntelligence-next-2').on('click', function(){
            console.log('chages');
            $('#three_BI_FY1_3').attr('style', 'color:white;background-color:#1c9bf6');
        });
        $('#BusinessIntelligence-prev-3').on('click', function(){
            console.log('chages');
            $('#three_BI_FY1_3').attr('style', 'color:white;background-color:darkgray');
        });

        $('#BusinessIntelligence-next-3').on('click', function(){
            console.log('chages');
            $('#four_BI_FY1_4').attr('style', 'color:white;background-color:#1c9bf6');
        });
        $('#BusinessIntelligence-prev-4').on('click', function(){
            console.log('chages');
            $('#four_BI_FY1_4').attr('style', 'color:white;background-color:darkgray');
        });
        $('#BusinessIntelligence-next-4').on('click', function(){
            console.log('chages');
            $('#five_BI_FY1_5').attr('style', 'color:white;background-color:#1c9bf6');
        });

        $('#BusinessIntelligence-prev-5').on('click', function(){
            console.log('chages');
            $('#five_BI_FY1_5').attr('style', 'color:white;background-color:darkgray');
        });










        //==================== bussiness intellegence end  ===================== //







    });
</script>



@endsection
