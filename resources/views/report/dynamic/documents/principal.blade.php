@extends('layouts.master')
@section('content')
<div class="container">
<div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">REPORTES DE DOCUMENTOS ORGANIZACIONALES</h1>
</div>
  <div class="container">
        <div class="row style_featured">
        <div class="col-md-4">
                <div>
                <a href="{{ route ('letter.report')}}" >
                    <img src="{{URL::asset('icons/reportletter.png')}}" alt="" class="img-rounded img-thumbnail"/>
                    <h2 style="color: maroon;">Modelos de Cartas</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Puede consultar y descargar informacion de los modelos de cartas segun su criterio de busqueda personalizada.
                    </p>
                    <a href="{{ route ('letter.report')}}" class="btn btn-success" title="Ir">Ingresar</a>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                <a href="{{ route ('procedure.report')}}" >
                    <img src="{{URL::asset('icons/reportprocedure.png')}}" alt="imagen" class="img-rounded img-thumbnail"/>
                    <h2 style="color: maroon;">Procedimientos</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Puede consultar y descargar informacion de los procedimientos segun su criterio de busqueda personalizada.
                    </p>
                    <a href="{{ route ('procedure.report')}}" class="btn btn-success" title="Ir">Ingresar</a>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                <a href="{{ route ('instruction.report')}}" >
                    <img src="{{URL::asset('icons/reportinstructive.png')}}" alt="" class="img-rounded img-thumbnail"/>
                    <h2 style="color: maroon;">Instructivos</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Puede consultar y descargar informacion de los instructivos segun su criterio de busqueda personalizada.
                    </p>
                    <a href="{{ route ('instruction.report')}}" class="btn btn-success" title="More">Ingresar</a>
                </a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                <a href="{{ route ('program.report')}}" >
                    <img src="{{URL::asset('icons/reportprogram.png')}}" alt="" class="img-rounded img-thumbnail"/>
                    <h2 style="color: maroon;">Programas Análiticos</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Puede consultar y descargar informacion de los programas análiticos segun su criterio de busqueda personalizada.
                    </p>
                    <a href="{{ route ('program.report')}}" class="btn btn-success" title="More">Ingresar</a>
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