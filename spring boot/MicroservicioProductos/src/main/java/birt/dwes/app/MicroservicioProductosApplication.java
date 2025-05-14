package birt.dwes.app;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.ComponentScan;

@SpringBootApplication
@ComponentScan(basePackages = "controller")
public class MicroservicioProductosApplication {

	public static void main(String[] args) {
		SpringApplication.run(MicroservicioProductosApplication.class, args);
	}

}
