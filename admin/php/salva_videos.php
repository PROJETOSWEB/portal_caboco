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
$data = $_POST['data'];
$editoria = $_POST['editoria'];
$codigo = $_POST['codigo'];
$legenda = $_POST['legenda'];



$insert = "INSERT INTO videos (data_video, editoria, codigo, legenda, usuario_id)VALUES('$data', '$editoria', '$codigo', '$legenda', $id_usuario)";
$executa_insert = mysql_query($insert)or die(mysql_error());

if ($executa_insert) {
    ?>

    <script>
        window.location.href = '../list_videos.php?resp=sucesso';
    </script>

    <?php
} else {
    ?>
    <script>
        window.location.href = '../list_videos.php?resp=erro';
    </script>
    <?php
}
?>
