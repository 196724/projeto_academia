<html>
<head>
    
    <title>Adicionar Membro</title>
</head>
<body>

<form action="adicionar.php" method="post">
    <h2>Adicionar novo membro</h2>
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required><br><br>

    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email" required><br><br>

    <label for="telefone">Telefone:</label>
    <input type="number" name="telefone" id="telefone"><br><br>

    <label for="data_nascimento">Data de Nascimento:</label><br><br>
    <input type="date" name="data_nascimento" id="data_nascimento" required><br>

    <input type="submit" value="Adicionar">
</form>


</body>
</html>



<?php
include '../conexao.php'; // Inclua o arquivo de conexão ao banco de dados
        // Obtenha dados do formulário via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $data_nascimento = $_POST['data_nascimento'];
        // Consulta SQL para inserir novo membro
        $sql = "INSERT INTO membros (nome, email, telefone, data_nascimento) VALUES ('$nome', '$email', '$telefone', '$data_nascimento')";
        // Executar a consulta e redirecionar para a página de listagem em caso de sucesso
        if ($conexao->query($sql) === TRUE) {
            header("Location: listar.php");
        } else {
            echo "Erro ao adicionar membro: " . $conexao->error;
        }
    }

$conexao->close();
?>





