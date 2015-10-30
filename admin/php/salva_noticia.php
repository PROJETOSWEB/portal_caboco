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
$tipo_editoria = $_POST['tipo_editoria'];
$sub_categoria = $_POST['sub_categoria'];
$data = $_POST['data'];
$fonte = $_POST['fonte'];
$titulo = $_POST['titulo'];
$texto = $_POST['texto'];
$texto_detalhe = $_POST['texto_detalhe'];
$legenda = $_POST['legenda'];
$posicao_foto = $_POST['sample-radio'];
$codigo = $_POST['codigo'];
$legenda_video = $_POST['legenda_video'];
$tagsinput = $_POST['tagsinput'];
$destaque = $_POST['destaque'];
$publicar = $_POST['publicar'];


if ($destaque == "") {

    $destaque = 2;
}

if ($publicar == "") {

    $publicar = 2;
}


$fileName = $_FILES["img"]["name"];
$pathAndName = "../imagens/noticia/" . $fileName;
$fileTmpLoc = $_FILES["img"]["tmp_name"];
$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);


$insert = "INSERT INTO noticia (sub_editoriais_id, data_noticia, fonte, titulo, texto, texto_detalhe, img,"
        . "legenda, posicao_img, video, legenda_video, tags, destaque_banner, publicar, usuario_id)"
        . "VALUES($sub_categoria, '$data', '$fonte', '$titulo', '$texto', '$texto_detalhe',"
        . "'$fileName', '$legenda', '$posicao_foto', '$codigo', '$legenda_video', '$tagsinput', '$destaque', '$publicar', $id_usuario)";

$executa_insert = mysql_query($insert)or die(mysql_error());


if ($executa_insert) {
    ?>

    <script>
        window.location.href = '../list_noticias.php?resp=sucesso';
    </script>

    <?php

} else {
    ?>
    <script>
        window.location.href = '../list_noticias.php?resp=erro';
    </script>
    <?php

}
?>