$(function() {

  // Login validation
  /*
  $('#login_form').validate({
    console.log("yy");
    rules:
    {
      password: {
        required: true,
      },
      email: {
        required: true,
        email: true
      },
    },
      messages:
      {
        password: {
          required: 'Vennligst fyll inn passordet ditt'
        },
        email: 'Vennligst fyll inn email adressen din',
      },
      submitHandler: submitForm
  });
  */

  // Login submit
  function submitForm() {
    var data = $('#login_form').serialize();

    $.ajax({
      type: 'POST',
      url: 'login.php',
      data: data,
      beforeSend: function()
      {
        //Fix
      },
      success: function (response)
      {
        if (response == 'ok') {
          //fix
        } else {
          //fix
        }
      }
    });
    return false;
  }

});
