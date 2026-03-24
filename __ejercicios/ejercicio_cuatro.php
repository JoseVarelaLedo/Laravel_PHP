<?php
/* 
Crear un sistema simple de logs que:

    Escriba mensajes en un archivo log.txt
    Cada línea debe incluir fecha, hora y mensaje
    Añade una función para leer y mostrar el log
 */
class Log
{
    private string $year;
    private string $month;
    private string $day;
    private string $hour;
    private string $className;
    private string $givenFunction;
    private string $message;
    

    public function __construct(string $className, string $givenFunction, string $message)
    {
        $this->className = $className;
        $this->givenFunction = $givenFunction;
        $this->message = $message;
        $this->year = date("Y");
        $this->month = date("m");
        $this->day = date("d");
        $this->hour = date('H:i:s', time());
    }
    public function writeToTextFile(): void
    {
        $file =  $this->year."_"
                .$this->month."_"
                .$this->day."_"
                .str_replace (':','_', $this->hour)."_"
                .$this->className
                .".txt";
        $content =  $this->year."\n"
                    .$this->month."\n"
                    .$this->day."\n"
                    .$this->hour."\nLa clase "
                    .$this->className." a través de la siguiente función -> "
                    .$this->givenFunction." ha reportado el siguiente mensaje: "
                    .$this->message.".";
        file_put_contents($file, $content);
    }

    public static function readLogFile($file): void
    {
        print_r(file_get_contents($file));
    }
}
