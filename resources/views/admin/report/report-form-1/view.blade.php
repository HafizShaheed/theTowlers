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


<div class="row mb-4">
 
    <div class="col-xl-2 col-sm-6 col-6 ">
                        <div class="d-flex justify-content-start align-items-start">
                            <a >
                            <button type="submit" class="btn btn report-tab-active"
                                id="filter-reprot-btn">Download Pdf</button>
                            </a>
                         
                        </div>
    </div>
</div>
<div class="row">
    <div class="card">
    <div class="pt-4">
        <div class="table-responsive">
            <table class="table primary-table-bordered">
                <thead class="thead-primary">
                    <tr>



                    </tr>



                </thead>
                <tbody>





                    <!-----------------===========================================    second director      ============================================================  -->
                    @for($i = 1; $i <= 8; $i++) 
                        <tr>
                            <th style="background-color: #5a595a; color: white;" scope="col" colspan="2" class="col-md-4">Field {{$i}}</th>
                            <th style="background-color: #5a595a; color: white;" scope="col" colspan="4" class="col-md-8">
                                abc
                            </th>
                        </tr>

                        <tr>
                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" colspan="1" class="col-md-2"> Field B {{$i}}</th>
                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-2">Field C {{$i}}</th>

                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-2">Field F {{$i}}</th>
                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-2">Field H {{$i}}</th>

                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-2">Field {{$i}}</th>
                            <th style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-2">Field {{$i}}</th>
                        </tr>
                        <tr>
                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-1">
                            Field {{$i}}
                            </td>
                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-1">
                            Field {{$i}}
                            </td>
                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-2">
                            Field {{$i}}
                            </td>

                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-2">
                            Field {{$i}}
                            </td>
                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-2">
                            Field {{$i}}
                            </td>

                            <td style="background-color: rgb(255, 255, 255); color: rgb(0, 0, 0);" class="col-md-2">
                            Field {{$i}}
                            </td>
                        </tr>
                        @endfor




                        <!-----------------===========================================    third director      ============================================================  -->






                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>

<!-- firm background tab start -->

<!-- firm background tab End -->















@endsection

@section('addScript')





@endsection
