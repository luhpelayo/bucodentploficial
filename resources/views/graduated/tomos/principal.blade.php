@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">SUB MODULO DE TRABAJOS FINALES DE GRADO</h1>
    </div>
    <div class="container">
        <div class="row style_featured">
            @can('tomo.create')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('tomo.create')}}">
                        <img src="{{URL::asset('icons/addtomo.png')}}" alt="imagen" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Registrar TFG</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Se puede registrar toda la información respecto a los trabajos finales de grado de los
                            estudiantes.
                        </p>
                        <a href="{{ route ('tomo.create')}}" class="btn btn-success" title="Ir">Registrar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('tomo.show')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('tomo.show')}}">
                        <img src="{{URL::asset('icons/viewtomo.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Mostrar TFG</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Visualiza todos los registros disponibles y ademas es capaz de editar o eliminar algunos
                            registros.
                        </p>
                        <a href="{{ route ('tomo.show')}}" class="btn btn-success" title="Ir">Mostrar</a>
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