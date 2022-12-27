@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR AREA PARA DOCUMENTACION</h1>
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
            <h3 style="text-align: center">Editar Información del Área</h3>
            <form class="form-horizontal" action="{{ route('area.update', $area->id) }}"
                method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre del Área:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="area_name" id="area_name" type="text" value="{{ $area->area_name }}">
                        @error('area_name')
                        <small class="text-danger">¡Introduzca Nombre de Categoría!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Descripcion del Área:</label>
                    <div class="col-lg-8">
                        <textarea cols="86" rows="4" name="area_description" id="area_description">{{ $area->area_description }}</textarea>
                            @error('area_description')
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
                <input type="submit" value="Editar Area" class="btn btn-success">
                <a href="{{ route('area.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection