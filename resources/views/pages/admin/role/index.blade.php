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
                <div class="page-title-actions">
                                    <span class="btn-icon-wrapper pr-2">
                                        <a class="btn-icon btn dev-button btn-primary" href="{{route('admin.role-create')}}" style="padding: 10px 15px;">
                                            <i class="pe-7s-plus dev-icon btn-icon-wrapper " style="margin-top: -3px;"></i>Create New Role
                                        </a>
                                    </span>
                </div>


                <!---------------------     Start head content  section     --------------------->

            </div>

        </div>
        <div class="tabs-animation">
            <role-list/>
            <!---------------------     Start content  section     --------------------->

        </div>
        <!---------------------     End main  content  section      --------------------->
    </div>
@endsection
@section('modal')
@endsection

