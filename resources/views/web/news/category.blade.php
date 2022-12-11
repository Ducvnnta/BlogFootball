@extends('web.welcome')
@section('title','Giải đấu')
@section('content')
<div class="container-search">
    <div class="row container">
        <ul class="list-group-consearch col-12">
            <div class="row container">
                <div class="headerdetail-item1" >
                    <a href="/" style="margin-left: 40px">
                        <i class="fas fa-home" ></i>
                    </a>
                </div>
                <div class="headerdetail-item2" >>></div>
                <div class="league-textbxh" style="margin-left: 30px">{{ $categories->name }}</div>
            </div>
            <div>
            @foreach ($categories->categories as $ctgr)
                <li class="list-group-category2 row container">
                    <div class="col-4 img-post-search">
                        <img class="img-rsearch" src="{{ $ctgr->image_url }}">
                    </div>
                    <div class="col-4 post-search">
                        <div class="source-search">
                            <div class="time-category">{{  $ctgr->created_at }}</div>
                        </div>
                        <a class="titlesearch" href="{{ route('web.news.show', $ctgr->id) }}">{{ $ctgr->title }}</a>
                        <h5 class="descripsearch">{{ $ctgr->description }}</h5>
                    </div>
                </li>
            @endforeach
            </div>
        </ul>
    </div>
</div>
@endsection
