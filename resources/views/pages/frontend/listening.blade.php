@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">

        @if(isset($testId))
            <listening-test :data="{{ json_encode($listening) }}"
                            :query="{{ json_encode(['testId' => $testId, 'levelId' => $levelId]) }}" :user="{{json_encode(Auth::user()) }}"/>
        @else
            <listening-test :data="{{ json_encode($listening) }}" :user="{{json_encode(Auth::user()) }}" />
        @endif
    </div>
@endsection
