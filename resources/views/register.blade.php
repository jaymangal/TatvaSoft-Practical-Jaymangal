<html>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
    .div-form{
        text-align: center;
        /* background: linear-gradient(45deg, black, transparent); */
        width: 50%;
        margin-left: auto;
        margin-right: auto;
    }    
    .msg_error{
      color: red;
    }
    
    </style>
<body>
    <form action="register" method="POST" id="form-register">
        @csrf
        <div class="container">
          <div class="card">
            <div class="card-body">
        <label for="firstname">Firstname</label><br>
        <input type="text" class="form-control" name="firstname" id="firstname_val" />
        <span class="msg_error firstname_err"></span><br>
        <label>Lastname</label><br>
        <input type="text" class="form-control" name="lastname" id="lastname_val" />
        <span class="msg_error lastname_err"></span><br>
        <label>Email</label><br>
        <input type="email" name="email" class="form-control" id="email_val" />
        <span class="msg_error email_err"></span><br>
        <label>Password</label><br>
        <input type="password" name="password" class="form-control" id="password_val" />
        <span class="msg_error password_err"></span><br>
        <button type="submit" class="btn btn-primary" id="register_btn">Register</button>
        <a href="loginview" class="btn btn-warning">Login</a>
            </div>
          </div>
        </div>
    </form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

$('#register_btn').click(function(event){
  event.preventDefault();
    var firstname = $('#firstname_val').val();
    var lastname = $('#lastname_val').val();
    var email = $('#email_val').val();
    var password = $('#password_val').val();
    var email_regex = '/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/';

  /* validate fields */
    if(firstname == ''){
      $('.firstname_err').text("Firstname is required");
    }else if(lastname == ''){
      $('.lastname_err').text("Lastname is required");
    }else if(email == ''){
      $('.email_err').text("Email is required");
    }else if(email.match(email_regex)){
      $('.email_err').text("Please enter valid email address");
    }else if(password == ''){
      $('.password_err').text("Password is required");
    }else{
      $('#form-register').submit();
    }


});


</script>
</html>