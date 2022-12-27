@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE SEGUIMIENTOS LABORALES</h1>
  </div>
  <div style="text-align: center">
    @can('work.create')
    <a href="{{ route('work.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('work.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('work.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('work.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Titulado</th>
        <th>Nombre de Empresa</th>
        <th>Cargo Ejercido</th>
        <th>Estado</th>
        <th>Duración en Fecha</th>
        <th>Funciones realizadas en Empresa</th>
        <th>Referencia Empresa</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($works as $work)
      <tr>
        <td>{{ $work->student->student_lastname }} {{ $work->student->student_name }}</td>
        <td>{{ $work->work_company }}</td>
        <td>{{ $work->work_role }}</td>
        <td>{{ $work->work_status }}</td>
        <td>
          @if(!empty($work->work_endate))
          desde:{{ $work->work_stardate }} hasta:{{ $work->work_endate }}
          @else()
          desde:{{ $work->work_stardate }} hasta: Actualidad
          @endif
        </td>
        <td>{{ $work->work_activities }}</td>
        <td>{{ $work->work_references }}</td>
        <td style="text-align: center">
          @can('work.edit')
          <a class="btn btn-warning btn-sm" href="{{ route('work.edit', $work->id) }}">Editar</a>
          @endcan
          @can('work.destroy')
          <form action="{{ route('work.destroy', $work->id) }}" method="post" style="display: inline-block">
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
      Nota: Nota: Si usted elimina un Seguimiento Laboral todos los registros que dependen de dicho Seguimiento tambien
      seran eliminados.
    </span>
  </div>
</div>
@endsection