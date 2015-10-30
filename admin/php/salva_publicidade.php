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
$publicar = $_POST['publicar'];


$img = $_FILES['img'];


if ($publicar == "") {

    $publicar = 2;
}

$fileName = $_FILES["img"]["name"];
$pathAndName = "../imagens/publicidade/" . $fileName;
$fileTmpLoc = $_FILES["img"]["tmp_name"];
$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);


$insert = "INSERT INTO banner (data_inicio, data_final, formato, titulo, link, img, usuario_id, publicar)"
        . "VALUES('$data_inicion', '$data_fimn', '$formato_banner', '$titulo', '$link', '$fileName', $id_usuario, $publicar)";
$executa_insert = mysql_query($insert)or die(mysql_error());


if ($executa_insert) {
    ?>

    <script>
        window.location.href = '../list_publicidade.php?resp=sucesso';
    </script>

    <?php

} else {
    ?>
    <script>
        window.location.href = '../list_publicidade.php?resp=erro';
    </script>
    <?php

}