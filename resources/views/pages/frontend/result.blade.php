@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">
        <result-exam :data="{{ json_encode($history) }}" :user="{{json_encode(Auth::user()) }}"/>
    </div>
@endsection
