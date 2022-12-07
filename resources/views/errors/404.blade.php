@extends('pages.frontend.master')
@section('content')
    <div class="app-main__inner bg-white h-full">
        <!---------------------     Start head content  section     --------------------->
        <div class="app-page-title h-full">
            <div class="page-title-wrapper flex items-center h-full">
                <div class="page-title-heading w-full h-[100vh]">
                    <div class="flex flex-col lg:flex-row justify-center w-full items-center h-full">
                        <error-page />
                    </div>

                </div>
            </div>
        </div>
        <!---------------------     End head content section     --------------------->
        <!---------------------     Start main  section     --------------------->
        <div class="tabs-animation">
            <example-component />
            <!---------------------     Start content  section     --------------------->

        </div>
        <!---------------------     End main  content  section      --------------------->
    </div>
@endsection
@section('modal')
@endsection
