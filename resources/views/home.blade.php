@extends('layouts.base')
@section('body-class', 'home')
@section('content')
    <div class="slider slider_main">
        <ul class="slider__list slick-slider_main">
            @foreach($slides as $slide)
                <li class="slider__item">
                    <div class="slider__item-image" data-mob-bg="{{ $slide['src_mob'] }}" data-desktop-bg="{{ $slide['src'] }}"></div>
                </li>
            @endforeach
        </ul>
        <x-travelline.mini/>
    </div>

    <section class="provider provider_style_primary" id="about">
        <div class="provider__container">
            <h1 class="provider__title">
                <a class="link link_unstyled" href="{{ route('about') }}">{{ $about["title"] }}</a>
            </h1>
            <div class="provider__information">
                <div class="provider__image">
                    <div class="provider__image-background lazy" data-bgsrc="url('{{ $about["src"] }}')"></div>
                </div>
                <div class="provider__description">
                    <p>{{ $about["text"] }}</p>
                    <a href="{{ route('about') }}" class="provider__more_info_link about__more">Подробнее</a>
                </div>
            </div>
        </div>
    </section>

    <section class="rooms rooms_style_complementary" id="rooms">
        <div class="rooms__container">
            <h2 class="rooms__title">
                <a class="link link_unstyled" href="{{route('booking')}}">{{ $rooms["title"] }}</a>
            </h2>
            <x-travelline.room-slider/>
        </div>
    </section>

    <section class="contacts contacts_style_complementary" id="contacts">
        <div class="contacts__container">
            <h2 class="contacts__title">
                <a class="link link_unstyled" href="{{ route("contacts") }}">{{ $contacts["title"] }}</a>
            </h2>
            <div class="contacts__list">
                <div class="contacts__item address">
                    <a href="{{ route("contacts") }}" class="address__link">
                        <i class="icon-inmap1 address__icon"></i>
                        <span class="address__text">{{ $contacts["address"] }}</span>
                    </a>
                </div>
                <div class="contacts__item phone phone_list">
                    <div class="phone__item">
                        <a href="tel:{{ $contacts["phone"] }}" class="phone__link">
                            <i class="icon-phone2 phone__icon"></i>
                            <span class="phone__text">
                                <span class="phone__number">{{ $contacts["phone"] }}</span>
                                <span class="phone__description">Ресепшн</span>
                            </span>
                        </a>
                    </div>
                    <ul class="messenger__list">
                        <li class="messenger__item">
                            <a href="{{ $contacts["phone_wa"] }}" class="messenger__link">
                                <i class="icon-whatsapp messenger__icon"></i>
                                <span class="messenger__text">
                                    <span class="messenger__title">WhatsApp:</span>
                                    <span class="messenger__phone">
                                        {{ $contacts["phone_wa"] }}
                                    </span>
                                </span>
                            </a>
                        </li>
                        <li class="messenger__item">
                            <a href="{{ $contacts["phone_vi"] }}" class="messenger__link">
                                <i class="icon-viber2 messenger__icon"></i>
                                <span class="messenger__text">
                                    <span class="messenger__title">Viber:</span>
                                    <span class="messenger__phone">{{ $contacts["phone_vi"] }}</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="contacts__item email">
                    <div class="email__item">
                        <a class="email__link" href="mailto:{{ $contacts["mail"] }}">
                            <i class="icon-mail3 email__icon"></i>
                            <span class="email__text">
                            <span class="email__mail">{{ $contacts["mail"] }}</span>
                            <span class="email__description">Отдел продаж</span>
                        </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="map">
        <div class="map__container" id="map-yandex"></div>
        <div class="button button_anchor button_anchor_map shown" data-anchor-id="about"><i class="icon-arrow5"></i></div>
    </section>
@endsection
