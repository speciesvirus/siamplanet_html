@extends('layouts.main')
@section('title', $news['attributes']['title'])
@section('meta')
    <meta name="keywords" content="{{ str_replace( ',', '', $news->tag ) }}">
    <meta name="description" content="nainam.com - รวบรวม คอนโด บ้านเดี่ยว ทาวน์เฮ้าส์ ขายบ้าน บ้านมือสอง ครบถ้วนและอัพเดทที่สุด พร้อมแผนที่ทุกประกาศ สไตล์คุณ">
    <meta property="article:author" content="nainam" />
    <meta property="article:publisher" content="https://www.facebook.com/nainamofficial">
    <meta property="article:author" content="http://www.facebook.com/nainamofficial">
    @foreach(explode(',', $news->tag) as $key => $info)
    <meta property="article:tag" content="{{ trim($info) }}">
    @endforeach

    <!-- Twitter: see https://dev.twitter.com/docs/cards/types/summary-card for details -->
    <meta name="twitter:creator" content="@nainam">
    <meta name="twitter:title" content="{{ $social['title'] }}">
    <meta name="twitter:description" content="{{ mb_substr(strip_tags($social['des']),0,110, 'UTF-8') }}">

    <!-- Facebook (and some others) use the Open Graph protocol: see http://ogp.me/ for details -->
    <meta property="og:title" content="{{ $social['title'] }}"/>
    <meta property="og:description" content="{{ mb_substr(strip_tags($social['des']),0,110, 'UTF-8') }}"/>
    <meta property="og:image" content="{{ $social['thumbnails'] }}"/>
    {{--<meta property="og:image:width" content="{{ getimagesize($social['thumbnails'])[0] }}"/>--}}
    {{--<meta property="og:image:height" content="{{ getimagesize($social['thumbnails'])[1] }}"/>--}}
    <meta property="og:image:width" content="1200"/>
    <meta property="og:image:height" content="630"/>

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

    <div class="col-md-9 clearfix" itemscope itemtype="http://schema.org/news" >
        <h1 class="entry-title" itemprop="name">{{ $news['attributes']['title'] }}</h1>

        <div id="post-feat-img" class="left relative">
            <img src="{{ $news_image($news->image) }}" itemprop="image"
                 class="attachment- size- wp-post-image" alt="">
            <div class="post-feat-text">
				    <span class="post-excerpt left">
				        <p itemprop="description">{{ $news->subtitle }}</p>
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

                <div class="bs-docs-section fb-comments-section">
                    <div class="fb-comments" data-href="{{ request()->url() }}" data-numposts="5"></div>
                </div>

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
                                    <img src="{{ $news_image($value->image) }}"
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