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
$id_usuario = $_POST['id'];

if ($senha <> $password) {
    ?>
    <script>
        window.location.href = '../usuario.php?erro=senha&tipo=insert';
    </script>
    <?php

    exit;
}

$update = "UPDATE usuario SET nome = '$nome', login = '$login', senha = '$senha', email = '$email'"
        . "WHERE usuario_id = $id_usuario";

$executa_update = mysql_query($update)or die(mysql_error());

if ($executa_update) {
    ?>

    <script>
        window.location.href = '../list_usuario.php?respe=sucesso';
    </script>

    <?php

} else {
    ?>
    <script>
        window.location.href = '../list_usuario.php?respe=erro';
    </script>
    <?php

}
