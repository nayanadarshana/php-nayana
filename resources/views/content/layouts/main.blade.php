<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Plugins css -->
    <link href="{{asset('css/bootstrap-creative.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet"/>
    <link href="{{asset('css/app-creative.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet"/>


    <!-- icons -->
    <link href="{{asset('css/icons.css')}}" rel="stylesheet" type="text/css"/>

    @yield('styles')

    <style>
        .topnav .dropdown-item.active {
            background-color: transparent;
            color: black;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        .btn-primary {
            box-shadow: none !important;
            background-color: #3e4a56 !important;
            border-color: #3e4a56 !important;
        }

        .btn-outline-primary {
            box-shadow: none !important;
            border-color: #3e4a56 !important;
            color: #3e4a56 !important;
        }

        .btn-outline-primary:hover {
            background-color: #3e4a56 !important;
            color: #ffffff !important;
        }

        .badge-primary {
            box-shadow: none !important;
            background-color: #3e4a56;
            border-color: #3e4a56;
        }

        .btn-success, .badge-success {
            box-shadow: none !important;
            background-color: rgba(123, 192, 2, 0.9) !important;
            border-color: rgba(123, 192, 2, 0.9) !important;
        }

        .btn-outline-success {
            border-color: rgba(123, 192, 2, 0.9) !important;
            color: rgba(123, 192, 2, 0.9) !important;
        }

        .btn-outline-success:hover {
            background-color: rgba(123, 192, 2, 0.9) !important;
            color: #ffffff !important;
        }

        .bg-primary {
            background-color: #3e4a56 !important;
        }

        .text-success {
            color: rgba(123, 192, 2, 0.9) !important;
        }

        .btn-info, .badge-info {
            box-shadow: none !important;
            background-color: rgb(255, 122, 3) !important;
            border-color: rgb(255, 122, 3) !important;
        }

        @media (min-width: 1400px) {
            .modal-xxl {
                max-width: 1370px;
            }
        }

        @media (max-width: 1399px) {
            .modal-xxl {
                max-width: calc(100% - 30px);
            }
        }

        .modal-xxxl {
            max-width: calc(100% - 30px);
        }

        body[data-layout-mode=two-column] .sidebar-icon-menu {
            background-color: #3e4a56 !important;
        }

        element.style {
        }

        .page-item.active .page-link {
            background-color: #3e4a56 !important;
            border-color: #3e4a56 !important;
        }

        body[data-layout-mode=two-column] .sidebar-main-menu .nav .menuitem-active > a.nav-link {
            color: #3e4a56;
            background-color: #edeeff;
        }

        a.nav-link:hover {
            color: black !important;
            background-color: white !important;
        }

        body[data-layout-mode=horizontal][data-topbar-color=light] .topnav .navbar-nav > .dropdown > a:hover {
            color: black !important;
        }

        .sidebar-content i {
            color: white;
        }

        .help-block {
            color: #f75964;
        }

        .error-help-block {
            color: #f75964;
        }

        .error {
            border-color: #f75964;
        }

        .valid {
            border-color: #ced4da;
        }

        .text-primary {
            color: #3e4a56 !important;
        }

        .container-fluid {
            min-width: 100% !important;
        }

        .pointer-mouse {
            cursor: pointer !important;
        }

        .topnav .navbar-nav .nav-item .dropdown.active > a.dropdown-toggle {
            color: black !important;
        }

        .topnav .navbar-nav .nav-item .dropdown > a:hover {
            color: black !important;
        }

        @media (min-width: 768px) {
            body[data-sidebar-size=condensed]:not([data-layout=compact]) {
                min-height: auto;
            }
        }

        .list-wrapper {
            padding: 15px;
            overflow: hidden;
        }

        .list-item {
            border: 1px solid #EEE;
            background: #FFF;
            margin-bottom: 10px;
            padding: 10px;
            box-shadow: 0px 0px 10px 0px #EEE;
        }

        .list-item h4 {
            color: #FF7182;
            font-size: 18px;
            margin: 0 0 5px;
        }

        .list-item p {
            margin: 0;
        }

        .simple-pagination ul {
            margin: 0 0 20px;
            padding: 0;
            list-style: none;
            text-align: center;
        }

        .simple-pagination li {
            display: inline-block;
            margin-right: 5px;
        }

        .light-theme {
            box-shadow: none !important;
        }

        .simple-pagination li a,
        .simple-pagination li span {
            color: #666;
            padding: 5px 10px;
            text-decoration: none;
            border: 1px solid #EEE;
            background-color: #FFF;
            box-shadow: 0px 0px 10px 0px #EEE;
        }

        .simple-pagination .current {
            color: #FFF;
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .simple-pagination .prev.current,
        .simple-pagination .next.current {
            background: #6c757d;
        }

        .right-bar-enabled .rightbar-overlay {
            display: none;
        }
    </style>

    {{-- Doc Card --}}
    <style>
        .doc-card {
            display: block;
            margin-bottom: 10px;
            border: 1px solid #ced4da;
            border-radius: .5rem;
            overflow: hidden;
        }

        .doc-card::after,
        .doc-card::before {
            display: block;
            content: '';
            clear: both;
        }

        .doc-card .doc-avatar {
            display: block;
            float: left;
            width: 60px;
            height: 60px;
        }

        .doc-card .doc-avatar a > img {
            display: block;
            width: 100%;
            height: 100%;
        }

        .doc-card .doc-avatar > .fa {
            font-size: 40px;
            padding: 10px;
        }

        .doc-card .doc-content {
            display: block;
            padding: 10px;
            float: left;
            width: calc(100% - 60px);
            position: relative;
        }

        .doc-card .doc-content .style-title {
            margin-top: 12px;
            margin-bottom: 12px;
            font-size: .8rem;
        }

        .doc-card .doc-content .doc-down-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            margin-top: -10px;
            margin-right: 5px;
            cursor: pointer;
            font-size: 20px;
        }
    </style>
    {{-- END - Doc Card --}}


</head>
@if(!(Request::get('isiframe')))
    <body class="loading" data-layout-mode="horizontal"
          data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": true}'>
    @endif

    <div id="wrapper">
        @if(!(Request::get('isiframe')))
            @include('content.layouts.top-bar')

            {{--        @include('partials.side-menu')--}}
        @endif

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        @yield('content')

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
        @if(!(Request::get('isiframe')))
            @include('content.layouts.footer')
        @endif
    </div>

    <script src="{{asset('js/vendor.js')}}"></script>

    <!-- App js-->
    <script src="{{asset('js/app.js')}}"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
    @yield('jscript')

    </body>
</html>
