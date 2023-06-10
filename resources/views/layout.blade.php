<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('build/assets/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('build/assets/style.css') }}" rel="stylesheet">
    
    

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    



    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('build/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('build/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">

    <title>Gestion investissement</title>
</head>
<body >
    <div class="container"  >
        @yield('content')
  
      </div>
    
</body>
<script src="{{ asset('build/assets/jquery-3.6.0.js') }}"></script>
<script src="{{ asset('build/assets/bootstrap.js') }}"></script>
<script src="{{ asset('build/assets/script.js') }}"></script>
<script src="{{ asset('build/assets/main.js') }}"></script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('build/lib/chart/chart.min.js') }}"></script>
<script src="{{ asset('build/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('build/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('build/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('build/lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ asset('build/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('build/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

</html>