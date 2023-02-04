@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">
        @if(isset($testId))
            <vocabulary-test :data="{{  json_encode($vocabulary) }}" :query ="{{ json_encode(['testId' => $testId, 'levelId' => $levelId]) }}"/>

        @else
            <vocabulary-test :data="{{  json_encode($vocabulary) }}" />

        @endif
    </div>
@endsection
