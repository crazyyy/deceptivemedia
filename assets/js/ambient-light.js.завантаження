//Full Screen
function toggleFullScreen() {
    //$(window).bind("popstate");
    var doc = window.document;
    var docEl = doc.documentElement;
    var requestFullScreen = docEl.requestFullscreen || docEl.mozRequestFullScreen || docEl.webkitRequestFullScreen || docEl.msRequestFullscreen;
    var cancelFullScreen = doc.exitFullscreen || doc.mozCancelFullScreen || doc.webkitExitFullscreen || doc.msExitFullscreen;
    if (!doc.fullscreenElement && !doc.mozFullScreenElement && !doc.webkitFullscreenElement && !doc.msFullscreenElement) {
        requestFullScreen.call(docEl);
    } else {
        cancelFullScreen.call(doc);
    }
}
//END Full Screen

//Animation Tempo
AnimationSpeed = 500;
//END Animation Tempo

(function($) {
    //Ajax pre filter
    $.ajaxPrefilter(function(options, originalOptions, jqXHR) {
        options.async = true;
    });
    //END Ajax pre filter




})(jQuery);

jQuery(document).ready(function($) {

    //Ajax errors
    $(document).ajaxError(function(event, request, settings) {
        function resetHeights() {
            var timeout = setTimeout(function() {
                height_menu_adjustments();
            }, AnimationSpeed + 10);
        }
        var AjaxError = $('.ajax-error');
        if (request.status === 429) {
            AjaxError.append('<div class="ajax-error-item"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Too many requests (commenting too quick)</div>');
        } else if (request.status === 409) {
            AjaxError.append('<div class="ajax-error-item"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Duplicate comment</div>');
        } else if (request.status === 404) {
            AjaxError.append('<div class="ajax-error-item"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> ' + AmbientLightParams.not_found_text + '</div>');
        } else {
            AjaxError.append('<div class="ajax-error-item"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Error requesting page ' + settings.url + '</div>');
        }
        AjaxError.slideDown(AnimationSpeed);
        resetHeights();
        NProgress.done();
        var timeout = setTimeout(function() {
            AjaxError.slideUp(AnimationSpeed);
            $('.ajax-error-item').remove();
            resetHeights();
        }, 5000);
        $(document).ajaxError(function(event, request, settings) {
            clearTimeout(timeout);
        });
        $(".close").click(function() {
            clearTimeout(timeout);
            AjaxError.slideUp(AnimationSpeed);
            $('.ajax-error-item').remove();
            resetHeights();
        });
    });
    //END Ajax errors

    //Image loader
    NProgress.configure({ trickleSpeed: 2000 });
    NProgress.configure({ showSpinner: false });
    NProgress.start();

    function imageLoading() {
        $('#photo').imagesLoaded().progress(function(instance, image) {
            $(image.img).fadeTo(AnimationSpeed, 1);
            height_menu_adjustments();
        });
        $('#grid, #grid-info').imagesLoaded().progress(function(instance, image) {
            setTimeout(function() {
                $(image.img).fadeTo(AnimationSpeed, 1);
            }, AnimationSpeed);
        });
        $('body').imagesLoaded().done(function(instance) {
            NProgress.done();
        }).progress(function(instance, image) {
            $(image.img).not('#photo img, #grid img, #grid-info img').fadeTo(AnimationSpeed, 1);
        }).fail(function() {
            NProgress.done();
            console.log('At least one image is broken');
        });
    }
    imageLoading();
    //END Image loader

    //Cancel image downloads
    function cancel_image_downloads() {
        if (window.stop !== undefined) {
            window.stop();
            NProgress.done();
        } else if (document.execCommand !== undefined) {
            document.execCommand("Stop", false);
        }
    }
    //END Cancel image downloads

    // reload wordpress scripts
    // TODO:: loading media scripts when not needed....
    function reload_scripts() {
        function reload_js(src) {

            $('script[src="' + src + '"]').remove();
            $('<script>').attr('src', src).appendTo('body');

        }
        reload_js(AmbientLightParams.blog_url + '/wp-includes/js/admin-bar.min.js');
        reload_js(AmbientLightParams.blog_url + '/wp-includes/js/wp-embed.min.js');
        reload_js(AmbientLightParams.blog_url + '/wp-includes/js/mediaelement/mediaelement-and-player.min.js');
        reload_js(AmbientLightParams.blog_url + '/wp-includes/js/mediaelement/wp-mediaelement.min.js');
    }
    //END reload wordpress scripts

    //SVG inline
    $('header img[src$=".svg"]').each(function() {
        var $img = jQuery(this);
        var imgURL = $img.attr('src');
        var attributes = $img.prop("attributes");
        $.get(imgURL, function(data) {
            var $svg = jQuery(data).find('svg');
            $svg = $svg.removeAttr('xmlns:a');
            $.each(attributes, function() {
                $svg.attr(this.name, this.value);
            });
            $img.replaceWith($svg);
        }, 'xml');
    });
    //END SVG inline



    //Height and margin adjustments
    function height_menu_adjustments() {
        var AdminBarHeight = $('#wpadminbar').innerHeight();
        var WindowHeight = $(window).height();
        var HeaderHeight = $('header').innerHeight();
        var TitleHeight = $('.title-nav-bar').innerHeight();
        $('#photo').css('height', WindowHeight - (TitleHeight + HeaderHeight + AdminBarHeight) + 'px').css('top', AdminBarHeight + HeaderHeight);
        $('.info, .grid-outer, .content-default-wrap').not('.info .grid-outer').css('margin-bottom', TitleHeight + 'px');
        var info_padding_top = $('.info').css('padding-top');
        $('.info').css('margin-top', WindowHeight - AdminBarHeight - HeaderHeight - TitleHeight - parseInt(info_padding_top, 10) + 'px');
        $('.nav-container').css('margin-top', HeaderHeight + 'px');
    }
    setTimeout(function() {
        height_menu_adjustments();
    }, 10);
    //TODO:: look into debouncing
    $(window).resize(function() {
        height_menu_adjustments();
    });
    //END Height and margin adjustments

    //Image floats
    function post_image_floats() {
        var margin = 250;

        function detect_if_float() {
            $('.wp-caption.alignleft, .wp-caption.alignright, .wp-caption.aligncenter, .wp-caption.alignnone').each(function() {
                $(this).removeAttr('style');
                var imgWidth = $('img', this).width();
                var paraPadding = parseInt($('p', this).css('padding'), 10);
                $('p', this).width(imgWidth - (paraPadding * 2));
                $(this).width(imgWidth);
            });
            $('.wp-caption.alignleft, .wp-caption.alignright').each(function() {
                if (margin > ($('.info').width() - $('img', this).width())) {
                    $(this).addClass('remove-float');
                } else {
                    $(this).removeClass('remove-float');
                }
            });
            $('img.alignright, img.alignleft').each(function() {
                if (margin > ($('.info').width() - $(this).width())) {
                    $(this).addClass('remove-float');
                } else {
                    $(this).removeClass('remove-float');
                }
            });
        }
        //TODO:: look into debouncing
        $(window).resize(function() {
            detect_if_float();
        });
        detect_if_float();
    }
    post_image_floats();
    //END Image floats

	// Tag Cloud
	$('.tagcloud a').each(function() {
		$(this).wrap('<span class="cloud-tag"></span>');
	});

    //Keep menu updated
    function menu_update() {
        if (AmbientLightParams.is_customizer == false) {
            $('li, .cloud-tag').removeClass('current-menu-item current-cat current_page_item');
            var navURLall = window.location.href;
            var navURLrefAll = $('.referrer a').attr("href");
            if (navURLrefAll === undefined) {
                navURL = navURLall.substring(0, navURLall.indexOf('/page'));
                if (navURL === "") {
                    $('a[href="' + navURLall + '"]').parent().addClass('current-menu-item');
                } else {
                    $('a[href="' + navURL + '"]').parent().addClass('current-menu-item');
                }
                $('.title-nav-bar a').parent().removeClass('current-menu-item current-cat');
                $('.post-stats a').parent().removeClass('current-menu-item current-cat');
                $('.site-title').removeClass('current-menu-item current-cat');
                $('.logo').removeClass('current-menu-item current-cat');
            } else {
                navURLref = navURLrefAll.substring(0, navURLrefAll.indexOf('/page'));
                if (navURLref === "") {
                    $('a[href="' + navURLrefAll + '"]').parent().addClass('current-menu-item');
                } else {
                    $('a[href="' + navURLref + '"]').parent().addClass('current-menu-item');
                }
                $('.title-nav-bar a').parent().removeClass('current-menu-item current-cat');
                $('.post-stats a').parent().removeClass('current-menu-item current-cat');
                $('.site-title').removeClass('current-menu-item current-cat');
                $('.logo').removeClass('current-menu-item current-cat');
            }
        }
    }
    menu_update();
    //END Keep menu updated

    //open menus
    function open_menus() {
        var $open_menu = $('.open-menu');
        var $open_search = $('.open-search');
        var $open_filter = $('.open-filter');
        var $open_connect = $('.open-connect');
        var $nav = $('nav');
        var $search_form = $('.search-form');
        var $filter = $('.filter');
        var $connect = $('.connect');
        var $scroll = $('html, body');

        $open_menu.removeClass('icon-active');
        $open_menu.unbind("click");
        $open_menu.click(function() {
            if ($nav.css('display') === 'none') {
                $(this).addClass('icon-active');
            } else {
                $(this).removeClass('icon-active');
            }
            $open_search.removeClass('icon-active');
            $open_filter.removeClass('icon-active');
            $open_connect.removeClass('icon-active');
            $search_form.slideUp(AnimationSpeed);
            $filter.slideUp(AnimationSpeed);
            $connect.slideUp(AnimationSpeed);
            $nav.slideToggle(AnimationSpeed);
            $scroll.animate({ scrollTop: 0 }, AnimationSpeed);
        });
        $open_search.removeClass('icon-active');
        $open_search.unbind("click");
        $open_search.click(function() {
            if ($search_form.css('display') === 'none') {
                $(this).addClass('icon-active');
            } else {
                $(this).removeClass('icon-active');
            }
            $open_menu.removeClass('icon-active');
            $open_filter.removeClass('icon-active');
            $open_connect.removeClass('icon-active');
            $nav.slideUp(AnimationSpeed);
            $filter.slideUp(AnimationSpeed);
            $connect.slideUp(AnimationSpeed);
            $search_form.slideToggle(AnimationSpeed);
            $scroll.animate({ scrollTop: 0 }, AnimationSpeed);
        });
        $('.open-filter:not(.location .open-filter)').removeClass('icon-active');
        $open_filter.unbind("click");
        $open_filter.click(function() {
            if ($filter.css('display') === 'none') {
                $('.open-filter:not(.location .open-filter)').addClass('icon-active');
            } else {
                $('.open-filter:not(.location .open-filter)').removeClass('icon-active');
            }
            $open_search.removeClass('icon-active');
            $open_menu.removeClass('icon-active');
            $open_connect.removeClass('icon-active');
            $search_form.slideUp(AnimationSpeed);
            $nav.slideUp(AnimationSpeed);
            $connect.slideUp(AnimationSpeed);
            $filter.slideToggle(AnimationSpeed);
            $scroll.animate({ scrollTop: 0 }, AnimationSpeed);
        });
        $open_connect.removeClass('icon-active');
        $open_connect.unbind("click");
        $open_connect.click(function() {
            if ($connect.css('display') === 'none') {
                $open_connect.addClass('icon-active');
            } else {
                $open_connect.removeClass('icon-active');
            }
            $open_search.removeClass('icon-active');
            $open_menu.removeClass('icon-active');
            $open_filter.removeClass('icon-active');
            $search_form.slideUp(AnimationSpeed);
            $nav.slideUp(AnimationSpeed);
            $filter.slideUp(AnimationSpeed);
            $connect.slideToggle(AnimationSpeed);
            $scroll.animate({ scrollTop: 0 }, AnimationSpeed);
        });
    }
    open_menus();
    // END open menus
    // Hack
    // TODO: : this gets rid of slideDown not working first time in customizer but feels messy
    var $nav = $('nav');
    $nav.css('visibility', 'hidden');
    $nav.slideDown(0);
    $nav.slideUp(0);
    setTimeout(function() {
        $nav.css('visibility', 'inherit');
    }, 20);
    // END Hack

    // Add active class to icons on hover
    var $open_icons = $('.open-icons a');
    $open_icons.mouseenter(function() {
        $(this).addClass('icon-active-hover');
    });
    $open_icons.mouseleave(function() {
        $(this).removeClass('icon-active-hover');
    });
    // END Add active class to icons on hover

    //Archives image zoom
    function archives_zoom_hover() {
        var ZoomHover = $('.arch-wrap');
        ZoomHover.mouseenter(function() {
            $('img', this).css('transform', 'scale(1.3,1.3)');
        });
        ZoomHover.mouseleave(function() {
            $('img', this).css('transform', 'scale(1.0,1.0)');
        });
    }
    //END Archives image zoom

    //savvior - archives grid
    function savvior_grid() {
	    var imgLoad = imagesLoaded('.thumb-container');
        if ($("#grid").length > 0) {
            savvior.destroy();
            setTimeout(function() {
                savvior.init('#grid', {
                    "screen and (max-width: 400px)": { columns: 2 },
                    "screen and (min-width: 400px) and (max-width: 1000px)": { columns: 3 },
                    "screen and (min-width: 1000px) and (max-width: 1200px)": { columns: 4 },
                    "screen and (min-width: 1200px) and (max-width: 1600px)": { columns: 6 },
                    "screen and (min-width: 1600px)": { columns: 8 }
                });
            }, AnimationSpeed);
            imgLoad.on('progress', function(instance, image) {
                var result = image.isLoaded ? 'loaded' : 'broken';
                setTimeout(function() {
                    image.img.style.display = "block";
                }, AnimationSpeed);
            });
            setTimeout(function() {
                height_menu_adjustments();
                archives_zoom_hover();
            }, 50);
        }
	    if ($("#grid-info").length > 0) {
		    savvior.destroy();
		    setTimeout(function() {
			    savvior.init('#grid-info', {
				    "screen and (max-width: 400px)": { columns: 2 },
				    "screen and (min-width: 400px) and (max-width: 1000px)": { columns: 3 },
				    "screen and (min-width: 1000px) and (max-width: 1200px)": { columns: 4 },
				    "screen and (min-width: 1200px) and (max-width: 1600px)": { columns: 4 },
				    "screen and (min-width: 1600px)": { columns: 4 }
			    });
		    }, AnimationSpeed);
		    imgLoad.on('progress', function(instance, image) {
			    var result = image.isLoaded ? 'loaded' : 'broken';
			    setTimeout(function() {
				    image.img.style.display = "block";
			    }, AnimationSpeed);
		    });
		    setTimeout(function() {
			    height_menu_adjustments();
			    archives_zoom_hover();
		    }, 50);
	    }
    }
    savvior_grid();
    //END savvior - archives grid

    // Keyboard shortcuts.
	$().post_keys();

    //Reset AmbientLightParams
    function reset_AmbientLightParams(data) {
        AmbientLightParams.post_id = $(data).filter('.post-id').text();
        var QueryTemp = $(data).filter('.query').text().split('query=')[1];
        AmbientLightParams.query = jQuery.parseJSON(QueryTemp);
        AmbientLightParams.number_of_pages = $(data).filter('.number_of_pages').text();
    }
    //END Reset AmbientLightParams

    //Fit Videos
    function fit_videos() {
        var rem = parseInt($('html').css('font-size'), 10);
        var $videoWrap = $('#video');
        var iFrame = $('iFrame', $videoWrap);
        var video_height = iFrame.height();
        var video_width = iFrame.width();
        var video_ratio = video_width / video_height;
        $videoWrap.fitVids();

        function videoCenter(video_ratio, rem) {
            //alert(rem);
            var $videoContainer = $('#video').find('p');
            var AdminBarHeight = $('#wpadminbar').innerHeight();
            var HeaderHeight = $('header').innerHeight();
            var TitleHeight = $('.title-nav-bar').innerHeight();
            var WindowHeight = $(window).height();
            $('.video-wrap').css('top', (AdminBarHeight + HeaderHeight)).css('height', (WindowHeight - (AdminBarHeight + HeaderHeight + TitleHeight)));
            if (((WindowHeight - (AdminBarHeight + HeaderHeight + TitleHeight)) * video_ratio) <= $(window).width() + (rem * 2)) {
                $videoContainer.css('width', ((WindowHeight - (AdminBarHeight + HeaderHeight + TitleHeight)) * video_ratio) - (rem * 4));
            } else {
                var windowwWidth = $(window).width();
                $videoContainer.css('width', windowwWidth - (rem * 2));
            }
        }
        videoCenter(video_ratio, rem);
	    height_menu_adjustments();
        //TODO:: look into debouncing
        $(window).resize(function() {
            videoCenter(video_ratio, rem);
        });
    }
    fit_videos();
    //END Fit Videos

    //Find Ajax Links
    function ajax_links() {
        var blog_url = AmbientLightParams.blog_url;
        $('a[href*="' + blog_url + '"]').not('#wpadminbar a, .social-share a, a.comment-reply-link,.page-links a,.attachment-page-image a').each(function() {
            var foundURL = $(this).attr('href');
            var unwantedURL = "wp-admin";
            if (foundURL.indexOf(unwantedURL) === -1) {
                //alert($(this).text());
                if (!$(this).attr('href').toLowerCase().match(/\.(jpg|png|gif)/g)) {
                    $(this).addClass('ajax-url');
                }
            }
        });
    }
    ajax_links();
    //END Find Ajax Links

    //Load pages via ajax
    $(document).on('click', '.ajax-url', function(event) {
        event.preventDefault();
        $(this).prop('disabled', true);
        cancel_image_downloads();
        NProgress.start();
        //TODO:: this is desirable on single posts but not coming from archives as info is on display
        if (!$('#grid').length) {
            $('html, body').animate({ scrollTop: 0 }, AnimationSpeed);
        }
        $('.filter, .search-form, nav, .connect').slideUp(AnimationSpeed);
        $('.open-icons a').removeClass('icon-active');
        var urlrequest = $(this).attr('href');
        var selector = $(this);
        $.get(urlrequest, function(data) {
            NProgress.start();
            reset_AmbientLightParams(data);
            window.history.pushState(null, null, urlrequest);
            document.title = $(data).filter('title').text();
            $('#photo').fadeOut(AnimationSpeed);
            setTimeout(function() {
                $('#container').html(($($.parseHTML(data,true)).find('.content').html()));
                $('.connect').html(($($.parseHTML(data,true)).find('.connect').html()));
                var adminbar = ($($.parseHTML(data)).filter("#wpadminbar").html());
                $('#wpadminbar').html(adminbar);
                if (!$('#grid').length) {
                    $('html, body').animate({ scrollTop: 0 }, AnimationSpeed);
                }
                selector.prop('disabled', false);
                menu_update();
                savvior_grid();
                archives_info();
                scrollpostion();
                load_more();
                fit_videos();
                password_protect_form();
                imageLoading();
                ajax_links();
                $().find_popup_images();
                post_comments();
                post_image_floats();
                slideshow();
                reload_scripts();
                //TODO: AddThis social hare icons is popular so get working with ajax loading - function below seems to work but needs better implementation
                //addthis.layers.refresh();

            }, AnimationSpeed);
        });
    });
    //END Load pages via ajax

    //Load next pages via ajax
    $(document).on('click', '.page-links a', function(event) {
        event.preventDefault();
        $(this).prop('disabled', true);
        cancel_image_downloads();
        NProgress.start();
        //TODO: this is desirable on single posts but not coming from archives as info is on display

        $('.filter, .search-form, nav, .connect').slideUp(AnimationSpeed);
        $('.open-icons a').removeClass('icon-active');
        var urlrequest = $(this).attr('href');
        //$(this).removeAttr('href');
        var selector = $(this);
        $.get(urlrequest, function(data) {
            NProgress.start();
            reset_AmbientLightParams(data);
            window.history.pushState(null, null, urlrequest);
            document.title = $(data).filter('title').text();

            setTimeout(function() {
                $('.post-content').html(($($.parseHTML(data)).find(".post-content").html()));
                var adminbar = ($($.parseHTML(data,true)).filter("#wpadminbar").html());
                $('#wpadminbar').html(adminbar);
                var HeaderHeight = $('header').innerHeight();
                var AdminBarHeight = $('#wpadminbar').innerHeight();
                $('html, body').animate({
                    scrollTop: $('.info').offset().top - (HeaderHeight + AdminBarHeight)
                }, AnimationSpeed);
                $('.info').addClass('loaded');
                selector.prop('disabled', false);
                menu_update();
                savvior_grid();
                archives_info();
                scrollpostion();
                load_more();
                fit_videos();
                password_protect_form();
                imageLoading();
                ajax_links();
	            $().find_popup_images();
	            //post_comments();
                post_image_floats();
                slideshow();
                reload_scripts();
            }, AnimationSpeed);
        });
    });
    //END Load pages via ajax



    //Load search pages via ajax
    $(document).on('submit', '#search', function(event) {
        event.preventDefault();
        NProgress.start();
        cancel_image_downloads();
        var SearchTerm = $('#s').val();
        if (SearchTerm == "") {
            $('#s').css('background-color', 'red');
            setTimeout(function() {
                $('#s').css('background-color', 'transparent');
            }, AnimationSpeed);
            return;
        }
        NProgress.start();
        $('.filter, .search-form, nav, .connect').slideUp(AnimationSpeed);
        $('.open-icons a').removeClass('icon-active');
        var urlrequest = $(this).attr('action') + '?s=' + SearchTerm + '';
        $.get(urlrequest, function(data) {
            reset_AmbientLightParams(data);
            window.history.pushState(null, null, urlrequest);
            document.title = $(data).filter('title').text();
            $('#photo').fadeOut(AnimationSpeed);
            setTimeout(function() {
                $('#container').html(($($.parseHTML(data,true)).find(".content").html()));
                var adminbar = ($($.parseHTML(data)).filter("#wpadminbar").html());
                $('#wpadminbar').html(adminbar);
                imageLoading();
                menu_update();
                savvior_grid();
                archives_info();
                scrollpostion();
                load_more();
                post_comments();
                ajax_links();
                $().find_popup_images();
                post_image_floats();
                slideshow();
                reload_scripts();
            }, AnimationSpeed);
        });
    });
    //END Load search pages via ajax

    //Scroll position for browser backwards/forwards
    function scrollpostion() {
        $(window).scroll(function() {
            if (window.sessionStorage) {
                var url = window.location;
                var scrollPosition = $(window).scrollTop();
                if (scrollPosition < 10) {
                    sessionStorage.setItem(url, 0);
                    return;
                }
                sessionStorage.setItem(url, scrollPosition);
            }
        });
    }
    scrollpostion();
    //END Scroll position for browser backwards/forwards

    //Load pages via ajax using browser back/forward button
    $(window).bind("popstate", function() {
        //cancel_image_downloads();
        NProgress.start();
        $(window).unbind('scroll');
        $('.info').css('display', 'none');
        $('.filter, .search-form,nav').slideUp(AnimationSpeed);
        var urlrequestback = window.location;
        $.get(urlrequestback, function(data) {
            reset_AmbientLightParams(data);
            document.title = $(data).filter('title').text();
            $('#photo').fadeOut(AnimationSpeed);
            setTimeout(function() {
                $('#container').html(($($.parseHTML(data)).find(".content").html()));
	            $('.connect').html(($($.parseHTML(data,true)).find('.connect').html()));
                var adminbar = ($($.parseHTML(data)).filter("#wpadminbar").html());
                $('#wpadminbar').html(adminbar);
                var scroll_position = sessionStorage.getItem(urlrequestback);
                imageLoading();
                menu_update();
                savvior_grid();
                archives_info();
                load_more();
                fit_videos();
                post_comments();
                password_protect_form();
                ajax_links();
                post_image_floats();
                $().find_popup_images();
                slideshow();
                reload_scripts();
                setTimeout(function() {
                    $(window).scrollTop(scroll_position);
                }, AnimationSpeed + 250);
                scrollpostion();
            }, AnimationSpeed);
        });
    });
    //END Load pages via ajax using browser back/forward button

	$().find_popup_images();

    //Home slideshow
    //TODO: - expand this with ajax loading

    var timer;
    var number_of_slides;

    function slideshow() {
        number_of_slides = $('#slider a').length;
        clearInterval(timer);
        if (number_of_slides > 1) {
            $('#slider > :gt(0)').hide();
            timer = setInterval(function() {
                $('#slider > :first-child').fadeOut().next().fadeIn().end().appendTo('#slider');
            }, 3000);
        }
    }
    slideshow();
    //END Home slideshow

    //show more info
    //TODO: do we need photo-link-info-close?
    $(document).on('click', '.info-toggle, .info-photo', function(event) {
        event.preventDefault();
        if ($('.info').hasClass('loaded')) {
            $('.info').removeClass('loaded');
            $('.photo-link-info').removeClass('photo-link-info-close');
            $('html, body').animate({ scrollTop: 0 }, AnimationSpeed);

        } else {
            $('.info').addClass('loaded');
            var HeaderHeight = $('header').innerHeight();
            var AdminBarHeight = $('#wpadminbar').innerHeight();
            $('html, body').animate({
                scrollTop: $('.info').offset().top - (HeaderHeight + AdminBarHeight)
            }, AnimationSpeed);
            $('.photo-link-info').addClass('photo-link-info-close');
        }
    });
    $(window).scroll(function(event) {
        var scroll = $(window).scrollTop();
        //console.log(scroll);
        if (scroll === 0) {
            $('.info').removeClass('loaded');
        } else {
            $('.info').addClass('loaded');
        }
    });
    //END show more info

    //Archives info
    function archives_info() {
    	var scroll_up_speed;
        var $info_toggle_archives = $('.info-toggle-archives');
        $info_toggle_archives.unbind("click");
        $info_toggle_archives.click(function(e) {
            $('nav').slideUp(AnimationSpeed);
            $('.search-form').slideUp(AnimationSpeed);
            $('.filter').slideUp(AnimationSpeed);
            $('.connect').slideUp(AnimationSpeed);
            $('html, body').animate({ scrollTop: 0 }, AnimationSpeed);
	        var top = $(document).scrollTop();
	        if ( top > 100 ) {
	        	scroll_up_speed = AnimationSpeed;
	        } else {
	        	scroll_up_speed = 0;
	        }
	        setTimeout(function(){
	            $('.cat-description').slideToggle(AnimationSpeed);
	        }, scroll_up_speed);
        });
    }
    archives_info();
    //END Archives info

    // Continuous scroll.
    // TODO: trigger load not picked up on android.
    function load_more() {
        if (AmbientLightParams.continuous_scroll === '1') {
            if ($("#grid").length) {
                var tempPage = window.location.href.split('/page/');
                if (tempPage[1] !== undefined) {
                    var page = parseInt(tempPage[1]) + 1;
                } else {
                    page = 2;
                }
                var loading = false;
                var scrollHandling = {
                    allow: true,
                    reallow: function() {
                        scrollHandling.allow = true;
                    },
                    delay: 0 //(milliseconds) adjust to the highest acceptable value
                };
                $(window).scroll(function() {
                    if (!loading && scrollHandling.allow) {
                        if (page <= AmbientLightParams.number_of_pages) {
                            scrollHandling.allow = false;
                            setTimeout(scrollHandling.reallow, scrollHandling.delay);
                            var scrollHeight = $(document).height();
                            var scrollPosition = $(window).height() + $(window).scrollTop();
                            if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
                                if ($("#grid").length) {
                                    var SearchBit = window.location.href.split('?')[1];
                                    var NotSearchBit = window.location.href.split('/?')[0];
                                    var tempURL = NotSearchBit.split('/page/')[0];
                                    if (SearchBit !== undefined) {
                                        var tempSearchBit = '?' + SearchBit;
                                    } else {
                                        tempSearchBit = '';
                                    }
                                    window.history.pushState(null, null, tempURL + '/page/' + page + tempSearchBit);
                                }
                                loading = true;
                                NProgress.start();
                                //console.log (AmbientLightParams.query);
                                var data = {
                                    action: 'be_ajax_load_more',
                                    page: page,
                                    query: AmbientLightParams.query,
	                                nonce: AmbientLightParams.nonce,
                                };
                                $.post(AmbientLightParams.ajax_url, data, function(res) {
                                    if (res.success) {

                                        $('.new-items').append(res.data);
                                        var options = {
                                            method: 'append', // One of 'append', or 'prepend'.
                                            clone: false // Whether to clone elements or move them.
                                        };
                                        var someItems = document.querySelectorAll('.new-items .grid-item');
                                        savvior.addItems('#grid', someItems, options, function(grid) {});
                                        var imgLoad = imagesLoaded('.new-items');
                                        imgLoad.on('progress', function(instance, image) {
                                            var result = image.isLoaded ? 'loaded' : 'broken';
                                            setTimeout(function() {
                                                image.img.style.display = "block";
                                            }, AnimationSpeed);
                                            setTimeout(function() {
                                                for (i = 0; i < 100; i++) {
                                                    if (i === 100) { break }
                                                    image.img.style.opacity = i / 10;
                                                }
                                            }, AnimationSpeed * 2);
                                            NProgress.done();
                                        });
                                        archives_zoom_hover();
                                        setTimeout(function() {
                                            loading = false;
                                        }, AnimationSpeed);

                                        page = page + 1;
                                    } else {
                                        // console.log(res);
                                    }
                                }).fail(function(xhr, textStatus, e) {
                                    // console.log(xhr.responseText);
                                });
                            }
                        }
                    }
                });
            }
        }
    }
    setTimeout(function() {
        load_more();
    }, AnimationSpeed);
    //END Continuous scroll

    //comment form remove errors
    function comment_form_remove_errors() {
        //comment area focus
        $('#commentarea').focus(function() {
            $('#commentarea').removeClass('error');
        });
        //email focus
        $('#email').focus(function() {
            $('#email').removeClass('error');
        });
        //author focus
        $('#author').focus(function() {
            $('#author').removeClass('error');
        });
    }
    //END comment form remove errors

    //Load comments
    $(document).on('click', '.load-more-comments', function(event) {
        event.preventDefault();
        NProgress.start();
        $('.filter, .search-form, nav, .connect').slideUp(AnimationSpeed);
        var page_number = $(this).attr('data-page');
        i = 0;
        interval = setInterval(function() {
            i = ++i % 4;
            $(".load-more-comments").html("<p style='margin: 0 0 1.5rem 0;'>Loading" + Array(i + 1).join(".") + "</p>");
        }, AnimationSpeed);

        $(this).addClass('finished-loading');
        jQuery.ajax({
            url: AmbientLightParams.ajax_url,
            type: 'POST',
            data: {
                'action': 'get_comments', // must be provided
                'post_id': AmbientLightParams.post_id,
                'page_number': parseInt(page_number) + 1,
	            'nonce': AmbientLightParams.nonce,
            },
            success: function(result) {
                clearInterval(interval);
                $('.finished-loading').hide();
                //$( ".comment-wrapper" ).append( result );

                $('.comment-list').append(($($.parseHTML(result)).find(".comment-list").html()));
                imageLoading();
                if ($.isFunction(window.reset_colors)) {
                    reset_colors(AmbientLightParams.colors); //send to function on theme-customizer.js
                }
            }
        });
    });
    //END Load comments

    //Post Comments
    // TODO: comment reply link does not work after posting a reply comment
    function post_comments() {
        var commentform = $('#commentform');
        commentform.submit(function() {
            NProgress.start();
            var name = $('input#author').attr('placeholder');
            var email = $('input#email').attr('placeholder');
            var name_text = $('input#author').val();
            var email_text = $('input#email').val();
            var text_text = $('textarea#commentarea').val();
            var text = $('textarea#commentarea').attr('placeholder');
            if (name == "Name (required)" && name_text == "") {
                $('#author').addClass('error');
                NProgress.done();
                comment_form_remove_errors();
                return false;
            }
            if (email == "Email - never published (required)" && email_text == "") {
                $('#email').addClass('error');
                NProgress.done();
                comment_form_remove_errors();
                return false;
            }
            if (text == "Leave a comment" && text_text == "") {
                $('#commentarea').addClass('error');
                NProgress.done();
                comment_form_remove_errors();
                return false;
            }
            var formdata = commentform.serialize();
            var formurl = commentform.attr('action');
            $.ajax({
                type: 'post',
                url: formurl,
                data: formdata,
                error: function(XMLHttpRequest, textStatus, errorThrown) {

                },
                success: function(data, textStatus) {
                    var comment_data = $.parseJSON(data);
                    if (comment_data.status.success === "true") {
                        jQuery.ajax({
                            url: AmbientLightParams.ajax_url,
                            type: 'POST',
                            data: {
                                'action': 'get_comments', // must be provided
                                'post_id': AmbientLightParams.post_id,
                                'page_number': comment_data.pageNumber,
	                            nonce: AmbientLightParams.nonce,
                            },
                            success: function(result) {
                                $('.comment-list').html(($($.parseHTML(result)).find('.comment-list').html()));
                                $('h3.comment-count').html(($($.parseHTML(result)).find('h3.comment-count').html()));
                                $('#commentarea').val('');
                                var HeaderHeight = $('header').innerHeight();
                                var AdminBarHeight = $('#wpadminbar').innerHeight();
                                $("html, body").animate({ scrollTop: $('#comment-' + comment_data.data.comment_ID).offset().top - (HeaderHeight + AdminBarHeight + 10) }, AnimationSpeed);
                                $('#comment-' + comment_data.data.comment_ID).css('backgroundColor', 'red');
                                setTimeout(function() {
                                    $('#comment-' + comment_data.data.comment_ID).css('backgroundColor', 'transparent');
                                }, AnimationSpeed * 2);
                                NProgress.done();
                                gravatar_image();
                                imageLoading();

                            }
                        });
                    } else {
                        commentform.find('textarea[name=comment]').val('');
                    }
                }
            });
            return false;
        });
    }
    post_comments();
    //END Post Comments

    //Password protect form
    function password_protect_form() {
        var passwordform = $('.post-password-form');
        passwordform.submit(function() {
            NProgress.start();
            var formdata = passwordform.serialize();
            var formurl = passwordform.attr('action');
            $.ajax({
                type: 'post',
                url: formurl,
                data: formdata,
                error: function(XMLHttpRequest, textStatus, errorThrown) {

                },
                success: function(data, textStatus) {
                    //console.log (data);
                    NProgress.start();
                    jQuery.ajax({
                        url: AmbientLightParams.ajax_url,
                        type: 'POST',
                        success: function(result) {
                            $('#container').html(($($.parseHTML(data)).find(".content").html()));
                            NProgress.done();
                            var wrong_password = $($.parseHTML(data)).find(".post-password-form").html();
                            var $AjaxError = $('.ajax-error');
                            if (wrong_password !== undefined) {
                                $AjaxError.append('<div class="ajax-error-item"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Wrong Password</div>');
                                $AjaxError.slideDown(AnimationSpeed);
                                $(".close").click(function() {
                                    $AjaxError.slideUp(AnimationSpeed);
                                    $('.ajax-error-item').remove();
                                });
                            } else {
                                $('.ajax-error-item').remove();
                                $AjaxError.css('background-color', 'green');
                                $AjaxError.append('<div class="ajax-error-item"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Logged in</div>');
                                setTimeout(function() {
                                    $AjaxError.slideUp(AnimationSpeed);
                                    setTimeout(function() {
                                        $('.ajax-error-item').remove();
                                        $AjaxError.css('background-color', 'red');
                                    }, AnimationSpeed)
                                }, 4000);
                            }
                            menu_update();
                            savvior_grid();
                            archives_info();
                            scrollpostion();
                            load_more();
                            fit_videos();
                            password_protect_form();
                            imageLoading();
                            ajax_links();
	                        $().find_popup_images();
	                        post_image_floats();
                            slideshow();
                            reload_scripts();
                        }
                    });
                }
            });
            return false;
        });
    }
    password_protect_form();
    //END Post Comments

    //update gravitar
    function gravatar_image() {
        $('#email').blur(function() {
            var email = $('input#email').val();
            var emailtrimmed = $.trim(email);
            $(".gravitar-head-form").attr({ src: "http://www.gravatar.com/avatar/" + get_gravatar('' + emailtrimmed + '', 94) + "?s=94&d=mm" });
        });
    }
	gravatar_image();
    //END update gravitar

    //get gravitar
    function get_gravatar(email, size) {
        var MD5 = function(s) //noinspection JSConstructorReturnsPrimitive
            {
                function L(k, d) {
                    return (k << d) | (k >>> (32 - d))
                }

                function K(G, k) {
                    var I, d, F, H, x;
                    F = (G & 2147483648);
                    H = (k & 2147483648);
                    I = (G & 1073741824);
                    d = (k & 1073741824);
                    x = (G & 1073741823) + (k & 1073741823);
                    if (I & d) {
                        return (x ^ 2147483648 ^ F ^ H)
                    }
                    if (I | d) {
                        if (x & 1073741824) {
                            return (x ^ 3221225472 ^ F ^ H)
                        } else {
                            return (x ^ 1073741824 ^ F ^ H)
                        }
                    } else {
                        return (x ^ F ^ H)
                    }
                }

                function r(d, F, k) {
                    return (d & F) | ((~d) & k)
                }

                function q(d, F, k) {
                    return (d & k) | (F & (~k))
                }

                function p(d, F, k) {
                    return (d ^ F ^ k)
                }

                function n(d, F, k) {
                    return (F ^ (d | (~k)))
                }

                function u(G, F, aa, Z, k, H, I) {
                    G = K(G, K(K(r(F, aa, Z), k), I));
                    return K(L(G, H), F)
                }

                function f(G, F, aa, Z, k, H, I) {
                    G = K(G, K(K(q(F, aa, Z), k), I));
                    return K(L(G, H), F)
                }

                function D(G, F, aa, Z, k, H, I) {
                    G = K(G, K(K(p(F, aa, Z), k), I));
                    return K(L(G, H), F)
                }

                function t(G, F, aa, Z, k, H, I) {
                    G = K(G, K(K(n(F, aa, Z), k), I));
                    return K(L(G, H), F)
                }

                function e(G) {
                    var Z;
                    var F = G.length;
                    var x = F + 8;
                    var k = (x - (x % 64)) / 64;
                    var I = (k + 1) * 16;
                    var aa = Array(I - 1);
                    var d = 0;
                    var H = 0;
                    while (H < F) {
                        Z = (H - (H % 4)) / 4;
                        d = (H % 4) * 8;
                        aa[Z] = (aa[Z] | (G.charCodeAt(H) << d));
                        H++
                    }
                    Z = (H - (H % 4)) / 4;
                    d = (H % 4) * 8;
                    aa[Z] = aa[Z] | (128 << d);
                    aa[I - 2] = F << 3;
                    aa[I - 1] = F >>> 29;
                    return aa
                }

                function B(x) {
                    var k = "",
                        F = "",
                        G, d;
                    for (d = 0; d <= 3; d++) {
                        G = (x >>> (d * 8)) & 255;
                        F = "0" + G.toString(16);
                        k = k + F.substr(F.length - 2, 2)
                    }
                    return k
                }

                function J(k) {
                    k = k.replace(/rn/g, "n");
                    var d = "";
                    for (var F = 0; F < k.length; F++) {
                        var x = k.charCodeAt(F);
                        if (x < 128) {
                            d += String.fromCharCode(x)
                        } else {
                            if ((x > 127) && (x < 2048)) {
                                d += String.fromCharCode((x >> 6) | 192);
                                d += String.fromCharCode((x & 63) | 128)
                            } else {
                                d += String.fromCharCode((x >> 12) | 224);
                                d += String.fromCharCode(((x >> 6) & 63) | 128);
                                d += String.fromCharCode((x & 63) | 128)
                            }
                        }
                    }
                    return d
                }

                var C = Array();
                var P, h, E, v, g, Y, X, W, V;
                var S = 7,
                    Q = 12,
                    N = 17,
                    M = 22;
                var A = 5,
                    z = 9,
                    y = 14,
                    w = 20;
                var o = 4,
                    m = 11,
                    l = 16,
                    j = 23;
                var U = 6,
                    T = 10,
                    R = 15,
                    O = 21;
                s = J(s);
                C = e(s);
                Y = 1732584193;
                X = 4023233417;
                W = 2562383102;
                V = 271733878;
                for (P = 0; P < C.length; P += 16) {
                    h = Y;
                    E = X;
                    v = W;
                    g = V;
                    Y = u(Y, X, W, V, C[P + 0], S, 3614090360);
                    V = u(V, Y, X, W, C[P + 1], Q, 3905402710);
                    W = u(W, V, Y, X, C[P + 2], N, 606105819);
                    X = u(X, W, V, Y, C[P + 3], M, 3250441966);
                    Y = u(Y, X, W, V, C[P + 4], S, 4118548399);
                    V = u(V, Y, X, W, C[P + 5], Q, 1200080426);
                    W = u(W, V, Y, X, C[P + 6], N, 2821735955);
                    X = u(X, W, V, Y, C[P + 7], M, 4249261313);
                    Y = u(Y, X, W, V, C[P + 8], S, 1770035416);
                    V = u(V, Y, X, W, C[P + 9], Q, 2336552879);
                    W = u(W, V, Y, X, C[P + 10], N, 4294925233);
                    X = u(X, W, V, Y, C[P + 11], M, 2304563134);
                    Y = u(Y, X, W, V, C[P + 12], S, 1804603682);
                    V = u(V, Y, X, W, C[P + 13], Q, 4254626195);
                    W = u(W, V, Y, X, C[P + 14], N, 2792965006);
                    X = u(X, W, V, Y, C[P + 15], M, 1236535329);
                    Y = f(Y, X, W, V, C[P + 1], A, 4129170786);
                    V = f(V, Y, X, W, C[P + 6], z, 3225465664);
                    W = f(W, V, Y, X, C[P + 11], y, 643717713);
                    X = f(X, W, V, Y, C[P + 0], w, 3921069994);
                    Y = f(Y, X, W, V, C[P + 5], A, 3593408605);
                    V = f(V, Y, X, W, C[P + 10], z, 38016083);
                    W = f(W, V, Y, X, C[P + 15], y, 3634488961);
                    X = f(X, W, V, Y, C[P + 4], w, 3889429448);
                    Y = f(Y, X, W, V, C[P + 9], A, 568446438);
                    V = f(V, Y, X, W, C[P + 14], z, 3275163606);
                    W = f(W, V, Y, X, C[P + 3], y, 4107603335);
                    X = f(X, W, V, Y, C[P + 8], w, 1163531501);
                    Y = f(Y, X, W, V, C[P + 13], A, 2850285829);
                    V = f(V, Y, X, W, C[P + 2], z, 4243563512);
                    W = f(W, V, Y, X, C[P + 7], y, 1735328473);
                    X = f(X, W, V, Y, C[P + 12], w, 2368359562);
                    Y = D(Y, X, W, V, C[P + 5], o, 4294588738);
                    V = D(V, Y, X, W, C[P + 8], m, 2272392833);
                    W = D(W, V, Y, X, C[P + 11], l, 1839030562);
                    X = D(X, W, V, Y, C[P + 14], j, 4259657740);
                    Y = D(Y, X, W, V, C[P + 1], o, 2763975236);
                    V = D(V, Y, X, W, C[P + 4], m, 1272893353);
                    W = D(W, V, Y, X, C[P + 7], l, 4139469664);
                    X = D(X, W, V, Y, C[P + 10], j, 3200236656);
                    Y = D(Y, X, W, V, C[P + 13], o, 681279174);
                    V = D(V, Y, X, W, C[P + 0], m, 3936430074);
                    W = D(W, V, Y, X, C[P + 3], l, 3572445317);
                    X = D(X, W, V, Y, C[P + 6], j, 76029189);
                    Y = D(Y, X, W, V, C[P + 9], o, 3654602809);
                    V = D(V, Y, X, W, C[P + 12], m, 3873151461);
                    W = D(W, V, Y, X, C[P + 15], l, 530742520);
                    X = D(X, W, V, Y, C[P + 2], j, 3299628645);
                    Y = t(Y, X, W, V, C[P + 0], U, 4096336452);
                    V = t(V, Y, X, W, C[P + 7], T, 1126891415);
                    W = t(W, V, Y, X, C[P + 14], R, 2878612391);
                    X = t(X, W, V, Y, C[P + 5], O, 4237533241);
                    Y = t(Y, X, W, V, C[P + 12], U, 1700485571);
                    V = t(V, Y, X, W, C[P + 3], T, 2399980690);
                    W = t(W, V, Y, X, C[P + 10], R, 4293915773);
                    X = t(X, W, V, Y, C[P + 1], O, 2240044497);
                    Y = t(Y, X, W, V, C[P + 8], U, 1873313359);
                    V = t(V, Y, X, W, C[P + 15], T, 4264355552);
                    W = t(W, V, Y, X, C[P + 6], R, 2734768916);
                    X = t(X, W, V, Y, C[P + 13], O, 1309151649);
                    Y = t(Y, X, W, V, C[P + 4], U, 4149444226);
                    V = t(V, Y, X, W, C[P + 11], T, 3174756917);
                    W = t(W, V, Y, X, C[P + 2], R, 718787259);
                    X = t(X, W, V, Y, C[P + 9], O, 3951481745);
                    Y = K(Y, h);
                    X = K(X, E);
                    W = K(W, v);
                    V = K(V, g)
                }
                var i = B(Y) + B(X) + B(W) + B(V);
                return i.toLowerCase()
            };

        var size = size || 80;

        return MD5(email);
    }
    //END get gravitar

});