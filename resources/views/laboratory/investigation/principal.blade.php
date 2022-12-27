@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">SUB MODULO DE INVESTIGACIONES</h1>
    </div>
    <div class="container">
        <div class="row style_featured">
            @can('investigation.create')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('investigation.create')}}">
                        <img src="{{URL::asset('icons/addinvestigation2.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Registrar Investigación</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Se respalda todo lo referente a una investigacion realizada por algun responsable con un
                            limite de fechas.
                        </p>
                        <a href="{{ route ('investigation.create')}}" class="btn btn-success" title="Ir">Registrar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('investigation.show')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('investigation.show')}}">
                        <img src="{{URL::asset('icons/viewinvestigation.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Mostrar Investigaciones</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Recupera y muestra todas las investigaciones realizadas hasta la fecha actual y ademas es
                            posible editar la informacion.
                        </p>
                        <a href="{{ route ('investigation.show')}}" class="btn btn-success" title="Ir">Mostrar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('investigationtrace.create')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('investigationtrace.create')}}">
                        <img src="{{URL::asset('icons/addinvtrace.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Registrar Seguimientos</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Las investigaciones deben tener por lo menos 1 seguimiento, se adjunta las imagenes o
                            documentos disponibles.
                        </p>
                        <a href="{{ route ('investigationtrace.create')}}" class="btn btn-success"
                            title="Ir">Registrar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('investigationtrace.show')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('investigationtrace.show')}}">
                        <img src="{{URL::asset('icons/addinvestigation.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Mostrar Seguimientos</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Visualiza todos los seguimientos creados para las investigaciones ademas es capaz de
                            eliminar algunos datos.
                        </p>
                        <a href="{{ route ('investigationtrace.show')}}" class="btn btn-success" title="Ir">Mostrar</a>
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