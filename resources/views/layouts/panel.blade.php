<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>وبلاگ {{ $title ?? '' }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.rtl.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/all.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/style.css')}}">
        <!-- Scripts -->
        <script src="{{ asset('js/jquery.min.js')}}"></script>
        <script src="{{ asset('js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('js/all.min.js')}}"></script>
    </head>
    <body>
        <div class="d-flex" id="wrapper">

            <!-- Sidebar -->
            <div class="bg-light border-right" id="sidebar-wrapper">
              <div class="sidebar-heading text-center">زهره حسینی</div>
              <div class="list-group list-group-flush">
                کاربر : {{ auth()->user()->name }}
                <br>
                نوع کاربر : {{ auth()->user()->getRolePersian() }}
              </div>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">

              <nav class="navbar navbar-expand-lg navbar-light">
                <a href="#" id="menu-toggle">
                    <span class="navbar-toggler-icon"></span>
                </a>
              </nav>

                <div class="container-fluid">
                    <div class="card-body">
                        {{ $slot }}
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->
          </div>
          <!-- /#wrapper -->
          <script>
            $("#menu-toggle").click(function(e) {
              e.preventDefault();
              $("#wrapper").toggleClass("toggled");
            });
          </script>
    </body>
</html>
