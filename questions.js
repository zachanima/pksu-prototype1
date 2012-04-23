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
      answer.parents('.question').children('h1').after('<span class="correct">' + text + '</span>')
    } else {
      answer.parents('.question').children('h1').after('<span class="incorrect">' + text + '</span>')
      var correct = $(':radio[value=1]').siblings('label').html();
      answer.parents('.question').children('h1').after('<span class="correct">' + correct + '</span>')
    }

    $(this).siblings('h1').css('color', '#999');
    $(this).siblings('a').css('display', 'block');
    $(this).remove();
    return false;
  });
});
