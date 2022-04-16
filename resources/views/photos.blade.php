@extends('layouts.base')
@section('content')
    <x-travelline.panel :lang="$lang" />

    <section class="provider provider_style_primary">
        <div class="provider__container">

            <h1 class="provider__title">{{ $Photo["title"] }}</h1>

            <div class="photos">
                <ul class="photos__groups-list"></ul>
                <ul class="photos__list">
                    @foreach(json_decode($Photo["photos"], true) as $photo)
                        <li class="photos__item">
                            <a class="photos__link js-fancybox" data-fancybox-group="general_photos" href="{{ \Orchid\Attachment\Models\Attachment::find($photo['img'])->url }}">
                                <img class="photos__image lazy" data-src="{{ \Orchid\Attachment\Models\Attachment::find($photo['img'])->url }}">
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endsection
