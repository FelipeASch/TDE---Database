<?php
include("conn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['idUsuario'])) {
        $idUsuario = $_POST['idUsuario'];
    
        $sql = "DELETE FROM Usuario WHERE ID_USUARIO = $idUsuario";
        $con->query($sql);
    } else {
        $idFliper = $_POST['idFliper'];
        $sql = "DELETE FROM Fliperama WHERE ID_FLIPER = $idFliper";
        $con->query($sql);
    }
}
$con->close();
header("Location: index.php");