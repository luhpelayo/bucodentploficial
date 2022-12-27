@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">Lista de {{ $training->training_name }}</h1>
    <h4 style="text-align:center; color: gray; font-weight: bolder;">Duración desde {{ $training->training_stardate}} hasta:{{ $training->training_endate}}, Inscritos {{ $training->training_quantity }} Estudiantes </h4>
  </div>
  <div style="text-align: center">
    <a href="{{ route('assist.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    <a href="{{ route('assist.pdf', $training->id) }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('assist.excel', $training->id) }}" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('assist.show') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Estudiante</th>
        <th>Registro</th>
        <th>C.I</th>
        <th>Telefono</th>
        <th>Nro Recibo</th>
        <th>Tipo Deposito</th>
        <th>Monto</th>
        <th style="text-align: center">Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($assistances as $assistance)
      <tr>
        <td>{{ $assistance->student->student_lastname }} {{ $assistance->student->student_name }}</td>
        <td> {{ $assistance->student->student_register }} </td>
        <td>{{ $assistance->student->student_ci }} {{ $assistance->student->student_exp }}</td>
        <td>{{ $assistance->student->student_number }}</td>
        @if(!empty($assistance->assistance_receipt) && !empty($assistance->assistance_payment) && !empty($assistance->assistance_amount) )
        <td>{{ $assistance->assistance_receipt }}</td>
        <td>{{ $assistance->assistance_payment }}</td>
        <td>{{ $assistance->assistance_amount }} Bs</td>
        @else
        <td>Beca</td>
        <td>Beca</td>
        <td>Beca</td>
        @endif
        <td style="text-align: center">
          <form action="{{ route('assist.destroy', $assistance->id) }}" method="post" style="display: inline-block">
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
      Nota: Si usted elimina cualquier fila se verá reflejado en los certificados digitales, procure eliminar con antelación.
    </span>
  </div>
</div>
@endsection