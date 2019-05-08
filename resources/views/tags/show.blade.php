@extends('main')

@section('title', "| $tag->name Tag")

@section('content')

	<div class="row">
		<div class="col-md-8"> 
			<h1> {{ $tag->name }} Tag <small> {{ $tag->posts()->count()  }} </small> Posts</h1>
		</div>
		<div class="col-md-2 "> 
			<a href= "{{ route('tags.edit', $tag->id) }}"class="btn btn-primary pull-right btn-block" style="margin-top:20px">  Edit</a>
		</div>
		<div class="col-md-2"> 
			{{ Form::open(['route' => ['tags.destroy', $tag->id], 'method' =>'DELETE']) }}
				{{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block', 'style' => 'margin-top:20px']) }}
			{{ Form::close() }}
		</div>
	</div>


    {{-- create a table, where posts which contains this tag will be showed--}}
    {{-- also those posts all tags will be showed--}}
	
	<div class="row">
		<div class="col-md-12">

			<table class="table">
				<thead>
					<tr>
						<th> #</th>
						<th> Title</th>
						<th> Tags</th>
						<th> </th>
					</tr>
				</thead>
				<tbody>
					@foreach ($tag->posts as $post)
					  <tr>
					  	 <td> {{ $post->id }}</td>
					  	 <td> {{ $post->title }}  </td>
					  	 {{-- inorder to show all tags under a posts we need another for loop--}}
					  	 <td> @foreach ($post->tags as $tag)
					  	 		 <span class="label label-default" style="margin-right:2px"> {{ $tag->name }} </span>
					  	 	  @endforeach
					  	 </td>

					  	 <td> <a href=" {{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm"> View </a> </td>

					  </tr>
					@endforeach

				</tbody>
			</table>



		</div> {{-- col--}}



	</div> {{-- row --}}

@endsection