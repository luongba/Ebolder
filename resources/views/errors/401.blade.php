@extends('pages.frontend.master')
@section('content')
    <div class="app-main__inner bg-white h-full">
        <!---------------------     Start head content  section     --------------------->
        <div class="app-page-title h-full">
            <div class="page-title-wrapper flex items-center h-full">
                <div class="page-title-heading w-full">
                    <div class="flex flex-col lg:flex-row justify-center w-full items-center">
                        <div>
                            <h1 class="text-[80px] text-black font-semibold text-center">Oops !</h1>
                            <p class="text-[20px] text-gray-600 font-semibold text-center">You do not have access</p>
                        </div>
                        <img src="{{asset('images/errors/401.gif')}}" alt="">
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

