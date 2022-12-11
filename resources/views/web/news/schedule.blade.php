@extends('web.welcome')
@section('title','Lịch thi đấu')
@section('content')
<div class="container container-detail" style="background-color: none">
    {{-- <div class="row row-header">
        <div class="col-12" >
            <nav aria-label="breadcrumb" >
                <ul class="breadcrumb" type="none" style="background-color: #fff">
                    <li class="headerdetail-item1" >
                        <a href="/">
                            <i class="fas fa-home" href="/"></i>
                        </a>
                    </li>
                    <li class="headerdetail-item2" >></li>
                    <li class="headerdetail-item2" >{{ $rank->ranks->name }}</li>
                </ul>
            </nav>
            <div>
        </div>
    </div> --}}
    <div class="row container container-body-detail">
        <div class="col-8 box-detailnews">
            <div class="post-detainews">
                <h1 class="detail-news-tittle"></h1>
            </div>
            <div class="col-12">
                <div class="row row-col-newbxh">
                    <div class="col-12 bxhdetail ">
                        <div class=" owl-carousel-bxh-2">
                                <div class="item item-bxh-detail">
                                    <div class="row container">
                                        <div class="col-3 headerdetail-item1" >
                                            <a href="/" style="margin-left: 40px">
                                                <i class="fas fa-home" href="/"></i>
                                            </a>
                                        </div>
                                        <div class=" headerdetail-item2" >>></div>
                                        <div class="col-6 league-textbxh">{{ $schedule->name }}</div>
                                    </div>

                                    <table class="table table-bordered bxh-league-table">
                                        <thead class="thead-dark text-thead">
                                            <tr>
                                                <th scope="col ">Ngày</th>
                                                <th scope="col ">Thời gian</th>
                                                <th scope="col " colspan="2">Đội bóng</th>
                                                {{-- <th scope="col ">Đội bóng</th>--}}
                                                <th scope="col "></th>
                                                <th scope="col " colspan="2">Đội bóng</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($schedule->schedules as $sch)
                                                <tr class="bg-light" style="text-align: center">
                                                    <td style="padding-top: 30px">{{ $sch->date }}</td>
                                                    <td style="padding-top: 30px">{{ $sch->time }}</td>
                                                    <td style="padding-top: 30px">{{ $sch->fname1 }}</td>
                                                    <td >
                                                        <img class="img-sche1" src="{{ $sch->flogo1 }}"/></td>
                                                    <td style="padding-top: 30px">VS</td>
                                                    <td><img class="img-sche1" src="{{ $sch->flogo2 }}"/></td>
                                                    <td style="padding-top: 30px">{{ $sch->fname2 }}</td>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
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
                        @foreach ($new as $nsche )
                        <div class="item item-newsorther col-6">
                            <div class="box-imgorther">
                            <img class="img-newsorther"
                                src="{{ $nsche->image_url }}" />
                            </div>
                            <div class="newsorther">
                                <div class=" box-detailnews">
                                    <div class="post-detainews">
                                        <div class="detail-schedule-create-at">{{ $nsche->created_at }}</div>
                                        <a class="detail-schedule-tittle" href="{{ route('web.news.show', $nsche->id) }}">{{ $nsche->title }}</a>
                                        <h5 class="detail-schedule-detail">{{ $nsche->description }}</h5>
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
            <div class="col-12 container" >
                <div class="row container container-name-category">
                    <div class="col-12 most">
                        <h5 class="tdmost">Giải đấu</h5>
                    </div>
                    <ul class=" category-name">
                        @foreach ($categories as $ct)
                            <li class="list-group-category">
                                <div class=" category-name-item">
                                    <span class="lnr lnr-chevron-right-circle"></span>
                                   <a class="category-item" href="{{ route('web.news.category', $ct->id)}}">{{ $ct->name }}</a>
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
