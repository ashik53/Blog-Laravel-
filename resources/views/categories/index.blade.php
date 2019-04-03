@extends('main')

@section('title', '| All categories')

@section('content')

	<div class="row">
		<div class="col-md-8">

			<h1> Categories </h1>
			<table class="table">
				<thead>
					<tr>
						<th> #</th>
						<th> Name</th>
					</tr>
				</thead>

			    <tbody>
					@foreach($categories as $category)
						<tr>
							<td> {{ $category->id }} </td>
							<td> {{ $category->name }} </td>
						</tr>
					@endforeach
				</tbody>
		
			</table>


		</div> <!-- col md -8-->

		<div class="col-md-4">
			<div class="well"> 
				<form action="/categories" method="POST" >
					
					{{ csrf_field() }}

						<label for="name"> Add a new category </label>
						<input type="text" name="name"  class="form-control" style="margin-bottom:5px">

						<button type="submit" class="btn btn-primary btn-block "> Add</button>
					
				</form>
			</div>
		</div> <!-- col md- 4-->
	</div> <!-- row-->



@endsection