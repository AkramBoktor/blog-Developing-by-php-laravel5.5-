
@extends('layouts.app')

@section('content')
	
  @include('admin.include.errors')


            <div class="card">
                <div class="card-header">  			
                	<h2 class="text-center">update Category {{$category->name}}</h2>
                </div>

                <div class="card-body">
                    <form action="{{route('category.update',['id'=>$category->id])}}" method="post">
       			  {{ csrf_field() }}

       			  <div class="form-group">
				    <label for="name">Name</label>
				    <input type="text" class="form-control"  value="{{$category->name}}" name="name">
				  </div>

				   <div class="form-group">
				   		<div class="text-center">
				  			 	<button class="btn btn-success" type="submit">update Category</button>
				   		</div>
				  </div>


       		</form>
                </div>
            </div>
     
@endsection


	
