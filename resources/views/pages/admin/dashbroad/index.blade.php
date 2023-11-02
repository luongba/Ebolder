@extends('welcome')
@section('content')
    <div class="app-main__inner static lg:relative">
        <p class="text-4xl">Welcome back, {{ auth()->user()->name }}!</p>

        @if (session('token'))
            <input type="text" id="section" value="{{ session('token') }}" hidden>
        @endif
        <div class="tabs-animation">
            <div class="row">
                
            </div>
            <div class="row">

            </div>

        </div>
    </div>
@endsection

@section('js')
    <script>
        let section = document.getElementById('section');
        localStorage.setItem('token', section.value);
    </script>

@endsection
