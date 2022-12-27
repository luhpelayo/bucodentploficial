@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE AREAS REGISTRADAS</h1>
  </div>
  <div style="text-align: center">
    @can('area.create')
    <a href="{{ route('area.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('area.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('area.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('area.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($areas as $area)
      <tr>
        <td>{{ $area->area_name }}</td>
        <td>{{ $area->area_description }}</td>
        <td style="text-align: center">
          @can('area.edit')
          <a class="btn btn-success btn-sm" href="{{ route('area.edit', $area->id) }}">Editar</a>
          @endcan
          @can('area.destroy')
          <form action="{{ route('area.destroy', $area->id) }}" method="post" style="display: inline-block">
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
      Nota: Si usted elimina un Área todos los registros que dependen de dicha Área tambien seran eliminados.
    </span>
  </div>
</div>
@endsection