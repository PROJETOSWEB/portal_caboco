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
$id_videos = $_POST['id'];


$update = "UPDATE videos SET data_video = '$data', editoria = '$editoria', codigo = '$codigo', legenda = '$legenda'"
        . "WHERE videos_id = $id_videos";

$executa_update = mysql_query($update)or die(mysql_error());

if ($executa_update) {
    ?>

    <script>
        window.location.href = '../list_videos.php?respe=sucesso';
    </script>

    <?php

} else {
    ?>
    <script>
        window.location.href = '../list_videos.php?respe=erro';
    </script>
    <?php

}