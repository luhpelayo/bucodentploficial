@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">MODULO DE FICHA CLINICA</h1>
    </div>
    <div class="container">
        <div class="row style_featured">
            @can('fichaclinica.create')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('fichaclinica.create')}}">
                        <img src="{{URL::asset('icons/addvisit.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Registrar Ficha clinica</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Usted puede registrar toda la información de las fichas clinicas  realizadas y adjuntar
                            documentación.
                        </p>
                        <a href="{{ route ('fichaclinica.create')}}" class="btn btn-success" title="Ir">Registrar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('fichaclinica.show')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('fichaclinica.show')}}">
                        <img src="{{URL::asset('icons/viewvisit.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Mostrar fichas clinicas</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Se puede visualizar toda la información registrada y ademas descargar toda la documentación
                            adjuntada.
                        </p>
                        <a href="{{ route ('fichaclinica.show')}}" class="btn btn-success" title="Ir">Mostrar</a>
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