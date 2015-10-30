<?php

session_start();

if ((!isset($_SESSION['usuario']) == true) and ( !isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('location:index.php');
}

$id_usuario = $_SESSION['id'];

include '../conections/conexao.php';

$inicio = $_POST['inicio'];
$fim = $_POST['fim'];
$formato_banner = $_POST['formato_banner'];
$titulo = $_POST['titulo'];
$link = $_POST['link'];
$id_banner = $_POST['id'];
$publicar = $_POST['publicar'];

$fileName = $_FILES["img"]["name"];



if ($publicar == "") {

    $publicar = 2;
}


if ($fileName == "") {

    $nova_imagem = $_POST['imagem'];
} else {

    $nova_imagem = $fileName;
    $pathAndName = "../imagens/publicidade/" . $fileName;
    $fileTmpLoc = $_FILES["img"]["tmp_name"];
    $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
}


$update = "UPDATE banner SET data_inicio = '$inicio', data_final = '$fim', formato = '$formato_banner', titulo = '$titulo', "
        . "link = '$link', img = '$nova_imagem', publicar = '$publicar'"
        . "WHERE banner_id = $id_banner";

$executa_update = mysql_query($update)or die(mysql_error());

if ($executa_update) {
    ?>

    <script>
        window.location.href = '../list_publicidade.php?respe=sucesso';
    </script>

    <?php

} else {
    ?>
    <script>
        window.location.href = '../list_publicidade.php?respe=erro';
    </script>
    <?php

}