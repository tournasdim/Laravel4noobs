@extends('layouts/master')
@section('title') 
{{$title}}
@stop

@section('content')
@include('notifications')
    <h1>Home page</h1>
    <p>Current time: {{ date('F j, Y, g:i A') }}  </p>
@include('lorem-ipsum')
@stop