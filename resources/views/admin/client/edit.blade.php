@extends('admin.includes.master')
@section('addStyle')
<style>

</style>
@endsection
@section('content')


<div class="row">

    <div class="card">
        <div class="card-body justify-content-start">
            <form action="{{route('admin.update_company')}}" method="POST">
                @csrf

                <input type="hidden" name="id" id="input" class="form-control" value="{{$getAclient->id}}">

                <div class="row">
                    <div class=" col-xl-12 col-sm-12 col-12 mt-4 mt-md-0">

                    </div>
                    <div class=" col-xl-12 col-sm-12 col-12 mt-4 mt-md-0">

                        <div class="row">

                        <div class="col-xl-6 mb-3">
                                                <label for="exampleFormControlInput2" class="form-label">Company Name<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="first_name" value="{{$getAclient->first_name}}" id="exampleFormControlInput2" placeholder="">
                                            </div>

                                            <div class="col-xl-6 mb-3">
                                                <label for="exampleFormControlInput2" class="form-label">Username<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="user_name" value="{{$getAclient->user_name}}"  id="exampleFormControlInput2" placeholder="">
                                            </div>

                                            <div class="col-xl-6 mb-3">
                                                <label for="exampleFormControlInput3" class="form-label">Company Email<span
                                                        class="text-danger">*</span></label>
                                                <input type="email" class="form-control" name="email" value="{{$getAclient->email}}"  id="exampleFormControlInput3" placeholder="">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label for="exampleFormControlInput88" class="form-label">Industry<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="industry" value="{{$getAclient->industry}}"  id="exampleFormControlInput88" placeholder="">
                                            </div>

                                            <div class="col-xl-6 mb-3">
                                                <label for="exampleFormControlInput2" class="form-label">POC<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="poc" value="{{$getAclient->poc}}"  id="exampleFormControlInput2" placeholder="">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label for="exampleFormControlInput2" class="form-label">Location<span
                                                        class="text-danger">*</span></label>

                                                @php
                                            $zones = \App\Models\Zone::get();
                                            @endphp
                                            <select class="multi-select" id="zone_id" name="zone_id" placeholder="Select Third Party">
                                                <option disabled selected>Select Client</option>
                                                @forelse ($zones as $zone )
                                                <option data-display="Select" value="{{ $zone->id }}" {{  $zone->id ==$getAclient->zone_id ? 'selected' : '' }}>
                                                    {{ $zone->zone_name  }}
                                                </option>
                                                @empty
                                                <p> No records found!</p>
                                                @endforelse

                                            </select>

                                            </div>

                                            <div class="col-xl-6 mb-3">
                                                <label for="exampleFormControlInput2" class="form-label">Role<span
                                                        class="text-danger">*</span></label>

                                                @php
                                            $roles = \App\Models\Role::get();
                                            @endphp
                                            <select class="multi-select" id="role_id" name="role_id" placeholder="Select Third Party">
                                                <option disabled selected>Select Role</option>
                                                @forelse ($roles as $role )
                                                <option data-display="Select" value="{{ $role->id }}" {{  $role->id ==$getAclient->role_id ? 'selected' : '' }}>
                                                    {{ $role->role_name  }}
                                                </option>
                                                @empty
                                                <p> No records found!</p>
                                                @endforelse

                                            </select>

                                            </div>
                                            <div class="col-xl-6 mb-3">
                                                <label for="exampleFormControlInput4"  class="form-label">Password<span
                                                        class="text-danger">*</span></label>
                                                <input type="password" name="password" class="form-control"  id="exampleFormControlInput4"
                                                    placeholder="">
                                            </div>

                                            <div class="col-xl-6 mb-3">
                                                <label for="exampleFormControlInput4" class="form-label">Confirm Password<span
                                                        class="text-danger">*</span></label>
                                                <input type="password" name="password_confirmation" class="form-control" id="exampleFormControlInput4"
                                                    placeholder="">
                                            </div>
                                            <div class="col-xl-6 mb-3">
                                        <!-- <label class="form-check-label" for="customCheckBox3"> status</label> -->
                                        <label for="clientStatusCheck" class="form-label">Status<span
                                                class="text-danger">*</span></label>
                                        <input type="checkbox" class="form-check-input"
                                            name="clientStatusCheck"  {{$getAclient->status== 1 ? 'checked' : '' }} />
                                    </div>
                        </div>
                        <div>
                            <button class="btn btn- light ms-1 report-tab-unactive">Cancel</button>
                            <button class="btn btn me-1 report-tab-active " >Save</button>
                        </div>

                    </div>



                </div>

            </form>

        </div>


    </div>

</div>


















@endsection

@section('addScript')
<script>

</script>
@endsection
