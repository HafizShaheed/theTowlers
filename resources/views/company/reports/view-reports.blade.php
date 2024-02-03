@extends('company.includes.master')

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

                            <b>Vender Name:{{isset($getThirdPartyForID->third_party_name) ? $getThirdPartyForID->third_party_name : ''}} </b>
                        </p>

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
                                                                            <a href="{{ URL::to('/panel/report/firm_file_download'.'/'.base64_encode($License->id).'/'.$i) }}" target="_blank" class="download-license-btn" style=" width: 100px;  text-align: center; ">Download </a>
                                                                        @else
                                                                            <!-- Handle if document doesn't exist -->
                                                                            <a  class="download-license-btn" style=" width: 200px;  text-align: center; ">N/A</a>
                                                                        @endif
                                                                    </td>
                                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-2 text-end">
                                                                        @if(!empty($License->{'licenses_upload_file_'.$i}))
                                                                            <a href="{{ URL::to('/panel/report/firm_file_view'.'/'.base64_encode($License->id).'/'.$i) }}" target="_blank" class="download-license-btn" style=" width: 200px;  text-align: center; ">View</a>
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
                                                                <a href="{{ URL::to('/company/report/firm_file_download'.'/'.base64_encode($FirmBackground->id)) }}" class="download-license-btn" style="display: inline-block; width: 200px;  text-align: center; ">Download Licenses</a>
                                                                <a href="{{ URL::to('/company/report/firm_file_download'.'/'.base64_encode($FirmBackground->id)) }}" class="download-license-btn" style="display: inline-block; width: 200px;  text-align: center; ">Download Licenses</a>
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
                                                                            <a href="{{ URL::to('/panel/report/document_file_download'.'/'.base64_encode($Document->id).'/'.$i) }}" target="_blank" class="download-license-btn" style=" width: 100px;  text-align: center; ">Download </a>
                                                                        @else
                                                                            <!-- Handle if document doesn't exist -->
                                                                            <a  class="download-license-btn" style=" width: 200px;  text-align: center; ">N/A</a>
                                                                        @endif
                                                                    </td>
                                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-2 text-end">
                                                                        @if(!empty($Document->{'document_upload_file'.$i}))
                                                                            <a href="{{ URL::to('/panel/report/document_file_view'.'/'.base64_encode($Document->id).'/'.$i) }}" target="_blank" class="download-license-btn" style=" width: 200px;  text-align: center; ">View</a>
                                                                        @else
                                                                            <!-- Handle if document doesn't exist -->
                                                                            <a  class="download-license-btn" style=" width: 200px;  text-align: center; ">N/A</a>
                                                                        @endif
                                                                    </td>

                                                                </tr>
                                                            @endif
                                                        @endfor

                                                     
                                                        <!-- <tr>
                                                            <td style="text-align-last: center; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="4" class="col-md-3">
                                                            <a href="{{ URL::to('/company/report/document_file_download'.'/'.base64_encode($Document->id)) }}" class="download-license-btn" style="display: inline-block; width: 200px;  text-align: center; ">Download Document</a>
                                                                <a href="{{ URL::to('/company/report/document_file_view'.'/'.base64_encode($Document->id)) }}" target="_blank" class="download-license-btn" style="display: inline-block; width: 200px;  text-align: center; ">View Document</a>
                                                            </td>

                                                        </tr> -->
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
                                                    <td style=" text-align-last: center; background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="2"  class="">
                                                    <a href="{{ URL::to('/company/report/onGround_file_download'.'/'. base64_encode($OnGroundVerification->id)) }}" class="download-license-btn" style="display: inline-block; width: 200px;  text-align: center; ">Download PDF or Image</a>
                                                       <a href="{{ URL::to('/company/report/onGround_file_view'.'/'. base64_encode($OnGroundVerification->id)) }}" target="_blank" class="download-license-btn" style="display: inline-block; width: 200px;  text-align: center; ">View Report </a></td>

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

                                </div>                            </div>
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
                                                    href="{{ URL::to('/company/report/final_Reprts_file_download'.'/'. base64_encode($KeyObservation->id)) }}"
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
        $('#tab-Court-Checks').hide();
        $('#tab-Financials').hide();
        $('#tab-Business-Intelligence').hide();
        $('#tab-Tax-Return-and-Credit').hide();
        $('#tab-Market-Reputation').hide();
        $('#tab-Key-Observation').hide();
        $('#tab-document-report').hide();
        $("#click-Documents").addClass('report-tab-unactive').removeClass('report-tab-active');

        $('#click-Firm-Background').addClass('report-tab-active').removeClass('report-tab-unactive');
        $('#click-Court-Checks').addClass('report-tab-unactive').removeClass('report-tab-active');
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
        $('#tab-document-report').hide();
        $('#tab-Financials').hide();
        $('#tab-Business-Intelligence').hide();
        $('#tab-Tax-Return-and-Credit').hide();
        $('#tab-Market-Reputation').hide();
        $('#tab-Key-Observation').hide();
    }


    hidetabExceptFir();
});
</script>





<script>

(function($) {
  "use strict"


	/* function draw() {

	} */

 var dlabSparkLine = function(){
	let draw = Chart.controllers.line.__super__.draw; //draw shadow

	var screenWidth = $(window).width();

    //========================================================================== Ratio graph start ========================= //

    // Current ratio  start

    var barChart1financialRatio = function(){
        if(jQuery('#barChart_financialRation').length > 0 ){
            const barChart_financialRation = document.getElementById("barChart_financialRation").getContext('2d');

            barChart_financialRation.height = 100;

            new Chart(barChart_financialRation, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Current Ratio",
                            data: financialrationGrapFY_current_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }

    // Current ratio  end

    var barChart_QuickRatio = function(){
        if(jQuery('#barChart_QuickRatio').length > 0 ){
            const barChart_QuickRatio = document.getElementById("barChart_QuickRatio").getContext('2d');

            barChart_QuickRatio.height = 100;

            new Chart(barChart_QuickRatio, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Quick Ratio",
                            data: financialrationGrapFY_quick_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }

    var barChart_DebtRatio = function(){
        if(jQuery('#barChart_DebtRatio').length > 0 ){
            const barChart_DebtRatio = document.getElementById("barChart_DebtRatio").getContext('2d');

            barChart_DebtRatio.height = 100;

            new Chart(barChart_DebtRatio, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Dept Ratio",
                            data: financialrationGrapFY_debt_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }
    var barChart_SolvencyRatio = function(){
        if(jQuery('#barChart_SolvencyRatio').length > 0 ){
            const barChart_SolvencyRatio = document.getElementById("barChart_SolvencyRatio").getContext('2d');

            barChart_SolvencyRatio.height = 100;

            new Chart(barChart_SolvencyRatio, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Solvency Ratio",
                            data: financialrationGrapFY_solvency_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }

    var barChart_DebtToEquityRatio = function(){
        if(jQuery('#barChart_DebtToEquityRatio').length > 0 ){
            const barChart_DebtToEquityRatio = document.getElementById("barChart_DebtToEquityRatio").getContext('2d');

            barChart_DebtToEquityRatio.height = 100;

            new Chart(barChart_DebtToEquityRatio, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Ratio Dept to Equity",
                            data: financialrationGrapFY_debt_to_equity_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }

    var barChart_AssetTurnoverRatio = function(){
        if(jQuery('#barChart_AssetTurnoverRatio').length > 0 ){
            const barChart_AssetTurnoverRatio = document.getElementById("barChart_AssetTurnoverRatio").getContext('2d');

            barChart_AssetTurnoverRatio.height = 100;

            new Chart(barChart_AssetTurnoverRatio, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Asset Turnover Ratio",
                            data: financialrationGrapFY_asset_turnover_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }

    var barChart_AbsoluteLiquidityRatio = function(){
        if(jQuery('#barChart_AbsoluteLiquidityRatio').length > 0 ){
            const barChart_AbsoluteLiquidityRatio = document.getElementById("barChart_AbsoluteLiquidityRatio").getContext('2d');

            barChart_AbsoluteLiquidityRatio.height = 100;

            new Chart(barChart_AbsoluteLiquidityRatio, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials absolute liquidity ratio",
                            data: financialrationGrapFY_absolute_liquidity_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }

    var barChart_ProprietaryRatio = function(){
        if(jQuery('#barChart_ProprietaryRatio').length > 0 ){
            const barChart_ProprietaryRatio = document.getElementById("barChart_ProprietaryRatio").getContext('2d');

            barChart_ProprietaryRatio.height = 100;

            new Chart(barChart_ProprietaryRatio, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Property ratio",
                            data: financialrationGrapFY_proprietary_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }


    var barChart_NetProfitRatio = function(){
        if(jQuery('#barChart_NetProfitRatio').length > 0 ){
            const barChart_NetProfitRatio = document.getElementById("barChart_NetProfitRatio").getContext('2d');

            barChart_NetProfitRatio.height = 100;

            new Chart(barChart_NetProfitRatio, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Net Profit",
                            data: financialrationGrapFY_net_profit_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }

    var barChart_GrossProfitRatio = function(){
        if(jQuery('#barChart_GrossProfitRatio').length > 0 ){
            const barChart_GrossProfitRatio = document.getElementById("barChart_GrossProfitRatio").getContext('2d');

            barChart_GrossProfitRatio.height = 100;

            new Chart(barChart_GrossProfitRatio, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Gross Profit",
                            data: financialrationGrapFY_gross_profit_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }


    var barChart_SpringateSScore = function(){
        if(jQuery('#barChart_SpringateSScore').length > 0 ){
            const barChart_SpringateSScore = document.getElementById("barChart_SpringateSScore").getContext('2d');

            barChart_SpringateSScore.height = 100;

            new Chart(barChart_SpringateSScore, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials springate score ratio",
                            data: financialrationGrapFY_springate_s_score_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }

    var barChart_TradeReceivableDays = function(){
        if(jQuery('#barChart_TradeReceivableDays').length > 0 ){
            const barChart_TradeReceivableDays = document.getElementById("barChart_TradeReceivableDays").getContext('2d');

            barChart_TradeReceivableDays.height = 100;

            new Chart(barChart_TradeReceivableDays, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials trade receivable days ratio",
                            data: financialrationGrapFY_trade_receivable_days_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }

    var barChart_TradePayableDays = function(){
        if(jQuery('#barChart_TradePayableDays').length > 0 ){
            const barChart_TradePayableDays = document.getElementById("barChart_TradePayableDays").getContext('2d');

            barChart_TradePayableDays.height = 100;

            new Chart(barChart_TradePayableDays, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financialstrade payable days ratio",
                            data: financialrationGrapFY_trade_payable_days_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }

    var barChart_TafflerZScore = function(){
        if(jQuery('#barChart_TafflerZScore').length > 0 ){
            const barChart_TafflerZScore = document.getElementById("barChart_TafflerZScore").getContext('2d');

            barChart_TafflerZScore.height = 100;

            new Chart(barChart_TafflerZScore, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials taffler z score ratio",
                            data: financialrationGrapFY_taffler_z_score_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }

    var barChart_ZmijewskiXScore = function(){
        if(jQuery('#barChart_ZmijewskiXScore').length > 0 ){
            const barChart_ZmijewskiXScore = document.getElementById("barChart_ZmijewskiXScore").getContext('2d');

            barChart_ZmijewskiXScore.height = 100;

            new Chart(barChart_ZmijewskiXScore, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  financialRatioGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials zmijewski x score ratio",
                            data: financialrationGrapFY_zmijewski_x_score_ratio,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#2585b1',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }
    //========================================================================== Ratio graph start ========================= //
    //========================================================================== BI graph start ========================= //


           // pay able start
           var barChart1businessIntelligenc = function(){
        if(jQuery('#barChart_businessIntelligence').length > 0 ){
            const barChart_businessIntelligence = document.getElementById("barChart_businessIntelligence").getContext('2d');

            barChart_businessIntelligence.height = 100;

            new Chart(barChart_businessIntelligence, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  businessInteligenceGraphLablesName,
                    datasets: [
                        {
                            label: "Business Intelligence operating efficiency",
                            data: businessInteligenceGrapFY_accounts_payable,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#61c0e2',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }

        // pay able end
    var barChart_DaysSalesInInventory = function(){
        if(jQuery('#barChart_DaysSalesInInventory').length > 0 ){
            const barChart_DaysSalesInInventory = document.getElementById("barChart_DaysSalesInInventory").getContext('2d');

            barChart_DaysSalesInInventory.height = 100;

            new Chart(barChart_DaysSalesInInventory, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  businessInteligenceGraphLablesName,
                    datasets: [
                        {
                            label: "Business Intelligence inventory turnover",
                            data: businessInteligenceGrapFY_inventory_turnover,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#61c0e2',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }
    var barChart_InventoryTurnoverRatio = function(){
        if(jQuery('#barChart_InventoryTurnoverRatio').length > 0 ){
            const barChart_InventoryTurnoverRatio = document.getElementById("barChart_InventoryTurnoverRatio").getContext('2d');

            barChart_InventoryTurnoverRatio.height = 100;

            new Chart(barChart_InventoryTurnoverRatio, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  businessInteligenceGraphLablesName,
                    datasets: [
                        {
                            label: "Business Intelligence days sales in inventory",
                            data: businessInteligenceGrapFY_days_sales_in_inventory,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#61c0e2',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }
    var barChart_OperatingEfficiencyRatio = function(){
        if(jQuery('#barChart_OperatingEfficiencyRatio').length > 0 ){
            const barChart_OperatingEfficiencyRatio = document.getElementById("barChart_OperatingEfficiencyRatio").getContext('2d');

            barChart_OperatingEfficiencyRatio.height = 100;

            new Chart(barChart_OperatingEfficiencyRatio, {
                type: 'line',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels:  businessInteligenceGraphLablesName,
                    datasets: [
                        {
                            label: "Business Intelligence accounts payable",
                            data: businessInteligenceGrapFY_operating_efficiency,
                            borderColor: 'black',
                            borderWidth: "2",
							backgroundColor: '#61c0e2',
                            pointRadius: 5,
                            pointBackgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],}
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 2,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    },
                //     tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             return data.labels[tooltipItem.index] + ': ' + data.datasets[0].data[tooltipItem.index];
                //         }
                //     }
                // }
                }
            });
        }
    }

    //========================================================================== BI graph start ========================= //

    //========================================================================== Ratio graph start ========================= //


    //========================================================================== finding graph start ========================= //


    // Revenue graphp start
    var barChart1 = function(){
		if(jQuery('#barChart_1').length > 0 ){
			const barChart_1 = document.getElementById("barChart_1").getContext('2d');

			barChart_1.height = 100;

			new Chart(barChart_1, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Revenue",
                            data: financialFindingsGrapFY_revenue,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}

    // Revenue graphp end

    // =========================NetProfit graphp start  ===================
    var barChart_NetProfit = function(){
		if(jQuery('#barChart_NetProfit').length > 0 ){
			const barChart_NetProfit = document.getElementById("barChart_NetProfit").getContext('2d');

			barChart_NetProfit.height = 100;

			new Chart(barChart_NetProfit, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Net Profit",
                            data: financialFindingsGrapFY_net_profit,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}
    // =========================NetProfit graphp end =====================
    // ========================GrossProfit graphp start  ===================
     var barChart_GrossProfit = function(){
		if(jQuery('#barChart_GrossProfit').length > 0 ){
			const barChart_GrossProfit = document.getElementById("barChart_GrossProfit").getContext('2d');

			barChart_GrossProfit.height = 100;

			new Chart(barChart_GrossProfit, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Gross Profit",
                            data: financialFindingsGrapFY_gross_profit,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}
    // ========================GrossProfit graphp end =====================
    // =======================WorkingCapital graphp start  ===================
    var barChart_WorkingCapital = function(){
		if(jQuery('#barChart_WorkingCapital').length > 0 ){
			const barChart_WorkingCapital = document.getElementById("barChart_WorkingCapital").getContext('2d');

			barChart_WorkingCapital.height = 100;

			new Chart(barChart_WorkingCapital, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Working Capital",
                            data: financialFindingsGrapFY_working_capital_1,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}
    // =======================WorkingCapital graphp end =====================

    // =======================WorkingCapital graphp start  ===================
    var barChart_QuickAssets = function(){
		if(jQuery('#barChart_QuickAssets').length > 0 ){
			const barChart_QuickAssets = document.getElementById("barChart_QuickAssets").getContext('2d');

			barChart_QuickAssets.height = 100;

			new Chart(barChart_QuickAssets, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Quick Assets",
                            data: financialFindingsGrapFY_quick_assets,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}
    // =======================WorkingCapital graphp end =====================

    var barChart_TotalAssets = function(){
		if(jQuery('#barChart_TotalAssets').length > 0 ){
			const barChart_TotalAssets = document.getElementById("barChart_TotalAssets").getContext('2d');

			barChart_TotalAssets.height = 100;

			new Chart(barChart_TotalAssets, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Total Assets",
                            data: financialFindingsGrapFY_total_assets,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}

    var barChart_CurrentAssets = function(){
		if(jQuery('#barChart_CurrentAssets').length > 0 ){
			const barChart_CurrentAssets = document.getElementById("barChart_CurrentAssets").getContext('2d');

			barChart_CurrentAssets.height = 100;

			new Chart(barChart_CurrentAssets, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Current Assets",
                            data: financialFindingsGrapFY_current_assets,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}

    var barChart_CurrentLiabilities = function(){
		if(jQuery('#barChart_CurrentLiabilities').length > 0 ){
			const barChart_CurrentLiabilities = document.getElementById("barChart_CurrentLiabilities").getContext('2d');

			barChart_CurrentLiabilities.height = 100;

			new Chart(barChart_CurrentLiabilities, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Current Liabilities",
                            data: financialFindingsGrapFY_current_liabilities,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}

    var barChart_Debt = function(){
		if(jQuery('#barChart_Debt').length > 0 ){
			const barChart_Debt = document.getElementById("barChart_Debt").getContext('2d');

			barChart_Debt.height = 100;

			new Chart(barChart_Debt, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Debt",
                            data: financialFindingsGrapFY_debt,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}
    var barChart_AverageInventory = function(){
		if(jQuery('#barChart_AverageInventory').length > 0 ){
			const barChart_AverageInventory = document.getElementById("barChart_AverageInventory").getContext('2d');

			barChart_AverageInventory.height = 100;

			new Chart(barChart_AverageInventory, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Average Inventory",
                            data: financialFindingsGrapFY_average_inventory,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}

    var barChart_NetSales = function(){
		if(jQuery('#barChart_NetSales').length > 0 ){
			const barChart_NetSales = document.getElementById("barChart_NetSales").getContext('2d');

			barChart_NetSales.height = 100;

			new Chart(barChart_NetSales, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Net Sales",
                            data: financialFindingsGrapFY_net_sales,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}

    var barChart_ShareCapital = function(){
		if(jQuery('#barChart_ShareCapital').length > 0 ){
			const barChart_ShareCapital = document.getElementById("barChart_ShareCapital").getContext('2d');

			barChart_ShareCapital.height = 100;

			new Chart(barChart_ShareCapital, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Equity Share Capital",
                            data: financialFindingsGrapFY_equity_share_capital,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}

    var barChart_SundryDebtors = function(){
		if(jQuery('#barChart_SundryDebtors').length > 0 ){
			const barChart_SundryDebtors = document.getElementById("barChart_SundryDebtors").getContext('2d');

			barChart_SundryDebtors.height = 100;

			new Chart(barChart_SundryDebtors, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Sundry Debtors",
                            data: financialFindingsGrapFY_sundry_debtors,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}


    var barChart_SundryCreditors = function(){
		if(jQuery('#barChart_SundryCreditors').length > 0 ){
			const barChart_SundryCreditors = document.getElementById("barChart_SundryCreditors").getContext('2d');

			barChart_SundryCreditors.height = 100;

			new Chart(barChart_SundryCreditors, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Sundry Creditors",
                            data: financialFindingsGrapFY_sundry_creditors,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}

    var barChart_LoansAndAdvances = function(){
		if(jQuery('#barChart_LoansAndAdvances').length > 0 ){
			const barChart_LoansAndAdvances = document.getElementById("barChart_LoansAndAdvances").getContext('2d');

			barChart_LoansAndAdvances.height = 100;

			new Chart(barChart_LoansAndAdvances, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Loans And Advances",
                            data: financialFindingsGrapFY_loans_and_advances,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}

    var barChart_CashAndCashEquivalents = function(){
		if(jQuery('#barChart_CashAndCashEquivalents').length > 0 ){
			const barChart_CashAndCashEquivalents = document.getElementById("barChart_CashAndCashEquivalents").getContext('2d');

			barChart_CashAndCashEquivalents.height = 100;

			new Chart(barChart_CashAndCashEquivalents, {
                type: 'bar',
                data: {
                    defaultFontFamily: 'Poppins',
                    labels: financialFindingsGrapFYhLablesName,
                    datasets: [
                        {
                            label: "Financials Findinds Cash & Cash Equivalents",
                            data: financialFindingsGrapFY_cash_and_cash_equivalents,
                            borderColor: '#fff',
                            borderWidth: "0",
                            // Use an array of colors for each bar
                            backgroundColor: ['#2585b1', '#cf924c', '#ad4043', '#78b2b3', '#559e83'],                        }
                    ]
                },
                options: {
                    legend: false,
                    scales: {
                        yAxes: [{
                            show: false,
                            ticks: {
                                beginAtZero: true,
                                color: '#888',
                                fontColor:'#888'
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)",
                                offsetGridLines: true,
                            }
                        }],
                        xAxes: [{
                            barPercentage: 0.5,
                            ticks:{
                                fontColor: '#888',
                            },
                            gridLines:{
                                color:"rgba(255, 255, 255, 0.1)"
                            }
                        }]
                    }
                }
			});
		}
	}




    // finding graph end



	var barChart2 = function(){
		if(jQuery('#barChart_2').length > 0 ){

		//gradient bar chart
			const barChart_2 = document.getElementById("barChart_2").getContext('2d');
			//generate gradient
			const barChart_2gradientStroke = barChart_2.createLinearGradient(0, 0, 0, 250);
			barChart_2gradientStroke.addColorStop(0, "rgba(44, 44, 44, 1)");
			barChart_2gradientStroke.addColorStop(1, "rgba(44, 44, 44, 0.5)");

			barChart_2.height = 100;

			new Chart(barChart_2, {
				type: 'bar',
				data: {
					defaultFontFamily: 'Poppins',
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
					datasets: [
						{
							label: "My First dataset",
							data: [65, 59, 80, 81, 56, 55, 40],
							borderColor: barChart_2gradientStroke,
							borderWidth: "0",
							backgroundColor: barChart_2gradientStroke,
							hoverBackgroundColor: barChart_2gradientStroke
						}
					]
				},
				options: {
					legend: false,
					scales: {
						yAxes: [{
							//display:0,
							ticks: {
								beginAtZero: true,
								fontColor:	'#888',

							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}],
						xAxes: [{
							// Change here
							barPercentage: 0.5,
							ticks: {
								fontColor:	'#888',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}]
					}
				}
			});
		}
	}

	var barChart3 = function(){
		//stalked bar chart
		if(jQuery('#barChart_3').length > 0 ){
			const barChart_3 = document.getElementById("barChart_3").getContext('2d');
			//generate gradient
			const barChart_3gradientStroke = barChart_3.createLinearGradient(50, 100, 50, 50);
			barChart_3gradientStroke.addColorStop(0, "rgba(44, 44, 44, 1)");
			barChart_3gradientStroke.addColorStop(1, "rgba(44, 44, 44, 0.5)");

			const barChart_3gradientStroke2 = barChart_3.createLinearGradient(50, 100, 50, 50);
			barChart_3gradientStroke2.addColorStop(0, "rgba(98, 126, 234, 1)");
			barChart_3gradientStroke2.addColorStop(1, "rgba(98, 126, 234, 1)");

			const barChart_3gradientStroke3 = barChart_3.createLinearGradient(50, 100, 50, 50);
			barChart_3gradientStroke3.addColorStop(0, "rgba(238, 60, 60, 1)");
			barChart_3gradientStroke3.addColorStop(1, "rgba(238, 60, 60, 1)");

			barChart_3.height = 100;

			let barChartData = {
				defaultFontFamily: 'Poppins',
				labels: ['Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun'],
				datasets: [{
					label: 'Red',
					backgroundColor: barChart_3gradientStroke,
					hoverBackgroundColor: barChart_3gradientStroke,
					data: [
						'12',
						'12',
						'12',
						'12',
						'12',
						'12',
						'12'
					]
				}, {
					label: 'Green',
					backgroundColor: barChart_3gradientStroke2,
					hoverBackgroundColor: barChart_3gradientStroke2,
					data: [
						'12',
						'12',
						'12',
						'12',
						'12',
						'12',
						'12'
					]
				}, {
					label: 'Blue',
					backgroundColor: barChart_3gradientStroke3,
					hoverBackgroundColor: barChart_3gradientStroke3,
					data: [
						'12',
						'12',
						'12',
						'12',
						'12',
						'12',
						'12'
					]
				}]

			};

			new Chart(barChart_3, {
				type: 'bar',
				data: barChartData,
				options: {
					legend: {
						display: false
					},
					title: {
						display: false
					},
					tooltips: {
						mode: 'index',
						intersect: false
					},
					responsive: true,
					scales: {
						xAxes: [{
							//display:0,
							stacked: true,
							ticks: {
								fontColor:	'#888',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}],
						yAxes: [{
							//display:0,
							stacked: true,
							ticks: {
								fontColor:	'#888',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}]
					}
				}
			});
		}
	}
	var lineChart1 = function(){


		if(jQuery('#lineChart_1').length > 0 ){


		//basic line chart
			const lineChart_1 = document.getElementById("lineChart_1").getContext('2d');

			Chart.controllers.line = Chart.controllers.line.extend({
				draw: function () {
					draw.apply(this, arguments);
					let nk = this.chart.chart.ctx;
					let _stroke = nk.stroke;
					nk.stroke = function () {
						nk.save();
						nk.shadowColor = 'rgba(255, 0, 0, .2)';
						nk.shadowBlur = 10;
						nk.shadowOffsetX = 0;
						nk.shadowOffsetY = 10;
						_stroke.apply(this, arguments)
						nk.restore();
					}
				}
			});

			lineChart_1.height = 100;

			new Chart(lineChart_1, {
				type: 'line',
				data: {
					defaultFontFamily: 'Poppins',
					labels: ["Jan", "Febr", "Mar", "Apr", "May", "Jun", "Jul"],
					datasets: [
						{
							label: "My First dataset",
							data: [25, 20, 60, 41, 66, 45, 80],
							borderColor: 'rgba(44, 44, 44, 1)',
							borderWidth: "2",
							backgroundColor: 'transparent',
							pointBackgroundColor: 'rgba(44, 44, 44, 1)'
						}
					]
				},
				options: {
					legend: false,
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true,
								max: 100,
								min: 0,
								stepSize: 20,
								padding: 10,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}],
						xAxes: [{
							ticks: {
								padding: 5,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}]
					}
				}
			});

		}
	}

	var lineChart2 = function(){
		//gradient line chart
		if(jQuery('#lineChart_2').length > 0 ){

			const lineChart_2 = document.getElementById("lineChart_2").getContext('2d');
			//generate gradient
			const lineChart_2gradientStroke = lineChart_2.createLinearGradient(500, 0, 100, 0);
			lineChart_2gradientStroke.addColorStop(0, "rgba(44, 44, 44, 1)");
			lineChart_2gradientStroke.addColorStop(1, "rgba(44, 44, 44, 0.5)");

			Chart.controllers.line = Chart.controllers.line.extend({
				draw: function () {
					draw.apply(this, arguments);
					let nk = this.chart.chart.ctx;
					let _stroke = nk.stroke;
					nk.stroke = function () {
						nk.save();
						nk.shadowColor = 'rgba(0, 0, 128, .2)';
						nk.shadowBlur = 10;
						nk.shadowOffsetX = 0;
						nk.shadowOffsetY = 10;
						_stroke.apply(this, arguments)
						nk.restore();
					}
				}
			});

			lineChart_2.height = 100;

			new Chart(lineChart_2, {
				type: 'line',
				data: {
					defaultFontFamily: 'Poppins',
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
					datasets: [
						{
							label: "My First dataset",
							data: [25, 20, 60, 41, 66, 45, 80],
							borderColor: lineChart_2gradientStroke,
							borderWidth: "2",
							backgroundColor: 'transparent',
							pointBackgroundColor: 'rgba(44, 44, 44, 0.5)'
						}
					]
				},
				options: {
					legend: false,
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true,
								max: 100,
								min: 0,
								stepSize: 20,
								padding: 10,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}],
						xAxes: [{
							ticks: {
								padding: 5,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}]
					}
				}
			});
		}
	}
	var lineChart3 = function(){
		//dual line chart
		if(jQuery('#lineChart_3').length > 0 ){
			const lineChart_3 = document.getElementById("lineChart_3").getContext('2d');
			//generate gradient
			const lineChart_3gradientStroke1 = lineChart_3.createLinearGradient(500, 0, 100, 0);
			lineChart_3gradientStroke1.addColorStop(0, "rgba(44, 44, 44, 1)");
			lineChart_3gradientStroke1.addColorStop(1, "rgba(44, 44, 44, 0.5)");

			const lineChart_3gradientStroke2 = lineChart_3.createLinearGradient(500, 0, 100, 0);
			lineChart_3gradientStroke2.addColorStop(0, "rgba(255, 92, 0, 1)");
			lineChart_3gradientStroke2.addColorStop(1, "rgba(255, 92, 0, 1)");

			Chart.controllers.line = Chart.controllers.line.extend({
				draw: function () {
					draw.apply(this, arguments);
					let nk = this.chart.chart.ctx;
					let _stroke = nk.stroke;
					nk.stroke = function () {
						nk.save();
						nk.shadowColor = 'rgba(0, 0, 0, 0)';
						nk.shadowBlur = 10;
						nk.shadowOffsetX = 0;
						nk.shadowOffsetY = 10;
						_stroke.apply(this, arguments)
						nk.restore();
					}
				}
			});

			lineChart_3.height = 100;

			new Chart(lineChart_3, {
				type: 'line',
				data: {
					defaultFontFamily: 'Poppins',
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
					datasets: [
						{
							label: "My First dataset",
							data: [25, 20, 60, 41, 66, 45, 80],
							borderColor: lineChart_3gradientStroke1,
							borderWidth: "2",
							backgroundColor: 'transparent',
							pointBackgroundColor: 'rgba(44, 44, 44, 0.5)'
						}, {
							label: "My First dataset",
							data: [5, 20, 15, 41, 35, 65, 80],
							borderColor: lineChart_3gradientStroke2,
							borderWidth: "2",
							backgroundColor: 'transparent',
							pointBackgroundColor: 'rgba(254, 176, 25, 1)'
						}
					]
				},
				options: {
					legend: false,
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true,
								max: 100,
								min: 0,
								stepSize: 20,
								padding: 10,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}],
						xAxes: [{
							ticks: {
								padding: 5,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}]
					}
				}
			});
		}
	}
	var lineChart03 = function(){
		//dual line chart
		if(jQuery('#lineChart_3Kk').length > 0 ){
			const lineChart_3Kk = document.getElementById("lineChart_3Kk").getContext('2d');
			//generate gradient

			Chart.controllers.line = Chart.controllers.line.extend({
				draw: function () {
					draw.apply(this, arguments);
					let nk = this.chart.chart.ctx;
					let _stroke = nk.stroke;
					nk.stroke = function () {
						nk.save();
						nk.shadowColor = 'rgba(0, 0, 0, 0)';
						nk.shadowBlur = 10;
						nk.shadowOffsetX = 0;
						nk.shadowOffsetY = 10;
						_stroke.apply(this, arguments)
						nk.restore();
					}
				}
			});

			lineChart_3Kk.height = 100;

			new Chart(lineChart_3Kk, {
				type: 'line',
				data: {
					defaultFontFamily: 'Poppins',
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
					datasets: [
						{
							label: "My First dataset",
							data: [90, 60, 80, 50, 60, 55, 80],
							borderColor: 'rgba(58,122,254,1)',
							borderWidth: "3",
							backgroundColor: 'rgba(0,0,0,0)',
							pointBackgroundColor: 'rgba(0, 0, 0, 0)'
						}
					]
				},
				options: {
					legend: false,
					elements: {
							point:{
								radius: 0
							}
					},
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true,
								max: 100,
								min: 0,
								stepSize: 20,
								padding: 10,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							},
							borderWidth:3,
							display:false,
							lineTension:0.4,
						}],
						xAxes: [{
							ticks: {
								padding: 5,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}

						}]
					}
				}
			});
		}

	}
	var areaChart1 = function(){
		//basic area chart
		if(jQuery('#areaChart_1').length > 0 ){
			const areaChart_1 = document.getElementById("areaChart_1").getContext('2d');

			areaChart_1.height = 100;

			new Chart(areaChart_1, {
				type: 'line',
				data: {
					defaultFontFamily: 'Poppins',
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
					datasets: [
						{
							label: "My First dataset",
							data: [25, 20, 60, 41, 66, 45, 80],
							borderColor: 'rgba(0, 0, 1128, .3)',
							borderWidth: "1",
							backgroundColor: 'rgba(44, 44, 44,1)',
							pointBackgroundColor: 'rgba(0, 0, 1128, .3)'
						}
					]
				},
				options: {
					legend: false,
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true,
								max: 100,
								min: 0,
								stepSize: 20,
								padding: 10,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}],
						xAxes: [{
							ticks: {
								padding: 5,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}]
					}
				}
			});
		}
	}
	var areaChart2 = function(){
		//gradient area chart
		if(jQuery('#areaChart_2').length > 0 ){
			const areaChart_2 = document.getElementById("areaChart_2").getContext('2d');
			//generate gradient
			const areaChart_2gradientStroke = areaChart_2.createLinearGradient(0, 1, 0, 500);
			areaChart_2gradientStroke.addColorStop(0, "rgba(238, 60, 60, 0.2)");
			areaChart_2gradientStroke.addColorStop(1, "rgba(238, 60, 60, 0)");

			areaChart_2.height = 100;

			new Chart(areaChart_2, {
				type: 'line',
				data: {
					defaultFontFamily: 'Poppins',
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
					datasets: [
						{
							label: "My First dataset",
							data: [25, 20, 60, 41, 66, 45, 80],
							borderColor: "#ff2625",
							borderWidth: "4",
							backgroundColor: areaChart_2gradientStroke
						}
					]
				},
				options: {
					legend: false,
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true,
								max: 100,
								min: 0,
								stepSize: 20,
								padding: 5,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}],
						xAxes: [{
							ticks: {
								padding: 5,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}]
					}
				}
			});
		}
	}

	var areaChart3 = function(){
		//gradient area chart
		if(jQuery('#areaChart_3').length > 0 ){
			const areaChart_3 = document.getElementById("areaChart_3").getContext('2d');

			areaChart_3.height = 100;

			new Chart(areaChart_3, {
				type: 'line',
				data: {
					defaultFontFamily: 'Poppins',
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
					datasets: [
						{
							label: "My First dataset",
							data: [25, 20, 60, 41, 66, 45, 80],
							borderColor: 'rgb(44, 44, 44)',
							borderWidth: "1",
							backgroundColor: 'rgba(44, 44, 44,1)'
						},
						{
							label: "My First dataset",
							data: [5, 25, 20, 41, 36, 75, 70],
							borderColor: 'rgb(255, 92, 0)',
							borderWidth: "1",
							backgroundColor: 'rgba(255, 92, 0, .5)'
						}
					]
				},
				options: {
					legend: false,
					scales: {
						yAxes: [{
							ticks: {
								beginAtZero: true,
								max: 100,
								min: 0,
								stepSize: 20,
								padding: 10,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}],
						xAxes: [{
							ticks: {
								padding: 5,
								fontColor:	'#ffffff',
							},
							gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
						}]
					}
				}
			});
		}
	}

	var radarChart = function(){
		if(jQuery('#radar_chart').length > 0 ){
			//radar chart
			const radar_chart = document.getElementById("radar_chart").getContext('2d');

			const radar_chartgradientStroke1 = radar_chart.createLinearGradient(500, 0, 100, 0);
			radar_chartgradientStroke1.addColorStop(0, "rgba(54, 185, 216, .5)");
			radar_chartgradientStroke1.addColorStop(1, "rgba(75, 255, 162, .5)");

			const radar_chartgradientStroke2 = radar_chart.createLinearGradient(500, 0, 100, 0);
			radar_chartgradientStroke2.addColorStop(0, "rgba(68, 0, 235, .5");
			radar_chartgradientStroke2.addColorStop(1, "rgba(68, 236, 245, .5");

			// radar_chart.height = 100;
			new Chart(radar_chart, {
				type: 'radar',
				data: {
					defaultFontFamily: 'Poppins',
					labels: [["Eating", "Dinner"], ["Drinking", "Water"], "Sleeping", ["Designing", "Graphics"], "Coding", "Cycling", "Running"],
					datasets: [
						{
							label: "My First dataset",
							data: [65, 59, 66, 45, 56, 55, 40],
							borderColor: '#ffff',
							borderWidth: "1",
							backgroundColor: radar_chartgradientStroke2
						},
						{
							label: "My Second dataset",
							data: [28, 12, 40, 19, 63, 27, 87],
							borderColor: '#ffff',
							borderWidth: "1",
							backgroundColor: radar_chartgradientStroke1
						}
					]
				},
				options: {
					legend: false,
					//maintainAspectRatio: false,
					scale: {
						ticks: {
							beginAtZero: true,
							fontColor:'#ffffff',
						},
						gridLines:{
								color:"rgba(255, 255, 255, 0.1)"
							}
					}
				}
			});
		}
	}
	var pieChart = function(){
		//pie chart
		if(jQuery('#pie_chart').length > 0 ){
			//pie chart
			const pie_chart = document.getElementById("pie_chart").getContext('2d');
			// pie_chart.height = 100;
			new Chart(pie_chart, {
				type: 'pie',
				data: {
					defaultFontFamily: 'Poppins',
					datasets: [{
						data: [45, 25, 20, 10],
						borderWidth: 0,
						backgroundColor: [
							"rgba(44, 44, 44, .9)",
							"rgba(44, 44, 44, .7)",
							"rgba(44, 44, 44,1)",
							"rgba(0,0,0,0.07)"
						],
						hoverBackgroundColor: [
							"rgba(44, 44, 44, .9)",
							"rgba(44, 44, 44, .7)",
							"rgba(44, 44, 44,1)",
							"rgba(0,0,0,0.07)"
						]

					}],
					labels: [
						"one",
						"two",
						"three",
						"four"
					]
				},
				options: {
					responsive: true,
					legend: false,
					//maintainAspectRatio: false
				}
			});
		}
	}
    var doughnutChart = function(){
		if(jQuery('#doughnut_chart').length > 0 ){
			//doughut chart
			const doughnut_chart = document.getElementById("doughnut_chart").getContext('2d');
			doughnut_chart.height = 100;
			new Chart(doughnut_chart, {
				type: 'doughnut',
				data: {
					weight: 5,
					defaultFontFamily: 'Poppins',
					datasets: [{
						data: finalValueforGraKeyObservation,
						borderWidth: 3,
						borderColor: "rgba(255,255,255,1)",
						backgroundColor: [
							"rgba(98, 126, 234, 1)",


						],
						hoverBackgroundColor: [
							"rgba(98, 126, 234, .9)",

						]

					}],
					labels: [
					    "Score",
					    "Out of",


					]
				},
				options: {
					weight: 19,

                     cutoutPercentage: 80,
                rotation: 1 * Math.PI,
                circumference: 1 * Math.PI,
                responsive: true,
					// maintainAspectRatio: false
				}
			});
		}
	}


    // // Doughnut Chart Function
    // var doughnutChartall = function (elementId, dataValues, label1, label2) {
    //     if (jQuery('#' + elementId).length > 0) {
    //         const doughnut_chart = document.getElementById(elementId).getContext('2d');
    //         new Chart(doughnut_chart, {
    //             type: 'doughnut',
    //             data: {
    //                 weight: 10,
    //                 defaultFontFamily: 'Poppins',
    //                 datasets: [{
    //                     data: dataValues,
    //                     borderWidth: 3,
    //                     borderColor: "rgba(255,255,255,1)",
    //                     backgroundColor: [
    //                         "rgba(44, 44, 44, 1)",
    //                         "rgba(98, 126, 234, 1)",
    //                     ],
    //                     hoverBackgroundColor: [
    //                         "rgba(44, 44, 44, 0.9)",
    //                         "rgba(98, 126, 234, .9)",
    //                     ]
    //                 }],
    //                 labels: [
	// 					label1,
    //                     label2,
	// 				]
    //             },
    //             options: {
    //                 weight: 10,
    //                 cutoutPercentage: 60,
    //                 responsive: true,
    //                 maintainAspectRatio: false
    //             }
    //         });
    //     }
    // }



    // Example usage for a data value of 35 and label "Example"


    // // Call the function for each section
    // doughnutChartall("doughnut_chart_1", dougGraphHighRisk, "High Risk", "Over All Risk");
    // doughnutChartall("doughnut_chart_2", dougGraphMediumRisk, "Medium Risk", "Over All Risk");
    // doughnutChartall("doughnut_chart_3", dougGraphLowRisk, "Low Risk", "Over All Risk");

	var polarChart = function(){
		if(jQuery('#polar_chart').length > 0 ){
			//polar chart
			const polar_chart = document.getElementById("polar_chart").getContext('2d');
			// polar_chart.height = 100;
			new Chart(polar_chart, {
				type: 'polarArea',
				data: {
					defaultFontFamily: 'Poppins',
					datasets: [{
						data: [15, 18, 9, 6, 19],
						borderWidth: 0,
						backgroundColor: [
							"rgba(44, 44, 44, 1)",
							"rgba(98, 126, 234, 1)",
							"rgba(238, 60, 60, 1)",
							"rgba(54, 147, 255, 1)",
							"rgba(255, 92, 0, 1)"
						]

					}]
				},
				options: {
					responsive: true,
					//maintainAspectRatio: false
				}
			});

		}
	}



	/* Function ============ */
	return {
		init:function(){
		},


		load:function(){
			// finding financial start
            barChart1();
			barChart_NetProfit();
            barChart_GrossProfit();
            barChart_WorkingCapital();
            barChart_QuickAssets();
            barChart_TotalAssets();
            barChart_CurrentAssets();
            barChart_CurrentLiabilities();

            barChart_Debt();
            barChart_AverageInventory();
            barChart_NetSales();
            barChart_ShareCapital();


            barChart_SundryDebtors();
            barChart_SundryCreditors();
            barChart_LoansAndAdvances();
            barChart_CashAndCashEquivalents();

			// finding financial end
            // financial Ratio start

            barChart1financialRatio();
            barChart_QuickRatio();
            barChart_DebtRatio();
            barChart_SolvencyRatio();
            barChart_DebtToEquityRatio();
            barChart_AssetTurnoverRatio();
            barChart_AbsoluteLiquidityRatio();
            barChart_ProprietaryRatio();
            barChart_NetProfitRatio();
            barChart_GrossProfitRatio();
            barChart_SpringateSScore();
            barChart_TradeReceivableDays();
            barChart_TradePayableDays();
            barChart_TafflerZScore();
            barChart_ZmijewskiXScore();

            // financial Ratio end


            // business Ratio start
            barChart1businessIntelligenc();
            barChart_DaysSalesInInventory();
            barChart_InventoryTurnoverRatio();
            barChart_OperatingEfficiencyRatio();
            // business Ratio end


            // doughnutChartall();
			barChart2();
			barChart3();
			lineChart1();
			lineChart2();
			lineChart3();
			lineChart03();
			areaChart1();
			areaChart2();
			areaChart3();
			radarChart();
			pieChart();
			doughnutChart();
			polarChart();
		},

		resize:function(){
			// barChart1();
			// barChart2();
			// barChart3();
			// lineChart1();
			// lineChart2();
			// lineChart3();
			// lineChart03();
			// areaChart1();
			// areaChart2();
			// areaChart3();
			// radarChart();
			// pieChart();
			// doughnutChart();
			// polarChart();
		}
	}

}();

jQuery(document).ready(function(){
});

jQuery(window).on('load',function(){
	dlabSparkLine.load();
});

jQuery(window).on('resize',function(){
	//dlabSparkLine.resize();
	setTimeout(function(){ dlabSparkLine.resize(); }, 1000);
});

})(jQuery);
</script>


@endsection
