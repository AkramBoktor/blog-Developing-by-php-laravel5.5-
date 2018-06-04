
@extends('layouts.app')

@section('content')
	
@include('admin.include.errors')

            <div class="card">
                <div class="card-header">  			
                	<h2 class="text-center">Edit Your Profile </h2>
                </div>

                <div class="card-body">
                      <form action="{{route('user.update.profile')}}" method="post" enctype="multipart/form-data">
                       			  {{ csrf_field() }}

                       		<div class="form-group">
                				    <label for="name">UserName</label>
                				    <input type="text" class="form-control" value="{{$user->name}}" placeholder="Name" name="name">
                				  </div>


                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" value="{{$user->email}}" placeholder="email" name="email">
                          </div>


                           <div class="form-group">
                            <label for="pasword">password</label>
                            <input type="email" class="form-control"  placeholder="password" name="password">
                          </div>



                          <div class="form-group">
                            <label for="avatar">password</label>
                            <input type="file" class="form-control" name="avatar">
                          </div>


                          <div class="form-group">
                            <label for="youtube">Youtube Profile</label>
                            <input type="text" class="form-control" value=""
                             placeholder="Youtube" name="youtube">
                          </div>


                          <div class="form-group">
                            <label for="facebook">Facebook Profile</label>
                            <input type="text" class="form-control" value=""
                             placeholder="facebook" name="facebook">
                          </div>

                          <div class="form-group">
                              <label for="about"> About </label>
                                  <textarea name="about" id="about" cols="20" rows="5" class="form-control"> 
                                   
                                  </textarea>
                          </div>

                				   <div class="form-group">
                				   		<div class="text-center">
                				  			 	<button class="btn btn-success" type="submit">Update Profile</button>
                				   		</div>
                				  </div>


                        


                  	</form>
                </div>
            </div>
     
@endsection


	
