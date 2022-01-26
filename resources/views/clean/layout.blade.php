
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clean &mdash; A free HTML5 Template by FREEHTML5.CO</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
    <meta name="author" content="FREEHTML5.CO" />
        {{--<meta http-equiv="refresh" content="20" />--}}

        <!--
          //////////////////////////////////////////////////////

          FREE HTML5 TEMPLATE
          DESIGNED & DEVELOPED by FREEHTML5.CO

          Website:        http://freehtml5.co/
          Email:          info@freehtml5.co
          Twitter:        http://twitter.com/fh5co
          Facebook:       https://www.facebook.com/fh5co

          //////////////////////////////////////////////////////
           -->

  <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Google Webfonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,500' rel='stylesheet' type='text/css'>


        <!-- Animate.css -->
        <link rel="stylesheet" href="{{URL::asset("css/animate.css")}}">
        <!-- Icomoon Icon Fonts-->
        <link rel="stylesheet" href="{{URL::asset("css/icomoon.css")}}">
        <!-- Simple Line Icons -->
        <link rel="stylesheet" href="{{URL::asset("css/simple-line-icons.css")}}">
        <!-- Theme Style -->
        <link rel="stylesheet" href="{{URL::asset("css/style.css")}}">
        <!-- Modernizr JS -->
        <script src="{{URL::asset("js/modernizr-2.6.2.min.js")}}"></script>
        <!-- FOR IE9 below -->
        <!--[if lt IE 9]>
        <script src="{{URL::asset("js/respond.min.js")}}"></script>
        <![endif]-->

        <style>

            /* Three image containers (use 25% for four, and 50% for two, etc) */
            .column {
                float: left;
                width: 33.33%;
                padding: 5px;
            }

            /* Clear floats after image containers */
            .row::after {
                content: "";
                clear: both;
                display: table;
            }
            body {font-family: Arial, Helvetica, sans-serif;}
            * {box-sizing: border-box;}


            /* Button used to open the contact form - fixed at the bottom of the page */


            /* The popup form - hidden by default */
            .form-popup {
                display: none;
                position: fixed;
                bottom: 0;
                right: 15px;
                border: 3px solid #f1f1f1;
                z-index: 9;
            }

            /* Add styles to the form container */
            .form-container {
                max-width: 300px;
                padding: 10px;
                background-color: white;
            }

            /* Full-width input fields */
            .form-container input[type=text], .form-container input[type=password] {
                width: 100%;
                padding: 15px;
                margin: 5px 0 22px 0;
                border: none;
                background: #f1f1f1;
            }

            /* When the inputs get focus, do something */
            .form-container input[type=text]:focus, .form-container input[type=password]:focus {
                background-color: #ddd;
                outline: none;
            }

            /* Set a style for the submit/login button */
            .form-container .btn {
                background-color: red;
                color: white;
                padding: 16px 20px;
                border: none;
                cursor: pointer;
                width: 100%;
                margin-bottom:10px;
                opacity: 0.8;
            }

            /* Add a red background color to the cancel button */
            .form-container .cancel {
                background-color: red;
            }

            /* Add some hover effects to buttons */
            .form-container .btn:hover, .open-button:hover {
                opacity: 2;
            }
            .rslides {
                position: relative;
                list-style: none;
                overflow: hidden;
                width: 100%;
                padding: 0;
                margin: 0;
            }

            .rslides li {
                -webkit-backface-visibility: hidden;
                position: absolute;
                display: none;
                width: 100%;
                left: 0;
                top: 0;
            }

            .rslides li:first-child {
                position: relative;
                display: block;
                float: left;
            }

            .rslides img {
                display: block;
                height: auto;
                float: left;
                width: 100%;
                border: 0;
            }

            .nav-pills .nav-link.active, .nav-pills .show > .nav-link{
                background-color: #17A2B8;
            }
            .dropdown-men{
                top: 60px;
                right: 0px;
                left: unset;
                width: 460px;
                box-shadow: 0px 5px 7px -1px #c1c1c1;
                padding-bottom: 0px;
                padding: 0px;
            }
            .dropdown-men:before{
                content: "";
                position: absolute;
                top: -20px;
                right: 12px;
                border:10px solid #343A40;
                border-color: transparent transparent #343A40 transparent;
            }
            .head{
                padding:5px 15px;
                border-radius: 3px 3px 0px 0px;
            }
            .footer{
                padding:5px 15px;
                border-radius: 0px 0px 3px 3px;
            }
            .notification-box{
                padding: 10px 0px;
            }
            .bg-gray{
                background-color: #eee;
            }
            @media (max-width: 640px) {
                .dropdown-menu{
                    top: 50px;
                    left: -16px;
                    width: 290px;
                }
                .nav{
                    display: block;
                }
                .nav .nav-item,.nav .nav-item a{
                    padding-left: 0px;
                }
                .message{
                    font-size: 13px;
                }
            }
        </style>
            </head>
    <body>




    @if ( !request()->session()->exists("user_id") )
        @php

            return redirect()->route("home");
        @endphp

    @endif

 @php   $logs=App\Log::get(); @endphp
 <header id="fh5co-header" role="banner">

        <nav class="navbar navbar-default" role="navigation">
            <div class="container" id="fh5co-navbar">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="navbar-header">
                        <!-- Mobile Toggle Menu Button -->
                        <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle visible-xs-block" data-toggle="collapse" data-target="#fh5co-navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
                        <a class="navbar-brand" href="/posts/logout">LOG OUT</a>
                        </div>

                        <div id="fh5co-navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">

                                <li> <a href="/posts/welcome"><span>Home <span class="border"></span></span></a></li>
                                <li><a href="/posts/signIn/pair/get/create"><span>CREATE <span class="border"></span></span></a></li>
                                <li><a href="/posts/signIn/posts"><span>Followi Posts<span class="border"></span></span></a></li>
                                <li><a href="/posts/signIn/pairs"><span>Public posts<span class="border"></span></span></a></li>
                                <li>@yield("content2")</li>
                                <li>@yield("content4")</li>


                                <li>
                                    @yield("content3")
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!-- END .header -->
    <div id="fh5co-main">
        <div class="fh5co-intro text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">

                    </div>
                </div>
            </div>
        </div>

  @yield("content")


    <footer id="fh5co-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <p>&copy; Clean Free HTML5. All Rights Reserved. <br>Created by <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a> Images: <a href="http://pexels.com/" target="_blank">Pexels</a></p>
                </div>
            </div>
        </div>
    </footer>

<!-- jQuery -->
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






            window.onscroll = function() {scrollFunction()};

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("fh5co-navbar").style.top = "0";
                } else {
                    document.getElementById("fh5co-navbar").style.top = "-50px";
                }
            }
            /* When the user clicks on the button,
toggle between hiding and showing the dropdown content */



        </script>
        <script>
            var slideIndex = 1;
            showSlides(slideIndex);

            function plusSlides(n) {
                showSlides(slideIndex += n);
            }

            function currentSlide(n) {
                showSlides(slideIndex = n);
            }

            function showSlides(n) {
                var i;
                var slides = document.getElementsByClassName("mySlides");
                var dots = document.getElementsByClassName("dot");
                if (n > slides.length) {slideIndex = 1}
                if (n < 1) {slideIndex = slides.length}
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex-1].style.display = "block";
                dots[slideIndex-1].className += " active";
            }
            window.onscroll = function() {myFunction()};

            var navbar = document.getElementById("fh5co-navbar");
            var sticky = navbar.offsetTop;

            function myFunction() {
                if (window.pageYOffset >= sticky) {
                    navbar.classList.add("sticky")
                } else {
                    navbar.classList.remove("sticky");
                }
            }

        </script>

    @yield('scripts')
    @yield("script")
    @yield("scripto")


    </body>
</html>
