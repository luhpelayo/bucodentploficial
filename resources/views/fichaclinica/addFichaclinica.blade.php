@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">CREAR FICHA CLINICA</h1>
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
            <h3>Información Acerca de la Ficha clinica</h3>
            <form class="form-horizontal" action="{{ route('fichaclinica.store') }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Alergia:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="alergia" id="alergia" type="text">
                            @error('alergia')
                        <small class="text-danger">¡Introduzca la alergia!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Radiografia:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="radiografia" id="radiografia" type="text">
                            @error('radiografia')
                        <small class="text-danger">¡Introduzca la alergia!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Archivo:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="idarchivo" name="idarchivo" style="width: 100%;">
                            <option value="">Seleccionar Archivo</option>
                            @foreach($archivos as $archivo)
                            <option value="{{ $archivo->id }}" >{{ $archivo->descripcion}}</option>
                            @endforeach
                          </select>
                          @error('idarchivo')
                        <small class="text-danger">¡Es necesario seleccionar una descripcion!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Consulta:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="consultaid" name="consultaid" style="width: 100%;">
                            <option value="">Seleccionar Paciente</option>
                            @foreach($pacientes as $paciente)
                            <option value="{{ $paciente->id }}" >{{ $paciente->nombre}} {{ $paciente->apellido}}</option>
                            @endforeach
                          </select>
                          @error('consultaid')
                        <small class="text-danger">¡Es necesario seleccionar una Fecha!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: Una vez creada la ficha clinica se podra adjuntar documentacion digital.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Crear Ficha Clinica" class="btn btn-success">
                <a href="{{ route('fichaclinica.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection