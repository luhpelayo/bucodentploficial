@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR FICHA CLINICA</h1>
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
            <h3 style="text-align: center">Editar Información de la Ficha Clinica </h3>
            <form class="form-horizontal" action="{{ route('fichaclinica.update', $fichaclinica->id) }}"
                method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Alergia:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="alergia" id="alergia" type="date" value="{{ $fichaclinica->alergia}}">
                            @error('alergia')
                        <small class="text-danger">¡Introduzca una Alergia!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Radiografia:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="radiografia" id="radiografia" type="date" value="{{ $fichaclinica->radiografia}}">
                            @error('radiografia')
                        <small class="text-danger">¡Introduzca una radiografia!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Archivo:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="idarchivo" name="idarchivo" style="width: 100%;">
                            <option value="{{ $fichaclinica->idarchivo }}">{{ $fichaclinica->archivo->descripcion }}</option>
                            @foreach($archivos as $archivo)
                            <option value="{{ $archivo->id }}" >{{ $archivo->descripcion }}</option>
                            @endforeach
                          </select>
                          @error('idarchivo')
                        <small class="text-danger">¡Es necesario seleccionar un archivo!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Consulta:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="consultaid" name="consultaid" style="width: 100%;">
                            <option value="{{ $fichaclinica->consultaid }}">{{ $fichaclinica->consulta->fechahora }}</option>
                            @foreach($consultas as $consulta)
                            <option value="{{ $matter->id }}" >{{ $consulta->fechahora }}</option>
                            @endforeach
                          </select>
                          @error('consultaid')
                        <small class="text-danger">¡Es necesario seleccionar una fecha!</small>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: Trate de editar solamente los campos necesarios del registro.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Editar Ficha clinica" class="btn btn-success">
                <a href="{{ route('fichaclinica.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection