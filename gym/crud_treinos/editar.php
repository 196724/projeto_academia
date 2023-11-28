<?php
include '../conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $membro_id = $_POST['membro_id'];
    $tipo_treino = $_POST['tipo_treino'];
    $data_treino = $_POST['data_treino'];
   


    $sql = "UPDATE treinos SET membro_id= '$membro_id', tipo_treino='$tipo_treino', data_treino='$data_treino' WHERE id=$id";
    if ($conexao->query($sql) === TRUE) {
        header("Location: listar.php");
    } else {
        echo "Erro ao atualizar: " . $conexao->error;
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT id, membro_id, tipo_treino, data_treino FROM treinos WHERE id=$id";
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

<form action="../crud_treinos/editar.php" method="POST">
        
        <input type="hidden" name="id" value="<?php echo $gym['id']; ?>">
        <input type="hidden" name="membro_id" id="membro_id" required value="<?php echo $gym['membro_id']; ?>" ><br>

        <label for="tipo_treino">Tipo de Treino:</label>
        <input type="text" name="tipo_treino" id="tipo_treino" required value="<?php echo $gym['tipo_treino']; ?>" ><br>

        <label for="data_treino">Data do Treino:</label>
        <input type="date" name="data_treino" id="data_treino" required value="<?php echo $gym['data_treino']; ?>" ><br>

        <input type="submit" value="Enviar">
    </form>

