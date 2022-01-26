<style>
    * {box-sizing: border-box}

    /* Set height of body and the document to 100% */


    /* Style tab links */
    .tablink {
        background-color: #555;
        color: white;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 20px 16px;
        font-size: 17px;
        width: 25%;
    }

    .tablink:hover {
        background-color: #777;
    }

    /* Style the tab content (and add height:100% for full page content) */
    .tabcontent {
        color: white;
        display: none;
        padding: 100px 20px;
        height: 100%;
    }
    .sticky {
        position: fixed;
        top: 0;
        width: 100%;
    }

    #Home {background-color: white;}
    #News {background-color: white;}
    #Contact {background-color: white;}
    #About {background-color: white;}
</style>
@section("content3")
    @php   $logs=App\Log::get(); @endphp
<div class="dropdown">
    <button id ="modal" class="dropbtn">Search</button>
    <div id="myDropdow" class="dropdown-content">
        <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
        @foreach($logs as $log)
            <ul>
            @if ( $log->id !==request()->session()->get("user_id")  )
                    <li>  @if ($log->media_id == null )

                    <img src="" width="60" height="40">
                @else     <img src="{{Storage::url($log->medias->media_path)}}" width="50" height="50">
                @endif
                <a href="/posts/signIn/pairs/{{$log->id}}">{{$log->username}}<br> {{$log->fullname}}</a>
            @endif</li>
            </ul>
        @endforeach
    </div>
</div>
@endsection

<button class="tablink" onclick="openPage('sports', this, 'red')">Sports</button>
<button class="tablink" onclick="openPage('Entertainment', this, 'red')" id="defaultOpen">Entertainment</button>
<button class="tablink" onclick="openPage('politics', this, 'red')">Politics</button>
<button class="tablink" onclick="openPage('other', this, 'red')">Other</button>


<div id="other" class="tabcontent">




    @php $posty= App\Post::latest()->where(["category"=>null])->get() @endphp

    @foreach($posty as $post)
        @if ( $post->log->id !== request()->session()->get("user_id")  )
@php $logs = $post->log; @endphp
            <div id="fh5co-portfolio">
                <div align="right">
                    @if ($logs->media_id == null )
                        <img src="{{URL::asset("images/avartar3.jpg")}}" width="100" height="100" style="border-radius:50%">

                    @else
                        <img src="{{Storage::url($logs->medias->media_path)}}" width="100" height="100" style="border-radius:50%">
                    @endif
                    <p><a href="/posts/signIn/pairs/{{$logs->id}}"> <h2>{{$logs->username}}</h2></a></p>
                </div>

                <div class="fh4co-portfolio-item ">

                    <div class="fh4co-portfolio-description">

                        @if ($post->media_id != 0)
                            @if ($post->media->media_type == 'image/jpeg')
                                <img src="{{Storage::url($post->media->media_path)}}" width="400" height="400">

                            @elseif($post->media->media_type == 'image/png')
                                <img src="{{Storage::url($post->media->media_path)}}" width="400" height="400">
                            @endif
                        @endif
                        @if ($post->media_id2 != 0)
                            @if ($post->media->media_type == 'image/jpeg')
                                <img src="{{Storage::url($post->medi->media_path)}}" width="400" height="400">

                            @elseif($post->media->media_type == 'image/png')
                                <img src="{{Storage::url($post->media->media_path)}}" width="400" height="400">
                            @endif
                        @endif
                        <h2>  {{$post->title}}   </h2>

                        {{$post->created_at->diffForHumans()}}

                        @if   ($post->like->where("id",request()->session()->get("user_id"))->count()==1 )

                        @else
                            <br>
                            <a style="cursor:pointer;" onclick="button({{$post->like->count()}},'{{$post->id}}' ); " class="notification" id="{{$post->id}}4" ><span>Like</span><span class="badge"></span></a>

                        @endif
                        <p ><a href="/posts/userlikes/{{$post->id}}" id='{{$post->id}}'> {{$post->like->count()}}  likes </a></p>

                        @php    $achieves=App\Comment::selectRaw(COUNT($comments=["id"]))->where(["post_id"=> $post->id])  ->get(); @endphp
                        <p> <a href="/posts/signIn/pair/get/create/post/{{$post->id}}"> view post({{$achieves->count()}}) </a> </p>

                    </div>
                </div>

            </div>
        @endif
            @endforeach




</div>
<div id="Entertainment" class="tabcontent">
    @php $posty= App\Post::latest()->where(["category"=>"Entertainment"])->get() @endphp
    @foreach($posty as $post)

        @if ( $post->log->id !== request()->session()->get("user_id")  )
            @php $logs = $post->log; @endphp
            <div id="fh5co-portfolio">
                <div align="right">
                    @if ($logs->media_id == null )
                        <img src="{{URL::asset("images/avartar3.jpg")}}" width="100" height="100" style="border-radius:50%">

                    @else
                        <img src="{{Storage::url($logs->medias->media_path)}}" width="100" height="100" style="border-radius:50%">
                    @endif
                    <p><a href="/posts/signIn/pairs/{{$logs->id}}"> <h2>{{$logs->username}}</h2></a></p>
                </div>
                <div class="fh4co-portfolio-item ">

                    <div class="fh4co-portfolio-description">

                        @if ($post->media_id != 0)
                            @if ($post->media->media_type == 'image/jpeg')
                                <img src="{{Storage::url($post->media->media_path)}}" width="400" height="400">

                            @elseif($post->media->media_type == 'image/png')
                                <img src="{{Storage::url($post->media->media_path)}}" width="400" height="400">
                            @endif
                        @endif
                        @if ($post->media2_id != 0)
                            @if ($post->medi->media_type == 'image/jpeg')
                                <img src="{{Storage::url($post->medi->media_path)}}" width="400" height="400">

                            @elseif($post->medi->media_type == 'image/png')
                                <img src="{{Storage::url($post->media->media_path)}}" width="400" height="400">
                            @endif
                        @endif
                        <h2>  {{$post->title}}   </h2>

                        {{$post->created_at->diffForHumans()}}

                        @if   ($post->like->where("id",request()->session()->get("user_id"))->count()==1 )

                        @else
                            <br>
                            <a style="cursor:pointer;" onclick="button({{$post->like->count()}},'{{$post->id}}' ); " class="notification" id="{{$post->id}}4" ><span>Like</span><span class="badge"></span></a>

                        @endif
                        <p ><a href="/posts/userlikes/{{$post->id}}" id='{{$post->id}}'> {{$post->like->count()}}  likes </a></p>

                        @php    $achieves=App\Comment::selectRaw(COUNT($comments=["id"]))->where(["post_id"=> $post->id])  ->get(); @endphp
                        <p> <a href="/posts/signIn/pair/get/create/post/{{$post->id}}"> view post({{$achieves->count()}}) </a> </p>

                    </div>
                </div>

            </div>
        @endif
        @endforeach
</div>
<div id="sports" class="tabcontent">
    @php $posty= App\Post::latest()->where(["category"=>"Sports"])->get() @endphp
    @foreach($posty as $post)


        @if ( $post->log->id !== request()->session()->get("user_id")  )
            @php $logs = $post->log; @endphp
            <div id="fh5co-portfolio">
                <div align="right">

                    @if ($logs->media_id == null )
                        <img src="{{URL::asset("images/avartar3.jpg")}}" width="100" height="100" style="border-radius:50%">

                    @else
                        <img src="{{Storage::url($logs->medias->media_path)}}" width="100" height="100" style="border-radius:50%">
                    @endif
                    <p><a href="/posts/signIn/pairs/{{$logs->id}}"> <h2>{{$logs->username}}</h2></a></p>
                </div>
                <div class="fh4co-portfolio-item ">

                    <div class="fh4co-portfolio-description">

                        @if ($post->media_id != 0)
                            @if ($post->media->media_type == 'image/jpeg')
                                <img src="{{Storage::url($post->media->media_path)}}" width="400" height="400">

                            @elseif($post->media->media_type == 'image/png')
                                <img src="{{Storage::url($post->media->media_path)}}" width="400" height="400">
                            @endif
                        @endif
                        @if ($post->media_id2 != 0)
                            @if ($post->medi->media_type == 'image/jpeg')
                                <img src="{{Storage::url($post->medi->media_path)}}" width="400" height="400">

                            @elseif($post->medi->media_type == 'image/png')
                                <img src="{{Storage::url($post->media->media_path)}}" width="400" height="400">
                            @endif
                        @endif
                        <h2>  {{$post->title}}   </h2>

                        {{$post->created_at->diffForHumans()}}

                        @if   ($post->like->where("id",request()->session()->get("user_id"))->count()==1 )

                        @else
                                <br>
                            <a style="cursor:pointer;" onclick="button({{$post->like->count()}},'{{$post->id}}' ); " class="notification" id="{{$post->id}}4" ><span>Like</span><span class="badge"></span></a>

                        @endif
                        <p ><a href="/posts/userlikes/{{$post->id}}" id='{{$post->id}}'> {{$post->like->count()}}  likes </a></p>

                        @php    $achieves=App\Comment::selectRaw(COUNT($comments=["id"]))->where(["post_id"=> $post->id])  ->get(); @endphp
                        <p> <a href="/posts/signIn/pair/get/create/post/{{$post->id}}"> view post({{$achieves->count()}}) </a> </p>

                    </div>
                </div>

            </div>
        @endif
@endforeach


</div>
<div id="politics" class="tabcontent">
    @php $posty= App\Post::latest()->where(["category"=>"politics"])->get() @endphp
    @foreach($posty as $post)
        @php $logs = $post->log; @endphp
        @if ( $post->log->id !== request()->session()->get("user_id")  )

            <div id="fh5co-portfolio">
                <div align="right">
                    @if ($logs->media_id == null )
                        <img src="{{URL::asset("images/avartar3.jpg")}}" width="100" height="100" style="border-radius:50%">

                    @else
                        <img src="{{Storage::url($logs->medias->media_path)}}" width="100" height="100" style="border-radius:50%">
                    @endif
                    <p><a href="/posts/signIn/pairs/{{$logs->id}}"> <h2>{{$logs->username}}</h2></a></p>
                </div>
                <div class="fh4co-portfolio-item ">

                    <div class="fh4co-portfolio-description">

                        @if ($post->media_id != 0)
                            @if ($post->media->media_type == 'image/jpeg')
                                <img src="{{Storage::url($post->media->media_path)}}" width="400" height="400">

                            @elseif($post->media->media_type == 'image/png')
                                <img src="{{Storage::url($post->media->media_path)}}" width="400" height="400">
                            @endif
                        @endif
                        @if ($post->media_id2 != 0)
                            @if ($post->medi->media_type == 'image/jpeg')
                                <img src="{{Storage::url($post->medi->media_path)}}" width="400" height="400">

                            @elseif($post->medi->media_type == 'image/png')
                                <img src="{{Storage::url($post->media->media_path)}}" width="400" height="400">
                            @endif
                        @endif
                        <h2>  {{$post->title}}   </h2>

                        {{$post->created_at->diffForHumans()}}

                        @if   ($post->like->where("id",request()->session()->get("user_id"))->count()==1 )

                        @else
                            <br>
                            <a style="cursor:pointer;" onclick="button({{$post->like->count()}},'{{$post->id}}' ); " class="notification" id="{{$post->id}}4" ><span>Like</span><span class="badge"></span></a>

                        @endif
                        <p ><a href="/posts/userlikes/{{$post->id}}" id='{{$post->id}}'> {{$post->like->count()}}  likes </a></p>

                        @php    $achieves=App\Comment::selectRaw(COUNT($comments=["id"]))->where(["post_id"=> $post->id])  ->get(); @endphp
                        <p> <a href="/posts/signIn/pair/get/create/post/{{$post->id}}"> view post({{$achieves->count()}}) </a> </p>

                    </div>
                </div>

            </div>
        @endif
    @endforeach

</div>


 @section("scripts")
 <script>
     $(document).ready(function(){
         $("#search").keyup(function(){

             var str=  $("#search").val();
             if(str !== "") {
                 $.get( "{{ url('livesearch?id=') }}"+str, function( data ) {
                     $( "#txtHint" ).html( data );
                 });

             }else {

                 $( "#txtHint" ).html("<b>Blogs information will be listed here...</b>");
             }
         });
     });

     function button(m , f ){

         var button =
                 document.getElementById(f),
             count = m;

         if(count>m){}
         else{
             document.getElementById(f+4).style.display = "none";
             count += 1;
             button.innerHTML = + count + " likes";

             $.ajax({
                 type: "GET",
                 url: "/posts/like/"+f,
                 //data: "",
                 success: function() {

                     console.log("Simple example");
                 }
             })
         }


     }

     // Get the modal
     var modal = document.getElementById("myModal");

     // Get the button that opens the modal
     var btn = document.getElementById("modal");

     // Get the <span> element that closes the modal
     var span = document.getElementsByClassName("close")[0];

     // When the user clicks the button, open the modal
     btn.onclick = function() {
         modal.style.display = "block";
     }

     // When the user clicks on <span> (x), close the modal
     span.onclick = function() {
         modal.style.display = "none";
     }
     window.onclick = function(event) {
         if (event.target == modal) {
             modal.style.display = "none";
         }
     }

     // When the user clicks anywhere outside of the modal, close it


    function myFunction() {
        document.getElementById("myDropdow").classList.toggle("show");

    }

    function filterFunction() {
        var input, filter, ul, li, a, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        div = document.getElementById("myDropdow");
        a = div.getElementsByTagName("li");
        for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }
     function openPage(pageName,elmnt,color) {
         var i, tabcontent, tablinks;
         tabcontent = document.getElementsByClassName("tabcontent");
         for (i = 0; i < tabcontent.length; i++) {
             tabcontent[i].style.display = "none";
         }
         tablinks = document.getElementsByClassName("tablink");
         for (i = 0; i < tablinks.length; i++) {
             tablinks[i].style.backgroundColor = "";
         }
         document.getElementById(pageName).style.display = "block";
         elmnt.style.backgroundColor = color;
     }

     // Get the element with id="defaultOpen" and click on it
     document.getElementById("defaultOpen").click();

     window.onscroll = function() {onScroll()};

     var navbar = document.getElementById("navbar");
     var sticky = navbar.offsetTop;

     function onScroll() {
         if (window.pageYOffset >= sticky) {
             navbar.classList.add("sticky")
         } else {
             navbar.classList.remove("sticky");
         }
     }


 </script>
    


 @endsection
