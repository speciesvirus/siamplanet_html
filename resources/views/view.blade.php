@extends('layouts.main')
@section('title', 'Siam Planet')
@section('meta')

@stop

@section('source')

@stop

@section('script')
    <!--<script src="{{ asset('/resources/assets/slick-carousel/slick/slick.min.js') }}"></script>-->
    <script src="resources/assets/slick-carousel/slick/slick.min.js"></script>
    <link rel="stylesheet" href="resources/assets/slick-carousel/slick/slick.css"/>
    <link rel="stylesheet" href="resources/assets/css/post.css"/>

    <script src="resources/assets/bootstrap/dist/js/bootstrap.js"></script>

    <script type="text/javascript">

        var $status = $('.pagingInfo');
        var $slickElement = $('.project-screen');

        $slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
            //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
            var i = (currentSlide ? currentSlide : 0) + 1;
            $status.text(i + '/' + slick.slideCount);
        });

        $(".project-screen").slick({
            slidesToShow: 1,
            arrows: false,
            asNavFor: '.project-strip',
            autoplay: true,
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

    </script>

    <!--<link rel="stylesheet prefetch" href="//api.tiles.mapbox.com/mapbox.js/v1.4.0/mapbox.css">-->
    <!--<script src="//api.tiles.mapbox.com/mapbox.js/v1.5.2/mapbox.js"></script>-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGFbK0CvMXKVzCJA_2Fj5B7pItfK0a1QA"></script>
    <!--<script src="https://maps.googleapis.com/maps/api/js"></script>-->
    <script type="text/javascript">

        var geojsonFeature = {
            "type": "FeatureCollection",
            "features": [{
                "type": "Feature",
                "properties": {
                    "head": "",
                    "title": "คอนโดมิเนียม เดอะคีย์สาทร-ราชพฤกษ์",
                    "icon": "https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-icon-location.png",
                    "description": "<p>First-year students on our BA programmes may have the chance to visit Leeds city centre, where we look at shopping areas and regeneration along the waterfront.</P><p>The trip gives us a chance to compare areas like the Victoria Quarter, Kirkgate Market and the Corn Exchange and discuss how they are branded to attract shoppers.</p><p> We also visit Holbeck Urban Village, which calls itself a “pioneer of urban regeneration”, and Urban Splash’s development in Saxton to explore the issue of gentrification.</p><p>During fieldwork in Leeds you may also have the chance to study:</p> <ul> <li>Clarence Dock and the Royal Armouries</li> <li>Developments near the Centenary Bridge</li> <li>The village of Saltaire, north of Bradford</li> </ul> <p>Field study like this develops important skills of observation, critique and policy analysis, as well as leading into later human geography modules.</p>",
                    "gallery": []
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [13.7146687,100.4654378]
                }
            },
                {
                    "type": "Feature",
                    "properties": {
                        "head": "http://www2.hull.ac.uk/science/images/mapbox/headers/Scarborough_Header.jpg",
                        "title": "Wutthakat BTS Station",
                        "icon": "https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-icon-location.png",
                        "description": "<p>In October our first-year physical geography students join staff for an &quot;ice-breaker&quot; field weekend in Scarborough. The trip helps students make friends and teach them the basic skills they’ll need as physical geographers.</p><p>During the first day we tour the countryside to look at geology, glaciation and how the beautiful landscape of the North Yorkshire Moors was formed.</p><p>We make stops at:</p> <ul> <li>Scarp edges at the wolds near Market Weighton</li> <li>Millingtondale</li> <li>The Hole of Horcrum</li> <li>Newtondale</li> </ul> <p>At these stops the students work in small groups to investigate the landscape, discuss ideas of how individual landforms developed and discuss their ideas with a member of staff. This is physical geography at its most traditional, but the approaches and thinking that underpin this work are excellent preparation for the students later in their degree.</p><p> On the second day students work in small groups to explore the land at Jugger Howe. They measure hill slopes and soil saturation as well as investigating the amount of vegetation cover.</p>",
                        "gallery": [
                            ["http://www2.hull.ac.uk/science/images/mapbox/scarborough/Scarborough_1.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/scarborough/Scarborough_2.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/scarborough/Scarborough_4.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/scarborough/Scarborough_5.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/scarborough/Scarborough_8.jpg"]
                        ]
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [13.7146391,100.4654378]
                    }
                },
                {
                    "type": "Feature",
                    "properties": {
                        "head": "http://www2.hull.ac.uk/science/images/mapbox/headers/Scarborough_Header.jpg",
                        "title": "วัดนาคปรก",
                        "icon": "https://maps.google.com/mapfiles/kml/shapes/parking_lot_maps.png",
                        "description": "<p>In October our first-year physical geography students join staff for an &quot;ice-breaker&quot; field weekend in Scarborough. The trip helps students make friends and teach them the basic skills they’ll need as physical geographers.</p><p>During the first day we tour the countryside to look at geology, glaciation and how the beautiful landscape of the North Yorkshire Moors was formed.</p><p>We make stops at:</p> <ul> <li>Scarp edges at the wolds near Market Weighton</li> <li>Millingtondale</li> <li>The Hole of Horcrum</li> <li>Newtondale</li> </ul> <p>At these stops the students work in small groups to investigate the landscape, discuss ideas of how individual landforms developed and discuss their ideas with a member of staff. This is physical geography at its most traditional, but the approaches and thinking that underpin this work are excellent preparation for the students later in their degree.</p><p> On the second day students work in small groups to explore the land at Jugger Howe. They measure hill slopes and soil saturation as well as investigating the amount of vegetation cover.</p>",
                        "gallery": [
                            ["http://www2.hull.ac.uk/science/images/mapbox/scarborough/Scarborough_1.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/scarborough/Scarborough_2.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/scarborough/Scarborough_4.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/scarborough/Scarborough_5.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/scarborough/Scarborough_8.jpg"]
                        ]
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [13.7150131,100.4653149]
                    }
                }
                ]
        };

    var allMyMarkers = [];

	//set your google maps parameters
	var $latitude = 13.71466247885533,
		$longitude = 100.4676117002964,
		$map_zoom = 17;

	//google map custom marker icon - .png fallback for IE11
	var is_internetExplorer11= navigator.userAgent.toLowerCase().indexOf('trident') > -1;
	var $marker_url = ( is_internetExplorer11 ) ? 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-icon-location.png' : 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-icon-location_1.svg';
		
	//define the basic color of your map, plus a value for saturation and brightness
	var	$main_color = '#2d313f',
		$saturation= -20,
		$brightness= 5;

	//we define here the style of the map
	var style= [ 
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
				{ hue: $main_color },
				{ visibility: "on" }, 
				{ lightness: $brightness }, 
				{ saturation: $saturation }
			]
		}, 
		{
			featureType: "poi",
			elementType: "geometry.fill",
			stylers: [
				{ hue: $main_color },
				{ visibility: "on" }, 
				{ lightness: $brightness }, 
				{ saturation: $saturation }
			]
		},
		{
			featureType: "poi.government",
			elementType: "geometry.fill",
			stylers: [
				{ hue: $main_color },
				{ visibility: "on" }, 
				{ lightness: $brightness }, 
				{ saturation: $saturation }
			]
		},
		{
			featureType: "poi.sport_complex",
			elementType: "geometry.fill",
			stylers: [
				{ hue: $main_color },
				{ visibility: "on" }, 
				{ lightness: $brightness }, 
				{ saturation: $saturation }
			]
		},
		{
			featureType: "poi.attraction",
			elementType: "geometry.fill",
			stylers: [
				{ hue: $main_color },
				{ visibility: "on" }, 
				{ lightness: $brightness }, 
				{ saturation: $saturation }
			]
		},
		{
			featureType: "poi.business",
			elementType: "geometry.fill",
			stylers: [
				{ hue: $main_color },
				{ visibility: "on" }, 
				{ lightness: $brightness }, 
				{ saturation: $saturation }
			]
		},
		{
			featureType: "transit",
			elementType: "geometry.fill",
			stylers: [
				{ hue: $main_color },
				{ visibility: "on" }, 
				{ lightness: $brightness }, 
				{ saturation: $saturation }
			]
		},
		{
			featureType: "transit.station",
			elementType: "geometry.fill",
			stylers: [
				{ hue: $main_color },
				{ visibility: "on" }, 
				{ lightness: $brightness }, 
				{ saturation: $saturation }
			]
		},
		{
			featureType: "landscape",
			stylers: [
				{ hue: $main_color },
				{ visibility: "on" }, 
				{ lightness: $brightness }, 
				{ saturation: $saturation }
			]
			
		},
		{
			featureType: "road",
			elementType: "geometry.fill",
			stylers: [
				{ hue: $main_color },
				{ visibility: "on" }, 
				{ lightness: $brightness }, 
				{ saturation: $saturation }
			]
		},
		{
			featureType: "road.highway",
			elementType: "geometry.fill",
			stylers: [
				{ hue: $main_color },
				{ visibility: "on" }, 
				{ lightness: $brightness }, 
				{ saturation: $saturation }
			]
		}, 
		{
			featureType: "water",
			elementType: "geometry",
			stylers: [
				{ hue: $main_color },
				{ visibility: "on" }, 
				{ lightness: $brightness }, 
				{ saturation: $saturation }
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
	var marker = new google.maps.Marker({
	  	position: new google.maps.LatLng($latitude, $longitude),
	    map: map,
	    visible: true,
	 	icon: image,
	});

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

        function addMarker(feature,featureID) {
            
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
          
          $('#map-legend').append('<div class="poi">'+ feature.properties.title +'</div>');
          
          allMyMarkers.push(marker);
        }
        
        
        for (var i = 0, jsonFeature; jsonFeature = geojsonFeature.features[i]; i++) {
          addMarker(jsonFeature,i);
        }
        
          $('.poi').on('click', function() {
        
            $title = $(this).html();
        
            for (var i = 0, jsonFeature; jsonFeature = geojsonFeature.features[i]; i++) {
              if (jsonFeature.properties.title === $title ) {
                map.panTo(new google.maps.LatLng(jsonFeature.geometry.coordinates[0], jsonFeature.geometry.coordinates[1]));
              }
            }
            
                var selectedID = $(this).attr('id');
                toggleBounce($( ".poi" ).index( this ));
            
          });
        
        
        function toggleBounce(selectedID) {

        // loop through our array & check with marker has same ID with the text
        for(var j=0;j<allMyMarkers.length;j++){
                if(allMyMarkers[j].id == selectedID){
                        if (allMyMarkers[j].getAnimation() != null) {
                                allMyMarkers[j].setAnimation(null);
                        } else {
                                allMyMarkers[j].setAnimation(google.maps.Animation.BOUNCE);
                                map.setCenter(allMyMarkers[j].getPosition());
                        }
                        break; // stop continue looping
                }
        }
} // end toggleBounce





    // google.maps.event.addListener(map, 'click', function( event ){
    //   alert( "Latitude: "+event.latLng.lat()+" "+", longitude: "+event.latLng.lng() ); 
    // });
    
	//add custom buttons for the zoom-in/zoom-out on the map
	function CustomZoomControl(controlDiv, map) {
		//grap the zoom elements from the DOM and insert them in the map 
	  	var controlUIzoomIn= document.getElementById('cd-zoom-in'),
	  		controlUIzoomOut= document.getElementById('cd-zoom-out');
	  	controlDiv.appendChild(controlUIzoomIn);
	  	controlDiv.appendChild(controlUIzoomOut);

		// Setup the click event listeners and zoom-in or out according to the clicked element
		google.maps.event.addDomListener(controlUIzoomIn, 'click', function() {
		    map.setZoom(map.getZoom()+1)
		});
		google.maps.event.addDomListener(controlUIzoomOut, 'click', function() {
		    map.setZoom(map.getZoom()-1)
		});
	}

	var zoomControlDiv = document.createElement('div');
 	var zoomControl = new CustomZoomControl(zoomControlDiv, map);

  	//insert the zoom div on the top left of the map
  	map.controls[google.maps.ControlPosition.LEFT_TOP].push(zoomControlDiv);
  
    </script>
@stop

@section('first-content')
    <div class="col-md-9">
        <h1 class="entry-title">Simplicity2の子テーマ</h1>

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
                    <div class="project"><img src="http://unsplash.it/578/361/?image=26" alt=""/></div>
                    <div class="project"><img src="http://unsplash.it/578/361/?image=39" alt=""/></div>
                    <div class="project"><img src="http://unsplash.it/578/361/?image=52" alt=""/></div>
                    <div class="project"><img src="http://unsplash.it/578/361/?image=65" alt=""/></div>
                    <div class="project"><img src="http://unsplash.it/578/361/?image=78" alt=""/></div>
                    <div class="project"><img src="http://unsplash.it/578/361/?image=91" alt=""/></div>
                    <div class="project"><img src="http://unsplash.it/578/361/?image=104" alt=""/></div>
                    <div class="project"><img src="http://unsplash.it/578/361/?image=117" alt=""/></div>
                    <div class="project"><img src="http://unsplash.it/578/361/?image=130" alt=""/></div>
                </div>
                <div class="project-strip">
                    <div class="project"><img src="http://unsplash.it/578/361/?image=26" alt=""/></div>
                    <div class="project"><img src="http://unsplash.it/578/361/?image=39" alt=""/></div>
                    <div class="project"><img src="http://unsplash.it/578/361/?image=52" alt=""/></div>
                    <div class="project"><img src="http://unsplash.it/578/361/?image=65" alt=""/></div>
                    <div class="project"><img src="http://unsplash.it/578/361/?image=78" alt=""/></div>
                    <div class="project"><img src="http://unsplash.it/578/361/?image=91" alt=""/></div>
                    <div class="project"><img src="http://unsplash.it/578/361/?image=104" alt=""/></div>
                    <div class="project"><img src="http://unsplash.it/578/361/?image=117" alt=""/></div>
                    <div class="project"><img src="http://unsplash.it/578/361/?image=130" alt=""/></div>
                </div>
            </div>
        </div>

        <div class="vertical-tabs">

            <ul class="nav">
                <li class="nav-one"><a href="#filter-mademoiselle" class="">คอนโด </a></li>
                <li class="nav-two"><a class="" href="#filter-scene">SANSIRI - แสนสิริ จำกัด</a></li>
                <li class="nav-three"><a class="" href="#filter-carnets">แล้วเสร็จ 2013</a></li>
                <li class="nav-four last"><a class="current" href="#filter-jetedis">ชั้น 6</a></li>
                <li class="nav-five last"><a class="" href="#filter-tour">1 hour ago</a></li>

            </ul>

            <div class="list-wrap" id="listWrap">

                <ul id="filter-jetedis" class="hide-shift">
                    <li><a style="display: block;" href="#!" class="all zwitserland"
                           data-country="8,000,000 บาท">ราคา</a>
                    </li>
                    <li><a style="display: block;" href="#!" class="all frankrijk active"
                           data-country="250,141 บาท / ตารางเมตร ">ราคาเฉลี่ย</a>
                    </li>
                    <li><a style="display: block;" href="#!" class="all"
                           data-country="31 ตารางเมตร">พื้นที่</a></li>
                    <li><a style="display: block;" href="#!" class="all zwitserland" data-country="1 งาน">ขนาดที่ดิน</a>
                    </li>

                </ul>

            </div>

        </div>

        <div class="bs-docs-section">
            <h1 class="page-header" id="type">รายละเอียด</h1>
            <div class="row">
                <div class="col-md-3">พื้นที่ใกล้เคียง</div>
                <div class="col-md-9">

                    <ul class="features-list">
                        <li class="list-item two-column features-item distance-essential-property">
                            <div>Utapao International Airport</div>
                            <div>31.88 km</div>
                        </li>
                        <li class="list-item two-column features-item distance-essential-property">
                            <div>Utapao International Airport</div>
                            <div>31.88 km</div>
                        </li>
                        <li class="list-item two-column features-item distance-essential-property">
                            <div>Utapao International Airport</div>
                            <div>31.88 km</div>
                        </li>
                        <li class="list-item two-column features-item distance-essential-property">
                            <div>Utapao International Airport</div>
                            <div>31.88 km</div>
                        </li>
                        <li class="list-item two-column features-item distance-essential-property">
                            <div>Utapao International Airport</div>
                            <div>31.88 km</div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">สิ่งอำนวยความสะดวก</div>
                <div class="col-md-9">
                    <ul class="features-list">
                        <li class="list-item three-column features-item">
                            <div class="check">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     preserveAspectRatio="xMidYMid" viewBox="0 0 61 52" class="check-icon">
                                    <path d="M56.560,-0.010 C37.498,10.892 26.831,26.198 20.617,33.101 C20.617,33.101 5.398,23.373 5.398,23.373 C5.398,23.373 0.010,29.051 0.010,29.051 C0.010,29.051 24.973,51.981 24.973,51.981 C29.501,41.166 42.502,21.583 60.003,6.565 C60.003,6.565 56.560,-0.010 56.560,-0.010 Z"
                                          id="path-1" class="cls-2" fill-rule="evenodd"/>
                                </svg>
                            </div>
                            <span class="f-name">การรักษาความปลอดภัย (24 ชั่วโมง)</span>
                        </li>
                        <li class="list-item three-column features-item">
                            <div class="check active">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     preserveAspectRatio="xMidYMid" viewBox="0 0 61 52" class="check-icon">
                                    <path d="M56.560,-0.010 C37.498,10.892 26.831,26.198 20.617,33.101 C20.617,33.101 5.398,23.373 5.398,23.373 C5.398,23.373 0.010,29.051 0.010,29.051 C0.010,29.051 24.973,51.981 24.973,51.981 C29.501,41.166 42.502,21.583 60.003,6.565 C60.003,6.565 56.560,-0.010 56.560,-0.010 Z"
                                          id="path-1" class="cls-2" fill-rule="evenodd"/>
                                </svg>
                            </div>
                            <span class="f-name">เช็คอิน/เช็คเอาต์ด่วน</span>
                        </li>
                        <li class="list-item three-column features-item">
                            <div class="check">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     preserveAspectRatio="xMidYMid" viewBox="0 0 61 52" class="check-icon">
                                    <path d="M56.560,-0.010 C37.498,10.892 26.831,26.198 20.617,33.101 C20.617,33.101 5.398,23.373 5.398,23.373 C5.398,23.373 0.010,29.051 0.010,29.051 C0.010,29.051 24.973,51.981 24.973,51.981 C29.501,41.166 42.502,21.583 60.003,6.565 C60.003,6.565 56.560,-0.010 56.560,-0.010 Z"
                                          id="path-1" class="cls-2" fill-rule="evenodd"/>
                                </svg>
                            </div>
                            <span class="f-name">ทางสำหรับรถเข็น</span>
                        </li>
                        <li class="list-item three-column features-item">
                            <div class="check">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     preserveAspectRatio="xMidYMid" viewBox="0 0 61 52" class="check-icon">
                                    <path d="M56.560,-0.010 C37.498,10.892 26.831,26.198 20.617,33.101 C20.617,33.101 5.398,23.373 5.398,23.373 C5.398,23.373 0.010,29.051 0.010,29.051 C0.010,29.051 24.973,51.981 24.973,51.981 C29.501,41.166 42.502,21.583 60.003,6.565 C60.003,6.565 56.560,-0.010 56.560,-0.010 Z"
                                          id="path-1" class="cls-2" fill-rule="evenodd"/>
                                </svg>
                            </div>
                            <span class="f-name">นำสัตว์เลี้ยงเข้าพักได้</span>
                        </li>


                        <div class="collapse toggle">
                            <li class="list-item three-column features-item">
                                <div class="check">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         preserveAspectRatio="xMidYMid" viewBox="0 0 61 52" class="check-icon">
                                        <path d="M56.560,-0.010 C37.498,10.892 26.831,26.198 20.617,33.101 C20.617,33.101 5.398,23.373 5.398,23.373 C5.398,23.373 0.010,29.051 0.010,29.051 C0.010,29.051 24.973,51.981 24.973,51.981 C29.501,41.166 42.502,21.583 60.003,6.565 C60.003,6.565 56.560,-0.010 56.560,-0.010 Z"
                                              id="path-1" class="cls-2" fill-rule="evenodd"/>
                                    </svg>
                                </div>
                                <span class="f-name">ลิฟ</span>
                            </li>
                            <li class="list-item three-column features-item">
                                <div class="check">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         preserveAspectRatio="xMidYMid" viewBox="0 0 61 52" class="check-icon">
                                        <path d="M56.560,-0.010 C37.498,10.892 26.831,26.198 20.617,33.101 C20.617,33.101 5.398,23.373 5.398,23.373 C5.398,23.373 0.010,29.051 0.010,29.051 C0.010,29.051 24.973,51.981 24.973,51.981 C29.501,41.166 42.502,21.583 60.003,6.565 C60.003,6.565 56.560,-0.010 56.560,-0.010 Z"
                                              id="path-1" class="cls-2" fill-rule="evenodd"/>
                                    </svg>
                                </div>
                                <span class="f-name">นำสัตว์เลี้ยงเข้าพักได้</span>
                            </li>
                            <li class="list-item three-column features-item">
                                <div class="check">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                         preserveAspectRatio="xMidYMid" viewBox="0 0 61 52" class="check-icon">
                                        <path d="M56.560,-0.010 C37.498,10.892 26.831,26.198 20.617,33.101 C20.617,33.101 5.398,23.373 5.398,23.373 C5.398,23.373 0.010,29.051 0.010,29.051 C0.010,29.051 24.973,51.981 24.973,51.981 C29.501,41.166 42.502,21.583 60.003,6.565 C60.003,6.565 56.560,-0.010 56.560,-0.010 Z"
                                              id="path-1" class="cls-2" fill-rule="evenodd"/>
                                    </svg>
                                </div>
                                <span class="f-name">Utapao International</span>
                            </li>
                        </div>

                        <div class="show-more">
                            <a href="javascript://" data-toggle="collapse" data-target=".toggle">
                                <span class="show-less">ดูเพิ่มเติม</span>
                                <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
                            </a>
                        </div>


                    </ul>
                </div>
            </div>
        </div>

        <div class="bs-docs-section">
            <div class="listing-details-text">
                <h1 class="listing-title">ขายคอนโด ห้องจริงสวยมาก เดอะ พีค รัชดา-ห้วยขวาง ใกล้ รถไฟฟ้าใต้ดิน 1 ห้องนอน
                    (The Peak Ratchada Huaykwang) 1k. m. to MRT</h1>

                ขาย คอนโด เดอะ พีค 1 ห้องนอน 1 ห้องน้ำ พื้นที่ 47.22 ตรม. ห้องอยู่ชั้น 8 หัวมุม ประตูห้องไม่ติดกับใคร
                พร้อมเฟอร์นิเจอร์ ตกแต่ง Build in ,walk in closet ,เตียง ,โซฟา,โต๊ะทานข้าว, และเครื่องใช้ไฟฟ้า อาทิ แอร์
                2 เครื่อง, TV,เครื่องทำน้ำอุ่น, ที่ดูดควัน, เตาอบ, ไมโครเวฟ ยี่ห้อ Franke พื้นที่ใช้สอยทำอย่างลงตัว
                มีชั้นเก็บของทั้งห้อง<br>
                สิ่งอำนวยความสะดวกในโครงการ มินิมาร์ท ร้านซัก อบ รีด ฟิตเนส , ลานจอดรถยนต์และจักรยานยนต์ สวนหย่อมดาดฟ้า
                ระบบรักษาความปลอดภัย , กล่องวงจรปิด , คีย์การ์ด , wifi , ยิม<br>
                สามารถจอดรถได้ 1 คัน <br>
                ที่ตั้ง ซอยประชาราษฎร์บำเพ็ญ 16 ห่างจาก ถนนประชาราษฎร์บำเพ็ญ ใกล้รถไฟฟ้า MRT ห้วยขวาง<br>
                <br>
                ขาย 2,600,000 บาท (ไม่รวมค่าใช้จ่ายที่สำนักงานที่ดิน) ห้องนี้คุ้มสุดๆ บอกเลย<br>
                สนใจติดต่อ คุณขวัญ 092-551-3003<br>
                <br>
                ร้านค้าในบริเวณรอบๆคอนโด:<br>
                ห้วยขวางเทอร์เรซ ห่างจากคอนโด 1.3 กิโลเมตร (ขับรถ 6 นาที)<br>
                ห้วยขวางอเวนิว – 1.6 กิโลเมตร (ขับรถ 7 นาที)<br>
                <br>
                โรงเรียนที่ใกล้ที่สุดในบริเวณ<br>
                โรงเรียนอนุบาลโชคชัย (ครูเกียว) ระยะทางประมาณ 530 เมตร เดินทาง (ประมาณ เดิน 6 นาที)<br>
                โรงเรียนจันทร์หุ่นบำเพ็ญ – 840 เมตร (ขับรถ 3 นาที)<br>
                โรงเรียนอนุบาลสีชมพู – 970 เมตร (ขับรถ 4 นาที)<br>
                โรงเรียนนานาชาติเดอะรีเจ้นท์ – 1<br>
                <br>
                โรงพยาบาลโกลเด้นเยียส์เนอสซิ่งโฮม เป็นโรงพยาบาลที่ใกล้ที่สุดซึ่งตั้งอยู่ 2.4 กิโลเมตร
                จากคอนโดมิเนียมจะใช้เวลาประมาณ ขับรถ 8 นาทีไปที่นั่น<br>
                <br>
                <br>
                ทำการตลาดโดย บริษัท เก้า เก้า เก้า เรียลเอสเตท แอนด์ (เดวิลอปเม้น ไทยแลนด์) บริการรับฝากขาย บ้านที่ดิน
            </div>
        </div>

        <div class="bs-docs-section map-section">
            <div class="map-legend" id="map-legend"></div>
            <div id="map"></div>
            <div id="cd-zoom-in"></div>
	        <div id="cd-zoom-out"></div>
        </div>

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
                <h3 class="widget_title sidebar_widget_title"> 新着記事 </h3>
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
        <h2>Review</h2>
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
                                SimplicityでPtengineのアクセス解析（ヒートマップ分析）を行う方法 </a></h3>
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