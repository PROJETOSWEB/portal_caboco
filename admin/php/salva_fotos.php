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
$album = $_POST['album_id'];
$legenda = $_POST['legenda'];
$capa = $_POST['capa'];
$img = $_FILES['img'];

if ($capa == "") {

    $capa = 2;
}

$fileName = $_FILES["img"]["name"];
$pathAndName = "../imagens/fotos/" . $fileName;
$fileTmpLoc = $_FILES["img"]["tmp_name"];
$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);


$insert = "INSERT INTO album_fotos (data, album_id, img, legenda, capa_album)VALUES('$data', $album, '$fileName', '$legenda', '$capa')";
$executa_insert = mysql_query($insert)or die(mysql_error());


if ($executa_insert) {
    ?>

    <script>
        window.location.href = '../list_fotos_album.php?respt=sucesso&id=<?php echo $album?>';
    </script>

    <?php
} else {
    ?>
    <script>
        window.location.href = '../list_fotos_album.php?respt=erro';
    </script>
    <?php
}
?>
