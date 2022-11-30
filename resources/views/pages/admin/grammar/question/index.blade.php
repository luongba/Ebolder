@extends('welcome')
@section('content')
    <div class="app-main__inner">
        <!---------------------     Start head content  section     --------------------->
        <div class="app-page-title flex justify-between items-center">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="lnr-book icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div class="flex justify-between">
                        <p>GRAMMAR LEVEL TEST</p>
                        {{-- <div class="page-title-subheading">
                            <ul>
                                <li>Read the text, then try to answer the questions.</li>
                                <li>There are 20 questions, and you see one at a time in a random order. The answers are not in the same order as the text.</li>
                                <li>Some questions are easier; some are more difficult. Don’t worry if you don’t know the answer!</li>
                                <li>Try not to use a dictionary – the idea is to find your natural level.</li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
            <a href="{{route('admin.grammar-question-create')}}" class="font-semibold text-[16px] text-[#3f6ad8] cursor-pointer mr-2">CREATE</a>
        </div>
        <!---------------------     End head content section     --------------------->
        <!---------------------     Start main  section     --------------------->
        <div class="tabs-animation">
            <question-grammar-list />
            <!---------------------     Start content  section     --------------------->

        </div>
        <!---------------------     End main  content  section      --------------------->
    </div>
@endsection
@section('modal')
@endsection

