@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE MODALIDADES GRL REGISTRADAS</h1>
  </div>
  <div style="text-align: center">
    @can('modality.create')
    <a href="{{ route('modality.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('modality.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('modality.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('modal.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
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
      @foreach ($modalities as $modality)
      <tr>
        <td>{{ $modality->modality_name }}</td>
        <td>{{ $modality->modality_description }}</td>
        <td style="text-align: center">
          @can('modality.edit')
          <a class="btn btn-success btn-sm" href="{{ route('modality.edit', $modality->id) }}">Editar</a>
          @endcan
          @can('modality.destroy')
          <form action="{{ route('modality.destroy', $modality->id) }}" method="post" style="display: inline-block">
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
      Nota: Si usted elimina una Modalidad todos los registros que dependen de dicha Modalidad tambien seran eliminados.
  </span>
  </div>
</div>
@endsection