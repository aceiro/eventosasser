// fix because there is a bug in this code
$(function() {
    $( "input[type=submit]" )
      .button()
        .click(function( event ) {      });
  });

// fix because there is a bug in this code
$(function() {
    $( "input[type=reset]" )
        .button()
        .click(function( event ) {      });
});
