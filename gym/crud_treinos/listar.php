<?php
include '../conexao.php';

$sql = "SELECT treinos.id AS treino_id, treinos.tipo_treino, treinos.data_treino, membros.id AS membro_id, membros.nome
        FROM treinos
        JOIN membros ON treinos.membro_id = membros.id";
$result = $conexao->query($sql);
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/listarPagamentos.css">
    <title>Listar treinos</title>
</head>
<body>

<h1>Treinos</h1>
<a class='button adicionar' href='../view/index.php'>Adicionar Treino</a>

<table class="tabela-membros" border="1">
    <thead>
        <tr>
            <th>ID do Membro</th>
            <th>Nome do Membro</th>
            <th>Tipo Treino</th>
            <th>Data de Criação</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
            
                echo "<td>" . $row["treino_id"] . "</td>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["tipo_treino"] . "</td>";
                echo "<td>" . $row["data_treino"] . "</td>";
                echo "<td><a class='button editar' href='editar.php?id=" . $row["treino_id"] . "'>Editar</a> | <a class='button deletar' href='deletar.php?id=" . $row["treino_id"] . "'>Deletar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Sem pagamentos</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>

<?php
$conexao->close();
?>
