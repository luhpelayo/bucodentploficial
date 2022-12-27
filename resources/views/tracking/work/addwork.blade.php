@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">CREAR SEGUIMIENTO LABORAL</h1>
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
            <h3>Información Acerca del Seguimiento</h3>
            <form class="form-horizontal" action="{{ route('work.store') }}"
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
                    <label class="col-lg-3 control-label">Nombre de Titulado:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="name_student" id="name_student" type="text" readonly>
                            @error('name_student')
                        <small class="text-danger">¡Introduzca un Titulado!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre de Empresa:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="work_company" id="work_company" type="text">
                            @error('work_company')
                        <small class="text-danger">¡Introduzca el Nombre!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Cargo en Empresa:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="work_role" id="work_role" type="text">
                            @error('work_role')
                        <small class="text-danger">¡Introduzca el Cargo!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Estado del Trabajo:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="work_status" name="work_status" style="width: 100%;">
                            <option value="">Seleccionar Estado</option>
                            <option value="Vigente">Vigente</option>
                            <option value="No Vigente">No Vigente</option>
                          </select>
                          @error('work_status')
                        <small class="text-danger">¡Seleccione un Estado!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha de Inicio:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="work_stardate" id="work_stardate" type="date">
                        @error('work_stardate')
                        <small class="text-danger">¡Introduzca la fecha de inicio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha Final:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="work_endate" id="work_endate" type="date">
                        @error('work_endate')
                        <small class="text-danger">¡Introduzca la fecha final!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Funciones del Cargo:</label>
                    <div class="col-lg-8">
                        <textarea name="work_activities" id="work_activities" cols="86" rows="5"></textarea>
                            @error('work_activities')
                        <small class="text-danger">¡Texto Demasiado Largo o Vacio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Referencia de Empresa:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="work_references" id="work_references" type="text">
                            @error('work_references')
                        <small class="text-danger">¡Introduzca un Nombre de Referencia!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: El titulado puede tener 1 o mas seguimiento laborales, si el trabajo esta vigente entonces no tiene fecha final.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Crear Seguimiento" class="btn btn-success">
                <a href="{{ route('work.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection