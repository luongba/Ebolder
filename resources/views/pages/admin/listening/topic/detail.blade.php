@extends('welcome')
@section('content')
    <div class="app-main__inner static lg:relative">
        <!---------------------     Start head content  section     --------------------->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="lnr-book icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        VOCABULARY LEVEL TEST
                    </div>
                </div>
            </div>
        </div>
        <!---------------------     End head content section     --------------------->
        <!---------------------     Start main  section     --------------------->
        <div class="tabs-animation">
            <Listening-detail :param="{{  json_encode($id) }}" />
            <!---------------------     Start content  section     --------------------->

        </div>
        <!---------------------     End main  content  section      --------------------->
    </div>
@endsection
@section('modal')
@endsection

