@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">MODULO DE CONVENIOS</h1>
    </div>
    <div class="container">
        <div class="row style_featured">
            @can('nat.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('nat.index')}}">
                        <img src="{{URL::asset('icons/nacion.png')}}" alt="imagen" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Nacional</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Usted podra registrar toda la informacion necesaria de un estudiante, dicha informacion sera
                            utilizada en otros procesos.
                        </p>
                        <a href="{{ route ('nat.index')}}" class="btn btn-success" title="Ir">Registrar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('inter.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('inter.index')}}">
                        <img src="{{URL::asset('icons/inter.png')}}" alt="imagen" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Internacional</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Aqui se respalda toda la informacion referente a estudiantes egresados como ser Acta,
                            Trabajo final, Modalidades & más.
                        </p>
                        <a href="{{ route ('inter.index')}}" class="btn btn-success" title="Ir">Registrar</a>
                    </a>
                </div>
            </div>
            @endcan
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('portal.index')}}">
                        <img src="{{URL::asset('icons/back.png')}}" alt="imagen" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Volver Atrás</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Presiona en el botón para regresar a la página anterior o puedes utilizar el menu ubicado en
                            la parte de arriba.
                        </p>
                        <a href="{{ route ('portal.index')}}" class="btn btn-success" title="Ir">Volver</a>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection