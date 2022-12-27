<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Industrial</title>
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
          <a class="hero-brand" title="logo"><img alt="Industrial Logo" src="assets/img/logo.png"></a>
        </div>
      </div>

      <div class="col-md-12">
        <h1>
          INGENIERIA INDUSTRIAL
        </h1>

        <p class="tagline">
          SI PUEDES IMAGINAR, PUEDES CREAR
        </p>
        <a class="btn btn-full scrollto" href="{{ route('login.index') }}">Ingresar</a>
        <a class="btn btn-full scrollto" href="{{ route('register.index') }}">Registrar</a>
      </div>
    </div>

  </section><!-- End Hero -->

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
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
              href="https://www.facebook.com/ingindustrialuagrm">Consultas</a></li>
          <li><a target="_blank" class="nav-link scrollto "
              href="https://www.uagrm.edu.bo/carreras/fcet-cii">Información</a></li>
          <li><a target="_blank" class="nav-link scrollto"
              href="https://www.facebook.com/ingindustrialuagrm">Nosotros</a></li>
          <li><a target="_blank" class="nav-link scrollto"
              href="https://www.uagrm.edu.bo/carreras/fcet-cii">Contáctanos</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="header-social-links d-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://www.facebook.com/ingindustrialuagrm" class="facebook"><i class="bi bi-facebook"></i></a>
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
          Estadisticas Rápidas de la Carrera
        </h2>
        <p>
          Todos los datos visualizados han sido sacados de forma automatica desde el servidor de la carrera de
          Ingenieria Industrial tal informacion es actualizada dia a dia por nuestro equipo de trabajo.
        </p>

        <div class="row stats-row">
          <div class="stats-col text-center col-md-3 col-sm-6">
            <div class="circle">
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1"
                class="purecounter stats-no"></span>
              Documentos Digitales
            </div>
          </div>

          <div class="stats-col text-center col-md-3 col-sm-6">
            <div class="circle">
              <span data-purecounter-start="0" data-purecounter-end="79" data-purecounter-duration="1"
                class="purecounter stats-no"></span>
              Estudiantes Titulados
            </div>
          </div>

          <div class="stats-col text-center col-md-3 col-sm-6">
            <div class="circle">
              <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1"
                class="purecounter stats-no"></span>
              Insercion Laboral
            </div>
          </div>

          <div class="stats-col text-center col-md-3 col-sm-6">
            <div class="circle">
              <span data-purecounter-start="0" data-purecounter-end="68" data-purecounter-duration="1"
                class="purecounter stats-no"></span>
              Actas Registradas
            </div>
          </div>
        </div>
      </div>

    </section><!-- End About Section -->

    <!-- ======= SLIDE Section ======= -->
    <div class="slideshow-container">

      <div class="mySlides fade">
        <div class="numbertext">1 / 7</div>
        <img src={{ asset('images/carousel/hero_1.jpg') }} style="width:100%">
        <div class="text">Ingenieria Industrial</div>
      </div>

      <div class="mySlides fade">
        <div class="numbertext">2 / 7</div>
        <img src={{ asset('images/carousel/hero_2.jpg') }} style="width:100%">
        <div class="text">Ingenieria Industrial</div>
      </div>

      <div class="mySlides fade">
        <div class="numbertext">3 / 7</div>
        <img src={{ asset('images/carousel/hero_3.jpg') }} style="width:100%">
        <div class="text">Ingenieria Industrial</div>
      </div>

      <div class="mySlides fade">
        <div class="numbertext">4 / 7</div>
        <img src={{ asset('images/carousel/hero_4.jpg') }} style="width:100%">
        <div class="text">Ingenieria Industrial</div>
      </div>

      <div class="mySlides fade">
        <div class="numbertext">5 / 7</div>
        <img src={{ asset('images/carousel/hero_5.jpg') }} style="width:100%">
        <div class="text">Ingenieria Industrial</div>
      </div>

      <div class="mySlides fade">
        <div class="numbertext">6 / 7</div>
        <img src={{ asset('images/carousel/hero_6.jpg') }} style="width:100%">
        <div class="text">Ingenieria Industrial</div>
      </div>

      <div class="mySlides fade">
        <div class="numbertext">7 / 7</div>
        <img src={{ asset('images/carousel/hero_7.jpg') }} style="width:100%">
        <div class="text">Ingenieria Industrial</div>
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
      <div class="container">
        <h2 class="text-center">
          Conoce a todo nuestro equipo de trabajo
        </h2>

        <div class="row">
          <div class="col-sm-3 col-xs-6">
            <div class="card card-block">
              <a href="#"><img alt="" class="team-img" src="assets/img/team-1.jpg">
                <div class="card-title-wrap">
                  <span class="card-title">Fernando Canavire</span> <span class="card-text">Director De Carrera</span>
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
                <div class="card-title-wrap">
                  <span class="card-title">Fabiola Padilla</span> <span class="card-text">Apoyo Administrativo</span>
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
                <div class="card-title-wrap">
                  <span class="card-title">Germán Marquez</span> <span class="card-text">Apoyo de Acreditación</span>
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
                <div class="card-title-wrap">
                  <span class="card-title">Jessica Rojas</span> <span class="card-text">Apoyo de Extensión</span>
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
                <div class="card-title-wrap">
                  <span class="card-title">Gardis Araque</span> <span class="card-text">Apoyo Académico</span>
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
                <div class="card-title-wrap">
                  <span class="card-title">Manuel Caballero</span> <span class="card-text">Apoyo Académico</span>
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
                <div class="card-title-wrap">
                  <span class="card-title">Bianca Morón</span> <span class="card-text">Apoyo Titulación</span>
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
    <section class="cta">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 col-sm-12 text-lg-start text-center">
            <h2>
              Carrera de Ingenieria Industrial
            </h2>

            <p>
              La resolución I.C.U. Nro.030/2010 reconoce como fecha de creación de la carrera el 24 de julio del 1973.
              La Carrera de Ingeniería industrial esta al servicio del desarrollo socio económico local y nacional
              formando profesionales con un perfil integral como líder de equipos interdisciplinarios, capaz de crear,
              planificar, establecer y administrar sistemas productivos y de servicios buscando de manera creativa
              soluciones a los problemas del medio.
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
        <h2 class="text-center">
          Misión y Visión de la Carrera de Ingenieria Industrial
        </h2>
        <div class="row">
          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <i class="bi bi-briefcase"></i>
                </div>
              </div>

              <div>
                <h3>
                  Formación
                </h3>

                <p>
                  Formar Ingenieros industriales competentes, críticos, emprendedores, con valores éticos, morales y
                  sobre todo entusiastas en el mundo industrial.
                </p>
              </div>
            </div>
          </div>

          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <i class="bi bi-card-checklist"></i>
                </div>
              </div>

              <div>
                <h3>
                  Educación
                </h3>

                <p>
                  Ingenieros capaces de aplicar los conocimientos científicos y tecnológicos en la innovación y solución
                  de los problemas relacionados con los sistemas de producción de bienes y servicios.
                </p>
              </div>
            </div>
          </div>

          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <i class="bi bi-bar-chart"></i>
                </div>
              </div>

              <div>
                <h3>
                  Compromiso
                </h3>

                <p>
                  comprometidos con el medio ambiente, la investigación e interacción social, y la mejora continua, para
                  contribuir al desarrollo del país y la región.
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <i class="bi bi-binoculars"></i>
                </div>
              </div>

              <div>
                <h3>
                  Desarrollo
                </h3>

                <p>
                  Ser reconocida como una carrera líder en la formación de ingenieros industriales por su excelencia
                  académica, donde se generen conocimientos que aporten al desarrollo.
                </p>
              </div>
            </div>
          </div>

          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <i class="bi bi-brightness-high"></i>
                </div>
              </div>

              <div>
                <h3>
                  Aportes
                </h3>

                <p>
                  Capacidad de emprender y apoyar procesos de emprendimiento, pues poseen conocimiento para diseñar,
                  planear y operar planes de negocio que contribuyan a la generación de empleo.
                </p>
              </div>
            </div>
          </div>

          <div class="feature-col col-lg-4 col-xs-12">
            <div class="card card-block text-center">
              <div>
                <div class="feature-icon">
                  <i class="bi bi-calendar4-week"></i>
                </div>
              </div>

              <div>
                <h3>
                  Actualidad
                </h3>
                <p>
                  adaptabilidad a las nuevas tendencias conforme a las exigencias y necesidades de sostenibilidad, que
                  estudia científicamente los problemas y propone permanentemente soluciones de manera integral.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Features Section -->

  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer class="site-footer">
    <div class="bottom">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-xs-12 text-lg-start text-center">
            <p class="copyright-text">
              &copy;<strong>Industrial</strong>. Derechos Reservados
            </p>
          </div>

          <div class="col-lg-6 col-xs-12 text-lg-right text-center">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a target="_blank" href="https://www.facebook.com/ingindustrialuagrm">Consultas</a>
              </li>

              <li class="list-inline-item">
                <a target="_blank" href="https://www.uagrm.edu.bo/carreras/fcet-cii">Información</a>
              </li>

              <li class="list-inline-item">
                <a target="_blank" href="https://www.facebook.com/ingindustrialuagrm">Nosotros</a>
              </li>

              <li class="list-inline-item">
                <a target="_blank" href="https://www.uagrm.edu.bo/carreras/fcet-cii">Contáctanos</a>
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