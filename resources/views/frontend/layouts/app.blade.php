@php
            use Illuminate\Support\Facades\Route;
        @endphp
        <!DOCTYPE html>
        <html lang="{{ config('app.locale') }}">
        <head>

            <link href={{ asset('css/fullcalendar.min.css')}} rel='stylesheet' />
            <link href={{ asset('css/fullcalendar.print.min.css')}} rel='stylesheet' media='print' />
            <script src={{asset('js/lib/moment.min.js')}}></script>
            <script src={{asset('js/lib/jquery.min.js')}}></script>
            <script src={{asset('js/fullcalendar.min.js')}}></script>
            <script src='../fullcalendar.min.js'></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
            <script type="text/javascript" href="https://cdnjs.cloudflare.com/ajax/libs/FitText.js/1.1/jquery.fittext.js"></script>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <title>@yield('title', app_name())</title>
            <!-- Meta -->
            <meta name="description" content="@yield('meta_description', 'MultiMediaBoard')">
            <meta name="author" content="@yield('meta_author', 'Aranas Jv')">
        @yield('meta')

        <!-- Styles -->
        @yield('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
            <!-- Otherwise apply the normal LTR layouts -->
        @langRTL
        {{ Html::style(getRtlCss(mix('css/frontend.css'))) }}
        @else
            {{ Html::style(mix('css/frontend.css')) }}
        @endif
        {!! Html::style('js/select2/select2.css') !!}
        @yield('after-styles')

            <script type="text/javascript">
                $.fn.ready(function(){
                    $("p").fitText(2,{'minFontSize':10, 'maxfontsize':15});
                })

            </script>

    </head>
    <body id="app-layout" style="background-color: #1E5FA3;">
        <div id="app">
            @include('frontend.includes.nav')
                @include('includes.partials.messages')
            <div class="container-fluid">
                @yield('content')
            </div>
        </div><!--#app-->

        <!-- Scripts -->
        @yield('after-scripts')
        {{ Html::script('js/jquerysession.js') }}
        {{ Html::script('js/frontend/frontend.js') }}
        {!! Html::script('js/select2/select2.js') !!}
    </body>

        <footer class="page-footer font-small blue">

            <!-- Copyright -->
            <font color="white">
            <div class="footer-copyright text-center py-3">© 2018-2019 Copyright:CpE 4 - Information MultiMediaBoard Created by John Veniel Aranas, Freedom Anthony Vitasa and Ianjames Reonal
            <p>Adviser: Engr. Herrero and Moderator: Engr. Marquez</p>
                <a data-toggle="modal" data-target="#privacyModal"><span style="color:#ffffff " >Privacy Policy</span></a>
            </div>
            </font>


            <!-- Modal -->
            <div class="modal fade" id="privacyModal" role="dialog">
                <div class="modal-dialog ">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:	#344F79;">
                            <h4 class="modal-title"><span style="color:#ffffff " >Privacy Policy</span></h4>
                        </div>
                        <div class="modal-body">
                            <p><b>Information We Collect Automatically</b><br>
                                When you access or use our Services, we may also automatically collect information about you. This includes:<br>

                                <b>Log and usage data.</b>  We may log information when you access and use the Services. This may include your IP address, user-agent string, browser type, operating system, referral URLs, device information (e.g., device IDs), pages visited, links clicked, the requested URL, hardware settings, and search terms.<br>

                                <b>Information collected from cookies and similar technologies.</b>  We may receive information from cookies, which are pieces of data your browser stores and sends back to us when making requests, and similar technologies. We use this information to improve your experience, understand user activity, personalize content and advertisements, and improve the quality of our Services. For example, we store and retrieve information about your preferred language and other settings.<br>

                                <b>Location information.</b>  We may receive and process information about your location. For example, with your consent, we may collect information about the specific location of your mobile device (for example, by using GPS or Bluetooth). We may also receive location information from you when you choose to share such information on our Services, including by associating your content with a location, or we may derive your approximate location from other information about you, including your IP address.</p>
                        </div>
                        <div class="modal-footer" style="background-color:	#344F79;">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>

            </div>
            <!-- Copyright -->
>

       </footer>
</html>