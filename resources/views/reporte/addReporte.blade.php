@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">CREAR </h1>
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
            <h3>Información Consulta</h3>
            <form class="form-horizontal" action="{{ route('reporte.store') }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Paciente:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="pacienteid3" name="pacienteid3" style="width: 100%;">
                            <option value="">Seleccionar Paciente</option>
                            @foreach($pacientes as $paciente)
                            <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
                            @endforeach
                          </select>
                          @error('pacienteid3')
                        <small class="text-danger">¡Campo Vacio!</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Odontologo:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="odontologoid3" name="odontologoid3" style="width: 100%;">
                            <option value="">Seleccionar Odontologo</option>
                            @foreach($odontologos as $odontologo)
                            <option value="{{ $odontologo->id }}">{{ $odontologo->nombre }}</option>
                            @endforeach
                          </select>
                          @error('odontologoid3')
                        <small class="text-danger">¡Campo Vacio!</small>
                        @enderror
                    </div>
                </div>


               

                <div class="form-group">
                    <label class="col-lg-3 control-label">Servicio:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="servicioid3" name="servicioid3" style="width: 100%;">
                            <option value="">Seleccionar Servicio</option>
                            @foreach($servicios as $servicio)
                            <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                            @endforeach
                          </select>
                          @error('servicioid3')
                        <small class="text-danger">¡Campo Vacio!</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha Hora :</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="fechahora" id="fechahora"  type="datetime-local" placeholder="ejemplo">
                            @error('fechahora')
                        <small class="text-danger">¡Introduzca fechahora!</small>
                        @enderror
                    </div>
                </div>
        
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: el reporte  debe ser llenado
                    </span>
                </div>
                <hr>
                <input type="submit" value="Crear Odontograma" class="btn btn-success">
                <a href="{{ route('reporte.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection