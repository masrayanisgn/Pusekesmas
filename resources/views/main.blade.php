
<!DOCTYPE html>
<html lang="en">
    @include('partials._header')
<body>
<div class="container-scroller">
    
@include('partials._navbar')
      <div class="container-fluid page-body-wrapper">
    @include('partials._sidebar')
        <div class="main-panel">
          <div class="content-wrapper">
          @yield('content')
          </div>
          <!-- content-wrapper ends -->
        @include('partials._footer')
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('partials._scripts')
  </body>
</html>