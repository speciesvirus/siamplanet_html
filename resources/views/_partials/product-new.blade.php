<div class="list-container">
    <h2>ประกาศล่าสุด</h2>
    <ul class="list">

        @foreach($navigator_product as $value)
            <li>
                <span class="list-badge"><a href="#">{{ $product_type($value->product_type_id) }}</a></span>
                <span class="list-article-summary">
                <h2 class="list-title"><a href="{{ route('product').'/'.$value->id }}">{{ $value->title }}</a></h2>
                <span class="list-author">{{ $value->subtitle }}</span>
                </span>
            </li>
        @endforeach
        {{--<li>--}}
            {{--<span class="list-badge"><a href="#">คอนโด</a></span>--}}
            {{--<span class="list-article-summary">--}}
                {{--<h2 class="list-title">An example article</h2>--}}
                {{--<span class="list-author">Chris Macrae</span>--}}
            {{--</span>--}}
        {{--</li>--}}

    </ul>
</div>