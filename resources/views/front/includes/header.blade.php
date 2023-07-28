<header class="w"  id="headers">
    <div class="container">
        <div class="header">
            <div class="header-top">
                <div class="header-menu">
                    <div class="header-menu-left">
                        <div class="header-menu-left-button" onclick="menubar()" id="header-menu-left-button">
                            <i class="fa-solid fa-bars"></i>
                            <span>{{$statics->where('id',8)->first()->title}}</span>
                        </div>
                        <div class="header-menu-left-item">
                            <a href="{{route('cards')}}" style="color: white">   <span>{{$statics->where('id',6)->first()->title}}</span></a>
                        </div>
                    </div>
                    <div class="header-menu-right">
                        <div class="header-menu-right-phone"><a href="tel:{{ str_replace(['.', '(', ')',' ','-'], '', $setting->phone)}}">{{$setting->phone}}</a> </div>
                        <div class="header-menu-right-call-button">
                            <button ><a href="#contact-section"><i class="fa-solid fa-phone header-menu-right-call-icon"></i><span class="header-menu-right-call-btn">{{$statics->where('id',7)->first()->title}}</span></a></button>
                        </div>
                        <div class="language-items" style="width:200px;">
                            <select onchange="location = this.value;" class="language-dropdown">
                                @foreach(config('app.languages') as $lang)
                                    <option value="{{route('calc',$lang)}}" @if($lang==app()->getLocale()) selected @endif>{{$lang}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="header-top-title"><a href="{{route('home-index')}}">{{$company->title}}</a></div>
            </div>
        </div>
    </div>
    <div class="menu-bar w" id="menu-bar">
        <div class="menu-bar-top">
            <div class="menu-bar-image">
                <img src="{{asset('assets/image/menu-bar-image.png')}}" alt="">
            </div>
            <div class="menu-bar-content">
                <div class="menu-bar-title">
                    <span>{{$statics->where('id',1)->first()->title}}</span>
                </div>
                <div class="menu-bar-items">
                    <ul class="menu-items">
                        @foreach($menus as $menu)
                            <li class="menu-item"><a href="{{$menu->url}}">{{$menu->name}}</a> </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="menu-bar-bottom">
            <div class="menu-bar-bottom-context">
                <div class="menu-bar-bottom-title">
                    <span>{{$statics->where('id',2)->first()->title}}</span>
                </div>
                <div class="menu-bar-bottom-content">
                    <ul class="menu-bar-bottom-content-items">
                        <li class="border-none"><span><a href="">{{$statics->where('id',3)->first()->title}}<i class="fa-solid fa-building"></i></a></span></li>
                        <li><span><a href="{{asset('storage/project.pdf')}}" download> {{$statics->where('id',4)->first()->title}}<i class="fa-solid fa-folder-open"></i></a></span></li>
                    </ul>
                </div>
            </div>
            <div class="menu-bar-bottom-context">
                <div class="menu-bar-bottom-title">
                    <span>{{$statics->where('id',5)->first()->title}}</span>
                </div>
                <div class="menu-bar-bottom-content">
                    <ul class="menu-bar-bottom-content-items">
                        <li><span><a href="mailto: {{$setting->email}}"> {{$setting->email}}</a> </span></li>
                        <li><span><a href="tel:+{{ str_replace(['.', '(', ')',' ','-'], '', $setting->phone)}}"> {{$setting->phone}}</a></span></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</header>


