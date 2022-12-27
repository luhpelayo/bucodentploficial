<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf certificates</title>
</head>
<style>
  table,th,td {
      border: 1px solid black;
      border-collapse: collapse;
      text-align: center;
  }

  h2 {
      text-align: center;
      color: red;
  }
  p, label{
      text-align: center;
      color: green;
  }
</style>
<body>
    <h2>Certificados del {{ $training->training_name }}</h2>
    <table style="width: 100%">
        <thead >
          <tr>
            <th>Estudiante</th>
            <th>Registro</th>
            <th>Nro Certificado</th>
            <th>Codigo Qr</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($certificates as $certificate)
          <tr>
            <td>{{ $certificate->student_lastname }} {{ $certificate->student_name }}</td>
            <td> {{ $certificate->student_register }} </td>
            <td>{{ $certificate->certificate_number }}</td>
            <td>
              <img src="{{ public_path("images/".$certificate->certificate_qr) }}" alt="QR" width="100px"/>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Certificados : {{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>
</html>