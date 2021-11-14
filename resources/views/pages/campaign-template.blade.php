@extends('welcome')
@section('content')
    <div class="app-main__inner">
        <!---------------------     Start head content  section     --------------------->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="lnr-bullhorn lnr icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        Choose Signup Templates
                        <div class="page-title-subheading">Start with your Signup Templates swiftly and win more sales with Ebolder!.</div>
                    </div>
                </div>

            </div>
        </div>
        <!---------------------     End head content section     --------------------->
        <!---------------------     Start main  section     --------------------->
        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">

            <li class="nav-item filter-campaign">
                <div class="d-inline-block dropdown">
                    <form class="campaigns-type-select">
                        <select id="campaigns-type" name="campaigns type" multiple="" style="display: none;">
                            <option value="Welcome Discount">Welcome Discount</option>
                            <option value="Welcome Discount">Mobile Signups Discount</option>
                            <option value="Cart Saver">Cart Saver</option>
                            <option value="Cross Sell">Cross Sell</option>
                            <option value="Free Shipping Bar">Free Shipping Bar</option>
                        </select><div class="multi-select-container"><span class="multi-select-button" role="button" aria-haspopup="true" tabindex="0" aria-label="Choose A Campaigns Type ">Campaigns Type</span><div class="multi-select-menu" role="menu" style="width: auto;"><div class="multi-select-menuitems"><label class="multi-select-menuitem" for="campaigns type_0" role="menuitem"><input type="checkbox" id="campaigns type_0" value="Welcome Discount"> Welcome Discount</label><label class="multi-select-menuitem" for="campaigns type_1" role="menuitem"><input type="checkbox" id="campaigns type_1" value="Welcome Discount"> Mobile Signups Discount</label><label class="multi-select-menuitem" for="campaigns type_2" role="menuitem"><input type="checkbox" id="campaigns type_2" value="Cart Saver"> Cart Saver</label><label class="multi-select-menuitem" for="campaigns type_3" role="menuitem"><input type="checkbox" id="campaigns type_3" value="Cross Sell"> Cross Sell</label><label class="multi-select-menuitem" for="campaigns type_4" role="menuitem"><input type="checkbox" id="campaigns type_4" value="Free Shipping Bar"> Free Shipping Bar</label></div></div></div>
                    </form>
                </div>
            </li>
            <li class="nav-item filter-campaign">
                <div class="d-inline-block dropdown">
                    <form class="campaigns-display-select">
                        <select id="signups-display" name="signups display" multiple="" style="display: none;">
                            <option value="Popup">Popup</option>
                            <option value="Flyout">Flyout</option>
                            <option value="Banner">Banner</option>
                        </select><div class="multi-select-container"><span class="multi-select-button" role="button" aria-haspopup="true" tabindex="0" aria-label="">Signups Display</span><div class="multi-select-menu" role="menu" style="width: auto;"><div class="multi-select-menuitems"><label class="multi-select-menuitem" for="signups display_0" role="menuitem"><input type="checkbox" id="signups display_0" value="Popup"> Popup</label><label class="multi-select-menuitem" for="signups display_1" role="menuitem"><input type="checkbox" id="signups display_1" value="Flyout"> Flyout</label><label class="multi-select-menuitem" for="signups display_2" role="menuitem"><input type="checkbox" id="signups display_2" value="Banner"> Banner</label></div></div></div>
                    </form>
                </div>
            </li>
            <li class="nav-item filter-campaign">
                <div class="d-inline-block dropdown">
                    <form class="campaigns-type-select">
                        <select id="device-display" name="device display" multiple="" style="display: none;">
                            <option value="Desktop &amp; Mobile">Desktop &amp; Mobile</option>
                            <option value="Desktop Only">Desktop Only</option>
                            <option value="Mobile Only">Mobile Only</option>
                        </select><div class="multi-select-container"><span class="multi-select-button" role="button" aria-haspopup="true" tabindex="0" aria-label="">Device Display</span><div class="multi-select-menu" role="menu" style="width: auto;"><div class="multi-select-menuitems"><label class="multi-select-menuitem" for="device display_0" role="menuitem"><input type="checkbox" id="device display_0" value="Desktop &amp; Mobile"> Desktop &amp; Mobile</label><label class="multi-select-menuitem" for="device display_1" role="menuitem"><input type="checkbox" id="device display_1" value="Desktop Only"> Desktop Only</label><label class="multi-select-menuitem" for="device display_2" role="menuitem"><input type="checkbox" id="device display_2" value="Mobile Only"> Mobile Only</label></div></div></div>
                    </form>
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
        <!---------------------     Start tab filter campaigns section     --------------------->

        <!---------------------     Start list campaigns section     --------------------->
        <div class="row">
            <!---------------------     Start item campaign single active    --------------------->
            <div class="col-md-6 col-xl-4">
                <div class="mb-3 profile-responsive card email-template-main" data-toggle="modal" data-target="#create-new-signup-template">
                    <div class="template-item-thumbnail">
                        <div class="dev-template-layout">
                            <div class="signup-template-thumbnail-create"></div>
                        </div>

                        <div class="email-template-create">
                            <i class="text-primary pe-7s-plus text-secondary"></i>
                            <p>Create New Template</p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="mb-3 profile-responsive card email-template-main" data-toggle="modal" data-target=".bd-example-modal-lg">
                    <div class="template-item-thumbnail template-signup">
                        <div class="dev-template-layout">
                            <div class="template-thumbnail"><img class="" src="{{asset('images/signup-templates/discount-popup.png')}}"></div>
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
                <div class="mb-3 profile-responsive card email-template-main" data-toggle="modal" data-target=".bd-example-modal-lg">
                    <div class="template-item-thumbnail template-signup">
                        <div class="dev-template-layout">
                            <div class="template-thumbnail"><img class="" src="{{asset('images/signup-templates/discount-flyout.png')}}"></div>
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
                <div class="mb-3 profile-responsive card email-template-main" data-toggle="modal" data-target=".bd-example-modal-lg">
                    <div class="template-item-thumbnail template-signup">
                        <div class="dev-template-layout">
                            <div class="template-thumbnail"><img class="" src="{{asset('images/signup-templates/discount-popup.png')}}"></div>
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
                <div class="mb-3 profile-responsive card email-template-main" data-toggle="modal" data-target=".bd-example-modal-lg">
                    <div class="template-item-thumbnail template-signup">
                        <div class="dev-template-layout">
                            <div class="template-thumbnail"><img class="" src="{{asset('images/signup-templates/discount-flyout.png')}}"></div>
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
        <!---------------------     End main  content  section      --------------------->
    </div>
@endsection
@section('modal')
    <div class="modal fade" id="create-new-signup-template"  tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New Campaign</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form type="" method="" id="addon-domain">
                    <div class="modal-body">
                        <div class="mb-0">
                            <div class="position-relative form-group">
                                <label for="campaign-name" class="text-bold">Campaign Name</label>
                                <input type="text" class="form-control" id="campaign-name" name="campaign name" value="" placeholder="e.g. Welcome Discount">

                            </div>
                            <div class="position-relative form-group">
                                <label for="campaigns-type" class="text-bold">Choose A Campaigns Type </label>
                                <select class="multiselect-dropdown form-control">
                                    <option value="Welcome Discount">Welcome Discount</option>
                                    <option value="Welcome Discount">Mobile Signups Discount</option>
                                    <option value="Cart Saver">Cart Saver</option>
                                    <option value="Cross Sell">Cross Sell</option>
                                    <option value="Free Shipping Bar">Free Shipping Bar</option>
                                </select>
                            </div>
                            <div class="position-relative form-group">
                                <label for="campaigns-type" class="text-bold">Choose A Signups Display </label>
                                <select class="multiselect-dropdown form-control">
                                    <option value="Popup">Popup</option>
                                    <option value="Flyout">Flyout</option>
                                    <option value="Banner">Banner</option>
                                </select>
                            </div>
                            <div class="position-relative form-group">
                                <label for="campaigns-type" class="text-bold">Select Coupon</label>
                                <select class="multiselect-dropdown form-control">
                                    <option value="Popup">No Coupon Selected</option>
                                    <option value="Popup">Off 20%</option>
                                    <option value="Flyout">Off 50%</option>
                                    <option value="Banner">Off 30%</option>
                                </select>
                            </div>
                        </div>

                    </div>

                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a href="{{route('campaign-editor')}}"><button type="" class="btn btn-primary" name="signup" value="Sign up">Save And Create Campaign</button></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Start current design signup form -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Welcome discount popup desktop</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form type="" method="" id="campaign-create">
                    <div class="campaign-modal-body row">
                        <div class="col-md-12 col-lg-6 col-xl-5">
                            <div class="position-relative form-group">
                                <label for="campaign-name" class="text-bold">Campaign Name</label>
                                <input type="text" class="form-control" id="campaign-name" name="campaign name" value="Welcome discount popup desktop" placeholder="e.g. Welcome Discount">

                            </div>
                            <div class="position-relative form-group">
                                <label for="campaigns-type" class="text-bold">Select Coupon</label>
                                <select class="multiselect-dropdown form-control">
                                    <option value="Popup">No Coupon Selected</option>
                                    <option value="Popup">Off 20%</option>
                                    <option value="Flyout">Off 50%</option>
                                    <option value="Banner">Off 30%</option>
                                </select>
                            </div>
                            <div class="position-relative form-group">
                                <label for="campaign-name" class="text-bold signup-display">Campaigns Type</label>
                                <div class="badge badge-pill pl-2 pr-2 badge-primary">Welcome Discount</div>
                            </div>
                            <div class="position-relative form-group">
                                <label for="campaign-name" class="text-bold signup-display">Signups Form Display</label>
                                <div class="badge badge-pill pl-2 pr-2 badge-success">Popup</div>
                                <div class="badge badge-pill pl-2 pr-2 badge-primary">Desktop and Mobile</div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-7">
                            <div class="template-item-thumbnail modal-template-signup">
                                <div class="dev-template-layout">
                                    <div class="template-thumbnail"><img class="" src="{{asset('images/signup-templates/discount-popup.png')}}"/></div>
                                </div>
                            </div>

                        </div>

                    </div>

                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a href="{{route('campaign-editor')}}"><button type="submit" class="btn btn-primary" name="signup" value="">Create Campaign</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
