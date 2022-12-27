@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">SUB MODULO DE ACTIVIDADES CULTURALES</h1>
    </div>
    <div class="container">
        <div class="row style_featured">
            @can('cult.create')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('cult.create')}}">
                        <img src="{{URL::asset('icons/addculture.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Registrar Actividad</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Se puede registrar todo los cursos postgrado o extracurricular que ha obtenido un estudiante
                            luego de su titulación..
                        </p>
                        <a href="{{ route ('cult.create')}}" class="btn btn-success" title="Ir">Registrar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('cult.show')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('cult.show')}}">
                        <img src="{{URL::asset('icons/viewculture.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Mostrar Actividades</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Muestra un listado total de todos los seguimientos academicos creados a los estudiantes
                            titulados.
                        </p>
                        <a href="{{ route ('cult.show')}}" class="btn btn-success" title="Ir">Mostrar</a>
                    </a>
                </div>
            </div>
            @endcan
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('track.index')}}">
                        <img src="{{URL::asset('icons/back.png')}}" alt="imagen" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Volver Atrás</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Presiona en el botón para regresar a la página anterior o puedes utilizar el menu ubicado en
                            la parte de arriba.
                        </p>
                        <a href="{{ route ('track.index')}}" class="btn btn-success" title="Ir">Volver</a>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection