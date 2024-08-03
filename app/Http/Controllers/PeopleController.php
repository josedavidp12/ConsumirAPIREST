<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::get($url . '/people');
        $data = $response->json();
        return view('peopleindex', compact('data'));

    }
    public function create()
    {
        return view('peoplecreate');
    }
    public function store(Request $request)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::post($url . '/people', [
            'name' => $request->name,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono
        ]);
        return redirect()->route('people.index');
    }
    public function delete($idPeople){
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::delete($url . '/people/'. $idPeople);
        return redirect()->route('people.index');

    }
    public function view($idPeople){
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::get($url . '/people/'. $idPeople);
        $people = $response->json();
        return view('peopleview', compact('people'));

    }
    public function update(Request $request){
        $url = env('URL_SERVER_API', 'http://127.0.0.1'); 
        $response = Http::put($url . '/people/'. $request->id, [
            'name' => $request->name,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono
        ]);
        return redirect()->route('people.index');
    }
}
