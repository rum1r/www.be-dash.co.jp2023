$(document).ready(function(){

	// aƒ^ƒO‚Ì“_ü‚ðÁ‚·
	$("a").bind("focus",function(){
		if(this.blur)this.blur();
	});

	// roll over
	$(".imgover").hover(function(){
		$(this).attr('src', $(this).attr('src').replace('_off', '_on'));
		}, function(){
			if (!$(this).hasClass('currentPage')) {
			$(this).attr('src', $(this).attr('src').replace('_on', '_off'));
		}
	});

	// roll over opacity
	$(".imgopacity").hover(function(){	
	 $(this).fadeTo(100,0.8);
	},function(){
	 $(this).fadeTo(100,1)
	})

	//smooth scroll
	$("a.scroll").click(function(){
		var Hash = $(this.hash);
		var HashOffset = $(Hash).offset().top;
		$("html,body").animate({ scrollTop: HashOffset}, 'slow','swing');
		return false;
	});
});

jQuery(function($) {
	var nav    = $('#nav'),
    offset = nav.offset();
	$(window).scroll(function () {
		if($(window).scrollTop() > offset.top) {
		nav.addClass('fixed_nav');
		} else {
		nav.removeClass('fixed_nav');
		}
	});
});


