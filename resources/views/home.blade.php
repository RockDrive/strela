@extends('layouts.base')
@section('body-class', 'home')
@section('content')
    @if($Banner["slides"])
        <div class="slider slider_main">
            <ul class="slider__list slick-slider_main">
                @foreach(json_decode($Banner["slides"], true) as $slide)
                    <li class="slider__item">
                        <div class="slider__item-image" data-mob-bg="{{ \Orchid\Attachment\Models\Attachment::find($slide['img'])->url }}"
                             data-desktop-bg="{{ \Orchid\Attachment\Models\Attachment::find($slide['img'])->url }}"></div>
                    </li>
                @endforeach
            </ul>
            <x-travelline.mini :lang="$lang" />
        </div>
    @endif

    <section class="provider provider_style_primary" id="about">
        <div class="provider__container">
            <h1 class="provider__title">
                <a class="link link_unstyled" href="{{ route('about.'.$lang) }}">{{ $About["title_home"] }}</a>
            </h1>
            <div class="provider__information">
                <div class="provider__image">
                    <div class="provider__image-background lazy" data-bgsrc="url('{{ \Orchid\Attachment\Models\Attachment::find($About['picture'])->url }}')"></div>
                </div>
                <div class="provider__description">
                    <p>{!! $About["description"] !!}</p>
                    <a href="{{ route('about.'.$lang) }}" class="provider__more_info_link about__more">{{ $About["more"] }}</a>
                </div>
            </div>
        </div>
    </section>

    <section class="rooms rooms_style_complementary" id="rooms">
        <div class="rooms__container">
            <h2 class="rooms__title">
                <a class="link link_unstyled" href="{{route('booking.'.$lang)}}">{{ $RoomAnons["title"] }}</a>
            </h2>
            <div class="slider slider_category slider_rooms">
                <ul class="slider__list slick-slider_category clearfix">
                    @foreach(json_decode($RoomAnons["rooms"], true) as $room)
                        <li class="slider__item">
                            <div class="slider__item-content room lazy" data-bgsrc="url('{{ \Orchid\Attachment\Models\Attachment::find($room['img'])->url }}')">
                                <div class="slider__item-overlay">
                                    <h3 class="room__title">{{$room["name"]}}</h3>
                                    <div class="room__booking clearfix">
                                        <a class="button button_room" href="{{route('rooms.'.$lang)}}">{{ $RoomAnons["btn"] }}</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    <section class="contacts contacts_style_complementary" id="contacts">
        <div class="contacts__container">
            <h2 class="contacts__title">
                <a class="link link_unstyled" href="{{ route("contacts.".$lang) }}">{{ $Contact["title"] }}</a>
            </h2>
            <div class="contacts__list">
                <div class="contacts__item address">
                    <a href="{{ route("contacts.".$lang) }}" class="address__link">
                        <i class="icon-inmap1 address__icon"></i>
                        <span class="address__text">{{ $Contact["address"] }}</span>
                    </a>
                </div>
                <div class="contacts__item phone phone_list">
                    @php $phone = json_decode($Contact["phones"], true)[1]; @endphp
                    <div class="phone__item">
                        <a href="tel:{{ $phone["phone"] }}" class="phone__link">
                            <i class="icon-phone2 phone__icon"></i>
                            <span class="phone__text">
                                    <span class="phone__number">{{ $phone["phone"] }}</span>
                                    <span class="phone__description">{{ $phone["name"] }}</span>
                                </span>
                        </a>
                    </div>
                    <ul class="messenger__list">
                        <li class="messenger__item">
                            <a href="whatsapp://send?phone={{ $Contact["whatsapp"] }}" class="messenger__link">
                                <i class="icon-whatsapp messenger__icon"></i>
                                <span class="messenger__text">
                                        <span class="messenger__title">WhatsApp:</span>
                                        <span class="messenger__phone">
                                            {{ $Contact["whatsapp"] }}
                                        </span>
                                    </span>
                            </a>
                        </li>
                        <li class="messenger__item">
                            <a href="viber://chat?number={{ $Contact["viber"] }}" class="messenger__link">
                                <i class="icon-viber2 messenger__icon"></i>
                                <span class="messenger__text">
                                        <span class="messenger__title">Viber:</span>
                                        <span class="messenger__phone">{{ $Contact["viber"] }}</span>
                                    </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="contacts__item email">
                    @php $email = json_decode($Contact["emails"], true)[1]; @endphp
                    <div class="email__item">
                        <a class="email__link" href="mailto:{{ $email["email"] }}">
                            <i class="icon-mail3 email__icon"></i>
                            <span class="email__text">
                                <span class="email__mail">{{ $email["email"] }}</span>
                                <span class="email__description">{{ $email["name"] }}</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-contact.map :lang="$lang" type="home" />
@endsection
