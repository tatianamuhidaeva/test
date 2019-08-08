$(document).ready(function () {

  "use strict";

  $('body').on('submit', 'form.bid__form', function (e) {
 
    if (($(this).find('[name=terms]').is(':checked')) && !$(this).find('[type=submit]').hasClass('disabled')) {

    var form = $(this).serializeArray();
    $.post(
      myajax.url, {
        form: form,
        action: 'bid_form'
      },
      function (data) {
        for (var i = 0; i < $('form.bid__form').length; i++) {
          $('form.bid__form')[i].reset();
        }
        let popup = $('#popup-order');
        popup.removeClass('d-flex');
        popup.css("opacity", "1");
        
        popup = $('#popup-request');
        popup.removeClass('d-flex');
        popup.css("opacity", "1");

        $('#popup-success').addClass('d-flex');
        $('#popup-success').css("opacity", "1");
        $('body').css("overflow", "hidden");
      }
    )
    } else {
      $(this).find('.terms label').addClass('attention');
    } 

    e.preventDefault();
  })
})