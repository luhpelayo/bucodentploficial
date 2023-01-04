@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">REGISTRAR Tratamiento</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                <img src="{{ asset('/images/industrial.png') }}" alt="LOGO">
            </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <h3>Información del Tratamiento</h3>
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('tratamiento.store') }}"
                method="POST">
                @csrf
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="nombre" id="nombre" type="text" placeholder="ejemplo molar">
                            @error('nombre')
                        <small class="text-danger">¡Introduzca su Apellido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Color:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="color" id="color" type="text" placeholder="ejemplo azul">
                            @error('color')
                        <small class="text-danger">¡Registro Vacio, Mal Escrito o Repetido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">precio:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="precio" id="precio" type="number" placeholder="ejemplo 216">
                            @error('precio')
                        <small class="text-danger">¡Registro Vacio, Mal Escrito o Repetido!</small>
                        @enderror
                    </div>
                </div>
              
               
                <hr>
                <input type="submit" value="Registrar Tratamiento" class="btn btn-success">
                <a href="{{ route('tratamiento.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection