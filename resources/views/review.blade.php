@extends('layouts.main')
@section('title', 'Siam Planet')
@section('meta')

@stop

@section('source')

@stop

@section('script')
    <script src="{{ asset('resources/assets/slick-carousel/slick/slick.min.js', env('HTTPS')) }}"></script>
    <script src="{{ asset('resources/assets/bootstrap/dist/js/bootstrap.js', env('HTTPS')) }}"></script>
    <script src="{{ asset('resources/assets/jssor-slider/js/jssor.slider.min.js', env('HTTPS')) }}"></script>

    <link rel="stylesheet" href="{{ asset('resources/assets/slick-carousel/slick/slick.css', env('HTTPS')) }}"/>
    <link rel="stylesheet" href="{{ asset('resources/assets/css/post.css', env('HTTPS')) }}"/>


    <script type="text/javascript">

        var $status = $('.pagingInfo');
        var $slickElement = $('.project-screen');

        $slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
            //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
            var i = (currentSlide ? currentSlide : 0) + 1;
            $status.text(i + '/' + slick.slideCount);
        });

        $slickElement.slick({
            slidesToShow: 1,
            arrows: false,
            asNavFor: '.project-strip',
            autoplay: false,
            autoplaySpeed: 3000
        });

        $(".project-strip").slick({
            slidesToShow: 1,
            slidesToScroll: 3,
            arrows: false,
            asNavFor: '.project-screen',
            dots: false,
// 	infinite: true,
//            centerMode: true,
            focusOnSelect: true,
            variableWidth: true
        });

        $('.next-button-slick').click(function () {
            $('.project-screen').slick("slickNext");
        });
        $('.prev-button-slick').click(function () {
            $('.project-screen').slick("slickPrev");
        });

        $(document).on('click', '.phone a', function () {
            var $this = $(this),
                $id = '{{ $product['id'] }}';
            $.ajax({
                url     : "{{ route('phone.view') }}",
                type    : "post",
                data    : { id: $id },
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success : function ( json )
                {
                    $this.parent().html(json.phone);
                },
                error   : function ( jqXhr, json, errorThrown )
                {
                    var errors = jqXhr.responseJSON;
                    console.log(errors);
                }
            });
        });

        var $send = $('#send-message');
        $send.submit(function (e) {
            e.preventDefault();
            $send.find('input').removeClass('has-error')
            $send.find('textarea').removeClass('has-error');
            $.ajax({
                url     : "{{ route('product.contact') }}",
                type    : $send.attr("method"),
                data    : $send.serialize(),
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success : function ( json )
                {
                    $send.find('input[type!="hidden"][type!="submit"]').val('');
                    $send.find('textarea').val('');
                    $('.wpcf7-response-output').html('');
                    alert(json['alert-message']);
                },
                error   : function ( jqXhr, json, errorThrown )
                {
                    var errors = jqXhr.responseJSON;
                    $.each( errors, function( key, value ) {
                        $('input[name="'+key+'"]').addClass('has-error');
                        $('textarea[name="'+key+'"]').addClass('has-error');
                        $('.wpcf7-response-output').html('* ' + value);
                    });
                }
            });
        });


    </script>

    <!--<link rel="stylesheet prefetch" href="//api.tiles.mapbox.com/mapbox.js/v1.4.0/mapbox.css">-->
    <!--<script src="//api.tiles.mapbox.com/mapbox.js/v1.5.2/mapbox.js"></script>-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjr8I22XjxkcgiX6Fgb4Ct_F0-dQ2xgJo"></script>
    <!--<script src="https://maps.googleapis.com/maps/api/js"></script>-->

    @if(!$product_area->isEmpty())

        <script type="text/javascript">

            var $geo = [];
            var geojsonFeature = {
                "type": "FeatureCollection",
                "features": [
                        @foreach($product_area as $item){
                        "type": "Feature",
                        "properties": {
                            "head": "",
                            "distance": "{{ number_format(($item->distance / 1000), 2, '.', ',') }} km",
                            "icon": "{{ asset('resources/assets/images/icon', env('HTTPS')).'/'.$item->image }}",
                            "description": "{{ $item['attributes']['area'] }}",
                            "gallery": []
                        },
                        "geometry": {
                            "type": "Point",
                            "coordinates": [{{ $item['attributes']['lat'] }}, {{ $item['attributes']['lng'] }}]
                        }
                    },@endforeach

                ]
            };


            //        var geojsonFeature = {
            //            "type": "FeatureCollection",
            //            "features": [{
            //                "type": "Feature",
            //                "properties": {
            //                    "head": "",
            //                    "title": "คอนโดมิเนียม เดอะคีย์สาทร-ราชพฤกษ์",
            //                    "icon": "https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-icon-location.png",
            //                    "description": "<p>First-year students on our BA programmes may have the chance to visit Leeds city centre, where we look at shopping areas and regeneration along the waterfront.</P><p>The trip gives us a chance to compare areas like the Victoria Quarter, Kirkgate Market and the Corn Exchange and discuss how they are branded to attract shoppers.</p><p> We also visit Holbeck Urban Village, which calls itself a “pioneer of urban regeneration”, and Urban Splash’s development in Saxton to explore the issue of gentrification.</p><p>During fieldwork in Leeds you may also have the chance to study:</p> <ul> <li>Clarence Dock and the Royal Armouries</li> <li>Developments near the Centenary Bridge</li> <li>The village of Saltaire, north of Bradford</li> </ul> <p>Field study like this develops important skills of observation, critique and policy analysis, as well as leading into later human geography modules.</p>",
            //                    "gallery": []
            //                },
            //                "geometry": {
            //                    "type": "Point",
            //                    "coordinates": [13.7146687, 100.4654378]
            //                }
            //            },
            //                {
            //                    "type": "Feature",
            //                    "properties": {
            //                        "head": "http://www2.hull.ac.uk/science/images/mapbox/headers/Scarborough_Header.jpg",
            //                        "title": "Wutthakat BTS Station",
            //                        "icon": "https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-icon-location.png",
            //                        "description": "<p>In October our first-year physical geography students join staff for an &quot;ice-breaker&quot; field weekend in Scarborough. The trip helps students make friends and teach them the basic skills they’ll need as physical geographers.</p><p>During the first day we tour the countryside to look at geology, glaciation and how the beautiful landscape of the North Yorkshire Moors was formed.</p><p>We make stops at:</p> <ul> <li>Scarp edges at the wolds near Market Weighton</li> <li>Millingtondale</li> <li>The Hole of Horcrum</li> <li>Newtondale</li> </ul> <p>At these stops the students work in small groups to investigate the landscape, discuss ideas of how individual landforms developed and discuss their ideas with a member of staff. This is physical geography at its most traditional, but the approaches and thinking that underpin this work are excellent preparation for the students later in their degree.</p><p> On the second day students work in small groups to explore the land at Jugger Howe. They measure hill slopes and soil saturation as well as investigating the amount of vegetation cover.</p>",
            //                        "gallery": [
            //                            ["http://www2.hull.ac.uk/science/images/mapbox/scarborough/Scarborough_1.jpg"],
            //                            ["http://www2.hull.ac.uk/science/images/mapbox/scarborough/Scarborough_2.jpg"],
            //                            ["http://www2.hull.ac.uk/science/images/mapbox/scarborough/Scarborough_4.jpg"],
            //                            ["http://www2.hull.ac.uk/science/images/mapbox/scarborough/Scarborough_5.jpg"],
            //                            ["http://www2.hull.ac.uk/science/images/mapbox/scarborough/Scarborough_8.jpg"]
            //                        ]
            //                    },
            //                    "geometry": {
            //                        "type": "Point",
            //                        "coordinates": [13.7146391, 100.4654378]
            //                    }
            //                },
            //                {
            //                    "type": "Feature",
            //                    "properties": {
            //                        "head": "http://www2.hull.ac.uk/science/images/mapbox/headers/Scarborough_Header.jpg",
            //                        "title": "วัดนาคปรก",
            //                        "icon": "https://maps.google.com/mapfiles/kml/shapes/parking_lot_maps.png",
            //                        "description": "<p>In October our first-year physical geography students join staff for an &quot;ice-breaker&quot; field weekend in Scarborough. The trip helps students make friends and teach them the basic skills they’ll need as physical geographers.</p><p>During the first day we tour the countryside to look at geology, glaciation and how the beautiful landscape of the North Yorkshire Moors was formed.</p><p>We make stops at:</p> <ul> <li>Scarp edges at the wolds near Market Weighton</li> <li>Millingtondale</li> <li>The Hole of Horcrum</li> <li>Newtondale</li> </ul> <p>At these stops the students work in small groups to investigate the landscape, discuss ideas of how individual landforms developed and discuss their ideas with a member of staff. This is physical geography at its most traditional, but the approaches and thinking that underpin this work are excellent preparation for the students later in their degree.</p><p> On the second day students work in small groups to explore the land at Jugger Howe. They measure hill slopes and soil saturation as well as investigating the amount of vegetation cover.</p>",
            //                        "gallery": [
            //                            ["http://www2.hull.ac.uk/science/images/mapbox/scarborough/Scarborough_1.jpg"],
            //                            ["http://www2.hull.ac.uk/science/images/mapbox/scarborough/Scarborough_2.jpg"],
            //                            ["http://www2.hull.ac.uk/science/images/mapbox/scarborough/Scarborough_4.jpg"],
            //                            ["http://www2.hull.ac.uk/science/images/mapbox/scarborough/Scarborough_5.jpg"],
            //                            ["http://www2.hull.ac.uk/science/images/mapbox/scarborough/Scarborough_8.jpg"]
            //                        ]
            //                    },
            //                    "geometry": {
            //                        "type": "Point",
            //                        "coordinates": [13.7150131, 100.4653149]
            //                    }
            //                }
            //            ]
            //        };



            var allMyMarkers = [];

            //set your google maps parameters

            var $latitude = geojsonFeature.features[0].geometry.coordinates[0],
                $longitude = geojsonFeature.features[0].geometry.coordinates[1],
                $map_zoom = 17;


            //google map custom marker icon - .png fallback for IE11
            var is_internetExplorer11 = navigator.userAgent.toLowerCase().indexOf('trident') > -1;
            var $marker_url = ( is_internetExplorer11 ) ? 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-icon-location.png' : 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-icon-location_1.svg';

            //define the basic color of your map, plus a value for saturation and brightness
            var $main_color = '#2d313f',
                $saturation = -20,
                $brightness = 5;

            //we define here the style of the map
            var style = [
                {
                    //set saturation for the labels on the map
                    elementType: "labels",
                    stylers: [
                        {saturation: $saturation}
                    ]
                },
                {	//poi stands for point of interest - don't show these lables on the map
                    featureType: "poi",
                    elementType: "labels",
                    stylers: [
                        {visibility: "off"}
                    ]
                },
                {
                    //don't show highways lables on the map
                    featureType: 'road.highway',
                    elementType: 'labels',
                    stylers: [
                        {visibility: "off"}
                    ]
                },
                {
                    //don't show local road lables on the map
                    featureType: "road.local",
                    elementType: "labels.icon",
                    stylers: [
                        {visibility: "off"}
                    ]
                },
                {
                    //don't show arterial road lables on the map
                    featureType: "road.arterial",
                    elementType: "labels.icon",
                    stylers: [
                        {visibility: "off"}
                    ]
                },
                {
                    //don't show road lables on the map
                    featureType: "road",
                    elementType: "geometry.stroke",
                    stylers: [
                        {visibility: "off"}
                    ]
                },
                //style different elements on the map
                {
                    featureType: "transit",
                    elementType: "geometry.fill",
                    stylers: [
                        {hue: $main_color},
                        {visibility: "on"},
                        {lightness: $brightness},
                        {saturation: $saturation}
                    ]
                },
                {
                    featureType: "poi",
                    elementType: "geometry.fill",
                    stylers: [
                        {hue: $main_color},
                        {visibility: "on"},
                        {lightness: $brightness},
                        {saturation: $saturation}
                    ]
                },
                {
                    featureType: "poi.government",
                    elementType: "geometry.fill",
                    stylers: [
                        {hue: $main_color},
                        {visibility: "on"},
                        {lightness: $brightness},
                        {saturation: $saturation}
                    ]
                },
                {
                    featureType: "poi.sport_complex",
                    elementType: "geometry.fill",
                    stylers: [
                        {hue: $main_color},
                        {visibility: "on"},
                        {lightness: $brightness},
                        {saturation: $saturation}
                    ]
                },
                {
                    featureType: "poi.attraction",
                    elementType: "geometry.fill",
                    stylers: [
                        {hue: $main_color},
                        {visibility: "on"},
                        {lightness: $brightness},
                        {saturation: $saturation}
                    ]
                },
                {
                    featureType: "poi.business",
                    elementType: "geometry.fill",
                    stylers: [
                        {hue: $main_color},
                        {visibility: "on"},
                        {lightness: $brightness},
                        {saturation: $saturation}
                    ]
                },
                {
                    featureType: "transit",
                    elementType: "geometry.fill",
                    stylers: [
                        {hue: $main_color},
                        {visibility: "on"},
                        {lightness: $brightness},
                        {saturation: $saturation}
                    ]
                },
                {
                    featureType: "transit.station",
                    elementType: "geometry.fill",
                    stylers: [
                        {hue: $main_color},
                        {visibility: "on"},
                        {lightness: $brightness},
                        {saturation: $saturation}
                    ]
                },
                {
                    featureType: "landscape",
                    stylers: [
                        {hue: $main_color},
                        {visibility: "on"},
                        {lightness: $brightness},
                        {saturation: $saturation}
                    ]

                },
                {
                    featureType: "road",
                    elementType: "geometry.fill",
                    stylers: [
                        {hue: $main_color},
                        {visibility: "on"},
                        {lightness: $brightness},
                        {saturation: $saturation}
                    ]
                },
                {
                    featureType: "road.highway",
                    elementType: "geometry.fill",
                    stylers: [
                        {hue: $main_color},
                        {visibility: "on"},
                        {lightness: $brightness},
                        {saturation: $saturation}
                    ]
                },
                {
                    featureType: "water",
                    elementType: "geometry",
                    stylers: [
                        {hue: $main_color},
                        {visibility: "on"},
                        {lightness: $brightness},
                        {saturation: $saturation}
                    ]
                }
            ];

            //set google map options
            var map_options = {
                center: new google.maps.LatLng($latitude, $longitude),
                zoom: $map_zoom,
                panControl: false,
                zoomControl: false,
                mapTypeControl: false,
                streetViewControl: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false,
                styles: style,
            }
            //inizialize the map
            var image = {
                url: $marker_url,
                // This marker is 20 pixels wide by 32 pixels high.
                scaledSize: new google.maps.Size(30, 30)

            };

            var map = new google.maps.Map(document.getElementById('map'), map_options);
            //add a custom marker to the map
            //        var marker = new google.maps.Marker({
            //            position: new google.maps.LatLng($latitude, $longitude),
            //            map: map,
            //            visible: true,
            //            icon: image,
            //        });

            var iconBase = $marker_url;
            var icons = {
                parking: {
                    icon: $marker_url
                },
                library: {
                    icon: $marker_url
                },
                info: {
                    icon: $marker_url
                }
            };

            var directionsDisplay = new google.maps.DirectionsRenderer({suppressMarkers: true}); //!*({suppressMarkers: true}) don't show marker
            var directionsService = new google.maps.DirectionsService;
            directionsDisplay.setMap(map);

            function addMarker(feature, featureID) {

                var image = {
                    url: feature.properties.icon,
                    // This marker is 20 pixels wide by 32 pixels high.
                    scaledSize: new google.maps.Size(20, 20)
                };

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(feature.geometry.coordinates[0], feature.geometry.coordinates[1]),
                    icon: image,
                    map: map,
                    id: featureID
                });

                $('#map-legend > ul').append('<li class="ng-scope ng-binding point" data-title="' + feature.properties.title + '"><p>' + feature.properties.title + '</p><p>ระยะทาง : ' + feature.properties.distance + '</p></li>');

                allMyMarkers.push(marker);
            }


            for (var i = 0, jsonFeature; jsonFeature = geojsonFeature.features[i]; i++) {
                addMarker(jsonFeature, i);
            }

            $('#map-legend > ul li:first-child').addClass('active');

            $('.point').on('click', function () {

                $('.point').removeClass('active');
                $(this).addClass('active');

                var $title = $(this).html(),
                    $lat = '',
                    $lng = '';

                for (var i = 0, jsonFeature; jsonFeature = geojsonFeature.features[i]; i++) {
                    if (jsonFeature.properties.title == $title) {
                        $lat = jsonFeature.geometry.coordinates[0];
                        $lng = jsonFeature.geometry.coordinates[1];
                        map.panTo(new google.maps.LatLng($lat, $lng));
                    }
                }

                var selectedID = $(this).attr('id');
                toggleBounce($(".point").index(this));

                calculateAndDisplayRoute(directionsService, directionsDisplay, $lat, $lng);

            });

            function calculateAndDisplayRoute(directionsService, directionsDisplay, lat, lng) {
                var selectedMode = 'DRIVING'; // DRIVING,WALKING,BICYCLING,TRANSIT
                directionsService.route({
                    origin: {lat: $latitude, lng: $longitude},  // Haight.
                    destination: {lat: lat, lng: lng},  // Ocean Beach.
                    // Note that Javascript allows us to access the constant
                    // using square brackets and a string value as its
                    // "property."
                    travelMode: google.maps.TravelMode[selectedMode]
                }, function(response, status) {
                    if (status == 'OK') {
                        if($latitude == lat) directionsDisplay.setOptions({ preserveViewport: true });
                        else directionsDisplay.setOptions({ preserveViewport: false });
                        directionsDisplay.setDirections(response);
                        new google.maps.Marker({
                            position: null,
                            map: map,
                            icon: null,
                            title: null
                        });
                    } else {
                        window.alert('Directions request failed due to ' + status);
                    }
                });
            }

            function toggleBounce(selectedID) {

                // loop through our array & check with marker has same ID with the text
                for (var j = 0; j < allMyMarkers.length; j++) {
                    if (allMyMarkers[j].id == selectedID) {
                        if (allMyMarkers[j].getAnimation() != null) {
                            allMyMarkers[j].setAnimation(null);
                        } else {
                            allMyMarkers[j].setAnimation(google.maps.Animation.BOUNCE);
                            map.setCenter(allMyMarkers[j].getPosition());
                        }
                        //break;
                    }else{
                        allMyMarkers[j].setAnimation(null);
                    }
                }
            } // end toggleBounce


            // google.maps.event.addListener(map, 'click', function( event ){
            //   alert( "Latitude: "+event.latLng.lat()+" "+", longitude: "+event.latLng.lng() );
            // });

            //add custom buttons for the zoom-in/zoom-out on the map
            function CustomZoomControl(controlDiv, map) {
                //grap the zoom elements from the DOM and insert them in the map
                var controlUIzoomIn = document.getElementById('cd-zoom-in'),
                    controlUIzoomOut = document.getElementById('cd-zoom-out');
                controlDiv.appendChild(controlUIzoomIn);
                controlDiv.appendChild(controlUIzoomOut);

                // Setup the click event listeners and zoom-in or out according to the clicked element
                google.maps.event.addDomListener(controlUIzoomIn, 'click', function () {
                    map.setZoom(map.getZoom() + 1)
                });
                google.maps.event.addDomListener(controlUIzoomOut, 'click', function () {
                    map.setZoom(map.getZoom() - 1)
                });
            }

            var zoomControlDiv = document.createElement('div');
            var zoomControl = new CustomZoomControl(zoomControlDiv, map);

            //insert the zoom div on the top left of the map
            map.controls[google.maps.ControlPosition.LEFT_TOP].push(zoomControlDiv);

        </script>

    @endif


    @foreach($product_review as $key => $value)
        <script type="text/javascript">
            jQuery(document).ready(function ($) {

                var jssor_1_SlideshowTransitions = [
                    {$Duration:1200,$Zoom:1,$Easing:{$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad},$Opacity:2},
                    {$Duration:1000,$Zoom:11,$SlideOut:true,$Easing:{$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear},$Opacity:2},
                    {$Duration:1200,$Zoom:1,$Rotate:1,$During:{$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Zoom:$Jease$.$Swing,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$Swing},$Opacity:2,$Round:{$Rotate:0.5}},
                    {$Duration:1000,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.8}},
                    {$Duration:1200,x:0.5,$Cols:2,$Zoom:1,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                    {$Duration:1200,x:4,$Cols:2,$Zoom:11,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear},$Opacity:2},
                    {$Duration:1200,x:0.6,$Zoom:1,$Rotate:1,$During:{$Left:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Left:$Jease$.$Swing,$Zoom:$Jease$.$Swing,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$Swing},$Opacity:2,$Round:{$Rotate:0.5}},
                    {$Duration:1000,x:-4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Left:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.8}},
                    {$Duration:1200,x:-0.6,$Zoom:1,$Rotate:1,$During:{$Left:[0.2,0.8],$Zoom:[0.2,0.8],$Rotate:[0.2,0.8]},$Easing:{$Left:$Jease$.$Swing,$Zoom:$Jease$.$Swing,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$Swing},$Opacity:2,$Round:{$Rotate:0.5}},
                    {$Duration:1000,x:4,$Zoom:11,$Rotate:1,$SlideOut:true,$Easing:{$Left:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.8}},
                    {$Duration:1200,x:0.5,y:0.3,$Cols:2,$Zoom:1,$Rotate:1,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad,$Rotate:$Jease$.$InCubic},$Opacity:2,$Round:{$Rotate:0.7}},
                    {$Duration:1000,x:0.5,y:0.3,$Cols:2,$Zoom:1,$Rotate:1,$SlideOut:true,$Assembly:2049,$ChessMode:{$Column:15},$Easing:{$Left:$Jease$.$InExpo,$Top:$Jease$.$InExpo,$Zoom:$Jease$.$InExpo,$Opacity:$Jease$.$Linear,$Rotate:$Jease$.$InExpo},$Opacity:2,$Round:{$Rotate:0.7}},
                    {$Duration:1200,x:-4,y:2,$Rows:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Row:28},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad,$Rotate:$Jease$.$InCubic},$Opacity:2,$Round:{$Rotate:0.7}},
                    {$Duration:1200,x:1,y:2,$Cols:2,$Zoom:11,$Rotate:1,$Assembly:2049,$ChessMode:{$Column:19},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Zoom:$Jease$.$InCubic,$Opacity:$Jease$.$OutQuad,$Rotate:$Jease$.$InCubic},$Opacity:2,$Round:{$Rotate:0.8}}
                ];

                var jssor_1_options = {
                    $AutoPlay: true,
                    $AutoPlayInterval: 25000,
                    $SlideshowOptions: {
                        $Class: $JssorSlideshowRunner$,
                        $Transitions: jssor_1_SlideshowTransitions,
                        $TransitionsOrder: 1
                    },
                    $ArrowNavigatorOptions: {
                        $Class: $JssorArrowNavigator$
                    },
                    $ThumbnailNavigatorOptions: {
                        $Class: $JssorThumbnailNavigator$,
                        $Rows: 1,
                        $Cols: 6,
                        $SpacingX: 14,
                        $SpacingY: 12,
                        $Orientation: 2,
                        $Align: 156
                    }
                };

                var jssor_1_slider = new $JssorSlider$("review_{{ $key }}", jssor_1_options);

                /*responsive code begin*/
                /*remove responsive code if you don't want the slider scales while window resizing*/
                function ScaleSlider() {
                    var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                    if (refSize) {
                        refSize = Math.min(refSize, 960);
                        refSize = Math.max(refSize, 300);
                        jssor_1_slider.$ScaleWidth(refSize);
                    }
                    else {
                        window.setTimeout(ScaleSlider, 30);
                    }
                }
                ScaleSlider();
                $(window).bind("load", ScaleSlider);
                $(window).bind("resize", ScaleSlider);
                $(window).bind("orientationchange", ScaleSlider);
                /*responsive code end*/
            });
        </script>
    @endforeach

    <style>
        .jssora05l, .jssora05r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 40px;
            cursor: pointer;
            background: url('{{ asset('resources/assets/jssor-slider/img/a17.png', env('HTTPS')) }}') no-repeat;
            overflow: hidden;
        }

        .jssora05l {
            background-position: -10px -40px;
        }

        .jssora05r {
            background-position: -70px -40px;
        }

        .jssora05l:hover {
            background-position: -130px -40px;
        }

        .jssora05r:hover {
            background-position: -190px -40px;
        }

        .jssora05l.jssora05ldn {
            background-position: -250px -40px;
        }

        .jssora05r.jssora05rdn {
            background-position: -310px -40px;
        }

        .jssora05l.jssora05lds {
            background-position: -10px -40px;
            opacity: .3;
            pointer-events: none;
        }

        .jssora05r.jssora05rds {
            background-position: -70px -40px;
            opacity: .3;
            pointer-events: none;
        }

        .jssort01-99-66 .p {
            position: absolute;
            top: 0;
            left: 0;
            width: 99px;
            height: 66px;
        }

        .jssort01-99-66 .t {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .jssort01-99-66 .w {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
        }

        .jssort01-99-66 .c {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 95px;
            height: 62px;
            border: #000 2px solid;
            box-sizing: content-box;
            background: url('{{ asset('resources/assets/jssor-slider/img/t01.png', env('HTTPS')) }}') -800px -800px no-repeat;
            _background: none;
        }

        .jssort01-99-66 .pav .c {
            top: 2px;
            _top: 0px;
            left: 2px;
            _left: 0px;
            width: 95px;
            height: 62px;
            border: #000 0px solid;
            _border: #fff 2px solid;
            background-position: 50% 50%;
        }

        .jssort01-99-66 .p:hover .c {
            top: 0px;
            left: 0px;
            width: 97px;
            height: 64px;
            border: #fff 1px solid;
            background-position: 50% 50%;
        }

        .jssort01-99-66 .p.pdn .c {
            background-position: 50% 50%;
            width: 95px;
            height: 62px;
            border: #000 2px solid;
        }

        * html .jssort01-99-66 .c, * html .jssort01-99-66 .pdn .c, * html .jssort01-99-66 .pav .c { /* ie quirks mode adjust */
            width /**/: 99px;
            height /**/: 66px;
        }
    </style>

@stop

@section('first-content')
    <div class="col-md-9">
        <h1 class="entry-title">{{ $product['subtitle'] }}</h1>

        <div class="section section-project">
            <div class="project-carousel">

                <div class="project-page">
                    <span class="pagingInfo">1/1</span>
                    <div class="pull-right">
                        <a href="javascript://" class="prev-button-slick arrow left"></a>
                        <a href="javascript://" class="next-button-slick arrow right"></a>
                    </div>
                </div>
                <div class="project-screen">
                    @foreach($product_img as $image)
                        <div class="project">
                            <img src="{{ route('images.q').'?q='.$image['attributes']['image'] }}" alt=""/>
                        </div>
                    @endforeach
                </div>
                <div class="project-strip">
                    @foreach($product_img as $image)
                        <div class="project"><img src="{{ route('images.q').'?q='.$image['attributes']['image'] }}" alt=""/></div>
                    @endforeach
                </div>

            </div>
        </div>



        <div class="vertical-tabs">

            <ul class="nav">
                <li class="nav-one"><a href="#filter-mademoiselle" class="">{{ $product['type'] }}</a></li>
                <li class="nav-two"><a class="" href="#filter-scene">{{ $product['project'] == null ? '-' : $product['project'] }}</a></li>
                <li class="nav-three"><a class="" href="#filter-carnets">แล้วเสร็จ {{ $product['complete'] == null ? '-' : $product['complete'] }}</a></li>
                <li class="nav-four last"><a class="current" href="#filter-jetedis">{{ $product['sale'] }}</a></li>

            </ul>

            <div class="list-wrap" id="listWrap">

                <ul id="filter-jetedis" class="hide-shift">
                    <li><a style="display: block;" href="#!" class="all zwitserland"
                           data-country="{{ number_format($product['price']) }} บาท">ราคา</a>
                    </li>
                    <li><a style="display: block;" href="#!" class="all frankrijk active"
                           data-country="{{ $cal_unit($product['price'], $product['unit']) }} บาท / ตารางเมตร ">ราคาเฉลี่ย</a>
                    </li>
                    <li><a style="display: block;" href="#!" class="all"
                           data-country="{{ $current_unit($product['unit'], $product['unit_id']) }} {{ $product['unit_name'] }}">พื้นที่</a></li>
                    <li><a style="display: block;" href="#!" class="all zwitserland" data-country="{{ $product['province'] == null ? '-' : $product['province'] }}">จังหวัด</a>
                    </li>
                </ul>

            </div>

        </div>


        <div class="bs-docs-section">
            <h1 class="page-header" id="type">รายละเอียด</h1>

            @if(!$product_area->isEmpty())
                <div class="row">
                    <div class="col-md-3">พื้นที่ใกล้เคียง</div>
                    <div class="col-md-9">

                        <ul class="features-list">
                            @foreach($product_area as $item)
                                @if($item['attributes']['area_id'] != 1)
                                    <li class="list-item two-column features-item distance-essential-property">
                                        <div>{{ $item['attributes']['area'] }}</div>
                                        <div>{{ number_format(($item['attributes']['distance'] / 1000), 2, '.', ',') }} km</div>
                                    </li>
                                @endif
                            @endforeach

                            {{--<li class="list-item two-column features-item distance-essential-property">--}}
                            {{--<div>Utapao International Airport</div>--}}
                            {{--<div>31.88 km</div>--}}
                            {{--</li>--}}
                            {{--<li class="list-item two-column features-item distance-essential-property">--}}
                            {{--<div>Utapao International Airport</div>--}}
                            {{--<div>31.88 km</div>--}}
                            {{--</li>--}}
                            {{--<li class="list-item two-column features-item distance-essential-property">--}}
                            {{--<div>Utapao International Airport</div>--}}
                            {{--<div>31.88 km</div>--}}
                            {{--</li>--}}
                            {{--<li class="list-item two-column features-item distance-essential-property">--}}
                            {{--<div>Utapao International Airport</div>--}}
                            {{--<div>31.88 km</div>--}}
                            {{--</li>--}}
                            {{--<li class="list-item two-column features-item distance-essential-property">--}}
                            {{--<div>Utapao International Airport</div>--}}
                            {{--<div>31.88 km</div>--}}
                            {{--</li>--}}
                        </ul>
                    </div>
                </div>
            @endif

            @if(!$product_facility->isEmpty())
                <div class="row">
                    <div class="col-md-3">สิ่งอำนวยความสะดวก</div>
                    <div class="col-md-9">
                        <ul class="features-list">
                            @foreach($product_facility as $item)
                                <li class="list-item three-column features-item {{ $item['attributes']['image'] != '' ? 'active' : '' }}">
                                    <div class="check {{ $item['attributes']['image'] != '' ? 'active' : '' }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                             preserveAspectRatio="xMidYMid" viewBox="0 0 61 52" class="check-icon">
                                            <path d="M56.560,-0.010 C37.498,10.892 26.831,26.198 20.617,33.101 C20.617,33.101 5.398,23.373 5.398,23.373 C5.398,23.373 0.010,29.051 0.010,29.051 C0.010,29.051 24.973,51.981 24.973,51.981 C29.501,41.166 42.502,21.583 60.003,6.565 C60.003,6.565 56.560,-0.010 56.560,-0.010 Z"
                                                  id="path-1" class="cls-2" fill-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <span class="f-name">{{ $item['attributes']['facility'] }}
                                        @if($item['attributes']['image'] != '')
                                            <div class="hover_img">
                                            <span><img src="{{ route('images.q').'?q='.$item['attributes']['image'] }}" alt="image" /></span>
                                        </div>
                                        @endif
                                    </span>
                                </li>
                            @endforeach

                            {{--<li class="list-item three-column features-item">--}}
                            {{--<div class="check active">--}}
                            {{--<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"--}}
                            {{--preserveAspectRatio="xMidYMid" viewBox="0 0 61 52" class="check-icon">--}}
                            {{--<path d="M56.560,-0.010 C37.498,10.892 26.831,26.198 20.617,33.101 C20.617,33.101 5.398,23.373 5.398,23.373 C5.398,23.373 0.010,29.051 0.010,29.051 C0.010,29.051 24.973,51.981 24.973,51.981 C29.501,41.166 42.502,21.583 60.003,6.565 C60.003,6.565 56.560,-0.010 56.560,-0.010 Z"--}}
                            {{--id="path-1" class="cls-2" fill-rule="evenodd"/>--}}
                            {{--</svg>--}}
                            {{--</div>--}}
                            {{--<span class="f-name">เช็คอิน/เช็คเอาต์ด่วน</span>--}}
                            {{--</li>--}}
                            {{--<li class="list-item three-column features-item">--}}
                            {{--<div class="check">--}}
                            {{--<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"--}}
                            {{--preserveAspectRatio="xMidYMid" viewBox="0 0 61 52" class="check-icon">--}}
                            {{--<path d="M56.560,-0.010 C37.498,10.892 26.831,26.198 20.617,33.101 C20.617,33.101 5.398,23.373 5.398,23.373 C5.398,23.373 0.010,29.051 0.010,29.051 C0.010,29.051 24.973,51.981 24.973,51.981 C29.501,41.166 42.502,21.583 60.003,6.565 C60.003,6.565 56.560,-0.010 56.560,-0.010 Z"--}}
                            {{--id="path-1" class="cls-2" fill-rule="evenodd"/>--}}
                            {{--</svg>--}}
                            {{--</div>--}}
                            {{--<span class="f-name">ทางสำหรับรถเข็น</span>--}}
                            {{--</li>--}}
                            {{--<li class="list-item three-column features-item">--}}
                            {{--<div class="check">--}}
                            {{--<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"--}}
                            {{--preserveAspectRatio="xMidYMid" viewBox="0 0 61 52" class="check-icon">--}}
                            {{--<path d="M56.560,-0.010 C37.498,10.892 26.831,26.198 20.617,33.101 C20.617,33.101 5.398,23.373 5.398,23.373 C5.398,23.373 0.010,29.051 0.010,29.051 C0.010,29.051 24.973,51.981 24.973,51.981 C29.501,41.166 42.502,21.583 60.003,6.565 C60.003,6.565 56.560,-0.010 56.560,-0.010 Z"--}}
                            {{--id="path-1" class="cls-2" fill-rule="evenodd"/>--}}
                            {{--</svg>--}}
                            {{--</div>--}}
                            {{--<span class="f-name">นำสัตว์เลี้ยงเข้าพักได้</span>--}}
                            {{--</li>--}}


                            {{--<div class="collapse toggle">--}}
                            {{--<li class="list-item three-column features-item">--}}
                            {{--<div class="check">--}}
                            {{--<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"--}}
                            {{--preserveAspectRatio="xMidYMid" viewBox="0 0 61 52" class="check-icon">--}}
                            {{--<path d="M56.560,-0.010 C37.498,10.892 26.831,26.198 20.617,33.101 C20.617,33.101 5.398,23.373 5.398,23.373 C5.398,23.373 0.010,29.051 0.010,29.051 C0.010,29.051 24.973,51.981 24.973,51.981 C29.501,41.166 42.502,21.583 60.003,6.565 C60.003,6.565 56.560,-0.010 56.560,-0.010 Z"--}}
                            {{--id="path-1" class="cls-2" fill-rule="evenodd"/>--}}
                            {{--</svg>--}}
                            {{--</div>--}}
                            {{--<span class="f-name">ลิฟ</span>--}}
                            {{--</li>--}}
                            {{--<li class="list-item three-column features-item">--}}
                            {{--<div class="check">--}}
                            {{--<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"--}}
                            {{--preserveAspectRatio="xMidYMid" viewBox="0 0 61 52" class="check-icon">--}}
                            {{--<path d="M56.560,-0.010 C37.498,10.892 26.831,26.198 20.617,33.101 C20.617,33.101 5.398,23.373 5.398,23.373 C5.398,23.373 0.010,29.051 0.010,29.051 C0.010,29.051 24.973,51.981 24.973,51.981 C29.501,41.166 42.502,21.583 60.003,6.565 C60.003,6.565 56.560,-0.010 56.560,-0.010 Z"--}}
                            {{--id="path-1" class="cls-2" fill-rule="evenodd"/>--}}
                            {{--</svg>--}}
                            {{--</div>--}}
                            {{--<span class="f-name">นำสัตว์เลี้ยงเข้าพักได้</span>--}}
                            {{--</li>--}}
                            {{--<li class="list-item three-column features-item">--}}
                            {{--<div class="check">--}}
                            {{--<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"--}}
                            {{--preserveAspectRatio="xMidYMid" viewBox="0 0 61 52" class="check-icon">--}}
                            {{--<path d="M56.560,-0.010 C37.498,10.892 26.831,26.198 20.617,33.101 C20.617,33.101 5.398,23.373 5.398,23.373 C5.398,23.373 0.010,29.051 0.010,29.051 C0.010,29.051 24.973,51.981 24.973,51.981 C29.501,41.166 42.502,21.583 60.003,6.565 C60.003,6.565 56.560,-0.010 56.560,-0.010 Z"--}}
                            {{--id="path-1" class="cls-2" fill-rule="evenodd"/>--}}
                            {{--</svg>--}}
                            {{--</div>--}}
                            {{--<span class="f-name">Utapao International</span>--}}
                            {{--</li>--}}
                            {{--</div>--}}

                            @if(count($product_facility) > 5)
                                <div class="show-more">
                                    <a href="javascript://" data-toggle="collapse" data-target=".toggle">
                                        <span class="show-less">ดูเพิ่มเติม</span>
                                        <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
                                    </a>
                                </div>
                            @endif



                        </ul>
                    </div>
                </div>
            @endif

        </div>

        <div class="bs-docs-section">
            <h2>ข้อมูลเพิ่มเติม</h2>
            <!--<h1 class="page-header" id="type">ข้อความ</h1>-->
            <div class="listing-details-text">
                {!! $product['content'] !!}
            </div>
        </div>

        <div class="bs-docs-section">
            <h2>ผังโครงการ และข้อมูลโครงการของโครงการนี้</h2>

            @foreach($product_review as $key => $value)
                <div class="project-carousel">
                    <div id="review_{{ $key }}" style="position:relative;margin:0 auto;top:0px;left:0px;width:960px;height:480px;overflow:hidden;visibility:hidden;background-color:#24262e;">
                        <!-- Loading Screen -->
                        <div data-u="loading" style="position:absolute;top:0px;left:0px;background-color:rgba(0,0,0,0.7);">
                            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                            <div style="position:absolute;display:block;background:url('{{ asset('resources/assets/jssor-slider/img/loading/static-svg/oval.svg', env('HTTPS')) }}') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                        </div>
                        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:150px;width:810px;height:480px;overflow:hidden;">
                            @foreach($product_review_image as $image)
                                @if($value['attributes']['id'] == $image['attributes']['product_review_id'])
                                    <div>
                                        <img data-u="image" src="{{ route('images.q').'?q='.$image['attributes']['image'] }}" />
                                        <img data-u="thumb" src="{{ route('images.q').'?q='.$image['attributes']['image'] }}" />
                                    </div>
                                @endif

                            @endforeach
                        </div>
                        <!-- Thumbnail Navigator -->
                        <div data-u="thumbnavigator" class="jssort01-99-66" style="position:absolute;left:0px;top:0px;width:150px;height:480px;" data-autocenter="2">
                            <!-- Thumbnail Item Skin Begin -->
                            <div data-u="slides" style="cursor: default;">
                                <div data-u="prototype" class="p">
                                    <div class="w">
                                        <div data-u="thumbnailtemplate" class="t"></div>
                                    </div>
                                    <div class="c"></div>
                                </div>
                            </div>
                            <!-- Thumbnail Item Skin End -->
                        </div>
                        <!-- Arrow Navigator -->
                        <span data-u="arrowleft" class="jssora05l" style="top:0px;left:158px;width:40px;height:40px;" data-autocenter="2"></span>
                        <span data-u="arrowright" class="jssora05r" style="top:0px;right:8px;width:40px;height:40px;" data-autocenter="2"></span>
                    </div>

                </div>

                <div>
                    <h1>{{ $value['attributes']['name'] }}</h1>
                    <p>{{ number_format($value['attributes']['price']) }} บาท
                        | {{ $current_unit($value['unit'], $value['unit_id']) }} {{ $value['attributes']['unit_type'] }}</p>

                    <blockquote class="series-list">
                        {!! $value['attributes']['content'] !!}
                    </blockquote>
                </div>
            @endforeach


        </div>


        @if(!$product_area->isEmpty())
            <div class="bs-docs-section map-section">
                <h2>พื้นที่รอบข้าง</h2>
                <div class="map-section-container">
                    <div class="map-legend" id="map-legend"></div>
                    <div id="map"></div>
                    <div id="cd-zoom-in"></div>
                    <div id="cd-zoom-out"></div>
                </div>
            </div>
        @endif


        <div class="bs-docs-section contact-section">
            <h2>สอบถามข้อมูล</h2>
            <div class="row">
                <div class="col-md-3">ชื่อ : </div>
                <div class="col-md-9">
                    <ul class="features-list">
                        <li class="list-item one-column features-item">
                            <div>{{ $product['seller'] }}</div>
                        </li>
                    </ul>
                </div>
            </div>

            @if($product['user_id'])
                <div class="row">
                    <div class="col-md-3">อีเมล : </div>
                    <div class="col-md-9">
                        <ul class="features-list">
                            <li class="list-item one-column features-item">
                                <div>{{ $product['email'] }}</div>
                            </li>
                        </ul>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="col-md-3">เบอร์โทรศัพท์ : </div>
                <div class="col-md-9">
                    <ul class="features-list">
                        <li class="list-item one-column features-item">
                            <div class="phone"><a href="javascript://">{{ substr($product['phone'], 0, -4).'xxxx' }}</a></div>
                        </li>
                    </ul>
                </div>
            </div>

            @if($product['user_id'])

                <div class="row">
                    <div class="col-md-3">ข้อความ : </div>
                    <div class="col-md-9">
                        <ul class="features-list">
                            <li class="list-item one-column features-item">
                                <p>If you have any question or remarks about Trefecta, fill in your details below, and we will contact you
                                    as soon as possible.<br></p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div>
                    <form action="" method="post" class="wpcf7-form" novalidate="novalidate" id="send-message">
                        <div style="display: none;">
                            <input type="hidden" name="product" value="{{ $product['id'] }}">
                        </div>

                        <div class="wpcf7-response-output wpcf7-display-none"></div>
                        <div class="fields">
                            <div class="col col-1">
                                <span class="wpcf7-form-control-wrap firstname">
                                    <input type="text" name="first_name" value="{{ old('first_name') }}" size="40"
                                           class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required {{ $errors->has('first_name') ? ' has-error' : '' }}"
                                           aria-required="true" aria-invalid="false" placeholder="First name">
                                </span>
                            </div>
                            <div class="col col-2">
                                <span class="wpcf7-form-control-wrap lastname">
                                    <input type="text" name="last_name" value="{{ old('last_name') }}" size="40"
                                           class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required {{ $errors->has('last_name') ? ' has-error' : '' }}"
                                           aria-required="true" aria-invalid="false" placeholder="Last name">
                                </span>
                            </div>
                            <div class="col col-1">
                                <span class="wpcf7-form-control-wrap emailaddress">
                                    <input type="email" name="email" value="{{ old('email') }}" size="40"
                                           class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email {{ $errors->has('email') ? ' has-error' : '' }}"
                                           aria-required="true" aria-invalid="false" placeholder="E-mail address">
                                </span>
                            </div>
                            <div class="col col-2">
                                <span class="wpcf7-form-control-wrap phone">
                                    <input type="text" name="phone" value="{{ old('phone') }}" size="40"
                                           class="wpcf7-form-control wpcf7-text {{ $errors->has('phone') ? ' has-error' : '' }}"
                                           aria-invalid="false" placeholder="Phone number">
                                </span>
                            </div>
                        </div>
                        <div>
                        <span class="wpcf7-form-control-wrap comments">
                            <textarea name="comments" cols="40" rows="20"
                                      class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required {{ $errors->has('comments') ? ' has-error' : '' }}"
                                      placeholder="Comments/question">{{ old('comments') }}</textarea>
                        </span>
                        </div>

                        <div class="form-buttons">
                            <input type="submit" value="Send message" class="wpcf7-form-control wpcf7-submit button bronze">
                        </div>
                    </form>
                </div>

            @endif





        </div>

        <div class="bs-docs-section social-section">
            <ul class="social">
                <li class="social-twitter">
                    <a href="http://twitter.com" title="Twitter" target="_blank"><i class="fa fa-twitter icon-2x" aria-hidden="true">&nbsp;</i></a>
                </li>
                <li class="social-facebook">
                    <a href="http://www.facebook.com" title="Facebook" target="_blank"><i class="fa fa-facebook icon-2x">&nbsp;</i></a></li>
                <li class="social-pinterest">
                    <a href="http://www.pinterest.com" title="Pinterest" target="_blank"><i class="fa fa-pinterest-p icon-2x">&nbsp;</i>
                    </a>
                </li>
                <li class="social-google">
                    <a href="http://www.youtube.com" title="Google+" target="_blank"><i class="fa fa-google-plus icon-2x">&nbsp;</i></a>
                </li>
                <li class="social-linkedin">
                    <a href="http://www.pinterest.com" title="Pinterest" target="_blank"><i class="fa fa-linkedin icon-2x">&nbsp;</i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="bs-docs-section fb-comments-section">
            <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5"></div>
        </div>

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1724713611112155";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
    </div>

    <div class="col-md-3">

        <div class="side-panel bs-docs-sidebar">
            <div class="topic">
                <span>New Posts</span>
            </div>
            <ul class="bullet-list-round">
                <li>
                    ที่ดิน
                    <ul class="bullet-list-round open">
                        <li>
                            ภาคกลาง
                            <ul class="bullet-list-round open">
                                <li>
                                    <a href="#">กรุงเทพมหานคร</a> (15)
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    ที่ดิน
                    <ul class="bullet-list-round open">
                        <li>
                            ภาคกลาง
                            <ul class="bullet-list-round open">
                                <li>
                                    <a href="#">กรุงเทพมหานคร</a> (15)
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="sidebar-widget">

            <aside id="new_entries-2" class="widget widget_new_entries">
                <h3 class="side-list-title">News</h3>
                <ul class="new-entrys">
                    <li class="new-entry">
                        <div class="new-entry-thumb">
                            <a href="https://wp-simplicity.com/simplicity2-4-1/" class="new-entry-image"
                               title="Simplicity2.4.1公開。AMPページにアイコン追加、外部URLの画像でもAMPエラーが出ないように仕様変更。"><img
                                        src="https://wp-simplicity.com/wp-content/uploads/2016/12/TEX1SW9IZW-100x100.jpg"
                                        class="attachment-thumb100 size-thumb100 wp-post-image"
                                        alt="Simplicity2.4.1公開。AMPページにアイコン追加、外部URLの画像でもAMPエラーが出ないように仕様変更。"
                                        srcset="https://wp-simplicity.com/wp-content/uploads/2016/12/TEX1SW9IZW-100x100.jpg 100w, https://wp-simplicity.com/wp-content/uploads/2016/12/TEX1SW9IZW-300x300.jpg 300w, https://wp-simplicity.com/wp-content/uploads/2016/12/TEX1SW9IZW-150x150.jpg 150w"
                                        sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"></a>
                        </div><!-- /.new-entry-thumb -->

                        <div class="new-entry-content">
                            <a href="https://wp-simplicity.com/simplicity2-4-1/" class="new-entry-title"
                               title="Simplicity2.4.1公開。AMPページにアイコン追加、外部URLの画像でもAMPエラーが出ないように仕様変更。">Simplicity2.4.1公開。AMPページにアイコン追加、外部URLの画像でもAMPエラーが出ないように仕様変更。</a>
                        </div><!-- /.new-entry-content -->

                    </li><!-- /.new-entry -->
                    <li class="new-entry">
                        <div class="new-entry-thumb">
                            <a href="https://wp-simplicity.com/simplicity2-4/" class="new-entry-image"
                               title="Simplicity2.4.0i安定版公開。2.3～2.4変更点まとめ。"><img
                                        src="https://wp-simplicity.com/wp-content/uploads/2016/11/H966MN75RM-100x100.jpg"
                                        class="attachment-thumb100 size-thumb100 wp-post-image"
                                        alt="Simplicity2.4.0i安定版公開。2.3～2.4変更点まとめ。"
                                        srcset="https://wp-simplicity.com/wp-content/uploads/2016/11/H966MN75RM-100x100.jpg 100w, https://wp-simplicity.com/wp-content/uploads/2016/11/H966MN75RM-300x300.jpg 300w, https://wp-simplicity.com/wp-content/uploads/2016/11/H966MN75RM-150x150.jpg 150w"
                                        sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"></a>
                        </div><!-- /.new-entry-thumb -->

                        <div class="new-entry-content">
                            <a href="https://wp-simplicity.com/simplicity2-4/" class="new-entry-title"
                               title="Simplicity2.4.0i安定版公開。2.3～2.4変更点まとめ。">Simplicity2.4.0i安定版公開。2.3～2.4変更点まとめ。</a>
                        </div><!-- /.new-entry-content -->

                    </li><!-- /.new-entry -->
                    <li class="new-entry">
                        <div class="new-entry-thumb">
                            <a href="https://wp-simplicity.com/simplicity2-4-0h/" class="new-entry-image"
                               title="Simplicity2.4.0h公開。AnalyticsでAMPページをわかりやすいように、Pocket仕様変更に対応、highlight.jsの不具合修正など。"><img
                                        src="https://wp-simplicity.com/wp-content/uploads/2016/11/pexels-photo-46087-100x100.jpg"
                                        class="attachment-thumb100 size-thumb100 wp-post-image"
                                        alt="Simplicity2.4.0h公開。AnalyticsでAMPページをわかりやすいように、Pocket仕様変更に対応、highlight.jsの不具合修正など。"
                                        srcset="https://wp-simplicity.com/wp-content/uploads/2016/11/pexels-photo-46087-100x100.jpg 100w, https://wp-simplicity.com/wp-content/uploads/2016/11/pexels-photo-46087-300x300.jpg 300w, https://wp-simplicity.com/wp-content/uploads/2016/11/pexels-photo-46087-150x150.jpg 150w"
                                        sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"></a>
                        </div><!-- /.new-entry-thumb -->

                        <div class="new-entry-content">
                            <a href="https://wp-simplicity.com/simplicity2-4-0h/" class="new-entry-title"
                               title="Simplicity2.4.0h公開。AnalyticsでAMPページをわかりやすいように、Pocket仕様変更に対応、highlight.jsの不具合修正など。">Simplicity2.4.0h公開。AnalyticsでAMPページをわかりやすいように、Pocket仕様変更に対応、highlight.jsの不具合修正など。</a>
                        </div><!-- /.new-entry-content -->

                    </li><!-- /.new-entry -->
                    <li class="new-entry">
                        <div class="new-entry-thumb">
                            <a href="https://wp-simplicity.com/no-amp-page-settings/" class="new-entry-image"
                               title="Simplicityで個別にAMPページを生成しないようにする設定方法"><img
                                        src="https://wp-simplicity.com/wp-content/uploads/2016/11/D3OK3MG74X-100x100.jpg"
                                        class="attachment-thumb100 size-thumb100 wp-post-image"
                                        alt="Simplicityで個別にAMPページを生成しないようにする設定方法"
                                        srcset="https://wp-simplicity.com/wp-content/uploads/2016/11/D3OK3MG74X-100x100.jpg 100w, https://wp-simplicity.com/wp-content/uploads/2016/11/D3OK3MG74X-300x300.jpg 300w, https://wp-simplicity.com/wp-content/uploads/2016/11/D3OK3MG74X-150x150.jpg 150w"
                                        sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"></a>
                        </div><!-- /.new-entry-thumb -->

                        <div class="new-entry-content">
                            <a href="https://wp-simplicity.com/no-amp-page-settings/" class="new-entry-title"
                               title="Simplicityで個別にAMPページを生成しないようにする設定方法">Simplicityで個別にAMPページを生成しないようにする設定方法</a>
                        </div><!-- /.new-entry-content -->

                    </li><!-- /.new-entry -->
                    <li class="new-entry">
                        <div class="new-entry-thumb">
                            <a href="https://wp-simplicity.com/comment-external-blog-caard/" class="new-entry-image"
                               title="Simplicityのコメント欄で利用できる外部ブログカード機能について"><img
                                        src="https://wp-simplicity.com/wp-content/uploads/2016/11/H97RK4RB9U-100x100.jpg"
                                        class="attachment-thumb100 size-thumb100 wp-post-image"
                                        alt="Simplicityのコメント欄で利用できる外部ブログカード機能について"
                                        srcset="https://wp-simplicity.com/wp-content/uploads/2016/11/H97RK4RB9U-100x100.jpg 100w, https://wp-simplicity.com/wp-content/uploads/2016/11/H97RK4RB9U-300x300.jpg 300w, https://wp-simplicity.com/wp-content/uploads/2016/11/H97RK4RB9U-150x150.jpg 150w"
                                        sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"></a>
                        </div><!-- /.new-entry-thumb -->

                        <div class="new-entry-content">
                            <a href="https://wp-simplicity.com/comment-external-blog-caard/" class="new-entry-title"
                               title="Simplicityのコメント欄で利用できる外部ブログカード機能について">Simplicityのコメント欄で利用できる外部ブログカード機能について</a>
                        </div><!-- /.new-entry-content -->

                    </li><!-- /.new-entry -->
                </ul>
                <div class="clear"></div>
            </aside>

        </div>

    </div>
@stop

@section('second-content')

    <div class="col-md-9">
        <div class="list-container">
            <h2>ประกาศล่าสุด</h2>
            <ul class="list">
                <li>
                    <span class="list-badge"><a href="#">คอนโด</a></span>
                    <span class="list-article-summary">
                <h2 class="list-title">An example article</h2>
                <span class="list-author">Chris Macrae</span>
            </span>
                </li>
                <li>
                    <span class="list-badge">บ้าน</span>
                    <span class="list-article-summary">
                <h2 class="list-title">An example article</h2>
                <span class="list-author">Chris Macrae</span>
            </span>
                </li>
                <li>
                    <span class="list-badge">ที่ดิน</span>
                    <span class="list-article-summary">
                <h2 class="list-title">An example article</h2>
                <span class="list-author">Chris Macrae</span>
            </span>
                </li>
                <li>
                    <span class="list-badge">คอนโด</span>
                    <span class="list-article-summary">
                <h2 class="list-title">An example article</h2>
                <span class="list-author">Chris Macrae</span>
            </span>
                </li>
                <li>
                    <span class="list-badge">คอนโด</span>
                    <span class="list-article-summary">
                <h2 class="list-title">An example article</h2>
                <span class="list-author">Chris Macrae</span>
            </span>
                </li>
                <li>
                    <span class="list-badge">คอนโด</span>
                    <span class="list-article-summary">
                <h2 class="list-title">An example article</h2>
                <span class="list-author">Chris Macrae</span>
            </span>
                </li>

            </ul>
        </div>
    </div>

    <div class="col-md-3">
        <div class="sidebar-widget">
            <div class="fb-page" data-href="https://www.facebook.com/unbokofficial/" data-tabs="timeline"
                 data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                 data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/unbokofficial/" class="fb-xfbml-parse-ignore"><a
                            href="https://www.facebook.com/unbokofficial/">Unbok</a></blockquote>
            </div>
        </div>
    </div>

@stop



@section('third-content')

    <div class="col-md-9">
        <h3 class="side-list-title">Review</h3>
        <aside id="related-entries">
            <article class="related-entry cf">
                <div class="related-entry-thumb">
                    <a href="//wp-simplicity.com/simplicity-and-wordpress-popular-posts/"
                       title="SimplicityとWordPress Popular Postsを関連づける方法">
                        <img src="//wp-simplicity.com/wp-content/uploads/2014/12/rope-494423_12801-100x100.jpg"
                             class="related-entry-thumb-image wp-post-image"
                             alt="SimplicityとWordPress Popular Postsを関連づける方法"
                             srcset="//wp-simplicity.com/wp-content/uploads/2014/12/rope-494423_12801-300x300.jpg 300w, //wp-simplicity.com/wp-content/uploads/2014/12/rope-494423_12801-100x100.jpg 100w, //wp-simplicity.com/wp-content/uploads/2014/12/rope-494423_12801-150x150.jpg 150w"
                             sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"> </a>
                </div>
                <!-- /.related-entry-thumb -->

                <div class="related-entry-content">
                    <header>
                        <h3 class="related-entry-title">
                            <a href="//wp-simplicity.com/simplicity-and-wordpress-popular-posts/"
                               class="related-entry-title-link" title="SimplicityとWordPress Popular Postsを関連づける方法">
                                SimplicityとWordPress Popular Postsを関連づける方法 </a></h3>
                    </header>
                    <p class="related-entry-snippet">
                        最近、メールなどでSimplicityとWordPress Popular Postsに関する質問をいくつかいただきました。 内容は、...</p>

                    <footer>
                        <p class="related-entry-read"><a
                                    href="//wp-simplicity.com/simplicity-and-wordpress-popular-posts/">記事を読む</a></p>
                    </footer>

                </div>
                <!-- /.related-entry-content -->
            </article>
            <!-- /.elated-entry -->

            <article class="related-entry cf">
                <div class="related-entry-thumb">
                    <a href="//wp-simplicity.com/searchform-style/" title="Simplicity検索ボックスのスタイルいろいろ">
                        <img src="//wp-simplicity.com/wp-content/uploads/2014/08/magnifying-glass-13622534633G4-100x100.jpg"
                             class="related-entry-thumb-image wp-post-image" alt="Simplicity検索ボックスのスタイルいろいろ"
                             srcset="//wp-simplicity.com/wp-content/uploads/2014/08/magnifying-glass-13622534633G4-300x300.jpg 300w, //wp-simplicity.com/wp-content/uploads/2014/08/magnifying-glass-13622534633G4-100x100.jpg 100w, //wp-simplicity.com/wp-content/uploads/2014/08/magnifying-glass-13622534633G4-150x150.jpg 150w"
                             sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"> </a>
                </div>
                <!-- /.related-entry-thumb -->

                <div class="related-entry-content">
                    <header>
                        <h3 class="related-entry-title">
                            <a href="//wp-simplicity.com/searchform-style/" class="related-entry-title-link"
                               title="Simplicity検索ボックスのスタイルいろいろ">
                                Simplicity検索ボックスのスタイルいろいろ </a></h3>
                    </header>
                    <p class="related-entry-snippet">


                        Simplicity20140828から、ブログの検索窓のスタイルをテーマカスタマイザーから変更できるようにしました。 Wor...

                    </p>

                    <footer>
                        <p class="related-entry-read"><a href="//wp-simplicity.com/searchform-style/">記事を読む</a></p>
                    </footer>

                </div>
                <!-- /.related-entry-content -->
            </article>
            <!-- /.elated-entry -->

            <article class="related-entry cf">
                <div class="related-entry-thumb">
                    <a href="//wp-simplicity.com/go-to-top-custum/" title="Simplicityでトップへ戻るボタンに画像を使用する方法">
                        <img src="//wp-simplicity.com/wp-content/uploads/2015/04/73e8b3abc0b9635c0f2af539836f20201-100x100.jpg"
                             class="related-entry-thumb-image wp-post-image" alt="Simplicityでトップへ戻るボタンに画像を使用する方法"
                             srcset="//wp-simplicity.com/wp-content/uploads/2015/04/73e8b3abc0b9635c0f2af539836f20201-300x300.jpg 300w, //wp-simplicity.com/wp-content/uploads/2015/04/73e8b3abc0b9635c0f2af539836f20201-100x100.jpg 100w, //wp-simplicity.com/wp-content/uploads/2015/04/73e8b3abc0b9635c0f2af539836f20201-150x150.jpg 150w"
                             sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"> </a>
                </div>
                <!-- /.related-entry-thumb -->

                <div class="related-entry-content">
                    <header>
                        <h3 class="related-entry-title">
                            <a href="//wp-simplicity.com/go-to-top-custum/" class="related-entry-title-link"
                               title="Simplicityでトップへ戻るボタンに画像を使用する方法">
                                Simplicityでトップへ戻るボタンに画像を使用する方法 </a></h3>
                    </header>
                    <p class="related-entry-snippet">


                        Simplicityデフォルトでは、記事をスクロールなどすると、画面右下に以下のような「トップへ戻るボタン」が表示されます。 ...

                    </p>

                    <footer>
                        <p class="related-entry-read"><a href="//wp-simplicity.com/go-to-top-custum/">記事を読む</a></p>
                    </footer>

                </div>
                <!-- /.related-entry-content -->
            </article>
            <!-- /.elated-entry -->

            <article class="related-entry cf">
                <div class="related-entry-thumb">
                    <a href="//wp-simplicity.com/ads-settings/" title="「広告の設定」カスタマイズについての解説">
                        <img src="//wp-simplicity.com/wp-content/uploads/2014/08/8628912404_6b859de7b7_k-100x100.jpg"
                             class="related-entry-thumb-image wp-post-image" alt="「広告の設定」カスタマイズについての解説"
                             srcset="//wp-simplicity.com/wp-content/uploads/2014/08/8628912404_6b859de7b7_k-300x300.jpg 300w, //wp-simplicity.com/wp-content/uploads/2014/08/8628912404_6b859de7b7_k-100x100.jpg 100w, //wp-simplicity.com/wp-content/uploads/2014/08/8628912404_6b859de7b7_k-150x150.jpg 150w"
                             sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"> </a>
                </div>
                <!-- /.related-entry-thumb -->

                <div class="related-entry-content">
                    <header>
                        <h3 class="related-entry-title">
                            <a href="//wp-simplicity.com/ads-settings/" class="related-entry-title-link"
                               title="「広告の設定」カスタマイズについての解説">
                                「広告の設定」カスタマイズについての解説 </a></h3>
                    </header>
                    <p class="related-entry-snippet">
                        Simplicityでは、広告の表示や位置などの設定を行うことができます。 広告の貼り付け方の設定は以下の記事を参照してください。 ...</p>

                    <footer>
                        <p class="related-entry-read"><a href="//wp-simplicity.com/ads-settings/">記事を読む</a></p>
                    </footer>

                </div>
                <!-- /.related-entry-content -->
            </article>
            <!-- /.elated-entry -->

            <article class="related-entry cf">
                <div class="related-entry-thumb">
                    <a href="//wp-simplicity.com/twitter-cards/" title="Twitter Cardsへの登録方法">
                        <img src="//wp-simplicity.com/wp-content/uploads/2014/07/Twitter-100x100.jpg"
                             class="related-entry-thumb-image wp-post-image" alt="Twitter Cardsへの登録方法"
                             srcset="//wp-simplicity.com/wp-content/uploads/2014/07/Twitter-300x300.jpg 300w, //wp-simplicity.com/wp-content/uploads/2014/07/Twitter-100x100.jpg 100w, //wp-simplicity.com/wp-content/uploads/2014/07/Twitter-150x150.jpg 150w"
                             sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"> </a>
                </div>
                <!-- /.related-entry-thumb -->

                <div class="related-entry-content">
                    <header>
                        <h3 class="related-entry-title">
                            <a href="//wp-simplicity.com/twitter-cards/" class="related-entry-title-link"
                               title="Twitter Cardsへの登録方法">
                                Twitter Cardsへの登録方法 </a></h3>
                    </header>
                    <p class="related-entry-snippet">
                        Simplicityでは、プラグインを使用せずとも、デフォルトで以下のようなTwitter Cards情報のタグが挿入されます。 ...</p>

                    <footer>
                        <p class="related-entry-read"><a href="//wp-simplicity.com/twitter-cards/">記事を読む</a></p>
                    </footer>

                </div>
                <!-- /.related-entry-content -->
            </article>
            <!-- /.elated-entry -->

            <article class="related-entry cf">
                <div class="related-entry-thumb">
                    <a href="//wp-simplicity.com/simplicity1-to-2-child-theme-settings/"
                       title="Simplicity1用の子テーマをSimplicity2で使う時の修正方法">
                        <img src="//wp-simplicity.com/wp-content/uploads/2015/12/pier-jetty-wooden-beach-sand-bridge-construction-1-100x100.jpg"
                             class="related-entry-thumb-image wp-post-image"
                             alt="Simplicity1用の子テーマをSimplicity2で使う時の修正方法"
                             srcset="//wp-simplicity.com/wp-content/uploads/2015/12/pier-jetty-wooden-beach-sand-bridge-construction-1-300x300.jpg 300w, //wp-simplicity.com/wp-content/uploads/2015/12/pier-jetty-wooden-beach-sand-bridge-construction-1-100x100.jpg 100w, //wp-simplicity.com/wp-content/uploads/2015/12/pier-jetty-wooden-beach-sand-bridge-construction-1-150x150.jpg 150w"
                             sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"> </a>
                </div>
                <!-- /.related-entry-thumb -->

                <div class="related-entry-content">
                    <header>
                        <h3 class="related-entry-title">
                            <a href="//wp-simplicity.com/simplicity1-to-2-child-theme-settings/"
                               class="related-entry-title-link" title="Simplicity1用の子テーマをSimplicity2で使う時の修正方法">
                                Simplicity1用の子テーマをSimplicity2で使う時の修正方法 </a></h3>
                    </header>
                    <p class="related-entry-snippet">
                        Simplicity2を公開しました。 Simplicity2の子テーマも公開しています。 ただ、Simplicity1の子テーマは、...</p>

                    <footer>
                        <p class="related-entry-read"><a
                                    href="//wp-simplicity.com/simplicity1-to-2-child-theme-settings/">記事を読む</a></p>
                    </footer>

                </div>
                <!-- /.related-entry-content -->
            </article>
            <!-- /.elated-entry -->

            <article class="related-entry cf">
                <div class="related-entry-thumb">
                    <a href="//wp-simplicity.com/simplicity1-to-2-customizer/"
                       title="Simplicity1系から2に移行するときにのテーマカスタマイザーの再設定方法">
                        <img src="//wp-simplicity.com/wp-content/uploads/2015/12/construction-worker-concrete-hummer-vibrator-job-1-100x100.jpg"
                             class="related-entry-thumb-image wp-post-image"
                             alt="Simplicity1系から2に移行するときにのテーマカスタマイザーの再設定方法"
                             srcset="//wp-simplicity.com/wp-content/uploads/2015/12/construction-worker-concrete-hummer-vibrator-job-1-300x300.jpg 300w, //wp-simplicity.com/wp-content/uploads/2015/12/construction-worker-concrete-hummer-vibrator-job-1-100x100.jpg 100w, //wp-simplicity.com/wp-content/uploads/2015/12/construction-worker-concrete-hummer-vibrator-job-1-150x150.jpg 150w"
                             sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"> </a>
                </div>
                <!-- /.related-entry-thumb -->

                <div class="related-entry-content">
                    <header>
                        <h3 class="related-entry-title">
                            <a href="//wp-simplicity.com/simplicity1-to-2-customizer/" class="related-entry-title-link"
                               title="Simplicity1系から2に移行するときにのテーマカスタマイザーの再設定方法">
                                Simplicity1系から2に移行するときにのテーマカスタマイザーの再設定方法 </a></h3>
                    </header>
                    <p class="related-entry-snippet">
                        Simplicity2を公開しました。 Simplicity2の子テーマも公開しています。 Simplicity2では、テーマカスタマ...</p>

                    <footer>
                        <p class="related-entry-read"><a
                                    href="//wp-simplicity.com/simplicity1-to-2-customizer/">記事を読む</a></p>
                    </footer>

                </div>
                <!-- /.related-entry-content -->
            </article>
            <!-- /.elated-entry -->

            <article class="related-entry cf">
                <div class="related-entry-thumb">
                    <a href="//wp-simplicity.com/how-to-set-big-header-image/" title="Simplicityに画面幅いっぱいのヘッダー画像を設定する方法">
                        <img src="//wp-simplicity.com/wp-content/uploads/2015/01/battery-cameara-canon-261-823x550-100x100.jpg"
                             class="related-entry-thumb-image wp-post-image" alt="Simplicityに画面幅いっぱいのヘッダー画像を設定する方法"
                             srcset="//wp-simplicity.com/wp-content/uploads/2015/01/battery-cameara-canon-261-823x550-300x300.jpg 300w, //wp-simplicity.com/wp-content/uploads/2015/01/battery-cameara-canon-261-823x550-100x100.jpg 100w, //wp-simplicity.com/wp-content/uploads/2015/01/battery-cameara-canon-261-823x550-150x150.jpg 150w"
                             sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"> </a>
                </div>
                <!-- /.related-entry-thumb -->

                <div class="related-entry-content">
                    <header>
                        <h3 class="related-entry-title">
                            <a href="//wp-simplicity.com/how-to-set-big-header-image/" class="related-entry-title-link"
                               title="Simplicityに画面幅いっぱいのヘッダー画像を設定する方法">
                                Simplicityに画面幅いっぱいのヘッダー画像を設定する方法 </a></h3>
                    </header>
                    <p class="related-entry-snippet">
                        Simplicity1.4から、テーマカスタマイザーだけで、以下のような画面幅いっぱいのヘッダー画像を設定できるようになりました。 この...</p>

                    <footer>
                        <p class="related-entry-read"><a
                                    href="//wp-simplicity.com/how-to-set-big-header-image/">記事を読む</a></p>
                    </footer>

                </div>
                <!-- /.related-entry-content -->
            </article>
            <!-- /.elated-entry -->

            <article class="related-entry cf">
                <div class="related-entry-thumb">
                    <a href="//wp-simplicity.com/ptengine/" title="SimplicityでPtengineのアクセス解析（ヒートマップ分析）を行う方法">
                        <img src="//wp-simplicity.com/wp-content/uploads/2015/07/industry-vintage-old-fabric-large1-100x100.jpg"
                             class="related-entry-thumb-image wp-post-image"
                             alt="SimplicityでPtengineのアクセス解析（ヒートマップ分析）を行う方法"
                             srcset="//wp-simplicity.com/wp-content/uploads/2015/07/industry-vintage-old-fabric-large1-300x300.jpg 300w, //wp-simplicity.com/wp-content/uploads/2015/07/industry-vintage-old-fabric-large1-100x100.jpg 100w, //wp-simplicity.com/wp-content/uploads/2015/07/industry-vintage-old-fabric-large1-150x150.jpg 150w"
                             sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"> </a>
                </div>
                <!-- /.related-entry-thumb -->

                <div class="related-entry-content">
                    <header>
                        <h3 class="related-entry-title">
                            <a href="//wp-simplicity.com/ptengine/" class="related-entry-title-link"
                               title="SimplicityでPtengineのアクセス解析（ヒートマップ分析）を行う方法">
                                SimplicityでPtengineのア���セス解析（ヒートマップ分析）を行う方法 </a></h3>
                    </header>
                    <p class="related-entry-snippet">
                        Simplicity1.7.7より、カスタマイザーでIDを設定することにより、Ptengineでの解析を行えるようになりました。 Pten...</p>

                    <footer>
                        <p class="related-entry-read"><a href="//wp-simplicity.com/ptengine/">記事を読む</a></p>
                    </footer>

                </div>
                <!-- /.related-entry-content -->
            </article>
            <!-- /.elated-entry -->

            <article class="related-entry cf">
                <div class="related-entry-thumb">
                    <a href="//wp-simplicity.com/skin-parts/" title="Simplicitパーツデザインの着せ替えができる「パーツスキン」機能の使い方と仕様">
                        <img src="//wp-simplicity.com/wp-content/uploads/2015/07/fashion-clothes-hanger-clothes-rack-clothing-landscape1-100x100.jpg"
                             class="related-entry-thumb-image wp-post-image"
                             alt="Simplicitパーツデザインの着せ替えができる「パーツスキン」機能の使い方と仕様"
                             srcset="//wp-simplicity.com/wp-content/uploads/2015/07/fashion-clothes-hanger-clothes-rack-clothing-landscape1-300x300.jpg 300w, //wp-simplicity.com/wp-content/uploads/2015/07/fashion-clothes-hanger-clothes-rack-clothing-landscape1-100x100.jpg 100w, //wp-simplicity.com/wp-content/uploads/2015/07/fashion-clothes-hanger-clothes-rack-clothing-landscape1-150x150.jpg 150w"
                             sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"> </a>
                </div>
                <!-- /.related-entry-thumb -->

                <div class="related-entry-content">
                    <header>
                        <h3 class="related-entry-title">
                            <a href="//wp-simplicity.com/skin-parts/" class="related-entry-title-link"
                               title="Simplicitパーツデザインの着せ替えができる「パーツスキン」機能の使い方と仕様">
                                Simplicitパーツデザインの着せ替えができる「パーツスキン」機能の使い方と仕様 </a></h3>
                    </header>
                    <p class="related-entry-snippet">
                        Simplicity1.7.9でパーツスキン機能を実装しました。 以前にもスキン機能というのはありました。 パーツスキン機能も、スキン機...</p>

                    <footer>
                        <p class="related-entry-read"><a href="//wp-simplicity.com/skin-parts/">記事を読む</a></p>
                    </footer>

                </div>
                <!-- /.related-entry-content -->
            </article>
            <!-- /.elated-entry -->


            <br style="clear:both;"></aside>
    </div>



    <div class="col-md-3">
        <div class="sidebar-widget">
            <aside id="archives-3" class="widget widget_archive"><h3 class="widget_title sidebar_widget_title">
                    ย้อนหลัง</h3>
                <ul class="years">
                    <li class="year_2016"><a class="year">2016年</a>
                        <ul class="month">
                            <li><a href="https://wp-simplicity.com/2016/12/">12月</a> (1)</li>
                            <li><a href="https://wp-simplicity.com/2016/11/">11月</a> (11)</li>
                            <li><a href="https://wp-simplicity.com/2016/10/">10月</a> (11)</li>
                            <li><a href="https://wp-simplicity.com/2016/09/">9月</a> (5)</li>
                            <li><a href="https://wp-simplicity.com/2016/08/">8月</a> (8)</li>
                            <li><a href="https://wp-simplicity.com/2016/07/">7月</a> (4)</li>
                            <li><a href="https://wp-simplicity.com/2016/06/">6月</a> (7)</li>
                            <li><a href="https://wp-simplicity.com/2016/05/">5月</a> (4)</li>
                            <li><a href="https://wp-simplicity.com/2016/04/">4月</a> (7)</li>
                            <li><a href="https://wp-simplicity.com/2016/03/">3月</a> (4)</li>
                            <li><a href="https://wp-simplicity.com/2016/02/">2月</a> (11)</li>
                            <li><a href="https://wp-simplicity.com/2016/01/">1月</a> (6)</li>
                        </ul>
                    </li>
                    <li class="year_2015"><a class="year">2015年</a>
                        <ul class="month hide">
                            <li><a href="https://wp-simplicity.com/2015/12/">12月</a> (6)</li>
                            <li><a href="https://wp-simplicity.com/2015/11/">11月</a> (6)</li>
                            <li><a href="https://wp-simplicity.com/2015/10/">10月</a> (2)</li>
                            <li><a href="https://wp-simplicity.com/2015/09/">9月</a> (7)</li>
                            <li><a href="https://wp-simplicity.com/2015/08/">8月</a> (4)</li>
                            <li><a href="https://wp-simplicity.com/2015/07/">7月</a> (12)</li>
                            <li><a href="https://wp-simplicity.com/2015/06/">6月</a> (11)</li>
                            <li><a href="https://wp-simplicity.com/2015/05/">5月</a> (9)</li>
                            <li><a href="https://wp-simplicity.com/2015/04/">4月</a> (8)</li>
                            <li><a href="https://wp-simplicity.com/2015/03/">3月</a> (10)</li>
                            <li><a href="https://wp-simplicity.com/2015/02/">2月</a> (10)</li>
                            <li><a href="https://wp-simplicity.com/2015/01/">1月</a> (13)</li>
                        </ul>
                    </li>
                    <li class="year_2014"><a class="year">2014年</a>
                        <ul class="month hide">
                            <li><a href="https://wp-simplicity.com/2014/12/">12月</a> (14)</li>
                            <li><a href="https://wp-simplicity.com/2014/11/">11月</a> (17)</li>
                            <li><a href="https://wp-simplicity.com/2014/10/">10月</a> (18)</li>
                            <li><a href="https://wp-simplicity.com/2014/09/">9月</a> (19)</li>
                            <li><a href="hattps://wp-simplicity.com/2014/08/">8月</a> (31)</li>
                            <li><a href="https://wp-simplicity.com/2014/07/">7月</a> (33)</li>
                        </ul>
                    </li>
                </ul>
            </aside>
        </div>
    </div>
@stop