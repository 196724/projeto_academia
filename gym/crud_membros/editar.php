<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $data_nascimento = $_POST['data_nascimento'];

    // Query SQL para atualizar membro no banco de dados
    $sql = "UPDATE membros SET nome= '$nome', email='$email', telefone='$telefone', data_nascimento='$data_nascimento' WHERE id=$id";
    // Redireciona para a página de listagem em caso de sucesso
    if ($conexao->query($sql) === TRUE) {
        header("Location: listar.php");
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
    // Se a requisição não for do tipo POST, carrega dados do membro a ser editado
} else {
    $id = $_GET['id'];
    $sql = "SELECT id, nome, email, telefone, data_nascimento FROM membros WHERE id=$id";
    $result = $conexao->query($sql);
    if ($result->num_rows > 0) {
        $gym= $result->fetch_assoc();
    } else {
        echo "Tarefa não encontrada!";
        exit;
    }
}

$conexao->close();
?>

<form action="../crud_membros/editar.php" method="post">
    <input type="hidden" name="id" value="<?php echo $gym['id']; ?>">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" value="<?php echo $gym['nome']; ?>" required><br>

    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email" value="<?php echo $gym['email']; ?>" required><br>

    <label for="telefone">Telefone:</label>
    <input type="number" name="telefone" value="<?php echo $gym['telefone']; ?>" id="telefone"><br>

    <label for="data_nascimento">Data de Nascimento:</label>
    <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $gym['data_nascimento']; ?>" required><br>

    <input type="submit" value="Adicionar Membro">
</form>
