@extends('frontend.layouts.app')


@section('content')


    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <!---Welcome---->
            <div class="container-fluid">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #344F79">
                        <i class="fa fa-home" style="color:#F1EDC4"></i> <span style="color:#F1EDC4 " >{{ trans('navs.general.home') }}</span>
                    </div>

                    <div class="panel-body">
                        <center>{{ trans('strings.frontend.welcome_to', ['place' => app_name()]) }}</center>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>



    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <!-- announcement -->
            <div class="container-fluid">
                <div class="col">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: #344F79"><i class="fa fa-bullhorn" style="color:#F1EDC4"></i><span style="color:#F1EDC4 " >Announcement</span> </div>

                        <div class="panel-body">
                            @foreach($announcements as $announcement)
                                <span style="Font-size:3vw; color:#2A5D8F" > <center><b>''{{$announcement->title}}''</b></center></span>
                                <span style="Font-size:2vw;" >{{$announcement->content}}</span>
                                <hr>
                            @endforeach
                        </div>
                        <div class="panel-footer" style="background-color: #344F79"><center>{!! $announcements->render() !!}</center></div>
                    </div><!-- panel -->
                </div>
            </div>
            </div>
        <div class="col-sm-1"></div>
    </div>



    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10"> <!-- Video Post -->
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col">
                        <div class="col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color: #344F79"><i class="fa fa-video-camera" style="color:#F1EDC4"></i><span style="color:#F1EDC4 " > Information Video</span> </div>

                                <div class="panel-body">

                                    @foreach($videos as $video)

                                        <center><span style="color:#344F79" ><h3>{{$video->title}}</h3></span></center>


                                        <div class="panel-body">
                                            <center>
                                                <video class="img-responsive"1 width="1280" height="480" controls>
                                                    <source src="{{ asset('storage/video/' . $video->video_name) }}"></center>
                                            </video>
                                            </center>
                                        </div>


                                    @endforeach

                                </div>
                                <div class="panel-footer" style="background-color: #344F79"><center>{!! $videos->render() !!}</center></div>
                            </div>
                        </div>
                    </div><!-- panel -->
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>





    <div class="row" >
        <div class="col-sm-6">
            <!-- Calendar -->
            <div class="container-fluid">
                <div class="col">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: #344F79"><i class="fa fa-calendar" style="color:#F1EDC4"></i><span style="color:#F1EDC4 " > Event Calendars</span> </div>

                        <div class="panel-body">
                            <div class="panel-body">
                                {!! $calendar->calendar() !!}
                                {!! $calendar->script() !!}
                            </div>
                        </div>
                    </div><!-- panel -->
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <!-- Image Post -->
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col">
                        <div class="col-xs-12">

                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color: #344F79"><i class="fa fa-info-circle" style="color:#F1EDC4"></i><span style="color:#F1EDC4 " > Information Posts</span> </div>

                                <div class="panel-body">

                                    @foreach($blogs as $blog)
                                        @if($blog->status == 'Published')
                                            <div class="panel panel-default">
                                                <div class="panel-heading" style="background-color: #344F79"><span style="color:#F1EDC4 " >{{$blog->name}}</span>

                                                </div>
                                                <div class="panel-body">
                                                    <center><img class="img-responsive" src="{{ asset('storage/img/blog/' . $blog->featured_image) }}" width="200" height="100" alt="Card image cap"></center>
                                                    @if($blog!=null)
                                                        <p class="card-text">{!! $blog->meta_description !!}</p>
                                                    @endif
                                                    <a href="post/view/{{$blog->slug}}" class="btn btn-primary">Read More &rarr;</a>
                                                </div>
                                                <div class="panel-footer text-muted" style="background-color: #344F79">
                                                    <span style="color:#F1EDC4 " > Published on {{$blog->publish_datetime}} by {{$blog->owner->name}}</span>
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
                                                    <div class="panel-heading" style="background-color: #344F79"></i><span style="color:#F1EDC4 " >{{$blog->name}}</span>

                                                    </div>
                                                    <div class="panel-body">
                                                        <center><img class="img-responsive" src="{{ asset('storage/img/blog/' . $blog->featured_image) }}" width="200" height="100" alt="Card image cap"></center>
                                                        <p class="card-text">{!! $blog->content !!}</p>
                                                        <a href="post/view/{{$blog->slug}}" class="btn btn-primary">Read More &rarr;</a>
                                                    </div>
                                                    <div class="panel-footer text-muted" style="background-color: #344F79">
                                                        <span style="color:#F1EDC4 " > Published on {{$blog->publish_datetime}} by {{$blog->owner->name}}</span>
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
                                <div class="panel-footer" style="background-color: #344F79"><center>{!! $blogs->render() !!}</center></div>
                            </div>

                        </div>
                    </div><!-- panel -->
                </div>
            </div>
        </div>
    </div>

@endsection
