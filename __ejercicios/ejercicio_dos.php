<!-- Escribir una función que valide una contraseña según:

Mínimo 8 caracteres

Al menos una mayúscula

Al menos un número

Al menos un símbolo

Devolver mensajes claros indicando qué falla. -->


<?php
class EjercicioDos{
    //ojo a cómo se declara la constante, con const, el tipo de dato y sin el signo de dólar
    private const REGEX = '/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+\-=\[\]{};\':"\\|,.<>\/?]).{8,}$/';

    public function checkPassword($password): bool{
        if (empty($password)) {
           $this->errorMsg($password);
            return false;
        }
        //ojo a cómo se llama a la constante, con self::REGEX
        if (!preg_match(self::REGEX, $password)) {
            $this->errorMsg($password);
            return false;
        }
        return true;
    }
    private function errorMsg($password): void {
         if (empty($password)) {
            echo "La contraseña no puede estar vacía.\n";
        }
        elseif (strlen($password) < 8) {
            echo "La contraseña debe tener al menos 8 caracteres.\n";
        }elseif(!preg_match('/[A-Z]/', $password)) {
            echo "La contraseña debe contener al menos una letra mayúscula.\n";
        }elseif(!preg_match('/\d/', $password)) {
            echo "La contraseña debe contener al menos un número.\n";
        }elseif(!preg_match('/[!@#$%^&*()_+\-=\[\]{};\':"\\|,.<>\/?]/', $password)) {
            echo "La contraseña debe contener al menos un símbolo.\n";
        }
    }
}

$ej = new EjercicioDos();
$passwords = [
    'password',
    'Password1',
    'Password!',
    'Pass1!',
    'P@ssw0rd',
    ''
];
foreach ($passwords as $pwd) {
    echo "Validando contraseña: '$pwd'\n";
    if ($ej->checkPassword($pwd)) {
        echo "Contraseña válida.\n";
    }
    echo "\n";
}
