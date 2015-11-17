  $(function() {
    $( "input[type=submit]" )
      .button()
        .click(function( event ) {
          event.preventDefault();
      });
  });