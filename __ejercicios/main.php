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
        echo $ejCinco->getDay(5);
    }
}

Main::main();
