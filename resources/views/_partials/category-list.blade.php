@foreach($category_news as $value)
    <li data-page="{{ $category_news->currentPage() }}">
        <a href="{{ route('news.view').'/'.$value['attributes']['id'] }}" rel="bookmark">
            <div class="row-widget-img left relative">
                <img width="300" height="180" src="{{ route('images.q').'?q='.$value['attributes']['image'] }}"
                     class="reg-img wp-post-image" alt="">
                <div class="feat-info-wrap">
                    <div class="feat-info-views">
                        <i class="fa fa-eye fa-2"></i>
                        <span class="feat-info-text">{{ $value['attributes']['view'] }}</span>
                    </div><!--feat-info-views-->
                    {{--<div class="feat-info-comm">--}}
                    {{--<i class="fa fa-comment"></i> <span class="feat-info-text">2</span>--}}
                    {{--</div>--}}
                </div><!--feat-info-wrap-->
            </div><!--row-widget-img-->
            <div class="row-widget-text left relative">
                <span class="side-list-cat">{{ $category_name($value->category_id) }}</span>
                <p>{{ $value['attributes']['title'] }}</p>
            </div><!--row-widget-text-->
        </a>
    </li>
@endforeach