$(document).ready(function () {
  $('.owl-carousel').owlCarousel({
    margin: 20,
    dots: false,
    nav: true,
    responsive: {
      0: {
        items: 2,
        nav: false,
      },
      600: {
        items: 4,
      },
      1000: {
        items: 6,
      },
    },
  });
});
