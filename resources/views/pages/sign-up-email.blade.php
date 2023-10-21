<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Register - ArchitectUI HTML Bootstrap 4 Dashboard Template</title>
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
                            style="background-image: url('images/login/signup.svg');">
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
                                    Already have an account?
                                    <a href="{{route('sign-in')}}" class="dev-a-button">&nbsp;&nbsp;Log in </a>
                                </div>
                            </div>
                        </div>
                        <div class="w-100 h-100 d-flex flex-row align-items-center justify-content-center">
                            <div class="col-xl-3 col-md-3 d-none"></div>
                            <div
                                class="col-xl-6 col-md-6 col-sm-6 col-12 d-flex justify-content-center align-items-center flex-grow-1 flex-column">
                                <h2 class="mb-0 text-center">
                                    <span class="d-block font-weight-bold mb-2">Sign up</span>
                                </h2>
                                <span class="font-weight-light">Please fill your information</span>
                                <div class="mt-5 w-100">
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <form class="" id="signupForm" method="post" action="{{route('auth.register')}}">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="Email" class="">
                                                        <span class="text-danger">*</span> Email
                                                    </label>
                                                    <input name="email" id="Email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="phone" class=""><span class="text-danger">*</span>Phone
                                                        number</label>
                                                    <input name="phone" id="phone" type="text" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="password" class="">
                                                        <span class="text-danger">*</span> Password
                                                    </label>
                                                    <input name="password" id="password" type="password"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="password_confirmation" class="">
                                                        <span class="text-danger">*</span> Password Confirm
                                                    </label>
                                                    <input name="password_confirmation" id="password_confirmation"
                                                        type="password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <label for="businessname" class=""><span
                                                            class="text-danger">*</span>Business name</label>
                                                    <input name="name" id="businessname" type="text"
                                                        class="form-control">

                                                </div>
                                            </div>

                                        </div>

                                        <div class="w-100 mt-4">
                                            <button type="submit" class="btn login-btn dev-submit-button w-100">SIGN
                                                UP</button>
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
    <script type="text/javascript" src="{{asset('/vendors/jquery-validation/dist/jquery.validate.min.js')}}"></script>

    <!-- custome.js -->
    <script type="text/javascript" src="{{asset('/js/form-components/form-validation.js')}}"></script>
</body>
<style>
    .login-btn {
        border-radius: 100px;
        padding: 16px;
        background-color: #2162FF;
        color: white;
        font-size: 18px;
        margin-top: 32px;
    }
</style>

</html>