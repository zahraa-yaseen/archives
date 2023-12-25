<!DOCTYPE html>
<html lang="ar" dir="rtl" >
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> نظام ارشفه</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  
  
  
  <!-- 
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
   Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars 
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
 
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
 
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">-->
  <style>
      .nav-item p {
        color: #bdc6d0;
       
      }
      body{
        direction: ltr;
      }
      </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed" >
<div class="wrapper">

  <!-- Preloader -->
  @if( $message =Session::get('success'))
                    <div class="card-header">
                            <h5 class="card-title"> {{$message}}</h5>
                        </div>
                    @endif
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    
    <ul class="navbar-nav">
      
      <li class="nav-item" >
        @auth
           
          
             <a href="{{ route('logout.perform') }}" class="btn btn-primary me-2">تسجيل خروج </a>
              <span style ="  font-size: 26px; font-family: initial;">{{ Auth::user()->name }}</span>
           </div>
         @endauth
         </li>
         <li class="nav-item">
         @guest
          
             <a href="{{ route('login.show') }}" class="btn btn-outline-light me-2">تسجيل الدخول</a>
             <a href="{{ route('register.perform') }}" class="btn btn-warning">اشتراك</a>
           </div>
         @endguest</li>
      </ul>



 </nav>

<!-------------------------------------------------------------------------------------------------------------------->

<!--
 
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="right: 0;direction: ltr"  >
    
    
    @auth
         
         <div class="text-end">
           <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">تسجيل خروج </a>
            <a style =" color:#bdc6d0; font-size: 26px;
    font-family: initial;">{{ Auth::user()->name }}</a>
         </div>
       @endauth
 
       @guest
         <div class="text-end">
           <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">تسجيل الدخول</a>
           <a href="{{ route('register.perform') }}" class="btn btn-warning">اشتراك</a>
         </div>
       @endguest

   
     
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="{{ route('user_types.create') }}" class="nav-link">
           
              <p>
                اضافة مستخدمين 
               
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link">
           
              <p>
                 ادارة مستخدمين 
               
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('departs.index') }}" class="nav-link">
            
              <p>
                الاقسام
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('book_types.index') }}" class="nav-link">
           
              <p>
                الكتب 
                
              </p>
            </a>
          </li>

    </ul>
    </nav>
 
    
    </div>
  </aside>

    -->

<!------------------------------------------------------------------------------------------------------------->





  <div class="content-wrapper" style=" margin-left: 0px";>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="">الارشفه</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <!--<li class="breadcrumb-item active">Dashboard v1</li>-->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
       
       
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
           
            <div class="inner">
                <h3>150</h3>

                
                <a href="{{ route('departs.index') }}" class="btn btn-outline-light me-2">  الاقسام </a>

              </div>


              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                11</h3>

             
                <a href="{{ route('users.index') }}" class="btn btn-outline-light me-2"> ادارة المستخدمين   </a>

              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>22</h3>

                <a href="{{ route('user_types.create') }}" class="btn btn-outline-light me-2">اضافة نوع المستخدم  </a>

              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
       
          <div class="col-lg-3 col-6" >
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>
                <a href="{{ route('book_types.index') }}" class="btn btn-outline-light me-2"> ادارة كتب</a>

               
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
         
            
            </div>
          </div>
          <!-- ./col -->
        </div>


        <!---------------------------------------------------------------------------------------------->
        <!-- /.row -->
        <!-- Main row -->







        
  <footer class="main-footer">
  
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
