@extends('main')

@section('title', '| Edit Blog post')


@section('stylesheets') {{-- It doesnot extend aywhere , it's a raw section--}}

	{!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')

	<div class= "row">

		{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
		
		<div class = "col-md-8">


			{{ Form::label('title', 'Title:') }}
			{{ Form::text('title', null, ['class' => 'form-control input-lg']) }}

			{{ Form::label('slug', 'Slug:', ['class' => 'top-margin'] ) }}
			{{ Form::text('slug', null, ['class' => 'form-control']) }}

			{{ Form::label('category_id', 'Category') }}
				<select class="form-control" name="category_id">
					
						@foreach ($categories as $category)

							@if ($post->category_id == $category->id) 
								<option value= "{{ $category->id }} " selected> {{ $category->name }}</option>
						    @else
						    	<option value= "{{ $category->id }} " > {{ $category->name }}</option>
						    @endif

						@endforeach
				
				</select>


			{{ Form::label('body', "Body:", ['class' => 'top-margin']) }} {{-- 'top-margin' class is from style.css--}}
			{{ Form::textarea('body', null,  ['class' => 'form-control']) }}


		</div> <!-- col -->

		<div class= "col-md-4">
			<div class="well">
				<dl class= "dl-horizontal">

					<dt> Created At: </dt>

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

						{!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}

						<!-- linkRoute is instead of <a> </a> tag-->

						
					</div> <!--col -->

					<div class= "col-sm-6">
						 {!! Form::submit('Save changes', array('class' => 'btn btn-success btn-block')) !!} <!-- we will submit the updated value via form open route-->
					</div> <!-- col -->
				</div> <!-- row-->

				<!--Edit and Delete Button -->

				{{--I will use the remaining 4 amount of spaces which is 12, one button will use 6 , another will use 6  --}}

			</div> <!-- well -->
		</div> <!-- col -->
		{!! Form::close() !!}
	</div> <!-- row-->
	


@endsection

@section('scripts') {{-- html helper of laravel 4--}}

	{!! Html::script('js/select2.min.js') !!}

@endsection