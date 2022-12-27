@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">SUB MODULO DE ACTAS DIRECTAS</h1>
    </div>
    <div class="container">
        <div class="row style_featured">
            @can('actadir.create')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('actadir.create')}}">
                        <img src="{{URL::asset('icons/addactadirect1.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Registrar Acta</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Se registra unicamente a los estudiantes que tengan condicion de egreso de forma directa en
                            cualquier de las 3 modalidades permitidas.
                        </p>
                        <a href="{{ route ('actadir.create')}}" class="btn btn-success" title="Ir">Registrar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('actadir.show')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('actadir.show')}}">
                        <img src="{{URL::asset('icons/viewactadirect1.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Mostrar Actas</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Visualiza todas las actas directas registradas en el sistema ademas es posible editar o
                            eliminar los registros.
                        </p>
                        <a href="{{ route ('actadir.show')}}" class="btn btn-success" title="Ir">Mostrar</a>
                    </a>
                </div>
            </div>
            @endcan
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('actas.index')}}">
                        <img src="{{URL::asset('icons/back.png')}}" alt="imagen" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Volver Atrás</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Presiona en el botón para regresar a la página anterior o puedes utilizar el menu ubicado en
                            la parte de arriba.
                        </p>
                        <a href="{{ route ('actas.index')}}" class="btn btn-success" title="Ir">Volver</a>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
</div>
@endsection