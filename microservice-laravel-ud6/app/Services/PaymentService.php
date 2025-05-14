<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PaymentService {
    protected $baseUrl;

    public function __construct() {
        $this->baseUrl = env('MICROSERVICE_URL', 'http://localhost:8082/api/payments');
    }

    public function getPayments() {
        $response = Http::timeout(5)->get($this->baseUrl);
        return $response->successful() ? $response->json() : ['error' => 'Microservicio no disponible'];
    }

    public function getPaymentById($id) {
        $response = Http::get("{$this->baseUrl}/{$id}");
        return $response->successful() ? $response->json() : ['error' => 'Pago no encontrado'];
    }

    public function createPayment($data) {
        $response = Http::post($this->baseUrl, $data);
        return $response->json();
    }

    public function updatePayment($id, $data) {
        $response = Http::put("{$this->baseUrl}/{$id}", $data);
        return $response->json();
    }

    public function deletePayment($id) {
        $response = Http::delete("{$this->baseUrl}/{$id}");
        return $response->json();
    }
}
