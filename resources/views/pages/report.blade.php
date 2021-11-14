@extends('welcome')
@section('content')
    <div class="app-main__inner">
        <!---------------------     Start head content  section     --------------------->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-graph3 icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        Reports
                        <div class="page-title-subheading">Help you tracking perfomance on campaigns, Email Newsletters.</div>
                    </div>
                </div>
            </div>
        </div>
        <!---------------------     End head content section     --------------------->
        <!---------------------     Start main  section     --------------------->
        <!---------------------     Start report day week month  section     --------------------->
        <div class="mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                    <i class="header-icon pe-7s-cash icon-gradient bg-mean-fruit"></i>
                    Quickly Revenue Report
                </div>
                <div class="btn-actions-pane-right text-capitalize">
                    <div class="">
                        <div role="group" class="btn-group-sm btn-group">
                            <button class="btn-hover-shine btn-shadow btn btn-dark">Today</button>
                            <button class="btn-hover-shine btn btn-dark">Week</button>
                            <button class="btn-hover-shine btn btn-dark">Month</button>
                            <button class="btn-hover-shine btn btn-dark">Year</button>
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
                            <div class="widget-numbers">$200</div>
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
                                <span>$100</span>
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
                                <span>$300</span>
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
        <!---------------------     End  revenue report day week month  section     --------------------->
        <!---------------------     Start  campaign report day week month  section     --------------------->
        <div class="mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                    <i class="header-icon lnr-bullhorn icon-gradient bg-mean-fruit"></i>
                    Quickly Campaigns Signup Report
                </div>
                <div class="btn-actions-pane-right text-capitalize">
                    <div class="">
                        <div role="group" class="btn-group-sm btn-group">
                            <button class="btn-hover-shine btn-shadow btn btn-dark">Today</button>
                            <button class="btn-hover-shine btn btn-dark">Week</button>
                            <button class="btn-hover-shine btn btn-dark">Month</button>
                            <button class="btn-hover-shine btn btn-dark">Year</button>
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
                            <div class="widget-numbers">1000</div>
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
                                <span>500</span>
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
                                <span>50</span>
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
        </div>
        <!---------------------     End  Event report day week month  section     --------------------->
        <!---------------------     Start  Email report day week month  section     --------------------->
        <div class="mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                    <i class="header-icon pe-7s-paper-plane icon-gradient bg-mean-fruit"></i>
                    Quickly Email Report
                </div>
                <div class="btn-actions-pane-right text-capitalize">
                    <div class="">
                        <div role="group" class="btn-group-sm btn-group">
                            <button class="btn-hover-shine btn-shadow btn btn-dark">Today</button>
                            <button class="btn-hover-shine btn btn-dark">Week</button>
                            <button class="btn-hover-shine btn btn-dark">Month</button>
                            <button class="btn-hover-shine btn btn-dark">Year</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="no-gutters row">
                <div class="col-sm-6 col-lg-3">
                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                        <div class="icon-wrapper rounded-circle">
                            <div class="icon-wrapper-bg opacity-10 bg-warning"></div>
                            <i class="lnr-eye text-dark opacity-9"></i>
                        </div>
                        <div class="widget-chart-content">
                            <div class="widget-subheading">Total Delivered Email</div>
                            <div class="widget-numbers">1000</div>
                            <div class="widget-description opacity-8 text-focus">
                                <div class="d-inline text-success pr-1">
                                    <i class="fa fa-angle-up"></i>
                                    <span class="pl-1">10.5%</span>
                                </div>
                                Up Delivered
                            </div>
                        </div>
                    </div>
                    <div class="divider m-0 d-md-none d-sm-block"></div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                        <div class="icon-wrapper rounded-circle">
                            <div class="icon-wrapper-bg opacity-9 bg-danger"></div>
                            <i class="pe-7s-display2 text-white"></i>
                        </div>
                        <div class="widget-chart-content">
                            <div class="widget-subheading">Total Open</div>
                            <div class="widget-numbers">
                                <span>500</span>
                            </div>
                            <div class="widget-description opacity-8 text-focus">
                                Open Rate:
                                <span class="text-info pl-1">
                                                    <i class="fa fa-angle-up"></i>
                                                    <span class="pl-1">50%</span>
                                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="divider m-0 d-md-none d-sm-block"></div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                        <div class="icon-wrapper rounded-circle">
                            <div class="icon-wrapper-bg opacity-9 bg-success"></div>
                            <i class="lnr-cart text-white"></i>
                        </div>
                        <div class="widget-chart-content">
                            <div class="widget-subheading">Total Click:</div>
                            <div class="widget-numbers text-danger">
                                <span>100</span>
                            </div>
                            <div class="widget-description text-focus">
                                Click Rate
                                <span class="text-warning pl-1">
                                                    <i class="fa fa-angle-down"></i>
                                                    <span class="pl-1">10%</span>
                                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                        <div class="icon-wrapper rounded-circle">
                            <div class="icon-wrapper-bg opacity-9 bg-success"></div>
                            <i class="lnr-cart text-white"></i>
                        </div>
                        <div class="widget-chart-content">
                            <div class="widget-subheading">Total Order:</div>
                            <div class="widget-numbers text-danger">
                                <span>10</span>
                            </div>
                            <div class="widget-description text-focus">
                                Order Rate
                                <span class="text-warning pl-1">
                                                    <i class="fa fa-angle-down"></i>
                                                    <span class="pl-1">1%</span>
                                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!---------------------     start  report all time  section     --------------------->
        <div class="mb-3 card">
            <div class="tabs-lg-alternate card-header">
                <ul class="nav nav-justified">
                    <li class="nav-item">
                        <a href="#tab-minimal-1" data-toggle="tab" class="nav-link minimal-tab-btn-1">
                            <div class="widget-number">
                                <span>$15,065</span>
                            </div>
                            <div class="tab-subheading title-heading">
                                                <span class="pr-2 opactiy-8">
                                                    <i class="lnr-bullhorn"></i>
                                                </span>
                                Total Convert Revenue Signups
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab-minimal-2" data-toggle="tab" class="nav-link active minimal-tab-btn-2">
                            <div class="widget-number">

                                <span>$10,000</span>
                            </div>
                            <div class="tab-subheading title-heading">
                                                 <span class="pr-2 text-primary">
                                                    <i class="pe-7s-paper-plane"></i>
                                                </span>
                                Total Convert Revenue Email
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab-minimal-3" data-toggle="tab" class="nav-link minimal-tab-btn-3">
                            <div class="widget-number text-danger">
                                <span>$25,065.0</span>
                            </div>
                            <div class="tab-subheading title-heading">
                                                <span class="pr-2 opactiy-8">
                                                    <i class="pe-7s-cash"></i>
                                                </span>
                                Total Income
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane" id="tab-minimal-1">
                    <div class="card-body">
                        <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                            <div id="chart-combined-tab"></div>
                        </div>
                        <h5 class="card-title">Overview Convert Signups</h5>
                        <div class="row mt-3">
                            <div class="col-sm-12 col-md-4">
                                <div class="widget-content p-0">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Total Viewer</div>
                                                <div class="widget-subheading">All Time</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-success">1.000.000</div>
                                            </div>
                                        </div>
                                        <div class="widget-progress-wrapper">
                                            <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="100"
                                                     aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="progress-sub-label">
                                                <div class="sub-label-left">Percent</div>
                                                <div class="sub-label-right">100%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="widget-content p-0">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Total Signups</div>
                                                <div class="widget-subheading">All Time</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-primary">500.000</div>
                                            </div>
                                        </div>
                                        <div class="widget-progress-wrapper">
                                            <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="50"
                                                     aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                                                </div>
                                            </div>
                                            <div class="progress-sub-label">
                                                <div class="sub-label-left">Convert Rate</div>
                                                <div class="sub-label-right">50%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="widget-content p-0">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Total Order</div>
                                                <div class="widget-subheading">All Time</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-warning">10.000</div>
                                            </div>
                                        </div>
                                        <div class="widget-progress-wrapper">
                                            <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="10"
                                                     aria-valuemin="0" aria-valuemax="100" style="width: 10%;">
                                                </div>
                                            </div>
                                            <div class="progress-sub-label">
                                                <div class="sub-label-left">Convert Rate</div>
                                                <div class="sub-label-right">10%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade active show" id="tab-minimal-2">
                    <div class="card-body">
                        <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                            <div id="chart-apex-negative"></div>
                        </div>
                        <h5 class="card-title">Overview Convert Email</h5>
                        <div class="row mt-3">
                            <div class="col-sm-12 col-md-6">
                                <div class="widget-content p-0">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Total Delivered</div>
                                                <div class="widget-subheading">All Time</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-success">2.000.000</div>
                                            </div>
                                        </div>
                                        <div class="widget-progress-wrapper">
                                            <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="100"
                                                     aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="progress-sub-label">
                                                <div class="sub-label-left">Percent</div>
                                                <div class="sub-label-right">100%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="widget-content p-0">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Total Open</div>
                                                <div class="widget-subheading">All Time</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-primary">1.000.000</div>
                                            </div>
                                        </div>
                                        <div class="widget-progress-wrapper">
                                            <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="50"
                                                     aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                                                </div>
                                            </div>
                                            <div class="progress-sub-label">
                                                <div class="sub-label-left">Convert Rate</div>
                                                <div class="sub-label-right">50%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="widget-content p-0">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Total Clicked <i class="fa-info-circle fa fa-w-20" style="font-size: 1.1em;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Total customer clicked on link come to your store in email sent to customers."></i></div>
                                                <div class="widget-subheading">All Time</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-warning">500.000</div>
                                            </div>
                                        </div>
                                        <div class="widget-progress-wrapper">
                                            <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="25"
                                                     aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                                </div>
                                            </div>
                                            <div class="progress-sub-label">
                                                <div class="sub-label-left">Convert Rate</div>
                                                <div class="sub-label-right">25%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="widget-content p-0">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Total Order</div>
                                                <div class="widget-subheading">All Time</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-warning">50.000</div>
                                            </div>
                                        </div>
                                        <div class="widget-progress-wrapper">
                                            <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="10"
                                                     aria-valuemin="0" aria-valuemax="100" style="width: 2.5%;">
                                                </div>
                                            </div>
                                            <div class="progress-sub-label">
                                                <div class="sub-label-left">Convert Rate</div>
                                                <div class="sub-label-right">2.5%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-minimal-3">
                    <div class="card-body">
                        <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                            <div id="chart-combined-tab-3"></div>
                        </div>
                        <h5 class="card-title">Overview Money Income</h5>
                        <div class="row mt-3">
                            <div class="col-sm-12 col-md-4">
                                <div class="widget-content p-0">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Signups Revenue</div>
                                                <div class="widget-subheading">All Time</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-success">$15,065</div>
                                            </div>
                                        </div>
                                        <div class="widget-progress-wrapper">
                                            <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="60.10"
                                                     aria-valuemin="0" aria-valuemax="100" style="width: 60.10%;">
                                                </div>
                                            </div>
                                            <div class="progress-sub-label">
                                                <div class="sub-label-left">Convert Rate income</div>
                                                <div class="sub-label-right">60.10%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="widget-content p-0">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Email Revenue</div>
                                                <div class="widget-subheading">All Time</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-primary">$10,000</div>
                                            </div>
                                        </div>
                                        <div class="widget-progress-wrapper">
                                            <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="39.90"
                                                     aria-valuemin="0" aria-valuemax="100" style="width: 39.90%;">
                                                </div>
                                            </div>
                                            <div class="progress-sub-label">
                                                <div class="sub-label-left">Convert Rate income</div>
                                                <div class="sub-label-right">39.90%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="widget-content p-0">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Total Income</div>
                                                <div class="widget-subheading">All Time</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-danger">$25,065.0</div>
                                            </div>
                                        </div>
                                        <div class="widget-progress-wrapper">
                                            <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="100"
                                                     aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                                </div>
                                            </div>
                                            <div class="progress-sub-label">
                                                <div class="sub-label-left">Total Convert Rate</div>
                                                <div class="sub-label-right">100%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
