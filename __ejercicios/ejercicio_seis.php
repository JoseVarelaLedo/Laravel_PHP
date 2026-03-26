<?php
/*
Implementar un formulario:

    Login usuario y contraseña
    Uso de $_SESSION para mantener la sesión
    Página protegida accesible sólo si el usuario está logueado
    Protección CSRF
 */
session_start();

class EjercicioSeis
{
    private const USUARIOS = [
        'admin' => 'admin123',
        'usuario' => '1234'
    ];

    /**
     * Generar token CSRF
     */
    public function generarTokenCSRF(): string
    {
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    /**
     * Validar token CSRF
     */
    private function validarTokenCSRF(string $token): bool
    {
        return isset($_SESSION['csrf_token']) && 
               hash_equals($_SESSION['csrf_token'], $token);
    }

    /**
     * Validar credenciales
     */
    private function validarCredenciales(string $nickname, string $password): bool
    {
        if (!isset(self::USUARIOS[$nickname])) {
            return false;
        }
        return self::USUARIOS[$nickname] === $password;
    }

    /**
     * Procesar login
     */
    public function login(): void
    {
        // Verificar método POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->mostrarFormulario();
            return;
        }

        // Validar token CSRF
        if (!isset($_POST['csrf_token']) || !$this->validarTokenCSRF($_POST['csrf_token'])) {
            echo 'Error de seguridad: Token CSRF inválido';
            return;
        }

        // Validar que los campos existan
        if (!isset($_POST['nickname'], $_POST['password'])) {
            echo 'Faltan datos requeridos';
            return;
        }

        $nickname = trim($_POST['nickname']);
        $password = trim($_POST['password']);

        // Validar campos no vacíos
        if (empty($nickname) || empty($password)) {
            echo 'El usuario y la contraseña no pueden estar vacíos';
            return;
        }

        // Validar credenciales
        if ($this->validarCredenciales($nickname, $password)) {
            $_SESSION['loggedIn'] = true;
            $_SESSION['user'] = $nickname;
            header('Location: views/index_ej_seis.php');
            exit;
        } else {
            echo 'Credenciales incorrectas';
        }
    }

    /**
     * Mostrar formulario de login
     */
    private function mostrarFormulario(): void
    {
        $token = $this->generarTokenCSRF();
        include 'views/formulario_ej_seis.php';
    }

    /**
     * Cerrar sesión
     */
    public function logout(): void
    {
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        header('Location: ejercicio_seis.php');
        exit;
    }
}

// Procesar acciones
$ejercicio = new EjercicioSeis();

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $ejercicio->logout();
} else {
    $ejercicio->login();
}

