<?php
// Ruta del archivo .env
$env_path = '/var/www/html/15.entrega/.env';


// Verificar si el archivo .env existe
if (!file_exists($env_path)) {
    die("❌ El archivo .env no existe en: $env_path");
}

// Intentar leer el archivo .env
$dotenv = parse_ini_file($env_path);
if ($dotenv === false) {
    die("❌ No se pudo leer el archivo .env");
}

// Cargar las variables de entorno
foreach ($dotenv as $key => $value) {
    putenv("$key=$value");
}

// Obtener las variables necesarias
$host = getenv('database.default.hostname');
$dbname = getenv('database.default.database');
$username = getenv('database.default.username');
$password = getenv('database.default.password');

// Mostrar los valores para depuración
echo "🔍 Conectando a: Host=$host | DB=$dbname | Usuario=$username<br>";

try {
    // Establecer conexión PDO (agregar puerto 57120 explícitamente)
    $pdo = new PDO("mysql:host=$host;port=57120;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Conexión exitosa a la base de datos.<br>";
} catch (PDOException $e) {
    echo '❌ Error de conexión: ' . $e->getMessage();
    exit();
}
?>
