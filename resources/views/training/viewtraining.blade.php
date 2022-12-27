@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE CURSOS/TALLERES REGISTRADOS</h1>
  </div>
  <div style="text-align: center">
    @can('tra.create')
    <a href="{{ route('tra.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('tra.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('tra.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('tra.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Nombre del Curso</th>
        <th>Duración en Fecha</th>
        <th>Docente</th>
        <th>Inscritos</th>
        <th>Recaudación</th>
        <th>Documentos</th>
        <th>Imagenes</th>
        <th style="text-align: center">Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($trainings as $training)
      <tr>
        <td>{{ $training->training_name }}</td>
        <td>desde:{{ $training->training_stardate}} hasta:{{ $training->training_endate}}</td>
        <td>{{ $training->training_teacher }}</td>
        <td>{{ $training->training_quantity }}</td>
        <td>{{ $training->training_money }} Bs</td>
        <td style="text-align: center">
          <a class="btn btn-primary btn-sm" href="{{ route('tra.showpdfs', $training->id) }}">VER</a>
        </td>
        <td>
          <a class="btn btn-warning btn-sm" href="{{ route('tra.showimages', $training->id) }}">VER</a>
        </td>
        <td style="text-align: center">
          <a class="btn btn-success btn-sm" href="{{ route('tra.files', $training->id) }}">Adjuntar</a>
          @can('tra.edit')
          <a class="btn btn-info btn-sm" href="{{ route('tra.edit', $training->id) }}">Editar</a>
          @endcan
          @can('tra.destroy')
          <form action="{{ route('tra.destroy', $training->id) }}" method="post" style="display: inline-block">
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
      Nota: Si usted elimina cualquier Curso registrado tambien se eliminara la documentacion digital.
    </span>
  </div>
</div>
@endsection