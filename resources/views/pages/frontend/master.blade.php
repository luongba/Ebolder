<!doctype html>
<html lang="en">
@include('layouts.head')
<style>
    * {
        font-family: lexend !important;
    }
    .bg-app {
        background-image: url('/images/bg/landing_page_bg.png');
        background-repeat: no-repeat;
        background-size: cover;
        color: #fff;
    }
</style>
<body>
    <div id="app">
        <div class="w-full h-full bg-app" >

            @yield('content')
        </div>
        
    </div>
    @include('layouts.script')
</body>

</html>
@yield('modal')
