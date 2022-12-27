@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">REGISTRAR PLANTILLA DE CERTIFICADO</h1>
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
            <h3>Información de la Plantilla</h3>
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('temp.store') }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Curso/Taller:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="training_id" name="training_id" style="width: 100%;">
                            <option value="">Seleccionar Curso/Taller</option>
                            @foreach($trainings as $training)
                            <option value="{{ $training->id }}" >{{ $training->training_name }}</option>
                            @endforeach
                          </select>
                          @error('training_id')
                        <small class="text-danger">¡Campo Vacio / El curso ya tiene certificado!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Docente del Curso:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="training_teacher2" id="training_teacher2" type="text" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Total Inscritos:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="training_quantity2" id="training_quantity2" type="number" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha de Inicio:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="training_stardate2" id="training_stardate2" type="date" readonly >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha Final:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="training_endate2" id="training_endate2" type="date" readonly >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Plantilla PDF:</label>
                    <div class="col-lg-8">
                        <input type="file" name="template_document" id="template_document" accept="application/pdf" required>
                    @error('template_document')
                        <small class="text-danger">Formato Incorrecto!, Intente de Nuevo</small>
                    @enderror
                    </div>
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: El documento debe estar en formato PDF y sin nombre de estudiante.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Crear Plantilla" class="btn btn-success">
                <a href="{{ route('tra.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>
@endsection