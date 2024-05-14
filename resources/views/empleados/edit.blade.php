@extends('layouts.app')

@section('content')
    <h1>Editar Empleado</h1>

    <!-- Formulario de edición -->
    <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Campos del formulario prellenados con los datos del empleado -->
        <!-- Primer Apellido, Segundo Apellido, Primer Nombre, Otros Nombres, etc. -->
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
