<!doctype html>
<html lang="vn">

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="vi">
    <title>@yield('title')</title>
    <base href="{{ asset('') }}">
    <meta name="description" content="Tổng hợp tin tức bóng đá">
    <link rel="stylesheet" href="backend/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="backend/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="backend/libs/css/auth.css">
    <link rel="stylesheet" href="backend/libs/css/style.css">
    <link rel="stylesheet" href="backend/libs/css/custom.css">
    <link rel="stylesheet" href="backend/libs/css/app.css">
    <link rel="stylesheet" href="app.css" type="text/css">

    <link rel="stylesheet" href="backend/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="backend/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="backend/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="backend/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="backend/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <link rel="stylesheet" href="backend/vendor/fonts/fontawesome/css/fontawesome-all.css">

</head>

<body>
    <style>
            #togglePassword {
                margin-top: 6px;
    /* color: black; */
    height: 22px;
    /* background-color: #cacadd; */
    float: right;
    width: 21px;
    margin-left: 257px;
    position: absolute;
    z-index: 2;
}
#togglePassword2 {
                margin-top: 6px;
    /* color: black; */
    height: 22px;
    /* background-color: #cacadd; */
    float: right;
    width: 21px;
    margin-left: 257px;
    position: absolute;
    z-index: 2;
}
    </style>
    @yield('content')
    {{-- @include('admin.includes.messages'); --}}

    <!-- ============================================================== -->
    <!-- Optional JavaScript -->

    <script src="OwlCarousel/dist/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="backend/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>

            const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    const confirmpassword = document.querySelector('#confirmpassword');

    togglePassword.addEventListener('click', function (e) {
        // toggle the type attribute
        
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
    // toggle the eye / eye slash icon
    this.classList.toggle('bi-eye');
});


    </script>
        <script>
            const togglePassword = document.querySelector('#togglePassword2');
            togglePassword.addEventListener('click', function (e) {
                // toggle the type attribute
                const type = password.getAttribute('type') === 'confirm_password' ? 'text' : 'confirm_password';
                password.setAttribute('type', type);
            // toggle the eye / eye slash icon
            this.classList.toggle('bi-eye');
        });
    </script>
</body>

</html>
