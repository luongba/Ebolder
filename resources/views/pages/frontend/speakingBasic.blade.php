@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">
        @if(isset($testId))
            <speaking-test :data="{{  json_encode($speaking) }}" :query ="{{ json_encode(['testId' => $testId, 'levelId' => $levelId]) }}" :user="{{json_encode(Auth::user()) }}" :request="{{json_encode(Request::query())}}"/>

        @else
            <speaking-test :data="{{  json_encode($speaking) }}" :user="{{json_encode(Auth::user()) }}"/>

        @endif
    </div>
@endsection
