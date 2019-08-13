<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>SVETILO.KZ</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">--}}
    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('themes/besmart/css/style.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('css/media.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick-theme.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('themes/besmart/css/jquery.jcarousel.css') }}" type="text/css" media="all" />--}}
    <!--[if IE 6]><link rel="stylesheet" href="{{ asset('themes/besmart/css/ie6.css') }}" type="text/css" media="all" /><![endif]-->
    <link rel="shortcut icon" href="{{ asset('themes/besmart/css/images/favicon.ico') }}" />
{{--    <script type="text/javascript" src="{{ asset('themes/besmart/js/jquery-1.4.2.min.js') }}"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/besmart/js/jquery.jcarousel.pack.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/besmart/js/func.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/slick.js') }}"></script>
</head>
<body>
<div class="shell">
    <div id="top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header_phone">
                        <a href="tel:+77777941654">
                            <i class="fa fa-phone-square" style="font-size: 16px;"></i>&nbsp; +7 777 794 1654
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="logo">
                        <h1 id="logo">
                            <a href="{{ route('home') }}" class="notext">beSMART</a>
                        </h1>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="header-search">
                        <form action="{{ route('search') }}" method="post">
                            @csrf
                            <input type="text" class="form-control search_input" name="search" placeholder="Поиск по каталогу товаров...">
                            <button type="submit" name="search_btn" class="btn btn-primary search_btn">Найти</button>
                        </form>
                    </div>
                </div>

                <div class="col-md-3">
                    @if($agent->isMobile())
                        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-top: 60px;">
                            <a class="navbar-brand" href="#">Меню</a>
                            <button style="display: block" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <input type="hidden" id="toggle_ht" value="0">

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ route('home') }}">Главная <span class="sr-only">(current)</span></a>
                                    </li>
                                    @foreach($pages as $page)
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('page.view', ['alias' => $page->alias]) }}">{{ $page->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </nav>
                    @endif
                </div>

                {{--<div class="col-md-3">
                    <div class="socials right">
                        <ul>
                            @if(Auth::check())
                                <li><a href="#"><i class="fa fa-user"></i>&nbsp;Личный кабинет</a></li>
                                <li><a href="{{ url('logout') }}"><i class="fa fa-sign-out"></i>&nbsp;Выход</a></li>
                            @else
                                <li><a href="{{ route('register') }}"><i class="fa fa-user-plus"></i>&nbsp;Регистрация</a></li>
                                <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i>&nbsp;Вход</a></li>
                            @endif

                            @if(\App\Classes\ShoppingCart::hasProducts())
                                <li><a href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart"></i><sup>{{ \App\Classes\ShoppingCart::getCountItems() }}</sup>&nbsp;Корзина</a></li>
                            @endif
                        </ul>
                    </div>
                </div>--}}
            </div>
        </div>
    </div>

    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @if($agent->isDesktop())
                    <div class="catalog">
                        <div class="catalog-title sb_title">
                            <i class="fas fa-bars"></i>&nbsp;КАТАЛОГ
                        </div>
                        <ul class="catalog-list">
                            @foreach($cats as $cat)
                                @if(count($cat->children) != 0)
                                    <li>
                                        <a class="m-link" href="{{ $cat->url() }}">{{ $cat->title }}</a>
                                        <span class="plus" data-id="{{ $cat->id }}"><i class="fas fa-plus"></i></span>
                                        <ul class="ul-child-items item{{ $cat->id }}">
                                            @foreach($cat->children as $child)
                                                <li><a class="m-link-c" href="{{ $child->url() }}">{{ $child->title }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li><a href="{{ $cat->url() }}">{{ $cat->title }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    @section('filters')

                    @show

                    <div class="sidebar_contacts">
                        <div class="sd_contact_title sb_title">
                            <i class="fas fa-address-book"></i>&nbsp;КОНТАКТЫ
                        </div>

                        <div class="sb_div">
                            <span class="sb_div_t">Компания</span><br>
                            <span>Svetilo.kz</span>
                        </div>

                        <div class="sb_div">
                            <span class="sb_div_t">Адрес</span> <br>
                            <span>г. Алматы, ул. Брусиловского 107Б</span>
                        </div>

                        <div class="sb_div">
                            <span class="sb_div_t">Телефоны</span> <br>
                            <span><a href="tel:+77777941654">+7 777 794 1654</a></span>
                        </div>

                        <div class="sb_div">
                            <span class="sb_div_t">Email</span> <br>
                            <span><a href="mailto:ibraemovm@gmail.com">ibraemovm@gmail.com</a></span>
                        </div>
                    </div>

                    <div class="work_grafic">
                        <div class="sb_title">
                            <i class="far fa-calendar-alt"></i>&nbsp;ГРАФИК РАБОТЫ
                        </div>

                        <ul class="cs-sked__table">
                            <li class="cs-sked__row">
                                <div class="cs-sked__cell"><span class="cs-sked__day">Понедельник</span></div>
                                <div class="cs-sked__cell">
                                    <span class="cs-sked__time">09:00</span>&nbsp;-&nbsp;
                                    <span class="cs-sked__time">20:00</span>
                                </div>
                            </li>
                            <li class="cs-sked__row">
                                <div class="cs-sked__cell">
                                    <span class="cs-sked__day">Вторник</span>
                                </div><div class="cs-sked__cell">
                                    <span class="cs-sked__time">09:00</span>&nbsp;-&nbsp;
                                    <span class="cs-sked__time">20:00</span>
                                </div>
                            </li>
                            <li class="cs-sked__row">
                                <div class="cs-sked__cell">
                                    <span class="cs-sked__day">Среда</span>
                                </div>
                                <div class="cs-sked__cell">
                                    <span class="cs-sked__time">09:00</span>&nbsp;-&nbsp;
                                    <span class="cs-sked__time">20:00</span>
                                </div>
                            </li>
                            <li class="cs-sked__row">
                                <div class="cs-sked__cell">
                                    <span class="cs-sked__day">Четверг</span>
                                </div><div class="cs-sked__cell">
                                    <span class="cs-sked__time">09:00</span>&nbsp;-&nbsp;
                                    <span class="cs-sked__time">20:00</span>
                                </div>
                            </li>
                            <li class="cs-sked__row">
                                <div class="cs-sked__cell">
                                    <span class="cs-sked__day">Пятница</span>
                                </div>
                                <div class="cs-sked__cell">
                                    <span class="cs-sked__time">09:00</span>&nbsp;-&nbsp;
                                    <span class="cs-sked__time">20:00</span>
                                </div>
                            </li>
                            <li class="cs-sked__row">
                                <div class="cs-sked__cell">
                                    <span class="cs-sked__day">Суббота</span>
                                </div>
                                <div class="cs-sked__cell">
                                    <span class="cs-sked__time">09:00</span>&nbsp;-&nbsp;
                                    <span class="cs-sked__time">18:00</span>
                                </div>
                            </li>
                            <li class="cs-sked__row">
                                <div class="cs-sked__cell">
                                    <span class="cs-sked__day">Воскресенье</span>
                                </div>
                                <div class="cs-sked__cell">
                                    <span class="cs-sked__time">Выходной</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    @endif
                </div>

                <div class="col-md-9">
                    @if($agent->isDesktop())
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('home') }}">Главная <span class="sr-only">(current)</span></a>
                                </li>
                                @foreach($pages as $page)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('page.view', ['alias' => $page->alias]) }}">{{ $page->title }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </nav>
                    @endif

                    @if($hasSlider)
                        <div class="slider">
                            <div class="item">
                                <img src="{{ asset('uploads/slider/slide1.jpg') }}" alt="" />
                            </div>
                            <div class="item">
                                <img src="{{ asset('uploads/slider/slide2.jpg') }}" alt="" />
                            </div>
                            <div class="item">
                                <img src="{{ asset('uploads/slider/slide3.jpg') }}" alt="" />
                            </div>
                            <div class="item">
                                <img src="{{ asset('uploads/slider/slide4.jpg') }}" alt="" />
                            </div>
                        </div>
                    @endif

                    <div id="main" style="width: 100%;">
                        <div id="content" class="left" style="padding-bottom: 20px; margin-top: 10px;">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="footer">
        <p class="left">Svetilo.kz &copy; 2019. Все правы защищены</p>
        <div class="cl"></div>
    </div>

    <div class="whatsapp" style="bottom: 80px; right: 20px; position: fixed;">
        <a href="tel:+77777941654">
            <img src="img/call.png" width="53">
        </a>
    </div>
</div>
{{--<script src="//code.jivosite.com/widget.js" jv-id="1QZp71yzLz" async></script>--}}
<!-- WhatsHelp.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+77777941654", // WhatsApp number
            // call: "+77777941654", // Call phone number
            company_logo_url: "//static.whatshelp.io/img/flag.png", // URL of company logo (png, jpg, gif)
            greeting_message: "Здравствуйте! Отправьте нам сообщение через любой из мессенджеров.", // Text of greeting message
            call_to_action: "Напишите нам", // Call to action
            button_color: "#A8CE50", // Color of button
            position: "right", // Position may be 'right' or 'left'
            order: "whatsapp,call", // Order of buttons
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /WhatsHelp.io widget -->
<script type="text/javascript">
    $('.plus').toggle(function(){
        var id = $(this).attr('data-id');
        $('.item'+id).show();
        $(this).html("<i class='fas fa-minus'></i>");
    }, function(){
        var id = $(this).attr('data-id');
        $('.item'+id).hide();
        $(this).html("<i class='fas fa-plus'></i>");
    });
    /*$('.navbar-toggler').toggle(function(){
        $('.slider').css({'margin-top' : '200px'});
    }, function(){
        $('.slider').css({'margin-top' : '0px'});
    });*/
    /*$('.navbar-toggler').click(function(){
        var toggle_ht = $('#toggle_ht').val();
        if (toggle_ht == 0) {
            $('.slider').css({'margin-top' : '200px'});
            $('#toggle_ht').val(1);
        } else {
            $('.slider').css({'margin-top' : '0px'});
            $('#toggle_ht').val(0);
        }
    });*/
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.slider').slick({
            autoplay: true,
            arrows : false,
            dots : true,
        });
    });
</script>
</body>
</html>
