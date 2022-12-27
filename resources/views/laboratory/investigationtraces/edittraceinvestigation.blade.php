@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR PRACTICA INDUSTRIAL</h1>
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
            <h3 style="text-align: center">Editar Información de la Práctica</h3>
            <form class="form-horizontal" action="{{ route('practice.update', $practice->id) }}"
                method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha de Práctica:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="practice_date" id="practice_date" type="date" value="{{ $practice->practice_date }}">
                            @error('practice_date')
                        <small class="text-danger">¡Introduzca la fecha de la Práctica!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Sigla-Materia-Grupo:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="matter_id2" name="matter_id2" style="width: 100%;">
                            <option value="{{ $practice->matter_id }}">{{ $practice->matter->matter_initial }}--{{ $practice->matter->matter_name }}--{{ $practice->matter->matter_group }}</option>
                            @foreach($matters as $matter)
                            <option value="{{ $matter->id }}" >{{ $matter->matter_initial }}--{{ $matter->matter_name }}--{{ $matter->matter_group }}</option>
                            @endforeach
                          </select>
                          @error('matter_id2')
                        <small class="text-danger">¡Es necesario seleccionar una Materia!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Docente de la Materia:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="matter_teacher2" id="matter_teacher2" type="text" value="{{ $practice->matter->matter_teacher }}" readonly>
                            @error('matter_teacher2')
                        <small class="text-danger">¡Campo Vácio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Estudiante:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="student_id" name="student_id" style="width: 100%;">
                            <option value="{{ $practice->student_id }}">{{ $practice->student->student_register }}</option>
                            @foreach($students as $student)
                            <option value="{{ $student->id }}" >{{ $student->student_register }}</option>
                            @endforeach
                          </select>
                          @error('student_id')
                        <small class="text-danger">¡Es necesario seleccionar un Estudiante!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Empresa:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="company_id" name="company_id" style="width: 100%;">
                            <option value="{{ $practice->company_id }}">{{ $practice->company->company_name }}</option>
                            @foreach($companies as $company)
                            <option value="{{ $company->id }}" >{{ $company->company_name }}</option>
                            @endforeach
                          </select>
                          @error('student_id')
                        <small class="text-danger">¡Es necesario seleccionar una Empresa!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Observación de la Práctica:</label>
                    <div class="col-lg-8">
                        <textarea cols="86" rows="5" name="practice_description" id="practice_description">{{ $practice->practice_description }}</textarea>
                            @error('practice_description')
                        <small class="text-danger">¡Texto Demasiado Largo o Vacio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: Trate de editar solamente los campos necesarios del registro.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Editar" class="btn btn-success">
                <a href="{{ route('prac.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection