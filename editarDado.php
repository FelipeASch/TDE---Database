<?php
include("conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $tipo = $_POST['tipo'];
    
    if ($tipo === 'usuario') {
        $nomeUser = $_POST['nomeUser'];
        $cpf = $_POST['cpf'];
        $telefone = $_POST['telefone'];
        $sql = "UPDATE Usuario SET NOME_USER = '$nomeUser', CPF = '$cpf', TELEFONE = '$telefone' WHERE ID_USUARIO = $id";
    } else if ($tipo === 'fliperama') {
        $codSerie = $_POST['codSerie'];
        $sql = "UPDATE Fliperama SET COD_SERIE = '$codSerie' WHERE ID_FLIPER = $id";
    }
    if ($con->query($sql) === TRUE) {
        echo "Registro atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar registro: " . $con->error;
    }
    header("Location: index.php");
    exit();
}
if (isset($_GET['id']) && isset($_GET['tipo'])) {
    $id = intval($_GET['id']);
    $tipo = $_GET['tipo'];

    if ($tipo === 'usuario') {
        $sql = "SELECT * FROM Usuario WHERE ID_USUARIO = $id";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <h2>Editar Usuário</h2>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="id" value="<?php echo $row['ID_USUARIO']; ?>">
                <input type="hidden" name="tipo" value="usuario">
                <label for="nomeUser">Nome:</label>
                <input type="text" name="nomeUser" id="nomeUser" value="<?php echo $row['NOME_USER']; ?>"><br>
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" id="cpf" value="<?php echo $row['CPF']; ?>"><br>
                <label for="telefone">Telefone:</label>
                <input type="text" name="telefone" id="telefone" value="<?php echo $row['TELEFONE']; ?>"><br>
                <button type="submit">Atualizar</button>
            </form>
            <?php
        }
    } else if ($tipo === 'fliperama') {
        $sql = "SELECT * FROM Fliperama WHERE ID_FLIPER = $id";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <h2>Editar Fliperama</h2>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="id" value="<?php echo $row['ID_FLIPER']; ?>">
                <input type="hidden" name="tipo" value="fliperama">
                <label for="codSerie">Código de Série:</label>
                <input type="text" name="codSerie" id="codSerie" value="<?php echo $row['COD_SERIE']; ?>"><br>
                <button type="submit">Atualizar</button>
            </form>
            <?php
        }
    }
} else {
    echo "<h3>Listagem de Usuários</h3>";
    $sql = "SELECT * FROM Usuario";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nome</th><th>CPF</th><th>Telefone</th><th>Ações</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ID_USUARIO"] . "</td>";
            echo "<td>" . $row["NOME_USER"] . "</td>";
            echo "<td>" . $row["CPF"] . "</td>";
            echo "<td>" . $row["TELEFONE"] . "</td>";
            echo "<td><a href='?id=" . $row["ID_USUARIO"] . "&tipo=usuario'>Editar</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum usuário encontrado.";
    }
    echo "<h3>Listagem de Fliperamas</h3>";
    $sql = "SELECT * FROM Fliperama";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Código de Série</th><th>Ações</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ID_FLIPER"] . "</td>";
            echo "<td>" . $row["COD_SERIE"] . "</td>";
            echo "<td><a href='?id=" . $row["ID_FLIPER"] . "&tipo=fliperama'>Editar</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum fliperama encontrado.";
    }
    echo "<button onclick='location.href=\"index.php\"'>Voltar</button>";
}

$con->close();
?>
