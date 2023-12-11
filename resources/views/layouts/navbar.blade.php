<header class="p-3 bg-dark text-white" dir="rtl">
  <div class="container">


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
          
             <a href="{{ route('login.perform') }}" class="btn btn-outline-light me-2">تسجيل الدخول</a>
             <a href="{{ route('register.perform') }}" class="btn btn-warning">اشتراك</a>
           </div>
         @endguest</li>
      </ul>



 </nav>
 </div>

      
      
      
    
</header>