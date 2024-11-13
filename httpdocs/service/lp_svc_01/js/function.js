$(document).ready(function(){

	// aÉ^ÉOÇÃì_ê¸Çè¡Ç∑
	$("a").bind("focus",function(){
		if(this.blur)this.blur();
	});

	// roll over
	$("img.imgover").hover(function(){
		$(this).attr('src', $(this).attr('src').replace('_off', '_on'));
		}, function(){
			if (!$(this).hasClass('currentPage')) {
			$(this).attr('src', $(this).attr('src').replace('_on', '_off'));
		}
	});

	// roll over opacity
	$("img.imgopacity").hover(function(){	
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

$(function(){
	$("img#nana3").css("display","none");
	$("img#nana4").css("display","none");
	$("img#nana6").css("display","none");
});
$(document).ready(function(){
	$('body').waypoint(function(event,direction){
		$('img#img_h2-1').animate({left:'0'},500,"swing");
		//$('img#img_h2-1').animate(
//			{opacity: "toggle"},
//			{duration: "slow", easing: "easeInBounce",
//				complete: function(){
//					$(this).css("opacity", "0.5");
//     				$(this).css("filter", "alpha(opacity=50)");
//    				$(this).fadeTo("fast", 1.0);
//				}
//			}
//		);
		$('img#nana1').animate({left:'300'},600,"swing");
		$('img#nana2').animate({left:'100'},800,"swing");
	});
	$('#content-1 .content-inner').waypoint(function(event,direction){
		$('img#nana3').fadeIn(800);
	});
	$('#content-2 #title-h2_3').waypoint(function(event,direction){
		$('img#nana4').fadeIn(800);
	});
	$('#content-3 #title-h2_3').waypoint(function(event,direction){
		$('img#nana5').animate({left:'460'},500,"easeInExpo");
	});
	$('#content-3 .content-sub').waypoint(function(event,direction){
		$('img#nana6').fadeIn(800);
	});
	$('#content-3 .content-sub').waypoint(function(event,direction){
		$('dd').animate({left:'3000'},37000);
	});
});
//$(document).ready(function(){
//	$(window).load(function(event,direction){
//		$('img#nana5').animate({left:'10'},370);
//		$('img#tl2').animate({left:'3000'},40000);
//		$('img#tl3').animate({left:'3000'},35000);
//		$('img#tl4').animate({left:'3000'},30000);
//		$('img#tl5').animate({right:'3000'},70000);
//	});
//});