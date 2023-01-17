@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR ARCHIVOS</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                <img src="{{ asset('/images/industrial.png') }}"  alt="LOGO">
            </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <h3 style="text-align: center">Editar Información de los archivos</h3>
            <form class="form-horizontal" action="{{ route('archivo.update', $archivo->id) }}"
                method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Descripcion:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="descripcion" id="descripcion" type="text" value="{{ $archivo->descripcion}}">
                            @error('descripcion')
                        <small class="text-danger">¡Introduzca la descripcion!</small>
                        @enderror
                    </div>
                </div>
               
                <
                    
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: Trate de editar solamente los campos necesarios del registro.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Editar Archivo" class="btn btn-success">
                <a href="{{ route('archivo.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection