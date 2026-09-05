<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FutbolistaController extends Controller
{
    private $apiUrl = 'http://localhost:8080/api/futbolistas';

    public function index()
    {
        $response = Http::get($this->apiUrl);
        $futbolistas = $response->json();

        return view('futbolistas.index', compact('futbolistas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'posicion' => 'required|string',
            'numeroCamiseta' => 'required|integer',
        ]);

        Http::post($this->apiUrl, [
            'nombre' => $request->nombre,
            'posicion' => $request->posicion,
            'numeroCamiseta' => (int) $request->numeroCamiseta,
        ]);

        return redirect()->route('futbolistas.index');
    }
}

