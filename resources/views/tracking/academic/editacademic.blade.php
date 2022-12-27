@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR SEGUIMIENTO ACADEMICO</h1>
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
            <form class="form-horizontal" action="{{ route('acad.update', $academic->id) }}"
                method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Registro:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" style="width: 100%;">
                            <option value="{{ $academic->student->id }}">{{ $academic->student->student_register }}</option>
                          </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre de Titulado:</label>
                    <div class="col-lg-8">
                        <input class="form-control" value="{{ $academic->student->student_name }} {{ $academic->student->student_lastname }} "  type="text" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre de Especialidad:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="academic_name" id="academic_name" type="text" value="{{ $academic->academic_name }}">
                            @error('academic_name')
                        <small class="text-danger">¡Introduzca el Nombre!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Tipo de Especialidad:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="academic_type" name="academic_type" style="width: 100%;">
                            <option value="{{ $academic->academic_type }}">{{ $academic->academic_type }}</option>
                            <option value="Diplomado">Diplomado</option>
                            <option value="Maestria">Maestria</option>
                            <option value="Doctorado">Doctorado</option>
                            <option value="Idioma">Idioma</option>
                          </select>
                          @error('academic_type')
                        <small class="text-danger">¡Campo Vacio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Estado de Especialidad:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="academic_status" name="academic_status" style="width: 100%;">
                            <option value="{{ $academic->academic_status }}">{{ $academic->academic_status }}</option>
                            <option value="En Proceso">En Proceso</option>
                            <option value="Finalizado">Finalizado</option>
                          </select>
                          @error('academic_status')
                        <small class="text-danger">¡Campo Vacio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre de Institución:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="academic_institute" id="academic_institute" type="text" value="{{ $academic->academic_institute }}">
                            @error('academic_institute')
                        <small class="text-danger">¡Introduzca un Nombre!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: Solo es posible editar los campos propios del seguimiento.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Editar Seguimiento" class="btn btn-success">
                <a href="{{ route('acad.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection