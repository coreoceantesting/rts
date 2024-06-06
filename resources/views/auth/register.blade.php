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

            .form-control{
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
                        <div class="rowbgimage p-3">
                            <img src="{{ asset('admin/images/login/register-logo.png') }}" class="mt-4" width="150px" alt="">
                            <div style="text-align: left; padding: 5%;">
                                <h4 class="registertext">Register</h4>
                                <div class="row">
                                    <div class="col-3">
                                        <p>Full Name :</p>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control p-1" name="" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <p>Email :</p>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control p-1" name="" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <p>Password :</p>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control p-1" name="" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <p>Mobile No. :</p>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control p-1" name="" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <p>Age :</p>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control p-1" name="" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-3">
                                        <p>Gender :</p>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control p-1" name="" />
                                    </div>
                                </div>
                                <div class="register-user mt-4">
                                    <button class="btn btn-sm text-center w-50" style="background:#64006e; color:#fff; font-size:15px;">Sign Up</button>
                                    <div class="mt-2 mb-4">
                                        <p class="mb-0">Already have an account ? <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-underline"> Signin </a> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <img src="{{ asset('admin/images/login/image.png') }}" width="100%" alt=""> --}}
                        {{-- <div class="card">
                            <div class="card-header text-center bg-white">
                                <img src="{{ asset('admin/images/login/register-logo.png') }}" style="width: 150px" alt="">
                            </div>
                            <div class="card-body">
                                <h3 class="card-title">Register</h3>
                                <div class="row">
                                    <div class="col-3">
                                        <p>Full Name :</p>
                                    </div>
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-xl-2 col-12">
                                        <p>Full Name :</p>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-xl-10 col-12">
                                        <input type="text" class="form-control" name="" />
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>

        <script src="{{ asset('admin/js/jquery.min.js') }}" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('admin/js/sweetalert.min.js') }}" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
</html>