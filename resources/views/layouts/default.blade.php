<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Gestión de la Configuración y Administración de Software</title>
    <meta name="description" content="Gestión de la Configuración y Administración de Software">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/font-awesome/css/font-awesome.min.css') }}">
    <script src="/assets/js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0">
    
    <link rel="stylesheet" href="admin-panel/css/admin.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="admin-panel/plugins/tagsinput/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="admin-panel/plugins/summernote/summernote.css">
    <link rel="stylesheet" href="admin-panel/plugins/bootstrap-slider/slider.css">
    <link rel="stylesheet" href="admin-panel/plugins/bootstrap-multiselect/bootstrap-multiselect.css">
    <link rel="stylesheet" href="admin-panel/css/admin-skins.css">


  </head>
  <body class="app sidebar-mini rtl">
    @include('includes.header')
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../../assets/img/avatar-{{ auth()->user()->avatar }}.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">{{ auth()->user()->Nombre }}</p>
        </div>
      </div>
      @include('includes.sidebar')
    </aside>
    <main class="app-content">
      <!-- page start-->
      @yield('content')
      <!-- page end-->
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="/assets/js/jquery-3.2.1.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="/assets/js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="/assets/js/plugins/sweetalert.min.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="/assets/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/assets/js/plugins/dataTables.bootstrap.min.js"></script>
    <!-- Page specific javascripts-->
    <script src="/assets/js/functions.js"></script>
    @yield('scripts')
  </body>
</html>