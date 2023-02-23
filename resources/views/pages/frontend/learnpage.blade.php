<!doctype html>
<html lang="en">
@include('layouts.head')
{{-- <style>
    * {
        font-family: lexend !important;
    }
    .bg-app {
        background-image: url('/images/bg/bg.png');
        background-repeat: no-repeat;
        background-size: cover;
    }
</style> --}}
<body>
    <div id="app">
        <div class="w-full h-full bg-app" >

            <learn-page :user="{{json_encode(Auth::user()) }}"/>
        </div>
        
    </div>
    @include('layouts.script')
</body>

</html>
