@extends('welcome')
@section('content')
    <div class="app-main__inner">
        <!---------------------     Start head content  section     --------------------->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-mail icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        Sender Options
                        <div class="page-title-subheading">Get start options change Email sender to customer</div>
                    </div>
                </div>
            </div>
        </div>
        <!---------------------     End head content section     --------------------->
        <!---------------------     Start main  section     --------------------->
        <div class="tabs-animation">
            <!---------------------     Start content  section     --------------------->

            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form class="" id="signupForm" method="post" action="" novalidate="novalidate">
                            <div class="form-row">
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="sender-email" data-toggle="tooltip" data-placement="top" title="" data-original-title="Default Sender Email, You can change this name from Business infomation.">Default Name Sender Email <i class="fa text-primary fa-question-circle text-secondary"></i></label>
                                        <input type="text" class="form-control" id="sender-email" name="Business Name" disabled="" value="Ebolder">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <div class="position-relative form-group">
                                            <label for="sender-email">Default From Email</label>
                                            <input type="text" class="form-control" id="sender-email" name="Business Name" disabled="" value="Offers">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <label for="busi-phone" data-toggle="tooltip" data-placement="top" title="" data-original-title="Please verify your domain to add more domain sending email.">Domain Sending Email <i class="fa text-primary fa-question-circle text-secondary"></i></label>
                                        <select class="multiselect-dropdown form-control select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <optgroup label="Eboldermkt.com">
                                                <option value="Eboldermkt.com" data-select2-id="3">Eboldermkt.com</option>
                                            </optgroup>
                                            <optgroup label="Customer Domain verified">
                                                <option value="demoshop.com">demoshop.com</option>
                                                <option value="demoshop1.com">demoshop1.com</option>
                                                <option value="demoshop2.com">demoshop2.com</option>
                                                <option value="demoshop3.com">demoshop3.com</option>
                                            </optgroup>
                                        </select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="2" style="width: 241px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-674d-container"><span class="select2-selection__rendered" id="select2-674d-container" role="textbox" aria-readonly="true" title="Eboldermkt.com">Eboldermkt.com</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="position-relative form-group">
                                        <div class="position-relative form-group">
                                            <label>Addon domain</label>
                                            <div class="add-on-domain">
                                                <a class="btn-icon btn dev-button btn-primary" href="{{route('sending-domain')}}" style="padding: 7px 15px;font-size: 0.9rem">
                                                    <i class="pe-7s-plus dev-icon btn-icon-wrapper" style="margin-top: -3px;"></i>Add Your Domain
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="col-md-6 text-primary">
                                    <label>Email send to customer Will appear as:</label> <span class="business-sender-name">Ebolder</span>&lt; <span class="defautl-sender">offers</span>@<span class="default-domain-sender">eboldermktg.com</span>&gt;
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="busi-email" data-toggle="tooltip" data-placement="top" title="" data-original-title="Emails sent by Ebolder on your behalf will use this reply-to address.">Reply-to Email <i class="fa text-primary fa-question-circle text-secondary"></i></label>
                                    <input name="email" id="busi-email" type="email" class="form-control" value="mkt@shopifydemo.com">
                                </div>
                                <div class="col-md-6">
                                    <label for="busi-address" data-toggle="tooltip" data-placement="top" title="" data-original-title="This business address will be shown at the bottom of emails we send on your behalf.">Business Street Address <i class="fa text-primary fa-question-circle text-secondary"></i></label>
                                    <input type="text" class="form-control" id="busi-address" name="business address" value="46 Gansevoort St, New York">
                                </div>
                            </div>

                            <button class="mt-2 btn btn-primary dev-submit-button" type="submit">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!---------------------     End main  content  section      --------------------->
    </div>
@endsection
@section('modal')
@endsection
