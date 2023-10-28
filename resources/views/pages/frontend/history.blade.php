@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">
        <history-page :data="{{json_encode($history) }}" :history_study="{{json_encode($historyStudy) }}" :user="{{json_encode(Auth::user()) }}"/>
    </div>
@endsection
