@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE RECIBOS REGISTRADoS</h1>
  </div>
  <div style="text-align: center">
    @can('recibo.create')
    <a href="{{ route('recibo.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('recibo.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('recibo.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('recibo.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th></th>
        <th>Ajc</th>
        <th>Credito</th>
        <th>Diente</th>
        <th>Fecha</th>
        <th>Saldo</th>
        <th>Tiempo</th>
        <th>Tratamiento</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($recibos as $recibo)
      <tr>
        <td>{{ $recibo->ajc }}</td>
        <td>{{ $recibo->credito }}</td>
        <td>{{ $recibo->diente }}</td>
        <td>{{ $recibo->fecha }}</td>
        <td>{{ $recibo->saldo }}</td>
        <td>{{ $recibo->tiempo }}</td>
        <td>{{ $recibo->tratamiento }}</td>
        <td>{{ $recibo->consulta->pacienteid }}</td>
        <td style="text-align: center">
          @can('recibo.edit')
          <a class="btn btn-warning btn-sm" href="{{ route('recibo.edit', $recibo->id) }}">Editar</a>
          @endcan
          @can('recibo.destroy')
          <form action="{{ route('recibo.destroy', $recibo->id) }}" method="post" style="display: inline-block">
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
      Nota: Si usted elimina un Recibo Registrado todos los registros que dependen de dicho Recibotambien seran
      eliminadas.
    </span>
  </div>
</div>
@endsection