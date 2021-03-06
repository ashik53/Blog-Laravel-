@extends('main') {{-- extends the structure of the main.blade.php--}}


@section('title', '| Create New Post')

@section('stylesheets') {{-- It doesnot extend aywhere , it's a raw section--}}

	{!! Html:: style('css/parsley.css') !!}
	{!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')


	<div class="row">

		<div class="col-md-8 col-md-offset-2"> {{--offset-2 means move the col right by 2 col, that means we placed the div at center, we have 2 col amount empty spaced at the rightmost --}}

			<h1>Create New Post </h1>
			<hr>

			<!--please include js parsley validation , I turn off it because of checking server side validation -->

			{!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '' )) !!}    {{-- posts.store = name of the routes, !! !! this is used only openeing and closing time; array will receieve multiple type of requests; data-parsley-validate is for parsley JS(as we are using) --}}
			{{-- all form componenets will be available blow --}}

				{{ Form::label('title', 'Title:') }} {{-- label tag, you can add as much as you need, 1st parameter title name, 2nd is the label value --}}
				{{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'minlength' => 3, 'maxlength' => 300)) }} {{-- 2nd parameter is the default value(here null is used), array will be used from third parameters; required, maxlength is a parsley component--}}


				{{ Form::label('slug', 'Slug') }}
				{{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => 5, 'maxLength' => 255 )) }}


				{{-- add a post category --}}
				{{ Form::label('category_id', 'Category') }}
				<select class="form-control" name="category_id">
					
					@foreach ($categories as $category)
						<option value= "{{ $category->id }} "> {{ $category->name }}</option>
					@endforeach
					
				</select>

				{{--@foreach ($categories as $category)
					<li > {{ $category->name }}</li>
				@endforeach

				<br> --}}

				{{-- tag adding section --}}
				
				{{ Form::label('tags', 'Tags:') }}
				<select class="form-control select2-multi" name="tags[]" multiple="multiple">
					@foreach($tags as $tag)
						<option value="{{ $tag->id }}"> {{ $tag->name }}</option>
					@endforeach

				</select>


				{{-- text area --}}
				{{ Form::label('body', 'Post Body:', array('style' => 'margin-top: 20px')) }}
				{{ Form::textarea('body', '', array('class' => 'form-control', 'required' => '', 'minlength' => 10, 'maxlength' => 10000)) }}
				

				{{-- submit button --}}
				{{ Form::submit('Create New Post', array('type' => 'btn', 'class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px')) }}

			{!! Form::close() !!} <!-- close the form -->

		</div> <!-- col-->

	</div> <!-- row-->


@endsection

@section('scripts') {{-- html helper of laravel 4--}}

	

	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>
	
@endsection
