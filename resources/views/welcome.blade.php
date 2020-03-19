<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
