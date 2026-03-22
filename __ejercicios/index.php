<?php

//     function double (int $number):int{
//         return $number *2;
//     }
//     function triple (int $number):int{
//         return $number *3;
//     }

// $resultado = 5 
//     |> double(...)
//     |> triple(...)
//     |> (fn($num)=>pow($num, 3));


// print_r("Juan ha dicho que el resultado es: $resultado");

// $numbers = [1, 2, 3, 4, 5];
$array = [];

for ($i = 0; $i<20; $i++){
    $array[$i]= $i+1;
}

print_r($array);


$result = $array
    |> (fn($arr) => array_filter($arr, fn($n) => $n % 2 == 0)) //filtramos pares
    |> (fn($arr) => array_map(fn($n) => $n * 2, $arr)) // multiplicamos cada elemento filtrado por 2
    |> (fn($arr) => array_map(fn($n) => pow ($n,3), $arr)) //lo elevamos al cubo
    |> array_values(...);

echo "<br>El tipo de result es: ".gettype($result);

// print_r($result);
$counter = 0;
foreach($result as $value){
    $it = ++$counter;
    // print_r("\n");
    echo "<br>$it.- Valor #$value" ;    
}

class ProcessUserInput
{
    public function __invoke(string $input): string
    {
        return $input
            |> trim(...)
            |> strip_tags(...)
            |> htmlspecialchars(...)
            |> strtoupper(...)
            |> strrev(...)
            |> (fn($str) => mb_substr($str, 0, 255));
    }
}

$in  = new ProcessUserInput();
print_r($in("\n <b>prueba en minUsculas</b>"));