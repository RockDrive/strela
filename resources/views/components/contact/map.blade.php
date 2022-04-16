@if($type == "home")
    <section class="map">
        <div class="map__container" id="map-yandex"></div>
        <div class="button button_anchor button_anchor_map shown" data-anchor-id="about"><i class="icon-arrow5"></i></div>
    </section>
@else
    <section class="map map_inner map_with-padding" id="map">
        <div class="map__container" id="map-yandex"></div>
    </section>
@endif
<script>
    var mapInform = {!! json_encode($map) !!};
</script>
