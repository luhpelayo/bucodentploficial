@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">AGREGAR NRO ODONTOGRAMA</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <h3 style="text-align: center">Informaciones de Consulta</h3>
            <form enctype="multipart/form-data" class="form-horizontal"
                action="{{ route('consulta.update', $consulta->id) }}" method="POST">
                @csrf
                @method('put')

                <div class="form-group">
                    <label class="col-lg-3 control-label">Paciente:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="pacienteid3" name="pacienteid3" style="width: 100%;">
                            <option value="{{$consulta->pacienteid}}">{{$pacientes}}</option>
                           
                          </select>
                          @error('pacienteid3')
                        <small class="text-danger">¡Campo Vacio!</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Odontolgo:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="odontologoid3" name="odontologoid3" style="width: 100%;">
                            <option value="{{$consulta->odontologoid}}">{{ $odontologos }}</option>
                           
                          </select>
                          @error('odontologoid3')
                        <small class="text-danger">¡Campo Vacio!</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Nro Odontograma:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="odontogramaid3" name="odontogramaid3" style="width: 100%;">
                            <option value="{{ $consulta->odontogramaid }}">{{ $consulta->odontogramaid }}</option>
                            @foreach($odontogramas as $odontograma)
                            <option value="{{ $odontograma->id }}">{{ $odontograma->id }}</option>
                            @endforeach
                          </select>
                          @error('odontogramaid3')
                        <small class="text-danger">¡Campo Vacio!</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Servicio:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="servicioid3" name="servicioid3" style="width: 100%;">
                            <option value="{{ $consulta->servicioid}}">{{ $servicios }}</option>
                          
                          </select>
                          @error('servicioid3')
                        <small class="text-danger">¡Campo Vacio!</small>
                        @enderror
                    </div>
                </div>
              
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha Hora:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="fechahora" id="fechahora" type="datetime-local"
                            value="{{ $consulta->fechahora}}">
                        @error('fechahora')
                        <small class="text-danger">¡Registro Vacio, Mal Escrito o Repetido!</small>
                        @enderror
                    </div>
                </div>
                
                
                <hr>
                <input type="submit" value="Asignar Odontograma" class="btn btn-success">
                <a href="{{ route('consulta.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection