@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">
        @if(isset($request->testId))
            <reading-test :data="{{  json_encode($reading) }}" :query ="{{ json_encode(['testId' => $testId, 'levelId' => $levelId]) }}"/>

        @else
            <reading-test :data="{{  json_encode($reading) }}"/>

        @endif
    </div>
@endsection
