

@extends("clean.layout")
@section("content")


{{--
    <div class="dropdown">
        <button onclick="myFunction()" class="dropbtn">Search</button>
        <div id="myDropdown" class="dropdown-content">
            <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
            @foreach($logs as $log)
                <a href="/posts/signIn/pairs/{{$log->id}}">{{$log->username}}</a>
            @endforeach
        </div>--}}



<style>
#fh5co-mains {
clear: both;
padding-top: 3em;
background: whitesmoke;
}
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>



    <div id="fh5co-mains">
        @php  @endphp


            <div class="fh5co-intro text-center">

                    <div class="row">

                        <div class="col-md-8 col-md-offset-2">
                            <h1 class="intro-lead">Public Posts</h1>
                            <p class="">100% Free HTML5 Template by <a href="http://freehtml5.co/" target="_blank">FREEHTML5.co</a></p>

                    </div>

            </div>
            </div>
        <div id="myModal" class="modal">

            <!-- Modal content -->
            <span class="close">&times;</span>
            <div class="modal-content">
                <div class="search">
                    <h3 class="text-center title-color"> USER SEARCH</h3>
                    <p>&nbsp;</p>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <div class="input-group">
                                <span class="input-group-addon" style="color: white; background-color: red;">USER SEARCH</span>
                                <input type="text" autocomplete="off" id="search" class="form-control input-lg" placeholder="Enter Username of Fullname">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- search box container ends  -->
                <div id="txtHint" class="title-color" style="padding-top:50px; text-align:center;" ><b>User information will be listed here...</b></div>



            </div>

        </div>




       @include("clean.post")


        @endsection
        @section('scripts')

            <script>

            </script>
@endsection