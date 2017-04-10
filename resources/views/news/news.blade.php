@extends('layouts.main')
@section('title', 'Nainam - news')
@section('meta')
    <meta name="keywords" content="คอนโด บ้านเดี่ยว ทาวน์เฮ้าส์ ขายบ้าน บ้านมือสอง บ้านใหม่ โครงการใหม่ คอนโดใหม่ ข่าว">
    <meta name="description" content="nainam.com - รวบรวม คอนโด บ้านเดี่ยว ทาวน์เฮ้าส์ ขายบ้าน บ้านมือสอง ครบถ้วนและอัพเดทที่สุด พร้อมแผนที่ทุกประกาศ สไตล์คุณ">
    <meta property="article:author" content="nainam" />
    <!-- Twitter: see https://dev.twitter.com/docs/cards/types/summary-card for details -->

    <meta name="twitter:creator" content="@nainam">
    <meta name="twitter:title" content="Nainam">
    <meta name="twitter:description" content="Nainam | รวบรวม ที่ดิน บ้าน คอนโด ทาวน์เฮ้าส์ อื่นๆ ครบถ้วน ทุกทำเลท ออกแบบได้สไตล์คุณ">

    <!-- Facebook (and some others) use the Open Graph protocol: see http://ogp.me/ for details -->
    <meta property="og:title" content="nainam"/>
    <meta property="og:description" content="Nainam | รวบรวม ที่ดิน บ้าน คอนโด ทาวน์เฮ้าส์ อื่นๆ ครบถ้วน ทุกทำเลท ออกแบบได้สไตล์คุณ"/>
    <meta property="og:image" content="{{ asset('resources/assets/images/nainam_logo_top_blue_300.png', env('HTTPS')) }}"/>
@stop

@section('source')

@stop

@section('script')

    <link rel="stylesheet" href="{{ asset('resources/assets/css/post.css', env('HTTPS')) }}"/>
    <link rel="stylesheet" href="{{ asset('resources/assets/css/news.css', env('HTTPS')) }}"/>

    <script src="{{ asset('resources/assets/bootstrap/dist/js/bootstrap.js', env('HTTPS')) }}"></script>

    <script type="text/javascript">


    </script>

    <style>
        .page section:nth-child(2) {
            margin-top: 1px;
        }
    </style>

@stop

@section('first-content')

    <h1 class="entry-title"></h1>

    <div id="feat-top-wrap" class="left relative">

        @foreach($news_top as $value)
            <div class="col-xs-6 col-sm-3">
                <div class="row">
                    <div class="feat-wide5-main">
                        {{--http://www.mvpthemes.com/flexmag/only-three-players-have-a-winning-record-against-rafael-nadal/--}}
                        <a href="{{ route('news.view').'/'.$value->id }}" rel="bookmark">
                            <div class="feat-wide5-img left relative">
                                <img src="{{ $news_image($value->image) }}"
                                     class="unlazy reg-img wp-post-image">
                            </div><!--feat-wide5-img-->
                            <div class="feat-wide5-text">
                                <span class="feat-cat">{{ $category_name($value->category_id) }}</span>
                                <h2>{{ $value->title }}</h2>
                            </div><!--feat-wide5-text-->
                            <div class="feat-info-wrap">
                                <div class="feat-info-views">
                                    <i class="fa fa-eye fa-2"></i> <span
                                            class="feat-info-text">{{ $value->view }}</span>
                                </div>
                                {{--<div class="feat-info-comm">--}}
                                {{--<i class="fa fa-comment"></i> <span class="feat-info-text">13</span>--}}
                                {{--</div>--}}
                            </div><!--feat-info-wrap-->
                        </a>
                    </div><!--feat-wide5-main-->
                </div>
            </div>
        @endforeach

    </div>
@stop

@section('second-content')

    <div class="col-md-9">
        <h3 class="side-list-title">อสังหาริมทรัพย์</h3>
        <div id="mvp_tagrow_widget-2" class="home-widget left relative mvp_tagrow_widget">
            <div class="row-widget-wrap left relative">
                <ul class="row-widget-list">
                    @foreach($property as $value)
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
        <a href="{{ route('news.category') }}/1" class="inf-more-but" style="display: inline-block;">More Posts</a>

        <h3 class="side-list-title mg-30">สังคม</h3>
        <aside class="related-entries">

            @foreach($social as $value)
                <article class="related-entry cf">
                    <div class="related-entry-thumb">
                        <a href="{{ route('news.view').'/'.$value->id }}"
                           title="{{ $value->title }}">
                            <img src="{{ $news_image($value->image) }}"
                                 class="related-entry-thumb-image wp-post-image"
                                 alt="{{ $value->subtitle }}"> </a>
                    </div>
                    <!-- /.related-entry-thumb -->

                    <div class="related-entry-content">
                        <header>
                            <h3 class="related-entry-title">
                                <a href="{{ route('news.view').'/'.$value->id }}"
                                   class="related-entry-title-link" title="{{ $value->title }}">{{ $value->title }}</a>
                            </h3>
                        </header>
                        <p class="related-entry-snippet">{{ $value->subtitle }}</p>

                        <footer>
                            <p class="related-entry-read"><a href="{{ route('news.view').'/'.$value->id }}">เพิ่มเติม</a></p>
                        </footer>

                    </div>
                    <!-- /.related-entry-content -->
                </article>
                <!-- /.elated-entry -->
            @endforeach

            <a href="{{ route('news.category') }}/4" class="inf-more-but" style="display: inline-block;">More Posts</a>
        </aside>

        <h3 class="side-list-title mg-20">เทคโนโลยี</h3>
        <aside class="related-entries">

            @foreach($technology as $value)
                <article class="related-entry cf">
                    <div class="related-entry-thumb">
                        <a href="{{ route('news.view').'/'.$value->id }}"
                           title="{{ $value->title }}">
                            <img src="{{ $news_image($value->image) }}"
                                 class="related-entry-thumb-image wp-post-image"
                                 alt="{{ $value->subtitle }}"> </a>
                    </div>
                    <!-- /.related-entry-thumb -->

                    <div class="related-entry-content">
                        <header>
                            <h3 class="related-entry-title">
                                <a href="{{ route('news.view').'/'.$value->id }}"
                                   class="related-entry-title-link" title="{{ $value->title }}">{{ $value->title }}</a>
                            </h3>
                        </header>
                        <p class="related-entry-snippet">{{ $value->subtitle }}</p>

                        <footer>
                            <p class="related-entry-read"><a href="{{ route('news.view').'/'.$value->id }}">เพิ่มเติม</a></p>
                        </footer>

                    </div>
                    <!-- /.related-entry-content -->
                </article>
            @endforeach
            <!-- /.elated-entry -->
            <a href="{{ route('news.category') }}/2" class="inf-more-but" style="display: inline-block;">More Posts</a>
        </aside>

        <h3 class="side-list-title mg-30">กีฬา</h3>
        <aside class="related-entries">

            @foreach($sport as $value)
                <article class="related-entry cf">
                    <div class="related-entry-thumb">
                        <a href="{{ route('news.view').'/'.$value->id }}"
                           title="{{ $value->title }}">
                            <img src="{{ $news_image($value->image) }}"
                                 class="related-entry-thumb-image wp-post-image"
                                 alt="{{ $value->subtitle }}"> </a>
                    </div>
                    <!-- /.related-entry-thumb -->

                    <div class="related-entry-content">
                        <header>
                            <h3 class="related-entry-title">
                                <a href="{{ route('news.view').'/'.$value->id }}"
                                   class="related-entry-title-link" title="{{ $value->title }}">{{ $value->title }}</a>
                            </h3>
                        </header>
                        <p class="related-entry-snippet">{{ $value->subtitle }}</p>

                        <footer>
                            <p class="related-entry-read"><a href="{{ route('news.view').'/'.$value->id }}">เพิ่มเติม</a></p>
                        </footer>

                    </div>
                    <!-- /.related-entry-content -->
                </article>
            @endforeach

            <a href="{{ route('news.category') }}/3" class="inf-more-but" style="display: inline-block;">More Posts</a>
        </aside>

    </div>

    <div class="col-md-3">

        @include('_partials.geography')

        @include('_partials.review-right')

        @include('_partials.facebook-page')

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