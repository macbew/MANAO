
//  Authorization

$('.login-btn').click(function (e) {
  e.preventDefault();

  let login = $('input[name="login"]').val(),
    password = $('input[name="password"]').val()

  $.ajax({
    url: 'vendor/signIn.php',
    type: 'POST',
    dataType: 'json',
    data: {
      login: login,
      password: password
    },
    success(data) {
      if (data.status) {

        document.location.href = '/profile.php'
      }
      $(`.error`).addClass('none');
      $(`.${data.message}`).removeClass('none');
      console.log(data.message);
    }
  });
})


//  Registration


$('.registr-btn').click(function (e) {
  e.preventDefault();

  let login = $('input[name="login"]').val(),
      password = $('input[name="password"]').val(),
      confirm_password = $('input[name="confirm_password"]').val(),
      email = $('input[name="email"]').val(),
      name = $('input[name="name"]').val();

  $.ajax({
    url: 'vendor/signUp.php',
    type: 'POST',
    dataType: 'json',
    data: {
      login: login,
      password: password,
      confirm_password: confirm_password,
      email: email,
      name: name,
    },
    success(data) {
      // console.log(data.status);
      if (data.status) {
        document.location.href = '/profile.php'
      }
      $(`.error`).addClass('none');
      $(`.${data.field}`).removeClass('none');
      $(`.${data.field}`).text(data.message);
    }
  });
})