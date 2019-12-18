<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta tags begin -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Meta tags end -->

    <title>AluthAds - Admin Panel</title>

    <!-- Styles begin -->
    <link href="{{asset('admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/sb-admin.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    <!-- Styles end -->

</head>
<body class="bg-dark">

    <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('admin/vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('admin/js/sb-admin.min.js')}}"></script>

    @yield('content')
    @yield('script')

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "order": [[ 7, "desc" ]]
            });
        });
    </script>

</body>

</html>
