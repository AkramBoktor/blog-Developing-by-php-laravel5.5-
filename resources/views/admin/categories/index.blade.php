
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
@if($categories->count()>0)
     @foreach($categories as $category)

			    <tr>


					      <td>{{$category->id}}</td>
					      <td>{{$category->name}}</td>
					      <td>
					          <a href="{{route('category.edit',['id'=>$category->id])}}">
						      	<button class="btn btn-info">  
						      	<span class="glyphicon glyphicon-pencil">Editing </span>
								</button>
							   </a>
					       </td>
					      <td>
					          <a href="{{route('category.delete',['id'=>$category->id])}}">
						      	<button class="btn btn-danger">  
						      	<span class="glyphicon glyphicon-trash">Delete </span>
								</button>
							  </a>
					      </td>

			    
			    </tr>
	     @endforeach
 @else
  <tr class="text-center">
  		<td colspan="5"> No Categoris Published </td>
  </tr>
@endif
			   
	</tbody>
</table>
	
     
@endsection


	
