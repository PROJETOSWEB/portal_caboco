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
$id_noticia = $_POST['id'];


if ($destaque == "") {

    $destaque = 2;
}

if ($publicar == "") {

    $publicar = 2;
}



$fileName = $_FILES["img"]["name"];

if ($fileName == "") {

    $nova_imagem = $_POST['imagem'];
} else {

    $nova_imagem = $fileName;
    $pathAndName = "../imagens/noticia/" . $fileName;
    $fileTmpLoc = $_FILES["img"]["tmp_name"];
    $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
}


$update = "UPDATE noticia SET  sub_editoriais_id = $sub_categoria, data_noticia = '$data', fonte = '$fonte', "
        . "titulo = '$titulo', texto = '$texto', texto_detalhe = '$texto_detalhe', img = '$nova_imagem', legenda = '$legenda', "
        . "posicao_img = '$posicao_foto', video = '$codigo', legenda_video = '$legenda_video', tags = '$tagsinput', "
        . "destaque_banner = '$destaque', publicar = '$publicar' WHERE noticia_id = $id_noticia ";

$executa_update = mysql_query($update)or die(mysql_error());

if ($executa_update) {
    ?>

    <script>
        window.location.href = '../list_noticias.php?respe=sucesso';
    </script>

    <?php

} else {
    ?>
    <script>
        window.location.href = '../list_noticias.php?respe=erro';
    </script>
    <?php

}
