@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">
        <listening-test :data="{{  json_encode($listening) }}"/>
    </div>
@endsection
