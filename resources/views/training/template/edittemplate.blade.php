@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR PLANTILLA DEL CURSO</h1>
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
            <h3 style="text-align: center">Editar Información del Curso</h3>
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('temp.update', $template->id) }}"
                method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre del Curso:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="{{ $template->training->training_name }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Docente del Curso:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="{{ $template->training->training_teacher }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Total Inscritos:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="number" value="{{ $template->training->training_quantity }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha de Inicio:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="date" value="{{ $template->training->training_stardate }}" readonly >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha Final:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="date" value="{{ $template->training->training_endate }}" readonly >
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
                        Nota: Simplemente suba el nuevo documento y el anterior se sobre escribirá.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Editar Plantilla" class="btn btn-success">
                <a href="{{ route('temp.show') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
            <br>
            <br>
        </div>
    </div>
</div>
@endsection