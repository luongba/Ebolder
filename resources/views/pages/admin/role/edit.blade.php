@extends('welcome')
@section('content')
    <div class="app-main__inner static lg:relative">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="lnr-book icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        <p>Roles</p>
                    </div>
                </div>



                <!---------------------     Start head content  section     --------------------->

            </div>

        </div>
        <div class="tabs-animation">
            <role-edit :param="{{  json_encode($id) }}"/>
            <!---------------------     Start content  section     --------------------->

        </div>
        <!---------------------     End main  content  section      --------------------->
    </div>
@endsection
@section('modal')
@endsection

