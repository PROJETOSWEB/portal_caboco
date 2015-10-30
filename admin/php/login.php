<?php

// session_start inicia a sessão
session_start();

include '../conections/conexao.php';

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];


$verifica_login = "SELECT * FROM usuario WHERE login = '$usuario' AND senha = '$senha' AND status = 1";
$executa_verifica_login = mysql_query($verifica_login)or die(mysql_error());

$array_dados = mysql_fetch_array($executa_verifica_login);


if (mysql_num_rows($executa_verifica_login) > 0) {

    $_SESSION['usuario'] = $usuario;
    $_SESSION['senha'] = $senha;
    $_SESSION['nome'] = $array_dados['nome'];
    $_SESSION['id'] = $array_dados['usuario_id'];
    header('location:../list_noticias.php');
    
} else {

    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    unset($_SESSION['nome']);
    unset($_SESSION['id']);
    header('location:../index.php?result=erro');
}
?>

