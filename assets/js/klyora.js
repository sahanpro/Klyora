(function ($) {
  'use strict';

  $(function () {
    var $win = $(window);
    var $nav = $('.klyora-navbar');
    var $overlay = $('.klyora-search-overlay');
    var $announcement = $('.klyora-announcement');

    $win.on('scroll', function () {
      if ($win.scrollTop() > 30) {
        $nav.addClass('is-solid');
      } else {
        $nav.removeClass('is-solid');
      }
    });

    $('.klyora-search-toggle').on('click', function () {
      $overlay.addClass('is-open').attr('aria-hidden', 'false');
      $overlay.find('input[name="s"]').trigger('focus');
    });

    $('.klyora-search-close').on('click', function () {
      $overlay.removeClass('is-open').attr('aria-hidden', 'true');
    });

    $overlay.on('click', function (e) {
      if ($(e.target).is('.klyora-search-overlay')) {
        $overlay.removeClass('is-open').attr('aria-hidden', 'true');
      }
    });

    $('.klyora-announcement__dismiss').on('click', function () {
      $announcement.slideUp(220);
    });

    $('.klyora-back-to-top').on('click', function (e) {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    var data = window.klyoraData || {};
    var mobileNav = '<nav class="klyora-mobile-nav" aria-label="Mobile quick actions"><ul>' +
      '<li><a href="' + (data.homeUrl || '/') + '"><i class="ti-home"></i><span>Home</span></a></li>' +
      '<li><a href="' + (data.shopUrl || '/') + '"><i class="ti-bag"></i><span>Shop</span></a></li>' +
      '<li><a href="#" class="klyora-search-toggle-mobile"><i class="ti-search"></i><span>Search</span></a></li>' +
      '<li><a href="' + (data.wishlistUrl || '#') + '"><i class="ti-heart"></i><span>Wishlist</span></a></li>' +
      '<li><a href="' + (data.accountUrl || '#') + '"><i class="ti-user"></i><span>Account</span></a></li>' +
      '</ul></nav>';

    if (!$('.klyora-mobile-nav').length) {
      $('body').append(mobileNav);
    }

    $(document).on('click', '.klyora-search-toggle-mobile', function (e) {
      e.preventDefault();
      $('.klyora-search-toggle').trigger('click');
    });
  });
})(jQuery);
