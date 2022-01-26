<!DOCTYPE html>
<html lang="en">
<head>
	<title>Contact V15</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{URL::asset("images/icons/favicon.ico")}}">
<!--===============================================================================================-->
	{{--<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">--}}
	<link rel="stylesheet" type="text/css" href="{{URL::asset( "vendor/bootstrap/css/bootstrap-grid.min.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset( "fonts/font-awesome-4.7.0/css/font-awesome.min.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset( "fonts/Linearicons-Free-v1.0.0/icon-font.min.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset( "vendor/animate/animate.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset( "vendor/css-hamburgers/hamburgers.min.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset( "vendor/animsition/css/animsition.min.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset( "vendor/select2/select2.min.css")}}">
<!--======================================================
=========================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset( "vendor/daterangepicker/daterangepicker.css")}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset( "css/util.css")}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset( "css/main.css")}}">
<!--===============================================================================================-->
</head>
<body>




			@yield("content")
			
<!--===============================================================================================-->
	<script src={{URL::asset( "vendor/jquery/jquery-3.2.1.min.js" ) }} ></script>
<!--===============================================================================================-->
	<script src={{URL::asset( "vendor/animsition/js/animsition.min.js" ) }}></script>
<!--===============================================================================================-->
	<script src={{URL::asset( "vendor/bootstrap/js/popper.js" ) }}></script>
	<script src={{URL::asset( "vendor/bootstrap/js/bootstrap.min.js" ) }}></script>
<!--===============================================================================================-->
	<script src={{URL::asset( "vendor/select2/select2.min.js" ) }}></script>
<!--===============================================================================================-->
	<script src={{URL::asset( "vendor/daterangepicker/moment.min.js" ) }}></script>
	<script src={{URL::asset( "vendor/daterangepicker/daterangepicker.js" ) }}></script>
<!--===============================================================================================-->
	<script src={{URL::asset( "vendor/countdowntime/countdowntime.js" ) }}></script>
<!--===============================================================================================-->
	<script src= "https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes" ></script>
	<script src={{URL::asset( "js/map-custom.js" ) }}></script>
<!--===============================================================================================-->
	<script src={{URL::asset( "js/main.js" ) }}></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
        // var myInput = document.getElementById("password");

        // var number = document.getElementById("number");
        // var length = document.getElementById("length");
		//
        // When the user clicks on the password field, show the message box
        // myInput.onfocus = function() {
        //     document.getElementById("message").style.display = "block";
        // }
		//
        // When the user clicks outside of the password field, hide the message box
        // myInput.onblur = function() {
        //     document.getElementById("message").style.display = "none";
        // }
        // Validate numbers
        // var numbers = /[0-9]/g;
        // if(myInput.value.match(numbers)) {
        //     number.classList.remove("invalid");
        //     number.classList.add("valid");
        // } else {
        //     number.classList.remove("valid");
        //     number.classList.add("invalid");
        // }
		//
        // Validate length
        // if(myInput.value.length >= 6) {
        //     length.classList.remove("invalid");
        //     length.classList.add("valid");
        // } else {
        //     length.classList.remove("valid");
        //     length.classList.add("invalid");
        // }
		//
        // When the user starts to type something inside the password field
        myInput.onkeyup = function() {
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            gtag('js', new Date());

            gtag('config', 'UA-23581568-13');


        }
	</script>
@yield("password")

</body>
</html>
