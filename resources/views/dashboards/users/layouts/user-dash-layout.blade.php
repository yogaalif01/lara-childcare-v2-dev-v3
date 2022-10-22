<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <base href="{{ \URL::to('/') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  @stack('css')
</head>
<body class="sidebar-mini layout-fixed text-sm">
<div class="wrapper">

  <div class="container">
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-light" style="background-color: #C6FFDD !important;">
      <a class="navbar-brand" href="#">
        <img src="/docs/4.5/assets/brand/bootstrap-solid.svg" width="30" height="30" alt="" loading="lazy">
      </a>
      <div>
        <a class="mr-2 text-dark" href="{{ url('/user/registerChild') }}">
          Daftarkan Anak
        </a>
        <!-- <a class="mr-2 text-dark" href="/user/report">
          Data Anak
        </a> -->
        <a class="mr-2 text-dark" href="{{ url('/cctv') }}">
          CCTV
        </a>
        <a class="mr-2 text-dark" href="{{ url('/user/report') }}">
          Laporan Anak
        </a>
        <a class="mr-2 text-dark" href="{{ url('/user/report') }}">
          Schedule Anak
        </a>
      </div>
      <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </nav>

    <!-- <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="data:image/jpeg;base64,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" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="..." class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="..." class="d-block w-100" alt="...">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div> -->

    <!-- Content -->
    @yield('content')
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            searching: false, paging: false, info: false
        } );
    } );
</script>
</body>
</html>
