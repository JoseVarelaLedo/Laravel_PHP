<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario - Ejercicio 9</title>
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
            max-width: 600px;
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
        input[type="email"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 5px rgba(102, 126, 234, 0.3);
        }

        .textArea {
            width: 100%;
            border-radius: 10px;
            height: 10em;
            margin:10px;
            padding: 1rem;
            text-align: left;
            vertical-align: top;
            position:relative;
        }

        button {
            width: fit-content;
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.2s;
            position: relative;
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
        <h1>Formulario de recogida de datos</h1>

        <form action="ejercicio_nueve.php" method="POST">
            <div class="form-group">
                <label for="inputName">Nombre:</label>
                <input
                    id="inputName"
                    type="text"
                    name="name"                  
                    placeholder="Escribe tu nombre, al menos 3 letras"
                    maxlength="35"
                    required />
            </div>

            <div class="form-group">
                <label for="inputMail">eMail:</label>
                <input
                    id="inputMail"
                    type="email"
                    name="email"
                    placeholder="Escribe una cuenta de correo electrónico que no sea gmail"
                    maxlength="35"
                    required />
            </div>

            <textarea
                id="inputMessage"
                name="message"
                class="textArea"
                maxlength="100"
                placeholder="Escribe un mensaje entre 20 y 100 caracteres"
                required></textarea>

            <button type="submit">Enviar datos</button>
        </form>
    </div>
</body>

</html>