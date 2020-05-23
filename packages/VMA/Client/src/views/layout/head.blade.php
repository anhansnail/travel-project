<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <link rel="icon" href="<?php echo getUrl('/'); ?>/BucketAdmin/html/browser_icon.jpg">

    <title>{{__('MINH ANH TRAVEL')}}</title>



    <!-- Bootstrap core CSS -->
    <link href="<?php echo getUrl('/'); ?>/ClientAsset/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo getUrl('/'); ?>/ClientAsset/css/jquery.bxslider.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <link href="<?php echo getUrl('/'); ?>/ClientAsset/css/style.css" rel="stylesheet">
    <link href="<?php echo getUrl('/'); ?>/ClientAsset/css/dropdown-menu.css" rel="stylesheet">
    @yield('client_css')

    <script src="<?php echo getUrl('/'); ?>/ClientAsset/js/jquery.min.js" type="text/javascript"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo getUrl('/'); ?>/ClientAsset/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo getUrl('/'); ?>/ClientAsset/js/jquery.sticky.js"></script>
    <script type="text/javascript" src="<?php echo getUrl('/'); ?>/ClientAsset/js/sticky-header.js"></script>
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    {!! \VMA\User\Library\CGlobal::$extraHeaderJS !!}
    {!! \VMA\User\Library\CGlobal::$extraHeaderCSS !!}
    <!--[if lt IE 9]>
    <script type="text/javascript">
        var WEB_ROOT = "{{URL::to('/')}}";
    </script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

    <![endif]-->
</head>
