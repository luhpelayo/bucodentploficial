@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE PRACTICAS INDUSTRIALES REGISTRADAS</h1>
  </div>
  <div style="text-align: center">
    @can('practices.create')
    <a href="{{ route('practice.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('practice.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('practice.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('prac.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Fecha de Práctica</th>
        <th>Registro</th>
        <th>Estudiante</th>
        <th>Materia--Grupo</th>
        <th>Docente Titular</th>
        <th>Empresa</th>
        <th>Contacto Empresa</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($practices as $practice)
      <tr>
        <td>{{ $practice->practice_date }}</td>
        <td>{{ $practice->student->student_register }}</td>
        <td>{{ $practice->student->student_lastname }} {{ $practice->student->student_name }}</td>
        <td>{{ $practice->matter->matter_initial }} {{ $practice->matter->matter_name }}--{{
          $practice->matter->matter_group }}</td>
        <td>{{ $practice->matter->matter_teacher }}</td>
        <td>{{ $practice->company->company_name }}</td>
        <td>{{ $practice->company->company_contact }}</td>
        <td style="text-align: center">
          @can('practices.edit')
          <a class="btn btn-success btn-sm" href="{{ route('practice.edit', $practice->id) }}">Editar</a>
          @endcan
          @can('practices.destroy')
          <form action="{{ route('practice.destroy', $practice->id) }}" method="post" style="display: inline-block">
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
      Nota: Si usted elimina una Práctica registrada todos los registros que dependen de dicha Práctica tambien seran
      eliminados.
    </span>
  </div>
</div>
@endsection