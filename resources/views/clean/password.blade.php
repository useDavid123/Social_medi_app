@extends("lay")




@section("content")
    <div class="container-contact100">
        <div class="contact100-map" id="google_map" data-map-x="40.722047" data-map-y="-73.986422" data-pin="images/icons/map-marker.png" data-scrollwhell="0" data-draggable="1"></div>

        <div class="wrap-contact100">
            <div class="contact100-form-title" style="background-image: url(images/bg-01.jpg);">
				<span class="contact100-form-title-1">
					Password Reset
				</span>

                <span class="contact100-form-title-2">
                    input your details
				</span>
            </div>




            <form class="contact100-form validate-form" action="/password/confirm" method="post">
                <?php if (isset($_GET['message']) && $_GET['message'] != "") { ?>
                <div class="label label-danger"><?= $_GET['message']?></div>
                <?php }?>
                <?php if (isset($_GET['message2']) && $_GET['message2'] != "") { ?>
                <div class="label label-danger"><?= $_GET['message2']?></div>
                <?php }?>
                {{ csrf_field() }}
                <div class="wrap-input100 validate-input" data-validate="fullname is required">
                    <span class="label-input100">Fullname</span>
                    <input class="input100" type="text" name="fullname" placeholder="Enter username" required>
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = " fullname is required: ">
                    <span class="label-input100">Email:</span>
                    <input class="input100" type="email" name="email" placeholder="Enter email" required>
                    <span class="focus-input100"></span>
                </div>


                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>

                    </button>
                </div>
               <h3>Password link will be sent to your email</h3>
                @include("error")
            </form>
        </div>
    </div>



    <div id="dropDownSelect1"></div>
@endsection
