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
                <form id="" action="{{route('admin.report_List_commercial_invoice')}}" class="row d-flex justify-content-between align-items-end">
                    <div class="col-xl-3 col-sm-6 col-6 mt-4 mt-md-0">
                        <label for="thirdPartyName">Team Member:</label>
                        <div class="d-flex justify-content-start align-items-start">

                            <select class="multi-select" name="PartyName" id="PartyName"
                                placeholder="Select Third Party">
                                <option disabled selected>Select Team</option>

                                <option data-display="Select" value="">
                                ABC
                                </option>

                            </select>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-6 mt-4 mt-md-0">

                        <label for="thirdPartyName">Status:</label>
                        <div class="d-flex justify-content-start align-items-start">
                            <select class="multi-select" name="status" placeholder="Select status Party">
                                <option disabled selected>Report Status</option>
                                <option value="Pending">Pending (0)</option>
                                <option class="badge badge-success border-0" value="Active">Active (1) </option>
                                <option value="Resubmit">Resubmit (2)</option>
                                <option value="Completed">Completed (3) </option>
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
                            <a href="{{route('admin.report_List_commercial_invoice')}}" class="btn btn report-tab-unactive"
                                id="filter-reprot-btn">Reset</a>
                        </div>
                    </div>
                </form>
                <div class="col-xl-2 col-sm-6 col-6 mt-6 pt-2 ">
                        <div class="d-flex justify-content-start align-items-start">
                            <a href="{{ URL::to('/panel/report/commercial-invoice/add') }}" class="" target="_blank">
                            <button type="submit" class="btn btn report-tab-active"
                                id="filter-reprot-btn">Add Report</button>
                            </a>

                        </div>
                    </div>

                <!-- <form id="" action="{{route('admin.report_List_commercial_invoice')}}" class="row d-flex justify-content-between align-items-end">

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
                                <th> Name</th>

                                <th>Created At</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $result)
                            <tr>
                               


                                <td>
                                    <span>{{ ucwords($result['table_name']) }}</span>
                                </td>

                                <td><span>{{ isset( $result['created_at']) ?  $result['created_at']->diffForHumans() : '' }}</span></td>
                          

                                <td class="text-center space-between ">

                              

                                    @php
                                   
                                    switch ($result['table_name']) {
                                        case 'canada customer invoice':
                                           $urlParams = route('admin.view_custom_canda_invoice', ['id' => $result['id']]);
                                            break;
                                        case 'certificate origins':
                                          
                                        $urlParams = route('admin.view_certificate_origins_invoice', ['id' => $result['id']]);
                                            break;
                                        case 'Certificate Origin Com Decs':
                                            $urlParams = route('admin.view_certificate_origin_com_dec_invoice', ['id' => $result['id']]);
                                            break;
                                        case 'Certificate Origin Com Decs from A':
                                        $urlParams = route('admin.view_certificate_origin_com_dec_form_a_invoice', ['id' => $result['id']]);
                                            break;
                                        case 'Certificate Origin Com Decs from IPs':
                                            $urlParams = route('admin.view_certificate_origin_com_dec_form_ip_invoice', ['id' => $result['id']]);
                                            break;
                                        case 'Certificate Origin No 627120s':
                                        $urlParams = route('admin.view_certificate_origin_no627120_invoice', ['id' => $result['id']]);
                                            break;
                                        case 'Exporter Textile Declearations':
                                        $urlParams = route('admin.view_exporter_textile_declearation_invoice', ['id' => $result['id']]);
                                            break;
                                        case 'Form 59 A invoice':
                                            $urlParams = route('admin.view_form_59_a_invoice', ['id' => $result['id']]);
                                            break;
                                       default;
                                    }
                                @endphp
                            
                                <a class="btn btn-sm report-tab-active" style="font-size: 10px;" href="{{ $urlParams}}" target="_blank" title="View Reports">
                                    View
                                </a>

                                 

                                </td>
                            </tr>
                            @endforeach







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

    $(document).ready(function () {
   


  });



</script>
@endsection
