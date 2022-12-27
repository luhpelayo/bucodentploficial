@extends('layouts.master')
@section('content')
<div class="container">
<div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">REPORTES DE LABORATORIOS</h1>
</div>
  <div class="container">
        <div class="row style_featured">
        <div class="col-md-4">
                <div>
                <a href="{{ route ('guide.report')}}" >
                    <img src="{{URL::asset('icons/reportguide.png')}}" alt="" class="img-rounded img-thumbnail"/>
                    <h2 style="color: maroon;">Guías de Materias</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Puede consultar y descargar informacion de las guias registradas segun su criterio de busqueda personalizada.
                    </p>
                    <a href="{{ route ('guide.report')}}" class="btn btn-success" title="Ir">Ingresar</a>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                <a href="{{ route ('photolab.report')}}" >
                    <img src="{{URL::asset('icons/reportlab.png')}}" alt="imagen" class="img-rounded img-thumbnail"/>
                    <h2 style="color: maroon;">Laboratorios</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Puede consultar y descargar informacion de los laboratorios segun su criterio de busqueda personalizada.
                    </p>
                    <a href="{{ route ('photolab.report')}}" class="btn btn-success" title="Ir">Ingresar</a>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                <a href="{{ route ('investigation.report')}}" >
                    <img src="{{URL::asset('icons/reportinvestigation.png')}}" alt="" class="img-rounded img-thumbnail"/>
                    <h2 style="color: maroon;">Investigación</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Puede consultar y descargar informacion de las investigaciones segun su criterio de busqueda personalizada.
                    </p>
                    <a href="{{ route ('investigation.report')}}" class="btn btn-success" title="More">Ingresar</a>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                <a href="{{ route ('investigationtrace.report')}}" >
                    <img src="{{URL::asset('icons/reportinvestigation.png')}}" alt="" class="img-rounded img-thumbnail"/>
                    <h2 style="color: maroon;">Seguimiento de Investigación</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Puede consultar y descargar informacion de los seguimientos de investigaciones segun su criterio de busqueda personalizada.
                    </p>
                    <a href="{{ route ('investigationtrace.report')}}" class="btn btn-success" title="More">Ingresar</a>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                <a href="{{ route ('dyna.index')}}" >
                    <img src="{{URL::asset('icons/back.png')}}" alt="imagen" class="img-rounded img-thumbnail"/>
                    <h2 style="color: maroon;">Volver Atrás</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Presiona en el botón para regresar a la página anterior o puedes utilizar el menu ubicado en la parte de arriba.
                    </p>
                    <a href="{{ route ('dyna.index')}}" class="btn btn-success" title="Ir">Volver</a>
                </a>
                </div>
            </div>
        </div>
  </div>
</div>
@endsection