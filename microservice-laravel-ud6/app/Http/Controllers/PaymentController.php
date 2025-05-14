<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller {
    protected $paymentService;

    public function __construct(PaymentService $paymentService) {
        $this->paymentService = $paymentService;
    }

    public function index() {
        return response()->json($this->paymentService->getPayments());
    }

    public function show($id) {
        return response()->json($this->paymentService->getPaymentById($id));
    }

    public function store(Request $request) {
        return response()->json($this->paymentService->createPayment($request->all()));
    }

    public function update(Request $request, $id) {
        return response()->json($this->paymentService->updatePayment($id, $request->all()));
    }

    public function destroy($id) {
        return response()->json($this->paymentService->deletePayment($id));
    }
}
