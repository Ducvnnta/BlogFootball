@extends("web.welcome")
@section('title', 'Tìm kiếm')
@section('content')
<div class="container-search">
    <div class="row ">
        <div class="col search box-shadow">
            <div class="row most-result">
                <h5 class="tdmost col-2">Danh sách tin tức:</h5>
                <p class="pull-left col-4">Tìm thấy {{ $news->appends(Request::all())->total() }} kết quả </p>
            </div>
            <ul class="list-group-consearch col-12">
                @foreach ($news as $itemRes)
                    <li class="list-group-search row container">
                        <div class="col-4 img-post-search">
                            <img class="img-rsearch" src="{{ $itemRes->image_url }}">
                        </div>
                        <div class="col-4 post-search">
                            <div class="row source-search">
                                <div class="col-6 category-search">{{  $itemRes->category->name }}</div>

                                <div class="col-6 time-search">{{  $itemRes->created_at }}</div>
                            </div>
                            <a class="titlesearch" href="{{ route('web.news.show', $itemRes->id) }}">{{ $itemRes->title }}</a>
                            <h5 class="descripsearch">{{ $itemRes->description }}</h5>
                        </div>
                    </li>
                @endforeach
                {{ $news->appends(Request::all())->links() }}
            </ul>
        </div>
    </div>
</div>
@endsection
