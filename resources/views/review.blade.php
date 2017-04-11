@extends('layouts.main')
@section('title', $product['title'])
@section('meta')
    <meta name="keywords" content="คอนโด บ้านเดี่ยว ทาวน์เฮ้าส์ ขายบ้าน บ้านมือสอง บ้านใหม่ โครงการใหม่ คอนโดใหม่ ข่าว">
    <meta name="description" content="nainam.com - รวบรวม คอนโด บ้านเดี่ยว ทาวน์เฮ้าส์ ขายบ้าน บ้านมือสอง ครบถ้วนและอัพเดทที่สุด พร้อมแผนที่ทุกประกาศ สไตล์คุณ">
    <meta property="article:author" content="nainam" />

    <!-- Twitter: see https://dev.twitter.com/docs/cards/types/summary-card for details -->
    <meta name="twitter:creator" content="@nainam">
    <meta name="twitter:title" content="{{ $product['title'] }}">
    <meta name="twitter:description" content="{{ mb_substr(strip_tags($product['content']),0,110, 'UTF-8') }}">

    <!-- Facebook (and some others) use the Open Graph protocol: see http://ogp.me/ for details -->
    <meta property="og:title" content="{{ $product['title'] }}"/>
    <meta property="og:description" content="{{ mb_substr(strip_tags($product['content']),0,110, 'UTF-8') }}"/>
    <meta property="og:image" content="{{ $image($product_img[0]->image) }}"/>
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


        $( window ).resize(function() {
            init();
        });

        $(function () {
            init();
        });

        function init() {
            var $this = $(window),
                $width = $this.width();

            if($width <= 749){
                var value = $width - 30;
                var valueHeight = Math.round((value/16)*9);
                var styles = {
                    width : value,
                    height: valueHeight,
                    margin: '0 auto'
                };
                $('.project-screen .slick-slide img').css(styles);
            }else{
                $('.project-screen .slick-slide img').removeAttr( 'style' );
            }
        }


        $(document).on('click', '#submit-notice', function () {

            var $value = $('input[name="_notice"]:checked').val(),
                $id = $(this).data('id');
            if (confirm("คุณต้องการแจ้งหรือไม่!")) {
                $.ajax({
                    url     : "{{ route('update.product') }}",
                    type    : 'post',
                    data : {
                        productId : $id,
                        status : $value
                    },
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success : function ( json )
                    {
                        alert(json.result);
                        _loading(false);
                        $('.dialog-content').removeClass('bgw').html(_loadingHTML());
                    },
                    error   : function ( jqXhr, json, errorThrown )
                    {
                        var errors = jqXhr.responseJSON;
                        console.log(errors);
                    }
                });
            }


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
                            "title": "{{ $item['attributes']['area'] }}",
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
                    scaledSize: new google.maps.Size(32, 32)
                };

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(feature.geometry.coordinates[0], feature.geometry.coordinates[1]),
                    icon: image,
                    map: map,
                    id: featureID
                });

                $('#map-legend > ul').append('<li class="ng-scope ng-binding point" data-title="' + feature.properties.title + '"><p>' + feature.properties.title + '</p><p class="m-l-distance">ระยะทาง : ' + feature.properties.distance + '</p></li>');

                allMyMarkers.push(marker);
            }


            for (var i = 0, jsonFeature; jsonFeature = geojsonFeature.features[i]; i++) {
                addMarker(jsonFeature, i);
            }
            $('#map-legend > ul li:first-child').addClass('active');

            $('.point').on('click', function () {

                $('.point').removeClass('active');
                $(this).addClass('active');

                var $title = $(this).data('title'),
                    $lat = '',
                    $lng = '';

                for (var i = 0, jsonFeature; jsonFeature = geojsonFeature.features[i]; i++) {
                    if (jsonFeature.properties.title == $title) {
                        $lat = jsonFeature.geometry.coordinates[0];
                        $lng = jsonFeature.geometry.coordinates[1];
                        map.panTo(new google.maps.LatLng($lat, $lng));
                    }
                }
                //var selectedID = $(this).attr('id');
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
        <a class="product-notice" data-id="{{ $product['id'] }}" href="javascript://">แจ้งประกาศไม่เหมาะสม</a>
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

                            {{--@if(count($product_facility) > 5)--}}
                                {{--<div class="show-more">--}}
                                    {{--<a href="javascript://" data-toggle="collapse" data-target=".toggle">--}}
                                        {{--<span class="show-less">ดูเพิ่มเติม</span>--}}
                                        {{--<i class="fa fa-chevron-circle-down" aria-hidden="true"></i>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--@endif--}}



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

                <div class="review-unit-content">
                    <h1>{{ $value['attributes']['name'] }}</h1>
                    <p><span class="r-t">ราคา</span> : {{ number_format($value['attributes']['price']) }} บาท</p>
                    <p><span class="r-t">ขนาดพื้นที่</span> : {{ $current_unit($value['unit'], $value['unit_id']) }} {{ $value['attributes']['unit_type'] }}</p>
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
                    <div class="map-legend" id="map-legend">
                        <ul></ul>
                    </div>
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
                                <p>หากคุณมีคำถามโปรดกรอกรายละเอียดด้านล่างและเราจะติดต่อคุณโดยเร็วที่สุด</p>
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
            @include('_partials.social-share')
        </div>

        <div class="bs-docs-section fb-comments-section">
            <div class="fb-comments" data-href="{{ request()->url() }}" data-numposts="5"></div>
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

        @include('_partials.geography')

        @include('_partials.news')

    </div>
@stop

@section('second-content')

    <div class="col-md-9">

        @include('_partials.product-new')

    </div>

    <div class="col-md-3">

        @include('_partials.facebook-page')

    </div>

@stop



@section('third-content')

    <div class="col-md-9">

        @include('_partials.review')

    </div>

    <div class="col-md-3">

        @include('_partials.product-previous')

    </div>

@stop