<!DOCTYPE html>
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
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin</a>
            </div>

            <!--NAV PESAN -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>

                <!--NAV PEMBERITAHUAN-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>

                <!--NAV PROFILE ADMIN-->
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
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="dashboard.html"><i class="fa fa-fw fa-dashboard"></i> HOME</a>
                    </li>
                    <li>
                        <a href="{{route('barang')}}"><i class="fa fa-fw fa-wrench"></i> Barang </a>
                    </li>
                    <li>
                        <a href="{{route('pembeli')}}"><i class="fa fa-fw fa-users"></i> Pembeli </a>
                    </li>
                    <li>
                        <a href="{{route('supplier')}}"><i class="fa fa-fw fa-user"></i> Supplier </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-edit"></i> Transaksi <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li><a href="{{route('pesanbarang')}}">Pemesanan</a></li>
                            <li><a href="{{route('realisasi')}}">Pembelian</a></li>
                            <li><a href="{{route('penjualan')}}">Penjualan</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#laporan"><i class="fa fa-edit"></i> Laporan<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="laporan" class="collapse">
                                <li><a href="#">Harian</a></li>
                                <li><a href="#">Mingguan</a></li>
                                <li><a href="#">Bulanan</a></li>
                                <li><a href="#">Tahunan</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            PT. Besar Anugerah Kasih Sejati
                        </h1>
                       
                <!-- /.row -->
                    <div class="col-lg-18">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Data </h3>
                            </div>
                            <div class="panel-body">
                                
                                      @yield('content')      
                                   
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <<script src="{{ asset('vendors/js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('vendors/js/bootstrap.min.js') }}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{ asset('vendors/js/plugins/morris/raphael.min.js') }}"></script>
    <script src="{{ asset('vendors/js/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('vendors/js/plugins/morris/morris-data.js') }}"></script>

</body>

</html>
