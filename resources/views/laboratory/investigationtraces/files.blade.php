@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">ADJUNTAR ARCHIVOS A LA INVESTIGACION : {{ $trace->investigation->investigation_code }}</h1>
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
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('investigationtrace.storefiles', $trace->id) }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Responsable:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="{{ $trace->investigation->investigation_subject }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="{{ $trace->investigation->investigation_name }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha de Inicio:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="date" value="{{ $trace->investigation->investigation_stardate }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha Final:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="date" value="{{ $trace->investigation->investigation_stardate }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Seguimiento creado en:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="datetime" value="{{ $trace->created_at }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Documentos PDF:</label>
                    <div class="col-lg-8">
                        <input type="file" name="trace_documents[]" id="trace_documents[]" multiple accept="application/pdf">
                    @error('trace_documents')
                        <small class="text-danger">Formato Incorrecto!, Intente de Nuevo</small>
                    @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Imágenes:</label>
                    <div class="col-lg-8">
                        <input type="file" name="trace_images[]" id="trace_images[]" multiple accept="image/*">
                    @error('trace_images')
                        <small class="text-danger">Campo Vácio o Formato Incorrecto!</small>
                    @enderror
                    </div>   
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: Es posible cargar varios documentos(PDF) y varias imagenes(JPG,JPGE,PNG).
                    </span>
                </div>
                <hr>
                <input type="submit" value="Guardar Archivos" class="btn btn-success">
                <a href="{{ route('inv.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection