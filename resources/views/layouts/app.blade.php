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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>UJI KOMPETENSI C++ | SMK NEGERI 2 SURABAYA</title>
    <link rel="apple-touch-icon" href="{{ asset('assets/images/logo/smekda.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo/smekda.png') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <script src="//cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/tables/datatable/datatables.min.css') }}">
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
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/user-feed.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/page-users.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" href="{{ asset('assets/codemirror/lib/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/codemirror/theme/dracula.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/codemirror/theme/solarized.css') }}">
    <!-- END: Custom CSS-->
    
    @yield('css')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
@yield('body', View::make('layouts.partials.body'))

    <!-- BEGIN: Header-->
    @include('layouts.partials.header')
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    @yield('menu')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                @yield('content-header')
            </div>
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2022 <a class="text-bold-800 grey darken-2" href="javascript:void(0);">ME</a></span><span class="float-md-right d-none d-lg-block">Hand-crafted & Made with<i class="ft-heart pink"></i><span id="scroll-top"></span></span></p>
    </footer>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/datatable/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/tables/buttons.print.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('assets/js/scripts/tables/datatables/datatable-basic.js') }}"></script>
    <script src="{{ asset('assets/js/scripts/tables/datatables/datatable-advanced.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/scripts/modal/components-modal.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('assets/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ asset('assets/codemirror/mode/xml/xml.js') }}"></script>
    <script src="{{ asset('assets/codemirror/mode/clike/clike.js') }}"></script>
    <script src="{{ asset('assets/codemirror/addon/edit/closebrackets.js') }}"></script>
    <script src="{{ asset('assets/codemirror/addon/edit/matchbrackets.js') }}"></script>
    <script src="{{ asset('assets/codemirror/addon/selection/active-line.js') }}"></script>
    <script src="{{ asset('assets/codemirror/addon/display/placeholder.js') }}"></script>
    <script src="{{ asset('assets/codemirror/addon/display/autorefresh.js') }}"></script>
    <!-- END: Page JS-->

    <script>
        $('.btn-modal').on('click', function(e) {
            var t = $(this).data('container')
            $.ajax({
                url: $(this).data('href'),
                dataType: 'html',
                success: function(e) {
                    $(t).html(e).modal('show')
                }
            })
        })
        $('.btn-delete').on('click', function(e) {
            var btn = $(this);
            e.stopPropagation();
            Swal.fire({
                title: 'Anda yakin?',
                text: 'Anda akan menghapus data ini!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: btn.data('href'),
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        success: function(res) {
                            if(res.status) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil',
                                    text: res.message
                                }).then((result) => {
                                    window.location.href = res.url
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: res.message
                                })
                            }
                        }
                    })
                }
            })
        })
    </script>
    <script>
        $('div.alert').delay(5000).fadeOut(350);
    </script>
  
    @yield('js')

</body>
<!-- END: Body-->

</html>