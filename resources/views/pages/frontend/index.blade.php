@extends('pages.frontend.master')
@section('content')
    @if (session('token'))
        <input type="text" id="section" value="{{ session('token') }}" hidden>
    @endif
    <div class="w-full h-full">
        <home-page-component :user="{{json_encode(Auth::user()) }}"/>
    </div>
@endsection
@section('js')
    <script>
        let section = document.getElementById('section');
        localStorage.setItem('token', section.value);
    </script>

@endsection
