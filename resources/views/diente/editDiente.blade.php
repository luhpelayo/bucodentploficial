@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR DIENTE</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <h3 style="text-align: center">Editar Información del Diente</h3>
            <form enctype="multipart/form-data" class="form-horizontal"
                action="{{ route('diente.update', $diente->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Numero diente:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="numerodiente" id="numerodiente" type="text"
                            value="{{ $diente->numerodiente }}">
                        @error('numerodiente')
                        <small class="text-danger">¡Registro Vacio, Mal Escrito o Repetido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="nombre" id="nombre" type="text"
                            value="{{ $diente->nombre }}">
                        @error('nombre')
                        <small class="text-danger">¡Introduzca su Apellido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Estado:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="estado" id="estado" type="text"
                            value="{{ $diente->estado}}">
                        @error('estado')
                        <small class="text-danger">¡Registro Vacio, Mal Escrito o Repetido!</small>
                        @enderror
                    </div>
                </div>
                
                
                
                <hr>
                <input type="submit" value="Editar Diente" class="btn btn-success">
                <a href="{{ route('dient.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection