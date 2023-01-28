@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">
        <listening-test
            :data="{{ json_encode($listening) }}" :query ="{{ json_encode(['testId' => $testId, 'levelId' => $levelId]) }}" />
    </div>
@endsection
