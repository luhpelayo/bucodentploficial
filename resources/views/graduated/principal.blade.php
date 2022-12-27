@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">MODULO DE ESTUDIANTES TITULADOS</h1>
    </div>
    <div class="container">
        <div class="row style_featured">
            @can('actas.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('actas.index')}}">
                        <img src="{{URL::asset('icons/acta.png')}}" alt="imagen" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Actas</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Aqui se puede registrar las actas de egreso de los estudiantes que ya han defendido su TFG
                            previamente debe registrar a los estudiantes.
                        </p>
                        <a href="{{ route ('actas.index')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('categ.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('categ.index')}}">
                        <img src="{{URL::asset('icons/category.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Categorías</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Todos los Trabajos Finales de Grado tienen una categoría en especifico, aqui puede registrar
                            o modificar dichas categorías.
                        </p>
                        <a href="{{ route('categ.index') }}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('modal.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('modal.index')}}">
                        <img src="{{URL::asset('icons/modal.png')}}" alt="imagen" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Modalidades</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            En este sub-modulo se registran todas las posibles modalidades de GRL disponibles que seran
                            utilizadas en las actas y TFG.
                        </p>
                        <a href="{{ route('modal.index') }}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('tomo.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('tomo.index')}}">
                        <img src="{{URL::asset('icons/tomos.png')}}" alt="imagen" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Trabajos de Grado</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Tambien llamados Tomos, Aqui se puede registrar el trabajo de grado de los estudiantes que
                            ya han sido titulados en la carrera.
                        </p>
                        <a href="{{ route('tomo.index') }}" class="btn btn-success" title="Ir">Ingresar</a>
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