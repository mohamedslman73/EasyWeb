
<!DOCTYPE html>
<!--

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>@yield('title') | Admin Panel</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin Theme #4 for blank page layout" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
{{--    <link href="https//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />--}}
    <link href="{{loadAsset("/")}}/backend/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{{loadAsset("/")}}/backend/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{loadAsset("/")}}/backend/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{loadAsset("/")}}/backend/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{loadAsset("/")}}/backend/assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{loadAsset("/")}}/backend/assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{loadAsset("/")}}/backend/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
    <link href="{{loadAsset("/")}}/backend/assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
    <link href="{{loadAsset("/")}}/backend/assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{loadAsset("/")}}/backend/assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="{{loadAsset("/")}}/backend/assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{loadAsset("/")}}/backend/assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <!-- DataTables -->
    <link rel="stylesheet" href="{{loadAsset('/backend/assets/global/plugins/datatables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{loadAsset('/backend/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}">
    <link rel="stylesheet" href="{{loadAsset('/backend/assets/global/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{loadAsset('backend/assets/global/plugins/select2/css/select2-bootstrap.min.css')}}">

    <!-- END DataTables -->
    <link rel="shortcut icon" href="favicon.ico" />
    <style>
        #pac-input,.pac-card{background-color:#fff}#map{height:600px}body,html{height:100%;margin:0;padding:0}#description{font-family:Roboto;font-size:15px;font-weight:300}#infowindow-content .title{font-weight:700}#pac-input,.pac-controls label{font-family:Roboto;font-weight:300}#infowindow-content{display:none}#map #infowindow-content{display:inline}.pac-card{margin:10px 10px 0 0;border-radius:2px 0 0 2px;box-sizing:border-box;-moz-box-sizing:border-box;outline:0;box-shadow:0 2px 6px rgba(0,0,0,.3);font-family:Roboto}#pac-container{padding-bottom:12px;margin-right:12px}.pac-controls{display:inline-block;padding:5px 11px}.pac-controls label{font-size:13px}#pac-input{font-size:15px;margin-right:-113px;padding:0 11px 0 13px;text-overflow:ellipsis;width: 75%}#pac-input:focus{border-color:#4d90fe}#title{color:#fff;background-color:#4d90fe;font-size:25px;font-weight:500;padding:6px 12px}#target{width:345px}
    </style>
</head>
<!-- END HEAD -->

<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="index.html">
                <img src="{{loadAsset("/")}}/backend/assets/layouts/layout4/img/logo-light.png" alt="EasySchools-logo" class="logo-default" /> </a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN PAGE ACTIONS -->

        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
            <!-- BEGIN HEADER SEARCH BOX -->

            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="separator hide"> </li>


                    <li class="separator hide"> </li>
                    <!-- BEGIN TODO DROPDOWN -->

                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="username username-hide-on-mobile"> Nick </span>
                            <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                            <img alt="" class="img-circle" src="{{loadAsset("/")}}/backend/assets/layouts/layout4/img/avatar9.jpg" /> </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="page_user_profile_1.html">
                                    <i class="icon-user"></i> My Profile </a>
                            </li>

                            <li class="divider"> </li>
                            <li>
                                <a href="page_user_lock_1.html">
                                    <i class="icon-lock"></i> Lock Screen </a>
                            </li>
                            <li>
                                <a href="{{loadAsset('admin/logout')}}">
                                    <i class="icon-key"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->

                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <div class="page-sidebar-wrapper">
        <!-- BEGIN SIDEBAR -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
            <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
            <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
            <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                    <li class="nav-item start ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-tasks"></i>
                            <span class="title">Dashboard</span>
                            <span class="arrow"></span>
                        </a>

                            <li class="nav-item start ">
                                <a href="/lead/users" class="nav-link ">
                                    <i class="fa fa-user"></i>
                                    <span class="title">User</span>
                                </a>
                            </li>

                            <li class="nav-item start ">
                                <a href="/lead/schools" class="nav-link ">
                                    <i class="fa fa-building"></i>
                                    <span class="title">School</span>
                                </a>
                            </li>

                            <li class="nav-item start ">
                                <a href="/lead/facilities" class="nav-link ">
                                    <i class="fa fa-file-text-o"></i>
                                    <span class="title">Facility</span>
                                </a>
                            </li>

                            <li class="nav-item start ">
                                <a href="/lead/countries" class="nav-link ">
                                    <i class="fa fa-university"></i>
                                    <span class="title">Country</span>
                                </a>
                            </li>

                            <li class="nav-item start ">
                                <a href="/lead/cities" class="nav-link ">
                                    <i class="fa fa-hospital-o"></i>
                                    <span class="title">Cities</span>
                                </a>
                            </li>

                            <li class="nav-item start ">
                                <a href="/lead/districts" class="nav-link ">
                                    <i class="icon-home"></i>
                                    <span class="title">District</span>
                                </a>
                            </li>

                            <li class="nav-item start ">
                                <a href="/lead/partners" class="nav-link ">
                                    <i class="fa fa-users"></i>
                                    <span class="title">Partner</span>
                                </a>
                            </li>

                            <li class="nav-item start ">
                                <a href="/lead/leads" class="nav-link ">
                                    <i class="fa fa-user-secret"></i>
                                    <span class="title">Admin</span>
                                </a>
                            </li>
                            <li class="nav-item start ">
                                <a href="/lead/questions" class="nav-link ">
                                    <i class="fa fa-question-circle"></i>
                                    <span class="title">questions</span>
                                </a>
                            </li>
                            <li class="nav-item start ">
                                <a href="/lead/articles" class="nav-link ">
                                    <i class="fa fa-book"></i>
                                    <span class="title">Articles</span>
                                </a>
                            </li>

                            <li class="nav-item start ">
                                <a href="/lead/content" class="nav-link ">
                                    <i class="icon-book-open"></i>
                                    <span class="title">Main Content</span>
                                </a>
                            </li>

                            <li class="nav-item start ">
                                <a href="/lead/images" class="nav-link ">
                                    <i class="fa fa-photo"></i>
                                    <span class="title">Main Images</span>
                                </a>
                            </li>

                            <li class="nav-item start ">
                                <a href="/lead/siteoption" class="nav-link ">
                                    <i class="fa fa-photo"></i>
                                    <span class="title">Site Option</span>
                                </a>
                            </li>


            </ul>
            <!-- END SIDEBAR MENU -->
            </ul>
        </div>
        <!-- END SIDEBAR -->
    </div>
    <!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            @yield("content")

        </div>
        <!-- END CONTENT BODY -->
    </div>

</div>

<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner">

        {{date('Y')}} &copy; <a>EasySchools</a> - Admin Dashboard

    </div>
    <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
    </div>
</div>
<!-- END FOOTER -->
<!-- BEGIN QUICK NAV -->
<div class="quick-nav-overlay"></div>
<!-- END QUICK NAV -->
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/respond.min.js"></script>
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/excanvas.min.js"></script>
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/ie8.fix.min.js"></script>
<!-- BEGIN CORE PLUGINS -->
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{loadAsset("/")}}/backend/assets/pages/scripts/components-editors.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{loadAsset("/")}}/backend/assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{loadAsset("/")}}/backend/assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
<script src="{{loadAsset("/")}}/backend/assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
<script src="{{loadAsset("/")}}/backend/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="{{loadAsset("/")}}/backend/assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
<script src="{{loadAsset("/")}}/backend/assets/pages/scripts/components-select2.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
{{--
--}}
<script src="{{loadAsset("/")}}/backend/assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="{{loadAsset("/")}}/backend/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
@yield('script')
<script src="{{loadAsset("backend/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js")}}"></script>
<script id="initMap"></script>
<script>

    $(document).ready(function()
    {
        $('#clickmewow').click(function()
        {
            $('#radio1003').attr('checked', 'checked');
        });
    });

    function initRegions(type) {

        var response    = null;
        var countries   = [];
        var cities      = [];
        var districts   = [];
        $.get('{{url('lead/schools/regionsJson')}}',function ($data) {
            response = $data;
            cities = $data[0].cities;
            if(type == 'add') {
                fillSelectWithData($data, 'select[name="country_id"]');
                fillSelectWithData($data[0].cities, 'select[name="city_id"]');
                fillSelectWithData($data[0].cities[0].districts, 'select[name="district_id"]');
            }else{
                $('input[name="country_id"]').attr('disabled',true);
                $('input[name="city_id"]').attr('disabled',true);
                $('input[name="district_id"]').attr('disabled',true);
                $('.school-register-center').select2();

            }

        });

        function fillSelectWithData($dataSource,$select) {
            $('.school-register-center').select2();
            var select = $($select);
            select.empty();
            if($dataSource.length == 0){
                select.attr('disabled',true);
            }else{
                select.attr('disabled',false);
            }
            $.each($dataSource,function (key,val) {
                select.append($("<option/>").val(val.id).text(val.name_en));
            });
        }

        $('select[name="country_id"]').on('change',function () {
            country_id = $(this).val();
            var citiesObject = $.map( response, function( e,i) {
                return (e.id == country_id)?e.cities:null;
            });
            cities = citiesObject;
            fillSelectWithData(cities,'select[name="city_id"]');
            fillSelectWithData(cities[0].districts,'select[name="district_id"]');
        });

        $('select[name="city_id"]').on('change',function () {
            city_id = $(this).val();
            var districtsObject = $.map( cities, function( e,i) {
                return (e.id == city_id )?e.districts:null;
            });
            districts = districtsObject;
            fillSelectWithData(districtsObject,'select[name="district_id"]');
        })

    }
</script>
</body>
@yield('scripts')
</html>