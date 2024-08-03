@extends('company.includes.master')
@section('addStyle')
<style>

</style>
@endsection
@section('content')


<div class="row">

    <div class="card">
        <div class="card-body justify-content-start">
            <form id="client_password_setting">


                <div class="row">

                    <div class=" col-xl-12 col-sm-12 col-12 mt-4 mt-md-0">

                        <div class="row">
                            <div class="col-xl-6 mb-3">
                                <label for="exampleFormControlInput2" class="form-label">Old Password<span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="old_password" name="old_password"
                                    required>
                            </div>



                            <div class="col-xl-6 mb-3">
                                <label for="exampleFormControlInput4" class="form-label">Password<span
                                        class="text-danger">*</span></label>
                                <input type="password" id="password" name="password" class="form-control"
                                     required>
                            </div>

                            <div class="col-xl-6 mb-3">
                                <label for="exampleFormControlInput4" class="form-label">Confirm Password<span
                                        class="text-danger">*</span></label>
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                                     required>
                            </div>

                        </div>
                        <div>
                            <a href="{{route('company.dashboard')}}" class="btn btn- light ms-1 report-tab-unactive">Cancel</a>
                            <button type="submit" id="submit-client_password_setting" class="btn btn me-1 report-tab-active ">Save</button>
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
$(document).ready(function(){
    $('#client_password_setting').on('submit', function (e) {
            e.preventDefault();


            var formData = new FormData(this);


            $('#submit-client_password_setting').prop('disabled', true);

            $.ajax({
                type: "POST",
                url: "{{ route('company.profileSettingSubmit') }}",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: formData,
                dataType: "json",
                processData: false, // important for FormData
                contentType: false, // important for FormData
                success: function (response) {
                    console.log(response);

                    Swal.fire({
                        title: "Success!",
                        text: response.successccess,
                        icon: "success",
                        confirmButtonText: "OK",
                        timer: 3000, // 3 seconds
                        timerProgressBar: true,
                        willClose: () => {
                            $("#submit-client_password_setting").prop("disabled", false);
                            $("#client_password_setting")[0].reset();

                        },
                    });
                },
                error: function (error) {
                    
                    
                    Swal.fire({
                        title: "Error!",
                        text: error.responseJSON.error,
                        icon: "error",
                        confirmButtonText: "OK",
                        timer: 3000, // 3 seconds
                        timerProgressBar: true,
                        willClose: () => {
                            $("#submit-client_password_setting").prop("disabled", false);

                        },
                    });                }
            });
        });


})
</script>
@endsection
