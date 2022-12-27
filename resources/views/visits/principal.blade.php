@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">MODULO DE VISITAS TECNICAS</h1>
    </div>
    <div class="container">
        <div class="row style_featured">
            @can('visit.create')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('visit.create')}}">
                        <img src="{{URL::asset('icons/addvisit.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Registrar Visita</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Usted puede registrar toda la información de las visitas tecnicas realizadas y adjuntar
                            documentación.
                        </p>
                        <a href="{{ route ('visit.create')}}" class="btn btn-success" title="Ir">Registrar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('visit.show')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('visit.show')}}">
                        <img src="{{URL::asset('icons/viewvisit.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Mostrar Visitas Técnicas</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Se puede visualizar toda la información registrada y ademas descargar toda la documentación
                            adjuntada.
                        </p>
                        <a href="{{ route ('visit.show')}}" class="btn btn-success" title="Ir">Mostrar</a>
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