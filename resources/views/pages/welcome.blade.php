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
              <div class="post">
                  <h3> Post Title</h3>
                  <p> This is a text. This is a text. This is a text. This is a text. This is a text. This is a text. This is a text. 
                  </p>
                  <a href="#" class="btn btn-primary"> Read More</a>
              </div> <!-- post-->

              <hr>

              <div class="post">
                  <h3> Post Title</h3>
                  <p> This is a text. This is a text. This is a text. This is a text. This is a text. This is a text. This is a text. 
                  </p>
                  <a href="#" class="btn btn-primary">Read More </a>
              </div> <!-- post-->

              <hr>

              <div class="post">
                  <h3> Post Title</h3>
                  <p> This is a text. This is a text. This is a text. This is a text. This is a text. This is a text. This is a text. 
                  </p>
                  <a href="#" class="btn btn-primary"> Read More</a>
              </div> <!-- post-->

              <hr>

              <div class="post">
                  <h3> Post Title</h3>
                  <p> This is a text. This is a text. This is a text. This is a text. This is a text. This is a text. This is a text. 
                  </p>
                  <a href="#" class="btn btn-primary">Read More </a>
              </div> <!-- post-->

              <hr>


          </div>

          <div class="col-md-3 col-md-offset-1">

            <h2>Sidebar </h2>

          </div>
        </div> <!--row-->


@endsection


