@extends('frontend.layouts.app')

@section('title','Event')

@section('content')
    <center><h2>Event title:</h2></center>
    <center><h1> {{$event->title}}</h1></center>

    <hr>
    <center><h2>Event Detail:</h2></center>
    <center><h3>{!! $event->content !!}</h3></center>
    <center><a href="/" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Back</a></center>
@endsection