<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>SVETILO.KZ</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/besmart/css/style.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('themes/besmart/css/jquery.jcarousel.css') }}" type="text/css" media="all" />
    <!--[if IE 6]><link rel="stylesheet" href="{{ asset('themes/besmart/css/ie6.css') }}" type="text/css" media="all" /><![endif]-->
    <link rel="shortcut icon" href="{{ asset('themes/besmart/css/images/favicon.ico') }}" />
    <script type="text/javascript" src="{{ asset('themes/besmart/js/jquery-1.4.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/besmart/js/jquery.jcarousel.pack.js') }}"></script>
    <script type="text/javascript" src="{{ asset('themes/besmart/js/func.js') }}"></script>
</head>
<body>
<div class="shell">
    <div class="border">
        <div id="header">
            <h1 id="logo">
                <a href="{{ route('home') }}" class="notext">beSMART</a>
            </h1>
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
            <div class="cl">&nbsp;</div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <div class="container">
                    <div class="catalog" style="background: #f8f8f8;">
                        <div class="catalog-title" style="font-size: 20px;">Категории</div>
                        <hr>
                        <div>
                            <ul class="catalog-list" style="font-size: 16px;">
                                @foreach($cats as $cat)
                                    <li><a href="{{ $cat->url() }}">{{ $cat->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-10">
                <div id="navigation">
                    <ul>
                        <li><a href="{{ route('home') }}">Главная</a></li>
                        @foreach($pages as $page)
                        <li><a href="{{ route('page.view', ['alias' => $page->alias]) }}">{{ $page->title }}</a></li>
                        @endforeach
                    </ul>
                    <div class="cl">&nbsp;</div>
                </div>
                @if($hasSlider)
                <div class="slider">
                    <div class="slider-nav"> <a href="#" class="left notext">1</a> <a href="#" class="left notext">2</a> <a href="#" class="left notext">3</a> <a href="#" class="left notext">4</a>
                        <div class="cl">&nbsp;</div>
                    </div>
                    <ul>
                        <li>
                            <div class="item">
                                <img src="{{ asset('uploads/slider/slide1.jpg') }}" alt="" />
                            </div>
                        </li>
                        <li>
                            <div class="item">
                                <img src="{{ asset('uploads/slider/slide2.jpg') }}" alt="" />
                            </div>
                        </li>
                        <li>
                            <div class="item">
                                <img src="{{ asset('uploads/slider/slide3.jpg') }}" alt="" />
                            </div>
                        </li>
                        <li>
                            <div class="item">
                                <img src="{{ asset('uploads/slider/slide4.jpg') }}" alt="" />
                            </div>
                        </li>
                    </ul>
                </div>
                @endif

                <div id="main" style="width: 100%;">
                    <div id="content" class="left" style="padding-bottom: 20px;">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <div class="shadow-l"></div>
        <div class="shadow-r"></div>
        <div class="shadow-b"></div>
    </div>
    <div id="footer">
        <p class="left">Copyright &copy; 2010, Your Company Here, All Rights Reserved</p>
        <p class="right">Design by <a href="http://chocotemplates.com">Chocotemplates.com</a></p>
        <div class="cl"></div>
    </div>
</div>
</body>
</html>
