<?php
// Definir las variables de conexión a la base de datos
$host = 'localhost'; // El servidor donde está alojada la base de datos (en este caso, 'localhost' indica que está en la misma máquina)
$dbname = 'recipes_db'; // El nombre de la base de datos a la que se quiere conectar
$username = 'root'; // El nombre de usuario para acceder a la base de datos (por defecto 'root' en muchas instalaciones de MySQL)
$password = ''; // La contraseña para el usuario (en este caso está vacía, lo cual es común en instalaciones locales sin configurar contraseña)

// Intenta realizar la conexión a la base de datos dentro de un bloque try-catch para manejar errores
try {
    // Intentar crear una nueva instancia de PDO para conectarse a la base de datos
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Establecer el modo de error de PDO a excepción (para que los errores se manejen con excepciones)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si ocurre un error de conexión, se captura la excepción y se muestra un mensaje de error
    echo 'Error de conexión: ' . $e->getMessage();
    // Terminar la ejecución del script en caso de que no se pueda conectar a la base de datos
    exit();
}
?>
