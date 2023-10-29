@extends('pages.frontend.master')
@section('content')
    <div class="w-full h-full">
        <features :user="{{json_encode(Auth::user()) }}" />
    </div>
@endsection
