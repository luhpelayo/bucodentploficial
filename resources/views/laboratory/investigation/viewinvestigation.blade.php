@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE INVESTIGACIONES REGISTRADAS</h1>
  </div>
  <div style="text-align: center">
    @can('investigation.create')
    <a href="{{ route('investigation.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('investigation.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('investigation.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('inv.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Código</th>
        <th>Responsable</th>
        <th>Nombre</th>
        <th>Fecha Inicio</th>
        <th>Fecha Final</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($investigations as $investigation)
      <tr>
        <td>{{ $investigation->investigation_code }}</td>
        <td>{{ $investigation->investigation_subject }}</td>
        <td>{{ $investigation->investigation_name }}</td>
        <td>{{ $investigation->investigation_stardate }}</td>
        <td>{{ $investigation->investigation_endate }}</td>
        <td style="text-align: center">
          @can('investigation.edit')
          <a class="btn btn-success btn-sm" href="{{ route('investigation.edit', $investigation->id) }}">Editar</a>
          @endcan
          @can('investigation.destroy')
          <form action="{{ route('investigation.destroy', $investigation->id) }}" method="post"
            style="display: inline-block">
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
      Nota: Si usted elimina una Investigación registrada todos los registros que dependen de dicha Investigación
      tambien seran eliminados.
    </span>
  </div>
</div>
@endsection