<?php
$host = '127.0.0.1';
$dbname = 'pago_project';
$username = 'root';
$password = 'arlocampos';
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexion. ". $e->getMessage();
}
return $conn;
?>