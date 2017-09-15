/**
 * Ambient Light global functions.
 * TODO: Move all functions from ambient-light.js here that need to be accessed globally.
 */

(function($) {
	"use strict";

	// Find pop-up images.
	$.fn.find_popup_images = function() {

		// magnificPopup single image.
		$('a[href*=".jpg"], a[href*=".jpeg"], a[href*=".png"], a[href*=".gif"]').not('.social-share a, #slider a').each(function() {
			if ($(this).parents('.gallery').length === 0) {
				$(this).magnificPopup({
					type: 'image',
					closeOnContentClick: true,
					showCloseBtn: false,
					fixedContentPos: true,
					callbacks: {
						open: function() {
							$().gallery_keys();
							$('.mfp-container').css('padding', '0');
							$('img.mfp-img').css('padding', '0.5rem');
						},
						close: function() {
							$().post_keys();
						}
					}
				});
			}
		});

		// magnificPopup main image.
		if (!$('.no-popup').length) {
			var image_path = $('.image-format .responsive-full').not('.no-popup').attr('src');
			$('.image-format .photo-link-zoom').magnificPopup({
				closeOnContentClick: true,
				showCloseBtn: false,
				fixedContentPos: true,
				items: {
					src: image_path
				},
				type: 'image',
				callbacks: {
					open: function() {
						$().gallery_keys();
						$('.mfp-container').css('padding', '0');
						$('img.mfp-img').css('padding', '0.5rem');
					},
					close: function() {
						$().post_keys();
					}
				}
			});
			image_path = $('.photo-info-zoom .photo-info').attr('src');
			$('.photo-info-zoom').magnificPopup({
				closeOnContentClick: true,
				showCloseBtn: false,
				fixedContentPos: true,
				items: {
					src: image_path
				},
				type: 'image',
				callbacks: {
					open: function() {
						$().gallery_keys();
						$('.mfp-container').css('padding', '0');
						$('img.mfp-img').css('padding', '0.5rem');
					},
					close: function() {
						$().post_keys();
					}
				}
			});
		}

		// magnificPopup gallery.
		$('.gallery-item').each(function() {
			var titleText = $(this, '.gallery-caption').text();
			$('.gallery-icon a', this).attr('title', titleText);
		});
		$('.gallery').each(function() {
			$(this).magnificPopup({
				delegate: 'a[href*=".jpg"], a[href*=".jpeg"], a[href*=".png"]',
				type: 'image',
				fixedContentPos: true,
				gallery: { enabled: true },
				image: {
					titleSrc: 'title'
				},
				callbacks: {
					open: function() {
						$().gallery_keys();
					},
					close: function() {
						$().post_keys();
					}
				}
			});
		});

		// magnificPopup slider gallery format
		if (!$('.no-popup').length) {
			$('.gallery-format .photo-link-zoom').on('click', function() {
				$('.gallery-format .gallery-slider').magnificPopup('open');
			});
			$('.gallery-format .gallery-slider').each(function() {
				$(this).magnificPopup({
					delegate: 'a',
					type: 'image',
					fixedContentPos: true,
					gallery: { enabled: true },
					image: {
						titleSrc: 'title'
					},
					callbacks: {
						open: function() {
							$().gallery_keys();
						},
						close: function() {
							$().post_keys();
						}
					}
				});
			});
		}
	};

	//Keyboard shortcuts post
	$.fn.post_keys = function () {
		$(document).unbind('keydown');
		$(document).bind('keydown', 'left', function () {
			$('.prev-next .fa-chevron-left').parent().click();
		});
		$(document).bind('keydown', 'right', function () {
			$('.prev-next .fa-chevron-right').parent().click();
		});
	};

	//Keyboard shortcuts gallery
	$.fn.gallery_keys = function () {
		$(document).unbind('keydown');
		$(document).bind('keydown', 'left', function () {
			$('.mfp-arrow-left').click();
		});
		$(document).bind('keydown', 'right', function () {
			$('.mfp-arrow-right').click();
		});
	};

})(jQuery);