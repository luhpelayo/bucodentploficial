@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">SUB MODULO DE CATEGORIAS</h1>
    </div>
    <div class="container">
        <div class="row style_featured">
            @can('category.create')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('category.create')}}">
                        <img src="{{URL::asset('icons/addcategory.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Registrar Categoría</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Se puede registrar todas las categorías disponibles con la cual se pueden clasificar los
                            Trabajos Finales de Grado.
                        </p>
                        <a href="{{ route ('category.create')}}" class="btn btn-success" title="Ir">Registrar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('category.show')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('category.show')}}">
                        <img src="{{URL::asset('icons/viewcategory.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Mostrar Categorías</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Visualiza todas las categorias disponibles en el sistema y ademas es posible editar o
                            eliminar los registros.
                        </p>
                        <a href="{{ route ('category.show')}}" class="btn btn-success" title="Ir">Mostrar</a>
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