@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">
        <vocabulary-test :data="{{  json_encode($vocabulary) }}" :query ="{{ json_encode(['testId' => $testId, 'levelId' => $levelId]) }}"/>
    </div>
@endsection
