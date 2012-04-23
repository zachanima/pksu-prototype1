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

  // Color given/correct answer according to correctness.
  $('form').submit(function() {
    var answer = $(':radio:checked');
    var text = answer.siblings('label').html();

    if (answer.attr('value') == 1) {
      answer.parents('.question').append('<span class="correct">' + text + '</span>')
    } else {
      answer.parents('.question').append('<span class="incorrect">' + text + '</span>')
      var correct = $(':radio[value=1]').siblings('label').html();
      answer.parents('.question').append('<span class="correct">' + correct + '</span>')
    }

    $(this).remove();
    return false;
  });
});
