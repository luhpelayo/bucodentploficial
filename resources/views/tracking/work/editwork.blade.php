@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR SEGUIMIENTO LABORAL</h1>
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
            <form class="form-horizontal" action="{{ route('work.update', $work->id) }}"
                method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Registro:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" style="width: 100%;">
                            <option value="{{ $work->student->id }}">{{ $work->student->student_register }}</option>
                          </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre de Titulado:</label>
                    <div class="col-lg-8">
                        <input class="form-control" value="{{ $work->student->student_name }} {{ $work->student->student_lastname }}"  type="text" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre de Empresa:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="work_company" id="work_company" type="text" value="{{ $work->work_company }}">
                            @error('work_company')
                        <small class="text-danger">¡Introduzca el Nombre!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Cargo en Empresa:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="work_role" id="work_role" type="text" value="{{ $work->work_role }}">
                            @error('work_role')
                        <small class="text-danger">¡Introduzca el Cargo!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Estado del Trabajo:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="work_status" name="work_status" style="width: 100%;">
                            <option value="{{ $work->work_status }}">{{ $work->work_status }}</option>
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
                        <input class="form-control" name="work_stardate" id="work_stardate" type="date" value="{{ $work->work_stardate }}">
                        @error('work_stardate')
                        <small class="text-danger">¡Introduzca la fecha de inicio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha Final:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="work_endate" id="work_endate" type="date" value="{{ $work->work_endate }}">
                        @error('work_endate')
                        <small class="text-danger">¡Introduzca la fecha final!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Funciones del Cargo:</label>
                    <div class="col-lg-8">
                        <textarea name="work_activities" id="work_activities" cols="86" rows="5">{{ $work->work_activities }}</textarea>
                            @error('work_activities')
                        <small class="text-danger">¡Texto Demasiado Largo o Vacio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Referencia de Empresa:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="work_references" id="work_references" type="text" value="{{ $work->work_references }}">
                            @error('work_references')
                        <small class="text-danger">¡Introduzca un Nombre de Referencia!</small>
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
                <a href="{{ route('work.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection