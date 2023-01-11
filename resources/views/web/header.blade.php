<nav class="navbar navbar-expand-lg header-user">
    <div class='container'>
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
                    @foreach (\App\Models\Category::all() as $itemNews)
                        <a class="dropdown-item"
                            href="{{ route('web.news.category', $itemNews->id) }}">{{ $itemNews->name }}</a>
                    @endforeach
                </div>
            </li>
            <li class="nav-rank dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Bảng xếp hạng
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach (\App\Models\RankCategory::all() as $itemRank)
                        <a class="dropdown-item"
                            href="{{ route('web.news.rank', $itemRank->id) }}">{{ $itemRank->name }}</a>
                    @endforeach
                </div>
            </li>
            <li class="nav-rank dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Lịch thi đấu
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach (\App\Models\ScheduleCategory::all() as $itemSchedule)
                        <a class="dropdown-item"
                            href="{{ route('web.news.schedule', $itemSchedule->id) }}">{{ $itemSchedule->name }}</a>
                    @endforeach
                </div>
            </li>
        </ul>
        <div class="my-2 my-lg-0">
            <button class="btn btn-search btn-outline-success my-2 my-sm-0" type="submit"><i
                    class="fas fa-search"></i></button>
        </div>

        {{-- @php
        dd(Auth::check());
    @endphp --}}
        @if (Auth::check() === true)

            <li class=" my-2 my-lg-0 nav-item dropdown" style="list-style: none;">
                <a class="nav-link nav-user-img" id="navbarDropdownMenuLink2" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <div class="my-2 my-lg-0">
                        <button class="btn btn-profile btn-outline-success my-2 my-sm-0" type="submit"><i
                                class="fas fa-user-alt"></i></button>
                    </div>
                    {{-- <div>
                            @if (Auth::check() === false)
                                <a href="{{ route('auth.login') }}">
                                    <div class=" box-1">
                                        <div class="btn btn-one">
                                            <span>{{ $userName }}</span>
                                        </div>
                                    </div>
                                </a>
                            @else
                                <div class=" box-1">
                                    <div class="btn btn-one">
                                        <span>{{ $userName }}</span>
                                    </div>
                                </div>
                            @endif
                        </div> --}}
                    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                        aria-labelledby="navbarDropdownMenuLink2">

                        @if (Auth::check() === false)
                        @php
                            $userName = 'Profile';
                        @endphp
                    @else
                        @php
                            $userName = Auth::user()->name;
                        @endphp
                    @endif
                        <a class="dropdown-item" href="{{ route('auth.profile', Auth::user()->id) }}">
                            <i class="fas fa-user mr-2"></i>{{ $userName }}
                        </a>
                        <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                        <a class="dropdown-item" href="{{ route('user.auth.register') }}"><i class="fas fa-star mr-2"></i>Another Account</a>
                        <a class="dropdown-item" href="{{ route('auth.logout') }}"><i
                                class="fas fa-power-off mr-2"></i>Logout</a>

                    </div>
                </a>
            </li>
        @else
            <div class="my-2 my-lg-0" style="margin-left: 10px;">
                <a href="{{ route('auth.login') }}">

                    <button class="btn btn-profile btn-outline-success my-2 my-sm-0" type="submit"><i
                            class="fas fa-user-alt"></i></button></a>
            </div>
        @endif


    </div>

    </div>
    </div>
</nav>
</div>
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
