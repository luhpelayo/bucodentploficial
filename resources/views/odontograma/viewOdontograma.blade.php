@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE tratamientos</h1>
  </div>
  <div style="text-align: center">
    @can('tratamiento.create')
    <a href="{{ route('tratamiento.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('tratamiento.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('tratamiento.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('tratamiento.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        
        <th>Nombre</th>
        <th>Color</th>
        <th>Precio</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($tratamientos as $tratamiento)
      <tr>
        
        <td>{{ $tratamiento->nombre }}</td>
        <td>{{ $tratamiento->color }}</td>
        <td>{{ $tratamiento->precio }}</td>
        <td style="text-align: center">
          @can('tratamiento.edit')
          <a class="btn btn-success btn-sm" href="{{ route('tratamiento.edit', $tratamiento->id) }}">Editar</a>
          @endcan
          @can('tratamiento.destroy')
          <form action="{{ route('tratamiento.destroy', $tratamiento->id) }}" method="post" style="display: inline-block">
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
      Nota: Si usted elimina un parte registrado todos los registros que dependen de dicho estudiante tambien seran
      eliminados.
    </span>
  </div>
</div>
@endsection