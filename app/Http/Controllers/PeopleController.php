<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000/v1');
        $response = Http::get($url . '/people');
        
        // Verifica la respuesta
        if ($response->successful()) {
            $data = $response->json();
        } else {
            $data = [];
            \Log::error('Error en la respuesta de la API', ['response' => $response->body()]);
        }
        
        return view('peopleindex', compact('data'));
    }
    
    
    public function create()
    {
        return view('peoplecreate');
    }
    public function store(Request $request)
{
    $url = env('URL_SERVER_API', 'http://127.0.0.1:8000/v1');
    
    // Enviar solicitud POST a la API
    $response = Http::post($url . '/people', [
        'name' => $request->name,
        'direccion' => $request->direccion,
        'telefono' => $request->telefono,
    ]);

    if ($response->successful()) {
        return redirect()->route('people.index')->with('success', 'Persona creada con éxito.');
    } else {
        \Log::error('Error al crear persona', ['response' => $response->body()]);
        return redirect()->back()->with('error', 'No se pudo crear la persona.');
    }
}

public function delete($idPeople)
{
    $url = env('URL_SERVER_API', 'http://127.0.0.1:8000/v1');
    $response = Http::delete($url . '/people/' . $idPeople);

    if ($response->successful()) {
        return redirect()->route('people.index')->with('success', 'Persona eliminada con éxito.');
    } else {
        \Log::error('Error al eliminar persona', ['response' => $response->body()]);
        return redirect()->back()->with('error', 'No se pudo eliminar la persona.');
    }
}

    public function view($idPeople)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000/v1');
        $response = Http::get($url . '/people/' . $idPeople);
        
        if ($response->successful()) {
            $people = $response->json();
            
            // Depuración: Verifica los datos
            \Log::info('Datos de la persona:', ['people' => $people]);
            
            return view('peopleview', compact('people'));
        } else {
            \Log::error('Error al obtener persona', ['response' => $response->body()]);
            return redirect()->route('people.index')->with('error', 'No se pudo obtener la persona.');
        }
    }
    
    public function update(Request $request, $idPeople)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8000/v1');
        
        $response = Http::put($url . '/people/' . $idPeople, [
            'name' => $request->name,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
        ]);
    
        if ($response->successful()) {
            return redirect()->route('people.index')->with('success', 'Persona actualizada con éxito.');
        } else {
            \Log::error('Error al actualizar persona', ['response' => $response->body()]);
            return redirect()->back()->with('error', 'No se pudo actualizar la persona.');
        }
    }
    
}
