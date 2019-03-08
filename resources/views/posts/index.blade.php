@extends('main')

@section('title', '| All Posts')

@section('content')

	<div class="row" > <!-- row -->
		<div class ="col-md-10"> <!-- for posts we need 10 sized col-->
		

			<h1> All posts</h1>


		</div> <!-- col-->

		<div class="col-md-2"> <!-- for button we need 2 sized col-->
		
			<a href = "{{ route('posts.create') }}" class="btn btn-primary btn-lg btn-block button-margin"> Create New Post</a>

		</div> <!-- col -->
		


	</div> <!-- row -->

	<!-- Another row for showing all posts -->

	<div class= "row">
		<div class= "col-md-12">
			<table class= "table">
				<thead>
					<th>  # </th>
					<th>  Title </th>
					<th>  Body </th>
					<th>  Created at </th>
					<th>  Action </th>
				</thead>

				<tbody>

					@foreach ($posts as $post)

						<tr>
							<th> {{ $post->id }}</th>
							<td> {{ $post->title }}</td>
							<td> {{ substr($post->body, 0, 8) }} {{ strlen($post->body) > 7 ? "..." : ""}}</td>
							
							<td> {{ date('M j, Y h:ia', strtotime($post->created_at)) }}</td>
							<td> <a href="{{ route('posts.show', $post->id) }}" class= "btn btn-default btn-sm"> View </a> <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm"> Edit </a></td>

						</tr>

					@endforeach

				</tbody>
			</table> 

			<div class= "text-center">
			
				{!! $posts->render() !!}	

			</div>

		</div> <!-- col-->
	</div> <!-- col -->
@stop