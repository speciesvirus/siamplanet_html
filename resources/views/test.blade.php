<html class="no-js" lang="en"><!--<![endif]-->

<head>
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine (even in intranet) -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Important stuff for SEO, don't neglect. (And don't dupicate values across your site!) -->
    <title>@yield('title')</title>
    <meta name="author" content=""/>
    <meta name="description" content=""/>

    <!-- Don't forget to set your site up: http://google.com/webmasters -->
    <meta name="google-site-verification" content=""/>

    <!-- Who owns the content of this site? -->
    <meta name="Copyright" content=""/>

    <!--  Mobile Viewport
    http://j.mp/mobileviewport & http://davidbcalhoun.com/2010/viewport-metatag
    device-width : Occupy full width of the screen in its current orientation
    initial-scale = 1.0 retains dimensions instead of zooming out if page height > device height
    maximum-scale = 1.0 retains dimensions instead of zooming in if page width < device width (wrong for most sites)
    -->
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="theme-color" content="#003561">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#003561">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#003561">

<!-- Use Iconifyer to generate all the favicons and touch icons you need: http://iconifier.net -->
    <link rel="shortcut icon" href="favicon.ico"/>

    <!-- concatenate and minify for production -->
<!--<link rel="stylesheet" href="{{ asset('resources/assets/css/reset.css') }}" />-->
<!--<link rel="stylesheet" href="{{ asset('resources/assets/css/style.css') }}" />-->
<!--<link rel="stylesheet" href="{{ asset('resources/assets/bootstrap/dist/css/bootstrap.min.css') }}" />-->
<!--<link rel="stylesheet" href="{{ asset('resources/assets/font-awesome/css/font-awesome.min.css') }}" />-->
<!--<link rel="stylesheet" href="{{ asset('resources/assets/select2/dist/css/select2.min.css') }}" />-->
<!--<link rel="stylesheet" href="{{ asset('resources/assets/css/main.css') }}" />-->
    <link rel="stylesheet" href="resources/assets/bootstrap/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="resources/assets/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="resources/assets/css/reset.css"/>
    <link rel="stylesheet" href="resources/assets/css/style.css"/>

    <link rel="stylesheet" href="resources/assets/select2/dist/css/select2.min.css"/>
    <link rel="stylesheet" href="resources/assets/css/main.css"/>

    <!-- Lea Verou's prefixfree (http://leaverou.github.io/prefixfree/), lets you use un-prefixed properties in your CSS files -->
    {{--<script src="{{ asset('resources/assets/js/libs/prefixfree.min.js') }}"></script>--}}
    {{-- open --}}
    {{--<script src="resources/assets/js/libs/prefixfree.min.js"></script>--}}

    <!-- This is a minimized, base version of Modernizr. (http://modernizr.com)
          You will need to create new builds to get the detects you need. -->
    {{--<script src="{{ asset('resources/assets/js/libs/modernizr-3.2.0.base.js') }}"></script>--}}
    {{-- open --}}
    {{--<script src="resources/assets/js/libs/modernizr-3.2.0.base.js"></script>--}}

    <!-- Twitter: see https://dev.twitter.com/docs/cards/types/summary-card for details -->
    <meta name="twitter:card" content="">
    <meta name="twitter:site" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:url" content="">
    <!-- Facebook (and some others) use the Open Graph protocol: see http://ogp.me/ for details -->
    <meta property="og:title" content=""/>
    <meta property="og:description" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:image" content=""/>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write("<script src='{{ asset('resources/assets/js/components/jquery-1.11.3.min.js') }}'>\x3C/script>")</script>

<!--<script src="{{ asset('resources/assets/select2/dist/js/select2.full.min.js') }}"></script>-->
<script src="resources/assets/select2/dist/js/select2.full.min.js"></script>

<!-- this is where we put our custom functions -->
<!-- don't forget to concatenate and minify for production -->
<!--<script src="{{ asset('resources/assets/js/functions.js') }}"></script>-->
<script src="resources/assets/js/functions.js"></script>


    <script src="resources/assets/slick-carousel/slick/slick.min.js"></script>
    <link rel="stylesheet" href="resources/assets/slick-carousel/slick/slick.css"/>
    <link rel="stylesheet" href="resources/assets/css/post.css"/>


    <link rel="stylesheet prefetch" href="//api.tiles.mapbox.com/mapbox.js/v1.4.0/mapbox.css">
    <script src="//api.tiles.mapbox.com/mapbox.js/v1.5.2/mapbox.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJK15zKXhqLtzs6rk-wWZbrwrrDL8xqhc"
            async defer></script>
    <script type="text/javascript">
        var geojsonFeature = {
            "type": "FeatureCollection",
            "features": [{
                "type": "Feature",
                "properties": {
                    "head": "",
                    "title": "Leeds and region",
                    "description": "<p>First-year students on our BA programmes may have the chance to visit Leeds city centre, where we look at shopping areas and regeneration along the waterfront.</P><p>The trip gives us a chance to compare areas like the Victoria Quarter, Kirkgate Market and the Corn Exchange and discuss how they are branded to attract shoppers.</p><p> We also visit Holbeck Urban Village, which calls itself a “pioneer of urban regeneration”, and Urban Splash’s development in Saxton to explore the issue of gentrification.</p><p>During fieldwork in Leeds you may also have the chance to study:</p> <ul> <li>Clarence Dock and the Royal Armouries</li> <li>Developments near the Centenary Bridge</li> <li>The village of Saltaire, north of Bradford</li> </ul> <p>Field study like this develops important skills of observation, critique and policy analysis, as well as leading into later human geography modules.</p>",
                    "gallery": [ ]
                },
                "geometry": {
                    "type": "Point",
                    "coordinates": [-1.5449523925781248, 53.80389494430927]
                }
            },

                {
                    "type": "Feature",
                    "properties": {
                        "head": "http://www2.hull.ac.uk/science/images/mapbox/headers/Scarborough_Header.jpg",
                        "title": "Scarborough and region",
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
                        "coordinates": [-0.4131889343261718, 54.28537062593458]
                    }
                },

                {
                    "type": "Feature",
                    "properties": {
                        "head": "",
                        "title": "Whitby and North York Moors",
                        "description": "<p>Each year we take our first-year BA students to Whitby for a field trip in October.<br> The historic town is on the coast near the North Yorkshire Moors National Park and offers a chance to visit other sites including the former alum mines at Ravenscar and the “Heartbeat country” landscape of Goathland.</p><p>Whitby itself has links with Captain Cook and became world famous after appearing in Dracula. These days it is a thriving fishing and commercial centre that is popular with tourists.</p><p>The North York Moors and the town of Whitby are ideal venues for introducing students to the range of topics covered in our BA Geography and BA Human Geography degree programmes.</p><p>Students can undertake projects on the following topics:</p> <ul> <li>Alternative rural livelihoods in Heartbeat Country</li> <li>Resource extraction and sustainable development at Ravenscar</li> <li>Heritage, identity and place marketing in Whitby</li> <li>Mapping and evaluating urban land use change in Whitby</li> </ul>",
                        "gallery": [ ]
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [-0.6157493591308594, 54.487890279847285]
                    }
                },

                {
                    "type": "Feature",
                    "properties": {
                        "head": "http://www2.hull.ac.uk/science/images/mapbox/headers/Tenerife_Header.jpg",
                        "title": "Tenerife",
                        "description": "<p>Tenerife in the Canary Islands has been a destination for Hull Geography Students for over 30 years. It is one of the destinations second year BSc students can choose as part of their course.</p><p> The Canary Islands are a series of volcanoes that formed above a rising plume of molten rock within the earth’s mantle. They create an amazing range of rock types, from simple lava deposits to complex products of eruptions called “ignimbrites”.</P><p>During this week-long field trip, students get to see examples of all the different types of volcanic deposits that make-up the island. By studying these volcanic deposits which range in age from a few million years old through to cinder cones that are only a few hundred years old, students learn about the inner workings of volcanoes and the dangers they pose to humans today.</P><p>We also take a boat trip to see some of the most spectacular cliffs in the world. They are up to 500m high and reveal some of the oldest rocks on the island, along with lava tubes and ancient cinder cones buried under layers of lava.</p>",
                        "gallery": [
                            ["http://www2.hull.ac.uk/science/images/mapbox/tenerife/Tenerife_1.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/tenerife/Tenerife_2.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/tenerife/Tenerife_3.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/tenerife/Tenerife_4.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/tenerife/Tenerife_6.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/tenerife/Tenerife_7.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/tenerife/Tenerife_8.jpg"]
                        ]
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [-16.60858154296875, 28.263263279931966]
                    }
                },

                {
                    "type": "Feature",
                    "properties": {
                        "head": "http://www2.hull.ac.uk/science/images/mapbox/headers/Spain_Header2.jpg",
                        "title": "Spain",
                        "description": "<p>The week-long fieldtrip to Almería, Spain, is an option for our second year BSc students. The trip took place for the first time in March 2010 and was a roaring success, appealing both to ‘hard-core’ physical geographers and to those interested in natural environments, human land use and its impacts on the environment.</p><p>The Iberian Peninsula is a fascinating, topographically and climatically diverse region which lends itself extraordinarily well to geography fieldtrips.</p> <ul> <li>On the arid southeastern tip of Spain, in the rain shadow of mountain ranges, Almería is unique</li> <li>In the badlands of the Sorbas-Tabernas basin, where we stay, you will find some of the most famous marine geology in the world</li> <li>At the coast, the endless sea of plastic greenhouses which now dominates the coastal zone is a major global producer of fruit and vegetables</li> <li>Inland mountain ranges contrast greatly with the rugged and largely unspoilt rural landscapes such as the Filabres and Alhamilla.</li> </ul> <p>The aim is to offer students instruction and experience in a broad range of field research and data collection methods in a region completely unlike their home environment.</p>",
                        "gallery": [
                            ["http://www2.hull.ac.uk/science/images/mapbox/spain/Spain_7.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/spain/Spain_2.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/spain/Spain_3.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/spain/Spain_4.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/spain/Spain_5.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/spain/Spain_6.jpg"]
                        ]
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [-2.98828125, 40.3130432088809]
                    }
                },

                {
                    "type": "Feature",
                    "properties": {
                        "head": "http://www2.hull.ac.uk/science/images/mapbox/headers/Berlin_Header.jpg",
                        "title": "Berlin",
                        "description": "<p>This week-long fieldtrip provides an opportunity to explore and come to understand Berlin: a profoundly historical, political, anarchic and artistic city.</p><p>Berlin’s identity is underpinned by a long and traumatic history and geography associated with empire building, Nazi infamy and the geopolitical crises of the cold war era.</p><p>During the cold war, Berlin became a divided city. The infamous wall (der Mauer) split the city in two, divided families, and left some people plagued by a sense of imprisonment. Furthermore, the wall divided a nation and sent the world to the brink of a third world war.</p><p>Since 1989 and the reunification of Germany, Berlin is once again the capital of Germany and the economic heart of Europe.</p> <p>The aims of the trip are to:</p> <ul> <li>Use geographic concepts to understand the astonishing re-development of Berlin</li> <li>Help develop the skills needed for independent field research</li> </ul>",
                        "gallery": [
                            ["http://www2.hull.ac.uk/science/images/mapbox/berlin/Berlin_6.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/berlin/Berlin_1.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/berlin/Berlin_10.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/berlin/Berlin_2.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/berlin/Berlin_9.jpg"]
                        ]
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [13.395767211914062, 52.51496729886834]
                    }
                },

                {
                    "type": "Feature",
                    "properties": {
                        "head": "http://www2.hull.ac.uk/science/images/mapbox/headers/Rome_Header.jpg",
                        "title": "Italy",
                        "description": "<p>About half our second-year BA students usually visit southern Italy, where we take in Rome and either Abruzzo National Park or Naples.</P><p>In Rome we look at modern urban areas and the remains of past eras, from the Roman empire to planning under Mussolini. In Naples we stay near Vesuvius and see the old city itself and some attractions nearby, including the ruins of Pompeii and the Amalfi coast.</p><p> The trip focuses on the geography of southern Italy (the Mezzogiorno) and lets us study its cultures, landscapes, societies and economies. Students have the opportunity to consider issues of regional underdevelopment, the impact of policy, planning and state power, and the transformation of cultural landscapes in both rural and urban areas.</P><p>You might also have the chance to stay on one of the region’s organic “agriturismo” farms, which are famous for mixing traditional farming methods with modern technology.</p>",
                        "gallery": [
                            ["http://www2.hull.ac.uk/science/images/mapbox/italy/Italy_1.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/italy/Italy_5.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/italy/Italy_2.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/italy/Italy_4.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/italy/Italy_3.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/italy/Italy_6.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/italy/Italy_7.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/italy/Italy_8.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/italy/Italy_9.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/italy/Italy_10.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/italy/Italy_11.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/italy/Italy_12.jpg"]

                        ]
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [13.095703125, 42.35854391749705]
                    }
                },

                {
                    "type": "Feature",
                    "properties": {
                        "head": "http://www2.hull.ac.uk/science/images/mapbox/headers/Swiss_Header.jpg",
                        "title": "Swiss Alps",
                        "description": "<p>The Swiss Alps fieldtrip is a fantastic opportunity to investigate glacial geomorphology and hydrology, fluvial geomorphology, ecohydrology, recent environmental change, vegetation succession in glacial forelands, and water resources.</P><p> The 7 day trip is based in Arolla, at 2000 metres above sea level, in the canton of Valais.<br> The first half of the trip is spent visiting various field sites, including the Tsidjiore Nouve, Bas d’Arolla, and Moiry glaciers.</P><p>There is a visit to one of the world’s largest gravity Dams, the Grande Dixence, where you will have a guided tour inside the dam, and learn about how glacial meltwater is harnessed to provide a large proportion of Switzerland’s energy.</P><p>The second half of the trip also gives you the opportunity to work as a team on a detailed research project, developing your project design skills. Training may also be provided in the use of advanced geomorphological field techniques.</p>",
                        "gallery": [
                            ["http://www2.hull.ac.uk/science/images/mapbox/swiss/Swiss_1.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/swiss/Swiss_2.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/swiss/Swiss_11.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/swiss/Swiss_4.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/swiss/Swiss_5.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/swiss/Swiss_6.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/swiss/Swiss_7.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/swiss/Swiss_8.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/swiss/Swiss_9.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/swiss/Swiss_10.jpg"]
                        ]
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [8.4375, 46.619261036171515]
                    }
                },

                {
                    "type": "Feature",
                    "properties": {
                        "head": "http://www2.hull.ac.uk/science/images/mapbox/headers/Iceland_Header.jpg",
                        "title": "Iceland",
                        "description": "<p>We are currently developing a field trip to Iceland for our third year students. Iceland, the 'land of fire and ice', is a geographic phenomenon – a living laboratory where nature’s land forming processes are easy to see and students will be able to study glaciers, active volcanoes, and human-environment interaction.</p><p> We’ll focus on physical geography, studying glacial, fluvial, and high latitude (periglacial) geomorphology, natural hazards and resources in cold environments, climate change and human-environment impact.</p><p> Iceland sits on the boundary between the North American and Eurasian tectonic plates, heavily influencing the island’s landscape.</P><p> Students will have the chance to investigate active and dormant volcanoes and see how the country uses geothermal activity to create power.</P><p>We’ll also take in archaeological sites enabling students to study the interaction of humans with the environment, and the effects of climate change and volcanic activity on social structure and cultural dynamics.</p>",
                        "gallery": [
                            ["http://www2.hull.ac.uk/science/images/mapbox/iceland/Iceland_4.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/iceland/Iceland_5.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/iceland/Iceland_7.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/iceland/Iceland_9.jpg"],
                            ["http://www2.hull.ac.uk/science/images/mapbox/iceland/Iceland_3.jpg"]
                        ]
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [-18.45703125, 65.07213008560697]
                    }
                },

                {
                    "type": "Feature",
                    "properties": {
                        "head": "http://www2.hull.ac.uk/science/images/mapbox/headers/NewYork_Header.jpg",
                        "title": "New York",
                        "description": "<p>New York City is a venue for one of the Department’s third year Human Geography field trips. New York is unlike any other city in the world; its past development and present formation offer unique opportunities to examine historical, social, cultural, political and economic processes. Students spend a week studying, exploring and experiencing this distinctive city.<P></P>Students visit different heritage sites, iconic spaces, and various neighbourhoods – some valued for their historic significance and others for their contemporary use.</p><p>These include visits to:</p> <ul>  <li>the historic immigration station at Ellis Island</li> <li>the Eldridge Street Synagogue on the Lower East Side</li> <li>Chinatown</li> <li>Central Park</li> <li>the former World Trade Center site</li> </ul> <p>And walking tours of:</p> <ul>  <li>the recently-opened High Line</li> <li>an elevated public park in the historic Meat Packing District</li> <li>Brooklyn, including the waterfront area which has a dramatic view of Lower Manhattan</li> </ul> <p>Through these different activities, students can apply some of the geographical concepts they have learnt in their modules to the landscapes of New York.</p><p> During the second part of the week, students work in groups on self-directed research projects. There is a wide choice of themes to work on, because New York offered such a rich and varied research landscape.</p>",
                        "gallery": [ ]
                    },
                    "geometry": {
                        "type": "Point",
                        "coordinates": [-74.01214599609375, 40.72852712420599]
                    }
                }]
        };
        //========== Mapbox
        var map = L.mapbox.map('map', 'diccfish.map-fwz7rlzv')
            .setView([50.4520018,-32.2077026], 3);
        var markerLayer = L.mapbox.markerLayer()
            //.loadURL('https://s3-us-west-2.amazonaws.com/s.cdpn.io/41294/GEESmaptest_v3.geojson')
            .setGeoJSON(geojsonFeature)
            .addTo(map);
        map.scrollWheelZoom.disable();

        // Link Address to Google Map Directions
        function popupLink() {
            $('.marker-title').on('click', function() {
                window.open( 'http://maps.google.com/?q=' + $(this).html() );
            });
        }
        // Link sidebar with map locations
        map.markerLayer.on('ready', function(e) {

            // Grab the Legend
            var legend = document.getElementById('map-legend');

            // Prepend each location under the legend div
            var allPoints = map.markerLayer.eachLayer( function(e) {
                $(legend).prepend('<section class="poi">' + e.feature.properties.title + '</section>');
            });
            $.each(geojsonFeature, function (key, data) {
                console.log(key);
                if(key == 'features'){
                    $.each(data, function (index, data) {
                        console.log('index', data.properties.title);
                        $(legend).prepend('<section class="poi">' + data.properties.title + '</section>');
                    })
                }
//                $.each(data, function (index, data) {
//                    console.log('index', data)
//                })
            });
            // Attach click event to new sections
            $('.poi').on('click', function() {

                $title = $(this).html();

                map.markerLayer.eachLayer( function(marker) {

                    if (marker.feature.properties.title === $title ) {
                        marker.openPopup();
                        map.panTo(marker.getLatLng());
                        popupLink();
                        console.log(marker.getLatLng());
                        alert(marker.getLatLng());
                    }

                    $.each(geojsonFeature, function (key, data) {
                        console.log(key);
                        if(key == 'features'){
                            $.each(data, function (index, data) {
                                console.log('index', data.properties.title);
                                if (data.properties.title === $title ) {
                                    marker.openPopup();
                                    var marker2 = {
                                        lat: parseFloat(data.geometry.coordinates[0]),
                                        lng: parseFloat(data.geometry.coordinates[1])
                                    }
                                    var latLng = new google.maps.LatLng(data.geometry.coordinates[0], data.geometry.coordinates[1]); //Makes a latlng
                                    map.panTo(marker2); //Make map global
//                                    map.panTo(marker.getLatLng());
                                    popupLink();
                                }
                            })
                        }
                    });


                });
            });
        });





    </script>


</head>


<body>
            <div class="bs-docs-section map-section">
            <div class="map-legend" id="map-legend"></div>
            <div id='map'></div>
        </div>
        
</body>
        
</html>
