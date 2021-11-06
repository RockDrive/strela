@extends('layouts.base')
@section('content')
    <x-travelline.panel/>

    <section class="provider provider_style_primary">
        <div class="provider__container">

            <h1 class="provider__title">Фотогалерея - Strela, г. Ялта</h1>

            <div class="photos">
                <ul class="photos__groups-list"></ul>

                <ul class="photos__list">

                    <li class="photos__item">
                        <a class="photos__link js-fancybox" data-fancybox-group="general_photos" href="{{ asset('img/photos-item.jpg') }}">
                            <img class="photos__image lazy" data-src="{{ asset('img/photos-item.jpg') }}">
                        </a>
                    </li>

                    <li class="photos__item">
                        <a class="photos__link js-fancybox" data-fancybox-group="general_photos" href="{{ asset('img/photos-item.jpg') }}">
                            <img class="photos__image lazy" data-src="{{ asset('img/photos-item.jpg') }}">
                        </a>
                    </li>

                    <li class="photos__item">
                        <a class="photos__link js-fancybox" data-fancybox-group="general_photos" href="{{ asset('img/photos-item.jpg') }}">
                            <img class="photos__image lazy" data-src="{{ asset('img/photos-item.jpg') }}">
                        </a>
                    </li>

                    <li class="photos__item">
                        <a class="photos__link js-fancybox" data-fancybox-group="general_photos" href="{{ asset('img/photos-item.jpg') }}">
                            <img class="photos__image lazy" data-src="{{ asset('img/photos-item.jpg') }}">
                        </a>
                    </li>

                    <li class="photos__item">
                        <a class="photos__link js-fancybox" data-fancybox-group="general_photos" href="{{ asset('img/photos-item.jpg') }}">
                            <img class="photos__image lazy" data-src="{{ asset('img/photos-item.jpg') }}">
                        </a>
                    </li>

                    <li class="photos__item">
                        <a class="photos__link js-fancybox" data-fancybox-group="general_photos" href="{{ asset('img/photos-item.jpg') }}">
                            <img class="photos__image lazy" data-src="{{ asset('img/photos-item.jpg') }}">
                        </a>
                    </li>

                    <li class="photos__item">
                        <a class="photos__link js-fancybox" data-fancybox-group="general_photos" href="{{ asset('img/photos-item.jpg') }}">
                            <img class="photos__image lazy" data-src="{{ asset('img/photos-item.jpg') }}">
                        </a>
                    </li>

                    <li class="photos__item">
                        <a class="photos__link js-fancybox" data-fancybox-group="general_photos" href="{{ asset('img/photos-item.jpg') }}">
                            <img class="photos__image lazy" data-src="{{ asset('img/photos-item.jpg') }}">
                        </a>
                    </li>

                    <li class="photos__item">
                        <a class="photos__link js-fancybox" data-fancybox-group="general_photos" href="{{ asset('img/photos-item.jpg') }}">
                            <img class="photos__image lazy" data-src="{{ asset('img/photos-item.jpg') }}">
                        </a>
                    </li>

                    <li class="photos__item">
                        <a class="photos__link js-fancybox" data-fancybox-group="general_photos" href="{{ asset('img/photos-item.jpg') }}">
                            <img class="photos__image lazy" data-src="{{ asset('img/photos-item.jpg') }}">
                        </a>
                    </li>

                    <li class="photos__item">
                        <a class="photos__link js-fancybox" data-fancybox-group="general_photos" href="{{ asset('img/photos-item.jpg') }}">
                            <img class="photos__image lazy" data-src="{{ asset('img/photos-item.jpg') }}">
                        </a>
                    </li>

                    <li class="photos__item">
                        <a class="photos__link js-fancybox" data-fancybox-group="general_photos" href="{{ asset('img/photos-item.jpg') }}">
                            <img class="photos__image lazy" data-src="{{ asset('img/photos-item.jpg') }}">
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </section>
@endsection
