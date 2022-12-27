@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">MODULO DE REPORTES DINAMICOS & GRAFICOS</h1>
    </div>
      <div class="container">
            <div class="row style_featured">
            <div class="col-md-4">
                    <div>
                    <a href="{{ route ('dyna.index')}}" >
                        <img src="{{URL::asset('icons/reportdinamic.png')}}" alt="imagen" class="img-rounded img-thumbnail"/>
                        <h2 style="color: maroon;">Reportes Dinamicos</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Usted podra consultar informacion de cualquier modulo del sistema y en base a sus criterios la informacion sera especifica.
                        </p>
                        <a href="{{ route ('dyna.index')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                    <a href="{{ route ('construccion.index')}}" >
                        <img src="{{URL::asset('icons/reportgrafic.png')}}" alt="imagen" class="img-rounded img-thumbnail"/>
                        <h2 style="color: maroon;">Reportes Graficos</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                                Se visualiza toda la informacion de los modulos pero con graficos estadisticos acordes a su necesidad.
                        </p>
                        <a href="{{ route ('construccion.index')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                    <a href="{{ route ('portal.index')}}" >
                        <img src="{{URL::asset('icons/back.png')}}" alt="imagen" class="img-rounded img-thumbnail"/>
                        <h2 style="color: maroon;">Volver Atrás</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Presiona en el botón para regresar a la página anterior o puedes utilizar el menu ubicado en la parte de arriba.
                        </p>
                        <a href="{{ route ('portal.index')}}" class="btn btn-success" title="Ir">Volver</a>
                    </a>
                    </div>
                </div>
            </div>
      </div>
    <br>
    <br>
    </div>
@endsection