<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title')</title>
  
    @include('Templates.Head')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <!-- Navbar -->
        @include('Templates.Navbar')
      <!-- Sidebar -->
        @include('Templates.Sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
      <!-- Breadcrumb -->
           @yield('breadcrumb')
      <!-- content -->
           @yield('content')
        </section>
        @yield('modal')
      </div>
      <!-- Footer -->
      @include('Templates.Footer')
    </div>
  </div>
      <!-- Script -->
      @include('Templates.Script')
</body>
</html>
