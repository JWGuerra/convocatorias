<?php
function cronograma()
{
    // Parámetros
    $duracion = 7;
    $fechaInicio = new DateTime('2023-09-26 12:00:00');

    $temp = $fechaInicio;
    for ($i = 0; $i < 60; $i++) {

        $fecha = $temp->format('Y-m-d');
        // Horarios no Disponibles
        $horarioInicioManana = new DateTime($fecha . ' 07:59');
        $horarioFinManana = new DateTime($fecha . ' 13:00');
        $horarioInicioTarde = new DateTime($fecha . ' 14:15');
        $horarioFinTarde = new DateTime($fecha . ' 16:45');
        echo $temp->format('Y-m-d H:i:s') . '<br>';

        // ASIGNACIÓN DE HORARIOS ------------------------------------------------------
        if ($temp >= $horarioInicioManana && $temp < $horarioFinTarde) {
            // Agregar la duración en minutos
            $temp->add(new DateInterval("PT{$duracion}M"));
            if ($temp >= $horarioFinManana && $temp < $horarioInicioTarde) {
                // Fuera de la mañana, antes de la tarde
                // Si es antes de las 14:15, avance a las 14:15
                $temp = new DateTime($fecha . ' 14:20:00');
            }
        } else {
            // Después de las 16:45, avance al día siguiente
            $temp = (new DateTime($fecha . ' 08:00:00'))->add(new DateInterval('P1D'));
        }
    }
}

cronograma();
