@extends('layouts.base')
@section('content')
    <section class="provider provider_style_primary">
        <div class="provider__container provider__container_booking">
            <h1 class="provider__title">{{ $Room["title"] }}</h1>
            <div class="booking__description">
                <p class="text-with-nl text-left-align">{!! $Room["description"] !!}</p>
            </div>
            <x-travelline.rooms :lang="$lang" />
        </div>
    </section>
@endsection
