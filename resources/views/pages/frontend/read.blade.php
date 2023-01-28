@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">
        <reading-test :data="{{  json_encode($reading) }}" :query ="{{ json_encode(['testId' => $testId, 'levelId' => $levelId]) }}"/>
    </div>
@endsection
