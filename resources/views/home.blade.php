@extends('layouts.main')
@section('title', 'Siam Planet')
@section('meta')

@stop

@section('source')

@stop

@section('script')
    <script type="text/javascript">
        if (window.location.hash && window.location.hash == '#_=_') {
            window.location.hash = '';
        }

        $(document).on('click', '.pagination button', function () {
            var $this = $(this).find('a').attr('href');
            //alert($(this).find('a').attr('class'));
            if(typeof $this != 'undefined') window.location.href = $this;
        })
    </script>
@stop

@section('first-content')
    <div class="col-md-9">
        <div class="row">

            <div class="container">
                <h1 class="entry-title">-Nainam-</h1>
            </div>

            @foreach($pagination->items() as $item)
                <div class="col-md-6">
                    <div class="blog-card">
                        <div class="photo photo1" style="background: url({{ route('images.q').'?q='.$item['attributes']['image'] }}) center no-repeat;background-size: cover;"></div>
                        <ul class="details">
                            <li class="author"><a href="#">Angel Real Estate Consultancy Co.,Ltd (ARE)</a></li>
                            <li class="phone"><a href="#">กดเพื่อดูเบอร์</a></li>
                            <li class="share">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="description">
                            <h1>{{ $item['attributes']['title'] }}</h1>
                            <h2>{{ $item['attributes']['amount'] }} ฿ / {{ $item['attributes']['sale'] }} / <a href="#">{{ $item['attributes']['type'] }}</a></h2>
                            <h3>{{ $item['attributes']['unit'] }} / 125 ฿ : ตารางเมตร</h3>
                            <p class="summary">{{ $item['attributes']['subtitle'] }}</p>
                            <p class="province">{{ $item['attributes']['province'] }}</p>
                            <div class="card-media-body-supporting-bottom">
                                <!--<span class="card-media-body-supporting-bottom-text subtle">Mezzanine, San Francisco, CA</span>-->
                                <span class="card-media-body-supporting-bottom-text subtle u-float-right">{{ $trans_time($item['attributes']['created_at']) }}</span>
                            </div>
                            <div class="card-media-body-supporting-bottom card-media-body-supporting-bottom-reveal">
                                <span class="card-media-body-supporting-bottom-text subtle">ดู 256,802 ครั้ง</span>
                                <a href="#/"
                                   class="card-media-body-supporting-bottom-text card-favorite-link u-float-right"></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


            {{--<div class="col-md-6">--}}
                {{--<div class="blog-card">--}}
                    {{--<div class="photo photo1"></div>--}}
                    {{--<ul class="details">--}}
                        {{--<li class="author"><a href="#">Angel Real Estate Consultancy Co.,Ltd (ARE)</a></li>--}}
                        {{--<li class="phone"><a href="#">กดเพื่อดูเบอร์</a></li>--}}
                        {{--<li class="share">--}}
                            {{--<ul>--}}
                                {{--<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>--}}
                                {{--<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>--}}
                                {{--<li><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                    {{--<div class="description">--}}
                        {{--<h1>Off-Plan Condo for sale in Bangkok Near Triple Station Transportation</h1>--}}
                        {{--<h2>356,000,000 ฿ / ขาย / <a href="#">คอนโด</a></h2>--}}
                        {{--<h3>34 ไร่ 3 งาน 100 ตารางวา / 125 ฿ : ตารางเมตร</h3>--}}
                        {{--<p class="summary">ขายดาวน์ คอนโดใหม่ บนถนนสาทร-นราธิวาส</p>--}}
                        {{--<p class="province">กรุงเทพ</p>--}}
                        {{--<div class="card-media-body-supporting-bottom">--}}
                            {{--<!--<span class="card-media-body-supporting-bottom-text subtle">Mezzanine, San Francisco, CA</span>-->--}}
                            {{--<span class="card-media-body-supporting-bottom-text subtle u-float-right">1 ชั่วโมง ที่แล้ว</span>--}}
                        {{--</div>--}}
                        {{--<div class="card-media-body-supporting-bottom card-media-body-supporting-bottom-reveal">--}}
                            {{--<span class="card-media-body-supporting-bottom-text subtle">ดู 256,802 ครั้ง</span>--}}
                            {{--<a href="#/"--}}
                               {{--class="card-media-body-supporting-bottom-text card-favorite-link u-float-right"></a>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}



            <div class="pagination__container">
                <div class="pagination__wrapper">
                    <ul class="pagination">

                        @if($pagination->lastPage() > 1)
                            <li><button class="prev" title="previous page"><a href="{{ $pagination->previousPageUrl() }}">&#10094;</a></button></li>
                        @endif

                            @for ($i = ($pagination->currentPage() - $pagination->perPage()); $i < (($pagination->currentPage() + $pagination->perPage())); $i++)

                                @if(($i > 0) && ($i <= $pagination->total()))
                                    @if($i == $pagination->currentPage())
                                        <li>
                                            <button class="active" title="current page - page 9">{{ $pagination->currentPage() }}</button>
                                        </li>
                                    @else
                                        <li>
                                            <button title="page 8"><a href="{{ $pagination->url($i) }}">{{ $i }}</a></button>
                                        </li>
                                    @endif
                                @endif

                            @endfor

                            @if($pagination->currentPage() != $pagination->lastPage())
                                <li><button class="next" title="next page"><a href="{{ $pagination->nextPageUrl() }}">&#10095;</a></button></li>
                            @endif

                        {{--<li><button class="prev" title="previous page">&#10094;</button></li>--}}
                        {{--<li>--}}
                            {{--<button title="first page - page 1">1</button>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<span>...</span>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<button title="page 8">8</button>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<button class="active" title="current page - page 9">9</button>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<button title="page 10">10</button>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<span>...</span>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                            {{--<button title="last page - page 69">69</button>--}}
                        {{--</li>--}}
                        {{--<li><button class="next" title="next page">&#10095;</button></li>--}}
                    </ul>
                </div>
            </div>



        </div>
    </div>
    <div class="col-md-3">

        @include('_partials.geography')

        @include('_partials.news')

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