<?php
/*
API que:
    Devuelva un JSON con una lista de productos
    Permita filtrar por precio mínimo usando $_GET
    Devuelva errores en formato JSON si el parámetro es inválido
*/
header('Content-Type: application/json');

class Product
{
    private static int $idCounter = 0;
    public int $id;
    public string $name;
    public float $price;
    public int $quantity;
    
    public function __construct(string $name, float $price, int $quantity)
    {
        $this->id = ++self::$idCounter;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
}

class EjercicioSiete
{
    private array $products;

    public function __construct()
    {
        $this->products = $this->seed();
    }

    private function seed(): array
    {
        $productOne = new Product("cebollas", 1.9, 35);
        $productTwo = new Product("zanahorias", 2.3, 40);
        $productThree = new Product("nabos", 0.3, 12);
        return [$productOne, $productTwo, $productThree];
    }

    public function listJSONproducts(array $products): void
    {
        echo json_encode(['data' => $products]);
    }

    public function main(): void
    {
        $products = $this->products;

        // Filtrar por precio mínimo si se proporciona
        if (isset($_GET['min_price'])) {
            $minPrice = $_GET['min_price'];
            if (!is_numeric($minPrice) || $minPrice < 0) {
                echo json_encode(['error' => 'El parámetro min_price debe ser un número positivo']);
                return;
            }
            $products = array_filter($products, fn($p) => $p->price >= (float)$minPrice);
        }

        $this->listJSONproducts(array_values($products));
    }
}

$ej = new EjercicioSiete();
$ej->main();


/*
Cómo probar:
Sin parámetros: Devuelve todos los productos.
Con ?min_price=1.5: Filtra productos con precio >= 1.5.
Con ?min_price=abc: Devuelve error JSON.
*/