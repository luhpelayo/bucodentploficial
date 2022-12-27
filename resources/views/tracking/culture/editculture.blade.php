@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR ACTIVIDAD CULTURAL</h1>
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
            <h3>Editar Información del Seguimiento</h3>
            <form class="form-horizontal" action="{{ route('cult.update', $culture->id) }}"
                method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Registro:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" style="width: 100%;">
                            <option value="{{ $culture->student->id }}">{{ $culture->student->student_register }}</option>
                          </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre de Titulado:</label>
                    <div class="col-lg-8">
                        <input class="form-control" value="{{ $culture->student->student_name }} {{ $culture->student->student_lastname }} "  type="text" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre de Actividad:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="culture_name" id="culture_name" type="text" value="{{ $culture->culture_name }}">
                            @error('culture_name')
                        <small class="text-danger">¡Introduzca un Nombre!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nivel de Actividad:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="culture_level" name="culture_level" style="width: 100%;">
                            <option value="{{ $culture->culture_level }}">{{ $culture->culture_level }}</option>
                            <option value="Básico">Básico</option>
                            <option value="Intermedio">Intermedio</option>
                            <option value="Avanzado">Avanzado</option>
                          </select>
                          @error('culture_level')
                        <small class="text-danger">¡Campo Vacio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: Solo es posible editar los campos propios de la Actividad.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Editar Seguimiento" class="btn btn-success">
                <a href="{{ route('cult.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection