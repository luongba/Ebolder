@extends('welcome')
@section('content')
    <div class="app-main__inner">
        <!---------------------     Start head content  section     --------------------->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-cart icon-gradient bg-mean-fruit"></i>
                    </div>
                    <div>
                        Payment
                        <div class="page-title-subheading">You can easy make payment with Shopify account or Credit Card.</div>
                    </div>
                </div>
            </div>
        </div>
        <!---------------------     End head content section     --------------------->
        <!---------------------     Start main  section     --------------------->
        <div class="tabs-animation">
            <!---------------------     Start content  section     --------------------->

            <div class="row">
                <div class="col-md-12 col-lg-6 col-xl-8">
                    <div class="mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                <i class="header-icon pe-7s-credit mr-3 text-muted opacity-6"></i>
                                Payment Details
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="">
                                <div class="position-relative payment-method-form">
                                    <h6 class="text-bold">Privy Email + Conversion <span class="payment-price">$15.00</span></h6>
                                    <p><strong>$15.00</strong>/month for 0 - 350 people and unlimited emails.</p>
                                    <p>*Price is included sales tax.</p>
                                </div>
                                <div class="position-relative payment-method-form form-check">
                                    <label class="form-check-label">
                                        <input name="radio1" type="radio" class="form-check-input">
                                        Shopify billing (https://ebolder.myshopify.com/)
                                    </label>
                                </div>
                                <div class="position-relative form-check payment-method-form">
                                    <label class="form-check-label">
                                        <input name="radio1" type="radio" class="form-check-input">
                                        Credit Card
                                    </label>
                                </div>
                            </form>
                        </div>
                        <div class="d-block text-right card-footer">
                            <div class="plan-current">
                                <button class="btn btn-primary">CONFIRM AND PAY</button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-4">
                    <div class="mb-3 card">
                        <div class="card-header-tab card-header">
                            <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                <i class="header-icon pe-7s-info"></i>
                                Note tab
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
@endsection
@section('modal')
@endsection
