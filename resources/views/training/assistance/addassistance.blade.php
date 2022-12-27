@extends('layouts.master')
@section('content')
<div class="container">
    <h1 class="well" style="text-align:center; color: red; font-weight: bolder;">CREAR LISTADO DE ESTUDIANTES
    </h1>
    <div class="col-lg-12 well">
        <div class="container" style="max-width: 1080px">
            <form action="{{ route('assist.store') }}" method="POST">
                @csrf
                @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="form-group">
                    <label>Nombre del Curso</label>
                    <select class="js-example-basic-single" id="training_id" name="training_id" style="width: 100%;">
                        <option value="">Seleccionar Curso</option>
                        @foreach($trainings as $training)
                        <option value="{{ $training->id }}">{{ $training->training_name }}</option>
                        @endforeach
                    </select>
                </div>
                <table class="table table-bordered" id="dynamicAddRemove">
                    <tr>
                        <th>Nro</th>
                        <th>Estudiante</th>
                        <th>Nro Recibo</th>
                        <th>Tipo de Pago</th>
                        <th>Monto (Bs)</th>
                        <th>Opción</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td><select class="js-example-basic-single" id="student_id"
                                name="addMoreInputFields[0][student]" style="width: 100%;">
                                <option value="" disabled selected hidden>Seleccionar Estudiante</option>
                                @foreach($students as $student)
                                <option value="{{ $student->student_lastname }} {{ $student->student_name }}">{{ $student->student_lastname }} {{
                                    $student->student_name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="number" id="receipt" name="addMoreInputFields[0][receipt]"
                                placeholder="Ejemplo 138813" class="form-control" />
                        </td>
                        <td><select class="js-example-basic-single" id="payment" name="addMoreInputFields[0][payment]"
                                style="width: 100%;">
                                <option value="">Seleccionar Tipo</option>
                                <option value="C-FCET">C-FCET</option>
                                <option value="Dep. Banco">Dep. Banco</option>
                                <option value="Tranf. Banco">Tranf. Banco</option>
                            </select>
                        </td>
                        <td><input type="number" id="amount" name="addMoreInputFields[0][amount]"
                                placeholder="Ejemplo 150" class="form-control" />
                        </td>
                    </tr>
                </table>
                <input type="submit" value="Guardar Lista" class="btn btn-success">
                <a href="{{ route('tra.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
                <button type="button" name="add" id="dynamic-ar" class="btn btn-info">Agregar Fila</button>
            </form>
        </div>
        <br>
        <div style="text-align: center">
            <span style="color: red">
                Nota: Rellene todos los campos de la lista, no agrege filas vacias si no es necesario.
            </span>
        </div>
    </div>
</div>
<br>
<br>
@endsection