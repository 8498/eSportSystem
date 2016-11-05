<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        
    </head>
    <body>
        <div class="content">
        @include('layouts.navs.main-nav')
        
        @yield('content')
        
        @include('layouts.partials.footer')

        <!-- modals -->
        @include('modals.login-modal')
        @include('modals.create-user-modal')

        </div>
        <!-- Scripts -->
        <script src="/js/app.js"></script>
    </body>
</html>