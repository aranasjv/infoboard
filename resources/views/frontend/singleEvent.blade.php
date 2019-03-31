@extends('frontend.layouts.app1')

@section('title','Event')

@section('content')
    <br>
    <br>
    <br>
    <font color="white">
    <center><h2>Event Title:</h2></center>
    <center><h1> {{$event->title}}</h1></center>

    <hr>
    <center><h2>Event Detail:</h2></center>
    <center><h3>{!! $event->content !!}</h3></center>
    <hr>
    <center><a href="/" class="btn btn-lg active" role="button" aria-pressed="true" style="background-color:darkred;"><font color="white">Back</font></a></center>
    <hr>
    </font>
@endsection