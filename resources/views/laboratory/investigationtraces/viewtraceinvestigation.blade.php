@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE SEGUIMIENTOS REGISTRADOS</h1>
  </div>
  <div style="text-align: center">
    @can('investigationtrace.create')
    <a href="{{ route('investigationtrace.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('inv.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Código de Investigación</th>
        <th>Responsable</th>
        <th>Nombre de Investigación</th>
        <th>Seguimiento creado en:</th>
        <th>Documentos</th>
        <th>Imagenes</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($traces as $trace)
      <tr>
        <td>{{ $trace->investigation->investigation_code }}</td>
        <td>{{ $trace->investigation->investigation_subject}}</td>
        <td>{{ $trace->investigation->investigation_name }}</td>
        <td>{{ $trace->created_at }}</td>
        <td style="text-align: center">
          <a class="btn btn-primary btn-sm" href="{{ route('investigationtrace.showpdfs', $trace->id) }}">VER</a>
        </td>
        <td style="text-align: center">
          <a class="btn btn-info btn-sm" href="{{ route('investigationtrace.showimages', $trace->id) }}">VER</a>
        </td>
        <td style="text-align: center">
          <a class="btn btn-success btn-sm" href="{{ route('investigationtrace.files', $trace->id) }}">Adjuntar</a>
          @can('investigationtrace.destroy')
          <form action="{{ route('investigationtrace.destroy', $trace->id) }}" method="post" style="display: inline-block">
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
  <div style="text-align: center" > 
    <span style="color: red">
      Nota: Si usted elimina un Seguimiento registrado todos los registros que dependen de dicho Seguimiento tambien seran eliminados.
  </span>
  </div>
</div>
@endsection