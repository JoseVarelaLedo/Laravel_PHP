<?php
require_once 'ejercicio_tres.php';

require_once 'ejercicio_cinco.php';
class Main
{
    public static function main(): void
    {
        // $ejTres = new EjercicioTres();
        // $ejTres->create();
        $ejCinco = new EjercicioCinco();
        $day = readline('Introduce el día:');
        echo $ejCinco->getDay($day);
    }
}

Main::main();
