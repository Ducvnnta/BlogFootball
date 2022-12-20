<!DOCTYPE html>
<html>

<head>
    <title>Đăng ký</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="vi">
    <title>@yield('title')</title>
    <base href="{{ asset('') }}">
    <meta name="description" content="Tổng hợp tin tức bóng đá">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="Owlcarousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="Owlcarousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="app.css" type="text/css">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .wrapper {
            height: 100%;
            width: 100%;
            background: linear-gradient(180deg, #04fafd, 5%, #119dff, 50%, #030423);
            position: absolute;
        }

        .wrapper h1 {
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            position: absolute;
            font-family: sans-serif;
            letter-spacing: 1px;
            word-spacing: 2px;
            color: #fff;
            font-size: 40px;
            font-weight: 888;
            text-transform: uppercase;
        }

        .wrapper div {
            height: 60px;
            width: 60px;
            border: 2px solid rgba(255, 255, 255, 0.7);
            border-radius: 50px;
            position: absolute;
            top: 10%;
            left: 10%;
            animation: 4s linear infinite;
        }

        div .dot {
            height: 10px;
            width: 10px;
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.5);
            position: absolute;
            top: 20%;
            right: 20%;
        }

        .wrapper div:nth-child(1) {
            top: 20%;
            left: 20%;
            animation: animate 8s linear infinite;
        }

        .wrapper div:nth-child(2) {
            top: 60%;
            left: 80%;
            animation: animate 10s linear infinite;
        }

        .wrapper div:nth-child(3) {
            top: 40%;
            left: 40%;
            animation: animate 3s linear infinite;
        }

        .wrapper div:nth-child(4) {
            top: 66%;
            left: 30%;
            animation: animate 7s linear infinite;
        }

        .wrapper div:nth-child(5) {
            top: 90%;
            left: 10%;
            animation: animate 9s linear infinite;
        }

        .wrapper div:nth-child(6) {
            top: 30%;
            left: 60%;
            animation: animate 5s linear infinite;
        }

        .wrapper div:nth-child(7) {
            top: 70%;
            left: 20%;
            animation: animate 8s linear infinite;
        }

        .wrapper div:nth-child(8) {
            top: 75%;
            left: 60%;
            animation: animate 10s linear infinite;
        }

        .wrapper div:nth-child(9) {
            top: 50%;
            left: 50%;
            animation: animate 6s linear infinite;
        }

        .wrapper div:nth-child(10) {
            top: 45%;
            left: 20%;
            animation: animate 10s linear infinite;
        }

        .wrapper div:nth-child(11) {
            top: 10%;
            left: 90%;
            animation: animate 9s linear infinite;
        }

        .wrapper div:nth-child(12) {
            top: 20%;
            left: 70%;
            animation: animate 7s linear infinite;
        }

        .wrapper div:nth-child(13) {
            top: 20%;
            left: 20%;
            animation: animate 8s linear infinite;
        }

        .wrapper div:nth-child(14) {
            top: 60%;
            left: 5%;
            animation: animate 6s linear infinite;
        }

        .wrapper div:nth-child(15) {
            top: 90%;
            left: 80%;
            animation: animate 9s linear infinite;
        }

        @keyframes animate {
            0% {
                transform: scale(0) translateY(0) rotate(70deg);
            }

            100% {
                transform: scale(1.3) translateY(-100px) rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="OwlCarousel/dist/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


    <section class="vh-100">
        <div class="wrapper">
            <div><span class="dot"></span></div>
            <div><span class="dot"></span></div>
            <div><span class="dot"></span></div>
            <div><span class="dot"></span></div>
            <div><span class="dot"></span></div>
            <div><span class="dot"></span></div>
            <div><span class="dot"></span></div>
            <div><span class="dot"></span></div>
            <div><span class="dot"></span></div>
            <div><span class="dot"></span></div>
            <div><span class="dot"></span></div>
            <div><span class="dot"></span></div>
            <div><span class="dot"></span></div>
            <div><span class="dot"></span></div>
            <div><span class="dot"></span></div>
            <div><span class="dot"></span></div>
            <div><span class="dot"></span></div>
            <div><span class="dot"></span></div>
        </div>
        <div class="container h-100">

            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 55px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    {{-- <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <a class="btn btn-sm btn-success" method="GET" href="{{ route('web.home') }}">Home</a>
                        </div> --}}
                                    <div class="card-header text-center">
                                        <a href="{{ route('web.home') }}"><img class="logo-img mb-2"
                                                src="backend/images/logo_1.png" alt="logo" height="50"></a>
                                    </div>
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Your Information</p>

                                    <form class="mx-1 mx-md-4" method="POST" action="{{ route('user.registration') }}">
                                        {{ csrf_field() }}

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw" style="margin-right: 10px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Your Name" />
                                                @if ($errors->has('name'))
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fa fa-phone fa-lg me-3 fa-fw" style="margin-right: 10px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" name="phone" class="form-control"
                                                    placeholder="Your Phone" />
                                                @if ($errors->has('phone'))
                                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw" style="margin-right: 10px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="Your Email" />
                                                @if ($errors->has('email'))
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw" style="margin-right: 10px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="Password" />
                                                @if ($errors->has('password'))
                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw" style="margin-right: 10px;"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" name="confirm_password" class="form-control"
                                                    placeholder="Confirm your password" />
                                                @if ($errors->has('confirm_password'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-check d-flex justify-content-center mb-5">
                                            <input class="me-2" type="checkbox" value="" id="form2Example3c"
                                                style="margin-right: 5px;" />
                                            <label class="form-check-label" for="form2Example3">
                                                I agree all statements in <a href="#!">Terms of service</a>
                                            </label>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button class="btn btn-success btn-submit"
                                                action="{{ route('admin.login') }}">Register</button>
                                        </div>
                                    </form>
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <a class="btn btn-sm btn-success" method="GET"
                                            href="{{ route('auth.login') }}">Login</a>
                                    </div>


                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                        class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
