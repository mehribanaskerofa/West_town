@extends('front.layouts.front')

@push('css')
    <link rel="stylesheet" href="{{asset('assets/css/cards.css')}}">
{{--    <link rel="stylesheet" href="node_modules/nouislider/distribute/nouislider.min.css">--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/nouislider/distribute/nouislider.min.css">


@endpush
@section('content')
    <div class="filter-for-cards container">
        <h1>{{$statics->where('id',24)->first()->title}}</h1>

        <div class="card-filter">
            <div class="card-filters-up">
                <div class="buttons">
                    <span>{{$statics->where('id',21)->first()->title}}</span>
                    <div class="buttons-inside">
                        <span>{{$statics->where('id',23)->first()->title}}</span>
                        <button onclick="filterCardsByRoomCount(1)">1 </button>
                        <button onclick="filterCardsByRoomCount(2)">2 </button>
                        <button onclick="filterCardsByRoomCount(3)">3 </button>
                        <button onclick="filterCardsByRoomCount(4)">4 </button>
                        <button onclick="filterCardsByRoomCount(6)">6 </button>
                    </div>
                </div>




                <div class="wrapper-main">
                    <div class="wrapper">
                        <div class="price-range p-range">
                            <p>{{$statics->where('id',25)->first()->title}}</p>
                            <div class="common-price">
                                <span id="min-price-label">0</span>
                                <div>
                                <input type="range" id="min-price" min="0" max="{{$houses->max('price')}}" step="10" value="0">
                                <input type="range" id="max-price" min="0" max="100000" step="10" value="100000">
                                </div>
                                <span id="max-price-label">100000</span>
                            </div>
                        </div>
                        <!-- area -->
                        <div class="area-range p-range">
                            <p>{{$statics->where('id',26)->first()->title}}</p>
                            <div class="common-area">
                                <span id="min-area-label">0</span>
                                <div>
                                <input type="range" id="min-area" min="0" max="{{$houses->max('area')}}" step="1" value="0">
                                <input type="range" id="max-area" min="0" max="{{$houses->max('area')}}" step="1" value="{{$houses->max('area')}}">
                                </div>
                                <span id="max-area-label">{{$houses->max('area')}}</span>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>




            </div>

            <br>
            <div class="card-filters-down">
                <!-- <p>saylari</p> -->
            </div>
        </div>
        <hr>

        <div class="main-cards">

            @foreach($houses as $house)
            <div class="card" data-rooms="{{$house->room}}" data-price="{{$house->price}}" data-area="{{$house->area}}">
                <a href="{{route('apart',$house)}}" style="text-decoration: none">
                <div class="slider-section">
                    <!-- Swiper -->
                    <!-- Swiper -->
                    <div class="swiper cardSwiper">
                        <div class="swiper-wrapper" data-id="{{$house->block->id}}">
                            <div class="swiper-slide"> <img src="{{asset('storage/'.$house->layout)}}" alt=""></div>
                            <div class="swiper-slide"> <img src="{{asset('storage/'.$house->block->layout)}}" alt=""></div>
                            <div class="swiper-slide"> <img src="{{asset('storage/'.$house->block->image)}}" alt=""></div>

                        </div>
                        <div class="swiper-scrollbar"></div>
                    </div>
                </div>
                <div class="card-main-price">
                    <div class="main-price-left">
                        <h3>{{$house->room}} - {{$statics->where('id',22)->first()->title}} , {{$statics->where('id',26)->first()->title}} - {{$house->area}}</h3>
                        <div class="current-price">
                            {{$house->price}}
                        </div>
                    </div>
                    <div class="main-price-right">
                        <div class="main-price-old">{{$house->block->block}} - {{$statics->where('id',28)->first()->title}}</div>
                        <div class="pink-tag">
                            <span> {{$house->block->project->title}} </span>
                        </div>
                    </div>
                </div>
                <hr>
                <ul class="card-main-specs">
                    <li class="specs-up">
                        <p>{{$statics->where('id',19)->first()->title}}</p>
                        <p> {{$company->title}}
                        </p>
                    </li>
                    <li class="specs-down">
                        <p>{{$statics->where('id',20)->first()->title}}</p>
                        <p>{{$house->block->project->title}}</p>
                    </li>
                </ul>
                </a>
                </div>
                @endforeach


{{--            <div class="card form" data-rooms="1" data-price="50" data-area="66">--}}
{{--                <div class="feedback-form">--}}
{{--                    <form action="">--}}
{{--                        <div class="feedback-up">--}}
{{--                            <p class="head-p">Помощь менеджера</p>--}}
{{--                            <h3>Помочь вам с выбором?</h3>--}}
{{--                            <p>Свяжемся с вами и поможем. Без лишних назойливых звонков.</p>--}}
{{--                            <input placeholder="Телефон" max-length="255" required="required" type="tel" value=""--}}
{{--                                   class="s-input__input" data-v-9b4a078d="">--}}
{{--                        </div>--}}

{{--                        <div class="feedback-down">--}}
{{--                            <p>Нажимая на кнопку, вы подтверждаете, что ознакомились с политикой <a href="#">обработки--}}
{{--                                    персональных данных</a></p>--}}
{{--                            <button type="submit">submit button</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}

{{--                </div>--}}

{{--            </div>--}}


        </div>
    </div>



@endsection

@push('js')
    <script src="{{asset('assets/js/cards.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/nouislider/distribute/nouislider.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"></script>
{{--    <script src="node_modules/nouislider/distribute/nouislider.min.js"></script>--}}
    <!-- Swiper JS -->


    <script src="{{asset('assets/js/filterarea.js')}}"></script>

@endpush
