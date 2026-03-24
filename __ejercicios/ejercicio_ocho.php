<?php
/*
Haz un script que:

    Calcule la diferencia en días entre dos fechas dadas
    Indique si una fecha es pasada o futura
    Formatee fechas en español
 */

class EjercicioOcho
{
    /**
     * Calcular diferencia en días entre dos fechas
     */
    public function calculateDifferenceBetweenDates(DateTime $date1, DateTime $date2): int
    {
        $difference = $date1->diff($date2);
        return $difference->days;
    }

    /**
     * Indicar si una fecha es pasada o futura
     */
    public function pastOrFutureDate(DateTime $date): string
    {
        $today = new DateTime();
        $today->setTime(0, 0, 0);
        
        if ($date > $today) {
            return "futura";
        } elseif ($date < $today) {
            return "pasada";
        } else {
            return "hoy";
        }
    }

    /**
     * Formatear fecha en español
     */
    public function formatDateSpanish(DateTime $date): string
    {
        // Usar IntlDateFormatter para formatear en español
        $formatter = new IntlDateFormatter(
            'es_ES',
            IntlDateFormatter::LONG,
            IntlDateFormatter::NONE,
            null,
            null,
            'EEEE, dd \'de\' MMMM \'de\' yyyy'
        );
        return $formatter->format($date);
    }

    /**
     * Mostrar información de las fechas
     */
    public function displayInfo(DateTime $date1, DateTime $date2): void
    {
        echo "=== Información de Fechas ===\n\n";
        
        echo "Fecha 1: " . $this->formatDateSpanish($date1) . "\n";
        echo "Fecha 2: " . $this->formatDateSpanish($date2) . "\n\n";
        
        $daysDifference = $this->calculateDifferenceBetweenDates($date1, $date2);
        echo "Diferencia en días: " . $daysDifference . " días\n\n";
        echo "Diferencia en semanas: ".($daysDifference/7)." semanas\n\n";
        
        echo "Fecha 1 es: " . $this->pastOrFutureDate($date1) . "\n";
        echo "Fecha 2 es: " . $this->pastOrFutureDate($date2) . "\n";
    }
}

$date1 = new DateTime('2023-06-29 15:30:00');
$date2 = new DateTime('2019-12-25 18:59:00');

$ej = new EjercicioOcho();
$ej->displayInfo($date1, $date2);