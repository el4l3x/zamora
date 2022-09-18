<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <title>Alcaldia de Zamora</title>
        
        <link href="{{ asset('src/img/favicon.png') }}" rel="icon">
        <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Fonts -->
        {{-- <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}
        {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet"> --}}

        <!-- Bootstrap CSS File -->
        <link href="{{ asset('src/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Libraries CSS Files -->
        <link href="{{ asset('src/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('src/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('src/venobox/venobox.css') }}" rel="stylesheet">
        <link href="{{ asset('src/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

        <!-- Main Stylesheet File -->
        <link href="{{ asset('src/css/style.css') }}" rel="stylesheet">

    </head>
    <body>

        <div class="loading" id="loading">
            <div>
                <div class="spinner-grow text-danger" role="status">
                </div>
                <p>Cargando...</p>
            </div>
        </div>

        @yield('navbar')

        @yield('jumbotron')

        {{-- <main id="main"> --}}

            @yield('content')

            <!--==========================
                Footer
            ============================-->
            <footer id="footer">
                <div class="footer-top">
                    <div class="container">
                        <div class="row">

                            <div class="col-lg-3 col-md-6 footer-info">
                                <img src="{{ asset('src/img/logo.png') }}" alt="TheEvenet">
                                <p>In alias aperiam. Placeat tempore facere. Officiis voluptate ipsam vel eveniet est dolor et totam porro. Perspiciatis ad omnis fugit molestiae recusandae possimus. Aut consectetur id quis. In inventore consequatur ad voluptate cupiditate debitis accusamus repellat cumque.</p>
                            </div>

                            <div class="col-lg-3 col-md-6 footer-links">
                                <h4>Useful Links</h4>
                                <ul>
                                    <li><i class="fa fa-angle-right"></i> <a href="{{ route('login') }}">Administrar</a></li>
                                    <li><i class="fa fa-angle-right"></i> <a href="#">About us</a></li>
                                    <li><i class="fa fa-angle-right"></i> <a href="#">Services</a></li>
                                    <li><i class="fa fa-angle-right"></i> <a href="#">Terms of service</a></li>
                                    <li><i class="fa fa-angle-right"></i> <a href="#">Privacy policy</a></li>
                                </ul>
                            </div>

                            <div class="col-lg-3 col-md-6 footer-links">
                                <h4>Useful Links</h4>
                                <ul>
                                    <li><i class="fa fa-angle-right"></i> <a href="#">Home</a></li>
                                    <li><i class="fa fa-angle-right"></i> <a href="#">About us</a></li>
                                    <li><i class="fa fa-angle-right"></i> <a href="#">Services</a></li>
                                    <li><i class="fa fa-angle-right"></i> <a href="#">Terms of service</a></li>
                                    <li><i class="fa fa-angle-right"></i> <a href="#">Privacy policy</a></li>
                                </ul>
                            </div>

                            <div class="col-lg-3 col-md-6 footer-contact">
                                <h4>Contact Us</h4>
                                <p>
                                    A108 Adam Street <br>
                                    New York, NY 535022<br>
                                    United States <br>
                                    <strong>Phone:</strong> +1 5589 55488 55<br>
                                    <strong>Email:</strong> info@example.com<br>
                                </p>

                                <div class="social-links">
                                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                                    <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                                </div>

                            </div>

                        </div>
                    </div>

                </div> {{-- footer top --}}

                <div class="container">
                    <div class="copyright">
                        ©Copyright SINGULARITY Todos los derechos reservados.
                    </div>
                    <div class="credits">
                        ECO
                    </div>
                </div>

            </footer><!-- #footer -->

            <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

        </main>
        

        <!-- JavaScript Libraries -->
        <script src="{{ asset('src/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('src/jquery/jquery-migrate.min.js') }}"></script>
        <script src="{{ asset('src/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('src/easing/easing.min.js') }}"></script>
        <script src="{{ asset('src/superfish/hoverIntent.js') }}"></script>
        <script src="{{ asset('src/superfish/superfish.min.js') }}"></script>
        <script src="{{ asset('src/wow/wow.min.js') }}"></script>
        <script src="{{ asset('src/venobox/venobox.min.js') }}"></script>
        <script src="{{ asset('src/owlcarousel/owl.carousel.min.js') }}"></script>

        <!-- Contact Form JavaScript File -->
        <script src="{{ asset('contactform/contactform.js') }}"></script>

        <!-- Template Main Javascript File -->
        <script src="{{ asset('src/js/main.js') }}"></script>

        <script>
            $(document).ready(function() {
                $('#loading').fadeOut();
            });
        </script>
    </body>
</html>
