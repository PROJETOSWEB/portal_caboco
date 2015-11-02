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


$data_inicio = explode('/', $inicio);
$data_inicion = $data_inicio[2] . "-" . $data_inicio[1] . "-" . $data_inicio[0];

$data_fim = explode('/', $fim);
$data_fimn = $data_fim[2] . "-" . $data_fim[1] . "-" . $data_fim[0];


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


$update = "UPDATE banner SET data_inicio = '$data_inicion', data_final = '$data_fimn', formato = '$formato_banner', titulo = '$titulo', "
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