<!-- Crear un carrito de la compra con:

Propiedades: 
    productos (array)
Métodos:
    Añadir producto (nombre, precio, cantidad)
    Eliminar producto
    Calcular total
    Listar productos -->
<?php

require 'ejercicio_cuatro.php';

class Customer
{
    private string $name;
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    public function getName(): string
    {
        return $this->name;
    }
}

class Product
{
    private string $name;
    private float $price;
    private int $quantity;
    private int $id; // ID propio de cada objeto
    private static int $idCounter = 0; // Contador global

    public function __construct(string $name, float $price, int $quantity){
       
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->id = ++self::$idCounter;
    }
    public function getName(): string{
        return $this->name;
    }
    public function getPrice():float{
        return $this->price;
    }
    public function getQuantity():int{
        return $this->quantity;
    }
    public function getId(): int{
        return $this->id;
    }
}

class Chart
{
    private Customer $customer;
    private array $products;
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function getProducts(): array{
        return $this->products;
    }

    public function getCustomerName(): string{
        return $this->customer->getName();
    }
    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
        $this->logger(get_class($this), __FUNCTION__, "Producto ".$product->getName(). " añadido correctamente");
    }

   public function removeProduct(int $id): void
    {
        // array_filter recorre el array y solo mantiene los que cumplen la condición
        $productFound = $this->products = array_filter($this->products, function($product) use ($id) {
            // "Mantenemos todos los productos cuyo ID NO sea el que queremos borrar"
            return $product->getId() !== $id;
        });
        $productName = array_first($productFound)->getName();

        // Opcional: Reindexar el array para que no queden huecos en las llaves
        $this->products = array_values($this->products);
        $this->logger(get_class($this), __FUNCTION__, "Producto ".$productName. " borrado correctamente");
   
    }
    public function calculateTotal(): float
    {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product->getPrice() * $product->getQuantity();
        }
        $this->logger(get_class($this), __FUNCTION__, "Se ha calculado el total del carrito: ".$total);
   
        return $total;
    }

    private function logger (string $className, string $methodName, string $message): void
    {
        $log = new Log($className, $methodName, $message);
        $log->writeToTextFile();
    }

}

class EjercicioTres
{
    public function create()
    {
        $cliente = new Customer('jose');
        $carrito = new Chart($cliente);
        $productOne = new Product('cebollas', 0.9, 12);
        $productTwo = new Product('manzanas', 3.1,20);
        $productThree = new Product('zanahorias', 1.9,15);
        $carrito->addProduct($productOne);
        $carrito->addProduct($productTwo);
        $carrito->addProduct($productThree);
        echo "Carrito de ".ucFirst($carrito->getCustomerName()).":";
        print_r($carrito->getProducts());
        echo "Total: ".$carrito->calculateTotal();
        // echo 'eliminación de producto con id 3';
        // $carrito->removeProduct(3);
        // print_r($carrito->getProducts());
    }
}


