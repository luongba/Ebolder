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
                            <i class="pe-7s-user lnr icon-gradient bg-mean-fruit"></i>
                        </div>
                        <div>
                            customer@ebolder.com
                            <div class="text-bold">Jame <i class="lnr-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Customer Name"></i></div>
                        </div>
                    </div>
                    <div class="page-title-actions">
                        <div class="d-inline-block dropdown">
                            <button type="button" class="btn dev-button btn-secondary">
                                Unsubscribe
                            </button>
                            <button type="button" class="btn dev-button btn-danger">
                                                <span class="btn-icon-wrapper pr-2">
                                                    <i class="pe-7s-trash fa-w-20 dev-import-button"></i>
                                                </span>
                                Delete
                            </button>

                        </div>
                    </div>
                </div>
            </div>
            <!---------------------     Start report campaigns section     --------------------->


            <!---------------------     End report campaign section     --------------------->

            <!---------------------     Start tab filter campaigns section     --------------------->


            <!---------------------     Start tab filter campaigns section     --------------------->

            <!---------------------     Start list campaigns section     --------------------->
            <div class="row">
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="mb-3 card metrics">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                <i class="header-icon pe-7s-graph bg-premium-dark icon-gradient"></i>
                                Metrics
                            </div>
                        </div>
                        <div class="metrics-item">

                            <div class="col-md-12">
                                <div class="">
                                    <div class="position-relative form-group">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left"><strong><img src="{{asset('images/logo-icon.png')}}"/> Received Email:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span>10</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left"><strong><img src="{{asset('images/logo-icon.png')}}"/> Opened Email:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span>10</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left"><strong><img src="{{asset('images/logo-icon.png')}}"/> Clicked Email:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span>10</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left"><strong><img src="{{asset('images/logo-icon.png')}}"/> Campaign signup Views:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span>10</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left"><strong><i class="dot-btn-icon fab fa-shopify icon-gradient"></i> Placed Order:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span>2</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left"><strong><i class="dot-btn-icon fab fa-shopify icon-gradient"></i> Fulfilled Order:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span>0</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left"><strong><i class="dot-btn-icon fab fa-shopify icon-gradient"></i> Refunded Order:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span>0</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left"><strong><i class="dot-btn-icon fab fa-shopify icon-gradient"></i> Checkout Started:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span>10</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left"><strong><i class="dot-btn-icon fab fa-shopify icon-gradient"></i> Cancelled Order:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span>3</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left"><strong><i class="dot-btn-icon fab fa-shopify icon-gradient"></i> Ordered Products:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span>2</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left"><strong><i class="dot-btn-icon fab fa-shopify icon-gradient"></i> Revenue:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span>$200</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                <i class="header-icon pe-7s-graph1 bg-premium-dark icon-gradient"></i>
                                Attributes
                            </div>
                        </div>
                        <div class="metrics-item">
                            <div class="col-md-12">
                                <div class="">
                                    <div class="position-relative form-group">
                                        <ul class="list-group list-group-flush">

                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <strong> Created:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span>February 24, 2021</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <strong> Source:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span>Shopify</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <strong> Email Permission:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span>Mailable</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <strong> Phone:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <strong> Coupon Code:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span>123456</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <strong> Tags:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <strong> Country:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span>Vietnam</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <strong> City:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span>Ha Noi</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <strong> Browser:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span>Safari 12 / mac</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <strong> Url:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span>https://tntechs.myshopify.com/</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-8">
                    <div class="mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                <i class="pe-7s-graph2 header-icon mr-3 bg-premium-dark icon-gradient"></i>
                                Activity
                            </div>
                        </div>
                        <div class="card-body activity">
                            <div class="scroll-area-lg">
                                <div class="scrollbar-container">
                                    <div class="vertical-time-icons vertical-timeline vertical-timeline--animate vertical-timeline--one-column">
                                        <div class="vertical-timeline-item vertical-timeline-element">
                                            <div>
                                                                    <span class="vertical-timeline-element-icon bounce-in">
                                                                        <div class="timeline-icon">
                                                                            <i class="dot-btn-icon fab fa-shopify"></i>
                                                                        </div>
                                                                    </span>
                                                <div class="vertical-timeline-element-content bounce-in">
                                                    <div class="widget-content">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left"><h4 class="timeline-title">Placed Order</h4></div>
                                                            <div class="widget-content-right">February 24, 2021</div>
                                                        </div>
                                                    </div>
                                                    <p>
                                                        Lorem ipsum dolor sic amet, today at
                                                        <a href="javascript:void(0);">Detail</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="vertical-timeline-item vertical-timeline-element">
                                            <div>
                                                                    <span class="vertical-timeline-element-icon bounce-in">
                                                                        <div class="timeline-icon">
                                                                            <i class="dot-btn-icon fab fa-shopify"></i>
                                                                        </div>
                                                                    </span>
                                                <div class="vertical-timeline-element-content bounce-in">
                                                    <div class="widget-content">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left"><h4 class="timeline-title">Placed Order</h4></div>
                                                            <div class="widget-content-right">February 24, 2021</div>
                                                        </div>
                                                    </div>
                                                    <p>
                                                        Lorem ipsum dolor sic amet, today at
                                                        <a href="javascript:void(0);">Detail</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vertical-timeline-item vertical-timeline-element">
                                            <div>
                                                                    <span class="vertical-timeline-element-icon bounce-in">
                                                                        <div class="timeline-icon">
                                                                            <i class="dot-btn-icon fab fa-shopify"></i>
                                                                        </div>
                                                                    </span>
                                                <div class="vertical-timeline-element-content bounce-in">
                                                    <div class="widget-content">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left"><h4 class="timeline-title">Placed Order</h4></div>
                                                            <div class="widget-content-right">February 24, 2021</div>
                                                        </div>
                                                    </div>
                                                    <p>
                                                        Lorem ipsum dolor sic amet, today at
                                                        <a href="javascript:void(0);">Detail</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vertical-timeline-item vertical-timeline-element">
                                            <div>
                                                                    <span class="vertical-timeline-element-icon bounce-in">
                                                                        <div class="timeline-icon ">
                                                                            <img src="{{asset('images/logo-icon.png')}}"/>
                                                                        </div>
                                                                    </span>
                                                <div class="vertical-timeline-element-content bounce-in">
                                                    <div class="widget-content">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left"><h4 class="timeline-title">Email Open</h4></div>
                                                            <div class="widget-content-right">February 24, 2021</div>
                                                        </div>
                                                    </div>
                                                    <p>
                                                        Email campaign name

                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vertical-timeline-item vertical-timeline-element">
                                            <div>
                                                                    <span class="vertical-timeline-element-icon bounce-in">
                                                                        <div class="timeline-icon">
                                                                            <img src="{{asset('images/logo-icon.png')}}"/>
                                                                        </div>
                                                                    </span>
                                                <div class="vertical-timeline-element-content bounce-in">
                                                    <div class="widget-content">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left"><h4 class="timeline-title">Email Click</h4></div>
                                                            <div class="widget-content-right">February 24, 2021</div>
                                                        </div>
                                                    </div>
                                                    <p>
                                                        Email campaign name

                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vertical-timeline-item vertical-timeline-element">
                                            <div>
                                                                    <span class="vertical-timeline-element-icon bounce-in">
                                                                        <div class="timeline-icon">
                                                                            <i class="dot-btn-icon fab fa-shopify"></i>
                                                                        </div>
                                                                    </span>
                                                <div class="vertical-timeline-element-content bounce-in">
                                                    <div class="widget-content">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left"><h4 class="timeline-title">Placed Order</h4></div>
                                                            <div class="widget-content-right">February 24, 2021</div>
                                                        </div>
                                                    </div>
                                                    <p>
                                                        Lorem ipsum dolor sic amet, today at
                                                        <a href="javascript:void(0);">Detail</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="vertical-timeline-item vertical-timeline-element">
                                            <div>
                                                                    <span class="vertical-timeline-element-icon bounce-in">
                                                                        <div class="timeline-icon">
                                                                            <i class="dot-btn-icon fab fa-shopify"></i>
                                                                        </div>
                                                                    </span>
                                                <div class="vertical-timeline-element-content bounce-in">
                                                    <div class="widget-content">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left"><h4 class="timeline-title">Placed Order</h4></div>
                                                            <div class="widget-content-right">February 24, 2021</div>
                                                        </div>
                                                    </div>
                                                    <p>
                                                        Lorem ipsum dolor sic amet, today at
                                                        <a href="javascript:void(0);">Detail</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vertical-timeline-item vertical-timeline-element">
                                            <div>
                                                                    <span class="vertical-timeline-element-icon bounce-in">
                                                                        <div class="timeline-icon">
                                                                            <i class="dot-btn-icon fab fa-shopify"></i>
                                                                        </div>
                                                                    </span>
                                                <div class="vertical-timeline-element-content bounce-in">
                                                    <div class="widget-content">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left"><h4 class="timeline-title">Placed Order</h4></div>
                                                            <div class="widget-content-right">February 24, 2021</div>
                                                        </div>
                                                    </div>
                                                    <p>
                                                        Lorem ipsum dolor sic amet, today at
                                                        <a href="javascript:void(0);">Detail</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vertical-timeline-item vertical-timeline-element">
                                            <div>
                                                                    <span class="vertical-timeline-element-icon bounce-in">
                                                                        <div class="timeline-icon ">
                                                                            <img src="{{asset('images/logo-icon.png')}}"/>
                                                                        </div>
                                                                    </span>
                                                <div class="vertical-timeline-element-content bounce-in">
                                                    <div class="widget-content">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left"><h4 class="timeline-title">Email Open</h4></div>
                                                            <div class="widget-content-right">February 24, 2021</div>
                                                        </div>
                                                    </div>
                                                    <p>
                                                        Email campaign name

                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vertical-timeline-item vertical-timeline-element">
                                            <div>
                                                                    <span class="vertical-timeline-element-icon bounce-in">
                                                                        <div class="timeline-icon">
                                                                            <img src="{{asset('images/logo-icon.png')}}"/>
                                                                        </div>
                                                                    </span>
                                                <div class="vertical-timeline-element-content bounce-in">
                                                    <div class="widget-content">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left"><h4 class="timeline-title">Email Click</h4></div>
                                                            <div class="widget-content-right">February 24, 2021</div>
                                                        </div>
                                                    </div>
                                                    <p>
                                                        Email campaign name

                                                    </p>
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

            <!---------------------     End listing campaign section     --------------------->

            <div class="row">


            </div>

        </div>
        <!---------------------     End main  content  section      --------------------->
    </div>
@endsection
