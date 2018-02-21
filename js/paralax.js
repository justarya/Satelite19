$(document).ready(function(){
  $(window).scroll(function(){
    var windowWidth = $(window).width();
    var scroll = $(window).scrollTop();
    if(windowWidth < 650){
      $('header').css('background-position','bottom ' + scroll +  'px');
    }else if(windowWidth <= 720){
      var windowHeight = 0.40*$(window).height() + scroll/2;
      $('header').css('background-position','center ' + windowHeight +  'px');
    }else if(windowWidth <= 900){
      var windowHeight = 0.30*$(window).height() + scroll/2;
      $('header').css('background-position','center ' + windowHeight +  'px');
    }else if(windowWidth <= 1300){
      var windowHeight = 0.28*$(window).height() + scroll/2;
      $('header').css('background-position','center ' + windowHeight +  'px');
    }else if(windowWidth >= 1300){
      var windowHeight = 0.25*$(window).height() + scroll/2;
      $('header').css('background-position','center ' + windowHeight +  'px');
    }
  });
});
