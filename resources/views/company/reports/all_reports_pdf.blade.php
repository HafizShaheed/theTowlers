<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports PDF</title>
    <style>
        /* Add any additional styling here */
        .primary-table-bordered {
            border-collapse: collapse;
            width: 100%;
        }

        .primary-table-bordered th,
        .primary-table-bordered td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .thead-primary {
            background-color: #5a595a;
            color: white;
        }

        h2 {
            color: #5a595a;
        }

        h3 {
            color: #5a595a;
        }
        .page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>

    <!--  Firm Background start-->
    <h2>Firm Background</h2>
    <h3>Client Name: {{$Getclient->first_name}}</h3>
    <h3>Vender Name: {{$getThirdPartyForID->third_party_name}}</h3>


    <div class="pt-4">
        <div class="table-responsive">
            <table class="table primary-table-bordered">
                <thead class="thead-primary">
                    <tr>
                        <th scope="col" class="col-md-4">Incorporation Year</th>
                        <th scope="col" class="col-md-8">{{ $FirmBackground->incorporation_year }}</th>
                    </tr>
                    <tr>
                        <td class="col-md-4">Directors</td>
                        <td class="col-md-8">Ms. Cherry Banga</td>
                    </tr>
                    <tr>
                        <td class="col-md-4">Form of Entity</td>
                        <td class="col-md-8">{{ $FirmBackground->form_of_entity }}</td>
                    </tr>
                    <tr>
                        <td class="col-md-4">Industry</td>
                        <td class="col-md-8">{{ $FirmBackground->industry }}</td>
                    </tr>
                    <tr>
                        <td class="col-md-4">Address</td>
                        <td class="col-md-8">{{ $FirmBackground->address }}</td>
                    </tr>
                    <tr>
                        <td class="col-md-4">Business Details</td>
                        <td class="col-md-8">{{ $FirmBackground->business_details }}</td>
                    </tr>
                </thead>
            </table>


        </div>
    </div>

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
                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-8">{{ $FirmBackground->name }}</th>
                    </tr>
                    <tr>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">PAN</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">{{ $FirmBackground->pan }}</td>
                    </tr>
                    <tr>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">AADHAR</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">{{ $FirmBackground->aadhar }}</td>
                    </tr>
                    <tr>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Educational Background</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">{{ $FirmBackground->educational_background }}</td>
                    </tr>
                    <tr>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Credit Score</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-8">{{ $FirmBackground->credit_score }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


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



            <!-----------------===========================================    second director      ============================================================  -->
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



        <!-----------------===========================================    third director      ============================================================  -->
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


                </tbody>
            </table>
        </div>
    </div>



    <!--  Firm Background end-->
    <div class="page-break"></div>
    <!-- on ground start-->


    <h2>On Ground Verification</h2>
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
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4 align-items-end"><a href="{{ URL::to('/panel/report/onGround_file_download'.'/'.$OnGroundVerification->id) }}" class="download-license-btn">Download field visit Image</a></td>

                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <!-- on ground end-->
    <div class="page-break"></div>

    <!-- Court-Checks start-->

    <h2>Court Checks</h2>

    <div class="pt-4">
        <div class="table-responsive">
            <table class="table primary-table-bordered">
                <thead class="thead-primary">


                </thead>
                <tbody>
                    <tr>
                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-4">Name</th>
                        <th style="background-color: #5a595a; color: white;" colspan="2" scope="col" class="col-md-8">{{ $CourtCheck->director_name_1 }}</th>
                    </tr>
                    <tr>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Jurisdiction</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Record</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Subject Matter</td>
                    </tr>
                    <tr>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->director_jurisdiction_1 }}</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->director_record_1 }}</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->director_subject_matter_1 }}</td>
                    </tr>

                    <tr>
                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-4">Name</th>
                        <th style="background-color: #5a595a; color: white;" colspan="2" scope="col" class="col-md-8">{{ $CourtCheck->director_name_2 }}</th>
                    </tr>
                    <tr>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Jurisdiction</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Record</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Subject Matter</td>
                    </tr>
                    <tr>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->director_jurisdiction_2 }}</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->director_record_2 }}</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->director_subject_matter_2 }}</td>
                    </tr>

                    <tr>
                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-4">Name</th>
                        <th style="background-color: #5a595a; color: white;" colspan="2" scope="col" class="col-md-8">{{ $CourtCheck->director_name_3 }}</th>
                    </tr>
                    <tr>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Jurisdiction</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Record</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Subject Matter</td>
                    </tr>
                    <tr>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->director_jurisdiction_3 }}</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->director_record_3 }}</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->director_subject_matter_3 }}</td>
                    </tr>

                    <tr>
                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-4">Name</th>
                        <th style="background-color: #5a595a; color: white;" colspan="2" scope="col" class="col-md-8">{{ $CourtCheck->director_name_4 }}</th>
                    </tr>
                    <tr>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Jurisdiction</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Record</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Subject Matter</td>
                    </tr>
                    <tr>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->director_jurisdiction_4 }}</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->director_record_4 }}</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->director_subject_matter_4 }}</td>
                    </tr>
                    <tr>
                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-4">Name</th>
                        <th style="background-color: #5a595a; color: white;" colspan="2" scope="col" class="col-md-8">{{ $CourtCheck->director_name_5 }}</th>
                    </tr>
                    <tr>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Jurisdiction</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Record</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Subject Matter</td>
                    </tr>
                    <tr>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->director_jurisdiction_5 }}</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->director_record_5 }}</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->director_subject_matter_5 }}</td>
                    </tr>



                    <tr>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">LEGAL SCORE = {{ $CourtCheck->legal_score }}</td>

                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <div class="pt-4">
        <div class="table-responsive">
            <table class="table primary-table-bordered">
                <thead class="thead-primary">


                </thead>
                <tbody>
                <tr>
                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-4">Name</th>
                        <th style="background-color: #5a595a; color: white;" colspan="2" scope="col" class="col-md-8">{{ $CourtCheck->director_name_1 }}</th>
                    </tr>
                    <tr>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Jurisdiction</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Record</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Subject Matter</td>
                    </tr>
                    <tr>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->company_jurisdiction_1 }}</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->company_record_1 }}</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->company_subject_matter_1 }}</td>
                    </tr>

                    <tr>
                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-4">Name</th>
                        <th style="background-color: #5a595a; color: white;" colspan="2" scope="col" class="col-md-8">{{ $CourtCheck->director_name_2 }}</th>
                    </tr>
                    <tr>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Jurisdiction</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Record</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Subject Matter</td>
                    </tr>
                    <tr>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->company_jurisdiction_2 }}</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->company_record_2 }}</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->company_subject_matter_2 }}</td>
                    </tr>

                    <tr>
                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-4">Name</th>
                        <th style="background-color: #5a595a; color: white;" colspan="2" scope="col" class="col-md-8">{{ $CourtCheck->director_name_3 }}</th>
                    </tr>
                    <tr>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Jurisdiction</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Record</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Subject Matter</td>
                    </tr>
                    <tr>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->company_jurisdiction_3 }}</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->company_record_3 }}</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->company_subject_matter_3 }}</td>
                    </tr>

                    <tr>
                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-4">Name</th>
                        <th style="background-color: #5a595a; color: white;" colspan="2" scope="col" class="col-md-8">{{ $CourtCheck->director_name_4 }}</th>
                    </tr>
                    <tr>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Jurisdiction</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Record</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Subject Matter</td>
                    </tr>
                    <tr>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->company_jurisdiction_4 }}</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->company_record_4 }}</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->company_subject_matter_4 }}</td>
                    </tr>

                    <tr>
                        <th style="background-color: #5a595a; color: white;" scope="col" class="col-md-4">Name</th>
                        <th style="background-color: #5a595a; color: white;" colspan="2" scope="col" class="col-md-8">{{ $CourtCheck->director_name_5 }}</th>
                    </tr>
                    <tr>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Jurisdiction</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Record</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">Subject Matter</td>
                    </tr>
                    <tr>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->company_jurisdiction_5 }}</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->company_record_5 }}</td>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">{{ $CourtCheck->company_subject_matter_5 }}</td>
                    </tr>


                    <tr>
                        <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);"  class="col-md-4">LEGAL SCORE =  {{ $CourtCheck->legal_score }}</td>

                    </tr>

                </tbody>
            </table>
        </div>
    </div>

     <!-- Court-Checks end-->
    <div class="page-break"></div>

     <!-- Financials start-->
     <h2>Financials</h2>
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

     <!-- Financials end-->
     <div class="page-break"></div>

     <!-- Business-Intelligence tab start -->
     <h2>Business Intelligence</h2>

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
     <!-- Business-Intelligence tab end -->
    <div class="page-break"></div>

<!--Tax-Return-and-Credit tab start -->

     <h2>Business Intelligence</h2>

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
<!--Tax-Return-and-Credit tab end -->
<div class="page-break"></div>

<!-- Market-Reputation tab start -->
<h2>Market Reputation </h2>
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

<!-- Market-Reputation tab end -->
<div class="page-break"></div>

<!--click-Key-Observation tab start -->
<h2>Key Observation  </h2>

<div class="pt-4">

<div class="row">
    <div class="col-xl-6 mb-3">
        <p for="educationalBackground" class="text-start">{{ $KeyObservation->key_observation }}</p>
    </div>
    <div class="col-xl-6 mb-3">
        <p for="educationalBackground" class="text-center"> OVERALL RISK SCORE  = {{ $KeyObservation->overall_risk_score }}</p>
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
   
    
</div>

</div>
<!--click-Key-Observation tab end -->










</body>
</html>
