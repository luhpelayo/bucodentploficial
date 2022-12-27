@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">MODULO DE DOCUMENTOS ORGANIZACIONALES</h1>
    </div>
    <div class="container">
        <div class="row style_featured">
            @can('area.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('area.index')}}">
                        <img src="{{URL::asset('icons/areas.png')}}" alt="imagen" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Áreas</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Usted podra registrar toda la informacion necesaria de un estudiante, dicha informacion sera
                            utilizada en otros procesos.
                        </p>
                        <a href="{{ route ('area.index')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('lett.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('lett.index')}}">
                        <img src="{{URL::asset('icons/letter.png')}}" alt="imagen" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Modelo de Cartas</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Usted podra registrar toda la informacion necesaria de un estudiante, dicha informacion sera
                            utilizada en otros procesos.
                        </p>
                        <a href="{{ route ('lett.index')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('proc.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('proc.index')}}">
                        <img src="{{URL::asset('icons/procedure.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Procedimientos</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Aqui se respalda toda la informacion referente a estudiantes egresados como ser Acta,
                            Trabajo
                            final, Modalidades & más.
                        </p>
                        <a href="{{ route ('proc.index')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('inst.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('inst.index')}}">
                        <img src="{{URL::asset('icons/instruc.png')}}" alt="imagen" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Instructivos</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Aqui se respalda toda la informacion referente a estudiantes egresados como ser Acta,
                            Trabajo
                            final, Modalidades & más.
                        </p>
                        <a href="{{ route ('inst.index')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('prog.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('prog.index')}}">
                        <img src="{{URL::asset('icons/programs.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Programas Analíticos</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Aqui se respalda toda la informacion referente a estudiantes egresados como ser Acta,
                            Trabajo
                            final, Modalidades & más.
                        </p>
                        <a href="{{ route ('prog.index')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('func.index')}}">
                        <img src="{{URL::asset('icons/organi.png')}}" alt="imagen" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Funciones</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Aqui se respalda toda la informacion referente a estudiantes egresados como ser Acta,
                            Trabajo
                            final, Modalidades & más.
                        </p>
                        <a href="{{ route ('func.index')}}" class="btn btn-success" title="Ir">Ingresar</a>
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