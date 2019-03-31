@extends('frontend.layouts.app1')

@section('title','Post')

@section('content')

    <br>
    <br>
    <br>
    <font color="white">
    <center><h1> {{$blog->name}}   </h1></center>
    <center> by {{$blog->owner->name}}</center>
    <hr>
    <center><img class="img-responsive" src="{{ asset('storage/img/blog/' . $blog->featured_image) }}"  alt="Card image cap"></center>
    <hr>
    <center><h3>{!! $blog->content !!}</h3></center>
    <hr>
    <center><a href="/" class="btn btn-lg active" role="button" aria-pressed="true" style="background-color:darkred;"><font color="white">Back</font></a></center>
    <hr>
    </font>

@endsection

