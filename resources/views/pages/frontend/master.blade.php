<!doctype html>
<html lang="en">
@include('layouts.head')
<style>
    * {
        font-family: lexend;
    }
    .bg-app {
        background-color: #fff;
        color: #141416;
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
