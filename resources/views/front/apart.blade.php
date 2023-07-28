@extends('front.layouts.front')

@push('css')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <style>
        .month-button {
            /* Add your default button styles here */
        }
        .card-filter-detail .month-slider-filter{
            width: max-content;
            height: max-content;
            background-color: #f4f7f9;
            border-radius: 10px;
        }
        .card-filter-detail .month-slider-filter button{
            width: 124px;
            height: 40px;
            outline: none;
            background-color: #f4f7f9;
            border: #f4f7f9;
            border-radius: 10px;
        }
        .month-button.selected {
            background-color: rgb(159 191 221)  !important;
            color: white;
        }
        .card-filter-detail{
            width: 100%;
        }
        .card-filter-detail .filter-detail-container{
            max-width: 1250px;
            margin: auto;
            display: flex;
            padding: 40px 0;

        }
        .card-item .swiper-wrapper{
            overflow: hidden;
        }
        .detail-slider-side{
            width: 60%;
            margin-right: 4rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .card-filter-detail .swiper-wrapper {
            width: 390px;
            height: 390px;
            margin-bottom: 36px;
        }
        /* .card-filter-detail .swiper-wrapper .swiper-slide{
            width: 405px !important;
            height: 405px !important;
        } */
        .card-filter-detail  .swiper-wrapper img{
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        .detail-right-side{
            width: 30%;
        }
        .card-filter-detail .swiper-pagination{
            display: none;
        }
        .card-filter-detail .detail-right-side{
            border-left: 1px solid gray;
            padding: 15px;
        }
        .card-filter-detail .detail-right-side .detail-text li{
            display: flex;
            justify-content: space-between;
        }
        .card-filter-detail .detail-right-side .detail-button li{
            display: flex;
            justify-content: space-between;

        }
        .card-filter-detail .detail-right-side .detail-right-innner span{
            color: #65676e;
            margin: 5px 0px 5px 0px;
        }
        .card-filter-detail .detail-right-side .detail-right-innner h3{
            font-size: 2rem;
        }
        .card-filter-detail .detail-right-side{
            /*background-color: #f4f7f9;*/
        }
        .card-filter-detail .detail-right-innner .detail-button{
            background-color: white;
            padding: 30px;
            border-radius: 10px;
        }
        .card-filter-detail .detail-right-innner .detail-button button{
            width: 100%;
            height: 50px;
            border-radius: 10px;
            border: none;
            background-color: rgb(159 191 221) ;
            color: white;
            font-weight: bold;
        }
        .card-filter-detail .detail-right-innner .detail-button button a{
            color: white;
        }
        .card-filter-detail .detail-right-innner p{
            color: #161921;
        }
        .card-filter-detail .detail-right-side .detail-text{
            padding-left: 30px;
        }

        @media (max-width:970px) {
            .card-filter-detail .filter-detail-container{
                flex-wrap: wrap;
            }
            .card-filter-detail .detail-right-side{
                margin-top: 40px;
                width: 100%;
            }
            .card-filter-detail .detail-slider-side{
                width: 100%;
                margin-right: 0px;
            }
            .card-filter-detail .month-slider-filter{
                width: 90%;
            }
            .card-filter-detail .month-slider-filter button{
                width: 30%;
            }
        }
        @media (max-width:400px){

            .card-filter-detail .swiper-wrapper .swiper-slide {
                width: 100%;
            }

        }
    </style>
@endpush

@section('content')

{{--    <!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>Document</title>--}}
{{--    <!-- Swiper CSS -->--}}
{{--    --}}
{{--</head>--}}

{{--<body>--}}
<div class="card-filter-detail">
    <div class="filter-detail-container card-item">
        <div class="detail-slider-side">
            <div class="swiper mySwiperslider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide selected" data-month="January" style="width: 100%;height: 100%"><img  width="1000px" height="1000px" src="{{asset('storage/'. $house->layout)}}" alt=""></div>
                    <div class="swiper-slide" data-month="June"><img src="{{asset('storage/'. $house->block->image)}}" alt=""></div>
                    <div class="swiper-slide" data-month="September"><img src="{{asset('storage/'. $house->block->layout)}}" alt=""></div>
                </div>
                <div class="swiper-pagination"></div>
                <!-- Ay seçimi -->
            </div>
            <div class="month-slider-filter">
                <button class="month-button" data-month="January">{{$statics->where('id',35)->first()->title}}</button>
                <button class="month-button" data-month="June">{{$statics->where('id',36)->first()->title}}</button>
                <button class="month-button" data-month="September">{{$statics->where('id',37)->first()->title}}</button>
                <!-- Diğer aylar için gerekli düğmeleri buraya ekleyebilirsiniz -->
            </div>
        </div>

        <div class="detail-right-side">
            <div class="detail-right-innner">
                <h3>{{$house->room}} {{$statics->where('id',22)->first()->title}} - {{$house->area}} {{$statics->where('id',26)->first()->title}}</h3>
                <ul class="detail-button">
                    <li><span>{{$statics->where('id',31)->first()->title}}</span></li>
                    <li><p>{{$house->price}}  </p>  </li>
                    <li><button><a href="{{route('home-index')}}">{{$statics->where('id',32)->first()->title}}</a></button></li>
                </ul>
                <ul class=" detail-text">
                    <li class="detail-text-head">
                        <p>{{$statics->where('id',33)->first()->title}}</p>
                    </li>
                    <li><p>{{$house->block->project->title}} / {{$house->block->block}} {{$statics->where('id',28)->first()->title}}</p></li>
                    <li> <span>{{$statics->where('id',27)->first()->title}}</span> <span>{{$house->block->project->floor}} / {{$house->floor}}</span></li>
                    <li> <span>{{$statics->where('id',29)->first()->title}}</span> <span>{{$house->date}}</span></li>

                    <li>
                        <p class="detail-text-head">{{$statics->where('id',34)->first()->title}}</p>
                    </li>
                    <li><span>{{$statics->where('id',19)->first()->title}}</span> <span> {{$company->title}}</span></li>
                    <li><span>{{$statics->where('id',20)->first()->title}}</span><span> {{$house->block->project->title}}</span></li>
                    <li><span>{{$statics->where('id',30)->first()->title}}</span> <span> {{ $house->block->project->address}}{{($house->block->project->floor)}}{{$statics->where('id',27)->first()->title}}</span></li>
                    <li><span>Do</span><span>{{$house->block->project->date}} </span></li>
                </ul>
            </div>
        </div>
    </div>
</div>



@endsection

@push('js')



    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- inner card slider control -->
    <!-- <script src="./assets/livevsslider.js"></script> -->
    <script>// slider month section with live camera
        var swiper = new Swiper(".mySwiper2", {
            slidesPerView: 1, // Display one slide at a time
            spaceBetween: 30,
            freeMode: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        // Ay düğmelerini seçme
        var monthButtons = document.querySelectorAll(".month-button");

        // Ay düğmelerine tıklama olayını ekleme
        monthButtons.forEach(function (button) {
            button.addEventListener("click", function () {
                // Seçili düğme rengini sıfırlama
                monthButtons.forEach(function (btn) {
                    btn.classList.remove("selected");
                });

                // Seçilen düğmeye mavi rengi ekleme
                this.classList.add("selected");

                var selectedMonth = this.getAttribute("data-month");

                // Slaytları filtreleme
                swiper.slides.forEach(function (slide) {
                    var slideMonth = slide.getAttribute("data-month");

                    if (slideMonth === selectedMonth || selectedMonth === "All") {
                        slide.style.display = "flex"; // Slaytı görünür yap
                    } else {
                        slide.style.display = "none"; // Slaytı gizle
                    }
                });

                // Swiper yeniden başlatma
                swiper.update();
            });
        });

        // Set the first button as selected by default
        monthButtons[0].classList.add("selected");

        // inner card slider control
        // slider month section with live camera
        var swiper = new Swiper(".mySwiperslider", {slidesPerView: 1, // Display one slide at a time
            spaceBetween: 30,
            freeMode: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        // Ay düğmelerini seçme
        var monthButtons = document.querySelectorAll(".month-button");

        // Ay düğmelerine tıklama olayını ekleme
        monthButtons.forEach(function (button) {
            button.addEventListener("click", function () {
                // Seçili düğme rengini sıfırlama
                monthButtons.forEach(function (btn) {
                    btn.classList.remove("selected");
                });

                // Seçilen düğmeye mavi rengi ekleme
                this.classList.add("selected");

                var selectedMonth = this.getAttribute("data-month");

                // Slaytları filtreleme
                swiper.slides.forEach(function (slide) {
                    var slideMonth = slide.getAttribute("data-month");

                    if (slideMonth === selectedMonth || selectedMonth === "All") {
                        slide.style.display = "flex"; // Slaytı görünür yap
                    } else {
                        slide.style.display = "none"; // Slaytı gizle
                    }
                });

                // Swiper yeniden başlatma
                swiper.update();
            });
        });

        // Set the first button as selected by default
        monthButtons[0].classList.add("selected");</script>

@endpush
