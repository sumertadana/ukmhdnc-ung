<!DOCTYPE html>
<html lang="id">

<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>Inner Page - BizLand Bootstrap Template</title>
<meta content="" name="description">
<meta content="" name="keywords">

<!-- Favicons -->
<link href={{ asset("assets/img/favicon.png") }} rel="icon">
<link href={{ asset("assets/img/apple-touch-icon.png") }} rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="assets/vendor/aos/aos.css" rel="stylesheet">
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href={{ asset("assets/css/bizland_style.css") }} rel="stylesheet">

<!-- =======================================================
* Template Name: BizLand - v3.7.0
* Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
======================================================== -->
</head>

<body>

<!-- ======= Top Bar ======= -->
<!-- <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
    <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
    </div>
    <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
    </div>
    </div>
</section> -->

<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

    <h1 class="logo"><a href="index.html">BizLand<span>.</span></a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

    <nav id="navbar" class="navbar">
        <ul>
        <li><a class="nav-link scrollto" href="#hero">Beranda</a></li>
        <li><a class="nav-link scrollto" href="#about">Struktur</a></li>
        <li><a class="nav-link scrollto" href="#services">Galeri</a></li>
        <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
        <li><a class="nav-link scrollto" href="#team">Team</a></li>
        <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li><a href="#">Drop Down 2</a></li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
            </ul>
        </li>
        <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="gambar" class="d-flex align-items-center mt-0">
    <div id="jumbotron" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="{{ asset("assets/img/portfolio/111.jpg") }}" class="d-block w-100" alt="...">
        </div>
        {{-- <div class="carousel-item">
        <img src="{{ asset("assets/img/portfolio/portfolio-details-2.jpg") }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
        <img src="{{ asset("assets/img/portfolio/portfolio-details-3.jpg") }}" class="d-block w-100" alt="...">
        </div> --}}
    </div>
    </div>
</section>
<!-- End Hero -->

<!-- Page content-->
<div class="container">
    <div class="row mt-sm-5">
        <!-- Blog entries-->
        <div class="col-lg-9">
            <!-- Featured blog post-->
            <div class="card mb-4">
                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">January 1, 2021</div>
                    <h2 class="card-title">Featured Post Title</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                    <a class="btn btn-primary" href="#!">Read more →</a>
                </div>
            </div>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-3">
            <!-- pencarian-->
            <div class="card mb-4">
                <div class="card-header fw-bold bg-primary text-white">Cari Artikel</div>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Masukan Judul Artikel..." aria-label="Masukan Judul Artikel..." aria-describedby="button-search" />
                        <button class="btn btn-primary" id="button-search" type="button">Cari</button>
                    </div>
                </div>
            </div>
            <!-- pengurus-->
            <div class="card mb-4">
                <div class="card-header fw-bold bg-primary text-white">Pengurus Organisasi</div>
                <div class="card-body p-1">
                <div id="Pengurus" class="carousel slide " data-bs-ride="carousel">
                    <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('assets/img/team/team-1.jpg') }}" class="d-block w-100 " alt="...">
                        <div class="carousel-caption d-none d-md-block text-primary">
                        <h5>Ketua Umum</h5>
                        <p>Cristiano Ronaldo</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/img/team/team-2.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        <h5>Wakil Ketua</h5>
                        <p>Lionel Messi</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/img/team/team-3.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        <h5>Sekertaris</h5>
                        <p>Cristiano Messi</p>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <!-- Side widget-->
            <div class="card mb-4">
                <div class="card-header">Galeri Kegiatan</div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>


<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="container py-4">
    <div class="copyright">
        &copy; Copyright <strong><span>BizLand</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
    </div>
</footer><!-- End Footer -->

<!-- <div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src={{ asset("assets/js/bizland_js.js") }}></script>

</body>

</html>
