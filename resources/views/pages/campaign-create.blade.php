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
                        Choose Type Campaign
                        <div class="page-title-subheading">Choose type Campaigns swiftly and win more sales with Ebolder!.</div>
                    </div>
                </div>

            </div>
        </div>
        <!---------------------     End head content section     --------------------->

        <div class="row">
            <!---------------------     Start item campaign single active    --------------------->


            <div class="col-md-6 col-xl-4">
                <div class="campaigns-type-body">
                    <div class="profile-responsive campaigns-type-main">
                        <div class="campaigns-type-name"><h5>Welcome Discount</h5></div>
                        <div class="campaigns-type-description"><span>Our most popular play to offer a discount. Every email you capture is worth $33 in sales.</span></div>
                        <div class="template-item-thumbnail template-signup">
                            <div class="dev-template-layout">
                                <div class="campaigns-type-thumbnail"><img class="" src="{{asset('images/signup-templates/discount-popup.png')}}"></div>
                                <div class="campaign-type-action">
                                    <a href="{{route('campaign-template')}}"><button class="mb-2 mr-2 btn btn-primary">Get Start</button> </a>
                                </div>
                            </div>
                        </div>
                        <div class="campaigns-type-infomation">
                            <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <i class="pe-7s-cup icon-gradient bg-happy-fisher"></i>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Result:</div>
                                                <div class="widget-subheading mt-1 opacity-10">
                                                    <div class="">Grow Email List</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <i class="lnr-users icon-gradient bg-ripe-malin"></i>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Who Seen:</div>
                                                <div class="widget-subheading mt-1 opacity-10">
                                                    <div class="">Visitor that haven’t signed up</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <i class="lnr-bullhorn icon-gradient bg-tempting-azure"></i>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Feature:</div>
                                                <div class="widget-subheading mt-1 opacity-10">
                                                    <div class="">Offering a discount, welcoming new Visitor</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-md-6 col-xl-4">
                <div class="campaigns-type-body">
                    <div class="profile-responsive campaigns-type-main">
                        <div class="campaigns-type-name"><h5>Mobile Signup Discount</h5></div>
                        <div class="campaigns-type-description"><span>On average, 73% of your traffic will come from mobile. </span></div>
                        <div class="template-item-thumbnail template-signup">
                            <div class="dev-template-layout">
                                <div class="campaigns-type-thumbnail"><img class="" src="{{asset('images/signup-templates/discount-popup.png')}}"></div>
                                <div class="campaign-type-action">
                                    <a href="{{route('campaign-template')}}"><button class="mb-2 mr-2 btn btn-primary">Get Start</button> </a>
                                </div>
                            </div>
                        </div>
                        <div class="campaigns-type-infomation">
                            <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <i class="pe-7s-cup icon-gradient bg-happy-fisher"></i>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Result:</div>
                                                <div class="widget-subheading mt-1 opacity-10">
                                                    <div class="">Grow Email List</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <i class="lnr-users icon-gradient bg-ripe-malin"></i>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Who Seen:</div>
                                                <div class="widget-subheading mt-1 opacity-10">
                                                    <div class="">Visitor on mobile that haven't signed up</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <i class="lnr-bullhorn icon-gradient bg-tempting-azure"></i>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Feature:</div>
                                                <div class="widget-subheading mt-1 opacity-10">
                                                    <div class="">Offering a discount, welcoming new Visitors</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-md-6 col-xl-4">
                <div class="campaigns-type-body">
                    <div class="profile-responsive campaigns-type-main">
                        <div class="campaigns-type-name"><h5>Cart Saver</h5></div>
                        <div class="campaigns-type-description"><span>Stop cart abandonment (before a shopper leaves your site!) with this perfectly-timed </span></div>
                        <div class="template-item-thumbnail template-signup">
                            <div class="dev-template-layout">
                                <div class="campaigns-type-thumbnail"><img class="" src="{{asset('images/signup-templates/discount-popup.png')}}"></div>
                                <div class="campaign-type-action">
                                    <a href="{{route('campaign-template')}}"><button class="mb-2 mr-2 btn btn-primary">Get Start</button> </a>
                                </div>
                            </div>
                        </div>
                        <div class="campaigns-type-infomation">
                            <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <i class="pe-7s-cup icon-gradient bg-happy-fisher"></i>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Result:</div>
                                                <div class="widget-subheading mt-1 opacity-10">
                                                    <div class="">Reduce cart abandonment</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <i class="lnr-users icon-gradient bg-ripe-malin"></i>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Who Seen:</div>
                                                <div class="widget-subheading mt-1 opacity-10">
                                                    <div class="">Visitor with items in their cart</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <i class="lnr-bullhorn icon-gradient bg-tempting-azure"></i>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Feature:</div>
                                                <div class="widget-subheading mt-1 opacity-10">
                                                    <div class="">Offering a discount, encouraging check out</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-md-6 col-xl-4">
                <div class="campaigns-type-body">
                    <div class="profile-responsive campaigns-type-main">
                        <div class="campaigns-type-name"><h5>Cross Sell</h5></div>
                        <div class="campaigns-type-description"><span>Recommend products to a shopper before they checkout. Here's a guide on how to set.</span></div>
                        <div class="template-item-thumbnail template-signup">
                            <div class="dev-template-layout">
                                <div class="campaigns-type-thumbnail"><img class="" src="{{asset('images/signup-templates/discount-popup.png')}}"></div>
                                <div class="campaign-type-action">
                                    <a href="{{route('campaign-template')}}"><button class="mb-2 mr-2 btn btn-primary">Get Start</button> </a>
                                </div>
                            </div>
                        </div>
                        <div class="campaigns-type-infomation">
                            <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <i class="pe-7s-cup icon-gradient bg-happy-fisher"></i>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Result:</div>
                                                <div class="widget-subheading mt-1 opacity-10">
                                                    <div class="">Increase average order value</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <i class="lnr-users icon-gradient bg-ripe-malin"></i>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Who Seen:</div>
                                                <div class="widget-subheading mt-1 opacity-10">
                                                    <div class="">Visitor with a related product their cart</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <i class="lnr-bullhorn icon-gradient bg-tempting-azure"></i>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Feature:</div>
                                                <div class="widget-subheading mt-1 opacity-10">
                                                    <div class="">Featuring new products or overstocked items</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-md-6 col-xl-4">
                <div class="campaigns-type-body">
                    <div class="profile-responsive campaigns-type-main">
                        <div class="campaigns-type-name"><h5>Free Shipping Bar</h5></div>
                        <div class="campaigns-type-description"><span>Offering free shipping can help you 3X your conversion. Set your goal and you're ready.</span></div>
                        <div class="template-item-thumbnail template-signup">
                            <div class="dev-template-layout">
                                <div class="campaigns-type-thumbnail"><img class="" src="{{asset('images/signup-templates/discount-popup.png')}}"></div>
                                <div class="campaign-type-action">
                                    <a href="{{route('campaign-template')}}"><button class="mb-2 mr-2 btn btn-primary">Get Start</button> </a>
                                </div>
                            </div>
                        </div>
                        <div class="campaigns-type-infomation">
                            <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <i class="pe-7s-cup icon-gradient bg-happy-fisher"></i>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Result:</div>
                                                <div class="widget-subheading mt-1 opacity-10">
                                                    <div class="">Increase average order value</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <i class="lnr-users icon-gradient bg-ripe-malin"></i>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Who Seen:</div>
                                                <div class="widget-subheading mt-1 opacity-10">
                                                    <div class="">All shoppers</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <i class="lnr-bullhorn icon-gradient bg-tempting-azure"></i>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Feature:</div>
                                                <div class="widget-subheading mt-1 opacity-10">
                                                    <div class="">Motivating shoppers to add more to their cart</div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
            <!---------------------     End item campaign single     --------------------->

        </div>
        <!---------------------     End main  content  section      --------------------->
    </div>
@endsection
