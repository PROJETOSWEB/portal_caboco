<?php

session_start();
if ((!isset($_SESSION['usuario']) == true) and ( !isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('location:index.php');
}

$id_usuario = $_SESSION['id'];

include '../conections/conexao.php';

//PEGANDO DADOS POR POST
$nome = $_POST['nome'];
$login = $_POST['login'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$password = $_POST['password'];

if ($senha <> $password) {
    ?>
    <script>
        window.location.href = '../usuario.php?erro=senha&tipo=insert';
    </script>
    <?php

    exit;
}

$insert = "INSERT INTO usuario (nome, login, senha, status, email, nivel)"
        . "VALUES('$nome', '$login', '$senha', 1, '$email', 0)";

$executa_insert = mysql_query($insert)or die(mysql_error());

if ($executa_insert) {
    ?>

    <script>
        window.location.href = '../list_usuario.php?resp=sucesso';
    </script>

    <?php

} else {
    ?>
    <script>
        window.location.href = '../list_usuario.php?resp=erro';
    </script>
    <?php

}
?>
