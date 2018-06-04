
@extends('layouts.app')

@section('content')
	
@include('admin.include.errors')

            <div class="card">
                <div class="card-header">  			
                	<h2 class="text-center">Create New Users </h2>
                </div>

                <div class="card-body">
                      <form action="{{route('user.store')}}" method="post">
                       			  {{ csrf_field() }}

                       		<div class="form-group">
                				    <label for="name">Name</label>
                				    <input type="text" class="form-control"  placeholder="Name" name="name">
                				  </div>

                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control"  placeholder="email" name="email">
                          </div>

                				   <div class="form-group">
                				   		<div class="text-center">
                				  			 	<button class="btn btn-success" type="submit">Add User</button>
                				   		</div>
                				  </div>


                  	</form>
                </div>
            </div>
     
@endsection


	
