@extends('main')


@section('title', '| Welcome')




@section('stylesheets')

    <link rel="stylesheet" type="text/css" href="styles.css"> 

@endsection
    
@section('content')
        
        <div class="row">

          <div class ="col-md-12">

            <div class="jumbotron">
                <h1>Welcome to by blog!</h1>
                <p class="lead">Welcome to my Blog</p>
                <p ><a class="btn btn-primary btn-lg" href="#" role="button">Popular posts</a></p>
            </div>

          </div> <!-- col-->

        </div> <!-- row-->

        <div class="row">

          <div class="col-md-8">

              @foreach ($posts as $post)

                <div class="post">
                    <h3> {{ $post->title}}</h3>
                    <p>  {{ substr($post->body, 0, 300) }} {{ strlen($post->body) > 300 ? "..." : "" }} </p>
                    <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary"> Read More</a>

                    <!--we have show the blog url, so instead of 'posts.show' route ,we use url -->
                    
                </div> <!-- post-->

                <hr>

              @endforeach
              

          </div> <!-- col-md-8-->

          <div class="col-md-3 col-md-offset-1">

            <h2>Sidebar </h2>

          </div>
        </div> <!--row-->


@endsection


