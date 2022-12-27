@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE ACTAS DE DEFENSA REGISTRADAS</h1>
  </div>
  <div style="text-align: center">
    @can('actadef.create')
    <a href="{{ route('actadef.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('actadef.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('actadef.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('actaDefense.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Codigo Acta</th>
        <th>Estudiante</th>
        <th>Modalidad</th>
        <th>Título TFG</th>
        <th>Tribunal de Defensa</th>
        <th>Nota</th>
        <th>Fecha, Hora de defensa</th>
        <th>Imagen</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($actas as $acta)
      <tr>
        <td>{{ $acta->acta_code }}</td>
        <td>{{ $acta->tomo->student->student_lastname }} {{ $acta->tomo->student->student_name }}</td>
        <td>{{ $acta->tomo->modality->modality_name }}</td>
        <td>{{ $acta->tomo->tomo_title }}</td>
        <td>{{ $acta->acta_court }}</td>
        <td>{{ $acta->acta_note }}</td>
        <td>{{ $acta->acta_date }}, {{ $acta->acta_hour }}</td>
        <td>
          @if(!empty($acta->acta_image))
          <a class="btn btn-warning btn-sm" target="_blank" href="{{ asset('/images/'.$acta->acta_image)}}">VER</a>
          @endif
        </td>
        <td style="text-align: center">
          @can('actadef.edit')
          <a class="btn btn-success btn-sm" href="{{ route('actadef.edit', $acta->id) }}">Editar</a>
          @endcan
          @can('actadef.destroy')
          <form action="{{ route('actadef.destroy', $acta->id) }}" method="post" style="display: inline-block">
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
      Nota: Si usted elimina una Acta registrada todos los registros que dependen de dicha Acta tambien seran
      eliminados.
    </span>
  </div>
</div>
@endsection