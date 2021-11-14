
<!doctype html>
<html lang="en">
@include('layouts.head')
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    <!---------------------     Start header section section     --------------------->
@include('layouts.header')

<!---------------------     End header section      --------------------->

    <!---------------------     Start Themes Setting  section     --------------------->
@include('layouts.setting')

<!---------------------     End Themes setting  section     --------------------->
    <div class="app-main">
        <div class="app-sidebar sidebar-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                        </button>
                    </div>
                </div>
            </div>
            <!---------------------     Start mobile menu section     --------------------->
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                    </button>
                </div>
            </div>
            <!---------------------     End mobile menu section     --------------------->
            <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
            </div>
            <!---------------------     Start Left menu section     --------------------->
            @include('layouts.sidebar')
            <!---------------------     End Left menu section     --------------------->
        </div>
        <!---------------------     Start main content  section     --------------------->
        <div class="app-main__outer">
        @yield('content')
            <!---------------------     Start footer tab  section      --------------------->
            @include('layouts.footer')
            <!---------------------     End footer tab  section      --------------------->
        </div>
    </div>

</div>
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<!-- plugin dependencies -->
@include('layouts.script')
</body>
</html>
@yield('modal')
