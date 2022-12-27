@php $total = 0 @endphp
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>pdf list training</title>
</head>
<style>
  table,
  th,
  td {
    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;
  }

  h2 {
    text-align: center;
    color: red;
  }

  p,
  label {
    text-align: center;
    color: green;
  }
</style>

<body>
  <h2>Listado del {{ $training->training_name }}</h2>
  <table style="width: 100%">
    <thead>
      <tr>
        <th>Estudiante</th>
        <th>Registro</th>
        <th>C.I</th>
        <th>Telefono</th>
        <th>Nro Recibo</th>
        <th>Tipo Deposito</th>
        <th>Monto</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($assistances as $assistance)
      <tr>
        <td>{{ $assistance->student->student_lastname }} {{ $assistance->student->student_name }}</td>
        <td>{{ $assistance->student->student_register }} </td>
        <td>{{ $assistance->student->student_ci }} {{ $assistance->student->student_exp }}</td>
        <td>{{ $assistance->student->student_number }}</td>
        @if(!empty($assistance->assistance_receipt) && !empty($assistance->assistance_payment) &&
        !empty($assistance->assistance_amount) )
        <td>{{ $assistance->assistance_receipt }}</td>
        <td>{{ $assistance->assistance_payment }}</td>
        <td>{{ $assistance->assistance_amount }} Bs</td>
        @else
        <td>Beca</td>
        <td>Beca</td>
        <td>Beca</td>
        @endif
        @php $total = $total + $assistance->assistance_amount @endphp
      </tr>
      @endforeach
    </tbody>
  </table>
  <p>Total Inscritos:{{ $training->training_quantity }}, Total Monto: {{ $total }} Bs</p>
  <p>Pagos C-FCET = {{ $fcet }}, Pagos Dep. Banco = {{ $dep }}, Pagos Tranf. Banco = {{ $trans }}</p>
  <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
  <p>{{ $fecha }}</p>
</body>

</html>