@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE SERVICIOS REGISTRADOS</h1>
  </div>
  <div style="text-align: center">
    @can('servicio.create')
    <a href="{{ route('servicio.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('servicio.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('servicio.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('servicio.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>NOMBRE</th>
        <th>DESCRIPCION</th>
        <th>PRECIO</th>
        <th>OPCIONES</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($servicios as $servicio)
      <tr>
        <td>{{ $servicio->nombre }}</td>
        <td>{{ $servicio->descripcion }}</td>
        <td>{{ $servicio->precio }}</td>
        <td style="text-align: center">
          @can('servicio.edit')
          <a class="btn btn-success btn-sm" href="{{ route('servicio.edit', $servicio->id) }}">Editar</a>
          @endcan
          @can('servicio.destroy')
          <form action="{{ route('servicio.destroy', $servicio->id) }}" method="post" style="display: inline-block">
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