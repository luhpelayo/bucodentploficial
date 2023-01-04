@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE DIENTES</h1>
  </div>
  <div style="text-align: center">
    @can('diente.create')
    <a href="{{ route('diente.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('diente.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('diente.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('dient.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Numero de diente</th>
        <th>Nombre</th>
        <th>Estado</th>
        
      </tr>
    </thead>
    <tbody>
      @foreach ($dientes as $diente)
      <tr>
        <td>{{ $diente->numerodiente }}</td>
        <td>{{ $diente->nombre }}</td>
        <td>{{ $diente->estado }}</td>
        
        <td style="text-align: center">
          @can('diente.edit')
          <a class="btn btn-success btn-sm" href="{{ route('diente.edit', $diente->id) }}">Editar</a>
          @endcan
          @can('diente.destroy')
          <form action="{{ route('diente.destroy', $diente->id) }}" method="post" style="display: inline-block">
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
      Nota: Si usted elimina un diente registrado todos los registros que dependen de dicho estudiante tambien seran
      eliminados.
    </span>
  </div>
</div>
@endsection