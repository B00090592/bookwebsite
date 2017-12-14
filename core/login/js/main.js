$(function(){
	"use strict";

	var fullscreen = $(window).height();

	$(".fullscreen").css( "height", fullscreen);

	$(window).resize(function() {
		$(".fullscreen").css( "height", fullscreen);
	});

	$('.coming-wrapper').pagepiling({
	    menu: null,
	    anchors: ['welcome', 'subscribe'],
	    navigation: false
	});

	/*=================================================================
	    Remove Placeholder On click
	=================================================================*/

	$('input').focusin(function(){
        $('input').data('holder',$(this).attr('placeholder'));
        $(this).attr('placeholder','');
    });
    $('input').focusout(function(){
        $(this).attr('placeholder',$(this).data('holder'));
    });
});