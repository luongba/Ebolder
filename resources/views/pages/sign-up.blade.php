<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Register - ArchitectUI HTML Bootstrap 4 Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="stylesheet" href="{{asset('/vendors/@fortawesome/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/vendors/ionicons-npm/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('/vendors/linearicons-master/dist/web-font/style.css')}}">
    <link rel="stylesheet" href="{{asset('/vendors/pixeden-stroke-7-icon-master/pe-icon-7-stroke/dist/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" href="{{asset('/styles/css/base.css')}}">
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow">
    <div class="app-container">
        <div class="h-100">
            <div class="h-100 no-gutters row">
                <div class="h-100 d-md-flex d-sm-block bg-white justify-content-center align-items-center col-md-12 col-lg-7">
                    <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                        <div class="app-logo"></div>
                        <h4>
                            <div class="text-dark">Start your free trial today</div>
                            <span class="text-dark">Join our best marketing platform to grow their sales with pop ups, email marketing.</span>
                        </h4>
                        <div>
                            <form class="">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <a href="#" class="mb-2 mr-2 btn btn-light btn-hover-shine dev-sign-up">
                                            <i class="dot-btn-icon fab fa-shopify icon-gradient" style="background-image: linear-gradient(to top, #549650 0%, #0a5e05 100%) !important;"></i> SIGN UP WITH SHOPIFY
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{route('sign-up-email')}}" class="mb-2 mr-2 btn btn-primary btn-hover-shine dev-sign-up">
                                            <i class="pe-7s-mail"></i> SIGN UP WITH EMAIL
                                        </a>
                                    </div>

                                </div>
                                <div class="mt-4 d-flex align-items-center">
                                    <h5 class="mb-0">Already have an account?
                                        <a href="{{route('sign-in')}}" class="text-primary">Sign in</a>
                                    </h5>
                                </div>
                                <div class="mt-3 position-relative form-check" style="padding-left: 0em;">

                                    <label for="exampleCheck" class="form-check-label">By signing up, you are agreeing to Ebolder
                                        <a href="javascript:void(0);" href="#">Terms and Conditions</a>.
                                    </label>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="d-lg-flex d-xs-none col-lg-5">
                    <div class="slider-light">
                        <div class="slick-slider slick-initialized">
                            <div>
                                <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">
                                    <div class="slide-img-bg" style="background-image: url('images/originals/citynights.jpg');"></div>
                                    <div class="slider-content">
                                        <h3>Scalable, Modular, Consistent</h3>
                                        <p>
                                            Easily exclude the components you don't require. Lightweight, consistent
                                            Bootstrap based styles across all elements and components
                                        </p>
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
</body>
</html>
