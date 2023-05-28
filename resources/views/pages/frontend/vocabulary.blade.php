@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">
        @if(isset($testId))
            <vocabulary-test :data="{{  json_encode($vocabulary) }}" :query ="{{ json_encode(['testId' => $testId, 'levelId' => $levelId]) }}" :user="{{json_encode(Auth::user()) }}" :request="{{json_encode(Request::query())}}"/>

        @else
            <vocabulary-test :data="{{  json_encode($vocabulary) }}" :user="{{json_encode(Auth::user()) }}" />

        @endif
    </div>
@endsection
