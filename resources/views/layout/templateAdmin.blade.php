<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laptop-Mañay</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('plantillaAdmin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plantillaAdmin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('plantillaAdmin/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('plantillaAdmin/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('plantillaAdmin/dist/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('plantillaAdmin/bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('plantillaAdmin/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('plantillaAdmin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plantillaAdmin/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('plantillaAdmin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

  <link rel="stylesheet" href="{{asset('selectMultiple/css/select2.min.css')}}">
  
  <script src="{{asset('plantillaAdmin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plantillaAdmin/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
  <script src="{{asset('selectMultiple/js/select2.min.js')}}"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{url('admin')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>D</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Sistema Laptop mañay</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
           
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              <span class="hidden-xs">Sistema Laptop mañay</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <p>
                  Admin - laptop-mañay  
                  <small>2018</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                 
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  
                </div>
                <div class="pull-right">
                  <a href="{{url('usuario/logout')}}" class="btn btn-default btn-flat">Cerrar sesión</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MANTENIMIENTO</li>
        <li>
          <a href="{{url('usuario/lista')}}">
            <i class="fa fa-circle"></i> <span>Usuarios</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="{{url('cliente/lista')}}">
            <i class="fa fa-circle"></i> <span>Cliente</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="{{url('laptop/lista')}}">
            <i class="fa fa-circle"></i> <span>Laptops</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="header">PROCESOS</li>
        <li>
          <a href="{{url('prestamo/lista')}}">
            <i class="fa fa-calendar"></i> <span>Prestamo</span>
            <span class="pull-right-container">
            </span>
          </a>
          
        </li>
        <li class="header">REPORTES</li>
        <li>
          <a href="{{url('reporte/ganancia')}}">
            <i class="fa fa-calendar"></i> <span>Ganancia del dia</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="{{url('reporte/laptopprestamo')}}">
            <i class="fa fa-calendar"></i> <span>Laptop mas prestados</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    @if(count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
  @if (session()->has('msj-correcto')) 
      <div class="alert alert-success" >
        {{session()->get('msj-correcto')}} 
        {{session()->forget('msj-correcto')}} 
      </div>
  @elseif(session()->has('msj-error'))
      <div class="alert alert-danger">
        {{session()->get('msj-error')}}
        {{session()->forget('msj-error')}} 
      </div>
  @endif

  @yield('cuerpoInterno')

  </div>
  
 <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2018 <a href="#">C. Desarrollo Orientado a Internet</a>.</strong> Laptop - Mañay.
  </footer> 
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('plantillaAdmin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{asset('plantillaAdmin/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{asset('plantillaAdmin/bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plantillaAdmin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('plantillaAdmin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('plantillaAdmin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plantillaAdmin/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plantillaAdmin/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('plantillaAdmin/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('plantillaAdmin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('plantillaAdmin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('plantillaAdmin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('plantillaAdmin/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('plantillaAdmin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('plantillaAdmin/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('plantillaAdmin/dist/js/demo.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('plantillaAdmin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>

</body>
</html>
