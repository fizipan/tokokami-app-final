$(window).scroll(function () {
  let wscroll = $(this).scrollTop();
  const sectionProductSave = $('#cart-save');
  const cardInfo = $('.payment-info');

  if (wscroll > sectionProductSave.offset().top - 200) {
    cardInfo.addClass('toggled');
  } else {
    cardInfo.removeClass('toggled');
  }
});
