<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>E-Procurement</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="{{ asset('assets/front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/front/css/style.css') }}" rel="stylesheet">

</head>

<body>

    <!-- ======= Navbar ======= -->
    @include('includes.navbar')
    <!-- ======= End of Navbar ======= -->

    @yield('content')

   <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
