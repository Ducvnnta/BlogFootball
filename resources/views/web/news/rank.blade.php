@extends('web.welcome')
@section('title','Bảng xếp hạng')
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
                        <div class="owl-carousel-bxh-1">
                            <div class="item item-bxh-detail">
                                <div class="row container">
                                    <div class="col-3 headerdetail-item1" >
                                        <a href="/" style="margin-left: 40px">
                                            <i class="fas fa-home" ></i>
                                        </a>
                                    </div>
                                    <div class=" headerdetail-item2" >>></div>
                                    <div class="col-6 league-textbxh">{{ $rank->name }}</div>
                                </div>

                                <table class="table table-bordered bxh-league-table">
                                    <thead class="thead-dark text-thead">
                                        <tr>
                                            <th scope="col ">TT</th>
                                            <th scope="col ">Đội bóng</th>
                                            <th scope="col ">Trận đấu</th>
                                            <th scope="col ">Thắng</th>
                                            <th scope="col ">Hòa</th>
                                            <th scope="col ">Hiệu số</th>
                                            <th scope="col ">Điểm</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($rank->rankings as $rksch)
                                            <tr class="bg-light">
                                                <td>{{ $rksch->rank }}</td>
                                                <td>{{ $rksch->name }}</td>
                                                <td>{{ $rksch->total }}</td>
                                                <td>{{ $rksch->win }}</td>
                                                <td>{{ $rksch->equal }}</td>
                                                <td>{{ $rksch->difference }}</td>
                                                <td>{{ $rksch->score }}</td>
                                            </tr>
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
                        @foreach ($new as $nrk )
                        <div class="item item-newsorther col-6">
                            <div class="box-imgorther">
                            <img class="img-newsorther"
                                src="{{ $nrk->image_url }}" />
                            </div>
                            <div class="newsorther">
                                <div class=" box-detailnews">
                                    <div class="post-detainews">
                                        <p class="detail-schedule-create-at">{{ $nrk->created_at }}</p>
                                        <a class="detail-schedule-tittle" href="{{ route('web.news.show', $nrk->id) }}">{{ $nrk->title }}</a>
                                        <h5 class="detail-schedule-detail">{{ $nrk->description }}</h5>
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
            <div class="container" >
                <div class="row container container-name-category">
                    <div class="col-12 most">
                        <h5 class="tdmost">Giải đấu</h5>
                    </div>
                    <ul class=" category-name-detail">
                        @foreach (  $categoriesch as $ctd)
                        <li class="list-group-category">
                            <a class="row no-gutters category-name-item" >
                                <span class="col-1" href="#">
                                    <i class="fas fa-angle-double-right span-category">
                                    </i>
                                </span>
                                <div class="col-11"  href="#">
                                    <h5 class="category-item">{{ $ctd->name}}</h5>
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
@endsection
