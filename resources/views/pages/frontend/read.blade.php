@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">
        <reading-test :data="{{  json_encode($reading) }}"/>
    </div>
@endsection
