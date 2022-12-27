@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">SUB MODULO DE MODALIDADES GRL</h1>
    </div>
    <div class="container">
        <div class="row style_featured">
            @can('modality.create')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('modality.create')}}">
                        <img src="{{URL::asset('icons/addmodality.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Registrar Modalidad</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Se puede registrar todas las modalidades disponibles con la cual se pueden clasificar los
                            Trabajos Finales de Grado.
                        </p>
                        <a href="{{ route ('modality.create')}}" class="btn btn-success" title="Ir">Registrar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('modality.show')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('modality.show')}}">
                        <img src="{{URL::asset('icons/viewmodality.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Mostrar Modalidades</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Visualiza todas las modalidades disponibles en el sistema y ademas es posible editar o
                            eliminar los registros.
                        </p>
                        <a href="{{ route ('modality.show')}}" class="btn btn-success" title="Ir">Mostrar</a>
                    </a>
                </div>
            </div>
            @endcan
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('grad.index')}}">
                        <img src="{{URL::asset('icons/back.png')}}" alt="imagen" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Volver Atrás</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Presiona en el botón para regresar a la página anterior o puedes utilizar el menu ubicado en
                            la parte de arriba.
                        </p>
                        <a href="{{ route ('grad.index')}}" class="btn btn-success" title="Ir">Volver</a>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
</div>
@endsection