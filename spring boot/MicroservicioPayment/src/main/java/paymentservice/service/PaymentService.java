package paymentservice.service;

import org.springframework.stereotype.Service;

import paymentservice.model.Payment;
import paymentservice.repository.PaymentRepository;

import java.util.List;

@Service
public class PaymentService {

    private final PaymentRepository paymentRepository;

    public PaymentService(PaymentRepository paymentRepository) {
        this.paymentRepository = paymentRepository;
    }

    public List<Payment> getAllPayments() {
        return paymentRepository.findAll();
    }

    public Payment getPaymentById(Long id) {
        return paymentRepository.findById(id).orElseThrow(() -> new RuntimeException("Pago no encontrado"));
    }

    public Payment createPayment(Payment payment) {
        return paymentRepository.save(payment);
    }

    public Payment updatePayment(Long id, Payment paymentDetails) {
        Payment payment = getPaymentById(id);
        payment.setCustomerName(paymentDetails.getCustomerName());
        payment.setPaymentMethod(paymentDetails.getPaymentMethod());
        payment.setAmount(paymentDetails.getAmount());
        return paymentRepository.save(payment);
    }

    public void deletePayment(Long id) {
        paymentRepository.deleteById(id);
    }
}
