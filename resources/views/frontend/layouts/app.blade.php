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
</html>