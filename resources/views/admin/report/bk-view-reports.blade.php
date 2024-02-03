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
                    <p style="color:rgb(0, 0, 0); font-size:16px;"> <b>Client Name: {{$Getclient->first_name}}</b><br>
                        <b>Vender Name:{{$getThirdPartyForID->third_party_name}} </b>
                    </p>
                    <b>Team Member Name:{{$GetTeaMuser ? $GetTeaMuser->user_name : ''}} </b></p>
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
                                        <a class="nav-link" data-bs-toggle="tab" href="#Director-Details"> Director Details</a>
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
                                                    <thead class="thead-primary">
                                                        <tr>



                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-4">Incorporation Year</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-8">{{ $FirmBackground->incorporation_year }}</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Directors</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">Ms. Cherry Banga</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Form of Entity</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">{{ $FirmBackground->form_of_entity }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Industry</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">{{ $FirmBackground->industry }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Address</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">{{ $FirmBackground->address }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Business Details</td>
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
        </tr>
    </thead>
    <tbody>

        @for ($i = 1; $i <= 8; $i++)
            @if(!empty($License->{'license_name_'.$i}))
                <tr>
                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 text-start">{{$License->{'license_name_'.$i} }}</td>
                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 text-start">{{$License->{'license_no_'.$i} }}</td>
                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 text-start">{{$License->{'date_of_issuance_'.$i} }}</td>
                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 text-start">{{$License->{'date_of_expiry_'.$i} }}</td>
                </tr>
            @endif
        @endfor

        <tr>
            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 text-start">Ofac Check</td>
            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 text-start">{{$FirmBackground->ofac_check}}</td>
            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 align-items-end text-start">
                <a href="{{ URL::to('/company/report/firm_file_download'.'/'.base64_encode($FirmBackground->id)) }}" class="download-license-btn">Download Licenses</a>
            </td>
            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-3 text-start"></td>

        </tr>
    </tbody>
</table>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Director-Details">
                                        <div class="pt-4">
                                            <div class="table-responsive">
                                                <table class="table primary-table-bordered">
                                                    <thead class="thead-primary">
                                                        <tr>



                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                 <!-- director 2 -->
                                            @if ( !empty($FirmBackground->name_1) )
                                            <tr>
                                                    <th style="background-color: #5a595a; color: white;" scope="col"
                                                        class="col-md-4">Director's Name (1)</th>
                                                    <th style="background-color: #5a595a; color: white;" scope="col"
                                                        class="col-md-8">{{ $FirmBackground->name_1 }}</th>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">PAN</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->pan_1 }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">AADHAR</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->aadhar_1 }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">Educational Background</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->educational_background_1 }}
                                                    </td>
                                                </tr>
                                            @endif
                                            @if ( !empty($FirmBackground->name_2) )
                                            <tr>
                                                    <th style="background-color: #5a595a; color: white;" scope="col"
                                                        class="col-md-4">Director's Name (2)</th>
                                                    <th style="background-color: #5a595a; color: white;" scope="col"
                                                        class="col-md-8">{{ $FirmBackground->name_2 }}</th>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">PAN</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->pan_2 }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">AADHAR</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->aadhar_2 }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">Educational Background</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->educational_background_2 }}
                                                    </td>
                                                </tr>
                                            @endif
                                            @if ( !empty($FirmBackground->name_3) )
                                            <tr>
                                                    <th style="background-color: #5a595a; color: white;" scope="col"
                                                        class="col-md-4">Director's Name (3)</th>
                                                    <th style="background-color: #5a595a; color: white;" scope="col"
                                                        class="col-md-8">{{ $FirmBackground->name_3 }}</th>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">PAN</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->pan_3 }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">AADHAR</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->aadhar_3 }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">Educational Background</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->educational_background_3 }}
                                                    </td>
                                                </tr>
                                            @endif
                                            @if ( !empty($FirmBackground->name_4) )
                                            <tr>
                                                    <th style="background-color: #5a595a; color: white;" scope="col"
                                                        class="col-md-4">Director's Name (4)</th>
                                                    <th style="background-color: #5a595a; color: white;" scope="col"
                                                        class="col-md-8">{{ $FirmBackground->name_4 }}</th>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">PAN</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->pan_4 }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">AADHAR</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->aadhar_4 }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">Educational Background</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->educational_background_4 }}
                                                    </td>
                                                </tr>
                                            @endif
                                            @if ( !empty($FirmBackground->name_5) )
                                            <tr>
                                                    <th style="background-color: #5a595a; color: white;" scope="col"
                                                        class="col-md-4">Director's Name (5)</th>
                                                    <th style="background-color: #5a595a; color: white;" scope="col"
                                                        class="col-md-8">{{ $FirmBackground->name_5 }}</th>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">PAN</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->pan_5 }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">AADHAR</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->aadhar_5 }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">Educational Background</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->educational_background_5 }}
                                                    </td>
                                                </tr>
                                            @endif
                                            @if ( !empty($FirmBackground->name_6) )
                                            <tr>
                                                    <th style="background-color: #5a595a; color: white;" scope="col"
                                                        class="col-md-4">Director's Name (6)</th>
                                                    <th style="background-color: #5a595a; color: white;" scope="col"
                                                        class="col-md-8">{{ $FirmBackground->name_6 }}</th>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">PAN</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->pan_6 }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">AADHAR</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->aadhar_6 }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">Educational Background</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->educational_background_6 }}
                                                    </td>
                                                </tr>
                                            @endif
                                            @if ( !empty($FirmBackground->name_7) )
                                            <tr>
                                                    <th style="background-color: #5a595a; color: white;" scope="col"
                                                        class="col-md-4">Director's Name (7)</th>
                                                    <th style="background-color: #5a595a; color: white;" scope="col"
                                                        class="col-md-8">{{ $FirmBackground->name_7 }}</th>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">PAN</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->pan_7 }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">AADHAR</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->aadhar_7 }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">Educational Background</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->educational_background_7 }}
                                                    </td>
                                                </tr>
                                            @endif
                                            @if ( !empty($FirmBackground->name_8) )
                                            <tr>
                                                    <th style="background-color: #5a595a; color: white;" scope="col"
                                                        class="col-md-4">Director's Name (8)</th>
                                                    <th style="background-color: #5a595a; color: white;" scope="col"
                                                        class="col-md-8">{{ $FirmBackground->name_8 }}</th>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">PAN</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->pan_8 }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">AADHAR</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->aadhar_8 }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">Educational Background</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->educational_background_8 }}
                                                    </td>
                                                </tr>
                                            @endif
                                            @if ( !empty($FirmBackground->name_9) )
                                            <tr>
                                                    <th style="background-color: #5a595a; color: white;" scope="col"
                                                        class="col-md-4">Director's Name (9)</th>
                                                    <th style="background-color: #5a595a; color: white;" scope="col"
                                                        class="col-md-8">{{ $FirmBackground->name_9 }}</th>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">PAN</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->pan_9 }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">AADHAR</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->aadhar_9 }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">Educational Background</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->educational_background_9 }}
                                                    </td>
                                                </tr>
                                            @endif
                                            @if ( !empty($FirmBackground->name_10) )
                                            <tr>
                                                    <th style="background-color: #5a595a; color: white;" scope="col"
                                                        class="col-md-4">Director's Name (10)</th>
                                                    <th style="background-color: #5a595a; color: white;" scope="col"
                                                        class="col-md-8">{{ $FirmBackground->name_10 }}</th>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">PAN</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->pan_10 }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">AADHAR</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->aadhar_10 }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">Educational Background</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->educational_background_10 }}
                                                    </td>
                                                </tr>
                                            @endif
                                                <tr>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">Credit Score</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-8">{{ $FirmBackground->credit_score }}</td>
                                                </tr>

                                    </tbody>
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
                                                        @if (!empty($FirstDirectorsFirm->director_name_1_1))
                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">{{$FirstDirectorsFirm->director_name_1_1}}</th>
                                                        </tr>

                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">{{$FirstDirectorsFirm->company_name_1_1}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1"> {{$FirstDirectorsFirm->cin_1_1}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->company_status_1_1}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->appointment_date_1_1}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->business_of_entity_1_1}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->business_conflict_1_1}}</td>
                                                        </tr>
                                                        @endif

                                                        @if (!empty($FirstDirectorsFirm->director_name_1_2))

                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">{{$FirstDirectorsFirm->director_name_1_2}}</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">{{$FirstDirectorsFirm->company_name_1_2}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1"> {{$FirstDirectorsFirm->cin_1_2}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->company_status_1_2}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->appointment_date_1_2}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->business_of_entity_1_2}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->business_conflict_1_2}}</td>
                                                        </tr>
                                                        @endif

                                                        @if (!empty($FirstDirectorsFirm->director_name_1_3))

                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">{{$FirstDirectorsFirm->director_name_1_3}}</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">{{$FirstDirectorsFirm->company_name_1_3}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1"> {{$FirstDirectorsFirm->cin_1_3}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->company_status_1_3}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->appointment_date_1_3}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->business_of_entity_1_3}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->business_conflict_1_3}}</td>
                                                        </tr>
                                                        @endif

                                                        @if (!empty($FirstDirectorsFirm->director_name_1_4))

                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">{{$FirstDirectorsFirm->director_name_1_4}}</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">{{$FirstDirectorsFirm->company_name_1_4}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1"> {{$FirstDirectorsFirm->cin_1_4}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->company_status_1_4}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->appointment_date_1_4}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->business_of_entity_1_4}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->business_conflict_1_4}}</td>
                                                        </tr>
                                                        @endif

                                                        @if (!empty($FirstDirectorsFirm->director_name_1_5))


                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">{{$FirstDirectorsFirm->director_name_1_5}}</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">{{$FirstDirectorsFirm->company_name_1_5}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1"> {{$FirstDirectorsFirm->cin_1_5}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->company_status_1_5}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->appointment_date_1_5}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->business_of_entity_1_5}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->business_conflict_1_5}}</td>
                                                        </tr>
                                                        @endif

                                                        @if (!empty($FirstDirectorsFirm->director_name_1_6))

                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">{{$FirstDirectorsFirm->director_name_1_6}}</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">{{$FirstDirectorsFirm->company_name_1_6}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1"> {{$FirstDirectorsFirm->cin_1_6}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->company_status_1_6}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->appointment_date_1_6}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->business_of_entity_1_6}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->business_conflict_1_6}}</td>
                                                        </tr>
                                                        @endif

                                                        @if (!empty($FirstDirectorsFirm->director_name_1_7))

                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">{{$FirstDirectorsFirm->director_name_1_7}}</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">{{$FirstDirectorsFirm->company_name_1_7}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1"> {{$FirstDirectorsFirm->cin_1_7}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->company_status_1_7}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->appointment_date_1_7}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->business_of_entity_1_7}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->business_conflict_1_7}}</td>
                                                        </tr>
                                                        @endif

                                                        @if (!empty($FirstDirectorsFirm->director_name_1_8))


                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">{{$FirstDirectorsFirm->director_name_1_8}}</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">{{$FirstDirectorsFirm->company_name_1_8}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1"> {{$FirstDirectorsFirm->cin_1_8}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->company_status_1_8}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->appointment_date_1_8}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->business_of_entity_1_8}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$FirstDirectorsFirm->business_conflict_1_8}}</td>
                                                        </tr>

                                                        @endif



                                                <!-----------------===========================================    second director      ============================================================  -->

                                                @if (!empty($FirstDirectorsFirm->director_name_2_1))
                                                            <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name (2)</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">{{$SecondDirectorsFirm->director_name_2_1}}</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">{{$SecondDirectorsFirm->company_name_2_1}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1"> {{$SecondDirectorsFirm->cin_2_1}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->company_status_2_1}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->appointment_date_2_1}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->business_of_entity_2_1}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->business_conflict_2_1}}</td>
                                                        </tr>
                                                        @endif

                                                        @if (!empty($FirstDirectorsFirm->director_name_2_2))
                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name (2)</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">{{$SecondDirectorsFirm->director_name_2_2}}</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">{{$SecondDirectorsFirm->company_name_2_2}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1"> {{$SecondDirectorsFirm->cin_2_2}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->company_status_2_2}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->appointment_date_2_2}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->business_of_entity_2_2}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->business_conflict_2_2}}</td>
                                                        </tr>
                                                        @endif

                                                        @if (!empty($FirstDirectorsFirm->director_name_2_3))
                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name (2)</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">{{$SecondDirectorsFirm->director_name_2_3}}</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">{{$SecondDirectorsFirm->company_name_2_3}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1"> {{$SecondDirectorsFirm->cin_2_3}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->company_status_2_3}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->appointment_date_2_3}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->business_of_entity_2_3}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->business_conflict_2_3}}</td>
                                                        </tr>
                                                        @endif

                                                        @if (!empty($FirstDirectorsFirm->director_name_2_4))
                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name (2)</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">{{$SecondDirectorsFirm->director_name_2_4}}</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">{{$SecondDirectorsFirm->company_name_2_4}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1"> {{$SecondDirectorsFirm->cin_2_4}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->company_status_2_4}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->appointment_date_2_4}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->business_of_entity_2_4}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->business_conflict_2_4}}</td>
                                                        </tr>
                                                        @endif

                                                        @if (!empty($FirstDirectorsFirm->director_name_2_5))
                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name (2)</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">{{$SecondDirectorsFirm->director_name_2_5}}</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">{{$SecondDirectorsFirm->company_name_2_5}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1"> {{$SecondDirectorsFirm->cin_2_5}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->company_status_2_5}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->appointment_date_2_5}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->business_of_entity_2_5}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->business_conflict_2_5}}</td>
                                                        </tr>
                                                        @endif

                                                        @if (!empty($FirstDirectorsFirm->director_name_2_6))
                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name (2)</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">{{$SecondDirectorsFirm->director_name_2_6}}</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">{{$SecondDirectorsFirm->company_name_2_6}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1"> {{$SecondDirectorsFirm->cin_2_6}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->company_status_2_6}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->appointment_date_2_6}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->business_of_entity_2_6}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->business_conflict_2_6}}</td>
                                                        </tr>
                                                        @endif

                                                        @if (!empty($FirstDirectorsFirm->director_name_2_7))
                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name (2)</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">{{$SecondDirectorsFirm->director_name_2_7}}</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">{{$SecondDirectorsFirm->company_name_2_7}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1"> {{$SecondDirectorsFirm->cin_2_7}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->company_status_2_7}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->appointment_date_2_7}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->business_of_entity_2_7}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->business_conflict_2_7}}</td>
                                                        </tr>

                                                        @endif

                                                        @if (!empty($FirstDirectorsFirm->director_name_2_8))
                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name (2)</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">{{$SecondDirectorsFirm->director_name_2_8}}</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">{{$SecondDirectorsFirm->company_name_2_8}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1"> {{$SecondDirectorsFirm->cin_2_8}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->company_status_2_8}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->appointment_date_2_8}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->business_of_entity_2_8}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$SecondDirectorsFirm->business_conflict_2_8}}</td>
                                                        </tr>


                                                        @endif

                                            <!-----------------===========================================    third director      ============================================================  -->
                                            @if (!empty($FirstDirectorsFirm->director_name_3_1))

                                                            <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name (3)</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">{{$ThirdDirectorsFirm->director_name_3_1}}</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">{{$ThirdDirectorsFirm->company_name_3_1}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1"> {{$ThirdDirectorsFirm->cin_3_1}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->company_status_3_1}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->appointment_date_3_1}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->business_of_entity_3_1}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->business_conflict_3_1}}</td>
                                                        </tr>
                                                        @endif
                                                        @if (!empty($FirstDirectorsFirm->director_name_3_2))

                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name (3)</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">{{$ThirdDirectorsFirm->director_name_3_2}}</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">{{$ThirdDirectorsFirm->company_name_3_2}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1"> {{$ThirdDirectorsFirm->cin_3_2}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->company_status_3_2}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->appointment_date_3_2}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->business_of_entity_3_2}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->business_conflict_3_2}}</td>
                                                        </tr>
                                                        @endif
                                                        @if (!empty($FirstDirectorsFirm->director_name_3_3))
                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name (3)</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">{{$ThirdDirectorsFirm->director_name_3_3}}</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">{{$ThirdDirectorsFirm->company_name_3_3}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1"> {{$ThirdDirectorsFirm->cin_3_3}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->company_status_3_3}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->appointment_date_3_3}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->business_of_entity_3_3}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->business_conflict_3_3}}</td>
                                                        </tr>
                                                        @endif
                                                        @if (!empty($FirstDirectorsFirm->director_name_3_4))
                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name (3)</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">{{$ThirdDirectorsFirm->director_name_3_4}}</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">{{$ThirdDirectorsFirm->company_name_3_4}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1"> {{$ThirdDirectorsFirm->cin_3_4}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->company_status_3_4}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->appointment_date_3_4}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->business_of_entity_3_4}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->business_conflict_3_4}}</td>
                                                        </tr>
                                                        @endif
                                                        @if (!empty($FirstDirectorsFirm->director_name_3_5))
                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name (3)</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">{{$ThirdDirectorsFirm->director_name_3_5}}</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">{{$ThirdDirectorsFirm->company_name_3_5}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1"> {{$ThirdDirectorsFirm->cin_3_5}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->company_status_3_5}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->appointment_date_3_5}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->business_of_entity_3_5}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->business_conflict_3_5}}</td>
                                                        </tr>
                                                        @endif
                                                        @if (!empty($FirstDirectorsFirm->director_name_3_6))
                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name (3)</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">{{$ThirdDirectorsFirm->director_name_3_6}}</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">{{$ThirdDirectorsFirm->company_name_3_6}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1"> {{$ThirdDirectorsFirm->cin_3_6}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->company_status_3_6}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->appointment_date_3_6}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->business_of_entity_3_6}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->business_conflict_3_6}}</td>
                                                        </tr>
                                                        @endif
                                                        @if (!empty($FirstDirectorsFirm->director_name_3_7))
                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name (3)</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">{{$ThirdDirectorsFirm->director_name_3_7}}</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">{{$ThirdDirectorsFirm->company_name_3_7}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1"> {{$ThirdDirectorsFirm->cin_3_7}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->company_status_3_7}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->appointment_date_3_7}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->business_of_entity_3_7}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->business_conflict_3_7}}</td>
                                                        </tr>

                                                        @endif
                                                        @if (!empty($FirstDirectorsFirm->director_name_3_8))
                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name (3)</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">{{$ThirdDirectorsFirm->director_name_3_8}}</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1"  class="col-md-2">Company Name</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">CIN</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Company Status</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Appointment Date</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business of the Entity</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Business Conflict</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">{{$ThirdDirectorsFirm->company_name_3_8}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1"> {{$ThirdDirectorsFirm->cin_3_8}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->company_status_3_8}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->appointment_date_3_8}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->business_of_entity_3_8}}</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">{{$ThirdDirectorsFirm->business_conflict_3_8}}</td>
                                                        </tr>

                                                        @endif

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
                                    <a class="nav-link active" data-bs-toggle="tab" href="#ON-GROUND VERIFICATION "> Basic Information Registration/Licenses Director Details</a>
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
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Address</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">{{$OnGroundVerification->address_details}} </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Address Visit Findings</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">{{$OnGroundVerification->address_visit_findings}}</td>
                                                    </tr>

                                                    <tr>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4 text-start">ON-GROUND VERIFICATION SCORE = {{$OnGroundVerification->on_ground_verification_score}}</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4 align-items-end"><a href="{{ URL::to('/panel/report/onGround_file_download'.'/'. base64_encode($OnGroundVerification->id)) }}" class="download-license-btn">Download field visit Image</a></td>

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
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">Jurisdiction</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">Record</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">Subject Matter</td>
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
        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">
            LEGAL SCORE = {{ $CourtCheck->legal_score }}
        </td>
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
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">Jurisdiction</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">Record</td>
                                                    <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
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

    <tr>
        <<td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"
                                                        class="col-md-4">
            LEGAL SCORE = {{ $CourtCheck->legal_score }}
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
                                                <tr>
                                                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3">Name</th>
                                                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3">Status</th>
                                                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3">Amount</th>
                                                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3">Charged Property</th>
                                                    </tr>
                                                    <tr>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">  {{ $Financial->name_1 }}</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{ $Financial->status_1 }}</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{ $Financial->amount_1 }}</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{ $Financial->charged_property_1 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3">Name</th>
                                                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3">Status</th>
                                                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3">Amount</th>
                                                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3">Charged Property</th>
                                                    </tr>
                                                    <tr>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">  {{ $Financial->name_2 }}</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{ $Financial->status_2 }}</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{ $Financial->amount_2 }}</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{ $Financial->charged_property_2 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3">Name</th>
                                                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3">Status</th>
                                                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3">Amount</th>
                                                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3">Charged Property</th>
                                                    </tr>
                                                    <tr>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">  {{ $Financial->name_3 }}</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{ $Financial->status_3 }}</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{ $Financial->amount_3 }}</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{ $Financial->charged_property_3 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3">Name</th>
                                                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3">Status</th>
                                                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3">Amount</th>
                                                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3">Charged Property</th>
                                                    </tr>
                                                    <tr>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">  {{ $Financial->name_4 }}</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{ $Financial->status_4 }}</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{ $Financial->amount_4 }}</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{ $Financial->charged_property_4 }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">FINANCIAL SCORE = ????</td>

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

                                                <div class="col-xl-3 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            Financials Findinds Revenue</h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_1" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            Financials Findinds Net Profit</h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_NetProfit" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            Financials Findinds Gross Profit</h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_GrossProfit" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            Financials Findinds Working Capital</h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_WorkingCapital" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>




                                            </div>
                                            <div class="row mt-2">

                                                <div class="col-xl-3 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            Financials Findinds Quick Assets</h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_QuickAssets" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            Financials Findinds  Total Assets</h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_TotalAssets" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            Financials Findinds Current Assets</h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_CurrentAssets" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            Financials Findinds Current Liabilities</h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_CurrentLiabilities" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>




                                            </div>
                                            <div class="row mt-2">

                                                <div class="col-xl-3 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            Financials Findinds  Debt</h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_Debt" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            Financials Findinds Average Inventory</h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_AverageInventory" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            Financials Findinds Net Sales</h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_NetSales" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            Financials Findinds Share Capital</h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_ShareCapital" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>




                                            </div>
                                             <div class="row mt-2">

                                                <div class="col-xl-3 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            Financials Findinds Sundry Debtors</h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_SundryDebtors" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            Financials Findinds Sundry Creditors</h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_SundryCreditors" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            Financials Findinds Loans & Advances</h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_LoansAndAdvances" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            Financials Findinds Cash And Cash Equivalents</h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_CashAndCashEquivalents" width="100px"></canvas>
                                                        </div>
                                                    </div>
                                                </div>




                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Ratio-Analysis">
                                    <div class="pt-4">
                                        <div class="table-responsive">
                                            <div class="row">

                                                <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4
                                                            class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            Financials Ratio Curren</h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_financialRation"></canvas>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-8 col-sm-4 col-4 mt-4 mt-md-0">
                                                        <h4 class="card-title mb-4 d-flex justify-content-center align-items-center">
                                                            Financials Ration Analysis
                                                        </h4>
                                                        <div class="d-flex justify-content-around">
                                                            <div class="column justify-content-start align-items-start">

                                                                <ul class="list-unstyled">
                                                                    <li>
                                                                        <label class="label"><b>Quick Ratio Analysis</b></label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="label"><b>Current ratio Analysis</b></label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="label"><b>Debt Ratio Analysis</b></label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="label"><b>Solvency Ratio Analysis</b></label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="label"><b>Debt to Equity Ratio Analysis</b></label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="label"><b>Asset Turnover Ratio Analysis</b></label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="label"><b>Absolute Liquidity Ratio Analysis</b></label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="label"><b>Proprietary Ratio Analysis</b></label>
                                                                    </li>


                                                                </ul>
                                                            </div>
                                                            <div class="column justify-content-start align-items-start">
                                                                <ul class="list-unstyled">
                                                                <li>
                                                                        <label class="label text-start">{{$FinancialsRatioAnalysisFyOne->quick_ratio_analysis_fy_one_1}}</label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="label text-start">{{$FinancialsRatioAnalysisFyOne->current_ratio_analysis_fy_one_1}}</label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="label text-start">{{$FinancialsRatioAnalysisFyOne->debt_ratio_analysis_fy_one_1}}</label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="label text-start">{{$FinancialsRatioAnalysisFyOne->solvency_ratio_analysis_fy_one_1}}</label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="label text-start">{{$FinancialsRatioAnalysisFyOne->debt_to_equity_ratio_analysis_fy_one_1 }}</label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="label text-start">{{$FinancialsRatioAnalysisFyOne->asset_turnover_ratio_analysis_fy_one_1}}</label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="label text-start">{{$FinancialsRatioAnalysisFyOne->absolute_liquidity_ratio_analysis_fy_one_1}}</label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="label text-start">{{$FinancialsRatioAnalysisFyOne->proprietary_ratio_analysis_fy_one_1 }}dddfdf</label>
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                            <div class="column justify-content-start align-items-start">
                                                                <ul class="list-unstyled">

                                                                    <li>
                                                                        <label class="label"><b>Net Profit Ratio</b></label>

                                                                    </li>
                                                                    <li>
                                                                        <label class="label"><b>Gross Profit Ratio Analysis</b></label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="label"><b>Springate S Score Analysis</b></label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="label"><b>Trade Receivable Days Analysis</b></label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="label"><b>Trade Payable Days Analysis</b></label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="label"><b>Taffler Z-Score Analysis</b></label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="label"><b>Zmijewski X-Score Analysis</b></label>
                                                                    </li>



                                                                </ul>
                                                            </div>
                                                            <div class="column">
                                                                <ul class="list-unstyled">
                                                                <li>
                                                                        <label class="label text-start">{{$FinancialsRatioAnalysisFyOne->net_profit_ratio_analysis_fy_one_1}}</label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="label text-start">{{$FinancialsRatioAnalysisFyOne->gross_profit_ratio_analysis_fy_one_1}}</label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="label text-start">{{$FinancialsRatioAnalysisFyOne->springate_s_score_ratio_analysis_fy_one_1 }}</label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="label text-start">{{$FinancialsRatioAnalysisFyOne->trade_receivable_days_ratio_analysis_fy_one_1 }}</label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="label text-start">{{$FinancialsRatioAnalysisFyOne->trade_payable_days_ratio_analysis_fy_one_1 }}</label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="label text-start">{{$FinancialsRatioAnalysisFyOne->taffler_z_score_ratio_analysis_fy_one_1 }}</label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="label text-start">{{$FinancialsRatioAnalysisFyOne->zmijewski_x_score_ratio_analysis_fy_one_1 }}</label>
                                                                    </li>

                                                                </ul>
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
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">FY 1</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">{{ $TaxReurnCredit->tax_fy1 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">FY 2</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">{{ $TaxReurnCredit->tax_fy2 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">FY 3</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">{{ $TaxReurnCredit->tax_fy3 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">FY 4</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">{{ $TaxReurnCredit->tax_fy4 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">FY 5</td>
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
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">
                                                                <embed src="{{URL::to('public/admin/assets/imgs/MarketReputations/') .'/'.$MarketReputation->file_path_market_reputations}}" width="500" height="550" type="application/pdf">

                                                            </td>
                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">MARKET REPUTATION SCORE = {{ $MarketReputation->market_reputation_score }}</th>
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
                                        <div class="col-xl-5 mt-6">
                                            <p for="educationalBackground" class="text-start">
                                                {{ $KeyObservation->key_observation }}</p>
                                        </div>
                                        <div class="col-xl-5 mb-6">
                                            <p for="educationalBackground" class="text-center mt-20" style="font-size:20px"> OVERALL RISK SCORE =
                                                {{ $KeyObservation->overall_risk_score }}</p>
                                        </div>

                                        <div  class="col-xl-2 mb-3">





                                <canvas id="doughnut_chart"></canvas>


                                        </div>

                                    </div>



                                    <div class="row">
                                        <div class="col-xl-6 mb-3">
                                            <b for="educationalBackground" class="text-start">Recommendations</b>
                                        </div>
                                        <div class="col-xl-6 mb-3">
                                            <p for="educationalBackground" class=""></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 mb-3">
                                            <p for="educationalBackground" class="text-start">

                                                {{ $KeyObservation->key_recommendations }}
                                            </p>

                                        </div>
                                        <div class="col-xl-6 mb-3">
                                            <p for="educationalBackground" class="text-center"><a
                                                    href="{{ URL::to('/panel/report/final_Reprts_file_download'.'/'. base64_encode($KeyObservation->id)) }}"
                                                    class="download-license-btn">Download Licenses</a></p>
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


// Your external JavaScript file
// Include this script before your external JS that uses financialRationGrapFY
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
    $('#click-On-Ground-Verification').on('click', function() {
        $('#tab-Firm-Background').hide();
        $('#tab-On-Ground-Verification').show();
        $('#tab-Court-Checks').hide();
        $('#tab-Financials').hide();
        $('#tab-Business-Intelligence').hide();
        $('#tab-Tax-Return-and-Credit').hide();
        $('#tab-Market-Reputation').hide();
        $('#tab-Key-Observation').hide();

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
    }


    hidetabExceptFir();
});
</script>

<script>

</script>
@endsection
