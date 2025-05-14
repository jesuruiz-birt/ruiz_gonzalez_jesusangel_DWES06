<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function fetchUserInfo()
    {
        try {
            // Solicitud HTTP al microservicio
            $response = Http::get('http://localhost:8083/users/info');

            // Verificar si la solicitud fue exitosa
            if ($response->successful()) {
                return response()->json($response->json(), 200);
            } else {
                return response()->json([
                    'error' => 'Error en el microservicio',
                    'status' => $response->status()
                ], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'No se pudo conectar al microservicio',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
