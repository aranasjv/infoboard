@extends('frontend.layouts.app')


@section('content')
    <!---Welcome---->
    <div class="container">
    <div class="col">

        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #344F79">
                <i class="fa fa-home"></i> <span style="color:#F1EDC4 " >{{ trans('navs.general.home') }}</span>
            </div>

            <div class="panel-body">
                {{ trans('strings.frontend.welcome_to', ['place' => app_name()]) }}
            </div>
        </div><!-- panel -->

    </div><!-- col-md-10 -->
    </div>

    <div class="container">
    <div class="col">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #344F79"><i class="fa fa-bullhorn"></i><span style="color:#F1EDC4 " >Announcement</span> </div>

            <div class="panel-body">
               @foreach($announcements as $announcement)
                    <span style="color:#2A5D8F" > <center><b>{{$announcement->title}}</b></center></span>
                    {{$announcement->content}}
                    <hr>
                @endforeach
            </div>
        </div><!-- panel -->
    </div>
    </div>

    <div class="container">
    <div class="col">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #344F79"><i class="fa fa-calendar"></i><span style="color:#F1EDC4 " > Event Calendars</span> </div>

            <div class="panel-body">
                <div class="panel-body">
                    {!! $calendar->calendar() !!}
                    {!! $calendar->script() !!}
                </div>
            </div>
        </div><!-- panel -->
    </div>
    </div>

    <div class="container">
        <div class="row mb-2">
            <div class="col">
                <div class="col-xs-12">

                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: #344F79"><i class="fa-info-circle"></i><span style="color:#F1EDC4 " > Information Posts</span> </div>

                        <div class="panel-body">

                            @foreach($blogs as $blog)
                                @if($blog->status == 'Published')
                                    <div class="panel panel-default">
                                        <div class="panel-heading" style="background-color: #5FA79B">{{$blog->name}}

                                        </div>
                                        <div class="panel-body">
                                            <center><img class="img-responsive" src="{{ asset('storage/img/blog/' . $blog->featured_image) }}" width="200" height="100" alt="Card image cap"></center>
                                            <p class="card-text">{!! $blog->content !!}</p>
                                            <a href="post/{{$blog->slug}}" class="btn btn-primary">Read More &rarr;</a>
                                        </div>
                                        <div class="panel-footer text-muted">
                                            Published on {{$blog->publish_datetime}} by {{$blog->owner->name}}
                                            <div>
                                            @foreach($blog->categories as $category)
                                                <span class="badge pull-xs-right">{{$category->name}}</span>
                                            @endforeach
                                            @foreach($blog->tags as $tag)
                                                <span class="badge badge-success float-left m-2">{{$tag->name}}</span>
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @elseif($blog->status == 'Scheduled')
                                    <?php
                                    $publish_date = \Carbon\Carbon::parse($blog->publish_datetime);
                                    ?>
                                    @if($publish_date->isPast())
                                            <div class="panel panel-default">
                                                <div class="panel-heading" style="background-color: #5FA79B">{{$blog->name}}

                                                </div>
                                                <div class="panel-body">
                                                    <center><img class="img-responsive" src="{{ asset('storage/img/blog/' . $blog->featured_image) }}" width="200" height="100" alt="Card image cap"></center>
                                                    <p class="card-text">{!! $blog->content !!}</p>
                                                    <a href="post/{{$blog->slug}}" class="btn btn-primary">Read More &rarr;</a>
                                                </div>
                                                <div class="panel-footer text-muted">
                                                    Published on {{$blog->publish_datetime}} by {{$blog->owner->name}}
                                                    <div>
                                                        @foreach($blog->categories as $category)
                                                            <span class="badge pull-xs-right">{{$category->name}}</span>
                                                        @endforeach
                                                        @foreach($blog->tags as $tag)
                                                            <span class="badge badge-success float-left m-2">{{$tag->name}}</span>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                @endif
                            @endforeach

                        </div>
                    </div>

                </div>
            </div><!-- panel -->
            </div>


@endsection

