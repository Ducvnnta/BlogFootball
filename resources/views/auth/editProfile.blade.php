<!DOCTYPE html>
<html lang="vn">

<head>
    <title>Edit Profile</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="vi">
    <title>@yield('title')</title>
    <base href="{{ asset('') }}">
    <meta name="description" content="Tổng hợp tin tức bóng đá">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="Owlcarousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="Owlcarousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="app.css" type="text/css">
    <link rel="stylesheet" href="backend/libs/css/style.css">
    <link rel="stylesheet" href="backend/libs/css/custom.css">
    <link rel="stylesheet" href="backend/vendor/bootstrap/css/bootstrap.min.css">
    <link href="backend/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="backend/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="backend/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="backend/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="backend/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="backend/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="backend/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        body {
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            height: 100vh;
            font-family: 'Poppins', sans-serif;

        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .wrapper {
            padding: 30px 50px;
            border: 1px solid #ddd;
            border-radius: 15px;
            margin: 10px auto;
            max-width: 600px;
        }

        h4 {
            letter-spacing: -1px;
            font-weight: 400;
        }

        .img {
            width: 70px;
            height: 70px;
            border-radius: 6px;
            object-fit: cover;
        }

        #img-section p,
        #deactivate p {
            font-size: 12px;
            color: #777;
            margin-bottom: 10px;
            text-align: justify;
        }

        #img-section b,
        #img-section button,
        #deactivate b {
            font-size: 14px;
        }

        label {
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 500;
            color: #777;
            padding-left: 3px;
        }

        .form-control {
            border-radius: 10px;
        }

        input[placeholder] {
            font-weight: 500;
        }

        .form-control:focus {
            box-shadow: none;
            border: 1.5px solid #0779e4;
        }

        select {
            display: block;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 10px;
            height: 40px;
            padding: 5px 10px;
            /* -webkit-appearance: none; */
        }

        select:focus {
            outline: none;
        }

        .button {
            background-color: #fff;
            color: #0779e4;
        }

        .button:hover {
            background-color: #0779e4;
            color: #fff;
        }

        .btn-primary {
            background-color: #0779e4;
        }

        .danger {
            background-color: #fff;
            color: #e20404;
            border: 1px solid #ddd;
        }

        .danger:hover {
            background-color: #e20404;
            color: #fff;
        }

        @media(max-width:576px) {
            .wrapper {
                padding: 25px 20px;
            }

            #deactivate {
                line-height: 18px;
            }
        }
        form i {
            float: right;
            margin-left: 196px;
            margin-top: 5px;
            position: absolute;
            z-index: 2;
}

    </style>
</head>

<body>
    <div class="d-flex flex-column justify-content-center w-100 h-100">
        <div class="wrapper bg-white mt-sm-5">
            <div class="py-3 pb-4 border-bottom d-sm-flex align-items-center pt-3" id="deactivate">
                <div>
                    <h4 class="py-2 pb-3">Profile Settings</h4>
                </div>
                <div class="ml-auto">
                    <a href="javascript:history.back()"> <button
                            class="btn btn-success py-1 pb-2  btn-submit btn-primary mr-3"><i class="fa fa-arrow-left"
                                aria-hidden="true">
                            </i></button></a>
                </div>
            </div>

            <form class="mx-1 mx-md-4" method="POST" action="{{ route('auth.update.profile') }}"
                enctype='multipart/form-data'>
                {{ csrf_field() }}
                <div class="d-flex align-items-start py-3 border-bottom">

                    <img src="{{ asset(Auth::user()->image) }}" class="img" id="blah" alt="">

                    <div class="pl-sm-4 pl-2" id="img-section">
                        <b>Profile Photo</b>
                        <input type='file' name="image" id="imgInp" alt="" />
                    </div>
                </div>
                @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
                <div class="py-2">

                    <div class="row py-2">
                        <div class="col-md-6">
                            <label for="firstname">Name</label>
                            <input type="text" name="name" class="bg-light form-control"
                                value="{{ $user->name }}">

                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        {{-- <div class="col-md-6 pt-md-0 pt-3">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="bg-light form-control" placeholder="{{ $user->name }}">
                </div> --}}
                    </div>
                    <div class="row py-2">
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="bg-light form-control"
                                value="{{ $user->email }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row py-2">

                        <div class="col-md-6 pt-md-0 pt-3">
                            <label for="phone">Phone Number</label>
                            <input type="tel" name="phone" class="bg-light form-control"
                                value="{{ $user->phone }}">
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                    </div>

                        <div class="row py-2">

                            <div class="col-md-6 pt-md-0 pt-3">
                                <label for="phone">Password</label>
                                <div class="row" style="margin-left: 2px">

                                    <input type="password" name="password" class="bg-light form-control" id="password" style="padding-right: 23px"
                                    placeholder="password"  minlength="8" required>
                                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                                </div>
                            </div>
                        {{-- <input type="password" name="confirm_password" class="form-control"
                placeholder="Confirm your password" /> --}}
                        {{-- @if ($errors->has('confirm_password'))
                <span
                    class="text-danger">{{ $errors->first('confirm_password') }}</span>
            @endif --}}
                    </div>
                    {{-- <div class="row py-2">
                <div class="col-md-6">
                    <label for="country">Country</label>
                    <select name="country" id="country" class="bg-light">
                        <option value="india" selected>India</option>
                        <option value="usa">USA</option>
                        <option value="uk">UK</option>
                        <option value="uae">UAE</option>
                    </select>
                </div>
                <div class="col-md-6 pt-md-0 pt-3" id="lang">
                    <label for="language">Language</label>
                    <div class="arrow">
                        <select name="language" id="language" class="bg-light">
                            <option value="english" selected>English</option>
                            <option value="english_us">English (United States)</option>
                            <option value="enguk">English UK</option>
                            <option value="arab">Arabic</option>
                        </select>
                    </div>
                </div>
            </div> --}}

                    <div class="py-3 pb-4 border-bottom">
                        <button class="btn btn-success btn-submit btn-primary mr-3"
                            action="{{ route('auth.edit.profile') }}">Save Changes</button>
                        <button class="btn border button">Cancel</button>
                    </div>
                </div>

                <div class="d-sm-flex align-items-center pt-3" id="deactivate">
                    <div>
                        <b>Deactivate your account</b>
                        <p>Details about your company account and password</p>
                    </div>
                    <div class="ml-auto">
                        <button class="btn danger">Deactivate</button>
                    </div>
                </div>
        </div>
        </form>
    </div>

    <script>
        imgInp.onchange = (evt) => {
            const [file] = imgInp.files;
            if (file) {
                blah.src = URL.createObjectURL(file);
            }
        };


    </script>
    <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
});
    </script>

    <script src="backend/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="backend/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="backend/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    {{-- <script>
      const CK_UPLOAD_IMG = "{{route('admin.editor.upload', ['_token' => csrf_token()])}}";
    </script> --}}
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script src="backend/libs/js/main-js.js"></script>
</body>

</html>
