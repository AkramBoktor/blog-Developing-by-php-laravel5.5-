
@extends('layouts.app')

@section('content')
	
	
<table class="table">
    <thead class="thead-dark">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Category Name</th>
	      <th scope="col">Editing</th>
	      <th scope="col">Deleting</th>
	    </tr>
	</thead>
    <tbody>
@if($tags->count()>0)
     @foreach($tags as $tag)

			    <tr>


					      <td>{{$tag->id}}</td>
					      <td>{{$tag->tag}}</td>
					      <td>
					          <a href="{{route('tag.edit',['id'=>$tag->id])}}">
						      	<button class="btn btn-info">  
						      	<span class="glyphicon glyphicon-pencil">Editing </span>
								</button>
							   </a>
					       </td>
					      <td>
					          <a href="{{route('tag.delete',['id'=>$tag->id])}}">
						      	<button class="btn btn-danger">  
						      	<span class="glyphicon glyphicon-trash">Delete </span>
								</button>
							  </a>
					      </td>

			    
			    </tr>
	     @endforeach
 @else
  <tr class="text-center">
  		<td colspan="5"> No Tags Published </td>
  </tr>
@endif
			   
	</tbody>
</table>
	
     
@endsection


	
