@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE ARCHIVOS REGISTRADAS</h1>
  </div>
  <div style="text-align: center">
    @can('archivo.create')
    <a href="{{ route('archivo.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('archivo.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('archivo.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('archivo.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Descripcion</th>
        <th>Documentos</th>
        <th>Imagenes</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($archivos as $archivo)
      <tr>
        <td>{{ $archivo->descripcion }}</td>
        <td style="text-align: center"><a class="btn btn-primary btn-sm" href="{{ route('archivo.showpdfs', $archivo->id) }}">VER</a></td>
        <td style="text-align: center"><a class="btn btn-info btn-sm" href="{{ route('archivo.showimages', $archivo->id) }}">VER</a></td>
        <td style="text-align: center">
          <a class="btn btn-success btn-sm" href="{{ route('archivo.files', $archivo->id) }}">Adjuntar</a>
          @can('archivo.edit')
          <a class="btn btn-warning btn-sm" href="{{ route('archivo.edit', $archivo->id) }}">Editar</a>
          @endcan
          @can('archivo.destroy')
          <form action="{{ route('archivo.destroy', $archivo->id) }}" method="post" style="display: inline-block">
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
      Nota: Si usted elimina una Visita Registrada todos los registros que dependen de dicha Visita tambien seran
      eliminadas.
    </span>
  </div>
</div>
@endsection