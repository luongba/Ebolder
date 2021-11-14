@extends('welcome')
@section('content')
    <div class="app-main__inner">
        <!---------------------     Start head content  section     --------------------->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-user icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        My Infomations
                        <div class="page-title-subheading">Setup your basic your infomations.</div>
                    </div>
                </div>
            </div>
        </div>
        <!---------------------     End head content section     --------------------->
        <!---------------------     Start main  section     --------------------->
        <div class="tabs-animation">
            <!---------------------     Start content  section     --------------------->
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body">
{{--                        sau nay chuyen sang form--}}
                        <div class="" id="signupForm" method="post" action="" novalidate="novalidate">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="firstname">First name</label>
                                        <input type="text" class="form-control" id="firstname" name="first name" value="Evans">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <div class="position-relative form-group">
                                            <label for="lastname">Last name</label>
                                            <input type="text" class="form-control" id="lastname" name="last name" value="Chris">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="exampleEmail11" class="">Email</label>
                                        <input name="email" id="exampleEmail11" type="email" class="form-control" value="chrisevans@gmail.com">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="examplePassword11" class="">Current Password</label>
                                        <input name="password" id="examplePassword11" type="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="password">New Password</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="confirm_password">Retype New Password</label>
                                        <div>
                                            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative form-group">
                                <div class="position-relative form-group">
                                    <label for="phonenumber">Phone Number</label>
                                    <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="+1571 268 2466">
                                </div>
                            </div>
                            <h4 class="card-title" style="font-size: 1em">Email notifications <i class="fa text-primary fa-question-circle text-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Select which notification emails you would like to receive"></i></h4>
                            <div class="position-relative form-group">
                                <div>
                                    <div class="custom-checkbox custom-control">
                                        <input type="checkbox" id="exampleCustomCheckbox" class="custom-control-input">
                                        <label class="custom-control-label" for="exampleCustomCheckbox">Daily campaign updates</label>
                                    </div>
                                    <div class="custom-checkbox custom-control">
                                        <input type="checkbox" id="exampleCustomCheckbox2" class="custom-control-input">
                                        <label class="custom-control-label" for="exampleCustomCheckbox2">Weekly campaign updates</label>
                                    </div>
                                </div>
                            </div>
                            <button class="mt-2 btn btn-primary dev-submit-button" type="submit">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!---------------------     End main  content  section      --------------------->
    </div>
@endsection
@section('modal')
@endsection
