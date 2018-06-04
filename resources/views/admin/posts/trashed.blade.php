
@extends('layouts.app')

@section('content')
	
	
<table class="table table-striped">
    <thead class="thead-dark">
	    <tr>
	      <th scope="col">Image</th>
	      <th scope="col">Title</th>
	      <th scope="col">Editing</th>
	      <th scope="col">Restore</th>
	      <th scope="col">Deleting</th>

	    </tr>
	</thead>

    <tbody>
<!-- Make Check if there is a Post or not -->
  @if($posts->count()>0)

	     @foreach($posts as $post)

				    <tr>


						      <td><img src="{{$post->featured}}" alt="{{$post->title}}" width="70" height="40"></td>
						      <td>{{$post->title}}</td>
						      <td>
						          <a href="">
							      	<button class="btn btn-info">  
							      	<span class="glyphicon glyphicon-pencil">Editing </span>
									</button>
								   </a>
						       </td>

						       

						      <td>
						          <a href="{{route('post.restore',['id'=>$post->id])}}">
							      	<button class="btn btn-success">  
							      	<span class="glyphicon glyphicon-trash">Restore </span>
									</button>
								  </a>
						      </td>

						       <td>
						          <a href="{{route('post.kill',['id'=>$post->id])}}">
							      	<button class="btn btn-danger">  
							      	<span class="glyphicon glyphicon-trash">Delete </span>
									</button>
								  </a>
						      </td>

				    
				    </tr>
		     @endforeach
  @else
  <tr class="text-center">
  		<td colspan="5"> No Trashed Post </td>
  </tr>
@endif	   
	</tbody>
</table>

     
@endsection


	
