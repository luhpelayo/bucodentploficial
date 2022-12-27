@extends('layouts.master')
@section('content')
<div style="text-align: center">
    <img src="{{URL::asset('icons/sorry.png')}}" alt="" width="50%">
</div>
<div style="text-align: center">
    <a href="{{ route('portal.index') }}" class="btn btn-success" title="Ir">Ir Atrás</a>
</div>
<br>
@endsection