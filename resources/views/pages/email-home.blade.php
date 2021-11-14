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
                            <i class="pe-7s-mail-open-file icon-gradient bg-mean-fruit"></i>
                        </div>
                        <div>
                            Customer Winback
                            <div class="page-title-subheading">Create your Email swiftly and win more sales with Ebolder!.</div>
                        </div>
                    </div>
                    <div class="page-title-actions">
                                        <span class="btn-icon-wrapper pr-2">
                                            <a class="btn-icon btn dev-button btn-primary" href="{{route('winback-create')}}" style="padding: 10px 15px;">
                                                <i class="pe-7s-plus dev-icon btn-icon-wrapper" style="margin-top: -3px;"></i>Create New Email
                                            </a>
                                        </span>
                    </div>
                </div>
            </div>
            <!---------------------     Start report Customer Win back section     --------------------->
            <div class="mb-3 card">
                <div class="no-gutters row">
                    <div class="col-xs-5ths">
                        <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                            <div class="icon-wrapper rounded-circle">
                                <div class="icon-wrapper-bg opacity-10 bg-warning"></div>
                                <i class="pe-7s-paper-plane text-dark opacity-8"></i>
                            </div>
                            <div class="widget-chart-content">
                                <div class="widget-subheading">Total Delivered Email</div>
                                <div class="widget-numbers">100</div>

                            </div>
                        </div>
                        <div class="divider m-0 d-md-none d-sm-block"></div>
                    </div>
                    <div class="col-xs-5ths">
                        <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                            <div class="icon-wrapper rounded-circle">
                                <div class="icon-wrapper-bg opacity-10 bg-info"></div>
                                <i class="lnr-eye text-white opacity-9"></i>
                            </div>
                            <div class="widget-chart-content">
                                <div class="widget-subheading">Total Opened</div>
                                <div class="widget-numbers">20</div>

                            </div>
                        </div>
                        <div class="divider m-0 d-md-none d-sm-block"></div>
                    </div>
                    <div class="col-xs-5ths">
                        <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                            <div class="icon-wrapper rounded-circle">
                                <div class="icon-wrapper-bg opacity-9 bg-danger"></div>
                                <i class="lnr-pointer-up text-white"></i>
                            </div>
                            <div class="widget-chart-content">
                                <div class="widget-subheading">Total Clicked</div>
                                <div class="widget-numbers">
                                    <span>10</span>
                                </div>

                            </div>
                        </div>
                        <div class="divider m-0 d-md-none d-sm-block"></div>
                    </div>
                    <div class="col-xs-5ths">
                        <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                            <div class="icon-wrapper rounded-circle">
                                <div class="icon-wrapper-bg opacity-9 bg-danger"></div>
                                <i class="lnr-cart text-white"></i>
                            </div>
                            <div class="widget-chart-content">
                                <div class="widget-subheading">Total Order</div>
                                <div class="widget-numbers">
                                    <span>8</span>
                                </div>

                            </div>
                        </div>
                        <div class="divider m-0 d-md-none d-sm-block"></div>
                    </div>
                    <div class="col-xs-5ths">
                        <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                            <div class="icon-wrapper rounded-circle">
                                <div class="icon-wrapper-bg opacity-9 bg-success"></div>
                                <i class="pe-7s-cash text-white"></i>
                            </div>
                            <div class="widget-chart-content">
                                <div class="widget-subheading">Total Email Revenue</div>
                                <div class="widget-numbers text-success">
                                    <span>$563.00</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!---------------------     End report custom win back section     --------------------->

            <!---------------------     Start tab filter custom win back section     --------------------->

            <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav mb-3">
                <li class="nav-item">
                    <div class="search-wrapper active" style="width: 300px;">
                        <div class="input-holder dev-search">
                            <input type="text" class="search-input" placeholder="Search Email ...">
                            <button class="search-icon" style="background: rgb(212 218 222);">
                                <span></span>
                            </button>
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
                            <button type="button" tabindex="0" class="dropdown-item">Email View </button>
                            <button type="button" tabindex="0" class="dropdown-item">Email Click</button>
                        </div>

                    </div>
                </li>

            </ul>
            <!---------------------     Start tab filter custom win back  section     --------------------->

            <!---------------------     Start list custom win back  section     --------------------->
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="text-left">Title</th>
                                    <th class="text-left">Subject</th>
                                    <th class="text-left">Trigger <i class="fa-info-circle fa fa-w-20" style="font-size: 1.1em;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Trigger it help you automatic send email to customer make last order by time you setup"></i></th>
                                    <th class="text-left">Delivered</th>
                                    <th class="text-left">Opened</th>
                                    <th class="text-left">Clicked</th>
                                    <th class="text-left">Order</th>
                                    <th class="text-center">Revenue</th>
                                    <th class="text-left">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="{{route('winback-edit')}}" class="text-dark">Newsletters black friday</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Black friday campaign to customer</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Draft</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">1000</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">990</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">500</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">1</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">$300.00</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div class="">
                                                                <span data-toggle="modal" data-target="#duplicate-winback-email">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Duplicate Customer winback">
                                                                    <i class="pe-7s-copy-file btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                            <span data-toggle="modal" data-target="#delete-winback-email">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Customer winback">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="{{route('winback-edit')}}" class="text-dark">Newsletters black friday</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Black friday campaign to customer</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">unscheduled</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">1000</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">990</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">500</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">2</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">$300.00</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div class="">
                                                                <span data-toggle="modal" data-target="#duplicate-winback-email">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Duplicate Customer winback">
                                                                    <i class="pe-7s-copy-file btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                            <span data-toggle="modal" data-target="#delete-winback-email">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Customer winback">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="{{route('winback-edit')}}" class="text-dark">Newsletters black friday</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Black friday campaign to customer</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">08/20/2021</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">1000</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">990</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">500</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">0</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">$0.00</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div class="">
                                                                <span data-toggle="modal" data-target="#duplicate-winback-email">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Duplicate Customer winback">
                                                                    <i class="pe-7s-copy-file btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                            <span data-toggle="modal" data-target="#delete-winback-email">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Customer winback">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="{{route('winback-edit')}}" class="text-dark">Newsletters black friday</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Black friday campaign to customer</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Unsent</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">1000</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">990</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">500</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">1</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">$300.00</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div class="">
                                                                <span data-toggle="modal" data-target="#duplicate-winback-email">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Duplicate Customer winback">
                                                                    <i class="pe-7s-copy-file btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                            <span data-toggle="modal" data-target="#delete-winback-email">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Customer winback">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="{{route('winback-edit')}}" class="text-dark">Newsletters black friday</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Black friday campaign to customer</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Draft</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">1000</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">990</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">500</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">1</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">$300.00</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div class="">
                                                                <span data-toggle="modal" data-target="#duplicate-winback-email">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Duplicate Customer winback">
                                                                    <i class="pe-7s-copy-file btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                            <span data-toggle="modal" data-target="#delete-winback-email">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Customer winback">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="{{route('winback-edit')}}" class="text-dark">Newsletters black friday</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Black friday campaign to customer</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">unscheduled</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">1000</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">990</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">500</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">1</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">$300.00</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div class="">
                                                                <span data-toggle="modal" data-target="#duplicate-winback-email">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Duplicate Customer winback">
                                                                    <i class="pe-7s-copy-file btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                            <span data-toggle="modal" data-target="#delete-winback-email">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Customer winback">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="{{route('winback-edit')}}" class="text-dark">Newsletters black friday</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Black friday campaign to customer</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">08/20/2021</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">1000</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">990</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">500</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">1</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">$300.00</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div class="">
                                                                <span data-toggle="modal" data-target="#duplicate-winback-email">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Duplicate Customer winback">
                                                                    <i class="pe-7s-copy-file btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                            <span data-toggle="modal" data-target="#delete-winback-email">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Customer winback">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading"><a href="{{route('winback-edit')}}" class="text-dark">Newsletters black friday</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Black friday campaign to customer</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">Unsent</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">1000</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">990</div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">500</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">2</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-sub-heading">$300.00</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div class="">
                                                                <span data-toggle="modal" data-target="#duplicate-winback-email">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Duplicate Customer winback">
                                                                    <i class="pe-7s-copy-file btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                            <span data-toggle="modal" data-target="#delete-winback-email">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Customer winback">
                                                                    <i class="pe-7s-trash btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-block text-center card-footer">
                            <nav class="" aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a href="javascript:void(0);" class="page-link" aria-label="Previous">
                                            <span aria-hidden="true">«</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a href="javascript:void(0);" class="page-link">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="javascript:void(0);" class="page-link">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="javascript:void(0);" class="page-link">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="javascript:void(0);" class="page-link">4</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="javascript:void(0);" class="page-link">5</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="javascript:void(0);" class="page-link" aria-label="Next">
                                            <span aria-hidden="true">»</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!---------------------     End listing Customer Win back section     --------------------->

            <div class="row">


            </div>

        </div>
        <!---------------------     End main  content  section      --------------------->
    </div>
@endsection
@section('modal')
    <div class="modal fade" id="delete-winback-email"  tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are You Sure Want Delete Winback Email?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                        unknown printer took a galley of type and scrambled.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Delete Customer Winback</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal delete duplicate winback email-->
    <div class="modal fade" id="duplicate-winback-email"  tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Duplicate Customer Winback Email?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                        unknown printer took a galley of type and scrambled.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Duplicate Customer Winback</button>
                </div>
            </div>
        </div>
    </div>
@endsection
