package controller;

import model.Product;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;

import java.util.ArrayList;
import java.util.List;

@RestController
@RequestMapping("/products")
public class ProductController {

    private List<Product> products = new ArrayList<>(List.of(
            new Product(1, "Laptop", "Portátil potente con 16GB RAM", 1200.99),
            new Product(2, "Smartphone", "Pantalla AMOLED, carga rápida", 799.50),
            new Product(3, "Auriculares", "Cancelación de ruido", 199.99)
    ));

    // Obtener todos los productos
    @GetMapping
    public ResponseEntity<List<Product>> getAllProducts() {
        return ResponseEntity.ok(products);
    }

    // Obtener producto por ID
    @GetMapping("/{id}")
    public ResponseEntity<Product> getProductById(@PathVariable Integer id) {
        return products.stream()
                .filter(p -> p.getId().equals(id))  // <-- Aquí está la búsqueda
                .findFirst()
                .map(ResponseEntity::ok)
                .orElse(ResponseEntity.notFound().build());
    }

 // Crear producto (POST)
    @PostMapping
    public ResponseEntity<String> createProduct(@RequestBody Product product) {
        products.add(product);
        return ResponseEntity.ok("Producto '" + product.getName() + "' creado exitosamente.");
    }

    // Actualizar producto (PUT)
    @PutMapping("/{id}")
    public ResponseEntity<String> updateProduct(@PathVariable Integer id, @RequestBody Product product) {
        for (Product p : products) {
            if (p.getId().equals(id)) {
                p = new Product(id, product.getName(), product.getDescription(), product.getPrice());
                return ResponseEntity.ok("Producto actualizado correctamente.");
            }
        }
        return ResponseEntity.notFound().build();
    }

    // Eliminar producto
    @DeleteMapping("/{id}")
    public ResponseEntity<String> deleteProduct(@PathVariable Integer id) {
        boolean removed = products.removeIf(p -> p.getId().equals(id));
        return removed ? ResponseEntity.ok("Producto eliminado correctamente.") : ResponseEntity.notFound().build();
    }

}
