<!DOCTYPE html>

<html class="no-js" lang="en"><!--<![endif]-->

<head>
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine (even in intranet) -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Important stuff for SEO, don't neglect. (And don't dupicate values across your site!) -->
    <title></title>

    <link rel="stylesheet" href="{{ asset('resources/assets/bootstrap/dist/css/bootstrap.min.css', env('HTTPS')) }}"/>
    <link rel="stylesheet" href="{{ asset('resources/assets/font-awesome/css/font-awesome.min.css', env('HTTPS')) }}"/>
    <link rel="stylesheet" href="{{ asset('resources/assets/css/reset.css', env('HTTPS')) }}"/>
    <link rel="stylesheet" href="{{ asset('resources/assets/css/style.css', env('HTTPS')) }}"/>
    <link rel="stylesheet" href="{{ asset('resources/assets/select2/dist/css/select2.min.css', env('HTTPS')) }}"/>
    <link rel="stylesheet" href="{{ asset('resources/assets/css/main.css', env('HTTPS')) }}"/>

    <!-- Lea Verou's prefixfree (http://leaverou.github.io/prefixfree/), lets you use un-prefixed properties in your CSS files -->
{{--<script src="{{ asset('resources/assets/prefixfree/prefixfree.min.js', env('HTTPS')) }}"></script>--}}

<!-- This is a minimized, base version of Modernizr. (http://modernizr.com)
          You will need to create new builds to get the detects you need. -->
    <script src="{{ asset('resources/assets/js/components/modernizr-3.2.0.base.js', env('HTTPS')) }}"></script>

    <link rel="stylesheet" href="/vendor/laravel-filemanager/css/cropper.min.css">
    <link rel="stylesheet" href="/vendor/laravel-filemanager/css/lfm.css">
</head>

<body>


<div class="wrapper">

    <div class="page">

        <div class="section">
            {!! Form::open(array('url'=>route('news.insert.post'),'method'=>'POST', 'files'=>true, 'class'=>'post-form', 'id'=>'post-form')) !!}
            {{--<form name="post-form" class="post-form" method="post" action="{{ route('product.post') }}" enctype="multipart/form-data">--}}
            {{ csrf_field() }}
            <div class="form-horizontal">
                <h3 class="side-list-title">ข้อมูลหลัก</h3>

                <!-- Text input -->
                <div class="form-group">
                    <label class="col-xs-6 col-sm-3 control-label required">หัวข้อ</label>
                    <div class="col-md-5">
                        <input name="topic" class="form-control input-md" type="text" placeholder="topic">
                    </div>

                </div>

                <!-- Text input -->
                <div class="form-group">
                    <label class="col-xs-6 col-sm-3 control-label required">อธิบายหัวข้อ</label>
                    <div class="col-md-5">
                        <input name="topic_des" class="form-control input-md" type="text">
                    </div>
                </div>

                <!-- Text input -->
                <div class="form-group">
                    <label class="col-xs-6 col-sm-3 control-label">ภาพ</label>
                    <div class="col-md-5">
                        <input name="image" class="form-control input-md" type="file">
                    </div>
                </div>

                <!-- Text input -->
                <div class="form-group">
                    <label class="col-xs-6 col-sm-3 control-label">ประเภท</label>
                    <div class="col-md-5">
                        {{ Form::select('category', $category, "", ['class' => 'form-control input-md'])  }}
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-xs-6 col-sm-3 control-label required">ช้อความ</label>
                    <div class="col-md-5">
                        <!--<textarea id="edit" name="content"></textarea>-->

                        <textarea id="content" name="content"></textarea>

                    </div>
                </div>


                <div class="form-group">
                    <label class="col-xs-6 col-sm-3 control-label required">tag</label>
                    <div class="col-md-5">
                        <input name="tag" class="form-control input-md" type="text">
                    </div>
                </div>

                <div class="form-horizontal">
                    <h3 class="side-list-title"></h3>
                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-xs-6 col-sm-3 control-label" for="status"></label>
                        <div class="col-md-5">
                            <input type="submit" class="btn btn-primary" value="ลงประกาศ">
                        </div>
                    </div>


                </div>

            </div>

            {{--</form>--}}
            {!! Form::close() !!}
        </div>

    </div>

</div>

<!-- Grab Google CDN's jQuery. fall back to local if necessary -->
<script src="{{ asset('resources/assets/js/components/jquery-1.11.3.min.js', env('HTTPS')) }}"></script>
<script src="{{ asset('resources/assets/tinymce/tinymce.jquery.min.js', env('HTTPS')) }}"></script>
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script type="text/javascript">


    var editor_config = {
        path_absolute: "/",
        selector: "#content",
        body_class: 'listing-details-text',
        height: 500,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code textcolor colorpicker'
        ],
        toolbar_items_size: 'small',
        toolbar: "newdocument styleselect fontsizeselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify |  forecolor backcolor | table bullist numlist outdent indent | link image media  | code preview ",
        relative_urls: false,
        file_browser_callback: function (field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no"
            });
        },
        content_css: [
            '{{ asset('resources/assets/bootstrap/dist/css/bootstrap.min.css', env('HTTPS')) }}',
            '{{ asset('resources/assets/css/reset.css', env('HTTPS')) }}',
            '{{ asset('resources/assets/css/style.css', env('HTTPS')) }}',
            '{{ asset('resources/assets/css/post.css', env('HTTPS')) }}'
        ],
        extended_valid_elements: "iframe[class|src|frameborder=0|alt|title|width|height|align|name]"
    };

    tinymce.init(editor_config);
</script>


</body>
</html>
