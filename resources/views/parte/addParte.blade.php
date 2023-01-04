@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">REGISTRAR PARTE</h1>
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
            <h3>Información del Parte</h3>
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('parte.store') }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Numero parte:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="numeroparte" id="numeroparte" type="number" placeholder="ejemplo 216">
                            @error('numeroparte')
                        <small class="text-danger">¡Registro Vacio, Mal Escrito o Repetido!</small>
                        @enderror
                    </div>
                </div>
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
                    <label class="col-lg-3 control-label">Estado:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="estado" id="estado" type="number" placeholder="ejemplo 1">
                            @error('estado')
                        <small class="text-danger">¡Registro Vacio, Mal Escrito o Repetido!</small>
                        @enderror
                    </div>
                </div>
              
              
               
                <hr>
                <input type="submit" value="Registrar Parte" class="btn btn-success">
                <a href="{{ route('parte.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection