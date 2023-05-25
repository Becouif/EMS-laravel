@include('admin.layouts.navbar')
  @include('admin.layouts.sidebar')  

            <!-- start of dashboard / content  -->
            <div id="layoutSidenav_content">
              <main>
              @yield('content')  
              </main>
            
      
      <!-- start of footer        -->
      @include('admin.layouts.footer')
