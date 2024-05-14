@extends('layouts.app')

@section('content')
    <h1>Crear Nuevo Empleado</h1>

    <!-- Formulario de creación -->
    <form action="{{ route('empleados.store') }}" method="POST">
        @csrf
        <!-- Campos del formulario -->
        <!-- Primer Apellido, Segundo Apellido, Primer Nombre, Otros Nombres, etc. -->
        <button type="submit" class="btn btn-success">Guardar</button>
    </form>
@endsection
