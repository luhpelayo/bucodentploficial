@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">MODULO DE SEGUIMIENTOS A TITULADOS</h1>
    </div>
    <div class="container">
        <div class="row style_featured">
            @can('acad.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('acad.index')}}">
                        <img src="{{URL::asset('icons/academic.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Académico</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Almacena respaldo de todos los cursos postgrados o extracurricular que haya realizado un
                            estudiante titulado.
                        </p>
                        <a href="{{ route ('acad.index')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('work.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('work.index')}}">
                        <img src="{{URL::asset('icons/work.png')}}" alt="imagen" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Laboral</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Resguarda todo el historial de experiencia laboral que haya obtenido un estudiante titulado
                            desde su fecha de egreso.
                        </p>
                        <a href="{{ route ('work.index')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('cult.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('cult.index')}}">
                        <img src="{{URL::asset('icons/culture.png')}}" alt="imagen" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Cultural</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Si el estudiante titulado tiene habilidades extras referentes al entorno socio cultural
                            entonces puedes registrar aqui.
                        </p>
                        <a href="{{ route ('cult.index')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('construccion.index')}}">
                        <img src="{{URL::asset('icons/curriculum.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Curriculum CV</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Selecciona un Estudiante titulado y se genera un documento PDF con modelo de hoja de vida
                            que incluye todos sus datos.
                        </p>
                        <a href="{{ route ('construccion.index')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
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