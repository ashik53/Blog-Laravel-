@extends('main')

@section('title', "|  {{ htmlspecialchars($post->title) }} ")

@section('content')

	<div class="row">

		<div class="col-md-8 col-md-offset-2">

			<h1> {{ htmlspecialchars($post->title) }}</h1>

			<p> {{ $post->body }}</p>

		</div> <!-- col-->

	</div> <!-- row-->

@endsection