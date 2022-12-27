@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">REGISTRAR CURSO/TALLER</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                <img src="{{ asset('/images/industrial.png') }}" alt="LOGO">
            </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <h3>Información Acerca del Curso</h3>
            <form class="form-horizontal" action="{{ route('tra.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre del Curso:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="training_name" id="training_name" type="text"
                            placeholder="Ejemplo Curso/taller de instalaciones electricas..">
                        @error('training_name')
                        <small class="text-danger">¡Campo Vácio o Nombre Repetido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha de Inicio:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="training_stardate" id="training_stardate" type="date">
                        @error('training_stardate')
                        <small class="text-danger">¡Introduzca la fecha de inicio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha Final:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="training_endate" id="training_endate" type="date">
                        @error('training_endate')
                        <small class="text-danger">¡Introduzca la fecha final!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Docente del Curso:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="training_teacher" id="training_teacher" type="text"
                            placeholder="Ejemplo Ing Fernando Canavire Castillo">
                        @error('training_teacher')
                        <small class="text-danger">¡Campo Vácio o Incorrecto!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Total Inscritos:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="training_quantity" id="training_quantity" type="number"
                            placeholder="Ejemplo 250..">
                        @error('training_quantity')
                        <small class="text-danger">¡Campo Vácio o Cantidad Incorrecta!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Total Recaudación:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="training_money" id="training_money" type="number"
                            placeholder="Ejemplo 12500..">
                        @error('training_money')
                        <small class="text-danger">¡Campo Vácio o Monto Incorrecto!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: La Recaudación total se asume que está en Bolivianos (Bs), para adjuntar archivos primero debe registrar el curso.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Registrar Curso" class="btn btn-success">
                <a href="{{ route('tra.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection