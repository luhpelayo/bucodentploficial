@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">VISUALIZAR LISTA DE CURSOS/TALLERES</h1>
    </div>
    <div class="container">
        <div class="row style_featured">
          @foreach ($trainings as $training)
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('assist.showlist', $training->id)}}">
                        <img src="{{URL::asset('icons/viewtraininglist.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">{{ $training->training_name }}</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Se visualiza la lista completa de estudiantes que participaron en el curso.
                        </p>
                        <a href="{{ route ('assist.showlist', $training->id)}}" class="btn btn-success" title="Ir">Ver Lista</a>
                    </a>
                </div>
            </div>
            @endforeach
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('tra.index')}}">
                        <img src="{{URL::asset('icons/back.png')}}" alt="imagen" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Volver Atrás</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Presiona en el botón para regresar a la página anterior o puedes utilizar el menu ubicado en
                            la parte de arriba.
                        </p>
                        <a href="{{ route ('tra.index')}}" class="btn btn-success" title="Ir">Volver</a>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection