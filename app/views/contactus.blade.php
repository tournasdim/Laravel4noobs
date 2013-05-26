@extends('layouts/master')
@section('title') 
{{$title}}
@stop
@section('content')
@include('notifications')

{{-- http://laravel.com/api/class-Laravel.Form.html --}}
<body>
{{Form::open(array('url' => 'sendmail' , 'id' => 'contactForm')) }}
<h3 class="blue" > Contact Form </h3>
  <fieldset> 
    <legend>Send us your message </legend> 
    <p> 
{{Form::label('name', '*Name')}}
{{Form::text('name', '' , '' , array('id'=> 'name'))}}<br>
    </p> 
    <p> 
{{Form::label('email', '*Email ')}}
{{Form::text('email', '' , '' , array('id' => 'email'))}}<br>
    </p>
    <p> 
{{Form::label('message', '*Your message (max 200 characters)')}}<br>
{{Form::textarea('msg', '' , array('id'=> 'msg'))}}<br>
    </p> 
{{Form::label('', '*All fields must be filled' , array('class' => 'red-color'))}}<br>
{{Form::token()}}
    <p> 
{{Form::submit('Submit' , array('id' => 'send'))}}
    </p> 
  </fieldset> 
{{Form::close() }}
@stop
@section('javascript')
<script src="{{ URL::asset('http://code.jquery.com/jquery-latest.js') }}"></script>
<script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

 // Trigger an alert if message exceeds the max limit (500 chars)
  $('#contactForm').submit(function() {
     if ($('#msg').val().length >= 500) {
    alert('Your message can\'t excedd 500 characters.');            
    return false;
     }
  });
  // validate contact form on keyup and submit
  $("#contactForm").validate({
    rules: {
      name: "required",
      msg :{
      required: true,
      maxlength: 500
    },
      email: {
        required: true,
        email: true
      }
    },
    messages: {
      name: "Please enter your name .",
      msg : "Please enter your message.",
      email: "Please enter a valid email address ."

    }
  }); // End of form validation
}); // End of Document ready

</script>

@stop
