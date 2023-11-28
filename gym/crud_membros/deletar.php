<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Obtém o ID do membro a ser deletado
    $id = $_GET['id'];
    // Query SQL para deletar membro do banco de dados
    $sql = "DELETE FROM membros WHERE id=$id";
    // Redireciona para a página de listagem em caso de sucesso
    if ($conexao->query($sql) === TRUE) {
        header("Location: listar.php");
    } else {
        echo "Erro ao deletar: " . $conexao->error;
    }
}

$conexao->close();
?>
