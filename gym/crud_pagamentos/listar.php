<?php
include '../conexao.php';
// Query SQL para obter membros e pagamentos do banco de dados
$sql = $sql = "SELECT membros.id, membros.nome, pagamentos.id as pagamento_id, pagamentos.valor, pagamentos.data_pagamento, pagamentos.criado_em
    FROM membros
    LEFT JOIN pagamentos ON membros.id = pagamentos.membro_id";
$result = $conexao->query($sql);
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/listarPagamentos.css">
    <title>Listar Pagamentos</title>
</head>
<body>

<h1>Pagamentos</h1>
<a class='button adicionar' href='../view/index.php'>Adicionar Pagamneto</a>

<table class="tabela-membros" border="1">
    <thead>
        <tr>
            <th>ID do Membro</th>
            <th>Nome do Membro</th>
            <th>Valor</th>
            <th>Data do Pagamento</th>
            <th>Data de Criação</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["valor"] . "</td>";
                echo "<td>" . $row["data_pagamento"] . "</td>";
                echo "<td>" . $row["criado_em"] . "</td>";
                echo "<td><a class='button editar' href='editar.php?id=" . $row["pagamento_id"] . "'>Editar</a> | <a class='button deletar' href='deletar.php?id=" . $row["pagamento_id"] . "'>Deletar</a></td>";
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
