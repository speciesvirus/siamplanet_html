// Browser detection for when you get desperate. A measure of last resort.

// http://rog.ie/post/9089341529/html5boilerplatejs
// sample CSS: html[data-useragent*='Chrome/13.0'] { ... }

// Uncomment the below to use:
// var b = document.documentElement;
// b.setAttribute('data-useragent',  navigator.userAgent);
// b.setAttribute('data-platform', navigator.platform);


// function initPage(){
// 	console.log('page loaded');
// }



(function ($) {
    "use strict";

    var $window = $(window),
        $body = $('body'),
        isRtl = $body.hasClass('rtl');

	/*-----------------------------------------------------------------------------------*/
	/*	Search Form Slide Toggle
	 /*-----------------------------------------------------------------------------------*/
    // Function to show hidden fields on variation one
    var hiddenFields = $('.hidden-fields');

    $('.hidden-fields-reveal-btn').on( 'click', function (event) {
        $(this).stop(true, true).toggleClass('field-wrapper-expand');
        hiddenFields.stop(true, true).slideToggle(200);
        event.preventDefault();
    });

    var featureTitle = $('.extra-search-fields > .title > span'),
        featureWrapper = $('.extra-search-fields .features-checkboxes-wrapper');

    featureTitle.on( 'click', function () {
        $(this).stop(true, true).toggleClass('is-expand');
        featureWrapper.stop(true, true).slideToggle(200);
    });


    /*-----------------------------------------------------------------------------------*/
	/* Select2
	 /* URL: http://select2.github.io/select2/
	 /*-----------------------------------------------------------------------------------*/
    if (jQuery().select2) {
        var selectOptions = {
            //minimumResultsForSearch: -1,  // Disable search feature in drop down
            width: 'off'
        };

        if (isRtl) {
            selectOptions.dir = "rtl";
        }

        $('.header-advance-search select').select2(selectOptions);
    }

	/*-----------------------------------------------------------------------------------*/
	/*	Animation CSS integrated with Appear Plugin
	 /*----------------------------------------------------------------------------------*/
    function ie_10_or_older() {
        // check if IE10 or older
        var ua = window.navigator.userAgent;
        var msie = ua.indexOf('MSIE ');
        if (msie > 0) {
            // IE 10 or older => return version number
            // return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
            return true;
        }
        // other browser
        return false;
    }

	/*----------------------------------------------------------------------------------*/
	/*	IE Browsers Detection
	 /*----------------------------------------------------------------------------------*/
    function detectIE() {
        var ms_ie = false,
            ua = window.navigator.userAgent,
            new_ie = ua.indexOf('Trident/');
        if (ie_10_or_older() || (new_ie > -1)) {
            ms_ie = true;
        }
        if (ms_ie) {
            $(".gallery-slider-two").find('img').removeClass('img-responsive');
            $("body").addClass('ie-userAgent');
            return true;
        }
        return false;
    }

    detectIE();




    $('.bs-docs-sidebar li > ul').each(function(i) {
        // Find this list's parent list item.
        var parentLi = $(this).parent('li');

        // Style the list item as folder.
        parentLi.addClass('folder');

        // Temporarily remove the list from the
        // parent list item, wrap the remaining
        // text in an anchor, then reattach it.
        var subUl = $(this).remove();
        parentLi.wrapInner('<a/>').find('a').click(function() {
            // Make the anchor toggle the leaf display.
            subUl.toggle();
        });
        parentLi.append(subUl);
    });

    // Hide all lists except the outermost.
    $('.bs-docs-sidebar ul ul:not(.open)').hide();


    //*!toggle mobile menu
    // $('.menu-toggle').on('click', function(e){
    //     e.preventDefault();
    //     $('.menu').toggleClass('off');
    // });

    $('.navicon').on('click', function() {
        var $this = $(this);
        $('body').toggleClass('nav-open');
        $this.find('a').toggleClass('open');
    });


    // $('.collapse').on('show.bs.collapse hide.bs.collapse', function(e) {
    //     e.preventDefault();
    // });
    $('.collapse').on('show.bs.collapse hide.bs.collapse', function(e) {
        e.preventDefault();
    });
    $('[data-toggle="collapse"]').on('click', function(e) {
        e.preventDefault();
        $($(this).data('target')).addClass('in');
        $(this).parent().remove();
    });







    /*----------------------------------------------------------------------------------*/
    /*	Menu login toggle
    /*----------------------------------------------------------------------------------*/

    $('ul.years a.year').click(function () {
        var $this = $(this),
            $parent = $this.parents('ul.years');
        $parent.find('.month').addClass('hide');
        $this.next().removeClass('hide');
    });

    var $search = $("form[name='search']");

    $search.submit(function (e) {
        e.preventDefault();
        var $param = '';
        var q = _inputName('s_keyword');
        var type = _selectName('s_type');
        var price = _selectName('s_price');
        var size = _selectName('s_size');
        var sale = _selectName('s_sale');
        var subway = _selectName('s_subway');
        var province = _selectName('s_province');
        if($.trim(q)) $param += '&q='+q;
        if(type != 'any') $param += '&type='+type;
        if(price != 'any') $param += '&price='+price;
        if(size != 'any') $param += '&size='+size;
        if(sale != 'any') $param += '&sale='+sale;
        if(subway != 'any') $param += '&subway='+subway;
        if(province != 'any') $param += '&province='+province;

        window.location.href = $search.attr('action')+'/?'+$param;

        // {price?}/{size?}/{sale?}/{subway?}/{province?}/{q?}
    });
    function _inputName($name) {
        return $search.find('input[name="'+ $name +'"]').val();
    }
    function _selectName($name) {
        return $search.find('select[name="'+ $name +'"]').val();
    }



    var $dc = $('.dialog-content'),
        $notice = $('.product-notice');

    $notice.click(function () {
        var $product = $notice.data('id');
        var $html = '<div class="funkyradio">'+
            '<div class="funkyradio-danger">'+
            '<input type="radio" name="_notice" id="radio1" value="F"/>'+
            '<label for="radio1">เนื้อหาของประกาศไม่เป็นความจริง</label>'+
            '</div>'+
            '<div class="funkyradio-danger">'+
            '<input type="radio" name="_notice" id="radio2" value="R"/>'+
            '<label for="radio2">เนื้อหาของประกาศไม่เหมาะสม</label>'+
            '</div>'+
            '<div class="funkyradio-danger">'+
            '<input type="radio" name="_notice" id="radio3" value="U"/>'+
            '<label for="radio3">ข้อมูลผู้ประกาศไม่เป็นจริง</label>'+
            '</div><br>'+
            '<input type="submit" id="submit-notice" class="btn btn-primary" data-id="'+$product+'" value="แจ้งประกาศ">'+
            '&nbsp'+
            '<a href="#" class="btn btn-default close-dailog" role="button">ยกเลิก</a>'+
            '</div>';
        $('.dialog-content').addClass('bgw').html($html);
        _loading(true);
    });

    $(document).on('click', '.close-dailog', function () {
        _loading(false);
        $('.dialog-content').removeClass('bgw').html('');
        setTimeout(intoLoading(), 2000);

    });

    function intoLoading() {
        $('.dialog-content').removeClass('bgw').html(_loadingHTML());
    }

})(jQuery);


function _loadingHTML() {
    var $loading = '<div class="loader">'+
        '<ul class="hexagon-container">'+
        '<li class="hexagon hex_1"></li>'+
        '<li class="hexagon hex_2"></li>'+
        '<li class="hexagon hex_3"></li>'+
        '<li class="hexagon hex_4"></li>'+
        '<li class="hexagon hex_5"></li>'+
        '<li class="hexagon hex_6"></li>'+
        '<li class="hexagon hex_7"></li>'+
        '</ul>'+
        '</div>';

    return $loading;
}
//!* Loading
function _btnLoading(t, e){
    var $html = '';

    if(e == true){
        $html = '<div class="loading">'+
            '<span class="text">Loading</span>'+
            '<span class="blob1 blob"></span>'+
            '<span class="blob2 blob"></span>'+
            '<span class="blob3 blob"></span>'+
            '</div>';
    }else{
        $html = 'More Posts';
    }


    t.html($html);

}

var $dialog = $('.dialog'),
    $overLay = $('.dialog-overlay');

function _loading(e){

    if(e == true){
        showDialog();
    }else{
        hideDialog()
    }

}
function showDialog(){
    $('.dialog').addClass('show-dialog');
    $('html').addClass('loading');
}

function hideDialog(){
    $('.dialog').removeClass('show-dialog');
    $('html').removeClass('loading');
}
