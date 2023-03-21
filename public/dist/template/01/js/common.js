// JavaScript Document

// fade
$(function(){
  $('a img').hover(function(){$(this).fadeTo(100,0.8)},function(){$(this).fadeTo(100,1)});
  $('a.opacity').hover(function(){$(this).fadeTo(100,0.8)},function(){$(this).fadeTo(100,1)});
  });

// slick
$(function() {
  $(".box-message .slider")
      .on("init", function(event, slick) {
          $(this).append(
              '<div class="slick-counter">0<span class="count-current"></span> / 0<span class="count-total"></span></div>'
          );
          $(".count-current").text(slick.currentSlide + 1);
          $(".count-total").text(slick.slideCount);
      })
      .slick({
          infinite: true,
          dots: false,
          arrows: true,
          slidesToShow: 1,
          fade: false,
          centerPadding: '0',
          autoplay: false,
          centerMode: false,
          prevArrow: '<div class="btn btn-prev"></div>',
          nextArrow: '<div class="btn btn-next"></div>',
          responsive: [{
              breakpoint: 767,
              settings: {}
          }]
      })
      .on("beforeChange", function(event, slick, currentSlide, nextSlide) {
          $(".count-current").text(nextSlide + 1);
      });
});
