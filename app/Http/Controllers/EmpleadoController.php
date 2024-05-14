<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    /**
     * Muestra una lista de empleados.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Obtener los empleados paginados
        $empleados = Empleado::paginate(10);

        // Retornar la vista con los empleados
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Muestra el formulario para crear un nuevo empleado.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retornar la vista del formulario de creación de empleados
        return view('empleados.create');
    }

    /**
     * Almacena un nuevo empleado en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'primer_apellido' => 'required|alpha|max:20',
            'segundo_apellido' => 'required|alpha|max:20',
            'primer_nombre' => 'required|alpha|max:20',
            'otros_nombres' => 'nullable|alpha_spaces|max:50',
            'pais_empleo' => 'required|in:Colombia,Estados Unidos',
            'tipo_identificacion' => 'required|in:Cédula de Ciudadanía,Cédula de Extranjería,Pasaporte,Permiso Especial',
            'numero_identificacion' => 'required|unique:empleados|alpha_dash|max:20',
            'area' => 'required',
        ]);

        // Crear un nuevo empleado
        $empleado = new Empleado();
        $empleado->primer_apellido = $request->primer_apellido;
        $empleado->segundo_apellido = $request->segundo_apellido;
        $empleado->primer_nombre = $request->primer_nombre;
        $empleado->otros_nombres = $request->otros_nombres;
        $empleado->pais_empleo = $request->pais_empleo;
        $empleado->tipo_identificacion = $request->tipo_identificacion;
        $empleado->numero_identificacion = $request->numero_identificacion;
        $empleado->area = $request->area;
        $empleado->save();

        // Redirigir a la vista de consulta de empleados
        return redirect()->route('empleados.index')->with('success', 'Empleado creado exitosamente.');
    }

    /**
     * Muestra el formulario para editar un empleado existente.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Obtener el empleado por su ID
        $empleado = Empleado::findOrFail($id);

        // Retornar la vista del formulario de edición de empleados
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Actualiza la información de un empleado en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'primer_apellido' => 'required|alpha|max:20',
            'segundo_apellido' => 'required|alpha|max:20',
            'primer_nombre' => 'required|alpha|max:20',
            'otros_nombres' => 'nullable|alpha_spaces|max:50',
            'pais_empleo' => 'required|in:Colombia,Estados Unidos',
            'tipo_identificacion' => 'required|in:Cédula de Ciudadanía,Cédula de Extranjería,Pasaporte,Permiso Especial',
            'numero_identificacion' => 'required|unique:empleados,numero_identificacion,'.$id.'|alpha_dash|max:20',
            'area' => 'required',
        ]);

        // Obtener el empleado por su ID
        $empleado = Empleado::findOrFail($id);

        // Actualizar la información del empleado
        $empleado->primer_apellido = $request->primer_apellido;
        $empleado->segundo_apellido = $request->segundo_apellido;
        $empleado->primer_nombre = $request->primer_nombre;
        $empleado->otros_nombres = $request->otros_nombres;
        $empleado->pais_empleo = $request->pais_empleo;
        $empleado->tipo_identificacion = $request->tipo_identificacion;
        $empleado->numero_identificacion = $request->numero_identificacion;
        $empleado->area = $request->area;
        $empleado->save();

        // Redirigir a la vista de consulta de empleados
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado exitosamente.');
    }

    public function show($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleados.show', compact('empleado'));
    }

    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado exitosamente.');
    }
}
