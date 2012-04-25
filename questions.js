jQuery(function(){
  $('.question:last-child').show();

  // Disable all submit buttons.
  $('input[type=submit]').attr('disabled', 'disabled');

  // Enable all submit buttons when radio button is clicked.
  $(':radio').click(function() {
    var button = $(this).parents('form').find('input[type=submit]')
    button.removeAttr('disabled');
    button.removeAttr('title');
  });

  // Color given/correct answer according to correctness.
  $('form').submit(function() {
    var answer = $(this).find(':radio:checked');
    var text = answer.siblings('label').html();
    var header = answer.parents('.question').children('h1');

    if (answer.attr('value') == 1) {
      header.after('<span class="correct">' + text + '</span>')
    } else {
      var correct = $(this).find(':radio[value=1]').siblings('label').html();
      header.after('<span class="correct">' + correct + '</span>')
      header.after('<span class="incorrect">' + text + '</span>')
    }

    $(this).siblings('h1').css('color', '#999');
    $(this).siblings('a').css('display', 'block');
    var next = $(this).parents('.question').prev()
    next.slideDown(500);
    $(this).remove();
    return false;
  });

  $('a').click(function() {
    $(this).siblings('div').slideDown();
  });
});
