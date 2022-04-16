'use strict';

(function ($) {
    document.addEventListener("DOMContentLoaded", function () {
        let mapContainer = document.querySelector(".map__container");
        let isMapInitialized = false;
        if (mapContainer !== null) {
            document.addEventListener("scroll", mapLazyLoad);
            window.addEventListener("load", mapLazyLoad);
            window.addEventListener("resize", mapLazyLoad);
            window.addEventListener("orientationchange", mapLazyLoad);
        }

        function mapLazyLoad() {
            if (isMapInitialized === false) {
                if ((mapContainer.getBoundingClientRect().top <= window.innerHeight
                    && mapContainer.getBoundingClientRect().bottom >= 0)
                    && getComputedStyle(mapContainer).display !== "none") {
                    initMap();
                    isMapInitialized = true;
                    document.removeEventListener("scroll", mapLazyLoad);
                    window.removeEventListener("load", mapLazyLoad);
                    window.removeEventListener("resize", mapLazyLoad);
                    window.removeEventListener("orientationchange", mapLazyLoad);
                }
            }
        };
    });

    function loadScripts(scripts) {
        let deferred = jQuery.Deferred();

        function loadScript(i) {
            if (i < scripts.length) {
                jQuery.ajax({
                    url: scripts[i],
                    dataType: "script",
                    cache: true,
                    success: function () {
                        loadScript(i + 1);
                    }
                });
            } else {
                deferred.resolve();
            }
        }

        loadScript(0);

        return deferred;
    }

    function initMap() {
        let $mapYandexContainer = $('#map-yandex')
        let $mapData = {
            "addresses": [
                {
                    "latitude": mapInform["lat"] ?? "44.511892",
                    "longitude": mapInform["lng"] ?? "34.167194",
                    "hintContent": mapInform["title"] ?? "Отель &amp;#34;Стрела&amp;#34;",
                    "balloonContent": mapInform["description"] ?? "Отель &amp;#34;Стрела&amp;#34;, Республика Крым, г. Ялта, ул. Вергасова, 7"
                }

            ],
            "iconImageHref": "/img/placemark.png",
            "iconImageSize": {
                "width": 64,
                "height": 64
            },
            "iconImageOffset": {
                "x": -32,
                "y": -64
            }
        };

        if ($mapData && $mapYandexContainer.find('ymaps').length === 0) {

            let $filteredAddresses = getAddressesWithoutDuplicateCoordinates($mapData.addresses);
            let $center = getCenterCoordinates($filteredAddresses);
            let $defaultZoom = 15;

            if ($mapYandexContainer.length) {
                loadScripts(['//api-maps.yandex.ru/2.1/?lang=ru_RU&#038;r=4.7.2'])
                    .done(function () {
                        ymaps.ready(function () {
                            let $geoCollection = new ymaps.GeoObjectCollection();
                            let $map = new ymaps.Map($mapYandexContainer[0], {
                                center: $center,
                                zoom: $defaultZoom
                            });

                            let $markers = [];
                            $filteredAddresses.forEach(element => {
                                let placemark = new ymaps.Placemark([element.latitude, element.longitude], {
                                    hintContent: element.hintContent,
                                    balloonContent: element.balloonContent
                                });
                                $geoCollection.add(placemark);
                                $markers.push(placemark);
                            });

                            $map.geoObjects.add($geoCollection);
                            if ($filteredAddresses.length > 1) {
                                $map.setBounds($geoCollection.getBounds());

                                if ($map.getZoom() > $defaultZoom) {
                                    $map.setZoom($defaultZoom);
                                }
                            }

                            $map.behaviors.disable('scrollZoom');

                            initMoveToPoint($map, "1", $markers);
                        });
                    });
            }
        }
    }

    function initMoveToPoint($map, type, $markers, hereUi = null) {
        (function () {
            let $mapPoint = $('.js-map-point');
            $mapPoint.on('click', function (event) {
                event.preventDefault();
                let $this = $(this),
                    $pointCoords = $this.data('point-coords'),
                    $balloonContent = $this.data('point-text');
                let coordsStr = $pointCoords.split(" ");
                let coords = [parseFloat(coordsStr[0]), parseFloat(coordsStr[1])];
                switch (type) {
                    case "1":
                        moveToPointYandex($map, coords, $balloonContent, $markers);
                        return false;
                    case "2":
                        moveToPointGoogle($map, coords, $balloonContent, $markers);
                        return false;
                    case "3":
                        moveToPointHere($map, coords, $balloonContent, $markers, hereUi);
                        return false;
                    case "4":
                        moveToPointSputnik($map, coords, $balloonContent, $markers);
                        return false;
                }

                return false;
            });
        })();
    }

    function moveToPointYandex($map, coords, $balloonContent, $markers) {
        $map.panTo(coords, {
            flying: true
        }).then(() => {
            let marker = ymaps.geoQuery($markers).getCentralObject($map);
            marker.properties.set('balloonContent', $balloonContent);
            marker.balloon.open();
        });
    }

    function moveToPointHere($map, coords, $balloonContent, markers, ui) {
        let point = {lat: coords[0], lng: coords[1]};
        $map.setCenter(point);


        let minDistance = 0;
        let closestMarker = null;
        for (let i = 0; i < markers.length; i++) {
            let distance = markers[i].getGeometry().distance(point);
            if (closestMarker == null || distance < minDistance) {
                minDistance = distance;
                closestMarker = markers[i];
            }
        }

        let bubble = new H.ui.InfoBubble(closestMarker.getGeometry(), {
            content: $balloonContent
        });

        ui.getBubbles().forEach(b => ui.removeBubble(b));
        ui.addBubble(bubble);
    }

    function moveToPointSputnik($map, coords, $balloonContent, markers) {
        let point = L.latLng(coords);
        $map.panTo(coords);

        let closestMarker = null;
        for (let i = 0; i < markers.length; i++) {
            if (markers[i].getLatLng().equals(point)) {
                closestMarker = markers[i];
                break;
            }
        }

        closestMarker.setPopupContent($balloonContent);
        closestMarker.openPopup();
    }

    function moveToPointGoogle($map, coords, $balloonContent, markers) {
        let point = new google.maps.LatLng(coords[0], coords[1]);
        $map.panTo(point);


        let marker = getMarkerClosestToPoint(point, markers)
        google.maps.event.trigger(marker, 'click', $balloonContent);
    }

    function getMarkerClosestToPoint(point, markers) {
        let minDistance = 0;
        let closestMarker = null;
        for (let i = 0; i < markers.length; ++i) {
            let distance = google.maps.geometry.spherical.computeDistanceBetween(markers[i].position, point);
            if (closestMarker == null || distance < minDistance) {
                closestMarker = markers[i];
                minDistance = distance;
            }
        }

        return closestMarker;
    }

    function getCenterCoordinates(addresses) {
        let $latitudeAll = 0;
        let $longitudeAll = 0;

        if (addresses.length > 0) {
            addresses.forEach(element => {
                $latitudeAll += parseFloat(element.latitude);
                $longitudeAll += parseFloat(element.longitude);
            });

            return [parseFloat($latitudeAll / addresses.length), parseFloat($longitudeAll / addresses.length)];
        }

        return [0, 0];
    }

    function getAddressesWithoutDuplicateCoordinates(addresses) {
        let filteredAddresses = [];
        addresses.forEach(element => {
            if (!filteredAddresses.some(x =>
                x.latitude === element.latitude && x.longitude === element.longitude)) {
                filteredAddresses.push(element);
            }
        });

        return filteredAddresses;
    }
})(jQuery);
