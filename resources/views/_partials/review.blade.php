<h3 class="side-list-title">Review</h3>
<aside id="related-entries">

    @foreach($navigator_review as $value)
        <article class="related-entry cf">
            <div class="related-entry-thumb">
                <a href="{{ route('product').'/'.$value->id }}"
                   title="{{ $value->title }}">
                    <img src="{{ route('images.q').'?q='.$value->image }}"
                         class="related-entry-thumb-image wp-post-image"
                         alt="{{ $value->title }}"
                         sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"> </a>
            </div>

            <div class="related-entry-content">
                <header>
                    <h3 class="related-entry-title">
                        <a href="{{ route('product').'/'.$value->id }}"
                           class="related-entry-title-link" title="{{ $value->title }}">{{ $value->title }}</a>
                    </h3>
                </header>
                <p class="related-entry-snippet">{{ $value->subtitle }}</p>

                <footer>
                    <p class="related-entry-read"><a
                                href="{{ route('product').'/'.$value->id }}">เพิ่มเติม</a></p>
                </footer>

            </div>
        </article>
    @endforeach

    {{--<article class="related-entry cf">--}}
        {{--<div class="related-entry-thumb">--}}
            {{--<a href="//wp-simplicity.com/simplicity-and-wordpress-popular-posts/"--}}
               {{--title="SimplicityとWordPress Popular Postsを関連づける方法">--}}
                {{--<img src="//wp-simplicity.com/wp-content/uploads/2014/12/rope-494423_12801-100x100.jpg"--}}
                     {{--class="related-entry-thumb-image wp-post-image"--}}
                     {{--alt="SimplicityとWordPress Popular Postsを関連づける方法"--}}
                     {{--srcset="//wp-simplicity.com/wp-content/uploads/2014/12/rope-494423_12801-300x300.jpg 300w, //wp-simplicity.com/wp-content/uploads/2014/12/rope-494423_12801-100x100.jpg 100w, //wp-simplicity.com/wp-content/uploads/2014/12/rope-494423_12801-150x150.jpg 150w"--}}
                     {{--sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"> </a>--}}
        {{--</div>--}}


        {{--<div class="related-entry-content">--}}
            {{--<header>--}}
                {{--<h3 class="related-entry-title">--}}
                    {{--<a href="//wp-simplicity.com/simplicity-and-wordpress-popular-posts/"--}}
                       {{--class="related-entry-title-link" title="SimplicityとWordPress Popular Postsを関連づける方法">--}}
                        {{--SimplicityとWordPress Popular Postsを関連づける方法 </a></h3>--}}
            {{--</header>--}}
            {{--<p class="related-entry-snippet">--}}
                {{--最近、メールなどでSimplicityとWordPress Popular Postsに関する質問をいくつかいただきました。 内容は、...</p>--}}

            {{--<footer>--}}
                {{--<p class="related-entry-read"><a--}}
                            {{--href="//wp-simplicity.com/simplicity-and-wordpress-popular-posts/">記事を読む</a></p>--}}
            {{--</footer>--}}

        {{--</div>--}}
    {{--</article>--}}




    <br style="clear:both;"></aside>