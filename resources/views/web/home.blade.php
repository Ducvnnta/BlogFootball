@extends('web.welcome')
@section('title', 'Trang chủ')
@section('content')
    <div class="owl-carousel owl-carousel-slide">
        @foreach ($slide as $key => $sl)
            <div class="item box-img-slide">
                {{-- <div class="box-img"> --}}
                <img class="img-slides" src="{{ $sl->image_url }}">
                {{-- </div> --}}
                <div class="title-name-slide">
                    <h5 class="name-slide-category">{{ $sl->category->name }}<h5>
                            <div><a class="title-slide" href="{{ route('web.news.show', $sl->id) }}">{{ $sl->title }}</a>
                            </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="container-home">
        <div class="row ">
            <div class="col hot box-shadow">
                <div class="col-10 most">
                    <h5 class="tdmost">Tin Nổi Bật</h5>
                </div>
                <ul class="list-group-hot col-12">
                    @foreach ($news as $nh)
                        <li class="list-group-item container">
                            <div class="img-post-hot">
                                <img class="img" src="{{ $nh->image_url }}">
                            </div>
                            <div style="margin-top: 10px"><a class="post-hot"
                                    href="{{ route('web.news.show', $nh->id) }}">{{ $nh->title }}</a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-6 new box-shadow">
                <div class="row no-gutters">
                    <div class="col-md-10 offset-md-1 newhome">
                        <div class="row no-gutters row-newhome">
                            <div class="col-10">
                                <h5 class="tdnewhome">Tin tức hàng ngày</h5>
                            </div>
                            <div class="button-next-prev col-2 container">
                                <div class="d-flex row-btnextprev">
                                    <button class="PrevBtnnewsday btprevnewhome">
                                        <span class="lnr lnr-chevron-left icon-prev"></span>
                                    </button>
                                    <button class="NextBtnnewsday btnextnewhome">
                                        <span class="lnr lnr-chevron-right icon-next"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 offset-md-1">
                        <div class="owl-carousel  owl-carousel-newsday owl-theme">
                            @foreach ($day as $ndh)
                                <div class="item item-newsday">
                                    <div class="row">
                                        <div class="col-12 post-img-newsday">
                                            <img class="img-newsday" src="{{ $ndh->image_url }}" />
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-5 tdleague">{{ $ndh->category->name }}</div>
                                                <div class="col "></div>
                                                <div class="col-6 tdleague" style="text-align: right">{{ $ndh->created_at }}
                                                </div>
                                            </div>
                                            <div>
                                                <a class="headernewsday"
                                                    href="{{ route('web.news.show', $ndh->id) }}">{{ $ndh->title }}</a>
                                            </div>
                                            <div class="descrinewsday">{{ $ndh->description }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-md-10 offset-md-1 newhome">
                        <div class="row no-gutters row-newhome">
                            <div class="col-10">
                                <h5 class="tdnewhome">Lịch Thi Đấu</h5>
                            </div>
                            <div class="button-next-prev col-2 container">
                                <div class="d-flex row-btnextprev">
                                    <button class="PrevBtnmatch btprevnewhome ">
                                        <span class="lnr lnr-chevron-left icon-prev"></span>
                                    </button>
                                    <button class="NextBtnmatch  btnextnewhome ">
                                        <span class="lnr lnr-chevron-right icon-next"></span>
                                    </button>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-10 offset-md-1">
                        <div class="owl-carousel  owl-carousel-match owl-theme">
                            @foreach ($namesch as $nsch)
                                <div class="item item-match">
                                    <img class="img-matchleague"
                                        src="https://cdn.ketnoibongda.vn/media-c/750-500-90/upload/images/lich-thi-dau-bong-da-ngay-104-2020-01-22.jpg" />
                                    <div class="nameleague">
                                        <a class="anameleague"
                                            href="{{ route('web.news.schedule', $nsch->id) }}">{{ $nsch->name }}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row no-gutters">
                    <div class="col-md-10 offset-md-1 newhome">
                        <div class="row no-gutters row-newhome">
                            <div class="col-10">
                                <h5 class="tdnewhome">Bảng xếp hạng</h5>
                            </div>
                            <div class="button-next-prev col-2 container">
                                <div class="d-flex row-btnextprev">
                                    <button class="PrevBtnbxh btprevnewhome">
                                        <span class="lnr lnr-chevron-left icon-prev"></span>
                                    </button>
                                    <button class="NextBtnbxh btnextnewhome">
                                        <span class="lnr lnr-chevron-right icon-next"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 offset-md-1">
                        <div class="row row-col-newbxh">
                            <div class="col-12 bxh2 ">
                                <div class="owl-carousel owl-carousel-bxh owl-theme">
                                    @foreach ($rank as $item)
                                        <div class="item">
                                            <div class="row container">
                                                <div class="col-10">
                                                    <a class=" league-textbxh"
                                                        href="{{ route('web.news.rank', $item->id) }}">{{ $item->name }}</a>
                                                </div>
                                            </div>
                                            <table class="table table-bordered bxh-league-table">
                                                <thead class="thead-dark text-thead">
                                                    <tr>
                                                        <th scope="col " style="font-size: 14px">TT</th>
                                                        <th scope="col " style="font-size: 14px">Đội bóng</th>
                                                        <th scope="col " style="font-size: 14px">Trận đấu</th>
                                                        <th scope="col " style="font-size: 14px">Hiệu số</th>
                                                        <th scope="col " style="font-size: 14px">Điểm</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($item->rankings as $rk)
                                                        {{-- if($index == 5) vàng if($index > 5 && $index <18) ko màu --}}
                                                        <tr class="bg-light">
                                                            <td>{{ $rk->rank }}</td>
                                                            <td>{{ $rk->name }}</td>
                                                            <td>{{ $rk->total }}</td>
                                                            <td>{{ $rk->difference }}</td>
                                                            <td>{{ $rk->score }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col right box-shadow">
                <div class="col-12">
                    <div class="row container container-name-category">
                        <div class="col-12 most">
                            <h5 class="tdmost">Giải đấu</h5>
                        </div>
                        <ul class=" category-name">
                            @foreach ($categories as $ct)
                                <li class="list-group-category">
                                    <div class=" category-name-item">
                                        <span class="lnr lnr-chevron-right-circle"></span>
                                        <a class="category-item"
                                            href="{{ route('web.news.category', $ct->id) }}">{{ $ct->name }}</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="row no-gutters">
                        <div class="row col-10 most">
                            <h5 class="tdschedule col-12">Lịch thi đấu</h5>
                        </div>
                        <ul class="list-group-hot col-12">
                            @foreach ($schedules as $sch)
                                <li class="list-group-item container">
                                    <div class="row img-team">
                                        <div class="col-6">
                                            <a class="datehome">{{ $sch->date }}</a>
                                        </div>
                                        <div class="col-4">
                                            <a class="timehome">{{ $sch->time }}</a>
                                        </div>

                                    </div>
                                    <div class="row" style="margin-top: 8px">
                                        <img class="col-6 imgsch1" src="{{ $sch->flogo1 }}" />
                                        <img class="col-6 imgsch2" src="{{ $sch->flogo2 }}" />
                                    </div>
                                    <div class="row box-name-schedule">
                                        <div class="col-6" style="text-align: center">
                                            <a class="team1home">{{ $sch->fname1 }}</a>
                                        </div>
                                        <div class="col-6" style="text-align: center">
                                            <a class="team2home">{{ $sch->fname2 }}</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
