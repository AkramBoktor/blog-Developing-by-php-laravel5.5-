
@extends('layouts.app')

@section('content')
	
  @include('admin.include.errors')
            <div class="card">
                <div class="card-header">  			
                	<h2 class="text-center">Update Post {{$post->title}}</h2>
                </div>

                <div class="card-body">
                    <form action="{{route('post.update',['id'=>$post->id])}}" method="post" enctype="multipart/form-data">
       			  {{ csrf_field() }}

       			  <div class="form-group">
				    <label for="title">Title</label>
				    <input type="text" class="form-control"  value="{{$post->title}}" name="title">
				  </div>


				  <div class="form-group">
				    <label for="image">image</label>
				    <input type="file" class="form-control"  name="featured">
				  </div>  


  				  <div class="form-group">
				   	<label for="tags">Select Tags</label>
				   	 @foreach($tags as $tag)

				   	 <div class="checbox">

					      <label>
					      	<input name="tags[]" type="checkbox" type="checbox" 
					      	                                     value="{{$tag->id}}"

					    	@foreach($post->tags as $t)

					    		@if($tag->id == $t->id)

					    			checked

					    		@endif

					    	@endforeach
                                 
                           >{{$tag->tag}}
					      </label>
					      @endforeach

					   </div> 
					   
			      </div>


				  <div class="form-group">
				    <label for="category">Select a Category</label>
				     <select class="form-control" name="category_id" id='category'>
				     	@foreach($categories as $category)

				     		<option value="{{$category->id}}"

				     			@if($post->category->id==$category->id)

				     				selected
				     				
				     			@endif
				     		>{{$category->name}}</option>

				     	@endforeach
					    
					 </select>
				  </div>    


				  <div class="form-group">
				    <label for="content">content</label>
				   <textarea class="form-control"  cols="5" rows="5" name="content">{{$post->content}}</textarea>
				  </div>

				   <div class="form-group">
				   		<div class="text-center">
				  			 	<button class="btn btn-success" type="submit">Update Post</button>
				   		</div>
				  </div>


       		</form>
                </div>
            </div>
     
@endsection


	
