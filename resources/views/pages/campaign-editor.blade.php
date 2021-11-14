<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Dashboard - Create your campaigns swiftly and win more sales.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="stylesheet" href="{{asset('/vendors/@fortawesome/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/vendors/ionicons-npm/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('/vendors/linearicons-master/dist/web-font/style.css')}}">
    <link rel="stylesheet" href="{{asset('/vendors/pixeden-stroke-7-icon-master/pe-icon-7-stroke/dist/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" href="{{asset('/styles/css/base.css')}}">
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    <!---------------------     Start header section section     --------------------->
    <div class="app-header header-shadow">
        <div class="app-header__logo editor-newsletter-head">
            <a href="{{route('home')}}"><div class="logo-src"></div></a>
            <div class="editor-newsletter-block-title">
                <div class="editor-newsletter-info" data-toggle="modal" data-target="#editor-campaign-name">
                    <div class="editor-newsletter-title">Campaign name can edit....</div> <span><i class="lnr-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Campaign Name"></i></span>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
        </div>
        <div class="app-header__content">
            <div class="app-header-left">
                <!---------------------     Start Search  section     --------------------->
                <div class="editor-newsletter-back">

                </div>
                <!---------------------     End Search  section     --------------------->
            </div>
            <div class="app-header-right">
                <div class="header-dots">
                    <button class="mr-2 btn btn-secondary editor-campaign-setting" data-toggle="modal" data-target="#show-campaign-setting"><i class="pe-7s-config"></i> Settings</button>
                    <button class="mr-2 btn btn-secondary editor-template-button" data-toggle="modal" data-target="#show-signup-template"><i class="ion-android-apps"></i> Templates</button>

                    <select class="multiselect-dropdown form-control">
                        <option value="Ongoing">DRAFT</option>
                        <option value="Fixed">LIVE</option>
                    </select>

                    <a href="{{route('campaign-home')}}"><button class="mr-2 btn btn-primary next-button editor-button">Publish</button></a>

                </div>
            </div>
        </div>
    </div>


    <!---------------------     End header section      --------------------->




    <div class="app-main">

        <!---------------------     Start main content  section     --------------------->
        <div class="app-main__outer email-builder-editor">
            <div class="campaigns-tab-step">
                <div class="col-md-12 col-lg-4">
                    <div class="campaigns-step">

                    </div>
                </div>
                <div class="col-md-12 col-lg-8">
                    <div class="campaigns-step">
                        <button class="mr-2 btn-icon btn-shadow btn-dashed btn btn-outline-primary">
                            <i class="pe-7s-display2 btn-icon-wrapper"></i>Signup Design
                        </button>
                        <i class=" pe-7s-angle-right campaigns-step-next"></i>
                        <button class="mr-2 btn-icon btn-shadow btn-dashed btn btn-outline-dark">
                            <i class="lnr-thumbs-up btn-icon-wrapper"></i> Success Design
                        </button>
                    </div>

                </div>
            </div>
            <div class="">
                <!---------------------     Start head content  section     --------------------->


                <!---------------------     End head content section     --------------------->
                <!---------------------     Start main  section     --------------------->
                <div class="tabs-animation">
                    <!---------------------     Insertor builder email      --------------------->
                    <div class="container-editor">
                        <script src="https://editor.unlayer.com/embed.js"></script>
                        <div id="editor" style="height: 90vh; width: 100%;"></div>
                        <script>
                            unlayer.init({
                                id: 'editor',
                                projectId: 33061,
                                templateId: 69858,




                            })
                            unlayer.setAppearance({
                                theme: 'light',
                                panels: {
                                    tools: {
                                        dock: 'left'
                                    }
                                }
                            });

                        </script>


                    </div>

                </div>
                <!---------------------     End main  content  section      --------------------->
            </div>
            <!---------------------     Start footer tab  section      --------------------->

            <!---------------------     End footer tab  section      --------------------->
        </div>
    </div>
</div>
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<!-- plugin dependencies -->
<script type="text/javascript" src="{{asset('/vendors/jquery/dist/jquery.min.js')}}"></script>

<script type="text/javascript" src="{{asset('/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/vendors/moment/moment.js')}}"></script>
<script type="text/javascript" src="{{asset('/vendors/metismenu/dist/metisMenu.js')}}"></script>
<script type="text/javascript" src="{{asset('/vendors/bootstrap4-toggle/js/bootstrap4-toggle.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/vendors/jquery-circle-progress/dist/circle-progress.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/vendors/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/vendors/toastr/build/toastr.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/vendors/jquery.fancytree/dist/jquery.fancytree-all-deps.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/vendors/apexcharts/dist/apexcharts.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/vendors/bootstrap-table/dist/bootstrap-table.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/vendors/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/vendors/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/vendors/select2/dist/js/select2.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/vendors/@chenfengyuan/datepicker/dist/datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/vendors/daterangepicker/daterangepicker.js')}}"></script>

<!-- custome.js -->

<script type="text/javascript" src="{{asset('/js/form-components/form-validation.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/form-components/datepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/form-components/input-select.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/charts/apex-charts.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/circle-progress.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/demo.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/jquery.multi-select.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/scrollbar.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/toastr.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/treeview.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/form-components/toggle-switch.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/tables.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/form-components/input-select.js')}}"></script>
<script type="text/javascript">
    $(function(){

        $('#campaigns-type').multiSelect({
            noneText: 'Campaigns Type',


        });
        $('#signups-display').multiSelect({
            noneText: 'Signups Display',

        });
        $('#device-display').multiSelect({
            noneText: 'Device Display',

        });
    });
</script>
</body>
</html>
<!-- modal show template -->
<div class="modal fade" id="show-signup-template"  tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl" role="document">
        <div class="modal-content" style="height: 95vh;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="ion-android-apps icon-gradient bg-mean-fruit"></i>Signup Form Templates</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form type="" method="" id="addon-domain">
                <div class="modal-body">
                    <div class="mb-0">
                        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav mb-3">
                            <li class="nav-item filter-campaign">
                                <div class="d-inline-block dropdown">
                                    <form class="campaigns-display-select">
                                        <select id="signups-display" name="signups display" multiple>
                                            <option value="Popup">Popup</option>
                                            <option value="Flyout">Flyout</option>
                                            <option value="Banner">Banner</option>
                                        </select>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item filter-campaign">
                                <div class="d-inline-block dropdown">
                                    <form class="campaigns-type-select">
                                        <select id="device-display" name="device display" multiple>
                                            <option value="Desktop & Mobile">Desktop & Mobile</option>
                                            <option value="Desktop Only">Desktop Only</option>
                                            <option value="Mobile Only">Mobile Only</option>
                                        </select>
                                    </form>
                                </div>
                            </li>

                            <li class="nav-item" style="float: right; position: absolute; right: 10px;">
                                <div class="search-wrapper active m-0" style="width: 300px;">
                                    <div class="input-holder dev-search border border-light">
                                        <input type="text" class="search-input" placeholder="Search Ebolder Templates ...">
                                        <button class="search-icon" style="background: rgb(212 218 222);">
                                            <span></span>
                                        </button>
                                    </div>
                                </div>
                            </li>

                        </ul>
                        <!---------------------     Start tab filter campaigns section     --------------------->

                        <!---------------------     Start list campaigns section     --------------------->
                        <div class="tabs-animation modal-content-fix">
                            <div class="row">
                                <!---------------------     Start item campaign single active    --------------------->


                                <div class="col-md-6 col-xl-4">
                                    <div class="mb-3 profile-responsive card email-template-main">
                                        <div class="template-item-thumbnail template-signup">
                                            <div class="dev-template-layout">
                                                <div class="template-thumbnail"><image class="" src="{{asset('images/signup-templates/discount-popup.png')}}"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-12 template-footer">
                                                    <span class="signup-templates-name">Welcome discount popup desktop...</span>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="signup-template-type">Popup</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!---------------------     End item campaign single     --------------------->
                                <!---------------------     start item campaign single     --------------------->
                                <div class="col-md-6 col-xl-4">
                                    <div class="mb-3 profile-responsive card email-template-main">
                                        <div class="template-item-thumbnail template-signup">
                                            <div class="dev-template-layout">
                                                <div class="template-thumbnail"><image class="" src="{{asset('images/signup-templates/discount-flyout.png')}}"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-12 template-footer">
                                                    <span class="signup-templates-name">Welcome discount popup desktop...</span>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="signup-template-type">Flyout</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <div class="mb-3 profile-responsive card email-template-main">
                                        <div class="template-item-thumbnail template-signup">
                                            <div class="dev-template-layout">
                                                <div class="template-thumbnail"><image class="" src="{{asset('images/signup-templates/discount-popup.png')}}"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-12 template-footer">
                                                    <span class="signup-templates-name">Welcome discount popup desktop...</span>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="signup-template-type">Popup</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!---------------------     End item campaign single     --------------------->
                                <!---------------------     start item campaign single     --------------------->
                                <div class="col-md-6 col-xl-4">
                                    <div class="mb-3 profile-responsive card email-template-main">
                                        <div class="template-item-thumbnail template-signup">
                                            <div class="dev-template-layout">
                                                <div class="template-thumbnail"><image class="" src="{{asset('images/signup-templates/discount-flyout.png')}}"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-12 template-footer">
                                                    <span class="signup-templates-name">Welcome discount popup desktop...</span>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="signup-template-type">Flyout</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <div class="mb-3 profile-responsive card email-template-main">
                                        <div class="template-item-thumbnail template-signup">
                                            <div class="dev-template-layout">
                                                <div class="template-thumbnail"><image class="" src="{{asset('images/signup-templates/discount-flyout.png')}}"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-12 template-footer">
                                                    <span class="signup-templates-name">Welcome discount popup desktop...</span>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="signup-template-type">Flyout</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <div class="mb-3 profile-responsive card email-template-main">
                                        <div class="template-item-thumbnail template-signup">
                                            <div class="dev-template-layout">
                                                <div class="template-thumbnail"><image class="" src="{{asset('images/signup-templates/discount-flyout.png')}}"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-12 template-footer">
                                                    <span class="signup-templates-name">Welcome discount popup desktop...</span>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="signup-template-type">Flyout</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <div class="mb-3 profile-responsive card email-template-main">
                                        <div class="template-item-thumbnail template-signup">
                                            <div class="dev-template-layout">
                                                <div class="template-thumbnail"><image class="" src="{{asset('images/signup-templates/discount-flyout.png')}}"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-12 template-footer">
                                                    <span class="signup-templates-name">Welcome discount popup desktop...</span>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="signup-template-type">Flyout</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4">
                                    <div class="mb-3 profile-responsive card email-template-main">
                                        <div class="template-item-thumbnail template-signup">
                                            <div class="dev-template-layout">
                                                <div class="template-thumbnail"><image class="" src="{{asset('images/signup-templates/discount-flyout.png')}}"></div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-12 template-footer">
                                                    <span class="signup-templates-name">Welcome discount popup desktop...</span>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <span class="signup-template-type">Flyout</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
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

