$(document).scroll(function () {
  let navbar = $('.navbar-fixed-top');
  navbar.toggleClass('scrolled', $(this).scrollTop() > navbar.height());
});
