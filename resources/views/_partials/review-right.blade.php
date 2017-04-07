<div class="sidebar-widget">

    <aside id="new_entries-2" class="widget widget_new_entries">
        <h3 class="side-list-title">Review</h3>
        <ul class="new-entrys">

            @foreach($navigator_review as $value)
                <li class="new-entry">
                    <div class="new-entry-thumb">
                        <a href="{{ route('product').'/'.$value->id }}" class="new-entry-image"
                           title="{{ $value->title }}"><img
                                    src="{{ route('images.q').'?q='.$value->image }}"
                                    class="attachment-thumb100 size-thumb100 wp-post-image"
                                    alt="{{ $value->title }}"
                                    sizes="(max-width: 100px) 100vw, 100px" height="100" width="100"></a>
                    </div><!-- /.new-entry-thumb -->

                    <div class="new-entry-content">
                        <a href="{{ route('product').'/'.$value->id }}" class="new-entry-title"
                           title="{{ $value->title }}">{{ $value->title }}</a>
                    </div><!-- /.new-entry-content -->

                </li><!-- /.new-entry -->
            @endforeach

        </ul>
        <div class="clear"></div>
    </aside>

</div>