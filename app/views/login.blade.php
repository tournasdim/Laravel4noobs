@extends('layouts.master')
@section('title')
Login page
@stop

@section('content')
    <h1>Login</h1>

@include('notifications')

    {{Form::open(array('url' => 'login', 'method' => 'post' ,
                        'id' => 'loginForm'))}}

    <!-- username field -->
    <p>
        {{ Form::label('username', 'Username') }}<br/>
        {{ Form::text('username', Input::old('username') , 
                        array('id' => 'username')) }}
    </p>

    <!-- password field -->
    <p>
        {{ Form::label('password', 'Password') }}<br/>
        {{ Form::password('password' , array('id' => 'password')) }}
    </p>

    <!-- reCaptcha spam protection -->
{{ Form::label('reCaptha', 'reCaptcha secret words (spam protection)') }}<br/>
{{Form::captcha(array('theme' => 'red'))}}

    <!-- CSRF protection (Cross Site Request Forgery) -->
    {{Form::token()}}

    <!-- submit button -->
    <p>{{ Form::submit('Login') }}</p>

    {{ Form::close() }}
@stop

@section('javascript')
<script src="{{ URL::asset('http://code.jquery.com/jquery-latest.js') }}"></script>
<script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/additional-methods.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
// http://jqueryvalidation.org/maxlength-method 

// Verify that reCaptcha isn't empty during submittion
    $('#loginForm').submit(function() {
     var text = $('#recaptcha_response_field').val() ; 
     if ( $('#recaptcha_response_field').val() === '') 
     {
    alert("Sorry , reCaptcha secret words are required");            
    return false;
     }   
     
  });
  // validate contact form on keyup and submit
  $("#loginForm").validate({
    rules: {
      username: "required",
      password : "required",
 
    },
    messages: {
      username: "Please enter your username .",
      password : "Please enter your password ." ,
 
    }
  });
  

});
</script>

@stop