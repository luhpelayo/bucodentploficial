@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR RECIBO</h1>
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
            <h3 style="text-align: center">Editar Información del recibo</h3>
            <form class="form-horizontal" action="{{ route('recibo.update', $recibo->id) }}"
                method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Ajc:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="ajc" id="ajc" type="date" value="{{ $recibo->ajc}}">
                            @error('ajc')
                        <small class="text-danger">¡Introduzca ajc!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Credito:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="credito" id="credito" type="numeric" value="{{ $recibo->credito}}">
                            @error('credito')
                        <small class="text-danger">¡Introduzca credito!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Diente:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="diente" id="diente" type="date" value="{{ $recibo->diente}}">
                            @error('diente')
                        <small class="text-danger">¡Introduzca diente!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="fecha" id="fecha" type="date" value="{{ $recibo->fecha}}">
                            @error('fecha')
                        <small class="text-danger">¡Introduzca fecha!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Saldo:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="saldo" id="saldo" type="numeric" value="{{ $recibo->saldo}}">
                            @error('saldo')
                        <small class="text-danger">¡Introduzca saldo!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Tiempo:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="tiempo" id="tiempo" type="date" value="{{ $recibo->tiempo}}">
                            @error('tiempo')
                        <small class="text-danger">¡Introduzca tiempo!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Tratamiento:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="tratamiento" id="tratamiento" type="date" value="{{ $recibo->tratamiento}}">
                            @error('tratamiento')
                        <small class="text-danger">¡Introduzca tratamiento!</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Paciente:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="consultaid" name="consultaid" style="width: 100%;">
                            <option value="{{ $recibo->consultaid }}">{{ $recibo->consulta->pacienteid }}</option>
                            @foreach($sonsultas as $consulta)
                            <option value="{{ $consulta->id }}" >{{ $consulta->pacienteid }}</option>
                            @endforeach
                          </select>
                          @error('consultaid')
                        <small class="text-danger">¡Es necesario seleccionar una Materia!</small>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: Trate de editar solamente los campos necesarios del registro.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Editar Recibo" class="btn btn-success">
                <a href="{{ route('recibo.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection