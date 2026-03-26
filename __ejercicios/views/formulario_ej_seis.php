<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Ejercicio Seis</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }
        
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 24px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
        }
        
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        
        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 5px rgba(102, 126, 234, 0.3);
        }
        
        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.2s;
        }
        
        button:hover {
            transform: translateY(-2px);
        }
        
        .info {
            background: #f0f0f0;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Formulario de Login</h1>
        
        <div class="info">
            <strong>Usuarios de prueba:</strong><br>
            Usuario: admin | Contraseña: admin123<br>
            Usuario: usuario | Contraseña: 1234
        </div>
        
        <form action="ejercicio_seis.php" method="POST">
            <div class="form-group">
                <label for="inputNick">Usuario:</label>
                <input 
                    id="inputNick" 
                    type="text" 
                    name="nickname" 
                    placeholder="Ingrese su usuario"
                    maxlength="35"
                    required 
                />
            </div>
            
            <div class="form-group">
                <label for="inputPassword">Contraseña:</label>
                <input 
                    id="inputPassword" 
                    type="password" 
                    name="password" 
                    placeholder="Ingrese su contraseña"
                    maxlength="35"
                    required 
                />
            </div>
            
            <!-- Token CSRF -->
            <input 
                type="hidden" 
                name="csrf_token" 
                value="<?php echo htmlspecialchars($token); ?>" 
            />
            
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
