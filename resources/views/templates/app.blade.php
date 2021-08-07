<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <base href="{{ config('app.url') }}" />
    <title>{{config('app.name')}}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <% for(var i=0; i < htmlWebpackPlugin.files.css.length; i++) {%>
        <link type="text/css" rel="stylesheet" href="<%= htmlWebpackPlugin.files.css[i] %>">
    <% } %>
    @stack('styles')
</head>

<body class="c-app">
    @include('layouts.sidebar')    
    <div class="c-wrapper c-fixed-components">
        @include('layouts.header')
        <div class="c-body">
            <main class="c-main">
                @yield('content')
            </main>
            <footer class="c-footer">
                <div><a href="https://coreui.io">CoreUI</a> © 2020 creativeLabs.</div>
                <div class="ml-auto">Powered by&nbsp;<a href="https://coreui.io/">CoreUI</a></div>
            </footer>
        </div>
    </div>

    <% for(var i=0; i < htmlWebpackPlugin.files.js.length; i++) {%>
        <script type="text/javascript" src="<%= htmlWebpackPlugin.files.js[i].replace('//js','/js') %>"></script>
    <% } %>
    <!-- adjust set moment to your locale setting -->    
    <script>
        moment.locale("{{ config('app.locale_moment') }}")
    </script>
    @stack('scripts')
</body>


</html>