@extends('web.welcome')
@section('title', 'Chi tiết')
@section('content')
    <div class="container container-detail" style="background-color: none">
        <div class="row row-header">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb" type="none" style="background-color: #fff">
                        <li class="headerdetail-item1">
                            <a href="/">
                                <i class="fas fa-home" href="/"></i>
                            </a>
                        </li>
                        <li class="headerdetail-item2">></li>
                        <li class="headerdetail-item2">{{ $news->category->name }}</li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row container container-body-detail">
            <div class="col-8 box-detailnews">
                <div class="post-detainews">
                    <h1 class="detail-news-tittle">{{ $news->title }}</h1>
                    <p class="detail-new-create-at>">Ngày đăng :{{ $news->created_at }}</p>
                    <div class="detail-news-img"><img class="img-detail" src="{{ $news->image_url }}" />
                    </div>
                    {{-- @php
                    dd(Auth::user());

                @endphp --}}
                <h5 class="detail-new-detail" style="margin-top: 30px">{!! $news->detail !!}</h5>

                    <div class="d-flex justify-content-between mb-3" style="margin-top: 30px">
                        <div style="margin-left: 50px">
                            <a href="">
                                <i class="fas fa-thumbs-up text-primary"></i>
                                <i class="fas fa-heart text-danger"></i>
                                <span>124</span>
                            </a>
                        </div>
                        <div class="text-muted">
                            <a style="margin-right: 10px"> {{ $view }} Lượt xem </a>
                            <a> {{ $comment }} comments </a>

                        </div>
                    </div>
                    <div class="d-flex mb-3" style="margin-top: 20px">
                        <a>

                            @if (Auth::check() && !is_null(Auth::user()->image))
                                <img src="{{ asset(Auth::user()->image) }}" class="border rounded-circle me-2"
                                    style="height: 40px" />
                            @elseif(Auth::check() && is_null(Auth::user()->image))
                                <img src="backend/images/admin.png" class="border rounded-circle me-2 " alt="Avatar"
                                    style="height: 40px" />
                            @else
                                <img src="backend/images/admin.png" class="border rounded-circle me-2 " alt="Avatar"
                                    style="height: 40px" />
                            @endif

                        </a>
                        <div class="form-outline w-100" style="margin-left: 10px">
                            <textarea class="form-control" id="output" rows="2"></textarea>
                            <label class="form-label" for="textAreaExample">Write a comment</label>
                        </div>
                    </div>
                    <div class="float-end mt-2 pt-1">
                        <button type="button" class="btn btn-primary btn-sm" >Post comment</button>
                        <button type="button" class="btn btn-outline-primary btn-sm" value="clear" onclick="javascript:eraseText();">Cancel</button>
                      </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-12 newhome">
                        <div class="row no-gutters row-newhome">
                            <div class="col-10">
                                <h5 class="tdnewhome">Tin bên lề</h5>
                            </div>
                            <div class="button-next-prev col-2 container">
                                <div class="d-flex row-btnextprevdetail">
                                    <button class="PrevBtnnewsdetail PrevBtnnewsdeatil">
                                        <span class="lnr lnr-chevron-left icon-prev"></span>
                                    </button>
                                    <button class="NextBtnnewsdeatil  NextBtnnewsdeatil ">
                                        <span class="lnr lnr-chevron-right icon-next"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="owl-carousel row  owl-carousel-newsdetail owl-theme">
                            @foreach ($new as $show)
                                <div class="item item-newsorther col-6">
                                    <div class="box-imgorther">
                                        <img class="img-newsorther" src="{{ $show->image_url }}" />
                                    </div>
                                    <div class="newsorther">
                                        <div class=" box-detailnews">
                                            <div class="post-detainews">
                                                <div class="detail-schedule-create-at">{{ $show->created_at }}</div>
                                                <a class="detail-schedule-tittle"
                                                    href="{{ route('web.news.show', $show->id) }}">{{ $show->title }}</a>
                                                <h5 class="detail-schedule-detail">{!! $show->description !!}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 category-show">
                <div class="container">
                    <div class="row container container-name-category">
                        <div class="col-12 most">
                            <h5 class="tdmost">Giải đấu</h5>
                        </div>
                        <ul class=" category-name-detail">
                            @foreach ($categories as $ctd)
                                <li class="list-group-category">
                                    <a class="row no-gutters category-name-item">
                                        <span class="col-1" href="#">
                                            <i class="fas fa-angle-double-right span-category">
                                            </i>
                                        </span>
                                        <div class="col-11" href="#">
                                            <h5 class="category-item">{{ $ctd->name }}</h5>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
