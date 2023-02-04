@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">
        @if(isset($testId))
            <grammar-test :data="{{  json_encode($grammar) }}" :query ="{{ json_encode(['testId' => $testId, 'levelId' => $levelId]) }}"/>

        @else
            <grammar-test :data="{{  json_encode($grammar) }}"/>

        @endif
    </div>
@endsection
