@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">MODULO DE RECETAS</h1>
    </div>
    <div class="container">
        <div class="row style_featured">
            @can('receta.create')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('receta.create')}}">
                        <img src="{{URL::asset('icons/addvisit.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Registrar Receta</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Usted puede registrar toda la información de las recetas realizadas.
                        </p>
                        <a href="{{ route ('receta.create')}}" class="btn btn-success" title="Ir">Registrar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('receta.show')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('receta.show')}}">
                        <img src="{{URL::asset('icons/viewvisit.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Mostrar Recetas</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Se puede visualizar toda la información registrada y ademas descargar toda la documentación
                            adjuntada.
                        </p>
                        <a href="{{ route ('receta.show')}}" class="btn btn-success" title="Ir">Mostrar</a>
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