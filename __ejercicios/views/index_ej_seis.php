<?php
session_start();

// Verificar que el usuario está logueado
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header('Location: ../ejercicio_seis.php');
    exit;
}

$user = htmlspecialchars($_SESSION['user'] ?? 'Usuario');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Protegida - Ejercicio Seis</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            margin: 0 auto;
        }
        
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #ddd;
        }
        
        h1 {
            color: #333;
            font-size: 28px;
        }
        
        .user-info {
            text-align: right;
        }
        
        .user-info p {
            color: #666;
            margin-bottom: 10px;
        }
        
        .user-name {
            font-weight: bold;
            color: #667eea;
            font-size: 16px;
        }
        
        .content {
            margin-bottom: 30px;
            line-height: 1.6;
            color: #555;
        }
        
        .content p {
            margin-bottom: 15px;
        }
        
        .logout-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.2s;
            text-decoration: none;
            display: inline-block;
        }
        
        .logout-btn:hover {
            transform: translateY(-2px);
        }
        
        .success-badge {
            display: inline-block;
            background: #4CAF50;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>¡Has Llegado Correctamente!</h1>
            <div class="user-info">
                <p>Usuario logueado:</p>
                <p class="user-name"><?php echo $user; ?></p>
            </div>
        </div>
        
        <div class="success-badge">✓ Sesión Activa</div>
        
        <div class="content">
            <p>
                <strong>¡Felicidades!</strong> Has superado exitosamente la autenticación del sistema. 
                Esta es una página protegida que solo es accesible para usuarios logueados.
            </p>
            
            <p>
                Tu sesión está siendo mantenida mediante $_SESSION, lo que te permite acceder a esta página 
                sin necesidad de volver a introducir tus credenciales mientras la sesión sea válida.
            </p>
            
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas libero autem reiciendis 
                quia voluptates similique non laboriosam, tempore nesciunt ratione ipsa. Unde molestias 
                obcaecati tempore minima, facere totam ducimus labore.
            </p>
            
            <p>
                <strong>Características de seguridad implementadas:</strong>
                <ul style="margin-left: 20px; margin-top: 10px;">
                    <li>✓ Protección contra ataques CSRF mediante tokens únicos</li>
                    <li>✓ Página protegida con redirección automática</li>
                    <li>✓ Validación de sesión activa</li>
                    <li>✓ Logout seguro con limpieza de cookies</li>
                    <li>✓ Validaciones en servidor</li>
                </ul>
            </p>
        </div>
        
        <a href="../ejercicio_seis.php?action=logout" class="logout-btn">Cerrar Sesión</a>
    </div>
</body>
</html>
