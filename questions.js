jQuery(function(){
  var first = true;
  $('.question').each(function() {
    if (first == false) {
      $(this).hide();
    } else {
      first = false;
    }
  });

  // Disable all submit buttons.
  $('input[type=submit]').attr('disabled', 'disabled');

  // Enable all submit buttons when radio button is clicked.
  $(':radio').click(function() {
    $('input[type=submit]').removeAttr('disabled');
  });
});
