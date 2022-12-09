@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">
        <vocabulary-test :data="{{  json_encode($vocabulary) }}"/>
    </div>
@endsection
