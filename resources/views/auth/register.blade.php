<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Register Page</title>
        <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}">        
        <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <style>
            .bg-img{
                background-image: url('{{ asset('admin/images/login/registor.jpg') }}');
                background-repeat: no-repeat;
                background-position: 0%;
                background-size: cover;
                content: "";
                height: 100vh;
            }
            .rowclass{
                align-items: center;
                text-align: center;
            }
            .rowbgimage{
                background-image: url('{{ asset('admin/images/login/image.png') }}');
                background-repeat: no-repeat;
                background-size: cover;
                content: "";
                position: relative;
            }

            .form-control, .form-select{
                border: 1px solid #635d5d85;
            }
            .register-user{
                text-align: center;
            }
            .registertext{
                position: absolute;
                top: 25%;
                font-size: 25px;
                font-weight: 600;
            }
        </style>
    </head>
    <body>
        <section class="bg-img d-flex justify-content-center rowclass">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 col-md-6 col-xl-6 col-12">
                        <form id="registerForm">
                            @csrf
                            <div class="rowbgimage p-3">
                                <img src="{{ asset('admin/images/login/register-logo.png') }}" class="mt-4" width="150px" alt="">
                                <div style="text-align: left; padding: 5%;">
                                    <h4 class="registertext">Register</h4>
                                    <div class="row">
                                        <div class="col-3">
                                            <p>Full Name <span class="text-danger">*</span>:</p>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control p-1" name="name" />
                                            <span class="text-danger is-invalid name_err"></span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <p>Email <span class="text-danger">*</span>:</p>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control p-1" name="email" />
                                            <span class="text-danger is-invalid email_err"></span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <p>Password <span class="text-danger">*</span>:</p>
                                        </div>
                                        <div class="col-9">
                                            <input type="password" class="form-control p-1" name="password" />
                                            <span class="text-danger is-invalid password_err"></span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <p>Mobile No. <span class="text-danger">*</span>:</p>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control p-1" name="mobile" />
                                            <span class="text-danger is-invalid mobile_err"></span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <p>Age <span class="text-danger">*</span>:</p>
                                        </div>
                                        <div class="col-9">
                                            <input type="text" class="form-control p-1" name="age" />
                                            <span class="text-danger is-invalid age_err"></span>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3">
                                            <p>Gender <span class="text-danger">*</span>:</p>
                                        </div>
                                        <div class="col-9">
                                            <select name="gender" class="form-select p-1">
                                                <option value="">Select Gender</option>
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                            </select>
                                            <span class="text-danger is-invalid gender_err"></span>
                                        </div>
                                    </div>
                                    <div class="register-user mt-4">
                                        <button class="btn btn-sm text-center w-50" style="background:#64006e; color:#fff; font-size:15px;" id="registerForm_submit">Sign Up</button>
                                        <div class="mt-2 mb-4">
                                            <p class="mb-0">Already have an account ? <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-underline"> Signin </a> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/js/sweetalert.min.js') }}"></script>

        <script>
            $(document).ready(function(){
                $("#registerForm").submit(function(e) {
                    e.preventDefault();
                    $("#registerForm_submit").prop('disabled', true);
                    var formdata = new FormData(this);
                    $.ajax({
                        url: '{{ route('signup') }}',
                        type: 'POST',
                        data: formdata,
                        contentType: false,
                        processData: false,
                        beforeSend: function()
                        {
                            $('#preloader').css('opacity', '0.5');
                            $('#preloader').css('visibility', 'visible');
                        },
                        success: function(data) {
                            if (!data.error && !data.error2) {
                                swal("Successful!", "Account created succesfully, please login", "success")
                                .then((action) => { 
                                    window.location.href = '{{ route('login') }}';
                                });
                            } else {
                                if (data.error2) {
                                    swal("Error!", data.error2, "error");
                                    $("#registerForm_submit").prop('disabled', false);
                                } else {
                                    $("#registerForm_submit").prop('disabled', false);
                                    resetErrors();
                                    printErrMsg(data.error);
                                }
                            }
                        },
                        statusCode: {
                            422: function(responseObject, textStatus, jqXHR) {
                                $("#addSubmit").prop('disabled', false);
                                resetErrors();
                                printErrMsg(responseObject.responseJSON.errors);
                            },
                            500: function(responseObject, textStatus, errorThrown) {
                                $("#addSubmit").prop('disabled', false);
                                swal("Error occured!", "Something went wrong please try again", "error");
                            }
                        },
                        error: function(error) {
                            $("#registerForm_submit").prop('disabled', false);
                        },
                    });
            
                });

                
            
                function resetErrors() {
                    var form = document.getElementById('registerForm');
                    var data = new FormData(form);
                    for (var [key, value] of data) {
                        $('.' + key + '_err').text('');
                        $('#' + key).removeClass('is-invalid');
                        $('#' + key).addClass('is-valid');
                    }
                }
        
                function printErrMsg(msg) {
                    $.each(msg, function(key, value) {
                        $('.' + key + '_err').text(value);
                        $('#' + key).addClass('is-invalid');
                    });
                }
            });
        </script>
    </body>
</html>