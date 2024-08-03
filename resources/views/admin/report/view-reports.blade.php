@extends('admin.includes.master')
@section('addStyle')
<style>

.ct-chart .ct-series.ct-series-b .ct-slice-donut {
    stroke: #000000;
}

.ct-chart .ct-series.ct-series-a .ct-slice-donut {
    stroke: #9da09e;
}

</style>
@endsection
@section('content')



<div class="row">
    <div class="card">
        <div class="card-body justify-content-center">
            <div class="d-flex flex-row flex-nowrap">
                <a href="JavaScript:void(0)" id="click-Firm-Background"
                    class="btn btn-secondary report-tab-active border-round-tab  btn-sm mx-1 p-lg-3">Firm Background</a>
                    <a href="JavaScript:void(0)" id="click-Documents" class="btn btn-secondary report-tab-unactive border-round-tab btn-sm mx-1 p-lg-3">Documents</a>
                    <a href="JavaScript:void(0)" id="click-On-Ground-Verification"
                    class="btn btn-secondary report-tab-unactive border-round-tab btn-sm mx-1 p-lg-3">On Ground
                    Verification</a>
                <a href="JavaScript:void(0)" id="click-Court-Checks"
                    class="btn btn-secondary report-tab-unactive border-round-tab btn-sm mx-1 p-lg-3">Court
                    Checks</a>
                <a href="JavaScript:void(0)" id="click-Financials"
                    class="btn btn-secondary report-tab-unactive border-round-tab btn-sm mx-1 p-lg-3">Financials</a>
                <a href="JavaScript:void(0)" id="click-Business-Intelligence"
                    class="btn btn-secondary report-tab-unactive border-round-tab btn-sm mx-1 p-lg-3">Business
                    Intelligence</a>
                <a href="JavaScript:void(0)" id="click-Tax-Return-and-Credit"
                    class="btn btn-secondary report-tab-unactive border-round-tab btn-sm mx-1 p-lg-3">Tax Return and
                    Credit</a>
                <a href="JavaScript:void(0)" id="click-Market-Reputation"
                    class="btn btn-secondary report-tab-unactive border-round-tab btn-sm mx-1 p-lg-3">Market
                    Reputation</a>
                <a href="JavaScript:void(0)" id="click-Key-Observation"
                    class="btn btn-secondary report-tab-unactive border-round-tab btn-sm mx-1 p-lg-3">Key
                    Observation</a>
                <!-- Add similar code for other buttons as needed -->
            </div>
        </div>
    </div>
</div>

<!-- firm background tab start -->
    <div class="col-xl-12" id="tab-Firm-Background">
        <div class="card dz-card">

                <div class="tab-content" id="myTabContent">
                <div class="card-header flex-wrap border-0" id="default-tab">
                    <h4 class="card-title">Firm Background<br>
                        <p style="color:rgb(0, 0, 0); font-size:16px;"> <b>Client Name: {{isset($Getclient->first_name) ? $Getclient->first_name : ''}}</b><br>
                            <b>Vender Name:{{isset($getThirdPartyForID->third_party_name) ? $getThirdPartyForID->third_party_name : ''}} </b>
                        </p>
                        <b>Team Member Name:{{isset($GetTeaMuser->user_name) ? $GetTeaMuser->user_name : ''}} </b></p>
                    </h4>


                </div>
                    <div class="tab-pane fade show active" id="DefaultTab" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card-body pt-0">
                            <!-- Nav tabs -->
                            <div class="default-tab">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#Basic-Information"> Basic Information Registration/Licenses Director Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#Registrations-Licenses">
                                            Registrations/Licenses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#Director-Details"> Director/Proprietor/Partner Details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#Directorship-Check-Business-Conflict-Check"></i> Directorship Check Business Conflict Check</a>
                                    </li>

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="Basic-Information" role="tabpanel">
                                        <div class="pt-4">
                                            <div class="table-responsive">
                                                <table class="table primary-table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-4">Incorporation Year</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-8">{{ $FirmBackground->incorporation_year }}</th>
                                                        </tr>
                                                        <tr>
                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Directors</th>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">{{ $FirmBackground->no_of_directors }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Form of Entity</th>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">{{ $FirmBackground->form_of_entity }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Industry</th>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">{{ $FirmBackground->industry }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Address</th>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">{{ $FirmBackground->address }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Business Details</th>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">{{ $FirmBackground->business_details }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Registrations-Licenses">


                                        <div class="pt-4">
                                            <div class="table-responsive">
                                                <table class="table primary-table-bordered">
                                                    <thead class="thead-primary">
                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3 text-start">License Name</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3 text-start">License No.</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3 text-start">Date of Issuance</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3 text-start">Expiry Date</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" colspan="2" class="col-md-3 text-center">License</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @for ($i = 1; $i <= 8; $i++)
                                                            @if(!empty($License->{'license_name_'.$i}))
                                                                <tr>
                                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-2 text-start">{{$License->{'license_name_'.$i} }}</td>
                                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-2 text-start">{{$License->{'license_no_'.$i} }}</td>
                                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-2 text-start">{{$License->{'date_of_issuance_'.$i} }}</td>
                                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-2 text-start">{{$License->{'date_of_expiry_'.$i} }}</td>
                                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-2 text-start">
                                                                        @if(!empty($License->{'licenses_upload_file_'.$i}))
                                                                            <a href="{{ URL::to('/panel/report/firm_file_download'.'/'.base64_encode($License->id).'/'.$i) }}" target="" class="download-license-btn" style=" width: 100px;  text-align: center; ">Download </a>
                                                                        @else
                                                                            <!-- Handle if document doesn't exist -->
                                                                            <a  class="download-license-btn" style=" width: 200px;  text-align: center; ">N/A</a>
                                                                        @endif
                                                                    </td>
                                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-2 text-end">
                                                                        @if(!empty($License->{'licenses_upload_file_'.$i}))
                                                                            <a href="{{ URL::to('/panel/report/firm_file_view'.'/'.base64_encode($License->id).'/'.$i) }}" target="" class="download-license-btn" style=" width: 200px;  text-align: center; ">View</a>
                                                                        @else
                                                                            <!-- Handle if document doesn't exist -->
                                                                            <a  class="download-license-btn" style=" width: 200px;  text-align: center; ">N/A</a>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endfor

                                                        <tr>
                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 text-start">Ofac Check</th>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 text-start">{{$FirmBackground->ofac_check}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 text-start"></td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 text-start"></td>

                                                        </tr>
                                                        <tr>
                                                            <th style="font-size: 18px; font-weight: bolder; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 text-start">Regulatory Score = {{$FirmBackground->regulatory_score}}</th>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 text-start"></td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 text-start"></td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 text-start"></td>


                                                        </tr>

                                                        <tr>

                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 text-start">Score Analysis</th>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="3" class="col-md-3 text-start">{{$FirmBackground->score_analysis}}</td>


                                                        </tr>
                                                        <!-- <tr>
                                                            <td style="text-align-last: center; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="4" class="col-md-3">
                                                            <a href="{{ URL::to('/panel/report/firm_file_download'.'/'.base64_encode($FirmBackground->id)) }}" class="download-license-btn" style="display: inline-block; width: 200px;  text-align: center; ">Download Licenses</a>
                                                                <a href="{{ URL::to('/panel/report/firm_file_view'.'/'.base64_encode($FirmBackground->id)) }}" target="" class="download-license-btn" style="display: inline-block; width: 200px;  text-align: center; ">View Licenses</a>
                                                            </td>

                                                        </tr> -->
                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Director-Details">
                                        <div class="pt-4">
                                            <div class="table-responsive">
                                                <table class="table primary-table-bordered">

                                        <tbody>
                                                 <!-- director 2 -->


                                            @for($i = 1; $i <= 10; $i++)
                                            @if(!empty($FirmBackground->{'name_'.$i}) || isset($FirmBackground->{'name_'.$i}))
                                            <tr>
                                                    <th style="background-color: #5a595a; color: white;" scope="col"
                                                        class="col-md-4"> Name ({{ $i }})</th>
                                                    <th style="background-color: #5a595a; color: white;" scope="col"
                                                        class="col-md-8"> {{$FirmBackground->{'name_'.$i} }}</th>
                                                </tr>
                                                <tr>
                                                    <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">PAN</th>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8"> {{$FirmBackground->{'pan_'.$i} }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">AADHAR</th>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8"> {{$FirmBackground->{'aadhar_'.$i} }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">Educational Background</th>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8"> {{$FirmBackground->{'educational_background_'.$i} }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                    class="col-md-4">DIN</th>
                                                <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                    class="col-md-8"> {{$FirmBackground->{'din_'.$i} }}
                                                </td>
                                            </tr>
                                            @endif
                                            @endfor
                                                <!-- <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">Credit Score</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->credit_score }}</td>
                                                </tr> -->


                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Directorship-Check-Business-Conflict-Check">
                                        <div class="pt-4">
                                            <div class="table-responsive">
                                                <table class="table primary-table-bordered">
                                                    <thead class="thead-primary">
                                                        <tr>



                                                        </tr>



                                                    </thead>
                                                    <tbody>
                                                        @for($i = 1; $i <= 8; $i++)
                                                        @if(!empty($FirstDirectorsFirm->{'director_name_1_'.$i}))
                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">
                                                                {{$FirstDirectorsFirm->{'director_name_1_'.$i} }}
                                                                </th>
                                                        </tr>

                                                        <tr>
                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</th>
                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</th>

                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</th>
                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</th>

                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</th>
                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">
                                                                {{$FirstDirectorsFirm->{'company_name_1_'.$i} }}

                                                            </td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">
                                                                {{$FirstDirectorsFirm->{'cin_1_'.$i} }}

                                                            </td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">
                                                                {{$FirstDirectorsFirm->{'company_status_1_'.$i} }}

                                                            </td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">
                                                                {{$FirstDirectorsFirm->{'appointment_date_1_'.$i} }}

                                                            </td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">
                                                                {{$FirstDirectorsFirm->{'business_of_entity_1_'.$i} }}

                                                            </td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">
                                                                {{$FirstDirectorsFirm->{'business_conflict_1_'.$i} }}

                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @endfor




                                                <!-----------------===========================================    second director      ============================================================  -->
                                                @for($i = 1; $i <= 8; $i++)
                                                        @if(!empty($SecondDirectorsFirm->{'director_name_2_'.$i}))
                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name (2)</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">
                                                                {{$SecondDirectorsFirm->{'director_name_2_'.$i} }}
                                                                </th>
                                                        </tr>

                                                        <tr>
                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</th>
                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</th>

                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</th>
                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</th>

                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</th>
                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">
                                                                {{$SecondDirectorsFirm->{'company_name_2_'.$i} }}

                                                            </td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">
                                                                {{$SecondDirectorsFirm->{'cin_2_'.$i} }}

                                                            </td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">
                                                                {{$SecondDirectorsFirm->{'company_status_2_'.$i} }}

                                                            </td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">
                                                                {{$SecondDirectorsFirm->{'appointment_date_2_'.$i} }}

                                                            </td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">
                                                                {{$SecondDirectorsFirm->{'business_of_entity_2_'.$i} }}

                                                            </td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">
                                                                {{$SecondDirectorsFirm->{'business_conflict_2_'.$i} }}

                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @endfor




                                            <!-----------------===========================================    third director      ============================================================  -->


                                            @for($i = 1; $i <= 8; $i++)
                                            @if(!empty($ThirdDirectorsFirm->{'director_name_3_'.$i}))
                                            <tr>
                                                <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name (3)</th>
                                                <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">
                                                    {{$ThirdDirectorsFirm->{'director_name_3_'.$i} }}
                                                    </th>
                                            </tr>

                                            <tr>
                                                <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</th>
                                                <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</th>

                                                <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</th>
                                                <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</th>

                                                <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</th>
                                                <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</th>
                                            </tr>
                                            <tr>
                                                <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">
                                                    {{$ThirdDirectorsFirm->{'company_name_3_'.$i} }}

                                                </td>
                                                <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">
                                                    {{$ThirdDirectorsFirm->{'cin_3_'.$i} }}

                                                </td>
                                                <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">
                                                    {{$ThirdDirectorsFirm->{'company_status_3_'.$i} }}

                                                </td>

                                                <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">
                                                    {{$ThirdDirectorsFirm->{'appointment_date_3_'.$i} }}

                                                </td>
                                                <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">
                                                    {{$ThirdDirectorsFirm->{'business_of_entity_3_'.$i} }}

                                                </td>

                                                <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">
                                                    {{$ThirdDirectorsFirm->{'business_conflict_3_'.$i} }}

                                                </td>
                                            </tr>
                                            @endif
                                            @endfor





                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
<!-- firm background tab End -->
<!-- document Report  start-->
<div class="col-xl-12" id="tab-document-report">
        <div class="card dz-card">

            <div class="tab-content" id="myTabContent">
                <div class="card-header flex-wrap border-0" id="default-tab">
                </div>
                <div class="tab-pane fade show active" id="DefaultTab" role="tabpanel" aria-labelledby="home-tab">
                    <div class="card-body pt-0">
                        <!-- Nav tabs -->
                        <div class="default-tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#ON-GROUND VERIFICATION "> Document</a>
                                </li>


                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="ON-GROUND VERIFICATION " role="tabpanel">
                                    <div class="pt-4">
                                        <div class="table-responsive">
                                        <table class="table primary-table-bordered">
                                                    <thead class="thead-primary">
                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3 text-start">Document Name</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3 text-start">Document No.</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3 text-start">Date of Issuance</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3 text-start">Expiry Date</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" colspan="2" class="col-md-3 text-center">Documents</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @for ($i = 1; $i <= 18; $i++)
                                                            @if(!empty($Document->{'document_name_'.$i}))
                                                                <tr>
                                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-2 text-start">{{$Document->{'document_name_'.$i} }}</td>
                                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-2 text-start">{{$Document->{'document_number_'.$i} }}</td>
                                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-2 text-start">{{$Document->{'document_date_of_issuance_'.$i} }}</td>
                                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-2 text-start">{{$Document->{'document_date_of_expiry_'.$i} }}</td>
                                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-2 text-start">
                                                                        @if(!empty($Document->{'document_upload_file'.$i}))
                                                                            <a href="{{ URL::to('/panel/report/document_file_download'.'/'.base64_encode($Document->id).'/'.$i) }}" target="" class="download-license-btn" style=" width: 100px;  text-align: center; ">Download </a>
                                                                        @else
                                                                            <!-- Handle if document doesn't exist -->
                                                                            <a  class="download-license-btn" style=" width: 200px;  text-align: center; ">N/A</a>
                                                                        @endif
                                                                    </td>
                                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-2 text-end">
                                                                        @if(!empty($Document->{'document_upload_file'.$i}))
                                                                            <a href="{{ URL::to('/panel/report/document_file_view'.'/'.base64_encode($Document->id).'/'.$i) }}" target="" class="download-license-btn" style=" width: 200px;  text-align: center; ">View</a>
                                                                        @else
                                                                            <!-- Handle if document doesn't exist -->
                                                                            <a  class="download-license-btn" style=" width: 200px;  text-align: center; ">N/A</a>
                                                                        @endif
                                                                    </td>

                                                                </tr>
                                                            @endif
                                                        @endfor



                                                    </tbody>
                                                </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- document reports end -->
<!-- on ground verification tab start -->
    <div class="col-xl-12" id="tab-On-Ground-Verification">
        <div class="card dz-card">

            <div class="tab-content" id="myTabContent">
                <div class="card-header flex-wrap border-0" id="default-tab">
                </div>
                <div class="tab-pane fade show active" id="DefaultTab" role="tabpanel" aria-labelledby="home-tab">
                    <div class="card-body pt-0">
                        <!-- Nav tabs -->
                        <div class="default-tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#ON-GROUND VERIFICATION "> On Ground Verification</a>
                                </li>


                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="ON-GROUND VERIFICATION " role="tabpanel">
                                    <div class="pt-4">
                                        <div class="table-responsive">
                                            <table class="table primary-table-bordered">
                                                <thead class="thead-primary">


                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-4">Particular</th>
                                                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-8">Details</th>

                                                    </tr>
                                                    <tr>
                                                        <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Address</th>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">{{$OnGroundVerification->address_details}} </td>
                                                    </tr>
                                                    <tr>
                                                        <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Address Visit Findings</th>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">{{$OnGroundVerification->address_visit_findings}}</td>
                                                    </tr>

                                                    <tr>
                                                        <th colspan="2" style="font-size: 18px; font-weight: bolder; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4 text-start">ON-GROUND VERIFICATION SCORE = {{$OnGroundVerification->on_ground_verification_score}}</th>

                                                    </tr>
                                                    <tr>
                                                        <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Score Analysis</th>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">{{$OnGroundVerification->score_analysis}}</td>
                                                    </tr>

                                                    <tr>
                                                        <td style=" text-align-last: center; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="2"  class="col-md-4">
                                                        <a href="{{ URL::to('/panel/report/onGround_file_download'.'/'. base64_encode($OnGroundVerification->id)) }}" class="download-license-btn" style="display: inline-block; width: 200px;  text-align: center; ">Download PDF or Image</a>

                                                        <a href="{{ URL::to('/panel/report/onGround_file_view'.'/'. base64_encode($OnGroundVerification->id)) }}" target="" class="download-license-btn" style="display: inline-block; width: 200px;text-align: center; ">View Report</a>
                                                    </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<!-- on ground verification tab End -->
<!-- court check tab start -->
    <div class="col-xl-12" id="tab-Court-Checks">
        <div class="card dz-card">

            <div class="tab-content" id="myTabContent">
                <div class="card-header flex-wrap border-0" id="default-tab">



                </div>
                <div class="tab-pane fade show active" id="DefaultTab" role="tabpanel" aria-labelledby="home-tab">
                    <div class="card-body pt-0">
                        <!-- Nav tabs -->
                        <div class="default-tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#Court-check-of-directors">Court check of directors</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#Court-Check-Of-Company">
                                        Court Check Of Company</a>
                                </li>


                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="Court-check-of-directors" role="tabpanel">
                                    <div class="pt-4">
                                        <div class="table-responsive">
                                            <table class="table primary-table-bordered">
                                                <thead class="thead-primary">


                                                </thead>
                                                <tbody>
            @for ($i = 1; $i <= 5; $i++)
                @if (!empty($CourtCheck->{'director_name_' . $i}))
            <tr>

                <th style="background-color: #5a595a; color: white;" scope="col"
                                                        class="col-md-4">Name</th>
                                                    <th style="background-color: #5a595a; color: white;" colspan="2"
                                                        scope="col" class="col-md-8"> {{ $CourtCheck->{'director_name_' . $i} }}
                                                    </th>
            </tr>
            <tr>
                                                    <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">Jurisdiction</th>
                                                    <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">Record</th>
                                                    <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">Subject Matter</th>
                                                </tr>
            <tr>
                <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">
                    {{ $CourtCheck->{'director_jurisdiction_' . $i} }}
                </td>
                <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">
                    {{ $CourtCheck->{'director_record_' . $i} }}
                </td>
                <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">
                    {{ $CourtCheck->{'director_subject_matter_' . $i} }}
                </td>
            </tr>
        @endif
            @endfor

    <tr>
        <td style="font-size: 16px; font-weight: bolder; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">
            LEGAL SCORE = {{ $CourtCheck->legal_score }}
        </td>
    </tr>

    <tr>
        <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
            class="col-md-4">Score Analysis</th>
        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
            class="col-md-4"> {{ $CourtCheck->score_analysis }}</td>

    </tr>
</tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Court-Check-Of-Company">
                                    <div class="pt-4">
                                        <div class="table-responsive">
                                            <table class="table primary-table-bordered">
                                                <thead class="thead-primary">


                                                </thead>
                                                <tbody>
    @for ($i = 1; $i <= 5; $i++)
        @if (!empty($CourtCheck->{'director_name_' . $i}))
            <tr>
            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-4">Name</th>
            <th style="background-color: #5a595a; color: white;" colspan="2"scope="col" class="col-md-8">
                    {{ $CourtCheck->{'director_name_' . $i} }}
                </th>
            </tr>
            <tr>
                                                    <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">Jurisdiction</td>
                                                    <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">Record</th>
                                                    <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">Subject Matter</td>
                                                </tr>
            <tr>
                <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">
                    {{ $CourtCheck->{'company_jurisdiction_' . $i} }}
                </td>
                <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">
                    {{ $CourtCheck->{'company_record_' . $i} }}
                </td>
                <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">
                    {{ $CourtCheck->{'company_subject_matter_' . $i} }}
                </td>
            </tr>
        @endif
    @endfor


</tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

         </div>
    </div>
<!-- court check tab End -->
<!-- Financials tab start -->
    <div class="col-xl-12" id="tab-Financials">
        <div class="card dz-card">

            <div class="tab-content" id="myTabContent">
                <div class="card-header flex-wrap border-0" id="default-tab">
                    <h4 class="card-title">Financials<br>

                    </h4>


                </div>
                <div class="tab-pane fade show active" id="DefaultTab" role="tabpanel" aria-labelledby="home-tab">
                    <div class="card-body pt-0">
                        <!-- Nav tabs -->
                        <div class="default-tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#ChargesontheEntityFinancialFindingsRatioAnalysis"> Charges on the Entity Financial Findings Ratio Analysis</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#Financial-Findings"> Financial Findings</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#Ratio-Analysis"> Ratio Analysis</a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="ChargesontheEntityFinancialFindingsRatioAnalysis" role="tabpanel">
                                    <div class="pt-4">
                                        <div class="table-responsive">
                                            <table class="table primary-table-bordered">
                                                <thead class="thead-primary">
                                                    </thead>
                                                    <tbody>




                                                    @for ($i = 1; $i <= 4; $i++)
                                                    @if (!empty($Financial->{'name_' . $i}))
                                                    <tr>
                                                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3">Name</th>
                                                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3">Status</th>
                                                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3">Amount</th>
                                                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3">Charged Property</th>
                                                    </tr>
                                                    <tr>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">  {{ $Financial->{'name_' . $i} }}</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3"> {{ $Financial->{'status_' . $i} }}</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{ $Financial->{'amount_' . $i} }}</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3"> {{ $Financial->{'charged_property_' . $i} }}</td>
                                                    </tr>
                                                    @endif
                                                    @endfor


                                                    <tr>
                                                        <td style=" font-size: 18px; font-weight: bolder; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="3"  class="col-md-3"><b></b>FINANCIAL SCORE = {{ $Financial->overall_financial_score }} </b></td>

                                                    </tr>

                                                    <tr>
                                                        <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-3"> Socre Analysis</th>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1" class="col-md-3">{{ $Financial->score_analysis }}</td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="Financial-Findings">
                                    <div class="pt-4">
                                        <div class="table-responsive">
                                            <div class="row">

                                                @php

                                                function areAllValuesNull($array) {
                                                    return count(array_filter($array, function($value) {
                                                        return $value !== null;
                                                    })) === 0;
                                                }
                                                @endphp

                                                 @if (isset($financialFindingsGrapFY_revenue) && areAllValuesNull($financialFindingsGrapFY_revenue) ==false && count($financialFindingsGrapFY_revenue) > 0)

                                                <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            {{ $Financial->revenue_fy_one_finding_heading_graph ?  $Financial->revenue_fy_one_finding_heading_graph : "" }}</h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_1" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif

                                                 @if (isset($financialFindingsGrapFY_net_profit) && areAllValuesNull($financialFindingsGrapFY_net_profit) ==false && count($financialFindingsGrapFY_net_profit) > 0)

                                                <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            {{ $Financial->net_profit_fy_one_finding_heading_graph ?  $Financial->net_profit_fy_one_finding_heading_graph : "" }}
                                                             </h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_NetProfit" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif

                                                 @if (isset($financialFindingsGrapFY_gross_profit) && areAllValuesNull($financialFindingsGrapFY_gross_profit) ==false && count($financialFindingsGrapFY_gross_profit) > 0)

                                                <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            {{ $Financial->gross_profit_fy_one_finding_heading_graph ?  $Financial->gross_profit_fy_one_finding_heading_graph  : "" }}

                                                        </h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_GrossProfit" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif

                                                 @if (isset($financialFindingsGrapFY_working_capital_1) && areAllValuesNull($financialFindingsGrapFY_working_capital_1) ==false && count($financialFindingsGrapFY_working_capital_1) > 0)

                                                <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                                {{ $Financial->working_capital_1_fy_one_finding_heading_graph ?  $Financial->working_capital_1_fy_one_finding_heading_graph  : "" }}


                                                        </h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_WorkingCapital" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif






                                                 @if (isset($financialFindingsGrapFY_quick_assets) && areAllValuesNull($financialFindingsGrapFY_quick_assets) ==false && count($financialFindingsGrapFY_quick_assets) > 0)

                                                <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                                {{ $Financial->quick_assets_fy_one_finding_heading_graph ?  $Financial->quick_assets_fy_one_finding_heading_graph  : "" }}
                                                              </h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_QuickAssets" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif

                                                 @if (isset($financialFindingsGrapFY_total_assets) && areAllValuesNull($financialFindingsGrapFY_total_assets) ==false && count($financialFindingsGrapFY_total_assets) > 0)

                                                <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                                {{ $Financial->total_assets_fy_one_finding_heading_graph ?  $Financial->total_assets_fy_one_finding_heading_graph  : "" }}
                                                               </h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_TotalAssets" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif

                                                 @if (isset($financialFindingsGrapFY_current_assets) && areAllValuesNull($financialFindingsGrapFY_current_assets) ==false && count($financialFindingsGrapFY_current_assets) > 0)

                                                 <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                     <div class="card">
                                                         <h4
                                                         class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                                {{ $Financial->current_assets_fy_one_finding_heading_graph ?  $Financial->current_assets_fy_one_finding_heading_graph  : "" }}
                                                           </h4>
                                                         <div class="d-flex justify-content-center align-items-center">
                                                             <canvas id="barChart_CurrentAssets" width="100px"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                 @if (isset($financialFindingsGrapFY_current_liabilities) && areAllValuesNull($financialFindingsGrapFY_current_liabilities) ==false && count($financialFindingsGrapFY_current_liabilities) > 0)

                                                <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                                {{ $Financial->current_liabilities_fy_one_finding_heading_graph ?  $Financial->current_liabilities_fy_one_finding_heading_graph  : "" }}
                                                              </h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_CurrentLiabilities" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif


                                                 @if (isset($financialFindingsGrapFY_debt) && areAllValuesNull($financialFindingsGrapFY_debt) ==false && count($financialFindingsGrapFY_debt) > 0)

                                                 <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                     <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            {{ $Financial->debt_fy_one_finding_heading_graph ?  $Financial->debt_fy_one_finding_heading_graph  : "" }}
                                                                    </h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_Debt" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                 @if (isset($financialFindingsGrapFY_average_inventory) && areAllValuesNull($financialFindingsGrapFY_average_inventory) ==false && count($financialFindingsGrapFY_average_inventory) > 0)

                                                 <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                     <div class="card">
                                                         <h4
                                                         class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            {{ $Financial->average_inventory_fy_one_finding_heading_graph ?  $Financial->average_inventory_fy_one_finding_heading_graph  : "" }}
                                                           </h4>
                                                         <div class="d-flex justify-content-center align-items-center">
                                                             <canvas id="barChart_AverageInventory" width="100px"></canvas>
                                                            </div>
                                                        </div>
                                                </div>
                                                @endif
                                                 @if (isset($financialFindingsGrapFY_net_sales) && areAllValuesNull($financialFindingsGrapFY_net_sales) ==false && count($financialFindingsGrapFY_net_sales) > 0)

                                                 <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                     <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            {{ $Financial->net_sales_fy_one_finding_heading_graph ?  $Financial->net_sales_fy_one_finding_heading_graph  : "" }}
                                                              </h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_NetSales" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                 @if (isset($financialFindingsGrapFY_equity_share_capital) && areAllValuesNull($financialFindingsGrapFY_equity_share_capital) ==false && count($financialFindingsGrapFY_equity_share_capital) > 0)

                                                 <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                     <div class="card">
                                                         <h4
                                                         class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            {{ $Financial->equity_share_capital_fy_one_finding_heading_graph ?  $Financial->equity_share_capital_fy_one_finding_heading_graph  : "" }}
                                                         </h4>
                                                         <div class="d-flex justify-content-center align-items-center">
                                                             <canvas id="barChart_ShareCapital" width="100px"></canvas>
                                                            </div>
                                                        </div>
                                                </div>
                                                @endif






                                                 @if (isset($financialFindingsGrapFY_sundry_debtors) && areAllValuesNull($financialFindingsGrapFY_sundry_debtors) ==false && count($financialFindingsGrapFY_sundry_debtors) > 0)

                                                 <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                     <div class="card">
                                                        <h4
                                                        class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            {{ $Financial->sundry_debtors_fy_one_finding_heading_graph ?  $Financial->sundry_debtors_fy_one_finding_heading_graph  : "" }}
                                                              </h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_SundryDebtors" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @if (isset($financialFindingsGrapFY_sundry_creditors) && areAllValuesNull($financialFindingsGrapFY_sundry_creditors) ==false && count($financialFindingsGrapFY_sundry_creditors) > 0)

                                                <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                        class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            {{ $Financial->sundry_creditors_fy_one_finding_heading_graph ?  $Financial->sundry_creditors_fy_one_finding_heading_graph  : "" }}
                                                          </h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_SundryCreditors" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                 @if (isset($financialFindingsGrapFY_loans_and_advances) && areAllValuesNull($financialFindingsGrapFY_loans_and_advances) ==false && count($financialFindingsGrapFY_loans_and_advances) > 0)

                                                 <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                     <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            {{ $Financial->loans_and_advances_fy_one_finding_heading_graph ?  $Financial->loans_and_advances_fy_one_finding_heading_graph  : "" }}
                                                              </h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_LoansAndAdvances" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                 @if (isset($financialFindingsGrapFY_cash_and_cash_equivalents) && areAllValuesNull($financialFindingsGrapFY_cash_and_cash_equivalents) ==false && count($financialFindingsGrapFY_cash_and_cash_equivalents) > 0)

                                                 <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                     <div class="card">
                                                         <h4
                                                         class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            {{ $Financial->cash_and_cash_equivalents_fy_one_finding_heading_graph ?  $Financial->cash_and_cash_equivalents_fy_one_finding_heading_graph  : "" }}
                                                           </h4>
                                                         <div class="d-flex justify-content-center align-items-center">
                                                             <canvas id="barChart_CashAndCashEquivalents" width="100px"></canvas>
                                                            </div>
                                                        </div>
                                                </div>
                                                @endif




                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Ratio-Analysis">
                                    <div class="pt-4">
                                        <div class="table-responsive">
                                            <div class="row">

                                             @if (isset($financialrationGrapFY_current_ratio) && areAllValuesNull($financialrationGrapFY_current_ratio) ==false && count($financialrationGrapFY_current_ratio) > 0)

                                             <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                 <div class="card">
                                                     <h4
                                                     class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                     {{ $Financial->current_ratio_fy_one_ratio_heading_graph  ?  $Financial->current_ratio_fy_one_ratio_heading_graph : "" }}

                                                    </h4>
                                                     <div class="d-flex justify-content-center align-items-center">
                                                         <canvas id="barChart_financialRation"></canvas>
                                                        </div>
                                                        <hr>
                                                        <h3
                                                        class="card-title d-flex justify-content-center align-items-center">
                                                          Analysis</h3>
                                                        <p class="d-flex justify-content-center align-items-center text-center">
                                                            {{ isset($FinancialsRatioAnalysisFyOne->current_ratio_analysis_fy_one_1) ? $FinancialsRatioAnalysisFyOne->current_ratio_analysis_fy_one_1 : 'N/A' }}

                                                           </p>
                                                </div>
                                            </div>
                                            @endif





                                            @if (isset($financialrationGrapFY_quick_ratio) && areAllValuesNull($financialrationGrapFY_quick_ratio) ==false && count($financialrationGrapFY_quick_ratio) > 0)

                                            <div class="col-xl-4  col-sm-4 col-4 mt-4 mt-md-0">
                                                <div class="card">
                                                    <h4
                                                    class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                    {{ $Financial->quick_ratio_fy_one_ratio_heading_graph  ?  $Financial->quick_ratio_fy_one_ratio_heading_graph : "" }}

                                                </h4>
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <canvas id="barChart_QuickRatio"></canvas>
                                                    </div>
                                                    <hr>
                                                    <h3
                                                    class="card-title d-flex justify-content-center align-items-center">
                                                      Analysis</h3>
                                                    <p class="d-flex justify-content-center align-items-center text-center">
                                                        {{ isset($FinancialsRatioAnalysisFyOne->quick_ratio_analysis_fy_one_1) ? $FinancialsRatioAnalysisFyOne->quick_ratio_analysis_fy_one_1 : 'N/A' }}

                                                       </p>
                                                    </div>
                                                </div>
                                                    @endif
                                                @if (isset($financialrationGrapFY_debt_ratio) && areAllValuesNull($financialrationGrapFY_debt_ratio) ==false && count($financialrationGrapFY_debt_ratio) > 0)

                                                <div class="col-xl-4  col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            {{ $Financial->debt_ratio_fy_one_ratio_heading_graph  ?  $Financial->debt_ratio_fy_one_ratio_heading_graph : "" }}

                                                        </h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_DebtRatio"></canvas>
                                                        </div>
                                                        <hr>
                                                        <h3
                                                        class="card-title d-flex justify-content-center align-items-center">
                                                          Analysis</h3>
                                                        <p class="d-flex justify-content-center align-items-center text-center">
                                                            {{ isset($FinancialsRatioAnalysisFyOne->debt_ratio_analysis_fy_one_1) ? $FinancialsRatioAnalysisFyOne->debt_ratio_analysis_fy_one_1 : 'N/A' }}

                                                           </p>
                                                    </div>
                                                </div>
                                                @endif
                                                @if (isset($financialrationGrapFY_solvency_ratio) && areAllValuesNull($financialrationGrapFY_solvency_ratio) ==false && count($financialrationGrapFY_solvency_ratio) > 0)

                                                @endif
                                                <div class="col-xl-4  col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            {{ $Financial->solvency_ratio_fy_one_ratio_heading_graph  ?  $Financial->solvency_ratio_fy_one_ratio_heading_graph : "" }}
                                                        </h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_SolvencyRatio"></canvas>
                                                        </div>
                                                        <hr>
                                                        <h3
                                                        class="card-title d-flex justify-content-center align-items-center">
                                                          Analysis</h3>
                                                        <p class="d-flex justify-content-center align-items-center text-center">
                                                            {{ isset($FinancialsRatioAnalysisFyOne->solvency_ratio_analysis_fy_one_1) ? $FinancialsRatioAnalysisFyOne->solvency_ratio_analysis_fy_one_1 : 'N/A' }}

                                                           </p>
                                                    </div>
                                                </div>


                                                 @if (isset($financialrationGrapFY_debt_to_equity_ratio) && areAllValuesNull($financialrationGrapFY_debt_to_equity_ratio) ==false && count($financialrationGrapFY_debt_to_equity_ratio) > 0)

                                                 <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                     <div class="card">
                                                         <h4
                                                         class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                         {{ $Financial->debt_to_equity_ratio_fy_one_ratio_heading_graph  ?  $Financial->debt_to_equity_ratio_fy_one_ratio_heading_graph : "" }}

                                                        </h4>
                                                         <div class="d-flex justify-content-center align-items-center">
                                                             <canvas id="barChart_DebtToEquityRatio"></canvas>
                                                            </div>
                                                            <hr>
                                                            <h3
                                                            class="card-title d-flex justify-content-center align-items-center">
                                                              Analysis</h3>
                                                            <p class="d-flex justify-content-center align-items-center text-center">
                                                                {{ isset($FinancialsRatioAnalysisFyOne->debt_to_equity_ratio_analysis_fy_one_1) ? $FinancialsRatioAnalysisFyOne->debt_to_equity_ratio_analysis_fy_one_1 : 'N/A' }}

                                                               </p>
                                                        </div>
                                                    </div>
                                                    @endif
                                                 @if (isset($financialrationGrapFY_asset_turnover_ratio) && areAllValuesNull($financialrationGrapFY_asset_turnover_ratio) ==false && count($financialrationGrapFY_asset_turnover_ratio) > 0)

                                                 <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                     <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            {{ $Financial->asset_turnover_ratio_fy_one_ratio_heading_graph  ?  $Financial->asset_turnover_ratio_fy_one_ratio_heading_graph : "" }}

                                                        </h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_AssetTurnoverRatio"></canvas>
                                                        </div>
                                                         <hr>
                                                        <h3
                                                        class="card-title d-flex justify-content-center align-items-center">
                                                          Analysis</h3>
                                                        <p class="d-flex justify-content-center align-items-center text-center">
                                                            {{ isset($FinancialsRatioAnalysisFyOne->asset_turnover_ratio_analysis_fy_one_1) ? $FinancialsRatioAnalysisFyOne->asset_turnover_ratio_analysis_fy_one_1 : 'N/A' }}

                                                           </p>
                                                    </div>
                                                </div>
                                                @endif
                                                 @if (isset($financialrationGrapFY_absolute_liquidity_ratio) && areAllValuesNull($financialrationGrapFY_absolute_liquidity_ratio) ==false && count($financialrationGrapFY_absolute_liquidity_ratio) > 0)

                                                 <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                        class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                        {{ $Financial->absolute_liquidity_ratio_fy_one_ratio_heading_graph  ?  $Financial->absolute_liquidity_ratio_fy_one_ratio_heading_graph : "" }}

                                                    </h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_AbsoluteLiquidityRatio"></canvas>
                                                        </div>
                                                         <hr>
                                                        <h3
                                                        class="card-title d-flex justify-content-center align-items-center">
                                                          Analysis</h3>
                                                        <p class="d-flex justify-content-center align-items-center text-center">
                                                            {{ isset($FinancialsRatioAnalysisFyOne->absolute_liquidity_ratio_analysis_fy_one_1) ? $FinancialsRatioAnalysisFyOne->absolute_liquidity_ratio_analysis_fy_one_1 : 'N/A' }}

                                                           </p>
                                                    </div>
                                                </div>
                                                @endif
                                                 @if (isset($financialrationGrapFY_proprietary_ratio) && areAllValuesNull($financialrationGrapFY_proprietary_ratio) ==false && count($financialrationGrapFY_proprietary_ratio) > 0)

                                                 <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                     <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            {{ $Financial->proprietary_ratio_fy_one_ratio_heading_graph  ?  $Financial->proprietary_ratio_fy_one_ratio_heading_graph : "" }}

                                                        </h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_ProprietaryRatio"></canvas>
                                                        </div>
                                                         <hr>
                                                        <h3
                                                        class="card-title d-flex justify-content-center align-items-center">
                                                          Analysis</h3>
                                                        <p class="d-flex justify-content-center align-items-center text-center">
                                                            {{ isset($FinancialsRatioAnalysisFyOne->proprietary_ratio_analysis_fy_one_1) ? $FinancialsRatioAnalysisFyOne->proprietary_ratio_analysis_fy_one_1 : 'N/A' }}

                                                           </p>
                                                    </div>
                                                </div>
                                                @endif


                                                 @if (isset($financialrationGrapFY_net_profit_ratio) && areAllValuesNull($financialrationGrapFY_net_profit_ratio) ==false && count($financialrationGrapFY_net_profit_ratio) > 0)

                                                 <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                     <div class="card">
                                                         <h4
                                                         class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                         {{ $Financial->net_profit_ratio_fy_one_ratio_heading_graph  ?  $Financial->net_profit_ratio_fy_one_ratio_heading_graph : "" }}

                                                         </h4>
                                                         <div class="d-flex justify-content-center align-items-center">
                                                             <canvas id="barChart_NetProfitRatio"></canvas>
                                                            </div>
                                                             <hr>
                                                        <h3
                                                        class="card-title d-flex justify-content-center align-items-center">
                                                          Analysis</h3>
                                                        <p class="d-flex justify-content-center align-items-center text-center">
                                                            {{ isset($FinancialsRatioAnalysisFyOne->net_profit_ratio_analysis_fy_one_1) ? $FinancialsRatioAnalysisFyOne->net_profit_ratio_analysis_fy_one_1 : 'N/A' }}

                                                           </p>
                                                        </div>
                                                </div>
                                                @endif
                                                    @if (isset($financialrationGrapFY_gross_profit_ratio) && areAllValuesNull($financialrationGrapFY_gross_profit_ratio) ==false && count($financialrationGrapFY_gross_profit_ratio) > 0)

                                                    <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                        class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                        {{ $Financial->gross_profit_ratio_fy_one_ratio_heading_graph  ?  $Financial->gross_profit_ratio_fy_one_ratio_heading_graph : "" }}
                                                        </h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_GrossProfitRatio"></canvas>
                                                        </div>
                                                         <hr>
                                                        <h3
                                                        class="card-title d-flex justify-content-center align-items-center">
                                                          Analysis</h3>
                                                        <p class="d-flex justify-content-center align-items-center text-center">
                                                            {{ isset($FinancialsRatioAnalysisFyOne->gross_profit_ratio_analysis_fy_one_1) ? $FinancialsRatioAnalysisFyOne->gross_profit_ratio_analysis_fy_one_1 : 'N/A' }}

                                                           </p>
                                                    </div>
                                                </div>
                                                @endif
                                                 @if (isset($financialrationGrapFY_springate_s_score_ratio) && areAllValuesNull($financialrationGrapFY_springate_s_score_ratio) ==false && count($financialrationGrapFY_springate_s_score_ratio) > 0)

                                                 <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                     <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">

                                                            {{ $Financial->springate_s_score_ratio_fy_one_ratio_heading_graph  ?  $Financial->springate_s_score_ratio_fy_one_ratio_heading_graph : "" }}

                                                        </h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_SpringateSScore"></canvas>
                                                        </div>
                                                         <hr>
                                                        <h3
                                                        class="card-title d-flex justify-content-center align-items-center">
                                                          Analysis</h3>
                                                        <p class="d-flex justify-content-center align-items-center text-center">
                                                            {{ isset($FinancialsRatioAnalysisFyOne->springate_s_score_ratio_analysis_fy_one_1) ? $FinancialsRatioAnalysisFyOne->springate_s_score_ratio_analysis_fy_one_1 : 'N/A' }}

                                                           </p>
                                                    </div>
                                                </div>
                                                @endif
                                                @if (isset($financialrationGrapFY_trade_receivable_days_ratio) && areAllValuesNull($financialrationGrapFY_trade_receivable_days_ratio) ==false && count($financialrationGrapFY_trade_receivable_days_ratio) > 0)

                                                <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                        class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                        {{ $Financial->trade_receivable_days_ratio_fy_one_ratio_heading_graph  ?  $Financial->trade_receivable_days_ratio_fy_one_ratio_heading_graph : "" }}
                                                    </h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_TradeReceivableDays"></canvas>
                                                        </div>
                                                         <hr>
                                                        <h3
                                                        class="card-title d-flex justify-content-center align-items-center">
                                                          Analysis</h3>
                                                        <p class="d-flex justify-content-center align-items-center text-center">
                                                            {{ isset($FinancialsRatioAnalysisFyOne->trade_receivable_days_ratio_analysis_fy_one_1) ? $FinancialsRatioAnalysisFyOne->trade_receivable_days_ratio_analysis_fy_one_1 : 'N/A' }}

                                                           </p>
                                                    </div>
                                                </div>
                                                @endif


                                                 @if (isset($financialrationGrapFY_trade_payable_days_ratio) && areAllValuesNull($financialrationGrapFY_trade_payable_days_ratio) ==false && count($financialrationGrapFY_trade_payable_days_ratio) > 0)

                                                 <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            {{ $Financial->trade_payable_days_ratio_fy_one_ratio_heading_graph  ?  $Financial->trade_payable_days_ratio_fy_one_ratio_heading_graph : "" }}
                                                            </h4>
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <canvas id="barChart_TradePayableDays"></canvas>
                                                            </div>
                                                             <hr>
                                                        <h3
                                                        class="card-title d-flex justify-content-center align-items-center">
                                                          Analysis</h3>
                                                        <p class="d-flex justify-content-center align-items-center text-center">
                                                            {{ isset($FinancialsRatioAnalysisFyOne->trade_payable_days_ratio_analysis_fy_one_1) ? $FinancialsRatioAnalysisFyOne->trade_payable_days_ratio_analysis_fy_one_1 : 'N/A' }}

                                                           </p>
                                                        </div>
                                                    </div>
                                                    @endif
                                                 @if (isset($financialrationGrapFY_taffler_z_score_ratio) && areAllValuesNull($financialrationGrapFY_taffler_z_score_ratio) ==false && count($financialrationGrapFY_taffler_z_score_ratio) > 0)

                                                 <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            {{ $Financial->taffler_z_score_ratio_fy_one_ratio_heading_graph  ?  $Financial->taffler_z_score_ratio_fy_one_ratio_heading_graph : "" }}
                                                            </h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_TafflerZScore"></canvas>
                                                        </div>
                                                         <hr>
                                                        <h3
                                                        class="card-title d-flex justify-content-center align-items-center">
                                                          Analysis</h3>
                                                        <p class="d-flex justify-content-center align-items-center text-center">
                                                            {{ isset($FinancialsRatioAnalysisFyOne->taffler_z_score_ratio_analysis_fy_one_1) ? $FinancialsRatioAnalysisFyOne->taffler_z_score_ratio_analysis_fy_one_1 : 'N/A' }}

                                                           </p>
                                                    </div>
                                                </div>
                                                @endif
                                                 @if (isset($financialrationGrapFY_zmijewski_x_score_ratio) && areAllValuesNull($financialrationGrapFY_zmijewski_x_score_ratio) ==false && count($financialrationGrapFY_zmijewski_x_score_ratio) > 0)

                                                 <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                     <div class="card">
                                                         <h4
                                                         class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                         {{ $Financial->zmijewski_x_score_ratio_fy_one_ratio_heading_graph  ?  $Financial->zmijewski_x_score_ratio_fy_one_ratio_heading_graph : "" }}
                                                        </h4>
                                                         <div class="d-flex justify-content-center align-items-center">
                                                             <canvas id="barChart_ZmijewskiXScore"></canvas>
                                                            </div>
                                                             <hr>
                                                        <h3
                                                        class="card-title d-flex justify-content-center align-items-center">
                                                          Analysis</h3>
                                                        <p class="d-flex justify-content-center align-items-center text-center">
                                                            {{ isset($FinancialsRatioAnalysisFyOne->zmijewski_x_score_ratio_analysis_fy_one_1) ? $FinancialsRatioAnalysisFyOne->zmijewski_x_score_ratio_analysis_fy_one_1 : 'N/A' }}

                                                           </p>
                                                        </div>
                                                </div>
                                                        @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

         </div>
    </div>
<!-- Financials tab End -->
<!-- Business-Intelligence tab start -->
    <div class="col-xl-12" id="tab-Business-Intelligence">
         <div class="card dz-card">

                <div class="tab-content" id="myTabContent">
                    <div class="card-header flex-wrap border-0" id="default-tab">
                        <h4 class="card-title">Business Intelligence<br>

                        </h4>


                    </div>
                    <div class="tab-pane fade show active" id="DefaultTab" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card-body pt-0">
                            <!-- Nav tabs -->
                            <div class="default-tab">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#Business-Intelligence "> Business Intelligence </a>
                                    </li>


                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="Business-Intelligence " role="tabpanel">
                                        <div class="pt-4">
                                            <div class="table-responsive">
                                                <div class="row">

                                                            @if (isset($businessInteligenceGrapFY_operating_efficiency) && areAllValuesNull($businessInteligenceGrapFY_operating_efficiency) ==false && count($businessInteligenceGrapFY_operating_efficiency) > 0)

                                                                <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                                <div class="card">
                                                                    <h4
                                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                                            {{ isset($BusinessIntelligence->operating_efficiency_BI_heading_graph) ? $BusinessIntelligence->operating_efficiency_BI_heading_graph : 'N/A' }}</h4>
                                                                            <div class="d-flex justify-content-center align-items-center">
                                                                                <canvas id="barChart_OperatingEfficiencyRatio"></canvas>
                                                                            </div>
                                                                             <hr>
                                                                            <h3
                                                                            class="card-title d-flex justify-content-center align-items-center">
                                                                            Analysis</h3>
                                                                            <p class="d-flex justify-content-center align-items-center text-center">
                                                                                {{ isset($BusinessIntelligence->operating_efficiency_BI_analysis) ? $BusinessIntelligence->operating_efficiency_BI_analysis : 'N/A' }}

                                                                            </p>
                                                                    </div>
                                                                </div>
                                                                @endif



                                                            @if (isset($businessInteligenceGrapFY_inventory_turnover) && areAllValuesNull($businessInteligenceGrapFY_inventory_turnover) ==false && count($businessInteligenceGrapFY_inventory_turnover) > 0)

                                                            <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                                <div class="card">
                                                                    <h4
                                                                    class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                                    {{ isset($BusinessIntelligence->inventory_turnover_BI_heading_graph) ? $BusinessIntelligence->inventory_turnover_BI_heading_graph : 'N/A' }}

                                                                </h4>
                                                                    <div class="d-flex justify-content-center align-items-center">
                                                                        <canvas id="barChart_InventoryTurnoverRatio"></canvas>
                                                                        </div>
                                                                         <hr>
                                                                            <h3
                                                                            class="card-title d-flex justify-content-center align-items-center">
                                                                            Analysis</h3>
                                                                            <p class="d-flex justify-content-center align-items-center text-center">
                                                                                {{ isset($BusinessIntelligence->inventory_turnover_BI_analysis) ? $BusinessIntelligence->inventory_turnover_BI_analysis : 'N/A' }}

                                                                            </p>
                                                                    </div>
                                                                </div>
                                                                @endif

                                                                @if (isset($businessInteligenceGrapFY_days_sales_in_inventory) && areAllValuesNull($businessInteligenceGrapFY_days_sales_in_inventory) ==false && count($businessInteligenceGrapFY_days_sales_in_inventory) > 0)

                                                                <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                                    <div class="card">
                                                                        <h4
                                                                        class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                                        {{ isset($BusinessIntelligence->days_sales_in_inventory_BI_heading_graph) ? $BusinessIntelligence->days_sales_in_inventory_BI_heading_graph : 'N/A' }}
                                                                        </h4>
                                                                        <div class="d-flex justify-content-center align-items-center">
                                                                            <canvas id="barChart_DaysSalesInInventory"></canvas>
                                                                        </div>
                                                                         <hr>
                                                                            <h3
                                                                            class="card-title d-flex justify-content-center align-items-center">
                                                                            Analysis</h3>
                                                                            <p class="d-flex justify-content-center align-items-center text-center">
                                                                                {{ isset($BusinessIntelligence->days_sales_in_inventory_BI_analysis) ? $BusinessIntelligence->days_sales_in_inventory_BI_analysis : 'N/A' }}

                                                                            </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                                @if (isset($businessInteligenceGrapFY_accounts_payable) && areAllValuesNull($businessInteligenceGrapFY_accounts_payable) ==false && count($businessInteligenceGrapFY_accounts_payable) > 0)

                                                                <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                                    <div class="card">
                                                                        <h4
                                                                        class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                                        {{ isset($BusinessIntelligence->accounts_payable_turnover_BI_heading_graph) ? $BusinessIntelligence->accounts_payable_turnover_BI_heading_graph : 'N/A' }}

                                                                    </h4>
                                                                        <div class="d-flex justify-content-center align-items-center">
                                                                            <canvas id="barChart_businessIntelligence"></canvas>
                                                                        </div>
                                                                         <hr>
                                                                            <h3
                                                                            class="card-title d-flex justify-content-center align-items-center">
                                                                            Analysis</h3>
                                                                            <p class="d-flex justify-content-center align-items-center text-center">
                                                                                {{ isset($BusinessIntelligence->accounts_payable_turnover_BI_analysis) ? $BusinessIntelligence->accounts_payable_turnover_BI_analysis : 'N/A' }}

                                                                            </p>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                    </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</div>
<!-- Business-Intelligence tab End -->
<!--Tax-Return-and-Credit tab start -->
    <div class="col-xl-12" id="tab-Tax-Return-and-Credit">
       <div class="card dz-card">

                <div class="tab-content" id="myTabContent">
                    <div class="card-header flex-wrap border-0" id="default-tab">
                        <h4 class="card-title">Tax Return & Credit<br>

                        </h4>


                    </div>
                    <div class="tab-pane fade show active" id="DefaultTab" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card-body pt-0">
                            <!-- Nav tabs -->
                            <div class="default-tab">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#Tax-Return">Tax Return</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#Credit-History">
                                            Credit History</a>
                                    </li>


                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="Tax-Return" role="tabpanel">
                                        <div class="pt-4">
                                            <div class="table-responsive">
                                                <table class="table primary-table-bordered">
                                                    <thead class="thead-primary">
                                                        <tr>



                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-4">Year</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-8">Tax Paid</th>
                                                        </tr>
                                                        <tr>
                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">FY 1</>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">{{ $TaxReurnCredit->tax_fy1 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">FY 2</th>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">{{ $TaxReurnCredit->tax_fy2 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">FY 3</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">{{ $TaxReurnCredit->tax_fy3 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">FY 4</th>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">{{ $TaxReurnCredit->tax_fy4 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">FY 5</th>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">{{ $TaxReurnCredit->tax_fy5 }}</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Credit-History">
                                        <div class="pt-4">
                                            <div class="table-responsive">
                                                <table class="table primary-table-bordered">
                                                    <thead class="thead-primary">


                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-2">Director Name</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-1">Credit Score</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-1">Outstanding Amount</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-2">No. of Loans</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-2">Solvency</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-2">Payment History</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-2">Credit Dependency</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{ $TaxReurnCredit->name_1 }}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-1">{{ $TaxReurnCredit->credit_score_1 }}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-1">{{ $TaxReurnCredit->outstanding_amount_1 }}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-1">{{ $TaxReurnCredit->num_of_loans_1 }} </td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{ $TaxReurnCredit->solvency_1 }}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{ $TaxReurnCredit->payment_history_1 }}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{ $TaxReurnCredit->credit_dependency_1 }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{ $TaxReurnCredit->name_2 }}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-1">{{ $TaxReurnCredit->credit_score_2 }}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-1">{{ $TaxReurnCredit->outstanding_amount_2 }}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-1">{{ $TaxReurnCredit->num_of_loans_2 }} </td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{ $TaxReurnCredit->solvency_2 }}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{ $TaxReurnCredit->payment_history_2 }}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{ $TaxReurnCredit->credit_dependency_2 }} </td>
                                                        </tr> <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{ $TaxReurnCredit->name_3 }}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-1">{{ $TaxReurnCredit->credit_score_3 }}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-1">{{ $TaxReurnCredit->outstanding_amount_3 }}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-1">{{ $TaxReurnCredit->num_of_loans_3 }} </td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{ $TaxReurnCredit->solvency_3 }}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{ $TaxReurnCredit->payment_history_3 }}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{ $TaxReurnCredit->credit_dependency_3 }} </td>
                                                        </tr> <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{ $TaxReurnCredit->name_4 }}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-1">{{ $TaxReurnCredit->credit_score_4 }}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-1">{{ $TaxReurnCredit->outstanding_amount_4 }}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-1">{{ $TaxReurnCredit->num_of_loans_4 }} </td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{ $TaxReurnCredit->solvency_4 }}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{ $TaxReurnCredit->payment_history_4 }}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{ $TaxReurnCredit->credit_dependency_4 }} </td>
                                                        </tr>

                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{ $TaxReurnCredit->name_4 }}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-1">{{ $TaxReurnCredit->credit_score_4 }}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-1">{{ $TaxReurnCredit->outstanding_amount_4 }}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-1">{{ $TaxReurnCredit->num_of_loans_4 }} </td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{ $TaxReurnCredit->solvency_4 }}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{ $TaxReurnCredit->payment_history_4 }}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{ $TaxReurnCredit->credit_dependency_4 }} </td>
                                                        </tr>



                                                    </tbody>

                                                </table>
                                                <table class="table primary-table-bordered">
                                                    <thead class="thead-primary">


                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <th style="font-size: 18px; font-weight: bolder; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 text-start">Overall Credit History Score = {{$TaxReurnCredit->overall_credit_history_score}}</th>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 text-start"></td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 text-start"></td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 text-start"></td>


                                                        </tr>

                                                        <tr>

                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 text-start">Score Analysis</th>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="3" class="col-md-3 text-start">{{$TaxReurnCredit->score_analysis}}</td>


                                                        </tr>



                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>

<!--Tax-Return-and-Credit tab End -->
<!-- Market-Reputation tab start -->
    <div class="col-xl-12" id="tab-Market-Reputation">
        <div class="card dz-card">

                <div class="tab-content" id="myTabContent">
                    <div class="card-header flex-wrap border-0" id="default-tab">
                        <h4 class="card-title">Market Reputation<br>

                        </h4>


                    </div>
                    <div class="tab-pane fade show active" id="DefaultTab" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card-body pt-0">
                            <!-- Nav tabs -->
                            <div class="default-tab">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#Market-Reputation">Market Reputation</a>
                                    </li>


                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="Market-Reputation" role="tabpanel">
                                        <div class="pt-4">
                                            <div class="table-responsive">
                                                <table class="table primary-table-bordered">
                                                    <thead class="thead-primary">


                                                    </thead>
                                                    <tbody>



                                                        <tr>
                                                            <th style="font-size: 18px; font-weight: bolder; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 text-start">MARKET REPUTATION SCORE = {{$MarketReputation->market_reputation_score}}</th>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 text-start"></td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 text-start"></td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 text-start"></td>


                                                        </tr>

                                                        <tr>

                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 text-start">Score Analysis</th>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="3" class="col-md-3 text-start">{{$MarketReputation->score_analysis}}</td>


                                                        </tr>


                                                    </tbody>
                                                </table>
                                                <table class="table primary-table-bordered">
                                                    <thead class="thead-primary">


                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">
                                                                <embed src="{{URL::to('public/admin/assets/imgs/MarketReputations/') .'/'.$MarketReputation->file_path_market_reputations}}" width="500" height="550" type="application/pdf">

                                                            </td>
                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </div>
<!-- Market-Reputation tab End -->
<!--click-Key-Observation tab start -->
<div class="col-xl-12" id="tab-Key-Observation">
    <div class="card dz-card">

        <div class="tab-content" id="myTabContent">
            <div class="card-header flex-wrap border-0" id="default-tab">
                <h4 class="card-title">Key Observation<br>

                </h4>


            </div>
            <div class="tab-pane fade show active" id="DefaultTab" role="tabpanel" aria-labelledby="home-tab">
                <div class="card-body pt-0">
                    <!-- Nav tabs -->
                    <div class="default-tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#Key-Observation"> Key
                                     Observation</a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="Key-Observation" role="tabpanel">
                                <div class="pt-4">

                                    <div class="row">



                                        <div class="col-xl-3 mt-3">
                                            <p for="educationalBackground" class="text-center mt-20" > <b style="font-size:18px;color:#000000cf">OVERALL RISK SCORE =
                                                {{ $KeyObservation->overall_risk_score }}</b></p>
                                        </div>
                                        <div class="col-xl-2 mt-6">
                                        <canvas id="doughnut_chart"></canvas>
                                        </div>
                                        <div class="col-xl-1  mt-3">   </div>
                                        <div class="col-xl-6  mt-3">
                                            <p for="educationalBackground" class="text-start ml-2 mt-20" > <b style="font-size:18px;color:#000000cf">Score Analysis: </b>
                                              <br>  {{ $KeyObservation->score_analysis }}</p>
                                        </div>




                                    </div>



                                    <div class="row">
    <div class="col-xl-6 mb-3">
        <b style="color: black" for="educationalBackground" class="text-start">Observations</b>
    </div>
    <div class="col-xl-6 mb-3">
        <b style="color: black" for="educationalBackground" class="text-start">Recommendations</b>
    </div>
</div>
<div class="row">
    @for($i = 1; $i <= 25; $i++)
        <div class="col-xl-6 mb-1">
            @if(isset($KeyObservation->{'key_observation_'.$i}) && !empty($KeyObservation->{'key_observation_'.$i}))
                <p for="educationalBackground" class="text-start">
                    {{ $KeyObservation->{'key_observation_'.$i} }}
                </p>
            @endif
        </div>
        <div class="col-xl-6 mb-1">
            @if(isset($KeyObservation->{'key_recommendations_'.$i}) && !empty($KeyObservation->{'key_recommendations_'.$i}))
                <p for="educationalBackground" class="text-start">
                    {{ $KeyObservation->{'key_recommendations_'.$i} }}
                </p>
            @endif
        </div>
    @endfor
</div>

                                    <div class="row">
                                        <div class="col-xl-6 mb-3">
                                        </div>
                                        <div class="col-xl-6 mb-3">
                                            <p for="educationalBackground" class="text-center"><a
                                                    href="{{ URL::to('/panel/report/final_Reprts_file_download'.'/'. base64_encode($KeyObservation->id)) }}"
                                                    class="download-license-btn">Download Final Report</a></p>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!--click-Key-Observation tab End -->















@endsection

@section('addScript')
<script>
   var financialrationGrapFY_current_ratio = @json($financialrationGrapFY_current_ratio);
    var financialrationGrapFY_quick_ratio = @json($financialrationGrapFY_quick_ratio);
    var financialrationGrapFY_debt_ratio = @json($financialrationGrapFY_debt_ratio);
    var financialrationGrapFY_solvency_ratio = @json($financialrationGrapFY_solvency_ratio);
    var financialrationGrapFY_debt_to_equity_ratio = @json($financialrationGrapFY_debt_to_equity_ratio);
    var financialrationGrapFY_asset_turnover_ratio = @json($financialrationGrapFY_asset_turnover_ratio);
    var financialrationGrapFY_absolute_liquidity_ratio = @json($financialrationGrapFY_absolute_liquidity_ratio);
    var financialrationGrapFY_proprietary_ratio = @json($financialrationGrapFY_proprietary_ratio);
    var financialrationGrapFY_net_profit_ratio = @json($financialrationGrapFY_net_profit_ratio);
    var financialrationGrapFY_gross_profit_ratio = @json($financialrationGrapFY_gross_profit_ratio);
    var financialrationGrapFY_springate_s_score_ratio = @json($financialrationGrapFY_springate_s_score_ratio);
    var financialrationGrapFY_trade_receivable_days_ratio = @json($financialrationGrapFY_trade_receivable_days_ratio);
    var financialrationGrapFY_trade_payable_days_ratio = @json($financialrationGrapFY_trade_payable_days_ratio);
    var financialrationGrapFY_taffler_z_score_ratio = @json($financialrationGrapFY_taffler_z_score_ratio);
    var financialrationGrapFY_zmijewski_x_score_ratio = @json($financialrationGrapFY_zmijewski_x_score_ratio);



    var financialFindingsGrapFY_revenue = @json($financialFindingsGrapFY_revenue);
    var financialFindingsGrapFY_net_profit = @json($financialFindingsGrapFY_net_profit);
    var financialFindingsGrapFY_gross_profit = @json($financialFindingsGrapFY_gross_profit);
    var financialFindingsGrapFY_working_capital_1 = @json($financialFindingsGrapFY_working_capital_1);
    var financialFindingsGrapFY_quick_assets = @json($financialFindingsGrapFY_quick_assets);
    var financialFindingsGrapFY_total_assets = @json($financialFindingsGrapFY_total_assets);
    var financialFindingsGrapFY_current_assets = @json($financialFindingsGrapFY_current_assets);
    var financialFindingsGrapFY_current_liabilities = @json($financialFindingsGrapFY_current_liabilities);
    var financialFindingsGrapFY_debt = @json($financialFindingsGrapFY_debt);
    var financialFindingsGrapFY_average_inventory = @json($financialFindingsGrapFY_average_inventory);
    var financialFindingsGrapFY_net_sales = @json($financialFindingsGrapFY_net_sales);
    var financialFindingsGrapFY_equity_share_capital = @json($financialFindingsGrapFY_equity_share_capital);
    var financialFindingsGrapFY_sundry_debtors = @json($financialFindingsGrapFY_sundry_debtors);
    var financialFindingsGrapFY_sundry_creditors = @json($financialFindingsGrapFY_sundry_creditors);
    var financialFindingsGrapFY_loans_and_advances = @json($financialFindingsGrapFY_loans_and_advances);
    var financialFindingsGrapFY_cash_and_cash_equivalents = @json($financialFindingsGrapFY_cash_and_cash_equivalents);



    var businessInteligenceGrapFY_operating_efficiency = @json($businessInteligenceGrapFY_operating_efficiency);
    var businessInteligenceGrapFY_inventory_turnover = @json($businessInteligenceGrapFY_inventory_turnover);
    var businessInteligenceGrapFY_days_sales_in_inventory = @json($businessInteligenceGrapFY_days_sales_in_inventory);
    var businessInteligenceGrapFY_accounts_payable = @json($businessInteligenceGrapFY_accounts_payable);


    var finalValueforGraKeyObservation =@json($finalValueforGraKeyObservation);

    var businessInteligenceGraphLablesName =@json($businessInteligenceGraphLablesName);
    var financialFindingsGrapFYhLablesName =@json($financialFindingsGrapFYhLablesName);
    var financialRatioGrapFYhLablesName =@json($financialRatioGrapFYhLablesName);
    // Your external JavaScript file
    // Include this script before your external JS that uses financialrationGrapFY_current_ratio




</script>

<script>
$(document).ready(function() {


    $('#click-Firm-Background').on('click', function() {
        $('#tab-Firm-Background').show();
        $('#tab-On-Ground-Verification').hide();
        $('#tab-document-report').hide();

        $('#tab-Court-Checks').hide();
        $('#tab-Financials').hide();
        $('#tab-Business-Intelligence').hide();
        $('#tab-Tax-Return-and-Credit').hide();
        $('#tab-Market-Reputation').hide();
        $('#tab-Key-Observation').hide();

        $('#click-Firm-Background').addClass('report-tab-active').removeClass('report-tab-unactive');
        $('#click-Court-Checks').addClass('report-tab-unactive').removeClass('report-tab-active');
        $("#click-On-Ground-Verification").addClass('report-tab-unactive').removeClass(
            'report-tab-active');
        $("#click-Documents").addClass('report-tab-unactive').removeClass('report-tab-active');
        $("#click-Financials").addClass('report-tab-unactive').removeClass('report-tab-active');
        $("#click-Business-Intelligence").addClass('report-tab-unactive').removeClass(
            'report-tab-active');
        $("#click-Tax-Return-and-Credit").addClass('report-tab-unactive').removeClass(
            'report-tab-active');
        $("#click-Market-Reputation").addClass('report-tab-unactive').removeClass('report-tab-active');
        $("#click-Key-Observation").addClass('report-tab-unactive').removeClass('report-tab-active');

    });
    $('#click-Documents').on('click', function() {
        $('#tab-Firm-Background').hide();
        $('#tab-On-Ground-Verification').hide();
        $('#tab-document-report').show();

        $('#tab-Court-Checks').hide();
        $('#tab-Financials').hide();
        $('#tab-Business-Intelligence').hide();
        $('#tab-Tax-Return-and-Credit').hide();
        $('#tab-Market-Reputation').hide();
        $('#tab-Key-Observation').hide();

        $('#click-Firm-Background').addClass('report-tab-unactive').removeClass('report-tab-active');
        $('#click-Court-Checks').addClass('report-tab-unactive').removeClass('report-tab-active');
        $("#click-Documents").addClass('report-tab-active').removeClass(
            'report-tab-unactive');
        $("##click-On-Ground-Verification").addClass('report-tab-unactive').removeClass('report-tab-active');

        $("#click-Financials").addClass('report-tab-unactive').removeClass('report-tab-active');
        $("#click-Business-Intelligence").addClass('report-tab-unactive').removeClass(
            'report-tab-active');
        $("#click-Tax-Return-and-Credit").addClass('report-tab-unactive').removeClass(
            'report-tab-active');
        $("#click-Market-Reputation").addClass('report-tab-unactive').removeClass('report-tab-active');
        $("#click-Key-Observation").addClass('report-tab-unactive').removeClass('report-tab-active');


    });
    $('#click-On-Ground-Verification').on('click', function() {
        $('#tab-Firm-Background').hide();
        $('#tab-On-Ground-Verification').show();
        $('#tab-Court-Checks').hide();
        $('#tab-Financials').hide();
        $('#tab-Business-Intelligence').hide();
        $('#tab-Tax-Return-and-Credit').hide();
        $('#tab-Market-Reputation').hide();
        $('#tab-Key-Observation').hide();

        $('#tab-document-report').hide();
        $("#click-Documents").addClass('report-tab-unactive').removeClass('report-tab-active');

        $('#click-Firm-Background').addClass('report-tab-unactive').removeClass('report-tab-active');
        $('#click-Court-Checks').addClass('report-tab-unactive').removeClass('report-tab-active');
        $("#click-On-Ground-Verification").addClass('report-tab-active').removeClass(
            'report-tab-unactive');
        $("#click-Financials").addClass('report-tab-unactive').removeClass('report-tab-active');
        $("#click-Business-Intelligence").addClass('report-tab-unactive').removeClass(
            'report-tab-active');
        $("#click-Tax-Return-and-Credit").addClass('report-tab-unactive').removeClass(
            'report-tab-active');
        $("#click-Market-Reputation").addClass('report-tab-unactive').removeClass('report-tab-active');
        $("#click-Key-Observation").addClass('report-tab-unactive').removeClass('report-tab-active');


    });

    $('#click-Court-Checks').on('click', function() {
        $('#tab-Firm-Background').hide();
        $('#tab-On-Ground-Verification').hide();
        $('#tab-Court-Checks').show();
        $('#tab-Financials').hide();
        $('#tab-Business-Intelligence').hide();
        $('#tab-Tax-Return-and-Credit').hide();
        $('#tab-Market-Reputation').hide();
        $('#tab-Key-Observation').hide();

        $('#tab-document-report').hide();
        $("#click-Documents").addClass('report-tab-unactive').removeClass('report-tab-active');
        $('#click-Firm-Background').addClass('report-tab-unactive').removeClass('report-tab-active');
        $('#click-Court-Checks').addClass('report-tab-active').removeClass('report-tab-unactive');
        $("#click-On-Ground-Verification").addClass('report-tab-unactive').removeClass(
            'report-tab-active');
        $("#click-Financials").addClass('report-tab-unactive').removeClass('report-tab-active');
        $("#click-Business-Intelligence").addClass('report-tab-unactive').removeClass(
            'report-tab-active');
        $("#click-Tax-Return-and-Credit").addClass('report-tab-unactive').removeClass(
            'report-tab-active');
        $("#click-Market-Reputation").addClass('report-tab-unactive').removeClass('report-tab-active');
        $("#click-Key-Observation").addClass('report-tab-unactive').removeClass('report-tab-active');
    });
    $('#click-Financials').on('click', function() {
        $('#tab-Firm-Background').hide();
        $('#tab-On-Ground-Verification').hide();
        $('#tab-Court-Checks').hide();
        $('#tab-Financials').show();
        $('#tab-Business-Intelligence').hide();
        $('#tab-Tax-Return-and-Credit').hide();
        $('#tab-Market-Reputation').hide();
        $('#tab-Key-Observation').hide();

        $('#tab-document-report').hide();
        $("#click-Documents").addClass('report-tab-unactive').removeClass('report-tab-active');
        $('#click-Firm-Background').addClass('report-tab-unactive').removeClass('report-tab-active');
        $('#click-Court-Checks').addClass('report-tab-unactive').removeClass('report-tab-active');
        $("#click-On-Ground-Verification").addClass('report-tab-unactive').removeClass(
            'report-tab-active');
        $("#click-Financials").addClass('report-tab-active').removeClass('report-tab-unactive');
        $("#click-Business-Intelligence").addClass('report-tab-unactive').removeClass(
            'report-tab-active');
        $("#click-Tax-Return-and-Credit").addClass('report-tab-unactive').removeClass(
            'report-tab-active');
        $("#click-Market-Reputation").addClass('report-tab-unactive').removeClass('report-tab-active');
        $("#click-Key-Observation").addClass('report-tab-unactive').removeClass('report-tab-active');


    });
    $('#click-Business-Intelligence').on('click', function() {
        $('#tab-Firm-Background').hide();
        $('#tab-On-Ground-Verification').hide();
        $('#tab-Court-Checks').hide();
        $('#tab-Financials').hide();
        $('#tab-Business-Intelligence').show();
        $('#tab-Tax-Return-and-Credit').hide();
        $('#tab-Market-Reputation').hide();
        $('#tab-Key-Observation').hide();
        $('#tab-document-report').hide();
        $("#click-Documents").addClass('report-tab-unactive').removeClass('report-tab-active');
        $('#click-Firm-Background').addClass('report-tab-unactive').removeClass('report-tab-active');
        $('#click-Court-Checks').addClass('report-tab-unactive').removeClass('report-tab-active');
        $("#click-On-Ground-Verification").addClass('report-tab-unactive').removeClass(
            'report-tab-active');
        $("#click-Financials").addClass('report-tab-unactive').removeClass('report-tab-active');
        $("#click-Business-Intelligence").addClass('report-tab-active').removeClass(
            'report-tab-unactive');
        $("#click-Tax-Return-and-Credit").addClass('report-tab-unactive').removeClass(
            'report-tab-active');
        $("#click-Market-Reputation").addClass('report-tab-unactive').removeClass('report-tab-active');
        $("#click-Key-Observation").addClass('report-tab-unactive').removeClass('report-tab-active');
    });
    $('#click-Tax-Return-and-Credit').on('click', function() {

        $('#tab-Firm-Background').hide();
        $('#tab-On-Ground-Verification').hide();
        $('#tab-Court-Checks').hide();
        $('#tab-Financials').hide();
        $('#tab-Business-Intelligence').hide();
        $('#tab-Tax-Return-and-Credit').show();
        $('#tab-Market-Reputation').hide();
        $('#tab-Key-Observation').hide();

        $('#tab-document-report').hide();
        $("#click-Documents").addClass('report-tab-unactive').removeClass('report-tab-active');
        $('#click-Firm-Background').addClass('report-tab-unactive').removeClass('report-tab-active');
        $('#click-Court-Checks').addClass('report-tab-unactive').removeClass('report-tab-active');
        $("#click-On-Ground-Verification").addClass('report-tab-unactive').removeClass(
            'report-tab-active');
        $("#click-Financials").addClass('report-tab-unactive').removeClass('report-tab-active');
        $("#click-Business-Intelligence").addClass('report-tab-unactive').removeClass(
            'report-tab-active');
        $("#click-Tax-Return-and-Credit").addClass('report-tab-active').removeClass(
            'report-tab-unactive');
        $("#click-Market-Reputation").addClass('report-tab-unactive').removeClass('report-tab-active');
        $("#click-Key-Observation").addClass('report-tab-unactive').removeClass('report-tab-active');

    });
    $('#click-Market-Reputation').on('click', function() {
        $('#tab-Firm-Background').hide();
        $('#tab-On-Ground-Verification').hide();
        $('#tab-Court-Checks').hide();
        $('#tab-Financials').hide();
        $('#tab-Business-Intelligence').hide();
        $('#tab-Tax-Return-and-Credit').hide();
        $('#tab-Market-Reputation').show();
        $('#tab-Key-Observation').hide();

        $('#tab-document-report').hide();
        $("#click-Documents").addClass('report-tab-unactive').removeClass('report-tab-active');
        $('#click-Firm-Background').addClass('report-tab-unactive').removeClass('report-tab-active');
        $('#click-Court-Checks').addClass('report-tab-unactive').removeClass('report-tab-active');
        $("#click-On-Ground-Verification").addClass('report-tab-unactive').removeClass(
            'report-tab-active');
        $("#click-Financials").addClass('report-tab-unactive').removeClass('report-tab-active');
        $("#click-Business-Intelligence").addClass('report-tab-unactive').removeClass(
            'report-tab-active');
        $("#click-Tax-Return-and-Credit").addClass('report-tab-unactive').removeClass(
            'report-tab-active');
        $("#click-Market-Reputation").addClass('report-tab-active').removeClass('report-tab-unactive');
        $("#click-Key-Observation").addClass('report-tab-unactive').removeClass('report-tab-active');

    });
    $('#click-Key-Observation').on('click', function() {
        $('#tab-Firm-Background').hide();
        $('#tab-On-Ground-Verification').hide();
        $('#tab-Court-Checks').hide();
        $('#tab-Financials').hide();
        $('#tab-Business-Intelligence').hide();
        $('#tab-Tax-Return-and-Credit').hide();
        $('#tab-Market-Reputation').hide();
        $('#tab-Key-Observation').show();
        $('#tab-document-report').hide();
        $("#click-Documents").addClass('report-tab-unactive').removeClass('report-tab-active');
        $('#click-Firm-Background').addClass('report-tab-unactive').removeClass('report-tab-active');
        $('#click-Court-Checks').addClass('report-tab-unactive').removeClass('report-tab-active');
        $("#click-On-Ground-Verification").addClass('report-tab-unactive').removeClass(
            'report-tab-active');
        $("#click-Financials").addClass('report-tab-unactive').removeClass('report-tab-active');
        $("#click-Business-Intelligence").addClass('report-tab-unactive').removeClass(
            'report-tab-active');
        $("#click-Tax-Return-and-Credit").addClass('report-tab-unactive').removeClass(
            'report-tab-active');
        $("#click-Market-Reputation").addClass('report-tab-unactive').removeClass('report-tab-active');
        $("#click-Key-Observation").addClass('report-tab-active').removeClass('report-tab-unactive');

    });



    const hidetabExceptFir = () => {
        $('#tab-Firm-Background').show();
        $('#tab-On-Ground-Verification').hide();
        $('#tab-Court-Checks').hide();
        $('#tab-Financials').hide();
        $('#tab-Business-Intelligence').hide();
        $('#tab-Tax-Return-and-Credit').hide();
        $('#tab-Market-Reputation').hide();
        $('#tab-Key-Observation').hide();
        $('#tab-document-report').hide();
    }


    hidetabExceptFir();
});
</script>


@endsection
