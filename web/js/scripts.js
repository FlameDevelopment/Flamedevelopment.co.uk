$(document).ready(function(){

	$('.ui.dropdown').dropdown({
    on: 'hover'
	});
	$('.ui.dropdown.custom').dropdown({
    on: 'hover',
    allowAdditions:true
	});
	$('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        asNavFor: '.slider-nav'
    });

    $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: true,
        centerMode: true,
        centerPadding: '3%',
//        arrows: false,
        focusOnSelect: true
    });

    $('.single-item').slick({
        dots: false,
        arrows: true,
    });
});
