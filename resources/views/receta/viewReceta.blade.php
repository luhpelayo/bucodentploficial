@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE RECETAS REGISTRADAS</h1>
  </div>
  <div style="text-align: center">
    @can('receta.create')
    <a href="{{ route('receta.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('receta.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('receta.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('receta.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Descripcion</th>
        <th>Paciente</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($recetas as $receta)
      <tr>
        <td>{{ $receta->descripcion }}</td>
        <td>{{ $receta->consulta->pacienteid }}</td>
        <td style="text-align: center">
          @can('receta.edit')
          <a class="btn btn-warning btn-sm" href="{{ route('receta.edit', $receta->id) }}">Editar</a>
          @endcan
          @can('receta.destroy')
          <form action="{{ route('receta.destroy', $receta->id) }}" method="post" style="display: inline-block">
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
      Nota: Si usted elimina una Receta Registrada todos los registros que dependen de dicha Receta tambien seran
      eliminadas.
    </span>
  </div>
</div>
@endsection