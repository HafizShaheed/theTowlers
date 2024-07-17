@extends('team.includes.master')
@section('addStyle')
<style>

</style>
@endsection
@section('content')


<div class="row">

    <div class="col-xl-12">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <div class="tbl-caption">
                        <h4 class="heading mb-0">Form Activity</h4>
                        <div>


                        </div>
                    </div>
                    <table id="empoloyees-tblwrapper" class="table ">
                        <thead>
                            <tr>
                                <th>Sr.No</th>

                                <th> Team Member Last Edited by</th>
                                <th>Last Edited Date</th>

                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($getAllExporterTextileDeclearation as $key => $value )
                        <tr>
                                <td><span>{{++$key}}</span></td>
                                <td><span>{{$value->editer_name}}</span></td>

                                <td>

                                    <span class="badge badge-danger border-0" title="Report Pending">{{ isset($value->created_at) ? $value->created_at->diffForHumans() : '' }} </span>
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
