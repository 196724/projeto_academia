<?php
include '../conexao.php';
// Query SQL para obter membros do banco de dados
$sql = "SELECT id, nome, email, telefone, data_nascimento FROM membros";
$result = $conexao->query($sql);
?>

<link rel="stylesheet" href="../css/listarMembros.css">



<h1>Membros</h1>
<a class='button adicionar' href='../view/index.php'>Adicionar Novo Membro</a>
<table class="tabela-membros" border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Data de Nascimento</th>
            <th>Ações</th>
           
            
        </tr>
    </thead>
    <tbody>
        <?php
        // Loop para exibir cada membro na tabela
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["telefone"] . "</td>";
                echo "<td>" . $row["data_nascimento"] . "</td>";
                echo "<td><a class='button editar' href='editar.php?id=" . $row["id"] . "'>Editar</a> | <a class='button deletar' href='deletar.php?id=" . $row["id"] . "'>Deletar</a></td>";
                echo "</tr>";
            }
                
        } else {
            echo "<tr><td colspan='5'>Sem membros</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php
$conexao->close();
?>
