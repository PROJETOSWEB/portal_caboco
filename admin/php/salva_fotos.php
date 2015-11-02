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


//VERIFICA SE É A PRIMEIRA FOTO, SE FOR, DEFINIR ELA COMO CAPA.
$seleciona_capa_album = "SELECT COUNT(*) as qtd FROM album_fotos WHERE album_id = $album";
$executa_seleciona_capa_album = mysql_query($seleciona_capa_album)or die(mysql_error());
$dados_capa = mysql_fetch_array($executa_seleciona_capa_album);

if ($dados_capa['qtd'] == 0) {

    $capa = 1;

    $fileName = $_FILES["img"]["name"];
    $pathAndName = "../imagens/fotos/" . $fileName;
    $fileTmpLoc = $_FILES["img"]["tmp_name"];
    $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);


    $insert = "INSERT INTO album_fotos (data, album_id, img, legenda, capa_album)VALUES('$data', $album, '$fileName', '$legenda', '$capa')";
    $executa_insert = mysql_query($insert)or die(mysql_error());
} else {


    if ($capa == 1) {

        //DANDO UPDATE NA TABELA 
        $update_fotos = "UPDATE album_fotos SET capa_album = 2 WHERE album_id = $album";
        $executa_update_fotos = mysql_query($update_fotos)or die(mysql_error());

        $fileName = $_FILES["img"]["name"];
        $pathAndName = "../imagens/fotos/" . $fileName;
        $fileTmpLoc = $_FILES["img"]["tmp_name"];
        $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);

        $insert = "INSERT INTO album_fotos (data, album_id, img, legenda, capa_album)VALUES('$data', $album, '$fileName', '$legenda', '$capa')";
        $executa_insert = mysql_query($insert)or die(mysql_error());
    } else {

        $capa = 1;
        //DANDO UPDATE NA TABELA 
        $update_fotos = "UPDATE album_fotos SET capa_album = 2 WHERE album_id = $album";
        $executa_update_fotos = mysql_query($update_fotos)or die(mysql_error());

        $fileName = $_FILES["img"]["name"];
        $pathAndName = "../imagens/fotos/" . $fileName;
        $fileTmpLoc = $_FILES["img"]["tmp_name"];
        $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);

        $insert = "INSERT INTO album_fotos (data, album_id, img, legenda, capa_album)VALUES('$data', $album, '$fileName', '$legenda', '$capa')";
        $executa_insert = mysql_query($insert)or die(mysql_error());
        
    }
}









if ($executa_insert) {
    ?>

    <script>
        window.location.href = '../list_fotos_album.php?resp=sucesso&id=<?php echo $album ?>';
    </script>

    <?php
} else {
    ?>
    <script>
        window.location.href = '../list_fotos_album.php?resp=erro';
    </script>
    <?php
}
?>
