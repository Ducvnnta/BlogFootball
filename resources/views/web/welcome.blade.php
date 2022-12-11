<!DOCTYPE html>
<html lang="vn">

<head>
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
    @include("web.header")
    @yield('content')
    @include("web.footer")
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="OwlCarousel/dist/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>
        // C1
        // $(document).ready(function(){
        //     $(".btn-search").on("click",function(){
        //    if($(".search-box").hasClass("show"))
        //    {
        //     ($(".search-box").removeClass("show"))
        //    }else{
        //     ($(".search-box").addClass("show"))
        //    }

        //     });
        // });
        // C2
        $(document).ready(function() {
            $(".btn-search").on("click", function() {
                $(".search-box").toggleClass("show")
            });
            var owlslide = $('.owl-carousel-slide');
            owlslide.owlCarousel({
                loop:true,
                margin:10,
                nav:false,
                dots: false,
                autoplay: true,
                autoplayHoverPause: true,
                autoplayTimeout: 2500,
                responsive:{
                     0:{
                         items:1
                        },
                    600:{
                        items:1
                    },
                    1000:{
                        items:3
                    }
                }
            })
            var owlmatch = $('.owl-carousel-match');
            owlmatch.owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                dots: false,
                autoplay: false,
                autoplayHoverPause: true,
                autoplayTimeout: 3000,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 2
                    }
                }
            })
            $('.NextBtnmatch').click(function() {
                owlmatch.trigger('next.owl.carousel');
            })
            $('.PrevBtnmatch').click(function() {
                owlmatch.trigger('prev.owl.carousel');
            })
            var owlmatch = $('.owl-carousel-match');
            owlmatch.owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                dots: false,
                autoplay: false,
                autoplayHoverPause: true,
                autoplayTimeout: 3000,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 2
                    }
                }
            })
            $('.NextBtnmatch').click(function() {
                owlmatch.trigger('next.owl.carousel');
            })
            $('.PrevBtnmatch').click(function() {
                owlmatch.trigger('prev.owl.carousel');
            })
            var owlbxh = $('.owl-carousel-bxh');
            owlbxh.owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                items: 1,
                dots: false,
                autoplay: false,
                autoplayHoverPause: true,
                autoplayTimeout: 3000,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })
            $('.NextBtnbxh').click(function() {
                owlbxh.trigger('next.owl.carousel');
            })
            $('.PrevBtnbxh').click(function() {
                owlbxh.trigger('prev.owl.carousel');
            })
            var owlnewsday = $('.owl-carousel-newsday');
            owlnewsday.owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                dots: false,
                autoplay: false,
                autoplayHoverPause: true,
                autoplayTimeout: 3000,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })
            $('.NextBtnnewsday').click(function() {
                owlnewsday.trigger('next.owl.carousel');
            })
            $('.PrevBtnnewsday').click(function() {
                owlnewsday.trigger('prev.owl.carousel');
            })

            var owlnewsdetail = $('.owl-carousel-newsdetail');
            owlnewsdetail.owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                dots: false,
                autoplay: false,
                autoplayHoverPause: true,
                autoplayTimeout: 3000,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 2
                    }
                }
            })
            $('.NextBtnnewsdeatil').click(function() {
                owlnewsdetail.trigger('next.owl.carousel');
            })
            $('.PrevBtnnewsdetail').click(function() {
                owlnewsdetail.trigger('prev.owl.carousel');
            })

            var owlschedule = $('.owl-carousel-schedule');
            owlschedule.owlCarousel({
                loop: true,
                margin: 10,
                nav: false,
                dots: false,
                autoplay: false,
                autoplayHoverPause: true,
                autoplayTimeout: 3000,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })
            $('.NextBtnSchedule').click(function() {
                owlschedule.trigger('next.owl.carousel');
            })
            $('.PrevBtnSchedule').click(function() {
                owlschedule.trigger('prev.owl.carousel');
            })

        });

    </script>
    <html>
