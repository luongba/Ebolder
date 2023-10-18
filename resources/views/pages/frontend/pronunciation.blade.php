@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">
        @if(isset($testId))
            <pronunciation-test :data="{{  json_encode($pronunciation) }}" :query ="{{ json_encode(['testId' => $testId, 'levelId' => $levelId]) }}" :user="{{json_encode(Auth::user()) }}" :request="{{json_encode(Request::query())}}"/>

        @else
            <pronunciation-test :data="{{  json_encode($pronunciation) }}" :user="{{json_encode(Auth::user()) }}"/>

        @endif
    </div>
@endsection
