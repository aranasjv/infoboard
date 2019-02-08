@extends('frontend.layouts.app')

@section('content')
    <!---Welcome---->
    <div class="col-xs-12">

        <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #63D8ED">
                <i class="fa fa-home"></i> {{ trans('navs.general.home') }}
            </div>

            <div class="panel-body">
                {{ trans('strings.frontend.welcome_to', ['place' => app_name()]) }}
            </div>
        </div><!-- panel -->

    </div><!-- col-md-10 -->

    <div class="container">
        <div class="row mb-2">
            <div class="col">
                <div class="col-xs-12">

                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: #63D8ED"><i class="glyphicon glyphicon glyphicon-envelope"></i> Information Posts </div>

                        <div class="panel-body">

                            @foreach($blogs as $blog)
                                @if($blog->status == 'Published')
                                    <div class="panel panel-default">
                                        <div class="panel-heading" style="background-color: #AACCCA">{{$blog->name}}

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
                            @endforeach

                        </div>
                    </div>

                </div>
            </div><!-- panel -->
            </div>
            <div class="col">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #63D8ED"><i class="glyphicon glyphicon glyphicon-cloud"></i> Announcement and Event Calendars </div>

                    <div class="panel-body">
                        <i class="fa fa-home"></i>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-pinterest"></i>
                    </div>
                </div><!-- panel -->
            </div>
        </div>
   </div>



        @role('Administrator')
            {{-- You can also send through the Role ID --}}

            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #63D8ED"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.role') . trans('strings.frontend.tests.using_blade_extensions') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 1: ' . trans('strings.frontend.tests.you_can_see_because', ['role' => trans('roles.administrator')]) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endauth

        @if (access()->hasRole('Administrator'))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #63D8ED"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.role') . trans('strings.frontend.tests.using_access_helper.role_name') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 2: ' . trans('strings.frontend.tests.you_can_see_because', ['role' => trans('roles.administrator')]) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @if (access()->hasRole(1))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #63D8ED"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.role') . trans('strings.frontend.tests.using_access_helper.role_id') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 3: ' . trans('strings.frontend.tests.you_can_see_because', ['role' => trans('roles.administrator')]) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @if (access()->hasRoles(['Administrator', 1]))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #63D8ED"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.role') . trans('strings.frontend.tests.using_access_helper.array_roles_not') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 4: ' . trans('strings.frontend.tests.you_can_see_because', ['role' => trans('roles.administrator')]) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        {{-- The second parameter says the user must have all the roles specified. Administrator does not have the role with an id of 2, so this will not show. --}}
        @if (access()->hasRoles(['Administrator', 2], true))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #63D8ED"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.role') . trans('strings.frontend.tests.using_access_helper.array_roles') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.tests.you_can_see_because', ['role' => trans('roles.administrator')]) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @permission('view-backend')
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #63D8ED"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.permission') . trans('strings.frontend.tests.using_access_helper.permission_name') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 5: ' . trans('strings.frontend.tests.you_can_see_because_permission', ['permission' => 'view-backend']) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endauth

        @if (access()->hasPermission(1))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #63D8ED"><i class="fa fa-home" ></i> {{ trans('strings.frontend.tests.based_on.permission') . trans('strings.frontend.tests.using_access_helper.permission_id') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 6: ' . trans('strings.frontend.tests.you_can_see_because_permission', ['permission' => 'view_backend']) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @if (access()->hasPermissions(['view-backend', 1]))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #63D8ED"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.permission') . trans('strings.frontend.tests.using_access_helper.array_permissions_not') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.test') . ' 7: ' . trans('strings.frontend.tests.you_can_see_because_permission', ['permission' => 'view_backend']) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif

        @if (access()->hasPermissions(['view-backend', 2], true))
            <div class="col-xs-12">

                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #63D8ED"><i class="fa fa-home"></i> {{ trans('strings.frontend.tests.based_on.permission') . trans('strings.frontend.tests.using_access_helper.array_permissions') }}</div>

                    <div class="panel-body">
                        {{ trans('strings.frontend.tests.you_can_see_because_permission', ['permission' => 'view_backend']) }}
                    </div>
                </div><!-- panel -->

            </div><!-- col-md-10 -->
        @endif





@endsection