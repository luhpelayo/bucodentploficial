@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">Modulo de Prácticas Industriales</h1>
    </div>
    <div class="container">
        <div class="row style_featured">
            <div class="col-md-4">
                <div>
                    <img src="{{URL::asset('icons/addpractice.png')}}" alt="imagen" class="img-rounded img-thumbnail" />
                    <h2 style="color: maroon;">Cargar Práctica</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Usted podra registrar toda la informacion necesaria de un estudiante, dicha informacion sera
                        utilizada en otros procesos.
                    </p>
                    <a href="{{ route ('practice.create')}}" class="btn btn-success" title="Ir">Registrar</a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <img src="{{URL::asset('icons/addcompanypractice.png')}}" alt="imagen" class="img-rounded img-thumbnail" />
                    <h2 style="color: maroon;">Cargar Empresa</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Aqui se registran todas las empresas donde los estudiantes pueden ir a realizar sus prácticas industriales.
                    </p>
                    <a href="{{ route ('company.create')}}" class="btn btn-success" title="Ir">Registrar</a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <img src="{{URL::asset('icons/viewpractice.png')}}" alt="imagen"
                        class="img-rounded img-thumbnail" />
                    <h2 style="color: maroon;">Mostrar Prácticas</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Aqui se respalda toda la informacion referente a estudiantes egresados como ser Acta, Trabajo
                        final, Modalidades & más.
                    </p>
                    <a href="{{ route ('practice.show')}}" class="btn btn-success" title="Ir">Mostrar</a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <img src="{{URL::asset('icons/viewcompanypractice.png')}}" alt="imagen"
                        class="img-rounded img-thumbnail" />
                    <h2 style="color: maroon;">Mostrar Empresas</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Se puede visualizar todas las empresas registradas que estan disponibles para las practicas de los estudiantes.
                    </p>
                    <a href="{{ route ('company.show')}}" class="btn btn-success" title="Ir">Mostrar</a>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <img src="{{URL::asset('icons/back.png')}}" alt="imagen" class="img-rounded img-thumbnail" />
                    <h2 style="color: maroon;">Volver Atrás</h2>
                    <p style="text-align: left;">
                        <span class="fa fa-info-circle"></span>
                        Presiona en el botón para regresar a la página anterior o puedes utilizar el menu ubicado en la parte de arriba..
                    </p>
                    <a href="{{ route ('portal.index')}}" class="btn btn-success" title="Ir">Volver</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection