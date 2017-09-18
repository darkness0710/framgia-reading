<!DOCTYPE html>
<html>
    <head>
        @include('layouts._sections.meta')

        <title>{{ config('app.name') }} | @yield('title')</title>

        {{ Html::style('bower_components/bootstrap/dist/css/bootstrap.css') }}
        {{ Html::style('bower_components/font-awesome/css/font-awesome.css') }}
        {{ Html::style('bower_components/simple-line-icons/css/simple-line-icons.css') }}
        {{ Html::style('css/main.css') }}
        {{ Html::style('css/plugin.css') }}
        {{ Html::style('css/style.css') }}
        {{ Html::style('css/custom.css') }}

        @yield('styles')
    </head>
    <body class="home">
        <div id="introLoader" class="introLoading"></div>

        @include('layouts._sections.primary')

        <div class="container-wrapper">
            <header id="header">
                @include('layouts._sections.navbar')
            </header>
            <div class="content">
                @yield('content')    
            </div>

            @include('layouts._sections.footer')
            
        </div>

        {{ Html::script('js/core-plugins.js') }}
        {{ Html::script('js/customs.js') }}
        {{ Html::script('js/auth.js') }}
        <!-- Only in Home Page -->
        {{ Html::script('js/jquery.flexdatalist.js') }}
        
        @stack('scripts')
    </body>
</html>
