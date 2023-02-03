@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">
        @if(isset($request->testId))
            <listening-test :data="{{ json_encode($listening) }}"
                            :query="{{ json_encode(['testId' => $testId, 'levelId' => $levelId]) }}"/>
        @else
            <listening-test :data="{{ json_encode($listening) }}"/>
        @endif
    </div>
@endsection
