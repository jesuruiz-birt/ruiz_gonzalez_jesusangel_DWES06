CREATE DATABASE IF NOT EXISTS payment_db;

USE payment_db;

CREATE TABLE IF NOT EXISTS payments (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(255) NOT NULL,
    payment_method VARCHAR(100) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO payments (customer_name, payment_method, amount) VALUES 
('Juan Pérez', 'Tarjeta de crédito', 49.99),
('María López', 'PayPal', 120.00),
('Carlos Gómez', 'Transferencia bancaria', 75.50);
