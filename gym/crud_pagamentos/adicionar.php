<?php
include '../conexao.php'; 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $membro_id = $_POST['membro_id'];
        $valor = $_POST['valor'];
        $data_pagamento = $_POST['data_pagamento'];
        

        $sql = "INSERT INTO pagamentos (membro_id, valor, data_pagamento)
                VALUES ('$membro_id', '$valor', '$data_pagamento')";

        if ($conexao->query($sql) === TRUE) {
            header("Location: listar.php");
            
        } else {
            echo "Erro ao adicionar Pagamento " . $conexao->error;
           
        }
    $conexao->close();    
    }
    
?>

<!DOCTYPE html>
<html>
<head>
    
    
    <title>Adicionar Pagamentos</title>

</head>
<body>

    <form action="adicionar.php" method="post">
        <h2>Registrar Novo Pagamento</h2>
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

        <label for="valor">Valor:</label>
        <input type="number" name="valor" id="valor" required><br>

        <label for="data_pagamento">Data do Pagamento:</label>
        <input type="date" name="data_pagamento" id="data_pagamento" required ><br>

        <input type="submit" value="Registrar Pagamento">
        
    </form>
</body>
</html>







