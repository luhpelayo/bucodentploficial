@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">SUB MODULO FOTOS DE LABORATORIOS </h1>
    </div>
    <div class="container">
        <div class="row style_featured">
            @can('photolab.create')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('photolab.create')}}">
                        <img src="{{URL::asset('icons/addphoto.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Cargar Fotos</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Se registra informacion respecto a los Laboratorios y se adjuntan imagenes que respaldan
                            dicho trabajo.
                        </p>
                        <a href="{{ route ('photolab.create')}}" class="btn btn-success" title="Ir">Registrar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('photolab.show')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('photolab.show')}}">
                        <img src="{{URL::asset('icons/viewphoto.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Mostrar Fotos</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Puede mostrar todas las imagenes cargadas a un Laboratorio ademas es posible editar o
                            eliminar los registros.
                        </p>
                        <a href="{{ route ('photolab.show')}}" class="btn btn-success" title="Ir">Mostrar</a>
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