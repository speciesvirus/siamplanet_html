@extends('layouts.main')
@section('title', $news['attributes']['title'])
@section('meta')
    <meta name="keywords" content="{{ str_replace( ',', '', $news->tag ) }}">
    <meta name="description" content="nainam.com - รวบรวม คอนโด บ้านเดี่ยว ทาวน์เฮ้าส์ ขายบ้าน บ้านมือสอง ครบถ้วนและอัพเดทที่สุด พร้อมแผนที่ทุกประกาศ สไตล์คุณ">
    <meta property="article:author" content="nainam" />

    <!-- Twitter: see https://dev.twitter.com/docs/cards/types/summary-card for details -->
    <meta name="twitter:creator" content="@nainam">
    <meta name="twitter:title" content="{{ $news->title }}">
    <meta name="twitter:description" content="{{ mb_substr(strip_tags($news->content),0,110, 'UTF-8') }}">

    <!-- Facebook (and some others) use the Open Graph protocol: see http://ogp.me/ for details -->
    <meta property="og:title" content="{{ $news->title }}"/>
    <meta property="og:description" content="{{ mb_substr(strip_tags($news->content),0,110, 'UTF-8') }}"/>
    <meta property="og:image" content="{{ $image($news->image) }}"/>
    
    <meta property="og:locale" content="en_US">
<meta property="og:type" content="article">
<meta property="og:title" content="จับตากระแสระลอกครั้งใหม่ U CAN CAN U ? | BrandBuffet">
<meta property="og:description" content="UBEER เพิ่มความแรงต่อเนื่องด้วยการออกเบียร์กระป๋องเข้าสู่ตลาดด้วย Design ง่ายๆแต่ Shock เล่นกันง่ายๆแต่โคตรโดน สะท้อนจุดยืนของแบรนด์ที่มีตัวตนชัดเจน UCAN พร้อมวางขายแล้ววันนี้ที่ 7-11 ทั่วประเทศ">
<meta property="og:url" content="http://www.brandbuffet.in.th/2017/04/ubeer-can-launch-7eleven/">
<meta property="og:site_name" content="Brand Buffet">
<meta property="article:publisher" content="https://www.facebook.com/brandbuffet">
<meta property="article:author" content="http://www.facebook.com/brandbuffet">
<meta property="article:tag" content="UBEER">
<meta property="article:tag" content="กระป๋อง">
<meta property="article:tag" content="ยูเบียร์">
<meta property="article:tag" content="สิงห์">
<meta property="article:tag" content="เบียรสิงห์">
<meta property="article:section" content="Advertorial">
<meta property="article:published_time" content="2017-04-04T00:58:43+07:00">
<meta property="article:modified_time" content="2017-04-04T11:36:34+07:00">
<meta property="og:updated_time" content="2017-04-04T11:36:34+07:00">
<meta property="fb:admins" content="10203695474528790">
<meta property="fb:admins" content="524995360">
<meta property="og:image" content="http://www.brandbuffet.in.th/wp-content/uploads/2017/04/ubeer-can-cover.jpg">
<meta property="og:image:width" content="800">
<meta property="og:image:height" content="500">
@stop

@section('source')

@stop

@section('script')

    <link rel="stylesheet" href="{{ asset('resources/assets/css/post.css', env('HTTPS')) }}"/>
    <link rel="stylesheet" href="{{ asset('resources/assets/css/news.css', env('HTTPS')) }}"/>

    <script src="{{ asset('resources/assets/bootstrap/dist/js/bootstrap.js', env('HTTPS')) }}"></script>

    <script type="text/javascript">


    </script>

@stop

@section('first-content')

    <div class="col-md-9 clearfix">
        <h1 class="entry-title">{{ $news['attributes']['title'] }}</h1>

        <div id="post-feat-img" class="left relative">
            <img src="{{ $image($news->image) }}"
                 class="attachment- size- wp-post-image" alt="">
            <div class="post-feat-text">
				    <span class="post-excerpt left">
				        <p>{{ $news->subtitle }}</p>
                    </span>
                {{--<span class="feat-caption">Photo: Shutterstock</span>--}}
            </div>
        </div><!--post-feat-text-->

        <div id="content-area" itemprop="articleBody"
             class="post-122 post type-post status-publish format-standard has-post-thumbnail hentry category-fashion tag-celebrities tag-fashion tag-gallery tag-style">
            <div id="content-main" class="relative">

                {!! $news['attributes']['content'] !!}

                <div class="posts-nav-link">
                </div><!--posts-nav-link-->

                @if ($news->tag != "")
                    <div class="post-tags">
                        <span class="post-tags-header">Related Items:</span>
                        <span itemprop="keywords">

                            @foreach(explode(',', $news->tag) as $key => $info)
                                <a href="{{ route('news.tag').'/'.$info }}" rel="tag">{{ $info }}</a>{{ ($key + 1) != count(explode(',', $news->tag)) ? ',' : '' }}
                            @endforeach
                        </span>
                    </div><!--post-tags-->
                @endif



                <div class="social-sharing-bot">
                    @include('_partials.social-share')
                </div><!--social-sharing-bot-->


            </div><!--content-main-->

        </div>


    </div>

    <div class="col-md-3">

        @include('_partials.geography')

        @include('_partials.review-right')

        @include('_partials.facebook-page')

    </div>

@stop

@section('second-content')

    <div class="col-md-9">
        <h3 class="side-list-title">Recommended for you</h3>
        <div id="mvp_tagrow_widget-2" class="home-widget left relative mvp_tagrow_widget">
            <div class="row-widget-wrap left relative">
                <ul class="row-widget-list">
                    @foreach($navigator_news_random(collect(request()->segments())->last(), null, null) as $value)
                        <li>
                            <a href="{{ route('news.view').'/'.$value->id }}" rel="bookmark">
                                <div class="row-widget-img left relative">
                                    <img src="{{ route('images.q').'?q='.$value->image }}"
                                         class="reg-img wp-post-image" alt="">
                                    <div class="feat-info-wrap">
                                        <div class="feat-info-views">
                                            <i class="fa fa-eye fa-2"></i> <span class="feat-info-text">{{ $value->view }}</span>
                                        </div><!--feat-info-views-->
                                    </div><!--feat-info-wrap-->
                                </div><!--row-widget-img-->
                                <div class="row-widget-text left relative">
                                    <span class="side-list-cat">{{ $category_name($value->category_id) }}</span>
                                    <p>{{ $value->title }}</p>
                                </div><!--row-widget-text-->
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div><!--row-widget-wrap-->
        </div>
    </div>

    <div class="col-md-3">

    </div>

@stop

@section('third-content')

    <div class="col-md-9">

        @include('_partials.product-new')

    </div>

    <div class="col-md-3">

        @include('_partials.product-previous')

    </div>

@stop