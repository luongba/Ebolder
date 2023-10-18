@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">
        <lesson-page :data="{{ json_encode($lesson) }}"
            :query="{{ json_encode(['testId' => $testId, 'levelId' => $levelId]) }}" :user="{{ json_encode(Auth::user()) }}"
            :request="{{ json_encode(Request::query()) }}" />
    </div>
@endsection
