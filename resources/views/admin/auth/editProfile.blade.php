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

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    font-family: 'Poppins', sans-serif;
    background-color: aliceblue;
}

.wrapper{
    padding: 30px 50px;
    border: 1px solid #ddd;
    border-radius: 15px;
    margin: 10px auto;
    max-width: 600px;
}
h4{
    letter-spacing: -1px;
    font-weight: 400;
}
.img{
    width: 70px;
    height: 70px;
    border-radius: 6px;
    object-fit: cover;
}
#img-section p,#deactivate p{
    font-size: 12px;
    color: #777;
    margin-bottom: 10px;
    text-align: justify;
}
#img-section b,#img-section button,#deactivate b{
    font-size: 14px;
}

label{
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 500;
    color: #777;
    padding-left: 3px;
}

.form-control{
    border-radius: 10px;
}

input[placeholder]{
    font-weight: 500;
}
.form-control:focus{
    box-shadow: none;
    border: 1.5px solid #0779e4;
}
select{
    display: block;
    width: 100%;
    border: 1px solid #ddd;
    border-radius: 10px;
    height: 40px;
    padding: 5px 10px;
    /* -webkit-appearance: none; */
}

select:focus{
    outline: none;
}
.button{
    background-color: #fff;
    color: #0779e4;
}
.button:hover{
    background-color: #0779e4;
    color: #fff;
}
.btn-primary{
    background-color: #0779e4;
}
.danger{
    background-color: #fff;
    color: #e20404;
    border: 1px solid #ddd;
}
.danger:hover{
    background-color: #e20404;
    color: #fff;
}
@media(max-width:576px){
    .wrapper{
        padding: 25px 20px;
    }
    #deactivate{
        line-height: 18px;
    }
}


    </style>
</head>

<body>
    {{-- backend/images/logo_1.png --}}

    <div class="wrapper bg-white mt-sm-5">
        <h4 class="pb-4 border-bottom">Account settings</h4>
        <div class="d-flex align-items-start py-3 border-bottom">

            @if(is_null(Auth::user()->image) === false)
            <img src="{{ asset('/storage/images/' . Auth::user()->image) }}" class="img" alt="">
            @endif

            <img src="backend/images/logo_1.png"
                class="img" id="blah" alt="">
            <div class="pl-sm-4 pl-2" id="img-section">
                <b>Profile Photo</b>
                <form runat="server">
                    <input accept="image/*" type='file' id="imgInp" />
                  </form>

            </div>
        </div>
        <div class="py-2">

            <div class="row py-2">
                <div class="col-md-6">
                    <label for="firstname">Name</label>
                    <input type="text" class="bg-light form-control" placeholder="{{ $user->name }}">
                </div>
                {{-- <div class="col-md-6 pt-md-0 pt-3">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="bg-light form-control" placeholder="{{ $user->name }}">
                </div> --}}
            </div>
            <div class="row py-2">
                <div class="col-md-6">
                    <label for="email">Email Address</label>
                    <input type="text" class="bg-light form-control" placeholder="{{  $user->email }}">
                </div>
                <div class="col-md-6 pt-md-0 pt-3">
                    <label for="phone">Phone Number</label>
                    <input type="tel" class="bg-light form-control" placeholder="{{  $user->phone }}">
                </div>
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
                <a  href="{{ route('auth.update.profile') }}">
                    <button class="btn btn-primary mr-3">Save Changes</button></a>
                <button class="btn border button">Cancel</button>
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
    </div>
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
