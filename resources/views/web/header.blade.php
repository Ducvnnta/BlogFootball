<nav class="navbar navbar-expand-lg ">
    <div class="container home">
        <a class="navbar-brand" href="/"><img src="./images/logo02.png" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-match dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tin tức giải đấu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach (\App\Models\Category::all() as $item0)
                            <a class="dropdown-item"
                                href="{{ route('web.news.category', $item0->id) }}">{{ $item0->name }}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-rank dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bảng xếp hạng
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach (\App\Models\RankCategory::all() as $item1)
                            <a class="dropdown-item"
                                href="{{ route('web.news.rank', $item1->id) }}">{{ $item1->name }}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-rank dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Lịch thi đấu
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach (\App\Models\ScheduleCategory::all() as $item2)
                            <a class="dropdown-item"
                                href="{{ route('web.news.schedule', $item2->id) }}">{{ $item2->name }}</a>
                        @endforeach
                    </div>
                </li>
            </ul>
            <div class="my-2 my-lg-0">
                <button class="btn btn-search btn-outline-success my-2 my-sm-0" type="submit"><i
                        class="fas fa-search"></i></button>
            </div>

            @if (auth('web')->user() === false)
                @php
                    $userName = 'Tài khoản';
                @endphp
            @else
                @php
                    $userName = auth('web')->user()->name;
                @endphp
            @endif

            <div>
                <a href="{{ route('auth.register') }}">
                    <div class=" box-1">
                        <div class="btn btn-one">
                            <span>{{ $userName }}</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    </div>
    </div>
</nav>
<div class="search-box">
    <div class="container">
        <form class="search-form" role="search" method="GET" id="key" action="{{ route('home.search') }}">
            <input class="form-inline" type="text" name="keyword" placeholder="Tìm Kiếm">
        </form>

    </div>


    <div class="intro">
        <div class="container">
            <div class="row">
            </div class="col-mdl4 intro_col">
            <div class="intro_item"></div>
        </div>
    </div>
</div>
