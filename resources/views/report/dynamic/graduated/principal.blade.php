@extends('layouts.master')
@section('content')
<div class="container">
<div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">REPORTES DE TITULADOS</h1>
</div>
  <div class="container">
        <div class="row style_featured">
        <div class="col-md-4">
                <div>
                <a href="{{ route ('actadir.report')}}" >
                    <img src="{{URL::asset('icons/reportdirect.png')}}" alt="" class="img-rounded img-thumbnail"/>
                    <h2 style="color: maroon;">Actas Directas</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Puede consultar y descargar informacion de las actas directas segun su criterio de busqueda personalizada.
                    </p>
                    <a href="{{ route ('actadir.report')}}" class="btn btn-success" title="Ir">Ingresar</a>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                <a href="{{ route ('actadef.report')}}" >
                    <img src="{{URL::asset('icons/reportdefense.png')}}" alt="imagen" class="img-rounded img-thumbnail"/>
                    <h2 style="color: maroon;">Actas de Defensa</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Puede consultar y descargar informacion de las actas con tfg segun su criterio de busqueda personalizada.
                    </p>
                    <a href="{{ route ('actadef.report')}}" class="btn btn-success" title="Ir">Ingresar</a>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                <a href="{{ route ('tomo.report')}}" >
                    <img src="{{URL::asset('icons/reporttfg.png')}}" alt="" class="img-rounded img-thumbnail"/>
                    <h2 style="color: maroon;">TFG</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Puede consultar y descargar informacion de los TFG segun su criterio de busqueda personalizada.
                    </p>
                    <a href="{{ route ('tomo.report')}}" class="btn btn-success" title="More">Ingresar</a>
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