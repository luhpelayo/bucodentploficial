@php use App\Http\Controllers\CertificateController;  @endphp
@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">Certificados del {{ $training->training_name }}</h1>
  </div>
  <div style="text-align: center">
    <a href="{{ route('certif.pdf', $training->id) }}" class="btn btn-success btn-mini">PDF</a>
    <a href="{{ route('temp.show') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Estudiante</th>
        <th>Registro</th>
        <th>C.I</th>
        <th>Telefono</th>
        <th>Generar Certificado</th>
        <th>Codigo Qr</th>
        <th>Enviar Qr</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($assistances as $assistance)
      <tr>
        <td>{{ $assistance->student->student_lastname }} {{ $assistance->student->student_name }}</td>
        <td> {{ $assistance->student->student_register }} </td>
        <td>{{ $assistance->student->student_ci }} {{ $assistance->student->student_exp }}</td>
        <td>{{ $assistance->student->student_number }}</td>
        <td style="text-align: center">
          <form style="display: block" action="{{ route('certif.store', [$training->id, $assistance->student->id]) }}" method="post">
            @csrf
            <div class="form-group">
              <div class="col-lg-8">
                  <input class="form-control" name="certificate_number" id="certificate_number" type="text"
                      placeholder="Nro Certificado" required>
                  @error('certificate_number')
                  <small class="text-danger">¡Campo Vácio o Duplicado!</small>
                  @enderror
              </div>
          </div>
            <input type="submit" class="btn btn-success" value="Click">
          </form>
        </td>
        <td style="text-align: center">
          <a target="_blank">
            @php
            $student_fullname = strtoupper($assistance->student->student_lastname.''.$assistance->student->student_name);
            $student_fullname = str_replace(' ', '', $student_fullname); 
            $name_document = $student_fullname.'-'.str_replace(' ', '', $training->training_name);
            $qr_path = 'CodeQr/'.$name_document.'.png';
            $file_path = 'certificates/'.$name_document.'.pdf';
            @endphp
            @if(Storage::disk('images')->exists($qr_path)) 
            <img src="{{ asset('/images/'.$qr_path)}}" alt="QR" width="100px"/>
            @else
            <h5>No Existe</h5>
            @endif
          </a>
        </td>
        <td style="text-align: center">
          @if(Storage::disk('images')->exists($qr_path)) 
          <a target="_blank" href="<?php echo CertificateController::sendmessage($assistance->student->student_number, $training->training_name, $file_path );?>">
            <img src="{{URL::asset('icons/whatsapp.png')}}" alt="imagen" width="100px"/>
          @else
          <h5>No Certif</h5>
          @endif
          </a>
        </td>
        <td style="text-align: center">
          @if(Storage::disk('images')->exists($file_path)) 
          <form action="{{ route('certif.destroy', [$training->id, $assistance->student->id]) }}" method="post" style="display: inline-block">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger btn-sm delete-confirm" value="Eliminar">
          </form>
          @endif
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