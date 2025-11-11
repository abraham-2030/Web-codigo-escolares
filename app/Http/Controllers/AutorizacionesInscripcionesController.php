<?php

namespace App\Http\Controllers;

use App\Models\AutorizacionesInscripciones;
use Illuminate\Http\Request;
use Carbon\Carbon;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

class AutorizacionesInscripcionesController extends Controller
{
    /**
     * Display a listing of the resource.
     * Función READ - Mostrar todas las aseguradoras
     */
    public function index()
    {
        // Obtener todas las aseguradoras ordenadas por nombre
        $AutorizacionesInscripciones = AutorizacionesInscripciones::orderBy('id')->get();
        
        // Retornar la vista con los datos
        return view('escolares.index', compact('AutorizacionesInscripciones'));
    }

    /**
     * Show the form for creating a new resource.
     * Mostrar el formulario de creación
     */
    public function create()
    {
        return view('escolares.create');
    } 

    /**
     * Store a newly created resource in storage.
     * Función CREATE - Guardar nueva aseguradora
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'periodo' =>'string|max:255',
            'no_de_control' =>'required|string|max:255',
            'tipo_autorizacion' =>'required|string|max:255',
            'motivo_autorizacion' =>'required|string|max:255',
            'quien_autoriza' =>'required|string|max:255',
            'fecha_hora_autoriza' =>'required|date',
            'materia_afectada' =>'required|string|max:255',
            'cantidad' =>'required|integer|min:1', 
        ], [
            // Mensajes personalizados
            'periodo.' =>'periodo es obligatorio',
            'no_de_control.required' =>'no_de_control es obligatorio',
            'tipo_autorizacion.required' =>'tipo_autorización es obligatorio',
            'motivo_autorizacion.required' =>'motivo_autorización es obligatoria',
            'quien_autoriza.required' =>'quién_autoriza es obligatoria',
            'fecha_hora_autoriza.date' =>'fecha_hora_autoriza es obligatoria',
            'materia_afectada.required' =>'materia_afectadaes obligatorio',
            'cantidad.required' =>'cantidades obligatorio',
        ]);

        try {
            // Crear la nueva aseguradora
            AutorizacionesInscripciones::create($validatedData);

            // Redireccionar con mensaje de éxito
            return redirect()
                ->route('escolares.index')
                ->with('success', 'AutorizacionesInscripciones creada exitosamente');
                
        } catch (\Exception $e) {
            // Redireccionar con mensaje de error
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error al crear AutorizacionesInscripciones: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $autorizar = AutorizacionesInscripciones::findOrFail($id);
        return view('escolares.show', compact('autorizar'));
    }

    /**
     * Show the form for editing the specified resource.
     * Mostrar el formulario de edición
     */
    public function edit($periodo)
    {
        $autorizar = AutorizacionesInscripciones::findOrFail($periodo);
        return view('escolares.edit', compact('autorizar'));
    }

    public function update(Request $request, $id)
    {
        $Autorizacion= AutorizacionesInscripciones::findOrFail($id);

        // Validar los datos (clave_aseguradora no se puede modificar)
        $validatedData = $request->validate([
            'periodo' => 'string|max:255',
            'no_de_control' =>'required|string|max:255',
            'tipo_autorizacion' =>'required|string|max:255',
            'motivo_autorizacion' =>'required|string|max:255',
            'quien_autoriza' =>'required|string|max:255',
            'fecha_hora_autoriza' =>'required|date',
            'materia_afectada' =>'required|string|max:255',
            'cantidad' =>'required|integer|min:1', 
        ], [
           'periodo' =>'periodo es obligatorio',
            'no_de_control.required' =>'no_de_control es obligatorio',
            'tipo_autorizacion.required' =>'tipo_autorización es obligatorio',
            'motivo_autorizacion.required' =>'motivo_autorización es obligatoria',
            'quien_autoriza.required' =>'quién_autoriza es obligatoria',
            'fecha_hora_autoriza.date' =>'fecha_hora_autoriza es obligatoria',
            'materia_afectada.required' =>'materia_afectadaes obligatorio',
            'cantidad.required' =>'cantidades obligatorio',
        ]);

        try {
            // Actualizar la aseguradora
            $Autorizacion->update($validatedData);
 
            return redirect()
                ->route('escolares.index')
                ->with('success', 'Autorizaciones Inscripciones actualizada exitosamente');
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error al actualizar la aseguradora: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     * Función DELETE - Eliminar aseguradora
     */
    public function destroy($periodo)
    {
        try {
            $eliminar = AutorizacionesInscripciones::findOrFail($periodo);
            $periodo = $eliminar->periodo;
            
            $eliminar->delete();

            return redirect()
                ->route('escolares.index')
                ->with('success', "Autorizaciones '$periodo' fue eliminada exitosamente");
                
        } catch (\Exception $e) {
            return redirect()
                ->route('escolares.index')
                ->with('error', 'Error al eliminar la aseguradora: ' . $e->getMessage());
        }
    }




}
