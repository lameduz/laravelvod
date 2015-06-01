<!DOCTYPE html>
<html>
<head>
    <title>Vodospace</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
    <link href="{{URL::asset('css/global/plugins/bootstrap.min.css')}}"rel="stylesheet" type="text/css"/>

    <link href="{{URL::asset('css/layout/printsheet.css')}}"rel="stylesheet" type="text/css" media="print"/>
</head>
<body>
<div class="row">
    <div class="container">
        @yield('content')
    </div>
</div>
</body>