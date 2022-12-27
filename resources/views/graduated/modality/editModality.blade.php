@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR MODALIDAD DE GRL</h1>
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
            <h3 style="text-align: center">Editar Información de la Modalidad</h3>
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('modality.update', $modality->id) }}"
                method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre de la Modalidad:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="modality_name" id="modality_name" type="text" value="{{ $modality->modality_name }}">
                        @error('modality_name')
                        <small class="text-danger">¡Introduzca Nombre de Modalidad!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Descripción de la Modalidad:</label>
                    <div class="col-lg-8">
                        <textarea cols="86" rows="4" name="modality_description" id="modality_description">{{ $modality->modality_description }}</textarea>
                            @error('modality_description')
                        <small class="text-danger">¡Introduzca una Descripción!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group" style="text-align: center" >
                    <span style="color: red">
                        Nota: No actualice datos ya existentes y trate de anotar una pequeña descripción.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Editar Modalidad" class="btn btn-success">
                <a href="{{ route('modal.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>
@endsection