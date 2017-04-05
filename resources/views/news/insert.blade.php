<!DOCTYPE html>

<html class="no-js" lang="en"><!--<![endif]-->

<head>
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine (even in intranet) -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Important stuff for SEO, don't neglect. (And don't dupicate values across your site!) -->
    <title></title>

    <link rel="stylesheet" href="{{ asset('resources/assets/bootstrap/dist/css/bootstrap.min.css', env('HTTPS')) }}" />
    <link rel="stylesheet" href="{{ asset('resources/assets/font-awesome/css/font-awesome.min.css', env('HTTPS')) }}" />
    <link rel="stylesheet" href="{{ asset('resources/assets/css/reset.css', env('HTTPS')) }}" />
    <link rel="stylesheet" href="{{ asset('resources/assets/css/style.css', env('HTTPS')) }}" />
    <link rel="stylesheet" href="{{ asset('resources/assets/select2/dist/css/select2.min.css', env('HTTPS')) }}" />
    <link rel="stylesheet" href="{{ asset('resources/assets/css/main.css', env('HTTPS')) }}" />

    <!-- Lea Verou's prefixfree (http://leaverou.github.io/prefixfree/), lets you use un-prefixed properties in your CSS files -->
{{--<script src="{{ asset('resources/assets/prefixfree/prefixfree.min.js', env('HTTPS')) }}"></script>--}}

<!-- This is a minimized, base version of Modernizr. (http://modernizr.com)
          You will need to create new builds to get the detects you need. -->
    <script src="{{ asset('resources/assets/js/components/modernizr-3.2.0.base.js', env('HTTPS')) }}"></script>

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

                        <textarea id="content" name="content">
                                  <p style="text-align: center;">
                                    <img title="TinyMCE Logo" src="//www.tinymce.com/images/glyph-tinymce@2x.png"
                                         alt="TinyMCE Logo" width="110" height="97"/>
                                  </p>

                                  <h1 style="text-align: center;">Welcome to the TinyMCE editor demo!</h1>

                                  <p>
                                    Please try out the features provided in this basic example.<br>
                                    Note that any <strong>MoxieManager</strong> file and image management functionality in this example is part of our commercial offering – the demo is to show the integration.
                                  </p>

                                  <h2>Got questions or need help?</h2>

                                  <ul>
                                    <li>Our <a href="http://www.tinymce.com/docs/">documentation</a> is a great resource for learning how to configure TinyMCE.</li>
                                    <li>Have a specific question? Visit the <a href="http://community.tinymce.com/forum/"
                                                                               target="_blank">Community Forum</a>.</li>
                                    <li>We also offer enterprise grade support as part of <a href="www.tinymce.com/pricing">TinyMCE Enterprise</a>.</li>
                                  </ul>

                                  <h2>A simple table to play with</h2>

                                  <table style="text-align: center;">
                                    <thead>
                                      <tr>
                                        <th>Product</th>
                                        <th>Cost</th>
                                        <th>Really?</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>TinyMCE</td>
                                        <td>Free</td>
                                        <td>YES!</td>
                                      </tr>
                                      <tr>
                                        <td>Plupload</td>
                                        <td>Free</td>
                                        <td>YES!</td>
                                      </tr>
                                    </tbody>
                                  </table>

                                  <h2>Found a bug?</h2>

                                  <p>
                                    If you think you have found a bug please create an issue on the <a
                                              href="https://github.com/tinymce/tinymce/issues">GitHub repo</a> to report it to the developers.
                                  </p>

                                  <h2>Finally ...</h2>

                                  <p>
                                    Don't forget to check out our other product <a href="http://www.plupload.com"
                                                                                   target="_blank">Plupload</a>, your ultimate upload solution featuring HTML5 upload support.
                                  </p>
                                  <p>
                                    Thanks for supporting TinyMCE! We hope it helps you and your users create great content.<br>All the best from the TinyMCE team.
                                  </p>
                                </textarea>

                    </div>
                </div>


                <div class="form-group">
                    <label class="col-xs-6 col-sm-3 control-label required" >tag</label>
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
<script type="text/javascript">
    tinymce.init({
        selector: '#content',
        body_class: 'listing-details-text',
        height: 500,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code textcolor colorpicker'
        ],
        toolbar_items_size: 'small',
        toolbar: 'newdocument styleselect fontsizeselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify |  forecolor backcolor | table bullist numlist outdent indent | link image media  | code preview ',
        content_css: [
            '{{ asset('resources/assets/bootstrap/dist/css/bootstrap.min.css', env('HTTPS')) }}',
            '{{ asset('resources/assets/css/reset.css', env('HTTPS')) }}',
            '{{ asset('resources/assets/css/style.css', env('HTTPS')) }}',
            '{{ asset('resources/assets/css/post.css', env('HTTPS')) }}'
        ]
    });
</script>




</body>
</html>
