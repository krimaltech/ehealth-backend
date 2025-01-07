{{-- <!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
​

<head>
    <base href="../../../">
    <meta charset="utf-8" />
    <title>Gharghar Ma Doctor</title>
    <meta name="description" content="Login page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    ​
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    ​
    ​
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="/logn/login-2.css" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->
    ​
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="/logn/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    ​
    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->
    ​
    <link rel="shortcut icon" href="/logn/assets/media/logos/favicon.ico" />
    ​
</head>
<!--end::Head-->
​
<!--begin::Body-->
​

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed page-loading">
    ​
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
            <!--begin::Aside-->
            <div class="login-aside order-2 order-lg-1 d-flex flex-row-auto position-relative overflow-hidden">
                <!--begin: Aside Container-->
                <div class="d-flex flex-column-fluid flex-column justify-content-between py-9 px-7 py-lg-13 px-lg-35">
                    ​
                    ​
                    <!--begin::Aside body-->
                    <div class="d-flex flex-column-fluid flex-column flex-center">
                        <!--begin::Signin-->
                        <div class="login-form login-signin py-11">
                            <!--begin::Form-->
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <!--begin::Title-->
                                <div class="text-center pb-8">
                                    <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">LOG IN</h2>
                                </div>
                                <!--end::Title-->
                                ​
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <label class="font-size-h6 font-weight-bolder text-dark" for="email">{{ __('PHONE NUMBER') }}</label>
                                    <input id="email" type="email" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!--end::Form group-->
                                ​
                                <!--begin::Form group-->
                                <div class="form-group">
                                    <div class="d-flex justify-content-between mt-n5">
                                        <label class="font-size-h6 font-weight-bolder text-dark pt-5" for="password">{{ __('PASSWORD') }}</label>
                                        ​
                                        <!-- <a href="javascript:;" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_forgot">
                                            Forgot Password ?
                                        </a> -->
                                    </div>
                                    <input id="password" type="password" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!--end::Form group-->
                                ​
                                <!--begin::Action-->
                                <div class="text-center pt-2">
                                    <button type="submit" class="btn btn-dark font-weight-bolder font-size-h6 px-8 py-4 my-3" id="kt_login_signin_submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                    ​
                                </div>
                                <!--end::Action-->
                            </form>
                            <!--end::Form-->

                            <p>Copyright &copy; <script>
                                    document.write(new Date().getFullYear())
                                </script> <a target="_blank" href="{{ url('http://www.jaruwa.com') }}">Jaruwa Nepal</a> All Rights Reserved</p>
                        </div>
                        <!--end::Signin-->

                    </div>
                    <!--end::Aside body-->
                </div>
                <!--end: Aside Container-->
            </div>
            <!--begin::Aside-->
            ​
            <!--begin::Content-->
            <div class="content order-1 order-lg-2 d-flex flex-column w-100 pb-0" style="background-color: #B1DCED;">

                <div class="content-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url(/images/blue-logo.png);">
                </div>
                <!--end::Image-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->
</body>
<!--end::Body-->
​

</html> --}}
<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../../">
    <meta charset="utf-8" />
    <title>GharGharMa Doctor | Login</title>
    <meta name="description" content="Login page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--begin::Page Custom Styles(used by this page)-->
    <link href="/loginassets/login-6.css" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="/loginassets/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/loginassets/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="/loginassets/style.bundle.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/client/css/ionicons.min.css">
    <link rel="icon" type="image/x-icon" href="/images/blue-logo.png">
    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->
    <style>
        /* .nav .nav-link {
            padding-left: 1rem;
            padding-right: 1rem;
            border: 1px solid transparent;
        }
        .nav .nav-item .nav-link:hover:not(.active){
            border: 1px solid #06a5e9;
            color:#06a5e9;
            transition: 0.3s all;
        }
        .nav .nav-link.active{
            background-color: #06a5e9 !important;
            color:white !important;
        } */
        .tab-content {
            width: 500px;
        }

        input {
            text-align: center;
        }

        input::placeholder {
            text-align: center;
        }
    </style>
</head>

<!--end::Head-->

<!--begin::Body-->

<body id="kt_body"

    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed page-loading">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong>{{ $message }}</strong>
    </div>
    @endif
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-6 login-signin-on login-signin-on d-flex flex-column-fluid" id="kt_login">
            <div class="d-flex flex-column flex-lg-row flex-row-fluid text-center"
                style="background-image: linear-gradient(to right, #57c7f7, #0259a7);">
                <!--begin:Aside-->
                <div class="d-flex w-100 flex-center bg-white">
                    <div class="login-wrapper px-3">
                        <!--begin:Aside Content-->
                        <div class="text-dark-75">
                            <a href="#">
                                <img src="/images/blue-logo.png" alt="" style="height: 200px" />
                            </a>
                            <h3 class="mb-8 mt-15 font-weight-bolder">LOG IN</h3>
                            <p class="mb-15 text-muted font-weight-bold">
                                Ghargharma Doctor is an organization working to change the mindset of individuals in
                                order to shift their importance to a preventive health care system instead of the highly
                                prevalent curative one.
                            </p>
                            <a href="{{ route('register') }}"
                                class="btn btn-outline-primary btn-pill py-4 px-9 font-weight-bold">Get An Account</a>
                            <p class="mt-20">Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Designed By: <a target="_blank"
                                    href="http://jaruwa.com/">Jaruwa Nepal</a>
                            </p>

                        </div>
                        <!--end:Aside Content-->
                    </div>
                </div>
                <!--end:Aside-->

                <!--begin:Content-->
                <div class="d-flex w-100 flex-center p-15 position-relative overflow-hidden ">
                    {{-- <div class="tab-content pt-0 bg-white p-5" style="border-radius:10px">

                        <!--Panel 1-->
                        <div class="tab-pane fade in show active" id="user" role="tabpanel">
                            <!--begin:Sign In Form-->
                            <div class="login-signin">
                                <div class="text-center mb-10 mb-lg-20">
                                    <h2 class="font-weight-bold">Log In As User</h2>
                                    <p class="text-muted font-weight-bold">Enter your username and password</p>
                                </div>
                                <form class="form text-left" id="kt_login_signin_form">
                                    <div class="form-group py-3 m-0">
                                        <input class="form-control h-auto px-0 placeholder-dark-75" type="text" placeholder="Username" name="username" autocomplete="off" />
                                    </div>
                                    <div class="form-group py-3 border-top m-0">
                                        <input class="form-control h-auto px-0 placeholder-dark-75" type="Password" placeholder="Password" name="password" />
                                    </div>
                                    <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-5">
                                        <div class="checkbox-inline">
                                            <label class="checkbox m-0 text-muted font-weight-bold">
                                                <input type="checkbox" name="remember" />
                                                <span></span>
                                                Remember me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="text-center mt-15">
                                        <button id="kt_login_signin_submit" class="btn btn-primary btn-pill shadow-sm py-4 px-9 font-weight-bold">Log In</button>
                                    </div>
                                </form>
                            </div>
                            <!--end:Sign In Form-->              
                        </div>
                        <!--/.Panel 1-->
              
                        <!--Panel 2-->
                        <div class="tab-pane fade" id="doctor" role="tabpanel">
                            <!--begin:Sign In Form-->
                            <div class="login-signin">
                                <div class="text-center mb-10 mb-lg-20">
                                    <h2 class="font-weight-bold">Log In As Doctor</h2>
                                    <p class="text-muted font-weight-bold">Enter your username and password</p>
                                </div>
                                <form class="form text-left" id="kt_login_signin_form">
                                    <div class="form-group py-3 m-0">
                                        <input class="form-control h-auto px-0 placeholder-dark-75" type="text" placeholder="Username" name="username" autocomplete="off" />
                                    </div>
                                    <div class="form-group py-3 border-top m-0">
                                        <input class="form-control h-auto px-0 placeholder-dark-75" type="Password" placeholder="Password" name="password" />
                                    </div>
                                    <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-5">
                                        <div class="checkbox-inline">
                                            <label class="checkbox m-0 text-muted font-weight-bold">
                                                <input type="checkbox" name="remember" />
                                                <span></span>
                                                Remember me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="text-center mt-15">
                                        <button id="kt_login_signin_submit" class="btn btn-primary btn-pill shadow-sm py-4 px-9 font-weight-bold">Log In</button>
                                    </div>
                                </form>
                            </div>
                            <!--end:Sign In Form-->            
                        </div>
                        <!--/.Panel 2-->

                        <!--Panel 3-->
                        <div class="tab-pane fade" id="admin" role="tabpanel">
                            <!--begin:Sign In Form-->
                            <div class="login-signin">
                                <div class="text-center mb-10 mb-lg-20">
                                    <h2 class="font-weight-bold">Log In As Admin</h2>
                                    <p class="text-muted font-weight-bold">Enter your username and password</p>
                                </div>
                                <form class="form text-left" id="kt_login_signin_form">
                                    <div class="form-group py-3 m-0">
                                        <input class="form-control h-auto px-0 placeholder-dark-75" type="text" placeholder="Username" name="username" autocomplete="off" />
                                    </div>
                                    <div class="form-group py-3 border-top m-0">
                                        <input class="form-control h-auto px-0 placeholder-dark-75" type="Password" placeholder="Password" name="password" />
                                    </div>
                                    <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-5">
                                        <div class="checkbox-inline">
                                            <label class="checkbox m-0 text-muted font-weight-bold">
                                                <input type="checkbox" name="remember" />
                                                <span></span>
                                                Remember me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="text-center mt-15">
                                        <button id="kt_login_signin_submit" class="btn btn-primary btn-pill shadow-sm py-4 px-9 font-weight-bold">Log In</button>
                                    </div>
                                </form>
                            </div>
                            <!--end:Sign In Form-->            
                        </div>
                        <!--/.Panel 3-->

                        <!--Panel 4-->
                        <div class="tab-pane fade" id="employee" role="tabpanel">
                            <!--begin:Sign In Form-->
                            <div class="login-signin">
                                <div class="text-center mb-10 mb-lg-20">
                                    <h2 class="font-weight-bold">Log In As Employee</h2>
                                    <p class="text-muted font-weight-bold">Enter your username and password</p>
                                </div>
                                <form class="form text-left" id="kt_login_signin_form">
                                    <div class="form-group py-3 m-0">
                                        <input class="form-control h-auto px-0 placeholder-dark-75" type="text" placeholder="Username" name="username" autocomplete="off" />
                                    </div>
                                    <div class="form-group py-3 border-top m-0">
                                        <input class="form-control h-auto px-0 placeholder-dark-75" type="Password" placeholder="Password" name="password" />
                                    </div>
                                    <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-5">
                                        <div class="checkbox-inline">
                                            <label class="checkbox m-0 text-muted font-weight-bold">
                                                <input type="checkbox" name="remember" />
                                                <span></span>
                                                Remember me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="text-center mt-15">
                                        <button id="kt_login_signin_submit" class="btn btn-primary btn-pill shadow-sm py-4 px-9 font-weight-bold">Log In</button>
                                    </div>
                                </form>
                            </div>
                            <!--end:Sign In Form-->            
                        </div>
                        <!--/.Panel 4-->
                    </div> --}}
                    <div class="login-wrapper bg-white p-5" style="border-radius:10px">
                        <!--begin:Sign In Form-->
                        <div class="login-signin py-3">
                            <div class="text-center mb-10 mb-lg-15">
                                <h2 class="font-weight-bold">Log In</h2>
                                <p class="text-muted font-weight-bold">Enter your email and password</p>
                            </div>
                            <form class="form text-left" id="appointment_form" action="{{ route('login') }}"
                                method="POST">
                                @csrf
                                <div class="form-group py-3 m-0">
                                    <input
                                        class="form-control h-auto px-0 placeholder-dark-75 @error('email') is-invalid @enderror"
                                        type="text" placeholder="Email/Phone" name="email"
                                        value="{{ old('email') }}" />
                                    @error('email')
                                        <span class="invalid-feedback text-center" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group py-3 border-top m-0">
                                    <input
                                        class="form-control h-auto px-0 placeholder-dark-75 @error('password') is-invalid @enderror"
                                        type="password" placeholder="Password" name="password" />
                                    @error('password')
                                        <span class="invalid-feedback text-center" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div
                                    class="form-group d-flex flex-wrap justify-content-between align-items-center mt-5">
                                    <div class="checkbox-inline">
                                        <label class="checkbox m-0 text-muted font-weight-bold">
                                            <input type="checkbox" name="remember" />
                                            <span></span>
                                            Remember me
                                        </label>
                                    </div>
                                    <a href="password/reset" id="kt_login_forgot"
                                        class="text-muted text-hover-primary font-weight-bold">Forget Password ?</a>
                                </div>
                                <div class="text-center mt-15">
                                    <button type="submit" id="register"
                                        class="btn btn-primary btn-block btn-pill shadow-sm py-4 px-9 font-weight-bold">Log
                                        In</button>
                                </div>
                            </form>
                            <div class="mt-5">
                                Don't have an account ?<a href="{{ route('register') }}" class="ml-2">Register</a>
                            </div>
                            <div class="mt-5">
                                Head on over to GD Mail for team communications.<a href="https://mail.ghargharmadoctor.com" target="_blank" class="ml-2"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <!--end:Sign In Form-->
                    </div>
                </div>
                <!--end:Content-->

            </div>
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#appointment_form').on('submit', function() {
                $('#register').attr('disabled', 'true');
            });
        });
    </script>
    <script>
        var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
    </script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };
    </script>
    <!--end::Global Config-->

    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="/loginassets/plugins.bundle.js"></script>
    <script src="/loginassets/prismjs.bundle.js"></script>
    <script src="/loginassets/scripts.bundle.js"></script>
    <!--end::Global Theme Bundle-->


    <!--begin::Page Scripts(used by this page)-->
    <script src="/loginassets/login-general.js"></script>
    <!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>
