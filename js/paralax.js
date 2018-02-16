$(document).ready(function(){
  // $(window).scroll(function(){
  //   var scroll = $(window).scrollTop();
  // });
  // $(window).scroll(function(){
  //   var scroll = $(window).scrollTop();
  //   $('#about-page>.header-content').css({'background-position':'center calc(50% + '+(scroll*.5)+'px)'});
  // });
  $(window).scroll(function(){
    var windowWidth = $(window).width();
    if(windowWidth < 650){
      var scroll = $(window).scrollTop();
      $('header').css('background-position','bottom ' + scroll +  'px');
    }else if(windowWidth < 720){
      var windowHeight = 0.4*$(window).width() + scroll/2;
      $('header').css('background-position','center ' + windowHeight +  'px');
    }else if(windowWidth < 900){
      var windowHeight = 0.3*$(window).width() + scroll/2;
      $('header').css('background-position','center ' + windowHeight +  'px');
    }else if(windowWidth > 1300){
      var scroll = $(window).scrollTop();
      var windowHeight = 0.2*$(window).width() + scroll/2;
      $('header').css('background-position','center ' + windowHeight +  'px');
    }
  });
});
