<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Login - ArchitectUI HTML Bootstrap 4 Dashboard Template</title>
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
                <div class="d-none d-lg-block col-lg-4">
                    <div class="slider-light">
                        <div class="slick-slider">
                            <div>
                                <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-plum-plate" tabindex="-1">
                                    <div class="slide-img-bg" style="background-image: url('images/originals/city.jpg');"></div>
                                    <div class="slider-content">
                                        <h3>Best Email Marketing Platform.</h3>
                                        <p>
                                            Ebolder is like a dream. Some think it's too good to be true! Extensive
                                            collection of unified Email marketing Platform.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">
                                    <div class="slide-img-bg" style="background-image: url('images/originals/citynights.jpg');"></div>
                                    <div class="slider-content">
                                        <h3>Grow their sales on your Business.</h3>
                                        <p>
                                            Easy make campaigns on Ecommerce website swiftly and win more sales with Ebolder.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-sunny-morning" tabindex="-1">
                                    <div class="slide-img-bg" style="background-image: url('images/originals/citydark.jpg');"></div>
                                    <div class="slider-content">
                                        <h3>Too many template to help</h3>
                                        <p>We've included a lot of Application that cover almost all use cases for any type of Feature.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
                    <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                        <div class="app-logo"></div>
                        <h4 class="mb-0">
                            <span class="d-block">Welcome back,</span>
                            <span>Please sign in to your account.</span>
                        </h4>
                        <div class="dev-shopify-login" style="padding-top:1em;">
                            <a href="#" class="dev-a-button">
                                <button class="mb-2 mr-2 btn-icon btn btn-light btn-hover-shine dev-sign-up">
                                    <i class="dot-btn-icon fab fa-shopify icon-gradient" style="background-image: linear-gradient(to top, #549650 0%, #0a5e05 100%) !important;"></i> SIGN UP WITH SHOPIFY
                                </button>
                            </a>
                        </div>
                        <h6 class="mt-3">No account?
                            <a href="{{route('sign-up')}}" class="text-primary">Start Free Trial Now</a>
                        </h6>
                        <div class="divider row"></div>
                        <div>
                            <form id="signupForm" class="" method="post" action="{{route('login')}}">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="exampleEmail" class=""> Email</label>
                                            <input name="email" id="exampleEmail" type="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="examplePassword" class="">Password</label>
                                            <input name="password" id="examplePassword" type="password" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="divider row"></div>
                                <div class="d-flex align-items-center">
                                    <div class="ml-auto">
                                        <a href="{{route('recover-password')}}" class="btn-lg btn btn-link">Recover Password</a>
                                        <button type="submit" class="btn btn-primary btn-lg dev-submit-button">Login to Dashboard</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- plugin dependencies -->
<script type="text/javascript" src="{{asset('/vendors/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/vendors/slick-carousel/slick/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/vendors/jquery-validation/dist/jquery.validate.min.js')}}"></script>

<!-- custome.js -->
<script type="text/javascript" src="{{asset('/js/carousel-slider.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/form-components/form-validation.js')}}"></script>
</body>
</html>
