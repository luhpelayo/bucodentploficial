@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">REGISTRAR SERVICIO</h1>
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
            <h3>Información del Servicio</h3>
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('servicio.store') }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombres:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="nombre" id="nombre" type="text" placeholder="ejemplo Nells Antonio">
                        @error('nombre')
                        <small class="text-danger">¡Introduzca  Nombre del servicio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Descripcion:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="descripcion" id="descripcion" type="text" placeholder="ejemplo Vidal Vargas">
                            @error('descripcion')
                        <small class="text-danger">¡Introduzca descripcion del servicio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Precio:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="precio" id="precio" type="text" placeholder="ejemplo 150">
                            @error('precio')
                        <small class="text-danger">¡Precio Vacio</small>
                        @enderror
                    </div>
                </div>
            
                <hr>
                <input type="submit" value="Registrar Servicio" class="btn btn-success">
                <a href="{{ route('servicio.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection