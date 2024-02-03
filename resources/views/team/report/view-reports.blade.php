@extends('team.includes.master')

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
                            <p style="color:rgb(0, 0, 0); font-size:16px;"> <b>Client Name: Sony</b><br>
                            <b>Vender Name: XYZ </b></p>
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



                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3">License Name</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3">License No.</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3">Date of Issuance</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-3">Expiry Date</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->license_name_1}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->license_no_1}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->date_of_issuance_1}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->date_of_expiry_1}}</td>
                                                        </tr>
                                                        <tr>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->license_name_2}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->license_no_2}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->date_of_issuance_2}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->date_of_expiry_2}}</td>
                                                        </tr>
                                                        <tr>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->license_name_3}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->license_no_3}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->date_of_issuance_3}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->date_of_expiry_3}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->license_name_4}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->license_no_4}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->date_of_issuance_4}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->date_of_expiry_4}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->license_name_5}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->license_no_5}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->date_of_issuance_5}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->date_of_expiry_5}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->license_name_6}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->license_no_6}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->date_of_issuance_6}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->date_of_expiry_6}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->license_name_7}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->license_no_7}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->date_of_issuance_7}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->date_of_expiry_7}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->license_name_8}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->license_no_8}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->date_of_issuance_8}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">{{$License->date_of_expiry_8}}</td>
                                                        </tr>


                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4 text-start">Ofac Check</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4 text-start">{{$FirmBackground->ofac_check}}</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4 align-items-end"><a href="{{ URL::to('/panel/report/firm_file_download'.'/'.$FirmBackground->id) }}" class="download-license-btn">Download Licenses</a></td>

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
                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-4">Director's Name</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-8">Ms. Cherry Banga</th>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">PAN</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">ASVPC3648R</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">AADHAR</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">580993832047</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Educational Background</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">B.Sc.</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Credit Score</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">720</td>
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
                                                        <tr>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="2" class="col-md-4">Director's Name</th>
                                                            <th style="background-color: #5a595a; color: white;" scope="col"  colspan="4" class="col-md-8">Ms. Cherry Banga</th>
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
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1">1.</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"   class="col-md-1"> ABC</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">1234</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Active</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">12/08/2021</td>

                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Medical Supplies</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Yes</td>
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
<!-- firm background tab End -->
<!-- on ground verification tab start -->
    <div class="col-xl-12" id="tab-On-Ground-Verification">
        <div class="card dz-card">

            <div class="tab-content" id="myTabContent">
                <div class="card-header flex-wrap border-0" id="default-tab">
                    <h4 class="card-title">On Ground Verification<br>
                        <p style="color:rgb(0, 0, 0); font-size:16px;"> <b>Client Name: Sony</b><br>
                        <b>Vender Name: XYZ </b></p>
                        <p style="color:rgb(0, 0, 0); font-size:16px;"> <b></b></p>

                    </h4>


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
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">Ground Floor, Plot No: 80, C- Block, Mangolpuri Industrial Area, Phase -1, New Delhi – 110083 </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Address Visit Findings</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">The office is owned by the Director.</td>
                                                    </tr>

                                                    <tr>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4 text-start">ON-GROUND VERIFICATION SCORE = 29</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4 align-items-end"><button class="download-license-btn">Download field visit Image</button></td>

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
                    <h4 class="card-title">Court Checks<br>
                        <p style="color:rgb(0, 0, 0); font-size:16px;"> <b>Client Name: Sony</b><br>
                        <b>Vender Name: XYZ </b></p>
                    </h4>


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
                                                    <tr>
                                                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-4">Name</th>
                                                        <th style="background-color: #5a595a; color: white;" colspan="2" scope="col" class="col-md-8">Ms. Cherry Banga</th>
                                                    </tr>
                                                    <tr>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Jurisdiction</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Record</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Subject Matter</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">High Court of Delhi</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4"></td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">LEGAL SCORE =</td>

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
                                                    <tr>
                                                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-4">Name</th>
                                                        <th style="background-color: #5a595a; color: white;" colspan="2" scope="col" class="col-md-8">Ms. Cherry Banga</th>
                                                    </tr>
                                                    <tr>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Jurisdiction</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Record</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Subject Matter</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">High Court of Delhi</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4"></td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">LEGAL SCORE =</td>

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
                        <p style="color:rgb(0, 0, 0); font-size:16px;"> <b>Client Name: Sony</b><br>
                        <b>Vender Name: XYZ </b></p>
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
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">   1.  Union bank of India</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">Open</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">1 Crore</td>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-3">Hypothecation of Book debts</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">FINANCIAL SCORE =</td>

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

                                                <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">
                                                        <h4 class="card-title mb-4 d-flex justify-content-center align-items-center">FY1</h4>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <canvas id="barChart_1"></canvas>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="Ratio-Analysis">
                                    <div class="pt-4">
                                        <div class="row">
                                            <div class=" col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                <div class="card">

                                                    <h4 class="card-title mb-4 d-flex justify-content-center align-items-center">FY1</h4>

                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <div id="chart-with-area-view-reports" class="ct-chart ct-golden-section chartlist-chart"></div>
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
                            <p style="color:rgb(0, 0, 0); font-size:16px;"> <b>Client Name: Sony</b><br>
                            <b>Vender Name: XYZ </b></p>
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
                                            <div class="row">
                                                <div class=" col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                                                    <div class="card">

                                                        <h4 class="card-title mb-4 d-flex justify-content-center align-items-center">FY1</h4>

                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <div id="line_chart_2" class="morris_chart_height"></div>
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
<!-- Business-Intelligence tab End -->
<!--Tax-Return-and-Credit tab start -->
    <div class="col-xl-12" id="tab-Tax-Return-and-Credit">
       <div class="card dz-card">

                <div class="tab-content" id="myTabContent">
                    <div class="card-header flex-wrap border-0" id="default-tab">
                        <h4 class="card-title">Tax Return & Credit<br>
                            <p style="color:rgb(0, 0, 0); font-size:16px;"> <b>Client Name: Sony</b><br>
                            <b>Vender Name: XYZ </b></p>
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
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">200000</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">FY 2</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">300000</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">FY 3</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">400000</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">FY 4</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">500000</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">FY 5</td>
                                                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">1000000</td>
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
                                                            <tr>
                                                                <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-2">Director Name</th>
                                                                <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-1">Credit Score</th>
                                                                <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-1">Outstanding Amount</th>
                                                                <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-2">No. of Loans Date</th>
                                                                <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-2">Solvency</th>
                                                                <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-2">Payment History</th>
                                                                <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-2">Credit Dependency</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">Ms.
                                                                    Cherry Banga</td>
                                                                <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-1">779</td>
                                                                <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-1">779 Text and number
                                                                    both will mentioned</td>
                                                                <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2"> <p>Mrs. Cherry Banga has availed 8 loans and advances totaling to INR 1,00,66,005 /- between 2017 and 2022. Over 8 transaction, 1 transaction is Business Loan, 3 transactions are Housing Loan, 1 transaction is credit card, 1 transaction is Consumer Loan, 1 transaction is Auto Loan and 1 transaction is Property Loan , thereby indicating very high dependency of the individual on loans. <p></td>
                                                                <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">it is observed that the individual has made timely payments to all the loans and advances.The payment pattern is indicating creditworthiness and a good solvency balance of the proprietor.</td>
                                                                <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">The credit history reflects timely payments of all the loans and advances by the proprietor indicating credit discipline on the part of the proprietor.</td>
                                                                <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-2">The individual has obtained 8 loans and credit facilities with an outstanding balance of INR 47,31,155 /- between 2017 and 2022 which shows high dependency of the individual on external credits. Further, the report shows all the loans accounts are closed by timely payments indicating good financial behavior of the director.</td>
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
                            <p style="color:rgb(0, 0, 0); font-size:16px;"> <b>Client Name: Sony</b><br>
                            <b>Vender Name: XYZ </b></p>
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
                                                                <embed src="{{URL::to('/public/pdf/sa.pdf')}}" width="500" height="550" type="application/pdf">

                                                            </td>
                                                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">MARKET REPUTATION SCORE =</th>
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
                            <p style="color:rgb(0, 0, 0); font-size:16px;"> <b>Client Name: Sony</b><br>
                            <b>Vender Name: XYZ </b></p>
                        </h4>


                    </div>
                    <div class="tab-pane fade show active" id="DefaultTab" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card-body pt-0">
                            <!-- Nav tabs -->
                            <div class="default-tab">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#Key-Observation"> Key Observation</a>
                                    </li>

                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="Key-Observation" role="tabpanel">
                                        <div class="pt-4">

                                            <div class="row">
                                                <div class="col-xl-6 mb-3">
                                                    <p for="educationalBackground" class="text-start">As per the documents shared by the Vendor, the entity being a Private Limited Company and to be engaged by FujiFilms on commission basis lies at 15% risk and in case Vendor is to be engaged on a stock and sale basis then the firm lies at 20% risk.
                                                        The entity is a sole proprietorship started by Mrs. Cherry Banga who has an educational background of B.Com.
                                                        The entity is run by the proprietor and her husband Mr. Neeraj Kumar who is also a Key Personnel of the firm.
                                                        The entity has maintained a healthy revenue indicating a good market foothold. The ratios indicate efficiency in the operations and management of the company.
                                                        The company’s profit margins are low compared to the industry standards.
                                                        The entity is operating in the domain of medical diagnostic devices; therefore, the proprietor has the experience of selling medical diagnostic devices for past 8+ years.</p>
                                                </div>
                                                <div class="col-xl-6 mb-3">
                                                    <p for="educationalBackground" class="text-center"> OVERALL RISK SCORE </p>
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

                                                        In the light of above observation, the entity is fit for the intended purpose of engagement subject to the following recommendation:
                                                    </p>
                                                    <ul  class="text-start">
                                                        <li  class="text-start">

                                                            (a) In the light of the prior experience the company should be engaged on commission basis.
                                                        </li>
                                                        <li  class="text-start">
                                                            (b) A penalty provision for delayed payments needs to be inserted in any contract executed with the distributor.

                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-xl-6 mb-3">
                                                    <p for="educationalBackground" class="text-center"><button class="download-license-btn">Download Licenses</button></p>
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
            $("#click-On-Ground-Verification").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Financials").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Business-Intelligence").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Tax-Return-and-Credit").addClass('report-tab-unactive').removeClass('report-tab-active');
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
            $("#click-On-Ground-Verification").addClass('report-tab-active').removeClass('report-tab-unactive');
            $("#click-Financials").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Business-Intelligence").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Tax-Return-and-Credit").addClass('report-tab-unactive').removeClass('report-tab-active');
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
            $("#click-On-Ground-Verification").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Financials").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Business-Intelligence").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Tax-Return-and-Credit").addClass('report-tab-unactive').removeClass('report-tab-active');
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
            $("#click-On-Ground-Verification").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Financials").addClass('report-tab-active').removeClass('report-tab-unactive');
            $("#click-Business-Intelligence").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Tax-Return-and-Credit").addClass('report-tab-unactive').removeClass('report-tab-active');
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
            $("#click-On-Ground-Verification").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Financials").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Business-Intelligence").addClass('report-tab-active').removeClass('report-tab-unactive');
            $("#click-Tax-Return-and-Credit").addClass('report-tab-unactive').removeClass('report-tab-active');
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
            $("#click-On-Ground-Verification").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Financials").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Business-Intelligence").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Tax-Return-and-Credit").addClass('report-tab-active').removeClass('report-tab-unactive');
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
            $("#click-On-Ground-Verification").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Financials").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Business-Intelligence").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Tax-Return-and-Credit").addClass('report-tab-unactive').removeClass('report-tab-active');
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
            $("#click-On-Ground-Verification").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Financials").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Business-Intelligence").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Tax-Return-and-Credit").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Market-Reputation").addClass('report-tab-unactive').removeClass('report-tab-active');
            $("#click-Key-Observation").addClass('report-tab-active').removeClass('report-tab-unactive');

        });



        const hidetabExceptFir = () =>{
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
    (function($) {


	var dlabMorris = function(){

		var screenWidth = $(window).width();

		var setChartWidth = function(){
			if(screenWidth <= 768)
			{
				var chartBlockWidth = 0;
				chartBlockWidth = (screenWidth < 300 )?screenWidth:300;
				jQuery('.morris_chart_height').css('min-width',chartBlockWidth - 31);
			}
		}

		var donutChart = function(){
			Morris.Donut({
				element: 'morris_donught',
				data: [{
					label: "\xa0 \xa0 Download Sales \xa0 \xa0",
					value: 12,

				}, {
					label: "\xa0 \xa0 In-Store Sales \xa0 \xa0",
					value: 30
				}, {
					label: "\xa0 \xa0 Mail-Order Sales \xa0 \xa0",
					value: 20
				}],
				resize: true,
				redraw: true,
				colors: ['#0d99ff', 'rgb(255, 92, 0)', '#ffaa2b'],


			});
		}

		var lineChart = function(){
			//line chart
			let line = new Morris.Line({
				element: 'morris_line',
				resize: true,
				data: [{
						y: '2011 Q1',
						item1: 2666
					},
					{
						y: '2011 Q2',
						item1: 2778
					},
					{
						y: '2011 Q3',
						item1: 4912
					},
					{
						y: '2011 Q4',
						item1: 3767
					},
					{
						y: '2012 Q1',
						item1: 6810
					},
					{
						y: '2012 Q2',
						item1: 5670
					},
					{
						y: '2012 Q3',
						item1: 4820
					},
					{
						y: '2012 Q4',
						item1: 15073
					},
					{
						y: '2013 Q1',
						item1: 10687
					},
					{
						y: '2013 Q2',
						item1: 8432
					}
				],
				xkey: 'y',
				ykeys: ['item1'],
				labels: ['Item 1'],
				gridLineColor: 'transparent',
				lineColors: ['rgb(13,153,255)'], //here
				lineWidth: 1,
				hideHover: 'auto',
				pointSize: 0,
				axes: false
			});
		}

		var lineChart2 = function(){
			//Area chart
			Morris.Area({
				element: 'line_chart_2',
				data: [{
						period: '2001',
						smartphone: 0,
						windows: 0,
						mac: 0
					}, {
						period: '2002',
						smartphone: 90,
						windows: 60,
						mac: 25
					}, {
						period: '2003',
						smartphone: 40,
						windows: 80,
						mac: 35
					}, {
						period: '2004',
						smartphone: 30,
						windows: 47,
						mac: 17
					}, {
						period: '2005',
						smartphone: 150,
						windows: 40,
						mac: 120
					}, {
						period: '2006',
						smartphone: 25,
						windows: 80,
						mac: 40
					}, {
						period: '2007',
						smartphone: 10,
						windows: 10,
						mac: 10
					}


				],
				xkey: 'period',
				ykeys: ['smartphone'],
				labels: ['Phone'],
				pointSize: 3,
				fillOpacity: 0,
				pointStrokeColors: ['#EE3C3C', ],
				behaveLikeLine: true,
				gridLineColor: 'transparent',
				lineWidth: 3,
				hideHover: 'auto',
				lineColors: ['rgb(13,153,255)'],
				resize: true

			});
		}

		var barChart = function(){
			if(jQuery('#morris_bar').length > 0)
			{
			//bar chart
				Morris.Bar({
					element: 'morris_bar',
					data: [{
						y: '2006',
						a: 100,
						b: 90,
						c: 60
					}, {
						y: '2007',
						a: 75,
						b: 65,
						c: 40
					}, {
						y: '2008',
						a: 50,
						b: 40,
						c: 30
					}, {
						y: '2009',
						a: 75,
						b: 65,
						c: 40
					}, {
						y: '2010',
						a: 50,
						b: 40,
						c: 30
					}, {
						y: '2011',
						a: 75,
						b: 65,
						c: 40
					}, {
						y: '2012',
						a: 100,
						b: 90,
						c: 40
					}],
					xkey: 'y',
					ykeys: ['a', 'b', 'c'],
					labels: ['A', 'B', 'C'],
					barColors: ['#0d99ff', '#ffaa2b', '#ff9f00'],
					hideHover: 'auto',
					gridLineColor: 'transparent',
					resize: true,
					barSizeRatio: 0.25,
					yaxis: {

						  style: {
							  colors: '#fff',
						  }
					  },
					  xaxis: {
							style: {
							  colors: '#fff',
						},
					}
				});
			}
		}

		var barStalkChart = function(){
			//bar chart
			Morris.Bar({
				element: 'morris_bar_stalked',
				data: [{
					y: 'S',
					a: 66,
					b: 34
				}, {
					y: 'M',
					a: 75,
					b: 25
				}, {
					y: 'T',
					a: 50,
					b: 50
				}, {
					y: 'W',
					a: 75,
					b: 25
				}, {
					y: 'T',
					a: 50,
					b: 50
				}, {
					y: 'F',
					a: 16,
					b: 84
				}, {
					y: 'S',
					a: 70,
					b: 30
				}, {
					y: 'S',
					a: 30,
					b: 70
				}, {
					y: 'M',
					a: 40,
					b: 60
				}, {
					y: 'T',
					a: 29,
					b: 71
				}, {
					y: 'W',
					a: 44,
					b: 56
				}, {
					y: 'T',
					a: 30,
					b: 70
				}, {
					y: 'F',
					a: 60,
					b: 40
				}, {
					y: 'G',
					a: 40,
					b: 60
				}, {
					y: 'S',
					a: 46,
					b: 54
				}],
				xkey: 'y',
				ykeys: ['a', 'b'],
				labels: ['A', 'B'],
				barColors: ['#0d99ff', "#F1F3F7"],
				hideHover: 'auto',
				gridLineColor: 'transparent',
				resize: true,
				barSizeRatio: 0.25,
				stacked: true,
				behaveLikeLine: true,
				//redraw: true

				// barRadius: [6, 6, 0, 0]
			});

		}

		var areaChart = function(){
			//area chart
			Morris.Area({
				element: 'morris_area',
				data: [{
						period: '2001',
						smartphone: 0,
						windows: 0,
						mac: 0
					}, {
						period: '2002',
						smartphone: 90,
						windows: 60,
						mac: 25
					}, {
						period: '2003',
						smartphone: 40,
						windows: 80,
						mac: 35
					}, {
						period: '2004',
						smartphone: 30,
						windows: 47,
						mac: 17
					}, {
						period: '2005',
						smartphone: 150,
						windows: 40,
						mac: 120
					}, {
						period: '2006',
						smartphone: 25,
						windows: 80,
						mac: 40
					}, {
						period: '2007',
						smartphone: 10,
						windows: 10,
						mac: 10
					}


				],
				lineColors: ['#0d99ff', 'rgb(16, 202, 147)', 'rgb(255, 92, 0)'],
				xkey: 'period',
				ykeys: ['smartphone', 'windows', 'mac'],
				labels: ['Phone', 'Windows', 'Mac'],
				pointSize: 0,
				lineWidth: 0,
				resize: true,
				fillOpacity: 0.95,
				behaveLikeLine: true,
				gridLineColor: 'transparent',
				hideHover: 'auto',


			});
		}

		var areaChart2 = function(){
			if(jQuery('#morris_area_2').length > 0)
			{
			//area chart
				Morris.Area({
					element: 'morris_area_2',
					data: [{
							period: '2010',
							SiteA: 0,
							SiteB: 0,

						}, {
							period: '2011',
							SiteA: 130,
							SiteB: 100,

						}, {
							period: '2012',
							SiteA: 80,
							SiteB: 60,

						}, {
							period: '2013',
							SiteA: 70,
							SiteB: 200,

						}, {
							period: '2014',
							SiteA: 180,
							SiteB: 150,

						}, {
							period: '2015',
							SiteA: 105,
							SiteB: 90,

						},
						{
							period: '2016',
							SiteA: 250,
							SiteB: 150,

						}
					],
					xkey: 'period',
					ykeys: ['SiteA', 'SiteB'],
					labels: ['Site A', 'Site B'],
					pointSize: 0,
					fillOpacity: 0.6,
					pointStrokeColors: ['#b4becb', '#00A2FF'], //here
					behaveLikeLine: true,
					gridLineColor: 'transparent',
					lineWidth: 0,
					smooth: false,
					hideHover: 'auto',
					lineColors: ['rgb(0, 171, 197)', 'rgb(0, 0, 128)'],
					resize: true

				});
			}
		}


		/* Function ============ */
		return {
			init:function(){
				setChartWidth();
				donutChart();
				lineChart();
				lineChart2();
				barChart();
				barStalkChart();
				areaChart();
				areaChart2();
			},


			resize:function(){
				screenWidth = $(window).width();
				setChartWidth();
				donutChart();
				lineChart();
				lineChart2();
				barChart();
				barStalkChart();
				areaChart();
				areaChart2();
			}
		}

	}();

	jQuery(document).ready(function(){
		dlabMorris.init();
		//dlabMorris.resize();

	});

	jQuery(window).on('load',function(){
		//dlabMorris.init();
	});

	jQuery( window ).resize(function() {
		//dlabMorris.resize();
		//dlabMorris.init();
	});

})(jQuery);

     </script>
@endsection
