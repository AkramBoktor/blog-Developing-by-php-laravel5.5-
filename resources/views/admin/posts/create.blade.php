
@extends('layouts.app')

@section('content')
	
  @include('admin.include.errors')

            <div class="card">
                <div class="card-header">  			
                	<h2 class="text-center">Create New Post </h2>
                </div>
                <div class="card-body">
                    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
       			  {{ csrf_field() }}



       			  <div class="form-group">
				    <label for="title">Title</label>
				    <input type="text" class="form-control"  placeholder="Title" name="title">
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
					      	<input name="tags[]" type="checkbox" type="checbox" value="{{$tag->id}}">
					      	{{$tag->tag}}
					      </label>
					   </div> 
					   @endforeach 
				</div>



				  <div class="form-group">
				    <label for="category">Select a Category</label>
				     <select class="form-control" name="category_id" id='category'>
				     	@foreach($categories as $category)

				     		<option value="{{$category->id}}">{{$category->name}}</option>

				     	@endforeach
					    
					 </select>
				  </div>  


				  <div class="form-group">
				    <label for="content">content</label>
				    <textarea class="form-control"  placeholder="content" cols="5" rows="5" name="content"></textarea>
				  </div>

				   <div class="form-group">
				   		<div class="text-center">
				  			 	<button class="btn btn-success" type="submit">Store Post</button>
				   		</div>
				  </div>


       		</form>
                </div>
            </div>
     
@endsection


	
