@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">MODULO DE PACIENTES</h1>
    </div>
    <div class="container">
        <div class="row style_featured">
            @can('paciente.create')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('paciente.create')}}">
                        <img src="{{URL::asset('icons/addpaciente.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Registrar Paciente</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Usted podra registrar toda la informacion necesaria de un paciente, dicha informacion sera
                            utilizada en otros procesos.
                        </p>
                        <a href="{{ route ('paciente.create')}}" class="btn btn-success" title="Ir">Registrar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('paciente.show')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('paciente.show')}}">
                        <img src="{{URL::asset('icons/viewpaciente.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Mostrar Pacientes</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Se visualiza toda la informacion de los pacientes registrados ademas es posible editar,
                            eliminar o exportar toda la informacion.
                        </p>
                        <a href="{{ route ('paciente.show')}}" class="btn btn-success" title="Ir">Mostrar</a>
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