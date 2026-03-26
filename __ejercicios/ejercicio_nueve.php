<?php
/*
Implementar un formulario que:

    Reciba nombre, email y mensaje
    Valide los datos
    Muestre errores si los hay
    Si todo es correcto muestre un resumen limpio (escapando html)
 */
session_start();

$ej9 = new EjercicioNueve();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ej9->submit();
    exit;
}
include_once 'views/formulario_ej_nueve.php';

class EjercicioNueve
{
    public function submit(): void
    {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $message = $_POST['message'] ?? '';

        $_SESSION['form_data'] = [
            'name' => $name,
            'email' => $email,
            'message' => $message,
        ];
        if (strlen($name) < 3) {
            echo "<script>
                alert('La longitud del nombre tiene que ser al menos de 3 caracteres');
                window.location.href = 'ejercicio_nueve.php';
              </script>";
            exit;
        }
        if (str_contains($email, 'gmail') ) {
            echo "<script>
                alert('Te hemos dicho que gmail NO VALE!!!');
                window.location.href = 'ejercicio_nueve.php';
              </script>";
            exit;
        }
        if (strlen($message) < 20) {
            echo "<script>
                alert('La longitud del mensaje es entre 20 y 100, no te olvides!');
                window.location.href = 'ejercicio_nueve.php';
              </script>";
            exit;
        }

        header('Location: views/index_ej_nueve.php');
        exit;
    }
    public function redirect(): void
    {
        header('Location: views/formulario_ej_nueve.php');
        exit;
    }
}
