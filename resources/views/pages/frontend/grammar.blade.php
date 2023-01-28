@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">
        <grammar-test :data="{{  json_encode($grammar) }}" :query ="{{ json_encode(['testId' => $testId, 'levelId' => $levelId]) }}"/>
    </div>
@endsection
