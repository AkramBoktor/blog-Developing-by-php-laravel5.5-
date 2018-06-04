
@extends('layouts.app')

@section('content')

<table class="table table-striped">
    <thead class="thead-dark">
	    <tr>
	      <th scope="col">Image</th>
	      <th scope="col">Name</th>
	      <th scope="col">Premissions</th>
	      <th scope="col">Delete</th>
	    </tr>
	</thead>
    <tbody>
@if($users->count()>0)

     @foreach($users as $user)

			    <tr>

			    		<td><img src="" width="60%" height="60%" 
			    			style="border-radius:50%;">
			    		</td>


			    		<td>
			    			
			    			{{$user->name}}

			    		</td>



			    		<td>
			    			@if($user->admin==0)
					          <a href="{{route('user.admin',['id'=>$user->id])}}">
						      	<button class="btn btn-secondary">  
						      	<span class="glyphicon glyphicon-pencil">Make Admin </span>
								</button>
							   </a>
							 @else

							   	 <a href="{{route('user.not.admin',['id'=>$user->id])}}">
						      	<button class="btn btn-primary">  
						      	<span class="glyphicon glyphicon-pencil">Remove Permission </span>
								</button>
							   </a>

							 @endif
					       </td>

					       @if(Auth::id()!==$user->id)
					      <td>
					          <a href="{{route('user.delete',['id'=>$user->id])}}">
						      	<button class="btn btn-danger">  
						      	<span class="glyphicon glyphicon-trash">Deleting </span>
								</button>
							  </a>
					      </td>
					      @endif
			    
			    </tr>
	     @endforeach
@else
  <tr class="text-center">
  		<td colspan="5"> No Users </td>
  </tr>
@endif		   
	</tbody>
</table>
	
     
@endsection


	
