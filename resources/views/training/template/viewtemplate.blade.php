@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE CERTIFICADOS POR CURSO</h1>
  </div>
  <div style="text-align: center">
    <a href="{{ route('temp.create') }}" class="btn btn-warning btn-mini">CREAR</a>
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
        <th>Plantilla</th>
        <th style="text-align: center">Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($templates as $template)
      <tr>
        <td>{{ $template->training->training_name }}</td>
        <td>desde:{{ $template->training->training_stardate}} hasta:{{ $template->training->training_endate}}</td>
        <td>{{ $template->training->training_teacher }}</td>
        <td>{{ $template->training->training_quantity }} Alumnos</td>
        <td>{{ $template->training->training_money }} Bs</td>
        <td style="text-align: center">
          @if(!empty($template->template_document))
          <a class="btn btn-warning btn-sm" target="_blank"
            href="{{ asset('/documents/'.$template->template_document)}}">VER</a>
          @endif
        </td>
        <td style="text-align: center">
          <a class="btn btn-info btn-sm" href="{{ route('certif.create', $template->training->id) }}">Asignar</a>
          <a class="btn btn-success btn-sm" href="{{ route('temp.edit', $template->id) }}">Editar</a>
          <form action="{{ route('temp.destroy', $template->id) }}" method="post" style="display: inline-block">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger btn-sm delete-confirm" value="Eliminar">
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div style="text-align: center">
    <span style="color: red">
      Nota: Si usted elimina la plantilla del certificado tambien se eliminaran los certificados Qr de cada estudiante.
    </span>
  </div>
</div>
@endsection