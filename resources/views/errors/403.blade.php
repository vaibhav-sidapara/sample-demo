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
    <link href="{{ asset("control-panel/css/style.css") }}" rel="stylesheet">
    <link href="{{ asset("control-panel/css/style-responsive.css") }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<div id="page">
    <div class="container">
        <div class="col-lg-4 col-lg-offset-4" style="margin-top: 250px;">
            <div class="lock-screen">
                <h2><i class="fa fa-exclamation-triangle"></i></h2>
                <p>403 Error - Unauthorized Access.</p>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset("control-panel/js/jquery-1.10.2.min.js") }}"></script>
<script src="{{ asset("control-panel/js/bootstrap.min.js") }}"></script>

</body>
</html>
