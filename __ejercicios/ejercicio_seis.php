<!--
Implementar un formulario:

    Login usuario y contraseña
    Uso de $_SESSION para mantener la sesión
    Página protegida accesible sólo si el usuario está logueado
-->
<?php
session_start();
class EjercicioSeis
{
 public function login(): void
    {
        if (!isset($_POST['nickname'], $_POST['password'])) {
            echo 'Faltan datos';
            return;
        }

        $nickName = trim($_POST['nickname']);
        $password = trim($_POST['password']);

        if ($nickName === 'admin' && $password === 'admin') {
            $_SESSION['loggedIn'] = true;
            echo 'Credenciales correctas';
            // header('Location: views/index.html'); exit;
        } else {
            echo 'Credenciales incorrectas';
        }
    }
}

$ejercicio = new EjercicioSeis();
$ejercicio->login();

