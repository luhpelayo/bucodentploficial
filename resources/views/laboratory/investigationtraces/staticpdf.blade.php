<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf practicas</title>
</head>
<style>
    table,th,td {
        border: 1px solid black;
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
    <h2>PRACTICAS INDUSTRIALES REGISTRADAS</h2>
    <table style="width: 100%">
        <thead >
          <tr>
            <th>Registro</th>
            <th>Estudiante</th>
            <th>Materia--Grupo</th>
            <th>Docente Titular</th>
            <th>Fecha de Práctica</th>
            <th>Empresa</th>
            <th>Contacto Empresa</th>
            <th>Observación</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($practices as $practice)
          <tr>
            <td>{{ $practice->student->student_register }}</td>
            <td>{{ $practice->student->student_lastname }} {{ $practice->student->student_name }} </td>
            <td>{{ $practice->matter->matter_initial }} {{ $practice->matter->matter_name }}--{{ $practice->matter->matter_group }}</td>
            <td>{{ $practice->matter->matter_teacher }}</td>
            <td>{{ $practice->practice_date }}</td>
            <td>{{ $practice->company->company_name }}</td>
            <td>{{ $practice->company->company_contact }}</td>
            <td>{{ $practice->practice_description }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>
</html>