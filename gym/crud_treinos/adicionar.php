
<?php
include '../conexao.php'; 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $membro_id = $_POST['membro_id'];
        $tipo_treino = $_POST['tipo_treino'];
        $data_treino = $_POST['data_treino'];
        

        $sql = "INSERT INTO treinos (membro_id, tipo_treino, data_treino)
                 VALUES ('$membro_id', '$tipo_treino', '$data_treino')";

        if ($conexao->query($sql) === TRUE) {
            header("Location: listar.php");
        } else {
            echo "Erro ao adicionar membro: " . $conexao->error;
        }  
    $conexao->close();
    }
    
?>


<!DOCTYPE html>
<html>
<head>
   
    <title>Criar novo Treino</title>
    
</head>
<body>
    
    
    <form action="adicionar.php" method="POST">
        <h2>Criar Novo Treino</h2>
        <label for="membro_id">Membro:</label>
        <select name="membro_id" id="membro_id" required>
            <?php

                 // Consulta para obter os membros
            $consulta_membros = "SELECT id, nome FROM membros";
            $result_membros = $conexao->query($consulta_membros);

            // Preencher as opções do dropdown com os membros
            while ($row = $result_membros->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
            }

            // Fechar a conexão
            $conexao->close();
            ?>
        </select>

        <label for="tipo_treino">Tipo de Treino:</label>
        <input type="text" name="tipo_treino" id="tipo_treino"><br>

        <label for="data_treino">Data do Treino:</label>
        <input type="date" name="data_treino" id="data_treino"><br>

        <input type="submit" value="Enviar">
    </form>
    
</body>
</html>


