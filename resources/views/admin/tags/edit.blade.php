
@extends('layouts.app')

@section('content')
	
  @include('admin.include.errors')


            <div class="card">
                <div class="card-header">  			
                	<h2 class="text-center">update Tag {{$tag->tag}}</h2>
                </div>

                <div class="card-body">
                    <form action="{{route('tag.update',['id'=>$tag->id])}}" method="post">
       			  {{ csrf_field() }}

       			  <div class="form-group">
				    <label for="Tag">Tag Name</label>
				    <input type="text" class="form-control"  value="{{$tag->tag}}" name="tag">
				  </div>

				   <div class="form-group">
				   		<div class="text-center">
				  			 	<button class="btn btn-success" type="submit">update Tag</button>
				   		</div>
				  </div>


       		</form>
                </div>
            </div>
     
@endsection


	
