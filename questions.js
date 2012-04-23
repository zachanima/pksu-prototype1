jQuery(function(){
  var first = true;
  $('.question').each(function() {
    if (first == false) {
      $(this).hide();
    } else {
      first = false;
    }
  });
});
