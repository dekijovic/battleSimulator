<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link href="{{asset('css/app.css')}}" rel="stylesheet">
<body>
<div class="container body">

    <div class="main_container">
        <div id="app">
            <pro-app></pro-app>
        </div>
    </div>
</div>



<script src="{{asset('js/app.js')}}"></script>
@stack('scripts')


</body>
</html>
