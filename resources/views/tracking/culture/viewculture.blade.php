@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE ACTIVIDADES CULTURALES</h1>
  </div>
  <div style="text-align: center">
    @can('cult.create')
    <a href="{{ route('cult.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('cult.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('cult.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('cult.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Estudiante</th>
        <th>Nombre de Actividad</th>
        <th>Nivel</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($cultures as $culture)
      <tr>
        <td>{{ $culture->student->student_lastname }} {{ $culture->student->student_name }}</td>
        <td>{{ $culture->culture_name }}</td>
        <td>{{ $culture->culture_level }}</td>
        <td style="text-align: center">
          @can('cult.edit')
          <a class="btn btn-warning btn-sm" href="{{ route('cult.edit', $culture->id) }}">Editar</a>
          @endcan
          @can('cult.destroy')
          <form action="{{ route('cult.destroy', $culture->id) }}" method="post" style="display: inline-block">
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
      Nota: Si usted elimina una Actividad Cultural todos los registros que dependen de dicha Actividad tambien seran
      eliminados.
    </span>
  </div>
</div>
@endsection