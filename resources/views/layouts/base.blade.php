@php App::setLocale($lang); @endphp
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @section('head')
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.png') }}">
        <title>{{($seo->title) ? $seo->title : "Отель Стрела в г. Ялте - официальный сайт"}}</title>
        <meta name="description" content="{{($seo->description) ? $seo->description : "Недорогой отель в Ялте. Узнайте цены на номера.  Отель расположен в 400 метрах от автовокзала Ялты"}}">
        <meta property="og:type" content="place">
        <meta property="og:title" content="@yield('og:title', 'Отель &#34;Стрела&#34;')">
        <meta property="og:url" content="@yield('og:url', '')">
        <meta property="og:image" content="{{ asset('img/og-image.png') }}">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans%3A400%2C700&subset=cyrillic&ver=4.7.2' type='text/css' media='all'/>
        <link rel='stylesheet' href='{{ asset('js/vendor/fancybox/source/jquery.fancybox.css') }}' type='text/css' media='all'/>
        <link rel='stylesheet' href='{{ asset('css/global.css') }}' type='text/css' media='all'/>
        <link rel='stylesheet' href='{{ asset('css/style.css') }}' type='text/css' media='all'/>
    @endsection
    @yield('head')
</head>
<body class="@yield('body-class', 'page')">

@section('header')
    <header class="header header_page_inner" role="banner" data-fixed="true">
        <div class="header__container">

            <div class="header__content">
                @section('headBar')
                    <div class="header__bar">
                        <div class="h1 header__title">
                            <a href="{{ route('home.'.$lang) }}" class="header__link">{{ $Header["site_name"] }}</a>
                        </div>

                        <div class="phone phone_header">
                            <a href="tel:{{ json_decode($Contact["phones"], true)[1]["phone"] }}" class="phone__link">
                                <i class="icon-phone2 phone__icon"></i>
                                <span class="phone__text"><b>{{ json_decode($Contact["phones"], true)[1]["phone"] }}</b></span>
                            </a>
                        </div>
                    </div>
                @show
                @section('headMenu')
                    <div class="header__menu">
                        <div class="header__navigation">
                            <div class="button button_menu js-button-menu">
                                <i class="button__icon icon-menu1"></i>
                                <span class="button__title">Меню</span>
                            </div>
                            <x-menu.main/>
                        </div>
                        <x-menu.languages/>
                    </div>
                @show
            </div>
        </div>
    </header>
@show

@section('big-content')
    @yield('content')
@show

@section('footer')
    <footer class="footer">
        <div class="footer__container">
            <div class="button button_on_footer button_visible button_anchor" data-anchor-id="about"><i class="icon-arrow5"></i></div>
            <ul class="footer__list">
                <li class="footer__item copyright">
                    <div class="copyright__hotel">{{ $Footer["copyright_hotel"] }}</div>
                    <div class="copyright__official">{{ $Footer["copyright_official"] }}</div>
                </li>
                <li class="footer__item payment-methods payment-methods_footer">
                    <i class="icon-moneypay payment-methods__icon"></i>
                    <a class="payment-methods__link" href="{{ route('requisites.'.$lang) }}">{{ $Footer["menu_title"] }}</a>
                </li>
                <li class="footer__item address address_footer">
                    <a class="address__link" href="{{ route('contacts.'.$lang) }}">
                        <i class="icon-inmap1 address__icon"></i>
                        <span class="address__text">{{ $Contact["address"] }}</span>
                    </a>
                </li>
                <li class="footer__item societal">
                    <div class="societal__list">
                        <a href="{{ url($Contact["instagram"]) }}" target="_blank" class="societal__item societal__item_instagram">
                            <i class="icon-instagram societal__icon"></i>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </footer>
@show

@section('footerScripts')
    <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type='text/javascript' src='{{ asset('js/vendor/slick/slick.min.js@r=4.7.2') }}'></script>
    <script type='text/javascript' src='{{ asset('js/vendor/fancybox/source/jquery.fancybox.pack.js@v=2.1.5&r=4.7.2') }}'></script>
    <script type='text/javascript' src='{{ asset('js/common.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('js/main.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('js/map.js') }}'></script>
    <script type='text/javascript' src='{{ asset('js/custom.js') }}'></script>
@show

</body>
</html>
