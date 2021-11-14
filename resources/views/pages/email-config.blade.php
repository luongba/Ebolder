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
                <div class="editor-newsletter-info" data-toggle="modal" data-target="#editor-newsletter-info-sent">
                    <div class="editor-newsletter-title">Customer Winback Title...</div> <span><i class="lnr-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Customer Winback Infomations"></i></span>
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
                    <button class="mr-2 btn btn-outline-primary editor-button editor-newsletter-back-button">Back</button>

                </div>
                <!---------------------     End Search  section     --------------------->
            </div>
            <div class="app-header-right">
                <div class="header-dots">
                    <button class="mr-2 btn btn-outline-danger editor-template-button delete-button"><i class="pe-7s-trash"></i> Delete</button>
                    <a href="{{route('winback-home')}}"><button class="mr-2 btn btn-secondary save-button editor-button">Save</button></a>
                    <a href="{{route('winback-home')}}"><button class="mr-2 btn btn-primary editor-sent-test-button editor-button">Active</button></a>
                </div>
            </div>
        </div>
    </div>

    <!---------------------     End header section      --------------------->




    <div class="app-main">

        <!---------------------     Start main content  section     --------------------->
        <div class="app-main__outer email-builder-editor">
            <div class="app-main__inner">
                <!---------------------     Start head content  section     --------------------->


                <!---------------------     End head content section     --------------------->
                <!---------------------     Start main  section     --------------------->
                <div class="tabs-animation">
                    <!---------------------     Start Editor builder email      --------------------->
                    <div class="row">
                        <div class="col-md-12 col-lg-6 col-xl-4">
                            <div class="mb-3 card">
                                <div class="card-header-tab card-header">
                                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                        <i class="header-icon pe-7s-timer bg-premium-dark icon-gradient"></i>
                                        Trigger settings
                                    </div>
                                </div>
                                <div class="card-body form-row">
                                    <div class="col-md-12">
                                        <label for="custom-contact"><strong>Mailable contacts that have <i class="fa text-primary fa-question-circle text-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="This section to help automatic send mail to customer not placed an order in days"></i></strong></label>
                                        <input placeholder="Enter Number days" type="text" class="mb-2 form-control" value="30">
                                    </div>
                                    <div class="col-md-12">
                                        We'll send an email after the amount of time above has passed since your customer's last order.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 card">
                                <div class="card-header-tab card-header">
                                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                        <i class="header-icon pe-7s-ticket bg-premium-dark icon-gradient"></i>
                                        Setting Coupon Offer
                                    </div>
                                </div>
                                <div class="card-body form-row">
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
                        <div class="col-md-12 col-lg-6 col-xl-8">
                            <div class="mb-3 card">
                                <div class="card-header-tab card-header">
                                    <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                        <i class="ion-android-apps header-icon mr-3 bg-premium-dark icon-gradient"></i>
                                        Email Template Preview
                                    </div>
                                    <div class="btn-actions-pane-right actions-icon-btn">
                                        <div class="btn-group dropdown">
                                            <button class="mr-2 btn btn-secondary edit-template-button"><i class="lnr-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Newsletter Email"></i> Edit Design</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
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
<script type="text/javascript" src="{{asset('vendors/smartwizard/dist/js/jquery.smartWizard.min.js')}}"></script>
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
<!-- custome.js -->
<script type="text/javascript" src="{{asset('/js/form-components/form-wizard.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/charts/apex-charts.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/circle-progress.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/demo.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/scrollbar.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/toastr.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/treeview.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/form-components/toggle-switch.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/tables.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/app.js')}}"></script>
</body>
</html>
<!-- Modal create Title and subject Email-->
<div class="modal fade" id="editor-newsletter-info-sent"  tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Customer Winback Infomations</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form type="" method="" id="addon-domain">
                <div class="modal-body">
                    <div class="mb-0">
                        <div class="position-relative form-group">
                            <label for="newsletter-title" class="text-bold">Customer Winback Title</label>
                            <input type="text" class="form-control" id="newsletter-title" name="Customer Winback Title" placeholder="Enter Customer Winback Title ..." value="Email Customer Winback Infomation">
                        </div>
                        <div class="position-relative form-group">
                            <label for="reply-email" class="text-bold">Reply To <i class="fa text-primary fa-question-circle text-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="This section to help customer can reply email to your email setup. "></i></label>
                            <input type="text" class="form-control" id="reply-email" name="reply email" placeholder="Enter Reply Email To" value="Offer@ebolder.com.vn" >
                        </div>
                        <div class="position-relative form-group">
                            <label for="subject-email" class="text-bold">Subject Email <i class="fa text-primary fa-question-circle text-secondary" data-toggle="tooltip" data-placement="top" title="" data-original-title="This is subject of email will send to customer "></i></label>
                            <input type="text" class="form-control" id="subject-email" name="subject email" placeholder="Enter Subject Email ..." value="Customer Winback Email" >
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
