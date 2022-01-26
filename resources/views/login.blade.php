<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>Day 001 Login Form</title>


    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>

    <link rel="stylesheet" href="{{URL::asset("css/stylo.css")}}">


</head>

<body>

<div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
        <div class="login-form">
            <div class="sign-in-htm">
                <form action="/posts/signIn/pair" method="post">
                    {{ csrf_field() }}
                <div class="group">
                    <label for="user" class="label">Username</label>
                    <input id="user" type="text" class="input" name="username" required>
                </div>
                <div class="group">
                    <label for="pass" class="label">Password</label>
                    <input id="pass" type="password" class="input" data-type="password" name="password" required>
                </div>
                <div class="group">
                    <input id="check" type="checkbox" class="check" checked>
                    <label for="check"><span class="icon"></span> Keep me Signed in</label>
                </div>
                <div class="group">
                    <input type="submit" class="button" value="Sign In">

                </div> @include("error")
                </form>
                <div class="hr"></div>
                <div class="foot-lnk">
                    <a href="/password">Forgot Password?</a>
                </div>
            </div>
            <div class="sign-up-htm">
                <form action="/posts" method="post" name="form">
                    {{ csrf_field() }}
                <div class="group">
                    <label for="fullname" class="label">Fullname</label>
                    <input   type="text" class="input" name="fullname">
                </div>
                <div class="group">
                    <label for="pass" class="label">Username</label>
                    <input   type="text" class="input" data-type="Username" name="username"required>
                </div>
                    <div class="group">
                        <label for="email" class="label">Email Address</label>
                        <input  type="text" class="input" name="email"  onblur="ValidateEmail(email)" required  >
                    </div>
                <div class="group">
                    <label for="psw" class="label"> Password</label>
                    <input id="psw" type="password" class="input" data-type="password" name="password" pattern="(?=.*\d).{6,}"
                           title="Must contain at least one number , and at least 6 or more characters"
                           required>
                </div>
                    <div class="group">
                        <label for="pass" class="label">Repeat Password</label>
                        <input id="pass2" type="password" class="input" data-type="password" onblur="checkConfirmPassword()">
                    </div>
                <div class="group">
                    <input type="submit" class="button" value="Sign Up">
                </div>
                </form>
                <div class="hr"></div>
                <div class="foot-lnk">
                    <label for="tab-1">Already Member?</label>
                </div>
            </div>
            <div id="message">
                <h3>Password must contain the following:</h3>

                <p id="number" class="invalid">A <b>number</b></p>
                <p id="length" class="invalid">Minimum <b>6 characters</b></p>
            </div>
        </div>
    </div>
</div>


<script src={{URL::asset("js/jquery.min.js")}}></script>
<!-- jQuery Easing -->
<script src={{URL::asset("js/jquery.easing.1.3.js")}}></script>
<!-- Bootstrap -->
<script src={{URL::asset("js/bootstrap.min.js")}}></script>
<!-- Waypoints -->
<script src={{URL::asset("js/jquery.waypoints.min.js")}}></script>
<!-- Main JS -->
<script src={{URL::asset("js/main.js")}}></script>
<script>
    var myInput = document.getElementById("psw");

    var number = document.getElementById("number");
    var length = document.getElementById("length");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {
        // Validate lowercase letters




        // Validate numbers
        var numbers = /[0-9]/g;
        if(myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        // Validate length
        if(myInput.value.length >= 6) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    }
      function checkConfirmPassword() {
        var password = $('#psw').val();
          var cpassword = $('#pass2').val();
          if(password != cpassword){

              alert("Nigga! Password does not match");
          }
      }
      function ValidateEmail(mail)
      {
          if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.email.value)) {

              return (true)
          }

          alert("invalid email")
          return (false)
      }
</script>
</body>

</html>
