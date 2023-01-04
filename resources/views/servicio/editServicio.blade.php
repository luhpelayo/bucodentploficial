@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR SERVICIO</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                @if(!empty($servicio->student_image))
                <img src="{{ URL::asset('/images/'.$servicio->student_image)}}" style="width: 120%" class="avatar img-circle img-thumbnail"
                    alt="avatar">
                @else
                <img src="{{ URL::asset('icons/sinimagen.png')}}" style="width: 120%" class="avatar img-circle img-thumbnail" alt="avatar">
                <h4>Sin foto de Perfil</h4>
                @endif
            </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <h3 style="text-align: center">Editar Información del servicio</h3>
            <form enctype="multipart/form-data" class="form-horizontal"
                action="{{ route('servicio.update', $servicio->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombres:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="nombre" id="nombre" type="text"
                            value="{{ $servicio->nombre }}">
                        @error('nombre')
                        <small class="text-danger">¡Introduzca el nombre del Servicio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Descripcion:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="descripcion" id="descripcion" type="text"
                            value="{{ $servicio->descripcion }}">
                        @error('descripcion')
                        <small class="text-danger">¡Introduzca descripcion del servicio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Precio:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="precio" id="precio" type="text"
                            value="{{ $servicio->precio }}">
                        @error('ci')
                        <small class="text-danger">Precio Vacio, Mal Escrito o Repetido!</small>
                        @enderror
                    </div>
                </div>
                
                <hr>
                <input type="submit" value="Actualizar Servicio" class="btn btn-success">
                <a href="{{ route('servicio.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection