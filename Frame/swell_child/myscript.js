//カスタマイズ用スクリプト
// 最初に、ビューポートの高さを取得し、0.01を掛けて1%の値を算出して、vh単位の値を取得
let vh = window.innerHeight * 0.01;
// カスタム変数--vhの値をドキュメントのルートに設定
document.documentElement.style.setProperty('--vh', `${vh}px`);

// ビューポートリサイズ
window.addEventListener('resize', () => {

  let vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);
});

jQuery(function ($) {
  var header_menubtn = $('.l-header__menuBtn');
  var header_icon_border = $('.icon-menu-thin');
  var header = $('.l-header');
  var top_concept_block = $('.top-concept-col');
  const scrollTime = 700;

  /* window scroll function start*/
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      header_icon_border.addClass('scroll');
      header_menubtn.addClass('scroll');
	    header.addClass('scroll');
    } else {
      header_icon_border.removeClass('scroll');
      header_menubtn.removeClass('scroll');
	    header.removeClass('scroll');
    }
  });
  /* window scroll function end*/

  /*トップページのScrollボタン スクロール*/
  $('#hero-scroll').on('click',function(){
      const conceptTop = top_concept_block.offset().top;
      $("html").animate({scrollTop: conceptTop - 174}, { duration: scrollTime, easing: 'swing', });
  });
  /*トップページのScrollボタン スクロール*/

  /*トップへ戻るボタン スクロール*/
  $('#pagetop').on('click',function(){
      const conceptTop = top_concept_block.offset().top;
      $("html").animate({scrollTop: 0}, { duration: scrollTime, easing: 'swing', });
  });
 /*トップへ戻るボタン スクロール*/

});
