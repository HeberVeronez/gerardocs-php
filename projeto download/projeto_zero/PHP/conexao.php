<?php 
date_default_timezone_set('America/Sao_Paulo');

$host    = 'localhost';
$dbname  = 'bd_zero';
$usuario = 'root';
$senha   = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro ao conectar: " . $e->getMessage();
}
?>
