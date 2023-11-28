<!DOCTYPE html>
<html>
<head>
    
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    
    
    <title>Gym</title>

</head>
<body>
<header>
    <h1>TOP GYM</h1>
</header>


    <nav>
        <button onclick="scrollToForm('formsTreinos')">Treinos</button>
        <button onclick="scrollToForm('formsMembros')">Membros</button>
        <button onclick="scrollToForm('formsPagamentos')">Pagamentos</button>
        <button onclick="scrollToFooter('footer')">Contato</button>
    </nav>

   
    
    <form id="formsMembros" action="../crud_membros/adicionar.php"  method="post">
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

    <form id="formsPagamentos" action="../crud_pagamentos/adicionar.php" method="post">
        <h2>Registrar Novo Pagamento</h2>
        <label for="membro_id">Membro:</label>
        <select name="membro_id" id="membro_id" required>
            <?php
            
            include '../conexao.php';
           

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
        <input type="number" name="valor" id="valor"><br>

        <label for="data_pagamento">Data do Pagamento:</label>
        <input type="date" name="data_pagamento" id="data_pagamento"><br>

        <input type="submit" value="Registrar Pagamento">
        
    </form>

    <form id="formsTreinos" action="../crud_treinos/adicionar.php" method="POST">
            <h2>Criar Novo Treino</h2>
            <label for="membro_id">Membro:</label>
            <select name="membro_id" id="membro_id" required>
                <?php
                include '../conexao.php';
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

    <script>
       

        function scrollToForm(formId) {
            document.getElementById(formId).scrollIntoView({ behavior: 'smooth' });
        }

        function scrollToFooter() {
            document.getElementById('footer').scrollIntoView({ behavior: 'smooth' });
        }
    </script>

<footer id="footer" >
        <p>&copy; <?php echo date("Y"); ?> TOP GYM</p>
        <p>Endereço: Rua da Academia, 123 - Cidade</p>
        <p>Telefone: (00) 1234-5678</p>
        <p>Email: contato@gymacademia.com</p>
</footer>

</body>

</html>




