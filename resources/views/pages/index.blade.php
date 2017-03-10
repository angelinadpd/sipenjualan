o<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PT. Besar Anugerah Kasih Sejati</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('vendors/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('vendors/css/sb-admin.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('vendors/css/plugins/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!--JCALENDER-->
    <link rel="stylesheet" href="{{ asset('vendors/jcalender/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/jcalender/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/jcalender/jquery-ui.structure.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/jcalender/jquery-ui.structure.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/jcalender/jquery-ui.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/jcalender/jquery-ui.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/datepicker/css/datepicker.css') }}">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- NAVIGATION-->
        <a class="navbar-brand" href="{{ url('/') }}">
            PT. Besar Anugerah Kasih Sejati
        </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/default') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                         <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->name }} <b class="caret"></b></a>
                    <li class="dropdown">
                        <ul class="dropdown-menu alert-dropdown">
                        <li class="divider"></li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li>                               
                            <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                        </li>
                    </ul>
                </li>

                            <!--<ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>-->
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- /#wrapper -->

    <!-- jQuery -->
    <<script src="{{ asset('vendors/js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('vendors/js/bootstrap.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('vendors/js/plugins/morris/raphael.min.js') }}"></script>
    <script src="{{ asset('vendors/js/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('vendors/js/plugins/morris/morris-data.js') }}"></script>

    <!--JCALENDER-->
    <script src="{{ asset('vendors/jcalender/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('vendors/jcalender/jquery-ui.js') }}"></script>
    <script src="{{ asset('vendors/jcalender/external/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendors/datepicker/js/bootstrap-datepicker.js') }}"></script>
</body>

</html>
