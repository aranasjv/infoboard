@extends('frontend.layouts.app1')

@section('title','Post')

@section('content')

    <br>
    <br>
    <br>
    <font color="white">
    <center><H1><p>{{$blog->name}}</H1> </p></center>
    <center> by {{$blog->owner->name}}</center>
    <hr>
    <center><img class="img-responsive" src="{{ asset('storage/img/blog/' . $blog->featured_image) }}" width="600" height="400"   alt="Card image cap"></center>
    <hr>
    <p>{!! $blog->content !!}</p>
    <hr>
    <center><a href="/" class="btn btn-lg active" role="button" aria-pressed="true" style="background-color:darkred;"><font color="white">Back</font></a></center>
    <hr>
    </font>

@endsection

