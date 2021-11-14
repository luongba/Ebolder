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
                        <div class="campaign-name-edit" data-toggle="modal" data-target="#editor-campaign-name">
                            Campaign name in here <i class="lnr-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Campaign Name"></i>
                            <div class="page-title-subheading">Create your campaigns swiftly and win more sales with Ebolder!</div>
                        </div>
                    </div>
                    <div class="page-title-actions">
                        <div class="d-inline-block dropdown">
                            <button type="button" class="btn dev-button btn-secondary" data-toggle="modal" data-target="#show-campaign-setting">
                                                <span class="btn-icon-wrapper pr-2">
                                                    <i class="pe-7s-config fa-w-20 dev-import-button"></i>
                                                </span>
                                Settings
                            </button>
                            <button type="button" class="btn dev-button btn-secondary">
                                                <span class="btn-icon-wrapper pr-2">
                                                    <i class="lnr-pencil fa-w-20 dev-import-button"></i>
                                                </span>
                                Signup Form Edits
                            </button>
                            <button type="button" class="btn dev-button btn-danger" data-toggle="modal" data-target="#stop-campaign">
                                                <span class="btn-icon-wrapper pr-2">
                                                    <i class="pe-7s-trash fa-w-20 dev-import-button"></i>
                                                </span>
                                Stop Campaign
                            </button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                        <i class="header-icon pe-7s-graph2 icon-gradient bg-happy-green"></i>
                        Overview Campaign Signups
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
                                                            <strong>Status:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <div class="badge badge-success">Active</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <strong>Campaign Type:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span>Mobile Signup Discount</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <strong>Signup Display:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <div class="badge badge-primary">Popup</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <strong>Create At:</strong>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <span">Aug 17, 2021 at 8:49 a.m</span>
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
                                Converts Signup rate
                            </div>
                        </div>
                        <div class="metrics-item card-body pr-0">
                            <div class="col-md-12 row p-0">
                                <div class="col-sm-12 col-md-6">
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
                                <div class="col-sm-12 col-md-6">
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
                                <div class="col-sm-12 col-md-6">
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
                </div>
            </div>
        </div>
        <!---------------------     End main  content  section      --------------------->
    </div>
@endsection
@section('modal')
    <div class="modal fade" id="delete-campaign"  tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are You Sure Delete This Campaign?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">
                        When you delete this campaign all changes will be lost.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal delete archive campaign-->
    <div class="modal fade" id="delete-archive-campaign"  tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Archive This Campaign?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">
                        This campaign will be removed from the dashboard.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Archived Campaign</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal create Title and subject Email-->
    <div class="modal fade" id="editor-campaign-name"  tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Campaign Name</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form type="" method="" id="addon-domain">
                    <div class="modal-body">
                        <div class="mb-0">
                            <div class="position-relative form-group">
                                <label for="newsletter-title" class="text-bold">Campaign Name</label>
                                <input type="text" class="form-control" id="campaigns-title" name="Campaign Title" placeholder="Enter Campaigns Title ..." value="Campaign Name">
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

    <!-- Start Setting campaign detail in signup form design-->
    <div class="modal fade bd-example-modal-lg" id="show-campaign-setting" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"> <i class="pe-7s-config"></i> Welcome discount popup desktop - Setting</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form type="" method="" id="campaign-setting">
                    <div class="campaign-modal-body row">
                        <div class="col-md-12">
                            <div id="accordion" class="mb-3">
                                <div class="card mb-2">
                                    <div id="headingOne" class="card-header campaigns-setting-title" data-toggle="tooltip" data-placement="top" title="" data-original-title="Click To Edit Setting">
                                        <button type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-block campaign-line-height">
                                            <div class="m-0 p-0 card-header-title"><span class="font-size-lg text-capitalize campaigns-setting-title-target"><i class="pe-7s-ticket"></i> Coupon</span> <span class="campaigns-setting-label mr-2 badge badge-primary">Off 30%: 123456</span></div>
                                        </button>
                                    </div>
                                    <div data-parent="#accordion" id="collapseOne1" aria-labelledby="headingOne" class="collapse">
                                        <div class="card-body">
                                            <div class="mb-0">
                                                <div class="position-relative form-group">
                                                    <label for="campaigns-type" class="text-bold">Select Coupon</label>
                                                    <select class="multiselect-dropdown form-control">
                                                        <option value="No Coupon Selected">No Coupon Selected</option>
                                                        <option value="Off 20%">Off 20%</option>
                                                        <option value="Off 50%">Off 50%</option>
                                                        <option value="Off 30%">Off 30%</option>
                                                    </select>
                                                </div
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div id="headingOne" class="card-header campaigns-setting-title" data-toggle="tooltip" data-placement="top" title="" data-original-title="Click To Edit Setting">
                                    <button type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-block campaign-line-height">
                                        <div class="m-0 p-0 card-header-title"><span class="font-size-lg text-capitalize campaigns-setting-title-target"><i class="pe-7s-timer"></i> When to show</span> <span class="campaigns-setting-label mr-2 badge badge-primary">Timer: <strong>10 second</strong></span>
                                            <span class="campaigns-setting-label mr-2 badge badge-primary">Trigger at most: : <strong>Every 1 day</strong></span>
                                        </div>
                                    </button>
                                </div>
                                <div data-parent="#accordion" id="collapseOne2" aria-labelledby="headingOne" class="collapse">
                                    <div class="card-body">
                                        <div class="mb-0">
                                            <div class="position-relative form-group">
                                                <label for="campaigns-type" class="text-bold">Show on Timer</label>
                                                <select class="multiselect-dropdown form-control">
                                                    <option value="Immediately">Immediately</option>
                                                    <option value="After 3 seconds">After 3 seconds</option>
                                                    <option value="After 5 seconds (Remcommend)">After 5 seconds (Remcommend)</option>
                                                    <option value="After 10 seconds">After 10 seconds</option>
                                                    <option value="After 15 seconds">After 15 seconds</option>
                                                    <option value="After 30 seconds">After 30 seconds</option>
                                                    <option value="After 1 minute">After 1 minute</option>
                                                    <option value="After 2 minutes">After 2 minutes</option>
                                                </select>
                                            </div>
                                            <div class="position-relative form-group">
                                                <label for="campaigns-type" class="text-bold">Trigger Auto Show at</label>

                                                <select class="multiselect-dropdown form-control">
                                                    <option value="Every day (Remcommend)">Every day (Remcommend)</option>
                                                    <option value="Every 10 minutes">Every 10 minutes</option>
                                                    <option value="After 30 minutes">After 30 minutes</option>
                                                    <option value="Every hour">Every hour</option>
                                                    <option value="Every 12 hour">Every 12 hour</option>
                                                    <option value="Every 3 days">Every 3 days</option>
                                                    <option value="Every week">Every week</option>
                                                    <option value="Every month">Every month</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div id="headingOne" class="card-header campaigns-setting-title" data-toggle="tooltip" data-placement="top" title="" data-original-title="Click To Edit Setting">
                                    <button type="button" data-toggle="collapse" data-target="#collapseOne3" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-block campaign-line-height">
                                        <div class="m-0 p-0 card-header-title"><span class="font-size-lg text-capitalize campaigns-setting-title-target"><i class="pe-7s-users"></i> Who to show</span> <span class="campaigns-setting-label mr-2 badge badge-primary">Device: <strong>Mobile and desktop</strong></span>
                                            <span class="campaigns-setting-label mr-2 badge badge-primary">Campaign Signed Up:<strong>Any Campaign</strong></span>
                                        </div>
                                    </button>
                                </div>
                                <div data-parent="#accordion" id="collapseOne3" aria-labelledby="headingOne" class="collapse">
                                    <div class="card-body">
                                        <div class="mb-0">
                                            <div class="position-relative form-group">
                                                <label for="campaigns-type" class="text-bold">Device show</label>
                                                <select class="multiselect-dropdown form-control">
                                                    <option value="Mobile">Mobile</option>
                                                    <option value="Desktop">Desktop</option>
                                                    <option value="Mobile and desktop">Mobile and desktop</option>
                                                </select>
                                            </div>
                                            <div class="position-relative form-group">
                                                <label for="campaigns-type" class="text-bold">Campaign Signed Up</label>

                                                <select class="multiselect-dropdown form-control">
                                                    <option value="Any Campaign">Any Campaign</option>
                                                    <option value="Campaign welcome discount">Campaign welcome discount</option>
                                                    <option value="Campaign welcome discount 2">Campaign welcome discount 2</option>
                                                    <option value="Campaign welcome discount 3">Campaign welcome discount 3</option>
                                                    <option value="Welcome mobile">Welcome mobile</option>
                                                    <option value="Cart save 1">Cart save 1</option>
                                                    <option value="Croll Sell">Croll Sell </option>
                                                    <option value="Cart save 2">Cart save 2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div id="headingOne" class="card-header campaigns-setting-title" data-toggle="tooltip" data-placement="top" title="" data-original-title="Click To Edit Setting">
                                    <button type="button" data-toggle="collapse" data-target="#collapseOne4" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-block campaign-line-height">
                                        <div class="m-0 p-0 card-header-title"><span class="font-size-lg text-capitalize campaigns-setting-title-target"><i class="lnr-calendar-full"></i> How Long To Show</span> <span class="campaigns-setting-label mr-2 badge badge-primary">Signup create: <strong>Aug 30th at 5:51 AM EDT</strong> - <strong class="btn-outline-success disabled">Ongoing</strong></span>

                                        </div>
                                    </button>
                                </div>
                                <div data-parent="#accordion" id="collapseOne4" aria-labelledby="headingOne" class="collapse">
                                    <div class="card-body">
                                        <div class="mb-0">
                                            <div class="position-relative form-group">
                                                <label for="campaigns-type" class="text-bold">Signup Period</label>
                                                <select class="multiselect-dropdown form-control">
                                                    <option value="Ongoing">Ongoing</option>
                                                    <option value="Fixed">Fixed</option>
                                                </select>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div id="headingOne" class="card-header campaigns-setting-title" data-toggle="tooltip" data-placement="top" title="" data-original-title="Click To Edit Setting">
                                    <button type="button" data-toggle="collapse" data-target="#collapseOne5" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-block campaign-line-height">
                                        <div class="m-0 p-0 card-header-title"><span class="font-size-lg text-capitalize campaigns-setting-title-target"><i class="pe-7s-bell"></i> Notifications</span> <span class="campaigns-setting-label mr-2 badge badge-primary">Notifying to email: <strong>ngocninhcntt@gmail.com</strong></span>

                                        </div>
                                    </button>
                                </div>
                                <div data-parent="#accordion" id="collapseOne5" aria-labelledby="headingOne" class="collapse">
                                    <div class="card-body">
                                        <div class="mb-0">
                                            <div class="position-relative form-group">
                                                <label for="campaigns-type" class="text-bold">Email <i class="fa text-primary fa-info-circle text-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Get notified in real-time when people sign up for this campaign."></i></label>
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" id="exampleCustomCheckbox" class="custom-control-input">
                                                    <label class="custom-control-label" for="exampleCustomCheckbox">Send notifications to <strong class="text-link">ngocninhcntt@gmail.com</strong></label>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
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
    <!-- Modal stop campaign-->
    <div class="modal fade" id="stop-campaign"  tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Stop This Campaign</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">
                        Signups will stop and the campaign will no longer appear on your site. You can always reactivate a campaign later.
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
