@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">CREAR </h1>
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
            <h3>Información Fichaclinica</h3>
            <form class="form-horizontal" action="{{ route('fichaclinica.store') }}"
                method="POST">
                @csrf

                <div class="form-group">
                    <label class="col-lg-3 control-label">Alergia:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="alergia" id="alergia" type="text" placeholder="ejemplo molar">
                            @error('alergia')
                        <small class="text-danger">¡Introduzca su Apellido!</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Radiografia:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="radiografia" id="radiografia" type="text" placeholder="ejemplo molar">
                            @error('radiografia')
                        <small class="text-danger">¡Introduzca su Apellido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Archivo:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="archivoid3" name="archivoid3" style="width: 100%;">
                            <option value="">Seleccionar archivo</option>
                            @foreach($archivos as $archivo)
                            <option value="{{ $archivo->id }}">{{ $archivo->id }}</option>
                            @endforeach
                          </select>
                          @error('archivoid3')
                        <small class="text-danger">¡Campo Vacio!</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Consulta:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="consultaid3" name="consultaid3" style="width: 100%;">
                            <option value="">Seleccionar consulta</option>
                            @foreach($consultas as $consulta)
                            <option value="{{ $consulta->id }}">{{ $consulta->id }}</option>
                            @endforeach
                          </select>
                          @error('consultaid3')
                        <small class="text-danger">¡Campo Vacio!</small>
                        @enderror
                    </div>
                </div>


               

               

                
        
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: el fichaclinica  debe ser llenado
                    </span>
                </div>
                <hr>
                <input type="submit" value="Crear Odontograma" class="btn btn-success">
                <a href="{{ route('fichaclinica.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection