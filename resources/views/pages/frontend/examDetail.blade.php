@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">
        <exam-detail :user="{{json_encode(Auth::user()) }}" :param="{{  json_encode($id) }}"/>
    </div>
@endsection
