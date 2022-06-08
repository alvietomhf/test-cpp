<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>UJI KOMPETENSI C++ | SMK NEGERI 2 SURABAYA</title>
    <link rel="apple-touch-icon" href="https://web.smkn2sby.sch.id/media_library/images/9e5ee45a4329a84c0cb25c2b0c7fae8e.png">
    <link rel="shortcut icon" type="image/x-icon" href="https://web.smkn2sby.sch.id/media_library/images/9e5ee45a4329a84c0cb25c2b0c7fae8e.png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/forms/icheck/custom.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/components.css') }}">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/login-register.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    {{-- <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css"> --}}
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 1-column  bg-gray bg-lighten-2 blank-page" data-open="click" data-menu="vertical-menu" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('assets/images/pages/cpp.png') }}" alt="Icon CPP" style="width: 300px;height: 400px" class="d-lg-block d-none">
                        <div class="col-lg-4 col-md-8 col-10 p-0" style="max-width: 300px;">
                            <div class="card m-0" style="width: 100%;height: 400px;">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <div class="p-0"><img src="https://web.smkn2sby.sch.id/media_library/images/9e5ee45a4329a84c0cb25c2b0c7fae8e.png" alt="branding logo"></div>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div id="login" class="card-body pt-0">
                                        <form class="form-horizontal" action="{{ route('login') }}" method="POST">
                                            @csrf
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input
                                                oninvalid="this.setCustomValidity('Mohon diisi dengan lengkap')"
                                                oninput="this.setCustomValidity('')"
                                                type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                                <div class="form-control-position">
                                                    <i class="la la-user"></i>
                                                </div>
                                                @error('username')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input
                                                    oninvalid="this.setCustomValidity('Mohon diisi dengan lengkap')"
                                                    oninput="this.setCustomValidity('')"
                                                    type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required autocomplete="password">
                                                <div class="form-control-position">
                                                    <i class="la la-key"></i>
                                                </div>
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </fieldset>

                                            <div class="form-group row justify-content-end">
                                                <div class="col-sm-6 col-12 text-right"><a id="btnforgot" href="javascript:void(0);" class="card-link" onclick="onClickForgot(this)">Lupa Password?</a></div>
                                            </div>
                                            <button type="submit" class="btn btn-outline-info btn-block"> Masuk</button>
                                        </form>
                                    </div>

                                    <div id="forgot" style="display: none;">
                                        <div class="card-body">
                                            <div class="text-center">
                                                <h4 class="text-bold-700 font-italic">Lupa Password?</h4>
                                                <h4 class="font-italic">Silahkan Hubungi Administrator untuk Informasi Lebih Lanjut</h4>
                                            </div>
                                        </div>
                                        <p class="card-subtitle text-muted text-center mx-2"><span><a id="btnlogin" href="javascript:void(0);" onclick="onClickLogin(this)">Masuk</a></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('assets/vendors/js/forms/icheck/icheck.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('assets/js/scripts/forms/form-login-register.js') }}"></script>
    <!-- END: Page JS-->

    <script>
        function onClickForgot(e) {
            document.getElementById('login').style.display = 'none'
            document.getElementById('forgot').style.display = 'block'
        }
        function onClickLogin(e) {
            document.getElementById('forgot').style.display = 'none'
            document.getElementById('login').style.display = 'block'
        }
    </script>

</body>
<!-- END: Body-->

</html>