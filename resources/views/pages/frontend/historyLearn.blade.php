@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">
        <history-learn-page :data="{{json_encode($history) }}" :user="{{json_encode(Auth::user()) }}"/>
    </div>
@endsection
