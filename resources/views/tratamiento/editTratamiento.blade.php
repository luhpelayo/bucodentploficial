@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR TRATAMIENTO</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <h3 style="text-align: center">Editar Información del tratamiento</h3>
            <form enctype="multipart/form-data" class="form-horizontal"
                action="{{ route('tratamiento.update', $tratamiento->id) }}" method="POST">
                @csrf
                @method('put')
                
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="nombre" id="nombre" type="text"
                            value="{{ $tratamiento->nombre }}">
                        @error('nombre')
                        <small class="text-danger">¡Introduzca su Apellido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Color:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="color" id="color" type="text"
                            value="{{ $tratamiento->color}}">
                        @error('color')
                        <small class="text-danger">¡Registro Vacio, Mal Escrito o Repetido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Precio:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="precio" id="precio" type="number"
                            value="{{ $tratamiento->precio }}">
                        @error('numeroparte')
                        <small class="text-danger">¡Registro Vacio, Mal Escrito o Repetido!</small>
                        @enderror
                    </div>
                </div>
                
                
                <hr>
                <input type="submit" value="Editar Parte" class="btn btn-success">
                <a href="{{ route('tratamiento.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection