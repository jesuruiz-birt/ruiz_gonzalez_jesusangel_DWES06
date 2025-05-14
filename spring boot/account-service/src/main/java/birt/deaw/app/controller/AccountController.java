package birt.deaw.app.controller;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;
import java.util.HashMap;
import java.util.Map;

@RestController
@RequestMapping("/users")
public class AccountController {
    @GetMapping("/info")
    public Map<String, String> getUserInfo() {
        Map<String, String> response = new HashMap<>();
        response.put("message", "200 OK");
        response.put("user", "Ejemplo de usuario");
        return response;
    }
}
