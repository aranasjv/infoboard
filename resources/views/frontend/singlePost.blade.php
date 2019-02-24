@extends('frontend.layouts.app')

@section('title','Post')

@section('content')

    <center><h1> {{$blog->name}}   </h1></center>
    <center> by {{$blog->owner->name}}</center>
    <hr>
    <center><img class="img-responsive" src="{{ asset('storage/img/blog/' . $blog->featured_image) }}"  alt="Card image cap"></center>
    <hr>
    <center><h3>{!! $blog->content !!}</h3></center>
    <center><a href="/" class="btn btn-danger btn-lg active" role="button" aria-pressed="true">Back</a></center>
@endsection