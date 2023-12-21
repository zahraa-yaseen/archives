<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title> نظام ارشفه</title>
    <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">

<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">



 
<link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
 
<link rel="stylesheet" href="dist/css/adminlte.min.css">

<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">

<link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">




    <style>
       
       p{
    color: black; 
}
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
   
    <link href="{!! url('assets/css/app.css') !!}" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    
    


    <main class="container">
    

    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="right: 0;direction: ltr"  >
    
    
    @auth
         
         <div class="text-end">
           <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2">تسجيل خروج </a>
            <a >{{ Auth::user()->name }}</a>
         </div>
       @endauth
 
       @guest
         <div class="text-end">
           <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">تسجيل الدخول</a>
           <a href="{{ route('register.perform') }}" class="btn btn-warning">اشتراك</a>
         </div>
       @endguest

   
     
      <nav class="mt-2" style="text-align: right;">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
        <li class="nav-item">
            <a href="{{ route('home.index') }}" class="nav-link">
           
             <p>
                 الواجهه الرئيسيه 
    </p>
              
            </a>
          </li>
         
          <li class="nav-item">
            <a href="{{ route('user_types.create') }}" class="nav-link">
           
             <p>
                اضافة نوع  مستخدم 
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
 
  
        @yield('content')
    </main>
    <script src="js/js.js" ></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
   
  </body>
</html>