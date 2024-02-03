@extends('admin.includes.master')
@section('addStyle')
<style>

</style>
@endsection
@section('content')


<div class="row">

    <div class="card">
        <div class="card-body justify-content-start">
        <form action="{{route('admin.update_vender')}}" method="POST">
                @csrf
                <div class="row">
                    <div class=" col-xl-12 col-sm-12 col-12 mt-4 mt-md-0">

                    </div>
                    <div class=" col-xl-12 col-sm-12 col-12 mt-4 mt-md-0">

                        <div class="row">

                        <div class="col-xl-6 mb-3">
                            <input id="id" type="hidden" name="id" value="{{$getThirdParty->id}}">
                                                <label for="exampleFormControlInput2" class="form-label">Third Party Name<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="third_party_name" value="{{$getThirdParty->third_party_name}}" class="form-control" id="exampleFormControlInput2" placeholder="">
                                            </div>

                                            @php
                                        $getAllUser = \App\Models\User::get();
                                    @endphp
                                    <div class="col-xl-6 mb-3">
                                        <label class="form-label">Client Name<span class="text-danger">*</span></label>
                                        <select class="default-select style-1 form-control" name="user_id" id="user_id">
                                            <option data-display="Select" disabled selected>
                                                Select Client
                                            </option>
                                            @forelse ($getAllUser as $client )
                                            <option data-display="Select" value="{{ $client->id }}"  {{ $client->id == $getThirdParty->user_id ? 'selected' : ''  }}>
                                                {{  $client->first_name  }}
                                            </option>
                                            @empty
                                            <p> No records found!</p>
                                            @endforelse



                                        </select>
                                    </div>
                                            <div class="col-xl-6 mb-3">
                                                <label class="form-label">Address<span class="text-danger">*</span></label>
                                                <textarea rows="1" name="third_party_address"    class="form-control">{{$getThirdParty->third_party_address}}</textarea>
                                            </div>
                                            <div class="col-xl-6 mb-3">

                                        <label for="thirdPartDepartment" class="form-label">Department<span
                                                class="text-danger">*</span></label>
                                                   @php
                                            $departments = \App\Models\Department::get();
                                            @endphp
                                            <select class="multi-select" id="department_id" name="department_id" placeholder="Select Third Party">
                                                <option disabled selected>Select Department</option>
                                                @forelse ($departments as $department )
                                                <option data-display="Select" value="{{ $department->id }}" {{ $department->id == $getThirdParty->department_id ? 'selected' : ''  }}>
                                                    {{ $department->dept_name  }}
                                                </option>
                                                @empty
                                                <p> No records found!</p>
                                                @endforelse

                                            </select>



                                            </div>

                                            <div class="col-xl-6 mb-3">
                                                <label for="exampleFormControlInput2" class="form-label">POC<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="third_party_pos"  value="{{$getThirdParty->third_party_pos}}"  class="form-control" id="exampleFormControlInput2" placeholder="">
                                            </div>

                                            <div class="col-xl-6 mb-3">
                                                <label for="exampleFormControlInput2" class="form-label">Location<span
                                                        class="text-danger">*</span></label>
                                                        @php
                                                $zones = \App\Models\Zone::get();
                                                @endphp
                                                <select class="multi-select" id="zone_id" name="zone_id" placeholder="">
                                                    <option disabled selected>Select Location</option>
                                                    @forelse ($zones as $zone )
                                                    <option data-display="Select" value="{{ $zone->id }}" {{ $zone->id == $getThirdParty->zone_id ? 'selected' : ''  }}>
                                                        {{ $zone->zone_name  }}
                                                    </option>
                                                    @empty
                                                    <p> No records found!</p>
                                                    @endforelse

                                                </select>
                                            </div>

                                            <div class="col-xl-6 mb-3">
                                                <label for="exampleFormControlInput2" class="form-label">State<span
                                                        class="text-danger">*</span></label>
                                                        @php
                                                $states = \App\Models\State::get();
                                                @endphp
                                                <select class="multi-select" id="state_id" name="state_id" placeholder="">
                                                    <option disabled selected>Select State</option>
                                                    @forelse ($states as $state )
                                                    <option data-display="Select" value="{{ $state->id }}" {{ $state->id == $getThirdParty->state_id ? 'selected' : ''  }}>
                                                        {{ $state->state_name  }}
                                                    </option>
                                                    @empty
                                                    <p> No records found!</p>
                                                    @endforelse

                                                </select>
                                            </div>

                                            <div class="col-xl-6 mb-3">
                                                <label for="exampleFormControlInput4" class="form-label">Email<span
                                                        class="text-danger">*</span></label>
                                                <input type="email" name="third_party_email"  value="{{$getThirdParty->third_party_email}}"  class="form-control" id="exampleFormControlInput4"
                                                    placeholder="">
                                            </div>

                                            <div class="col-xl-6 mb-3">
                                                <label for="exampleFormControlInput4" class="form-label">Phone Number<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" name="third_party_phone"  value="{{$getThirdParty->third_party_phone}}"  class="form-control" id="exampleFormControlInput4"
                                                    placeholder="">
                                            </div>

                        </div>
                        <div>
                            <button class="btn btn- light ms-1 report-tab-unactive">Cancel</button>
                            <button class="btn btn me-1 report-tab-active " >Submit</button>
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
