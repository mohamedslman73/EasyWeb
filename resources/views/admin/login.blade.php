<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>Admin Area </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{loadAsset("/")}}/backend/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{{loadAsset("/")}}/backend/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{loadAsset("/")}}/backend/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{loadAsset("/")}}/backend/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{loadAsset("/")}}/backend/assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{loadAsset("/")}}/backend/assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{loadAsset("/")}}/backend/assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{loadAsset("/")}}/backend/assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{loadAsset("/")}}/backend/assets/pages/css/login-4.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->

<body class=" login">
<!-- BEGIN LOGO -->
<div class="logo">
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="{{route('admin.postLogin')}}" method="post">
        {{csrf_field()}}
        <h3 class="form-title">Login to your account</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span> Enter any email and password. </span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Email</label>
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
        </div>
        <div class="form-actions">
            <label class="rememberme mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="remember" value="1" /> Remember me
                <span></span>
            </label>
            <button type="submit" class="btn green pull-right"> Login </button>
        </div>
    </form>
    <!-- END LOGIN FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright"> {{date('Y')}} &copy; EasySchools - Admin Dashboard . </div>
<!-- END COPYRIGHT -->

<script src="{{loadAsset("/")}}/backend/assets/global/plugins/respond.min.js"></script>
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/excanvas.min.js"></script>
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/ie8.fix.min.js"></script>

<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{loadAsset("/")}}/backend/assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{loadAsset("/")}}/backend/assets/pages/scripts/login-4.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->

<script>
    $(document).ready(function () {
        $.backstretch([

            "{{loadAsset("/")}}/backend/assets/pages/media/bg/1.jpg",
            "{{loadAsset("/")}}/backend/assets/pages/media/bg/2.jpeg",
            "{{loadAsset("/")}}/backend/assets/pages/media/bg/3.jpeg",

        ], {
            fade: 1000,
            duration: 8000
        });

        $('form').attr('autocomplete', "nope");

    });
    $(document).ready(function()
    {
        $('#clickmewow').click(function()
        {
            $('#radio1003').attr('checked', 'checked');
        });
    })
</script>
</body>

</html>