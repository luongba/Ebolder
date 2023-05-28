@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">
        @if(isset($testId))
            <grammar-test :data="{{  json_encode($grammar) }}" :query ="{{ json_encode(['testId' => $testId, 'levelId' => $levelId]) }}" :user="{{json_encode(Auth::user()) }}" :request="{{json_encode(Request::query())}}"/>

        @else
            <grammar-test :data="{{  json_encode($grammar) }}" :user="{{json_encode(Auth::user()) }}"/>

        @endif
    </div>
@endsection
