
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- include semua file asset blanjaloka --}}
    <link rel="shortcut icon" href="http://accounting.com.my/wp-content/uploads/2016/08/buy_logo1.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    {{-- icon --}}
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('template/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('template/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  {{-- template blanjaloka --}}
    <link rel="stylesheet" href="{{asset('assets/blanjaloka/css/blanjaloka.css')}}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/blanjaloka/css/adminlte.min.css') }}"> --}}
    
    <link rel="stylesheet" href="{{ asset('template/blanjaloka/boostrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/blanjaloka/css/style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" integrity="sha512-zxBiDORGDEAYDdKLuYU9X/JaJo/DPzE42UubfBw9yg8Qvb2YRRIQ8v4KsGHOx2H1/+sdSXyXxLXv5r7tHc9ygg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      .badge-cai-success{
          background: rgba(0, 131, 143, 0.2);
          color: rgba(0, 131, 143, 1);
      }
    </style>
    <script src="{{asset('assets/blanjaloka/js/blanjaloka.js')}}"></script>
    {{-- <script src="{{asset('template/blanjaloka/bootstrap/js/bootstrap.min.js')}}"></script> --}}
    <script src="{{asset('template/blanjaloka/jquery/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js" integrity="sha512-Gs+PsXsGkmr+15rqObPJbenQ2wB3qYvTHuJO6YJzPe/dTLvhy0fmae2BcnaozxDo5iaF8emzmCZWbQ1XXiX2Ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

    {{-- fontawesome --}}
    <script defer src="https://use.fontawesome.com/releases/v6.1.1/js/all.js" integrity="sha384-xBXmu0dk1bEoiwd71wOonQLyH+VpgR1XcDH3rtxrLww5ajNTuMvBdL5SOiFZnNdp" crossorigin="anonymous"></script>

    <!-- DataTables  & Plugins -->
  <script src="{{ asset('template/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('template/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('template/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('template/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('template/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('template/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('template/admin/plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('template/admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('template/admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('template/admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('template/admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('template/admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="{{asset('template/admin/plugins/daterangepicker/daterangepicker.js')}}"></script>


    <title>{{$title}} | Blanjaloka</title>
  </head>

  <body style="overflow-x: hidden;">

    {{-- include navbar file --}}
    @include('web.partition.navbar')

    {{-- Rendering halaman dinamis  --}}
    @yield('content')
    
    {{-- include footer file --}}
    @include('web.partition.footer')
  </body>
</html>