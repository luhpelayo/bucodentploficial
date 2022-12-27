@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE EMPRESAS REGISTRADAS</h1>
  </div>
  <div style="text-align: center">
    @can('company.create')
    <a href="{{ route('company.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('company.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('company.excel') }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('prac.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Nombre</th>
        <th>Contacto</th>
        <th>Celular</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($companies as $company)
      <tr>
        <td>{{ $company->company_name }}</td>
        <td>{{ $company->company_contact }}</td>
        <td>{{ $company->company_number }}</td>
        <td style="text-align: center">
          @can('company.edit')
          <a class="btn btn-success btn-sm" href="{{ route('company.edit', $company->id) }}">Editar</a>
          @endcan
          @can('company.destroy')
          <form action="{{ route('company.destroy', $company->id) }}" method="post" style="display: inline-block">
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
      Nota: Si usted elimina una Empresa todos los registros que dependen de dicha Empresa tambien seran eliminados.
    </span>
  </div>
</div>
@endsection