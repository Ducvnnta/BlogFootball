@extends('admin.layout')


<!--Section: Newsfeed-->
@section('admin_content')
    <div class="container-fluid dashboard-content ">
        <!-- ============================================================== -->
        <!-- pageheader  -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Tin tức</h2>
                    <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris
                        facilisis faucibus at enim quis massa lobortis rutrum.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.news') }}"
                                        class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tin tức </li>
                                <li class="breadcrumb-item active" aria-current="page">Chi tiết tin tức : : {{$new->title}} </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.includes.messages');
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->
        <div class="card container" style="max-width: 42rem;">
            <div class="card-body">
                <!-- Data -->
                <div class="d-flex mb-3">
                    <a href="">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/18.webp" class="border rounded-circle me-2"
                            alt="Avatar" style="height: 40px" />
                    </a>
                    <div>
                        <a href="" class="text-dark mb-0" style="margin-left: 10px">
                            <strong>{{ $new->title }}</strong>
                        </a>
                        <a href="" class="text-muted d-block" style="margin-top: 5; margin-left:10px">
                            <small>{{ $new->updated_at }}</small>
                        </a>
                    </div>
                </div>
                <!-- Description -->
                <div>
                    <p>
                        {{ $new->description }}
                    </p>
                </div>
            </div>
            <!-- Media -->
            <div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light">
                <img src="{{ asset($new->image_url) }}" class="w-100" />
                <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                </a>
            </div>
            <!-- Media -->
            <!-- Interactions -->
            <div class="card-body">
                <!-- Reactions -->
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <a href="">
                            <i class="fas fa-thumbs-up text-primary"></i>
                            <i class="fas fa-heart text-danger"></i>
                            <span>124</span>
                        </a>
                    </div>
                    <div>
                        <a href="" class="text-muted"> {{ $comment }} comments </a>
                    </div>
                </div>
                <!-- Reactions -->

                <!-- Buttons -->
                <div class="d-flex justify-content-between text-center border-top border-bottom mb-4">
                    <button type="button" class="btn btn-link btn-lg" data-mdb-ripple-color="dark">
                        <i class="fas fa-thumbs-up me-2"></i>Like
                    </button>
                    <button type="button" class="btn btn-link btn-lg" data-mdb-ripple-color="dark">
                        <i class="fas fa-comment-alt me-2"></i>Comment
                    </button>
                    <button type="button" class="btn btn-link btn-lg" data-mdb-ripple-color="dark">
                        <i class="fas fa-share me-2"></i>Share
                    </button>
                </div>
                <!-- Buttons -->

                <!-- Comments -->

                <!-- Input -->
                <div class="d-flex mb-3">
                    {{-- <a href="">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/18.webp" class="border rounded-circle me-2"
                            alt="Avatar" style="height: 40px" />
                    </a> --}}
                    <div class="form-outline w-100">
                        <textarea class="form-control" id="textAreaExample" rows="2"></textarea>
                        <label class="form-label" for="textAreaExample">Write a comment</label>
                    </div>
                </div>
                <!-- Input -->

                <!-- Answers -->

                <!-- Single answer -->
                <div class="d-flex mb-3">
                    <a href="">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="border rounded-circle me-2"
                            alt="Avatar" style="height: 40px" />
                    </a>
                    <div>
                        <div class="bg-light rounded-3 px-3 py-1">
                            <a href="" class="text-dark mb-0">
                                <strong>Malcolm Dosh</strong>
                            </a>
                            <a href="" class="text-muted d-block">
                                <small>Lorem ipsum dolor sit amet consectetur,
                                    adipisicing elit. Natus, aspernatur!</small>
                            </a>
                        </div>
                        <a href="" class="text-muted small ms-3 me-2"><strong>Like</strong></a>
                        <a href="" class="text-muted small me-2"><strong>Reply</strong></a>
                    </div>
                </div>

                <!-- Single answer -->
                <div class="d-flex mb-3">
                    <a href="">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/5.webp" class="border rounded-circle me-2"
                            alt="Avatar" style="height: 40px" />
                    </a>
                    <div>
                        <div class="bg-light rounded-3 px-3 py-1">
                            <a href="" class="text-dark mb-0">
                                <strong>Rhia Wallis</strong>
                            </a>
                            <a href="" class="text-muted d-block">
                                <small>Et tempora ad natus autem enim a distinctio
                                    quaerat asperiores necessitatibus commodi dolorum
                                    nam perferendis labore delectus, aliquid placeat
                                    quia nisi magnam.</small>
                            </a>
                        </div>
                        <a href="" class="text-muted small ms-3 me-2"><strong>Like</strong></a>
                        <a href="" class="text-muted small me-2"><strong>Reply</strong></a>
                    </div>
                </div>

                <!-- Single answer -->
                <div class="d-flex mb-3">
                    <a href="">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/6.webp" class="border rounded-circle me-2"
                            alt="Avatar" style="height: 40px" />
                    </a>
                    <div>
                        <div class="bg-light rounded-3 px-3 py-1">
                            <a href="" class="text-dark mb-0">
                                <strong>Marcie Mcgee</strong>
                            </a>
                            <a href="" class="text-muted d-block">
                                <small>
                                    Officia asperiores autem sit rerum architecto a
                                    deserunt doloribus obcaecati, velit ab at, ad
                                    delectus sapiente! Voluptatibus quaerat suscipit
                                    in nostrum necessitatibus illum nemo quo beatae
                                    obcaecati quidem optio fugit ipsam distinctio,
                                    illo repellendus porro sequi alias perferendis ea
                                    soluta maiores nisi eligendi? Mollitia debitis
                                    quam ex, voluptates cupiditate magnam
                                    fugiat.</small>
                            </a>
                        </div>
                        <a href="" class="text-muted small ms-3 me-2"><strong>Like</strong></a>
                        <a href="" class="text-muted small me-2"><strong>Reply</strong></a>
                    </div>
                </div>

                <!-- Single answer -->
                <div class="d-flex mb-3">
                    <a href="">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/10.webp" class="border rounded-circle me-2"
                            alt="Avatar" style="height: 40px" />
                    </a>
                    <div>
                        <div class="bg-light rounded-3 px-3 py-1">
                            <a href="" class="text-dark mb-0">
                                <strong>Hollie James</strong>
                            </a>
                            <a href="" class="text-muted d-block">
                                <small>Voluptatibus quaerat suscipit in nostrum
                                    necessitatibus</small>
                            </a>
                        </div>
                        <a href="" class="text-muted small ms-3 me-2"><strong>Like</strong></a>
                        <a href="" class="text-muted small me-2"><strong>Reply</strong></a>
                    </div>
                </div>

                <!-- Answers -->

                <!-- Comments -->
            </div>
            <!-- Interactions -->
        </div>
        <!-- ============================================================== -->
    </div>
@endsection
