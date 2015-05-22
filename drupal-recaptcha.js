(function ($, window, document) {

Drupal.behaviors.recaptcha = {
  attach: function (context, settings) {
    $('.g-recaptcha', context).each(function() {
      if (typeof grecaptcha == 'undefined') {
        return;
      }
      if ($(this).hasClass('drupal-recaptcha-processed')) {
        grecaptcha.reset();
      }
      else {
        grecaptcha.render(this, $(this).data());
        $(this).addClass('drupal-recaptcha-processed');
      }

    });
  }
}

window.drupalRecaptchaOnload = function() {
  $('.g-recaptcha').each(function() {
    grecaptcha.render(this, $(this).data());
  });
}
})(jQuery, window, document);
