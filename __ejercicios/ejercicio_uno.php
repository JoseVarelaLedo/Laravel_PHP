<!-- Gestión de usuarios con arrays

Crear un script que:

    Tenga un array de usuarios (nombre, email, edad).

Y que permita:

    Filtrar usuarios mayores de 18.

    Ordenarlos por edad.

    Buscar un usuario por email. -->

<?php
class EjercicioUno{
    public function mapArray(array $users): array{
        $users = array_filter($users, function($user){
            return $user['edad'] > 18;
        });
        usort($users, function($a, $b){
            return $a['edad'] <=> $b['edad'];
        });
        return $users;
    }

    public function searchByEmail(array $users, string $email): ?array{
        foreach($users as $user){
            if($user['email'] === $email){
                return $user;
            }
        }
        return null;
    }
}

$usuarios = [
    [
        'nombre' => 'Ana García',
        'email' => 'ana.garcia@example.com',
        'edad' => 25
    ],
    [
        'nombre' => 'Luis Pérez',
        'email' => 'luis.perez@example.com',
        'edad' => 17
    ],
    [
        'nombre' => 'María López',
        'email' => 'maria.lopez@example.com',
        'edad' => 32
    ],
    [
        'nombre' => 'Carlos Sánchez',
        'email' => 'carlos.sanchez@example.com',
        'edad' => 15
    ],
    [
        'nombre' => 'Elena Martínez',
        'email' => 'elena.martinez@example.com',
        'edad' => 28
    ],
    [
        'nombre' => 'Javier Ruiz',
        'email' => 'javier.ruiz@example.com',
        'edad' => 19
    ]
];

$ej = new EjercicioUno();
$resultado = $ej->mapArray($usuarios);
print_r($resultado);

$emailBuscado = 'javier.ruiz@example.com';
$usuarioEncontrado = $ej->searchByEmail($usuarios, $emailBuscado);
print_r("El usuario encontrado es: " . $usuarioEncontrado['nombre']);
