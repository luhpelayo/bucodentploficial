@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">CREAR RECETA</h1>
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
            <h3>Información Acerca de la Receta</h3>
            <form class="form-horizontal" action="{{ route('receta.store') }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Descripcion:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="descripcion" id="descripcion" type="text">
                            @error('descripcion')
                        <small class="text-danger">¡Introduzca la descripcion!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Paciente:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="idconsulta" name="idconsulta" style="width: 100%;">
                            <option value="">Seleccionar Paciente</option>
                            @foreach($consultas as $consulta)
                            <option value="{{ $consulta->id }}" >{{ $consulta->pacienteid }}</option>
                            @endforeach
                          </select>
                          @error('idconsulta')
                        <small class="text-danger">¡Es necesario seleccionar un Paciente!</small>
                        @enderror
                    </div>
                </div>
                
                
                
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: Una vez creada la receta  se podra editar.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Crear Receta" class="btn btn-success">
                <a href="{{ route('receta.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection