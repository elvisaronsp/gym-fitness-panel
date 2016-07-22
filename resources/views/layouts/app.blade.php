<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>fitness club - karnety</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ url('/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('/backend/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ url('/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- ladda -->
    <link href="{{ url('/bower_components/ladda/dist/ladda-themeless.min.css') }}" rel="stylesheet">
    
    <link href="{{ url('/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet"/>
    
    <!--datatables-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/t/bs-3.3.6/dt-1.10.11/datatables.min.css"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    
    <script>
        var baseUrl = "{{ url('/') }}";
    </script>
    <!-- jQuery -->
    <script src="{{ url('/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('/bower_components/bootstrap/js/popover.js') }}"></script>
    
    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ url('/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ url('/backend/js/sb-admin-2.js') }}"></script>

    <!-- ladda -->
    <script src="{{ url('/bower_components/ladda/dist/spin.min.js') }}"></script>
    <script src="{{ url('/bower_components/ladda/dist/ladda.min.js') }}"></script>
    
    <!--tinymce-->
    <script src="{{ url('/bower_components/tinymce/tinymce.min.js') }}"></script>
    
    <script type="text/javascript" src="{{ url('/bower_components/moment/min/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>

    <!--datatables-->
   <script type="text/javascript" src="https://cdn.datatables.net/t/bs-3.3.6/dt-1.10.11/datatables.min.js"></script>
    
    <!-- app -->
    <script src="{{ url('/backend/js/app.js') }}"></script> 
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('logo-cb2.png') }}" style="height: 50px; margin-top:-15px"></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links pull-right">
				<li>
					<a href="{{ url('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
				</li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{ route('panel.dashboard.index') }}"><i class="fa fa-info-circle fa-fw"></i> Informator</a>
                        </li>
                        <li>
                            <a href="{{ route('panel.customer.index') }}"><i class="fa fa-user fa-fw"></i> Klienci</a>
                        </li>
                        <li>
                            <a href="{{ route('panel.customerVisit.index') }}"><i class="fa fa-user fa-fw"></i> Klienci - wejścia</a>
                        </li>
                        <li>
                            <a href="{{ route('panel.customerSingleEntry.index') }}"><i class="fa fa-male fa-fw"></i> Wejścia jednorazowe</a>
                        </li>
                        <li>
                            <a href="{{ route('panel.product.index') }}"><i class="fa fa fa-table fa-fw"></i> Magazyn</a>
                        </li>
                        <li>
                            <a href="{{ route('panel.report.index') }}"><i class="fa fa-file-pdf-o fa-fw"></i> Raporty</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
</body>

</html>
