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
                        Create New Coupon
                        <div class="page-title-subheading">Create coupon swiftly and win more sales with Ebolder!.</div>
                    </div>
                </div>

            </div>
        </div>
        <!---------------------     End head content section     --------------------->
        <!---------------------     Start main  section     --------------------->
        <div class="tabs-animation">
            <!---------------------     Start content  section     --------------------->
{{--            Sau chuyen thanh form--}}
            <div class="" id="signupForm"  action="" novalidate="novalidate">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-header-tab card-header">
                                <div class="card-header-title">
                                    <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"></i>
                                    Coupon title and type
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="position-relative form-group">
                                            <label for="coupon-title">Title</label>
                                            <input type="text" class="form-control" id="coupon-title" name="coupon title" value="" placeholder="Title for this discount rule">
                                        </div>
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="coupon-source">Coupon Source<i class="text-primary pe-7s-info text-secondary" style="font-weight: bold;padding-left:0.5rem;" data-toggle="tooltip" data-placement="top" title="" data-original-title="Create coupon codes that sync with your website source"></i></label>
                                            <select class="multiselect-dropdown form-control select2-hidden-accessible" id="coupon-source" data-select2-id="coupon-source" tabindex="-1" aria-hidden="true">
                                                <option value="Shopify" data-select2-id="2">Shopify</option>
                                                <option value="Other">Other</option>
                                            </select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="1" style="width: 492px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-coupon-source-container"><span class="select2-selection__rendered" id="select2-coupon-source-container" role="textbox" aria-readonly="true" title="Shopify">Shopify</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="coupon-type">Coupon Type<i class="text-primary pe-7s-info text-secondary" style="font-weight: bold;padding-left:0.5rem;" data-toggle="tooltip" data-placement="top" title="" data-original-title="You can choose type of coupon to be usse"></i></label>
                                            <select class="multiselect-dropdown form-control select2-hidden-accessible" id="coupon-type" data-select2-id="coupon-type" tabindex="-1" aria-hidden="true">
                                                <option value="Master Coupon" data-select2-id="4">Master Coupon</option>
                                                <option value="Unique Coupon">Unique Coupon</option>
                                            </select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="3" style="width: 492px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-coupon-type-container"><span class="select2-selection__rendered" id="select2-coupon-type-container" role="textbox" aria-readonly="true" title="Master Coupon">Master Coupon</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-header-tab card-header">
                                <div class="card-header-title">
                                    <i class="header-icon pe-7s-config icon-gradient bg-tempting-azure"></i>
                                    Configure discount rules
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-3">
                                        <div class="position-relative form-group">
                                            <label for="coupon-code">Coupon Code</label>
                                            <input type="text" class="form-control" id="coupon-code" name="coupon title" value="" placeholder="Enter coupon code here">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="position-relative form-group">
                                            <label for="discount-type">Discount type</label>
                                            <select class="multiselect-dropdown form-control select2-hidden-accessible" id="discount-type" data-select2-id="discount-type" tabindex="-1" aria-hidden="true">
                                                <option value="Master Coupon" data-select2-id="6">Fixed amount</option>
                                                <option value="Unique Coupon">Percentage</option>
                                                <option value="Unique Coupon">Free Shipping</option>
                                            </select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="5" style="width: 241px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-discount-type-container"><span class="select2-selection__rendered" id="select2-discount-type-container" role="textbox" aria-readonly="true" title="Fixed amount">Fixed amount</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="position-relative form-group">
                                            <label for="discount-cal">Calculated on<i class="text-primary pe-7s-info text-secondary" style="font-weight: bold;padding-left:0.5rem;" data-toggle="tooltip" data-placement="top" title="" data-original-title="You can choose type of coupon to be usse"></i></label>
                                            <select class="multiselect-dropdown form-control select2-hidden-accessible" id="discount-cal" data-select2-id="discount-cal" tabindex="-1" aria-hidden="true">
                                                <option value="Master Coupon" data-select2-id="8">Entire Order</option>
                                                <option value="Unique Coupon">Each Product</option>
                                            </select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="7" style="width: 241px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-discount-cal-container"><span class="select2-selection__rendered" id="select2-discount-cal-container" role="textbox" aria-readonly="true" title="Entire Order">Entire Order</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="position-relative form-group">
                                            <label for="discount-val">Discount value</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-dollar-sign"></i>
                                                    </div>
                                                </div>
                                                <input class="form-control input-mask-trigger" id="discount-val" type="text" name="coupon title" value="" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'" im-insert="true" style="text-align: right;" inputmode="numeric">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="position-relative form-check" style=" padding-top:15px; padding-bottom: 15px;">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                                Discount requires a minimum purchase amount
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">

                                            <div class="input-group" style="padding-top:15px">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-dollar-sign"></i>
                                                    </div>
                                                </div>
                                                <input class="form-control input-mask-trigger" type="text" id="coupon-code" name="coupon title" value="" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'" im-insert="true" style="text-align: right;" inputmode="numeric">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="discount-apply">Applies To<i class="text-primary pe-7s-info text-secondary" style="font-weight: bold;padding-left:0.5rem;" data-toggle="tooltip" data-placement="top" title="" data-original-title="You can use Coupon code to the all product or Specific Collections"></i></label>
                                            <select class="multiselect-dropdown form-control select2-hidden-accessible" id="discount-apply" data-select2-id="discount-apply" tabindex="-1" aria-hidden="true">
                                                <option value="All Products" data-select2-id="10">All Products</option>
                                                <option value="Specific Collections...">Specific Collections...</option>
                                            </select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="9" style="width: 492px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-discount-apply-container"><span class="select2-selection__rendered" id="select2-discount-apply-container" role="textbox" aria-readonly="true" title="All Products">All Products</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="coupon-collections">Collections<i class="text-primary pe-7s-info text-secondary" style="font-weight: bold;padding-left:0.5rem;" data-toggle="tooltip" data-placement="top" title="" data-original-title="You can choose Collections to add discount. "></i></label>
                                            <select class="multiselect-dropdown form-control select2-hidden-accessible" id="coupon-collections" data-select2-id="coupon-collections" tabindex="-1" aria-hidden="true">
                                                <option value="Master Coupon" data-select2-id="12">Collections 1</option>
                                                <option value="Unique Coupon">Collections 2</option>
                                                <option value="Unique Coupon">Collections 3</option>
                                            </select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="11" style="width: 492px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-coupon-collections-container"><span class="select2-selection__rendered" id="select2-coupon-collections-container" role="textbox" aria-readonly="true" title="Collections 1">Collections 1</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-header-tab card-header">
                                <div class="card-header-title">
                                    <i class="header-icon lnr-calendar-full icon-gradient bg-tempting-azure"></i>
                                    Setting a schedule
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="coupon-start-date"> Date Start</label>
                                            <input type="text" class="form-control" id="coupon-start-date" data-toggle="datepicker">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="coupon-time-start">Time Start</label>
                                            <select class="multiselect-dropdown form-control select2-hidden-accessible" id="coupon-time-start" data-select2-id="coupon-time-start" tabindex="-1" aria-hidden="true">
                                                <option value="Master Coupon" data-select2-id="14">12:00 AM</option>
                                                <option value="Unique Coupon">12:30 AM</option>
                                                <option value="Unique Coupon">1:00 AM</option>
                                                <option value="Master Coupon">1:30 AM</option>
                                                <option value="Unique Coupon">2:00 AM</option>
                                                <option value="Unique Coupon">2:30 AM</option>
                                                <option value="Master Coupon">3:00 AM</option>
                                                <option value="Unique Coupon">3:30 AM</option>
                                                <option value="Unique Coupon">4:00 AM</option>
                                                <option value="Master Coupon">4:30 AM</option>
                                                <option value="Unique Coupon">5:00 AM</option>
                                                <option value="Unique Coupon">5:30 AM</option>
                                                <option value="Master Coupon">6:00 AM</option>
                                                <option value="Unique Coupon">6:30 AM</option>
                                                <option value="Unique Coupon">7:00 AM</option>
                                                <option value="Master Coupon">7:30 AM</option>
                                                <option value="Unique Coupon">8:00 AM</option>
                                                <option value="Unique Coupon">8:30 AM</option>
                                                <option value="Unique Coupon">9:00 AM</option>
                                                <option value="Master Coupon">9:30 AM</option>
                                                <option value="Unique Coupon">10:00 AM</option>
                                                <option value="Unique Coupon">10:30 AM</option>
                                                <option value="Master Coupon">11:00 AM</option>
                                                <option value="Unique Coupon">11:30 AM</option>
                                                <option value="Unique Coupon">12:00 PM</option>
                                                <option value="Master Coupon">12:30 PM</option>
                                                <option value="Unique Coupon">13:00 PM</option>
                                                <option value="Unique Coupon">13:30 PM</option>
                                                <option value="Master Coupon">14:00 PM</option>
                                                <option value="Unique Coupon">14:30 PM</option>
                                                <option value="Unique Coupon">15:00 PM</option>
                                                <option value="Master Coupon">15:30 PM</option>
                                                <option value="Unique Coupon">16:00 PM</option>
                                                <option value="Unique Coupon">16:30 PM</option>
                                                <option value="Unique Coupon">17:00 PM</option>
                                                <option value="Master Coupon">17:30 PM</option>
                                                <option value="Unique Coupon">18:00 PM</option>
                                                <option value="Unique Coupon">18:30 PM</option>
                                                <option value="Master Coupon">19:00 PM</option>
                                                <option value="Unique Coupon">19:30 PM</option>
                                                <option value="Unique Coupon">20:00 PM</option>
                                                <option value="Master Coupon">20:30 PM</option>
                                                <option value="Unique Coupon">21:00 PM</option>
                                                <option value="Unique Coupon">21:30 PM</option>
                                                <option value="Unique Coupon">22:00 PM</option>
                                                <option value="Master Coupon">22:30 PM</option>
                                                <option value="Unique Coupon">23:00 PM</option>
                                                <option value="Unique Coupon">23:30 PM</option>
                                            </select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="13" style="width: 492px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-coupon-time-start-container"><span class="select2-selection__rendered" id="select2-coupon-time-start-container" role="textbox" aria-readonly="true" title="12:00 AM">12:00 AM</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <div class="position-relative form-check" style=" padding-top:15px; padding-bottom: 15px;">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                                Coupon code has expiration date.
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="coupon-date-end">Date End </label>
                                            <input type="text" class="form-control" data-toggle="datepicker" id="coupon-date-end">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="coupon-time-end">Time End </label>
                                            <select class="multiselect-dropdown form-control select2-hidden-accessible" id="coupon-time-end" data-select2-id="coupon-time-end" tabindex="-1" aria-hidden="true">
                                                <option value="Master Coupon" data-select2-id="16">12:00 AM</option>
                                                <option value="Unique Coupon">12:30 AM</option>
                                                <option value="Unique Coupon">1:00 AM</option>
                                                <option value="Master Coupon">1:30 AM</option>
                                                <option value="Unique Coupon">2:00 AM</option>
                                                <option value="Unique Coupon">2:30 AM</option>
                                                <option value="Master Coupon">3:00 AM</option>
                                                <option value="Unique Coupon">3:30 AM</option>
                                                <option value="Unique Coupon">4:00 AM</option>
                                                <option value="Master Coupon">4:30 AM</option>
                                                <option value="Unique Coupon">5:00 AM</option>
                                                <option value="Unique Coupon">5:30 AM</option>
                                                <option value="Master Coupon">6:00 AM</option>
                                                <option value="Unique Coupon">6:30 AM</option>
                                                <option value="Unique Coupon">7:00 AM</option>
                                                <option value="Master Coupon">7:30 AM</option>
                                                <option value="Unique Coupon">8:00 AM</option>
                                                <option value="Unique Coupon">8:30 AM</option>
                                                <option value="Unique Coupon">9:00 AM</option>
                                                <option value="Master Coupon">9:30 AM</option>
                                                <option value="Unique Coupon">10:00 AM</option>
                                                <option value="Unique Coupon">10:30 AM</option>
                                                <option value="Master Coupon">11:00 AM</option>
                                                <option value="Unique Coupon">11:30 AM</option>
                                                <option value="Unique Coupon">12:00 PM</option>
                                                <option value="Master Coupon">12:30 PM</option>
                                                <option value="Unique Coupon">13:00 PM</option>
                                                <option value="Unique Coupon">13:30 PM</option>
                                                <option value="Master Coupon">14:00 PM</option>
                                                <option value="Unique Coupon">14:30 PM</option>
                                                <option value="Unique Coupon">15:00 PM</option>
                                                <option value="Master Coupon">15:30 PM</option>
                                                <option value="Unique Coupon">16:00 PM</option>
                                                <option value="Unique Coupon">16:30 PM</option>
                                                <option value="Unique Coupon">17:00 PM</option>
                                                <option value="Master Coupon">17:30 PM</option>
                                                <option value="Unique Coupon">18:00 PM</option>
                                                <option value="Unique Coupon">18:30 PM</option>
                                                <option value="Master Coupon">19:00 PM</option>
                                                <option value="Unique Coupon">19:30 PM</option>
                                                <option value="Unique Coupon">20:00 PM</option>
                                                <option value="Master Coupon">20:30 PM</option>
                                                <option value="Unique Coupon">21:00 PM</option>
                                                <option value="Unique Coupon">21:30 PM</option>
                                                <option value="Unique Coupon">22:00 PM</option>
                                                <option value="Master Coupon">22:30 PM</option>
                                                <option value="Unique Coupon">23:00 PM</option>
                                                <option value="Unique Coupon">23:30 PM</option>
                                            </select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="15" style="width: 492px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-coupon-time-end-container"><span class="select2-selection__rendered" id="select2-coupon-time-end-container" role="textbox" aria-readonly="true" title="12:00 AM">12:00 AM</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card-body" style="padding-top: 0rem; padding-left: 0rem; padding-bottom: 2rem">
                            <div class="form-row">
                                <a href="{{route('coupon-home')}}"><button class="mr-3 btn-shadow btn-primary btn-wide float-left btn-pill btn-hover-shine btn dev-submit-button" >Create Coupon</button></a>
                                <button class="btn-shadow float-left btn-wide btn-pill btn btn-outline-secondary dev-submit-button" type="submit">Cancel Coupon</button>
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
@endsection
