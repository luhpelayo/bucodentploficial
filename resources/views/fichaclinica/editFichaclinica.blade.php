@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">AGREGAR NRO ODONTOGRAMA</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <h3 style="text-align: center">Informaciones de ficha clinica</h3>
            <form enctype="multipart/form-data" class="form-horizontal"
                action="{{ route('fichaclinica.update', $fichaclinica->id) }}" method="POST">
                @csrf
                @method('put')


                <div class="form-group">
                    <label class="col-lg-3 control-label">Alergia:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="alergia" id="alergia" type="text"
                            value="{{ $fichaclinica->alergia }}">
                        @error('alergia')
                        <small class="text-danger">¡Introduzca su Apellido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Radiografia:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="radiografia" id="radiografia" type="text"
                            value="{{ $fichaclinica->radiografia }}">
                        @error('radiografia')
                        <small class="text-danger">¡Introduzca su radiografia!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Archivo:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="archivoid3" name="archivoid3" style="width: 100%;">
                            <option value="{{$fichaclinica->idarchivo}}">{{$fichaclinica->idarchivo}}</option>
                           
                          </select>
                          @error('archivoid3')
                        <small class="text-danger">¡Campo Vacio!</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Consulta:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="fichaclinicaid3" name="fichaclinicaid3" style="width: 100%;">
                            <option value="{{$fichaclinica->consultaid}}">{{ $fichaclinica->consultaid }}</option>
                           
                          </select>
                          @error('fichaclinicaid3')
                        <small class="text-danger">¡Campo Vacio!</small>
                        @enderror
                    </div>
                </div>

               
                
                
                <hr>
                <input type="submit" value="Asignar Odontograma" class="btn btn-success">
                <a href="{{ route('fichaclinica.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection