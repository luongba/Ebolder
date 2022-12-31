@extends('welcome')
@section('content')
    <div class="app-main__inner static lg:relative">
        @if (session('token'))
            <input type="text" id="section" value="{{ session('token') }}" hidden>
        @endif
        <!---------------------     Start head content  section     --------------------->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-graph icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        Dashboard
                        <div class="page-title-subheading">Create your campaigns swiftly and win more sales with Ebolder!.</div>
                    </div>
                </div>
                <div class="page-title-actions">
                                    <span class="btn-icon-wrapper pr-2">
                                        <a class="btn-icon btn dev-button btn-primary"  style="padding: 10px 15px;">
                                            <i class="pe-7s-plus dev-icon btn-icon-wrapper " style="margin-top: -3px;"></i>Create New Campaign
                                        </a>
                                    </span>
                </div>
            </div>
        </div>
        <!---------------------     End head content  section     --------------------->
        <!---------------------     Start main  content  section     --------------------->
        <div class="tabs-animation">
            <!---------------------     Start report short  content  section     --------------------->
            <div class="mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <i class="header-icon pe-7s-graph3 bg-grow-early icon-gradient"></i>
                        Quickly Revenue Report
                    </div>
                    <div class="btn-actions-pane-right text-capitalize">
                        <div class="">
                            <div role="group" class="btn-group-sm btn-group">
                                <button class="btn-hover-shine btn-shadow btn btn-dark">Today</button>
                                <button class="btn-hover-shine btn btn-dark">Week</button>
                                <button class="btn-hover-shine btn btn-dark">Month</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="no-gutters row">
                    <div class="col-sm-6 col-md-4 col-xl-4">
                        <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                            <div class="icon-wrapper rounded-circle">
                                <div class="icon-wrapper-bg opacity-10 bg-warning"></div>
                                <i class="lnr-bullhorn text-dark opacity-8"></i>
                            </div>
                            <div class="widget-chart-content">
                                <div class="widget-subheading">Signups Revenue</div>
                                <div class="widget-numbers">$20,000</div>
                                <div class="widget-description opacity-8 text-focus">
                                    <div class="d-inline text-success pr-1">
                                        <i class="fa fa-angle-up"></i>
                                        <span class="pl-1">20.5%</span>
                                    </div>
                                    Up Earnings
                                </div>
                            </div>
                        </div>
                        <div class="divider m-0 d-md-none d-sm-block"></div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-4">
                        <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                            <div class="icon-wrapper rounded-circle">
                                <div class="icon-wrapper-bg opacity-9 bg-danger"></div>
                                <i class="pe-7s-paper-plane text-white"></i>
                            </div>
                            <div class="widget-chart-content">
                                <div class="widget-subheading">Email  Revenue</div>
                                <div class="widget-numbers">
                                    <span>$10,000</span>
                                </div>
                                <div class="widget-description opacity-8 text-focus">
                                    Grow Rate:
                                    <span class="text-info pl-1">
                                                        <i class="fa fa-angle-down"></i>
                                                        <span class="pl-1">10.5%</span>
                                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="divider m-0 d-md-none d-sm-block"></div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-xl-4">
                        <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                            <div class="icon-wrapper rounded-circle">
                                <div class="icon-wrapper-bg opacity-9 bg-success"></div>
                                <i class="pe-7s-cash text-white"></i>
                            </div>
                            <div class="widget-chart-content">
                                <div class="widget-subheading">Total Revenue</div>
                                <div class="widget-numbers text-success">
                                    <span>$30,000</span>
                                </div>
                                <div class="widget-description text-focus">
                                    Increased by
                                    <span class="text-warning pl-1">
                                                        <i class="fa fa-angle-up"></i>
                                                        <span class="pl-1">10.35%</span>
                                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <i class="header-icon lnr-bullhorn icon-gradient bg-grow-early"></i>
                        Quickly Campaigns Signup Report
                    </div>
                    <div class="btn-actions-pane-right text-capitalize">
                        <div class="">
                            <div role="group" class="btn-group-sm btn-group">
                                <button class="btn-hover-shine btn-shadow btn btn-dark">Today</button>
                                <button class="btn-hover-shine btn btn-dark">Week</button>
                                <button class="btn-hover-shine btn btn-dark">Month</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="no-gutters row">
                    <div class="col-sm-6 col-md-4 col-xl-4">
                        <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                            <div class="icon-wrapper rounded-circle">
                                <div class="icon-wrapper-bg opacity-10 bg-warning"></div>
                                <i class="lnr-eye text-dark opacity-9"></i>
                            </div>
                            <div class="widget-chart-content">
                                <div class="widget-subheading">Total Views</div>
                                <div class="widget-numbers">10000</div>
                                <div class="widget-description opacity-8 text-focus">
                                    <div class="d-inline text-success pr-1">
                                        <i class="fa fa-angle-up"></i>
                                        <span class="pl-1">10.5%</span>
                                    </div>
                                    Up View
                                </div>
                            </div>
                        </div>
                        <div class="divider m-0 d-md-none d-sm-block"></div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-4">
                        <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                            <div class="icon-wrapper rounded-circle">
                                <div class="icon-wrapper-bg opacity-9 bg-danger"></div>
                                <i class="pe-7s-display2 text-white"></i>
                            </div>
                            <div class="widget-chart-content">
                                <div class="widget-subheading">Total Signups</div>
                                <div class="widget-numbers">
                                    <span>5000</span>
                                </div>
                                <div class="widget-description opacity-8 text-focus">
                                    Signups rate:
                                    <span class="text-info pl-1">
                                                        <i class="fa fa-angle-up"></i>
                                                        <span class="pl-1">50%</span>
                                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="divider m-0 d-md-none d-sm-block"></div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-xl-4">
                        <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                            <div class="icon-wrapper rounded-circle">
                                <div class="icon-wrapper-bg opacity-9 bg-success"></div>
                                <i class="lnr-cart text-white"></i>
                            </div>
                            <div class="widget-chart-content">
                                <div class="widget-subheading">Total Order:</div>
                                <div class="widget-numbers text-danger">
                                    <span>500</span>
                                </div>
                                <div class="widget-description text-focus">
                                    Order rate
                                    <span class="text-warning pl-1">
                                                        <i class="fa fa-angle-down"></i>
                                                        <span class="pl-1">5%</span>
                                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center d-block p-3 card-footer">
                    <a href=""><button class="btn-pill btn-shadow btn-wide fsize-1 btn btn-primary btn-lg">
                                        <span class="mr-2 opacity-7">
                                            <i class="icon icon-anim-pulse ion-ios-analytics-outline"></i>
                                        </span>
                        <span class="mr-1">View Complete Report</span>
                    </button>
                    </a>
                </div>
            </div>

            <!---------------------     End short report content  section     --------------------->
            <div class="row">


            </div>
            <div class="row">

            </div>

        </div>
        <!---------------------     End main  content  section      --------------------->
    </div>
@endsection

@section('js')
    <script>
        let section = document.getElementById('section');
        localStorage.setItem('token', section.value);
    </script>

@endsection
