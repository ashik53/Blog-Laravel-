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

					<dt> Create At: </dt>

					<!-- working with php date function, I will represent the date -->

					<dd> {{ date('M j, Y h:ia', strtotime($post->created_at)) }} </dd>

				</dl>

				<dl class= "dl-horizontal">

					<dt> Last updated At: </dt>
					<dd> {{ $post->created_at->diffForHumans() }}</dd>

				</dl>
				<hr>

				{{-- sub row  of previous row--}}

				<div class = "row">

					<div class ="col-sm-6">

						{!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-primary btn-block')) !!}

						
					</div> <!--col -->

					<div class= "col-sm-6">
						 {!! Html::linkRoute('posts.destroy', 'Delete', array($post->id), array('class' => 'btn btn-danger btn-block')) !!} <!-- destroy button will be red-->
					</div> <!-- col -->
				</div> <!-- row-->

				<!--Edit and Delete Button -->

				{{--I will use the remaining 4 amount of spaces which is 12, one button will use 6 , another will use 6  --}}

			</div> <!-- well -->
		</div> <!-- col -->

	</div> <!-- row-->




@endsection


