<!--
Implementar un formulario:

    Login usuario y contraseña
    Uso de $_SESSION para mantener la sesión
    Página protegida accesible sólo si el usuario está logueado
-->
<?php

class EjercicioSeis
{
    public function login(): void
    {
        $nickName = $_POST['nickname'];
        $password = $_POST['password'];
        if ($nickName === 'admin' && $password === 'admin') {
            session_start();
            $_SESSION['loggedIn'] = true;
            header('Location: /views/index.html');
        } else {
            echo 'Credenciales incorrectas';
        }

    }  
}

