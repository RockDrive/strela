@extends('layouts.base')
@section('content')
    <x-travelline.panel/>

    <section class="contacts contacts_inner contacts_style_primary" id="contacts">
        <div class="contacts__container contacts__container_type_horizontal">

            <h1 class="contacts__title">Контакты</h1>

            <ul class="contacts__list">

                <li class="contacts__item">
                    <div class="address address_inner">
                        <div class="address__container">
                            <div class="address__link js-anchor" data-anchor-id="map">
                                <i class="icon-inmap1 address__icon"></i>
                                <span class="address__text">Республика Крым, г. Ялта, ул. Вергасова, 7</span>
                            </div>
                        </div>

                        <div class="address__coordinates">
                            <span class="address__coordinates-title">GPS-координаты:</span><br/>Широта: 44.511892<br/>Долгота: 34.167194
                        </div>
                    </div>
                </li>

                <li class="contacts__item">
                    <ul class="phone phone_inner">
                        <li class="phone__item">
                            <a href="#" class="phone__link">
                                <i class="icon-phone2 phone__icon"></i>
                                <span class="phone__text">
                                <span class="phone__number">&#43;79870601050</span>
                                <span class="phone__description">Ресепшн</span>
                            </span>
                            </a>
                        </li>

                        <li class="phone__item">
                            <a href="#" class="phone__link">
                                <i class="icon-phone2 phone__icon"></i>
                                <span class="phone__text">
                                <span class="phone__number">&#43;79789610062</span>
                                <span class="phone__description">Ресепшн</span>
                            </span>
                            </a>
                        </li>

                        <li class="phone__item">
                            <a href="#" class="phone__link">
                                <i class="icon-phone2 phone__icon"></i>
                                <span class="phone__text">
                                <span class="phone__number">&#43;79870615421</span>
                            </span>
                            </a>
                        </li>
                    </ul>

                    <ul class="messenger__list">
                        <li class="messenger__item">
                            <a href="#" class="messenger__link">
                                <i class="icon-whatsapp messenger__icon"></i>
                                <span class="messenger__text">
                                <span class="messenger__title">WhatsApp:</span>
                                <span class="messenger__phone">&#43;79789610062</span>
                            </span>
                            </a>
                        </li>

                        <li class="messenger__item">
                            <a href="#" class="messenger__link">
                                <i class="icon-viber2 messenger__icon"></i>
                                <span class="messenger__text">
                                <span class="messenger__title">Viber:</span>
                                <span class="messenger__phone">&#43;79789610062</span>
                            </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="contacts__item contacts__item_email email email_inner">
                    <ul class="email__list">
                        <li class="email__item">
                            <a class="email__link" href="#">
                                <i class="icon-mail3 email__icon"></i>
                                <span class="email__text">
                                <span class="email__mail">hotelstrela@yandex.ru</span>
                                <span class="email__description">Отдел продаж</span>
                            </span>
                            </a>
                        </li>
                    </ul>

                    <div class="remainder">
                        <i class="icon-bell remainder__icon"></i>
                        <div class="reminder__text">
                            <p class="remainder__description">У вас нет времени на телефонные звонки? Хотите заказать номер максимально быстро и с уверенностью в том, что он точно будет готов для Вас в назначенное время? Воспользуйтесь формой онлайн-бронирования и получайте самые актуальные цены!</p>
                            <a class="remainder__button" href="booking.html">Забронировать</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <div class="provider contacts_inner provider_style_primary">
        <div class="provider__container">

            <h2 class="contacts__title">Местоположение и маршрут проезда</h2>
            <p class="contacts__description-text text-with-nl text-left-align"></p>

            <br/>
            <br/>

            <section class="map map_inner map_with-padding" id="map">
                <div class="map__container" id="map-yandex"></div>
            </section>

        </div>
    </div>
@endsection
