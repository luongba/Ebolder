@extends('welcome')
@section('content')
    <div class="app-main__inner">
        <!---------------------     Start head content  section     --------------------->

        <!---------------------     End head content  section     --------------------->
        <!---------------------     Start main content section     --------------------->
        <div class="tabs-animation">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="lnr-bullhorn lnr icon-gradient bg-mean-fruit"></i>
                        </div>
                        <div>
                            Campaigns
                            <div class="page-title-subheading">Create your campaigns swiftly and win more sales with Ebolder!.</div>
                        </div>
                    </div>
                    <div class="page-title-actions">
                                        <span class="btn-icon-wrapper pr-2">
                                            <a class="btn-icon btn dev-button btn-primary" href="{{route('campaign-create')}}" style="color:#fff;padding: 10px 15px;">
                                                <i class="pe-7s-plus dev-icon btn-icon-wrapper" style="margin-top: -3px;"></i>Create New Campaign
                                            </a>
                                        </span>
                    </div>
                </div>
            </div>
            <!---------------------     Start report campaigns section     --------------------->
            <div class="mb-3 card">
                <div class="no-gutters row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                            <div class="icon-wrapper rounded-circle">
                                <div class="icon-wrapper-bg opacity-10 bg-warning"></div>
                                <i class="lnr-eye text-dark opacity-8"></i>
                            </div>
                            <div class="widget-chart-content">
                                <div class="widget-subheading">Campaign Views</div>
                                <div class="widget-numbers">100</div>

                            </div>
                        </div>
                        <div class="divider m-0 d-md-none d-sm-block"></div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                            <div class="icon-wrapper rounded-circle">
                                <div class="icon-wrapper-bg opacity-10 bg-info"></div>
                                <i class="pe-7s-display2 text-white opacity-9"></i>
                            </div>
                            <div class="widget-chart-content">
                                <div class="widget-subheading">Total Signups</div>
                                <div class="widget-numbers">20</div>

                            </div>
                        </div>
                        <div class="divider m-0 d-md-none d-sm-block"></div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                            <div class="icon-wrapper rounded-circle">
                                <div class="icon-wrapper-bg opacity-9 bg-danger"></div>
                                <i class="lnr-cart text-white"></i>
                            </div>
                            <div class="widget-chart-content">
                                <div class="widget-subheading">Total Orders</div>
                                <div class="widget-numbers">
                                    <span>10</span>
                                </div>

                            </div>
                        </div>
                        <div class="divider m-0 d-md-none d-sm-block"></div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                            <div class="icon-wrapper rounded-circle">
                                <div class="icon-wrapper-bg opacity-9 bg-success"></div>
                                <i class="pe-7s-cash text-white"></i>
                            </div>
                            <div class="widget-chart-content">
                                <div class="widget-subheading">Campaign Revenue</div>
                                <div class="widget-numbers text-success">
                                    <span>$563.00</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!---------------------     End report campaign section     --------------------->

            <!---------------------     Start tab filter campaigns section     --------------------->

            <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav mb-3">
                <li class="nav-item">
                    <div class="search-wrapper active" style="width: 300px;">
                        <div class="input-holder dev-search">
                            <input type="text" class="search-input" placeholder="Search Campaigns ...">
                            <button class="search-icon" style="background: rgb(212 218 222);">
                                <span></span>
                            </button>
                        </div>

                    </div>
                </li>
                <li class="nav-item ">
                    <div class="d-inline-block dropdown">
                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow-secondary btn-outline-2x btn-shadow dropdown-toggle btn filter-box">
                                            <span class="btn-icon-wrapper pr-2 opacity-9">
                                                <i class="lnr-bullhorn lnr fa-w-20 filter-box-icon"></i>
                                            </span>
                            Campaigns Status
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu">
                            <button type="button" tabindex="0" class="dropdown-item">All (10)</button>
                            <button type="button" tabindex="0" class="dropdown-item">Active (3)</button>
                            <button type="button" tabindex="0" class="dropdown-item">Inactive (3)</button>
                            <button type="button" tabindex="0" class="dropdown-item">Draft (2)</button>
                            <button type="button" tabindex="0" class="dropdown-item">Scheduled (2)</button>
                        </div>

                    </div>
                </li>
                <li class="nav-item dev-list-bar">
                    <div class="d-inline-block dropdown">
                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow-secondary btn-outline-2x btn-shadow dropdown-toggle btn filter-box">
                                            <span class="btn-icon-wrapper pr-2 opacity-9">
                                                <i class="pe-7s-filter lnr fa-w-20 filter-box-icon"></i>
                                            </span>
                            Sort By
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu">
                            <button type="button" tabindex="0" class="dropdown-item">Recently Updated</button>
                            <button type="button" tabindex="0" class="dropdown-item">Title Name</button>
                            <button type="button" tabindex="0" class="dropdown-item">Sign Up View </button>
                            <button type="button" tabindex="0" class="dropdown-item">Sign Up Completed</button>
                            <button type="button" tabindex="0" class="dropdown-item">Order</button>
                        </div>

                    </div>
                </li>

            </ul>
            <!---------------------     Start tab filter campaigns section     --------------------->

            <!---------------------     Start list campaigns section     --------------------->
            <div class="row">
                <!---------------------     Start item campaign single active    --------------------->
                <div class="col-sm-12 col-lg-12 col-xl-4">
                    <div class="mb-3 profile-responsive card">
                        <div class="dropdown-menu-header">
                            <a href="{{route('campaign-detail')}}">
                                <div class="dropdown-menu-header-inner bg-dark dev-campaign-layout">
                                    <div class="menu-header-image opacity-8" style="background-image: url('images/dropdown-header/screenshot-signup.jpg');"></div>
                                    <div class="menu-header-content btn-pane-right">
                                        <div class="menu-header-btn-pane dev-status-campaign">
                                            <label class="btn btn-success" style="cursor: default;">Active</label>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <ul class="list-group list-group-flush">
                            <!---------------------     Start single campaign title     --------------------->
                            <li class="list-group-item">
                                <div class="pr-1 pl-1">
                                    <div class="text-center">
                                        <div class="dev-campaign-title">
                                            <a href="{{route('campaign-detail')}}"><h5 class="menu-header-title text-dark">Campaign sign up active </h5></a>
                                            <h6 class="menu-header-subtitle text-dark">Flyout, popup...</h6>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!---------------------     End single campaign title     --------------------->
                            <!---------------------     Start single campaign process button     --------------------->
                            <li class="list-group-item">
                                <div class="pr-1 pl-1">
                                    <div class="text-center">
                                        <div class="dev-campaign-title">
                                                            <span data-toggle="modal" data-target="#duplicate-campaign">
                                                                <button class="mb-2 mr-2 btn-dashed btn btn-outline-secondary btn-shadow-secondary"  data-toggle="tooltip" data-placement="top" title="Duplicate Campaign"> <i class="pe-7s-copy-file fa-w-20" style="font-size: 1.5em;"></i></button>
                                                            </span>
                                            <button class="mb-2 mr-2 btn btn-shadow btn-danger btn-hover-shine" style="font-size: 1.1em; padding-left:30px; padding-right:30px" data-toggle="modal" data-target="#stop-campaign"> Stop Campaign </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!---------------------    End single campaign process button     --------------------->
                            <!---------------------     Start report single campaign      --------------------->
                            <li class="p-0 list-group-item">
                                <div class="grid-menu grid-menu-2col">
                                    <div class="no-gutters row">
                                        <div class="col-sm-6">
                                            <div class="p-1">
                                                                <span class="btn-icon-vertical pt-2 pb-2 btn dev-list-report">
                                                                    <i class="lnr-eye text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="Campaign Views"></i>
                                                                    50
                                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="p-1">
                                                                <span class="btn-icon-vertical pt-2 pb-2 btn dev-list-report">
                                                                    <i class="pe-7s-display2 text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="Total Signups"></i>
                                                                    10
                                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="p-1">
                                                                <span class="btn-icon-vertical pt-2 pb-2 btn dev-list-report">
                                                                    <i class="lnr-cart text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="Total Orders"></i>
                                                                    2
                                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="p-1">
                                                                <span class="btn-icon-vertical pt-2 pb-2 btn dev-list-report">
                                                                    <i class="pe-7s-cash text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="Campaign Revenue"></i>
                                                                    $100.00
                                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </li>
                            <!---------------------     End report single campaign      --------------------->
                        </ul>
                    </div>
                </div>
                <!---------------------     End item campaign single     --------------------->
                <!---------------------     Start item campaign single Inactive     --------------------->
                <div class="col-sm-12 col-lg-12 col-xl-4">
                    <div class="mb-3 profile-responsive card">
                        <div class="dropdown-menu-header">
                            <a href="{{route('campaign-detail')}}">
                                <div class="dropdown-menu-header-inner bg-dark dev-campaign-layout">
                                    <div class="menu-header-image opacity-8" style="background-image: url('images/dropdown-header/screenshot-signup.jpg');"></div>
                                    <div class="menu-header-content btn-pane-right">
                                        <div class="menu-header-btn-pane dev-status-campaign">
                                            <label class="btn btn-secondary" style="cursor: default;">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <ul class="list-group list-group-flush">
                            <!---------------------     Start single campaign title     --------------------->
                            <li class="list-group-item">
                                <div class="pr-1 pl-1">
                                    <div class="text-center">
                                        <div class="dev-campaign-title">
                                            <a href="{{route('campaign-detail')}}"><h5 class="menu-header-title text-dark">Campaign sign up Inactive </h5></a>
                                            <h6 class="menu-header-subtitle text-dark">Flyout, popup...</h6>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!---------------------     End single campaign title     --------------------->
                            <!---------------------     Start single campaign process button     --------------------->
                            <li class="list-group-item">
                                <div class="pr-1 pl-1">
                                    <div class="text-center">
                                        <div class="dev-campaign-title">
                                            <span data-toggle="modal" data-target="#duplicate-campaign"><button class="mb-2 mr-2 btn-dashed btn btn-outline-secondary btn-shadow-secondary"  data-toggle="tooltip" data-placement="top" title="Duplicate Campaign"> <i class="pe-7s-copy-file fa-w-20" style="font-size: 1.5em;"></i></button></span>
                                            <span data-toggle="modal" data-target="#delete-archive-campaign"><button class="mb-2 mr-2 btn-dashed btn btn-outline-secondary btn-shadow-secondary"  data-toggle="tooltip" data-placement="top" title="Archive Campaign"> <i class="pe-7s-trash fa-w-20" style="font-size: 1.5em;"></i></button></span>
                                            <button class="mb-2 mr-2 btn btn-shadow btn-secondary btn-hover-shine" style="font-size: 1.1em; padding-left:30px; padding-right:30px" data-toggle="modal" data-target="#reactive-campaign"> Reactive </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!---------------------    End single campaign process button     --------------------->
                            <!---------------------     Start report single campaign      --------------------->
                            <li class="p-0 list-group-item">
                                <div class="grid-menu grid-menu-2col">
                                    <div class="no-gutters row">
                                        <div class="col-sm-6">
                                            <div class="p-1">
                                                                <span class="btn-icon-vertical pt-2 pb-2 btn dev-list-report">
                                                                    <i class="lnr-eye text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="Campaign Views"></i>
                                                                    50
                                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="p-1">
                                                                <span class="btn-icon-vertical pt-2 pb-2 btn dev-list-report">
                                                                    <i class="pe-7s-display2 text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="Total Signups"></i>
                                                                    10
                                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="p-1">
                                                                <span class="btn-icon-vertical pt-2 pb-2 btn dev-list-report">
                                                                    <i class="lnr-cart text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="Total Orders"></i>
                                                                    2
                                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="p-1">
                                                                <span class="btn-icon-vertical pt-2 pb-2 btn dev-list-report">
                                                                    <i class="pe-7s-cash text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="Campaign Revenue"></i>
                                                                    $100.00
                                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </li>
                            <!---------------------     End report single campaign      --------------------->
                        </ul>
                    </div>
                </div>
                <!---------------------     End item campaign single     --------------------->
                <!---------------------     Start item campaign single  Draft   --------------------->
                <div class="col-sm-12 col-lg-12 col-xl-4">
                    <div class="mb-3 profile-responsive card">
                        <div class="dropdown-menu-header">
                            <a href="{{route('campaign-detail')}}">
                                <div class="dropdown-menu-header-inner bg-dark dev-campaign-layout">
                                    <div class="menu-header-image opacity-8" style="background-image: url('images/dropdown-header/screenshot-signup.jpg');"></div>
                                    <div class="menu-header-content btn-pane-right">
                                        <div class="menu-header-btn-pane dev-status-campaign">
                                            <label class="btn btn-warning" style="cursor: default;">Draft</label>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <ul class="list-group list-group-flush">
                            <!---------------------     Start single campaign title     --------------------->
                            <li class="list-group-item">
                                <div class="pr-1 pl-1">
                                    <div class="text-center">
                                        <div class="dev-campaign-title">
                                            <a href="{{route('campaign-detail')}}"><h5 class="menu-header-title text-dark">Campaign sign up form Publish </h5></a>
                                            <h6 class="menu-header-subtitle text-dark">Flyout, popup...</h6>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!---------------------     End single campaign title     --------------------->
                            <!---------------------     Start single campaign process button     --------------------->
                            <li class="list-group-item">
                                <div class="pr-1 pl-1">
                                    <div class="text-center">
                                        <div class="dev-campaign-title">
                                            <span data-toggle="modal" data-target="#duplicate-campaign"><button class="mb-2 mr-2 btn-dashed btn btn-outline-secondary btn-shadow-secondary"  data-toggle="tooltip" data-placement="top" title="Duplicate Campaign"> <i class="pe-7s-copy-file fa-w-20" style="font-size: 1.5em;"></i></button></span>
                                            <span data-toggle="modal" data-target="#delete-campaign"><button class="mb-2 mr-2 btn-dashed btn btn-outline-secondary btn-shadow-secondary"  data-toggle="tooltip" data-placement="top" title="Delete Draft Campaign"> <i class="pe-7s-trash fa-w-20" style="font-size: 1.5em;"></i></button></span>
                                            <button class="mb-2 mr-2 btn btn-shadow btn-primary btn-hover-shine" style="font-size: 1.1em;background:#3F937E; border-color: #3F937E; padding-left:30px; padding-right:30px" data-toggle="modal" data-target="#publish-campaign"> Publish </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!---------------------    End single campaign process button     --------------------->
                            <!---------------------     Start report single campaign      --------------------->
                            <li class="p-0 list-group-item">
                                <div class="grid-menu grid-menu-2col">
                                    <div class="no-gutters row">
                                        <div class="col-sm-6">
                                            <div class="p-1">
                                                                <span class="btn-icon-vertical pt-2 pb-2 btn dev-list-report">
                                                                    <i class="lnr-eye text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="Campaign Views"></i>
                                                                    50
                                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="p-1">
                                                                <span class="btn-icon-vertical pt-2 pb-2 btn dev-list-report">
                                                                    <i class="pe-7s-display2 text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="Total Signups"></i>
                                                                    10
                                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="p-1">
                                                                <span class="btn-icon-vertical pt-2 pb-2 btn dev-list-report">
                                                                    <i class="lnr-cart text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="Total Orders"></i>
                                                                    2
                                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="p-1">
                                                                <span class="btn-icon-vertical pt-2 pb-2 btn dev-list-report">
                                                                    <i class="pe-7s-cash text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="Campaign Revenue"></i>
                                                                    $100.00
                                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </li>
                            <!---------------------     End report single campaign      --------------------->
                        </ul>
                    </div>
                </div>
                <!---------------------     End item campaign single     --------------------->
                <!---------------------     Start item campaign single active    --------------------->
                <div class="col-sm-12 col-lg-12 col-xl-4">
                    <div class="mb-3 profile-responsive card">
                        <div class="dropdown-menu-header">
                            <a href="{{route('campaign-detail')}}">
                                <div class="dropdown-menu-header-inner bg-dark dev-campaign-layout">
                                    <div class="menu-header-image opacity-8" style="background-image: url('images/dropdown-header/screenshot-signup.jpg');"></div>
                                    <div class="menu-header-content btn-pane-right">
                                        <div class="menu-header-btn-pane dev-status-campaign">
                                            <label class="btn btn-success" style="cursor: default;">Active</label>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <ul class="list-group list-group-flush">
                            <!---------------------     Start single campaign title     --------------------->
                            <li class="list-group-item">
                                <div class="pr-1 pl-1">
                                    <div class="text-center">
                                        <div class="dev-campaign-title">
                                            <a href="{{route('campaign-detail')}}"><h5 class="menu-header-title text-dark">Campaign sign up active </h5></a>
                                            <h6 class="menu-header-subtitle text-dark">Flyout, popup...</h6>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!---------------------     End single campaign title     --------------------->
                            <!---------------------     Start single campaign process button     --------------------->
                            <li class="list-group-item">
                                <div class="pr-1 pl-1">
                                    <div class="text-center">
                                        <div class="dev-campaign-title">
                                                            <span data-toggle="modal" data-target="#duplicate-campaign">
                                                                <button class="mb-2 mr-2 btn-dashed btn btn-outline-secondary btn-shadow-secondary"  data-toggle="tooltip" data-placement="top" title="Duplicate Campaign"> <i class="pe-7s-copy-file fa-w-20" style="font-size: 1.5em;"></i></button>
                                                            </span>
                                            <button class="mb-2 mr-2 btn btn-shadow btn-danger btn-hover-shine" style="font-size: 1.1em; padding-left:30px; padding-right:30px" data-toggle="modal" data-target="#stop-campaign"> Stop Campaign </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!---------------------    End single campaign process button     --------------------->
                            <!---------------------     Start report single campaign      --------------------->
                            <li class="p-0 list-group-item">
                                <div class="grid-menu grid-menu-2col">
                                    <div class="no-gutters row">
                                        <div class="col-sm-6">
                                            <div class="p-1">
                                                                <span class="btn-icon-vertical pt-2 pb-2 btn dev-list-report">
                                                                    <i class="lnr-eye text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="Campaign Views"></i>
                                                                    50
                                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="p-1">
                                                                <span class="btn-icon-vertical pt-2 pb-2 btn dev-list-report">
                                                                    <i class="pe-7s-display2 text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="Total Signups"></i>
                                                                    10
                                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="p-1">
                                                                <span class="btn-icon-vertical pt-2 pb-2 btn dev-list-report">
                                                                    <i class="lnr-cart text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="Total Orders"></i>
                                                                    2
                                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="p-1">
                                                                <span class="btn-icon-vertical pt-2 pb-2 btn dev-list-report">
                                                                    <i class="pe-7s-cash text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="Campaign Revenue"></i>
                                                                    $100.00
                                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </li>
                            <!---------------------     End report single campaign      --------------------->
                        </ul>
                    </div>
                </div>
                <!---------------------     End item campaign single     --------------------->
                <!---------------------     Start item campaign single Inactive     --------------------->
                <div class="col-sm-12 col-lg-12 col-xl-4">
                    <div class="mb-3 profile-responsive card">
                        <div class="dropdown-menu-header">
                            <a href="{{route('campaign-detail')}}">
                                <div class="dropdown-menu-header-inner bg-dark dev-campaign-layout">
                                    <div class="menu-header-image opacity-8" style="background-image: url('images/dropdown-header/screenshot-signup.jpg');"></div>
                                    <div class="menu-header-content btn-pane-right">
                                        <div class="menu-header-btn-pane dev-status-campaign">
                                            <label class="btn btn-secondary" style="cursor: default;">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <ul class="list-group list-group-flush">
                            <!---------------------     Start single campaign title     --------------------->
                            <li class="list-group-item">
                                <div class="pr-1 pl-1">
                                    <div class="text-center">
                                        <div class="dev-campaign-title">
                                            <a href="{{route('campaign-detail')}}"><h5 class="menu-header-title text-dark">Campaign sign up Inactive </h5></a>
                                            <h6 class="menu-header-subtitle text-dark">Flyout, popup...</h6>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!---------------------     End single campaign title     --------------------->
                            <!---------------------     Start single campaign process button     --------------------->
                            <li class="list-group-item">
                                <div class="pr-1 pl-1">
                                    <div class="text-center">
                                        <div class="dev-campaign-title">
                                            <span data-toggle="modal" data-target="#duplicate-campaign"><button class="mb-2 mr-2 btn-dashed btn btn-outline-secondary btn-shadow-secondary"  data-toggle="tooltip" data-placement="top" title="Duplicate Campaign"> <i class="pe-7s-copy-file fa-w-20" style="font-size: 1.5em;"></i></button></span>
                                            <span data-toggle="modal" data-target="#delete-archive-campaign"><button class="mb-2 mr-2 btn-dashed btn btn-outline-secondary btn-shadow-secondary"  data-toggle="tooltip" data-placement="top" title="Archive Campaign"> <i class="pe-7s-trash fa-w-20" style="font-size: 1.5em;"></i></button></span>
                                            <button class="mb-2 mr-2 btn btn-shadow btn-secondary btn-hover-shine" style="font-size: 1.1em; padding-left:30px; padding-right:30px" data-toggle="modal" data-target="#reactive-campaign"> Reactive </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!---------------------    End single campaign process button     --------------------->
                            <!---------------------     Start report single campaign      --------------------->
                            <li class="p-0 list-group-item">
                                <div class="grid-menu grid-menu-2col">
                                    <div class="no-gutters row">
                                        <div class="col-sm-6">
                                            <div class="p-1">
                                                                <span class="btn-icon-vertical pt-2 pb-2 btn dev-list-report">
                                                                    <i class="lnr-eye text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="Campaign Views"></i>
                                                                    50
                                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="p-1">
                                                                <span class="btn-icon-vertical pt-2 pb-2 btn dev-list-report">
                                                                    <i class="pe-7s-display2 text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="Total Signups"></i>
                                                                    10
                                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="p-1">
                                                                <span class="btn-icon-vertical pt-2 pb-2 btn dev-list-report">
                                                                    <i class="lnr-cart text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="Total Orders"></i>
                                                                    2
                                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="p-1">
                                                                <span class="btn-icon-vertical pt-2 pb-2 btn dev-list-report">
                                                                    <i class="pe-7s-cash text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="Campaign Revenue"></i>
                                                                    $100.00
                                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </li>
                            <!---------------------     End report single campaign      --------------------->
                        </ul>
                    </div>
                </div>
                <!---------------------     End item campaign single     --------------------->
                <!---------------------     Start item campaign single  Draft   --------------------->
                <div class="col-sm-12 col-lg-12 col-xl-4">
                    <div class="mb-3 profile-responsive card">
                        <div class="dropdown-menu-header">
                            <a href="{{route('campaign-detail')}}">
                                <div class="dropdown-menu-header-inner bg-dark dev-campaign-layout">
                                    <div class="menu-header-image opacity-8" style="background-image: url('images/dropdown-header/screenshot-signup.jpg');"></div>
                                    <div class="menu-header-content btn-pane-right">
                                        <div class="menu-header-btn-pane dev-status-campaign">
                                            <label class="btn btn-warning" style="cursor: default;">Draft</label>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <ul class="list-group list-group-flush">
                            <!---------------------     Start single campaign title     --------------------->
                            <li class="list-group-item">
                                <div class="pr-1 pl-1">
                                    <div class="text-center">
                                        <div class="dev-campaign-title">
                                            <a href="{{route('campaign-detail')}}"><h5 class="menu-header-title text-dark">Campaign sign up form Publish </h5></a>
                                            <h6 class="menu-header-subtitle text-dark">Flyout, popup...</h6>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!---------------------     End single campaign title     --------------------->
                            <!---------------------     Start single campaign process button     --------------------->
                            <li class="list-group-item">
                                <div class="pr-1 pl-1">
                                    <div class="text-center">
                                        <div class="dev-campaign-title">
                                            <span data-toggle="modal" data-target="#duplicate-campaign"><button class="mb-2 mr-2 btn-dashed btn btn-outline-secondary btn-shadow-secondary"  data-toggle="tooltip" data-placement="top" title="Duplicate Campaign"> <i class="pe-7s-copy-file fa-w-20" style="font-size: 1.5em;"></i></button></span>
                                            <span data-toggle="modal" data-target="#delete-campaign"><button class="mb-2 mr-2 btn-dashed btn btn-outline-secondary btn-shadow-secondary"  data-toggle="tooltip" data-placement="top" title="Delete Draft Campaign"> <i class="pe-7s-trash fa-w-20" style="font-size: 1.5em;"></i></button></span>
                                            <button class="mb-2 mr-2 btn btn-shadow btn-primary btn-hover-shine" style="font-size: 1.1em;background:#3F937E; border-color: #3F937E; padding-left:30px; padding-right:30px" data-toggle="modal" data-target="#publish-campaign"> Publish </button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!---------------------    End single campaign process button     --------------------->
                            <!---------------------     Start report single campaign      --------------------->
                            <li class="p-0 list-group-item">
                                <div class="grid-menu grid-menu-2col">
                                    <div class="no-gutters row">
                                        <div class="col-sm-6">
                                            <div class="p-1">
                                                                <span class="btn-icon-vertical pt-2 pb-2 btn dev-list-report">
                                                                    <i class="lnr-eye text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="Campaign Views"></i>
                                                                    50
                                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="p-1">
                                                                <span class="btn-icon-vertical pt-2 pb-2 btn dev-list-report">
                                                                    <i class="pe-7s-display2 text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="Total Signups"></i>
                                                                    10
                                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="p-1">
                                                                <span class="btn-icon-vertical pt-2 pb-2 btn dev-list-report">
                                                                    <i class="lnr-cart text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="Total Orders"></i>
                                                                    2
                                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="p-1">
                                                                <span class="btn-icon-vertical pt-2 pb-2 btn dev-list-report">
                                                                    <i class="pe-7s-cash text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="Campaign Revenue"></i>
                                                                    $100.00
                                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </li>
                            <!---------------------     End report single campaign      --------------------->
                        </ul>
                    </div>
                </div>
                <!---------------------     End item campaign single     --------------------->
            </div>

            <!---------------------     End listing campaign section     --------------------->

            <div class="row">


            </div>

        </div>
        <!---------------------     End main  content  section      --------------------->
    </div>
@endsection
