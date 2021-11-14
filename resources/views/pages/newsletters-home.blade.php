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
                            <i class="pe-7s-paper-plane lnr icon-gradient bg-mean-fruit"></i>
                        </div>
                        <div>
                            Newsletters
                            <div class="page-title-subheading">Create your Newsletters swiftly and win more sales with Ebolder!.</div>
                        </div>
                    </div>
                    <div class="page-title-actions">
                                        <span class="btn-icon-wrapper pr-2">
                                            <a class="btn-icon btn dev-button btn-primary" href="{{route('newsletter-create')}}" style="padding: 10px 15px;">
                                                <i class="pe-7s-plus dev-icon btn-icon-wrapper" style="margin-top: -3px;"></i>Create New Newsletter
                                            </a>
                                        </span>
                    </div>
                </div>
            </div>
            <!---------------------     Start report campaigns section     --------------------->
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
                                <div class="widget-numbers">10000</div>

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
                                <div class="widget-numbers">5000</div>

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
                                    <span>1000</span>
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
                                    <span>500</span>
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
                                    <span>$10,000</span>
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
                            <input type="text" class="search-input" placeholder="Search Newsletters ...">
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
                                                <i class="pe-7s-paper-plane lnr fa-w-20 filter-box-icon"></i>
                                            </span>
                            Newsletters Status
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu">
                            <button type="button" tabindex="0" class="dropdown-item">All (8)</button>
                            <button type="button" tabindex="0" class="dropdown-item">Sent (2)</button>
                            <button type="button" tabindex="0" class="dropdown-item">Unsent (2)</button>
                            <button type="button" tabindex="0" class="dropdown-item">Draft (2)</button>
                            <button type="button" tabindex="0" class="dropdown-item">Scheduled (2)</button>
                        </div>

                    </div>
                </li>

            </ul>
            <!---------------------     Start tab filter campaigns section     --------------------->

            <!---------------------     Start list campaigns section     --------------------->
            <div class="row">
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="text-left">Title</th>
                                    <th class="text-left">Subject</th>
                                    <th class="text-left">Send At</th>
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
                                                    <div class="widget-sub-heading"><a href="{{route('newsletter-edit')}}" class="text-dark">Newsletters black friday</a></div>
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
                                                                <span data-toggle="modal" data-target="#delete-newsletter">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dupllicate newsletter">
                                                                    <i class="pe-7s-copy-file btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                            <span data-toggle="modal" data-target="#delete-newsletter">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete newsletter">
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
                                                    <div class="widget-sub-heading"><a href="{{route('newsletter-edit')}}" class="text-dark">Newsletters black friday</a></div>
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
                                                                <span data-toggle="modal" data-target="#delete-newsletter">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dupllicate newsletter">
                                                                    <i class="pe-7s-copy-file btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                            <span data-toggle="modal" data-target="#delete-newsletter">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete newsletter">
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
                                                    <div class="widget-sub-heading"><a href="{{route('newsletter-edit')}}" class="text-dark">Newsletters black friday</a></div>
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
                                                                <span data-toggle="modal" data-target="#delete-newsletter">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dupllicate newsletter">
                                                                    <i class="pe-7s-copy-file btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                            <span data-toggle="modal" data-target="#delete-newsletter">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete newsletter">
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
                                                    <div class="widget-sub-heading"><a href="{{route('newsletter-edit')}}" class="text-dark">Newsletters black friday</a></div>
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
                                                                <span data-toggle="modal" data-target="#delete-newsletter">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dupllicate newsletter">
                                                                    <i class="pe-7s-copy-file btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                            <span data-toggle="modal" data-target="#delete-newsletter">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete newsletter">
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
                                                    <div class="widget-sub-heading"><a href="{{route('newsletter-edit')}}" class="text-dark">Newsletters black friday</a></div>
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
                                                                <span data-toggle="modal" data-target="#delete-newsletter">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dupllicate newsletter">
                                                                    <i class="pe-7s-copy-file btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                            <span data-toggle="modal" data-target="#delete-newsletter">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete newsletter">
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
                                                    <div class="widget-sub-heading"><a href="{{route('newsletter-edit')}}" class="text-dark">Newsletters black friday</a></div>
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
                                                                <span data-toggle="modal" data-target="#delete-newsletter">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dupllicate newsletter">
                                                                    <i class="pe-7s-copy-file btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                            <span data-toggle="modal" data-target="#delete-newsletter">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete newsletter">
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
                                                    <div class="widget-sub-heading"><a href="{{route('newsletter-edit')}}" class="text-dark">Newsletters black friday</a></div>
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
                                                                <span data-toggle="modal" data-target="#delete-newsletter">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dupllicate newsletter">
                                                                    <i class="pe-7s-copy-file btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                            <span data-toggle="modal" data-target="#delete-newsletter">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete newsletter">
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
                                                    <div class="widget-sub-heading"><a href="{{route('newsletter-edit')}}" class="text-dark">Newsletters black friday</a></div>
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
                                                                <span data-toggle="modal" data-target="#delete-newsletter">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Dupllicate newsletter">
                                                                    <i class="pe-7s-copy-file btn-icon-wrapper"></i>
                                                                    </button>
                                                                </span>
                                            <span data-toggle="modal" data-target="#delete-newsletter">
                                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete newsletter">
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

            <!---------------------     End listing campaign section     --------------------->

            <div class="row">


            </div>

        </div>
        <!---------------------     End main  content  section      --------------------->
    </div>
@endsection
@section('modal')
    <div class="modal fade" id="delete-newsletter"  tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure want delete?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form type="" method="" id="addon-domain">
                    <div class="modal-body">
                        <div class="mb-0">
                            <div class="position-relative form-group">
                                Clicking delete will permanently remove your newsletter and cancel any scheduled sends
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <a href="sending-domain-verify.html"><button type="button" class="btn btn-primary">Delete Newsletter</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
