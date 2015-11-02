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
$album = $_POST['album'];
$legenda = $_POST['legenda'];
$capa = $_POST['capa'];
$img = $_FILES['img'];
$album_fotos_id = $_POST['id'];
$fileName = $_FILES["img"]["name"];


if ($capa == 1) {

    //DANDO UPDATE NA TABELA 
    $update_fotos = "UPDATE album_fotos SET capa_album = 2 WHERE album_id = $album";
    $executa_update_fotos = mysql_query($update_fotos)or die(mysql_error());

    if ($fileName == "") {

        $nova_imagem = $_POST['imagem'];
    } else {

        $nova_imagem = $fileName;
        $pathAndName = "../imagens/fotos/" . $fileName;
        $fileTmpLoc = $_FILES["img"]["tmp_name"];
        $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
    }

    $update = "UPDATE album_fotos SET data = '$data', img = '$nova_imagem', legenda = '$legenda', capa_album = '$capa' "
            . "WHERE album_fotos_id = $album_fotos_id";

    $executa_update = mysql_query($update)or die(mysql_error());
} else {
    
    $capa = 2;
    
    if ($fileName == "") {

        $nova_imagem = $_POST['imagem'];
    } else {

        $nova_imagem = $fileName;
        $pathAndName = "../imagens/fotos/" . $fileName;
        $fileTmpLoc = $_FILES["img"]["tmp_name"];
        $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
    }

    $update = "UPDATE album_fotos SET data = '$data', img = '$nova_imagem', legenda = '$legenda', capa_album = '$capa' "
            . "WHERE album_fotos_id = $album_fotos_id";

    $executa_update = mysql_query($update)or die(mysql_error());
}


if ($executa_update) {
    ?>

    <script>
        window.location.href = '../list_fotos_album.php?respe=sucesso&id=<?php echo $album; ?>';
    </script>

    <?php
} else {
    ?>
    <script>
        window.location.href = '../list_fotos_album.php?respe=erro&id=<?php echo $album; ?>';
    </script>
    <?php
}
