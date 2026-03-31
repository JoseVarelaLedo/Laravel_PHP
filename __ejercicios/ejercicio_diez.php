<?php
/*
Crear Interfaz Pago:

    - método procesarPago()
    - Dos clases que heredan:
        PagoTarjeta
        Pago Paypal
    - Comportamientos distintos para cada implementación del método
 */
interface Pago
{
    public function procesarPago(float $cantidad):void;
}

class PagoTarjeta implements Pago
{
    public function procesarPago(float $importe):void{
        $coeficiente = 1.0015;
        $total = $importe / $coeficiente;
        print_r("\tSe ha realizado pago con tarjeta de {$importe}€.
                \n Al ser un pago con tarjeta se aplica un recargo del 0.15%.
                \n Por tanto, el pago total es de {$total}€\n");
    }
}

class PagoPaypal implements Pago
{
     public function procesarPago(float $importe):void{
        $coeficiente = 1.0015;
        $total = $importe * $coeficiente;
        print_r("\tSe ha realizado pago por Paypal de {$importe}€.
                \n Al ser un pago mediante este medio se aplica una bonificación  del 0.15%.
                \n Por tanto, el pago total es de {$total}€\n");
    }
}

class Product
{
    public function __construct (public string $name, public float $price){}
}

class Chart
{
    public function __construct (public string $customerName, public array $products){}
}

class Menu
{

    public function selectProduct(array $products): array
    {
        $productsAcquired = [];

        // 1. Mostrar productos FUERA del bucle de selección
        for ($i = 0; $i < count($products); $i++) {
            echo ($i + 1) . ".- " . $products[$i]->name . " (" . $products[$i]->price . "€)\n";
        }

        // 2. Pedir selección en su propio bucle
        $index = (int)readline("...Selecciona producto de la lista, 0 para terminar: ");
        while ($index != 0) {
            if ($index >= 1 && $index <= count($products)) {
                array_push($productsAcquired, $products[$index - 1]);
                echo "Añadido: " . $products[$index - 1]->name . "\n";
            } else {
                echo "Índice fuera de rango.\n";
            }
            // 3. Actualizar $index dentro del while
            $index = (int)readline("...Selecciona producto de la lista, 0 para terminar: ");
        }

        return $productsAcquired;
    }
}


class EjercicioDiez
{
    public function main()
    {
        $products = [
                    new Product ('potatoes', 1.87),
                    new Product ('onions', 0.84),
                    new Product ('carrots', 1.43),
                    new Product ('bananas', 3.1),
                    new Product ('kiwis', 6.33),
                    ];

        $menu = new Menu();
        $menu->selectProduct($products);
        

        // $paypal = new PagoPaypal();
        // $tarjeta = new PagoTarjeta();
        // $paypal->procesarPago(75.95);
        // $tarjeta->procesarPago(99.89);


    }

}

$ej = new EjercicioDiez();
$ej->main();
  