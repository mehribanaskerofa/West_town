<footer>
    <ul class="footer-contact">
        <li class="logo-img"><img src="{{asset('assets/image/logo_small.svg')}}" alt=""></li>
        <div class="inner-footer-contact">
            <li><a href="mailto:{{$setting->email}}">{{$setting->email}}</a></li>
            <li class="logo-img-middle">{{\Illuminate\Support\Str::upper($setting->icon)}}</li>
            <li><a href="tel:+{{ str_replace(['.', '(', ')',' ','-'], '', $setting->phone)}}">{{$setting->phone}}</a></li>
        </div>
    </ul>
    <div class="footer-main">
        <div class="footer-content">
            <div class="content-up">
                <ul class="left-section">
                    @foreach($menus->take(5) as $menu)
                        <li class="menu-item"><a href="{{$menu->url}}">{{$menu->name}}</a> </li>
                    @endforeach
                </ul>
                <ul class="right-section">
                    @foreach($menus->skip(5)->take(5) as $menu)
                        <li class="menu-item"><a href="{{$menu->url}}">{{$menu->name}}</a> </li>
                    @endforeach
                </ul>

            </div>
            <div class="main-web-file">
                <p class="res-file">Lorem, ipsum dolor.</p>
                <ul class="web-file">
                    <li><a href="#">{{$statics->where('id',3)->first()->title}}<i class="fa-solid fa-building"></i></a></li>
                    <li><a href="#">{{$statics->where('id',4)->first()->title}}<i class="fa-solid fa-folder-open"></i></a></li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="footer-request">
            <div class="request-text">
                <p> {{$statics->where('id',16)->first()->title}} </p>
            </div>
            <div class="button"><a href="#contact-section">{{$statics->where('id',7)->first()->title}}</a></div>
        </div>
    </div>
    <hr>
    <div class="footer-last-sect">
        <ul>
            <li>© {{$setting->icon}}</li>
            <li>{{$statics->where('id',17)->first()->title}}</li>
        </ul>
        <ul class="privacy-sect">
            <li><a href="https://jugaad.az/">Jugaad</a></li>
        </ul>
    </div>
</footer>
