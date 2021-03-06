@extends('layouts.main')
@section('title', 'Nainam - ประกาศฟรี!')
@section('meta')
    <meta name="keywords" content="คอนโด บ้านเดี่ยว ทาวน์เฮ้าส์ ขายบ้าน บ้านมือสอง บ้านใหม่ โครงการใหม่ คอนโดใหม่ ข่าว">
    <meta name="description" content="nainam.com - รวบรวม คอนโด บ้านเดี่ยว ทาวน์เฮ้าส์ ขายบ้าน บ้านมือสอง ครบถ้วนและอัพเดทที่สุด พร้อมแผนที่ทุกประกาศ สไตล์คุณ">
    <meta property="article:author" content="nainam" />
    <!-- Twitter: see https://dev.twitter.com/docs/cards/types/summary-card for details -->

    <meta name="twitter:creator" content="@nainam">
    <meta name="twitter:title" content="Nainam">
    <meta name="twitter:description" content="Nainam | รวบรวม ที่ดิน บ้าน คอนโด ทาวน์เฮ้าส์ อื่นๆ ครบถ้วน ทุกทำเลท ออกแบบได้สไตล์คุณ">

    <!-- Facebook (and some others) use the Open Graph protocol: see http://ogp.me/ for details -->
    <meta property="og:title" content="nainam"/>
    <meta property="og:description" content="Nainam | รวบรวม ที่ดิน บ้าน คอนโด ทาวน์เฮ้าส์ อื่นๆ ครบถ้วน ทุกทำเลท ออกแบบได้สไตล์คุณ"/>
    <meta property="og:image" content="{{ asset('resources/assets/images/nainam_logo_top_blue_300.png', env('HTTPS')) }}"/>
@stop

@section('source')

@stop

@section('script')
    <!--<script src="{{ asset('/resources/assets/slick-carousel/slick/slick.min.js', env('HTTPS')) }}"></script>-->
    <script src="{{ asset('resources/assets/jquery-ui/jquery-ui.min.js', env('HTTPS')) }}"></script>
    <link rel="stylesheet" href="{{ asset('resources/assets/css/post.css', env('HTTPS')) }}"/>

    <script src="{{ asset('resources/assets/bootstrap/dist/js/bootstrap.js', env('HTTPS')) }}"></script>

    <script src="{{ asset('resources/assets/tinymce/tinymce.jquery.min.js', env('HTTPS')) }}"></script>

    <script src="{{ asset('resources/assets/select2/dist/js/select2.full.js', env('HTTPS')) }}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDB3IoUnmudz6RdeSALRXdrE7XjJSPZVhs&libraries=places"></script>
    <script type="text/javascript">
        //$('#edit').froalaEditor();
        tinymce.init({
            selector: '#content',
            body_class: 'listing-details-text',
            height: 300,
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
        //        $('div#froala-editor').froalaEditor('html.get');

        // File Upload
        //
        var arrImage = [],
            arrFacility = [],
            arrArea = [],
            arrFile = [],
            arrGeo = [],
            arrAround = [];


        function ekUpload() {
            function Init() {

                console.log("Upload Initialised");

                var fileSelect = document.getElementById('file-upload'),
                    fileDrag = document.getElementById('file-drag'),
                    submitButton = document.getElementById('submit-button');

                fileSelect.addEventListener('change', fileSelectHandler, false);

                // Is XHR2 available?
                var xhr = new XMLHttpRequest();
                if (xhr.upload) {
                    // File Drop
                    fileDrag.addEventListener('dragover', fileDragHover, false);
                    fileDrag.addEventListener('dragleave', fileDragHover, false);
                    fileDrag.addEventListener('drop', fileSelectHandler, false);
                }
            }

            function fileDragHover(e) {
                var fileDrag = document.getElementById('file-drag');

                e.stopPropagation();
                e.preventDefault();

                fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
            }

            function fileSelectHandler(e) {
                // Fetch FileList object
                var files = e.target.files || e.dataTransfer.files;

                // Cancel event and hover styling
                fileDragHover(e);

                // Process all File objects
                for (var i = 0, f; f = files[i]; i++) {
                    if(uploadFile(f)) parseFile(f);
                }
            }

            // Output
            // function output(msg) {
            //     // Response
            //     var m = document.getElementById('messages');
            //     m.innerHTML = msg;
            // }

            function parseFile(file) {

                //console.log(file.name);
                // output(
                //     '<strong>' + encodeURI(file.name) + '</strong>'
                // );

                // var fileType = file.type;
                // console.log(fileType);
                var imageName = file.name;

                var isGood = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageName);
                if (isGood) {
                    var srcImage = URL.createObjectURL(file);
                    // scrImage = encodeURI(file.name);
                    // document.getElementById('start').classList.add("hidden");
                    // document.getElementById('response').classList.remove("hidden");
                    // document.getElementById('notimage').classList.add("hidden");
                    // Thumbnail Preview
                    // document.getElementById('file-image').classList.remove("hidden");
                    // document.getElementById('file-image').src = srcImage;
                    //$('#group_items_panel').append('<div class="item_box"><a href="#delete" class="delete"></a><img src="' + srcImage + '"></div>');
                    $('.item_box').append('<li><div class="image_box"><a href="#delete" class="delete" data-name="'+ file.name +'"></a><img class="image photo" src="' + srcImage + '"></div></li>');

                    //var f = $('#file-upload').val();
                    arrImage.push(file);

                    //$this.after($clone).appendTo("#post-form");
                    //console.log("bb : ", document.getElementById('field2'));
                    // console.log("get : ", arrImage);
                    // var files = document.getElementById("file-upload").files;
                    // for (var i = 0; i < files.length; i++)
                    // {
                    //     document.getElementById('image-files').files[i] = file;
                    //     console.log("set : ", files[i]);
                    //     console.log("get : ", document.getElementById('image-files').files[i]);
                    // }
                    // var r = document.getElementById("image-files").files;
                    // for (var i = 0; i < r.length; i++)
                    // {
                    //     console.log("get : ", r[i]);
                    // }
                    //var file = document.getElementById('myFile').files[0];
                    //$("#image-files").val(arrImage);
                    //console.log(f);
                }
                else {
                    // document.getElementById('file-image').classList.add("hidden");
                    // document.getElementById('notimage').classList.remove("hidden");
                    // document.getElementById('start').classList.remove("hidden");
                    // document.getElementById('response').classList.add("hidden");
                    alert('ไฟล์ภาพไม่ถูกต้อง');
                    //document.getElementById("file-upload-form").reset();
                }
            }

            // function setProgressMaxValue(e) {
            //     var pBar = document.getElementById('file-progress');

            //     if (e.lengthComputable) {
            //         pBar.max = e.total;
            //     }
            // }

            // function updateFileProgress(e) {
            //     var pBar = document.getElementById('file-progress');

            //     if (e.lengthComputable) {
            //         pBar.value = e.loaded;
            //     }
            // }

            function uploadFile(file) {
                var size = false;
                var xhr = new XMLHttpRequest(),
                    // pBar = document.getElementById('file-progress'),
                    fileSizeLimit = 1; // In MB
                if (xhr.upload) {
                    // Check if file is less than x MB
                    if (file.size <= fileSizeLimit * 1024 * 1024) {
                        size = true;
                        // Progress bar
                        // pBar.style.display = 'inline';
                        // xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
                        // xhr.upload.addEventListener('progress', updateFileProgress, false);

                        // File received / failed
                        xhr.onreadystatechange = function (e) {
                            console.log(xhr.readyState);
                            if (xhr.readyState == 4) {

                                // Everything is good!

                                // progress.className = (xhr.status == 200 ? "success" : "failure");
                                // document.location.reload(true);
                            }
                        };

                        // Start upload
                        // xhr.open('POST', document.getElementById('file-upload-form').action, true);
                        // xhr.setRequestHeader('X-File-Name', file.name);
                        // xhr.setRequestHeader('X-File-Size', file.size);
                        // xhr.setRequestHeader('Content-Type', 'multipart/form-data');
                        // xhr.send(file);
                    } else {
                        alert('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
                        //output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
                    }
                }

                return size;
            }

            // Check for the various File API support.
            if (window.File && window.FileList && window.FileReader) {
                Init();
            } else {
                document.getElementById('file-drag').style.display = 'none';
            }
        }
        ekUpload();
        $("#group_items_panel").sortable();
        $("#group_items_panel").disableSelection();

        // $(document).on('click','.item_box', function(){

        //   var f = $(this).find('img').attr('src');
        //   $.each(arrImage, function( index, value ) {
        //       if(f === value){
        //          alert( index + ": " + value );
        //       }

        //     });
        // });
        $(document).on('click', '.item_box a.delete', function () {
            var $this = $(this),
                r = confirm("Press a button!");

            if (r == true) {
                var f = $this.data('name');
                $this.parents('li').remove();
                $.each(arrImage, function (index, value) {
                    if (f == value.name) {
                        arrImage.splice(index, 1);
                    }
                });
            }
        });





        var $eventLog = $(".js-event-log");
        var $eventSelect = $("#id_label_multiple");

        $eventSelect.select2({
            placeholder: "Select Facilities",
            val: null
        });
        //        $eventSelect.on("select2:open", function (e) { log("select2:open", e); });
        //        $eventSelect.on("select2:close", function (e) { log("select2:close", e); });
        $eventSelect.on("select2:select", function (e) {
            //log("select2:select", e);
            var model = tagFacility("select2:select", e);
//            console.log('sss', model.name);
            var $div = $('.fc-c');

            var $html = '<div class="fc-d" data-fc="'+ model.id +'"><label class="col-xs-12 col-sm-3 l-m-3 control-label">'+ model.name +'</label>'+

                '<div class="col-md-5"><div class="fc-input">'+
                '<input type="file" class="form-control form-input form-style-base">'+
                '<input type="text" class="form-control form-input form-style-fake" placeholder="Choose your File" readonly>'+
                '<span class="glyphicon glyphicon-open input-place"></span>'+
                '</div></div></div>';
            $div.append($html);


        });
        $eventSelect.on("select2:unselect", function (e) {
            //log("select2:unselect", e);
            var model = tagFacility("select2:select", e);
            $(".fc-d").each(function() {
                var $this = $(this);
                if($this.data('fc') == model.id){
                    $this.remove();
                }
            });

        });

        $eventSelect.on("change", function (e) { log("change"); });

        function log (name, evt) {
            if (!evt) {
                var args = "{}";
            } else {
                var args = JSON.stringify(evt.params, function (key, value) {
                    if (value && value.nodeName) return "[DOM node]";
                    if (value instanceof $.Event) return "[$.Event]";
                    return value;
                });
            }
            var $e = $("<li>" + name + " -> " + args + "</li>");
            $eventLog.append($e);
            //alert("Selected value is: "+$eventSelect.select2("val"));
//            $e.animate({ opacity: 1 }, 10000, 'linear', function () {
//                $e.animate({ opacity: 0 }, 2000, 'linear', function () {
//                    $e.remove();
//                });
//            });
        }

        function tagFacility(name, evt) {
            var model = new $facility();
            if (!evt) {
                var args = "{}";
            } else {
                var args = JSON.stringify(evt.params, function (key, value) {
                    if (value && value.nodeName) return "[DOM node]";
                    if (value instanceof $.Event) return "[$.Event]";
                    return value;
                });
            }

            var json = JSON.parse(args);
            model.name = json.data.text;
            model.id = json.data.id;

            // if (value && value.nodeName){
            //     console.log('dfsfs', value.data.text);
            //     model.name = value.text;

            //     return model;
            // }

            //return value;
            return model;
        }
        var $facility = function () {
            id : ''
            name : ''
        };
        //form-style-fake
        $(document).on('change', '.form-style-base', function (e) {
            var files = e.target.files || e.dataTransfer.files;
            var $this = $(this);
            $this.next().val('');
            for (var i = 0, f; f = files[i]; i++) {
                $this.next().val(f.name);
            }
        });



        $('#submit').click(function(){
            var $value = $('#id_label_multiple').val().toString(),
                $str = $value.split(",");

            $.each($str, function( index, value ) {
                //alert( index + ": " + value );
                var $fac_file = $('.fc-c').find('div[data-fc="'+ value +'"]').find('input[type=file]').val();
                //   var $fac_file = $('.fc-d').data('fc', value).find('input[type=file]').val();
                alert($fac_file);
            });
            //alert($('#id_label_multiple').val());

        });

        function _inValid($check) {

            if($check){
                alert('โปรดใส่ข้อมูลให้ครบถ้วน.');
                _loading(false);
            }

            return $check;
        }

        var form = $("#post-form");

        form.submit(function (e) {
            e.preventDefault();

            _loading(true);
            arrFacility = [];
            $('.form-group').removeClass('has-error').find('span.help-inline').html('');
            $('#file-upload-form').parents('.form-group').removeClass('has-error').find('span.help-inline').html('');

            $.ajax({
                url     : "{{ route('product.validator') }}",
                type    : form.attr("method"),
                data    : form.serialize(),
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success : function ( json )
                {
                    var $return = false;
                    var $value = $('#id_label_multiple').val();
                    if($value != null){
                        $value = $('#id_label_multiple').val().toString();
                        var $str = $value.split(",");

                        $.each($str, function( index, value ) {
                            var $fac_file = $('.fc-c').find('div[data-fc="'+ value +'"]').find('input[type=file]')[0].files[0];
                            arrFacility.push({id:value, file:$fac_file});
                        });
                    }

                    if(!tinymce.get('content').getContent().trim()){
                        $('#content').parents('.form-group').addClass('has-error').find('span.help-inline').html('The content field is required.');
                        $return = true;
                    }

                    if(arrImage.length < 1){
                        $('#file-upload-form').parents('.form-group').addClass('has-error').find('span.help-inline').html('image is required');
                        $return = true;
                    }

                    if(_inValid($return)) return false;

                    uploadFiles();

                },
                error   : function ( jqXhr, json, errorThrown )
                {
                    var errors = jqXhr.responseJSON;
                    $.each( errors, function( key, value ) {
                        $('input[name="'+key+'"]').parents('.form-group').addClass('has-error').find('span.help-inline').html(value);
                    });

                    if(!tinymce.get('content').getContent().trim()){
                        $('#content').parents('.form-group').addClass('has-error').find('span.help-inline').html('The content field is required.');
                    }

                    if(arrImage.length < 1){
                        $('#file-upload-form').parents('.form-group').addClass('has-error').find('span.help-inline').html('image is required');
                    }

                    return _inValid(true);

                }
            });



        });

        function uploadFiles() {
            arrFile = [];
            var data = new FormData(),
                $key = 0;
            $.each(arrImage, function(key, value)
            {
                data.append($key, value);
                $key++;
                arrFile.push({type:'product', image: ''});
            });
            $.each(arrFacility, function(key, value)
            {
                if(value.file != null){
                    data.append($key, value.file);
                }else{
                    data.append($key, null);
                }
                $key++;
                arrFile.push({type:'facility', id: value.id, image: null});
            });

            $.ajax({
                url     : "{{ route('product.image') }}",
                type    : form.attr("method"),
                data: data,
                cache: false,
                dataType: 'json',
                processData: false, // Don't process the files
                contentType: false, // Set content type to false as jQuery will
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success : function ( json )
                {
                    $.each(json['images'], function(key, value)
                    {
                        arrFile[value['index']].image = value['name'];
                    });
                    uploadData();
                },
                error   : function ( jqXhr, json, errorThrown )
                {
                    console.log(jqXhr);
                    alert("พบข้อบกพร่องของระบบ : 'กรุณาติดต่อทีมงาน'");
                }
            });
        }

        function _inputName($name) {
            return form.find('input[name="'+ $name +'"]').val();
        }
        function _textName($name) {
            return form.find('textarea[name="'+ $name +'"]').val();
        }
        function _selectName($name) {
            return form.find('select[name="'+ $name +'"]').val();
        }

        function uploadData() {

            $.ajax({
                url     : "{{ route('product.post') }}",
                type    : form.attr("method"),
//                data    : form.serialize() + "&arrFile=" + arrFile + "&arrArea=" + arrArea,
                data : {
                    topic : _inputName('topic'),
                    topic_des : _inputName('topic_des'),
                    type : _selectName('type'),
                    sale : _selectName('sale'),
                    size : _inputName('size'),
                    size_unit : _selectName('size_unit'),
                    price : _inputName('price'),
                    project : _inputName('project'),
                    year : _inputName('year'),
                    content : _textName('content'),
                    tag1 : _inputName('tag1'),
                    tag2 : _inputName('tag2'),
                    tag3 : _inputName('tag3'),
                    seller : _inputName('seller'),
                    phone : _inputName('phone'),
                    arrFile : arrFile,
                    arrArea : arrArea,
                    arrGeo : arrGeo,
                    arrAround : arrAround
                },
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success : function ( json )
                {
                    //console.log('result : ', json);
                    if(json.code != 0) alert(json.message);
                    else window.location.href = '{{ route('product') }}'+'/'+json.product;
                },
                error   : function ( jqXhr, json, errorThrown )
                {
                    console.log(jqXhr);
                    alert("พบข้อบกพร่องของระบบ : 'กรุณาติดต่อทีมงาน'");

                }
            });

        }



        var markers = [];
        var uniqueId = 2;
        var infowindow;
        var origin = [];
        var destination = [];

        var allMyMarkers = [];
        var is_internetExplorer11 = navigator.userAgent.toLowerCase().indexOf('trident') > -1;
        var $marker_url = ( is_internetExplorer11 ) ? '{{ asset('resources/assets/images/icon/cd-icon-location.png', env('HTTPS')) }}' : '{{ asset('resources/assets/images/icon/cd-icon-location_1.svg', env('HTTPS')) }}';
        var image = {
            url: $marker_url,
            // This marker is 20 pixels wide by 32 pixels high.
            scaledSize: new google.maps.Size(32, 32)
        };

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 9,
            center: {lat: 14.050942, lng: 100.753091 }
        });

        var geocoder = new google.maps.Geocoder();

        map.addListener('click', function(e) {

            var $point = $('#select-point').val().split(",");
            image.url = '{{ asset('resources/assets/images/icon', env('HTTPS')) }}' +'/'+ $point[1];

            if($point[0] == 1){
                image.scaledSize = new google.maps.Size(42, 42);
                for (var i = 0; i < markers.length; i++) {
                    if (markers[i].id == 1) {
                        //Remove the marker from Map
                        markers[i].setMap(null);

                        //Remove the marker from array.
                        markers.splice(i, 1);

                        for (var j = 0; j < arrArea.length; j++) {
                            if (arrArea[j].id == 1) {
                                arrArea.splice(j, 1);
                            }
                        }

                    }
                }
//                image.url = $marker_url;
                placeMarkerAndPanTo(e.latLng, map, 1, $('input[name="topic"]').val());
                arrArea.push({id : $point[0], key : 1, name : null, distance : 0, lat : e.latLng.lat(), lng : e.latLng.lng()});

                //!* find province name
                arrGeo = [];
                geocoder.geocode({
                    'latLng': e.latLng
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            $.each(results[0]['address_components'], function (index, value) {
                                arrGeo.push(value['long_name']);
                            });
                        }
                    }
                });




                // around area
                infowindow = new google.maps.InfoWindow();
                var service = new google.maps.places.PlacesService(map);
                service.nearbySearch({
                    location: e.latLng,
                    radius: 800,
                    type: ['subway_station']
                }, function(results, status) {
                    if (status === google.maps.places.PlacesServiceStatus.OK) {

                        origin = [];
                        destination = [];
                        arrAround = [];

                        origin.push({lat: e.latLng.lat(), lng: e.latLng.lng()});
                        for (var i = 0; i < results.length; i++) {
                            createMarker(results[i]);
                        }

                        var service = new google.maps.DistanceMatrixService();
                        service.getDistanceMatrix(
                            {
                                origins: origin,
                                destinations: destination,
                                travelMode: 'WALKING'
                            }, callback_around);
                    }
                });


            }else{
//                image.scaledSize = new google.maps.Size(25, 25);
                var origin_area = [];
                var destination_area = [];

                $.each(arrArea, function(key, value){
                    if(value['key'] == 1){
                        origin_area.push({lat: value['lat'], lng:value['lng']});
                    }
                });

                if(origin_area.length < 1){
                    alert('โปรดเลือกสถานที่ตั้งโครงการก่อน!');
                    return;
                }

                destination_area.push({lat: e.latLng.lat(), lng: e.latLng.lng()});

                var retVal = prompt("โปรดกรอกชื่อสถานที่ : ", "ชื่อสถานที่");
                if(retVal != null){

                    var service = new google.maps.DistanceMatrixService();
                    service.getDistanceMatrix(
                        {
                            origins: origin_area,
                            destinations: destination_area,
                            travelMode: 'DRIVING'
                        }, function(response, status) {
                            if (status == 'OK') {
                                for (var i = 0; i < response['rows'].length; i++) {
                                    var el =  response['rows'][i];
                                    for (var j = 0; j < el['elements'].length; j++) {

                                        var $distance = el['elements'][j]['distance']['value'];
//                                        image.url = "http://www.freeiconspng.com/uploads/red-location-icon-map-png-4.png";
                                        placeMarkerAndPanTo(e.latLng, map, uniqueId, retVal);
                                        arrArea.push({id : $point[0], key : uniqueId, name : retVal, distance : $distance, lat : e.latLng.lat(), lng : e.latLng.lng()});
                                        uniqueId++;

                                    }
                                }
                            }
                        });

                }
            }

        });

        function callback_around(response, status) {
            // See Parsing the Results for
            // the basics of a callback function.
            if (status == 'OK') {
                for (var i = 0; i < response['rows'].length; i++) {
                    var el =  response['rows'][i];
                    for (var j = 0; j < el['elements'].length; j++) {
                        arrAround[j].distance = el['elements'][j]['distance']['value'];
                    }
                }
            }
        }

        function callback_area(response, status) {

        }

        function createMarker(place) {

            if(place.name.trim() != 'รถไฟฟ้ามหานคร คลองเตย' && place.name.trim() != 'Hua Lamphong MRT Station' && place.name.trim() != 'MRT ลาดพร้าว'){
//                var marker = new google.maps.Marker({
//                    map: map,
//                    position: place.geometry.location
//                });
//
//                google.maps.event.addListener(marker, 'click', function() {
//                    infowindow.setContent(place.name);
//                    infowindow.open(map, this);
//                });

                destination.push({lat: place.geometry.location.lat(), lng: place.geometry.location.lng()});
                arrAround.push({name : place.name , distance : '', lat : place.geometry.location.lat(), lng : place.geometry.location.lng()});
            }

//            var origin1 = new google.maps.LatLng(e.latLng.lat(), e.latLng.lng());
//            var destinationA = new google.maps.LatLng(place.geometry.location.lat(), place.geometry.location.lng());
//            var service = new google.maps.DistanceMatrixService();
//            service.getDistanceMatrix(
//                {
//                    origins: [origin1],
//                    destinations: [destinationA],
//                    travelMode: 'WALKING',
//                        transitOptions: TransitOptions,
//                        drivingOptions: DrivingOptions,
//                        unitSystem: UnitSystem,
//                        avoidHighways: Boolean,
//                        avoidTolls: Boolean,
//                }, callback_distance);

        }

        function placeMarkerAndPanTo(latLng, map, key, name) {
            // var marker = new google.maps.Marker({
            //   position: latLng,
            //   map: map,
            //   icon: image,
            // });

            //Determine the location where the user has clicked.
            var location = latLng;

            //Create a marker and placed it on the map.
            var marker = new google.maps.Marker({
                position: location,
                map: map,
                icon: image
            });

            //Set unique id
            marker.id = key;


            //Attach click event handler to the marker.
            google.maps.event.addListener(marker, "click", function (e) {
                var content = "<p>" + name + " : <a href='javascript:DeleteMarker(" + marker.id + ")'>ลบคลิก</a></p>";

                var infoWindow = new google.maps.InfoWindow({
                    content: content
                });
                infoWindow.open(map, marker);
            });

            //Add marker to the array.
            markers.push(marker);
            //map.panTo(latLng);
        }



        function DeleteMarker(id) {
            //Find and remove the marker from the Array
            for (var i = 0; i < markers.length; i++) {
                if (markers[i].id == id) {
                    //Remove the marker from Map
                    markers[i].setMap(null);

                    //Remove the marker from array.
                    markers.splice(i, 1);
                    //return;
                }
            }

            for (var i = 0; i < arrArea.length; i++) {
                if (arrArea[i].key == id) {
                    arrArea.splice(i, 1);
                }
            }
        }


    </script>

    <!--<link rel="stylesheet prefetch" href="//api.tiles.mapbox.com/mapbox.js/v1.4.0/mapbox.css">-->
    <!--<script src="//api.tiles.mapbox.com/mapbox.js/v1.5.2/mapbox.js"></script>-->

    <!--<script src="https://maps.googleapis.com/maps/api/js"></script>-->

@stop

@section('first-content')
    <div class="col-md-9">
        <h1 class="entry-title">ลงประกาศ </h1>

        <div class="section">
            {!! Form::open(array('url'=>route('product.post'),'method'=>'POST', 'files'=>true, 'class'=>'post-form', 'id'=>'post-form')) !!}
            {{--<form name="post-form" class="post-form" method="post" action="{{ route('product.post') }}" enctype="multipart/form-data">--}}
            {{ csrf_field() }}
            <div class="form-horizontal">
                <h3 class="side-list-title">ข้อมูลหลัก</h3>

                <!-- Text input -->
                <div class="form-group {{ $errors->has('topic') ? 'has-error' : '' }}">
                    <label class="col-xs-12 col-sm-3 control-label required" for="topic">หัวข้อ</label>
                    <div class="col-md-5">
                        <input name="topic" id="topic" class="form-control input-md" type="text" placeholder="topic" value="{{ old('topic') }}">
                        <span class="help-inline">{{ $errors->has('topic') ? $errors->first('topic') : '' }}</span>
                    </div>

                </div>

                <!-- Text input -->
                <div class="form-group {{ $errors->has('topic_des') ? 'has-error' : '' }}">
                    <label class="col-xs-12 col-sm-3 control-label required" for="topic_des">อธิบายหัวข้อ</label>
                    <div class="col-md-5">
                        <input name="topic_des" id="topic_des" class="form-control input-md" type="text"
                               placeholder="topic description"  value="{{ old('topic_des') }}">
                        <span class="help-inline">{{ $errors->has('topic_des') ? $errors->first('topic_des') : '' }}</span>
                    </div>

                </div>

                <!-- Text input -->
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 control-label">ประเภท</label>
                    <div class="col-md-5">
                        {{ Form::select('type', $type, old('type'), ['class' => 'form-control input-md'])  }}
                    </div>
                </div>

                <!-- Text input -->
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 control-label">ความต้องการ</label>
                    <div class="col-md-5">
                        {{ Form::select('sale', $sale, old('sale'), ['class' => 'form-control input-md'])  }}
                    </div>
                </div>

                <!-- Text input -->
                <div class="form-group {{ $errors->has('size') ? 'has-error' : '' }}">
                    <label class="col-xs-12 col-sm-3 l-m-3 control-label required" for="size">ขนาดพื้นที่</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input type="text" name="size" class="form-control input-md" placeholder="area size" value="{{ old('size') }}">
                            <span class="input-group-btn">

                                    {{ Form::select('size_unit', $unit, old('size_unit'), ['class'=> 'btn btn-default select-btn'])  }}
                                {{--<select name="area_size_unit" title="Measure" class="btn btn-default select-btn">--}}
                                {{--<option value="barra">ตารางเมตร (sq.m.)</option>--}}
                                {{--<option value="cucharada café">ตารางวา (sq.w.)</option>--}}
                                {{--<option value="cucharada sopera">c/s cucharada sopera</option>--}}
                                {{--</select>--}}
                                    </span>


                        </div>
                        <span class="help-inline">{{ $errors->has('size') ? $errors->first('size') : '' }}</span>
                    </div>
                </div>


                <!-- Text input -->
                <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                    <label class="col-xs-12 col-sm-3 l-m-3 control-label required" for="price">ราคา</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input type="text" name="price" class="form-control input-md" placeholder="price" value="{{ old('price') }}">
                            <span class="input-group-addon" id="basic-addon2">บาท</span>
                        </div>
                        <span class="help-inline">{{ $errors->has('price') ? $errors->first('price') : '' }}</span>
                    </div>
                </div>

                <!-- Text input -->
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 control-label" for="project">ชื่อโครงการ</label>
                    <div class="col-md-5">
                        <input name="project" class="form-control input-md" type="text"
                               placeholder="project" value="{{ old('project') }}">
                    </div>
                    <span class="help-inline">{{ $errors->has('project') ? $errors->first('project') : '' }}</span>
                </div>


                <!-- Text input -->
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 control-label" for="year">ปี่ที่สร้างเสร็จ</label>
                    <div class="col-md-5">
                        <input name="year" class="form-control input-md" type="text"
                               placeholder="complete" value="{{ old('year') }}">
                    </div>
                    <span class="help-inline">{{ $errors->has('year') ? $errors->first('year') : '' }}</span>
                </div>


                <div class="form-group {{ $errors->has('images') ? 'has-error' : '' }}">
                    <label class="col-xs-12 col-sm-3 control-label required" >ภาพ</label>
                    <div class="col-md-5">

                        <ul class="item_box" id="group_items_panel" class="ui-sortable"></ul>

                        <div id="file-upload-form" class="uploader">
                            {{--<input id="file-upload" type="file" accept="image/*" multiple/>--}}
                            {{ Form::file('files[]', array('multiple'=>true, 'id' => 'file-upload')) }}
                            {{--<input id="image-files" type="file" name="images[]" multiple/>--}}
                            <label for="file-upload" id="file-drag">
                                {{--<img id="file-image" src="#" alt="Preview" class="hidden">--}}
                                <div id="start">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    <div>Select a file or drag here</div>
                                    <div id="notimage" class="hidden">Please select an image</div>
                                    <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
                                </div>
                                <!--<div id="response" class="hidden">-->
                                <!--    <div id="messages"></div>-->
                                <!--    <progress class="progress" id="file-progress" value="0">-->
                                <!--        <span>0</span>%-->
                                <!--    </progress>-->
                                <!--</div>-->
                            </label>
                        </div>
                        <span class="help-inline">{{ $errors->has('images') ? $errors->first('images') : '' }}</span>
                    </div>

                </div>

            </div>

            <div class="form-horizontal">
                <fieldset>

                    <!-- Form Name -->
                    <h3 class="side-list-title">Review</h3>

                    <div class="form-group">
                        <label class="col-xs-12 col-sm-3 control-label required" for="edit">ช้อความ</label>
                        <div class="col-md-4">
                            <!--<textarea id="edit" name="content"></textarea>-->

                            <textarea id="content" name="content"></textarea>
                            <span class="help-inline">{{ $errors->has('content') ? $errors->first('content') : '' }}</span>
                        </div>
                    </div>


                </fieldset>
            </div>

            <div class="form-horizontal">
                <h3 class="side-list-title">ข้อมูลเพิ่มเติม</h3>


                <!-- Text input -->
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 control-label" for="status">สิ่งอำนวยความสะดวก</label>
                    <div class="col-md-5">

                        {{ Form::select('facility', $facility, old('facility'),[
                                'id' => 'id_label_multiple',
                                'class' => 'js-example-placeholder-multiple js-states form-control select2-hidden-accessible',
                                'multiple' => 'multiple',
                                'tabindex' => '-1',
                                'aria-hidden' => 'true'
                            ])
                         }}
                        {{--<select name="facility" class="js-example-placeholder-multiple js-states form-control select2-hidden-accessible" id="id_label_multiple" multiple="multiple" tabindex="-1" aria-hidden="true">--}}
                        {{--<optgroup label="Alaskan/Hawaiian Time Zone">--}}
                        {{--<option value="AK">Alaska</option>--}}
                        {{--<option value="HI">Hawaii</option>--}}
                        {{--</optgroup>--}}
                        {{--<optgroup label="Pacific Time Zone">--}}
                        {{--<option value="CA">California</option>--}}
                        {{--<option value="NV">Nevada</option>--}}
                        {{--<option value="OR">Oregon</option>--}}
                        {{--<option value="WA">Washington</option>--}}
                        {{--</optgroup>--}}
                        {{--<optgroup label="Mountain Time Zone">--}}
                        {{--<option value="AZ">Arizona</option>--}}
                        {{--<option value="CO">Colorado</option>--}}
                        {{--<option value="ID">Idaho</option>--}}
                        {{--<option value="MT">Montana</option>--}}
                        {{--<option value="NE">Nebraska</option>--}}
                        {{--<option value="NM">New Mexico</option>--}}
                        {{--<option value="ND">North Dakota</option>--}}
                        {{--<option value="UT">Utah</option>--}}
                        {{--<option value="WY">Wyoming</option>--}}
                        {{--</optgroup>--}}
                        {{--<optgroup label="Central Time Zone">--}}
                        {{--<option value="AL">Alabama</option>--}}
                        {{--<option value="AR">Arkansas</option>--}}
                        {{--<option value="IL">Illinois</option>--}}
                        {{--<option value="IA">Iowa</option>--}}
                        {{--<option value="KS">Kansas</option>--}}
                        {{--<option value="KY">Kentucky</option>--}}
                        {{--<option value="LA">Louisiana</option>--}}
                        {{--<option value="MN">Minnesota</option>--}}
                        {{--<option value="MS">Mississippi</option>--}}
                        {{--<option value="MO">Missouri</option>--}}
                        {{--<option value="OK">Oklahoma</option>--}}
                        {{--<option value="SD">South Dakota</option>--}}
                        {{--<option value="TX">Texas</option>--}}
                        {{--<option value="TN">Tennessee</option>--}}
                        {{--<option value="WI">Wisconsin</option>--}}
                        {{--</optgroup>--}}
                        {{--<optgroup label="Eastern Time Zone">--}}
                        {{--<option value="CT">Connecticut</option>--}}
                        {{--<option value="DE">Delaware</option>--}}
                        {{--<option value="FL">Florida</option>--}}
                        {{--<option value="GA">Georgia</option>--}}
                        {{--<option value="IN">Indiana</option>--}}
                        {{--<option value="ME">Maine</option>--}}
                        {{--<option value="MD">Maryland</option>--}}
                        {{--<option value="MA">Massachusetts</option>--}}
                        {{--<option value="MI">Michigan</option>--}}
                        {{--<option value="NH">New Hampshire</option>--}}
                        {{--<option value="NJ">New Jersey</option>--}}
                        {{--<option value="NY">New York</option>--}}
                        {{--<option value="NC">North Carolina</option>--}}
                        {{--<option value="OH">Ohio</option>--}}
                        {{--<option value="PA">Pennsylvania</option>--}}
                        {{--<option value="RI">Rhode Island</option>--}}
                        {{--<option value="SC">South Carolina</option>--}}
                        {{--<option value="VT">Vermont</option>--}}
                        {{--<option value="VA">Virginia</option>--}}
                        {{--<option value="WV">West Virginia</option>--}}
                        {{--</optgroup>--}}
                        {{--</select>--}}

                    </div>
                </div>

                <!-- Text input -->
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 control-label" for="status"></label>
                    <div class="col-md-4 fc-c">
                        <!--<div class="fc-d">-->
                        <!--    <label class="col-xs-12 col-sm-3 control-label">adadad</label>-->
                        <!--    <div class="fc-input">-->
                        <!--        <input type="file" class="form-control form-input form-style-base">-->
                        <!--        <input type="text" class="form-control form-input form-style-fake" placeholder="Choose your File" readonly>-->
                        <!--        <span class="glyphicon glyphicon-open input-place"></span>-->
                        <!--    </div>-->
                        <!--</div>-->

                    </div>
                </div>


            </div>


            <div class="form-horizontal">
                <h3 class="side-list-title">แผนที่</h3>


                <!-- Text input -->
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 control-label" for="status">พื่นที่โครงการ</label>

                    <div class="col-md-5">
                        {{--<select class="form-control" id="select-point">--}}
                        {{--<option value="1">1</option>--}}
                        {{--<option>2</option>--}}
                        {{--<option>3</option>--}}
                        {{--<option>4</option>--}}
                        {{--<option>5</option>--}}
                        {{--</select>--}}
                        {{ Form::select('area', $area, old('area'),[
                                'id' => 'select-point',
                                'class' => 'form-control input-md'
                            ])
                         }}
                    </div>
                </div>


                <!-- Text input -->
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 control-label" for="status"></label>
                    <div class="col-md-4">
                        <div class="google-maps-res">
                            <div id="map" class="google-maps"></div>
                        </div>
                    </div>
                </div>



                <div class="form-horizontal">
                    <h3 class="side-list-title">Keyword</h3>

                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-xs-12 col-sm-3 control-label">Tag</label>
                        <div class="col-md-5">
                            <input name="tag1" class="form-control input-md" type="text" placeholder="tag" value="{{ old('tag1') }}">
                        </div>
                    </div>

                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-xs-12 col-sm-3 control-label"></label>
                        <div class="col-md-5">
                            <input name="tag2" class="form-control input-md" type="text"
                                   placeholder="tag" value="{{ old('tag2') }}">
                        </div>
                    </div>

                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-xs-12 col-sm-3 control-label"></label>
                        <div class="col-md-5">
                            <input name="tag3" class="form-control input-md" type="text"
                                   placeholder="tag" value="{{ old('tag3') }}">
                        </div>
                    </div>


                </div>



                <div class="form-horizontal">
                    <h3 class="side-list-title">ข้อมูลผู้ขาย</h3>

                    <!-- Text input -->
                    <div class="form-group {{ $errors->has('seller') ? 'has-error' : '' }}">
                        <label class="col-xs-12 col-sm-3 control-label required">ติดต่อคุณ</label>
                        <div class="col-md-5">
                            <input name="seller" class="form-control input-md" type="text" placeholder="seller"
                                   value="{{ old('seller') }}">
                            <span class="help-inline">{{ $errors->has('seller') ? $errors->first('seller') : '' }}</span>
                        </div>
                    </div>

                    <!-- Text input -->
                    <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                        <label class="col-xs-12 col-sm-3 control-label required" for="status">เบอร์โทร</label>
                        <div class="col-md-5">
                            <input name="phone" class="form-control input-md" id="status" type="text" placeholder="phone"
                                   value="{{ old('phone') }}">
                            <span class="help-inline">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</span>
                        </div>
                    </div>


                </div>

                <div class="form-horizontal form-group-last">
                    <h3 class="side-list-title"></h3>
                    <!-- Text input -->
                    <div class="form-group">
                        <label class="col-xs-12 col-sm-3 l-m-3 control-label" for="status"></label>
                        <div class="col-md-5">
                            <input type="submit" class="btn btn-primary" value="ลงประกาศ">
                            {{--<a href="#" id="submit" class="btn btn-primary" role="button">ลงประกาศ</a>--}}
                            &nbsp
                            <a href="#" id="clear" class="btn btn-default" role="button">ยกเลิกข้อมูล</a>
                        </div>
                    </div>


                </div>

            </div>

            {{--</form>--}}
            {!! Form::close() !!}
        </div>


        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1724713611112155";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
    </div>

    <div class="col-md-3">

        @include('_partials.geography')

        @include('_partials.news')

    </div>
@stop

@section('second-content')

    <div class="col-md-9">

        @include('_partials.product-new')

    </div>

    <div class="col-md-3">

        @include('_partials.facebook-page')

    </div>

@stop

@section('third-content')

    <div class="col-md-9">

        @include('_partials.review')

    </div>

    <div class="col-md-3">

        @include('_partials.product-previous')

    </div>

@stop