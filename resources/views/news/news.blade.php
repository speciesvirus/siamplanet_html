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
            margin-top: 3px;
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
                                    <img width="300" height="180"
                                         src="{{ route('images.q').'?q='.$value->image }}"
                                         class="reg-img wp-post-image" alt="">
                                    <div class="feat-info-wrap">
                                        <div class="feat-info-views">
                                            <i class="fa fa-eye fa-2"></i> <span class="feat-info-text">{{ $value->view }}</span>
                                        </div><!--feat-info-views-->
                                    </div><!--feat-info-wrap-->
                                </div><!--row-widget-img-->
                                <div class="row-widget-text left relative">
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

        <div class="side-panel bs-docs-sidebar">
            <h3 class="side-list-title">Featured News</h3>

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
                <h3 class="side-list-title">Review</h3>
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