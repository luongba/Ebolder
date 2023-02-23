@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">
        <lesson-page :data="{{  json_encode($lesson) }}" :user="{{json_encode(Auth::user()) }}"/>
    </div>
@endsection
