package model;

public class Product {
    private Integer id;
    private String name;
    private String description;
    private double price;

    public Product(Integer id, String name, String description, double price) {
        this.id = id;
        this.name = name;
        this.description = description;
        this.price = price;
    }

    public Integer getId() { return id; }
    public String getName() { return name; }
    public String getDescription() { return description; }
    public double getPrice() { return price; }
}
