<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $membro_id = $_POST['membro_id'];
        $valor = $_POST['valor'];
        $data_pagamento = $_POST['data_pagamento'];


    $sql = "UPDATE pagamentos SET membro_id= '$membro_id', valor='$valor', data_pagamento='$data_pagamento' WHERE id=$id";
    if ($conexao->query($sql) === TRUE) {
        header("Location: listar.php");
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT  membro_id, valor, data_pagamento FROM pagamentos WHERE id=$id";
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

<form action="../crud_pagamentos/editar.php" method="post">

    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="membro_id" value="<?php echo $gym['membro_id']; ?>">
    
    <label >Valor:</label>
    <input type="text" name="valor" id="valor" value="<?php echo $gym['valor']; ?>" required><br><br>

    <label >Data Pagamento:</label>
    <input type="date" name="data_pagamento" id="data_pagamento" value="<?php echo $gym['data_pagamento']; ?>" ><br><br>

    <input type="submit" value="Atualizar">
</form>