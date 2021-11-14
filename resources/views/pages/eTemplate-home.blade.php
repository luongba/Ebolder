@extends('welcome')
@section('content')
    <div class="app-main__inner">
        <!---------------------     Start head content  section     --------------------->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-paper-plane lnr icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        Email Templates
                        <div class="page-title-subheading">Create your Email templates in drag drop tool with EBOLDER.</div>
                    </div>
                </div>

            </div>
        </div>
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
                    <a href="{{route('eTemplate-favorite')}}"><button type="button" class="mb-2 mr-2 btn btn-dashed btn-outline-primary dev-tab-template-button">
                            My Favorites Email Templates
                        </button></a>
                </div>
            </li>

            <li class="nav-item" style="float: right; position: absolute; right: 10px;">
                <div class="search-wrapper active" style="width: 300px;">
                    <div class="input-holder dev-search">
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
        <div class="tabs-animation">
            <!---------------------     Start content  section     --------------------->

            <div class="row">
                <!---------------------     Start template email  section     --------------------->
                <div class="col-md-6 col-xl-3">
                    <div class="mb-3 profile-responsive card email-template-main">
                        <div class="template-item-thumbnail" data-toggle="modal" data-target="#create-email-name">
                            <div class="dev-template-layout">
                                <div class="template-thumbnail-create"></div>
                            </div>

                            <div class="email-template-create">
                                <i class="text-primary pe-7s-plus text-secondary"></i>
                                <p>Create New Template</p>
                            </div>

                        </div>



                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="mb-3 profile-responsive card email-template-main">
                        <div class="template-item-thumbnail">
                            <div class="dev-template-layout">
                                <div class="template-thumbnail"><img class="" src="images/template/shoe-email.jpg"></div>
                            </div>
                            <div class="email-template-favorite">
                                <button class="mr-2 btn border-0 btn-transition" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Favorites">
                                    <i class="fa-heart fa btn-icon-wrapper"></i>
                                </button>
                            </div>
                            <div class="email-template-action">
                                <button class="mb-2 mr-2 btn btn-secondary">Preview</button>
                                <button class="mb-2 mr-2 btn btn-primary" data-toggle="modal" data-target="#create-email-name">Start Edit</button>
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
                                <div class="template-thumbnail"><img class="" src="images/template/shoe-email.jpg"></div>
                            </div>
                            <div class="email-template-favorite">
                                <button class="mr-2 btn border-0 btn-transition favorite-active" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove Favorites">
                                    <i class="fa-heart fa btn-icon-wrapper"></i>
                                </button>
                            </div>
                            <div class="email-template-action">
                                <button class="mb-2 mr-2 btn btn-secondary">Preview</button>
                                <button class="mb-2 mr-2 btn btn-primary" data-toggle="modal" data-target="#create-email-name">Start Edit</button>
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
                                <div class="template-thumbnail"><img class="" src="images/template/shoe-email.jpg"></div>
                            </div>
                            <div class="email-template-favorite">
                                <button class="mr-2 btn border-0 btn-transition" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Favorites">
                                    <i class="fa-heart fa btn-icon-wrapper"></i>
                                </button>
                            </div>
                            <div class="email-template-action">
                                <button class="mb-2 mr-2 btn btn-secondary">Preview</button>
                                <button class="mb-2 mr-2 btn btn-primary" data-toggle="modal" data-target="#create-email-name">Start Edit</button>
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
                                <div class="template-thumbnail"><img class="" src="images/template/shoe-email.jpg"></div>
                            </div>
                            <div class="email-template-favorite">
                                <button class="mr-2 btn border-0 btn-transition favorite-active" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove Favorites">
                                    <i class="fa-heart fa btn-icon-wrapper"></i>
                                </button>
                            </div>
                            <div class="email-template-action">
                                <button class="mb-2 mr-2 btn btn-secondary">Preview</button>
                                <button class="mb-2 mr-2 btn btn-primary" data-toggle="modal" data-target="#create-email-name">Start Edit</button>
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
                                <div class="template-thumbnail"><img class="" src="images/template/shoe-email.jpg"></div>
                            </div>
                            <div class="email-template-favorite">
                                <button class="mr-2 btn border-0 btn-transition" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Favorites">
                                    <i class="fa-heart fa btn-icon-wrapper"></i>
                                </button>
                            </div>
                            <div class="email-template-action">
                                <button class="mb-2 mr-2 btn btn-secondary">Preview</button>
                                <button class="mb-2 mr-2 btn btn-primary" data-toggle="modal" data-target="#create-email-name">Start Edit</button>
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
                                <div class="template-thumbnail"><img class="" src="images/template/shoe-email.jpg"></div>
                            </div>
                            <div class="email-template-favorite">
                                <button class="mr-2 btn border-0 btn-transition favorite-active" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove Favorites">
                                    <i class="fa-heart fa btn-icon-wrapper"></i>
                                </button>
                            </div>
                            <div class="email-template-action">
                                <button class="mb-2 mr-2 btn btn-secondary">Preview</button>
                                <button class="mb-2 mr-2 btn btn-primary" data-toggle="modal" data-target="#create-email-name">Start Edit</button>
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
                                <div class="template-thumbnail"><img class="" src="images/template/shoe-email.jpg"></div>
                            </div>
                            <div class="email-template-favorite">
                                <button class="mr-2 btn border-0 btn-transition" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add To Favorites">
                                    <i class="fa-heart fa btn-icon-wrapper"></i>
                                </button>
                            </div>
                            <div class="email-template-action">
                                <button class="mb-2 mr-2 btn btn-secondary">Preview</button>
                                <button class="mb-2 mr-2 btn btn-primary" data-toggle="modal" data-target="#create-email-name">Start Edit</button>
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
                                <div class="template-thumbnail"><img class="" src="images/template/shoe-email.jpg"></div>
                            </div>
                            <div class="email-template-favorite">
                                <button class="mr-2 btn border-0 btn-transition favorite-active" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remove Favorites">
                                    <i class="fa-heart fa btn-icon-wrapper"></i>
                                </button>
                            </div>
                            <div class="email-template-action">
                                <button class="mb-2 mr-2 btn btn-secondary">Preview</button>
                                <button class="mb-2 mr-2 btn btn-primary" data-toggle="modal" data-target="#create-email-name">Start Edit</button>
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
        <!---------------------     End main  content  section      --------------------->
    </div>
@endsection
@section('modal')
    <div class="modal fade" id="create-email-name"  tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New Email Template</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form type="" method="" id="addon-domain">
                    <div class="modal-body">
                        <div class="mb-0">
                            <div class="position-relative form-group">
                                <label for="template-title" class="text-bold">Template Name</label>
                                <input type="text" class="form-control" id="template-title" name="Template Title" placeholder="Enter Template Title ..." value="">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <a href="{{route('eTemplate-editor')}}"><button type="button" class="btn btn-primary">Create</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
