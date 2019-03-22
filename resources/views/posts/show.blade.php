@extends('main')

@section('title', '| View Post')

@section('content')

	<div class= "row">

		<div class = "col-md-8">

			<h1> {{ $post->title }}</h1> {{-- post variable carries the info of  the specific id returned from PostController@show --}}

			<p class="lead"> {{ $post->body }}</p>

			<p> {{ $post->created_at->diffForHumans() }}</p>

		</div> <!-- col -->

		<div class= "col-md-4">
			<div class="well">
				<dl class= "dl-horizontal">

				    <label> Url: </label>
				    <p> <a href="{{ route('blog.single', $post->slug) }}"> {{ route('blog.single', $post->slug) }} </a></p>

					<label> Created At: </label>

					<!-- working with php date function, I will represent the date -->

					<p> {{ date('M j, Y h:ia', strtotime($post->created_at)) }} </p>

				</dl>

				<dl class= "dl-horizontal">

					<label> Last updated At: </label>
					<p> {{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>

				</dl>
				<hr>

				{{-- sub row  of previous row--}}

				<div class = "row">

					<div class ="col-sm-6">

						{!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}

						
					</div> <!--col -->

					<div class= "col-sm-6">


						{!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}

						 	{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

						{!!Form::close() !!}


					</div> <!-- col -->
				</div> <!-- row-->

				<!-- New button on the sidebar named "See all posts" -->

				<div class = "row">
					<div class= "col-md-12">
						{{ Html::linkRoute('posts.index', '<< See All Posts', [], ['class' => 'btn btn-default btn-block top-margin']) }} {{-- [] denotes if you need to send variable then you can use the array--}}
					</div> <!-- col-->
				</div> <!-- row-->


				<!--Edit and Delete Button -->

				{{--I will use the remaining 4 amount of spaces which is 12, one button will use 6 , another will use 6  --}}

			</div> <!-- well -->
		</div> <!-- col -->

	</div> <!-- row-->




@endsection


