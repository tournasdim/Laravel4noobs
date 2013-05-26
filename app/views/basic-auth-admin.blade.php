@extends('layouts/master')
@section('title') 
{{$title}}
@stop
@section('content')
@include('notifications')

<h1>Hello this is a basic auth demonstration </h1>
 @include('lorem-ipsum')

@stop