<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>UKM-HDNC UNG</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo/ukm-logo.ico') }}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('assets/css/home-styles.css') }}" rel="stylesheet" />
    <!-- css tambahan-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/owlcarousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/owlcarousel/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-5.1.3/css/bootstrap.min.css') }}">
    <!-- icon and font -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome-free-6.2.0/css/all.min.css') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    @yield('css')
</head>

<body class="bg-light">

    <!-- Responsive navbar-->
    @include('layouts.users.navbar')
    <!-- Page header with logo and tagline-->
    @include('layouts.users.header')
    <!-- Page content-->
    <div class="container">
        <div class="row mt-md-5">
            @yield('konten')
        </div>
    </div>

    <!-- Footer-->
    @include('layouts.users.footer')

    <!-- Core theme JS-->
    @yield('js')
    <script src="{{ asset('assets/js/home-scripts.js') }}"></script>
    <script src="{{ asset('assets/vendor/fontawesome-free-6.2.0/js/all.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/vendor/owlcarousel/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-5.1.3/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#slider-galeri').owlCarousel({
                responsive: {
                    0: {
                        items: 1
                    }
                },
                pagination: false,
                navigation: false,
                margin: 0,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                center: true,
                autoWidth: false,
            });
        });

        $(document).ready(function() {
            $('#slider-pengurus').owlCarousel({
                responsive: {
                    0: {
                        items: 1
                    }
                },
                pagination: false,
                navigation: false,
                margin: 0,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                center: true,
                autoWidth: false,
            });
        });
        $('#slider-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            center: true,
            autoplay: true,
            autoplayTimeout: 7000,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>

</body>

</html>
