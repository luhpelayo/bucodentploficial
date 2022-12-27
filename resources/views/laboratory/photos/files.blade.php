@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">ADJUNTAR IMAGENES DE LABORATORIO</h1>
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
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('photolab.storefiles', $laboratory->id) }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha de Elaboración:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="date" value="{{ $laboratory->labphoto_date }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="{{ $laboratory->labphoto_name }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Responsable:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="{{ $laboratory->labphoto_subject }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Materia-Grupo:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="{{ $laboratory->matter->matter_initial }}--{{ $laboratory->matter->matter_name }}--{{ $laboratory->matter->matter_group }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Imágenes:</label>
                    <div class="col-lg-8">
                        <input type="file" name="lab_images[]" id="lab_images[]" multiple accept="image/*" required>
                    @error('lab_images')
                        <small class="text-danger">Campo Vácio o Formato Incorrecto!</small>
                    @enderror
                    </div>   
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: Es posible cargar varias imagenes(JPG,JPGE,PNG), Mejor si la resolucion es la misma para evitar ocupar espacio en Servidor.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Guardar Archivos" class="btn btn-success">
                <a href="{{ route('pho.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection