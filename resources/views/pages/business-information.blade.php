@extends('welcome')
@section('content')
    <div class="app-main__inner">
        <!---------------------     Start head content  section     --------------------->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="lnr-store icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        Business Infomations
                        <div class="page-title-subheading">Setup basic Business infomations.</div>
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
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="business" data-toggle="tooltip" data-placement="top" title="" data-original-title="Business name will use as name default sender Email">Business Name <i class="fa text-primary fa-question-circle text-secondary"></i></label>
                                        <input type="text" class="form-control" id="business" name="Business Name" value="Ebolder">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <div class="position-relative form-group">
                                            <label for="website-url" class="">Website URL</label>
                                            <input name="Website" id="website-url" type="text" class="form-control" value="https://ebolder.myshopify.com">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="busi-phone">Phone Number</label>
                                        <input type="text" class="form-control" id="busi-phone" name="Business Name" value="+1571 268 2466">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="busi-time-zone" data-toggle="tooltip" data-placement="top" title="" data-original-title="Your timezone is used to display dates and times.">Time Zone <i class="fa text-primary fa-question-circle text-secondary"></i></label>
                                        <select class="multiselect-dropdown form-control select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option value="-12:00">(GMT -12:00) Eniwetok, Kwajalein</option>
                                            <option value="-11:00">(GMT -11:00) Midway Island, Samoa</option>
                                            <option value="-10:00">(GMT -10:00) Hawaii</option>
                                            <option value="-09:50">(GMT -9:30) Taiohae</option>
                                            <option value="-09:00">(GMT -9:00) Alaska</option>
                                            <option value="-08:00">(GMT -8:00) Pacific Time (US &amp; Canada)</option>
                                            <option value="-07:00">(GMT -7:00) Mountain Time (US &amp; Canada)</option>
                                            <option value="-06:00">(GMT -6:00) Central Time (US &amp; Canada), Mexico City</option>
                                            <option value="-05:00">(GMT -5:00) Eastern Time (US &amp; Canada), Bogota, Lima</option>
                                            <option value="-04:50">(GMT -4:30) Caracas</option>
                                            <option value="-04:00">(GMT -4:00) Atlantic Time (Canada), Caracas, La Paz</option>
                                            <option value="-03:50">(GMT -3:30) Newfoundland</option>
                                            <option value="-03:00">(GMT -3:00) Brazil, Buenos Aires, Georgetown</option>
                                            <option value="-02:00">(GMT -2:00) Mid-Atlantic</option>
                                            <option value="-01:00">(GMT -1:00) Azores, Cape Verde Islands</option>
                                            <option value="+00:00" selected="selected" data-select2-id="3">(GMT) Western Europe Time, London, Lisbon, Casablanca</option>
                                            <option value="+01:00">(GMT +1:00) Brussels, Copenhagen, Madrid, Paris</option>
                                            <option value="+02:00">(GMT +2:00) Kaliningrad, South Africa</option>
                                            <option value="+03:00">(GMT +3:00) Baghdad, Riyadh, Moscow, St. Petersburg</option>
                                            <option value="+03:50">(GMT +3:30) Tehran</option>
                                            <option value="+04:00">(GMT +4:00) Abu Dhabi, Muscat, Baku, Tbilisi</option>
                                            <option value="+04:50">(GMT +4:30) Kabul</option>
                                            <option value="+05:00">(GMT +5:00) Ekaterinburg, Islamabad, Karachi, Tashkent</option>
                                            <option value="+05:50">(GMT +5:30) Bombay, Calcutta, Madras, New Delhi</option>
                                            <option value="+05:75">(GMT +5:45) Kathmandu, Pokhara</option>
                                            <option value="+06:00">(GMT +6:00) Almaty, Dhaka, Colombo</option>
                                            <option value="+06:50">(GMT +6:30) Yangon, Mandalay</option>
                                            <option value="+07:00">(GMT +7:00) Bangkok, Hanoi, Jakarta</option>
                                            <option value="+08:00">(GMT +8:00) Beijing, Perth, Singapore, Hong Kong</option>
                                            <option value="+08:75">(GMT +8:45) Eucla</option>
                                            <option value="+09:00">(GMT +9:00) Tokyo, Seoul, Osaka, Sapporo, Yakutsk</option>
                                            <option value="+09:50">(GMT +9:30) Adelaide, Darwin</option>
                                            <option value="+10:00">(GMT +10:00) Eastern Australia, Guam, Vladivostok</option>
                                            <option value="+10:50">(GMT +10:30) Lord Howe Island</option>
                                            <option value="+11:00">(GMT +11:00) Magadan, Solomon Islands, New Caledonia</option>
                                            <option value="+11:50">(GMT +11:30) Norfolk Island</option>
                                            <option value="+12:00">(GMT +12:00) Auckland, Wellington, Fiji, Kamchatka</option>
                                            <option value="+12:75">(GMT +12:45) Chatham Islands</option>
                                            <option value="+13:00">(GMT +13:00) Apia, Nukualofa</option>
                                            <option value="+14:00">(GMT +14:00) Line Islands, Tokelau</option>
                                        </select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="2" style="width: 492px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-hzmw-container"><span class="select2-selection__rendered" id="select2-hzmw-container" role="textbox" aria-readonly="true" title="(GMT) Western Europe Time, London, Lisbon, Casablanca">(GMT) Western Europe Time, London, Lisbon, Casablanca</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </div>
                                </div>

                            </div>
                            <div class="position-relative form-group">
                                <div class="position-relative form-group">
                                    <label for="busi-address">Business Street Address</label>
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
