@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">
        @if(isset($testId))
            <reading-test :data="{{  json_encode($reading) }}" :query ="{{ json_encode(['testId' => $testId, 'levelId' => $levelId]) }}" :user="{{json_encode(Auth::user()) }}"/>

        @else
            <reading-test :data="{{  json_encode($reading) }}" :user="{{json_encode(Auth::user()) }}"/>

        @endif
    </div>
@endsection
