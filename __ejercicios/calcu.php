<?php
class Calcu
{
    private $result;

    // public function calc(array $precios, int $impuesto):array
    // {
    //     $this->result=array_map(function($precio) use ($impuesto){
    //         return $precio + ($precio * $impuesto / 100);
    //     }, $precios);


    //     return $this->result;
    // }


    public function calc(array $precios, int $impuesto): array
    {
        $this->result = array_map(
            fn(int $baseImponible): int => $baseImponible + ($baseImponible * $impuesto / 100),
            $precios
        );
        return $this->result;
    }
}

$productos = [100, 200, 300, 400, 500];
$impuesto = 21;

$calcu = new Calcu();
$result = $calcu->calc($productos, $impuesto);
foreach ($result as $precio) {
    echo "Precio final: $precio\n";
}
