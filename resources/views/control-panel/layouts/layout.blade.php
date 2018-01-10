<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} Control Panel</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset("favicon/apple-touch-icon.png") }}">
    <link rel="apple-touch-icon" sizes="32x32" href="{{ asset("favicon/favicon-32x32.png") }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("favicon/favicon-16x16.png") }}">
    <link rel="manifest" href="{{ asset("favicon/manifest.json") }}">
    <link rel="mask-icon" href="{{ asset("favicon/safari-pinned-tab.svg") }}" color="#5bbad5">
    <link rel="shortcut icon" href="{{ asset("favicon/favicon.ico") }}">
    <meta name="msapplication-config" content="{{ asset("favicon/browserconfig.xml") }}">
    <meta name="theme-color" content="#ffffff">

    <link href="{{ asset("control-panel/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("control-panel/css/font-awesome.min.css") }}" rel="stylesheet">
    <link href="{{ asset("control-panel/js/gritter/css/jquery.gritter.css") }}" rel="stylesheet">
    <link href="{{ asset("control-panel/lineicons/style.css") }}" rel="stylesheet">
    <link href="{{ asset("control-panel/css/style.css") }}" rel="stylesheet">
    <link href="{{ asset("control-panel/css/style-responsive.css") }}" rel="stylesheet">
    <link href="{{ asset("control-panel/PNotify/pnotify.custom.min.css") }}" rel="stylesheet">
    <link href="{{ asset("control-panel/PNotify/animate.css") }}" rel="stylesheet">
    <link href="{{ asset("control-panel/bootstrap-select/css/bootstrap-select.min.css") }}" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    {{--DataTable--}}
    {{--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">--}}
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.0/css/responsive.bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @stack('stylesheets')

</head>

<body>

<section id="container">

    @include('control-panel.layouts.includes.top-bar')
    @include('control-panel.layouts.includes.side-bar')

    <section id="main-content" style="margin-bottom: 50px;">

        <section class="wrapper">

            <div class="row" style="margin-top: 15px;">

                @yield('main-container')

            </div>

        </section>

    </section>

    {{-- Modal --}}
    <div class="modal fade editModal" tabindex="-1" role="dialog" aria-hidden="true"></div>

    @include('control-panel.layouts.includes.footer')

</section>

<script src="{{ asset("control-panel/js/jquery-1.10.2.min.js") }}"></script>
<script src="{{ asset("control-panel/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("control-panel/bootstrap-select/js/bootstrap-select.js") }}"></script>
<script src="{{ asset("control-panel/js/jquery.dcjqaccordion.2.7.js") }}"></script>
<script src="{{ asset("control-panel/js/jquery.scrollTo.min.js") }}"></script>
<script src="{{ asset("control-panel/js/jquery.nicescroll.js") }}"></script>
<script src="{{ asset("control-panel/js/jquery.sparkline.js") }}"></script>
<script src="{{ asset("control-panel/js/common-scripts.js") }}"></script>
<script src="{{ asset("control-panel/js/gritter/js/jquery.gritter.js") }}"></script>
<script src="{{ asset("control-panel/js/gritter-conf.js") }}"></script>
<script src="{{ asset("control-panel/js/sparkline-chart.js") }}"></script>
<script src="{{ asset("control-panel/js/zabuto_calendar.js") }}"></script>
<script src="{{ asset("control-panel/PNotify/pnotify.custom.min.js") }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

{{--DataTable--}}
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.0/js/responsive.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/scroller/1.4.3/js/dataTables.scroller.min.js"></script>

{{--Dashboard--}}
<script src="{{ asset('control-panel/js/dashboard/result.js') }}"></script>
<script src="{{ asset('control-panel/js/dashboard/event.js') }}"></script>
<script src="{{ asset('control-panel/js/dashboard/template.js') }}"></script>
<script src="{{ asset('control-panel/js/dashboard/dashboard.js') }}"></script>

@stack('scripts')

@if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <script>
            Result.notify('Oh No!', '{{ $error }}', 'error', false);
        </script>
    @endforeach
@endif

@if(session()->has('message'))
    <script>
        Result.notify('Success', '{!!  session()->get('message') !!}', 'success', false);
    </script>
@endif

@if(session()->has('warning'))
    <script>
        Result.notify('Warning!', '{!!  session()->get('warning') !!}', 'warning', false);
    </script>
@endif

</body>
</html>