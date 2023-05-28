@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">
        <exam-list-enable :data="{{ json_encode($exams) }}" :user="{{json_encode(Auth::user()) }}"/>
    </div>
@endsection
