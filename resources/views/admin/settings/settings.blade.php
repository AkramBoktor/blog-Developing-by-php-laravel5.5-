
@extends('layouts.app')

@section('content')
	
@include('admin.include.errors')

            <div class="card">
                <div class="card-header">  			
                	<h2 class="text-center"> Edit Blog Setting </h2>
                </div>

                <div class="card-body">
                      <form action="{{route('setting.update')}}" method="post">
                       			  {{ csrf_field() }}

                       		<div class="form-group">
                				    <label for="name">Site Name</label>
                				    <input type="text" class="form-control" value="{{$settings->site_name}}" 
                            name="site_name">
                				  </div>

                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control"  value="{{$settings->contact_email}}"  name="contact_email">
                          </div>

                           <div class="form-group">
                            <label for="number">number</label>
                            <input type="text" class="form-control"  value="{{$settings->contact_number}}"       name="contact_number">
                          </div>


                           <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" value="{{$settings->address}}" name="address">
                          </div>

                				   <div class="form-group">
                				   		<div class="text-center">
                				  			 	<button class="btn btn-success" type="submit">Update Site Setting</button>
                				   		</div>
                				  </div>


                  	</form>
                </div>
            </div>
     
@endsection


	
