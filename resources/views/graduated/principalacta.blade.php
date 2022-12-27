@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">SUB MODULO DE ACTAS</h1>
    </div>
    <div class="container">
        <div class="row style_featured">
            @can('actaDefense.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('actaDefense.index')}}">
                        <img src="{{URL::asset('icons/addactadefense.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Actas de Defensa</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Se registra las actas de los estudiantes que han defendido su trabajo final de grado en
                            cualquier modalidad GRL.
                        </p>
                        <a href="{{ route ('actaDefense.index')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('actaDirect.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('actaDirect.index')}}">
                        <img src="{{URL::asset('icons/addactadirect.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Actas Directas</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Se registra las actas de los estudiantes que han sido elegidos para egresar de forma directa
                            sin defender trabajo final de Grado.
                        </p>
                        <a href="{{ route('actaDirect.index') }}" class="btn btn-success" title="Ir">Ingresar</a>
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