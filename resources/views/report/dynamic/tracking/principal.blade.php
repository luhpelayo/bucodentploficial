@extends('layouts.master')
@section('content')
<div class="container">
<div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">REPORTES DE SEGUIMIENTOS A TITULADOS</h1>
</div>
  <div class="container">
        <div class="row style_featured">
        <div class="col-md-4">
                <div>
                <a href="{{ route ('acad.report')}}" >
                    <img src="{{URL::asset('icons/reportacademic.png')}}" alt="" class="img-rounded img-thumbnail"/>
                    <h2 style="color: maroon;">Seguimiento Academico</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Puede consultar y descargar informacion de de los seguimientos academicos segun su criterio de busqueda personalizada.
                    </p>
                    <a href="{{ route ('acad.report')}}" class="btn btn-success" title="Ir">Ingresar</a>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                <a href="{{ route ('work.report')}}" >
                    <img src="{{URL::asset('icons/reportwork.png')}}" alt="imagen" class="img-rounded img-thumbnail"/>
                    <h2 style="color: maroon;">Seguimiento Laboral</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Puede consultar y descargar informacion de los seguimientos laborales segun su criterio de busqueda personalizada.
                    </p>
                    <a href="{{ route ('work.report')}}" class="btn btn-success" title="Ir">Ingresar</a>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                <a href="{{ route ('cult.report')}}" >
                    <img src="{{URL::asset('icons/reportculture.png')}}" alt="" class="img-rounded img-thumbnail"/>
                    <h2 style="color: maroon;">Seguimiento Cultural</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Puede consultar y descargar informacion de los seguimientos culturales TFG segun su criterio de busqueda personalizada.
                    </p>
                    <a href="{{ route ('cult.report')}}" class="btn btn-success" title="More">Ingresar</a>
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