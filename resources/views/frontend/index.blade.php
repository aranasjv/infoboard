@extends('frontend.layouts.app')



@section('content')

    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <!---Welcome---->
            <div class="container-fluid">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #bc3330">
                        <i class="fa fa-home" style="color:#ffffff"></i> <span style="color:#ffffff " >{{ trans('navs.general.home') }}</span>
                    </div>

                    <div class="panel-body" >
                        <center>{{ trans('strings.frontend.welcome_to', ['place' => app_name()]) }}
                        <p><h5>
                            To receive push notification of the latest information and view the information on your android phones.<br>
                            Download the Android Application for this Information MultiMediaboard on:<br>
                            “https://github.com/aranasjv/CpE4---Multimedia Board-Android
                            App/blob/master/CpE-4.apk"
                        </h5></p>

                            <H5>*compatible with android phone with Android version 4 and above*</H5>
                        </center>
                    </div>
                </div>
            </div>
        </div >
        <div class="col-sm-1"></div>
    </div>

    <div  class="row" id="announcement">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <!-- announcement -->
            <div class="container-fluid">
                <div class="col">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: #bc3330"><i class="fa fa-bullhorn" style="color:#ffffff"></i><span style="color:#ffffff " >Announcement</span> </div>

                        <div class="panel-body">
                            @foreach($announcements as $announcement)
                                <p style="text-align: center;  color:#2A5D8F;" > <b>''{{$announcement->title}}''</b></p>
                                <span style="text-align: left" >{{$announcement->content}}</span>
                                <hr>
                            @endforeach
                        </div>
                        <div class="panel-footer" style="background-color: #bc3330"><center>{!! $announcements->render() !!}</center></div>
                    </div><!-- panel -->
                </div>
            </div>
            </div>
        <div class="col-sm-1"></div>
    </div>



    <div class="row" id="video">
        <div class="col-sm-1"></div>
        <div class="col-sm-10"> <!-- Video Post -->
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col">
                        <div class="col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color: #bc3330"><i class="fa fa-video-camera" style="color:#ffffff"></i><span style="color:#ffffff " > Information Video</span> </div>

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
                                <div class="panel-footer" style="background-color: #bc3330"><center>{!! $videos->render() !!}</center></div>
                            </div>
                        </div>
                    </div><!-- panel -->
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>


    <div class="row" id="calendar">
        <div class="col-sm-1"></div>
        <div class="col-sm-10"> <!-- Video Post -->
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col">
                        <div class="col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color: #bc3330"><i class="fa fa-calendar" style="color:#ffffff"></i><span style="color:#ffffff " > Event Calendars</span> </div>

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
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>

    <div class="row" id="post">
        <div class="col-sm-1"></div>
        <div class="col-sm-10"> <!-- Video Post -->
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col">
                        <div class="col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading" style="background-color: #bc3330"><i class="fa fa-info-circle" style="color:#ffffff"></i><span style="color:#ffffff " > Information Posts</span> </div>

                                <div class="panel-body">

                                    @foreach($blogs as $blog)
                                        @if($blog->status == 'Published')
                                            <div class="panel panel-default">
                                                <div class="panel-heading" style="background-color: #bc3330"><span style="color:#ffffff " >{{$blog->name}}</span>

                                                </div>
                                                <div class="panel-body">
                                                    <center><img class="img-responsive" src="{{ asset('storage/img/blog/' . $blog->featured_image) }}" width="200" height="100" alt="Card image cap"></center>
                                                    @if($blog!=null)
                                                        <p class="card-text">{!! $blog->meta_description !!}</p>
                                                    @endif
                                                    <a href="post/view/{{$blog->slug}}" class="btn btn-primary">Read More &rarr;</a>
                                                </div>
                                                <div class="panel-footer text-muted" style="background-color: #bc3330">
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
                                                    <div class="panel-heading" style="background-color: #bc3330"></i><span style="color:#ffffff " >{{$blog->name}}</span>

                                                    </div>
                                                    <div class="panel-body">
                                                        <center><img class="img-responsive" src="{{ asset('storage/img/blog/' . $blog->featured_image) }}" width="200" height="100" alt="Card image cap"></center>
                                                        <p class="card-text">{!! $blog->content !!}</p>
                                                        <a href="post/view/{{$blog->slug}}" class="btn btn-primary">Read More &rarr;</a>
                                                    </div>
                                                    <div class="panel-footer text-muted" style="background-color: #bc3330">
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
                                <div class="panel-footer" style="background-color: #bc3330"><center>{!! $blogs->render() !!}</center></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>


@endsection
