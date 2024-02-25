@extends('admin.includes.master')
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
                                <th> ID</th>

                                <th> Team Member Last Edited by</th>
                                <th>Last Edited Date</th>
                                
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td><span>1</span></td>
                                <td><span>Member Abc</span></td>

                                <td>
                                    @switch(1)
                                    @case('1')
                                    <span class="badge badge-success border-0" title="Report Active">01/02/2024 </span>

                                    @break

                                    @case('0')
                                    <span class="badge badge-danger border-0" title="Report Pending">Pending </span>




                                    @break
                                    @case('2')
                                    <span class="badge badge-info border-0" title="Report Resubmit">Resubmit</span>

                                    @break
                                    @case('3')
                                    <span class="badge badge-primary border-0" title="Report Completed">Completed</span>


                                    @break

                                    @endswitch
                                </td>

                                
                            </tr>






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
