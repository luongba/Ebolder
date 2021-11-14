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
                        My Plan & Billing
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
                                Membership Convert Free
                            </div>
                        </div>
                        <div class="scroll-area-lg" style="height: 380px;">
                            <div class="scrollbar-container">
                                <div class="p-2">
                                    <ul class="todo-list-wrapper list-group list-group-flush">
                                        <li class="list-group-item dev-current-plan">
                                            <div class="todo-indicator bg-focus"></div>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper" style="display: block !important;">

                                                    <div class="widget-content-left">
                                                        <div class="widget-heading plan-service-title">
                                                            Popups & flyouts to grow your email list. <i class="fa text-primary fa-question-circle text-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="This is your website URL, example: istore.com"></i>

                                                        </div>
                                                        <div class="widget-subheading" style="opacity: 1 !important;">
                                                            <div class="mb-3 progress" style="margin-top:0.7rem;height: 1.5rem;">
                                                                <div class="progress-bar progress-bar-animated bg-info progress-bar-striped"
                                                                     role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                                     aria-valuemax="100" style="width: 100%;"> Unlimit
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item dev-current-plan">
                                            <div class="todo-indicator bg-focus"></div>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper" style="display: block !important;">

                                                    <div class="widget-content-left">
                                                        <div class="widget-heading plan-service-title">
                                                            Email, Sign Up Template Design. <i class="fa text-primary fa-question-circle text-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="This is your website URL, example: istore.com"></i>
                                                        </div>
                                                        <div class="widget-subheading" style="opacity: 1 !important;">
                                                            <div class="mb-3 progress" style="margin-top:0.7rem;height: 1.5rem;">
                                                                <div class="progress-bar progress-bar-animated bg-info progress-bar-striped"
                                                                     role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                                     aria-valuemax="100" style="width: 100%;"> Unlimit
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item dev-current-plan">
                                            <div class="todo-indicator bg-focus"></div>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper" style="display: block !important;">

                                                    <div class="widget-content-left">
                                                        <div class="widget-heading plan-service-title">
                                                            <strong class="contact-current">25</strong> of 100 active emailable profiles. <i class="fa text-primary fa-question-circle text-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="This is your website URL, example: istore.com"></i>

                                                        </div>
                                                        <div class="widget-subheading" style="opacity: 1 !important;">
                                                            <div class="mb-3 progress" style="margin-top:0.7rem;height: 1.5rem;">
                                                                <div class="progress-bar progress-bar-animated bg-info progress-bar-striped"
                                                                     role="progressbar" aria-valuenow="10" aria-valuemin="0"
                                                                     aria-valuemax="100" style="width: 25%;"> 25%
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>

                                        <li class="list-group-item dev-current-plan">
                                            <div class="todo-indicator bg-focus"></div>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper" style="display: block !important;">
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading plan-service-title">
                                                            <strong class="contact-current">0</strong> of 0 emails send in this plan. <i class="fa text-primary fa-question-circle text-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="This is your website URL, example: istore.com"></i>

                                                        </div>
                                                        <div class="widget-subheading" style="opacity: 1 !important;">
                                                            <div class="mb-3 progress" style="margin-top:0.7rem;height: 1.5rem;">
                                                                <div class="progress-bar progress-bar-animated bg-info progress-bar-striped"
                                                                     role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                                     aria-valuemax="100" style="width: 0%;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="d-block text-right card-footer">
                            <div class="plan-current">
                                Your current plan is<span class="plan-price"> $0 </span>/ month
                            </div>
                            <a href="{{route('plan')}}"><button class="btn btn-primary">UPGRADE PLAN</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <div class="card-hover-shadow-2x mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                <i class="header-icon pe-7s-cash icon-gradient bg-ripe-malin"></i>
                                Payment Methods
                            </div>
                        </div>
                        <div class="scroll-area-lg" style="height: 380px;">
                            <div class="scrollbar-container">
                                <div class="p-2">
                                    <div class="chat-wrapper p-1">


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">SAVE</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="main-card mb-3 card">
                        <div class="card-header">
                            Invoice
                            <div class="btn-actions-pane-right">

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                <tr>
                                    <th class="text-left">#</th>
                                    <th>ID</th>

                                    <th class="text-left">Date</th>

                                    <th class="text-left">Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-left text-muted">#1</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading"><a href="#" class="text-dark">RH67SJ</a></div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div class="widget-heading">20/07/2021</div>
                                    </td>
                                    <td class="text-left">
                                        <div class="invoice-amount">
                                            <span class="text-dark-success">15$</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left text-muted">#1</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading"><a href="#" class="text-dark">RH67SJ</a></div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div class="widget-heading">20/07/2021</div>
                                    </td>
                                    <td class="text-left">
                                        <div class="invoice-amount">
                                            <span class="text-dark-success">15$</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left text-muted">#1</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading"><a href="#" class="text-dark">RH67SJ</a></div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div class="widget-heading">20/07/2021</div>
                                    </td>
                                    <td class="text-left">
                                        <div class="invoice-amount">
                                            <span class="text-dark-success">15$</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-left text-muted">#1</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">

                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading"><a href="#" class="text-dark">RH67SJ</a></div>

                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-left">
                                        <div class="widget-heading">20/07/2021</div>
                                    </td>
                                    <td class="text-left">
                                        <div class="invoice-amount">
                                            <span class="text-dark-success">15$</span>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-block text-center card-footer">

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
