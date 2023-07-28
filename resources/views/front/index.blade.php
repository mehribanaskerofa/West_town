@extends('front.layouts.front')


@section('content')

    <section class="w header-bottom-section">
        <div class="header-bottom">
            <div class="header-bottom-title">
                <div class="word">
                    <span class="letter w1">B</span>
                    <span class="letter o">P</span>
                    <span class="letter o">Y</span>
                    <span class="letter w2">K</span>
                </div>
            </div>
            <div class="header-bottom-img">
                <img src="{{asset('storage/'.$setting->image)}}" alt="yasayis-park"  id="scroll-image">
            </div>
        </div>
    </section>

    <section class="about w" id="about" style=" background: url({{asset('assets//image/about-background.png')}});">
        <div class="container">
            <div class="about-container w">
                <div class="about-left">
                    <span>{{$menus[0]->name}}</span>
                </div>
                <div class="about-right">
                    <div class="about-right-title">
                        <div class="about-right-title-1">{{$about->title}}</div>
                    </div>
                    <div class="about-right-text">
{{--                        <p>{{implode('', array_slice('!', 0, strlen($about->description) / 2))}}</p>--}}
{{--                       <?php--}}
{{--                       $parts = explode('!', $about->description);--}}
{{--                       $firstPart = $parts[0];--}}
{{--                       $secondPart = $parts[1];--}}
{{--                       ?>--}}
{{--                        <p>{{$firstPart}}</p>--}}
{{--                        <p>{{$secondPart}}</p>--}}
                        <p>{!! $about->description !!}</p>
                    </div>
                    <div class="about-right-image">
                        <img src="{{asset('storage/'.$about->image)}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="river w">
        <div class="container">
            <div class="river-container ">
                <div class="river-content">
                    <div class="river-title">
{{--                        <h1>CENTER <br>AT RIVER'S LENGTH</h1>--}}
                        <h1 style="max-width: 600px">{{$river->title}}</h1>
                    </div>
                    <div class="river-context">
                        <p>{!! $river->description !!}</p>
{{--                        <p>The choice is yours!</p>--}}
                    </div>
                </div>
                <div class="river-image">
                    <img src="{{asset('storage/map.jpg')}}" width="100%" height="350px" alt="river">
                </div>
            </div>
        </div>
    </section>

    <section class="locations w" id="location">
        <div class="container">
            <div class="location-container w">

                <div class="location-top">
                    <div class="location-name"><span>{{$menus[1]->name}}</span></div>
                    <div class="location-head">
                        <div class="location-text">
                            <div class="location-text-img"><img src="{{asset('assets/image/location-metro.svg')}}" alt=""></div>
                            <div class="location-texts">
                                <div class="location-text-head"><span>{{$location->button}}</span></div>
                                <div class="location-text-body"><span>100 m</span></div>
                            </div>
                        </div>
                        <div class="location-title"><span>{{$location->title}}</span></div>
                    </div>
                </div>


                <div class="location-bottom">
                    <div class="location-bottom-container">
                        <div class="location-items">
                        @foreach($adverts as $advert)
                            <div class="location-item">
                                <div class="location-item-content">
                                    <div class="location-item-title"><span>{{$advert->title}}</span></div>
                                    <div class="location-item-text"><span>{!! $advert->description !!}</span></div>
                                </div>
                                <div class="location-item-subtext">
                                    <p><i class="fa-solid fa-person-walking"></i><span>{{$advert->button}}</span></p>
                                </div>
                                <div class="location-item-img">
                                    <img src="{{asset('storage/'.$advert->image)}}" alt="">
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="location-map">
                            <div class="location-map-item">
                                <div class="location-map-iframe">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12121.094524169926!2d49.67590498251894!3d40.57971512922816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x403091b91564be6f%3A0x89975659cc2a3ebe!2sX%C9%99zri%20Rezidens!5e0!3m2!1sru!2saz!4v1688501911640!5m2!1sru!2saz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="location-bottom-context">
                        <div class="location-sticky">
                            <?php
//                            $parts1 = explode('!', $location->description);
//                            dd($parts1)
//                            $firstPart1 = $parts1[0];
//                            $secondPart1 = $parts1[1];
                            ?>
{{--                            <p>{{$parts1[0]}}</p>--}}
                            <p>{!! $location->description !!}</p>
{{--                            <p>{{$secondPart1}}</p>--}}
                        </div>
                        <button class="map-btn">
                            Смотреть на карте
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="contact w" id="contact-section">
        <div class="container">
            <div class="contact-container w">
                <div class="contact-content">
                    <h1>{{$contact->title}}  <span>{!!  $contact->description!!}</span></h1>
                </div>
                <div class="contact-context">
                    <div class="contact-form">
                        <form
                            action="{{route('contact-send')}}"
                            method="post"  id="contactBtn-1"
{{--                              onsubmit="this.preventDefault();"--}}
                        >
                            @csrf
                            <div class="contact-form-container ">
                                <div class="contact-form-input ">
                                   <input id="phone-input-1" type="tel" name="phone" />
                                    <input type="hidden" id="countryCode" name="countryCode">
                                </div>
                                <button class="contact-form-button"  >{{$contact->button}}</button>
                            </div>
                        </form>
                    </div>
                    <div class="contact-subtext">
{{--                        <span>I consent to the processing of </span><a href="">personal data</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="benefites w" id="benefits">
        <div class="benefit-head">
            <div class="benefit-name"><span>{{$menus[2]->name}}</span></div>
            <div class="benefit-head-title"><span>{{$statics->where('id',9)->first()->title}}</span></div>
        </div>
        <div class="benefits-slider w">
            <div class="swiper">
                <div class="swiper-wrapper">
                    @foreach($benefits as $index=>$benefit)
                    <div class="swiper-slide">
                        <div class="benefit-slider-item">
                            <div class="benefit-slider-item-counter">
                                <div class="benefit-slider-item-count"><span>0{{$index+1}} / 0{{count($benefits)}}</span></div>
                                <div class="benefit-slider-item-buttons">
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                            <div class="benefit-slider-item-context">
                                <div class="benefit-slider-item-context-title">
                                    <span>{{$benefit->title}}</span>
                                </div>
                                <div class="benefit-slider-item-context-text">
                                    <p>{!!$benefit->description!!}</p>
                                </div>
                            </div>
                            <div class="benefit-slider-item-img">
                                <img src="{{asset('storage/'.$benefit->image)}}" alt="">
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="specious w" id="parking">
        <div class="container">
            <div class="specious-rooms">

                <div class="specious-room">
                    <div class="specious-room-container" style="background-image: url('{{asset('storage/'.$apart->image)}}');">
                        <div class="back-black"></div>
                        <div class="specious-room-content">
                            <div class="specious-room-context">
                                <div class="specious-room-title"><p>{{$apart->title}}</p></div>
                                <div class="specious-room-text"><p>{!!$apart->description!!}</p></div>
                            </div>
{{--                            <div class="specious-room-button"><a>Select storage rooms</a></div>--}}
                        </div>
                    </div>
                </div>

                <div class="specious-room">
                    <div class="specious-room-container" style="background-image: url('{{asset('storage/'.$parking->image)}}');">
                        <div class="back-black"></div>
                        <div class="specious-room-content">
                            <div class="specious-room-context">
                                <div class="specious-room-title"><p>{{$parking->title}}</p></div>
                                <div class="specious-room-text"><p>{!! $parking->description!!}</p></div>
                            </div>
{{--                            <div class="specious-room-button"><a>Select storage rooms</a></div>--}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="grand w" id="storagerooms">
        <div class="container">
            <div class="grand-content">
                <div class="grand-head"><span>{{$statics->where('id',10)->first()->title}}</span></div>
                <div class="grand-items">
                    @foreach($grands as $grand)
                    <div class="grand-container">
                        <div class="grand-image grand-opacity"> <img class="" src="{{asset('storage/'.$grand->image)}}" alt="{{$grand->title}}">
                        </div>
                        <div class="grand-context">
                            <div class="grand-text-icon">
                                <i class="fa-solid fa-plus"></i>
                            </div>
                            <div class="grand-item-title"><span>{{$grand->title}}</span></div>
                            <div class="grand-item-text"><span>{!! $grand->description!!}</span></div>
                        </div>
                    </div>
                        @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="infrastructure w" id="infrastructure">

        <!-- <div class="container"> -->
        <div class="infs">
            <div class="inf-head">
                <div class="inf-head-subtitle"><span>{{$menus[6]->name}}</span></div>
                <div class="inf-head-title"><span>{{$statics->where('id',11)->first()->title}}</span></div>
                <div class="custom-pagination" id="infs">
                    @foreach($infras as $infra)
                    <div class="pagination-item"><span>{{$infra->title}}</span></div>
                        @endforeach
                </div>
            </div>
            <div class="swiper inf">
                <div class="swiper-wrapper">
                    @foreach($infras as $infra)
                    <div class="swiper-slide">
                        <div class="slide-content1">
                            <img src="{{asset('storage/'.$infra->image)}}" alt="">
                        </div>
                    </div>
                        @endforeach
                </div>
            </div>
        </div>
        <!-- </div> -->
    </section>

    <section class="apart w" id="apartment">
        <div class="container">
            <div class="apartment-container w">
                <div class="apart-left">
                    <div class="apart-left-head">
                        <div class="apart-left-subtitle"><span>{{$menus[5]->name}}</span></div>
                        <div class="apart-left-title"><span>{{$statics->where('id',14)->first()->title}}</span></div>
                    </div>
                    <div class="apart-left-context">
                        <div class="apart-text"><span>{{$statics->where('id',12)->first()->title}}</span></div>
                        <div class="apart-button"><a  href="{{route('cards')}}"><button>{{$statics->where('id',13)->first()->title}}</button></a></div>
                    </div>
                </div>
                <div class="apart-right">
                    <img src="{{asset('assets/image/Screenshot_4.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="rares w">
        <div class="rare-head">
            <div class="rare-name"><span>{{$statics->where('id',15)->first()->title}}</span></div>
        </div>
        <div class="rare-slider-item-buttons">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <div class="rares-slider w">
            <div class="swiper">
                <div class="swiper-wrapper">
                    @foreach($rares as $rare)
                    <div class="swiper-slide">
                        <div class="rare-item">
                            <div class="rare-item-img"><img src="{{asset('storage/'.$rare->image)}}" alt=""></div>
                            <div class="rare-item-content">
                                <div class="rare-item-context">
                                    <div class="rare-item-title"><span>{{$rare->title}}</span></div>
                                    <div class="rare-item-text"><span>{!! $rare->description!!}</span></div>
                                </div>
                                <div class="rare-item-button">
                                    <button class="rare-item-btn"><a href="#contact-section"></a>{{$statics->where('id',7)->first()->title}}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="finish w" id="finishing">
        <div class="container">
            <div class="finish-container">
                <div class="finish-head">
                    <div class="finish-subtitle"><span>{{$menus[7]->name}}</span></div>
                    <div class="finish-title"><span>{{$finish->title}}</span></div>
                </div>
                <div class="finish-content">
                    <div class="swiper slider-finish">
                        <div class="swiper-wrapper">
                            <?php
                            $finish1=$finishings->where('id',1)->first();
                            $finish2=$finishings->where('id',2)->first();
                            $finish3=$finishings->where('id',3)->first();

                            ?>
                            <div class="swiper-slide">
                                <div class="slide-content1">
                                    <div class="swiper inner-slider">
                                        <div class="swiper-wrapper inner" >
                                            <div class="swiper-slide inner-slide">
                                                <div class="inner-slide-img"><img src="{{asset('storage/'.$finish1->image)}}" alt="">
                                                </div>
                                            </div>
                                            <div class="swiper-slide inner-slide">
                                                <div class="inner-slide-img"><img src="{{asset('storage/istirahet2.jpg')}}" alt="">
                                                </div>
                                            </div>
                                            <div class="swiper-slide inner-slide">
                                                <div class="inner-slide-img"><img src="{{asset('storage/istirahet3.jpg')}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-pagination"></div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-button-next"></div>
                                    </div>
                                </div>

                            </div>

                            <div class="swiper-slide">
                                <div class="slide-content1">
                                    <div class="swiper inner-slider">
                                        <div class="swiper-wrapper inner" >
                                            <div class="swiper-slide inner-slide">
                                                <div class="inner-slide-img"><img src="{{asset('storage/'.$finish2->image)}}" alt="">
                                                </div>
                                            </div>
                                            <div class="swiper-slide inner-slide">
                                                <div class="inner-slide-img"><img src="{{asset('storage/f22.jpg')}}" alt="">
                                                </div>
                                            </div>
                                            <div class="swiper-slide inner-slide">
                                                <div class="inner-slide-img"><img src="{{asset('storage/f23.jpg')}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-pagination"></div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-button-next"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="slide-content1">
                                    <div class="swiper inner-slider">
                                        <div class="swiper-wrapper inner" >
                                            <div class="swiper-slide inner-slide">
                                                <div class="inner-slide-img"><img src="{{asset('storage/'.$finish3->image)}}" alt="">
                                                </div>
                                            </div>
                                            <div class="swiper-slide inner-slide">
                                                <div class="inner-slide-img"><img src="{{asset('storage/m2.jpg')}}" alt="">
                                                </div>
                                            </div>
                                            <div class="swiper-slide inner-slide">
                                                <div class="inner-slide-img"><img src="{{asset('storage/m3.jpg')}}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-pagination"></div>
                                        <div class="swiper-button-prev"></div>
                                        <div class="swiper-button-next"></div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="custom-pagination">
                            @foreach($finishings as $finishing)
                            <div class="pagination-item">{{$finishing->title}}</div>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="master-plan w" >
        <div class="container">
            <span class="master-plan-head">{{$statics->where('id',18)->first()->title}}</span>
            <div class="master-plan-img w">
                <img src="{{asset('storage/structure.jpg')}}" alt="masterplan">
                <div class="plan-btn1"><span class=" masterplan-btn">+</span>
                    <div class="plan-section-1">
                        <div class="plan-section-title"><span>{{$statics->where('id',20)->first()->title}} {{$buildings[0]->title}} </span></div>
                        <div class="plan-section-content">
                            <table>
                                <thead>

                                </thead>
                                <tbody>
                                <tr>
                                    <td>3 - 6 {{$statics->where('id',27)->first()->title}}</td>
                                    <td>1200 azn/m²</td>
                                </tr>
                                <tr>
                                    <td>7 - 10 {{$statics->where('id',27)->first()->title}}</td>
                                    <td>1250 azn/m²</td>
                                </tr>
                                <tr>
                                    <td>11 - 13 {{$statics->where('id',27)->first()->title}}</td>
                                    <td>1300 azn/m²</td>
                                </tr>
                                <tr>
                                    <td>{{$statics->where('id',38)->first()->title}}</td>
                                    <td>1500 azn/m²</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="plan-btn2"><span class="masterplan-btn">+</span>
                    <div class="plan-section-2">
                        <div class="plan-section-title"><span>{{$statics->where('id',20)->first()->title}} {{$buildings[1]->title}}</span></div>
                        <div class="plan-section-content">
                            <table>
                                <thead>

                                </thead>
                                <tbody>
                                <tr>
                                    <td>3 - 6 {{$statics->where('id',27)->first()->title}}</td>
                                    <td>1200 azn/m²</td>
                                </tr>
                                <tr>
                                    <td>7 - 10 {{$statics->where('id',27)->first()->title}}</td>
                                    <td>1250 azn/m²</td>
                                </tr>
                                <tr>
                                    <td>11 - 13 {{$statics->where('id',27)->first()->title}}</td>
                                    <td>1300 azn/m²</td>
                                </tr>
                                <tr>
                                    <td>{{$statics->where('id',38)->first()->title}}</td>
                                    <td>1500 azn/m²</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="plan-btn3"><span class="masterplan-btn">+</span>
                    <div class="plan-section-3">
                        <div class="plan-section-title"><span>{{$statics->where('id',20)->first()->title}} {{$buildings[2]->title}} </span></div>
                        <div class="plan-section-content">
                            <table>
                                <thead>

                                </thead>
                                <tbody>
                                <tr>
                                    <td>3 - 6 {{$statics->where('id',27)->first()->title}}</td>
                                    <td>1200 azn/m²</td>
                                </tr>
                                <tr>
                                    <td>7 - 10 {{$statics->where('id',27)->first()->title}}</td>
                                    <td>1250 azn/m²</td>
                                </tr>
                                <tr>
                                    <td>11 - 13 {{$statics->where('id',27)->first()->title}}</td>
                                    <td>1300 azn/m²</td>
                                </tr>
                                <tr>
                                    <td>{{$statics->where('id',38)->first()->title}}</td>
                                    <td>1500 azn/m²</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="plan-btn4"><span class="masterplan-btn">+</span>
                    <div class="plan-section-4">
                        <div class="plan-section-title"><span>{{$statics->where('id',20)->first()->title}} {{$buildings[3]->title}}</span></div>
                        <div class="plan-section-content">
                            <table>
                                <thead>

                                </thead>
                                <tbody>
                                <tr>
                                    <td>3 - 5 {{$statics->where('id',27)->first()->title}}</td>
                                    <td>1200 azn/m²</td>
                                </tr>
                                <tr>
                                    <td>6 - 8 {{$statics->where('id',27)->first()->title}}</td>
                                    <td>1250 azn/m²</td>
                                </tr>
                                <tr>
                                    <td>9 - 11 {{$statics->where('id',27)->first()->title}}</td>
                                    <td>1300 azn/m²</td>
                                </tr>
                                <tr>
                                    <td>{{$statics->where('id',38)->first()->title}}</td>
                                    <td>1500 azn/m²</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="plan-btn5"><span class="masterplan-btn">+</span>
                    <div class="plan-section-5">
                        <div class="plan-section-title"><span>{{$statics->where('id',20)->first()->title}} {{$buildings[4]->title}}</span></div>
                        <div class="plan-section-content">
                            <table>
                                <thead>

                                </thead>
                                <tbody>
                                <tr>
                                    <td>3 - 5 {{$statics->where('id',27)->first()->title}}</td>
                                    <td>1200 azn/m²</td>
                                </tr>
                                <tr>
                                    <td>6 - 8 {{$statics->where('id',27)->first()->title}}</td>
                                    <td>1250 azn/m²</td>
                                </tr>
                                <tr>
                                    <td>9 - 11 {{$statics->where('id',27)->first()->title}}</td>
                                    <td>1300 azn/m²</td>
                                </tr>
                                <tr>
                                    <td>{{$statics->where('id',38)->first()->title}}</td>
                                    <td>1500 azn/m²</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="word w">
        <div class="container">
            <div id="moving-text">{{$company->title}}</div>
        </div>
    </section>

    <section class="developer w" id="developer">
        <div class="container">
            <div class="develop">
                <div class="develop-head">
                    <div class="develop-head-subtitle"><span>{{$menus[8]->name}}</span></div>
                    <div class="develop-head-title"><span> {{$developer->title}}</span></div>
                </div>
                <div class="develop-container w">
                    <div class="develop-image">
                        <img src="{{asset('storage/'.$developer->image)}}" alt="">
                    </div>
                    <div class="develop-content">
                        <div class="develop-context"><span>{!!  $developer->description!!}</span></div>
                        <div class="develop-links">
                            <ul class="develop-link">
{{--                                <li><a href=""><i class="fa-solid fa-book"></i>Construction progress</a></li>--}}
                                <li><a href="{{asset('storage/project.pdf')}}" download><i class="fa-solid fa-folder-open"></i>{{$statics->where('id',4)->first()->title}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

{{--    <section class="team w">--}}
{{--        <div class="container">--}}
{{--            <div class="team-container">--}}
{{--                <div class="team-head"><span>Project team</span></div>--}}
{{--                <div class="team-items">--}}
{{--                    <div class="team-item"><img src="{{asset('assets/image/team.svg')}}" alt=""></div>--}}
{{--                    <div class="team-item"><img src="{{asset('assets/image/team.svg')}}" alt=""></div>--}}
{{--                    <div class="team-item"><img src="{{asset('assets/image/team.svg')}}" alt=""></div>--}}
{{--                    <div class="team-item"><img src="{{asset('assets/image/team.svg')}}" alt=""></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <section class="payment w">
        <div class="container">
            <div class="payment-container">
                <div class="payment-head">
                    <div class="payment-subtitle"><span>{{$statics->where('id',38)->first()->title}}</span></div>
{{--                    <div class="payment-title"><span>KREDIT KALKULYATORU</span></div>--}}
                </div>
                <div class="payment-content">
                    <div class="payment-left">

                        <div class="payment-left-head"><span>{{$statics->where('id',40)->first()->title}}</span></div>

                        <div class="payment-left-body">
                            <div class="pay-body-item">
                                <div class="payment-left-dropdown">
                                    <span>{{$statics->where('id',20)->first()->title}}</span>
                                    <div class="dropdown">
                                        <div class="custom-select">
                                            <select class="select1">
                                                @foreach($buildings as $index=>$built)
                                                <option value="{{$index+1}}">{{$built->title}}{{$statics->where('id',22)->first()->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="payment-left-dropdown">
                                    <span>{{$statics->where('id',22)->first()->title}}</span>
                                    <div class="dropdown">
                                        <div class="custom-select">
                                            <select class="select2">

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="pay-body-item">
                                    <p style="display: block;width: 100%;">{{$statics->where('id',26)->first()->title}}</p>
                                    <br>
                                    <div class="payment-left-dropdown">
                                        <div class="dropdown">

                                            <div class="custom-select">
                                                <select class="select3">

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="payment-left-dropdown">
                                        <div class="dropdown">
                                            <div class="custom-select">
                                                <div class="select-item-text">
                                                    <span>{{$statics->where('id',41)->first()->title}}</span>
                                                    <select class="select4">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pay-body-item">
                                    <div class="payment-left-dropdown">
                                        <div class="dropdown">
                                            <div class="custom-select">
                                                <div class="select-item-text">
                                                    <span>{{$statics->where('id',42)->first()->title}}</span>
                                                    <select class="select5">

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="payment-left-dropdown">
                                        <div class="dropdown">
                                            <div class="custom-select">
                                                <div class="select-item-text">
                                                    <span>{{$statics->where('id',43)->first()->title}}</span>
                                                    <span class="all-price"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="payment-left-button">
                                <button onclick="hesable()" >{{$statics->where('id',44)->first()->title}}</button>
                            </div>
                        </div>

                    </div>

                    <div class="payment-right" >
                        <div class="payment-right-top">
                            <div class="payment-right-top-head"><span>{{$statics->where('id',42)->first()->title}}</span></div>
                            <div class="payment-right-title"><span class="payment-right-price pay-month" >0</span></div>
                        </div>
                        <div class="payment-right-bottom">
                            <div class="payment-right-bottom-item">
                                <p class="payment-right-bottom-item-text">{{$statics->where('id',41)->first()->title}}</p>
                                <div class="payment-bottom-title"><span class="payment-bottom-price pay-first" >0</span></div>
                            </div>
                            <div class="payment-right-bottom-item">
                                <p class="payment-right-bottom-item-text">{{$statics->where('id',45)->first()->title}}</p>
                                <div class="payment-bottom-title"><span class="payment-bottom-price pay-date" >0</span></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <section class="galary w" id="galary">
        <div class="container">
            <div class="galary-slider">
                <div class="galary-head">
                    <span>{{$menus[9]->name}}</span>
                </div>
                <div class="swiper slider-galary">
                    <div class="swiper-wrapper">
                        @foreach($galleries as $gallery)
                        <div class="swiper-slide">
                            <img src="{{asset('storage/'.$gallery->image)}}" alt="">
                        </div>
                            @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </section>


@endsection

