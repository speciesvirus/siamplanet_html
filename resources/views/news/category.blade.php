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
    <script>

    </script>
    <script type="text/javascript">

        var $next = 1,
            $last = '{{ $category_news->lastPage() }}';
        
        $('.inf-more-but').click(function(e){

            var $this = $(this),
                $list = $('.category-list');
            $next = ($list.children().last().data('page') + 1);

            _btnLoading($this, true);

            $.ajax({
                url     : "{{ route('news.tag.autoload') }}",
                type    : 'post',
                async: false,
                data : {
                    tag : '{{ $category }}',
                    page : $next
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success : function ( json )
                {
                    $list.append(json);

                    if($next == $last){
                        $this.remove();
                    }

                },
                error   : function ( jqXhr, json, errorThrown )
                {
                    var errors = jqXhr.responseJSON;
                    console.log(errors);
                }
            });

            _btnLoading($this, false);
        });

    </script>

@stop

@section('first-content')

    <div class="col-md-9">
            <h1 class="entry-title">{{ strlen($category) != mb_strlen($category, 'utf-8') ? $category : ucwords(strtolower($category)) }}</h1>

        <div id="mvp_tagrow_widget-2" class="home-widget left relative mvp_tagrow_widget">
            <div class="row-widget-wrap left relative">
                <ul class="row-widget-list category-list">

                    @foreach($category_news as $value)
                        <li data-page="{{ $category_news->currentPage() }}">
                            <a href="{{ route('news.view').'/'.$value['attributes']['id'] }}" rel="bookmark">
                                <div class="row-widget-img left relative">
                                    <img width="300" height="180" src="{{ route('images.q').'?q='.$value['attributes']['image'] }}" class="reg-img wp-post-image" alt="">
                                    <div class="feat-info-wrap">
                                        <div class="feat-info-views">
                                            <i class="fa fa-eye fa-2"></i> <span class="feat-info-text">{{ $value['attributes']['view'] }}</span>
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
                </ul>
            </div><!--row-widget-wrap-->
        </div>

        @if($category_news->currentPage() != $category_news->lastPage())
            <a href="javascript://" class="inf-more-but" style="display: inline-block;">More Posts</a>
        @endif

        
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
                    @php
                        $t_news = request()->segment(count(request()->segments()) - 1) == 'category' ?
                        $navigator_news_random(null, collect(request()->segments())->last(), null) :
                        $navigator_news_random(null, null, collect(request()->segments())->last());
                    @endphp
                    @foreach($t_news as $value)
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

                    {{--<li>--}}
                        {{--<a href="http://www.mvpthemes.com/flexmag/yes-there-are-now-jeans-that-can-charge-your-phone/" rel="bookmark">--}}
                            {{--<div class="row-widget-img left relative">--}}
                                {{--<img width="300" height="180" src="http://www.mvpthemes.com/flexmag/wp-content/uploads/2015/08/woman-jeans-300x180.jpg" class="reg-img wp-post-image" alt="">--}}
                                {{--<div class="feat-info-wrap">--}}
                                    {{--<div class="feat-info-views">--}}
                                        {{--<i class="fa fa-eye fa-2"></i> <span class="feat-info-text">33.0K</span>--}}
                                    {{--</div><!--feat-info-views-->--}}
                                    {{--<div class="feat-info-comm">--}}
                                        {{--<i class="fa fa-comment"></i> <span class="feat-info-text">2</span>--}}
                                    {{--</div><!--feat-info-comm-->--}}
                                {{--</div><!--feat-info-wrap-->--}}
                            {{--</div><!--row-widget-img-->--}}
                            {{--<div class="row-widget-text left relative">--}}
                                {{--<span class="side-list-cat">Fashion</span>--}}
                                {{--<p>Yes, there are now jeans that can charge your phone</p>--}}
                            {{--</div><!--row-widget-text-->--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="http://www.mvpthemes.com/flexmag/5-straight-outta-compton-cameos-that-will-make-you-do-a-double-take/" rel="bookmark">--}}
                            {{--<div class="row-widget-img left relative">--}}
                                {{--<img width="300" height="180" src="http://www.mvpthemes.com/flexmag/wp-content/uploads/2015/08/music-dj-300x180.jpg" class="reg-img wp-post-image" alt="">--}}
                                {{--<div class="feat-info-wrap">--}}
                                    {{--<div class="feat-info-views">--}}
                                        {{--<i class="fa fa-eye fa-2"></i> <span class="feat-info-text">50.7K</span>--}}
                                    {{--</div><!--feat-info-views-->--}}
                                    {{--<div class="feat-info-comm">--}}
                                        {{--<i class="fa fa-comment"></i> <span class="feat-info-text">2</span>--}}
                                    {{--</div><!--feat-info-comm-->--}}
                                {{--</div><!--feat-info-wrap-->--}}
                            {{--</div><!--row-widget-img-->--}}
                            {{--<div class="row-widget-text left relative">--}}
                                {{--<span class="side-list-cat">Entertainment</span>--}}
                                {{--<p>5 ’Straight Outta Compton’ cameos that will make you do a double take</p>--}}
                            {{--</div><!--row-widget-text-->--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="http://www.mvpthemes.com/flexmag/googles-alphabet-rollout-could-still-be-a-qwikster-like-farce/" rel="bookmark">--}}
                            {{--<div class="row-widget-img left relative">--}}
                                {{--<img width="300" height="180" src="http://www.mvpthemes.com/flexmag/wp-content/uploads/2015/08/interview-300x180.jpg" class="reg-img wp-post-image" alt="">--}}
                                {{--<div class="feat-info-wrap">--}}
                                    {{--<div class="feat-info-views">--}}
                                        {{--<i class="fa fa-eye fa-2"></i> <span class="feat-info-text">26.7K</span>--}}
                                    {{--</div><!--feat-info-views-->--}}
                                    {{--<div class="feat-info-comm">--}}
                                        {{--<i class="fa fa-comment"></i> <span class="feat-info-text">7</span>--}}
                                    {{--</div><!--feat-info-comm-->--}}
                                {{--</div><!--feat-info-wrap-->--}}
                            {{--</div><!--row-widget-img-->--}}
                            {{--<div class="row-widget-text left relative">--}}
                                {{--<span class="side-list-cat">Business</span>--}}
                                {{--<p>Google’s Alphabet rollout could still be a Qwikster-like farce</p>--}}
                            {{--</div><!--row-widget-text-->--}}
                        {{--</a>--}}
                    {{--</li>--}}
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