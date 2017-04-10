<div class="sidebar-widget">

    <aside id="new_entries-2" class="widget widget_new_entries">
        <h3 class="side-list-title">News</h3>
        <ul class="new-entrys">

            @foreach($navigator_news as $value)
                <li class="new-entry">
                    <div class="new-entry-thumb">
                        <a href="{{ route('news.view').'/'.$value->id }}" class="new-entry-image"
                           title="{{ $value->title }}"><img
                                    src="{{ $news_image($value->image) }}"
                                    class="attachment-thumb100 size-thumb100 wp-post-image"
                                    alt="{{ $value->title }}"
                                    sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"></a>
                    </div><!-- /.new-entry-thumb -->

                    <div class="new-entry-content">
                        <a href="{{ route('news.view').'/'.$value->id }}" class="new-entry-title"
                           title="{{ $value->title }}">{{ $value->title }}</a>
                    </div><!-- /.new-entry-content -->

                </li><!-- /.new-entry -->
            @endforeach


            {{--<li class="new-entry">--}}
                {{--<div class="new-entry-thumb">--}}
                    {{--<a href="https://wp-simplicity.com/simplicity2-4-1/" class="new-entry-image"--}}
                       {{--title="Simplicity2.4.1公開。AMPページにアイコン追加、外部URLの画像でもAMPエラーが出ないように仕様変更。"><img--}}
                                {{--src="https://wp-simplicity.com/wp-content/uploads/2016/12/TEX1SW9IZW-100x100.jpg"--}}
                                {{--class="attachment-thumb100 size-thumb100 wp-post-image"--}}
                                {{--alt="Simplicity2.4.1公開。AMPページにアイコン追加、外部URLの画像でもAMPエラーが出ないように仕様変更。"--}}
                                {{--srcset="https://wp-simplicity.com/wp-content/uploads/2016/12/TEX1SW9IZW-100x100.jpg 100w, https://wp-simplicity.com/wp-content/uploads/2016/12/TEX1SW9IZW-300x300.jpg 300w, https://wp-simplicity.com/wp-content/uploads/2016/12/TEX1SW9IZW-150x150.jpg 150w"--}}
                                {{--sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"></a>--}}
                {{--</div>--}}

                {{--<div class="new-entry-content">--}}
                    {{--<a href="https://wp-simplicity.com/simplicity2-4-1/" class="new-entry-title"--}}
                       {{--title="Simplicity2.4.1公開。AMPページにアイコン追加、外部URLの画像でもAMPエラーが出ないように仕様変更。">Simplicity2.4.1公開。AMPページにアイコン追加、外部URLの画像でもAMPエラーが出ないように仕様変更。</a>--}}
                {{--</div>--}}
            {{--</li>--}}

        </ul>
        <div class="clear"></div>
    </aside>

</div>