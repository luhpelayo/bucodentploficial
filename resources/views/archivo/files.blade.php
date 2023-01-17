@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">ADJUNTAR IMAGENES</h1>
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
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('archivo.storefiles', $archivo->id) }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Descripcion:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="descripcion" id="descripcion" type="text" value="{{ $archivo->descripcion }}" readonly>
                            @error('descripcion')
                        <small class="text-danger">¡Introdusca la descripcion!</small>
                        @enderror
                    </div>
                </div>
            
                <div class="form-group">
                    <label class="col-lg-3 control-label">Documentos PDF:</label>
                    <div class="col-lg-8">
                        <input type="file" name="visit_documents[]" id="visit_documents[]" multiple accept="application/pdf">
                    @error('visit_documents')
                        <small class="text-danger">Formato Incorrecto!, Intente de Nuevo</small>
                    @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Imágenes:</label>
                    <div class="col-lg-8">
                        <input type="file" name="visit_images[]" id="visit_images[]" multiple accept="image/*">
                    @error('visit_images')
                        <small class="text-danger">Campo Vácio o Formato Incorrecto!</small>
                    @enderror
                    </div>   
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: Es posible cargar imagenes(JPG,JPGE,PNG) y Documentos(PDF), Mejor si la resolucion es la misma para evitar ocupar espacio en Servidor.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Guardar Archivos" class="btn btn-success">
                <a href="{{ route('visit.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection