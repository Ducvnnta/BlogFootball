<!DOCTYPE html>
<html lang="vn">

<head>
    <title>Profile</title>
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

<body>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="OwlCarousel/dist/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <style>
        body {
            margin: auto;
            font-family: -apple-system, BlinkMacSystemFont, sans-serif;
            overflow: auto;
            background: linear-gradient(315deg, rgba(101, 0, 94, 1) 3%, rgba(60, 132, 206, 1) 38%, rgba(48, 238, 226, 1) 68%, rgba(255, 25, 25, 1) 98%);
            animation: gradient 15s ease infinite;
            background-size: 400% 400%;
            background-attachment: fixed;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 0%;
            }

            50% {
                background-position: 100% 100%;
            }

            100% {
                background-position: 0% 0%;
            }
        }

        .wave {
            background: rgb(255 255 255 / 25%);
            border-radius: 1000% 1000% 0 0;
            position: fixed;
            width: 200%;
            height: 12em;
            animation: wave 10s -3s linear infinite;
            transform: translate3d(0, 0, 0);
            opacity: 0.8;
            bottom: 0;
            left: 0;
            z-index: -1;
        }

        .wave:nth-of-type(2) {
            bottom: -1.25em;
            animation: wave 18s linear reverse infinite;
            opacity: 0.8;
        }

        .wave:nth-of-type(3) {
            bottom: -2.5em;
            animation: wave 20s -1s reverse infinite;
            opacity: 0.9;
        }

        @keyframes wave {
            2% {
                transform: translateX(1);
            }

            25% {
                transform: translateX(-25%);
            }

            50% {
                transform: translateX(-50%);
            }

            75% {
                transform: translateX(-25%);
            }

            100% {
                transform: translateX(1);
            }
        }
    </style>

    </head>

    <body>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="OwlCarousel/dist/owl.carousel.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

        <section class="h-100 gradient-custom-2">
            <div class="container py-5 h-100">
                <div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                    <div class="wave"></div>
                </div>
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-9 col-xl-7">
                        <div class="card">
                            <div class="rounded-top text-white d-flex flex-row"
                                style="background-color: #99b6ee; height:200px;">
                                <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px; height: 215px; ">
                                    @if (!is_null($user->image))
                                        <img alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                                            src="{{ asset($user->image) }}" alt="profile_image"
                                            style="width: 150px; height: 170px; z-index: 1; border: 3px solid #121112;">
                                    @else
                                        <img alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                                            style="width: 150px; height: 170px; z-index: 1; border: 3px solid #121112;">
                                    @endif
                                    {{-- @php
                                        dd(Auth::user()->is_admin);
                                    @endphp --}}
                                    @if (!is_null(Auth::user()->is_admin))
                                        <a href="{{ route('admin.edit.profile') }}">
                                            <button type="button" class="btn btn-outline-dark"
                                                data-mdb-ripple-color="dark" style="z-index: 1;">
                                                Edit profile
                                        </a>
                                    @elseif (is_null(Auth::user()->is_admin))
                                        <a href="{{ route('auth.edit.profile') }}">
                                            <button type="button" class="btn btn-outline-dark"
                                                data-mdb-ripple-color="dark" style="z-index: 1;">
                                                Edit profile
                                        </a>
                                    @endif
                                </div>
                                @if (!is_null(Auth::user()->is_admin))
                                    @php
                                        $role = 'Quản trị viên';
                                    @endphp
                                @else
                                    @php
                                        $role = 'Thành viên';
                                    @endphp
                                @endif
                                <div class="ms-3" style="margin-top: 120px; margin-left:26px">
                                    <h5 style="color: #121112">{{ $user->name }}</h5>
                                    <p style="color: #121112">{{ $role }}</p>
                                </div>
                            </div>
                            <div class="p-4 text-black" style="background-color: #f8f9fa;">
                                <div class="d-flex justify-content-end text-center py-1">

                                    @if(!is_null(Auth::user()->is_admin))
                                    <div>
                                        <p class="mb-1 h5">{{ count($admins) }}</p>
                                        <p class="small text-muted mb-0">Admin</p>
                                    </div>
                                    <div class="px-3">
                                        <p class="mb-1 h5">{{ count($users) }}</p>
                                        <p class="small text-muted mb-0">User</p>
                                    </div>
                                    <div>
                                        <p class="mb-1 h5">{{ count($newAlls) }}</p>
                                        <p class="small text-muted mb-0">Total News</p>
                                    </div>
                                    @elseif(is_null(Auth::user()->is_admin))
                                    <div>
                                        <p class="mb-1 h5">0</p>
                                        <p class="small text-muted mb-0">Images</p>
                                    </div>
                                    <div class="px-3">
                                        <p class="mb-1 h5">0</p>
                                        <p class="small text-muted mb-0">Comments</p>
                                    </div>
                                    <div>
                                        <p class="mb-1 h5">{{ count($totalNewsReads)}}</p>
                                        <p class="small text-muted mb-0">Most View</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body p-4 text-black">
                                <div class="mb-5">
                                    <p class="lead fw-normal mb-1">About You</p>
                                    <div class="p-4" style="background-color: #f8f9fa;">
                                        <p class="font-italic mb-1">{{ $user->created_at }}</p>
                                        <p class="font-italic mb-2">{{ $user->email }}</p>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <p class="lead fw-normal mb-0">Recent photos</p>

                                    @if(!is_null(Auth::user()->is_admin))
                                    <p class="mb-0"><a href="{{ route('admin.dashboard') }}" class="text-muted">Trang chủ</a></p>
                                    @elseif(is_null(Auth::user()->is_admin))
                                    <p class="mb-0"><a href="{{ route('web.home') }}" class="text-muted">Trang chủ</a></p>
                                    @endif
                                </div>
                                <div class="row g-2">
                                    @foreach ($newsLasts as $newsLast)
                                    <div class="col mb-2">
                                        <img src="{{ $newsLast->image_url }}"
                                            alt="image 1" class="w-100 rounded-3">
                                    </div>
                                    @endforeach
{{--
                                    <div class="col mb-2">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(107).webp"
                                            alt="image 1" class="w-100 rounded-3">
                                    </div> --}}
                                </div>
                                <div class="row g-2">
                                    @foreach ($newsReads as $newsRead)
                                    <div class="col">
                                        <img src="{{ $newsRead->image_url }}"
                                            alt="image 1" class="w-100 rounded-3">
                                    </div>
                                    @endforeach
                                    {{-- <div class="col">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(108).webp"
                                            alt="image 1" class="w-100 rounded-3">
                                    </div>
                                    <div class="col">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/Lightbox/Original/img%20(114).webp"
                                            alt="image 1" class="w-100 rounded-3">
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </body>

</html>
