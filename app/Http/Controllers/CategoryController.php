<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::get($url . '/categories');
        $data = $response->json();
        return view('categories', compact('data'));

    }
    public function create()
    {
        return view('category');
    }
    public function store(Request $request)
    {
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::post($url . '/categories', [
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        return redirect()->route('category.index');
    }
    public function delete($idCategory){
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::delete($url . '/categories/'. $idCategory);
        return redirect()->route('category.index');

    }
    public function view($idCategory){
        $url = env('URL_SERVER_API', 'http://127.0.0.1');
        $response = Http::get($url . '/categories/'. $idCategory);
        $category = $response->json();
        return view('categoryView', compact('category'));

    }
    public function update(Request $request){
        $url = env('URL_SERVER_API', 'http://127.0.0.1'); 
        $response = Http::put($url . '/categories/'. $request->id, [
            'name' => $request->name,
            'slug' => $request->slug,
        ]);
        return redirect()->route('category.index');
    }
}
    

