@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">CREAR ACTIVIDAD CULTURAL</h1>
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
            <h3>Información Acerca de la Actividad</h3>
            <form class="form-horizontal" action="{{ route('cult.store') }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Registro:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="student_id3" name="student_id3" style="width: 100%;">
                            <option value="">Seleccionar Registro</option>
                            @foreach($students as $student)
                            <option value="{{ $student->id }}">{{ $student->student_register }}</option>
                            @endforeach
                          </select>
                          @error('student_id3')
                        <small class="text-danger">¡Campo Vacio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre de Estudiante:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="name_student" id="name_student" type="text" readonly>
                            @error('name_student')
                        <small class="text-danger">¡Introduzca un Titulado!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre de Actividad:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="culture_name" id="culture_name" type="text" placeholder="Ejemplo Cantante, Guitarrista, Deportista">
                            @error('culture_name')
                        <small class="text-danger">¡Introduzca un Nombre!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nivel de Actividad:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="culture_level" name="culture_level" style="width: 100%;">
                            <option value="">Seleccionar Nivel</option>
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
                        Nota: El Estudiante puede tener 1 o mas actividades culturales.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Crear Actividad" class="btn btn-success">
                <a href="{{ route('cult.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection