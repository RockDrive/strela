@extends('layouts.base')
@section('content')
    <x-travelline.panel :lang="$lang" />

    <section class="contacts contacts_inner contacts_style_primary" id="contacts">
        <div class="contacts__container contacts__container_type_horizontal">

            <h1 class="contacts__title">{{ $Contact["title"] }}</h1>

            <ul class="contacts__list">

                <li class="contacts__item">
                    <div class="address address_inner">
                        <div class="address__container">
                            <div class="address__link js-anchor" data-anchor-id="map">
                                <i class="icon-inmap1 address__icon"></i>
                                <span class="address__text">{{ $Contact["address"] }}</span>
                            </div>
                        </div>

                        <div class="address__coordinates">
                            <span class="address__coordinates-title">{{ $Contact["coordinate_title"] }}:</span><br/>
                            {{ $Contact["map_lat_title"] }}: {{ $Contact["map_lat"] }}<br/>
                            {{ $Contact["map_lng_title"] }}: {{ $Contact["map_lng"] }}<br/>
                        </div>
                    </div>
                </li>

                <li class="contacts__item">
                    <ul class="phone phone_inner">
                        @foreach(json_decode($Contact["phones"], true) as $phone)
                            <li class="phone__item">
                                <a href="tel:{{$phone["phone"]}}" class="phone__link">
                                    <i class="icon-phone2 phone__icon"></i>
                                    <span class="phone__text">
                                <span class="phone__number">{{$phone["phone"]}}</span>
                                <span class="phone__description">{{$phone["name"]}}</span>
                            </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <ul class="messenger__list">
                        <li class="messenger__item">
                            <a href="whatsapp://send?phone={{ $Contact["whatsapp"] }}" class="messenger__link">
                                <i class="icon-whatsapp messenger__icon"></i>
                                <span class="messenger__text">
                                <span class="messenger__title">WhatsApp:</span>
                                <span class="messenger__phone">{{ $Contact["whatsapp"] }}</span>
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
                </li>

                <li class="contacts__item contacts__item_email email email_inner">
                    <ul class="email__list">
                        @foreach(json_decode($Contact["emails"], true) as $email)
                            <li class="email__item">
                                <a class="email__link" href="mailto:{{ $email["email"] }}">
                                    <i class="icon-mail3 email__icon"></i>
                                    <span class="email__text">
                                <span class="email__mail">{{ $email["email"] }}</span>
                                <span class="email__description">{{ $email["name"] }}</span>
                            </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="remainder">
                        <i class="icon-bell remainder__icon"></i>
                        <div class="reminder__text remainder__description">
                            {!! $Contact["booking"] !!}<br>
                            <a class="remainder__button" href="{{ route('booking.'.$lang) }}">{{ $Contact["booking_title"] }}</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <div class="provider contacts_inner provider_style_primary">
        <div class="provider__container">
            <h2 class="contacts__title">{!! $Contact["map_title"] !!}</h2>
            <p class="contacts__description-text text-with-nl text-left-align"></p>
            <br/>
            <br/>
            <x-contact.map :lang="$lang" type="contact" />
        </div>
    </div>
@endsection
