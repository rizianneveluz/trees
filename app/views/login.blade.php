<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="An integrated system for building phylogenetic trees">
    <meta name="author" content="Veluz, Rizianne">

    <title>Log in</title>

    <!-- Bootstrap core CSS -->
    {{ HTML::style('css/bootstrap.css') }}

    <!-- Custom styles for this template -->
    {{ HTML::style('css/login.css') }}
  </head>

  <body>

    <div class="container">

      <form class="form-signin" role="form" action="{{ action('HomeController@postLogin') }}" method="post">
        <h2 class="form-signin-heading">Please log in</h2>

        
        <!-- If there are errors in the email provided, show them here -->
        <ul class="errors">
          @foreach($errors->get('email') as $message)
            <li>{{ $message }}</li>
          @endforeach
        </ul>

        {{ Form::email('email', Input::old(''), array('class' => 'form-control', 'placeholder' => 'Email address')) }}

        <!-- If there are errors in the password provided, show them here -->
        <ul class="errors">
          @foreach($errors->get('password') as $message)
              <li>{{ $message }}</li>
          @endforeach
        </ul>

        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
        <input type="submit" class="btn btn-lg btn-primary btn-block" value="Log in">
        <p> Don't have an account? <a href="{{ URL::to('register') }}"> Register here. </a> </p>
      </form>

    </div>
  </body>
</html>