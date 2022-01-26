@extends("clean.layout")
@section("content")
    <style>
    .wrap-input100 {
    width: 100%;
    position: relative;
    border: 1px solid #e6e6e6;
    border-radius: 10px;
    margin-bottom: 20px;
    }

    .label-input100 {
    font-family: Montserrat-SemiBold;
    font-size: 11px;
    color: red;
    line-height: 1.2;
    text-transform: uppercase;
    padding: 15px 0 2px 24px;
    }
    </style>
@if($create == 1)
			<form method="post" action="/posts/signIn/pair/get/create/post" enctype="multipart/form-data" >
               {{ csrf_field() }}
                <div class="wrap-input100">
                    <div class="label-input100">Category</div>
                    <div>

                        <select class=""  name="category"  required>

                            <option>Sports</option>
                            <option>Entertainment</option>
                            <option>politics</option>
                            <option>Other</option>

                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                    <span class="focus-input100"></span>
                </div>

                <div class="form-group">
					<label for="Title">Title</label>
					<input class="form-control" type="text"  name="title" required >
					
				</div>
               <div class="form-group" >
					<label for="exampleInputpassword1">Body</label>
					<textarea id="body" name="body" class="form-control" ></textarea>
					
				</div>
				<div class="form-group">
					<label for="Title">File</label>
					<input class="" type="file" name="picture" >
				</div>
				<div class="form-group">
					<label for="Title">File2</label>
					<input class="" type="file" name="picture2">
				</div>
				<!-- <div class="form-group">
					<label for="exampleInputFile">file input</label>
					<input  type="file" id="exampleInputfile">
					<p class="help-box">Example block-level help text here.</p>

				</div> -->
				
				<div class="container-contact100-form-btn">
					<button type="submit" class="btn btn-primary">submit

					</button>
				</div>
			</form>
    @else
    <form method="post" action="/posts/signIn/pair/get/create/editpost" enctype="multipart/form-data" >
        {{ csrf_field() }}
        <div class="form-group">
            <label for="Title">Title</label>
            <input class="form-control" type="text"  name="title" value="{{$post->title}}" required="">

        </div>
        <div class="form-group" >
            <label for="Body">Body</label>
            <textarea id="body" name="body"  class="form-control"   ></textarea>

        </div>
        {{--@php dd($post->media->media_path) @endphp--}}
        <div class="form-group">
            <label for="file">File</label>
            <input class="" type="file" name="picture"  >
        </div>
        <div class="form-group">
            <label for="file2">File2</label>
            <input class="" type="file" name="picture2">
        </div>
        <input type="hidden" name="post_id"  value="{{$post->id}}" >

        <!-- <div class="form-group">

            <label for="exampleInputFile">file input</label>
            <input  type="file" id="exampleInputfile">
            <p class="help-box">Example block-level help text here.</p>

        </div> -->

        <div class="container-contact100-form-btn">
            <button type="submit" class="btn btn-primary">submit

            </button>
        </div>
    </form>
    @endif
		
	
@endsection