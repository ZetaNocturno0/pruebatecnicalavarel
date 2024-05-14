@extends('layouts.app')

@section('content')
    <h1>Listado de Empleados</h1>

    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Primer Nombre</th>
                <th>...</th> 
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->primer_apellido }}</td>
                    <td>{{ $empleado->segundo_apellido }}</td>
                    <td>{{ $empleado->primer_nombre }}</td>
                    <td>...</td> 
                    <td>
                        <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-primary">Editar</a>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Mostrar la paginación -->
    {{ $empleados->links() }}
@endsection
