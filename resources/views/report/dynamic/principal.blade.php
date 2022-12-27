@extends('layouts.master')
@section('content')
<div class="container">
<div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">SUB MODULO DE REPORTES DINAMICOS</h1>
</div>
  <div class="container">
        <div class="row style_featured">
        <div class="col-md-4">
                <div>
                <a href="{{ route ('student.report')}}" >
                    <img src="{{URL::asset('icons/reportstudent.png')}}" alt="" class="img-rounded img-thumbnail"/>
                    <h2 style="color: maroon;">Estudiantes</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Puede consultar y descargar informacion de los estudiantes segun su criterio de busqueda personalizada.
                    </p>
                    <a href="{{ route ('student.report')}}" class="btn btn-success" title="Ir">Ingresar</a>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                <a href="{{ route ('dynagra.index')}}" >
                    <img src="{{URL::asset('icons/reportgraduate.png')}}" alt="imagen" class="img-rounded img-thumbnail"/>
                    <h2 style="color: maroon;">Titulados</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Puede consultar y descargar informacion de los titulados segun su criterio de busqueda personalizada.
                    </p>
                    <a href="{{ route ('dynagra.index')}}" class="btn btn-success" title="Ir">Ingresar</a>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                <a href="{{ route ('practice.report')}}" >
                    <img src="{{URL::asset('icons/reportpractice.png')}}" alt="" class="img-rounded img-thumbnail"/>
                    <h2 style="color: maroon;">Prácticas Industriales</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Puede consultar y descargar informacion de las practicas industriales segun su criterio de busqueda personalizada.
                    </p>
                    <a href="{{ route ('practice.report')}}" class="btn btn-success" title="More">Ingresar</a>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                <a href="{{ route ('dynalab.index')}}" >
                    <img src="{{URL::asset('icons/reportlaboratory.png')}}" alt="imagen" class="img-rounded img-thumbnail"/>
                    <h2 style="color: maroon;">Laboratorios</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Puede consultar y descargar informacion de los laboratorios segun su criterio de busqueda personalizada.
                    </p>
                    <a href="{{ route ('dynalab.index')}}" class="btn btn-success" title="More">Ingresar</a>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                <a href="{{ route ('visit.report')}}" >
                    <img src="{{URL::asset('icons/reportvisit.png')}}" alt="" class="img-rounded img-thumbnail"/>
                    <h2 style="color: maroon;">Visitas Técnicas</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Puede consultar y descargar informacion de las visitas tecnicas segun su criterio de busqueda personalizada.
                    </p>
                    <a href="{{ route ('visit.report')}}" class="btn btn-success" title="More">Ingresar</a>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                <a href="{{ route ('dynadoc.index')}}" >
                    <img src="{{URL::asset('icons/reportdocus.png')}}" alt="" class="img-rounded img-thumbnail"/>
                    <h2 style="color: maroon;">Documentos</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Puede consultar y descargar informacion de los documentos segun su criterio de busqueda personalizada.
                    </p>
                    <a href="{{ route ('dynadoc.index')}}" class="btn btn-success" title="More">Ingresar</a>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                <a href="{{ route ('dynagre.index')}}" >
                    <img src="{{URL::asset('icons/reportagreement.png')}}" alt="" class="img-rounded img-thumbnail"/>
                    <h2 style="color: maroon;">Convenios</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Puede consultar y descargar informacion de los convenios segun su criterio de busqueda personalizada.
                    </p>
                    <a href="{{ route ('dynagre.index')}}" class="btn btn-success" title="More">Ingresar</a>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                <a href="{{ route ('dynatracking.index')}}" >
                    <img src="{{URL::asset('icons/reportrace.png')}}" alt="" class="img-rounded img-thumbnail"/>
                    <h2 style="color: maroon;">Seguimientos Titulados</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Puede consultar y descargar informacion de los seguimientos segun su criterio de busqueda personalizada.
                    </p>
                    <a href="{{ route('dynatracking.index') }}" class="btn btn-success" title="More">Ingresar</a>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                <a href="{{ route ('tra.report')}}" >
                    <img src="{{URL::asset('icons/reportcourses.png')}}" alt="" class="img-rounded img-thumbnail"/>
                    <h2 style="color: maroon;">Cursos de Capacitación</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Puede consultar y descargar informacion de los seguimientos segun su criterio de busqueda personalizada.
                    </p>
                    <a href="{{ route('tra.report') }}" class="btn btn-success" title="More">Ingresar</a>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                <a href="{{ route ('report.index')}}" >
                    <img src="{{URL::asset('icons/back.png')}}" alt="imagen" class="img-rounded img-thumbnail"/>
                    <h2 style="color: maroon;">Volver Atrás</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Presiona en el botón para regresar a la página anterior o puedes utilizar el menu ubicado en la parte de arriba.
                    </p>
                    <a href="{{ route ('report.index')}}" class="btn btn-success" title="Ir">Volver</a>
                </a>
                </div>
            </div>
        </div>
  </div>
</div>
@endsection