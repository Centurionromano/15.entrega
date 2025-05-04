<?php
// Ruta del archivo .env
$env_path = __DIR__ . '/.env';

// Mensaje de depuración para verificar si la ruta es correcta
echo "Buscando archivo .env en: " . $env_path . "<br>";

// Verifica si el archivo existe antes de intentar cargarlo
if (!file_exists($env_path)) {
    die("❌ El archivo .env no existe en: $env_path");
}

// Cargar variables de entorno manualmente
$dotenv = parse_ini_file($env_path);
foreach ($dotenv as $key => $value) {
    putenv("$key=$value");
}

// Definir las variables de conexión a la base de datos
$host = getenv('MYSQLHOST');
$dbname = getenv('MYSQLDATABASE');
$username = getenv('MYSQLUSER');
$password = getenv('MYSQLPASSWORD');

// Intenta realizar la conexión a la base de datos
try {
    $pdo = new PDO("mysql:host=$host;port=57120;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
    echo '❌ Error de conexión: ' . $e->getMessage();
    exit();
}
?>

