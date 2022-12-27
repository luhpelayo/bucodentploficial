<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf trainings</title>
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
    <h2>CURSOS/TALLERES REGISTRADOS EN SISTEMA</h2>
    <table style="width: 100%">
        <thead >
          <tr>
            <th>Nombre del Curso</th>
            <th>Duración en Fecha</th>
            <th>Docente del Curso</th>
            <th>Cantidad de Inscritos</th>
            <th>Recaudación Total</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($trainings as $training)
          <tr>
            <td>{{ $training->training_name }}</td>
            <td>desde:{{ $training->training_stardate }} hasta:{{ $training->training_endate }}</td>
            <td>{{ $training->training_teacher }}</td>
            <td>{{ $training->training_quantity }} alumnos</td>
            <td>{{ $training->training_money }} Bs</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>
</html>