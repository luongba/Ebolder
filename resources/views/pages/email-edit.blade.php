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
                            <i class="pe-7s-mail-open-file lnr icon-gradient bg-mean-fruit"></i>
                        </div>
                        <div class="campaign-name-edit" data-toggle="modal" data-target="#edit-customer-winback-info">
                            Customer Winback name in here <i class="lnr-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Customer Winback Infomation"></i>
                            <div class="page-title-subheading">Create your Email swiftly and win more sales with Ebolder!</div>
                        </div>
                    </div>
                    <div class="page-title-actions">
                        <div class="d-inline-block dropdown">
                            <button type="button" class="btn dev-button btn-secondary" data-toggle="modal" data-target="#show-customer-winback-setting">
                                                <span class="btn-icon-wrapper pr-2">
                                                    <i class="pe-7s-config fa-w-20 dev-import-button"></i>
                                                </span>
                                Settings
                            </button>
                            <button type="button" class="btn dev-button btn-secondary">
                                                <span class="btn-icon-wrapper pr-2">
                                                    <i class="lnr-pencil fa-w-20 dev-import-button"></i>
                                                </span>
                                Template Edits
                            </button>
                            <button type="button" class="btn dev-button btn-danger" data-toggle="modal" data-target="#delete-customer-winback">
                                                <span class="btn-icon-wrapper pr-2">
                                                    <i class="pe-7s-trash fa-w-20 dev-import-button"></i>
                                                </span>
                                Delete
                            </button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <i class="header-icon pe-7s-graph2 icon-gradient bg-happy-green"></i>
                        Overview Customer Winback
                    </div>
                    <div class="btn-actions-pane-right text-capitalize">
                    </div>
                </div>
                <div class="tab-content">
                    <div class="card-body">
                        <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                            <div id="chart-apex-negative"></div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="mb-3 card metrics">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                <i class="header-icon pe-7s-info"></i>
                                Basic Info
                            </div>
                            <div class="btn-actions-pane-right text-capitalize" data-toggle="modal" data-target="#edit-customer-winback-info">
                                <i class="lnr-pencil fa-w-20 dev-import-button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Customer Winback Infomation"></i>
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
                                                            <strong>Trigger:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <div class="badge badge-warning">Draft</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <strong>Subject Email:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span>Mobile newsletter Discount</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <strong>Reply To:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span>Offer@ebolder.com.vn</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <strong>Preview Text:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span">This is Preview Text of email...</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <strong>Last Updates:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span>Aug 21, 2021 at 8:49 a.m</span>
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
                    <div class="mb-3 card metrics">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                <i class="header-icon pe-7s-graph bg-premium-dark icon-gradient"></i>
                                Converts Customer Winback Email Rate
                            </div>
                        </div>
                        <div class="metrics-item card-body pr-0">
                            <div class="col-md-12 row p-0">
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
                </div>
            </div>
        </div>
        <!---------------------     End main  content  section      --------------------->
    </div>
@endsection
@section('modal')
    <div class="modal fade" id="edit-customer-winback-info"  tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Email Newsletter Infomations</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form type="" method="" id="addon-domain">
                    <div class="modal-body">
                        <div class="mb-0">
                            <div class="position-relative form-group">
                                <label for="newsletter-title" class="text-bold">Customer Winback Title</label>
                                <input type="text" class="form-control" id="newsletter-title" name="Newsletter Title" placeholder="Enter Customer Winback Title ..." value="Email Customer Winback ">
                            </div>
                            <div class="position-relative form-group">
                                <label for="reply-email" class="text-bold">Reply To <i class="fa text-primary fa-question-circle text-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="This section to help customer can reply email to your email setup. "></i></label>
                                <input type="text" class="form-control" id="reply-email" name="reply email" placeholder="Enter Reply Email To" value="Offer@ebolder.com.vn" >
                            </div>
                            <div class="position-relative form-group">
                                <label for="subject-email" class="text-bold">Subject Email <i class="fa text-primary fa-question-circle text-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="This is subject of email will send to customer "></i></label>
                                <input type="text" class="form-control" id="subject-email" name="subject email" placeholder="Enter Subject Email ..." value="Black friday campaign to customer" >
                            </div>
                            <div class="position-relative form-group">
                                <label for="preview-email" class="text-bold">Preview Text <i class="fa text-primary fa-question-circle text-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Preview text is the snippet of text that appears after the email subject line in most email programs "></i></label>
                                <input type="text" class="form-control" id="preview-email" name="preview email" placeholder="Enter Preview Email ..." value="" >
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary">Changed</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Start Setting Newsletter  -->
    <div class="modal fade bd-example-modal-lg" id="show-customer-winback-setting" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"> <i class="pe-7s-config"></i>Settings Trigger</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form type="" method="" id="newsletter-setting">
                    <div class="campaign-modal-body row">
                        <div class="col-md-12">
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="custom-contact"><strong>Mailable contacts that have <i class="fa text-primary fa-question-circle text-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="This section to help automatic send mail to customer not placed an order in days"></i></strong></label>
                                    <input placeholder="Enter Number days" type="text" class="mb-2 form-control" value="30">
                                </div>
                                <div class="col-md-12">
                                    <label for="custom-contact"><strong>Select Coupon Will Displayed To Each Recipient </strong></label>
                                    <select class="multiselect-dropdown form-control">
                                        <option value="">Off 30%</option>
                                        <option value="By campaign">Off 50%</option>
                                        <option value="Last seen">Free Ship</option>
                                        <option value="Sign up date">Discount 20%</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="signup" value="">Save</button>
                    </div>
                </form>

            </div>

        </div>

    </div>
    <!-- Modal delete newsletter-->
    <div class="modal fade" id="delete-customer-winback"  tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete This Customer Winback Email?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">
                        When you delete this Customer Winback Email all changes will be lost.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
