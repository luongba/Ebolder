@extends('welcome')
@section('content')
    <div class="app-main__inner">
        <!---------------------     Start head content  section     --------------------->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-diamond icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        My Plan &amp; Billing
                        <div class="page-title-subheading">Get start with membership and win more sales with Ebolder!.</div>
                    </div>
                </div>
            </div>
        </div>
        <!---------------------     End head content section     --------------------->
        <!---------------------     Start main  section     --------------------->
        <div class="tabs-animation">
            <!---------------------     Start content  section     --------------------->

            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <div class="card-hover-shadow-2x mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title font-size-lg text-capitalize font-weight-bold">
                                <i class="header-icon pe-7s-diamond icon-gradient bg-malibu-beach"></i>
                                Email + Conversion Plan
                            </div>
                            <div class="btn-actions-pane-right plan-price-title">
                                starts at <strong class="plan-price-short">$15</strong>
                            </div>
                        </div>
                        <div class="scroll-area-lg" style="height: 380px;">
                            <div class="scrollbar-container ps">
                                <div class="p-2">
                                    <ul class="todo-list-wrapper list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper" style="display: block !important;">
                                                    <div class="widget-content-left">
                                                        <div class="service-ticker-title">
                                                            <i class="fa fa-check text-primary service-ticker"></i>
                                                            <strong>$15</strong>/month for 300 contacts.
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper" style="display: block !important;">
                                                    <div class="widget-content-left">
                                                        <div class="service-ticker-title">
                                                            <i class="fa fa-check text-primary service-ticker"></i>
                                                            Monthly price based on # of contacts. <a href="#">See details.</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper" style="display: block !important;">
                                                    <div class="widget-content-left">
                                                        <div class="service-ticker-title">
                                                            <i class="fa fa-check text-primary service-ticker"></i>
                                                            <strong>Unlimited </strong>popups &amp; flyouts to grow your email list
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper" style="display: block !important;">
                                                    <div class="widget-content-left">
                                                        <div class="service-ticker-title">
                                                            <i class="fa fa-check text-primary service-ticker"></i>
                                                            <strong>Unlimited </strong>Email, Sign Up Template Design.
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>

                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper" style="display: block !important;">
                                                    <div class="widget-content-left">
                                                        <div class="service-ticker-title">
                                                            <i class="fa fa-check text-primary service-ticker"></i>
                                                            Send  <strong>newsletters</strong> and other one-off emails
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper" style="display: block !important;">
                                                    <div class="widget-content-left">
                                                        <div class="service-ticker-title">
                                                            <i class="fa fa-check text-primary service-ticker"></i>
                                                            <strong>Automated</strong> customer winback emails
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper" style="display: block !important;">
                                                    <div class="widget-content-left">
                                                        <div class="service-ticker-title">
                                                            <i class="fa fa-check text-primary service-ticker"></i>
                                                            <strong>Unlimited</strong>  email sends
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
                        </div>
                        <div class="d-block text-right card-footer">
                            <a href="{{route('package-payment')}}"> <button class="btn btn-primary">UPGRADE NOW</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="card-hover-shadow-2x mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title font-size-lg text-capitalize font-weight-bold">
                                <i class="header-icon pe-7s-diamond icon-gradient bg-malibu-beach"></i>
                                Convert plan includes
                            </div>
                            <div class="btn-actions-pane-right plan-price-title">
                                starts at <strong class="plan-price-short">$50</strong>
                            </div>
                        </div>
                        <div class="scroll-area-lg" style="height: 380px;">
                            <div class="scrollbar-container ps ps--active-y">
                                <div class="p-2">
                                    <ul class="todo-list-wrapper list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper" style="display: block !important;">
                                                    <div class="widget-content-left">
                                                        <div class="service-ticker-title">
                                                            <i class="fa fa-check text-primary service-ticker"></i>
                                                            <strong>$50</strong>/month for 50,000 pageviews.
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper" style="display: block !important;">
                                                    <div class="widget-content-left">
                                                        <div class="service-ticker-title">
                                                            <i class="fa fa-check text-primary service-ticker"></i>
                                                            Monthly price based on # of pageviews. <a href="#">See details.</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper" style="display: block !important;">
                                                    <div class="widget-content-left">
                                                        <div class="service-ticker-title">
                                                            <i class="fa fa-check text-primary service-ticker"></i>
                                                            <strong>Unlimited </strong>popups &amp; flyouts to grow your email list
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper" style="display: block !important;">
                                                    <div class="widget-content-left">
                                                        <div class="service-ticker-title">
                                                            <i class="fa fa-check text-primary service-ticker"></i>
                                                            <strong>Unlimited </strong>Email, Sign Up Template Design.
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper" style="display: block !important;">
                                                    <div class="widget-content-left">
                                                        <div class="service-ticker-title">
                                                            <i class="fa fa-check text-primary service-ticker"></i>
                                                            <strong>Advanced </strong> targeting campains
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>

                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper" style="display: block !important;">
                                                    <div class="widget-content-left">
                                                        <div class="service-ticker-title disable-service-ticker">
                                                            <i class="fa fa-check text-secondary service-ticker"></i>
                                                            Send  <strong>newsletters</strong> and other one-off emails
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper" style="display: block !important;">
                                                    <div class="widget-content-left">
                                                        <div class="service-ticker-title disable-service-ticker">
                                                            <i class="fa fa-check text-secondary service-ticker"></i>
                                                            <strong>Automated</strong> customer winback emails
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper" style="display: block !important;">
                                                    <div class="widget-content-left">
                                                        <div class="service-ticker-title disable-service-ticker">
                                                            <i class="fa fa-check text-secondary service-ticker"></i>
                                                            <strong>Unlimited</strong>  email sends
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 380px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 377px;"></div></div></div>
                        </div>
                        <div class="d-block text-right card-footer">
                            <a href="{{route('package-payment')}}"><button class="btn btn-primary">UPGRADE NOW</button></a>
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
