@extends('layouts.main')
@section('title', 'Siam Planet')
@section('meta')

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
            margin-top: 2px;
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
                                <img src="{{ route('images.q').'?q='.$value->image }}"
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
        <a href="{{ route('news.category') }}/1" class="inf-more-but" style="display: inline-block;">More Posts</a>

        <h3 class="side-list-title mg-30">สังคม</h3>
        <aside class="related-entries">

            @foreach($social as $value)
                <article class="related-entry cf">
                    <div class="related-entry-thumb">
                        <a href="{{ route('news.view').'/'.$value->id }}"
                           title="{{ $value->title }}">
                            <img src="{{ route('images.q').'?q='.$value->image }}"
                                 class="related-entry-thumb-image wp-post-image"
                                 alt="{{ $value->subtitle }}"
                                 sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"> </a>
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
            <a href="{{ route('news.category') }}/4" class="inf-more-but" style="display: inline-block;">More Posts</a>
        </aside>

        <h3 class="side-list-title mg-20">เทคโนโลยี</h3>
        <aside class="related-entries">

            @foreach($technology as $value)
                <article class="related-entry cf">
                    <div class="related-entry-thumb">
                        <a href="{{ route('news.view').'/'.$value->id }}"
                           title="{{ $value->title }}">
                            <img src="{{ route('images.q').'?q='.$value->image }}"
                                 class="related-entry-thumb-image wp-post-image"
                                 alt="{{ $value->subtitle }}"
                                 sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"> </a>
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
                            <img src="{{ route('images.q').'?q='.$value->image }}"
                                 class="related-entry-thumb-image wp-post-image"
                                 alt="{{ $value->subtitle }}"
                                 sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"> </a>
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