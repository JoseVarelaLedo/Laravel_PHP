<?php
/*
Crear un script que:

    Reciba un número del 1 al 7
    Devuelva el día de la semana usando match
    Maneje valores inválidos
*/

class EjercicioCinco
{
    public const WEEKDAYS = array("Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");
    public function getDay(int $dayNumber):string
    {
        if ($dayNumber<1 || $dayNumber> 7)
            {
                echo "Has introducido un valor incorrecto, tiene que estar entre 1 y 7";
                return "";
            }
        elseif (gettype($dayNumber) != "integer")
            {
                echo "Tienes que introducir un valor entero";
                return "";
            }
        return match ($dayNumber) {
            1=> self::WEEKDAYS[0],
            2=> self::WEEKDAYS[1],
            3=> self::WEEKDAYS[2],
            4=> self::WEEKDAYS[3],
            5=> self::WEEKDAYS[4],
            6=> self::WEEKDAYS[5],
            7=> self::WEEKDAYS[6],
        };
    }
}

