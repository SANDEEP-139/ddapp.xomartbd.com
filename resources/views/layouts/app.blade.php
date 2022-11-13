<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('light-bootstrap/img/apple-icon.png') }}">
        <link rel="icon" type="image/png" href="{{ asset('light-bootstrap/img/favicon.ico') }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>{{ env('app_name') }}</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
        <!-- CSS Files -->
        <link href="{{ asset('light-bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('light-bootstrap/css/light-bootstrap-dashboard.css?v=2.0.0') }} " rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="{{ asset('light-bootstrap/css/demo.css') }}" rel="stylesheet" />
        <link href="{{ asset('light-bootstrap/datatables/css/dataTables.bootstrap.css') }}" rel="stylesheet" />

        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">

        <link rel="stylesheet" href="{{asset('light-bootstrap/css/bd-wizard.css')}}">
        <script src="{{ asset('light-bootstrap/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>

        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
        
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.1/js/bootstrapValidator.min.js"></script>
       
    </head>

    <body>
        <div class="wrapper @if (!auth()->check()) wrapper-full-page @endif">

            @if (auth()->check())
                @include('layouts.navbars.sidebar')
                @include('pages/sidebarstyle')
            @endif

            <div class="@if (auth()->check()) main-panel @endif">
                @include('layouts.navbars.navbar')
                @yield('content')
                @include('layouts.footer.nav')
            </div>

        </div>
       


    </body>
        <!--   Core JS Files   -->
    
    <script src="{{ asset('light-bootstrap/js/core/popper.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('light-bootstrap/js/core/bootstrap.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('light-bootstrap/js/plugins/jquery.sharrre.js') }}"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="{{ asset('light-bootstrap/js/plugins/bootstrap-switch.js') }}"></script>
    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!--  Chartist Plugin  -->
    <script src="{{ asset('light-bootstrap/js/plugins/chartist.min.js') }}"></script>
    <!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
    <script src="{{ asset('light-bootstrap/js/light-bootstrap-dashboard.js?v=2.0.0') }}" type="text/javascript"></script>
    <!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('light-bootstrap/js/demo.js') }}"></script>

    <script src="{{ asset('light-bootstrap/js/core/jquery.validate.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('light-bootstrap/js/core/additional-methods.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('light-bootstrap/js/plugins/bootstrap-table.js') }}"></script>


    <script src="{{ asset('light-bootstrap/js/plugins/jquery.dataTables.min.js') }}" type="text/javascript"></script>

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script src="{{ asset('light-bootstrap/js/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('light-bootstrap/js/bd-wizard.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxxVEVYUFJ2WSb0DZR9q2Sm_kyc4kP_gU&callback=initAutocomplete&libraries=places&v=weekly"></script>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>

    <style>
           .bootstrap-tagsinput .tag {
               margin-right: 2px;
               color: #ffffff;
               background: #2196f3;
               padding: 3px 7px;
               border-radius: 3px;
           }
           .bootstrap-tagsinput {
               width: 100%;
           }
           .has-success .form-control{
            color: #565656 !important;
           }
           small.help-block {
               color: #FF4A55;
           }
       </style>

    @stack('js')
    <script>
      $(document).ready(function () {
      });
    </script>
</html>