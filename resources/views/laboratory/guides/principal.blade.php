@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">SUB MODULO DE GUIAS</h1>
    </div>
    <div class="container">
        <div class="row style_featured">
            @can('guide.create')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('guide.create')}}">
                        <img src="{{URL::asset('icons/addguide.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Registrar Guía</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Se puede registrar toda la información respecto a los trabajos finales de grado de los
                            estudiantes.
                        </p>
                        <a href="{{ route ('guide.create')}}" class="btn btn-success" title="Ir">Registrar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('guide.show')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('guide.show')}}">
                        <img src="{{URL::asset('icons/viewguide.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Mostrar Guías</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Visualiza todos los registros disponibles y ademas es capaz de editar o eliminar algunos
                            registros.
                        </p>
                        <a href="{{ route ('guide.show')}}" class="btn btn-success" title="Ir">Mostrar</a>
                    </a>
                </div>
            </div>
            @endcan
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('lab.index')}}">
                        <img src="{{URL::asset('icons/back.png')}}" alt="imagen" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Volver Atrás</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Presiona en el botón para regresar a la página anterior o puedes utilizar el menu ubicado en
                            la parte de arriba.
                        </p>
                        <a href="{{ route ('lab.index')}}" class="btn btn-success" title="Ir">Volver</a>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection