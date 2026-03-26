<?php
session_start();

$data = $_SESSION['form_data'] ?? null;

if (!$data) {
    echo "No hay datos enviados.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de datos de entrada</title>
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

        li {
            font-family: 'Courier New', Courier, monospace;
            font-weight: 100;
            color: aqua;
            background-color: darkblue;
            width: fit-content;
        }

        .textArea {
            width: 100%;
            border-radius: 10px;
            height: 10em;
            padding: 10px;
            margin:10px;
        }

        .content {
            margin-bottom: 30px;
            line-height: 1.6;
            color: #555;
        }

        .content p {
            margin-bottom: 15px;
        }
        .data {
            color:black;
            background-color: beige;
            font-size: larger;
            font-style: oblique;
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
            <h1>Los datos son correctos:</h1>
        </div>

        <div class="success-badge">✓ Datos recibidos correctamente</div>

        <div class="content">
            <ul>
                <li>Nombre: <span class="data"><?= htmlspecialchars($data['name']) ?></span></li>
                <li>eMail: <span class="data"><?= htmlspecialchars($data['email']) ?></span></li>
            </ul>
            <textarea class="textArea"><?=htmlspecialchars($data['message']) ?></textarea>
        </div>

        <a href="../ejercicio_nueve.php?action=redirect" class="logout-btn">Volver a login</a>
    </div>
</body>

</html>