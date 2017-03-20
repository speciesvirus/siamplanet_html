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
    var openPopupLogin  = $('#opl'),
        overlay     = $('.overlay'),
        popup       = $('.popup'),
        closePopupLogin = $('#cpl');

    overlay.on('click', function () {
        $(this).fadeOut();
        popup.removeClass('fourOpen').delay(500).promise().done(function () {
            $(this).hide();
        });
    });

    // Fourth Style action
    openPopupLogin.on('click', function () {
        overlay.fadeIn();
        popup.show(0, function () {
            $(this).toggleClass('fourOpen');
        });
    });

    closePopupLogin.on('click', function () {
        overlay.fadeOut();
        popup.toggleClass('fourOpen').delay(500).promise().done(function () {
            $(this).hide();
        });
    });
    
    
    
    
    
    //!* Loading


})(jQuery);