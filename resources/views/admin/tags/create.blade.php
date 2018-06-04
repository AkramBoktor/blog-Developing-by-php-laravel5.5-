
@extends('layouts.app')

@section('content')
	
@include('admin.include.errors')

            <div class="card">
                <div class="card-header">  			
                	<h2 class="text-center">Create New Tags </h2>
                </div>

                <div class="card-body">
                    <form action="{{route('tag.store')}}" method="post">
       			  {{ csrf_field() }}

       			  <div class="form-group">
				    <label for="name">Name</label>
				    <input type="text" class="form-control"  placeholder="Name" name="tag">
				  </div>

				   <div class="form-group">
				   		<div class="text-center">
				  			 	<button class="btn btn-success" type="submit">Store Tag</button>
				   		</div>
				  </div>


       		</form>
                </div>
            </div>
     
@endsection


	
