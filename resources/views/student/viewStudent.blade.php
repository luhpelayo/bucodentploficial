@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE ESTUDIANTES REGISTRADOS</h1>
  </div>
  <div style="text-align: center">
    @can('student.create')
    <a href="{{ route('student.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('student.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('student.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('std.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Apellidos</th>
        <th>Nombres</th>
        <th>Registro</th>
        <th>Nro de CI</th>
        <th>Celular</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($students as $student)
      <tr>
        <td>{{ $student->student_lastname }}</td>
        <td>{{ $student->student_name }}</td>
        <td>{{ $student->student_register }}</td>
        <td>{{ $student->student_ci }} {{ $student->student_exp }}</td>
        <td>{{ $student->student_number }}</td>
        <td style="text-align: center">
          @can('student.edit')
          <a class="btn btn-success btn-sm" href="{{ route('student.edit', $student->id) }}">Editar</a>
          @endcan
          @can('student.destroy')
          <form action="{{ route('student.destroy', $student->id) }}" method="post" style="display: inline-block">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger btn-sm delete-confirm" value="Eliminar">
          </form>
          @endcan
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div style="text-align: center">
    <span style="color: red">
      Nota: Si usted elimina un estudiante registrado todos los registros que dependen de dicho estudiante tambien seran
      eliminados.
    </span>
  </div>
</div>
@endsection