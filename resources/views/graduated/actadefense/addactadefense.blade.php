@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">REGISTRAR ACTA DE DEFENSA</h1>
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
            <h3>Información Detallada del Acta</h3>
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('actadef.store') }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Estudiante:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="student_id2" name="student_id2" style="width: 100%;">
                            <option value="">Seleccionar Estudiante</option>
                            @foreach($students as $student)
                            <option value="{{ $student->id }}" >{{ $student->student_register }}</option>
                            @endforeach
                          </select>
                          @error('student_id')
                        <small class="text-danger">¡Es necesario seleccionar un Estudiante!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Código de TFG:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="tomo_code2" id="tomo_code2" type="text" readonly>
                            @error('tomo_code')
                        <small class="text-danger">¡Campo Vácio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Código de Acta:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="acta_code" id="acta_code" type="text" placeholder="ejemplo 7454">
                            @error('acta_code')
                        <small class="text-danger">¡Campo Vácio o Código Repetido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Hora de Defensa:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="acta_hour" id="acta_hour" type="time" >
                            @error('acta_hour')
                        <small class="text-danger">¡Introduzca la hora de Defensa!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha de Defensa:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="acta_date" id="acta_date" type="date">
                            @error('acta_date')
                        <small class="text-danger">¡Introduzca la fecha de Defensa!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Tribunal de Defensa:</label>
                    <div class="col-lg-8">
                        <textarea name="acta_court" id="acta_court" cols="86" rows="5"></textarea>
                            @error('acta_court')
                        <small class="text-danger">¡Texto Demasiado Largo o Vacio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nota Final:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="acta_note" id="acta_note" type="text" placeholder="ejemplo 85">
                            @error('acta_note')
                        <small class="text-danger">¡Campo Vácio o Dato Invalido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Imagen:</label>
                    <div class="col-lg-8">
                        <input type="file" name="acta_image" id="acta_image" accept="image/*">
                    @error('acta_image')
                        <small class="text-danger">Campo Vácio o Formato Incorrecto!</small>
                    @enderror
                    </div>
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: Solo se aceptan registros de estudiantes que hayan defendido su TFG.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Registrar Acta" class="btn btn-success">
                <a href="{{ route('actaDefense.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>
@endsection