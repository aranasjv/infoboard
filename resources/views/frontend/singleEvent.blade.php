@extends('frontend.layouts.app1')

@section('title','Event')

@section('content')
    <br>
    <br>
    <br>
    <font color="white">
    <center><h3>Event Title:</h3></center>
    <center><p><h1>{{$event->title}}</h1></p></center>

    <hr>
    <center><h3>Event Detail:</h3></center>
    <center><p><h1>{!! $event->content !!}</h1> </p> </center>
    <hr>
    <center><a href="/" class="btn btn-lg active" role="button" aria-pressed="true" style="background-color:darkred;"><font color="white">Back</font></a></center>
    <hr>
    </font>
@endsection