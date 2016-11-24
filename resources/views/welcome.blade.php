<!DOCTYPE html>

<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 ie-lt10 ie-lt9 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 ie-lt10 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="en"><!--<![endif]-->

<head>
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine (even in intranet) -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Important stuff for SEO, don't neglect. (And don't dupicate values across your site!) -->
    <title>Siam Planet</title>
    <meta name="author" content="" />
    <meta name="description" content="" />

    <!-- Don't forget to set your site up: http://google.com/webmasters -->
    <meta name="google-site-verification" content="" />

    <!-- Who owns the content of this site? -->
    <meta name="Copyright" content="" />

    <!--  Mobile Viewport
    http://j.mp/mobileviewport & http://davidbcalhoun.com/2010/viewport-metatag
    device-width : Occupy full width of the screen in its current orientation
    initial-scale = 1.0 retains dimensions instead of zooming out if page height > device height
    maximum-scale = 1.0 retains dimensions instead of zooming in if page width < device width (wrong for most sites)
    -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Use Iconifyer to generate all the favicons and touch icons you need: http://iconifier.net -->
    <link rel="shortcut icon" href="favicon.ico" />

    <!-- concatenate and minify for production -->
    <link rel="stylesheet" href="{{ asset('components/css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('components/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('components/bootstrap/dist/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('components/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('components/select2/dist/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('components/css/main.css') }}" />

    <!-- Lea Verou's prefixfree (http://leaverou.github.io/prefixfree/), lets you use un-prefixed properties in your CSS files -->
    {{--<script src="{{ asset('components/js/libs/prefixfree.min.js') }}"></script>--}}

    <!-- This is a minimized, base version of Modernizr. (http://modernizr.com)
          You will need to create new builds to get the detects you need. -->
    <script src="{{ asset('components/js/libs/modernizr-3.2.0.base.js') }}"></script>

    <!-- Twitter: see https://dev.twitter.com/docs/cards/types/summary-card for details -->
    <meta name="twitter:card" content="">
    <meta name="twitter:site" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:url" content="">
    <!-- Facebook (and some others) use the Open Graph protocol: see http://ogp.me/ for details -->
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />

</head>

<body>

<nav id="main-nav" class="clearfix bg">
    <div class="container">
        <a href="#home" id="nav-logo" title="siam planet">Siam Planet</a>
        <ul class="unstyled">
            <li><a href="#about">กกก</a></li>
            <li><a href="#event-highlights">���Թ</a></li>
            <li><a href="#schedule">��ҹ</a></li>
            <li><a href="#travel">�͹�</a></li>
            <li><a href="#register" class="maia-button">��С�ȿ��</a></li>
        </ul>
    </div>
</nav>

<div class="wrapper">



    <div class="header-search clearfix">
        <div class="advance-search header-advance-search">
            <form class="advance-search-form" action="#" method="get">
                <div class="inline-fields clearfix">
                    <div class="option-bar property-location">
                        <select name="location" id="location" data-title="Location" class="search-select">
                            <option value="any">Vị trí (tất cả)</option>
                        </select>
                    </div>
                    <div class="option-bar property-type">
                        <select name="type" id="select-property-type" class="search-select">
                            <option value="any" selected="selected">Dự án (Any)</option>
                            <option value="commercial"> Commercial</option>
                            <option value="office">-  Office</option>
                            <option value="shop">-  Shop</option>
                            <option value="residential"> Residential</option>
                            <option value="apartment">-  Apartment</option>
                            <option value="apartment-building">-  Apartment Building</option>
                            <option value="condominium">-  Condominium</option>
                            <option value="single-family">-  Single Family</option>
                            <option value="villa">-  Villa</option>
                        </select>
                    </div>
                    <div class="option-bar property-status">
                        <select name="status" id="select-status" class="search-select">
                            <option value="any" selected="selected">Loại dự án (Any)</option>
                            <option value="for-rent"> Căn hộ</option>
                            <option value="for-sale"> Biệt thư</option>
                            <option value="for-sale"> Chung cư</option>
                        </select>
                    </div>
                    <div class="option-bar form-control-buttons">
                        <a class="hidden-fields-reveal-btn" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon-plus-container" width="20" height="20" viewBox="0 0 20 20">
                                <g fill="#C15302">
                                    <path class="icon icon-minus" d="M10.035 20.035c-2.092 0-4.313-.563-5.688-1.938-.406-.406-.688-.73-.688-1.141 0-.424.266-.859.891-.797.257.025.585.172.75.347 1.327.969 2.967 1.529 4.735 1.529 4.437 0 8.001-3.564 8.001-8.001 0-4.436-3.564-8-8.001-8-4.436 0-8 3.564-8 8 0 1.226.337 2.306.829 3.344 0 .001.277.495.313.938.04.491-.234.703-.656.875-.377.153-.859-.109-1.083-.452-.87-1.335-1.403-2.999-1.403-4.704 0-5.414 4.586-10 10-10 5.413 0 10 4.586 10 10 0 5.413-4.587 10-10 10zm-12-14v8-8zm16 5h-8c-.553 0-1-.447-1-1 0-.553.447-1 1-1h8c.553 0 1 .447 1 1 0 .553-.447 1-1 1z"/>
                                    <path class="icon icon-plus" d="M10.226 15.035c-.553 0-1-.447-1-1v-8c0-.553.447-1 1-1 .553 0 1 .447 1 1v8c0 .553-.447 1-1 1z"/>
                                </g>
                            </svg>
                        </a>
                        <input type="submit" value="Tìm dự án" class="form-submit-btn">
                    </div>
                </div>
                <!-- .inline-fields -->
                <div class="hidden-fields clearfix">
                    <div class="option-bar property-bedrooms">
                        <select name="bedrooms" id="select-bedrooms" class="search-select">
                            <option value="any" selected="selected">Min Beds (Any)</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    <div class="option-bar property-bathrooms">
                        <select name="bathrooms" id="select-bathrooms" class="search-select">
                            <option value="any" selected="selected">Min Baths (Any)</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    <div class="option-bar property-min-price">
                        <select name="min-price" id="select-min-price" class="search-select">
                            <option value="any" selected="selected">Min Price (Any)</option>
                            <option value="1000">$1,000</option>
                        </select>
                    </div>
                    <div class="option-bar property-max-price">
                        <select name="max-price" id="select-max-price" class="search-select">
                            <option value="any" selected="selected">Max Price (Any)</option>
                            <option value="5000">$5,000</option>
                            <option value="10000">$10,000</option>
                            <option value="50000">$50,000</option>
                            <option value="100000">$100,000</option>
                            <option value="200000">$200,000</option>
                            <option value="300000">$300,000</option>
                            <option value="400000">$400,000</option>
                            <option value="500000">$500,000</option>
                            <option value="600000">$600,000</option>
                            <option value="700000">$700,000</option>
                            <option value="800000">$800,000</option>
                            <option value="900000">$900,000</option>
                            <option value="1000000">$1,000,000</option>
                            <option value="1500000">$1,500,000</option>
                            <option value="2000000">$2,000,000</option>
                            <option value="2500000">$2,500,000</option>
                            <option value="5000000">$5,000,000</option>
                            <option value="10000000">$10,000,000</option>
                        </select>
                    </div>
                    <div class="option-bar property-keyword">
                        <input type="text" name="keyword" id="keyword-txt" value="" placeholder="Keyword" />
                    </div>
                    <div class="option-bar property-id">
                        <input type="text" name="property-id" id="property-id-txt" value="" placeholder="Property ID" />
                    </div>
                    <div class="option-bar property-min-area">
                        <input type="text" name="min-area" id="min-area" pattern="[0-9]+" value="" placeholder="Min Area (sq ft)" title="Please only provide digits!" />
                    </div>
                    <div class="option-bar property-max-area">
                        <input type="text" name="max-area" id="max-area" pattern="[0-9]+" value="" placeholder="Max Area (sq ft)" title="Please only provide digits!" />
                    </div>
                </div>
                <!-- .hidden-fields -->
            </form>
            <!-- .advance-search-form -->
        </div>
        <!-- .advance-search -->
    </div>
    <!-- .header-bottom -->

    <div class="page">
        <div class="container list-article">
            <div class="row">

                <div class="col-md-9">
                    <div class="row">

                        <div class="col-md-6 article-wrapper">
                            <article>
                                <div class="img-wrapper">
                                    <img src="http://lorempixel.com/150/150/fashion" alt="" />
                                </div>
                                <h1>Lorem ipsum dolor.</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Amet ducimus totam quasi nam porro sed.</p>
                            </article>
                        </div>
                        <div class="col-md-6 article-wrapper">
                            <article>
                                <div class="img-wrapper">
                                    <img src="http://lorempixel.com/150/150/city" alt="" />
                                </div>
                                <h1>Dignissimos perferendis quae.</h1>
                                <p>Numquam dolorem sed quae placeat iusto! Quibusdam
                                    doloremque enim assumenda aliquam impedit earum alias labore.</p>
                            </article>
                        </div>
                        <div class="col-md-6 article-wrapper">
                            <article>
                                <div class="img-wrapper">
                                    <img src="http://lorempixel.com/150/150/food" alt="" />
                                </div>
                                <h1>Quisquam deserunt cumque!</h1>
                                <p>Dolor tempora nihil facere explicabo qui mollitia deleniti
                                    quam quia iure nisi voluptate voluptatibus cum.</p>
                            </article>
                        </div>
                        <div class="col-md-6 article-wrapper">
                            <article>
                                <div class="img-wrapper">
                                    <img src="http://lorempixel.com/150/150/nature" alt="" />
                                </div>
                                <h1>Velit natus possimus.</h1>
                                <p>Illum voluptates nisi asperiores temporibus illo maiores
                                    qui aliquid corporis exercitationem libero dolor tenetur.
                                    Doloremque!</p>
                            </article>
                        </div>
                        <div class="col-md-6 article-wrapper">
                            <article>
                                <div class="img-wrapper">
                                    <img src="http://lorempixel.com/150/150/abstract" alt="" />
                                </div>
                                <h1>Atque quo maxime.</h1>
                                <p>Sed eveniet iste magni possimus ipsum dolore ea nesciunt
                                    eligendi id. Eum quos voluptatibus ullam.</p>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">

                    <div class="side-panel .bs-docs-sidebar">

                        <div class="topic">
                            <span>New Posts</span>
                        </div>
                        <ul class="bullet-list-round">

                            <li>
                                Active Life (active, All)
                                <ul class="bullet-list-round">

                                    <li>
                                        ATV Rentals/Tours (atvrentals, [FI, SE, US, NO])
                                    </li>

                                    <li>
                                        Amateur Sports Teams (amateursportsteams, All)
                                    </li>

                                    <li>
                                        Amusement Parks (amusementparks, All)
                                    </li>

                                    <li>
                                        Aquariums (aquariums, All)
                                    </li>

                                    <li>
                                        Archery (archery, All)
                                    </li>

                                    <li>
                                        Badminton (badminton, [BE, FR, DK, DE, JP, HK, FI, NL, PT, NO, TR, CH, CL, CA, IT, CZ, AR, AU, GB, IE, US, MX, SE, AT])
                                    </li>

                                    <li>
                                        Basketball Courts (basketballcourts, [BE, FR, CH, DK, PT, NO, TR, SG, DE, JP, IT, US, HK, NZ, AR, AU, AT, FI, CL, MX, ES])
                                    </li>

                                    <li>
                                        Bathing Area (bathing_area, [PT, NO, DE, JP, FI, SE])
                                    </li>

                                    <li>
                                        Batting Cages (battingcages, [JP, SG, US])
                                    </li>

                                    <li>
                                        Beach Volleyball (beachvolleyball, [DK, NO, DE, JP, AU, AT, BR, FI, SG, SE])
                                    </li>

                                    <li>
                                        Beaches (beaches, All)
                                    </li>

                                    <li>
                                        Bicycle Paths (bicyclepaths, [DK, PT, NO, CL, NZ, AR, AU, FI, MX])
                                    </li>

                                    <li>
                                        Bike Rentals (bikerentals, All)
                                    </li>

                                    <li>
                                        Boating (boating, All)
                                    </li>

                                    <li>
                                        Bowling (bowling, All)
                                    </li>

                                    <li>
                                        Bungee Jumping (bungeejumping, [NZ, PT])
                                    </li>

                                    <li>
                                        Challenge Courses (challengecourses, [CH, DE, US, HK, NZ, AT])
                                    </li>

                                    <li>
                                        Climbing (climbing, All)
                                    </li>

                                    <li>
                                        Cycling Classes (cyclingclasses, [BE, FR, DK, DE, JP, HK, FI, NL, NO, TR, PL, CH, CL, IT, CZ, AU, GB, ES, US, SG, SE, AT])
                                    </li>

                                    <li>
                                        Day Camps (daycamps, [BE, FR, DK, DE, BR, FI, NL, PT, NO, TR, NZ, PL, CH, CA, IT, CZ, AU, GB, IE, ES, US, SG, SE, AT])
                                    </li>

                                    <li>
                                        Disc Golf (discgolf, [BE, FR, DE, JP, HK, BR, FI, NL, PT, NO, TR, NZ, PL, CH, CL, CA, IT, CZ, AR, GB, IE, ES, US, MX, SE, AT])
                                    </li>

                                    <li>
                                        Diving (diving, All)
                                        <ul class="bullet-list-round">

                                            <li>
                                                Free Diving (freediving, All)
                                            </li>

                                            <li>
                                                Scuba Diving (scuba, All)
                                            </li>

                                        </ul>
                                    </li>

                                    <li>
                                        Experiences (experiences, [DE, PT, SE, NO])
                                    </li>

                                    <li>
                                        Fencing Clubs (fencing, All)
                                    </li>

                                    <li>
                                        Fishing (fishing, All)
                                    </li>

                                    <li>
                                        Fitness &amp; Instruction (fitness, All)
                                        <ul class="bullet-list-round">

                                            <li>
                                                Barre Classes (barreclasses, [AU, PT, US])
                                            </li>

                                            <li>
                                                Boot Camps (bootcamps, [PT, IT, US, NZ, AU, SE, ES])
                                            </li>

                                            <li>
                                                Boxing (boxing, [BE, FR, CH, NL, PT, CL, CA, DE, JP, IT, US, HK, NZ, AR, GB, IE, MX, AT])
                                            </li>

                                            <li>
                                                Dance Studios (dancestudio, All)
                                            </li>

                                            <li>
                                                Gyms (gyms, All)
                                            </li>

                                            <li>
                                                Martial Arts (martialarts, All)
                                            </li>

                                            <li>
                                                Meditation Centers (meditationcenters, [BE, FR, DK, DE, JP, HK, BR, FI, NL, PT, NO, TR, NZ, PL, CH, CL, CA, IT, CZ, AU, GB, IE, ES, US, SG, SE, AT])
                                            </li>

                                            <li>
                                                Pilates (pilates, All)
                                            </li>

                                            <li>
                                                Swimming Lessons/Schools (swimminglessons, All)
                                            </li>

                                            <li>
                                                Tai Chi (taichi, All)
                                            </li>

                                            <li>
                                                Trainers (healthtrainers, All)
                                            </li>

                                            <li>
                                                Yoga (yoga, All)
                                            </li>

                                        </ul>
                                    </li>

                                    <li>
                                        Flyboarding (flyboarding, All)
                                    </li>

                                    <li>
                                        Gliding (gliding, [CH, PT, NO, DE, AT, SE])
                                    </li>

                                    <li>
                                        Go Karts (gokarts, All)
                                    </li>

                                    <li>
                                        Golf (golf, All)
                                    </li>

                                    <li>
                                        Gun/Rifle Ranges (gun_ranges, [ES, US, NL, PT, NO, TR, CA, CL, JP, IT, CZ, HK, NZ, AR, AU, GB, SE, FI, IE, MX, PL])
                                    </li>

                                    <li>
                                        Gymnastics (gymnastics, [DK, PT, NO, CA, US, NZ, BR, MX])
                                    </li>

                                    <li>
                                        Hang Gliding (hanggliding, [BE, FR, PT, IT, US, NZ, AU, SE])
                                    </li>

                                    <li>
                                        Hiking (hiking, All)
                                    </li>

                                    <li>
                                        Horse Racing (horseracing, [CH, PT, NO, DE, JP, US, AR, AU, AT, FI, SE])
                                    </li>

                                    <li>
                                        Horseback Riding (horsebackriding, All)
                                    </li>

                                    <li>
                                        Hot Air Balloons (hot_air_balloons, [ES, US, CL, CH, PT, NO, TR, DE, JP, IT, CZ, HK, AR, AU, GB, SE, FI, MX, PL, AT])
                                    </li>

                                    <li>
                                        Indoor Playcentre (indoor_playcenter, [DK, PT, NO, DE, JP, IT, NZ, AU, ES, SE])
                                    </li>

                                    <li>
                                        Jet Skis (jetskis, All)
                                    </li>

                                    <li>
                                        Kids Activities (kids_activities, [BE, FR, DK, DE, JP, HK, BR, FI, NL, PT, NO, TR, NZ, PL, CH, CL, IT, CZ, AR, AU, GB, IE, ES, US, MX, SE, AT])
                                    </li>

                                    <li>
                                        Kiteboarding (kiteboarding, [FR, NL, DK, PT, NO, TR, SG, DE, JP, US, NZ, AU, FI, IE, SE])
                                    </li>

                                    <li>
                                        Lakes (lakes, All)
                                    </li>

                                    <li>
                                        Laser Tag (lasertag, [BE, FR, DK, DE, JP, HK, FI, NL, PT, NO, TR, NZ, PL, CH, CL, CA, IT, CZ, AR, AU, GB, ES, US, SG, MX, SE, AT])
                                    </li>

                                    <li>
                                        Lawn Bowling (lawn_bowling, [PT, NO, NZ, AU, FI, SE])
                                    </li>

                                    <li>
                                        Leisure Centers (leisure_centers, [BE, FR, DE, JP, HK, BR, FI, NL, PT, NO, TR, NZ, PL, CH, CL, CA, IT, CZ, AR, AU, GB, IE, ES, US, SG, MX, SE, AT])
                                    </li>

                                    <li>
                                        Mini Golf (mini_golf, [BE, FR, DK, DE, JP, HK, BR, FI, NL, PT, NO, TR, NZ, PL, CH, CL, CA, CZ, AR, AU, GB, IE, ES, US, SG, MX, SE, AT])
                                    </li>

                                    <li>
                                        Mountain Biking (mountainbiking, All)
                                    </li>

                                    <li>
                                        Nudist (nudist, [DK, PT, NO, DE, FI, SE])
                                    </li>

                                    <li>
                                        Paddleboarding (paddleboarding, [FR, DK, PT, NO, IE, US, NZ, AU, FI, SG, ES])
                                    </li>

                                    <li>
                                        Paintball (paintball, [BE, FR, DK, DE, JP, HK, BR, FI, NL, PT, NO, TR, NZ, PL, CH, CL, CA, IT, CZ, AR, AU, GB, IE, ES, US, MX, SE, AT])
                                    </li>

                                    <li>
                                        Parks (parks, All)
                                        <ul class="bullet-list-round">

                                            <li>
                                                Dog Parks (dog_parks, All)
                                            </li>

                                            <li>
                                                Skate Parks (skate_parks, All)
                                            </li>

                                        </ul>
                                    </li>

                                    <li>
                                        Playgrounds (playgrounds, All)
                                    </li>

                                    <li>
                                        Public Plazas (publicplazas, [FR, CH, DK, PT, NO, TR, SG, DE, JP, IT, CZ, HK, AR, ES, SE, FI, CL, MX, PL, AT])
                                    </li>

                                    <li>
                                        Rafting/Kayaking (rafting, All)
                                    </li>

                                    <li>
                                        Recreation Centers (recreation, All)
                                    </li>

                                    <li>
                                        Rock Climbing (rock_climbing, [PT, NO, JP, US, NZ, AR, AU, ES, FI, SE])
                                    </li>

                                    <li>
                                        Sailing (sailing, [BE, FR, DK, DE, JP, HK, BR, FI, NL, PT, NO, NZ, CH, CL, CA, IT, CZ, AR, AU, GB, IE, ES, SG, MX, SE, AT])
                                    </li>

                                    <li>
                                        Skating Rinks (skatingrinks, All)
                                    </li>

                                    <li>
                                        Skiing (skiing, [ES, CH, DK, PT, NO, DE, JP, NZ, AT, FI, SE])
                                    </li>

                                    <li>
                                        Skydiving (skydiving, All)
                                    </li>

                                    <li>
                                        Sledding (sledding, [CH, PT, NO, CA, DE, TR, IT, US, NZ, AT, FI])
                                    </li>

                                    <li>
                                        Soccer (football, All)
                                    </li>

                                    <li>
                                        Spin Classes (spinclasses, All)
                                    </li>

                                    <li>
                                        Sport Equipment Hire (sport_equipment_hire, [AU, PT])
                                    </li>

                                    <li>
                                        Sports Clubs (sports_clubs, All)
                                    </li>

                                    <li>
                                        Squash (squash, [BE, FR, DK, DE, JP, HK, FI, NL, NO, TR, PL, CH, CL, CA, IT, CZ, AR, AU, GB, IE, ES, US, MX, SE, AT])
                                    </li>

                                    <li>
                                        Summer Camps (summer_camps, All)
                                    </li>

                                    <li>
                                        Surf Lifesaving (surflifesaving, [NZ, AU, BR, PT])
                                    </li>

                                    <li>
                                        Surfing (surfing, [FR, NL, DK, PT, DE, JP, IT, US, NZ, ES, BR, SE])
                                    </li>

                                    <li>
                                        Swimming Pools (swimmingpools, All)
                                    </li>

                                    <li>
                                        Tennis (tennis, All)
                                    </li>

                                    <li>
                                        Trampoline Parks (trampoline, [DK, CA, TR, IT, US, CZ, AU, PL])
                                    </li>

                                    <li>
                                        Tubing (tubing, [US])
                                    </li>

                                    <li>
                                        Volleyball (volleyball, [FR, DK, NO, DE, JP, NZ, AU, AT, BR, FI, SG, SE])
                                    </li>

                                    <li>
                                        Wildlife Hunting Ranges (wildlifehunting, [US])
                                    </li>

                                    <li>
                                        Zoos (zoos, All)
                                    </li>

                                    <li>
                                        Zorbing (zorbing, [NZ, PT])
                                    </li>

                                </ul>
                            </li>

                            <li>
                                Arts &amp; Entertainment (arts, All)
                                <ul class="bullet-list-round">

                                    <li>
                                        Arcades (arcades, All)
                                    </li>

                                    <li>
                                        Art Galleries (galleries, All)
                                    </li>

                                    <li>
                                        Betting Centers (bettingcenters, [BE, CH, NL, DK, PT, CL, TR, DE, JP, IT, CZ, HK, AR, AU, GB, SE, IE, MX, PL, AT])
                                    </li>

                                    <li>
                                        Botanical Gardens (gardens, All)
                                    </li>

                                    <li>
                                        Cabaret (cabaret, [BE, FR, DK, DE, BR, FI, NL, PT, NO, TR, NZ, PL, CH, CA, IT, CZ, AU, GB, IE, ES, US, SG, SE, AT])
                                    </li>

                                    <li>
                                        Casinos (casinos, [BE, FR, DK, DE, BR, FI, NL, PT, NO, TR, NZ, PL, CH, CL, CA, IT, CZ, AR, AU, GB, IE, ES, US, SG, MX, SE, AT])
                                    </li>

                                    <li>
                                        Castles (castles, [ES, BE, FR, CH, PT, NO, DE, JP, IT, AT, FI, SE, GB])
                                    </li>

                                    <li>
                                        Choirs (choirs, [FR, CH, DK, PT, NO, IE, TR, DE, JP, IT, HK, AR, AU, GB, SE, FI, CL, MX, ES, AT])
                                    </li>

                                    <li>
                                        Cinema (movietheaters, All)
                                    </li>

                                    <li>
                                        Cultural Center (culturalcenter, [ES, BE, FR, DK, PT, NO, CL, JP, IT, US, HK, AR, AU, GB, SE, FI, SG, MX, PL])
                                    </li>

                                    <li>
                                        Festivals (festivals, All)
                                        <ul class="bullet-list-round">

                                            <li>
                                                Christmas Markets (xmasmarkets, [ES, FR, CH, DK, PT, NO, DE, JP, IT, CZ, HK, AR, AU, GB, SE, FI, CL, MX, PL, AT])
                                            </li>

                                            <li>
                                                Fun Fair (funfair, [CH, DE, AT, PT])
                                            </li>

                                            <li>
                                                General Festivals (generalfestivals, [CH, DE, AT, PT])
                                            </li>

                                            <li>
                                                Trade Fairs (tradefairs, [CH, PT, NO, DE, NZ, AT, FI, MX])
                                            </li>

                                        </ul>
                                    </li>

                                    <li>
                                        Jazz &amp; Blues (jazzandblues, All)
                                    </li>

                                    <li>
                                        Mah Jong Halls (mahjong, [HK, JP])
                                    </li>

                                    <li>
                                        Marching Bands (marchingbands, [CH, PT, NO, DE, TR, AT, SE, GB])
                                    </li>

                                    <li>
                                        Museums (museums, All)
                                    </li>

                                    <li>
                                        Music Venues (musicvenues, All)
                                    </li>

                                    <li>
                                        Opera &amp; Ballet (opera, All)
                                    </li>

                                    <li>
                                        Pachinko (pachinko, [JP])
                                    </li>

                                    <li>
                                        Performing Arts (theater, All)
                                    </li>

                                    <li>
                                        Professional Sports Teams (sportsteams, All)
                                    </li>

                                    <li>
                                        Psychics &amp; Astrologers (psychic_astrology, All)
                                    </li>

                                    <li>
                                        Race Tracks (racetracks, [BE, FR, DK, JP, HK, FI, NL, PT, NO, TR, NZ, PL, CL, IT, CZ, AR, AU, GB, ES, US, MX, SE])
                                    </li>

                                    <li>
                                        Social Clubs (social_clubs, All)
                                    </li>

                                    <li>
                                        Stadiums &amp; Arenas (stadiumsarenas, All)
                                    </li>

                                    <li>
                                        Street Art (streetart, [DK, PT, NO, DE, IT, NZ, AU, BR, MX, SE])
                                    </li>

                                    <li>
                                        Tablao Flamenco (tablaoflamenco, [ES, PT])
                                    </li>

                                    <li>
                                        Ticket Sales (ticketsales, [BE, FR, CH, DK, PT, NO, CA, DE, JP, IT, US, HK, AR, AU, AT, CL, MX])
                                    </li>

                                    <li>
                                        Wineries (wineries, [BE, FR, DK, DE, JP, HK, BR, NL, PT, NO, TR, NZ, PL, CH, CL, CA, IT, CZ, AR, AU, GB, IE, ES, US, SG, MX, SE, AT])
                                    </li>

                                </ul>
                            </li>

                            <li>
                                Automotive (auto, All)
                                <ul class="bullet-list-round">

                                    <li>
                                        Aircraft Dealers (aircraftdealers, [PT, US])
                                    </li>

                                    <li>
                                        Auto Customization (autocustomization, [SG, PT, US])
                                    </li>

                                    <li>
                                        Auto Detailing (auto_detailing, [BE, FR, JP, HK, FI, NL, PT, NO, TR, NZ, PL, CL, CA, IT, CZ, AR, GB, IE, US, SG, MX, SE])
                                    </li>

                                    <li>
                                        Auto Electric Services (autoelectric, [IT, BR])
                                    </li>

                                    <li>
                                        Auto Glass Services (autoglass, [BE, FR, DE, JP, HK, BR, FI, NL, PT, NO, TR, NZ, PL, CH, CL, CA, IT, CZ, AR, AU, GB, IE, US, SG, MX, SE, AT])
                                    </li>

                                    <li>
                                        Auto Loan Providers (autoloanproviders, [PT, TR, IT, US, AU, SG])
                                    </li>

                                    <li>
                                        Auto Parts &amp; Supplies (autopartssupplies, All)
                                    </li>

                                    <li>
                                        Auto Repair (autorepair, All)
                                    </li>

                                    <li>
                                        Boat Dealers (boatdealers, [PT, US])
                                    </li>

                                    <li>
                                        Body Shops (bodyshops, [BE, FR, DK, JP, HK, BR, FI, NL, PT, NO, TR, NZ, PL, CL, CA, IT, CZ, AR, AU, GB, IE, ES, US, SG, MX, SE])
                                    </li>

                                    <li>
                                        Car Buyers (carbuyers, [AU, NZ, SG, BR, US])
                                    </li>

                                    <li>
                                        Car Dealers (car_dealers, All)
                                    </li>

                                    <li>
                                        Car Inspectors (autodamageassessment, [DE, DK, SE, NO])
                                    </li>

                                    <li>
                                        Car Share Services (carshares, [FR, CH, DK, NO, CA, DE, US, AU, AT])
                                    </li>

                                    <li>
                                        Car Stereo Installation (stereo_installation, [BE, FR, DE, JP, HK, BR, FI, NL, PT, NO, TR, NZ, PL, CL, CA, IT, CZ, AR, AU, GB, IE, US, SG, MX, SE])
                                    </li>

                                    <li>
                                        Car Wash (carwash, All)
                                    </li>

                                    <li>
                                        Gas &amp; Service Stations (servicestations, All)
                                    </li>

                                    <li>
                                        Motorcycle Dealers (motorcycledealers, [BE, FR, DK, DE, JP, HK, FI, NL, PT, NO, TR, NZ, PL, CH, CL, CA, IT, CZ, AR, AU, GB, IE, ES, US, SG, MX, SE, AT])
                                    </li>

                                    <li>
                                        Motorcycle Repair (motorcyclerepair, All)
                                    </li>

                                    <li>
                                        Oil Change Stations (oilchange, [BE, FR, DK, JP, HK, FI, NL, PT, TR, NZ, PL, CL, CA, IT, CZ, AR, AU, GB, IE, ES, US, SG, MX])
                                    </li>

                                    <li>
                                        Parking (parking, All)
                                    </li>

                                    <li>
                                        RV Dealers (rv_dealers, [BE, FR, NL, DK, NO, CA, IT, US, ES, BR, FI, SE])
                                    </li>

                                    <li>
                                        RV Repair (rvrepair, [CA, US])
                                    </li>

                                    <li>
                                        Registration Services (registrationservices, [BR, IT, US, PT])
                                    </li>

                                    <li>
                                        Smog Check Stations (smog_check_stations, [BE, FR, DE, JP, HK, BR, NL, PT, TR, NZ, PL, CH, CL, CA, IT, CZ, AR, AU, GB, IE, ES, US, SG, MX, AT])
                                    </li>

                                    <li>
                                        Tires (tires, All)
                                    </li>

                                    <li>
                                        Towing (towing, All)
                                    </li>

                                    <li>
                                        Truck Rental (truck_rental, [FR, PT, CA, DE, IT, US, AU])
                                    </li>

                                    <li>
                                        Vehicle Shipping (vehicleshipping, All)
                                    </li>

                                    <li>
                                        Wheel &amp; Rim Repair (wheelrimrepair, [IT, US, PT])
                                    </li>

                                    <li>
                                        Windshield Installation &amp; Repair (windshieldinstallrepair, [BE, FR, JP, HK, BR, FI, NL, PT, NO, TR, NZ, PL, CL, CA, IT, CZ, AR, AU, GB, IE, US, SG, MX, SE])
                                    </li>

                                </ul>
                            </li>

                            <li>
                                Beauty &amp; Spas (beautysvc, All)
                                <ul class="bullet-list-round">

                                    <li>
                                        Barbers (barbers, All)
                                    </li>

                                    <li>
                                        Cosmetics &amp; Beauty Supply (cosmetics, All)
                                    </li>

                                    <li>
                                        Day Spas (spas, All)
                                    </li>

                                    <li>
                                        Erotic Massage (eroticmassage, [FR, DE, IT, GB, IE, ES])
                                    </li>

                                    <li>
                                        Eyelash Service (eyelashservice, [BE, FR, DE, JP, HK, FI, NL, PT, NO, TR, NZ, PL, CH, CL, CA, CZ, AR, AU, GB, IE, US, SG, MX, SE, AT])
                                    </li>

                                    <li>
                                        Hair Extensions (hair_extensions, [FR, CH, DK, PT, NO, SG, CA, DE, JP, US, NZ, AU, GB, BR, FI, IE, MX, SE, AT])
                                    </li>

                                    <li>
                                        Hair Removal (hairremoval, All)
                                        <ul class="bullet-list-round">

                                            <li>
                                                Laser Hair Removal (laser_hair_removal, [BE, FR, DE, JP, HK, BR, FI, NL, PT, NO, TR, NZ, PL, CH, CL, CA, IT, CZ, AR, AU, GB, IE, US, SG, MX, SE, AT])
                                            </li>

                                            <li>
                                                Sugaring (sugaring, [US])
                                            </li>

                                            <li>
                                                Waxing (waxing, All)
                                            </li>

                                        </ul>
                                    </li>

                                    <li>
                                        Hair Salons (hair, All)
                                        <ul class="bullet-list-round">

                                            <li>
                                                Blow Dry/Out Services (blowoutservices, [PT, CA, TR, US, CZ, AU, GB, IE])
                                            </li>

                                            <li>
                                                Hair Extensions (hair_extensions, [FR, CH, DK, PT, NO, SG, CA, DE, JP, US, NZ, AU, GB, BR, FI, IE, MX, SE, AT])
                                            </li>

                                            <li>
                                                Hair Stylists (hairstylists, [AU, SG, SE, US, PT])
                                            </li>

                                            <li>
                                                Men's Hair Salons (menshair, [AU, PT, US])
                                            </li>

                                        </ul>
                                    </li>

                                    <li>
                                        Makeup Artists (makeupartists, All)
                                    </li>

                                    <li>
                                        Massage (massage, All)
                                    </li>

                                    <li>
                                        Medical Spas (medicalspa, All)
                                    </li>

                                    <li>
                                        Nail Salons (othersalons, All)
                                    </li>

                                    <li>
                                        Perfume (perfume, [BE, FR, CH, DK, PT, NO, IE, DE, JP, IT, CZ, HK, NZ, AR, AU, GB, SE, CL, MX, ES, AT])
                                    </li>

                                    <li>
                                        Permanent Makeup (permanentmakeup, [BE, FR, CH, NL, PT, CL, TR, DE, JP, IT, US, HK, AR, AU, GB, MX, ES, AT])
                                    </li>

                                    <li>
                                        Piercing (piercing, All)
                                    </li>

                                    <li>
                                        Rolfing (rolfing, [CA, PT, US])
                                    </li>

                                    <li>
                                        Skin Care (skincare, All)
                                    </li>

                                    <li>
                                        Tanning (tanning, All)
                                        <ul class="bullet-list-round">

                                            <li>
                                                Spray Tanning (spraytanning, [BE, FR, DK, DE, JP, HK, FI, NL, PT, NO, TR, NZ, CH, CL, IT, AR, AU, GB, ES, US, SG, MX, AT])
                                            </li>

                                            <li>
                                                Tanning Beds (tanningbeds, [BE, FR, DK, DE, JP, HK, NL, PT, NO, TR, NZ, CH, CL, CA, IT, AR, AU, GB, IE, ES, US, SG, MX, AT])
                                            </li>

                                        </ul>
                                    </li>

                                    <li>
                                        Tattoo (tattoo, All)
                                    </li>

                                </ul>
                            </li>

                        </ul>
                    </div>


                    {{--<div class="side-panel .bs-docs-sidebar">--}}

                        {{--<div class="topic">--}}
                            {{--<span>New Posts</span>--}}
                        {{--</div>--}}

                    {{--</div>--}}

                </div>


            </div>

        </div>
    </div>


    <footer class="footer">

        <p>
            <small>&copy; Copyright Your Name Here 2014. All Rights
                Reserved.</small>
        </p>

    </footer>

</div>

<!-- Grab Google CDN's jQuery. fall back to local if necessary -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write("<script src='{{ asset('components/js/libs/jquery-1.11.3.min.js') }}'>\x3C/script>")</script>

{{--<script src="{{ asset('components/js/libs/select2.min.js') }}"></script>--}}
<script src="{{ asset('components/select2/dist/js/select2.full.min.js') }}"></script>

<!-- this is where we put our custom functions -->
<!-- don't forget to concatenate and minify for production -->
<script src="{{ asset('components/js/functions.js') }}"></script>
{{--<script>$(document).ready(initPage);</script>--}}

<!-- Asynchronous google analytics; this is the official snippet.
	 Replace UA-XXXXXX-XX with your site's ID and uncomment to enable.

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-XXXXXX-XX', 'auto');
  ga('send', 'pageview');

</script>
-->






</body>
</html>
