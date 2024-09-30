<?php
include("conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valorSubmit = $_POST['botaoSubmit'];

    switch ($valorSubmit) {
        case 'usuario':
            $nomeUser = $_POST['nomeUser'];
            $cpf = $_POST['CPF'];
            $telefone = $_POST['telefone'];
            $sqlUser = "INSERT INTO Usuario (NOME_USER,CPF,TELEFONE) VALUES ('$nomeUser','$cpf','$telefone')";
            if ($con->query($sqlUser) === TRUE ){
                header("Location: index.php");
            }
            

        case 'jogo':
            $nomeJogo = $_POST['nomeJogo'];
            $sqlJogo = "INSERT INTO Jogo (NOME_JOGO) VALUES ('$nomeJogo')";
            if ($con->query($sqlJogo) === TRUE ){
                header("Location: index.php");
            }

        case 'fliperama':
            $codSerie = $_POST['codSerie'];
            $sqlFliper = "INSERT INTO Fliperama (COD_SERIE) VALUES ('$codSerie')";
            if ($con->query($sqlFliper) === TRUE ){
                header("Location: index.php");
            }

        default:
            if ($con->query($sql) === TRUE ){
                header("Location: index.php");
            }
    }
}