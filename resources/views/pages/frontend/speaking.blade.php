@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">

        @if(isset($testId))
            <page-speak-luyen-am :data="{{ json_encode($speaking) }}"
                            :query="{{ json_encode(['testId' => $testId, 'levelId' => $levelId]) }}" :user="{{json_encode(Auth::user()) }}"/>
        @else
            <page-speak-luyen-am :data="{{ json_encode($speaking) }}" :user="{{json_encode(Auth::user()) }}" />
        @endif
    </div>
@endsection
