@extends('admin.includes.master')



@section('addStyle')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
<style>
    .file-upload {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        height: 200px;
        border: 2px dashed #ccc;
        border-radius: 5px;
        cursor: pointer;
    }

    .file-input {
        display: none;
    }

    .file-label {
        font-size: 1rem;
        font-weight: 600;
    }

    .file-label i {
        margin-bottom: 8px;
        font-size: 2rem;
    }

    .file-input:hover+.file-label,
    .file-input:active+.file-label {
        background-color: #f5f5f5;
    }
</style>

@endsection
@section('content')




<!-- Firm Background form start -->

<div class="row" id="Firm-Background"  class="Firm-Background-class-form-submit"  >
    <div class="card">
        <div class="card-body justify-content-start">
            <form id="firm-step-form" enctype="multipart/form-data">




                    <h4 class="card-title">ADD FORM <br>
                        <span style="color:darkgray; font-size:12px;">Report Name</span>
                    </h4>
                    <div class="row">
                        <!-- =========== Director1 ============ -->
                        @for ($i=1; $i <= 8; $i++)
                        <div class="col-sm-3 mb-3">
                            <label for="" class="form-label">Field 1</label>
                            <input type="text" class="form-control" id="" name="" value="">
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="" class="form-label"> Name</label>
                            <input type="text" class="form-control" id="" name="" value="">
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="" class="form-label">date</label>
                            <input type="text" class="form-control" id="" name="" value="">
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="" class="form-label">Description</label>
                            <input type="text" class="form-control" id="" name="" value="">
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="" class="form-label">
                            Adderss</label>
                            <input type="date" class="form-control" id="" name="" value="">
                        </div>
                        <div class="col-sm-3 mb-3">
                            <label for="" class="form-label">REFERNCE</label>
                            <input type="text" class="form-control" id="" name="" value="">
                        </div>
                        <div class="col-xl-12 mb-3">
                            <label for="" class="form-label">Particular of transport 
                            </label>
                            <input type="text" class="form-control" id="" name="" value="">
                        </div>

                        @endfor


                        <!-- =========== Director1 ============ -->

                        <!-- =========== Director2 ============ -->







                        <!-- =========== Director3 ============ -->
                        <div class="row">
                            <div class="col-xl-6 d-flex justify-content-start">

                                <button type="button" class="btn btn report-tab-unactive" id="firm-prev-4">Cancel</button>
                            </div>
                            <div class="col-xl-6 d-flex justify-content-end">

                                <button type="submit" class="btn btn report-tab-active" id="firm-submit">Submit</button>
                            </div>
                        </div>
                    </div>

                <!-- firm background 4 step end ========================-->


            </form>
        </div>
    </div>
</div>
<!-- Firm Background form end -->













@endsection

@section('addScript')

<script>
    $(document).ready(function() {
        // firm background
        $('#firm-step-form').on('submit', function (e) {
            e.preventDefault();

            console.log('Form submitted');

            var formData = new FormData(this);


            $('#firm-submit').prop('disabled', true);

            $.ajax({
                type: "POST",
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
                        text: response.message,
                        icon: "success",
                        confirmButtonText: "OK",
                        timer: 3000, // 3 seconds
                        timerProgressBar: true,
                        willClose: () => {
                            $("#firm-submit").prop("disabled", false);
                            $('#Firm-Background').hide();

                            $("#Tab-Documents").show();

                            $('#click-Documents').addClass('report-tab-active').removeClass('report-tab-unactive');
                            $('#click-Firm-Background').addClass('report-tab-unactive').removeClass('report-tab-active');

                        },
                    });
                },
                error: function (error) {
                    console.log(error);

                    $('#firm-submit').prop('disabled', false);
                }
            });
        });



    });
</script>



@endsection
