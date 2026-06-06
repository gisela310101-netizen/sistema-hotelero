<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ReservaController extends Controller
{
    public function create()
    {
        return view('reserva');
    }

    public function store(Request $request)
    {
        $response = Http::post('https://jsonplaceholder.typicode.com/posts', [
            'title' => 'Reserva ' . $request->titulo,
            'body'  => 'Reserva para ' . $request->personas . ' persona(s) en '
                       . $request->ciudad . '. ' . $request->descripcion,
            'userId' => 1,
        ]);

        if ($response->successful()) {
            return redirect()->route('reservas.create')
                             ->with('success', 'Reserva registrada exitosamente.');
        }

        return redirect()->back()
                         ->with('error', 'Error al registrar la reserva.');
    }
}
