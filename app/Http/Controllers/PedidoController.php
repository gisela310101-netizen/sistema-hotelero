<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class PedidoController extends Controller
{
    public function index()
    {
        // Consumir API
        $response = Http::post('https://jsonplaceholder.typicode.com/posts',[
 
   'image' => 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2d/b9/4e/92/caption.jpg?w=900&h=500&s=1',
   'title'=>'Hotel Playa Azul',
   'body'=>'Hotel turístico con piscina y restaurante.',
    'ciudad'=>'Cancún',
    'precio'=>150.00,
    'habitaciones'=>3,
    'calificacion'=>4.5

]);




       // Convertir JSON a arreglo
        $hoteles = $response->json();
          $hoteles = [$hoteles];

       

        // Retornar vista
        return view('hoteles', compact('hoteles'));
    }
}

