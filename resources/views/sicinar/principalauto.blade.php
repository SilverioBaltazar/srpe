<!DOCTYPE html>
<html>
<head> 
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>@yield('title','Inicio') | SRPE v.1</title>
      <link rel="shortcut icon" type="image/png" href="{{ asset('images/Edomex.png') }}"/>
      <!-- Tell the browser to be responsive to screen width -->
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.7 -->
      <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
      <!-- Ionicons -->
      <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
      <!-- Theme style -->
      <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css') }}">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css') }}">
      <!-- Morris chart -->
      <link rel="stylesheet" href="{{ asset('bower_components/morris.js/morris.css') }}">
      <!-- jvectormap -->
      <link rel="stylesheet" href="{{ asset('bower_components/jvectormap/jquery-jvectormap.css') }}">
      <!-- Date Picker -->
      <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
      <!-- bootstrap wysihtml5 - text editor -->
      <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
      <!-- Google Font -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

      <section>@yield('links')</section>

      @toastr_css 
    </head>
    <body class="hold-transition skin-green sidebar-mini">
      <img src="{{ asset('images/Logo-Gobierno.png') }}" border="0" width="150" height="40" style="margin-left: 200px;margin-right: 60%">
      <!--<img src="{{ asset('images/japem.jpg') }}"  border="0" width="90" height="50" style="margin-right">-->
      <img src="{{ asset('images/Edomex.png') }}" border="0" width="50" height="40" style="margin-right">
      <br>
      <div class="wrapper">
        @jquery
        @toastr_js
        @toastr_render
        
        <!--
        $nombre       = session()->get('userlog');
        $pass         = session()->get('passlog');
        $rango        = session()->get('rango');        
        -->
        
        @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <ul>
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
            </div>
        @endif

        <header class="main-header">
          <!-- Logo -->
          <a href="#" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>S</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b> SRPE v.1</b></span>
          </a>

          <!-- Header Navbar: style can be found in header.less -->
          <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu"> 
              <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!--<img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">-->
                    <span class="hidden-xs"><section>@yield('nombre')</section></span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <!--<img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">-->
                      <p>
                        <section style="color:white;">@yield('nombre')</section>
                          <small style="color:blue;">Tipo: <section style="color:white;">@yield('usuario')</section></small>
                      </p>
                    </li>

                    <!-- Menu Footer-->
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
          <!-- sidebar: style can be found in sidebar.less -->
          <section class="sidebar">
            <ul class="sidebar-menu" data-widget="tree">
              <li class="header">Menú principal</li>

              <li  class="treeview">              
                  @if(session()->get('rango') !== '0')
                  <a href="#"><i class="fa fa-users"></i> <span>Auto registro</span>
                      <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                  </a>
                  @endif
              </li> 
              
            </ul>
          </section>
          <!-- /.sidebar -->
        </aside>
        <section>@yield('content')</section>
        <footer class="main-footer">
          <div class="pull-right hidden-xs"><b>Version 1.0</b> UDITI. </div>
          <strong>
          Copyright &copy; 2021. Derechos reservados. Secretaría de Desarrollo Social - Dirección General de Bienestar Social y Fortalecimiento Familiar.  
          </strong>
        </footer>
      </div>
      <!-- jQuery 3 -->
      <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
      <!-- Bootstrap 3.3.7 -->
      <script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
      <!-- FastClick -->
      <script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
      <!-- AdminLTE App -->
      <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="{{ asset('dist/js/demo.js') }}"></script>

      <section>@yield('request')</section>
      <section>@yield('javascrpt')</section>

    </body>
</html>