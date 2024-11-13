$(document).ready(function(){
	// aタグの点線を消す
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

	//roll over opacity
	$(".imgopacity").hover(function(){
		$(this).fadeTo(100,0.8);
	},function(){
		$(this).fadeTo(100,1)
	});
	//smooth scroll
	$("a.scroll").click(function(){
		var Hash = $(this.hash);
		var HashOffset = $(Hash).offset().top-195;
		$("html,body").animate({ scrollTop: HashOffset}, 'slow','swing');
		return false;
	});

	//Return Top Btn
	$('#rtnTopBtn').hide();
	$(window).scroll(function () {
		if ($(this).scrollTop() > 1000) {
		$('#rtnTopBtn').fadeIn();
		} else {
		$('#rtnTopBtn').fadeOut();
		}
	});

	var tab = $('.followNav'),
	offset = tab.offset();
	$(window).scroll(function () {
		if($(window).scrollTop() > offset.top -1 ) {
		tab.addClass('fixed');
		} else {
		tab.removeClass('fixed');
		}
	});
});







