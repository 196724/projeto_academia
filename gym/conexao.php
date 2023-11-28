<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'gym';

$conexao = new mysqli($host, $user, $password, $db);

if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
?>
