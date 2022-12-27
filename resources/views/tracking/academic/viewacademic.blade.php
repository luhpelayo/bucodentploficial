@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE SEGUIMIENTOS ACADEMICOS</h1>
  </div>
  <div style="text-align: center">
    @can('acad.create')
    <a href="{{ route('acad.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('acad.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('acad.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('acad.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Titulado</th>
        <th>Nombre Especialidad</th>
        <th>Tipo de Especialidad</th>
        <th>Estado</th>
        <th>Institución</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($academics as $academic)
      <tr>
        <td>{{ $academic->student->student_lastname }} {{ $academic->student->student_name }}</td>
        <td>{{ $academic->academic_name }}</td>
        <td>{{ $academic->academic_type }}</td>
        <td>{{ $academic->academic_status }}</td>
        <td>{{ $academic->academic_institute }}</td>
        <td style="text-align: center">
          @can('acad.edit')
          <a class="btn btn-warning btn-sm" href="{{ route('acad.edit', $academic->id) }}">Editar</a>
          @endcan
          @can('acad.destroy')
          <form action="{{ route('acad.destroy', $academic->id) }}" method="post" style="display: inline-block">
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
      Nota: Si usted elimina un Seguimiento Académico todos los registros que dependen de dicho Seguimiento tambien
      seran eliminados.
    </span>
  </div>
</div>
@endsection