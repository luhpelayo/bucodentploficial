<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BUCODENT</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
  <meta property="og:title" content="">
  <meta property="og:image" content="">
  <meta property="og:url" content="">
  <meta property="og:site_name" content="">
  <meta property="og:description" content="">

  <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="">
  <meta name="twitter:title" content="">
  <meta name="twitter:description" content="">
  <meta name="twitter:image" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="{{ asset('css/carousel/style.css') }}" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.jpg">

  <!-- =======================================================
  * Template Name: Bell - v4.6.0
  * Template URL: https://bootstrapmade.com/bell-free-bootstrap-4-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero">
    <div class="container text-center">
      <div class="row">
        <div class="col-md-12">
          <a class="hero-brand" title="logo"><img alt="BUCODENT Logo" src="assets/img/logo.png"></a>
        </div>
      </div>

      <div class="col-md-12">
        <h1>
          BUCODENT CENTRO ODONTOLOGICO INTEGRAL
        </h1>

        <p class="tagline">
        Cada diente en la cabeza de un hombre, es más valioso que un diamante.
        </p>
        <a class="btn btn-full scrollto" href="{{ route('login.index') }}" style="background-color: #00BFFF">Ingresar</a>
        <a class="btn btn-full scrollto" href="{{ route('register.index') }}" style="background-color: #00BFFF">Registrar</a>
      </div>
    </div>

  </section><!-- End Hero -->

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center" style="background-color: #00BFFF">
    <div class="container d-flex align-items-center">

      <div id="logo" class="me-auto">
        <a><img src="assets/img/logo.png" alt=""></a>
        <!-- Uncomment below if you prefer to use a text image -->
        <!--<h1><a href="#hero">Bell</a></h1>-->
      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="">Inicio</a></li>
          <li><a target="_blank" class="nav-link scrollto"
              href="https://www.facebook.com/Odontologia.Integral.Bucodent">Consultas</a></li>
          <li><a target="_blank" class="nav-link scrollto "
              href="https://www.facebook.com/Odontologia.Integral.Bucodent">Información</a></li>
          <li><a target="_blank" class="nav-link scrollto"
              href="https://www.facebook.com/Odontologia.Integral.Bucodent">Nosotros</a></li>
          <li><a target="_blank" class="nav-link scrollto"
              href="https://www.facebook.com/Odontologia.Integral.Bucodent">Contáctanos</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links d-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://www.facebook.com/Odontologia.Integral.Bucodent" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </header><!-- End Header -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section class="about" id="about">
      <div class="container text-center">
        <h2>
          Estadisticas Rápidas de la Clinica Dental
        </h2>
        <p>
          Todos los datos visualizados han sido sacados de su archivos que estan registrado de manera manual de la clinica BUCODENT.
        </p>

        <div class="row stats-row" >
          <div class="stats-col text-center col-md-3 col-sm-6" >
            <div class="circle" >
              <span data-purecounter-start="0" data-purecounter-end="100" data-purecounter-duration="1"
                class="purecounter stats-no" style="background-color: #00BFFF"></span>
              Registro de pacientes
            </div>
          </div>

          <div class="stats-col text-center col-md-3 col-sm-6">
            <div class="circle">
              <span data-purecounter-start="0" data-purecounter-end="120" data-purecounter-duration="1"
                class="purecounter stats-no" style="background-color: #00BFFF"></span>
              Servicios
            </div>
          </div>

          <div class="stats-col text-center col-md-3 col-sm-6">
            <div class="circle">
              <span data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="1"
                class="purecounter stats-no" style="background-color: #00BFFF"></span>
              Operaciones
            </div>
          </div>

          <div class="stats-col text-center col-md-3 col-sm-6">
            <div class="circle">
              <span data-purecounter-start="0" data-purecounter-end="140" data-purecounter-duration="1"
                class="purecounter stats-no" style="background-color: #00BFFF"></span>
              Tratamientos
            </div>
          </div>
        </div>
      </div>

    </section><!-- End About Section -->

    <!-- ======= SLIDE Section ======= -->
    <div class="slideshow-container">

      <div class="mySlides fade">
        <div class="numbertext">1 / 7</div>
        <img src="assets/img/hero_1.jpg"  style="width:100%">
        <div class="text">BUCODENT</div>
      </div>

      <div class="mySlides fade">
        <div class="numbertext">2 / 7</div>
        <img src="assets/img/hero_2.jpg" style="width:100%">
        <div class="text">BUCODENT</div>
      </div>

      <div class="mySlides fade">
        <div class="numbertext">3 / 7</div>
        <img src="assets/img/hero_3.jpg" style="width:100%">
        <div class="text">BUCODENT</div>
      </div>

      <div class="mySlides fade">
        <div class="numbertext">4 / 7</div>
        <img src="assets/img/hero_4.jpg" style="width:100%">
        <div class="text">BUCODENT</div>
      </div>

      <div class="mySlides fade">
        <div class="numbertext">5 / 7</div>
        <img src="assets/img/hero_5.jpg" style="width:100%">
        <div class="text">BUCODENT</div>
      </div>

      <div class="mySlides fade">
        <div class="numbertext">6 / 7</div>
        <img src="assets/img/hero_6.jpg" style="width:100%">
        <div class="text">BUCODENT</div>
      </div>

      <div class="mySlides fade">
        <div class="numbertext">7 / 7</div>
        <img src="assets/img/hero_7.jpg" style="width:100%">
        <div class="text">BUCODENT</div>
      </div>

    </div>
    <br>

    <div style="text-align:center">
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
      <span class="dot"></span>
    </div>
    </section>
    <!-- End SLIDE Section -->

    <!-- ======= Team Section ======= -->
    <section class="team" id="team">
      <div class="container" >
        <h2 class="text-center" style="color: #00BFFF;" >
          Conoce a todo nuestro equipo de trabajo
        </h2>

        <div class="row">
          <div class="col-sm-3 col-xs-6">
            <div class="card card-block">
              <a href="#"><img alt="" class="team-img" src="assets/img/team-1.jpg" >
                <div class="card-title-wrap" style="background-color: #00BFFF">
                  <span class="card-title">Dr. Jose Aguirre</span> <span class="card-text">Dentista</span>
                </div>

                <div class="team-over">
                  <h4 class="hidden-md-down">
                    Contactame
                  </h4>

                  <nav class="social-nav">
                    <a href="#"><i class="bi bi-twitter"></i></a> <a href="#"><i class="bi bi-facebook"></i></a> <a
                      href="#"><i class="bi bi-linkedin"></i></a> <a href="#"><i class="bi bi-envelope-fill"></i></a>
                  </nav>

                  <p>
                    Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                  </p>
                </div>
              </a>
            </div>
          </div>

          <div class="col-sm-3 col-xs-6">
            <div class="card card-block">
              <a href="#"><img alt="" class="team-img" src="assets/img/team-2.jpg">
                <div class="card-title-wrap" style="background-color: #00BFFF">
                  <span class="card-title">Dra. Yoselin Mercado</span> <span class="card-text">Dentista</span>
                </div>

                <div class="team-over">
                  <h4 class="hidden-md-down">
                    Contactame
                  </h4>

                  <nav class="social-nav">
                    <a href="#"><i class="bi bi-twitter"></i></a> <a href="#"><i class="bi bi-facebook"></i></a> <a
                      href="#"><i class="bi bi-linkedin"></i></a> <a href="#"><i class="bi bi-envelope-fill"></i></a>
                  </nav>

                  <p>
                    Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                  </p>
                </div>
              </a>
            </div>
          </div>

          <div class="col-sm-3 col-xs-6">
            <div class="card card-block">
              <a href="#"><img alt="" class="team-img" src="assets/img/team-3.jpg">
                <div class="card-title-wrap" style="background-color: #00BFFF">
                  <span class="card-title">Dra. Gabriela Paz</span> <span class="card-text">Dentista</span>
                </div>

                <div class="team-over">
                  <h4 class="hidden-md-down">
                    Contactame
                  </h4>

                  <nav class="social-nav">
                    <a href="#"><i class="bi bi-twitter"></i></a> <a href="#"><i class="bi bi-facebook"></i></a> <a
                      href="#"><i class="bi bi-linkedin"></i></a> <a href="#"><i class="bi bi-envelope-fill"></i></a>
                  </nav>

                  <p>
                    Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                  </p>
                </div>
              </a>
            </div>
          </div>

          <div class="col-sm-3 col-xs-6">
            <div class="card card-block">
              <a href="#"><img alt="" class="team-img" src="assets/img/team-4.jpg">
                <div class="card-title-wrap" style="background-color: #00BFFF">
                  <span class="card-title">Dr. Pedro Molina</span> <span class="card-text">Dentista</span>
                </div>

                <div class="team-over">
                  <h4 class="hidden-md-down">
                    Contactame
                  </h4>

                  <nav class="social-nav">
                    <a href="#"><i class="bi bi-twitter"></i></a> <a href="#"><i class="bi bi-facebook"></i></a> <a
                      href="#"><i class="bi bi-linkedin"></i></a> <a href="#"><i class="bi bi-envelope-fill"></i></a>
                  </nav>

                  <p>
                    Lorem ipsum dolor sit amet, eu sed suas eruditi honestatis.
                  </p>
                </div>
              </a>
            </div>
          </div>


        </div>
      </div>
    </section><!-- End Team Section -->

    <!-- ======= Call to Action Section ======= -->
    <section class="cta" style="background-color: #00BFFF">
      <div class="container">
        <div class="row" >
          <div class="col-lg-9 col-sm-12 text-lg-start text-center">
            <h2>
              BUCODENT CENTRO ODONTOLOGICO INTEGRAL
            </h2>

            <p>
              La clinica BUCODENT estamos especializados en diferentes servicios odontológicos. El objetivo de nuestra clínica dental es
              ofrecer un óptimo tratamiento para mejorar la salud de nuestros clientes en Santa Cruz de la Sierra. Nuestro equipo de
              profesionales se encargará de proporcionarle un servicio de calidad con las mejores técnicas de odontología, para adultos y niños.
            </p>
          </div>

          <div class="col-lg-3 col-sm-12 text-lg-right text-center">
            <a class="btn btn-ghost" href="#">Saber Más</a>
          </div>
        </div>
      </div>
    </section><!-- End Call to Action Section -->

    <!-- ======= Features Section ======= -->
    <section class="features" id="features">
      <div class="container">
        <h2 class="text-center" style="color: #00BFFF;" >
          Misión y Visión de la Clinica Dental Bucodent
        </h2>




        <div class="row">
          <div class="feature-col col-lg-6 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon" style="background-color: #00BFFF">
                  <i class="bi bi-brightness-high"></i>
                </div>
              </div>

              <div>
                <h3 style="color: #00BFFF">
                 Mision
                </h3>

                <h4>
                Garantizar la buena atención a nuestros pacientes, brindándoles una asistencia odontológica integral,
                mediante una atención personalizada para asegurar la solución de cualquier problema relacionado con la salud oral.
                </h4>
              </div>
            </div>
          </div>

          <div class="feature-col col-lg-6 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon" style="background-color: #00BFFF">
                  <i class="bi bi-brightness-high"></i>
                </div>
              </div>

              <div>
                <h3 style="color: #00BFFF">
                  Vision
                </h3>

                <h4>
                Planificamos el presente y proyectamos el futuro a la par de la ciencia y la tecnología brindando a
                nuestros pacientes un servicio personalizado.
                </h4>
              </div>
            </div>
          </div>


        </div>
      </div>
    </section><!-- End Features Section -->

  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer class="site-footer">
    <div class="bottom" style="background-color: #00BFFF">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-xs-12 text-lg-start text-center">
            <p class="copyright-text">
              &copy;<strong>BUCODENT</strong>. Derechos Reservados
            </p>
          </div>

          <div class="col-lg-6 col-xs-12 text-lg-right text-center">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a target="_blank" href="https://www.facebook.com/Odontologia.Integral.Bucodent">Consultas</a>
              </li>

              <li class="list-inline-item">
                <a target="_blank" href="https://www.facebook.com/Odontologia.Integral.Bucodent">Información</a>
              </li>

              <li class="list-inline-item">
                <a target="_blank" href="https://www.facebook.com/Odontologia.Integral.Bucodent">Nosotros</a>
              </li>

              <li class="list-inline-item">
                <a target="_blank" href="https://www.facebook.com/Odontologia.Integral.Bucodent">Contáctanos</a>
              </li>
            </ul>
          </div>

        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/purecounter/purecounter.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/carousel/main.js') }}" type="text/javascript"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
