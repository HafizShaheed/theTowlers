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
@endsection @section('content')

<div class="row">
   
    <div class="col-4">
        <div class="">
            <div class="card-header d-flex justify-content-start">
                <div>
                    <a class="btn btn-lg report-tab-active" href="#" role="button" data-bs-toggle="modal"
                        data-bs-target="#Add-team-user-Modal">
                        Add a Team User +</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection @section('modal')

<!--  Add a Client  Modal start -->
<div class="modal fade" id="Add-Client-Modal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add a Client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="card-body justify-content-start">
                    <form>
                        <div class="row">
                            <div class="col-xl-12 col-sm-12 col-12 mt-4 mt-md-0"></div>
                            <div class="col-xl-12 col-sm-12 col-12 mt-4 mt-md-0">
                                <div class="row">
                                    <div class="col-xl-6 mb-3">
                                        <label for="compnayName" class="form-label">Company Name<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="compnayName" name="first_name"
                                             required />
                                    </div>

                                    <div class="col-xl-6 mb-3">
                                        <label for="user_name" class="form-label">Username<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="user_name" name="user_name"
                                             required />
                                    </div>

                                    <div class="col-xl-6 mb-3">
                                        <label for="companyEmail" class="form-label">Company Email<span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="companyEmail" name="email"
                                             required />
                                    </div>
                                    <div class="col-xl-6 mb-3">
                                        <label for="industry" class="form-label">Industry,<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="industry" name="industry"
                                             required />
                                    </div>

                                    <div class="col-xl-6 mb-3">
                                        <label for="poc" class="form-label">POC<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="poc" name="poc"  required />
                                    </div>
                                      @php
                                            $zones = \App\Models\Zone::get();
                                            @endphp
                                     <div class="col-xl-6 mb-3">
                                        <label class="form-label">Location<span class="text-danger">*</span></label>
                                        <select class="default-select style-1 form-control" name="location" id="location" required>
                                            <option data-display="Select" disabled selected>
                                                Select Location
                                            </option>
                                            @forelse ($zones as $zone )
                                            <option data-display="Select" value="{{ $zone->id }}" required>
                                                {{ $zone->zone_name }}
                                            </option>
                                            @empty
                                            <p> No records found!</p>
                                            @endforelse



                                        </select>
                                    </div>

                                         @php
                                            $roles = \App\Models\Role::get();
                                            @endphp
                                     <div class="col-xl-6 mb-3">
                                        <label class="form-label">Roles<span class="text-danger">*</span></label>
                                        <select class="default-select style-1 form-control" name="role_id" id="role_id" required>
                                            <option data-display="Select" disabled selected>
                                                Select Role
                                            </option>
                                            @forelse ($roles as $role )
                                            <option data-display="Select" value="{{ $role->id }}">
                                                {{ $role->role_name }}
                                            </option>
                                            @empty
                                            <p> No records found!</p>
                                            @endforelse



                                        </select>
                                    </div>

                                    <div class="col-xl-6 mb-3">
                                        <label for="password" class="form-label">Password<span
                                                class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="password" name="password"
                                             required />
                                    </div>

                                    <div class="col-xl-6 mb-3">
                                        <label for="password_confirmation" class="form-label">Confirm Password<span
                                                class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation"  required />
                                    </div>

                                    <div class="col-xl-6 mb-3">
                                        <!-- <label class="form-check-label" for="customCheckBox3"> status</label> -->
                                        <label for="clientStatusCheck" class="form-label">Status<span
                                                class="text-danger">*</span></label>
                                        <input type="checkbox" class="form-check-input" id="clientStatusCheck"
                                            name="clientStatusCheck"  />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light report-tab-unactive" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="clinetSubmit" class="btn btn report-tab-active">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>
<!--  Add a Client  Modal end -->

<!--  Add thirdParty  Modal start -->
<div class="modal fade" id="Add-Third-party-Modal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add a Third Party</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
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
                                        <label for="thirdPartyName" class="form-label">Third Party Name<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="thirdPartyName" name="thirdPartyName"
                                             required />
                                    </div>

                                    @php
                                    $users = \App\Models\User::get();
                                    @endphp
                              <div class="col-xl-6 mb-3">
                                <label class="form-label">Client Name<span class="text-danger">*</span></label>
                                <select class="default-select style-1 form-control" name="thhirdPartyclientID" id="thhirdPartyclientID" required>
                                    <option data-display="Select" >
                                        Select Client
                                    </option>
                                    @forelse ($users as $user )
                                    <option data-display="Select" value="{{ $user->id }}">
                                        {{ $user->user_name }}
                                    </option>
                                    @empty
                                    <p> No records found!</p>
                                    @endforelse



                                </select>
                            </div>


                                             @php
                                            $zones = \App\Models\Zone::get();
                                            @endphp
                                      <div class="col-xl-6 mb-3">
                                        <label class="form-label">Location<span class="text-danger">*</span></label>
                                        <select class="default-select style-1 form-control" name="locationthirdPart" id="locationthirdPart" required>
                                            <option data-display="Select">
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


                                    @php
                                    $states = \App\Models\State::get();
                                    @endphp
                              <div class="col-xl-6 mb-3">
                                <label class="form-label">State<span class="text-danger">*</span></label>
                                <select class="default-select style-1 form-control" name="StatethirdPart" id="StatethirdPart" required>
                                    <option data-display="Select">
                                        Select State
                                    </option>
                                    @forelse ($states as $state )
                                    <option data-display="Select" value="{{ $state->id }}">
                                        {{ $state->state_name }}
                                    </option>
                                    @empty
                                    <p> No records found!</p>
                                    @endforelse



                                </select>
                            </div>

                                    <div class="col-xl-6 mb-3">
                                        <label class="form-label">Address<span class="text-danger">*</span></label>
                                        <textarea rows="1" class="form-control" id="thirdPartyAddress" name="thirdPartyAddress" required></textarea>
                                    </div>




                                             @php
                                            $departments = \App\Models\Department::get();
                                            @endphp
                                      <div class="col-xl-6 mb-3">
                                        <label class="form-label">Department<span class="text-danger">*</span></label>
                                        <select class="default-select style-1 form-control" name="thirdPartDepartment" id="thirdPartDepartment" required>
                                            <option data-display="Select">
                                                Select Department
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
                                        <label for="thirdPartPoc" class="form-label">POC<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="thirdPartPoc" name="thirdPartPoc"
                                             required />
                                    </div>

                                    <div class="col-xl-6 mb-3">
                                        <label for="thirdPartEmail" class="form-label">Email<span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="thirdPartEmail" name="thirdPartEmail"
                                             required />
                                    </div>

                                    <div class="col-xl-6 mb-3">
                                        <label for="thirdPartPhone" class="form-label">Phone Number<span
                                                class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="thirdPartPhone" name="thirdPartPhone"
                                             required />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light report-tab-unactive" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" id="addThirdPartySubmit" class="btn btn report-tab-active">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>
<!--  Add thirdParty  Modal end -->

<!--  Add  Add a Team User Modal start -->
<div class="modal fade" id="Add-team-user-Modal">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add a Team User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="card-body justify-content-start">
                    <form>
                        <div class="row">
                            <div class="col-xl-12 col-sm-12 col-12 mt-4 mt-md-0">
                                <!-- <div class=" justify-content-center align-items-center">

                                            <label>Company Logo</label>
                                            <div class="dz-default dlab-message upload-img mb-3">
                                                <form action="#" class="dropzone">
                                                    <svg width="41" height="40" viewBox="0 0 41 40" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M27.1666 26.6667L20.4999 20L13.8333 26.6667" stroke="#DADADA"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M20.5 20V35" stroke="#DADADA" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M34.4833 30.6501C36.1088 29.7638 37.393 28.3615 38.1331 26.6644C38.8731 24.9673 39.027 23.0721 38.5703 21.2779C38.1136 19.4836 37.0724 17.8926 35.6111 16.7558C34.1497 15.619 32.3514 15.0013 30.4999 15.0001H28.3999C27.8955 13.0488 26.9552 11.2373 25.6498 9.70171C24.3445 8.16614 22.708 6.94647 20.8634 6.1344C19.0189 5.32233 17.0142 4.93899 15.0001 5.01319C12.9861 5.0874 11.015 5.61722 9.23523 6.56283C7.45541 7.50844 5.91312 8.84523 4.7243 10.4727C3.53549 12.1002 2.73108 13.9759 2.37157 15.959C2.01205 17.9421 2.10678 19.9809 2.64862 21.9222C3.19047 23.8634 4.16534 25.6565 5.49994 27.1667"
                                                            stroke="#DADADA" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M27.1666 26.6667L20.4999 20L13.8333 26.6667" stroke="#DADADA"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple>

                                                    </div>
                                                </form>
                                            </div>
                                        </div> -->
                            </div>
                            <div class="col-xl-12 col-sm-12 col-12 mt-4 mt-md-0">
                                <div class="row">
                                    <div class="col-xl-6 mb-3">
                                        <label for="exampleFormControlInput2" class="form-label">User Name<span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="user_nameTeam" name="user_nameTeam" class="form-control"
                                             required />
                                    </div>
                                    <div class="col-xl-6 mb-3">
                                        <label for="exampleFormControlInput4" class="form-label">Email<span
                                                class="text-danger">*</span></label>
                                        <input type="email" id="TemMemeberEmail" name="TemMemeberEmail"
                                            class="form-control"  required />
                                    </div>

                                    <div class="col-xl-6 mb-3">
                                        <label for="exampleFormControlInput4" class="form-label">Password<span
                                                class="text-danger">*</span></label>
                                        <input type="password" id="passwordTeam" name="passwordTeam"
                                            class="form-control"  required />
                                    </div>

                                    <div class="col-xl-6 mb-3">
                                        <label for="exampleFormControlInput4" class="form-label">Confirm Password<span
                                                class="text-danger">*</span></label>
                                        <input type="password" id="password_confirmationTeam"
                                            name="password_confirmationTeam" class="form-control"  required />
                                    </div>
                                    <div class="col-xl-6 mb-3">
                                        <!-- <label class="form-check-label" for="customCheckBox3"> status</label> -->
                                        <label for="customCheckBoxteam" class="form-label">Status<span
                                                class="text-danger">*</span></label>
                                        <input type="checkbox" id="TeamMemberStatusCheck" name="TeamMemberStatusCheck"
                                            class="form-check-input"  checked />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light report-tab-unactive" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" id="TemaMemberSubmit" class="btn btn report-tab-active">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>
<!--  Add  Add a Team User Modal end -->
@endsection @section('addScript')

<script>
    $(document).ready(function () {
        $("#clinetSubmit").on("click", function () {
            // Disable the button
            // $(this).prop("disabled", true);
            console.log("dsdfdf");

            var first_name = $("#compnayName").val();
            var user_name = $("#user_name").val();
            var companyEmail = $("#companyEmail").val();
            var industry = $("#industry").val();
            var poc = $("#poc").val();
            var location = $("#location").val();
            var role_id = $("#role_id").val();
            var password = $("#password").val();
            var password_confirmation = $("#password_confirmation").val();
            var clientStatusCheck = $("#clientStatusCheck").prop("checked");

            // Show the loading spinner
            $("#loader").show();

            $.ajax({
                type: "POST",
                url: "{{ route('admin.addClient') }}",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    first_name: first_name,
                    user_name: user_name,
                    email: companyEmail,
                    industry: industry,
                    poc: poc,
                    zone_id: location,
                    role_id: role_id,
                    password: password,
                    password_confirmation: password_confirmation,
                    clientStatusCheck: clientStatusCheck,
                },
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        $("#Add-Client-Modal").modal("hide");
                        // Display SweetAlert success message with auto-close after 3 seconds
                        Swal.fire({
                            title: "Success!",
                            text: response.message,
                            icon: "success",
                            confirmButtonText: "OK",
                            timer: 3000, // 3 seconds
                            timerProgressBar: true,
                            willClose: () => {
                                // Add any additional actions after the SweetAlert is closed
                                $("#Add-Client-Modal input").val("")

                            },
                        });
                    }

                    if (response.errors) {
                        // Display SweetAlert success message with auto-close after 3 seconds
                        Swal.fire({
                            title: "Error!",
                            text: "All Fields are required Or Recheck Feilds",
                            icon: "error",
                            confirmButtonText: "OK",
                            timer: 3000, // 3 seconds
                            timerProgressBar: true,
                            willClose: () => {
                                // Add any additional actions after the SweetAlert is closed
                            },
                        });
                    }
                },
                error: function (xhr, status, error) {

                },
                complete: function () {
                    // Re-enable the button and hide the loading spinner after the request is complete
                    $("#clinetSubmit").prop("disabled", false);
                    $("#loader").hide();
                },
            });
        });

        $("#addThirdPartySubmit").on("click", function () {
            // Disable the button
            $(this).prop("disabled", true);

            var thirdPartyName = $("#thirdPartyName").val();
            var thhirdPartyclientID = $("#thhirdPartyclientID").val();
            console.log(thhirdPartyclientID);
            var thirdPartyAddress = $("#thirdPartyAddress").val();
            var thirdPartDepartment = $("#thirdPartDepartment").val();
            var thirdPartPoc = $("#thirdPartPoc").val();
            var locationthirdPart = $("#locationthirdPart").val();
            var state = $("#StatethirdPart").val();
            var thirdPartEmail = $("#thirdPartEmail").val();
            var thirdPartPhone = $("#thirdPartPhone").val();

            // Show the loading spinner
            $("#loader").show();

            $.ajax({
                type: "POST",
                url: "{{ route('admin.addThirdParty') }}",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    third_party_name: thirdPartyName,
                    user_id: thhirdPartyclientID,
                    third_party_address: thirdPartyAddress,
                    department_id: thirdPartDepartment,
                    third_party_pos: thirdPartPoc,
                    zone_id: locationthirdPart,
                    state_id: state,


                    third_party_email : thirdPartEmail,
                    third_party_phone: thirdPartPhone,
                },
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        $("#Add-Third-party-Modal").modal("hide");
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
                                $("#Add-Third-party-Modal input").val("")

                                $("#addThirdPartySubmit").prop("disabled", false);
                            },
                        });
                    }
                    if (response.errors) {
                        // Display SweetAlert success message with auto-close after 3 seconds
                        Swal.fire({
                            title: "Error!",
                            text: "All Fields are required Or Recheck Feilds",
                            icon: "error",
                            confirmButtonText: "OK",
                            timer: 3000, // 3 seconds
                            timerProgressBar: true,
                            willClose: () => {
                                // Add any additional actions after the SweetAlert is closed
                            },
                        });
                    }
                },
                error: function (xhr, status, error) {
                    // Handle the error response
                },
                complete: function () {
                    // Re-enable the button and hide the loading spinner after the request is complete
                    $("#addThirdPartySubmit").prop("disabled", false);
                    $("#loader").hide();
                },
            });
        });

        $("#TemaMemberSubmit").on("click", function () {
            var user_nameTeam = $("#user_nameTeam").val();
            var TemMemeberEmail = $("#TemMemeberEmail").val();
            var passwordTeam = $("#passwordTeam").val();
            var password_confirmationTeam = $("#password_confirmationTeam").val();
            var TeamMemberStatusCheck = $("#TeamMemberStatusCheck").prop("checked");

            // Show the loading spinner
            $("#loader").show();

            $.ajax({
                type: "POST",
                url: "{{ route('admin.addTeamMember') }}",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    user_name: user_nameTeam,
                    team_email: TemMemeberEmail,
                    password: passwordTeam,
                    password_confirmation: password_confirmationTeam,
                    TeamMemberStatusCheck: TeamMemberStatusCheck,
                },
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        $("#Add-team-user-Modal").modal("hide");
                        // Display SweetAlert success message with auto-close after 3 seconds
                        Swal.fire({
                            title: "Success!",
                            text: response.message,
                            icon: "success",
                            confirmButtonText: "OK",
                            timer: 3000, // 3 seconds
                            timerProgressBar: true,
                            willClose: () => {
                                $("#Add-team-user-Modal input").val("")
                            },
                        });
                    }

                    if (response.errors) {
                        // Display SweetAlert success message with auto-close after 3 seconds
                        Swal.fire({
                            title: "Error!",
                            text: "All Fields are required Or Recheck Feilds",
                            icon: "error",
                            confirmButtonText: "OK",
                            timer: 3000, // 3 seconds
                            timerProgressBar: true,
                            willClose: () => {
                                // Add any additional actions after the SweetAlert is closed
                            },
                        });
                    }
                },
                error: function (xhr, status, error) {
                    // Handle the error response
                },
                complete: function () {
                    // Re-enable the button and hide the loading spinner after the request is complete
                    $("#clinetSubmit").prop("disabled", false);
                    $("#loader").hide();
                },
            });
        });
    });
</script>

@endsection
