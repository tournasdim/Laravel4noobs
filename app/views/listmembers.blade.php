@extends('layouts.master')
@section('title')
    {{$title}}
@stop

@section('content')
    <h1>Listing of all members</h1>

@include('notifications')
<hr>
    <h3 class='blue margin5'> A few words </h3>

@include('lorem-ipsum')
   <h3 class="blue margin5"> Members </h3>
   @foreach ($users as $user)
        <li>{{ $user->id }}  :  {{$user->username}} </li>
@endforeach
@stop