@extends('welcome')
@section('content')
    <div class="app-main__inner">
        <!---------------------     Start head content  section     --------------------->

        <!---------------------     End head content section     --------------------->
        <!---------------------     Start main  section     --------------------->
        <div class="tabs-animation">
            <topic-reading-detail :param="{{  json_encode($id) }}" />
            <!---------------------     Start content  section     --------------------->

        </div>
        <!---------------------     End main  content  section      --------------------->
    </div>
@endsection
@section('modal')
@endsection
