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
</head>
<body style="background: rgba(57, 145, 172, 0.067);">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="OwlCarousel/dist/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    {{-- <div class="container">

        <h1>Register Form</h1>

        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif


        <form method="POST" action="{{ route('user.registration') }}">

            {{ csrf_field() }}

            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" placeholder="Name">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control" placeholder="Email">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group">
                <button class="btn btn-success btn-submit" action="{{route('admin.login')}}">Submit</button>
            </div>
        </form>
        <div>
            <a class="btn btn-sm btn-success" href="{{route('admin.login')}}">Login</a>
        </div>
    </div> --}}
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
              <div class="card text-black" style="border-radius: 55px;">
                <div class="card-body p-md-5">
                  <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                      <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                      <form class="mx-1 mx-md-4" method="POST" action="{{ route('user.registration') }}">
                        {{ csrf_field() }}

                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-user fa-lg me-3 fa-fw" style="margin-right: 10px;"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="text" name="name" class="form-control"  placeholder="Your Name"/>
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                          </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                            <i class="fa fa-phone fa-lg me-3 fa-fw" style="margin-right: 10px;"></i>
                            <div class="form-outline flex-fill mb-0">
                              <input type="text" name="phone" class="form-control"  placeholder="Your Phone"/>
                              @if ($errors->has('phone'))
                              <span class="text-danger">{{ $errors->first('phone') }}</span>
                              @endif
                            </div>
                          </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-envelope fa-lg me-3 fa-fw" style="margin-right: 10px;"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="email" name="email" class="form-control" placeholder="Your Email"/>
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                          </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-lock fa-lg me-3 fa-fw" style="margin-right: 10px;"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="password" name="password"  class="form-control" placeholder="Password"/>
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                          </div>
                        </div>

                        <div class="d-flex flex-row align-items-center mb-4">
                          <i class="fas fa-key fa-lg me-3 fa-fw" style="margin-right: 10px;"></i>
                          <div class="form-outline flex-fill mb-0">
                            <input type="password" name="confirm_password"  class="form-control" placeholder="Confirm your password"/>
                            @if ($errors->has('confirm_password'))
                            <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                            @endif
                          </div>
                        </div>

                        <div class="form-check d-flex justify-content-center mb-5">
                          <input class="me-2" type="checkbox" value="" id="form2Example3c" style="margin-right: 5px;"/>
                          <label class="form-check-label" for="form2Example3">
                            I agree all statements in <a href="#!">Terms of service</a>
                          </label>
                        </div>

                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                          <button class="btn btn-success btn-submit" action="{{ route('admin.login') }}">Register</button>
                        </div>
                    </form>
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <a class="btn btn-sm btn-success" method="GET" href="{{ route('auth.login') }}">Login</a>
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
