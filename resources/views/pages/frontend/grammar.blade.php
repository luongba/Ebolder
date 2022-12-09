@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">
        <grammar-test :data="{{  json_encode($grammar) }}"/>
    </div>
@endsection
