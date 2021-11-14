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
            <a href="index.html"><div class="logo-src"></div></a>
            <div class="editor-newsletter-block-title">
                <div class="editor-newsletter-info" data-toggle="modal" data-target="#editor-newsletter-info-sent">
                    <div class="editor-newsletter-title">Email Template Name....</div> <span><i class="lnr-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Email Template Name"></i></span>
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
                    <button class="mr-2 btn btn-outline-secondary editor-sent-test-button editor-button"><i class="pe-7s-paper-plane"></i>Send Test Email</button>
                    <button class="mr-2 btn btn-secondary editor-template-button" data-toggle="modal" data-target="#show-template"><i class="ion-android-apps"></i> Templates</button>
                    <a href="{{route('eTemplate-home')}}"><button class="mr-2 btn btn-secondary save-button editor-button">Save</button></a>
                </div>
            </div>
        </div>
    </div>

    <!---------------------     End header section      --------------------->




    <div class="app-main">

        <!---------------------     Start main content  section     --------------------->
        <div class="app-main__outer email-builder-editor">
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
</body>
</html>
<!-- modal show template -->
<div class="modal fade" id="show-template"  tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl" role="document">
        <div class="modal-content" style="height: 95vh;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="ion-android-apps icon-gradient bg-mean-fruit"></i>Email Templates</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form type="" method="" id="addon-domain">
                <div class="modal-body">
                    <div class="mb-0">
                        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                            <li class="nav-item ">
                                <div class="d-inline-block dropdown">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-outline-primary active dropdown-toggle btn dev-tab-template-button">
                                        Ebolder Email Templates
                                    </button>
                                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu">
                                        <button type="button" tabindex="0" class="dropdown-item">All (16)</button>
                                        <button type="button" tabindex="0" class="dropdown-item">Shoes (3)</button>
                                        <button type="button" tabindex="0" class="dropdown-item">Foods (3)</button>
                                        <button type="button" tabindex="0" class="dropdown-item">Business (2)</button>
                                        <button type="button" tabindex="0" class="dropdown-item">Closthings (2)</button>
                                        <button type="button" tabindex="0" class="dropdown-item">Black Friday (2)</button>
                                        <button type="button" tabindex="0" class="dropdown-item">Customer Winback (2)</button>
                                        <button type="button" tabindex="0" class="dropdown-item">Newsletters (2)</button>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="dropdown d-inline-block">
                                    <button type="button" class="mb-2 mr-2 btn btn-dashed btn-outline-primary dev-tab-template-button">
                                        My Email Templates
                                    </button>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="dropdown d-inline-block">
                                    <button type="button" class="mb-2 mr-2 btn btn-dashed btn-outline-primary dev-tab-template-button">
                                        My Favorites Email Templates
                                    </button>
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
                        <!---------------------     End head content section     --------------------->
                        <!---------------------     Start main  section     --------------------->
                        <div class="tabs-animation modal-content-fix">
                            <!---------------------     Start content  section     --------------------->

                            <div class="row">
                                <!---------------------     Start template email  section     --------------------->


                                <div class="col-md-6 col-xl-3">
                                    <div class="mb-3 profile-responsive card email-template-main">
                                        <div class="template-item-thumbnail">
                                            <div class="dev-template-layout">
                                                <div class="template-thumbnail"><image class="" src="{{asset('images/template/shoe-email.jpg')}}"></div>
                                            </div>
                                            <div class="email-template-favorite">
                                                <button class="mr-2 btn border-0 btn-transition" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Favorites">
                                                    <i class="fa-heart fa btn-icon-wrapper"></i>
                                                </button>
                                            </div>
                                            <div class="email-template-action">
                                                <button class="mb-2 mr-2 btn btn-secondary">Preview</button>
                                                <button class="mb-2 mr-2 btn btn-primary" data-toggle="modal" data-target="#create-email-name">Insert</button>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-8 template-footer" style="padding-right:0px">
                                                    <span class="email-templates-name">Template name ...</span>

                                                </div>
                                                <div class="col-4 template-footer" style="padding-right:0px">
                                                    <div class="email-templates-view">
                                                        <i class="lnr-eye text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Total Template Views"></i> <span>100</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="mb-3 profile-responsive card email-template-main">
                                        <div class="template-item-thumbnail">
                                            <div class="dev-template-layout">
                                                <div class="template-thumbnail"><image class="" src="{{asset('images/template/shoe-email.jpg')}}"></div>
                                            </div>
                                            <div class="email-template-favorite">
                                                <button class="mr-2 btn border-0 btn-transition favorite-active" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove Favorites">
                                                    <i class="fa-heart fa btn-icon-wrapper"></i>
                                                </button>
                                            </div>
                                            <div class="email-template-action">
                                                <button class="mb-2 mr-2 btn btn-secondary">Preview</button>
                                                <button class="mb-2 mr-2 btn btn-primary" data-toggle="modal" data-target="#create-email-name">Insert</button>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-8 template-footer" style="padding-right:0px">
                                                    <span class="email-templates-name">Template name ...</span>

                                                </div>
                                                <div class="col-4 template-footer" style="padding-right:0px">
                                                    <div class="email-templates-view">
                                                        <i class="lnr-eye text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Total Template Views"></i> <span>100</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="mb-3 profile-responsive card email-template-main">
                                        <div class="template-item-thumbnail">
                                            <div class="dev-template-layout">
                                                <div class="template-thumbnail"><image class="" src="{{asset('images/template/shoe-email.jpg')}}"></div>
                                            </div>
                                            <div class="email-template-favorite">
                                                <button class="mr-2 btn border-0 btn-transition favorite-active" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove Favorites">
                                                    <i class="fa-heart fa btn-icon-wrapper"></i>
                                                </button>
                                            </div>
                                            <div class="email-template-action">
                                                <button class="mb-2 mr-2 btn btn-secondary">Preview</button>
                                                <button class="mb-2 mr-2 btn btn-primary" data-toggle="modal" data-target="#create-email-name">Insert</button>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-8 template-footer" style="padding-right:0px">
                                                    <span class="email-templates-name">Template name ...</span>

                                                </div>
                                                <div class="col-4 template-footer" style="padding-right:0px">
                                                    <div class="email-templates-view">
                                                        <i class="lnr-eye text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Total Template Views"></i> <span>100</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="mb-3 profile-responsive card email-template-main">
                                        <div class="template-item-thumbnail">
                                            <div class="dev-template-layout">
                                                <div class="template-thumbnail"><image class="" src="{{asset('images/template/shoe-email.jpg')}}"></div>
                                            </div>
                                            <div class="email-template-favorite">
                                                <button class="mr-2 btn border-0 btn-transition" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Favorites">
                                                    <i class="fa-heart fa btn-icon-wrapper"></i>
                                                </button>
                                            </div>
                                            <div class="email-template-action">
                                                <button class="mb-2 mr-2 btn btn-secondary">Preview</button>
                                                <button class="mb-2 mr-2 btn btn-primary" data-toggle="modal" data-target="#create-email-name">Insert</button>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-8 template-footer" style="padding-right:0px">
                                                    <span class="email-templates-name">Template name ...</span>

                                                </div>
                                                <div class="col-4 template-footer" style="padding-right:0px">
                                                    <div class="email-templates-view">
                                                        <i class="lnr-eye text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Total Template Views"></i> <span>100</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="mb-3 profile-responsive card email-template-main">
                                        <div class="template-item-thumbnail">
                                            <div class="dev-template-layout">
                                                <div class="template-thumbnail"><image class="" src="{{asset('images/template/shoe-email.jpg')}}"></div>
                                            </div>
                                            <div class="email-template-favorite">
                                                <button class="mr-2 btn border-0 btn-transition favorite-active" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove Favorites">
                                                    <i class="fa-heart fa btn-icon-wrapper"></i>
                                                </button>
                                            </div>
                                            <div class="email-template-action">
                                                <button class="mb-2 mr-2 btn btn-secondary">Preview</button>
                                                <button class="mb-2 mr-2 btn btn-primary" data-toggle="modal" data-target="#create-email-name">Insert</button>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-8 template-footer" style="padding-right:0px">
                                                    <span class="email-templates-name">Template name ...</span>

                                                </div>
                                                <div class="col-4 template-footer" style="padding-right:0px">
                                                    <div class="email-templates-view">
                                                        <i class="lnr-eye text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Total Template Views"></i> <span>100</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="mb-3 profile-responsive card email-template-main">
                                        <div class="template-item-thumbnail">
                                            <div class="dev-template-layout">
                                                <div class="template-thumbnail"><image class="" src="{{asset('images/template/shoe-email.jpg')}}"></div>
                                            </div>
                                            <div class="email-template-favorite">
                                                <button class="mr-2 btn border-0 btn-transition" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Favorites">
                                                    <i class="fa-heart fa btn-icon-wrapper"></i>
                                                </button>
                                            </div>
                                            <div class="email-template-action">
                                                <button class="mb-2 mr-2 btn btn-secondary">Preview</button>
                                                <button class="mb-2 mr-2 btn btn-primary" data-toggle="modal" data-target="#create-email-name">Insert</button>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-8 template-footer" style="padding-right:0px">
                                                    <span class="email-templates-name">Template name ...</span>

                                                </div>
                                                <div class="col-4 template-footer" style="padding-right:0px">
                                                    <div class="email-templates-view">
                                                        <i class="lnr-eye text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Total Template Views"></i> <span>100</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="mb-3 profile-responsive card email-template-main">
                                        <div class="template-item-thumbnail">
                                            <div class="dev-template-layout">
                                                <div class="template-thumbnail"><image class="" src="{{asset('images/template/shoe-email.jpg')}}"></div>
                                            </div>
                                            <div class="email-template-favorite">
                                                <button class="mr-2 btn border-0 btn-transition favorite-active" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove Favorites">
                                                    <i class="fa-heart fa btn-icon-wrapper"></i>
                                                </button>
                                            </div>
                                            <div class="email-template-action">
                                                <button class="mb-2 mr-2 btn btn-secondary">Preview</button>
                                                <button class="mb-2 mr-2 btn btn-primary" data-toggle="modal" data-target="#create-email-name">Insert</button>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-8 template-footer" style="padding-right:0px">
                                                    <span class="email-templates-name">Template name ...</span>

                                                </div>
                                                <div class="col-4 template-footer" style="padding-right:0px">
                                                    <div class="email-templates-view">
                                                        <i class="lnr-eye text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Total Template Views"></i> <span>100</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="mb-3 profile-responsive card email-template-main">
                                        <div class="template-item-thumbnail">
                                            <div class="dev-template-layout">
                                                <div class="template-thumbnail"><image class="" src="{{asset('images/template/shoe-email.jpg')}}"></div>
                                            </div>
                                            <div class="email-template-favorite">
                                                <button class="mr-2 btn border-0 btn-transition" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Favorites">
                                                    <i class="fa-heart fa btn-icon-wrapper"></i>
                                                </button>
                                            </div>
                                            <div class="email-template-action">
                                                <button class="mb-2 mr-2 btn btn-secondary">Preview</button>
                                                <button class="mb-2 mr-2 btn btn-primary" data-toggle="modal" data-target="#create-email-name">Insert</button>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-8 template-footer" style="padding-right:0px">
                                                    <span class="email-templates-name">Template name ...</span>

                                                </div>
                                                <div class="col-4 template-footer" style="padding-right:0px">
                                                    <div class="email-templates-view">
                                                        <i class="lnr-eye text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Total Template Views"></i> <span>100</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="mb-3 profile-responsive card email-template-main">
                                        <div class="template-item-thumbnail">
                                            <div class="dev-template-layout">
                                                <div class="template-thumbnail"><image class="" src="{{asset('images/template/shoe-email.jpg')}}"></div>
                                            </div>
                                            <div class="email-template-favorite">
                                                <button class="mr-2 btn border-0 btn-transition favorite-active" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove Favorites">
                                                    <i class="fa-heart fa btn-icon-wrapper"></i>
                                                </button>
                                            </div>
                                            <div class="email-template-action">
                                                <button class="mb-2 mr-2 btn btn-secondary">Preview</button>
                                                <button class="mb-2 mr-2 btn btn-primary" data-toggle="modal" data-target="#create-email-name">Insert</button>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-8 template-footer" style="padding-right:0px">
                                                    <span class="email-templates-name">Template name ...</span>

                                                </div>
                                                <div class="col-4 template-footer" style="padding-right:0px">
                                                    <div class="email-templates-view">
                                                        <i class="lnr-eye text-dark opacity-9 btn-icon-wrapper mb-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Total Template Views"></i> <span>100</span>
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
            </form>
        </div>
    </div>
</div>
<!-- Modal create Title and subject Email-->
<div class="modal fade" id="editor-newsletter-info-sent"  tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Email Template Name</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form type="" method="" id="addon-domain">
                <div class="modal-body">
                    <div class="mb-0">
                        <div class="position-relative form-group">
                            <label for="email-name" class="text-bold">Email Template Title</label>
                            <input type="text" class="form-control" id="email-name" name="Email Template Name" placeholder="Enter Email Template Name ..." value="Email Template Name">
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
