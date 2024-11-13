jQuery(document).ready(function($) {
  var windowWidth = window.innerWidth;
	
  $(window).resize(function(){
    windowWidth = window.innerWidth;
    changeSP();
  })
  
  changeSP();
	
  function changeSP(){
    if(windowWidth<=768){ //スマフォの場合
      $("#img03 img").attr("src","img/img03_sp.jpg");
      $("#img04 img").attr("src","img/img04_sp.jpg");
      $("#img05 img").attr("src","img/img05_sp.jpg");
      $("#img06 img").attr("src","img/img06_sp.jpg");
      $("#img07 img").attr("src","img/img07_sp.jpg");
      $(".txt01 img").attr("src","img/txt01_sp.jpg");
      $(".bnr01 img").attr("src","img/bnr_contact_sp.jpg");
      
      //電話リンクをつける
      $('.tel').each(function() {
        var str = $(this).html();
        $(this).html($('<a>').attr('href', 'tel:' + $(this).children().attr('alt').replace(/-/g, '')).append(str + '</a>'));
      });

    } else {	//PCの場合
      $("#img03 img").attr("src","img/img03.jpg");
      $("#img04 img").attr("src","img/img04.jpg");
      $("#img05 img").attr("src","img/img05.jpg");
      $("#img06 img").attr("src","img/img06.jpg");
      $("#img07 img").attr("src","img/img07.jpg");
      $(".txt01 img").attr("src","img/txt01.jpg");
      $(".bnr01 img").attr("src","img/bnr_contact.jpg");
    }
  }
  
})
