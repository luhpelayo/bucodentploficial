@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">MODULO DE PRACTICAS INDUSTRIALES</h1>
    </div>
    <div class="container">
        <div class="row style_featured">
            @can('practices.create')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('practice.create')}}">
                        <img src="{{URL::asset('icons/addpractice.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Cargar Práctica</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Aqui se registra toda la informacion de las practicas que han realizado los estudiantes en
                            diferentes materias.
                        </p>
                        <a href="{{ route ('practice.create')}}" class="btn btn-success" title="Ir">Registrar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('company.create')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('company.create')}}">
                        <img src="{{URL::asset('icons/addcompanypractice.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Cargar Empresa</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Se registran todas las empresas donde los estudiantes pueden ir a realizar sus prácticas
                            industriales.
                        </p>
                        <a href="{{ route ('company.create')}}" class="btn btn-success" title="Ir">Registrar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('practices.show')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('practice.show')}}">
                        <img src="{{URL::asset('icons/viewpractice.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Mostrar Prácticas</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Visualiza todas las practicas registradas hasta la fecha, ademas es posible exportar la
                            informacion.
                        </p>
                        <a href="{{ route ('practice.show')}}" class="btn btn-success" title="Ir">Mostrar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('company.show')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('company.show')}}">
                        <img src="{{URL::asset('icons/viewcompanypractice.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Mostrar Empresas</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Se puede visualizar todas las empresas registradas que estan disponibles para las practicas
                            de los estudiantes.
                        </p>
                        <a href="{{ route ('company.show')}}" class="btn btn-success" title="Ir">Mostrar</a>
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
                            la parte de arriba..
                        </p>
                        <a href="{{ route ('portal.index')}}" class="btn btn-success" title="Ir">Volver</a>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection