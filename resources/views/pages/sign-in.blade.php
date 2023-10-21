<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Login - ArchitectUI HTML Bootstrap 4 Dashboard Template</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">
    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="stylesheet" href="{{asset('/vendors/@fortawesome/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/vendors/ionicons-npm/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('/vendors/linearicons-master/dist/web-font/style.css')}}">
    <link rel="stylesheet"
        href="{{asset('/vendors/pixeden-stroke-7-icon-master/pe-icon-7-stroke/dist/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" href="{{asset('/styles/css/base.css')}}">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100">
                <div class="h-100 no-gutters row">
                    <div class="d-none d-xl-block col-xl-3 ">
                        <div class="flex items-center h-100 bg-no-repeat"
                            style="background-image: url('images/login/login.png');">
                            <div class="d-flex flex-row align-items-center justify-content-center p-4">
                                <img src="/images/login/logo.svg" alt="" />
                                <div class="d-flex justify-content-center flex-column text-white font-weight-bold ml-2">
                                    <p class="m-0">If You Don’t Walk Today</p>
                                    <p class="m-0">You’ll Have To Run Tomorrow.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-100 bg-white col-md-12 col-xl-9 d-flex flex-column ">
                        <div
                            class="p-4 d-flex justify-content-between align-items-center flex-xl-row flex-md-row flex-column">
                            <div class="mb-4">
                                <div class="d-flex flex-row d-xl-none d-md-flex">
                                    <img src="/images/login/logo.svg" alt="" />
                                    <div
                                        class="d-flex justify-content-center flex-column text-body font-weight-bold ml-2">
                                        <p class="m-0">If You Don’t Walk Today</p>
                                        <p class="m-0">You’ll Have To Run Tomorrow.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="d-flex flex-row justify-content-end">
                                    Don't have an account?
                                    <a href="{{route('sign-up-email')}}" class="dev-a-button">&nbsp;&nbsp;Sign up </a>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 h-100 d-flex flex-row align-items-center justify-content-center">
                            <div class="col-xl-3 col-md-3 d-none"></div>
                            <div
                                class="col-xl-6 col-md-6 col-sm-6 col-12 d-flex justify-content-center align-items-center flex-grow-1 flex-column">

                                <h2 class="mb-0 text-center">
                                    <span class="d-block font-weight-bold mb-2">Welcome back!</span>
                                </h2>
                                <span class="font-weight-light">Please sign in to your account</span>


                                <div class="mt-5 w-100">
                                    @if (session('status'))
                                    <div class="alert alert-danger">
                                        {{ session('status') }}
                                    </div>
                                    @endif
                                    <form id="signupForm" class="" method="post" action="{{route('auth.login')}}">
                                        @csrf
                                        <div class="form-group ">
                                            <div>
                                                <div class="position-relative form-group">
                                                    <label for="exampleEmail" class=""> Email</label>
                                                    <input name="email" id="exampleEmail" type="email"
                                                        class="form-control">
                                                    <!-- <img src="/images/login/mail.svg" alt="" class="suffix-input" /> -->
                                                </div>
                                            </div>
                                            <div>
                                                <div class="position-relative form-group">
                                                    <label for="examplePassword" class="">Password</label>
                                                    <input name="password" id="examplePassword" type="password"
                                                        class="form-control position-relative">
                                                    <!-- <img onclick="togglePasswordVisibility()" src="/images/login/eye.svg" alt="" class="suffix-input"/> -->
                                                    </input>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-end flex-column">
                                            <a href="{{route('recover-password')}}" class="btn-link">Recover
                                                Password</a>
                                            <button type="submit" class="btn login-btn dev-submit-button w-100">Sign
                                                in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-3 d-none"></div>
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
    <style>
        .suffix-input {
            position: absolute;
            right: 5px;
            bottom: 6px
        }

        .login-btn {
            border-radius: 100px;
            padding: 16px;
            background-color: #2162FF;
            color: white;
            font-size: 18px;
            margin-top: 32px;
        }
    </style>
    <!-- <script>
    function togglePasswordVisibility() { 
        const passwordInput = document.getElementById('examplePassword');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    }
</script> -->
</body>

</html>