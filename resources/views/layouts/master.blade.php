<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Industrial</title>
  <meta content="Sistema web de Ing Industrial" name="description">
  <meta content="Uagrm, Ing industrial, FCET" name="keywords">
  <meta content="Nells A. Vidal V." name="author">
  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700|Roboto:400,900" rel="stylesheet">
  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700&display=swap" rel="stylesheet">


  <!-- Vendor CSS Files -->

  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/portalstyle.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/edit.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/DataTables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/img/logo.jpg') }}" rel="shortcut icon" type="image/x-icon">
  <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/galery.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/report.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/dark-mode.css') }}" rel="stylesheet" type="text/css" />


  <!-- Sweet Alert 2 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>

</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <div id="logo" class="me-auto">
        <a><img src="{{ asset('assets/img/logo.png') }}" alt=""></a>
      </div>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto"><b> Hola {{ auth()->user()->name }}, Rol {{ auth()->user()->rol }} </b></a>
          </li>
          <li class="dropdown"><a href="#"><span>Módulos:</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ route('portal.index')}}">Inicio</a></li>
              @can('std.index')
              <li><a href="{{ route('std.index')}}">Estudiantes</a></li>
              @endcan
              @can('dient.index')
              <li><a href="{{ route('dient.index')}}">Dientes</a></li>
              @endcan

              @can('parte.index')
              <li><a href="{{ route('parte.index')}}">Partes</a></li>
              @endcan

              @can('tratamiento.index')
              <li><a href="{{ route('tratamiento.index')}}">Tratamientos</a></li>
              @endcan

              @can('odontograma.index')
              <li><a href="{{ route('odontograma.index')}}">Odontogramas</a></li>
              @endcan


              @can('grad.index')
              <li><a href="{{ route('grad.index')}}">Titulados</a></li>
              @endcan
              @can('prac.index')
              <li><a href="{{ route('prac.index')}}">Prácticas Ind</a></li>
              @endcan
              @can('lab.index')
              <li><a href="{{ route('lab.index') }}">Laboratorios</a></li>
              @endcan
              @can('visit.index')
              <li><a href="{{ route('visit.index') }}">Vísitas Tec</a></li>
              @endcan
              @can('doc.index')
              <li><a href="{{ route('doc.index') }}">Documentos</a></li>
              @endcan
              @can('agre.index')
              <li><a href="{{ route('agre.index') }}">Convenios</a></li>
              @endcan
              @can('track.index')
              <li><a href="{{ route('track.index') }}">Seguimientos</a></li>
              @endcan
              @can('tra.index')
              <li><a href="{{ route('tra.index') }}">Cursos</a></li>
              @endcan
              <li><a href="{{ route('report.index') }}">Reportes</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Opciones</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{ route('user.edit')}}">Editar Perfil</a></li>
              <li><a href="{{ route('pass.edit')}}">Contraseña</a></li>
              <li><a href="{{ route('login.destroy') }}">Cerrar Sesión</a></li>
            </ul>
          </li>
        <div class="nav-link">
          <div class="form-check form-switch">
            <input type="checkbox" class="form-check-input" id="darkSwitch">
            <label class="custom-control-label" for="darkSwitch">Noche</label>
          </div>
        </div>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  @yield('content')
  @include('sweetalert::alert')
  <footer class="text-center text-lg-start text-white" style="background-color: #2bd672">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-between p-4" style="background-color: #ffffff">
      <!-- Left -->
      <div class="me-5">
        <span>Ingenieria Industrial:</span>
      </div>

    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <center><a href="https://websmultimedia.com/contador-de-visitas-gratis" title="Contador De Visitas Gratis">
            <img style="border: 0px solid; display: inline;" alt="contador de visitas" src="https://websmultimedia.com/contador-de-visitas.php?id=4022"></a><br><a href='https://websmultimedia.com/contador-de-visitas-gratis'></a><br><a href='http://www.websmultimedia.com/diseno-web/sevilla'></a></center>
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold">INGENIERIA INDUSTRIAL</h6>
            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #ffffff; height: 2px" />
            <p style="color: #ffffff">
              La carrera de Ingeniería Industrial nació en respuesta a los requerimientos de profesionales capaces de dirigir la optimización y mejora de los procesos productivos bajo criterios de calidad, seguridad y respeto al medio ambiente.
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Servicios a</h6>
            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #ffffff; height: 2px" />
            <p>
              <a href="#" class="text-white">Estudiante</a>
            </p>
            <p>
              <a href="#" class="text-white">Docente</a>
            </p>
            <p>
              <a href="#" class="text-white">Administrativo</a>
            </p>
            <p>
              <a href="#" class="text-white">Sociedad</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Compromiso de</h6>
            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #ffffff; height: 2px" />
            <p>
              <a href="#" class="text-white">Excelencia</a>
            </p>
            <p>
              <a href="#" class="text-white">Mejora</a>
            </p>
            <p>
              <a href="#" class="text-white">Acreditación</a>
            </p>
            <p>
              <a href="#" class="text-white">Virtualización</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold">Contact</h6>
            <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #ffffff; height: 2px" />
            <p style="color: #ffffff"><i class="bi bi-geo-alt-fill"></i> Av. Busch U.V. 32, Ciudad Universitaria, Módulo 222.</p>
            <p style="color: #ffffff"><i class="bi bi-envelope-fill"></i> industrial@gmail.com</p>
            <p style="color: #ffffff"><i class="bi bi-telephone-forward-fill"></i> 3 - 3550498 interno</p>
            <p style="color: #ffffff"><i class="bi bi-facebook"></i> /ingindustrial</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
      © 2022 Copyright:
      <a class="text-white" href="#">Ing. Industrial UAGRM-FCET</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/js/main.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/jquery-1.10.2.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="{{ asset('js/DataTables/datatables.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/tables.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/funciones.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/select2.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/select.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/inline.js') }}" type="text/javascript"></script>
  <script src="{{ asset('js/dark-mode-switch.min.js') }}" type="text/javascript"></script>
</body>

</html>