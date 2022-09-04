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
        <link rel="stylesheet" href="{{ asset('css/toastr.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/quill.snow.css')}}">
        <link rel="stylesheet" href="{{ asset('css/style.css')}}">
        <!-- Scripts -->
        <script src="{{ asset('js/jquery.min.js')}}"></script>
        <script src="{{ asset('js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('js/all.min.js')}}"></script>
        <script src="{{ asset('js/toastr.min.js')}}"></script>
        <script src="{{ asset('js/ckeditor.js')}}"></script>
    </head>
    <body>
        <div class="d-flex" id="wrapper">

            @include('panel.sidebar')

            <!-- Page Content -->
            <div id="page-content-wrapper">

              @include('panel.nav')

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
            <script>
                @if(Session::has('message'))
                    var type = "{{ Session::get('alert-type','info') }}"
                    switch(type){
                        case 'info':
                            toastr.info(" {{ Session::get('message') }} ");
                        break;

                        case 'success':
                            toastr.success(" {{ Session::get('message') }} ");
                        break;

                        case 'warning':
                            toastr.warning(" {{ Session::get('message') }} ");
                        break;

                        case 'error':
                            toastr.error(" {{ Session::get('message') }} ");
                        break;
                    }
                @endif
            </script>
    </body>
</html>
