@extends('layouts.base')
@section('content')
    <section class="provider provider_style_primary">
        <div class="provider__container provider__container_booking">
            <h1 class="provider__title">{{ $Booking["title"] }}</h1>
            <div class="booking__description">
                {!! $Booking["description"] !!}
            </div>
            <x-travelline.booking :lang="$lang" />
        </div>
    </section>
@endsection
