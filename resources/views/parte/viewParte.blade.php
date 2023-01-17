@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE PARTES</h1>
  </div>
  <div style="text-align: center">
    @can('parte.create')
    <a href="{{ route('parte.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('parte.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('parte.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('parte.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Numero de parte</th>
        <th>Nombre</th>
        <th>Estado</th>
        <th>OPCIONES</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($partes as $parte)
      <tr>
        <td>{{ $parte->numeroparte }}</td>
        <td>{{ $parte->nombre }}</td>
        <td>{{ $parte->estado }}</td>
        
        <td style="text-align: center">
          @can('parte.edit')
          <a class="btn btn-success btn-sm" href="{{ route('parte.edit', $parte->id) }}">Editar</a>
          @endcan
          @can('parte.destroy')
          <form action="{{ route('parte.destroy', $parte->id) }}" method="post" style="display: inline-block">
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