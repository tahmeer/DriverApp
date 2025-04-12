{{-- header --}}

    @include('Admin.head')

  <!-- Navbar -->
  @include('Admin.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  @include('Admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('main')
 

  {{-- footer --}}
  @include('Admin.footer')
