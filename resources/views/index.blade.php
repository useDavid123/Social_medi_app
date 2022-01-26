@extends("lay")
@section("content")
    <div class="container-contact100">
        <div class="contact100-map" id="google_map" data-map-x="40.722047" data-map-y="-73.986422" data-pin="images/icons/map-marker.png" data-scrollwhell="0" data-draggable="1"></div>

        <div class="wrap-contact100">
            <div class="contact100-form-title" style="background-image: url(images/bg-01.jpg);">
				<span class="contact100-form-title-1">
					SIGN IN
				</span>

                <span class="contact100-form-title-2">
                    input your details
				</span>
            </div>
			<form class="contact100-form validate-form" action="/posts" method="post">
			{{ csrf_field() }}
                <?php if (isset($_GET['message']) && $_GET['message'] != "") { ?>
                    <div class="label label-danger"><?= $_GET['message']?></div>
                <?php }?>

				<div class="wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">NAME</span>
					<input class="input100" type="text" name="fullname" placeholder="Enter fullname" required>
					<span class="focus-input100"></span>
				</div>
                <div class="wrap-input100 validate-input" data-validate="Name is required">
                    <span class="label-input100"> USERNAME</span>
                    <input class="input100" type="text" name="username" placeholder="Enter username" required>
                    <span class="focus-input100"></span>
                </div>

				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                <span class="label-input100">EMAIL:</span>
                <input class="input100" type="text" name="email" placeholder="Enter Email" required>
                <span class="focus-input100"></span>
            </div>
                <div class="wrap-input100 validate-input" data-validate = "Valid password ">
                    <span class="label-input100">PASSWORD:</span>
                    <input class="input100" type="password" name="password" placeholder="Enter password" id="password" required>
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate = "Valid password ">
                    <span class="label-input100"> CONFIRM PASSWORD:</span>
                    <input class="input100" type="password" name="password2" placeholder="Enter password" id="cpassword" onblur="checkConfirmPassword()" required>
                    <span class="focus-input100"></span>
                </div>


				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" >
 <span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>

                    </button>
                </div>
            </form>

        <a href="/posts/signIn">LOGIN</a>



		</div>
    <div id="message">
        <h3>Password must contain the following:</h3>
        <p id="number" class="invalid">A <b>number</b></p>
        <p id="length" class="invalid">Minimum <b>6 characters</b></p>
    </div>
	</div>
	<div id="dropDownSelect1"></div>

@section("password")
    <script>
    function checkConfirmPassword() {
    var password = $('#password').val();
    var cpassword = $('#cpassword').val();
    if (password != cpassword) {
    // return back()->withErrors(["invalid login credencials"]);
    alert("Nigga! Password doesn't  match");
    }
    }
    @endsection
        </script>
@endsection