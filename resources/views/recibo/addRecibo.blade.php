@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">CREAR RECIBOS</h1>
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
            <h3>Información Acerca de los Recibos</h3>
            <form class="form-horizontal" action="{{ route('recibo.store') }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Ajc:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="ajc" id="ajc" type="numeric">
                            @error('ajc')
                        <small class="text-danger">¡Introduzca Monto!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Credito:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="credito" id="credito" type="numeric">
                            @error('credito')
                        <small class="text-danger">¡Introduzca Credito!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Diente:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="diente" id="diente" type="text">
                            @error('diente')
                        <small class="text-danger">¡Introduzca Diente!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="fecha" id="fecha" type="date">
                            @error('fecha')
                        <small class="text-danger">¡Introduzca Fecha!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Saldo:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="saldo" id="saldo" type="numeric">
                            @error('saldo')
                        <small class="text-danger">¡Introduzca Monto!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Tiempo:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="tiempo" id="tiempo" type="date">
                            @error('tiempo')
                        <small class="text-danger">¡Introduzca Monto!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Tratamiento:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="tratamiento" id="tratamiento" type="text">
                            @error('tratamiento')
                        <small class="text-danger">¡Introduzca Monto!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Paciente:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="consultaid" name="consultaid" style="width: 100%;">
                            <option value="">Seleccionar Paciente</option>
                            @foreach($consultas as $consulta)
                            <option value="{{ $consulta->id }}" >{{ $consulta->pacienteid }}</option>
                            @endforeach
                          </select>
                          @error('consultaid')
                        <small class="text-danger">¡Es necesario seleccionar un Paciente!</small>
                        @enderror
                    </div>
                </div>
                
                
                
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: Una vez creada el recibo  se podra adjuntar documentacion digital.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Crear Recibo" class="btn btn-success">
                <a href="{{ route('recibo.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection