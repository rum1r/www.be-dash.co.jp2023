$(document).ready(function(){
	
	//smooth scroll
	$("a.scroll").click(function(){
		var Hash = $(this.hash);
		var HashOffset = $(Hash).offset().top-20;
		$("html,body").animate({ scrollTop: HashOffset}, 'slow','swing');
		return false;
	});

	
});

