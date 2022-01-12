const scroll_speed = 600; //スクロールスピード

jQuery(function ($) {

   var pagetop = $('#page-top');
   $('body').toggleClass('visible'); //フェードイン！
   // ボタン非表示
   pagetop.hide();
   pagetop.click(function () {
      $('body, html').animate({ scrollTop: 0 }, scroll_speed);
      return false;
   });

   //ハンバーガーのホバー
    $('.hamburger').hover(
        //ホバーした
        function () {
            $(this).addClass('hover');
        },
        //離れた
        function () {
            $(this).removeClass('hover');
        },
    );

   //ハンバーガーメニューの開閉
	$('.hamburger').click(function() {
        $(this).toggleClass('active');

        if ($(this).hasClass('active')) {
            $('.mytheme-nav').addClass('active');
			 $(this).addClass('hover');

        } else {
            $('.mytheme-nav').removeClass('active');
			$(this).removeClass('hover');

        }
    });

	$('.nav-item').click(function() {
        $('.hamburger').toggleClass('active');

        if ($('.hamburger').hasClass('active')) {
            //$('.hamburger-content').addClass('active');
            //$('.navbar').addClass('active');
            //$('#overlay').css('visibility', 'visible');
            //$('.nav-brand-sp-hidden').addClass('active');
        } else {
            //$('.hamburger-content').removeClass('active');
            //$('.navbar').removeClass('active');
            //$('#overlay').css('visibility', 'hidden');
            //$('.nav-brand-sp-hidden').removeClass('active');
        }
    });



//window resize function start*/
/*
$(window).resize(function () {


});
*/
/* window resize function end*/

/* window scroll function start*/
$(window).scroll(function () {
    scroll_effect();
	if ($(this).scrollTop() > 100) {
           pagetop.fadeIn();
      } else {
           pagetop.fadeOut();
      }
});
/* window scroll function end*/

//ページのトップまでスクロール
function scrollToTop() {
    $("html,body").animate({ scrollTop: 0 }, scroll_speed, "swing");
}

//指定したpageIdの要素までスクロール。ヘッダーのサイズを設定する。
function scrollToPage(pageId) {

    //ヘッダーのサイズを必ず指定
    var headerH = $('.navbar').outerHeight();
    var y = window.pageYOffset;
    var element = document.getElementById(pageId);
    var rect = element.getBoundingClientRect();
    var position = rect.top + y;

    $("html,body").animate({ scrollTop: position - headerH }, scroll_speed, "swing");

}
//スクロールアニメーション
function scroll_effect() {
    //fade-in-up
    $('.fade-in-up').each(function () {
        //.fade-in-upを指定したエレメントのBottom位置がトリガー。
        var elemPos = $(this).offset().top + $(this).outerHeight();
        var scroll = $(window).scrollTop();
        var windowHeight = $(window).height();
        if (elemPos < scroll + windowHeight){
            $(this).addClass('effect-scroll');
        }
    });
    }

});
