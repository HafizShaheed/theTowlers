@extends('company.includes.master')
@section('title', 'Dashboard')
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
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <div class="col-12">
        <div class="">
            <div class="card-header d-flex justify-content-start">
                <div>
                    <a class="btn  btn-lg report-tab-active" href="#" role="button" data-bs-toggle="modal" data-bs-target="#request-Third-party-Modal">
                        Request a Third Party +</a>

                </div>
            </div>



        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <h1 class="card-title " style="font-size: 25px; font-weight: 900;">Risk Insights </h1>
            </div>

            <div class="card-body justify-content-center">

            <div class="row">
<div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
    <a href="{{ URL::to('company/report') }}?TotalHighRisk=TotalHighRisk">
    <div class="card-title mb-4 d-flex justify-content-center align-items-center">
        <div class="card chart-grd same-card" style="background-color: rgb(239, 83, 80); box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);">
            <div class="card-body depostit-card p-0">
                <div class="depostit-card-media d-flex justify-content-between pt-3 pd-3">
                    <div class="justify-content-center align-items-center" >
                        <h5 class="justify-content-center align-items-center" style="color: #fff; text-shadow: 1px 1px 2px #000;">Total High Risk</h5>
                        <h5 class="justify-content-center align-items-center text-center" style="color: #fff; font-size: 24px; text-shadow: 1px 1px 2px #000;">{{ $highRiskCOunt }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
    
</div>


<div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
<a href="{{ URL::to('company/report') }}?TotalMediumRisk=TotalMediumRisk">
    <div class="card-title mb-4 d-flex justify-content-center align-items-center">
        <div class="card chart-grd same-card" style="background-color: rgb(121, 134, 203); box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);">
            <div class="card-body depostit-card p-0">
                <div class="depostit-card-media d-flex justify-content-between pt-3 pd-3">
                    <div class="justify-content-center align-items-center">
                        <h5 class="justify-content-center align-items-center" style="color: #fff; text-shadow: 1px 1px 2px #000;">Total Medium Risk</h5>
                        <h5 class="justify-content-center align-items-center text-center" style="color: #fff; font-size: 24px; text-shadow: 1px 1px 2px #000;">{{ $mediumRiskCOunt }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </a>
</div>


<div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
<a href="{{ URL::to('company/report') }}?TotalLowRisk=TotalLowRisk">

    <div class="card-title mb-4 d-flex justify-content-center align-items-center">
        <div class="card chart-grd same-card" style="background-color: rgb(129, 199, 132); box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);">
            <div class="card-body depostit-card p-0">
                <div class="depostit-card-media d-flex justify-content-between pt-3 pd-3">
                    <div class="justify-content-center align-items-center">
                        <h5 class="justify-content-center align-items-center" style="color: #fff; text-shadow: 1px 1px 2px #000;">Total Low Risk</h5>
                        <h5 class="justify-content-center align-items-center text-center" style="color: #fff; font-size: 24px; text-shadow: 1px 1px 2px #000;">{{ $lowRiskCOunt }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</a>
</div>


            </div>





            </div>
            <div class="card-body justify-content-center">

                <div class="row">
                    <div class=" col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                        <h4 class="card-title mb-4 d-flex justify-content-center align-items-center">High Risk</h4>
                        <div class="d-flex justify-content-center align-items-center">
                            <canvas id="doughnut_chart_1" width="170" height="170"></canvas>
                        </div>
                        <h4 class="card-title mb-4 d-flex justify-content-center align-items-center">{{number_format($highRiskPercentage, 2, '.', '').'%'}}</h4>
                    </div>
                    <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                        <h4 class="card-title mb-4 d-flex justify-content-center align-items-center">Medium Risk</h4>
                        <div class="d-flex justify-content-center align-items-center">
                            <canvas id="doughnut_chart_2" width="170" height="170"></canvas>
                        </div>
                        <h4 class="card-title mb-4 d-flex justify-content-center align-items-center">{{number_format($mediumRiskPercentage, 2, '.', '').'%'}}</h4>

                    </div>
                    <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                        <h4 class="card-title mb-4 d-flex justify-content-center align-items-center">Low Risk</h4>
                        <div class="d-flex justify-content-center align-items-center">
                            <canvas id="doughnut_chart_3" width="170" height="170"></canvas>
                        </div>
                        <h4 class="card-title mb-4 d-flex justify-content-center align-items-center">{{number_format($lowRiskPercentage, 2, '.', '').'%'}}</h4>

                    </div>

                </div>

                <!-- <div class="row mt-5">
                    <div class=" col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">

                    </div>
                    <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                        <h4 class="card-title mb-4 d-flex justify-content-center align-items-center">Overall Pie chart
                            for above 3 charts</h4>
                        <div class="d-flex justify-content-center align-items-center">
                            <canvas id="doughnut_chart_4" width="220" height="220"></canvas>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">

                    </div>

                </div> -->


            </div>




        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <!-- <h2 class="card-title ">Risk Overview</h2> -->
                <h1 class="card-title " style="font-size: 25px; font-weight: 900;">Risk Impact </h1>

            </div>
            <div class="card-body justify-content-center">

                <div class="row">

                    <div class=" col-xl-6 col-sm-5 col-5 mt-5 mt-md-0">
                        <div class="card">

                            <h4 class="card-title mb-4 d-flex justify-content-center align-items-center">Department</h4>

                            <div class="d-flex justify-content-center align-items-center">
                                <canvas id="barChartVerticalDepartment"></canvas>


                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-sm-5 col-5 mt-5 mt-md-0">
                        <div class="card">
                            <h4 class="card-title mb-4 d-flex justify-content-center align-items-center">Location</h4>
                            <div class="d-flex justify-content-center align-items-center">
                                <canvas id="barChartHorizontalLocation"></canvas>
                            </div>
                        </div>
                    </div>


                </div>

                <br>
                <div class="row  mt-4 ">

                    <div class=" col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                        <div class="card">

                            <h4 class="card-title mb-4 d-flex justify-content-center align-items-center">Regulatory </h4>

                            <div class="d-flex justify-content-center align-items-center">
                                <canvas id="barChartVerticalReputation"></canvas>


                            </div>
                        </div>
                    </div>

                    <div class=" col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                        <div class="card">

                            <h4 class="card-title mb-4 d-flex justify-content-center align-items-center">Legal</h4>

                            <div class="d-flex justify-content-center align-items-center">
                                <canvas id="barChartVerticalLegal"></canvas>


                            </div>
                        </div>
                    </div>
                    <div class=" col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                        <div class="card">

                            <h4 class="card-title mb-4 d-flex justify-content-center align-items-center">Financial </h4>

                            <div class="d-flex justify-content-center align-items-center">
                                <canvas id="barChartVerticalFinancial"></canvas>


                            </div>
                        </div>
                    </div>



                </div>
                <div class="row">
                    <div class=" col-xl-2 col-sm-2 col-2 mt-2 mt-md-0">

                    </div>

                    <div class=" col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                        <div class="card">

                            <h4 class="card-title mb-4 d-flex justify-content-center align-items-center">Opertional </h4>

                            <div class="d-flex justify-content-center align-items-center">
                                <canvas id="barChartVerticalOpertional"></canvas>


                            </div>
                        </div>
                    </div>

                    <div class=" col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                        <div class="card">

                            <h4 class="card-title mb-4 d-flex justify-content-center align-items-center">Reputation</h4>

                            <div class="d-flex justify-content-center align-items-center">
                                <canvas id="barChartVerticalRegulatary"></canvas>


                            </div>
                        </div>
                    </div>
                    <div class=" col-xl-2 col-sm-2 col-2 mt-2 mt-md-0">

                    </div>



                </div>
            </div>


        </div>

    </div>

    <!-- <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <h2 class="card-title ">Impact</h2>
            </div>
            <div class="card-body justify-content-center">

            </div>


        </div>

    </div> -->

    <!-- <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <h2 class="card-title ">Performance Overview</h2>
            </div>
            <div class="card-body justify-content-center">

                <div class="row">
                    <div class=" col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                        <div class="card">

                            <h4 class="card-title mb-4 d-flex justify-content-center align-items-center">Server Default</h4>

                            <div class="d-flex justify-content-center align-items-center">

                                <div id="stacked-bar-chart" class="ct-chart ct-golden-section chartlist-chart"></div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                        <div class="card">
                            <h4 class="card-title mb-4 d-flex justify-content-center align-items-center">No Serious Default</h4>
                            <div class="d-flex justify-content-center align-items-center">
                                <div id="stacked-bar-chart-1" class="ct-chart ct-golden-section chartlist-chart"></div>

                            </div>
                        </div>

                    </div>
                    <div class="col-xl-4 col-sm-4 col-4 mt-4 mt-md-0">
                        <div class="card">
                            <h4 class="card-title mb-4 d-flex justify-content-center align-items-center">No Default</h4>
                            <div class="d-flex justify-content-center align-items-center">
                                <div id="stacked-bar-chart-2" class="ct-chart ct-golden-section chartlist-chart"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>

    </div> -->
</div>


@endsection
@section('modal')
<!--  Add thirdParty  Modal start -->
<div class="modal fade" id="request-Third-party-Modal">
    <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Add a Third Party</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">

                <div class="card-body justify-content-start">
                    <form id="third-partyform">
                        <div class="row">
                            <div class="col-xl-12 col-sm-12 col-12 mt-4 mt-md-0">

                            </div>
                            <div class="col-xl-12 col-sm-12 col-12 mt-4 mt-md-0">
                                <div class="row">
                                    <div class="col-xl-6 mb-3">
                                        <label for="thirdPartyName" class="form-label">Third Party Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="thirdPartyName" name="thirdPartyName" placeholder="" requiredrequired />
                                    </div>



                                    <div class="col-xl-6 mb-3">
                                        <label class="form-label">Address<span class="text-danger">*</span></label>
                                        <textarea rows="1" class="form-control" id="thirdPartyAddress" name="thirdPartyAddress"></textarea>
                                    </div>

                                    @php
                                    $departments = \App\Models\Department::get();
                                    @endphp
                                    <div class="col-xl-6 mb-3">
                                        <label class="form-label">Department<span class="text-danger">*</span></label>
                                        <select class="default-select style-1 form-control" name="thirdPartDepartment" id="thirdPartDepartment">
                                            <option data-display="Select" disabled selected>
                                                Select Departmen
                                            </option>
                                            @forelse ($departments as $department )
                                            <option data-display="Select" value="{{ $department->id }}">
                                                {{ $department->dept_name }}
                                            </option>
                                            @empty
                                            <p> No records found!</p>
                                            @endforelse



                                        </select>
                                    </div>

                                    <div class="col-xl-6 mb-3">
                                        <label for="thirdPartPoc" class="form-label">POC<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="thirdPartPoc" name="thirdPartPoc" placeholder="" required />
                                    </div>

                                    @php
                                    $zones = \App\Models\Zone::get();
                                    @endphp
                                    <div class="col-xl-6 mb-3">
                                        <label class="form-label">Location<span class="text-danger">*</span></label>
                                        <select class="default-select style-1 form-control" name="thirdPartLocation" id="thirdPartLocation">
                                            <option data-display="Select" disabled selected>
                                                Select Location
                                            </option>
                                            @forelse ($zones as $zone )
                                            <option data-display="Select" value="{{ $zone->id }}">
                                                {{ $zone->zone_name }}
                                            </option>
                                            @empty
                                            <p> No records found!</p>
                                            @endforelse



                                        </select>
                                    </div>
                                    <div class="col-xl-6 mb-3">
                                        <label for="thirdPartEmail" class="form-label">Email<span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="thirdPartEmail" name="thirdPartEmail" placeholder="" required />
                                    </div>

                                    <div class="col-xl-6 mb-3">
                                        <label for="thirdPartPhone" class="form-label">Phone Number<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="thirdPartPhone" name="thirdPartPhone" placeholder="" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>



                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light report-tab-unactive" data-bs-dismiss="modal">Close</button>
                <button type="button" id="addThirdPartysend" class="btn btn report-tab-active">send</button>
            </div>
        </div>
    </div>
</div>
<!--  Add thirdParty  Modal end -->


@endsection

<script>
    var dougGraphHighRisk = {!!isset($dougGraphHighRisk) ? json_encode($dougGraphHighRisk) : 'null'!!};
    var dougGraphMediumRisk = {!!isset($dougGraphMediumRisk) ? json_encode($dougGraphMediumRisk) : 'null'!!};
    var dougGraphLowRisk = {!!isset($dougGraphLowRisk) ? json_encode($dougGraphLowRisk) : 'null'!!};
    var OverallRisk = {!!isset($OverallRisk) ? json_encode($OverallRisk) : 'null'!!};
    // department
    var labelsDepartment = {!!isset($labels) ? json_encode($labels) : 'null'!!};
    var highRiskCounts_department = {!!isset($highRiskCounts_department) ? json_encode($highRiskCounts_department) : 'null'!!};
    var mediumRiskCounts_department = {!!isset($mediumRiskCounts_department) ? json_encode($mediumRiskCounts_department) : 'null'!!};
    var lowRiskCounts_department = {!!isset($lowRiskCounts_department) ? json_encode($lowRiskCounts_department) : 'null'!!};

    // zone/loction
    var labels_zone = {!!isset($labels_zone) ? json_encode($labels_zone) : 'null'!!};
    var highRiskCounts_zone = {!!isset($highRiskCounts_zone) ? json_encode($highRiskCounts_zone) : 'null'!!};
    var mediumRiskCounts_zone = {!!isset($mediumRiskCounts_zone) ? json_encode($mediumRiskCounts_zone) : 'null'!!};
    var lowRiskCounts_zone = {!!isset($lowRiskCounts_zone) ? json_encode($lowRiskCounts_zone) : 'null'!!};

    // impact risk
    var RegulatoryCount = {!!isset($RegulatoryCount) ? json_encode($RegulatoryCount) : 'null'!!};
    var legalCount = {!!isset($legalCount) ? json_encode($legalCount) : 'null'!!};
    var financialCount = {!!isset($financialCount) ? json_encode($financialCount) : 'null'!!};
    var taxReurnCreditCount = {!!isset($taxReurnCreditCount) ? json_encode($taxReurnCreditCount) : 'null'!!};
    var regulataryCount = {!!isset($regulataryCount) ? json_encode($regulataryCount) : 'null'!!};

    var totalRisk = {!!isset($totalRisk) ? json_encode($totalRisk) : 'null'!!};
    var highRiskCOunt = {!!isset($highRiskCOunt) ? json_encode($highRiskCOunt) : 'null'!!};
    var mediumRiskCOunt = {!!isset($mediumRiskCOunt) ? json_encode($mediumRiskCOunt) : 'null'!!};
    var lowRiskCOunt = {!!isset($lowRiskCOunt) ? json_encode($lowRiskCOunt) : 'null'!!};




    // var dougGraphHighRisk = @json($dougGraphHighRisk) ? @json($dougGraphHighRisk) : null ;
    // var dougGraphMediumRisk = @json($dougGraphMediumRisk);
    // var dougGraphLowRisk = @json($dougGraphLowRisk);
</script>

@section('addScript')


<script>
    $(document).ready(function() {
        $("#addThirdPartysend").on("click", function() {
            // Disable the button
            $(this).prop("disabled", true);
            console.log("dsdfdf");

            var thirdPartyName = $("#thirdPartyName").val();

            var thirdPartyAddress = $("#thirdPartyAddress").val();
            var thirdPartDepartment = $("#thirdPartDepartment").val();
            var thirdPartPoc = $("#thirdPartPoc").val();
            var thirdPartLocation = $("#thirdPartLocation").val();
            var thirdPartEmail = $("#thirdPartEmail").val();
            var thirdPartPhone = $("#thirdPartPhone").val();

            // Show the loading spinner
            $("#loader").show();

            $.ajax({
                type: "POST",
                url: "{{ route('company.sendEmailForRequestThirdParty') }}",
                headers: {

                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    third_party_name: thirdPartyName,
                    third_party_address: thirdPartyAddress,
                    third_party_department: thirdPartDepartment,
                    third_party_pos: thirdPartPoc,
                    third_party_location: thirdPartLocation,
                    third_party_email: thirdPartEmail,
                    third_party_phone: thirdPartPhone,
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        $("#request-Third-party-Modal").modal("hide");
                        // Display SweetAlert success message with auto-close after 3 seconds
                        Swal.fire({
                            title: "Success!",
                            text: response.message,
                            icon: "success",
                            confirmButtonText: "OK",
                            timer: 3000, // 3 seconds
                            timerProgressBar: true,
                            willClose: () => {
                                $('#third-partyform').trigger("reset"); //Line1
                                $("#addThirdPartysend").prop("disabled", false);
                            },
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Handle the error response
                },
                complete: function() {
                    // Re-enable the button and hide the loading spinner after the request is complete
                    $("#addThirdPartysend").prop("disabled", false);
                    $("#loader").hide();
                },
            });
        });
    });
</script>

<script>
    (function($) {
        "use strict"


        /* function draw() {

        } */

        var dlabSparkLine = function() {
            let draw = Chart.controllers.line.__super__.draw; //draw shadow

            var screenWidth = $(window).width();


            //     var barHorizontalChartForLocation = function() {
            //     if (jQuery('#barChartHorizontalLocation').length > 0) {

            //         // Create an array of different colors for each month
            //         const barColors = [
            //             'rgba(98, 126, 234, 1)',
            //             'rgba(255, 99, 132, 1)',
            //             'rgba(75, 192, 192, 1)',
            //             'rgba(255, 205, 86, 1)',
            //             'rgba(54, 162, 235, 1)',
            //             'rgba(153, 102, 255, 1)',
            //             'rgba(255, 159, 64, 1)',
            //             'rgb(239, 83, 80)',    // August
            //             'rgb(129, 199, 132)',    // September
            //             'rgb(121, 134, 203)',    // October
            //             'rgba(255, 165, 0, 1)',   // December
            //             'rgba(128, 0, 128, 1)',  // November
            //         ];

            //         const barChart_2 = document.getElementById("barChartHorizontalLocation").getContext('2d');
            //         barChart_2.height = 100;

            //         new Chart(barChart_2, {
            //             type: 'horizontalBar',
            //             data: {
            //                 defaultFontFamily: 'Poppins',
            //                 labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov"],
            //                 datasets: [
            //                     {
            //                         label: "My First dataset",
            //                         data: [65, 59, 80, 81, 56, 55, 40, 75, 65, 90, 55],
            //                         borderColor: barColors,
            //                         borderWidth: "0",
            //                         backgroundColor: barColors,
            //                         hoverBackgroundColor: barColors
            //                     }
            //                 ]
            //             },
            //             options: {
            //                 legend: false,
            //                 scales: {
            //                     yAxes: [{
            //                         ticks: {
            //                             beginAtZero: true,
            //                             fontColor: '#888',
            //                         },
            //                         gridLines: {
            //                             color: "rgba(255, 255, 255, 0.1)"
            //                         }
            //                     }],
            //                     xAxes: [{
            //                         barPercentage: 0.5,
            //                         ticks: {
            //                             fontColor: '#888',
            //                         },
            //                         gridLines: {
            //                             color: "rgba(255, 255, 255, 0.1)"
            //                         }
            //                     }]
            //                 }
            //             }
            //         });
            //     }
            // }


            // ============================================== department chart of high risk low risk medium =============

            // var barVerticalChartForDepartment = function() {
            //     //stalked bar chart
            //     if (jQuery('#barChartVerticalDepartment').length > 0) {
            //         const barChartVerticalDepartment = document.getElementById("barChartVerticalDepartment").getContext('2d');
            //         //generate gradient
            //         const barChartVerticalDepartmentgradientStroke = barChartVerticalDepartment.createLinearGradient(50, 100, 50, 50);
            //         barChartVerticalDepartmentgradientStroke.addColorStop(0, "rgb(239, 83, 80)");
            //         barChartVerticalDepartmentgradientStroke.addColorStop(1, "rgb(239, 83, 80)");

            //         const barChartVerticalDepartmentgradientStroke2 = barChartVerticalDepartment.createLinearGradient(50, 100, 50, 50);
            //         barChartVerticalDepartmentgradientStroke2.addColorStop(0, "rgb(121, 134, 203)");
            //         barChartVerticalDepartmentgradientStroke2.addColorStop(1, "rgb(121, 134, 203)");

            //         const barChartVerticalDepartmentgradientStroke3 = barChartVerticalDepartment.createLinearGradient(50, 100, 50, 50);
            //         barChartVerticalDepartmentgradientStroke3.addColorStop(0, "rgb(129, 199, 132)");
            //         barChartVerticalDepartmentgradientStroke3.addColorStop(1, "rgb(129, 199, 132)");

            //         // '', // August
            //         //     '', // October
            //         //     '', // September

            //         barChartVerticalDepartment.height = 100;

            //         let barChartData = {
            //             defaultFontFamily: 'Poppins',
            //             labels: labelsDepartment,
            //             datasets: [{
            //                 label: 'High Risk',
            //                 backgroundColor: barChartVerticalDepartmentgradientStroke,
            //                 hoverBackgroundColor: barChartVerticalDepartmentgradientStroke,
            //                 data: highRiskCounts_department
            //             }, {
            //                 label: 'Medium Risk',
            //                 backgroundColor: barChartVerticalDepartmentgradientStroke2,
            //                 hoverBackgroundColor: barChartVerticalDepartmentgradientStroke2,
            //                 data:mediumRiskCounts_department
            //             }, {
            //                 label: 'Low Risk',
            //                 backgroundColor: barChartVerticalDepartmentgradientStroke3,
            //                 hoverBackgroundColor: barChartVerticalDepartmentgradientStroke3,
            //                 data: lowRiskCounts_department
            //             }]

            //         };

            //         new Chart(barChartVerticalDepartment, {
            //             type: 'bar',
            //             data: barChartData,
            //             options: {
            //                 legend: {
            //                     display: false
            //                 },
            //                 title: {
            //                     display: false
            //                 },
            //                 tooltips: {
            //                     mode: 'index',
            //                     intersect: true
            //                 },
            //                 responsive: true,
            //                 scales: {
            //                     xAxes: [{
            //                         //display:0,
            //                         stacked: true,
            //                         ticks: {
            //                             fontColor: '#888',
            //                         },
            //                         gridLines: {
            //                             color: "rgba(255, 255, 255, 0.1)"
            //                         }
            //                     }],
            //                     yAxes: [{
            //                         //display:0,
            //                         stacked: true,
            //                         ticks: {
            //                             fontColor: '#888',
            //                         },
            //                         gridLines: {
            //                             color: "rgba(255, 255, 255, 0.1)"
            //                         }
            //                     }]
            //                 }
            //             }
            //         });
            //     }
            // }

            var barVerticalChartForDepartment = function() {
                    //stalked bar chart
                    if (jQuery('#barChartVerticalDepartment').length > 0) {
                        const barChartVerticalDepartment = document.getElementById("barChartVerticalDepartment").getContext('2d');
                        //generate gradient
                        const barChartVerticalDepartmentgradientStroke = barChartVerticalDepartment.createLinearGradient(50, 100, 50, 50);
                        barChartVerticalDepartmentgradientStroke.addColorStop(0, "rgb(239, 83, 80)");
                        barChartVerticalDepartmentgradientStroke.addColorStop(1, "rgb(239, 83, 80)");

                        const barChartVerticalDepartmentgradientStroke2 = barChartVerticalDepartment.createLinearGradient(50, 100, 50, 50);
                        barChartVerticalDepartmentgradientStroke2.addColorStop(0, "rgb(121, 134, 203)");
                        barChartVerticalDepartmentgradientStroke2.addColorStop(1, "rgb(121, 134, 203)");

                        const barChartVerticalDepartmentgradientStroke3 = barChartVerticalDepartment.createLinearGradient(50, 100, 50, 50);
                        barChartVerticalDepartmentgradientStroke3.addColorStop(0, "rgb(129, 199, 132)");
                        barChartVerticalDepartmentgradientStroke3.addColorStop(1, "rgb(129, 199, 132)");

                        barChartVerticalDepartment.height = 100;

                        let barChartData = {
                            defaultFontFamily: 'Poppins',
                            labels: labelsDepartment,
                            datasets: [{
                                label: 'High Risk',
                                backgroundColor: barChartVerticalDepartmentgradientStroke,
                                hoverBackgroundColor: barChartVerticalDepartmentgradientStroke,
                                data: highRiskCounts_department
                            }, {
                                label: 'Medium Risk',
                                backgroundColor: barChartVerticalDepartmentgradientStroke2,
                                hoverBackgroundColor: barChartVerticalDepartmentgradientStroke2,
                                data: mediumRiskCounts_department
                            }, {
                                label: 'Low Risk',
                                backgroundColor: barChartVerticalDepartmentgradientStroke3,
                                hoverBackgroundColor: barChartVerticalDepartmentgradientStroke3,
                                data: lowRiskCounts_department
                            }]
                        };

                        var myChart = new Chart(barChartVerticalDepartment, {
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
                                    intersect: true
                                },
                                responsive: true,
                                scales: {
                                    xAxes: [{
                                        stacked: true,
                                        ticks: {
                                            fontColor: '#888',
                                        },
                                        gridLines: {
                                            color: "rgba(255, 255, 255, 0.1)"
                                        }
                                    }],
                                    yAxes: [{
                                        stacked: true,
                                        ticks: {
                                            fontColor: '#888',
                                        },
                                        gridLines: {
                                            color: "rgba(255, 255, 255, 0.1)"
                                        }
                                    }]
                                }
                            }
                        });

                        var chartCanvas = barChartVerticalDepartment.canvas;

                        // Set the cursor to pointer when hovering over the chart
                        chartCanvas.style.cursor = 'pointer';

                        // Add click event listener
                        chartCanvas.addEventListener('click', function (event) {
                                            var activePoint = myChart.getElementAtEvent(event)[0];

                                            if (activePoint) {
                                                var labelValue = myChart.data.labels[activePoint._index];

                                                // Redirect to the next page with the clicked bar label
                                                // window.location.href = '/next-page/' + encodeURIComponent(labelValue);
                                                // window.location.href = '{{ URL::to("company/report") }}' + '?' + encodeURIComponent(labelValue);
                                                window.location.href = '{{ URL::to("company/report") }}?Department=' + encodeURIComponent(labelValue);


                                            }
                                        });
                    }
            }



            // ============================================== location/zone chart of high risk low risk medium =============

            var barHorizontalChartForLocation = function() {
                //stalked bar chart
                if (jQuery('#barChartHorizontalLocation').length > 0) {
                    const barChartHorizontalLocation = document.getElementById("barChartHorizontalLocation").getContext('2d');
                    //generate gradient
                    const barChartHorizontalLocationgradientStroke = barChartHorizontalLocation.createLinearGradient(50, 100, 50, 50);
                    barChartHorizontalLocationgradientStroke.addColorStop(0, "rgb(239, 83, 80)");
                    barChartHorizontalLocationgradientStroke.addColorStop(1, "rgb(239, 83, 80)");

                    const barChartHorizontalLocationgradientStroke2 = barChartHorizontalLocation.createLinearGradient(50, 100, 50, 50);
                    barChartHorizontalLocationgradientStroke2.addColorStop(0, "rgb(121, 134, 203)");
                    barChartHorizontalLocationgradientStroke2.addColorStop(1, "rgb(121, 134, 203)");

                    const barChartHorizontalLocationgradientStroke3 = barChartHorizontalLocation.createLinearGradient(50, 100, 50, 50);
                    barChartHorizontalLocationgradientStroke3.addColorStop(0, "rgb(129, 199, 132)");
                    barChartHorizontalLocationgradientStroke3.addColorStop(1, "rgb(129, 199, 132)");

                    // '', // August
                    //     '', // October
                    //     '', // September

                    barChartHorizontalLocation.height = 100;

                    let barChartData = {
                        defaultFontFamily: 'Poppins',
                        labels: labels_zone,
                        datasets: [{
                            label: 'High Risk',
                            backgroundColor: barChartHorizontalLocationgradientStroke,
                            hoverBackgroundColor: barChartHorizontalLocationgradientStroke,
                            data: highRiskCounts_zone,
                        }, {
                            label: 'Medium Risk',
                            backgroundColor: barChartHorizontalLocationgradientStroke2,
                            hoverBackgroundColor: barChartHorizontalLocationgradientStroke2,
                            data:mediumRiskCounts_zone,
                        }, {
                            label: 'Low Risk',
                            backgroundColor: barChartHorizontalLocationgradientStroke3,
                            hoverBackgroundColor: barChartHorizontalLocationgradientStroke3,
                            data: lowRiskCounts_zone
                        }]

                    };

                 var myChartLocation =   new Chart(barChartHorizontalLocation, {
                        type: 'horizontalBar',
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
                                intersect: true
                            },
                            responsive: true,
                            scales: {
                                xAxes: [{
                                    //display:0,
                                    stacked: true,
                                    ticks: {
                                        fontColor: '#888',
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, 0.1)"
                                    }
                                }],
                                yAxes: [{
                                    //display:0,
                                    stacked: true,
                                    ticks: {
                                        fontColor: '#888',
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, 0.1)"
                                    }
                                }]
                            }
                        }
                    });

                    var chartCanvas =  barChartHorizontalLocation.canvas;

                    // Set the cursor to pointer when hovering over the chart
                    chartCanvas.style.cursor = 'pointer';

                    chartCanvas.addEventListener('click', function (event) {
                        var activePoint = myChartLocation.getElementAtEvent(event)[0];

                        if (activePoint) {
                            var labelValue = myChartLocation.data.labels[activePoint._index];

                            // Redirect to the next page with the clicked bar label
                            // window.location.href = '/next-page/' + encodeURIComponent(labelValue);
                            // window.location.href = '{{ URL::to("company/report") }}' + '?' + encodeURIComponent(labelValue);
                            window.location.href = '{{ URL::to("company/report") }}?Location=' + encodeURIComponent(labelValue);


                        }
                    });


                }
            }





            // var barHorizontalChartForLocation = function() {
            //     if (jQuery('#barChartHorizontalLocation').length > 0) {

            //         // Create an array of different colors for each month
            //         const barColors = [

            //             'rgba(75, 192, 192, 1)',
            //             'rgba(255, 205, 86, 1)',
            //             'rgba(54, 162, 235, 1)',
            //             'rgba(153, 102, 255, 1)',
            //             'rgba(255, 159, 64, 1)',
            //             'rgb(239, 83, 80)', // August
            //             'rgb(129, 199, 132)', // September
            //             'rgb(121, 134, 203)', // October
            //             'rgba(255, 165, 0, 1)', // December
            //             'rgba(128, 0, 128, 1)', // November
            //         ];

            //         const barChart = document.getElementById("barChartHorizontalLocation").getContext('2d');
            //         barChart.height = 100;

            //         new Chart(barChart, {
            //             type: 'horizontalBar',
            //             data: {
            //                 defaultFontFamily: 'Poppins',
            //                 labels: ["North Zone", "North West Zone", "North East Zone", "South Zone", "South East Zone", "South West Zone", "East Zone", "West Zone", "Central"],
            //                 datasets: [{
            //                     label: "Zone",
            //                     data:zoneCount,
            //                     backgroundColor: barColors,
            //                     hoverBackgroundColor: barColors
            //                 }]
            //             },
            //             options: {
            //                 legend: false,
            //                 scales: {
            //                     xAxes: [{
            //                         ticks: {
            //                             beginAtZero: true,
            //                             fontColor: '#888',
            //                         },
            //                         gridLines: {
            //                             color: "rgba(255, 255, 255, 0.1)"
            //                         }
            //                     }],
            //                     yAxes: [{
            //                         ticks: {
            //                             beginAtZero: true,
            //                             fontColor: '#888',
            //                         },
            //                         gridLines: {
            //                             color: "rgba(255, 255, 255, 0.1)"
            //                         }
            //                     }]
            //                 }
            //             }
            //         });
            //     }
            // }


            // var barVerticalChartForDepartment = function() {
            //     if (jQuery('#barChartVerticalDepartment').length > 0) {

            //         // Create an array of different colors for each month
            //         const barColors = [


            //             'rgb(239, 83, 80)', // August
            //             'rgb(129, 199, 132)', // September
            //             'rgb(121, 134, 203)', // October
            //             'rgba(255, 165, 0, 1)', // December
            //             'rgba(128, 0, 128, 1)', // November
            //         ];

            //         const barChart = document.getElementById("barChartVerticalDepartment").getContext('2d');
            //         barChart.height = 100;

            //         new Chart(barChart, {
            //             type: 'bar',
            //             data: {
            //                 defaultFontFamily: 'Poppins',
            //                 labels: ["Finance", "HR", "Sales", "Procurement", "Marketing"],
            //                 datasets: [{
            //                     label: "Department",
            //                     data: departmentCount,
            //                     backgroundColor: barColors,
            //                     hoverBackgroundColor: barColors
            //                 }]
            //             },
            //             options: {
            //                 legend: false,
            //                 scales: {
            //                     xAxes: [{
            //                         ticks: {
            //                             beginAtZero: true,
            //                             fontColor: '#888',
            //                         },
            //                         gridLines: {
            //                             color: "rgba(255, 255, 255, 0.1)"
            //                         }
            //                     }],
            //                     yAxes: [{
            //                         ticks: {
            //                             beginAtZero: true,
            //                             fontColor: '#888',
            //                         },
            //                         gridLines: {
            //                             color: "rgba(255, 255, 255, 0.1)"
            //                         }
            //                     }]
            //                 }
            //             }
            //         });
            //     }
            // }


            var barVerticalChartForReputation = function() {
                if (jQuery('#barChartVerticalReputation').length > 0) {

                    // Create an array of different colors for each month
                    const barColors = [


                        'rgb(239, 83, 80)', // August
                        'rgb(121, 134, 203)', // October
                        'rgb(129, 199, 132)', // September
                    ];

                    const barChart = document.getElementById("barChartVerticalReputation").getContext('2d');
                    barChart.height = 100;

                    var chartRegu =new Chart(barChart, {
                        type: 'bar',
                        data: {
                            defaultFontFamily: 'Poppins',
                            labels: ["High Risk", "Medium Risk", "Low Risk"],
                            datasets: [{
                                label: "Regulatory",
                                data: RegulatoryCount,
                                backgroundColor: barColors,
                                hoverBackgroundColor: barColors
                            }]
                        },
                        options: {
                            legend: false,
                            scales: {
                                xAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        fontColor: '#888',
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, 0.1)"
                                    }
                                }],
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        fontColor: '#888',
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, 0.1)"
                                    }
                                }]
                            }
                        }
                    });
                            var chartCanvas =  barChart.canvas;

                            // Set the cursor to pointer when hovering over the chart
                            chartCanvas.style.cursor = 'pointer';

                            chartCanvas.addEventListener('click', function (event) {
                            var activePoint = chartRegu.getElementAtEvent(event)[0];

                            if (activePoint) {
                                var labelValue = chartRegu.data.labels[activePoint._index];

                                // Redirect to the next page with the clicked bar label
                                // window.location.href = '/next-page/' + encodeURIComponent(labelValue);
                                // window.location.href = '{{ URL::to("company/report") }}' + '?' + encodeURIComponent(labelValue);
                                window.location.href = '{{ URL::to("company/report") }}?Regulatory=' + encodeURIComponent(labelValue);


                            }
                            });
                }
            }


            var barVerticalChartForLegal = function() {
                if (jQuery('#barChartVerticalLegal').length > 0) {

                    // Create an array of different colors for each month
                    const barColors = [

                        'rgb(239, 83, 80)', // August
                        'rgb(121, 134, 203)', // October
                        'rgb(129, 199, 132)', // September
                    ];

                    const barChart = document.getElementById("barChartVerticalLegal").getContext('2d');
                    barChart.height = 100;

                   var chartLegal = new Chart(barChart, {
                        type: 'bar',
                        data: {
                            defaultFontFamily: 'Poppins',
                            labels: ["High Risk", "Medium Risk", "Low Risk"],
                            datasets: [{
                                label: "Legal",
                                data: legalCount,
                                backgroundColor: barColors,
                                hoverBackgroundColor: barColors
                            }]
                        },
                        options: {
                            legend: false,
                            scales: {
                                xAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        fontColor: '#888',
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, 0.1)"
                                    }
                                }],
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        fontColor: '#888',
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, 0.1)"
                                    }
                                }]
                            }
                        }
                    });
                    var chartCanvas =  barChart.canvas;

                            // Set the cursor to pointer when hovering over the chart
                            chartCanvas.style.cursor = 'pointer';

                            chartCanvas.addEventListener('click', function (event) {
                        var activePoint = chartLegal.getElementAtEvent(event)[0];

                        if (activePoint) {
                            var labelValue = chartLegal.data.labels[activePoint._index];

                            // Redirect to the next page with the clicked bar label
                            // window.location.href = '/next-page/' + encodeURIComponent(labelValue);
                            // window.location.href = '{{ URL::to("company/report") }}' + '?' + encodeURIComponent(labelValue);
                            window.location.href = '{{ URL::to("company/report") }}?Legal=' + encodeURIComponent(labelValue);


                        }
                    });
                }
            }

            var barVerticalChartForFinancial = function() {
                if (jQuery('#barChartVerticalFinancial').length > 0) {

                    // Create an array of different colors for each month
                    const barColors = [

                        'rgb(239, 83, 80)', // August
                        'rgb(121, 134, 203)', // October
                        'rgb(129, 199, 132)', // September
                    ];

                    const barChart = document.getElementById("barChartVerticalFinancial").getContext('2d');
                    barChart.height = 100;

                  var chartFinancial =  new Chart(barChart, {
                        type: 'bar',
                        data: {
                            defaultFontFamily: 'Poppins',
                            labels: ["High Risk", "Medium Risk", "Low Risk"],
                            datasets: [{
                                label: "Financial",
                                data: financialCount,
                                backgroundColor: barColors,
                                hoverBackgroundColor: barColors
                            }]
                        },
                        options: {
                            legend: false,
                            scales: {
                                xAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        fontColor: '#888',
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, 0.1)"
                                    }
                                }],
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        fontColor: '#888',
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, 0.1)"
                                    }
                                }]
                            }
                        }
                    });
                    var chartCanvas =  barChart.canvas;

                            // Set the cursor to pointer when hovering over the chart
                            chartCanvas.style.cursor = 'pointer';

                            chartCanvas.addEventListener('click', function (event) {
                        var activePoint = chartFinancial.getElementAtEvent(event)[0];

                        if (activePoint) {
                            var labelValue = chartFinancial.data.labels[activePoint._index];

                            // Redirect to the next page with the clicked bar label
                            // window.location.href = '/next-page/' + encodeURIComponent(labelValue);
                            // window.location.href = '{{ URL::to("company/report") }}' + '?' + encodeURIComponent(labelValue);
                            window.location.href = '{{ URL::to("company/report") }}?Financial=' + encodeURIComponent(labelValue);


                        }
                    });
                }
            }

            var barVerticalChartForOpertional = function() {
                if (jQuery('#barChartVerticalOpertional').length > 0) {

                    // Create an array of different colors for each month
                    const barColors = [

                        'rgb(239, 83, 80)', // August
                        'rgb(121, 134, 203)', // October
                        'rgb(129, 199, 132)', // September
                    ];

                    const barChart = document.getElementById("barChartVerticalOpertional").getContext('2d');
                    barChart.height = 100;

                    var chartOperational= new Chart(barChart, {
                        type: 'bar',
                        data: {
                            defaultFontFamily: 'Poppins',
                            labels: ["High Risk", "Medium Risk", "Low Risk"],
                            datasets: [{
                                label: "Operational",
                                data: taxReurnCreditCount,
                                backgroundColor: barColors,
                                hoverBackgroundColor: barColors
                            }]
                        },
                        options: {
                            legend: false,
                            scales: {
                                xAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        fontColor: '#888',
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, 0.1)"
                                    }
                                }],
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        fontColor: '#888',
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, 0.1)"
                                    }
                                }]
                            }
                        }
                    });
                    var chartCanvas =  barChart.canvas;

                            // Set the cursor to pointer when hovering over the chart
                            chartCanvas.style.cursor = 'pointer';

                            chartCanvas.addEventListener('click', function (event) {
                        var activePoint = chartOperational.getElementAtEvent(event)[0];

                        if (activePoint) {
                            var labelValue = chartOperational.data.labels[activePoint._index];

                            // Redirect to the next page with the clicked bar label
                            // window.location.href = '/next-page/' + encodeURIComponent(labelValue);
                            // window.location.href = '{{ URL::to("company/report") }}' + '?' + encodeURIComponent(labelValue);
                            window.location.href = '{{ URL::to("company/report") }}?Operational=' + encodeURIComponent(labelValue);


                        }
                    });
                }
            }

            var barVerticalChartForRegulatary = function() {
                if (jQuery('#barChartVerticalRegulatary').length > 0) {

                    // Create an array of different colors for each month
                    const barColors = [

                        'rgb(239, 83, 80)', // August
                        'rgb(121, 134, 203)', // October
                        'rgb(129, 199, 132)', // September
                    ];

                    const barChart = document.getElementById("barChartVerticalRegulatary").getContext('2d');
                    barChart.height = 100;

                 var ChartReputation=   new Chart(barChart, {
                        type: 'bar',
                        data: {
                            defaultFontFamily: 'Poppins',
                            labels: ["High Risk", "Medium Risk", "Low Risk"],
                            datasets: [{
                                label: "Reputation",
                                data: regulataryCount,
                                backgroundColor: barColors,
                                hoverBackgroundColor: barColors
                            }]
                        },
                        options: {
                            legend: false,
                            scales: {
                                xAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        fontColor: '#888',
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, 0.1)"
                                    }
                                }],
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        fontColor: '#888',
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, 0.1)"
                                    }
                                }]
                            }
                        }
                    });
                    var chartCanvas =  barChart.canvas;

                            // Set the cursor to pointer when hovering over the chart
                            chartCanvas.style.cursor = 'pointer';

                            chartCanvas.addEventListener('click', function (event) {
                        var activePoint = ChartReputation.getElementAtEvent(event)[0];

                        if (activePoint) {
                            var labelValue = ChartReputation.data.labels[activePoint._index];

                            // Redirect to the next page with the clicked bar label
                            // window.location.href = '/next-page/' + encodeURIComponent(labelValue);
                            // window.location.href = '{{ URL::to("company/report") }}' + '?' + encodeURIComponent(labelValue);
                            window.location.href = '{{ URL::to("company/report") }}?Reputation=' + encodeURIComponent(labelValue);


                        }
                    });

                }
            }



            var lineChart1 = function() {


                if (jQuery('#lineChart_1').length > 0) {


                    //basic line chart
                    const lineChart_1 = document.getElementById("lineChart_1").getContext('2d');

                    Chart.controllers.line = Chart.controllers.line.extend({
                        draw: function() {
                            draw.apply(this, arguments);
                            let nk = this.chart.chart.ctx;
                            let _stroke = nk.stroke;
                            nk.stroke = function() {
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
                            datasets: [{
                                label: "My First dataset",
                                data: [25, 20, 60, 41, 66, 45, 80],
                                borderColor: 'rgba(44, 44, 44, 1)',
                                borderWidth: "2",
                                backgroundColor: 'transparent',
                                pointBackgroundColor: 'rgba(44, 44, 44, 1)'
                            }]
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
                                        fontColor: '#ffffff',
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, 0.1)"
                                    }
                                }],
                                xAxes: [{
                                    ticks: {
                                        padding: 5,
                                        fontColor: '#ffffff',
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, 0.1)"
                                    }
                                }]
                            }
                        }
                    });

                }
            }

            var lineChart2 = function() {
                //gradient line chart
                if (jQuery('#lineChart_2').length > 0) {

                    const lineChart_2 = document.getElementById("lineChart_2").getContext('2d');
                    //generate gradient
                    const lineChart_2gradientStroke = lineChart_2.createLinearGradient(500, 0, 100, 0);
                    lineChart_2gradientStroke.addColorStop(0, "rgba(44, 44, 44, 1)");
                    lineChart_2gradientStroke.addColorStop(1, "rgba(44, 44, 44, 0.5)");

                    Chart.controllers.line = Chart.controllers.line.extend({
                        draw: function() {
                            draw.apply(this, arguments);
                            let nk = this.chart.chart.ctx;
                            let _stroke = nk.stroke;
                            nk.stroke = function() {
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
                            datasets: [{
                                label: "My First dataset",
                                data: [25, 20, 60, 41, 66, 45, 80],
                                borderColor: lineChart_2gradientStroke,
                                borderWidth: "2",
                                backgroundColor: 'transparent',
                                pointBackgroundColor: 'rgba(44, 44, 44, 0.5)'
                            }]
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
                                        fontColor: '#ffffff',
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, 0.1)"
                                    }
                                }],
                                xAxes: [{
                                    ticks: {
                                        padding: 5,
                                        fontColor: '#ffffff',
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, 0.1)"
                                    }
                                }]
                            }
                        }
                    });
                }
            }
            var lineChart3 = function() {
                //dual line chart
                if (jQuery('#lineChart_3').length > 0) {
                    const lineChart_3 = document.getElementById("lineChart_3").getContext('2d');
                    //generate gradient
                    const lineChart_3gradientStroke1 = lineChart_3.createLinearGradient(500, 0, 100, 0);
                    lineChart_3gradientStroke1.addColorStop(0, "rgba(44, 44, 44, 1)");
                    lineChart_3gradientStroke1.addColorStop(1, "rgba(44, 44, 44, 0.5)");

                    const lineChart_3gradientStroke2 = lineChart_3.createLinearGradient(500, 0, 100, 0);
                    lineChart_3gradientStroke2.addColorStop(0, "rgba(255, 92, 0, 1)");
                    lineChart_3gradientStroke2.addColorStop(1, "rgba(255, 92, 0, 1)");

                    Chart.controllers.line = Chart.controllers.line.extend({
                        draw: function() {
                            draw.apply(this, arguments);
                            let nk = this.chart.chart.ctx;
                            let _stroke = nk.stroke;
                            nk.stroke = function() {
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
                            datasets: [{
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
                            }]
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
                                        fontColor: '#ffffff',
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, 0.1)"
                                    }
                                }],
                                xAxes: [{
                                    ticks: {
                                        padding: 5,
                                        fontColor: '#ffffff',
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, 0.1)"
                                    }
                                }]
                            }
                        }
                    });
                }
            }
            var lineChart03 = function() {
                //dual line chart
                if (jQuery('#lineChart_3Kk').length > 0) {
                    const lineChart_3Kk = document.getElementById("lineChart_3Kk").getContext('2d');
                    //generate gradient

                    Chart.controllers.line = Chart.controllers.line.extend({
                        draw: function() {
                            draw.apply(this, arguments);
                            let nk = this.chart.chart.ctx;
                            let _stroke = nk.stroke;
                            nk.stroke = function() {
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
                            datasets: [{
                                label: "My First dataset",
                                data: [90, 60, 80, 50, 60, 55, 80],
                                borderColor: 'rgba(58,122,254,1)',
                                borderWidth: "3",
                                backgroundColor: 'rgba(0,0,0,0)',
                                pointBackgroundColor: 'rgba(0, 0, 0, 0)'
                            }]
                        },
                        options: {
                            legend: false,
                            elements: {
                                point: {
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
                                        fontColor: '#ffffff',
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, 0.1)"
                                    },
                                    borderWidth: 3,
                                    display: false,
                                    lineTension: 0.4,
                                }],
                                xAxes: [{
                                    ticks: {
                                        padding: 5,
                                        fontColor: '#ffffff',
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, 0.1)"
                                    }

                                }]
                            }
                        }
                    });
                }

            }
            var areaChart1 = function() {
                //basic area chart
                if (jQuery('#areaChart_1').length > 0) {
                    const areaChart_1 = document.getElementById("areaChart_1").getContext('2d');

                    areaChart_1.height = 100;

                    new Chart(areaChart_1, {
                        type: 'line',
                        data: {
                            defaultFontFamily: 'Poppins',
                            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
                            datasets: [{
                                label: "My First dataset",
                                data: [25, 20, 60, 41, 66, 45, 80],
                                borderColor: 'rgba(0, 0, 1128, .3)',
                                borderWidth: "1",
                                backgroundColor: 'rgba(44, 44, 44,1)',
                                pointBackgroundColor: 'rgba(0, 0, 1128, .3)'
                            }]
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
                                        fontColor: '#ffffff',
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, 0.1)"
                                    }
                                }],
                                xAxes: [{
                                    ticks: {
                                        padding: 5,
                                        fontColor: '#ffffff',
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, 0.1)"
                                    }
                                }]
                            }
                        }
                    });
                }
            }
            var areaChart2 = function() {
                //gradient area chart
                if (jQuery('#areaChart_2').length > 0) {
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
                            datasets: [{
                                label: "My First dataset",
                                data: [25, 20, 60, 41, 66, 45, 80],
                                borderColor: "#ff2625",
                                borderWidth: "4",
                                backgroundColor: areaChart_2gradientStroke
                            }]
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
                                        fontColor: '#ffffff',
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, 0.1)"
                                    }
                                }],
                                xAxes: [{
                                    ticks: {
                                        padding: 5,
                                        fontColor: '#ffffff',
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, 0.1)"
                                    }
                                }]
                            }
                        }
                    });
                }
            }

            var areaChart3 = function() {
                //gradient area chart
                if (jQuery('#areaChart_3').length > 0) {
                    const areaChart_3 = document.getElementById("areaChart_3").getContext('2d');

                    areaChart_3.height = 100;

                    new Chart(areaChart_3, {
                        type: 'line',
                        data: {
                            defaultFontFamily: 'Poppins',
                            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
                            datasets: [{
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
                                        fontColor: '#ffffff',
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, 0.1)"
                                    }
                                }],
                                xAxes: [{
                                    ticks: {
                                        padding: 5,
                                        fontColor: '#ffffff',
                                    },
                                    gridLines: {
                                        color: "rgba(255, 255, 255, 0.1)"
                                    }
                                }]
                            }
                        }
                    });
                }
            }

            var radarChart = function() {
                if (jQuery('#radar_chart').length > 0) {
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
                            labels: [
                                ["Eating", "Dinner"],
                                ["Drinking", "Water"], "Sleeping", ["Designing", "Graphics"],
                                "Coding", "Cycling", "Running"
                            ],
                            datasets: [{
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
                                    fontColor: '#ffffff',
                                },
                                gridLines: {
                                    color: "rgba(255, 255, 255, 0.1)"
                                }
                            }
                        }
                    });
                }
            }
            var pieChart = function() {
                //pie chart
                if (jQuery('#pie_chart').length > 0) {
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
            // var doughnutChart = function(){
            // 	if(jQuery('#doughnut_chart').length > 0 ){
            // 		//doughut chart
            // 		const doughnut_chart = document.getElementById("doughnut_chart").getContext('2d');
            // 		doughnut_chart.height = 100;
            // 		new Chart(doughnut_chart, {
            // 			type: 'doughnut',
            // 			data: {
            // 				weight: 5,
            // 				defaultFontFamily: 'Poppins',
            // 				datasets: [{
            // 					data: finalValueforGraKeyObservation,
            // 					borderWidth: 3,
            // 					borderColor: "rgba(255,255,255,1)",
            // 					backgroundColor: [
            // 						"rgba(98, 126, 234, 1)",


            // 					],
            // 					hoverBackgroundColor: [
            // 						"rgba(98, 126, 234, .9)",

            // 					]

            // 				}],
            // 				labels: [
            // 				    "Score",
            // 				    "Out of",


            // 				]
            // 			},
            // 			options: {
            // 				weight: 19,

            //                  cutoutPercentage: 80,
            //             rotation: 1 * Math.PI,
            //             circumference: 1 * Math.PI,
            //             responsive: true,
            // 				// maintainAspectRatio: false
            // 			}
            // 		});
            // 	}
            // }


            // Doughnut Chart Function
            // Doughnut Chart Function
            // Doughnut Chart Function
            var doughnutChartall = function(elementId, dataValues, dynamicColor, label1, label2, count) {
                if (jQuery('#' + elementId).length > 0) {
                    const doughnut_chart = document.getElementById(elementId).getContext('2d');
                    new Chart(doughnut_chart, {
                        type: 'doughnut',
                        data: {
                            weight: 10,
                            defaultFontFamily: 'Poppins',
                            datasets: [{
                                data: dataValues,
                                borderWidth: 3,
                                borderColor: "rgba(255,255,255,1)",
                                backgroundColor: [
                                    dynamicColor,
                                    "#90CAF9",
                                ],
                                hoverBackgroundColor: [
                                    dynamicColor,
                                    "#90CAF9",
                                    // August
                                    // October
                                    // September

                                ]
                            }],
                            labels: [
                                label1,
                                label2,
                            ],
                        },
                        options: {
                            weight: 10,
                            cutoutPercentage: 60,
                            responsive: true,
                            maintainAspectRatio: false,
                            legend: {
                                display: false
                            },
                            tooltips: {
                                callbacks: {
                                    label: function(tooltipItem, data) {
                                        var dataset = data.datasets[tooltipItem.datasetIndex];
                                        var currentValue = dataset.data[tooltipItem.index];
                                        return data.labels[tooltipItem.index] + ': ' + currentValue  + '% '+ ' (total ' + count[tooltipItem.index] + ')';
                                    }
                                }
                            }
                        }
                    });
                }
            }


            // Call the function for each section
            // console.log(highRiskCOunt, "high");
            // console.log(mediumRiskCOunt, "medium");
            // console.log(lowRiskCOunt, "low");

                doughnutChartall("doughnut_chart_1", dougGraphHighRisk, 'rgb(239, 83, 80)', "High Risk", "Over All Risk", [highRiskCOunt, totalRisk ]);
                doughnutChartall("doughnut_chart_2", dougGraphMediumRisk, 'rgb(121, 134, 203)', "Medium Risk", "Over All Risk", [mediumRiskCOunt, totalRisk]);
                doughnutChartall("doughnut_chart_3", dougGraphLowRisk, 'rgb(129, 199, 132)', "Low Risk", "Over All Risk", [lowRiskCOunt, totalRisk]);

            var polarChart = function() {
                if (jQuery('#polar_chart').length > 0) {
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
                init: function() {},


                load: function() {
                    // barChart1();
                    // barChart1financialRatio();
                    // barChart1businessIntelligenc();
                    doughnutChartall();
                    barHorizontalChartForLocation();
                    barVerticalChartForDepartment();
                    barVerticalChartForReputation();
                    barVerticalChartForLegal();
                    barVerticalChartForFinancial();
                    barVerticalChartForOpertional();
                    barVerticalChartForRegulatary();

                    // barChart2();
                    // barChart3();
                    lineChart1();
                    lineChart2();
                    lineChart3();
                    lineChart03();
                    areaChart1();
                    areaChart2();
                    areaChart3();
                    radarChart();
                    pieChart();
                    // doughnutChart();
                    polarChart();
                },

                resize: function() {
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

        jQuery(document).ready(function() {});

        jQuery(window).on('load', function() {
            dlabSparkLine.load();
        });

        jQuery(window).on('resize', function() {
            //dlabSparkLine.resize();
            setTimeout(function() {
                dlabSparkLine.resize();
            }, 1000);
        });

    })(jQuery);
</script>

@endsection
