<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    // Obtener lista de productos
    public function fetchProducts()
    {
        try {
            $response = Http::get('http://localhost:8081/products');

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


    // Obtener un producto por ID
    public function fetchProductById($id)
    {
        try {
            $response = Http::get('http://localhost:8081/products/' . $id);

            if ($response->successful()) {
                return response()->json($response->json(), 200);
            } else {
                return response()->json(['error' => 'Producto no encontrado', 'status' => $response->status()], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'No se pudo conectar al microservicio', 'message' => $e->getMessage()], 500);
        }
    }

    // Crear producto (POST)
    public function createProduct(Request $request)
    {
        try {
            $response = Http::post('http://localhost:8081/products', $request->all());

            if ($response->successful()) {
                return response()->json(['message' => 'Producto creado correctamente'], 201);
            } else {
                return response()->json(['error' => 'Error al crear el producto'], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'No se pudo conectar al microservicio', 'message' => $e->getMessage()], 500);
        }
    }

    // Actualizar producto (PUT)
    public function updateProduct(Request $request, $id)
    {
        try {
            $response = Http::put('http://localhost:8081/products/' . $id, $request->all());

            if ($response->successful()) {
                return response()->json(['message' => 'Producto actualizado correctamente'], 200);
            } else {
                return response()->json(['error' => 'Error al actualizar el producto'], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'No se pudo conectar al microservicio', 'message' => $e->getMessage()], 500);
        }
    }

    // Eliminar producto (DELETE)
    public function deleteProduct($id)
    {
        try {
            $response = Http::delete('http://localhost:8081/products/' . $id);

            if ($response->successful()) {
                return response()->json(['message' => 'Producto eliminado correctamente'], 200);
            } else {
                return response()->json(['error' => 'Error al eliminar el producto'], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'No se pudo conectar al microservicio', 'message' => $e->getMessage()], 500);
        }
    }
}
