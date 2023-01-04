@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">MODULO DE DIENTES</h1>
    </div>
    <div class="container">
        <div class="row style_featured">
            @can('diente.create')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('diente.create')}}">
                        <img src="{{URL::asset('icons/addstudent.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Registrar Diente</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Usted podra registrar toda la informacion necesaria de un diente, dicha informacion sera
                            utilizada en otros procesos.
                        </p>
                        <a href="{{ route ('diente.create')}}" class="btn btn-success" title="Ir">Registrar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('diente.show')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('diente.show')}}">
                        <img src="{{URL::asset('icons/viewstudent.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Mostrar dientes</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Se visualiza toda la informacion de los dientes registrados ademas es posible editar,
                            eliminar o exportar toda la informacion.
                        </p>
                        <a href="{{ route ('diente.show')}}" class="btn btn-success" title="Ir">Mostrar</a>
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