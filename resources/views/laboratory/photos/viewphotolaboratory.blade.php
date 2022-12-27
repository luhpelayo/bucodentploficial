@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE LABORATORIOS REGISTRADOS</h1>
  </div>
  <div style="text-align: center">
    @can('photolab.create')
    <a href="{{ route('photolab.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('photolab.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('photolab.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('pho.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Fecha Elaboración</th>
        <th>Nombre de Laboratorio</th>
        <th>Responsable</th>
        <th>Materia--Grupo</th>
        <th>Imagenes</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($laboratories as $laboratory)
      <tr>
        <td>{{ $laboratory->labphoto_date}}</td>
        <td>{{ $laboratory->labphoto_name }}</td>
        <td>{{ $laboratory->labphoto_subject }}</td>
        <td>{{ $laboratory->matter->matter_initial }} {{ $laboratory->matter->matter_name }}--{{
          $laboratory->matter->matter_group }}</td>
        <td style="text-align: center">
          <a class="btn btn-info btn-sm" href="{{ route('photolab.showimages', $laboratory->id) }}">Ver</a>
        </td>
        <td style="text-align: center">
          <a class="btn btn-success btn-sm" href="{{ route('photolab.files', $laboratory->id) }}">Adjuntar</a>
          @can('photolab.edit')
          <a class="btn btn-warning btn-sm" href="{{ route('photolab.edit', $laboratory->id) }}">Editar</a>
          @endcan
          @can('photolab.destroy')
          <form action="{{ route('photolab.destroy', $laboratory->id) }}" method="post" style="display: inline-block">
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
      Nota: Si usted elimina un laboratorio registrado todos los registros que dependen de dicho laboratorio tambien
      seran eliminados.
    </span>
  </div>
</div>
@endsection