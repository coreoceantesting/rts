
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}">
        <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            body{
                background-color: #f0f8ff;
                overflow: hidden;
            }

            .bg-img{
                background-image: url('{{ asset('admin/images/bg-login-page.svg') }}');
                background-position: 100%;
                background-repeat: no-repeat;
                background-size: auto 100%;
                content: "";
                height: 100vh;
                display: grid;
                align-items: center;
                text-align: center;
            }
            .right-content-div{
                background: #284db2;
                color: #fff;
                padding: 3% 2%;
                text-align: center;
                margin: 0% 10%;
                font-size: 18px;
                font-weight: 800;
                border-radius: 10px;
            }
            .custompadding{
                padding: 5% 10%;
            }

            .form-control{
                padding: 10px;
                border: 1px solid #2b5de4;
            }

            @media only screen and (max-width: 991px) {
                .bg-img {
                    display: none;
                }
            }
        </style>
    </head>
    <body>
        <section>
            <div class="container-flud">
                <div class="row">
                    <div class="col-lg-6 col-12 bg-img">
                        <div class="margin-auto">
                            <img src="{{ asset('admin/images/logo.png') }}" style="width: 250px;">
                            <div class="-intro-x text-white fw-medium fs-4xl lh-base mt-10 " style="margin-left:0%;">
                                <span style="font-size: 40px;font-weight: 600;">पनवेल महानगरपालिका</span>  
                                <br/>
                                <h4>Budget Control Register</h4>
                            </div>
                                
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="text-center">
                            <img src="{{ asset('admin/images/logo.png') }}" style="width: 250px;">  
                            <div class="right-content-div">Budget Control Register</div>
                        </div>
                        <div class="container custompadding">
                            <form id="loginForm">
                                @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username (वापरकर्तानाव)</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                                    <span class="text-danger is-invalid username_err"></span>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="password-input">Password (पासवर्ड)</label>
                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                        <input type="password" class="form-control pe-5 password-input" placeholder="Enter password" id="password" name="password" >
                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                    </div>
                                    <span class="text-danger is-invalid password_err"></span>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="remember_me" name="remember_me">
                                    <label class="form-check-label" for="remember_me">Remember me</label>
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-primary w-100" type="submit" id="loginForm_submit">Sign In</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="{{ asset('admin/js/jquery.min.js') }}" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('admin/js/sweetalert.min.js') }}" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            $("#loginForm").submit(function(e) {
                e.preventDefault();
                $("#loginForm_submit").prop('disabled', true);
                var formdata = new FormData(this);
                $.ajax({
                    url: '{{ route('signin') }}',
                    type: 'POST',
                    data: formdata,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (!data.error && !data.error2) {
                                window.location.href = '{{ route('dashboard') }}';
                        } else {
                            if (data.error2) {
                                swal("Error!", data.error2, "error");
                                $("#loginForm_submit").prop('disabled', false);
                            } else {
                                $("#loginForm_submit").prop('disabled', false);
                                resetErrors();
                                printErrMsg(data.error);
                            }
                        }
                    },
                    error: function(error) {
                        $("#loginForm_submit").prop('disabled', false);
                        swal("Error occured!", "Something went wrong please try again", "error");
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
                });

                function resetErrors() {
                    var form = document.getElementById('loginForm');
                    var data = new FormData(form);
                    for (var [key, value] of data) {
                        console.log(key, value)
                        $('.' + key + '_err').text('');
                        $('#' + key).removeClass('is-invalid');
                        $('#' + key).addClass('is-valid');
                    }
                }

                function printErrMsg(msg) {
                    $.each(msg, function(key, value) {
                        console.log(key);
                        $('.' + key + '_err').text(value);
                        $('#' + key).addClass('is-invalid');
                    });
                }

            });
        </script>
    </body>
</html>