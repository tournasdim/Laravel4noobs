@extends('layouts.master')
@section('title') 
{{$title}}
@stop

@section('content')
    <h2>Welcome "{{ Auth::user()->username }}" to the protected page!</h2>
    @include('lorem-ipsum')
@stop