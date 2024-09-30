<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TDE - Database</title>
    <style>
        .tabela {
            display: none;
            width: 25%;
        }
    </style>
    <script>
        function hideShow(value) {
            let tabela = document.getElementById("tabela" + value);
            if (tabela.style.display === "none" || tabela.style.display === "") {
                tabela.style.display = "block";
            } else {
                tabela.style.display = "none";
            }
        }
    </script>
</head>
<body>
    <h1>Grande gerenciador de user-jogo-fliperama</h1>
    <form name="Cadastros" id="Cadastros" method="post" action="cadastroToDB.php">
        <div class="inputs">
            <h2>Usuários</h2>
            <input placeholder="Nome" type="text" name="nomeUser" id="nomeUser" required>
            <input placeholder="CPF" type="text" name="CPF" id="CPF" required>
            <input placeholder="Telefone" type="text" name="telefone" id="telefone" required>
            <button type="submit" name="botaoSubmit" value="usuario">Cadastrar</button>

        </div>
    </form>
    <form name="Cadastros" id="Cadastros" method="post" action="cadastroToDB.php">
        <div class="inputs">
            <h2>Jogos</h2>
            <input placeholder="Nome do Jogo" type="text" name="nomeJogo" id="nomeJogo" required>
            <button type="submit" name="botaoSubmit" value="jogo">Cadastrar</button>
        </div>
    </form>
    <form name="Cadastros" id="Cadastros" method="post" action="cadastroToDB.php">
        <div class="inputs">
            <h2>Fliperama</h2>
            <input placeholder="Código de Série" type="text" name="codSerie" id="codSerie" required>
            <button type="submit" name="botaoSubmit" value="fliperama">Cadastrar</button>
        </div>
    </form>
    <div class="listagem">
        <h3>Listagem de Usuários</h3>
        <?php 
            include("conn.php");
            $sql = "SELECT * FROM Usuario";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                echo "<table id='tabelaUser' class='tabela' border='1'>";
                echo "<tr><th>ID</th><th>Nome</th><th>CPF</th><th>Telefone</th><th>Excluir</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["ID_USUARIO"] . "</td>";
                    echo "<td>" . $row["NOME_USER"] . "</td>";
                    echo "<td>" . $row["CPF"] . "</td>";
                    echo "<td>" . $row["TELEFONE"] . "</td>";
                    echo "<td><form method='post' action='excluirDado.php' style='display:inline;'>";
                    echo "<input type='hidden' name='idUsuario' value='" . $row["ID_USUARIO"] . "'>";
                    echo "<button type='submit'>X</button>";
                    echo "</form></td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        ?>
        <button onclick="hideShow('User')">Consultar</button>
        <button onclick="location.href='editarDado.php'" style="margin-left: 10px;">Editar Usuários</button>

        <h3>Listagem de Fliperamas</h3>
        <?php 
            $sql = "SELECT * FROM Fliperama";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                echo "<table id='tabelaFliperama' class='tabela' border='1'>";
                echo "<tr><th>ID</th><th>Código de Série</th><th>Excluir</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["ID_FLIPER"] . "</td>";
                    echo "<td>" . $row["COD_SERIE"] . "</td>";
                    echo "<td><form method='post' action='excluirDado.php' style='display:inline;'>";
                    echo "<input type='hidden' name='idFliper' value='" . $row["ID_FLIPER"] . "'>";
                    echo "<button type='submit'>X</button>";
                    echo "</form></td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        ?>
        <button onclick="hideShow('Fliperama')">Consultar</button>
        <button onclick="location.href='editarDado.php'" style="margin-left: 10px;">Editar Fliperamas</button>
    </div>
</body>
</html>
