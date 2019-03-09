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

        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        <?php
            if(!empty($google_analytics)){
                echo $google_analytics;
            }
        ?>
            <style>
            #box1 {
            width: min-content;
            display: table;
            position: relative;
            background: #334b64;
            margin: 0px auto 20px auto;
            box-shadow: 0px 0px 50px rgba(29, 80, 123, 0.3);
            }

            #txt1 {
            color: white;
            font-size: 14;
            text-align: center;
            position: relative;
            width: 100%;
            height: auto;
            word-wrap: break-word;
            white-space: pre-wrap
            }
            </style>

    </head>
    <body id="app-layout" style="background-color:lightcyan;">
        <div id="app">
            @include('includes.partials.logged-in-as')
            @include('frontend.includes.nav')
                @include('includes.partials.messages')
                @yield('content')
        </div><!--#app-->

        <!-- Scripts -->

        @yield('after-scripts')
        {{ Html::script('js/jquerysession.js') }}
        {{ Html::script('js/frontend/frontend.js') }}
        {!! Html::script('js/select2/select2.js') !!}

        <script type="text/javascript">
            if("{{Route::currentRouteName()}}" !== "frontend.user.account")
            {
                $.session.clear();
            }
        </script>
        @include('includes.partials.ga')


    </body>

        <footer class="page-footer font-small blue">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2018-2019 Copyright:CpE 4 - Information MultiMediaBoard Created by John Veniel Aranas, Freedom Anthony Vitasa and Ianjames Reonal
            <p>Adviser: Engr. Herrero and Moderator: Engr. Marquez</p>
            </div>
            <!-- Copyright -->

        </footer>
</html>